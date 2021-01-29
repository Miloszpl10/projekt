<?php

use core\App;
use core\Utils;

App::getRouter()->setDefaultRoute('notFound'); #default action
//App::getRouter()->setLoginRoute('login'); #action to forward if no permissions

Utils::addRoute('notFound', 'NotFoundCtrl');
//Utils::addRoute('action_name', 'controller_class_name');




Utils::addRoute('loginShow',     'LoginCtrl');
Utils::addRoute('login',         'LoginCtrl');
Utils::addRoute('logout',        'LoginCtrl');


//Wlasciciel dostep do faktury i uzupelniania
Utils::addRoute('faktHistory',   'FaktHistoryCtrl',	    ['wlasciciel']);
Utils::addRoute('faktEdit',      'FaktEditCtrl', 	    ['wlasciciel']);
Utils::addRoute('faktDelete',    'FaktEditCtrl', 	    ['wlasciciel']);
Utils::addRoute('faktSave',      'FaktEditCtrl', 	    ['wlasciciel']);
Utils::addRoute('faktNew',       'FaktEditCtrl', 	    ['wlasciciel']);

//Dostep oraz wporwadzanie danych klient
Utils::addRoute('klientNew',     'KlientEditCtrl',   	['mechanik','wlasciciel']);
Utils::addRoute('klientDelete',  'KlientEditCtrl',  	['mechanik','wlasciciel']);
Utils::addRoute('klientEdit',    'KlientEditCtrl',  	['mechanik','wlasciciel']);
Utils::addRoute('klientSave',    'KlientEditCtrl',  	['mechanik','wlasciciel']);

//Dostep oraz wporwadzanie danych samochod
Utils::addRoute('carNew', 	     'CarEditCtrl',        	['mechanik','wlasciciel']);
Utils::addRoute('carDelete',     'CarEditCtrl',       	['mechanik','wlasciciel']);
Utils::addRoute('carEdit',       'CarEditCtrl',         ['mechanik','wlasciciel']);
Utils::addRoute('carSave',       'CarEditCtrl',       	['mechanik','wlasciciel']);

//Wyswietlenie listy klientow i samochodow
Utils::addRoute('klientList',   'KlientListCtrl',       ['mechanik','wlasciciel']);
Utils::addRoute('carList',      'CarListCtrl',          ['mechanik','wlasciciel']);

