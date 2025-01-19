<?php
require_once 'database.php';
class Enrollments {
    private $db;

    public function __construct() {
        $database = new DbConnection;
        $this->db = $database->getConnection();
    }


    public function addEnroll($user_id,$course_id){
        $query='INSERT INTO enrollments (student_id, courses_id) VALUES (:student_id, :courses_id)';
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':student_id',$user_id);
        $stmt->bindParam(':courses_id',$course_id);
        if($stmt->execute()){
            return true;
        }
        return false;
    }

    public function getEnroll($user_id){
        $query='SELECT e.*,c.courses_id, c.title, c.image,c.type, cat.name as category_name FROM enrollments e JOIN courses c ON e.courses_id = c.courses_id
                 LEFT JOIN categories cat ON c.category_id = cat.cat_id WHERE e.student_id = :student_id';
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':student_id',$user_id);
        if($stmt->execute()){
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        return false;
    }

    public function getEnrollsByTeach($user_id){
        $query='SELECT e.*,c.courses_id,c.teacher_id, c.title,c.type, c.image,u.*,cat.name as category_name FROM enrollments e JOIN courses c ON e.courses_id = c.courses_id
                 LEFT JOIN categories cat ON c.category_id = cat.cat_id LEFT JOIN users u ON e.student_id = u.users_id WHERE c.teacher_id = :teacher_id';
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':teacher_id',$user_id);
        if($stmt->execute()){
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        return false;
    }

}
?>