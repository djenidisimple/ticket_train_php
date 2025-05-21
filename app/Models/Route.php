<?php
require_once '../Core/Model.php';
/**
 * * Route Model
 * this class handles all the database operations related to the route table.
 * it extends the Model class which contains the basic CRUD operations.
 */
class Route extends Model
{
    protected $table = 'route';

    public function __construct()
    {
        parent::__construct();
    }
    /**
     * get all routes from the database
     * @return array
     */

    public function getAllRoute()
    {
        return $this->getAll($this->table);
    }

    public function getRouteById($id)
    {
        return $this->getById($this->table, $id, "routeId");
    }

    public function addRoute($data)
    {
        return $this->insert($this->table, $data);
    }

    public function updateRoute($id, $data)
    {
        return $this->update($this->table, $data, "routeId", $id);
    }

    public function deleteRoute($id)
    {
        return $this->delete($this->table, $id, "routeId");
    }
}