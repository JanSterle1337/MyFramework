<?php
require_once 'vendor/autoload.php';
require './classes/Route.php';
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$request = Request::createFromGlobals();
$path = $request->getPathInfo();
echo "<pre>";
var_dump($path);
echo "</pre>"; 


/*
function getPath() {
    $path = $_SERVER['REQUEST_URI'] ?? '/';
    $position = strpos($path, '?');
    if ($position === false) {
        return $path;
    } 

    return $path = substr($path,0,$position);

}

$path = getPath();
echo "My path: " . $path . "</br>";
*/

$router = new Route();
$router->set($path,'funkcija');


if (in_array($path, ['', '/'])) {
    $response = new Response('Welcome to the homepage.');
} elseif ('/contact' === $path) {
    $response = new Response('Contact us');
} else {
    $response = new Response('Page not found.', Response::HTTP_NOT_FOUND);
}
$response->send();









/*$request = Request::createFromGlobals();
/*echo "<pre>";
var_dump($request);
echo "</pre>"; */
/*echo "</br>";
$path = $request->getPathInfo();
echo $path;


if (in_array($path, ['','/'])) {
    $response = new Response('Welcome to the homepage');
    echo $response;
} else if ('/contact' === $path) {
    $response = new Response('Contact us');
    echo $response;
} else {
    $response = new Response('Page not found', RESPONSE::HTTP_NOT_FOUND);
    echo $response;
}
/*$response->send(); */