<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use app\forms\CarSearchForm;

class CarListCtrl {

    private $offset = 0;
    private $limit = 2; // limit wyszukiwania rekordów z baz
    private $page; //strona
    private $form; //dane formularza wyszukiwania
    private $records; //rekordy pobrane z bazy danych
    private $dramat = 0;

    public function __construct() {
        //stworzenie potrzebnych obiektów
        $this->form = new CarSearchForm();
        $this->page = 0;
    }

    public function validate() {
        // 1. sprawdzenie, czy parametry zostały przekazane
        // - nie trzeba sprawdzać
        $this->form->marka = ParamUtils::getFromRequest('sf_marka');

        // 2. sprawdzenie poprawności przekazanych parametrów
        // - nie trzeba sprawdzać

        return !App::getMessages()->isError();
    }

    public function carListLoad() {
        // 1. Walidacja danych formularza (z pobraniem)
        // - W tej aplikacji walidacja nie jest potrzebna, ponieważ nie wystąpią błedy podczas podawania nazwiska.
        //   Jednak pozostawiono ją, ponieważ gdyby uzytkownik wprowadzał np. datę, lub wartość numeryczną, to trzeba
        //   odpowiednio zareagować wyświetlając odpowiednią informację (poprzez obiekt wiadomości Messages)
        $this->validate();

        // 2. Przygotowanie mapy z parametrami wyszukiwania (nazwa_kolumny => wartość)
        $search_params = []; //przygotowanie pustej struktury (aby była dostępna nawet gdy nie będzie zawierała wierszy)
        if (isset($this->form->marka) && strlen($this->form->marka) > 0) {
            $search_params['marka[~]'] = $this->form->marka . '%'; // dodanie symbolu % zastępuje dowolny ciąg znaków na końcu
        }

        // 3. Pobranie listy rekordów z bazy danych
        // W tym wypadku zawsze wyświetlamy listę osób bez względu na to, czy dane wprowadzone w formularzu wyszukiwania są poprawne.
        // Dlatego pobranie nie jest uwarunkowane poprawnością walidacji
        //przygotowanie frazy where na wypadek większej liczby parametrów
        $num_params = sizeof($search_params);
        if ($num_params > 1) {
            $where = ["AND" => &$search_params];
        } else {
            $where = &$search_params;
        }

        //dodanie frazy sortującej po nazwisku i limitu wyswietlanych danych
       $where ["ORDER"] = "rok";
       $where ["LIMIT"] = [$this->offset,$this->limit];
        //wykonanie zapytania

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

        // Sprawdzenie liczby rekordow w bazie
        $count = App::getDB()->count("samochod", [
            "id_car[<]" => 1000000
        ]);

        $this->dramat = $this->dramat+$count;

//TUUUUUUUUUUUUUUUUUUUUUUUUUUUUUU
    $this->offset = $this->limit;
    $this->limit=$this->limit+2;

           $pages[0]['pageNumber'] = 1;
            for ($i = 1; $i <= ceil($this->dramat / $this->limit); $i++) { // todo ilosc rekordow/ limit na stronie
                $pages[$i]['pageNumber'] = $i + 1;
            }
        App::getSmarty()->assign("pages", $pages);

 }
// Tuuuuuuuuuuuuuuuuuuuuuuuuuuu



        // 4. wygeneruj widok
    public function action_carList() {
        $this->page = ParamUtils::getFromPost("pageNumber");
        $this->carListLoad(); // todo zweryfikowac caly proces -> 1. pobranie danych weryfykacja, czy nie sa puste 2. poberanie nowych danych 3. podmiana ich na stronie 4. odswiezenie ilosci stron.
        App::getSmarty()->assign('searchForm', $this->form); // dane formularza (wyszukiwania w tym wypadku)
        App::getSmarty()->assign('car', $this->records);  // lista rekordów z bazy danych
        App::getSmarty()->display('CarList.tpl');
    }

    public function action_carListPart() {
        $this->carListLoad();
        App::getSmarty()->assign('searchForm', $this->form);
        App::getSmarty()->assign('car', $this->records);
        App::getSmarty()->display('CarListTable.tpl');
    }

}