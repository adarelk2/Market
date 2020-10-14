<?php
session_start();
include("../class/items.php");
include("../class/user.php");
include("../connection.php");
$user = new UserClass($mysqli);
if($user->checkLogin($_SESSION['userName'],$_SESSION['password']) ==true)
echo json_encode(true);
else
echo json_encode(false);
?>