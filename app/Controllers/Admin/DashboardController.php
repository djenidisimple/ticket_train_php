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
}