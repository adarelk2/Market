<?php
session_start();
include("../class/user.php");
include("../connection.php");
$user = new User($mysqli);
$user->checkLogin($_SESSION['userName'],$_SESSION['password']);
echo $user->getBalance();
?>