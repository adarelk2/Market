<section class="container center bg-white">
   <div class="col-12 p-2">
<h2 class="text-center mb-3">
   Add new products
</h2>
<div class="row col-12 justify-content-between text-center" id="id_addProduct">
<form id="add_product" method="POST" class="col-md-8 m-auto">
   <div class="col-md-5 m-auto">
      <label for="id_Title">Title:</label>
   </div>
   <div class="col-md-5 m-auto">
      <input type="text" class="form-control mb-3" id="id_title">
   </div>
   <div class="col-md-5 m-auto">
      <label for="id_Title">Price:</label>
   </div>
   <div class="col-md-5 m-auto">
      <input type="number" class="form-control"  id="id_price">
   </div>
   <div class="col-md-5 m-auto">
      <label for="id_Title">Keys:</label>
   </div>
   <div class="col-md-5 m-auto">
      <input type="text" class="form-control" id="id_key" >
   </div>
   <div class="col-md-5 m-auto">
      <label for="id_Title">Image:<small>(link)</small></label>
   </div>
   <div class="col-md-5 m-auto">
      <input type="text" class="form-control" id="id_img">
   </div>
   <div class="col-md-5 m-auto">
      <label for="id_Title">Category:<small>(category_1,category_2...category_6)</small></label>
   </div>
   <div class="col-md-5 m-auto">
      <select id="id_category" class="form-control">
      <option>category_1</option>
      <option>category_2</option>
      <option>category_3</option>
      <option>category_4</option>
      <option>category_5</option>
      <option>category_6</option>
      </select>
   </div>
   <div class="col-md-5 m-auto">
      <label for="id_Title">Subject:</label>
   </div>
   <div class="col-md-5 m-auto">
      <input type="text" class="form-control" id="id_subject" style="min-height:200px;">
   </div>
   <div class="m-auto text-center">
   <button class="btn btn-success mt-3">Add product</button>
   </div>
</form>

      
 </div>
</div>
   </section>