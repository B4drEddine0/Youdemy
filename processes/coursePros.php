<?php
require_once '../classes/courseText.php';
require_once '../classes/courseVideo.php';


if(isset($_POST['addCourse'])){

    $title = $_POST['title'];
    $description = $_POST['description'];
    $teacher = $_SESSION['user_id'];
    $category = $_POST['category'];
    $type = $_POST['content_type'];
    $image = $_POST['image'];
    $tags = $_POST['tags'];
    if($type === 'video'){
        $content = $_POST['content-video'];
        $vid = new CourseVideo();
        if($vid->addCourseVideo($title,$description,$teacher,$category,$type,$image,$content,$tags)){
            header('location: ../views/dashboard-teacher.php');
        }
    }else{
        $content = $_POST['content-text'];
        $txt = new CourseText();
        if($txt->addCourseText($title,$description,$teacher,$category,$type,$image,$content,$tags)){
            header('location: ../views/dashboard-teacher.php');
        }
    }
}
?>