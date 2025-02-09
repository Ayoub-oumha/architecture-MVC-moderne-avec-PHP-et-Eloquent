<?php 
// namespace App\core ;



require_once __DIR__ . "/../../vendor/autoload.php" ;




class Router {
    protected $controller = "HomeController" ;
    protected $action = "index" ;
    protected $params = [] ;
    public function __construct()
    {
       
        
        $this->prepareURL();
        $this->render();
    
       

    
    }
    private function prepareURL(){
        $uri =  $_SERVER["REQUEST_URI"]  ;
        $uri = trim($uri , "/") ;
        $uri = explode("/" , $uri) ;

        $this->controller = isset($uri[0]) && !empty($uri[0]) ? ucwords($uri[0]) . "Controller"  : $this->controller ;
        $this->action = isset($uri[1]) && !empty($uri[1]) ? $uri[1] : $this->action  ;
        
        // $this->action = $uri[1];
        echo "<br>" ;
        echo   $this->controller ; 
        echo "<br>" ;
        echo   $this->action; 
        $params  = $uri ;
        unset($params[0] , $params[1]) ;
        echo "<br>" ;
        var_dump($params) ;
        $this->params = !empty($params) ? array_values($params) : [];
        echo "<br>" ;
        var_dump($this->params) ;
        echo "<br>" ;
    
    }
    private function render(){
        $controller = 'App\\Controller\\' . $this->controller ;
         if(class_exists($controller)){
            if(method_exists($controller , $this->action)){

                // $controllerInstance = new $controller();

                // // Call the method dynamically
                // $controllerInstance->{$this->action}();

                $controllerInstance = new $controller();

               
                call_user_func_array([$controllerInstance, $this->action], $this->params);

            }
            else echo 'la walo' ;
         }
         else {
            echo  $this->controller . " la makaynch" ;
         }
    }

}