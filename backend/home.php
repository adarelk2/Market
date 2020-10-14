<?php 
function main()
{
   ?>
<section class="container">
<h1 class="text-center">
   Our products
</h1>
<div class="row justify-content- align-items-start">
<div class="col-lg-2 bg-dark p-2 text-center">
<h2 class="text-white">
Category
</h2>
<button data-cate="category_1" class="btn bg-white mb-2 btn_category">Category 1</button>
<button data-cate="category_2" class="btn bg-white mb-2 btn_category">Category 2</button>
<button data-cate="category_3" id="btn_category" class="btn bg-white mb-2 btn_category">Category 3</button>
<button data-cate="category_4" id="btn_category" class="btn bg-white mb-2 btn_category">Category 4</button>
<button data-cate="category_5" id="btn_category" class="btn bg-white mb-2 btn_category">Category 5</button>
<button data-cate="category_6" id="btn_category" class="btn bg-white mb-2 btn_category">Category 6</button>
</div>
<div class="col-md-9 p-2 m-auto">
<div class="row justify-content-between" id="id_items">

</div>
</div>
</div>
</section>
<?php 
}
echo main();
?>