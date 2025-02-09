<?php
namespace App\controller ;
include_once __DIR__ . "/../../vendor/autoload.php" ;

use App\model\User;

class HomeController{

    public function index(){
        $users = User::all();
       
      
        view('login'  , ['users' => $users]);

    }
}