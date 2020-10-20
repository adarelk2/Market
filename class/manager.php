<?php
class Manager extends User
{
   function addNewProduct($_item)
   {
      $message = "Faild!";
      if($this->level ==2)
      {
         $title = $_item['title'];
         $price = $_item['price'];
         $subject = $_item['subject'];
         $key = $_item['key'];
         $img = $_item['img'];
         $cate = $_item['cate'];
         if (!$this->mysqli -> query("INSERT INTO products (name,subject,my_Keys,mode,price,category,image_url) VALUES ('$title','$subject','$key',0,$price,'$cate','$img')")) 
         {
            echo("Error description: " . $this->mysqli -> error);
         }
         else
         { 
            $message = "done!";        
            return $message;
         }
      } 
   }

   function editProduct($_item)
   {
      $message = "Faild!";
      if($this->level ==2)
      {
         $id = $_item['id'];
         $title = $_item['name'];
         $subject = $_item['subject'];
         $price = $_item['price'];
         $cate = $_item['cate'];
         $sql = "SELECT *from products where id = '$id'";
         if($this->checkColmn($sql) == true)
         {
            $this->mysqli->query("UPDATE products set name='$title',price=$price,subject='$subject',category='$cate' where id =$id");
            $message = "Done!";
         }
      }
      return $message;
   }

   function getData($_user)///data user*
   {
      $sql = "SELECT *from users where userName = '$_user'";
      if($this->checkColmn($sql) == true)
      {
         $result = $this->mysqli->query("SELECT *from users where userName = '$_user'")->fetch_array();
         $data['data']['userName'] = $result['userName'];
         $data['data']['password'] = $result['password'];
         $data['data']['email'] = $result['email'];
         $data['data']['balance'] = $result['balance'];
         return $data;
      }
   }

   function saveData($_json,$_user)
   {
      $sql = "SELECT *from users where userName = '$_user'";
      $message ="done!";
      if($this->checkColmn($sql) == true)
      {
         $result = $this->mysqli->query("SELECT *from users where userName = '$_user'")->fetch_array();
         $newUser = $_json['userName'];
         $newEmail = $_json['email'];
         $newPassword = $_json['password'];
         $newBalance = $_json['balance'];
         if($this->checkColmn("SELECT *from users where userName = '$newUser' and userName !='$_user' ") == true)
         {
            $message = "Error, This userName is exist in our system";
         }
         if($this->checkColmn("Select email from users where userName !='$_user' and email='$newEmail'") == true)
         {
            $message = "Error, This Email is exist in our system";
         }
         else
         {
            $this->mysqli->query("UPDATE users set userName='$newUser',email='$newEmail',password='$newPassword',balance=$newBalance where userName='$_user'");
            $this->mysqli->query("UPDATE orders set userName='$newUser' where userName='$_user'");
            $this->mysqli->query("UPDATE loading set userName='$newUser' where userName='$_user'");
         }
      }
      else
         $message ="Faild!";
      return $message;
   }

   function setLoading($_id)
   {
      $result = $this->mysqli->query("SELECT *from loading where id=$_id")->fetch_array();
      $this->order['id'] = $_id;
      $this->order['userName'] = $result['userName'];
      $this->order['order'] = $result['count'];
      $time =  date('d M Y ',$result['time']);
      $this->order['time'] = $time;
      return $this->order;
   }

   function confrimLoading($_order,$_user,$_mode)
   {
      $message = "Done!";
      $result = $this->mysqli->query("SELECT *from loading where count=$_order and userName='$_user'")->num_rows;
      if($result ==1)
      {
        if($_mode ==1)
         $this->mysqli->query("UPDATE loading set mode =1 where count=$_order and userName = '$_user'");
        else
         $this->mysqli->query("Delete from loading where count=$_order and userName = '$_user'");
      }
      else
         $message = "Faild";
      return $message;
   }
}
?>