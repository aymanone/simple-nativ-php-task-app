<?php
ini_set("session.save_path",$_SERVER['DOCUMENT_ROOT'] . '/sessions');
session_start();
$_SESSION=array();
$_COOKIE=array();
session_destroy();
header("Location: /");
return;
?>