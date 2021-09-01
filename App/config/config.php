<?php 

define('ROOT', 'https://localhost/ifcode/public');

define('URL_IP', 'https://192.168.100.8/ifcode/public');

define('URL', URL_IP.'lista_prop.php?id=');

define('SITE', 'IFCode');

define('DIR_QRCODES', 'https://localhost/ifcode/public/assets/qrcodes');

/**
 * Códigos de Erro
 */
define('ER401', 'O acesso foi negado devido a credenciais inválidas.');
define('ER404', 'A página solicitada não pôde ser encontrada.');
define('ER405', 'Recurso não implementado.');
define('ER409', 'O servidor expirou aguardando o pedido.');

// define('UNSET_URI_COUNT', 1);
// define('DEBUG_URI', false);

define("DATA_LAYER_CONFIG", [
    "driver" => "mysql",
    "host" => "localhost",
    "port" => "3306",
    "dbname" => "qrcode",
    "username" => "root",
    "passwd" => "",
    "options" => [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_CASE => PDO::CASE_NATURAL
    ]
]);

function url($uri):string{
    if($uri){
        return ROOT . "/{$uri}";
    }

    return ROOT;
}