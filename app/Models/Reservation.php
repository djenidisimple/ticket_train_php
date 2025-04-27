<?php
/**
 * * Route Model
 * * This class handles all the database operations related to the route table.
 * * It extends the Model class which contains the basic CRUD operations.
 * * This class is used to interact with the reservation table in the database.
 */
class Reservation extends Model
{
    protected $table = 'reservation';

    public function __construct()
    {
        parent::__construct();
    }
    /**
     * Get all reservations from the database.
     *
     * @return array
     */

    public function getAllReservation()
    {
        return $this->getAll($this->table);
    }

    public function getReservationById($id)
    {
        return $this->getById($this->table, $id);
    }

    public function addReservation($data)
    {
        return $this->insert($this->table, $data);
    }

    public function updateReservation($id, $data)
    {
        return $this->update($this->table, $data, $id);
    }

    public function deleteReservation($id)
    {
        return $this->delete($this->table, $id);
    }
}