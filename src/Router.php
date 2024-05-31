<?php

namespace Src;

class Router
{
    protected $routes = [];

    public function addRoute($route, $controller, $action) {
        $this->routes[$route] = ['controller' => $controller, 'action' => $action];
    }

    /**
     * @param $uri
     * @return void
     */
    public function dispatch($uri) {
        $uri = $this->getRouteIndex($uri);
        if (array_key_exists($uri, $this->routes)) {
            $this->init($uri);
        } else {
            $uri_arr = explode('/', $uri);
            if(count($uri_arr) > 2 && preg_match('/\d+$/', $uri_arr[2])){
                $uri='/'.$uri_arr[1];
                $this->init($uri);
            }else{
                echo "The requested page is not available.";
                die;
            }
        }
    }

    /**
     * @param $uri
     * @return string
     */
    private function getRouteIndex($uri){
        $uri = trim($uri, '/');
        $uri = explode('/', $uri);
        unset($uri[0]);
        return '/'.implode('/', $uri);
    }

    /**
     * @param $uri
     * @return void
     */
    private function init($uri){
        if(array_key_exists($uri, $this->routes)){
            $controller = $this->routes[$uri]['controller'];
            $action = $this->routes[$uri]['action'];
            $controller = new $controller();
            $controller->$action();
        }else{
            echo "The requested page is not available.";
            die;
        }
    }
}