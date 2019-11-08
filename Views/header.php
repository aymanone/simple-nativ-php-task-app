<!DOCTYPE html>
<html lang="en">
<head>
 <title><?= $title ?></title>
 <link rel="stylesheet" href="./views/style/bootstrap-4.3.1-dist/bootstrap-4.3.1-dist/css/bootstrap.min.css">
</head>
<body>
<header>
<nav>
<a href="/">Home &nbsp; </a>
<a href="/signin">sign up &nbsp;</a>
<?php
if(!is_loged()){
    echo '<a href="/login">login &nbsp;</a>';
    }else{
    echo '<a href="/logout">logout&nbsp;</a>';
}


?>
</nav>
</header>
