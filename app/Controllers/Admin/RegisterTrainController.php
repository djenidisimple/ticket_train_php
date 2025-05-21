<?php
require_once '../app/Models/Train.php';
require_once '../app/Models/TrainByRoute.php';
require_once '../Core/Form.php';
require_once '../Core/Controller.php';
class RegisterTrainController extends Controller
{
    public function index()
    {
        $succes = $error = null;
        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $form = new Form();
            $validate = $form->validate($_POST, [
                'train_name' => 'required',
                'train_capacity' => 'required|numeric'
            ]);

            $nameTrain = $form->validateNameTrain($_POST['train_name']);
            
            if(empty($validate) && empty($nameTrain) && !empty($_SESSION))
            {
                $train = new Train();
                $id = $train->addTrain(['nameTrain' => $_POST['train_name'], 'CapacityTrain' => $_POST['train_capacity']]);
                $associa = new TrainByRoute();
                $associa->add(['trainId' => $id, 'routeId' => $_SESSION['routeID']]);
                $placeGen = new Place();
                $placeGen->insertPlace();
                $succes = "Enregistrement reussite!";
            }
            else 
            {
                if(!empty($nameTrain))
                {
                    foreach ($nameTrain as $key => $value) {
                        $error[] = $value . "<br>";
                    }
                } else {
                    foreach ($validate as $key => $value) {
                        $error[] = $value . "<br>";
                    }
                }
            }
        }
        $this->view('Admin/TrainView', ['Train' => "", "error" => $error, "succes" => $succes]);
    }
    public function edit()
    {
        $erreur = $succes = null;
        $id = Router::get_id_url();
        $train = new Train();
        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $form = new Form();
            $validate = $form->validate($_POST, [
                'train_name' => 'required',
                'train_capacity' => 'required|numeric'
            ]);

            $nameTrain = $form->validateNameTrain($_POST['train_name'], TRUE);
            
            if(empty($validate) && empty($nameTrain))
            {
                $train->updateTrain(['nameTrain' => $_POST['train_name'], 'CapacityTrain' => $_POST['train_capacity']], (int)$id);
                $succes = "Champs validés avec succès !";
            }
            else 
            {
                if(!empty($nameTrain))
                {
                    foreach ($nameTrain as $key => $value) {
                        $erreur[] = $value . "<br>";
                    }
                } else {
                    foreach ($validate as $key => $value) {
                        $erreur[] = $value . "<br>";
                    }
                }
            }
        }
        $this->view('Admin/TrainView', ['Train' => $train->getTrainByIdEdit((int)$id), 'error' => $erreur, 'success' => $succes]);
    }
}