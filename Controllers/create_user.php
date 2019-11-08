<?php
if(is_loged()){
    header("Location: /mytasks");
    return;
}
use \App\Models\User as User;
if (isset($_POST["mail"])&& isset($_POST["password"])&&isset($_POST["firstName"])&&isset($_POST["lastName"])){
    $user=new User();
    $name=$_POST["firstName"].".".$_POST["lastName"];
    
    $insert=$user->create_user($name,$_POST["mail"],$_POST["password"]);
    if($insert){
        
        header("Location: /login");
        return;
}
    else{
        die("wrong in sign  up");
}
}
else{
    die("something went wrong");
}


?>
