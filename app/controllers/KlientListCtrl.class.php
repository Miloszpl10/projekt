<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use app\forms\KlientSearchForm;

class KlientListCtrl {

    private $form; //dane formularza wyszukiwania
    private $records; //rekordy pobrane z bazy danych
    private $limit = 2; //max ilosc rekordow do wyswietlenia z bazy


    public function __construct() {
        //stworzenie potrzebnych obiektów
        $this->form = new KlientSearchForm();
    }

    public function validate() {
        // 1. sprawdzenie, czy parametry zostały przekazane
        // - nie trzeba sprawdzać
        $this->form->nazwisko = ParamUtils::getFromRequest('sf_nazwisko');

        // 2. sprawdzenie poprawności przekazanych parametrów
        // - nie trzeba sprawdzać

        return !App::getMessages()->isError();
    }

    public function klientListLoad() {
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
        $search_params = []; //przygotowanie pustej struktury (aby była dostępna nawet gdy nie będzie zawierała wierszy)
        if (isset($this->form->nazwisko) && strlen($this->form->nazwisko) > 0) {
            $search_params['nazwisko[~]'] = $this->form->nazwisko . '%'; // dodanie symbolu % zastępuje dowolny ciąg znaków na końcu
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
        $this->count = App::getDB()->count("wlasciciel", [
            "wlasciciel_id[<]" => 1000000
        ]);

        //dodanie frazy sortującej po nazwisku i limitu wyswietlanych danych
        $where ["ORDER"] = "nazwisko";
        $where ["LIMIT"] = [$this->form->offset, $this->limit];
        //wykonanie zapytania ile zmiesci sie wierszy na stronie o okreslony wczesniej limit
        $this->form->last_page = ceil($this->count / $this->limit);

        //wykonanie zapytania do bazy
        try {
            $this->records = App::getDB()->select("wlasciciel", [
                "wlasciciel_id",
                "nazwisko",
                "telefon",
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

        // 4. wygeneruj widok
    public function action_klientList() {
        $this->klientListLoad();
        App::getSmarty()->assign('searchForm', $this->form); // dane formularza (wyszukiwania w tym wypadku)
        App::getSmarty()->assign('klient', $this->records);  // lista rekordów z bazy danych
        App::getSmarty()->display('KlientList.tpl');
    }
// Widok samej tabeli wykorzystany by ajax tylko ja odswiezyl, rowniez wykorzystane przez stronnicowanie

    public function action_klientListPart() {
        $this->klientListLoad();
        App::getSmarty()->assign('searchForm', $this->form);
        App::getSmarty()->assign('klient', $this->records);
        App::getSmarty()->display('KlientListTable.tpl');
    }
    //Stronnicowanie
    public function action_klientPreviousPage()
    {
        $strona = ParamUtils::getFromGet('page', true, 'Error 01');
        $this->form->page = --$strona;
        $this->action_klientListPart();
    }

    public function action_klientTestPage()
    {
        $strona = ParamUtils::getFromGet('page', true, 'Error 04');
        $this->form->page = $strona;
        $this->action_klientListPart();

    }

    public function action_klientNextPage()
    {
        $strona = ParamUtils::getFromGet('page', true, 'Error 02');
        $this->form->page = ++$strona;
        $this->action_klientListPart();
    }
}
