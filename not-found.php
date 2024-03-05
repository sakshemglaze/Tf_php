<?php include_once 'config.php'; ?>
<link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/notfound.css" />
<?php
include_once "header.php"
?>
<section class="mt-4 mb-4">
  <div class="container">
    <div class="row">
      <div class="error_bg ">
      <img src="<?php echo BASE_URL; ?>assets/images/error_img.webp" />
      <h1 class="text-center fw-bold mt-5">We <span class="text-danger">couldn't find </span> the page <span class="text-danger"> you're </span> looking for!</h1>
      <button class="bg-dark rounded-2 text-white pt-2 pb-2 fs-5 fw-400 mt-4" (click) = "this.homeF()"> Please check the spelling or try searching something else </button>
      </div>
     </div> 
</div>
</section>
<?php
include_once "footer.php"; ?>