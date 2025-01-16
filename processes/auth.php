<?php
require_once '../classes/users.php';

if(isset($_POST['createAcc'])){
    $user = new User();
    $user->setUser($_POST['username']);
    $user->setEmail($_POST['email']);
    $user->setPassword($_POST['password']);
    $user->setRole($_POST['role']);
    if($user->singUp()){
        header('location: login.php');
    }
}

if(isset($_POST['login'])){
    $user = new User();
    $user->setEmail($_POST['email']);
    $user->setPassword($_POST['password']);
    $error = $user->signIn();
    if ($error){
        echo $error;
    }
}


?>