<?php

namespace App\Controllers;

use League\Plates\Engine;

require __DIR__."../../../vendor/autoload.php";

class WebProrietario {
    private $view;

    public function __construct(){
        $this->view = new Engine(__DIR__."../../Views", "php");
    }
}