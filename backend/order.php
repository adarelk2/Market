<?php
session_start();
include("../class/items.php");
include("../class/user.php");
include("../connection.php");
$user = new UserClass($mysqli);
$user->checkLogin($_SESSION['userName'],$_SESSION['password']);
$myBalance = $user->getBalance();
$array =$_POST['data'];
$cost =0;
for($i=0;$i<count($array);$i++)
{
   $item = new ItemsClass($mysqli);
   $item->setItem($array[$i]);
   $cost += $item->getPrice();
}
if($myBalance >= $cost)
{
   $user->query($_SESSION['userName'],"balance",$myBalance-$cost);
   for($i=0;$i<=count($array);$i++)
   {
      $user->makeOrder($array[$i]);
   }
   echo "done!";
}
else
{
   echo "faild";
}
?>