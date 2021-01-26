<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use core\Validator;
use app\forms\FaktEditForm;

class FaktEditCtrl {

    private $form; //dane formularza

    public function __construct() {
        //stworzenie potrzebnych obiektów
        $this->form = new FaktEditForm();
    }

    // Walidacja danych przed zapisem (nowe dane lub edycja).
    public function validateSave() {
        //0. Pobranie parametrów z walidacją
        $this->form->faktura_numer = ParamUtils::getFromRequest('faktura_numer', true, 'Błędne wywołanie aplikacji 2');
        $this->form->koszt = ParamUtils::getFromRequest('koszt', true, 'Błędne wywołanie aplikacji 3');
        $this->form->termin_platnosci = ParamUtils::getFromRequest('termin_platnosci', true, 'Błędne wywołanie aplikacji 3');

        if (App::getMessages()->isError())
            return false;

        // 1. sprawdzenie czy wartości wymagane nie są puste
        if (empty(trim($this->form->faktura_numer))) {
            Utils::addErrorMessage('Wprowadź wprowadz numer faktury');
        }
        if (empty(trim($this->form->koszt))) {
            Utils::addErrorMessage('Wprowadź koszt');
        }
        if (empty(trim($this->form->termin_platnosci))) {
            Utils::addErrorMessage('Wprowadź termin platnosci');
        }

        if (App::getMessages()->isError())
            return false;

        $d = \DateTime::createFromFormat('Y-m-d', $this->form->termin_platnosci);
        if ($d === false) {
            Utils::addErrorMessage('Zły format daty. Przykład: 2015-12-20');
        }

        return !App::getMessages()->isError();
    }

    //validacja danych przed wyswietleniem do edycji
    public function validateEdit() {
        //pobierz parametry na potrzeby wyswietlenia danych do edycji
        //z widoku listy osób (parametr jest wymagany)
        $this->form->id_fakt = ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji5');
        return !App::getMessages()->isError();
    }

    public function action_faktNew() {
        $this->generateView();
    }

    //wysiweltenie rekordu do edycji wskazanego parametrem 'id'
    public function action_faktEdit() {
        // 1. walidacja id osoby do edycji
        if ($this->validateEdit()) {
            try {
                // 2. odczyt z bazy danych osoby o podanym ID (tylko jednego rekordu)
                $record = App::getDB()->get("faktura", "*", [
                    "id_fakt" => $this->form->id_fakt
                ]);
                // 2.1 jeśli osoba istnieje to wpisz dane do obiektu formularza
                $this->form->id_fakt = $record['id_fakt'];
                $this->form->faktura_numer = $record['faktura_numer'];
                $this->form->koszt = $record['koszt'];
                $this->form->termin_platnosci = $record['termin_platnosci'];
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas odczytu rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
        }

        // 3. Wygenerowanie widoku
        $this->generateView();
    }

    public function action_faktDelete() {
        // 1. walidacja id osoby do usuniecia
        if ($this->validateEdit()) {

            try {
                // 2. usunięcie rekordu
                App::getDB()->delete("faktura", [
                    "id_fakt" => $this->form->id_fakt
                ]);
                Utils::addInfoMessage('Pomyślnie usunięto rekord');
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas usuwania rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
        }

        // 3. Przekierowanie na stronę listy osób
        App::getRouter()->forwardTo('faktHistory');
    }

    public function action_faktSave() {

        // 1. Walidacja danych formularza (z pobraniem)
        if ($this->validateSave()) {
            // 2. Zapis danych w bazie
            try {

                //2.1 Nowy rekord
                if ($this->form->id_fakt == '') {
                    //sprawdź liczebność rekordów - nie pozwalaj przekroczyć 20
                    $count = App::getDB()->count("faktura");
                    if ($count <= 20) {
                        App::getDB()->insert("faktura", [
                            "faktura_numer" => $this->form->faktura_numer,
                            "koszt" => $this->form->koszt,
                            "termin_platnosci" => $this->form->termin_platnosci
                        ]);
                    } else { //za dużo rekordów
                        // Gdy za dużo rekordów to pozostań na stronie
                        Utils::addInfoMessage('Ograniczenie: Zbyt dużo rekordów. Aby dodać nowy usuń wybrany wpis.');
                        $this->generateView(); //pozostań na stronie edycji
                        exit(); //zakończ przetwarzanie, aby nie dodać wiadomości o pomyślnym zapisie danych
                    }
                } else {
                    //2.2 Edycja rekordu o danym ID
                    App::getDB()->update("faktura", [
                        "faktura_numer" => $this->form->faktura_numer,
                        "koszt" => $this->form->koszt,
                        "termin_platnosci" => $this->form->termin_platnosci
                            ], [
                        "id_fakt" => $this->form->id_fakt
                    ]);
                }
                Utils::addInfoMessage('Pomyślnie zapisano rekord');
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił nieoczekiwany błąd podczas zapisu rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }

            // 3b. Po zapisie przejdź na stronę listy osób (w ramach tego samego żądania http)
            App::getRouter()->forwardTo('faktHistory');
        } else {
            // 3c. Gdy błąd walidacji to pozostań na stronie
            $this->generateView();
        }
    }

    public function generateView() {
        App::getSmarty()->assign('form', $this->form); // dane formularza dla widoku
        App::getSmarty()->display('FaktEdit.tpl');
    }

}