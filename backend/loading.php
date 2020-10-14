<?php 
session_start();
include("../class/items.php");
include("../class/user.php");
include("../connection.php");
$user = new UserClass($mysqli);
$order = $_POST['data']['order'];
$captcha = md5($_POST['data']['captcha']);
if ($captcha != $_SESSION["captcha"]) { 
  echo "Captcha was worng, please try again";
  }
  else
  {
if($user->checkLogin($_SESSION['userName'],$_SESSION['password']) != true)
  echo "Error, you must login before a loading";
else
{
  if(strrpos($order, "<") == true)
  echo "Invaild";
  else
  echo $user->makeLoading($order);
}
  }
?>