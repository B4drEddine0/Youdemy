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

    public function getCourses($page){
        $record_per_page = 4;
        $start_from = ($page-1)*$record_per_page;
        $query = "SELECT c.*,cat.name,u.username FROM courses c left join categories cat on c.category_id = cat.cat_id left join users u on c.teacher_id = u.users_id ORDER BY title LIMIT $start_from, $record_per_page";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getTotalPages() {
        $record_per_page = 4;
        $query = "SELECT COUNT(*) as total FROM courses";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch();
        
        return ceil($result['total'] / $record_per_page);
    }

    public function getAllCourses(){
        $query='SELECT c.*,cat.name,u.username FROM courses c left join categories cat on c.category_id = cat.cat_id left join users u on c.teacher_id = u.users_id ORDER BY title';
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function search($search){
        $query='SELECT c.*,cat.name,u.username FROM courses c left join categories cat on c.category_id = cat.cat_id left join users u on c.teacher_id = u.users_id where title LIKE :search or description LIKE :search or cat.name LIKE :search or u.username LIKE :search';
        $stmt = $this->db->prepare($query);
        $searchTerm = "%" . $search . "%";
        $stmt->bindParam(':search',$searchTerm);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getTotalEnrolls($id){
        $query="SELECT count(*) as 'total_etd' from enrollments e join courses c on e.courses_id = c.courses_id where c.teacher_id = :id ";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id',$id);
        $stmt->execute();
        $res = $stmt->fetchColumn();
        return $res;
    }

    public function getTotalEtud($id){
        $query="SELECT count(DISTINCT e.student_id) as 'total_etd' from enrollments e join courses c on e.courses_id = c.courses_id where c.teacher_id = :id ";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id',$id);
        $stmt->execute();
        $res = $stmt->fetchColumn();
        return $res;
    }

    public function getRepartition(){
        $query="SELECT count(*) as total ,cat.name from courses c join categories cat on c.category_id = cat.cat_id group by c.category_id ";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function getMostPop(){
        $query="SELECT c.courses_id, c.title, c.image,(SELECT COUNT(*) FROM enrollments e WHERE e.courses_id = c.courses_id) as nb FROM courses c GROUP BY nb DESC LIMIT 1";
        $stmt= $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function getTopTeachers(){
        $query="SELECT c.teacher_id,u.username,COUNT(DISTINCT c.courses_id) as courses,COUNT(e.student_id) as enrolls FROM courses c JOIN users u ON c.teacher_id = u.users_id
        LEFT JOIN enrollments e ON c.courses_id = e.courses_id GROUP BY c.teacher_id, u.username ORDER BY enrolls DESC LIMIT 3;";
        $stmt= $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}
?>