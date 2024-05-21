<?php
// router.php

// grabbing path
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
// jd($_SERVER);

// declare app folder (check .htaccess)
$app = '/pizzeria/';
$index = $app . 'index.php';

// declare routes
$routes = [
    $app => 'controllers/index.php',
    $index => 'controllers/index.php',
    $app . 'logout.php' => 'controllers/logout.php',
    $app . 'login.php' => 'controllers/login.php',
    $app . 'adminpage.php' => 'controllers/adminpage.php',
    $app . 'bestellingsoverzicht.php' => 'controllers/bestellingsoverzicht.php',
    $app . 'noaccess.php' => 'controllers/noaccess.php'
];

routeToController($uri, $routes);

// check for request among routes
function routeToController($uri, $routes)
{
    if (array_key_exists($uri, $routes)) {
        // require corresponding controller
        require $routes[$uri];
    } else {
        // abort
        abort(404);
    }
}

function abort($code = 404)
{
    http_response_code($code);

    include 'presentation/404.php';

    die();
}