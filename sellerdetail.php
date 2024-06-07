<?php 
  include_once 'config.php'; 
  include_once 'services/seo.php';
  $seo = new seoService();

  $index=0;
            class FilterDTO {}

            $currenturl= $_SERVER['REQUEST_URI'];
            $urlpart=explode('/',$currenturl);
            $companyName= $matches[1]; //($urlpart);
            require_once 'post.php';
        $data =  get(
                'api/guest/search-sellers-company-name/'.$companyName
              );
              
              $data1 = json_decode($data);
              $new_url = '/not-found';

              if(!isset($data1[0]->id)){
              header('Location: ' . $new_url, true, 301);
              exit;
              }
             // $data = findActive($data1);
           // print_r($data1[0]->linkedinUrl);
              
$aproodproduct=get(
  'api/guest/products/by-seller/' . $data1[0]->id,
  false,
  ['isFeatured' => true]
);
$aproodproduct1 = json_decode($aproodproduct);
$schema = '{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "Organization",
      "@id": "https://www.tradersfind.com/#organization",
      "name": "Interconnect Marketing Management L.L.C",
      "url": "https://www.tradersfind.com/seller/interconnect-marketing-management-llc",
      "sameAs": [
        "https://www.facebook.com/tradersfindb2bportal/",
        "https://www.linkedin.com/company/tradersfind/",
        "https://x.com/tradersfind/"
      ],
      "logo": {
        "@type": "ImageObject",
        "@id": "https://www.tradersfind.com/#logo",
        "url": "https://www.tradersfind.com/assets/images/TradersFind.webp",
        "caption": "Tradersfind.com by Interconnect Marketing Management L.L.C"
      }
    },
    {
      "@type": "WebSite",
      "@id": "https://www.tradersfind.com/#website",
      "url": "https://www.tradersfind.com/#",
      "name": "Tradersfind.com",
      "publisher": {
        "@id": "https://www.tradersfind.com/#organization"
      },
      "potentialAction": {
        "@type": "SearchAction",
        "target": "https://www.tradersfind.com/search/{search_term_string}",
        "query-input": "required name=search_term_string"
      }
    },
    {
      "@type": "WebPage",
      "@id": "https://www.tradersfind.com/#webpage",
      "url": "https://www.tradersfind.com",
      "inLanguage": "en-US",
      "name": "Tradersfind.com by Interconnect Marketing Management L.L.C",
      "isPartOf": {
        "@id": "https://www.tradersfind.com/#website"
      },
      "about": {
        "@id": "https://www.tradersfind.com/#organization"
      },
      "description": "Interconnect Marketing Management L.L.C handles Tradersfind.com, which is the UAE largest B2B Portal for businesses, products and services. A smart and efficient way to Search, Find and Connect with Businesses in UAE."
    },
    {
      "@type": "BreadcrumbList",
      "itemListElement": [
        {
          "@type": "ListItem",
          "position": 1,
          "name": "Home",
          "item": "https://www.tradersfind.com"
        },
        {
          "@type": "ListItem",
          "position": 2,
          "name": "Platinum Paint Trading LLC",
          "item": "https://www.tradersfind.com/seller/platinum-paint-trading-llc"
        }
      ]
    },
    {
      "@type": "LocalBusiness",
      "name": "Platinum Paint Trading LLC",
      "url": "https://www.tradersfind.com/seller/platinum-paint-trading-llc",
      "image": "https://doc.tradersfind.com/images/65d5c1f63b598e4b0b81002d.webp",
      "description": "Platinum Paint Trading LLC is based in Sharjah, providing the best quality paints and coatings. Contact Now!",
      "telephone": "+971509884017",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "Near Maza Signal,Industrial Area# 2 Sharjah,United Arab Emirates",
        "addressRegion": "Sharjah",
        "addressCountry": "United Arab Emirates"
      },
      "geo": {
        "@type": "GeoCoordinates",
        "latitude": "25.19",
        "longitude": "55.24"
      }
    }
  ]
}';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    $productNames='';
    foreach ($aproodproduct1->products as $index => $product) {
        
      $productNames .= $product->productName;
    
      if ($index < count($aproodproduct1->products) - 1) {
          $productNames .= ", ";
      }
    }
      $SeoParams = [
          'title' => isset($data1[0]->metaTitle) && $data1[0]->metaTitle != '' ? $data1[0]->metaTitle : $data1[0]->sellerCompanyName,
          'metaTitle' => isset($data1[0]->metaTitle) && $data1[0]->metaTitle != '' ? $data1[0]->metaTitle : $data1[0]->sellerCompanyName.' in '.$data1[0]->city.','.$data1[0]->sellerState.','.$data1[0]->country,
          'metaDescription' => isset($data1[0]->metaDescription) && $data1[0]->metaDescription != '' ? $data1[0]->metaDescription : $data1[0]->sellerCompanyName.' is a leading company of '.$productNames.' located in '.$data1[0]->city.','.$data1[0]->sellerState.','.$data1[0]->country,
          'metaKeywords' => isset($data1[0]->metaKeywords) && $data1[0]->metaKeywords != '' & $data1[0]->metaKeywords[0] !='' ? implode(',', $data1[0]->metaKeywords) : $data1[0]->sellerCompanyName.','.' in '.$data1[0]->city.','.$data1[0]->sellerCompanyName.' in '. $data1[0]->sellerState.','. $data1[0]->sellerCompanyName.' in '. $data1[0]->country.','. $productNames,
          'fbTitle' => isset($data1[0]->fbTitle) && $data1[0]->fbTitle != '' ? $data1[0]->fbTitle : $data1[0]->sellerCompanyName,
          'fbDescription' => isset($data1[0]->fbDescription) && $data1[0]->fbDescription != '' ? $data1[0]->fbDescription : $data1[0]->sellerCompanyName,
          'fbImage' => isset($data1[0]->fbImage) ? API_URL . 'api/guest/imageContentDownload/' . $data1[0]->fbImage.id : 'undefined',
          'fbUrl' => isset($data1[0]->fbUrl) && $data1[0]->fbUrl != '' ? $data1[0]->fbUrl : null,
          'twitterTitle' => isset($data1[0]->twitterTitle) && $data1[0]->twitterTitle != '' ? $data1[0]->twitterTitle : $data1[0]->sellerCompanyName,
          'twitterDescription' => isset($data1[0]->twitterDescription) && $data1[0]->twitterDescription != '' ? $data1[0]->twitterDescription : $data1[0]->sellerCompanyName,
          'twitterImage' => isset($data1[0]->twitterImage) ? API_URL . 'api/guest/imageContentDownload/' . $data1[0]->twitterImage.id : 'undefined',
          'twitterSite' => isset($data1[0]->twitterSite) && $data1[0]->twitterSite != '' ? $data1[0]->twitterSite : null,
          'twitterCard' => isset($data1[0]->twitterCard) && $data1[0]->twitterCard != '' ? $data1[0]->twitterCard : null,
          'schemaDescription' => $schema,
       ];
      $seo->setSeoTags($SeoParams);

      include_once 'services/masked.php';
      $maskedService = new MaskingService();

        ?>
         <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/style.css" >
