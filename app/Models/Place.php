<?php
include_once '../Core/Model.php';
class Place extends Model
{
    private $nameTable = 'places';
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllPlaces()
    {
        $this->getAll($this->nameTable);
    }
    
    public function insert($data)
    {
        $this->insert($this->nameTable, $this->data);
    }

}