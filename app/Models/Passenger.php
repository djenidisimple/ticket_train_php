<?php
/**
 * * Route Model
 * * This model is responsible for interacting with the route table in the database.
 * * * It extends the Model class which contains the basic CRUD operations.
 * * * This class is used to interact with the passenger table in the database and used to authenticate the user (client).
 */
class Passenger extends Model
{
    protected $table = 'passenger';
    public function __construct()
    {
        parent::__construct();
    }
    /**
     * Get all passengers from the database.
     * @return array
     */

    public function getAllPassenger()
    {
        $stmt = $this->db->prepare("SELECT * FROM passenger GROUP BY name and firstName");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    /**
     * Get a passenger by ID from the database.
     * @param int $id
     * @return array
     */

    public function getPassengerById($id)
    {
        return $this->getById($this->table, $id, "passId");
    }

    public function addPassenger($data)
    {
        return $this->insertGetId($this->table, $data);
    }

    public function updatePassenger($id, $data)
    {
        return $this->update($this->table, $data, 'passId',$id);
    }

    public function deletePassenger($id)
    {
        return $this->delete($this->table, $id, "passId");
    }
}