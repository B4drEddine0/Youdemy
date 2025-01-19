<?php
require_once '../classes/course.php';
require_once '../classes/courseText.php';
require_once '../classes/courseVideo.php';
require_once '../classes/enrollments.php';


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

if(isset($_GET['deleteId'])){
    $id = $_GET['deleteId'];
    $course = new Course();
    if($course->deleteCourse($id)){
        header('location: ../views/dashboard-teacher.php');
    }
}


if(isset($_POST['EditCourse'])){
    $id = $_POST['id'];
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
        if($vid->EditCourseVideo($id,$title,$description,$teacher,$category,$type,$image,$content,$tags)){
            header('location: ../views/dashboard-teacher.php');
        }
    }else{
        $content = $_POST['content-text'];
        $txt = new CourseText();
        if($txt->EditCourseText($id,$title,$description,$teacher,$category,$type,$image,$content,$tags)){
            header('location: ../views/dashboard-teacher.php');
        }
    }
}

if(isset($_POST['enroll'])){
    $userId = $_POST['userId'];
    $courseId = $_POST['courseId'];
    $enroll = new Enrollments();
    if($enroll->addEnroll($userId,$courseId)){
        header('location: ../views/mycourses.php');
    }
}
?>