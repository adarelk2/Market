import {makeLogin,getUsername,addNewProduct} from "./admin_manager.js";
export const declareViewEvents = ()=>
{
   let login = document.getElementById("id_login");
   let edit_User = document.getElementById("id_SearchUser");
   let burger = document.getElementById("burger");
   let add_Product = document.getElementById("add_product");
   if(add_Product)
   {
      add_Product.addEventListener("submit",(e)=>{
         e.preventDefault();
         let data ={
            title:document.getElementById("id_title").value,
            price:document.getElementById("id_price").value,
            key:document.getElementById("id_key").value,
            img:document.getElementById("id_img").value,
            subject:document.getElementById("id_subject").value,
            cate:document.getElementById("id_category").value
         };
         addNewProduct(data);
      })
   }
   if (burger) {
      burger.addEventListener("click", () => {
         let nav = document.querySelector("nav");
         if (nav.className == "d-none d-md-block")
            nav.className = "d-block d-md-block";
         else if (nav.className = "d-block d-md-block")
            nav.className = "d-none d-md-block";
      })
   }
   if(login)
   {
   login.addEventListener("submit", function(e){
      e.preventDefault();
      let flag = true;
      document.getElementById("error_login").innerHTML = "";
      let userName = document.getElementById("login_userName").value;
      let password = document.getElementById("login_password").value;
      if(userName.length <=5)
      {
         flag = false;
      document.getElementById("error_login").innerHTML = "Username is too short, try again<br>";
      }
      if(password.length <=5)
      {
         flag = false;
         document.getElementById("error_login").innerHTML += "Password is too short, try again";
      }
      if(flag == true)
      {
         makeLogin(userName,password);
      }

   })
}
if(edit_User)
{
   edit_User.addEventListener("submit", function(e){
      document.getElementById("error_login").innerHTML = "";
      e.preventDefault();
      let userName = document.getElementById("id_userName").value;
      getUsername(userName);
   })

}
}