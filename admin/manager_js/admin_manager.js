import {messageBox,makeApi} from "../../app_js/market_manager.js";
import LoadingClass from "./LoaingClass.js";
export const makeLogin = (_user,_pass)=>
{
   $.ajax({url: "../backend/login.php",type:"POST",data:{username:_user,password:_pass}, success: function(result){
      if(result =="true")
      {
      $("#error_login").html("Your login was success");
      setTimeout(function() { window.location=window.location;},1000);
   }
      else
      $("#error_login").html("Faild, please try again");

    }});
}
export const getUsername = (_user)=>
{
   $.ajax({url: "backend/manage_user.php",type:"POST",data:{username:_user}, success: function(result){
     const json = JSON.parse(result);
     if(json ==null)
     $("#error_login").html("Username not found");
      else
      {
         createEditUser(json,_user);
      }
   }
});
}
const createEditUser = (_json,_user)=>
{
   edit_userName.value = _json.data.userName;
   edit_password.value = _json.data.password;
   edit_email.value = _json.data.email;
   edit_balance.value = _json.data.balance;
   let edit_user = document.getElementById("edit_user");
   edit_user.addEventListener("submit",function(e){
      let newData = {userName:edit_userName.value,password:edit_password.value,email:edit_email.value,balance:edit_balance.value};
      e.preventDefault();
   $.ajax({url: "backend/manage_user.php",type:"POST",data:{data:newData,oldUsername:_user}, success: function(result){
      messageBox(result);
   }
   });
   })
}
export const getOrderList = ()=>
{
   let orders = document.getElementById("id_orders");
   if(orders)
   doOrderApi("../admin/backend/orders.php");
}
export const doOrderApi = async(_url)=>
{
let url = _url;
let data = await makeApi(url);
createOrderApi(data);
}
const createOrderApi = (_url)=>
{
   document.getElementById("id_orders").innerHTML ="";

 if(_url !=null)
 {
   _url.map((item,i)=>{
      let order = new LoadingClass("#id_orders",item.order,item.userName,item.time,i);
      order.render();
   })
}
}
export const confirmLoading = (_order,_user,_mode)=>
{
   $.ajax({url: "backend/orders.php",type:"POST",data:{order:_order,userName:_user,mode:_mode}, success: function(result){
      doOrderApi("../admin/backend/orders.php");
   }
   });
}
export const addNewProduct = (_data)=>
{
   $.ajax({url: "backend/products.php",type:"POST",data:{newItem:_data}, success: function(result){
      messageBox(result);
   }
});
}