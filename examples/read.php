<?php

use App\Models\AcessoDao;
use App\Models\ProprietarioDao;
use App\Models\UsuarioDao;

require __DIR__."/../vendor/autoload.php";

// use CoffeeCode\DataLayer\Connect;

// $conn = Connect::getInstance();

// $error = Connect::getError();

// if($error){
//     echo $error->getMessage();
//     die();
// }

// $query = $conn->query("SELECT * FROM usuarios");

// var_dump($query->fetchAll());

$props = new ProprietarioDao();

$list = $props->find()->fetch(true);

// /** @var $propItem ProprietarioDao */
// foreach($list as $propItem){
//     var_dump($propItem->data());
//     foreach((array)$propItem->veiculos() as $veiculo){
//         var_dump($veiculo->data());
//     }
// }



echo var_dump($list[0]->veiculos());