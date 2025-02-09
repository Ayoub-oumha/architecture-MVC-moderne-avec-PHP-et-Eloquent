<?php 
namespace App\core ;
class Router{
   protected $routes = [] ;
   protected $params = [] ;
 
    public function get($uri, $callback) {
    $this->routes['GET'][$uri] = $callback;
   
    }
    public function post($uri, $callback) {
        $this->routes['POST'][$uri] = $callback;
    }
 
    public function dispatch() {
        // echo "hello" ;
        $uri = $this->prepareURL();
        $method = $_SERVER['REQUEST_METHOD'];
        try {
            if (isset($this->routes[$method][$uri])) {
                $callback = $this->routes[$method][$uri];
                if (is_array($callback)) {
                    $controller = $callback[0];
                    $action = $callback[1];
                    if (class_exists($controller)) {
                        $controllerInstance = new $controller();
                        if (method_exists($controllerInstance, $action)) {
                            call_user_func_array([$controllerInstance, $action], $this->params);
                        } else {
                            throw new \Exception("Method {$action} not found in controller {$controller}");
                        }
                    } else {
                        throw new \Exception("Controller {$controller} not found");
                    }
                } else {
                    call_user_func($callback);
                }
            } else {
                throw new \Exception("No route defined for URI: {$uri}");
            }
        } catch (\Exception $e) {
            $this->handleError($e);
        }
    }

    public function prepareURL() {
        $uri = $_SERVER["REQUEST_URI"];
        $uri = parse_url($uri, PHP_URL_PATH);
        $uri = trim($uri, "/");
        return $uri;
    }
    private function handleError($e) {
        http_response_code(404);
        include __DIR__ . "/../view/404.php";
        exit();
    }
}