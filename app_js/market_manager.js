import {data,resetData} from "./user_manager.js";
import Product from "./Product.js";
import UserClass from "./user_class.js";
export let dataApi = [];
export const addToCart = (_obj)=>
{
   data.cart.push(_obj);
   localStorage.setItem("marketShop",JSON.stringify(data.cart));
   document.getElementById("id_cart").innerHTML = data.cart.length;
   messageBox("Product was added to your cart");
}
export const deleteFromCart = (_id)=>
{
   data.cart = data.cart.filter(item=>{
      return(item.index !=_id)
   });
   localStorage.setItem("marketShop",JSON.stringify(data.cart));
   document.getElementById("id_cart").innerHTML = data.cart.length;
   createCart(data.cart)
   UserClass.getCost();
   checkButtonOrder();
   messageBox("Product was deleted from your cart");

}
export const checkButtonOrder = ()=>
{
   if(data.cost ==0)
   {
      document.getElementById("pay_Now").disabled=true;
   }
}

export const makeApi =async (_url)=>
{
let resp = await fetch(_url);
let data = await resp.json(_url);
dataApi = data;
return data;
}

export const createApi = (_ar)=>
{
   let itemsdiv = document.getElementById("id_items");
   if(itemsdiv)
   {
      if(_ar == null)
         document.getElementById("id_items").innerHTML = "Not found";
      else
      {
document.getElementById("id_items").innerHTML = "";
if(_ar.level ==true)
{
   _ar.items.map(items=>{
      let product = new Product("#id_items",items.id,items.name,items.subject,items.price,items.cate);
      product.adminRender();
    })
}
else
{

   _ar.items.map(items=>{
      let product = new Product("#id_items",items.id,items.name,items.subject,items.price,items.cate,items.img);
      product.render();
    })
       }
}
   }
}

export const createCart = (_obj)=>
{
let itemsdiv = document.getElementById("id_cartItems");
if(itemsdiv)
{
checkButtonOrder();
document.getElementById("id_cartItems").innerHTML = "";
_obj.map(items=>{
let product = new Product("#id_cartItems",items.id,items.name,items.subject,items.price);
product.getCart(items.index);
})
}
}

export const doOrder = ()=>
{
   if(data.cost > data.balance)
   alert("You dont have enough coins for this");
   else
   {
      makeOrder();
   }
}
const makeOrder = ()=>
{
   let idItems =[];
   idItems = data.cart.map(item=>{
      return item.id;
   })
   $.ajax({url: "backend/order.php",type:"POST",data:{data:idItems}, success: function(result){
   alert(result);
   resetData();
   location.reload();
    }});
 
}

export const doLoading =(_obj)=>
{
   
   $.ajax({url: "backend/loading.php",type:"POST",data:{data:_obj}, success: function(result){
    messageBox(result);
    document.querySelector("#captcha_img").src="core/captcha.php";
       }});
}

let timer;
export const messageBox = (_html)=>
{
   let count =45;
   let pause = false;
   clearInterval(timer);
   timer = setInterval(function(){
      if(pause==false)
      {
         count-=0.5;
         if(count >=8)
         {  
            $(".messageBox").css("opacity",`1`);
            $(".messageBox").html(_html);
         }
         else if(count <=8 && count >=0)
         {
            $(".messageBox").css("opacity",`0.${count}`);
            $(".messageBox").html("");
         }
         else
            pause=true;
      }
   },50)

}
