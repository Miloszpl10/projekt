<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use core\Validator;
use app\forms\CarEditForm;

class CarEditCtrl {

    private $form; //dane formularza

    public function __construct() {
        //stworzenie potrzebnych obiektów
        $this->form = new CarEditForm();
    }

    // Walidacja danych przed zapisem (nowe dane lub edycja).
    public function validateSave() {
        //0. Pobranie parametrów z walidacją
        $this->form->id_car = ParamUtils::getFromRequest('id_car', true, 'Błędne wywołanie aplikacji 1');
        $this->form->samochod_vim = ParamUtils::getFromRequest('samochod_vim', true, 'Błędne wywołanie aplikacji 1');
        $this->form->marka = ParamUtils::getFromRequest('marka', true, 'Błędne wywołanie aplikacji 2');
        $this->form->model = ParamUtils::getFromRequest('model', true, 'Błędne wywołanie aplikacji 3');
        $this->form->rok = ParamUtils::getFromRequest('rok', true, 'Błędne wywołanie aplikacji 4');
        $this->form->usterka = ParamUtils::getFromRequest('usterka', true, 'Błędne wywołanie aplikacji 4');

        if (App::getMessages()->isError())
            return false;

        // 1. sprawdzenie czy wartości wymagane nie są puste
        if (empty(trim($this->form->samochod_vim))) {
            Utils::addErrorMessage('Vim samochodu');
        }
        if (empty(trim($this->form->marka))) {
            Utils::addErrorMessage('Wprowadź marke');
        }
        if (empty(trim($this->form->model))) {
            Utils::addErrorMessage('Wprowadź model');
        }
        if (empty(trim($this->form->rok))) {
            Utils::addErrorMessage('Wprowadź rok');
        }
        if (empty(trim($this->form->usterka))) {
            Utils::addErrorMessage('Wprowadź usterke');
        }

        if (App::getMessages()->isError())
            return false;

        // 2. sprawdzenie poprawności przekazanych parametrów

        $d = \DateTime::createFromFormat('Y', $this->form->rok);
        if ($d === false) {
            Utils::addErrorMessage('Zły format daty. Przykład: 2015');
        }

        return !App::getMessages()->isError();
    }

    //validacja danych przed wyswietleniem do edycji
    public function validateEdit() {
        //pobierz parametry na potrzeby wyswietlenia danych do edycji
        //z widoku listy osób (parametr jest wymagany)
        $this->form->id_car = ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji5');
        return !App::getMessages()->isError();
    }

    public function action_carNew() {
        $this->generateView();
    }

    //wysiweltenie rekordu do edycji wskazanego parametrem 'id'
    public function action_carEdit() {
        // 1. walidacja id osoby do edycji
        if ($this->validateEdit()) {
            try {
                // 2. odczyt z bazy danych osoby o podanym ID (tylko jednego rekordu)
                $record = App::getDB()->get("samochod", "*", [
                    "id_car" => $this->form->id_car
                ]);
                // 2.1 jeśli osoba istnieje to wpisz dane do obiektu formularza
                $this->form->samochod_vim = $record['samochod_vim'];
                $this->form->marka = $record['marka'];
                $this->form->model = $record['model'];
                $this->form->rok = $record['rok'];
                $this->form->usterka = $record['usterka'];
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas odczytu rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
        }

        // 3. Wygenerowanie widoku
        $this->generateView();
    }

    public function action_carDelete() {
        // 1. walidacja id osoby do usuniecia
        if ($this->validateEdit()) {

            try {
                // 2. usunięcie rekordu
                App::getDB()->delete("samochod", [
                    "id_car" => $this->form->id_car
                ]);
                Utils::addInfoMessage('Pomyślnie usunięto rekord');
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas usuwania rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
        }

        // 3. Przekierowanie na stronę listy osób
        App::getRouter()->forwardTo('carList');
    }

    public function action_carSave() {

        // 1. Walidacja danych formularza (z pobraniem)
        if ($this->validateSave()) {
            // 2. Zapis danych w bazie
            try {

                //2.1 Nowy rekord
                if ($this->form->id_car == '') {
                    //sprawdź liczebność rekordów - nie pozwalaj przekroczyć 20
                    $count = App::getDB()->count("samochod");
                    if ($count <= 20) {
                        App::getDB()->insert("samochod", [
                            "samochod_vim" => $this->form->samochod_vim,
                            "marka" => $this->form->marka,
                            "model" => $this->form->model,
                            "rok" => $this->form->rok,
                            "usterka" => $this->form->usterka
                        ]);
                    } else { //za dużo rekordów
                        // Gdy za dużo rekordów to pozostań na stronie
                        Utils::addInfoMessage('Ograniczenie: Zbyt dużo rekordów. Aby dodać nowy usuń wybrany wpis.');
                        $this->generateView(); //pozostań na stronie edycji
                        exit(); //zakończ przetwarzanie, aby nie dodać wiadomości o pomyślnym zapisie danych
                    }
                } else {
                    //2.2 Edycja rekordu o danym ID
                    App::getDB()->update("samochod", [
                        "samochod_vim" => $this->form->samochod_vim,
                        "marka" => $this->form->marka,
                        "model" => $this->form->model,
                        "rok" => $this->form->rok,
                        "usterka" => $this->form->usterka
                            ], [
                        "id_car" => $this->form->id_car
                    ]);
                }
                Utils::addInfoMessage('Pomyślnie zapisano rekord');
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił nieoczekiwany błąd podczas zapisu rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }

            // 3b. Po zapisie przejdź na stronę listy osób (w ramach tego samego żądania http)
            App::getRouter()->forwardTo('carList');
        } else {
            // 3c. Gdy błąd walidacji to pozostań na stronie
            $this->generateView();
        }
    }

    public function generateView() {
        App::getSmarty()->assign('form', $this->form); // dane formularza dla widoku
        App::getSmarty()->display('CarEdit.tpl');
    }

}
