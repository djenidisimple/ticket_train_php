<?php
/**
 * * Route Model
 * * This model is responsible for interacting with the route table in the database.
 * * * It extends the Model class which contains the basic CRUD operations.
 * * * This class is used to interact with the passenger table in the database.
 */ 
class Train extends Model
{
    protected $table = 'train';

    public function __construct()
    {
        parent::__construct();
    }

    public function getAllTrain()
    {
        return $this->getAll($this->table);
    }

    public function countTrain()
    {
        return $this->count($this->table);
    }

    public function getTrainByRouteId(int $trainId)
    {
        $stmt = $this->db->prepare("SELECT * FROM train WHERE trainId = :trainId");
        $stmt->bindParam(':trainId', $trainId);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTrainById($id)
    {
        return $this->getById("trainbyroute", $id, "routeId");
    }
    
    public function getTrainByIdEdit($id)
    {
        return $this->getById("train", $id, "trainId");
    }

    public function getNameTrainById($id)
    {
        return $this->getById("train", $id, "trainId");
    }

    public function getTrainByName($name)
    {
        $stmt = $this->db->prepare("SELECT * FROM " . $this->table . " WHERE nameTrain = :name");
        $stmt->bindParam(':name', $name);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addTrain($data)
    {
        return $this->insertGetId($this->table, $data);
    }

    public function updateTrain($data, $id)
    {
        return $this->update($this->table, $data, "trainId", $id);
    }

    public function deleteTrain($id)
    {
        return $this->delete($this->table, $id, "trainId");
    }
}