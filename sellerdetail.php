<?php include_once 'services/config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Details </title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/vendors/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/sellweb.css" />
</head>
<body>
<script src="<?php echo BASE_URL; ?>assets/js/lazy-load.js"></script>
<?php
    include "header-sub.php";
    include_once "whatsapp.php";
    include_once 'services/url.php';
    $urlService = new UrlService(); 

    $whatsappUrl=new WhatsappUrl();
    
    $index=0;
            class FilterDTO {}

            $currenturl= $_SERVER['REQUEST_URI'];
            $urlpart=explode('/',$currenturl);
            $companyName= end($urlpart);
           
            require_once 'post.php';
        $data =  get(
                'api/guest/search-sellers-company-name/'.$companyName
              );
              $data1 = json_decode($data);
             // $data = findActive($data1);
            // print_r($data1);
              
$aproodproduct=get(
  'api/guest/products/by-seller/' . $data1[0]->id,
  false,
  ['isFeatured' => true]
);
$aproodproduct1 = json_decode($aproodproduct);
//print_r($aproodproduct1->products);
?>

<section class="container-fluid ">
  <?php include "banner.php"; ?>
</section>
<section class="p-3">
  <nav style="--bs-breadcrumb-divider: '>'" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/">TradersFind </a></li>
      <li class="breadcrumb-item active" aria-current="page"> <?php echo $data1[0]->sellerCompanyName; ?> </li>
    </ol>
  </nav>
</section>

<section class="container-fluid bg-gradiant2">
  <div class="row gy-4">
    <div class="bg9 position-relative mt-0 shadow-sm">
      <div class="card bg-transparent border-0">
        <div class="card-body">
          <div class="row gx-md-5 gy-4">
            <div class="col-lg-7">
              <div class="d-flex flex-wrap flex-md-nowrap h-100 align-items-center">
                <div class="">
                  <div class="card-body card-body3">
                    <span>
                    <?php if ($data1[0]->logo): ?>
                    <span >
                      <img src="https://doc.tradersfind.com/images/<?php echo $data1[0]->logo->id;?>.webp" alt="">  
                    <app-logo [name]="seller?seller.sellerCompanyName:'Traders Find'" *ngIf="!seller.logo"></app-logo>
                  
                      </span>
                      <?php endif;?>
                  </div>
                </div>

                <div class="text-white lh-sm ms-md-3">
                  <h1 class="text-uppercase fwbold text-black fs-4"><?php echo$data1[0]?$data1[0]->sellerCompanyName:"TF";?></h1>
                  <div class="d-flex align-items-start mt-3">
                    <img src="assets/images/location3.png" width="28" alt="" />
                    <p class="mb-0 ms-2 text-black"><span>
                      <?php echo $data1[0]->address.','.$data1[0]->city;?> <br />
                      <?php echo $data1[0]->sellerState.','. $data1[0]->country;?> </span>
                    </p>
                  </div>
                  <div class="d-flex mt-3 gap-3" *ngIf="seller">
                    <div *ngIf="seller.isPreffered">
                      <div class="d-flex align-items-center">
                        <img src="<?php echo BASE_URL;?>assets/images/crown.png" alt="Premium Seller" width="30" />
                        <span class="ms-2 fwbold text-black">Premium Seller </span>
                      </div>
                    </div>
                    <div class="d-flex align-items-center" *ngIf="seller && seller.isVerifiedSeller">
                      <img src="<?php echo BASE_URL;?>assets/images/verified2.png" alt="Verified Seller"
                        width="70" /><app-ratings></app-ratings>
                    </div>
                  </div>

                </div>
              </div>
            </div>
            <div class="col-lg-5">
              <div class="row gy-2">
                <div class="col-lg-12 text-center" *ngIf="seller">
                 <?php
                 if($data1[0]->sellerVirtualContactPhone &&
                 $data1[0]->sellerVirtualContactPhone != null &&
                 $data1[0]->sellerVirtualContactPhone != ''):
                 ?>
                  <a class="btn btn-light">
                    <img src="<?php echo BASE_URL;?>assets/images/phone.png" width="16" alt="" />
                  
                  </a>
                  <?php endif;?>
                </div>
                <div class="col-lg-6" *ngIf="seller">
                  <a target="_blank" href="<?php echo $whatsappUrl->getProductToWhatsapp('', $data1[0]->id, $data1)?>"
                    class="whatsappbtn btn py-2 btn-sm w-100">
                    <!--<a target="_blank" href="https://api.whatsapp.com/send?phone=971569773623&text=Browsed TradersFind" class="whatsappbtn btn py-2 btn-sm w-100">-->
                    Connect on whatsapp
                  </a>

                </div>
                <div class="col-lg-6">
                  <button (click)="openPostRequirement()"
                    class="btn-outline-gradiant btn py-2  btn-sm w-100 text-black">
                    <img src="assets/images/mail-solid.png" alt="" /> Send Inquiry
                  </button>
                </div>
                <div class="col-12">
                  <a href="#reviews" aria-label="Go to Reviews">
                      <app-ratings [rate]="seller ? seller.sellerRating : '0'"></app-ratings>
                  </a>
              </div>
                <div class="col-12" *ngIf="seller">
                  <ul class="d-flex gap-2 justify-content-center mt-0">

                    <li>
                      <a *ngIf="seller.twitterLink && seller.twitterLink != ''" [href]="seller.twitterLink" aria-label="Twitter">
                        <img src="assets/images/twitter.webp" width="40" alt="" />
                      </a>
                    </li>
                    <li>
                      <a *ngIf="seller.facebookLink && seller.facebookLink != ''" [href]="seller.facebookLink" aria-label="Facebook">
                          <img src="assets/images/facebook.webp" width="40" alt="" />
                      </a>
                  </li>
                  
                    <li>
                      <a *ngIf="seller.instagramLink && seller.instagramLink != ''" [href]="seller.instagramLink" aria-label="Instagram">
                        <img src="assets/images/instagram.webp" width="40" alt="" />
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-12">
      <!-- List of navigation items -->
