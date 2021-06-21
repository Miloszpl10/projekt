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
    private $limit = 2;

    public function __construct()
    {
        $this->form = new CarSearchForm();
    }

    public function validate()
    {

        $this->form->marka = ParamUtils::getFromRequest('sf_marka');

        return !App::getMessages()->isError();
    }


    public function carListLoad()
    {

        $this->validate();

        if ($this->form->page > 1) {
            $this->form->offset = 2 * ($this->form->page - 1);
        } else {
            $this->form->offset = 0;
            $this->form->page = 1;
        }

        $search_params = [];
        if (isset($this->form->marka) && strlen($this->form->marka) > 0) {
            $search_params['marka[~]'] = $this->form->marka . '%';
        }


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
        //wykonanie zapytania
        $this->form->last_page = ceil($this->count / $this->limit);

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

    public function action_carListPart()
    {
        $this->carListLoad();
        App::getSmarty()->assign('searchForm', $this->form);
        App::getSmarty()->assign('car', $this->records);
        App::getSmarty()->display('CarListTable.tpl');
    }


//potrzebne akcje do paginacji
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