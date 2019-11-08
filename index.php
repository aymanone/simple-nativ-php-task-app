<?php
ini_set("session.save_path",$_SERVER['DOCUMENT_ROOT'] . '/sessions');
session_start();
require "vendor/autoload.php";
use App\Core\Router as Router;
$router=new Router();
require "my_functions.php";
require "routers.php";
$page= $router->get($_SERVER);
if ($page!==""){
    require $page;
}
else{
    
    die("no page");}
?>