<ul class="nav nav-pills tabbedpanel tabbedpanel3 tabssizesm justify-content-center" id="pills-tab" role="tablist">
  <li class="nav-item" role="presentation">
    <!-- Navigation button for "Seller Profile" -->
    <button class="nav-link active" id="pills-seller-tab" data-bs-toggle="pill" data-bs-target="#pills-seller"
      type="button" role="tab" aria-controls="pills-seller" aria-selected="true">
      <img src="<?php echo BASE_URL;?>assets/images/seller_icon1.png" alt="" aria-hidden="true">
      <span >Seller Profile</span>
    </button>
  </li>
  <li class="nav-item" role="presentation">
    <!-- Navigation button for "Products & Services" -->
    <button class="nav-link" id="pills-products-tab" data-bs-toggle="pill" data-bs-target="#pills-products"
      type="button" role="tab" aria-controls="pills-products" aria-selected="false">
      <img src="<?php echo BASE_URL;?>assets/images/seller_icon2.png" alt="" aria-hidden="true">
      <span >Products & Services</span>
    </button>
  </li>
  <li class="nav-item" role="presentation">
    <!-- Navigation button for "Contact Details" -->
    <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact"
      type="button" role="tab" aria-controls="pills-contact" aria-selected="false">
      <img src="<?php echo BASE_URL;?>assets/images/seller_icon3.png" height="48" alt="" aria-hidden="true">
      <span >Contact Details</span>
    </button>
  </li>
