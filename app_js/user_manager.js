import UserClass from "./user_class.js";
import { messageBox } from "./market_manager.js";
export let data = {
   balance:0,
   cart:[],
   cost:0};
export const getBalance =()=>
{
let balance =  UserClass.getBalance();
}
export const getCart =()=>
{
let cart =  UserClass.getCart();
}
export const getCost =()=>
{
let cost =  UserClass.getCost(data.cart);
}
export const loadUser = ()=>
{
   getBalance();
   getCart();
   getCost();
}
export const resetData = ()=>
{
   data.cost=0;
   data.cart = [];
   localStorage.setItem("marketShop","");
   loadUser();

}

export const saveDataUser = (_obj)=>
{
   $.ajax({url: "user/change_Data.php",type:"POST",data:{data:_obj}, success: function(result){
      messageBox(result);
   }
});
} 

export const checkLogin = async()=>
{
   let login =  await UserClass.checkLogin();
}
export const makeLogin = (obj)=>
{
   $.ajax({url: "backend/login.php",type:"POST",data:{username:obj.username,password:obj.password}, success: function(result){
      if(result =="true")
      {
      $("#error_login").html("Your login was success");
      setTimeout(function() { window.location=window.location;},1000);
   }
      else
      $("#error_login").html("Faild, please try again");

    }});
}

export const makeRegister = (_obj)=>
{
   $.ajax({url: "backend/register.php",type:"POST",data:{username:_obj.username,password:_obj.password,email:_obj.email,captcha:_obj.captcha}, success: function(result){
      $("#error_Register").html(result);
    }});
    document.querySelector(".captcha-image").src="core/captcha.php";

}

export const checkProfile = async()=>
{
   let profile = document.getElementById("row_profile")
   if(profile)
   {
    let user = await UserClass.checkLogin();
    doProfile(user);
}
}
export const doProfile = (_user)=>
{
if(_user != true)
document.getElementById("id_Profile").innerHTML = "<h2>You have must login for see this page</h2>";
}
export const editProductManager = (item,mode)=>
{
if(mode ==1)
{
   $.ajax({url: "admin/backend/products.php",type:"POST",data:{item}, success: function(result){
      messageBox(result);
    }});  
}
}
