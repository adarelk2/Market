<?php

class ItemsClass
{
   private $mysqli;

   function ItemsClass($_mysqli)
   {
      $this->mysqli = $_mysqli;

   }
   function setItem($id)
   {
      $result = $this->mysqli->query("Select *from products where id=$id");
      $result = $result->fetch_array();
      $this->id = $result['id'];
      $this->price = $result['price'];
      $this->name = $result['name'];
      $this->subject = $result['subject'];
      $this->mode = $result['mode'];
      $this->img = $result['image_url'];
      $this->cate = $result['category'];
      return $this;
   }
   function getPrice()
   {
      return $this->price;
   }
 


}

?>