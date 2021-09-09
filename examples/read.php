<?php

use App\Models\AcessoDao;
use App\Models\Proprietario;
use App\Models\UsuarioDao;
use App\Models\Veiculo;

require __DIR__."/../vendor/autoload.php";
include __DIR__."/../App/functions/functions.php";

// use CoffeeCode\DataLayer\Connect;

// $conn = Connect::getInstance();

// $error = Connect::getError();

// if($error){
//     echo $error->getMessage();
//     die();
// }

// $query = $conn->query("SELECT * FROM usuarios");

// var_dump($query->fetchAll());

// $props = new ProprietarioDao();

// $list = $props->find()->fetch(true);

// /** @var $propItem ProprietarioDao */
// foreach($list as $propItem){
//     dd($propItem->data());
//     //var_dump($propItem->data());
//     foreach((array)$propItem->veiculos() as $veiculo){
//         dd($veiculo->data());
//         //var_dump($veiculo->data());
//     }
// }

$matricula = "20201TADS0000";
$placa = "ABC-2222";

$lista = new Veiculo();


//$matriculas = $lista->find("matricula = :matricula", "matricula={$matricula}", 'matricula')->fetch(true);

$placas = $lista->find("placa = :placa", "placa={$placa}", 'placa')->fetch(true);

dd($placas);

if(count((array)$placas))
    echo "Número de Matricula já cadastrado!";
else
    echo "Cadastro realizado!";
//echo count((array)$matriculas);

// foreach($matriculas as $mat){
//     echo $mat->matricula."<br>";
// }

// echo var_dump($list[0]->veiculos());

