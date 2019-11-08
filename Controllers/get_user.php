<?php
//ini_set("session.save_path",$_SERVER['DOCUMENT_ROOT'] . '/sessions');
//session_start();
use \App\Models\User as User;
use \Firebase\JWT\JWT as Jwt;
$user=new User();
if(isset($_POST["mail"])&& isset($_POST["password"])){
    $mail=$_POST["mail"];
    $pw=$_POST["password"];
    $client=$user->get_user($mail,$pw);
    if($client===null){
        die("no user");
}
    else{
        $secret_key="secret_key";
        $payload=array("user"=>$client["user_id"]);
        $jwt=Jwt::encode($payload,$secret_key,'HS256');
        //"user"+clinet[user_id] because session file cannot read just numeric val as key
        $_SESSION["user".$client["user_id"]]=$client["user_id"];
        //die(var_dump($_SESSION));
        setcookie("user",$jwt,0,'/');
        header("Location: /mytasks");
        return;
    }
}
else{
    die("something wrong");
}
?>