</ul>

      <div class="tab-content" id="pills-tabContent" *ngIf="seller">
        <div class="tab-pane fade show active fs-5 text-center" id="pills-seller" role="tabpanel"
          aria-labelledby="pills-product-tab" tabindex="0">
          <h2 class="fwbold mt-5 fs-3 mb-5 border-center text-center">
            Seller Profile
          </h2>
          <div><?php echo $data1[0]->sellerTagline; ?></div>

          <div class="fs-4 px-md-5">

            <!--
            <p class="">Established in 1947, Apex Trading Co.is a leading supplier and stockists of products related to the electro-mechanical, fire-fighting, HVAC, Plumbing and Sanitary industries.</p>
            <p class="pt-2">Some of the products we carry include Pipes and Pipe Fittings in Steel, Copper and PVC; Brass, Cast lron, Bronze and Chrome Plated Valves; Related Accessories; Power and Hand Tools; and Safety Products. We cater to Electromechanical and Civil Contractors, Fire-fighting Contractors, Air-conditioning Contractors, Fabricators, Oilfield & Petro-chemical Industry, and Wooden Joinery Industry.</p>
            <p class="pt-2">The company has showrooms in Dubai and Abu Dhabi as well as a  warehouse and head office based in Sharjah. The total storage facility currently measures more than 100,000 sq.ft. and is backed by a highly qualified technical sales team which can offer the latest products suitable to customer requirements. </p>
            -->
          </div>

          <div class="row mt-4 justify-content-center pb-5 gy-4">
            <div class="col-lg-3">
              <!--*ngIf="seller.sellerCompanyType">-->
              <div class="d-flex align-items-center justify-content-md-center">
                <img src="<?php echo BASE_URL;?>assets/images/icon__1.png" alt="" class="me-3" />
                <div class="text-start lh-sm">
                  <h3 class="text-black-50 mb-0 fs-4 fwbold">Nature of Business</h3>
                  <span class="mb-0 fs-5">
                  <?php  echo $data1[0]?$data1[0]->sellerCompanyType:'';
                    
                    ?>
                  </span>
                </div>
              </div>
            </div>
            <div class="col-lg-3">
              <!--*ngIf="seller.sellerInceptionYear">-->
              <div class="d-flex align-items-center justify-content-md-center">
                <img src="<?php echo BASE_URL;?>assets/images/icon__2.png" alt="" class="me-3" />
                <div class="text-start lh-sm">
                  <h3 class="text-black-50 mb-0 fs-4 fwbold">Year of Establishment</h3>
                  <!--<h3 class="mb-0 fs-5">-->
                  <?php if(isset($data1[0]->sellerInceptionYear)){ echo $data1[0]->sellerInceptionYear;}
                    
                    ?>
                </div>
              </div>
            </div>
            <div class="col-lg-3" *ngIf="seller.sellerWebsite && seller.sellerWebsite != ''">
              <!--*ngIf="seller.sellerWebsite && seller.sellerWebsite != ''">-->
              <div class="d-flex align-items-center justify-content-md-center">
                <img src="<?php echo BASE_URL;?>assets/images/icon__3.png" alt="" class="me-3" />
                <div class="text-start lh-sm" *ngIf="seller">
                  <a href="<?php echo$data1[0]->sellerWebsite; ?>" target="_blank">
                    <h3 class="text-black-50 mb-0 fs-4 fwbold" style="text-transform: capitalize;"><?php echo $data1[0]->sellerCompanyName.'Website';?>
                       </h3>
                    <!--{{seller.sellerWebsite }}-->
                  </a>
                </div>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="d-flex align-items-center justify-content-md-center">
                <img src="<?php echo BASE_URL;?>assets/images/icon__4.png" alt="" class="me-3" />
                <div class="text-start lh-sm" *ngIf="seller">
                  <h3 class="text-black-50 mb-0 fs-4 fwbold">Working Days</h3>
                  <?php echo implode(" ", explode("@@@", $data1[0]->sellerBusinessHours)); ?>

                </div>
              </div>
            </div>

            <div class="flex-wrap"></div>

            <div class="col-lg-3">
              <div class="d-flex align-items-center justify-content-md-center">
                <img src="<?php echo BASE_URL;?>assets/images/icon__5.png" alt="" class="me-3" />
                <div class="text-start lh-sm">
                  <h3 class="text-black-50 mb-0 fs-4 fwbold">Trade License</h3>
                  <?php  echo$data1[0]->tradeLicenseNumber;?>
                    
                 
                </div>
              </div>
            </div>

            <div class="col-lg-3">
              <div class="d-flex align-items-center justify-content-md-center">
                <img src="<?php echo BASE_URL;?>assets/images/icon__6.png" alt="" class="me-3" />
                <div class="text-start lh-sm">
                  <h3 class="text-black-50 mb-0 fs-4 fwbold">Service Area</h3>
                  <span title="{{ seller.mainMarkets.join(', ') }}" *ngIf="
                          seller.mainMarkets &&
                          seller.mainMarkets.length>
                      0 &&
                      seller.mainMarkets[0] &&
                      seller.mainMarkets[0] != ''
                      "><?php echo implode(", ", $data1[0]->mainMarkets); ?>

                  </span>
                  <span title="{{ seller?.sellerState }}, {{ seller?.sellerCountry }}" *ngIf="
                          !(
                          seller.mainMarkets &&
                          seller.mainMarkets.length>
                      0 &&
                      seller.mainMarkets[0] &&
                      seller.mainMarkets[0] != ''
                      )
                      "><?php echo $data1[0]->sellerState.',' .$data1[0]->sellerCountry ;?>
                  </span>
                </div>
              </div>
            </div>

            <div class="col-lg-3">
              <div class="d-flex align-items-center justify-content-md-center">
                <img src="<?php echo BASE_URL;?>assets/images/icon__7.png" alt="" class="me-3" />
                <div class="text-start lh-sm">
                  <h3 class="text-black-50 mb-0 fs-4 fwbold">Map Location</h3>
                  <!--<app-map [longitude]="this.seller.coordinates[0]" [latitude]="this.seller.coordinates[1]"></app-map>-->
                  <button (click)="openMap(this.seller.coordinates[1],this.seller.coordinates[0])"
                    class="btn-outline-gradiant btn btn-sm w-100 d-center"> Click Here
                  </button>
                </div>
              </div>
            </div>

            <div class="col-lg-3">
              <div class="d-flex align-items-center justify-content-md-center">
                <img src="<?php echo BASE_URL;?>assets/images/icon__8.png" alt="" class="me-3" />
                <div class="text-start lh-sm">
                  <h3 class="text-black-50 mb-0 fs-4 fwbold"></h3>
                  <strong>Certified by TradersFind </strong>
                </div>
              </div>
            </div>

            <div class="col-lg-3">
              <!--*ngIf="seller.youtubeLink">-->
              <div class="d-flex align-items-center justify-content-md-center">
                <img src="<?php echo BASE_URL;?>assets/images/icon__9.png" alt="" class="me-3" />
                <div class="text-start lh-sm">
                  <h3 class="text-black-50 mb-0 fs-4 "></h3>
                  <a href="<?php echo$data1[0]->youtubeLink; ?>">Company Video</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade fs-5 bg-grey4" id="pills-products" role="tabpanel"
          aria-labelledby="pills-products-tab" tabindex="0">
          <h2 class="fwbold fs-3 mb-5 border-center text-center pt-5">
            Product & Services
          </h2>
          <section class="gallery">
            <div class="container-fluid">
              <div class="row">
                <!-- Mixit Up Controls -->
                <div class="controls flex-wrap flex-md-nowrap">
                  <button type="button" class="control" data-filter="all">
                    All Products
                  </button>

                </div>
              </div>

              <div class="row">
                <div class="fw mix-container home-gallery">

                <?php foreach ( $aproodproduct1->products as $index => $product): ?>
    <div class="mix valves">
        <a href="<?php echo BASE_URL. $urlService->getProductUrl($product->productName,$product->id);?>" class="thumb-a">
            <div class="item-hover">
                <div class="hover-text">
                    <h3><?= $product->productName ?></h3>
                </div>
            </div>
            <div class="item-img">
               <img src="https://doc.tradersfind.com/images/<?php echo $product->images[0]->id; ?>.webp" alt="<?php echo $product->productName;?>" style="width: 140px;">
                <!-- <img src="assets/images/products/valves.png" alt="" /> -->
            </div>
        </a>
    </div>
