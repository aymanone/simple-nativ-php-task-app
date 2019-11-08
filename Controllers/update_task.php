<?php
  use \App\Models\Task as Task;
  if (is_loged()&&isset($_POST["title"])&&isset($_POST["description"])&& isset($_POST["task_id"])){
    $decoded_jwt=get_decoded_jwt();
    $task=new Task();
    $finsih=intval(isset($_POST["finish"]));
    $user_id=intval($decoded_jwt["user"]);
    $task_id=$_POST["task_id"];
    $des=$_POST["description"];
    $title=$_POST["title"];
    $update=$task->update_task($title,$des,$finsih,$task_id,$user_id);
    if($update){
       
        header("Location: /mytasks");
        return;
    }
    else{die($update);}
  }
  die(var_dump($_POST));
  die("something wrong");
?>