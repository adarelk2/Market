<?php
session_start();
require("../class/user.php");
require("../connection.php");
$userName = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$captcha = md5($_POST['captcha']);
$checkEmail = strrpos($email, "@");
$login = false;
$error ="Faild, please try again";
if(strlen($userName) <=6)
$login = false;
else if(strlen($password) <=6)
$login = false;
else if(strlen($email) <=8)
$login = false;
else if ($checkEmail === false) { 
$login = false;
}
else if ($captcha != $_SESSION["captcha"]) { 
   $login = false;
   }
else
{
$login = true;
}
if($login == true)
{
   $user = new UserClass($mysqli);
   $error = $user->makeRegister($email,$userName,$password);
}
echo $error;
?>