</head>
<style>
 .container-card {
  display: none;
  position: fixed;
  top: 50%;
  left: 60%;
  transform: translate(-50%, -50%);
  width: auto;
  max-height: 80vh; 
  overflow-y: auto;
  background-color: lightgray;
  padding: 20px;
  border-radius: 5px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
  z-index: 99999999;
  
}
</style>
<body>
<script src="<?php echo BASE_URL; ?>assets/js/lazy-load.js"></script>
<?php
    include "header-sub.php";
    include_once "whatsapp.php";
    include_once 'services/url.php';
    $urlService = new UrlService(); 
    $whatsappUrl=new WhatsappUrl();
//print_r($aproodproduct1->products);
?>

<section class="container-fluid ">
  <?php //include "banner.php"; ?>
</section>
<section class="p-3">
  <nav style="--bs-breadcrumb-divider: '>'" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/">TradersFind </a></li>
      <li class="breadcrumb-item active fw-bold" aria-current="page"> <?php echo $data1[0]->sellerCompanyName; ?> </li>
    </ol>
  </nav>
</section>
<script src="services/storegeService.js"></script>
<script>
       function closePopup() {
    document.getElementById("popup-card-otp").style.display = "none";
  }
  function submitRequirement(formdata){

        document.getElementById("postBuyreq").reset();

       var url="<?php echo API_URL?>api/enquiries";
       console.log(url);
       const myObject1 = new StorageService();
      var token=myObject1.getItem('userAccessToken');
fetch(url, {
    method: "POST",
    headers: {
        "Content-Type": "application/json",
        Authorization: 'Bearer ' + token,
    },
    body: JSON.stringify(formdata),
})
    .then(function (response) {
        return response.json();
    })
    .then(function (data) {
        console.log(data);
        if(confirm('Your Request is submitted successfully!! Please click OK.')) {
          window.location.href = '/';
    }
    })
    .catch(function (error) {
        console.log(error);
        if(confirm('Your Request is not submitted !!! Due To some issue Please click OK.')) {
          window.location.href = '/';
        }
    });

  }
