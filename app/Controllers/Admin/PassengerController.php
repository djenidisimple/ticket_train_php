<?php
require_once '../Core/Controller.php';
require_once '../Core/Json.php';
require_once '../app/Models/Passenger.php';
class PassengerController extends Controller
{
    public function index()
    {
        $this->view('Admin/ListPass', ['ListPassenger' => ""]);
    }
    public function getValue()
    {
        $json = new Json();
        $data = $json->getData();
        $passId = intval($data['id']);
        if ($passId) {
            $passenger = new Passenger();
            $passengerData = $passenger->getPassengerById($passId);
            if ($passengerData) {
                $json->sendData(['message' => 'Passager trouvé', 'data' => $passengerData]);
            } else {
                $json->sendData(['message' => 'Passager non trouvé']);
            }
        } else {
            $json->sendData(['message' => 'ID de passager manquant']);
        }
    }
    public function postValue()
    {
        $json = new Json();
        $data = $json->getData();
        $passId = intval($data['id']);
        if ($data) {
            $passenger = new Passenger();
            $result = $passenger->updatePassenger($passId, $data['data']);
            if ($result) {
                $json->sendData(['message' => 'Enregistrement réussi']);
            } else {
                $json->sendData(['message' => 'Erreur lors de l\'enregistrement']);
            }
        } else {
            $json->sendData(['message' => 'Données invalides']);
        }
    }
    public function deleteValue()
    {
        $json = new Json();
        $data = $json->getData();
        $passId = intval($data['id']);
        if ($passId) {
            $passenger = new Passenger();
            $result = $passenger->deletePassenger($passId);
            if ($result) {
                $json->sendData(['message' => 'Suppression réussie']);
            } else {
                $json->sendData(['message' => 'Erreur lors de la suppression']);
            }
        } else {
            $json->sendData(['message' => 'ID de passager manquant']);
        }
    }
}