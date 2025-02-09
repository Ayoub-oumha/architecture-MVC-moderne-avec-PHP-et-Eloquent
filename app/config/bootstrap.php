<?php
namespace App\config;

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../core/helpers.php';

use Illuminate\Database\Capsule\Manager as Capsule;
use Dotenv\Dotenv;


$dotenv = Dotenv::createImmutable(__DIR__ . '/../..');
$dotenv->load();

// Create a new Capsule instance
$capsule = new Capsule;

// Configure the database connection
$capsule->addConnection([
    'driver'    => $_ENV['DB_DRIVER'],
    'host'      => $_ENV['DB_HOST'],
    'database'  => $_ENV['DB_DATABASE'],
    'username'  => $_ENV['DB_USERNAME'],
    'password'  => $_ENV['DB_PASSWORD'],
    'charset'   => $_ENV['DB_CHARSET'],
    'collation' => $_ENV['DB_COLLATION'],
    'prefix'    => $_ENV['DB_PREFIX'],
]);

// Make this Capsule instance available globally
$capsule->setAsGlobal();

// Setup the Eloquent ORM
$capsule->bootEloquent();