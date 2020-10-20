<?php
include("connection.php");
include("config.php");
include("class/user.php");
if($status ==0)
header("Location: 404.html");
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title><?php echo $name_Website;?></title>
   <link rel="stylesheet" href="bootstrap.min.css">
   <link rel="stylesheet" href="style.css">
   <link rel="stylesheet" href="responsive.css">
   <link rel="stylesheet" href="https://kit-free.fontawesome.com/releases/latest/css/free.min.css" media="all">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <script src="app_js/app.js" type="module"></script>
   <script src="jquery.js"></script>

</head>

<body>
   <div class="lightBox d-none">
      <div class="Register d-none">
         <button class="btn" id="closeLightBox">X</button>
         <h2 class="text-center mb-3">
            Register to <?php echo $name_Website;?>
         </h2>
         <div class="row justify-content-between col-8 m-auto">
         <form id="id_register" method="POST" class="col-12">
            <label class="col-form-label mr-2 col-md-3" for="register_userName">Username:</label>
            <input type="text" name="userName" id="register_userName" class="form-control col-md-8 mb-2" required=""
               placeholder="Enter your Username">
            <label class="col-form-label mr-2 col-md-3" for="register_Email">E-mail:</label>
            <input type="text" name="email" id="register_Email" class="form-control col-md-8 mb-2" required=""
               placeholder="Enter your Email">
            <label class="col-form-label mr-2 col-md-3" for="register_Password">Password:</label>
            <input type="password" name="password" id="register_Password" class="form-control col-md-8 mb-2" required=""
               placeholder="Enter your Password">
               <div class="elem-group">
    <label for="captcha">Security: </label>
    <img src="core/captcha.php" alt="CAPTCHA" class="captcha-image">
    <br>
    <input type="phone" id="captcha" name="captcha_challenge" class="form-control col-md-4" placeholder="Code">
</div>
         </div>
         <div id="error_Register" class="text-danger text-center "></div>
         <div class="m-auto text-center">
            <button type="submit" class="btn btn-dark mt-2">Register</button>
</form>
         </div>
      </div>
      <div class="Login d-none">
         <button class="btn" id="closeLightBoxLogin">X</button>
         <h2 class="text-center mb-3">
            Login to <?php echo $name_Website;?>
         </h2>
         <div class="row justify-content-between col-8 m-auto">
            <form id="id_login" method="POST" class="col-12">
            <label class="col-form-label mr-2 col-md-3" for="login_userName">Username:</label>
            <input type="text" name="userName" id="login_userName" class="form-control col-md-8 mb-2" required=""
               placeholder="Enter your Username">

            <label class="col-form-label mr-2 col-md-3" for="login_password">Password:</label>
            <input type="password" name="password" id="login_password" class="form-control col-md-8 mb-2" required=""
               placeholder="Enter your Password">
         </div>
         <div id="error_login" class="text-danger text-center "></div>
         <div class="m-auto text-center">
            <button type="submit" class="btn btn-dark mt-2">Login</button>
         </form>

         </div>
      </div>
   </div>
   <?php 
      require_once("template/header.php");
   ?>
   <div class="strip container-fluid">
      <div class="messageBox"></div>
   </div>
   <main class="container-fluid">
     <?php
     switch($_GET['Page'])
     {
      case "home":
         require_once("backend/home.php");
        break;
        case "cart":
         require_once("backend/cart.php");
        break;
        case "loading":
         require_once("frontend/loading.php");
        break;
        case "contact":
         require_once("frontend/contact.php");
        break;
        case "profile":
         $user = new User($mysqli);
         if($user->checkLogin($_SESSION['userName'],$_SESSION['password'])==true)
         require_once("user/index.php");
         else
         require_once("backend/home.php");
        break;
        default:
        require_once("backend/home.php");
      break;
     }
     ?>
   </main>
</body>

</html>