<?php

use core\App;

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use app\forms\CarSearchForm;

class CarListCtrl
{

    private $form;
    private $records;
    private $limit = 3; //max ilosc rekordow do wyswietlenia z bazy

    public function __construct()
    {
        //stworzenie potrzebnych obiektów
        $this->form = new CarSearchForm();
    }

    public function validate()
    {
        // 1. sprawdzenie, czy parametry zostały przekazane
        // - nie trzeba sprawdzać
        $this->form->marka = ParamUtils::getFromRequest('sf_marka');
        // 2. sprawdzenie poprawności przekazanych parametrów
        // - nie trzeba sprawdzać
        return !App::getMessages()->isError();
    }


    public function carListLoad()
    {
        // 1. Walidacja danych formularza (z pobraniem)
        // - W tej aplikacji walidacja nie jest potrzebna, ponieważ nie wystąpią błedy podczas podawania nazwiska.
        //   Jednak pozostawiono ją, ponieważ gdyby uzytkownik wprowadzał np. datę, lub wartość numeryczną, to trzeba
        //   odpowiednio zareagować wyświetlając odpowiednią informację (poprzez obiekt wiadomości Messages)
        $this->validate();

        //warunek okreslajacy ilosc stron, offset - jesli jest wiecej niz 1 strona ma policzyc offset, ilosc wuerszy
        if ($this->form->page > 1) {
            $this->form->offset = $this->limit * ($this->form->page - 1);
        } else {
            $this->form->offset = 0;
            $this->form->page = 1;
        }
        // 2. Przygotowanie mapy z parametrami wyszukiwania (nazwa_kolumny => wartość)

        $search_params = [];//przygotowanie pustej struktury (aby była dostępna nawet gdy nie będzie zawierała wierszy)
        if (isset($this->form->marka) && strlen($this->form->marka) > 0) {
            $search_params['marka[~]'] = $this->form->marka . '%';// dodanie symbolu % zastępuje dowolny ciąg znaków na końcu
        }

        // 3. Pobranie listy rekordów z bazy danych
        // W tym wypadku zawsze wyświetlamy listę osób bez względu na to, czy dane wprowadzone w formularzu wyszukiwania są poprawne.
        // Dlatego pobranie nie jest uwarunkowane poprawnością walidacji (jak miało to miejsce w kalkulatorze)
        //przygotowanie frazy where na wypadek większej liczby parametrów
        $num_params = sizeof($search_params);
        if ($num_params > 1) {
            $where = ["AND" => &$search_params];
        } else {
            $where = &$search_params;
        }

        // Sprawdzenie liczby rekordow w bazie
        $this->count = App::getDB()->count("samochod", [
            "id_car[<]" => 1000000
        ]);

        //dodanie frazy sortującej po nazwisku i limitu wyswietlanych danych
        $where ["ORDER"] = "rok";
        $where ["LIMIT"] = [$this->form->offset, $this->limit];
        //wykonanie zapytania ile zmiesci sie wierszy na stronie o okreslony wczesniej limit
        $this->form->last_page = ceil($this->count / $this->limit);

        //wykonanie zapytania do bazy
        try {
            $this->records = App::getDB()->select("samochod", [
                "id_car",
                "samochod_vim",
                "marka",
                "model",
                "rok",
                "usterka",
            ], $where);
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }


        $pages[0]['number'] = 1;
        for ($i = 1; $i <= ceil($this->count / $this->limit); $i++) {
            $pages[$i-1]['number'] = $i;
        }
        App::getSmarty()->assign("pages", $pages);


    }

    public function action_carList()
    {
        $this->carListLoad();
        App::getSmarty()->assign('searchForm', $this->form); // dane formularza (wyszukiwania w tym wypadku)
        App::getSmarty()->assign('car', $this->records);  // lista rekordów z bazy danych
        App::getSmarty()->display('CarList.tpl');
    }
// Widok samej tabeli wykorzystany by ajax tylko ja odswiezyl, rowniez wykorzystane przez stronnicowanie
    public function action_carListPart()
    {
        $this->carListLoad();
        App::getSmarty()->assign('searchForm', $this->form);
        App::getSmarty()->assign('car', $this->records);
        App::getSmarty()->display('CarListTable.tpl');
    }


//Stronnicowanie
    public function action_carPreviousPage()
    {
        $strona = ParamUtils::getFromGet('page', true, 'Error 01');
        $this->form->page = --$strona;
        $this->action_carListPart();
    }

    public function action_carTestPage()
    {
        $strona = ParamUtils::getFromGet('page', true, 'Error 04');
        $this->form->page = $strona;
        $this->action_carListPart();

    }

    public function action_carNextPage()
    {
        $strona = ParamUtils::getFromGet('page', true, 'Error 02');
        $this->form->page = ++$strona;
        $this->action_carListPart();
    }
}