<?php
/**
 * * Route Model
 * * This class handles all the database operations related to the route table.
 * * It extends the Model class which contains the basic CRUD operations.
 * * * This class is used to interact with the ticket table in the database.
 * * It contains methods to get all tickets, get a ticket by id, add a ticket, update a ticket, and delete a ticket.
 * * * This class is used to generate the ticket table in the database.
 */
class Ticket extends Model
{
    protected $table = 'ticket';

    public function __construct()
    {
        parent::__construct();
    }
    
    public function getAllTicket()
    {
        return $this->getAll($this->table);
    }

    public function getTicketById($id)
    {
        return $this->getById($this->table, $id);
    }

    public function addTicket($data)
    {
        return $this->insert($this->table, $data);
    }

    public function updateTicket($id, $data)
    {
        return $this->update($this->table, $data, $id);
    }

    public function deleteTicket($id)
    {
        return $this->delete($this->table, $id);
    }
    public function countTicket()
    {
        return $this->count($this->table);
    }
}