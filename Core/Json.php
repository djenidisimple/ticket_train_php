<?php
class Json
{
    public function __construct()
    {
        header('Content-Type: application/json');
    }

    public function reponse()
    {
        session_start();
        //Lire le contenu JSON envoyé depuis JavaScript
        $data = json_decode(file_get_contents('php://input'), true);
        if (is_array($data)) {
            $_SESSION['data'] = $data;
            echo json_encode(['message' => $data]);
        } else {
            echo json_encode(['message' => "Erreur : données invalides."]);
        }

        exit;
    }
    public function getData():array|null
    {
        $data = json_decode(file_get_contents('php://input'), true);
        if (is_array($data)) {
            return $data;
        } else {
            return null;
        }
    }
    public function sendData(array $data)
    {
        header('Content-Type: application/json');
        echo json_encode($data);
        exit;
    }
}