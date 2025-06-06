<?php
require_once '../app/Models/Route.php';
require_once '../Core/Controller.php';
require_once '../Core/Form.php';
require_once '../Core/Json.php';
class RegisterRouteController extends Controller
{
    public function register() 
    {
        $json = new Json();
        $data = $json->getData();
        if ($data != null) {
            $route = new Route();
            $route->addRoute($data);
            $json->sendData(['message' => 'Enregistrement réussi !']);
        } else {
            $json->sendData(['message' => 'Erreur : données invalides.']);
        }
    }
    public function index()
    {
        $error = $succes = null;
        $form = new Form();
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $validate = $form->validate($_POST, [
                'route_departure' => 'required',
                'route_arrival' => 'required',
                'date_departure' => 'required',
                'date_arrival' => 'required'
            ]);
            
            $route = $form->validateRoute($_POST['route_departure'], $_POST['route_arrival'], $_POST['date_departure'], $_POST['date_arrival']);
            if(empty($validate) && empty($route))
            {
                $route = new Route();
                $route->addRoute(['placeOfDeparture' => $_POST['route_departure'], 'placeOfArrival' => $_POST['route_arrival'], 'dateLeave' => $_POST['date_departure'], 'dateArrived' => $_POST['date_arrival']]);
                $succes = "Enregistrement reussite!";
            }
            else if (!empty($route))
            {
                foreach ($route as $key => $value) {
                    $error[] = $value . "<br>";
                }
            }
            else 
            {
                $error = "Champs invalidés !";
            }
        }
        $this->view('Admin/RouteView', ['Route' => "", "error" => $error, "succes" => $succes]);
    }
    public function edit_get_value() 
    {
        $json = new Json();
        $data = $json->getData();
        $route = new Route();
        $routeId = intval($data['id']);
        if ($routeId > 0) {
            $routeData = $route->getRouteById($routeId);
            if ($routeData) {
                $json->sendData(['message' => 'Route found', 'data' => $routeData]);
            } else {
                $json->sendData(['message' => 'Route not found']);
            }
        } else {
            $json->sendData(['message' => 'Invalid route ID']);
        }
    }
    public function edit_post_value() 
    {
        $json = new Json();
        $data = $json->getData();
        $route = new Route();
        $routeId = intval($data['id']);
        if ($routeId > 0) {
            $routeData = $route->getRouteById($routeId);
            if ($routeData) {
                $route->updateRoute($routeId, $data['data']);
                $json->sendData(['message' => 'Route updated successfully', 'data' => $route->getRouteById($routeId)]);
            } else {
                $json->sendData(['message' => 'Route not found']);
            }
        } else {
            $json->sendData(['message' => 'Invalid route ID']);
        }
    }
    public function edit()
    {
        $erreur = null;
        $succes = null;
        $id = Router::get_id_url();
        $route = new Route();
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $form = new Form();
            $validate = $form->validate($_POST, [
                'route_departure' => 'required',
                'route_arrival' => 'required',
                'date_departure' => 'required',
                'date_arrival' => 'required'
            ]);
            
            $routeValide = $form->validateRoute($_POST['route_departure'], $_POST['route_arrival'], $_POST['date_departure'], $_POST['date_arrival']);
            if(empty($validate) && empty($routeValide))
            {
                if ($id != null) {
                    $route->updateRoute((int)$id, ['placeOfDeparture' => $_POST['route_departure'], 'placeOfArrival' => $_POST['route_arrival'], 'dateLeave' => $_POST['date_departure'], 'dateArrived' => $_POST['date_arrival']]);
                }
                $succes = "Modification reussite!";
            }
            else if (!empty($routeValide))
            {
                foreach ($routeValide as $key => $value) {
                    $erreur[] = $value . "<br>";
                }
            }
            else 
            {
                $erreur = "Tous les champs sont obligatoires!";
            }
        }
        $this->view('Admin/RouteView', ['Route' => $route->getRouteById((int)$id), 'error' => $erreur, 'succes' => $succes]);
    }
}