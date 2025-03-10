<?php

define('ROOT_PATH', dirname(__DIR__));
//load router and configuration
require_once(ROOT_PATH.'/core/Router.php');
require_once(ROOT_PATH.'/config/routes.php');

//initialize router
$router = new Router();