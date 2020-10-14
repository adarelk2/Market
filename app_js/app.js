import {declareViewEvent} from "./declareViewEvent.js";
import {loadUser,data,checkProfile} from "./user_manager.js";
import {createApi,makeApi,createCart} from "./market_manager.js";
window.onload = ()=>{
   init();
}
const init = ()=>{
   declareViewEvent();
   checkLocalStorage();
   loadUser();
   doApi();
   createCart(data.cart);
   checkProfile();
}
const doApi = async ()=>{
   let url = "core/items.php";
   let data = await makeApi(url);
   createApi(data);
}
const checkLocalStorage = ()=>
{
if(localStorage["marketShop"])
{
   data.cart = JSON.parse(localStorage.getItem("marketShop"));
}

}
