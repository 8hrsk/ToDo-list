<?php

require_once './router.php'

$router = new Router();

$router->addRoute('/', 'GET', function () {
    echo require_once './main.php';
});

$router->addRoute('/register', 'POST', function ($data) {
    $data;
    echo require_once './api/register.php';
});

$router->addRoute('/login', 'POST', function ($data) {
    $data;
    echo require_once './api/login.php';
});

$requestUri = $_SERVER['REQUEST_URI'];
$requestMethod = $_SERVER['REQUEST_METHOD'];

$router->handleRequest($requestUri, $requestMethod);