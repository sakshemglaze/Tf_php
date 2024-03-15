<!DOCTYPE html>
<html lang="en">
<head>
<?php 
 include_once 'services/config.php'; 
 
 include_once 'services/url.php';
 $url = new UrlService();
?>
<?php
   
    
    $index=0;
            class FilterDTO {}
            $currentUrl = $_SERVER['REQUEST_URI'];

            // Split the URL by "/"
            $parts = explode("/", $currentUrl);
            
            
            $id = end($parts); 
          
            $name = prev($parts);
           
            require_once 'post.php';
        $data =  get(
                'api/guest/products/'.$id.'/'.$name, 
                true
              );
              $data1 = json_decode($data);
              //$data = findActive($data1);
              //print_r($data1->seller->logo->id);
//     SEO Attributes setting ..................
        $SeoParams = [
          'title' => isset($data1->metaTitle) && $data1->metaTitle != '' ? $data1->metaTitle : $data1->productName . ' in ' . $data1->seller->state . ' - ' . $data1->sellerCompanyName,
          'metaTitle' => isset($data1->metaTitle) && $data1->metaTitle != '' ? $data1->metaTitle : $data1->productName . ' in ' . $data1->seller->state . ' - ' . $data1->sellerCompanyName,
          'metaDescription' => isset($data1->metaDescription) && $data1->metaDescription != '' ? $data1->metaDescription : $data1->sellerCompanyName . ' - Offering ' . $data1->productName . ' in ' . $data1->seller->state . '. Get the best quality at the best price.',
          'metaKeywords' => isset($data1->metaKeywords) && $data1->metaKeywords != '' ? implode(',', $data1->metaKeywords) : $data1->productName . ', ' . $data1->productName . ' in ' . $data1->seller->state . ', ' . $data1->productName . ' in UAE',
          'fbTitle' => isset($data1->fbTitle) && $data1->fbTitle != '' ? $data1->fbTitle : $data1->productName,
          'fbDescription' => isset($data1->fbDescription) && $data1->fbDescription != '' ? $data1->fbDescription : $data1->productDescription,
          'fbImage' => isset($data1->fbImage) ? API_URL . 'api/guest/imageContentDownload/' . $data1->fbImage.id : 'undefined',
          'fbUrl' => isset($data1->fbUrl) && $data1->fbUrl != '' ? $data1->fbUrl : null,
          'twitterTitle' => isset($data1->twitterTitle) && $data1->twitterTitle != '' ? $data1->twitterTitle : $data1->productName,
          'twitterDescription' => isset($data1->twitterDescription) && $data1->twitterDescription != '' ? $data1->twitterDescription : $data1->productDescription,
          'twitterImage' => isset($data1->twitterImage) ? API_URL . 'api/guest/imageContentDownload/' . $data1->twitterImage.id : 'undefined',
          'twitterSite' => isset($data1->twitterSite) && $data1->twitterSite != '' ? $data1->twitterSite : null,
          'twitterCard' => isset($data1->twitterCard) && $data1->twitterCard != '' ? $data1->twitterCard : null,
       ];

              ?>
  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php 
  include_once 'services/seo.php';
  $seo = new seoService();
                $seo->setSeoTags($SeoParams);
                include_once "header-sub.php";
                include_once "whatsapp.php";
                $whatsappUrl=new WhatsappUrl();

                include_once 'services/masked.php';
                $maskedService = new MaskingService();

  ?>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/vendors/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/prod.css" />
</head>
<body>
<script src="<?php echo BASE_URL; ?>assets/js/lazy-load.js"></script>

<section class="container-fluid ">
  <?php include_once "banner.php"; ?>
</section>
<section class="p-1">
  <nav style="--bs-breadcrumb-divider: '>'" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/">TradersFind </a></li>
      <li class="breadcrumb-item active" aria-current="page"> <?php echo $data1->productName; ?> </li>
    </ol>
  </nav>
</section>

