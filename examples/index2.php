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
$router->get('/{filter}', 'Web:home');
$router->get('/contato', 'Web:contact');

/*
 * blog 
 */
$router->group("blog");
$router->get('/', 'Web:blog');
$router->get('/{post_uri}', 'Web:post');
$router->get('/{categoria}/{cat_uri}', 'Web:category');

/*
 * contato
 */
$router->group("contato");
$router->get('/', 'Web:contact');
$router->post('/', 'Web:contact');
$router->delete('/', 'Web:contact');
$router->get('/{sector}', 'Web:contact');

/*
 * ERROS
 */
$router->group("ooops");
$router->get("/{errcode}", "Web:error");

$router->dispatch();

if($router->error()){
    $router->redirect("/ooops/{$router->error()}");
}