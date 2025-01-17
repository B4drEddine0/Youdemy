<?php
require_once 'database.php';
require_once 'course.php';


class CourseVideo extends Course{

    public function __construct(){
        parent::__construct();
    }
    
    
    public function addCourseVideo($title,$description,$teacher,$category,$type,$image,$content,$tags){
        $query='INSERT into courses (title, description, teacher_id, category_id, type,image) values (:title, :description, :teacher_id, :category_id, :type,:image)';
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':title',$title);
        $stmt->bindParam(':description',$description);
        $stmt->bindParam(':teacher_id',$teacher);
        $stmt->bindParam(':category_id',$category);
        $stmt->bindParam(':type',$type);
        $stmt->bindParam(':image',$image);
        if($stmt->execute()){
            $course_id = $this->db->lastInsertId();
            $query='INSERT INTO video_content (courses_id,content) values (:courses_id,:content)';
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':courses_id',$course_id);
            $stmt->bindParam(':content',$content);
            if ($stmt->execute()) {
                foreach($tags as $tag){
                    $query = "INSERT INTO course_tags (courses_id, tag_id) VALUES (:courses_id, :tag_id)";
                    $stmt = $this->db->prepare($query);
                    $stmt->bindParam(':courses_id', $course_id);
                    $stmt->bindParam(':tag_id', $tag);
                    $stmt->execute();
                }
                return true;
            }
        }
        return false; 
    }

    public function getCourses(){
        $query = "SELECT * FROM courses ORDER BY name";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
?>