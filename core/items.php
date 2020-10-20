<?php
include("../connection.php");
include("../class/user.php");
include("../class/items.php");
session_start();
$query = $mysqli->query("Select *from products where mode=0"); //Set where mode =0
$user = new User($mysqli);
$user->checkLogin($_SESSION['userName'],$_SESSION['password']);
$level = $user->checkLevel();
for($i=0;$row = $query->fetch_array();$i++)
{
   $itemClass = new Items($mysqli);
   $items['items'][$i] = $itemClass->setItem($row['id']);
   $items['level'] = $level;
}
echo json_encode($items);
?>