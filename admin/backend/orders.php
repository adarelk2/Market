<?php
include("../../connection.php");
include("../../class/user.php");
include("../../class/manager.php");
session_start();
$user = new Manager($mysqli);
$user->checkLogin($_SESSION['userName'],$_SESSION['password']);
if($user->checkLevel() == true)
{
   $orderId = $_POST['order'];
   if($orderId)
   {
      $userName = $_POST['userName'];
      $mode = $_POST['mode'];
      echo $user->confrimLoading($orderId,$userName,$mode);
   }
   else
   {
      $query = $mysqli->query("Select *from loading where mode=0 order by time desc"); //Set where mode =0
      for($i=0;$row = $query->fetch_array();$i++)
      {
         $OrderClass = new Manager($mysqli);
         $orders[$i] = $OrderClass->setLoading($row['id']);
      }
   echo json_encode($orders);
   }
}
?>