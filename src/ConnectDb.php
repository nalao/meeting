<?php 
class ConnectDb{
  
    // specify your own database credentials
    private $host = "localhost";
    private $db_name = "meeting";
    private $username = "root";
    private $password = "123456";
    public $conn;
  
    // get the database connection
    public function getConnection(){
  
        $this->conn = null;
  
        try{
            $this->conn = new mysqli($this->host, $this->username, $this->password, $this->db_name);
            $this->conn->query("SET NAMES 'utf8'");
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
  
        return $this->conn;
    }
}	
 ?>