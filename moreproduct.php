<?php include 'config.php'; ?>
<?php
   $prodId = "647dcf429d126d0588ea6e3a"; //$_GET['id'];
    require_once 'post.php';
        $datap1 =  get(
                'api/guest/products/by-seller-related/' . $prodId, 
                true
              );
              $datap = json_decode($datap1);
              //print_r($datap->products);
              ?>

<link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/moreprod.css" />
<div class="row">
    <?php foreach ($datap->products as $product): ?>
    <div class="col-lg-3">
        <div class="card border-0 shadow-sm">
            <div class="card-body text-center">
                <span class="border1 p-3 text-center w-100 d-block rounded-10">
                 <img src="image.php?image=<?php echo $product->images[0]->id?>" alt="<?php echo $product->productName ?>" width="140" />
                </span>
                <div class="single-line"><h3 class="mt-1 fs-5">
                    <a [href]="url.php?getProductUrl($product->productName,$product->id)"
                    class="border-bottom-1 text-blue"> <?php echo $product->productName ?>
                </a></h3> </div>
                <hr />
                <button (click)="openPostRequirement(product.productName)"  class="btn-outline-gradiant btn btn-sm mt-1" >
                    <img src="assets/images/mail-solid.png" alt="" /> Send Enquiry
                </button>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>