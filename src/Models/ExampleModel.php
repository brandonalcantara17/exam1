<?php

namespace Models;

class ExampleModel
{

    private $db;

    public function __construct($db)
    {
        $this->db = $db->getDb();
    }

    public function selectAllFrom($table)
    {
        $stmt = $this->db->prepare("SELECT * FROM $table");
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

}
