<?php

require_once "vendor/autoload.php";

// $corsa = new Veiculo();

// $corsa->setId(12);
// $corsa->setPlaca("ABC-1234");
// $corsa->setModelo("Corsa");
// $corsa->setCor("Prata");

// echo $corsa->getId()." ".$corsa->getPlaca();

$pessoa = new Aluno();
// $qrcode = new QRCode();


$pessoa->setId(4321);
$pessoa->getQrCode()->setCodigoDecriptado("www.google.com.br");

echo var_dump(date("Y-m-d H:i:s"));

// $pessoa->setQrCode($qrcode);

// $index = count($pessoa->getVeiculo());

// $pessoa->getVeiculo()[(integer)$index-1]->setId(1);
// $pessoa->getVeiculo()[(integer)$index-1]->setModelo("Corsa");

// echo $pessoa->getVeiculo()[(integer)$index-1]->getId();


echo '<br><br>';
// echo var_dump($pessoa->getQrCode());

// $veiculo1 = new Veiculo();
// $veiculo2 = new Veiculo();

// $veiculo1->setModelo("Corsa");
// $veiculo1->setId("1");
// $veiculo2->setModelo("Palio");
// $veiculo2->setId("2");

// $pessoa->setVeiculo($veiculo1);
// $pessoa->setVeiculo($veiculo2);

// echo gettype($pessoa->getVeiculo());

// foreach($pessoa->getVeiculo() as $veiculo){
//     echo $veiculo->getId().'<br>';
//     echo $veiculo->getModelo().'<br><br>';
// }

// if($pessoa->getVeiculo() instanceof Veiculo) {
//     echo "É Veiculo!<br>";
// } else {
//     throw new Exception('getVeiculo() não é Veiculo');
// }
