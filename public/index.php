<?php
require_once '../Core/Router.php';
require_once '../app/Controllers/Passenger/HomeController.php';
require_once '../app/Controllers/Admin/DashboardController.php';
require_once '../app/Controllers/Admin/RegisterRouteController.php';
require_once '../app/Controllers/Admin/RegisterTrainController.php';
require_once '../app/Controllers/Admin/ReservationController.php';
require_once '../app/Controllers/Admin/TrainController.php';
require_once '../app/Controllers/Admin/PlaceController.php';
require_once '../app/Controllers/Admin/PassengerController.php';
require_once '../app/Controllers/Admin/DeleteData.php';

$home = null;
$res = null;
$list = null;
$router = new Router();
$role = $router->get_url_currented();
$url = $_SERVER['REQUEST_URI'];
$url = trim($url, '/');
$url = explode('/', $url);
if(count($url) == 3 && ($url[2] == "RegisterReservation" || $url[2] == "RegisterRoute") || $url[2] == "RDelete" || $url[2] == "REdit" || $url[2] == "REditV" || $url[2] == "PEdit" || $url[2] == "PEditV" || $url[2] == "PDelete" || $url[2] == "TDelete" || $url[2] == "TEdit" || $url[2] == "TEditV" || $url[2] == "TAdd") {
    $router->route($_SERVER['REQUEST_URI']);
} else {
    if(count($url) == 3 || count($url) == 4)
    {
        if($url[2] == "RegisterReservation2" || $url[2] == "RegisterTrain" || $url[2] == "Place" || count($url) == 4 && ($url[2] == "R" || $url[2] == "T") && is_numeric($url[3]))
            session_start();
            if (count($url) == 4 && $url[2] == "R") {
                $_SESSION["routeID"] = $url[3];
            }
            else if (count($url) == 4 && $url[2] == "T")
            {
                $_SESSION["trainID"] = $url[3];
            }
            if($url[2] == "Pass") {
                $list = "active";
            } else {
                $res = "active";
            }
    } else {
        $home = "active";
    }
    require_once '../app/Views/includes/header.php';
    
    $router->route($_SERVER['REQUEST_URI']);
    
    require_once '../app/Views/includes/fooster.php';
}