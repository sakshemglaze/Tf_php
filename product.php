<?php include_once 'config.php'; 
    include_once 'services/url.php';
    include_once 'services/masked.php';
    $urlService = new UrlService(); 

    include_once "whatsapp.php";
    $whatsappUrl=new WhatsappUrl();
    $maskedService = new MaskingService();
?>

<div class="cardproduct card-shadow rounded-10 bg-white" style="border: 0.5px solid #ddd;">
    <div class="swiper ">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="container">
                    <div class="row border-bottom">
                        <div class="col-md-5 position-relative star-listing2">
                        <div class="" style="margin-top: 10px;width: 100%; float: left;">
                           <?php
                           //print_r($prodData);
                            if (isset($prodData->seller) && $prodData->seller->isVerifiedSeller) {
                                echo '<div style="margin: auto; display: table;">';
                                echo '<img class="lazy" data-src="' . BASE_URL . 'assets/images/verified2.png" width="74" height="22" alt="Verified_Product" style="float: left; width: 60px;">';
                                if ($prodData->isFeatured) {
                                    echo '<img class="lazy" data-src="' . BASE_URL . 'assets/images/Star_listing.png" width="80" height="22" alt="Start_Listing" style="width: 70px; float: left; padding-left: 10px;">';
                                }
                                echo '</div>';
                            }
                            ?>
                              <?php
                              if(isset($prodData->images) && count($prodData->images) > 0) {
                               $newsto = IMAGE_URL . $prodData->images[0]->id . ".webp";
                              } else {
                                $newsto = BASE_URL . "assets/images/TradersFind.webp";
                              }
                                 ?>
                               </div> 
                            <div class="border-end p-3 pt-5 border_img border_img2">
                            <img src="<?php echo $newsto; ?>" alt="<?php echo $prodData->productName ?>" style="width: 160px;">
                                <div class="d-flex mt-3 d-center">
                               
                                <button onclick="openPopup()" class="btn-primary-gradiant btn btn-sm w-100 d-center">
                                            Ask price</button>
                                </div>
                            </div>
                        </div>
                            <div class="col-md-7 position-relative p-3">
                            <?php 
                            $rating = 0;
                            $rating = $prodData->rating;
                            //include 'services/rating.php';  ?>
                                <span class="verified2">
        <?php if ($rating === 1) : ?>
            <ul class=" d-flex">
            <li><img src="<?php echo BASE_URL; ?>assets/images/level/l1.png" alt="Rating1" width="15" height="20"/></ul>
        <?php elseif ($rating === 2) : ?>
            <ul class=" d-flex" >
            <li><img src="<?php echo BASE_URL; ?>assets/images/level/l2.png" alt="Rating2" width="15" height="20"/></ul>
        <?php elseif ($rating === 3) : ?>
            <ul class=" d-flex">
            <li><img src="<?php echo BASE_URL; ?>assets/images/level/l3.png" alt="Rating3" width="15" height="20"/></ul>
        <?php elseif ($rating === 4) : ?>
            <ul class=" d-flex">
            <li><img src="<?php echo BASE_URL; ?>assets/images/level/l4.png" alt="Rating4" width="15" height="20"/></ul>
        <?php elseif ($rating === 5) : ?>
            <ul class=" d-flex">
            <li><img src="<?php echo BASE_URL; ?>assets/images/level/l5.png" alt="Rating5" width="15" height="20"/></ul>
        <?php endif; ?>
    </span>
    
                                    <div class="single-line">
                                    <a href="/<?php echo $urlService->getProductUrl(isset($prodData->productUrl)?$prodData->productUrl:$prodData->productName) ?>" target="_blank" title="Product Page">
                                            <h2 class="fs-5 about_text2" style="color:rgb(216, 71, 119);">
                                            <?php    
                                            print_r( $prodData->productName);
                                            ?>
                                            </h2> </a>
                                    </div>
                                    <div class="fs-8 ">
                                        <ul role="list" class="list_box">
                                            <?php if (!empty($prodData->productDescription)) { ?>
                                                  <?php foreach (array_slice(json_decode($prodData->specifications, true), 0, 4) as $spec) { ?>
                                                      <li role="listitem" tabindex="0" class="single-line small">
                                                        <span><b><?php echo $spec['SpecificationName']; ?> :</b> <?php echo $spec['SpecValue']; ?></span>
                                                      </li>
                                                  <?php } ?>
                                            <?php } else { ?>
                                                  <?php foreach (array_slice(json_decode($prodData->specifications, true), 0, 4) as $spec) { ?>
                                                     <li role="listitem" tabindex="0" class="single-line small">
                                                       <span><b><?php echo $spec['SpecificationName']; ?> :</b> <?php echo $spec['SpecValue']; ?></span>
                                                    </li>
                                                  <?php } ?>
                                             <?php } ?>
                                         </ul>
                                         <a href="/<?php echo $urlService->getProductUrl($prodData->productName, $prodData->id)?>" title="Product Page" target="_blank" style="color: palevioletred;" > View more...</a>
                                    </div>



                                    <br>
                              <div class="d-flex mt-1 about_text2 small">
                                        
                                        <img src="<?php echo BASE_URL ?>assets/images/house.png" alt="Location_seller" width="18" height="19" class="me-3 w-18" />
                                        <b>Company:</b>
                                            <a href="/<?php if(isset($prodData->seller)) {
                                            echo $urlService->getSellerUrl($prodData->seller->sellerCompanyName,$prodData->seller->id); } ?>" style="color: palevioletred;" target="_blank"> 
                                            <h3 class="single-line"><font size="2" style="color: palevioletred;">
                                                <?php if(isset($prodData->seller)) { print_r($prodData->seller->sellerCompanyName); } ?>
                                            </font></h3>
                                            </a> 
                                    </div>
                                    <div class="d-flex small mt-1 about_text2">
                                        <img src="<?php echo BASE_URL ?>assets/images/location-3.svg" width="18" height="19" alt="Seller_Location" class="me-3 w-18" />
                                        <b>Office : </b>
                                        <a 
                                            target="_blank">
                                            <span>
                                              <?php if(isset($prodData->seller)) {
                                                print_r($prodData->seller->state); }
                                                 ?>
                                                 </span>
                                        </a>
                                    </div>

                                    <div class="d-flex small mt-1 about_text2">
                                        <img src="<?php echo BASE_URL ?>assets/images/service_area.png" width="18" height="19" alt="Service_area" class="me-3 w-18" />
                                        <b>Service Area : </b>
                                        <a  target="_blank">
                                            <span 
                                  class="service-area ">
                                  <?php if(isset($prodData->seller)) { $prodData->seller->mainMarkets; }
                                   ?>
                                            </span>
                                            <span class="service-area ">
                                                <?php if(isset($prodData->seller)) {
                                               print_r(  $prodData->seller->state);       }
                                               ?>
                                               </span>
                                        </a>
                                    </div>
                                    <div class="d-flex small mt-1 single-line">
                                        <?php if( $prodData->brand){?>
                                            <span  class="single-line"> <b>Brands : </b> 
                                            <?php
                                           print_r( $prodData->brand);
                                            ?>
                                            </span>
                                            <?php } ?>
                                    </div>
                                    <div class="d-flex small mt-1">
                             <?php if (isset($prodData->seller->Category ) ){ ?>
                              <b>Other Category: </b>
                           <span class="single-line">
                           <?php echo $prodData->seller->Category; ?>
                          </span>
                             <?php } ?>
                            </div>
                                   
                        </div>                        
                    </div>
                    <div class="row gx-2 mb-5 mt-1 gy-3 gy-md-2">
                                <div class="col-md-4">
                                    <button class="btn btn-sm btn-light w-100 d-center"  title="Seller_Phone" href="#">
                                        <img src="<?php echo BASE_URL ?>assets/images/phone.png" width="18" height="17" class="w-18 me-2"
                                            alt="Phone" /> <?php if(isset($prodData->seller)) {
                                            $maskedService->getMaskedNumber($prodData->seller->sellerVirtualContactPhone); }
                                            ?>
                                       
                                    </button>
                                </div>
                                <div class="col-md-4 ">
                                    <a href="  <?php if(isset($prodData->seller)) { echo $whatsappUrl->getProductToWhatsapp($prodData->productName,$prodData->id,get_object_vars($prodData->seller)) ; }?>"                                
                          target="_blank" class="whatsappbtn btn btn-sm w-100">
                                        Connect on whatsapp
                                        
                                    </a>
                                </div>
                                <div class="col-md-4 ">
                                 
                                    <button onclick="openPopup()"
                                        class="btn-outline-gradiant btn btn-sm w-100 d-center">
                                        <img src="<?php echo BASE_URL ?>assets/images/mail-black.png" width="14" height="12"
                                            class="me-2 w-18" alt="Mail_" />
                                        Send Inquiry
                                    </button>
                                    
                                </div>
                            </div>
                </div>

            </div>
        </div>
    </div>
 </div>
 <?php
 $productName=$prodData->productName;
 $discribenote='I am interested in '.$prodData->productName;
 include 'enquery.php';
 ?>

<!-- JavaScript code -->
<script>
  // Function to open the popup card
  function openPopup() {
    document.getElementById("popup-card").style.display = "block";
  }
</script>
<script src="<?php echo BASE_URL; ?>assets/js/lazy-load.js"></script>
 

                            