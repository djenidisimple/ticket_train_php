<?php
class TrainByRoute extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllTrainsByRoute($routeId)
    {
        $stmt = $this->db->prepare("SELECT * FROM trains WHERE route_id = :route_id");
        $stmt->bindParam(':route_id', $routeId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function add($data)
    {
        return $this->insert("trainbyroute", $data);
    }
}