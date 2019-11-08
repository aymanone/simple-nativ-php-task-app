<?php
if(is_loged()){
    header("Location: /mytasks");
    return;
}
require "./views/login.php";
?>