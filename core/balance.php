<?php
session_start();
include("../class/user.php");
include("../connection.php");
$user = new UserClass($mysqli);
 $user->checkLogin($_SESSION['userName'],$_SESSION['password']);
 echo $user->getBalance();
?>