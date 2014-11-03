<?php

require_once("vendor/autoload.php");

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


use Phroute\RouteCollector;
use Phroute\Dispatcher;
use mvc\Controller\IndexController;
use mvc\Controller\TestController;

$request = Request::createFromGlobals();

$loader = new Twig_Loader_Filesystem(__DIR__ . '/src/mvc/View');
$twig = new Twig_Environment($loader);
$indexController = new IndexController($twig);
$testController = new TestController($twig);
$router = new RouteCollector();

$router->get('/', [$indexController, 'indexAction']);
$router->get('/about', [$indexController, 'aboutAction']);
$router->get('/test', [$testController, 'indexAction']);
$router->get('/add', [$testController, 'addAction']);

$dispatcher = new Dispatcher($router);
$response = $dispatcher->dispatch($request->getMethod(), parse_url($request->getPathInfo(), PHP_URL_PATH));

$response->send();
