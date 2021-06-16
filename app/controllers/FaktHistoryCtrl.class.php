<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use app\forms\FaktHistoryForm;

class FaktHistoryCtrl {

    private $form; //dane formularza wyszukiwania
    private $records; //rekordy pobrane z bazy danych

    public function __construct() {
        //stworzenie potrzebnych obiektów
        $this->form = new FaktHistoryForm();
    }

    public function validate() {
        // 1. sprawdzenie, czy parametry zostały przekazane
        $this->form->faktura_numer = ParamUtils::getFromRequest('sf_faktura');

        // 2. sprawdzenie poprawności przekazanych parametrów

        return !App::getMessages()->isError();
    }

    public function faktHistoryLoad() {
        // 1. Walidacja danych formularza (z pobraniem)

        $this->validate();

        // 2. Przygotowanie mapy z parametrami wyszukiwania (nazwa_kolumny => wartość)
        $search_params = []; //przygotowanie pustej struktury (aby była dostępna nawet gdy nie będzie zawierała wierszy)
        if (isset($this->form->faktura_numer) && strlen($this->form->faktura_numer) > 0) {
            $search_params['faktura_numer[~]'] = $this->form->faktura_numer . '%'; // dodanie symbolu % zastępuje dowolny ciąg znaków na końcu
        }

        // 3. Pobranie listy rekordów z bazy danych

        $num_params = sizeof($search_params);
        if ($num_params > 1) {
            $where = ["AND" => &$search_params];
        } else {
            $where = &$search_params;
        }
        //dodanie frazy sortującej po nazwisku
        $where ["ORDER"] = "faktura_numer";
        //wykonanie zapytania

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
    }

        // 4. wygeneruj widok
    public function action_FaktHistory() {
        $this->FaktHistoryLoad();
        App::getSmarty()->assign('searchForm', $this->form); // dane formularza (wyszukiwania w tym wypadku)
        App::getSmarty()->assign('fakt', $this->records);  // lista rekordów z bazy danych
        App::getSmarty()->display('FaktHistory.tpl');
    }

    public function action_FaktHistoryPart() {
        $this->FaktHistoryLoad();
        App::getSmarty()->assign('searchForm', $this->form);
        App::getSmarty()->assign('fakt', $this->records);
        App::getSmarty()->display('FaktHistoryTable.tpl');
    }
}
