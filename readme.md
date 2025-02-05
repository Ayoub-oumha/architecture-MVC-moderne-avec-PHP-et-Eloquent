Développement d'une architecture MVC moderne avec PHP et Eloquent
📅 Contexte du Projet
Dans le cadre du développement d'applications web modernes, une architecture MVC (Modèle-Vue-Contrôleur) bien structurée est essentielle pour assurer une séparation claire des responsabilités, une meilleure maintenabilité et une extensibilité du code.

Ce projet vise à construire un framework PHP minimaliste, inspiré des meilleures pratiques, tout en restant léger, rapide et facile à utiliser. Il répondra aux besoins d'applications modernes avec des dépendances minimales, mais proposera des fonctionnalités puissantes telles que :

Gestion des routes,
Intégration avec Eloquent ORM,
Système de validation des données sécurisé.
💡 Objectifs du Projet
🔹 Développer une architecture MVC claire et modulaire.
🔹 Implémenter un routeur personnalisé pour gérer les URL de l'application.
🔹 Intégration sécurisée avec Eloquent ORM pour la gestion des bases de données.
🔹 Assurer la sécurisation des données contre les attaques XSS, CSRF et SQL Injection.
🔹 Offrir des outils pratiques : validation des données, système de sessions, gestion des erreurs.
🔹 Séparer fonctionnellement le Front Office et le Back Office.
🔹 Utiliser Composer pour l'autoloading des classes.
✅ Fonctionnalités Principales
Gestion avancée des routes.
Connexion à la base de données via Eloquent ORM.
Séparation entre Front Office et Back Office.
Système d’authentification sécurisé avec permissions utilisateurs.
Gestion des rôles et autorisations (ACL).
Protection contre SQL Injection, XSS, CSRF.
Classes pratiques : Validator, Security, Session.
Autoloading dynamique avec Composer.
🔍 Structure MVC Proposée
/projet-mvc-php
├── public/
│   ├─ index.php
│   ├─ .htaccess
│   └─ assets/
├── app/
│   ├─ controllers/
│   │   ├─ front/
│   │   └─ back/
│   ├─ models/
│   ├─ views/
│   └─ core/
│       ├─ Router.php
│       ├─ Controller.php
│       ├─ Model.php
│       ├─ View.php
│       ├─ Database.php
│       ├─ Auth.php
│       ├─ Validator.php
│       ├─ Security.php
│       └─ Session.php
┌── config/
│   ├─ config.php
│   └─ routes.php
├── logs/
├── vendor/
├── .env
├── composer.json
└── .gitignore
⚖️ Bonnes Pratiques à Suivre
1. Séparation stricte des responsabilités
Front Office : Partie publique accessible à tous.
Back Office : Réservé aux administrateurs authentifiés.
2. Sécurisation des données
Protection CSRF via des tokens sécurisés.
Validation des entrées utilisateurs avec Validator.php.
Protection contre les attaques XSS et SQL Injection avec Security.php.
3. Modularité
Utilisation de classes abstraites pour réutiliser le code.
Intégration facile avec d'autres bases de données.
4. Gestion avancée des sessions et authentification
Gestion des sessions avec Session.php.
Authentification utilisateur via Auth.php.
5. Autoloading avec Composer
Créez un fichier composer.json pour gérer les dépendances.
💡 Livrables
Déploiement : Projet fonctionnel accessible via une URL publique.
Planification sur JIRA : Suivi des tâches et avancement.
GitHub Repository : Avec un README détaillé.
📈 Présentation Finale
Temps : 10 minutes
Explication du code.
Réponse aux questions techniques.

# Eloquent ORM Integration

This project uses Eloquent ORM, the database toolkit from Laravel, for elegant and simple database interactions.

## Installation
 
1. Add Eloquent to your project via Composer:
```bash
composer require illuminate/database
```

2. Update your `composer.json` to include:
```json
{
    "require": {
        "illuminate/database": "^10.0"
    }
}
```

## Configuration

1. Create a database configuration file (e.g., `config/database.php`):
```php
return [
    'driver' => 'mysql',
    'host' => 'localhost',
    'database' => 'your_database',
    'username' => 'your_username',
    'password' => 'your_password',
    'charset' => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix' => '',
];
```

2. Initialize Eloquent in your application:
```php
use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;
$capsule->addConnection(require 'config/database.php');
$capsule->bootEloquent();
```

## Model Example

Create your models in the `app/Models` directory:

```php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = ['name', 'email'];
}
```

## Basic Usage

```php
// Create
$user = User::create([
    'name' => 'John Doe',
    'email' => 'john@example.com'
]);

// Read
$user = User::find(1);
$users = User::where('active', 1)->get();

// Update
$user = User::find(1);
$user->name = 'Jane Doe';
$user->save();

// Delete
$user = User::find(1);
$user->delete();
```

## Relationships

Example of defining relationships:

```php
class User extends Model
{
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}

class Post extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
```

For more detailed information, visit the [Eloquent documentation](https://laravel.com/docs/10.x/eloquent).