<section class="container-fluid">
  <div class="row">
    <div class="col-lg-12">
      <div class="card shadow-sm">
        <div class="card-body">
          <div class="row">
            <div class="col-lg-3 product_details_img">
              <?php if ($data1 != null ) : ?>
              <div class="fotorama" data-nav="thumbs" data-thumbmargin="20" data-width="100%" data-allowfullscreen="true"
                 data-height="auto" data-ratio="800/600">
                         <img class="rounded-10" src="https://doc.tradersfind.com/images/<?php echo $data1->images[0]->id; ?>.webp" alt="<?php echo $data1->productName ?>" width="240" height="240" >
             </div>
             <?php endif; ?>
            </div>
            <div class="col-lg-5">
              <h1 class="fwbold fs-3" *ngIf="prodDetails">
               <?php echo $data1->productName ?>
              </h1>
              <span class="fwbold fs-3 text-red">
                <?php if (isset($data1->Price) && (isset($data1->maxPrice) == null || isset($data1->maxPrice) == '')) : ?>
                  <strong>Price:</strong> <?php echo $prodDetails['price']; ?>
                <?php endif; ?>
                <?php if (isset($data1->maxPrice) && (isset($data1->Price) == null || isset($data1->Price) == '')) : ?> 
                <strong>Price:</strong><?php echo $data1.maxPrice; 
                endif; ?> 

                <?php if (isset($data1->price) && isset($data1->price) != '' && isset($data1->maxPrice) && isset($data1->maxPrice) != '') : ?>  
                  <strong>Price:</strong> <?php echo $data1->price . '-' . $data1->maxPrice; ?> <?php endif; ?>
                <?php if ($data1->currency != '') : ?>  
                 <?php echo $data1->currency?> / Piece
                <?php else: ?>
                  AED / Piece
                <?php endif; ?>
              </span>
              
              <ul class="pro-details my-4">
               <?php 
               $array = json_decode($data1->specifications);
               foreach( $array as $spec ) {
                echo '<li>';
                 echo '<span>' . $spec->SpecificationName . '</span> <span>:</span> <span>' . $spec->SpecValue . '</span>';
                echo '</li>';
               } ?> 
              </ul>
              <!-- <a href="#" class="mt-4 text-blue">View more details</a> -->

         <!--     <app-ratings *ngIf="prodDetails" [rate]="prodDetails.rating"></app-ratings>-->
              <div class="text-center mt-4">
                <button (click)="openPostRequirement(prodDetails.productName)"
                  class="btn-primary-gradiant rounded-2 py-2 lh-1 px-4">
                  <span class="fwbold fs-4"> Get Latest Price</span>
                  <small class="d-block">Request a quote</small>
                </button>
              </div>
            </div>

            <div class="col-lg-4">
              <div class="card border-0">
                <div class="card-body bg-grey3">
                  <div class="d-flex flex-column align-items-center">
                    <span class="bg-white px-3 rounded-10 py-2">
                      <img src="https://doc.tradersfind.com/images/<?php echo $data1->seller->logo->id; ?>.webp" alt="<?php echo $data1->seller->sellerCompanyName; ?>"width="160" >
                    </span>

                    <h2 class="fwbold fs-4 mt-3">
                      <?php if($data1->seller && $data1->seller->sellerCompanyName ) : ?>
                     <a href="/<?php echo $url->getSellerUrl($data1->seller->sellerUrl,$data1->seller->id) ?>" target="_blank" class="text-blue"> <?php echo $data1->seller->sellerCompanyName ?> </a></h2>
                     <?php endif; ?>
                    <div class="fs-5 mt-2">
                      <img class="me-2" src="<?php echo BASE_URL; ?>assets/images/location-3.svg" width="15" alt="location" />
                     
                      <?php  print_r(implode(", ", $data1->seller->mainMarkets)) .', ' . isset($data1->seller->state) . isset($data1->seller->city) . isset($data1->seller->country) ?>
                      <!--
                      <a *ngIf="prodDetails" [href]="
                      urlService.getSellerUrl(prodDetails.seller.sellerUrl,prodDetails.seller.id)" target="_blank">
                        <span *ngIf="
                        prodDetails.seller.mainMarkets &&
                        prodDetails.seller.mainMarkets.length > 0 &&
                        (prodDetails.seller.mainMarkets.length[0] != '' ||
                          prodDetails.seller.mainMarkets.length[0] != null)
                      " class="service-area">{{ prodDetails.seller.mainMarkets.join(", ") }}</span>
                        <span *ngIf="
                        (!prodDetails.seller.mainMarkets ||
                          (prodDetails.seller.mainMarkets &&
                            prodDetails.seller.mainMarkets.length == 0) ||
                          (prodDetails.seller.mainMarkets &&
                            prodDetails.seller.mainMarkets.length > 0 &&
                            (prodDetails.seller.mainMarkets[0] == null ||
                              prodDetails.seller.mainMarkets[0] == ''))) &&
                        (prodDetails.seller.country ||
                          prodDetails.seller.state ||
                          prodDetails.seller.city)
                      " class="service-area">
                          {{ prodDetails.seller.city ? prodDetails.seller.city + ", " : "" }}
                          {{ prodDetails.seller.state ? prodDetails.seller.state + ", " : "" }}
                          {{ prodDetails.seller.country ? prodDetails.seller.country : "" }}</span>
                      </a> -->
                    </div>
                    <div class="d-flex align-items-center flex-wrap mt-3">
                      <div class="d-flex align-items-center me-3">
                        <img src="<?php echo BASE_URL; ?>assets/images/crown.png" class="me-1" alt="" />
                        <span>Premium Supplier</span>
                      </div>
                      <div class="d-flex align-items-center">
                        <img src="<?php echo BASE_URL; ?>assets/images/verifiedw2.png" alt="" class="me-1" />

                      </div>
                    </div>
                    <button class="btn btn-light mt-5 bg-white">
                      <img src="<?php echo BASE_URL; ?>assets/images/phone.png" width="15" alt="phone" />  
                      <?php $maskedService->getMaskedNumber($data1->seller->sellerVirtualContactPhone); ?> </button>
                    <div class="d-flex align-items-center w-100 mt-3 gap-2">
                      <a
                        href=" <?php echo $whatsappUrl->getProductToWhatsapp($data1->productName,$data1->id,get_object_vars($data1->seller))?>"
                        class="whatsappbtn btn btn-sm w-100" target="_blank">
                        Connect on whatsapp
                      </a>
                      <button (click)="openPostRequirement(prodDetails.productName)"
                        class="btn-outline-gradiant btn btn-sm w-100">
                        <img src="assets/images/mail-solid.png" alt="" /> Send
                        Inquiry
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="bg-grey4 mt-5 py-4">
  <div class="container-fluid">
    <div class="row gy-4">
      <div class="col-lg-12">
        <h2 class="border-center text-center mb-4">
          More products from this seller
        </h2>
      </div>
      <?php include_once "moreproduct.php" ?>
    </div>
  </div>
