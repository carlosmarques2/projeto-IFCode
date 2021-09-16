<?php

use App\Models\Proprietario;
use App\Models\QRCode;
use App\Util\Util;
use SimpleSoftwareIO\QrCode\Generator;

require __DIR__."/../vendor/autoload.php";
include __DIR__."/../App/functions/functions.php";

// $prop = new Proprietario();

// $prop->nome = "Fulano";
// $prop->matricula = "20181TADS0050";

// $prop->save();

// dd($prop);

// if (isset($prop->id))
//     echo $prop->fail();
// else
//     echo $prop->fail();

// $qrcode = new Generator();
// $qrcode->margin(1);
// $qrcode->size(189);
// $qrcode->style("round");
// $qrcode->format('png');
// $qrcode->errorCorrection("Q");


// $qrcode->eyeColor(0, 53, 152, 48, 201,12,15);
// $qrcode->eyeColor(1, 53, 152, 48, 201,12,15);
// $qrcode->eyeColor(2, 53, 152, 48, 201,12,15);

// dd($qrcode);

//echo $qrcode->generate("www.google.com.br", __DIR__."../teste.png");

//$img = base64_encode($qrcode->size(189)->generate('https://www.google.com.br'));

//echo "<img src=\"data:image/png;base64, $img\">";

//(new Util())->getQrCode()->generate("www.google.com.br", __DIR__."/../public/qrcodes/teste.png");

// // $proprietario = (new Proprietario())->findById(165);

// // echo $proprietarios;
// // $qrcode = new QRCode();
// // $qrcode->id_prop = $proprietario->id;
// // $qrcode->nome_img_qr = 'qrcode-'.$proprietario->id;

// // geraQrCode($qrcode->id_prop, $qrcode->nome_img_qr);

// // (new Util())->getQrCode()->generate("https://bit.ly/3k8cAh2", DIR_QRCODES."\\".$qrcode->nome_img_qr.'.png');

// // echo dd(URL_QRCODE.'/'.$proprietario->id);

// $proprietarios = (new Proprietario())->find()->fetch(true);

// dd($proprietarios);

// foreach($proprietarios as $proprietario) {
//     (new QRCode())->add($proprietario, 'qrcode-'.$proprietario->id);
// }

// $filename = DIR_QRCODES."/qrcode-54.png";

// if (file_exists($filename)) {
//     echo "O arquivo $filename existe";
// } else {
//     echo "O arquivo $filename não existe";
// }

$proprietarios = (new Proprietario())->find()->fetch(true);

echo verificaQrCodes3($proprietarios);