</script>
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
                    <?php if (isset($data1[0]->logo)): ?>
                    <span >
                      <img src="https://doc.tradersfind.com/images/<?php echo $data1[0]->logo->id;?>.webp" alt="seller">  
                    <app-logo [name]="seller?seller.sellerCompanyName:'Traders Find'" *ngIf="!seller.logo"></app-logo>
                  
                      </span>
                      <?php endif;?>
                  </div>
                </div>

                <div class="text-white lh-sm ms-md-3">
                  <h1 class="text-uppercase fwbold text-black fs-4"><?php echo$data1[0]?$data1[0]->sellerCompanyName:"TF";?></h1>
                  <div class="d-flex align-items-start mt-3">
                    <img src="<?php echo BASE_URL?>assets/images/location3.png" width="28" alt="location" />
                    <p class="mb-0 ms-2 text-black"><span>
                      <?php echo $data1[0]->address.','.$data1[0]->city;?> <br />
                      <?php echo $data1[0]->sellerState.','. $data1[0]->country;?> </span>
                    </p>
                  </div>
                  <div class="d-flex mt-3 gap-3">
                    <div>
                      <?php 
                      //print_r($data1[0]);
                      if (isset($data1[0]->isPreffered) && $data1[0]->isPreffered) : ?>
                      <div class="d-flex align-items-center">
                        <img src="<?php echo BASE_URL;?>assets/images/crown.png" alt="Premium Seller" width="30" />
                        <span class="ms-2 fwbold text-black">Premium Seller </span>
                      </div>
                      <?php endif; ?>
                    </div>
                    <div class="d-flex align-items-center">
                      <?php if (isset($data1[0]->isVerifiedSeller) && $data1[0]->isVerifiedSeller): ?>
                      <img src="<?php echo BASE_URL;?>assets/images/verified2.png" alt="Verified Seller" width="70" />
                      <?php endif; ?>
                    </div>
                  </div>

                </div>
              </div>
            </div>
            <div class="col-lg-5">
              <div class="row gy-2">
                <div class="col-lg-12 text-center">
                 <?php
                 if($data1[0]->sellerVirtualContactPhone &&
                 $data1[0]->sellerVirtualContactPhone != null &&
                 $data1[0]->sellerVirtualContactPhone != ''):
                 ?>
                  <!--<a class="btn btn-light">-->
                    <button class="btn btn-light w-100 d-center"  title="Seller_Phone" href="#">
                    <img src="<?php echo BASE_URL;?>assets/images/phone.png" width="16" alt="phone" />
                     <?php $maskedService->getMaskedNumber($data1[0]->sellerVirtualContactPhone); ?>
   
                      </button>
                  <?php endif;?>
                </div>
                <div class="col-lg-6 ">
                  
                  <a target="_blank" href="<?php echo $whatsappUrl->getProductToWhatsapp('', $data1[0]->id, $data1)?>"
                    class=" btn py-2 btn-sm w-100 whatsappbtn">
                    Connect on whatsapp
                    
                  </a>
                      
                </div>
                <div class="col-lg-6">
                  <button onclick="openPopup1()"
                    class="btn-outline-gradiant btn py-2  btn-sm w-100 text-black">
                    <img src="<?php echo BASE_URL?>assets/images/mail-solid.png" alt="mail" /> Send Inquiry
                  </button>
                </div>
                <div class="col-12">
                  <a href="#reviews" aria-label="Go to Reviews">
                      <app-ratings [rate]="seller ? seller.sellerRating : '0'"></app-ratings>
                  </a>
              </div>
                <div class="col-12" *ngIf="seller">
                  <ul class="d-flex gap-2 justify-content-center mt-0">
                <?php if (isset($data1[0]->twitterLink) && $data1[0]->twitterLink != '') :?>
                    <li>
                      <a target="_blank" href="<?php echo $data1[0]->twitterLink ?>" aria-label="Twitter">
                        <img src="<?php echo BASE_URL?>assets/images/twitter_icon.webp" width="40" alt="X" />
                      </a>
                    </li>
                    <?php endif;
                    if (isset($data1[0]->facebookLink) && $data1[0]->facebookLink != ''): ?>
                    <li>
                      <a target="_blank" href="<?php echo $data1[0]->facebookLink ?>" aria-label="Facebook">
                          <img src="<?php echo BASE_URL?>assets/images/facebook.webp" width="40" alt="facebook" />
                      </a>
                  </li>
                  <?php endif; 
                  if (isset($data1[0]->instagramLink) && $data1[0]->instagramLink != '') :?>
                    <li>
                      <a target="_blank" href="<?php echo $data1[0]->instagramLink ?>" aria-label="Instagram">
                        <img src="<?php echo BASE_URL?>assets/images/instagram.webp" width="40" alt="instagram" />
                      </a>
                    </li>
                   <?php endif;
                   if (isset($data1[0]->linkedinUrl) && $data1[0]->linkedinUrl != '') :?>
                    <li>
                      <a target="_blank" href="<?php echo $data1[0]->linkedinUrl?>" aria-label="linkedIn">
                        <img src="<?php echo BASE_URL?>assets/images/LinkedIn_icon.webp" width="40" alt="linkedIn" />
                      </a>
                    </li>
                   <?php endif; ?> 
                    
                   
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
      <img src="<?php echo BASE_URL;?>assets/images/seller_icon1.png" alt=seller" aria-hidden="true">
      <span >Seller Profile</span>
    </button>
  </li>
  <li class="nav-item" role="presentation">
    <!-- Navigation button for "Products & Services" -->
    <button class="nav-link" id="pills-products-tab" data-bs-toggle="pill" data-bs-target="#pills-products"
      type="button" role="tab" aria-controls="pills-products" aria-selected="false">
      <img src="<?php echo BASE_URL;?>assets/images/seller_icon2.png" alt="seller" aria-hidden="true">
      <span >Products & Services</span>
    </button>
  </li>
  <li class="nav-item" role="presentation">
    <!-- Navigation button for "Contact Details" -->
    <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact"
      type="button" role="tab" aria-controls="pills-contact" aria-selected="false">
      <img src="<?php echo BASE_URL;?>assets/images/seller_icon3.png" height="48" alt="seller" aria-hidden="true">
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
                <img src="<?php echo BASE_URL;?>assets/images/icon__1.png" alt="seller" class="me-3" />
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
                <img src="<?php echo BASE_URL;?>assets/images/icon__2.png" alt="seller" class="me-3" />
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
                <img src="<?php echo BASE_URL;?>assets/images/icon__3.png" alt="seller" class="me-3" />
                <div class="text-start lh-sm" *ngIf="seller">
                  <a href="<?php echo$data1[0]->sellerWebsite; ?>" target="_blank">
                    <h3 class="text-black-50 mb-0 fs-4 fwbold" style="text-transform: capitalize;"><?php echo $data1[0]->sellerCompanyName.' Website';?>
                       </h3>
                    <!--{{seller.sellerWebsite }}-->
                  </a>
                </div>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="d-flex align-items-center justify-content-md-center">
                <img src="<?php echo BASE_URL;?>assets/images/icon__4.png" alt="seller" class="me-3" />
                <div class="text-start lh-sm" *ngIf="seller">
                  <h3 class="text-black-50 mb-0 fs-4 fwbold">Working Days</h3>
                  <?php echo implode(" ", explode("@@@", $data1[0]->sellerBusinessHours)); ?>

                </div>
              </div>
            </div>

            <div class="flex-wrap"></div>

            <div class="col-lg-3">
              <div class="d-flex align-items-center justify-content-md-center">
                <img src="<?php echo BASE_URL;?>assets/images/icon__5.png" alt="seller" class="me-3" />
                <div class="text-start lh-sm">
                  <h3 class="text-black-50 mb-0 fs-4 fwbold">Trade License</h3>
                  <?php  echo$data1[0]->tradeLicenseNumber;?>
                    
                 
                </div>
              </div>
            </div>

            <div class="col-lg-3">
              <div class="d-flex align-items-center justify-content-md-center">
                <img src="<?php echo BASE_URL;?>assets/images/icon__6.png" alt="seller" class="me-3" />
                <div class="text-start lh-sm">
                  <h3 class="text-black-50 mb-0 fs-4 fwbold">Service Area</h3>
                  <span><?php if(isset($data1[0]->mainMarkets)):?><?php echo implode(", ", $data1[0]->mainMarkets); ?>
                    <?php endif;?>
                  </span>
                  
                  <span ><?php if(!isset($data1[0]->mainMarkets)):?><?php echo $data1[0]->sellerState.',' .$data1[0]->sellerCountry ; ?>
                    <?php endif;?>
                  </span>
                </div>
              </div>
            </div>

            <div class="col-lg-3">
              <div class="d-flex align-items-center justify-content-md-center">
                <img src="<?php echo BASE_URL;?>assets/images/icon__7.png" alt="seller" class="me-3" />
                <div class="text-start lh-sm">
                  <h3 class="text-black-50 mb-0 fs-4 fwbold">Map Location</h3>
                  <!--<app-map [longitude]="this.seller.coordinates[0]" [latitude]="this.seller.coordinates[1]"></app-map>-->
                  <button onclick="toggleMap(<?php echo $data1[0]->coordinates[0]; ?>, <?php echo $data1[0]->coordinates[1]; ?>)"
                     class="btn-outline-gradiant btn btn-sm w-100 d-center"> Click Here
                  </button>
                <div id="map-container" class="container-card">
                <button id="close-btn" onclick="closeMap()" class="close-btn">X</button>
              </div>
                </div>
              </div>
            </div>

            <div class="col-lg-3">
              <div class="d-flex align-items-center justify-content-md-center">
                <img src="<?php echo BASE_URL;?>assets/images/icon__8.png" alt="seller" class="me-3" />
                <div class="text-start lh-sm">
                  <h3 class="text-black-50 mb-0 fs-4 fwbold"></h3>
                  <strong>Certified by TradersFind </strong>
                </div>
              </div>
            </div>

            <div class="col-lg-3">
              <!--*ngIf="seller.youtubeLink">-->
              <div class="d-flex align-items-center justify-content-md-center">
                <img src="<?php echo BASE_URL;?>assets/images/icon__9.png" alt="seller" class="me-3" />
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
       <?php if($product->isFeatured ):?>
                    <img class="inside" src="<?php echo BASE_URL; ?>assets/images/Star_listing.png" alt="verified_image" width="80" height="30" />       
                    <?php endif;?>
                    <?php if($product->sponsoredKeywords[0]!=''):?>
                      <img class="inside" src="<?php echo BASE_URL; ?>assets/images/Premium_listing.png" alt="Premium_listing" width="80" height="30" style="margin-left: 90px;" />
                    <?php endif;?>
        <a href="<?php echo BASE_URL. $urlService->getProductUrl($product->productName,$product->id);?>" class="thumb-a">
            <div class="item-hover">
      
                <div class="hover-text">
                    <h3><?= $product->productName ?></h3>
                </div>
            </div>
            
            <div class="item-img">
               <img  src="https://doc.tradersfind.com/images/<?php echo $product->images[0]->id; ?>.webp" alt="<?php echo $product->productName;?>" style="width: 140px;">
              </div>
        </a>
    </div>
