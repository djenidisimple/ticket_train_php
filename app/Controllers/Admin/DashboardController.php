<?php
require_once '../Core/Controller.php';
class DashboardController extends Controller
{
    public function index()
    {
        // $model = $this->model('DashboardModel');
        //$data = $model->getAll('Admin'); // Assuming you want to get all users
        $this->view('Admin/dashboard', ['Admin' => ""]);
    }
    public function route()
    {
        $this->view('Admin/RouteView', ['Route' => ""]);
    }
    public function train()
    {
        $_POST["name"] = null;
        $this->view('Admin/TrainView', ['Train' => ""]);
    }
    public function place()
    {
        $this->view("Admin/ReservationView", ['Place' => ""]);
    }
    public function deleteRoute($id)
    {
        if (isset($id)) {
            $routeId = $id;
            $route = new Route();
            $route->deleteRoute($routeId);
            header("Location: /Ticket/Admin/Route");
            exit;
        } else {
            echo "ID not provided.";
        }
    }
}