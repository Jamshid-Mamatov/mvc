<?php

$router->add('/', 'HomeController@index');
$router->add('/about', 'HomeController@about');
$router->add('/users/:id', 'UserController@show');
