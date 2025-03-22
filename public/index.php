<?php

define('ROOT_PATH', dirname(__DIR__));
//load router and configuration
require_once(ROOT_PATH.'/core/Router.php');
// require_once(ROOT_PATH.'/config/routes.php');

//initialize router
$router = new Router();
require_once '../config/routes.php';

// var_dump($router);
//run router

// $router->add('/','HomeController@index');
$router->dispatch($_SERVER['REQUEST_URI']);
?>