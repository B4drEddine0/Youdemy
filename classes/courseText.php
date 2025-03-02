<?php
require_once 'database.php';
require_once 'course.php';


class CourseText extends Course{

    public function __construct(){
        parent::__construct();
    }
    
    
    public function addCourseText($title,$description,$teacher,$category,$type,$image,$content,$tags){
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
            $query='INSERT INTO text_content (courses_id,content) values (:courses_id,:content)';
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

    public function getCourseDet($id){
        $query = "SELECT c.title, c.description, c.image, c.category_id, cat.name as category_name, c.teacher_id,
        u.username as teacher_name, t.content, GROUP_CONCAT(tg.name) as tags FROM courses c JOIN text_content t ON c.courses_id = t.courses_id 
        JOIN users u ON c.teacher_id = u.users_id JOIN categories cat ON c.category_id = cat.cat_id LEFT JOIN course_tags ct ON c.courses_id = ct.courses_id
        LEFT JOIN tags tg ON ct.tag_id = tg.tag_id WHERE c.courses_id = :courses_id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':courses_id',$id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function EditCourseText($id,$title,$description,$teacher,$category,$type,$image,$content,$tags){
        $query='UPDATE courses SET title = :title, description=:description, teacher_id=:teacher_id, category_id=:category_id, type=:type,image=:image where courses_id = :id ';
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':title',$title);
        $stmt->bindParam(':description',$description);
        $stmt->bindParam(':teacher_id',$teacher);
        $stmt->bindParam(':category_id',$category);
        $stmt->bindParam(':type',$type);
        $stmt->bindParam(':image',$image);
        $stmt->bindParam(':id',$id);
        if($stmt->execute()){
            $query='UPDATE text_content SET content = :content where courses_id = :courses_id';
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':courses_id',$id);
            $stmt->bindParam(':content',$content);
            if ($stmt->execute()) {
                $query = "DELETE FROM course_tags WHERE courses_id = :courses_id";
                $stmt = $this->db->prepare($query);
                $stmt->bindParam(':courses_id', $id);
                $stmt->execute();
                if (!empty($tags)) {
                    $query = "INSERT INTO course_tags (courses_id, tag_id) VALUES (:courses_id, :tag_id)";
                    $stmt = $this->db->prepare($query);
                    foreach ($tags as $tag) {
                        $stmt->bindParam(':courses_id', $id);
                        $stmt->bindParam(':tag_id', $tag);
                        $stmt->execute();
                    }
                }
                return true;
            }
        }
        return false; 
    }
}



?>