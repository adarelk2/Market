<section class="container center bg-white">
   <div class="col-12">
<h2 class="text-center mb-3">
            Edit Username
         </h2>
         <div class="row justify-content-between col-8 m-auto">
            <form id="id_SearchUser" method="POST" class="col-12">
            <label class="col-form-label mr-2 col-md-3" for="login_userName">Username:</label>
            <input type="text" name="userName" id="id_userName" class="form-control col-md-8 mb-2" required=""
               placeholder="Enter your Username">
         </div>
         <div id="error_login" class="text-danger text-center "></div>
         <div class="m-auto text-center">
            <button type="submit" class="btn btn-dark mt-2 mb-2">Search</button>
         </form>

         </div>
         <div class="row justify-content-between col-8 m-auto">
            <form id="edit_user" method="POST" class="col-12">
            <label class="col-form-label mr-2 col-md-3" for="edit_userName">Username:</label>
            <input type="text" name="userName" id="edit_userName" class="form-control col-md-8 mb-2" required=""
               placeholder="Enter your Username">
               <label class="col-form-label mr-2 col-md-3" for="edit_password">Password:</label>
            <input type="text" name="userName" id="edit_password" class="form-control col-md-8 mb-2" required=""
               placeholder="Enter your Username">
               <label class="col-form-label mr-2 col-md-3" for="edit_email">E-mail:</label>
            <input type="text" name="userName" id="edit_email" class="form-control col-md-8 mb-2" required=""
               placeholder="Enter your Username">
               <label class="col-form-label mr-2 col-md-3" for="edit_balance">Balance:</label>
            <input type="number" name="userName" id="edit_balance" class="form-control col-md-4 mb-2" required=""
               placeholder="Enter your Username">
         </div>
         <div id="error_login" class="text-danger text-center "></div>
         <div class="m-auto text-center">
            <button type="submit" class="btn btn-dark mt-2 mb-2">Save</button>
         </form>

         </div>
   </div>
   </section>