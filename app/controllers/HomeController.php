<?php

namespace App\Controllers;

use App\Core\Controller;

class HomeController extends Controller
{
    public function index()
    {
        echo " Home Controller!";
    }
    
    public function about()
    {
        echo "Page About: L'application dyalna kat utilisa MVC w Eloquent";
    }
    public function welcome()
    {
        // $this->view('welcome', ['title' => 'Welcome Page', 'message' => 'Hello, Framework!']);
    }

}
