<?php
require_once '../app/Models/Route.php';
require_once '../Core/Controller.php';
require_once '../Core/Json.php';
class DeleteData extends Controller
{
    public function deleteRoute()
    {
        $json = new Json();
        $data = $json->getData();
        $routeId = intval($data['id']);
        if ($data != null && isset($routeId) && is_numeric($routeId) && $routeId > 0) {
            $route = new Route();
            $route->deleteRoute($routeId);
            $json->sendData(['message' => 'Trajet supprimé avec succès !']);
        } else {
            $json->sendData(['message' => 'Erreur : données invalides.']);
        }
    }

    public function deleteTrain()
    {
        $trainId = Router::get_id_url();
        $train = new Train();
        $train->deleteTrain($trainId);
        $this->view('Admin/ListTrain', ['message' => 'Train supprimé avec succès !']);
    }

    public function deletePassenger()
    {
        $passengerId = Router::get_id_url();
        $passenger = new Passenger();
        $passenger->deletePassenger($passengerId);
        $this->view('Admin/ListPassenger', ['message' => 'Passager supprimé avec succès !']);
    }
}