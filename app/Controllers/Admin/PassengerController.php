<?php
require_once '../Core/Controller.php';
class PassengerController extends Controller
{
    public function index()
    {
        $this->view('Admin/ListPass', ['ListPassenger' => ""]);
    }
}