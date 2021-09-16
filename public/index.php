<?php

session_start();

use CoffeeCode\Router\Router;

require "../vendor/autoload.php";
require "../App/functions/functions.php";

$router = new Router(ROOT);

/*
 * Controllers
 */
$router->namespace("App\Controllers");

/**
 * Home
 */
$router->group(null);
$router->get('/', 'Web:home', 'web.home');

/**
 * Cadastro
 */
$router->group('cadastro');
$router->get('/', 'Cadastro:home', 'cadastro.home');
$router->post('/', 'Cadastro:novo', 'cadastro.novo');
$router->post('/geraqrcode', 'Cadastro:geraQrCode', 'cadastro.geraqr');

/**
 * Lista
 */
$router->group('lista');
$router->get('/', 'Lista:home', 'lista.home');
$router->get('/{id}', 'Lista:proprietario', 'lista.proprietario');
$router->post('/verificaqrcode', 'Lista:verificaQrCodes', 'lista.verificaqr');
$router->get('/veiculos', 'Web:listaVeiculos', 'lista.veiculos');
$router->get('/qrcodes', 'Web:listaQrcodes', 'lista.qrcodes');
// $router->post('/', 'Lista:editar', 'lista.editar');

/**
 * Proprietario
 */
$router->group('proprietario');
$router->get('/{id}', 'Lista:viewByQrCode');

/**
 * Admin
 */
$router->group('painel');
$router->get('/', 'Painel:home');

/**
 * Configurações Admin
 */
$router->group('user');
$router->get('/', 'Web:userConfig');

/**
 * PROCESS
 */
$router->dispatch();

if($router->error()){
    var_dump($router->error());
}