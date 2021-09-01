<?php

use App\Models\ProprietarioDao;
use App\Models\QRCode;
use App\Models\Aluno;
use App\Models\QRCodeDao;
use CoffeeCode\DataLayer\Connect;

require __DIR__."/../vendor/autoload.php";
include __DIR__."/../App/functions/functions.php";

$prop = new ProprietarioDao();

$prop = $prop->findById(1);

$propObj = new Aluno($prop);

//dd($propObj);

$qrcode = new QRCode();
$qrcode->setCodigoDecriptado(URL.$prop->id);
$qrcode->setProprietario($propObj);

// $qrCodeCrud = new QRCodeDao();

(new QRCodeDao())->add($qrcode)->save();