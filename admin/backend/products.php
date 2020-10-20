<?php
include("../../connection.php");
include("../../class/user.php");
include("../../class/manager.php");
session_start();
$user = new Manager($mysqli);
$user->checkLogin($_SESSION['userName'],$_SESSION['password']);
if($user->checkLevel() == true)
{
   $item = $_POST['item'];
   if($item)
      echo $user->editProduct($item);
   else
   {
      echo $user->addNewProduct($_POST['newItem']);
   }
}
?>