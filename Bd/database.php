<?php
class Database{
 
    // specify your own database credentials
    private $host = "66.147.244.152";
    private $db_name = "innovag5_i9ar";
    private $username = "innovag5_i9arusr";
    private $password = "inn0v@rpwd";
    private $port="3306";
    public $conn;
 
    // get the database connection
    public function getConnection(){
 
        $this->conn = null;
 
        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";port=".$this->conn. ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
 
        return $this->conn;
    }
}
?>