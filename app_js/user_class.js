import {data} from "./user_manager.js";
class UserClass
{
   static  getBalance()
   {
      $(() => {
         $.ajax({
            url: "core/balance.php",
            success: function (result) {
             $("#id_balance").html(result);
             data.balance = result;
             
            }
         });
         
      })
   }
   static getCost = (obj)=>
   {
      data.cost = 0;
     data.cart.map(item=>{
     data.cost += parseInt(item.price);
   })
   let newDiv = document.getElementById("id_cost");
   if(newDiv)
   {
      newDiv.innerHTML = data.cost;
   }

   }
   static getCart = ()=>
   {
      document.getElementById("id_cart").innerHTML = data.cart.length;
   }
   static checkLogin = async ()=>
   {
      let url = "core/check_login.php";
      let resp = await fetch(url);
      let data = await resp.json(); 
      return data;
   }

}

export default UserClass;