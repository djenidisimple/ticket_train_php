<?php
/**
 * * Route Model
 * * This model is responsible for interacting with the route table in the database.
 * * * It extends the Model class which contains the basic CRUD operations.
 * * * This class is used to interact with the passenger table in the database and used to authenticate the user.
 */
class Admin extends Model
{
    protected $table = 'admin';
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllAdmin()
    {
        return $this->getAll($table);
    }

    public function getAdminById($id)
    {
        return $this->getById($table, $id);
    }

    public function insertAdmin($data)
    {
        return $this->insert($table, $data);
    }

    public function updateAdmin($data, $id)
    {
        return $this->update($table, $data, $id);
    }

    public function deleteAdmin($id)
    {
        return $this->delete($table, $id);
    }
}