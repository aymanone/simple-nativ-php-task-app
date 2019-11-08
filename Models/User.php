<?php
namespace App\Models;
use App\Core\Database_connector as Database_connector;
class User{
    private $db;
    public function __construct(){
        $db=new Database_connector();
        $this->db=$db->connect();
        
    }
    public function create_user($name,$mail,$password){
        $sql="SELECT mail,password from users WHERE mail=:mail";
	    $statment=$this->db->prepare($sql);
	    $statment->execute(array(":mail"=>$mail));
	   $row=$statment->fetch(\PDO::FETCH_ASSOC);
	   if($row!==false){
		return false;
	  }
	  
        $sql="insert into USers (name,mail,password) values(:name,:mail,:pw)";
        $statment=$this->db->prepare($sql);
        $statment->execute(array(":name"=>$name,":mail"=>$mail,":pw"=>$password));
        return true;
    }
    public function get_user($mail,$password){
    $sql="SELECT user_id,mail,password,name from users WHERE mail=:mail AND password=:pw";
	$statment=$this->db->prepare($sql);
	$statment->execute(array(":mail"=>$mail,":pw"=>$password));
    
	$user=$statment->fetch(\PDO::FETCH_ASSOC);
	if($user!==false){
		return $user;
	}
    return null;
}

    
}
?>
