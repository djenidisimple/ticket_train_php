<?php
require_once '../app/Models/Train.php';
class Form
{
    /**
     * Renders a form with the given fields and methode POST or GET.
     *
     * @param array $rules An associative array of field names and their validation rules, such as 'required'.
     * @param array $methode The methode URL example: 
     * @return string The HTML form as a string.
     */
    public function validate(array $methode, array $rules)
    {
        $errors = [];

        foreach ($rules as $field => $rule) {
            if (isset($methode[$field])) {
                if ($rule == 'required' && empty($methode[$field])) {
                    $errors[$field] = "Le champs '$field' est obligatoire.";
                }
                // Add more validation rules as needed
            } else {
                $errors[$field] = "Le champs '$field' is absent.";
            }
        }

        return $errors;
    }
    public function validateRoute($departure, $arrival, $date_departure, $date_arrival)
    {
        $errors = [];
        if ($departure == $arrival) {
            $errors['route'] = "Le champs 'Gare de Departure' et 'Gare d'Arriver' ne doivent pas être identique.";
        }
        if ($date_arrival == $date_departure) {
            $errors['equal_date'] = "Le champs 'Date de Depart' et 'Date d'Arriver' ne doivent pas être identique.";
        }
        if ($date_arrival < $date_departure) {
            $errors['inf_dateD'] = "Le champs 'Date de Depart' doit être inférieur à 'Date d'Arriver'.";
        }
        if ($date_departure < date('Y-m-d H:i:s')) {
            $errors['sup_now_dateD'] = "Le champs 'Date de Depart' doit être supérieur à la date actuelle.";
        }
        if ($date_arrival < date('Y-m-d H:i:s')) {
            $errors['sup_now_dateA'] = "Le champs 'Date d'Arriver' doit être supérieur à la date actuelle.";
        }
        if ($date_departure > $date_arrival) {
            $errors['inf_now_dateA'] = "Le champs 'Date de Depart' doit être inférieur à 'Date d'Arriver'.";
        }
        return $errors;
    }

    public function validateTrain($nameTrain, $capacityTrain)
    {
        $errors = [];

        if (empty($nameTrain)) {
            $errors['nameTrain'] = "Le champs 'Nom du Train' est obligatoire.";
        }
        if (empty($capacityTrain)) {
            $errors['capacityTrain'] = "Le champs 'Capacité du Train' est obligatoire.";
        }
        if (!is_numeric($capacityTrain)) {
            $errors['capacityTrain'] = "Le champs 'Capacité du Train' doit être un nombre.";
        }
        if ($capacityTrain <= 0) {
            $errors['capacityTrain'] = "Le champs 'Capacité du Train' doit être supérieur à 0.";
        }
        return $errors;
    }
    public function validateReservation($name_pass, $first_name_pass, $email_pass, $phone_pass, $date_of_birth)
    {
        $errors = [];

        if (empty($name_pass)) {
            $errors['name_pass'] = "Le champs 'Nom du Passager' est obligatoire.";
        }
        if (empty($first_name_pass)) {
            $errors['first_name_pass'] = "Le champs 'Prenom Passager' est obligatoire.";
        }
        if (empty($email_pass)) {
            $errors['email_pass'] = "Le champs 'Email Passager' est obligatoire.";
        }
        if (empty($phone_pass)) {
            $errors['phone_pass'] = "Le champs 'Numéro de téléphone du Passager' est obligatoire.";
        }
        if (empty($date_of_birth)) {
            $errors['date_of_birth'] = "Le champs 'Date d'anniversaire' est obligatoire.";
        }
        return $errors;
    }
    public function validateEmail($email)
    {
        $errors = [];

        if (empty($email)) {
            $errors['email'] = "Le champs 'Email' est obligatoire.";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = "Le champs 'Email' n'est pas valide.";
        }
        return $errors;
    }
    public function validatePhone($phone)
    {
        $errors = [];

        if (empty($phone)) {
            $errors['phone'] = "Le champs 'Numéro de téléphone' est obligatoire.";
        } elseif (!preg_match('/+^[0-9]{12}$/', $phone)) {
            $errors['phone'] = "Le champs 'Numéro de téléphone' n'est pas valide.";
        }
        return $errors;
    }
    public function validateNameTrain($nameTrain, $edit = FALSE)
    {
        $errors = [];

        $train = new Train();
        $valide = $train->getTrainByName($nameTrain);
        if (!empty($valide) && $edit == FALSE) {
            $errors['nameTrain'] = "Le champs '$nameTrain' existe déjà.";
        }
        return $errors;
    }
}