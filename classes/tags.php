<?php
require_once 'database.php';
class Tag {
    private $db;

    public function __construct() {
        $database = new DbConnection;
        $this->db = $database->getConnection();
    }

    public function getTags() {
        $query = "SELECT * FROM tags ORDER BY name";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function addTag($name) {
        $query = "INSERT INTO tags (name) VALUES (:name)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':name', $name);
        return $stmt->execute();
    }

    public function deleteTag($id) {
        $query = "DELETE FROM tags WHERE tag_id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
} 