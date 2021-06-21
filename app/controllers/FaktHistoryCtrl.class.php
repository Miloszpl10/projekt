<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use app\forms\FaktHistoryForm;

class FaktHistoryCtrl {

    private $form; //dane formularza wyszukiwania
    private $records; //rekordy pobrane z bazy danych
    private $limit = 2; //max ilosc rekordow do wyswietlenia z bazy

    public function __construct() {
        //stworzenie potrzebnych obiektów
        $this->form = new FaktHistoryForm();
    }

    public function validate() {
        // 1. sprawdzenie, czy parametry zostały przekazane
        // - nie trzeba sprawdzać

        $this->form->faktura_numer = ParamUtils::getFromRequest('sf_faktura');

        // 2. sprawdzenie poprawności przekazanych parametrów
        // - nie trzeba sprawdzać

        return !App::getMessages()->isError();
    }

    public function faktHistoryLoad() {
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
        if (isset($this->form->faktura_numer) && strlen($this->form->faktura_numer) > 0) {
            $search_params['faktura_numer[~]'] = $this->form->faktura_numer . '%'; // dodanie symbolu % zastępuje dowolny ciąg znaków na końcu
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
        $this->count = App::getDB()->count("faktura", [
            "id_fakt[<]" => 1000000
        ]);

        //dodanie frazy sortującej po nazwisku i limitu wyswietlanych danych
        $where ["ORDER"] = "faktura_numer";
        $where ["LIMIT"] = [$this->form->offset, $this->limit];
        //wykonanie zapytania ile zmiesci sie wierszy na stronie o okreslony wczesniej limit
        $this->form->last_page = ceil($this->count / $this->limit);


        //wykonanie zapytania do bazy
        try {
            $this->records = App::getDB()->select("faktura", [
                "id_fakt",
                "faktura_numer",
                "koszt",
                "termin_platnosci",
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
    public function action_faktHistory() {
        $this->faktHistoryLoad();
        App::getSmarty()->assign('searchForm', $this->form); // dane formularza (wyszukiwania w tym wypadku)
        App::getSmarty()->assign('fakt', $this->records);  // lista rekordów z bazy danych
        App::getSmarty()->display('FaktHistory.tpl');
    }

// Widok samej tabeli wykorzystany by ajax tylko ja odswiezyl, rowniez wykorzystane przez stronnicowanie
    public function action_faktHistoryPart() {
        $this->faktHistoryLoad();
        App::getSmarty()->assign('searchForm', $this->form);
        App::getSmarty()->assign('fakt', $this->records);
        App::getSmarty()->display('FaktHistoryTable.tpl');
    }

    //Stronnicowanie
    public function action_faktPreviousPage()
    {
        $strona = ParamUtils::getFromGet('page', true, 'Error 01');
        $this->form->page = --$strona;
        $this->action_faktHistoryPart();
    }

    public function action_faktTestPage()
    {
        $strona = ParamUtils::getFromGet('page', true, 'Error 04');
        $this->form->page = $strona;
        $this->action_faktHistoryPart();

    }

    public function action_faktNextPage()
    {
        $strona = ParamUtils::getFromGet('page', true, 'Error 02');
        $this->form->page = ++$strona;
        $this->action_faktHistoryPart();
    }
}
