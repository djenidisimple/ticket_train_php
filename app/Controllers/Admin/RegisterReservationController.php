<?php
require_once '../app/Models/Reservation.php';
require_once '../app/Models/Passenger.php';
require_once '../app/Models/Place.php';
require_once '../Core/Controller.php';
require_once '../Core/Form.php';
require_once '../Core/Json.php';
class RegisterReservationController extends Controller
{
    private $routeId = null;
    private $placeId = null;
    private $trainId = null;
    public static function index()
    {
        $json = new Json();
        $data = $json->getData();
        if (is_array($data['placeId'])) {
            $reserved = new Reservation();
            $places = new Place();
            $passenger = new Passenger();
            $id = $passenger->addPassenger($data['pass']);
            foreach ($data['placeId'] as $key => $value) {
                $reserved->addReservation(["routeId" => $data['data']['routeId'], "passId" => $id, "placeId" => $value]);
                $places->updatePlace((int)$value);
            }
            $json->sendData(['status' => 'success', 'message' => 'Réservation réussie !']);
        } else {
            $json->sendData(['status' => 'error', 'message' => 'Veuillez choisir une place !']);
        }
    }
    public function register() 
    {
        $this->view('Admin/ListPlace', ['Reservation' => ""]);
    }
}