</section>

<section class="container-fluid mt-5">
  <div class="row">
    <div class="col-lg-8">
      <ul class="nav nav-pills mb-3 tabbedpanel" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
          <!-- Navigation button for "Product Details" -->
          <button class="nav-link active" id="pills-product-tab" data-bs-toggle="pill" data-bs-target="#pills-product"
            type="button" role="tab" aria-controls="pills-product" aria-selected="true">
            Product Details
          </button>
        </li>
        <li class="nav-item" role="presentation">
          <!-- Navigation button for "Company Details" -->
          <button class="nav-link" id="pills-company-tab" data-bs-toggle="pill" data-bs-target="#pills-company"
            type="button" role="tab" aria-controls="pills-company" aria-selected="false">
            Company Details
          </button>
        </li>
      </ul>
      <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active fs-5" id="pills-product" role="tabpanel"
          aria-labelledby="pills-product-tab" tabindex="0">
          <h3 class="fwbold mt-4 fs-3">Product Specification</h3>

          <table class="table producttable fs-5">
         
            <tbody >
              <td [width]="250">Brand</td>
              <td><?php echo $data1->brand ?></td>
            </tbody>
            <?php
            $array = json_decode($data1->specifications);
               foreach( $array as $spec ) {
                echo '<tbody>';
                 echo '<td>' . $spec->SpecificationName . '</td> <td>' . $spec->SpecValue . '</td>';
                echo '</tbody>';
               } 
               ?> 
          </table>

          <h3 class="fwbold mt-4 fs-3">Product Description</h3>
          <p >
           <?php echo $data1->productDescription; ?> </p>
        </div>
        <div class="tab-pane fade fs-5" id="pills-company" role="tabpanel" aria-labelledby="pills-company-tab"
          tabindex="0">
          <h3 class="fwbold mt-4 fs-3">About the Company</h3>

          <table class="table table-borderless" *ngIf="prodDetails">
            
            <tbody>
              <td>
                Nature of Business <br />
                <?php echo $data1->seller->sellerCompanyType; ?>
              </td>
              <td>
                Year of Establishment <br /> 
                <?php echo $data1->seller->sellerInceptionYear; ?>
              </td>
              <td>
                Website <br />
                <a [href]="<?php echo $data1->seller->sellerWebsite; ?>" title="Seller Website" target="_blank" class="text-blue">
                <?php echo $data1->seller->sellerWebsite; ?> </a>
              </td>
            </tbody>
            <tbody>
              <td>
                Working Days <br />
                <?php 
                 echo $data1->seller->sellerBusinessHours //. $data1->seller->sellerBusinessDay
                  ?>
              </td>
              <td>
                Trade License <br />  <?php echo $data1->seller->tradeLicenseNumber; ?>
              </td>
              <td>
                Service Area <br /> <?php echo $data1->seller->sellerState . ', ' . $data1->seller->sellerCountry ?> 
              </td>
            </tbody>
            <tbody>
              <td>
                Certified <br />
                Certified by TradersFind
              </td>
              <!-- <td>
                Map Location <br />

                <a [href]="mapUrl()" target="_blank" class="text-blue border-bottom-1">Click Here for Map</a>
              </td> -->
            </tbody>
          </table>
          <div >
          <?php echo $data1->seller->sellerCompanyName; ?>
          </div>
          <div> <?php echo $data1->seller->sellerTagline; ?>     </div><br>
          <a *ngIf="prodDetails && prodDetails.seller" [href]="this.urlService.getSellerUrl(prodDetails.seller.sellerUrl,prodDetails.seller.id)
          " target="_blank" title="{{ prodDetails.seller.sellerCompanyName }}" target="_blank"
            class="btn-primary-gradiant rounded-10 mt-4 px-md-5">
            View more
          </a>
        </div>
      </div>
    </div>
    <div class="col-lg-4">
      <form *ngIf="this.requirementService.prodDetailFrom"
      [ngClass]="!this.requirementService.isFormvalid?'was-validated':''"
      [formGroup]="this.requirementService.prodDetailFrom">
        <div class="card fs-5 rounded-20">
          <div class="card-header py-3 bg-gradiant rounded-header text-center">
            <span class="mb-0 fwbold">Send Enquiry to Supplier</span>
          </div>
          <div class="card-body px-md-5 pt-4 pb-5">
            <h3 class="fs-4">TO: <?php echo $data1->seller->sellerCompanyName; ?></h3>
            <hr class="mt-4" />
            <div class="form-group mt-4">
              <label for="description" class="form-label">Describe in few words *</label>
              <textarea name="" class="form-control" id="" cols="30" rows="3" formControlName="description"
                placeholder="Please include_once product name, order quantity, usage, special request if any in your inquery."></textarea>
              <a href="" class="text-blue small">+Add Attachment</a>
            </div>
            <div class="form-group mt-4">
              <label for="" class="form-label"> Email ID * </label>
              <input type="text" formControlName="enquirerEmail" class="form-control" name="email"
                placeholder="Email ID" />
            </div>
            <div class="form-group mt-4">
              <label for="" class="form-label"> Mobile number * </label>
              <div class="input-group phonewithstdcode">
                <input type="text" formControlName="noCode" class="form-control stdcode" value="+971" />
                <input type="text" formControlName="mobileNo" class="form-control" placeholder="Mobile" />
              </div>
            </div>
            <div class="form-group mt-4">
              <div class="form-check">
                <input class="form-check-input" formControlName="checkbox" type="checkbox" value=""
                  id="flexCheckChecked" checked />
                <label class="form-check-label" for="flexCheckChecked">
                  I agree to
                  <a href="" class="text-decoration-underline">terms and conditions</a>
                </label>
              </div>
            </div>
            <app-loadp *ngIf="this.requirementService.spannerval" style="height: 10%; width: 20%; margin-left: -5px;"></app-loadp>
            <div class="text-center">
              <button (click)="this.requirementService.onClickSubmitRequirement()"
              class="btn-primary-gradiant px-md-5 py-2 rounded-10 fs-5 fwbold mt-3 mb-3">Submit Requirement</button>
            </div>
          </div>
        </div>
      </form>
      
      <app-otp *ngIf="this.requirementService.isVerification"
      [countryCode]="this.requirementService.prodDetailFrom.value.noCode"
      [mobileNo]="this.requirementService.prodDetailFrom.value.mobileNo"></app-otp>

      

    </div>
  </div>
</section>
<!--
<section class="bg-grey4 mt-5 py-4">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <h2 class="border-center text-center mb-4">Browse related PRODUCTS</h2>
      </div>

      <div class="col" *ngFor="let product of rproducts;let i= index;">
        <div class="card border-0 bg-transparent">
          <div class="card-body text-center">
            <span class="border1 p-3 text-center d-block rounded-10 bg-white">
              <app-traders-img [id]="
                product && product.images && product.images.length > 0
                  ? product.images[0].id
                  : null" [prodName]="product.altText ? product.altText : product.productName" target="_blank"
                [class]="'img-fluid'"></app-traders-img>
            </span>
            <h3 class="mt-1 fs-6 fwbold"><a
                [href]="this.urlService.getProductUrl(prodDetails.productName, prodDetails.id)">
                echo $data1->productName; ?></a></h3>
          </div>
        </div>
      </div>


      <div class="col-lg-12 text-center">
        <button class="btn-primary-gradiant rounded-10 mt-4 px-md-5">
          View More
        </button>
      </div> 
    </div>
  </div>
</section> -->
<script src="<?php echo BASE_URL; ?>assets/vendors/bootstrap/bootstrap.bundle.min.js"></script>
                </body></html>
<?php include_once "footer.php" ?>