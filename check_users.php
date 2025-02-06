<?php

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/app/config/bootstrap.php';

use App\Models\Users;

try {
    $users = Users::all();
    
    echo "Liste des utilisateurs:\n";
    echo "----------------------\n";
    
    foreach ($users as $user) {
        echo "ID: " . $user->id . "\n";
        echo "Nom: " . $user->getName() . "\n";
        echo "Email: " . $user->getEmail() . "\n";
        echo "----------------------\n";
    }
    
    echo "\nTotal utilisateurs: " . Users::count() . "\n";
    
} catch (\Exception $e) {
    echo "❌ Error: " . $e->getMessage() . "\n";
}
