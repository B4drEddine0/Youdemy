<?php
require_once 'database.php';


class Course{
    protected $db;

    public function __construct(){
        $database = new DbConnection();
        $this->db = $database->getConnection();
    }
    
    public function addCourse($title,$description,$teacher,$category,$type,$image){
        $query='INSERT into courses (title, description, teacher_id, category_id, type,image) values (:title, :description, :teacher_id, :category_id, :type,:image)';
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':title',$title);
        $stmt->bindParam(':description',$description);
        $stmt->bindParam(':teacher_id',$teacher);
        $stmt->bindParam(':category_id',$category);
        $stmt->bindParam(':type',$type);
        $stmt->bindParam(':image',$image);
        $stmt->execute();
    }

    public function getCourses(){
        $query = "SELECT * FROM courses ORDER BY name";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
?>