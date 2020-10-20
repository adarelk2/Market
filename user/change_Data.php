<?php
include("../class/items.php");
include("../class/user.php");
include("../connection.php");
session_start();
$userName =  $_POST['data']['userName'];
$email =  $_POST['data']['email'];
$password = $_POST['data']['oldPassword'];
$newPassword = $_POST['data']['newPassword'];
$user = new User($mysqli);
if($user->checkLogin($_SESSION['userName'],$_SESSION['password'])==true)
{
   if(strlen($userName)<=5)
   echo "Error, userName lengths must be a number that over of 6";
   else if(strlen($password) <=5)
   echo "Error, password lengths must be a number that over of 6";
   else if(strlen($email) <=8)
   echo "Error, Email is invaild";
   else
   {
  $message = $user->saveDataUser($userName,$email,$password,$newPassword);
   if($message =="Data saved successfully")
   {
      $_SESSION['userName'] = $userName;
      if(strlen($newPassword) >0)
      {
         $_SESSION['password'] = $newPassword;
      }
   }
   echo $message;
   }
}
else
{
   echo "Error, You have must login";
}
?>