<?php
//ini_set("session.save_path",$_SERVER['DOCUMENT_ROOT'] . '/sessions');
//session_start();
use \App\Models\Task as Task;
     if (is_loged()&&isset($_POST["title"])&&isset($_POST["description"])){
         $decoded_jwt=get_decoded_jwt();
         $task=new Task();
         $is_insert=$task->create_task($_POST["title"],$_POST["description"],intval($decoded_jwt["user"]));
         if($is_insert){
             header("Location: /mytasks");
             return;
         }
         else{
             die("no insert done");
         }
     }
    else{
        die("something very wrong");
    }

?>