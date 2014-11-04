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

echo '<hr /> <h2>Request</h2>';

$uri = $_SERVER['REQUEST_URI'];

echo 'The URI requested is: ' . $uri . '<br />';
echo 'Path info: ' . $request->getPathInfo() . '<br />';
echo 'Server info: ' . $request->server->get('HTTP_HOST') . '<br />';
echo 'SessID info: ' . $request->cookies->get('PHPSESSID') . '<br />';
echo 'Headers host info: ' . $request->headers->get('host') . '<br />';
echo 'Headers content-type info: ' . $request->headers->get('content_type') . '<br />';
echo 'Request method info: ' . $request->getMethod() .'<br />';

echo '<hr /> <h2>Response</h2>';

$testResponse = new Response();

$testResponse->setContent('<p>Test Response content</p>');
$testResponse->setStatusCode(Response::HTTP_OK);
$testResponse->headers->set('Content-Type', 'text/html');

$testResponse->send();