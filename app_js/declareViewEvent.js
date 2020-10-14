import { makeLogin, data, resetData,makeRegister,saveDataUser} from "./user_manager.js";
import { doOrder, checkButtonOrder,messageBox,doLoading,dataApi, createCart,createApi } from "./market_manager.js";
export const declareViewEvent = () => {
   let payNow = document.getElementById("pay_Now");
   let emptyCart = document.getElementById("empty_Cart");
   let login = document.getElementById("id_login");
   let register = document.getElementById("id_register");
   let loading = document.getElementById("form_loading");
   let burger = document.getElementById("burger");
   let registerBox = document.querySelector("#closeLightBox");
   let LoginBox = document.querySelector("#closeLightBoxLogin");
   let changeData = document.querySelector("#id_changeData");
   let btn_category = document.querySelector("#btn_category");
   if(btn_category)
   {
      $( ".btn_category" ).each(function(index) {
         $(this).on("click", function(){
            $( ".btn_category" ).removeClass("btn-silver");
            $(this).toggleClass(" btn-silver");
             var target = $(this).data('cate');
             console.log(target);

             let ar = {
                level:dataApi.level,
                items:[]
             };
             ar.items = dataApi.items.filter(item=>{
                if(item.cate == target)
                return true;
            })
            createApi(ar);
         });
     });

   
   }

   if(changeData)
   {
      changeData.addEventListener("submit",function(e){
         e.preventDefault();
         let userName = document.getElementById("profile_userName");
         let email = document.getElementById("profile_Email");
         let oldPassword = document.getElementById("profile_OldPassword");
         let newPassword = document.getElementById("profile_NewPassword");
         if(userName.value.length <=5)
         messageBox("Error, userName lengths must be a number that over of 6 ");
         else if(email.value.length <=5)
         messageBox("Error, email is invaild");
        else if (email.value.indexOf("@") == -1 || email.value.indexOf(".",email.value.indexOf("@")+1) == -1) 
            messageBox("Error, email is invaild");
         else if(oldPassword.value.length <=5 || newPassword.value.length <=5 && newPassword.value !="")
            messageBox("Error, Password lengths must be a number that over of 5 ");
            else
            {
               let obj ={
                  userName:userName.value,
                  email:email.value,
                  oldPassword:oldPassword.value,
                  newPassword:newPassword.value
               };
               saveDataUser(obj);
            }
      })
   }
   if(loading)
   {
      loading.addEventListener("submit",function(e){
         e.preventDefault();
         let order = document.getElementById("id_coins");
         let captcha = document.getElementById("loading_Captcha");
         if(order.value.length <=140)
            messageBox("Error, Order id is invaild");
            else
            {
               let obj = {order:order.value,captcha:captcha.value};
               doLoading(obj);
               
            }
      })
   }
   register.addEventListener("submit", function (e) {
      e.preventDefault();
      document.getElementById("error_Register").innerHTML = "";
      let flag;
      let userName = document.getElementById("register_userName").value;
      let password = document.getElementById("register_Password").value;
      let email = document.getElementById("register_Email").value;
      let captcha = document.getElementById("captcha").value;
      if (userName.length <= 6) {
         document.getElementById("error_Register").innerHTML += "Username is too short<br>";
         flag = false;
      }
      if (password.length <= 6) {
         document.getElementById("error_Register").innerHTML += "Password is too short<br>";
         flag = false;
      }
      if (password.indexOf("<") != -1 || userName.indexOf("<") != -1) {
         document.getElementById("error_Register").innerHTML += "Data is invaild";
         flag = false
      }
      if (email.indexOf("@") == -1 || email.indexOf(".",email.indexOf("@")+1) == -1) {
         document.getElementById("error_Register").innerHTML += "E-mail is invaild";
         flag = false
      }
      if (flag != false) {
         let obj = {
            username: userName,
            password: password,
            email:email,
            captcha:captcha
         };
         makeRegister(obj);
      }

   })


   if (payNow) {
      payNow.addEventListener("click", () => {
         if (data.cart.length >= 1)
            if (confirm('Do you approve the purchase?')) {
               doOrder();
            }
      })
   }
   if (emptyCart) {
      emptyCart.addEventListener("click", () => {
         if (confirm('Are you sure you want to empty your cart?')) {
            resetData();
            checkButtonOrder();
            document.getElementById("id_cartItems").innerHTML = "";
         }
      })
   }
   login.addEventListener("submit", function (e) {
      let flag;
      e.preventDefault();
      let userName = document.getElementById("login_userName").value;
      let password = document.getElementById("login_password").value;
      document.getElementById("error_login").innerHTML = "";

      if (userName.length <= 2) {
         document.getElementById("error_login").innerHTML += "Username is too short<br>";
         flag = false;
      }
      if (password.length <= 3) {
         document.getElementById("error_login").innerHTML += "Password is too short<br>";
         flag = false;
      }
      if (password.indexOf("<") != -1 || userName.indexOf("<") != -1) {
         document.getElementById("error_login").innerHTML += "Data is invaild";
         flag = false
      }
      if (flag != false) {
         let obj = {
            username: userName,
            password: password
         };
         makeLogin(obj);
      }

   })

   if (burger) {
      burger.addEventListener("click", () => {
         let nav = document.querySelector("nav");
         if (nav.className == "d-none d-md-block")
            nav.className = "d-block d-md-block";
         else if (nav.className = "d-block d-md-block")
            nav.className = "d-none d-md-block";
      })
      if (registerBox) {
         registerBox.addEventListener("click", () => {
            document.querySelector(".lightBox").className = "lightBox d-none";
            document.querySelector(".Register").className = "Register d-none";
            document.querySelector(".Login").className = "Login d-none";

         })
      }
      if (LoginBox) {
         LoginBox.addEventListener("click", () => {
            document.querySelector(".lightBox").className = "lightBox d-none";
            document.querySelector(".Register").className = "Register d-none";
            document.querySelector(".Login").className = "Login d-none";
         })
      }
   }

}