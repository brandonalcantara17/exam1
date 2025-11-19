<?php
namespace Models;

class PoductsModels
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db->getDb();
    }

    /**
     * taula productes
     *
     * @param array $data [
     *   'name' => string,
     *   'category_id' => int,
     *   'short_description' => string,
     *   'producer' => string,
     *   'contact_email' => string,
     *   'price' => float
     * ]
     * @return array ['success' => bool, 'error' => string|null]
     */
    public function insertProduct($data)
    {
        $required = ['name', 'category_id', 'short_description', 'producer', 'contact_email', 'price'];
        foreach ($required as $field) {
            if (!isset($data[$field]) || $data[$field] === '') {
                return ['success' => false, 'error' => "Field '$field' is required."];
            }
        }

        $columns = ['name', 'category_id', 'short_description', 'producer', 'contact_email', 'price'];
        $placeholders = array_map(fn($k) => ":$k", $columns);
        $sql = "INSERT INTO products (" . implode(", ", $columns) . ") VALUES (" . implode(", ", $placeholders) . ")";
        $stmt = $this->db->prepare($sql);
        $params = [];
        foreach ($columns as $col) {
            $params[":$col"] = $data[$col];
        }
        try {
            $result = $stmt->execute($params);
            return $result ? ['success' => true] : ['success' => false, 'error' => 'Unknown error'];
        } catch (\PDOException $e) {
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }

    public function selectAllFrom($table)
    {
        $stmt = $this->db->prepare("SELECT * FROM $table");
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function insert($table, $data)
    {
        $columns = array_keys($data);
        $placeholders = array_map(fn($k) => ":$k", $columns);
        $sql = "INSERT INTO $table (" . implode(", ", $columns) . ") VALUES (" . implode(", ", $placeholders) . ")";
        $stmt = $this->db->prepare($sql);
        try {
            $result = $stmt->execute(array_combine($placeholders, array_values($data)));
            return $result ? ['success' => true] : ['success' => false, 'error' => 'Unknown error'];
        } catch (\PDOException $e) {
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }

    public function updateById($table, $id, $data, $idColumn = 'id')
    {
        $set = [];
        $params = [];
        foreach ($data as $key => $value) {
            $set[] = "$key = :$key";
            $params[":$key"] = $value;
        }
        $params[":id"] = $id;
        $sql = "UPDATE $table SET " . implode(", ", $set) . " WHERE $idColumn = :id";
        $stmt = $this->db->prepare($sql);
        try {
            $result = $stmt->execute($params);
            return $result ? ['success' => true] : ['success' => false, 'error' => 'Unknown error'];
        } catch (\PDOException $e) {
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }

    public function deleteById($table, $id, $idColumn = 'id')
    {
        $sql = "DELETE FROM $table WHERE $idColumn = :id";
        $stmt = $this->db->prepare($sql);
        try {
            $result = $stmt->execute([':id' => $id]);
            return $result ? ['success' => true] : ['success' => false, 'error' => 'Unknown error'];
        } catch (\PDOException $e) {
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }
}