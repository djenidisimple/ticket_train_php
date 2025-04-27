<?php
require_once '../Core/Router.php';
require_once '../app/Controllers/Passenger/HomeController.php';
require_once '../app/Controllers/Admin/DashboardController.php';
require_once '../app/Views/includes/header.php';

$router = new Router();
$router->route($_SERVER['REQUEST_URI']);

require_once '../app/Views/includes/fooster.php';