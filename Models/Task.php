<?php
namespace App\Models;
use App\Core\Database_connector as Database_connector;
class Task{
    private $db;
    public function __construct(){
        $db=new Database_connector();
        $this->db=$db->connect();
        
    }
    public function create_task($title,$description,$user_id){
        try{
        $sql="INSERT INTO TASKS (title,description,user_id) VALUES (:title,:description,:user_id)";
        $statment=$this->db->prepare($sql);
        $statment->execute(array(":title"=>$title,":description"=>$description,":user_id"=>$user_id));
        
        return true;
    }
        catch(Exception $e){
            
            return false;
        }
}
 public function update_task($title,$description,$finish,$task_id,$user_id){
             try{
                 $sql="SELECT * FROM TASKS WHERE user_id = :user_id and id=:task_id";
                 $statment=$this->db->prepare($sql);
                 $statment->execute(array(":user_id"=>$user_id, ":task_id"=>$task_id));
                 $task=$statment->fetchAll(\PDO::FETCH_ASSOC);
                 if($task===false){
                    return false;
                   }
                 $sql="UPDATE tasks SET title= :title , description=:description , finish=:finish WHERE id=:task_id";
                 $statment=$this->db->prepare($sql);
                 $statment->execute(
                    array( ":task_id"=>$task_id, ":title"=>$title,":description"=>$description,":finish"=>$finish )
                    );
                    
                return true;
             }
             catch (Exception $e){
                 return false;
             }
 }
    
    public function get_user_tasks($user_id){
        try{
            $sql="SELECT title,description,finish,id,user_id from Tasks WHERE user_id=:user_id ";
	        $statment=$this->db->prepare($sql);
	        $statment->execute(array(":user_id"=>$user_id));
            $tasks=$statment->fetchAll(\PDO::FETCH_ASSOC);
            //die(var_dump($tasks));
		  return $tasks;
	
}
        catch(Exception $e){
            return null;
}
    }
}

?>
