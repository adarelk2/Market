<?php
include("../connection.php");
include("../class/user.php");
include("../class/manager.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <link rel="stylesheet" href="https://kit-free.fontawesome.com/releases/latest/css/free.min.css" media="all">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="../bootstrap.min.css">
   <link rel="stylesheet" href="../style.css">
   <link rel="stylesheet" href="../responsive.css">
   <script src="manager_js/app_manager.js" type="module"></script>
   <script src="../jquery.js"></script>

   <title>Document</title>
</head>
<body class="bg-dark">
   <header class="container-fluid ">
   <div class="container d-flex justify-content-between">
         <div class="d-md-none center">
            <i class="fas fa-bars" id="burger"></i>
         </div>
         <img src="https://icon-library.com/images/anonymous-icon-png/anonymous-icon-png-2.jpg" class="logo" alt="">
   <nav class="d-none d-md-block">
            <a href="index.php?Page=manage_user">Edit Account</a>
            <a href="index.php?Page=orders">Check Loading</a>
            <a href="index.php?Page=products">Add Product</a>
            <a href="../">LogOut</a>
         </nav>
      <div class="messageBox bg-white text-dark " style="top:80px;"></div>
</div>
   </header>
   <main class="container-fluid bg-dark" style="margin-top:150px;">
      <?php
      if($_SESSION['userName'] == null)
         require_once("frontend/login.php");
      else
      {
         $user = new ManagerClass($mysqli);
         $user->checkLogin($_SESSION['userName'],$_SESSION['password']);
         if($user->checkLevel() == false)
          header('Location: ../index.php');
         else
         {
            switch($_GET['Page'])
            {
               case "manage_user":
                  require_once("frontend/manage_user.php");
               break;
               case "orders":
                  require_once("frontend/orders.php");
               break;
               case "products":
                  require_once("frontend/products.php");
               break;
               default:
               require_once("frontend/manage_user.php");

            }
         }
      }
      ?>

   </main>
</body>
</html>