<?php

$uri = $_SERVER['REQUEST_URI'];

$routes = [
    '/' => 'controllers/index.php',
    '/about' => 'controllers/about.php',
    '/contact' => 'controllers/contact.php',
];

//redirect to 404 page
function abort($code = 404)
{
    http_response_code(404);
    require 'views/404.php';
}

//redirect to controllers
function UriToController($uri, $routes)
{
    if (array_key_exists($uri, $routes)) {
        require $routes[$uri];
    } else {
        abort();
    }
}

UriToController($uri, $routes);