<?php endforeach; ?>



                </div>
              </div>
            </div>
          </section>
        </div>
        <div class="tab-pane fade fs-5" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab"
          tabindex="0">
          <section class="">
            <h3 class="fwbold fs-3 mb-5 border-center text-center pt-5">
              Contact Details
            </h3>



            <div class="container-fluid">
              <div class="row" *ngIf="seller.coordinates && seller.coordinates.length > 0">
                <app-map [latitude]="this.seller.coordinates[1]" [longitude]="this.seller.coordinates[0]"></app-map>
              </div>


              <div class="row dushyant-llc">
                <div class="col-lg-12">
                  <div class="p-md-4 my-3">
                    <div class="card border-0 shadow-lg">
                      <div class="card-header text-center bg-gradiant">
                        <h5 class="mb-0 py-1 fs-3">
                          INQUIRE DIRECTLY WITH THE SELLER
                        </h5>
                      </div>
                      <div class="card-body px-md-5">
                        <p class="fs-5 mb-2"><?php echo $data1[0]->sellerCompanyName;?> </p>
                        <h4 class="text-uppercase mb-4 fwbold fs-4">
                          Tell us about your requirement
                        </h4>
                        <form *ngIf="this.requirementService.prodDetailFrom"
                          [ngClass]="!this.requirementService.isFormvalid?'was-validated':''"
                          [formGroup]="this.requirementService.prodDetailFrom">
                          <div class="row">

                            <div class="col-lg-6">
                              <label for="" class="form-label fs-5">Describe in few words *</label>
                              <textarea name="" formControlName="description" class="form-control" id="" cols="30"
                                rows="6"
                                placeholder="Please include product name, order quantity, usage, special request if any in your inquiry."></textarea>
                              <!--<button class="p-0 text-blue bg-transparent border-0 mt-3 fs-6">
                              + Add Attachment
                            </button>-->

                            </div>
                            <div class="col-lg-6">
                              <div class="row gy-4">
                                <div class="col-lg-6">
                                  <label for="" class="form-label  fs-4">Email ID *</label>
                                  <input type="text" formControlName="enquirerEmail" class="form-control"
                                    placeholder="Email ID" />
                                </div>
                                <div class="col-lg-6">
                                  <label for="" class="form-label  fs-4">Mobile Number*</label>
                                  <div class="input-group">
                                    <select formControlName="noCode" class="form-control mxw-50">
                                    <?php
                      $resUnit=file_get_contents('<?php echo BASE_URL; ?>assets/testingJson/Units.json');
                      $allunit=json_decode($resUnit);
                      foreach($allunit as $unit){
                             ?>
                             <option value="<?php echo $unit;?>">
                            <?php echo $unit;?>
                            </option>
                             <?php
                      }
                      ?>
                                    </select>
                                    <!--</div>
                               <div class="col-lg-6">-->
                                    <input type="text" formControlName="mobileNo" class="form-control"
                                      placeholder="Mobile number" width="" />
                                  </div>
                                </div>
                                <div class="row gy-4">
                                  <div class="form-check mt-4">
                                    <!-- <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked />-->
                                    <label class="form-check-label" for="flexCheckChecked">
                                      I agree to
                                      <a href="https://www.tradersfind.com/term-and-conditions" target="_blank"
                                        class="text-decoration-underline">terms and conditions</a>
                                    </label>
                                  </div>
                                  <app-loadp *ngIf="this.requirementService.spannerval"
                                    style="height: 50%; width: 100%; margin-left: -5px;"></app-loadp>
                                    <button (click)="this.requirementService.onClickSubmitRequirement()"
                                    class="btn-primary-gradiant custom-button-style">
                                Requirement
                            </button>

                                </div>

                              </div>
                            </div>
                          </div>
                        </form>
                        <div class="col-lg-12">
                          <div class="card shadow-sm mt-5 br_right bg-light">
                            <div class="card-body text-center">
                              <h5 class="border-bottom pb-2 text-center">
                                Contact Details
                              </h5>
                              <p class="mb-0 fs-14" *ngIf="seller.firstName">
                              <?php echo $data1[0]->firstName.$data1[0]->lastName;?> 
                          
                              </p>
                              <p class="fs-14"> <?php echo isset($data1[0]->designation);?> </p>
                              <div class="d-flex align-items-center gap-3 link_pp">
                                <a *ngIf="
                              seller.sellerVirtualContactPhone &&
                              seller.sellerVirtualContactPhone != null &&
                              seller.sellerVirtualContactPhone != ''
                            " (click)="
                              this.maskingService.onClickPhoneNum(
                                seller,
                                'sellerVirtualContactPhone',
                                this.urlService.getSellerUrl(this.sellerCompanyName,this.seller.id)
                              , '')" class="btn btn-sm btn-light  py-2 fw-semibold bg-grey w-100">
                                  <img src="assets/images/phone.png" width="16" alt="" />
                                 phone number
                                </a>


                                <a target="_blank"
                                  href="https://api.whatsapp.com/send?phone=971569773623&text=Visited TradersFind Pages"
                                  class="whatsappbtn btn btn-sm fs-6 py-2 fw-semibold w-100">
                                  Connect on whatsapp
                                </a>

                              </div>
                            </div>
                          </div>
                        </div>
                        <app-otp *ngIf="this.requirementService.isVerification"
                          [countryCode]="this.requirementService.prodDetailFrom.value.noCode"
                          [mobileNo]="this.requirementService.prodDetailFrom.value.mobileNo"></app-otp>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
      </div>
    </div>
  </div>
</section>
                                </body></html>
                                <script src="<?php echo BASE_URL; ?>assets/vendors/bootstrap/bootstrap.bundle.min.js"></script>
<?php include "footer.php"; ?>