<?php endforeach; 
?>



                </div>
              </div>
            </div>
          </section>
        </div>
        <div class="tab-pane fade fs-5" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab"
          tabindex="0">
          <section class="">
            <h2 class="fwbold fs-3 mb-5 border-center text-center pt-5">
              Contact Details
            </h2>



            <div class="container-fluid">
              <div class="row">
               
              <!-- <app-map [latitude]="this.seller.coordinates[1]" [longitude]="this.seller.coordinates[0]"></app-map> -->
              <?php 
              if($data1[0]->coordinates[1]<$data1[0]->coordinates[0]){
              $latitude=$data1[0]->coordinates[1];
              $longitude=$data1[0]->coordinates[0];
              }else{
                $latitude=$data1[0]->coordinates[0];
              $longitude=$data1[0]->coordinates[1];
              }
              include_once "map.php";?>

              </div>


              <div class="row">
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
                        <h4 class=" mb-3 fw-semibold">
                          Tell us about your requirement
                        </h4>
                        <form method="post" id="postBuyreq">
                          <div class="row">

                            <div class="col-lg-8">
                              <label for="" class="form-label fw-semibold fs-5">Describe in few words *</label>
                              <textarea name="" name="description" class="form-control" id="" cols="30"
                                rows="6"
                                placeholder="Please include product name, order quantity, usage, special request if any in your inquiry."></textarea>
                              <!--<button class="p-0 text-blue bg-transparent border-0 mt-3 fs-6">
                              + Add Attachment
                            </button>-->

                            </div>
                            <div class="col-lg-4">
                              <div class="row gy-4">
                                <div class="col-lg-12">
                                  <label for="" class="form-label fw-semibold fs-5">Email ID *</label>
                                  <input type="text" name="enquirerEmail" class="form-control"
                                    placeholder="Email ID" />
                                </div>
                                <div class="col-lg-12">
                                  <div class="input-group">
                                  <select name="countryCode" class="form-control mxw-50">
                                          
                                          <option value="+971">+971 - United Arab Emirates.</option>
                 <option value="+91">+91 - India</option>
                                  </select>
                                    <!--</div>
                               <div class="col-lg-6">-->
                                    <input type="text" name="mobileNo" class="form-control"
                                      placeholder="Mobile number" width="" />
                                  </div>
                                </div>
                                <div class="row gy-4">
                                  <div class="form-check mt-0">
                                    <!-- <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked />-->
                                    <label class="form-check-label fs-6" for="flexCheckChecked">
                                    <input type="checkbox" id="option1" name="options" value="option1">
                                      I agree to
                                      <a href="https://www.tradersfind.com/term-and-conditions" target="_blank"
                                        class="text-decoration-underline">terms and conditions</a>
                                    </label>
                                  </div>
                                  
                                   

							<div class="col-lg-12 mb-2">
								<button (click)="this.requirementService.onClickSubmitRequirement()" class="btn-primary-gradiant px-md-5 py-2 rounded-10 fs-5 fwbold">SUBMIT REQUIREMENT</button>
							</div>

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
                              <p class="mb-0 fs-14">
                              <?php echo $data1[0]->firstName. ' ' .$data1[0]->lastName;?> 
                          
                              </p>
                              <p class="fs-14"> <?php echo isset($data1[0]->designation);?> </p>
                              <div class="d-flex align-items-center gap-3 ">
                                <button class="btn btn-sm btn-light  py-2 fw-semibold bg-grey w-100">
                                  <img src="assets/images/phone.png" width="16" alt="phone" />
                                 <?php $maskedService->getMaskedNumber($data1[0]->sellerVirtualContactPhone); ?>
                    </button>


                    
                                <div class=" col-lg-6 whatsappbtn">
                                <a target="_blank"
                                  href="https://api.whatsapp.com/send?phone=971569773623&text=Visited TradersFind Pages"
                                  class=" btn btn-sm fs-6 py-2 fw-semibold w-100">
                                  Connect on whatsapp
                                </a>
