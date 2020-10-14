<section class="container center bg-white">
   <div class="col-12">
<h2 class="text-center mb-3">
            Login to Admin panel
         </h2>
         <div class="row justify-content-between col-8 m-auto">
            <form id="id_login" method="POST" class="col-12">
            <label class="col-form-label mr-2 col-md-3" for="login_userName">Username:</label>
            <input type="text" name="userName" id="login_userName" class="form-control col-md-8 mb-2" required=""
               placeholder="Enter your Username">

            <label class="col-form-label mr-2 col-md-3" for="login_password">Password:</label>
            <input type="password" name="password" id="login_password" class="form-control col-md-8 mb-2" required=""
               placeholder="Enter your Password">
         </div>
         <div id="error_login" class="text-danger text-center "></div>
         <div class="m-auto text-center">
            <button type="submit" class="btn btn-dark mt-2 mb-2">Login</button>
         </form>

         </div>
   
   </div>
   </div>
   </section>