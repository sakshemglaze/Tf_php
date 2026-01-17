<?php include_once 'config.php'; ?>
<?php
    include_once 'services/url.php';
    $url = new UrlService();
   $prodId = "647dcf429d126d0588ea6e3a"; //$_GET['id'];
    require_once 'post.php';
        $datap1 =  get(
                'api/guest/products/by-seller-related/' . $id, 
                true
              );
              $datap = json_decode($datap1);
              //print_r($datap->products);
              ?>

<div class="row">
    <?php
    if(isset($datap->products)){
        //print_r($datap->products);
     foreach ($datap->products as $product): ?>
    <div class="col-lg-3">
        <div class="card border-0 shadow-sm" style="margin:10px">
            <div class="card-body text-center">
                <span class="border1 p-3 text-center w-100 d-block rounded-10">
                 <img src="/image.php?image=<?php echo isset($product->images[0]->id) ? $product->images[0]->id : '\images\TradersFind.webp'?>" alt="<?php echo $product->productName  ?>" width="140" />
                </span>
                <div class="single-line"><h3 class="mt-1 fs-5">
                    <a href="/<?php echo $url->getProductUrl((isset($product->productUrl) && !empty($product->productUrl)) ? $product->productUrl:$product->productName, $product->id) ?>"
                    class="text-blue"> <?php echo $product->productName ?>
                </a></h3> </div>
               
                <button onclick="openPopup1()"  class="btn-primary-gradiant w-100 pt-2 pb-2 mt-1" >
                    <img src="assets/images/mail-solid.png" alt="enquiry" /> Send Enquiry
                </button>
            </div>
        </div>
    </div>
    <?php endforeach; 
    }?>
</div>
