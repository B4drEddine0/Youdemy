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

    public function getTechCourses($id){
        $query = "SELECT * FROM courses c join categories cat on c.category_id = cat.cat_id WHERE teacher_id = :teacher_id ORDER BY title;";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':teacher_id',$id);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getCourseDet($id){
        $query = "SELECT * FROM courses WHERE courses_id = :courses_id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':courses_id',$id);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function deleteCourse($id){
        $query='DELETE from courses where courses_id = :courses_id';
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':courses_id',$id);
        if($stmt->execute()){
            return true;
        }
        return false;
    }

    public function getCourses(){
        $query = "SELECT * FROM courses c join categories cat on c.category_id = cat.cat_id ORDER BY title";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
?>