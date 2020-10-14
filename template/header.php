<?php
function getHeader()
{
   global $mysqli;
   ?>
<header class="container-fluid">
      <div class="container d-flex justify-content-between">
         <div class="d-md-none center">
            <i class="fas fa-bars" id="burger"></i>
         </div>
         <img src="https://icon-library.com/images/anonymous-icon-png/anonymous-icon-png-2.jpg" class="logo" alt="">
         <?php
         $user = new UserClass($mysqli);
         if($user->checkLogin($_SESSION['userName'],$_SESSION['password']) ==true)
         {
            ?>
            <nav class="d-none d-md-block">
            <a href="index.php?Page=home">Home</a>
            <a href="index.php?Page=contact">Contact</a>
            <a href="index.php?Page=profile">Profile</a>
            <a href="index.php?Page=loading">Buy Coins</a>
         </nav>
            <?php
         }
         else
         {
            ?>
            <nav class="d-none d-md-block">
            <a href="index.php?Page=home"> Home</a>
            <a href="index.php?Page=contact">Contact</a>
            <a href="javascript:lightBox('register');">Register</a>
            <a href="javascript:lightBox('login');">Login</a>
            <a href="index.php?Page=loading">Buy Coins</a>
            </nav>
            <?php
         }
         ?>

         <script>
            const lightBox = (_mode) => {
             
               let lightBox = document.querySelector(".lightBox");
               let register = document.querySelector(".Register");
               let login = document.querySelector(".Login");
              if(lightBox.className == "lightBox d-none")
              if(_mode =="register")
              {
               lightBox.className ="lightBox";
               register.className = "Register";
               login.className = "Login d-none"; 
              }
              else
              {
               lightBox.className ="lightBox";
               login.className = "Login"; 
               register.className = "Register d-none"; 

              }
           
            }
         </script>
         <div class=" d-flex align-items-center">
            <a href="index.php?page=cart"><i class="fas fa-wallet"></i><span id="id_balance">0</span>USD

               </i></a>
         </div>
         <div class="d-flex align-items-center">
            <a href="index.php?Page=cart"><i class="fas fa-shopping-cart" aria-hidden="true"></i></a>
            <div style="width:20px;height:20px;background:#6d6a6b;color:#fff;border-radius:36px;font-size:.8em;"
               class="center ml-1" id="id_cart"></div>

         </div>
      </div>
   </header>
   <?php
}
echo getHeader();
?>