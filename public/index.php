<?php

use CoffeeCode\Router\Router;

require "../vendor/autoload.php";
include __DIR__.'/../App/functions/functions.php';

$router = new Router(ROOT);

/*
 * Controllers
 */
$router->namespace("App");

/*
 * WEB
 * home
 */
$router->group(null);
$router->get('/', 'Web:home');

/**
 * Cadastro
 */
$router->group('cadastro');
$router->get('/', 'Web:cadastro');

/**
 * Lista
 */
$router->group('lista');
$router->get('/', 'Web:lista');
$router->get('/{proprietario}', 'Web:lista');
$router->get('/veiculos', 'Web:listaVeiculos');
$router->get('/qrcodes', 'Web:listaQrcodes');

/**
 * Admin
 */
$router->group('painel');
$router->get('/', 'Web:painel');

/**
 * Configurações Admin
 */
$router->group('user');
$router->get('/', 'Web:userConfig');

/*
 * ERROS
 */
$router->group("ooops");
$router->get("/{errcode}", "Web:error");

/**
 * PROCESS
 */
$router->dispatch();

if($router->error()){
    $router->redirect("/ooops/{$router->error()}");
}