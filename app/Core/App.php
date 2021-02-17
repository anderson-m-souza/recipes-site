<?php

namespace Recipes\App\Core;

class App
{
    public function start($urlGet)
    {  
        if (isset($urlGet['page'])) {
            $pageName = $urlGet['page'];
        } else {
            $pageName = 'home';
        }
        
        $controllerNamespace = 'Recipes\\App\\Controller\\';
        $controller = $controllerNamespace . ucfirst($pageName) . 'Controller';
        
        if (!class_exists($controller)) {
            $controller = $controllerNamespace . 'ErrorController';
            $pageName = 'error';
        }
        
        if (isset($urlGet['method'])) {
            $action = $urlGet['method'];
        } else {
            $action = 'index';
        }

        $method = array($controller, $action);
        
        $parameters = array();
        $parameters['page'] = $pageName;
        
        call_user_func($method, $parameters);
    }
}