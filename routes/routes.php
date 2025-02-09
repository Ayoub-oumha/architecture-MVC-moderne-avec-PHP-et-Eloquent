<?php
require_once __DIR__ . "/../vendor/autoload.php" ;
use App\core\Router;
use App\controller\AuthClass;
use App\controller\HomeController;

$router = new Router();

$router->get('login', [AuthClass::class, 'showLoginForm']);
$router->post('login', [AuthClass::class, 'login']);
$router->get('register', [AuthClass::class, 'showRegisterForm']);
$router->post('register', [AuthClass::class, 'register']);
$router->get('logout', [AuthClass::class, 'logout']);
$router->get('about', [HomeController::class, 'about']);
$router->get('contact', [HomeController::class, 'contact']);

// Dispatch the router
$router->dispatch();
?>