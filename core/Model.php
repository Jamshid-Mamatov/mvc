<?php

require_once(ROOT_PATH.'/core/Database.php');
class Model
{
    protected $table;

    protected $database;

    public function __construct()
    {
        $this->database = Database::getInstance();
    }

    public function all()
    {
        $stmt = $this->database->prepare("SELECT * FROM $this->table");
        $stmt->execute();
        return $stmt->fetchAll();
    }


    public function find($id)
    {
        $stmt = $this->database->prepare("SELECT * FROM $this->table WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public function create($data)
    {
        $stmt = $this->database->prepare("INSERT INTO $this->table (" . implode(',', array_keys($data)) . ") VALUES (" . implode(',', array_fill(0, count($data), ':value')) . ")");
        $stmt->execute($data);
        return $this->database->lastInsertId();
    }

    public function update($id, $data)
    {
        $stmt = $this->database->prepare("UPDATE $this->table SET " . implode(',', array_map(function ($key) {
            return " $key = :$key";
        }, array_keys($data))) . " WHERE id = :id");
        $stmt->execute(array_merge($data, ['id' => $id]));
        return $stmt->rowCount();
    }

    public function delete($id)
    {
        $stmt = $this->database->prepare("DELETE FROM $this->table WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->rowCount();
    }
}




?>
