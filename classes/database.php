<?php


class DbConnection{

    private $host = 'localhost';
    private $db_name = 'youdemy1';
    private $username = 'root';
    private $password = '';
    public $conn;

    public function getConnection(){
        $this->conn = null;
        try{
            $this->conn = new pdo(
                "mysql:host=" . $this->host . ";dbname=" . $this->db_name,
                $this->username, $this->password 
            );
        }catch(pdoException $e){
            echo "erreur during the connection: ". $e->getMessage();
        }
        return $this->conn;
    }
}



?>