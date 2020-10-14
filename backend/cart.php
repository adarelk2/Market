<?php 
function main()
{
   ?>
<section class="container center">
<div class="col-12">
<h1 class="text-center">
  My cart shoping:
</h1>
<div class="row justify-content-around" id="id_cartItems">

</div>
<div class="row justify-content-between col-md-4 m-auto align-items-center" style="min-height:60px;">
<h2 class="text-dark text-center">
Price: <span id="id_cost"></span>$
</h2>
<button id="pay_Now" class="btn btn-dark">Pay now</button>
<button id="empty_Cart" class="btn btn-dark">Empty cart</button>
</div>
</div>
</section>
<?php 
}
echo main();
?>