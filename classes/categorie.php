<?php
require_once 'database.php';
class Categorie {
    private $db;

    public function __construct() {
        $database = new DbConnection;
        $this->db = $database->getConnection();
    }

    public function getCategs() {
        $query = "SELECT * FROM categories ORDER BY name";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function addCateg($name) {
        $query = "INSERT INTO categories (name) VALUES (:name)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':name', $name);
        return $stmt->execute();
    }

    public function deleteCateg($id) {
        $query = "DELETE FROM categories WHERE cat_id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
} 