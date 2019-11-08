<?php
namespace App\Core;
class Database_connector{
    private $db_type,$host,$port,$db_name,$user,$pw;
    public function __construct(){
        $this->db_type="mysql";
        $this->host="localhost";
        $this->port="3306";
        $this->db_name="PhpTasks";
        $this->user="root";
        $this->pw="temp";     
}
    public function connect(){
        
        try{
        //$pdo= new \PDO("$this->db_type:host=$this->host;port=$this->port;dbname=$this->db_name",$this->user,$this->pw);

        $pdo= new \PDO("sqlite:".__DIR__."/database.db");
        $pdo->setAttribute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION);
        return $pdo;
        }
        catch(Exception $e){
            die("mmmmmmmmmm");
            echo $e->getMessage();
        }
    }
}
$d=new Database_connector();
$d->connect();
?>