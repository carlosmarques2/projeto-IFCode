<?php

use App\Models\Proprietario;
use App\Models\QRCode;
use App\Models\Aluno;
use App\Models\QRCodeDao;
use CoffeeCode\DataLayer\Connect;

use function PHPSTORM_META\type;

require __DIR__."/../vendor/autoload.php";
include __DIR__."/../App/functions/functions.php";

$prop = new Proprietario();

$prop->nome = "Fulano";
$prop->matricula = "20181TADS0050";

$prop->save();

dd($prop);

if (isset($prop->id))
    echo $prop->fail();
else
    echo $prop->fail();