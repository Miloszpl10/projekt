<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;


class NotFoundCtrl {

    public function action_notFound() {

        App::getSmarty()->display("NotFound.tpl");

    }

}
