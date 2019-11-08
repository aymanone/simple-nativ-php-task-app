<?php
if(is_loged()){
    header("Location: /mytasks");
    return;
}
require "./Views/signup.php";
?>
