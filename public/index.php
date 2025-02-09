<?php
require_once '../vendor/autoload.php';
require_once '../app/config/bootstrap.php';

use Core\Router;
use App\Controllers\HomeController;

$router = new Router();

// Routes simples
$router->get('', [HomeController::class, 'welcom']);
$router->get('about', [HomeController::class, 'about']);

// Route l home page
$router->get('home', function() {
    echo "Bienvenue sur la page d'accueil (via closure)";
});

// Handle current request
$router->dispatch($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
