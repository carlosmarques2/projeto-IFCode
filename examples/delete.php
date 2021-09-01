<?php

use App\Models\QRCodeDao;

require __DIR__.'/../vendor/autoload.php';

include __DIR__.'/../App/functions/functions.php';

$qrcode = (new QRCodeDao())->findById(11);

if($qrcode){
    $qrcode->destroy();
} else {
    dd($qrcode);
}