<?php

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/app/config/bootstrap.php';

use App\Models\Users as User;
use Illuminate\Database\Capsule\Manager as Capsule;

try {
$user = new User();
$user->setName("AYoub") ;
$user->setEmail("youb@laravel.com");
$user->setPassword("12345678");



$user->save();


} catch (\Exception $e) {
    echo " Error: " . $e->getMessage() . "\n";
}
