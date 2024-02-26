<div class="cardproduct card-shadow rounded-10 bg-white" style="border: 0.5px solid #ddd;">
    <div class="swiper swiper4">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="container">
                    <div class="row border-bottom">
                        <div class="col-md-5 position-relative star-listing2">
                        <div class="" style="margin-top: 10px;width: 100%; float: left;">
                           <?php
                            if ($prodData->seller && $prodData->seller->isVerifiedSeller) {
                                echo '<div style="margin: auto; display: table;">';
                                echo '<img src="assets/images/verified2.png" width="74" height="27" alt="Verified_Product" style="float: left; width: 60px;">';
                                if ($prodData->isFeatured) {
                                    echo '<img src="assets/images/Star_listing.png" width="80" height="27" alt="Start_Listing" style="width: 70px; float: left; padding-left: 10px;">';
                                }
                                echo '</div>';
                            }
                            ?>
                              <?php
                               $newsto = "https://doc.tradersfind.com/images/" . $prodData->images[0]->id . ".webp";

                                
                                 ?>
                               </div> 
                            <div class="border-end p-3 pt-5 h-100 border_img border_img2 ">
                            <img src="<?php echo $newsto; ?>" alt="Your Image" width="140px">
                                <div class="d-flex mt-3 d-center">
                               
                                <button onclick="openPopup()" class="btn-primary-gradiant btn btn-sm w-100 d-center">
                                            Ask price</button>
                                </div>
                            </div>
                        </div>
                            <div class="col-md-7 position-relative p-3">
                                  
                                    <div class="single-line">
                                      
                                            <h2 class="fs-5 about_text2" style="color:rgb(216, 71, 119);">
                                            <?php    
                                            print_r( $prodData->productName);
                                            ?>
                                            </h2>
                                    </div>
                                    <div class="two-lines small">
                                        <ul class="two-line-containers" role="list">
                                            <?php if (!empty($prodData->productDescription)) { ?>
                                                  <?php foreach (array_slice(json_decode($prodData->specifications, true), 0, 4) as $spec) { ?>
                                                      <li role="listitem" tabindex="0">
                                                        <span><b><?php echo $spec['SpecificationName']; ?> :</b> <?php echo $spec['SpecValue']; ?></span>
                                                      </li>
                                                  <?php } ?>
                                            <?php } else { ?>
                                                  <?php foreach (array_slice(json_decode($prodData->specifications, true), 0, 4) as $spec) { ?>
                                                     <li role="listitem" tabindex="0">
                                                       <span><b><?php echo $spec['SpecificationName']; ?> :</b> <?php echo $spec['SpecValue']; ?></span>
                                                    </li>
                                                  <?php } ?>
                                             <?php } ?>
                                         </ul>
                                    </div>



                                    <br>
                                    
                                    <div class="d-flex mt-1 small about_text2">
                                        <!--<img src="assets/images/house.png" alt="Location_seller" width="18" height="19" class="me-3 w-18" />-->
                                        <b>Company :
                                        
                                            <a style="color: palevioletred;"> <span
                                                    class="single-line"
                                                   >
                                                   <p class="about_text2">
                                                   <?php
                                                   print_r($prodData->seller->sellerCompanyName);
                                                   ?>
                                                     </p>
                                                </span>
                                            </a>
                                            </b>
                                    </div>
                                    <div class="d-flex small mt-1 about_text2">
                                        <!--<img src="assets/images/location-3.svg" width="18" height="19" alt="Seller_Location" class="me-3 w-18" />-->
                                        <b>Office : </b>
                                        <a 
                                            target="_blank">
                                            <span>
                                              <?php
                                                print_r($prodData->seller->state);
                                                 ?>
                                                 </span>
                                        </a>
                                    </div>

                                    <div class="d-flex small mt-1 about_text2">
                                        <!--<img src="assets/images/service_area.png" width="18" height="19" alt="Service_area" class="me-3 w-18" />-->
                                        <b>Service Area : </b>
                                        <a  target="_blank">
                                            <span 
                                  class="service-area single-line">
                                  <?php $prodData->seller->mainMarkets
                                   ?>
                                            </span>
                                            <span class="service-area single-line">
                                                <?php
                                                print_r(  $prodData->seller->state);       
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
                                        <img src="assets/images/phone.png" width="18" height="17" class="w-18 me-2"
                                            alt="Phone" />
                                       
                                    </button>
                                </div>
                                <div class="col-md-4">
                                    <a [href]="#" 
                          target="_blank" class="whatsappbtn btn btn-sm w-100">
                                        Connect on whatsapp
                                    </a>
                                </div>
                                <div class="col-md-4">
                                 
                                    <button onclick="openPopup()"
                                        class="btn-outline-gradiant btn btn-sm w-100 d-center">
                                        <img src="assets/images/mail-black.png" width="14" height="12"
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
 <?php include 'enquery.php'; ?>

<!-- JavaScript code -->
<script>
  // Function to open the popup card
  function openPopup() {
    document.getElementById("popup-card").style.display = "block";
  }
</script>
 

                            