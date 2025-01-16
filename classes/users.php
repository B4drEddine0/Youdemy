<?php
session_start();
require_once 'database.php';

class User{
    private $db;
    private $username;
    private $email;
    private $password;
    private $role;
    private $status;


    public function setUser($username){
        $this->username = $username;
    }
    public function setEmail($email){
        $this->email = $email;
    }
    public function setPassword($password){
        $this->password = $password;
    }
    public function setRole($role){
        $this->role = $role;
    }
    public function setStatus($status){
        $this->status = $status;
    }


    public function __construct() {
        $database = new DbConnection;
        $this->db = $database->getConnection();
    }

    public function singUp(){

        $hashed_password = password_hash($this->password, PASSWORD_DEFAULT);
        $status = ($this->role === 'teacher') ? 'pending' : 'active';


        $query = "INSERT into users (username, email, password, role, status) VALUES 
        (:username, :email, :password, :role, :status)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':username', $this->username);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':password', $hashed_password);
        $stmt->bindParam(':role', $this->role);
        $stmt->bindParam(':status', $status);
        if($stmt->execute()){
            return true;
        }
        return false;
    }

    public function signIn(){

        $query = 'SELECT * FROM users WHERE email = :email';
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':email', $this->email);
        $stmt->execute();
        $user = $stmt->fetch();

        if($user && password_verify($this->password, $user['password'])) {

                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = $user['role'];
                
                switch($user['role']) {
                    case 'admin':
                        header('Location: ../views/dashboard-admin.php');
                        break;
                    case 'teacher':
                        if($user['status']==='pending'){
                            header('Location: ../views/login.php?status=pending');
                            break;
                        }else{
                           header('Location: ../views/dashboard-teacher.php');
                           break; 
                        }   
                    case 'student':
                        header('Location: ../index.php');
                        break;
                }
                exit();
           
        } else {
            $error = "Invalid email or password";
            return $error;
        }
    }

    public function getUsers(){
        $query = 'select * from users where role <> "admin"';
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateStatus($id,$status){
        $query = 'UPDATE users SET status = :status where users_id = :users_id';
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':status',$status);
        $stmt->bindParam(':users_id',$id);
        if($stmt->execute()){
            header('location: ../views/dashboard-admin.php');
        }
    }
}







?>