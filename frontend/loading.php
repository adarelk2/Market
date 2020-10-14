<?php 
function main()
{
  global $mysqli;
  global $explaneLoading;
  $user = new UserClass($mysqli);
   ?>
<section class="container center" id="id_Loading">
<div class="col-12 col-md-6">
<h1 class="text-center">
  Loading coins page
</h1>
<h2 class="text-center">
  Send a payment to: <small>bc1qk8y4u7nwp0ujn0wqzmjc9qu7ed3wkg9mcqvrlwdn3zch27jy5n4s3zygaj - (BTC)</small>
</h2>
<h4>
steps by steps:
</h4>
<p>
<?php echo $explaneLoading;?>
</p>
<form method="POST" id="form_loading">
  <input type="text" maxlength=180 class="form-control" placeholder="Order id link" id="id_coins">
  <div class="elem-group">
    <label for="captcha">Security: </label>
    <img src="core/captcha.php" alt="CAPTCHA" id="captcha_img" class="captcha-image">
    <br>
    <input type="text" id="loading_Captcha" class="form-control col-md-4" placeholder="Code">
</div>
  <div class="m-auto text-center">
  <button type=submit class=" mt-2 btn btn-dark">Get coins</button>
</div>

</form>
</div>
</section>
<?php 
}
echo main();
?>