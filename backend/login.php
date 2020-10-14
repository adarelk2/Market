<?php
session_start();
require("../class/user.php");
require("../connection.php");
$user = $_POST['username'];
$password = $_POST['password'];
$login = false;
if(strlen($user) <=3 || strlen($password) <=3)
$login = false;
else
{
$login = true;
}
if($login == true)
{
   $makeConnect = new UserClass($mysqli);
   if($makeConnect->checkLogin($user,$password) ==true)
   {
   $_SESSION["userName"]=$user;
   $_SESSION["password"]=$password;
   echo "true";
   }
   else
   echo "false";

}
?>
