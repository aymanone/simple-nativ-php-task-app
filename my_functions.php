<?php
use \Firebase\JWT\JWT as Jwt;
function is_loged(){
    if(isset($_COOKIE["user"])){
         $decoded_jwt=(array)Jwt::decode($_COOKIE["user"], "secret_key", array('HS256'));
        //user.user_id session doesn't accept numeric value as keys
          if (isset($_SESSION["user".$decoded_jwt["user"]])){
              return true;
          }
        else{return false;}
    }
    return false;
}
function get_decoded_jwt(){
    return   $decoded_jwt=(array)Jwt::decode($_COOKIE["user"], "secret_key", array('HS256'));
}
?>