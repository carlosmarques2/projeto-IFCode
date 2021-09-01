<?php

use App\Models\ProprietarioDao;
use App\Models\QRCodeDao;

require __DIR__.'/../vendor/autoload.php';

include __DIR__.'/../App/functions/functions.php';

$prop = (new ProprietarioDao())->findById(1);

$qrcode = (new QRCodeDao())->findById(11);

dd($qrcode);