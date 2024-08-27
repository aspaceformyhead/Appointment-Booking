<?php   
require_once "app/controller.php";

$requestURL=$_SERVER['REQUEST_URI'];
$base = '/beauty-parlour-management-system/serenity';
$requestURI = str_replace($base, '', $requestURL);

// If $requestURI is empty (e.g., when accessing the base URL), set it to '/'
$requestURI = $requestURI ?: '/';
//echo $requestURI;

$routes=[
    '/'=> 'Controller@homepg',
    '/about'=>'Controller@aboutUs',
    '/admin'=>'Controller@admin',
    '/form'=> 'Controller@form',
    '/appointment'=> 'Controller@appointment.php',
    '/products'=> 'Controller@productsPg',
    '/moreProducts'=> 'Controller@moreProdpg',
];


$controllerMethod = $routes[$requestURI] ?? null;

try {

if ($controllerMethod !== null) {
    list($controllerName, $methodName) = explode('@', $controllerMethod);

    spl_autoload_register(function ($class) {
        include 'app/controller.php';
    });

    // Check if the class and method exist
    if (class_exists($controllerName) && method_exists($controllerName, $methodName)) {
        $controller = new $controllerName();
        $controller->$methodName();
    } else {
        $controller = new Controller();
        echo'NOT FOUND 1';}
} else {
    $controller = new Controller();
    echo'NOT FOUND 2';


}

} catch (Exception $e) {
    $controller = new Controller();
    echo'NOT FOUND 3';

}

