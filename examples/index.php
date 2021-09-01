<?php

use CoffeeCode\Router\Router;

require "../vendor/autoload.php";
include __DIR__.'/../App/functions/functions.php';

$router = new Router(URL_BASE);

$router->group(null);
$router->get('/', function($data){
    echo '<h1>Teste</h1>';
    var_dump($data);
});

$router->group(null);
$router->get('/contato', function($data){
    echo '<h1>Contato</h1>';
    var_dump($data);
});

$router->group("ops");
$router->get("/{errcode}", function ($data){
    echo "<h1>Erro {$data['errcode']}</h1>";
    dd($data);
});

$router->dispatch();

if($router->error()){
    $router->redirect("/ops/{$router->error()}");
}