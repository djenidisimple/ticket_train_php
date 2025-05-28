<?php
include_once '../Core/Model.php';
class Place extends Model
{
    private $nameTable = 'place';
    public function __construct()
    {
        parent::__construct();
    }

    public function countPlace():int
    {
        $query = "SELECT COUNT(placeId) as nb FROM place WHERE EstDisponible = 0;";
        $place = $this->getValue($query);
        $places = [$place];
        foreach ($places as $value) {
            return (int) $place[0]["nb"];
        }
    }

    public function updatePlace(int $id):int
    {
        $query = "UPDATE place SET EstDisponible = 0 WHERE placeId = :placeId;";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':placeId', $id, PDO::PARAM_INT); 
        $stmt->execute(); 
        return 1;
    }

    public function addPlace() 
    {
        $value = [];
        $query = "SELECT Route.routeId , Train.trainId, Train.CapacityTrain as CapaciteTotale FROM trainbyroute INNER JOIN Train ON Train.trainId = trainbyroute.trainId INNER JOIN Route ON Route.routeId = trainbyroute.routeId WHERE Route.IsActive = 1;";
        $idTrajet = 0;
        $nbPlace = 0;
        $idTrain = 0;
        try
        {
            $place = $this->getValue($query);
            $places = [$place];
            foreach ($place as $val) {
                $value[] = [
                    (int) $val["routeId"],
                    (int) $val["CapaciteTotale"],
                    (int) $val["trainId"]
                ];
            }
        }
        catch(Exception $e)
        {
            echo "Erreur 1: " . $e->getMessage();
        }
        return $value;
    }

    public function getAllPlaces():array
    {
        $this->getAll($this->nameTable);
    }
    
    public function getPlaceById(int $id):array
    {
        $query = "SELECT * FROM place WHERE routeId = $id;";
        return $this->getValue($query);
    }

    public function insertAllPlace(array $place, int $nbPlace):int
    {
        $query = "";
        $i = 1;
        $j = 0; 
        $count = 0;
        $count = $place[1] - $nbPlace;
        try 
        {
            if ($count > 0)
            {
                $nbColunm = ($count >= 4) ? (int)($count / 4) : $count;
                $alphaNum = [ "A", "B", "C", "D" ];
                $classe = 1;
                while ($i < $count + 1)
                {
                    if ($i % $nbColunm == 0 && $i > 1) 
                    {
                        $j++;
                        if($j == 4)
                        {
                            $j = 0;
                        }
                    }
                    if ($i == 20) 
                    {
                        $classe++;   
                    }
                    $this->insert('place', ['routeId' => $place[0], 'trainId' => $place[2] ,'classePas' => $classe, 'seatNumber' => $alphaNum[$j] . $i, 'price' => 10000]);
                    
                    $i++;
                }
            }
        }
        catch(Exception $e)
        {
            echo "<pre>";
            echo "Erreur2 : " . $e->getMessage();
            echo "</pre>";
        }
        return $count;
    }


    public function insertPlace()
    {
        $query = "SELECT SUM(train.CapacityTrain) as Total FROM trainbyroute INNER JOIN Train ON Train.trainId = trainbyroute.trainId WHERE routeId IN (SELECT routeId FROM Route WHERE Route.IsActive = 1);";
        $nbPlaceByTrain = $this->getValue($query);
        
        $query = "SELECT COUNT(routeId) AS Total FROM Place WHERE routeId IN (SELECT routeId FROM Route WHERE IsActive = 1);";
        $nbPlaceAll = $this->getValue($query);
        
        $nbPlaceByTrain = (int)$nbPlaceByTrain[0]["Total"];
        $nbPlaceAll = (int)$nbPlaceAll[0]["Total"];

        $diff = abs($nbPlaceByTrain - $nbPlaceAll);
        $i = 0;
        if ($diff > 0)
        {
            try
            {
                while ($i < count($this->addPlace()))
                {
                    $this->insertAllPlace($this->addPlace()[$i], $this->getCountById($this->addPlace()[$i][0]));
                    $i++;
                }
            }
                catch (PDOException $e)
            {
                echo "Erreur 3: " . $e->getMessage();
            }
        }
        else {
            echo "Enregistrement Deja existant (Place deja complet!)";
        }
    }

    public function getStatus($id)
    {
        $query = "SELECT EstDisponible FROM Place WHERE placeId = $id;";
        $place = $this->getValue($query);
        $places = [$place];
        foreach ($places as $value) {
            var_dump($place);
            return $place["EstDisponible"];
        }
    }

    public function getCountById(int $id):int
    {
        $nb = 0;
        try
        {
            $query = "SELECT COUNT(placeId) as nb FROM Place WHERE routeId = " . $id;
            $place = $this->getValue($query);
            $places = [$place];
            foreach ($places as $value) {
                $nb = (int) $place[0]["nb"];
            }
        }
        catch(Exception $e)
        {
            echo "Erreur : " . $e->getMessage();
        }
        return $nb;
    }

}