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
        $this->form->marka = ParamUtils::getFromRequest('sf_marka');

        // 2. sprawdzenie poprawności przekazanych parametrów

        return !App::getMessages()->isError();
    }

    public function action_faktHistory() {
        // 1. Walidacja danych formularza (z pobraniem)

        $this->validate();

        // 2. Przygotowanie mapy z parametrami wyszukiwania (nazwa_kolumny => wartość)
        $search_params = []; //przygotowanie pustej struktury (aby była dostępna nawet gdy nie będzie zawierała wierszy)
        if (isset($this->form->marka) && strlen($this->form->marka) > 0) {
            $search_params['marka[~]'] = $this->form->marka . '%'; // dodanie symbolu % zastępuje dowolny ciąg znaków na końcu
        }

        // 3. Pobranie listy rekordów z bazy danych

        $num_params = sizeof($search_params);
        if ($num_params > 1) {
            $where = ["AND" => &$search_params];
        } else {
            $where = &$search_params;
        }
        //dodanie frazy sortującej po nazwisku
        $where ["ORDER"] = "marka";
        //wykonanie zapytania

        try {
            $this->records = App::getDB()->select("samochod", [
                "samochod_vim",
                "marka",
                "model",
                "rok",
                    ], $where);
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }

        // 4. wygeneruj widok
        App::getSmarty()->assign('searchForm', $this->form); // dane formularza (wyszukiwania w tym wypadku)
        App::getSmarty()->assign('people', $this->records);  // lista rekordów z bazy danych
        App::getSmarty()->display('FaktHistory.tpl');
    }

}
