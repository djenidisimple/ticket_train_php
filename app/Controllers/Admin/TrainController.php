<?php
require_once '../Core/Controller.php';
class TrainController extends Controller
{
    public function index()
    {
        $this->view('Admin/ListTrain', ['Admin' => ""]);
    }
}