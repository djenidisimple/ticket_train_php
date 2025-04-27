<?php
class Router
{
    public static function route($url)
    {
        $url = trim($url, '/');
        $url = explode('/', $url);

        if (empty($url[0]) || $url[0] == "Ticket" && count($url) == 1) {
            $controllerName = 'HomeController';
            $methodName = 'index';
        } elseif ($url[1] == "Admin") {
            $controllerName = 'DashboardController';
            $methodName = 'index';
        } else {
            $controllerName = ucfirst($url[0]) . 'Controller';
            $methodName = isset($url[1]) ? $url[1] : 'index';
        }

        if (!class_exists($controllerName)) {
            echo "404 Not Found";
            // throw new Exception("Controller not found: " . $controllerName);
        } 
        else
        {
            $controller = new $controllerName();
    
            if (!method_exists($controller, $methodName)) {
                throw new Exception("Method not found: " . $methodName);
            }
    
            call_user_func_array([$controller, $methodName], array_slice($url, 2));
        }

    }
}