<?php include_once 'config.php'; 
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
      "url": "https://www.tradersfind.com",
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
    }
  ]
}';

  $SeoParams = [
    'title' => null,
    'metaTitle' => 'UAEs Largest Online B2B Portal - TradersFind',
    'metaDescription' => null,
                'metaKeywords' => null,
                'fbTitle' => null,
                'fbDescription' => null,
                'fbImage' => null,
                'fbUrl' => null,
                'twitterTitle' => null,
                'twitterDescription' => null,
                'twitterImage' => null,
                'twitterSite' => null,
                'twitterCard' => null,
                'schemaDescription' => $schema,
  ];
?>

<html lang="en">
  <head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php 
        include_once 'services/seo.php';
        $seo = new seoService();
        $seo->setSeoTags($SeoParams); ?>
  <!-- Google Tag Manager -->
  <script>
    (function (w, d, s, l, i) {
      w[l] = w[l] || []; w[l].push({
        'gtm.start':
          new Date().getTime(), event: 'gtm.js'
      }); var f = d.getElementsByTagName(s)[0],
        j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : ''; j.async = true; j.src =
          'https://www.googletagmanager.com/gtm.js?id=' + i + dl; f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-TRQH674');</script>
   <!--End Google Tag Manager -->

</head>
<body>   
  <!-- Google Tag Manager (noscript) -->
  <noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TRQH674" height="0" width="0"
      style="display:none;visibility:hidden"></iframe>
  </noscript>
   <!--End Google Tag Manager (noscript) -->
<?php
include "header.php";
include "home-search.php"
?>


<section class="container-fluid my-2">
  <div class="row gy-2">
    <div class="col">
     <?php
     include "home-industry.php";
     ?>
    </div>

    <div class="col-lg-7 border_img">
      <!-- banner -->

      <div class="owl-carousel carousel-main1">
 
    <?php
    include_once "post.php";
    $midBanner=get('api/guest/banners-by-header',false,false);
    $fin=json_decode($midBanner);
    
    foreach($fin as $index=> $mbanner){
      
      $midbanUrl=IMAGE_URL.$mbanner->image->id.'.webp';
        ?>
 
    
        <img src="<?php echo $midbanUrl; ?>" class="d-block w-100" alt="banner">
     

      <?php
    }
    ?>
    
    </div>
      

    </div>
    <div class="col">
      <div class="swiper2">
        <div class="position-relative bg-transparent new_img_11">
          <img src="<?php echo BASE_URL; ?>assets/images/brands/new1.webp" alt="Post Buy Requirements" width="271" height="193" class="w-100 img-fluid" />
          <div class="hading2">
            <p>Looking for a <br> product ?</p>
            <a href="<?php echo  BASE_URL ?>post-buy-requirements">Post Buy Requirement</a>
          </div>
        </div>

        <div class="position-relative   py-1	 bg-transparent new_img_11">
          <img src="<?php echo BASE_URL; ?>assets/images/brands/new2.webp" alt="Grow Business" width="271" height="193" class="w-100 img-fluid" />
          <div class="hading2">
            <p>Want to grow your <br> business 10X Faster?</p>
            <a href="<?php echo  BASE_URL ?>register-your-business">Sell on TradersFind</a>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<section class="my-2  about_text" >
  <h2 class="border-center text-center mb-4">ABOUT TRADERSFIND </h2>

  <div class="container">
    <div class="row">
      <div class="col-12">
      <div class="owl-carousel carousel-main1">
             <div class="text-center">
                <h3 class="text-red">UAE’s Largest Online B2B Portal & Business Directory in UAE</h3>
                <p class="">Welcome to TradersFind, the UAE’s Largest Online B2B portal & business directory in UAE. 
                  As a comprehensive B2B marketplace for buyers and sellers in UAE, we are here to revolutionize the way businesses connect, 
                  collaborate, and succeed in the global marketplace. With a deep understanding of the challenges faced by traders and a passion 
                  for empowering businesses, TradersFind is your go-to destination for finding the right products, connecting with trusted suppliers, 
                  and driving your business forward.
                </p>
                
                <a class="btn-primary-gradiant rounded-2" href="<?php echo  BASE_URL ?>about-us">LEARN MORE ABOUT US</a>

              </div>
    
    
               <div class="text-center">
                <h3 class="text-red">Connecting Businesses Across UAE: A Powerful B2B Marketplace</h3>
                <p class="">
                  TradersFind is more than just a directory of UAE companies; it is a powerful online B2B marketplace in UAE  
                  where businesses can source products, connect with suppliers, and expand their networks. We provide an easy to 
                  use platform that connects buyers and sellers, importers and exporters, manufacturers and suppliers, retailers, 
                  and service providers in UAE within a single marketplace. Whether you are a local business looking for suppliers 
                  in UAE or an international company seeking trade opportunities in UAE’s thriving market, TradersFind is your gateway to expand your business in UAE.
                </p>
                <a class="btn-primary-gradiant rounded-2" href="<?php echo  BASE_URL ?>about-us">LEARN MORE ABOUT US</a>
              </div>
   
              <div class="text-center">
                <h3 class="text-red">Your Comprehensive Business Directory in UAE</h3>
                <p class="">
                  With our extensive list of companies in UAE, including manufacturers, suppliers, and service providers, 
                  we enable businesses to find reliable and trustworthy partners to meet their specific needs. Whether you're a startup, 
                  a small or medium-sized enterprise, or a large corporation, our platform provides the resources and opportunities 
                  you need to thrive in the competitive market. Our business directory of UAE companies is updated at regular intervals to ensure 
                  that you have access to the most relevant and up-to-date information.
                </p>
                <a class="btn-primary-gradiant rounded-2" href="<?php echo  BASE_URL ?>about-us">LEARN MORE ABOUT US</a>
              </div>
    
          
              <div class="text-center">
                <h3 class="text-red">Connect with Verified Suppliers and Buyers in UAE</h3>
                <p class="">
                  At TradersFind, we prioritize quality and trust. We understand that the success of your business depends on the reliability of your partners. 
                  That's why we have implemented a rigorous verification process to ensure that all the verified suppliers and 
                  buyers on our platform meet the highest standards of quality, authenticity, and ethical practices. 
                  When you connect with a verified  supplier or buyer through TradersFind, you can have confidence in the credibility and reliability of your business partners.
                </p>
                <a class="btn-primary-gradiant rounded-2" href="<?php echo  BASE_URL ?>about-us">LEARN MORE ABOUT US</a>
              </div>
    
              <div class="text-center">
                <h3 class="text-red">Expand Your Reach and Boost Visibility</h3>
                <p class="">
                  At TradersFind, we understand the importance of accessibility and convenience in the digital age. 
                  Our online marketplace provides a platform for businesses to display their products and services, 
                  allowing them to reach a wider audience. Our efficient interface allows free business listings that increase 
                  their visibility among potential customers without hurting their pockets.
                </p>
                <a class="btn-primary-gradiant rounded-2" href="<?php echo  BASE_URL ?>about-us">LEARN MORE ABOUT US</a>
              </div>
   
             <div class="text-center">
                <h3 class="text-red">Find Everything You Need at One Place:</h3>
                <p class="">
                  TradersFind offers a comprehensive platform where you can find everything you need in one place. 
                  Our extensive product categories cover a wide range of industries, ensuring that you can find the 
                  right products for your business requirements. Whether you are searching for electronics, machinery, 
                  textiles, or raw materials, our platform has a diverse selection to cater to your needs. TradersFind 
                  is a place where you can connect with suppliers at one click.
                </p>
                <a class="btn-primary-gradiant rounded-2" href="<?php echo  BASE_URL ?>about-us">LEARN MORE ABOUT US</a>
              </div>
    
              <div class="text-center">
                <h3 class="text-red">Get Started with TradersFind Today: Your Gateway to Success</h3>
                <p class="">
                  Get Started with TradersFind, UAE’s leading B2B website connecting buyers with sellers. 
                  Discover a vast network of trusted and verified suppliers, manufacturers, and service providers in UAE. 
                  Join now to expand your business reach, explore new opportunities, and take your business to new heights. 
                  One Click 3 options to fulfill all your requirements. Option 1: Click to Call, Option 2: Click to Connect on Whatsapp, Option 3: Click to Send your Requirement.
                </p>
                <a class="btn-primary-gradiant rounded-2" href="<?php echo  BASE_URL ?>about-us">LEARN MORE ABOUT US</a>
              </div>
    </div>
  </div>
  </div>
  </div>          
      
</section>
<script src="services/storegeService.js"></script>
<script>
       function closePopup() {
    document.getElementById("popup-card-otp").style.display = "none";
  }
  function submitRequirement(formdata){
  // var productname=document.getElementById("productName").value;
  
  // var quantity=document.getElementById("quantity").value;
  // var Unit=document.getElementById("quantityUnit").value;
  // var requirement=document.getElementById("requirement").value;
 
  // var countryCode=document.getElementById("countryCode").value;
  // var contactNumber=document.getElementById("contactNumber").value;
  
//console.log(productname);
        // let payload = {
        //   enquirerName: 'Atulyadav',
        //   enquirerContactNumber: countryCode+contactNumber,
        //   enquirerEmail:'atul@sakshemit.com',
        //   enquiryMessage: requirement,
        //   productName:productname,
        //   quantity: quantity,
        //   unit: Unit,
        //   buyer: { id: '651266a6be013b38a26b35bf' },
        //   status: 'New',
        //   frequencytype: lol
        // }
        document.getElementById("postBuyreq").reset();

       // formdata.frequencytype=lol;
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
  //console.log(payload);
  }
</script>
<section class="easysource my-4 py-2">
  <div class="container">
    <div class="row gy-4">
      <div class="col-lg-6">
        <h3><b>CONNECT WITH VERIFIED SELLERS FOR YOUR REQUIREMENTS</b></h3>
        <p class="mb-3"><br>Provide your specific service & product requirements & connect with verified sellers for your specific
          needs.</p>

        <ul class="sellers_text">
          <li>Time and Effort Saving </li>
          <li>Connect with Verified Sellers</li>
          <li>Assured Product Quality</li>
          <li>Competitive Pricing</li>
        </ul>
        <br>
        <a  href="<?php echo  BASE_URL ?>about-us" title="Learn More" class="mt-5"><b>Learn More </b></a>
      </div>
      <div class="col-lg-6">
        <div class="card-transparent">
          <h3 class="fs-4">Let us know what you need</h3>
          <form method="post" id="postBuyreq">

            <input type="text" class="form-control" name="productName"
              placeholder="Product Name / Service" />
            <div class="row mt-1">
              <div class="col-md-6">
                <div class="mb-3">
            
                  <label>Quantity</label>
                  <input type="text" class="form-control" name="quantity"
                    placeholder="Estimated Order Quantity">

                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="unit">Unit</label>
                  <select name="quantityUnit" class="form-control"
                    placeholder="eg:  Dozen,  Piece(s),  Tonr">
                    <?php
                 
                 $context = stream_context_create([
                  'ssl' => [
                      'verify_peer' => false,
                      'verify_peer_name' => false,
                  ],
              ]);
              $resUnit = file_get_contents(BASE_URL . 'assets/testingJson/Units.json', false, $context);

                      $allunit=json_decode($resUnit);
                      foreach($allunit as $unit){
                             ?>
                             <option value="<?php echo $unit;?>">
                            <?php echo $unit;?>
                            </option>
                             <?php
                      }
                      ?>                  </select>

                </div>
              </div>
            </div>
            <textarea name="" class="form-control" cols="30" rows="3"
              placeholder="Product Description and Quantity" name="requirement"></textarea>
              <div class="row mt-3">
                <div class="col-md-6">
                  <div class="mb-3"> &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" id="onetime" name="frequencytype" value="onetime" checked>&nbsp;&nbsp;<label for="onetime">One Time</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3"> &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" id="recuring" name="frequencytype" value="recuring">&nbsp;&nbsp;<label for="recuring">Recurring</label>
                  </div>
                </div>
              </div>
            <div class="row mt-1">
              <div class="col-lg-6">
                <div class="input-group">

                  <select area-label="countryCode" name="countryCode" class="form-control mxw-50">
                
                  <?php
                      $rescuntrycode=file_get_contents( BASE_URL.'assets/testingJson/country_codes_v1.json',false, $context);
                      $allcuntrycode=json_decode($rescuntrycode);
                      foreach($allcuntrycode as $unit){
                             ?>
                             <option value="<?php echo $unit->code;?>">
                            <?php echo $unit->code.'-'.$unit->name;?>
                            </option>
                             <?php
                      }
                      ?>
                  
                    
                  </select>

                  <input type="number" name="contactNumber" class="form-control" placeholder="Mobile"
                    required="number" />
                </div>
              </div>
              <!--<app-loadp *ngIf="requirementService.spannerval" style="height: 50%; width: 60%; margin-left: -5px;"></app-loadp>-->
              <div class="col-lg-6">
                <button class="btn-primary-gradiant w-100 rounded-2 mt10">
                  Post Your Request
                </button>
              </div>
            </div>
          </form>
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
  if(isset($_POST['productName'])&isset($_POST['contactNumber'])){
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
}else{
  if(isset($_POST['search']) && $_POST['search']!=''){
    if(isset($_POST['location']) && $_POST['location']!='' && $_POST['location']!='UAE'){
      $redirect_url = str_replace(' ','-',(BASE_URL.'search/'.$_POST['search'].'/'.$_POST['location']));
      echo '<script>window.location.href = "'.$redirect_url.'";</script>';
    }else{
    $redirect_url = str_replace(' ','-',(BASE_URL.'search/'.$_POST['search']));
   echo '<script>window.location.href = "'.$redirect_url.'";</script>';
    }
  }

}
} else {

 
}
?>


        </div>
      </div>
    </div>
  </div>
</section>

<section class="bg-grey bg-grey_22 p-4 my-5">
  <h3 class="border-center text-center mb-4">FIND SELLERS FROM TOP EMIRATES </h3>
  <div class="owl-carousel carousel-main4">
    <?php
   $items=array('assets/images/c1.png','./assets/images/c2.png',
   './assets/images/c3.png','./assets/images/c4.png',
   './assets/images/c5.png','./assets/images/c1.png','./assets/images/c3.png');
   $state=array('DUBAI','ABU DHABI','SHARJAH','AJMAN','FUJAIRAH','RAS AL KHAIMAH','UMM AL QUWAIN');
    $totalItems = count($items);
    $itemsPerSlide = 4;
    $numSlides = ceil($totalItems / $itemsPerSlide);
    

    for ($i = 0; $i < $numSlides; $i++) {
       
        
        
        // Loop through items for this slide
        for ($j = $i * $itemsPerSlide; $j < min(($i + 1) * $itemsPerSlide, $totalItems); $j++) {
           
            // Output item content here, you can access $items[$j] to get each item
            echo '<div class="position-relative bg-transparent swiper2 p-2">';
            echo '<img src="'.BASE_URL . $items[$j] . '" width="209" height="80" alt="" class="w-100 img-fluid" />';           
            echo '<a href="/search/'.strtolower(str_replace(" ","-",
            $state[$j])).'">';
            echo '<h4>' . $state[$j] . '</h4>';
            echo '</a></div>';
          
        }
    }
    ?>
  
</div>


</section>

<section>
 <?php
 include "home-blog.php";
 ?>
</section>

<section class="bg-grey bg-grey_22 p-4 my-5  ">

  <h3 class="border-center text-center mb-4">
    EXPLORE PREMIUM SELLERS
  </h3>
  <div class="owl-carousel carousel-main4">
    <div class="p-2">
          <span class=""><img src="<?php echo BASE_URL; ?>assets/images/brands/101.png" width="302px" height="159"  alt="Seller"></span>
        </div>
    <div class="p-2">
          <span class=""><img src="<?php echo BASE_URL; ?>assets/images/brands/102.png" width="302px" height="159"alt="Seller"></span>
        </div>
    <div class="p-2">
          <span class=""><img src="<?php echo BASE_URL; ?>assets/images/brands/103.png" width="302px" height="159"  alt="Seller"></span>
        </div>
  <div class="p-2">
          <span class=""><img src="<?php echo BASE_URL; ?>assets/images/brands/104.png" width="302" height="159"  alt="Seller"></span>
        </div>
</div>
  
</section>

<section class="my-5 logo_slider">
  <h3 class="border-center text-center mb-5">
    WHAT OUR HAPPY CLIENTS SAY ABOUT US
  </h3>
  <div class="container">
  <div class="owl-carousel carousel-main12">
  
            <div class="card ml15">
              <div class="card-body">
                <div class="row">
                  <div class="col-3">
                    <img src="<?php echo BASE_URL; ?>assets/images/client.png" class="img-fluid w-100" alt="Happy Client" width="165" height="162">
                  </div>
                  <div class="col-9">
                    <h4>Mr. Imtiaz</h4>
                    <div class="d-flex gap-4 align-items-center mb-3">
                      <img src="<?php echo BASE_URL; ?>assets/images/location-2.png" alt="location" width="25" height="28">
                      <address class="mb-0"> UAE, Dubai</address>
                      <div class="clientTime">8 Months</div>

                    </div>
                    <p>
                      Highly recommend this website as its user friendly, I feel so much ease while finding sellers for my
                      requirement. It saves a lot of time and I find sellers easily.
                    </p>
                    <div class="d-flex gap-4">
                    </div>
                  </div>
                </div>
              </div>
            </div>

    
          <div class="card ml15">
            <div class="card-body">
              <div class="row">
                <div class="col-3">
                  <img src="<?php echo BASE_URL; ?>assets/images/client.png" class="img-fluid w-100" alt="Happy Client" width="165" height="162">
                </div>
                <div class="col-9">
                  <h4>Mr. Ahmed Ali</h4>
                  <div class="d-flex gap-4 align-items-center mb-3">
                    <img src="<?php echo BASE_URL; ?>assets/images/location-2.png" alt="location" width="25" height="28">
                    <address class="mb-0"> UAE, Abu Dhabi</address>
                    <div class="clientTime">3 Months</div>

                  </div>
                  <p>
                    The website is informative and helps you to connect with suppliers sitting across the country through
                    just one click and fulfil your business needs. <br>
                  </p>
                  <div class="d-flex gap-4">

                  </div>
                </div>
              </div>
            </div>
          </div>

          </div>
  </div>
</section>

<section class="bg-grey bg-grey_22 p-4 my-5 logo_slider">
  <h3 class="border-center text-center mb-5">EXPLORE PREMIUM BRANDS</h3>


    <div class="owl-carousel carousel-main">
        <span class="brand-box brand-box2">
          <img src="<?php echo BASE_URL; ?>assets/images/brands/1.png" width="180" height="48" class="" alt="brand" />
        </span>
        <span class="brand-box brand-box2">
          <img src="<?php echo BASE_URL; ?>assets/images/brands/2.png" width="185" height="124" class="" alt="" />
        </span>
        <span class="brand-box brand-box2">
          <img src="<?php echo BASE_URL; ?>assets/images/brands/3.png" width="185" height="124" class=""
               alt="brand" />
        </span>
        <span class="brand-box brand-box2">
          <img src="<?php echo BASE_URL; ?>assets/images/brands/4.png" width="185" height="124" class=""
               alt="brand" />
        </span>
        <span class="brand-box brand-box2">
          <img src="<?php echo BASE_URL; ?>assets/images/brands/5.png" width="185" height="124" class=""
               alt="brand" />
        </span>
        <span class="brand-box brand-box2">
          <img src="<?php echo BASE_URL; ?>assets/images/brands/6.png" width="185" height="124" class=""
               alt="brand" />
        </span>
</div>    
</section>

<?php
include "footer.php";
?>
</body>
</html>