<?php
namespace App\controller;

include_once __DIR__ . "/../../vendor/autoload.php";

use App\model\User;
use App\core\Security;
use App\core\Validation;

class AuthClass {

    public function showLoginForm() {
        view('login');
    }
    public function showRegisterForm() {
        view('register');
    }
    public function register() {
        $input = [
            'name' => Security::sanitize($_POST['name']),
            'email' => Security::sanitize($_POST['email']),
            'password' => Security::sanitize($_POST['password']),
            'password_confirmation' => Security::sanitize($_POST['password_confirmation']),
        ];

        $validation = new Validation();
        $validation->required('name', $input['name']);
        $validation->email('email', $input['email']);
        $validation->required('password', $input['password']);
        $validation->minLength('password', $input['password'], 6);
        $validation->required('password_confirmation', $input['password_confirmation']);
        $validation->match('password', $input['password'], $input['password_confirmation']);

        if ($validation->passes()) {
            $user = new User();
            $user->name = $input['name'];
            $user->email = $input['email'];
            $user->password = password_hash($input['password'], PASSWORD_BCRYPT);
            $user->save();

            view('login');
        } else {
            view('register', ['errors' => $validation->getErrors()]);
           
        }
    }

    public function login() {
        $email = Security::sanitize($_POST['email']);
        $password = Security::sanitize($_POST['password']);

        $user = User::where('email', $email)->first();

        if ($user && password_verify($password, $user->password)) {
            $_SESSION['user_id'] = $user->id;
            header('Location: /dashboard');
            exit();
        } else {
            view('login', ['error' => 'Invalid email or password.']);
        }
    }

    public function logout() {
        unset($_SESSION['user_id']);
        header('Location: /login');
        exit();
    }
}