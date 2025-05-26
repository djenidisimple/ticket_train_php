<?php
include "../Core/Model.php";
include '../app/Controllers/Admin/RegisterReservationController.php';
class Router
{
    private $url = null;
    public static function route($url)
    {
        $url = trim($url, '/');
        $url = explode('/', $url);
        
        if (empty($url[1]) || $url[1] == "Ticket" && count($url) == 2) {
            $controllerName = 'HomeController';
            $methodName = 'index';
        } elseif (count($url) == 2 && $url[1] == "Admin" || (count($url) == 3 || count($url) == 4) && ($url[2] == "Route" || $url[2] == "Train" || $url[2] == "Place")) {
            $controllerName = 'DashboardController';
            if(count($url) == 2 && $url[1] == "Admin") {
                $methodName = 'index';
            } elseif ($url[1] == "Admin" && $url[2] == "Route") {
                $methodName = 'route';
            } elseif ($url[1] == "Admin" && $url[2] == "Train") {
                $methodName = 'train';
            } elseif ($url[1] == "Admin" && $url[2] == "Place") {
                $methodName = 'place';
            } else {
                $methodName = 'index';
            }
        } else if (count($url) == 3 && $url[1] == "Admin" && $url[2] == "RegisterTrain") {
            $controllerName = "RegisterTrainController";
            $methodName = 'index';
        } else if (count($url) == 4 && $url[1] == "Admin" && $url[2] == "R" && is_numeric($url[3])) {
            $controllerName = "TrainController";
            $methodName = 'index';
        } else if (count($url) == 4 && $url[1] == "Admin" && $url[2] == "T" && is_numeric($url[3])) {
            $controllerName = "PlaceController";
            if ($_SERVER["REQUEST_METHOD"] == "POST")
            {
                $methodName = 'register';
            } else {
                $methodName = 'index';
            }
        } else if (count($url) == 3 && $url[1] == "Admin" && $url[2] == "RegisterRoute") {
            $controllerName = "RegisterRouteController";
            $methodName = 'register';
        } else if (count($url) == 3 && $url[1] == "Admin" && $url[2] == "Reservation") {
            $controllerName = "ReservationController";
            $methodName = 'index';
        } else if (count($url) == 3 && $url[1] == "Admin" && $url[2] == "Pass") {
            $controllerName = "PassengerController";
            $methodName = 'index';
        } else if (count($url) == 3 && $url[1] == "Admin" && $url[2] == "RegisterReservation" || count($url) == 4 && $url[1] == "Admin" && $url[2] == "T" && is_numeric($url[3]) && $url == "Add") {
            $controllerName = "RegisterReservationController";
            $methodName = ($url[2] == "RegisterReservation") ? 'index' : 'register';
        
        } else if ((count($url) == 3 || count($url) == 4) && $url[1] == "Admin" && ($url[2] == "RDelete" || $url[2] == "TDelete" || $url[2] == "PDelete" || $url[2] == "PEdit" || $url[2] == "PEditV" || $url[2] == "REdit" || $url[2] == "REditV" || $url[2] == "TEdit" || $url[2] == "TEditV" || $url[2] == "TAdd")) {
            $controllerName = "DashboardController";
            $methodName = 'deleteRoute';
            if ($url[2] == "RDelete") {
                $controllerName = "DeleteData";
                $methodName = 'deleteRoute';
            } else if ($url[2] == "TDelete") {
                $controllerName = "RegisterTrainController";
                $methodName = 'deleteValue';
            } else if ($url[2] == "REdit") {
                $controllerName = "RegisterRouteController";
                $methodName = "edit_get_value";
            } else if ($url[2] == "REditV") {
                $controllerName = "RegisterRouteController";
                $methodName = "edit_post_value";
            } else if ($url[2] == "PEdit") {
                $controllerName = "PassengerController";
                $methodName = "getValue";
            } else if ($url[2] == "PEditV") {
                $controllerName = "PassengerController";
                $methodName = "postValue";
            } else if ($url[2] == "PDelete") {
                $controllerName = "PassengerController";
                $methodName = "deleteValue";
            } else if ($url[2] == "TEdit") {
                $controllerName = "RegisterTrainController";
                $methodName = "getValue";
            } else if ($url[2] == "TEditV") {
                $controllerName = "RegisterTrainController";
                $methodName = "postValue";
            } else if ($url[2] == "TAdd") {
                $controllerName = "RegisterTrainController";
                $methodName = "addValue";
            } else {
                echo "ID not provided.";
            }
        
        } else {
            $controllerName = ucfirst($url[0]) . 'Controller';
            $methodName = isset($url[1]) ? $url[1] : 'index';
        }
        // var_dump($controllerName);
        
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
    public function get_url_currented()
    {
        $url = $_SERVER['REQUEST_URI'];
        $url = trim($url, '/');
        $url = explode('/', $url);
        return (count($url) == 1 || count($url) > 1 && $url[1] != "Admin") ? "customer" : "admin";
    }
    public static function get_id_url()
    {
        $url = $_SERVER['REQUEST_URI'];
        $url = trim($url, '/');
        $url = explode('/', $url);
        return (is_numeric($url[3])) ? $url[3] : null;
    }
}