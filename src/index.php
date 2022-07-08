<?php
require_once '../vendor/autoload.php';
require '../classes/Route.php';
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
$templates = new League\Plates\Engine(__DIR__ . '/views');

$request = Request::createFromGlobals();
$path = $request->getPathInfo();

$router = new Route();
$router->set($path,'funkcija');

if (in_array($path, ['', '/'])) {
    $response = new Response($templates->render('Home'));
} elseif ('/contact' === $path) {
    $response = new Response($templates->render('Contact'));
} else {
    $response = new Response('Page not found.', Response::HTTP_NOT_FOUND);
}

$response->send();