<?php 

error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once 'config.php'; 
$SeoParams = [
  'title' => null,
  'metaTitle' => null,
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
];
?>
<html lang="en">
  <head>
  <meta name="robots" content="index, follow">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php 
        include_once 'services/seo.php';
        $seo = new seoService();
        $seo->setSeoTags($SeoParams); ?>

<script src="<?php echo BASE_URL; ?>assets/vendors/bootstrap/bootstrap.bundle.min.js"></script>
</head>
<body>
<?php
include_once "header-sub.php";
$pager=false;
?>
  
<div class="product100">

  <section class="joinus-form joinus-form2" style="background-image:url(<?php echo BASE_URL; ?>assets/images/middle-banner_3.webp)">
    <div class="_bg_overlay black2"></div>
    <div class="container">
      <div class="row align-items-center gy-5">
        <div class="col-lg-6  mb-4">
          <div class="card border-0 rounded-top-20 rounded-bottom-20">
            <div class="card-header bg-gradiant py-3 px-md-3 rounded-top-20 border-0 text-white">
              <h5 class="fs-3 fwbold text-uppercase">Register your Company Free</h5>
              <p class="mb-0">Create Company Profile with very Simple Steps & Manage your Business.</p>
            </div>
            <div class="card-body ">
            <form action="registration.php" method="post">
    <div class="my-4 floating-label">
        <input name="firstname" type="text" class="form-control form-control-lg" placeholder=" " required />
        <label for="name">Enter your Name</label>
    </div>

    <div class="my-4 floating-label">
        <input id="company" name="companyname" type="text" class="form-control form-control-lg" placeholder=" " required />
        <label for="company">Enter your Company Name</label>
    </div>

    <div class="my-4">
        <div class="input-group">
      
            <select id="countryCode" name="countryCode" class="form-control mxw-50">
                      <!--<option *ngFor="let opt of this.requirementService.countries" value="{{opt.code}}">{{ opt.code }} - {{ opt.name }}     </option>-->
                      <option value="+971">+971 - United Arab Emirates.</option>
                       <option value="+91">+91 - India</option>
                    </select>
           
            <div class="floating-label">
                <input id="mobile" name="mobileno" class="form-control form-control-lg border-start-0" placeholder=" " required />
                <label for="mobile">Enter your Mobile Number</label>
            </div>
        </div>
    </div>

    <div class="my-4 floating-label">
        <input id="business" name="emailid" type="text" class="form-control form-control-lg" placeholder=" " required email />
        <label for="business">Enter your Business Email</label>
    </div>

    <div class="my-4 floating-label">
        <input name="city" type="text" class="form-control form-control-lg" placeholder=" " required />
        <label for="location">Enter your Location</label>
    </div>

    <div class="my-4">
        <div class="form-check ms-2">
            <input class="form-check-input fs-5" type="checkbox" value="" id="flexCheckChecked" checked>
            <label class="form-check-label" for="flexCheckChecked">
                I agree to <a href="https://www.tradersfind.com/term-and-conditions" target="_blank" class="text-decoration-underline fs-5 text-info"> terms and conditions </a>
            </label>
        </div>
    </div>
    <button type="submit" class="btn-primary-gradiant px-md-5 py-2 rounded-10 fs-4 fwbold mb-4" >
        CREATE ACCOUNT
    </button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (
        isset($_POST['firstname']) &&
        isset($_POST['companyname']) &&
        isset($_POST['countryCode']) &&
        isset($_POST['mobileno']) &&
        isset($_POST['emailid']) &&
        isset($_POST['city'])
    ) {
        // Retrieve form data
        $firstname = $_POST['firstname'];
        $companyname = $_POST['companyname'];
        $countryCode = $_POST['countryCode']; // Fix the typo here
        $mobileno = $_POST['mobileno'];
        $emailid = $_POST['emailid'];
        $city = $_POST['city'];

        
        $login=  $countryCode.$mobileno;
        require_once 'post.php';
        $urlg='api/guest/users/';

       $res= get($urlg.$login,
        false,
        null,
        false,
        'text' ); 
      // print_r($res);
         function submit(){
            $firstname = $_POST['firstname'];
            $companyname = $_POST['companyname'];
            $countryCode = $_POST['countryCode']; // Fix the typo here
            $mobileno = $_POST['mobileno'];
            $emailid = $_POST['emailid'];
            $city = $_POST['city'];
        $payload = new stdClass();
        $payload->firstName =  $firstname;
        $payload->lastName = "";
        $payload->userType = "Seller";
        $payload->email =  $emailid;
        $payload->password = "Yp@12345";
        $payload->login =  $emailid;
        $payload->phone = $mobileno;
        if (  $payload->userType == 'Seller') {
            $payload->sellerCompanyType = "Business Manu";
            $payload->sellerPropName =null;
            $payload->sellerZipCode =$countryCode;
            $payload->sellerCompanyAddress = null;
            $payload->sellerCountry = null;
            $payload->sellerState = null;
            $payload->sellerCity = null;
            $payload->sellerCompanyName = $companyname;
          } else {
            $payload->address =$city;
            $payload->country = null;
            $payload->state = null;
            $payload->city = null;
          }
          $payload->langKey = 'en';
          $payload->isSocialLogin = false;
      
          $payload->status = "Pending for Approval";
          require_once 'post.php';
          $url='api/register';
         $response= post($url, $payload, false, null, true, 'text');
       
     
         echo '<script>alert("Form submitted. You are registred successfully!"); window.location.href = "/";</script>';
    } 
    if($res=="NotFound"){
        submit();
       
    }else if($res==="Found"){

      echo '<script type="text/javascript">
      alert("User is Already registered!");
      window.history.back();
  </script>';
  exit();
     

    }
}
} 
?>

            </div>
          </div>
        </div>
        <div class="col-lg-6 mt-0 text-white customer">
          <h4 class=" text-uppercase text-center fs-4 fwbold fw-bold ">SELL YOUR PRODUCTS OR SERVICES TO MILLIONS OF
            CUSTOMER !</h4>
          <h4 class=" text-center">Get your business registered with us at no cost</h4>
          <div class="mt-4 p-1 text-center rounded-1 bg-gradiant text-white fs-5 fwbold TradersFindB"> Get started with
            TradersFind </div>
          <div class="row justify-content-center align-items-center sell_product mt-5">
            <div class="col text-center">
              <img src="assets/images/join-icon_7.jpg" class="img-fluid rounded-10" alt="register now">
              <!--<h5 class="mt-2 mb-0">9237056+</h5>-->
              <p class="fs-18 pt-2">Product/Services</p>
            </div>

            <div class="col text-center ">
              <img src="assets/images/join-icon_8.jpg" class="img-fluid rounded-10" alt="register now">
              <!--<h5 class="mt-2 mb-0">9237056+</h5>-->
              <p class="fs-18 pt-2">Sellers</p>
            </div>

            <div class="col text-center">
              <img src="assets/images/join-icon_9.jpg" class="img-fluid rounded-10" alt="register now">
              <!--<h5 class="mt-2 mb-0">9237056+</h5>-->
              <p class="fs-18 pt-2">Verified Buyers</p>
            </div>
          </div>
        </div>
      </div>
    </div>

  </section>
  <section class="bg-gradiant2 mt-5">
    <div class="container">
      <div class="row gy-5 justify-content-center pb-5">
        <div class="col-lg-12">
          <h2 class="border-center text-center fs-2">How TradersFind Works?</h2>
        </div>
        <div class="col-lg-6">
          <ul class="howtobuy">
            <li>
              <div class="d-flex align-items-center gap-4">
                <img src="assets/images/join-icon_1.jpg" alt="register now" />
                <h5 class="fwbold">Register on TradersFind </h5>
              </div>
            </li>
            <li>
              <div class="d-flex align-items-center gap-4">
                <img src="assets/images/join-icon_2.jpg" alt="register now" />
                <h5 class="fwbold">Add Your Product & Services</h5>
              </div>
            </li>
            <li>
              <div class="d-flex align-items-center gap-4">
                <img src="assets/images/join-icon_3.jpg" alt="register now" />
                <h5 class="fwbold">Your products/services will display online</h5>
              </div>
            </li>
            <li>
              <div class="d-flex align-items-center gap-4">
                <img src="assets/images/join-icon_4.jpg" alt="register now" />
                <h5 class="fwbold">Receive Buyer Inquiries in your Folder</h5>
              </div>
            </li>
            <li>
              <div class="d-flex align-items-center gap-4">
                <img src="assets/images/join-icon_5.jpg" alt="register now" />
                <h5 class="fwbold">Connect with buyer Instantly for further Deals</h5>
              </div>
            </li>
          </ul>
        </div>
        <div class="col-lg-6">
          <img src="assets/images/join-icon_6.jpg" alt="register now" class="img-fluid">
        </div>
      </div>
    </div>
  </section>

  <section class="bg-grey p-4 my-5 mt-0 ">
    <p class="fs-5 text-center">Associated Brands</p>
    <h3 class="border-center text-center mb-5">TRADERSFIND IS TRUSTED BY</h3>
    <div class="row gy-4">
      <div class="col-lg-2 col-sm-6 col-6">
        <span class="brand-box"><img src="assets/images/brands/1.png" class="img-fluid" alt="brand" /></span>
      </div>
      <div class="col-lg-2 col-sm-6 col-6">
        <span class="brand-box"><img src="assets/images/brands/2.png" class="img-fluid" alt="brand" /></span>
      </div>
      <div class="col-lg-2 col-sm-6 col-6">
        <span class="brand-box"><img src="assets/images/brands/3.png" class="img-fluid" alt="brand" /></span>
      </div>
      <div class="col-lg-2 col-sm-6 col-6">
        <span class="brand-box"><img src="assets/images/brands/4.png" class="img-fluid" alt="brand" /></span>
      </div>
      <div class="col-lg-2 col-sm-6 col-6">
        <span class="brand-box"><img src="assets/images/brands/5.png" class="img-fluid" alt="brand" /></span>
      </div>
      <div class="col-lg-2 col-sm-6 col-6">
        <span class="brand-box"><img src="assets/images/brands/6.png" class="img-fluid" alt="brand" /></span>
      </div>
    </div>
  </section>

  <section class="container-fluid bg-gradiant2 pb-5">
    <div class="row gy-5 gx-md-4 justify-content-center">
      <div class="col-lg-12">
        <div class="text-center">
          <p class="fs-5">Features You can Avail</p>
          <h3 class="border-center text-center fs-3">Features and Benefits of using our Productivity Tools</h3>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="px-4 text-center">
          <img src="assets/images/join-icon1.jpg" alt="register" />
          <h4 class="fs-5 fwbold mt-4 mb-3">
            Custom Domain Name
          </h4>
          <p class="fs-18">
            Get your own Responsive website & domain name with company registration on TradersFind.com
          </p>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="px-4 text-center">
          <img src="assets/images/join-icon2.jpg" alt="register" />
          <h4 class="fs-5 fwbold mt-4 mb-3">
            Online Company Profile Page
          </h4>
          <p class="fs-18">
            Get your own Responsive website & domain name with company registration on TradersFind.com
          </p>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="px-4 text-center">
          <img src="assets/images/join-icon3.jpg" alt="register" />
          <h4 class="fs-5 fwbold mt-4 mb-3">
            Website Link at Relevant Places
          </h4>
          <p class="fs-18">
            Get your own Responsive website & domain name with company registration on TradersFind.com
          </p>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="px-4 text-center">
          <img src="assets/images/join-icon4.jpg" alt="register" />
          <h4 class="fs-5 fwbold mt-4 mb-3">
            Product / Service Management
          </h4>
          <p class="fs-18">
            Get your own Responsive website & domain name with company registration on TradersFind.com
          </p>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="px-4 text-center">
          <img src="assets/images/join-icon5.jpg" alt="register" />
          <h4 class="fs-5 fwbold mt-4 mb-3">
            Product / Service Grouping
          </h4>
          <p class="fs-18">
            Get your own Responsive website & domain name with company registration on TradersFind.com
          </p>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="px-4 text-center">
          <img src="assets/images/join-icon6.jpg" alt="register" />
          <h4 class="fs-5 fwbold mt-4 mb-3">
            Excellent Dashboard
          </h4>
          <p class="fs-18">
            Get your own Responsive website & domain name with company registration on TradersFind.com
          </p>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="px-4 text-center">
          <img src="assets/images/join-icon7.jpg" alt="register" />
          <h4 class="fs-5 fwbold mt-4 mb-3">
            Buyer Inquiry Section
          </h4>
          <p class="fs-18">
            Get your own Responsive website & domain name with company registration on TradersFind.com
          </p>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="px-4 text-center">
          <img src="assets/images/join-icon8.jpg" alt="register" />
          <h4 class="fs-5 fwbold mt-4 mb-3">
            Buy Lead Database Access
          </h4>
          <p class="fs-18">
            Get your own Responsive website & domain name with company registration on TradersFind.com
          </p>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="px-4 text-center">
          <img src="assets/images/join-icon9.jpg" alt="register" />
          <h4 class="fs-5 fwbold mt-4 mb-3">
            Inquiry Alert Setting
          </h4>
          <p class="fs-18">
            Get your own Responsive website & domain name with company registration on TradersFind.com
          </p>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="px-4 text-center">
          <img src="assets/images/join-icon10.jpg" alt="register" />
          <h4 class="fs-5 fwbold mt-4 mb-3">
            Trusted Certificate
          </h4>
          <p class="fs-18">
            Get your own Responsive website & domain name with company registration on TradersFind.com
          </p>
        </div>
      </div>
    </div>
  </section>

  <section class="pb-4">
    <div class="container">
      <h5 class="fs-3 fwbold mb-0 text-uppercase mt-5 text-center">IF YOU'RE READY TO START YOUR B2B JOURNEY ONLINE,
        JOIN US NOW!</h5>
      <div class="col-lg-12 fs-18 text-center mt-4">
        <p>
          Global Exposure, 24X7 live showroom, instant inquiries, potential buyers! All this is what B2B
          entrepreneurs dream to growing business online. TradersFind.com is the answer to all, which
          continues to serve you with such a common B2B online Marketplace with in numerous manufacturers,
          wholesalers suppliers, importers, exporters, service providers,of various companies have registered
          their business in it.
        </p>
        <p>
          After seller registration selling products on TradersFind is very easy and effective.
          Register your company by providing your contact details, and simply add your products to create free
          business listing and your catalog.
        </p>
        <p>
          TradersFind is the destination where business enterprises have benefited by the much needed
          promotion and exposure in the current scenario of global B2B platform. This online B2B directory is the
          home of in numerous products and buyer inquiries, verified leads and hence it serves as the ideal
          destination for every one who wants to witness a grow in their company registration.
          TradersFind is an online B2B platform to sell various products online & one can find top
          online branding products here.
        </p>

      </div>
      <div class="col-lg-12 text-center">
        <button class="btn-primary-gradiant px-md-5 py-2 rounded-10 fs-5 fwbold mb-3" (click)="scrollToTop()">Enquiry Now</button>
      </div>
    </div>
  </section>



  <section class="bg-gradiant2 pb-3">
    <div class="container mt-5">
      <div class="row gy-5">
        <div class="col-lg-12 text-center">
          <h4 class="fs-3 fwbold mb-0 text-uppercase">Frequently Asked Question</h4>
        </div>
        <div class="col-lg-12 mt-4">
          <div class="accordion faqaccor" id="accordionExample">
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                  data-bs-target="#collapseOne" aria-expanded="true">
                  Q1. Who all can sell their products or services on TradersFind.Com?
                </button>
              </h2>
              <div id="collapseOne" class="accordion-collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                 <p>
                 TradersFind is an inclusive online marketplace catering to both individuals and businesses,
                  be it small or large, across diverse industries. It offers a platform for selling products 
                  or services without any size or industry restrictions.
                 </p>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                aria-controls="collapseThree" >
                  Q2. What details are required for registration on TradersFind.Com?
                </button>
              </h2>
              <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body ">
                  <p class="mb-2 ">To successfully register on TradersFind.Com, you need:</p>
                  <ul>
                    <li>• Email id</li>
                    <li>• Mobile number</li>
                    <li>• Company Name</li>
                    <li>• Company Address</li>
                    <li>• At least 1 Product/Service</li>
                    <li>• Country name</li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#collapseThree" aria-controls="collapseThree">
                  Q3. How do I register on TradersFind.com?
                </button>
              </h2>
              <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body">
               <li>Visit the TradersFind homepage.</li> 
               <li> Find the 'Join Free' button located on the top left-hand corner of the page.</li>
               <li>Click on the 'Join Free' button, which will take you to the Registration Page.</li>        
               <li>Enter your necessary information such as your name, email, mobile number, company name, product/service, and address.</li>         
               <li>After that, click on the 'Create Account' button</li>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#collapsefour" aria-controls="collapsefour">
                  Q4. How can TradersFind.com help me in generating more business?
                </button>
              </h2>
              <div id="collapsefour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <p>
                  TradersFind can assist you in growing your business by offering a way to link up with the 
                  suitable buyers and sellers from different industries. This platform also allows you to look
                   for relevant products or services, connect with suppliers or customers, and increase your 
                   chances of doing business.
                  </p>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#collapsefive" aria-controls="collapsefive">
                  Q5. How much registration charge do I have to pay?
                </button>
              </h2>
              <div id="collapsefive" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body">
               <p>
               The registration on Tradersfind is absolutely free. Also, TradersFind offers paid packages
                which include several benefits and features that will help you to attract more visitors.
                 To know more, Enquire Now.
               </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="col-lg-12 text-center">
        <h4 class="fs-3 fwbold mb-3 mt-5 text-uppercase">Still have questions? We can help.</h4>
        <button class="btn-primary-gradiant px-md-5 py-2 rounded-10 fs-5 fwbold mb-3" (click)="scrollToTop()">Request a Call</button>
      </div>
    </div>

  </section>




  <section class="bg-grey3 py-4 text-center px-md-5">
    <div class="container">
      <h3 class="border-center text-center mb-5 fs-3">WHY TO SELL AT TRADERSFIND?</h3>
      <div>
        <p class="fs-18 text-white">
          B2B portals have made possible for buyers and sellers to carry out sales and business activities online. An
          effective B2B website is one that generates leads for your business. More
          specifically, Sell Online Products regularly and promote your products around the world by company
          registration with TradersFind.com
        </p>
        <p class="fs-18 text-white">
          B2B portals have made possible for buyers and sellers to carry out sales and business activities online. An
          effective B2B website is one that generates leads for your business. More
          specifically, Sell Online Products regularly and promote your products around the world by company
          registration with TradersFind.com
        </p>
        <p class="fs-18 text-white">
          B2B portals have made possible for buyers and sellers to carry out sales and business activities online. An
          effective B2B website is one that generates leads for your business. More
          specifically, Sell Online Products regularly and promote your products around the world by company
          registration with TradersFind.com
        </p>
      </div>
      <button class="btn-primary-gradiant px-md-5 py-2 rounded-10 fs-5 fwbold mb-3" (click)="scrollToTop()">Register Now</button>
    </div>
  </section>
</div>
</body></html>
<?php
include_once "footer.php"
?>
