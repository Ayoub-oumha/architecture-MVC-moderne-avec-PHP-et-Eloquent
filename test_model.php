<?php

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/app/bootstrap.php/bootstrap.php';

use App\Models\Users as User;
use Illuminate\Database\Capsule\Manager as Capsule;

try {
    // Create users table if it doesn't exist
    if (!Capsule::schema()->hasTable('users')) {
        Capsule::schema()->create('users', function ($table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamps();
        });
        echo "✅ Table users créée b najah!\n";
    }

    // Test insertion d'un nouvel utilisateur
    $user = new User();
    $user->setName('Ahmed Test')
         ->setEmail('ahmed@test.com')
         ->setPassword(password_hash('password123', PASSWORD_DEFAULT));
    $user->save();

    echo "✅ Utilisateur créé b najah!\n";

    // Jib l'utilisateur li zedna w affichi les informations dyalo
    $savedUser = User::find($user->id);
    echo "\nM3lomat l'utilisateur:\n";
    echo "ID: " . $savedUser->id . "\n";
    echo "Name: " . $savedUser->getName() . "\n";
    echo "Email: " . $savedUser->getEmail() . "\n";

    // Affichi 3adad les utilisateurs li kaynin
    $totalUsers = User::count();
    echo "\nMajmo3 l'utilisateurs: " . $totalUsers . "\n";

} catch (\Exception $e) {
    echo "❌ Error: " . $e->getMessage() . "\n";
}
