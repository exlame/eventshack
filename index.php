<?php
session_start();
require 'vendor/autoload.php';
require 'src/helpers/querys.php';
require 'src/helpers/views.php';
require 'src/helpers/init.php';

date_default_timezone_set('America/New_York');
setlocale(LC_TIME, "fr_FR");
set_session_default();
$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '/', 'home');
    // {id} must be a number (\d+)
    $r->addRoute('GET', '/tab/{name}', 'tab');
    // The /{title} suffix is optional
    $r->addRoute('POST', '/get/{component}', 'get');
    $r->addRoute('GET', '/get/{component}', 'get');
    $r->addRoute('GET', '/events', 'events');
    $r->addRoute('GET', '/favorite/{action}/{id}', 'favorite');
    $r->addRoute('GET', '/set_config/{key}/{value}', 'set_config');
});

// Fetch method and URI from somewhere
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

define('BASEPATH',__DIR__);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        http_response_code(404);
				die();
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        // ... 405 Method Not Allowed
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        require('src/views/'.$handler.'.php');
        break;
}