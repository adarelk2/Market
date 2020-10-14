<?php
class UserClass
{
   protected $mysqli;
   private $password;
   public $userName;
   public $email;
   public $balance;
   protected $connected;
   protected $level;
   function UserClass($_mysqli)
   {
      $this->mysqli = $_mysqli;
   }
 
   function checkLogin($_userName,$_password)
   {
         $checkLogin = $this->mysqli->query("Select *from users where userName='$_userName' and password='$_password'")->num_rows;
         if($checkLogin ==1)
         {
         $this->userName = $_userName;
         $this->password = $_password;
         $result = $this->mysqli->query("Select *from users where userName='$_userName' and password='$_password'")->fetch_array();
         $this->email = $result['email'];
         $this->balance = $result['balance'];
         $this->level = $result['level'];
         $this->connected = true;
         return true;
         }
         else
        return false;
   }
   function makeRegister($_email,$_user,$_password)
   {
      $message = "Register was faild!";
      $result = $this->mysqli->query("Select userName,email from users where userName='$_user'")->num_rows;
      if($result ==0)
      {
         $sql = "INSERT INTO users (userName, password, email, balance,level)
         VALUES ('$_user', '$_password','$_email', 0,0)";
      
      if ($this->mysqli->query($sql) === TRUE) {
       $message = "Register was successfully!";
      } 
   }
   else
   $message = "Username or email is alrady exsit";

   return $message;
}
function saveDataUser($_user,$_email,$_password,$_newPassword)
{
   if($this->connected==true)
   {
      $message = "Data saved successfully";
      $resultUserName = $this->mysqli->query("Select userName from users where userName='$_user' and  userName !='$this->userName'")->num_rows;
      $resultEmail = $this->mysqli->query("Select email from users where userName !='$this->userName' and email='$_email'")->num_rows;
      $resultPassword = $this->mysqli->query("Select password from users where password='$_password' and userName ='$this->userName'")->num_rows;
      if($resultUserName >=1 )
      $message = "Error, This userName is exist in our system";
      else if($resultEmail >=1)
      $message = "Error, This email is exist in our system";
      else if($resultPassword !=1)
      $message = "Error, Your password is worng";
      else
      {
         if($_newPassword ==null)
         $_newPassword = $_password;
         $this->mysqli->query("UPDATE users set userName='$_user',email='$_email',password='$_newPassword' where userName='$this->userName'");
         $this->mysqli->query("UPDATE orders set userName='$_user' where userName='$this->userName'");
         $this->mysqli->query("UPDATE loading set userName='$_user' where userName='$this->userName'");
      }
      return $message;
   }  
}
function makeOrder($_id)
{
   if($this->connected==true)
   {
      $time = date("Y/m/d");
      $result = $this->mysqli->query("Select *from products where id='$_id'")->num_rows;
      if($result >=1)
      {
         $sql = "INSERT INTO orders (userName, idItem, data)
         VALUES ('$this->userName', $_id,'$time')";
         $this->mysqli->query($sql);
         $this->mysqli->query("UPDATE products set mode=1 where id=$_id");
      }
    
   }
}
function getOrder($_id,$_data,$i)
{
   if($this->connected==true)
   {
      $result = $this->mysqli->query("Select *from products where id='$_id'")->fetch_array();
      echo "<div class='mt-2 row col-12 mb-2 justify-content-between'><div class='col-lg-1'>$i.</div>
            <div class='col-lg-4'>$_data</div>
            <div class='col-lg-4'>$result[my_Keys]</div>
            <div class='col-lg-3'> $result[price]usd</div></div>";
   } 
}
function makeLoading($_count)
{
   if($this->connected==true)
   {
      $message = "error";
      $time = time();
      $result = $this->mysqli->query("Select *from loading where userName='$this->userName' and mode=0 order by time desc")->fetch_array();
      if($time - $result['time'] > 300 )
      {
      $this->mysqli->query("INSERT into loading(userName, count, time, mode)VALUES('$this->userName', '$_count', $time, 0)");
      $message ="your request was sent, thank you!";
      }
      else
      $message ="Please wait a 5 min before using this command";
      return $message;

   }
}
   function getUserName()
   {
      if($this->connected==true)
     return $this->userName; 
     else
     return "error";
   }
   function getEmail()
   {
      if($this->connected==true)
     return $this->email; 
     else
     return 0;
   }
   function getBalance()
   {
      if($this->connected==true)
     return $this->balance; 
     else
     return 0;
   }
   function checkLevel()
   {
      if($this->connected==true)
    {
       if($this->level == 2)
       return true;
    }
   }
   function query($userName,$colmn,$data)
   {
      if($this->connected==true)
      $this->mysqli->query("UPDATE users set $colmn='$data' where userName='$userName'");
   }
}



?>