</div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- <app-otp *ngIf="this.requirementService.isVerification"
                          [countryCode]="this.requirementService.prodDetailFrom.value.noCode"
                          [mobileNo]="this.requirementService.prodDetailFrom.value.mobileNo"></app-otp> -->
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
  <?php include_once 'map.php';?>
  <style>
     .close-btn {
        position: absolute;
        top: 10px;
        right: 10px;
        background-color: red;
        color: white;
        border: none;
        border-radius: 50%;
        width: 30px;
        height: 30px;
        font-size: 16px;
        cursor: pointer;
    }

    .close-btn:hover {
        background-color: darkred;
    }

    .container-card {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 70%;
        max-height: 90vh; 
        overflow-y: auto;
        background-color: lightgray;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        z-index: 99999999;
    }
</style>

  <script type="text/javascript">
     function closeMap() {
        var mapContainer = document.getElementById("map-container");
        mapContainer.style.display = "none";
    }

    function generateMapUrl(latitude, longitude) {
        if (latitude && longitude) {
            // If latitude and longitude are provided, generate the map URL with them
            return "https://maps.google.com/maps?q=" + latitude + "," + longitude + "&z=15&output=embed";
        } else {
            // If latitude and longitude are not provided, use default coordinates
            return "https://maps.google.com/maps?q=23.4241,53.8478&z=15&output=embed";
        }
    }

    function generateMapIframe(latitude, longitude) {
        var mapUrl = generateMapUrl(latitude, longitude);

        // Create iframe element
        var iframe = document.createElement("iframe");
        iframe.width = "100%";
        iframe.height = "450";
        iframe.frameBorder = "1";
        iframe.style.border = "0";
        iframe.loading = "lazy";
        iframe.src = mapUrl;
        iframe.allowFullscreen = true;

        return iframe;
    }

    function toggleMap(latitude, longitude) {
        var mapContainer = document.getElementById("map-container");

        // Clear previous iframe if exists
        var existingIframe = mapContainer.querySelector('iframe');
        if (existingIframe) {
            mapContainer.removeChild(existingIframe);
        }

        // Append new iframe
        var iframe = generateMapIframe(latitude, longitude);
        mapContainer.appendChild(iframe);

        // Toggle display
        mapContainer.style.display = "block";
    }
