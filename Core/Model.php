<?php
class Model
{
    protected $db;

    public function __construct()
    {
        $this->db = DataBase::getInstance();
    }

    public function getAll($table)
    {
        $stmt = $this->db->prepare("SELECT * FROM " . $table);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($table, $id)
    {
        $stmt = $this->db->prepare("SELECT * FROM " . $table . " WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    /**
     * Insert a new record into the database.
     * @param string $table The name of the table to insert into.
     * @param array $data An associative array of column names and values to insert. example : ['column1' => 'value1', 'column2' => 'value2']
     */
    public function insert($table, $data)
    {
        $columns = implode(", ", array_keys($data));
        $placeholders = ":" . implode(", :", array_keys($data));
        $stmt = $this->db->prepare("INSERT INTO " . $table . " ($columns) VALUES ($placeholders)");
        foreach ($data as $key => $value) {
            $stmt->bindParam(':' . $key, $value);
        }
        return $stmt->execute();
    }
    /**
     * Update an existing record in the database.
     * @param string $table The name of the table to update.
     */
    public function update($table, $data, $id)
    {
        $set = "";
        foreach ($data as $key => $value) {
            $set .= "$key = :$key, ";
        }
        $set = rtrim($set, ", ");
        $stmt = $this->db->prepare("UPDATE " . $table . " SET $set WHERE id = :id");
        foreach ($data as $key => &$value) {
            $stmt->bindParam(':' . $key, $value);
        }
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
    public function delete($table, $id)
    {
        $stmt = $this->db->prepare("DELETE FROM " . $table . " WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
    public function getByColumn($table, $column, $value)
    {
        $stmt = $this->db->prepare("SELECT * FROM " . $table . " WHERE " . $column . " = :value");
        $stmt->bindParam(':value', $value);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getByColumns($table, $columns, $values)
    {
        $placeholders = implode(", ", array_fill(0, count($values), "?"));
        $stmt = $this->db->prepare("SELECT * FROM " . $table . " WHERE " . $columns . " IN ($placeholders)");
        $stmt->execute($values);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}