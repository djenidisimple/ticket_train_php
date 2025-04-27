<?php
require_once '../Core/Controller.php';
class HomeController extends Controller
{
    public function index()
    {
        $this->view('Passenger/home');
    }
}