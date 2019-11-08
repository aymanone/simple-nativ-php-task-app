<?php
use \App\Models\Task as Task;
if (is_loged()){
    $decoded_jwt=get_decoded_jwt();
    $task=new Task();
    $tasks=$task->get_user_tasks(intval($decoded_jwt["user"]));
    $json_tasks=json_encode(["tasks"=>$tasks,"response"=>200]);
    die($json_tasks);
    echo $json_tasks;
    
    
}
else{
    echo json_encode(["response"=>401]);
}
?>
