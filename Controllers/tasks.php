<?php
//ini_set("session.save_path",$_SERVER['DOCUMENT_ROOT'] . '/sessions');
//session_start();
use \App\Models\Task as Task;
if(is_loged()){
        $decoded_jwt=get_decoded_jwt();
        $task=new Task();
        $tasks=$task->get_user_tasks(intval($decoded_jwt["user"]));
        $title="mytasks";
        require"./views/tasks.php";
    }
    else{
        if (!is_writable(session_save_path())) {
    echo 'Session path "'.session_save_path().'" is not writable for PHP!'; 
}
    
        die("something very wrong");
    }

?>
