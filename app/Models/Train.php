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

    public function getTrainById($id)
    {
        return $this->getById($this->table, $id);
    }

    public function addTrain($data)
    {
        return $this->insert($this->table, $data);
    }

    public function updateTrain($id, $data)
    {
        return $this->update($this->table, $data, $id);
    }

    public function deleteTrain($id)
    {
        return $this->delete($this->table, $id);
    }
}