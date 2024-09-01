<?php 
class Database{
    private $host="localhost";
    private $user= "root";
    private $pass= "";
    private $dbname= "serenity";
    public $conn;

    public function getConn(){
        $this->conn=null;
        try{
            $this->conn=new PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->user,$this->pass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           


        }
        catch(PDOException $exception){
            echo "Connection error:".$exception->getMessage();
    }
    return $this->conn;
}

}
$database = new Database();
$database->getConn();