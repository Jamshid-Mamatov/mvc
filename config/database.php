<?php
return [
    'host' => 'localhost',
    'database' => 'myframework',
    'username' => 'root',
    'password' => 'jama0777!',
    'charset' => 'utf8mb4',
    'options' => [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ]
];