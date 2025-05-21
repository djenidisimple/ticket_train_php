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
        $json->reponse();
    }
    public function register() 
    {
        $form = new Form();
        $validate = $form->validate($_POST, [
            'name_pass' => 'required',
            'first_name_pass' => 'required',
            'email_pass' => 'required',
            'phone_pass' => 'required',
            'date_of_birth' => 'required',
        ]);
        

        $reservation = $form->validateReservation($_POST['name_pass'], $_POST['first_name_pass'], $_POST['email_pass'], $_POST['phone_pass'], $_POST['date_of_birth']);
        $email = $form->validateEmail($_POST['email_pass']);
        echo "<br>";
        if(empty($validate) && empty($reservation) && empty($email))
        {
            $passenger = new Passenger();
            $this->routeId = $_SESSION['data']['routeId'] ?? null;
            $this->placeId = $_SESSION['data']['placeId'] ?? null;
            $id = $passenger->addPassenger(['name' => $_POST['name_pass'], 'firstName' => $_POST['first_name_pass'], 'email' => $_POST['email_pass'], 'Phone' => $_POST['phone_pass'], 'dateOfBirth' => $_POST['date_of_birth']]);
            if($id > 0 && isset($this->routeId) && isset($this->placeId)) {
                $reserved = new Reservation();
                $places = new Place();
                foreach ($this->placeId as $key => $value) {
                    $status = $places->getStatusPlace($value);
                    if ($status == 0) {
                        echo "La place est déjà réservée !";
                        return;
                    } 
                    else 
                    {
                        $reserved->addReservation(["routeId" => $this->routeId, "passId" => $id, "placeId" => $value]);
                        $places->updatePlace((int)$value);
                    }
                }
                // $_SESSION['save'] = true;
                echo "<p>Réservation réussie !</p>";
                // header('Location: /Ticket/Admin/Place');
            } else {
                echo ($this->placeId == null) ? "Veuilliez choisir une place!" : "Erreur lors de l'ajout du passager !";
            }
            unset($_SESSION['data']);
        }
        else if (!empty($reservation))
        {
            foreach ($reservation as $key => $value) {
                echo $value . "<br>";
            }
        }
        else 
        {
            echo "Champs invalidés !";
        }
        $this->view('Admin/ListePlace', ['Reservation' => ""]);
    }
}