</script>

  </script>
  <script>
              var lol='';
    var frequencytype=document.getElementsByName('frequencytype');
  frequencytype.forEach(function(radioButton) {
        radioButton.addEventListener('change', function() {
            var selectedValue = this.value;
            lol=selectedValue;
            console.log(selectedValue); // Log the selected value
        });
    });

   function otpLogin(otpAuthData, mobileNumber,formdata) {
    console.log(mobileNumber);
      const myObject = new StorageService();
      $.ajax({
        url: "https://api.tradersfind.com/api/authenticate-otp",
  method: "POST",
  dataType: "json",
  contentType: "application/json",
  data: JSON.stringify(otpAuthData),
  success: function (data) {
                       console.log(data);
                       myObject.setItem('userAccessToken', data['id_token']);
                       myObject.setItem('isLoggedIn', '1');
                       myObject.setItem('loggedVia', 'mobile');
                       myObject.setItem('userData', mobileNumber);
                       myObject.setItem('userMobile', mobileNumber);
                       myObject.setItem('login', mobileNumber);
                       myObject.setItem('userFname', "User");
                       submitRequirement(formdata);
    
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
      //this.verifyRequestProcessing = false;
    
      //var that = this;
      // setTimeout(function () { that.authService.authenticateUser(); }, 3000);
      // this.messageService.add({
      //   severity: "success",
      //   summary:
      //     'Otp verified successfully.',
      // });
      // this.dialogRef.close();
      // this.modalService.dismissAll();
      // this._router.navigate(['/']);
    }
    function otpRegister(otpAuthData, mobileNumber,formdata){
     
      const myObject1 = new StorageService();
      $.ajax({
        url: "https://api.tradersfind.com/api/register-otp",
  method: "POST",
  dataType: "json",
  contentType: "application/json",
  data: JSON.stringify(otpAuthData),
  success: function (data) {
                       console.log(data);
                       myObject1.setItem('userAccessToken', data['id_token']);
                       myObject1.setItem('isLoggedIn', '1');
                       myObject1.setItem('loggedVia', 'mobile');
                       myObject1.setItem('userData', mobileNumber);
                       myObject1.setItem('userMobile', mobileNumber);
                       myObject1.setItem('login', mobileNumber);
                       myObject1.setItem('userFname', "User");
                       submitRequirement(formdata);
    
                    },
                    error: function (xhr, status, error) {
                      console.log("test reg")
                        console.error(xhr.responseText);
                    }
                });
  }
    
    

    function verifyOtp(event,mobnumber,formdata){
           // var otm=document.getElementById('otp').value;
           // console.log(mobnumber);
           var newmobnum='+'+mobnumber;
           let otpAuthData = {
              phone: newmobnum,
              otpValue: event,
              login: newmobnum,
              isMobileLogin: true,
              langKey: "en"
    };
           var otpres='';
            $.ajax({
                    url: "https://api.tradersfind.com/api/guest/users/"+'+'+mobnumber,
                    dataType: "json",
                    data: { },
                    success: function (data) {
                       
                        if (data != "NotFound") {
          //console.log(otpAuthData,mobileNumber)
          otpLogin(otpAuthData, newmobnum,formdata);
          console.log("1");
        }
        else {
          otpRegister(otpAuthData, newmobnum,formdata);
          console.log("2");
        }
                    },
                    error: function (xhr, status, error) {
                        if(xhr.responseText!='NotFound'){
                          otpLogin(otpAuthData, newmobnum,formdata);
                        }else{
                          console.log("tttttttttt");
                          otpRegister(otpAuthData, newmobnum,formdata);
                        }
                    }
                });
            closePopup();

        }

       function startfomsubmition(){

        }
          </script>

<?php
function sendOtp($contenctNo,$formdata){
 

  $payload=array('phone'=> $contenctNo, 'loginmethod'=>'WHATSAPP');
  $data123=post(
  'api/otps',
  $payload,
  false,
  //isWhatsapp ? { type: 'whatsapp' } : {type: 'email'},
  array("type"=> 'WHATSAPP'),
  false);
  //print_r($data123->title);
  if(isset($data123->title)&& $data123->title=='ContactNo not Valid.'){
   
    echo "<script>
    if(confirm('Please click on OK and send a message (Register Me) on our whatsapp number (+971569773623) to register.')) {
        window.open('https://api.whatsapp.com/send?phone=971569773623&text=Register%20Me', '_blank');
    }
  </script>";
  }else{
  include_once 'otp.php';
 // echo $contenctNo;
  echo '<script>document.getElementById("popup-card-otp").style.display = "block";</script>';
  }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve form data
  if(isset($_POST['productName'])){
  $productName = $_POST['productName'];
  $quantity = $_POST['quantity'];
  $quantityUnit = $_POST['quantityUnit'];
  $requirement = $_POST['requirement'];
  $frequencytype = $_POST['frequencytype'];
  $countryCode = $_POST['countryCode'];
  $contactNumber = $_POST['contactNumber'];
  
  $formdata = array(
    'enquirerContactNumber' => $countryCode . $contactNumber,
    'enquiryMessage' => $requirement,
    'productName' => $productName,
    'quantity' => $quantity,
    'unit' => $quantityUnit,
    'status' => 'New',
    'frequencytype' => $frequencytype,
    'enquirerName'=>''
  );

//echo "Form submitted successfully!";
// echo $productName;
// header("Location: post-buy-requirements");
$contenctNo=$countryCode.$contactNumber;
include_once 'post.php';
//print_r($contenctNo);
$respons=sendOtp($contenctNo,$formdata);


  }
} else {

 
}
?>
<?php
 include_once 'enquery.php';
 ?>
</section>

<script>
  // Function to open the popup card
  function openPopup1() {

    document.getElementById("popup-card").style.display = "block";
  }
</script>
                                </body></html>
                                <script src="<?php echo BASE_URL; ?>assets/vendors/bootstrap/bootstrap.bundle.min.js"></script>
<?php include "footer.php"; ?>