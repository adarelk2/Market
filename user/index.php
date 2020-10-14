<?php 


function main()
{
   global $mysqli;
   $user = new UserClass($mysqli);
   $user->checkLogin($_SESSION['userName'],$_SESSION['password']);
   $getUser = $user->getUserName();
   $getEmail = $user->getEmail();
   ?>
<section class="container center" id="id_Profile">
<div class="col-12">
<h1 class="text-center mb-5">
  Change profile
</h1>

<div class="row  justify-content-between m-auto align-items-start" >
<div class="col-md-4 ">
   <div class="p-2 bg-dark">
   <a class="text-white d-block" href="index.php?Page=profile&manage=date">Change date</a>
   <a class="text-white d-block" href="index.php?Page=profile&manage=orders">My orders</a>
   <?php
   if($user->checkLevel() == true)
   {
   ?>
   <a class="text-white d-block" href="admin">AdminPanel</a>
<?php
   }
   ?>
   <a class="text-white d-block" href="index.php?Page=profile&manage=logOut">LogOut</a>

</div>
</div>
<div class="col-md-8 text-center">
   <div class="p-2">
   <form id="id_changeData">
   <div class="row justify-content-between col-12 m-auto">
            <label class="col-form-label mr-2 col-md-3" for="profile_userName">Username:</label>
            <input type="text" name="userName" id="profile_userName" value="<?php echo $getUser; ?>" class="form-control col-md-8 mb-2" required="">
            <label class="col-form-label mr-2 col-md-3" for="profile_Email">E-mail:</label>
            <input type="text" name="email" id="profile_Email" value="<?php echo $getEmail;?>" class="form-control col-md-8 mb-2" required="">
            <label class="col-form-label mr-2 col-md-3" for="profile_OldPassword">Old Password:</label>
            <input type="password" name="password" id="profile_OldPassword" class="form-control col-md-8 mb-2" required=""
               placeholder="Enter your old Password">
               <label class="col-form-label mr-2 col-md-3" for="profile_NewPassword">New Password:</label>
            <input type="password" name="password" id="profile_NewPassword" class="form-control col-md-8 mb-2"
               placeholder="Empty if you dont need this">
         </div>
         <div id="error_Register" class="text-danger text-center "></div>
         <div class="m-auto text-center">
            <button type="submit" class="btn btn-dark mt-2">Save</button>
         </div>
         </form>
      </div>
   </div>
</div>
</div>
</div>
</section>
<?php 
}
function orders()
{
   ?>
<section class="container center" id="id_Profile">
<div class="col-12">
<h1 class="text-center mb-5">
 My orders
</h1>

<div class="row  justify-content-between m-auto align-items-start" >
<div class="col-md-4 ">
   <div class="p-2 bg-dark">
   <a class="text-white d-block" href="index.php?Page=profile&manage=date">Change date</a>
   <a class="text-white d-block" href="index.php?Page=profile&manage=orders">My orders</a>
   <a class="text-white d-block" href="index.php?Page=profile&manage=logOut">LogOut</a>
</div>
</div>
<div class=" col-md-8 text-left">
   <div class="py-2">
      <div class="row col-12 bg-dark text-white m-auto justify-content-between ">
 <?php
 global $mysqli;
   $user = new UserClass($mysqli);
   if($user->checkLogin($_SESSION['userName'],$_SESSION['password'])==true)
   {
      $myUser = $user->getUserName();
      $query = $mysqli->query("Select * from orders where userName='$myUser' order by id desc");
      $keys = [];
      echo "<div class='mt-2 row col-12 mb-2'><div class='col-1 col-lg-1'>#</div>
            <div class='col-4 col-lg-4'>Data</div>
            <div class='col-4 col-lg-4'>Keys</div>
            <div class='col-2 col-lg-3'>Paid</div></div>";
      for($i=0;$row = $query->fetch_array();$i++)
      {
          $user->getOrder($row['idItem'],$row['data'],$i);
      }
   }

 ?>
 </div>
</div>
</div>
</div>
</section>
<?php 
}
if($_SESSION['userName'])
switch($_GET['manage'])
{
   case "date":
      echo main();
   break;
   case "orders":
      echo orders();
   break;
   case "logOut":
      session_destroy();
      echo "<script>location.href='index.php';</script>";
   break;
   default:
   echo main();
break;
}
?>