<?php
include("../../connection.php");
include("../../class/user.php");
include("../../class/manager.php");
session_start();
$user = new Manager($mysqli);
$user->checkLogin($_SESSION['userName'],$_SESSION['password']);
if($user->checkLevel() == true)
{
   $data = $_POST['data'];
   if($data)
   {
      $oldUsername = $_POST['oldUsername'];
      echo $user->saveData($data,$oldUsername);
   }
   else
   {
      $userName = $_POST['username'];
      $array = $user->getData($userName);
      echo json_encode($array);
   }
}
?>