<?php include_once 'config.php'; 
$SeoParams = [
  'title' => 'TradersFind Seller FAQ: Registration &amp; Paid Memberships',
  'metaTitle' => 'TradersFind Seller FAQ: Registration &amp; Paid Memberships',
  'metaDescription' => 'Get answers to your questions about registration, paid membership, and more on TradersFind seller FAQ page. Start boosting your selling potential!',
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
</head>
<body>
<?php include_once "header-sub.php";
?>
<section class="p-3">
  <nav style="--bs-breadcrumb-divider: '>'" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/">TradersFind -> </a></li>
      <li class="breadcrumb-item active" aria-current="page">
        Seller Frequently Asked Questions 
      </li>
    </ol>
  </nav>
</section>


<section class="tabBg">
  <div class="container">
    <div class="row ">
      <div class="btn-primary-gradiant btn-primary-gradiant rounded-0 py-3"></div>
    </div>
  </div>
  <div class="container shadow2">

    <div class="row ddd">
      <div class="row mt-4">
        <div class="col-lg-3 nev2 ">
          <form class="form-subscribe" action="#">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search here...">
              <span class="input-group-btn">
                <button class="btn btn-primary-gradiant  btn-lg" type="submit"><img src="assets/images/search-icon.png" width="18" alt="search"></button>
              </span>
            </div>
          </form>
          <div class="fwbold fw-bold fs-5 mt-4 mb-2 text-uper">SELLER'S HELP CENTER</div>
          <div class="nav flex-column nav-pills fwbold fw-bold fs-5">
            <button class="nav-link1  active" data-bs-toggle="pill" data-bs-target="#v-getting-started" type="button" aria-selected="true">Getting Started</button>
            <button class="nav-link1" data-bs-toggle="pill" data-bs-target="#v-my-account-dashboard" type="button" aria-selected="false">My Account Dashboard</button>
            <button class="nav-link1" data-bs-toggle="pill" data-bs-target="#v-add-business-profile" type="button" aria-selected="false">Add/Edit Business Profile</button>
            <button class="nav-link1" data-bs-toggle="pill" data-bs-target="#v-enquiry-management" type="button" aria-selected="false">Enquiry Management</button>
           <!-- <button class="nav-link1" data-bs-toggle="pill" data-bs-target="#v-add-product" type="button" aria-selected="false">Add/Update Products</button>
            <button class="nav-link1"  data-bs-toggle="pill" data-bs-target="#v-product-display-mnagement" type="button" aria-selected="true">Product Display Management</button>
           -->
            <button class="nav-link1" data-bs-toggle="pill" data-bs-target="#v-manage-business-service" type="button" aria-selected="false">Manage Business Services</button>
            <button class="nav-link1" data-bs-toggle="pill" data-bs-target="#v-buy-requirements" type="button" aria-selected="false">Buy Requirements</button>
            <button class="nav-link1" data-bs-toggle="pill" data-bs-target="#v-verified-buy-leads" type="button" aria-selected="false">Verified Buy Leads</button>
            <button class="nav-link1" data-bs-toggle="pill" data-bs-target="#v-premium-memberships" type="button" aria-selected="false">Premium Memberships</button>
            <!--
            <button class="nav-link1" data-bs-toggle="pill" data-bs-target="#v-misc-questions" type="button" aria-selected="false">Miscellaneous Questions</button>
            --> 
          </div>
        </div>

        <div class="tab-content col-lg-9 px-sm-3 mb-5">
          <div class="tab-pane fade show active" id="v-getting-started">
            <div class="fs-3 text-dark  fwbold fw-bold px-md-3">Getting Started</div>
            <div class="accordion faqaccor" id="accordionExample">
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapseOne">
                          1. Why should I register with TradersFind.com?
                  </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    <ul style="list-style-type: disc;">
                    <li><strong>TradersFind.com</strong> is UAE's largest B2B marketplace </li>
                    <li>We offer comprehensive business platform to the Domestic and Global Business Community through online services </li>
                    <li>Highly popular among SMEs </li>
                    <li>TradersFind.com offers a facility to find & contact potential buyers & sellers </li> </ul>
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapseTwo">
                    2. What details are required for registration on TradersFind.Com?
                  </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                  <div class="accordion-body ">
                    <ul style="list-style-type: disc;">
                      <li>Email Address</li>
                      <li>Phone number</li>
                      <li>Company Name</li>
                      <li>Company Address</li>
                      <li>At least one Product or Service</li>
                      <li>Name of the Country</li>
                    </ul> 
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapseThree" aria-controls="collapseThree">
                        3. How to register? 
                  </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    <ul style="list-style-type: disc;">
                    <li>Click on 'Join Now' on the top right corner of tradeindia.com page.</li> 
                    <li>Fill up details as required on the registration form and submit.</li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapsefour" aria-controls="collapsefour">
                          4. What are the benefits of registering on TradersFind.Com?
                  </button>
                </h2>
                <div id="collapsefour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    <ul style="list-style-type: disc;">
                  <li> Increased Visibility</li>
<li>Increased Business Inquiries</li>
<li>Industry-Specific Targeting</li>
<li>Cost-Effective Marketing</li>
<li>Business Promotion</li>
<li>Networking Opportunities</li>
<li>Security and Protection</li>
</ul>
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapsefive" aria-controls="collapsefive">
                          5. Facing problems while registering?
                  </button>
                </h2>
                <div id="collapsefive" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    <ul style="list-style-type: disc;">
                    <li> Contact customer support team on support&#64;tradersfind.com </li>
                    <li>You can 'Live Chat' with our executive on our Whatsapp number : +971 569773623</li>
                  </ul>
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapsesix" aria-controls="collapsesix">
                          6. How much time does it take for my company to get listed on TradersFind.Com?
                  </button>
                </h2>
                <div id="collapsesix" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                   After you have completed the registration process on TradersFind, your company/business would get listed within 24-48 hours after verification.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapseseven" aria-controls="collapseseven">
                          7. Can I register more than once using the same email id?
                  </button>
                </h2>
                <div id="collapseseven" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    No, you can only use one email address for each individual registration.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapseeight" aria-controls="collapseeight">
                         8. Can I set up an account without a phone number?
                  </button>
                </h2>
                <div id="collapseeight" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                  <div class="accordion-body"> 
                    No. Either Phone or Mobile number is mandatory for registration
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapsenine" aria-controls="collapsenine">
                          9. Can I set up an account without an email address?
                  </button>
                </h2>
                <div id="collapsenine" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    No. Email id is mandatory for registration.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapseten" aria-controls="collapseten">
                         10. Why should I become a Paid Member on TradersFind.Com?
                  </button>
                </h2>
                <div id="collapseten" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                  <div class="accordion-body"> 
                    <ul style="list-style-type: disc;">
                    <li>More visibility – higher listing on Indiamart</li>
                    <li>Due to more visibility, you will get more buyer enquiries</li>
                    <li>You will receive more buyer requirements through TradersFind</li>
                    <li>Improve the chances of people seeing your products on TradersFind. </li>
<li>See messages from potential customers and quickly provide price quotes.</li>
<li>Reach a large group of potential clients.</li>
                  </ul>
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapseeleven" aria-controls="collapseeleven">
                         11. How do I register for paid services on TradersFind?
                  </button>
                </h2>
                <div id="collapseeleven" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                  <div class="accordion-body"> 
                   Simply click on the ‘Whatsapp‘ button above to register for our paid services. Our executives will reach out to you and explain our services in detail.
                  </div>
                </div>
              </div>
<!--    end here item-->
              </div>
          </div>

          <div class="tab-pane fade" id="v-my-account-dashboard">
            <div class="fs-3 text-dark  fwbold fw-bold px-md-3">My Account Dashboard</div>
            <div class="accordion faqaccor" id="accordionExample1">
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapse21">
                          1. What does my Dashboard show?
                  </button>
                </h2>
                <div id="collapse21" class="accordion-collapse collapse show" data-bs-parent="#accordionExample1">
                  <div class="accordion-body"> Your dashboard is the page you land on as soon as you log in to your profile on ‘TradersFind’. It shows:
                    <ul style="list-style-type: disc;">
                    <li>Membership details</li>
                    <li>Verification status</li>
                    <li>Quick links</li>
                    <li>Products</li> 
                    <li>Inquiries</li>
                    <li>Contact Details</li>
                    <li>Business Profile</li>
                  </ul>
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapse22">
                    2. Can I add new products through my dashboard?
                  </button>
                </h2>
                <div id="collapse22" class="accordion-collapse collapse" data-bs-parent="#accordionExample1">
                  <div class="accordion-body fs-18">
                   Certainly! Your dashboard provides you with the option to add new products. Simply navigate to the 'Manage Products' section and click on the '+Add New Product' button. Alternatively, you can also find the '+Add New Product' option at the top of your dashboard.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapse23">
                    3. Are the latest inquiries also visible on my dashboard?
                  </button>
                </h2>
                <div id="collapse23" class="accordion-collapse collapse" data-bs-parent="#accordionExample1">
                  <div class="accordion-body fs-18">
                   Yes, the TradersFind dashboard displays the most recent inquiries directly in the 'My Inquiries' section of your own dashboard. You can also click on ‘View All’ to view all inquiries or on ‘Reply’ to reply to that particular inquiry.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapse24">
                    4. What does the ‘Manage Products/ Services’ section mean?
                  </button>
                </h2>
                <div id="collapse24" class="accordion-collapse collapse" data-bs-parent="#accordionExample1">
                  <div class="accordion-body fs-18">
                   The 'Manage Products' section on your dashboard displays the products you have added for your company. It allows you to see the product name, status, whether there is an image available, the description, price, and specification. If you want to make any changes or updates to a product, simply click on 'Edit' next to the product.
                  </div>
                </div>
              </div>
              </div>
</div>
<!--   end -->
          <div class="tab-pane fade" id="v-add-business-profile">
            <div class="fs-3 text-dark  fwbold fw-bold px-md-3">Add / Edit Business Profile</div>
            <div class="accordion faqaccor" id="accordionExample2">
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapse31">
                          1. How can I add or edit my contact details on ‘TradersFind’?
                  </button>
                </h2>
                <div id="collapse31" class="accordion-collapse collapse show" data-bs-parent="#accordionExample2">
                  <div class="accordion-body"> 
                    You can update your contact information in your profile. If you need immediate assistance, you can reach us quickly via WhatsApp.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapse32">
                    2. Can I change my registered email address? How?
                  </button>
                </h2>
                <div id="collapse32" class="accordion-collapse collapse" data-bs-parent="#accordionExample2">
                  <div class="accordion-body fs-18">Yes, you can change your registered email id by following the steps below:
                   <ul style="list-style-type: disc;">
                  <li>Go to the 'My Profile' section.</li>
<li>Choose the option 'Change Email Id' from the drop-down menu.</li>
<li>Enter the new email address that you wish to register.</li>
<li>A verification email will be sent to the new email address.</li>
<li>Following these steps your email will be changed.</li>
                  </ul>
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapse33">
                    3. How do I change the login password on TradersFind? 
                  </button>
                </h2>
                <div id="collapse33" class="accordion-collapse collapse" data-bs-parent="#accordionExample2">
                  <div class="accordion-body fs-18">
                   <ul style="list-style-type: disc;">
                    <li>Please click on the 'My Profile' option. </li>
                    <li>Choose 'Change Password' from the menu that appears.</li>
                    <li>To modify your login password, provide your existing password, new password, and confirm the new password.</li> 
                   </ul>
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapse34">
                    4. Should I change my password regularly?
                  </button>
                </h2>
                <div id="collapse34" class="accordion-collapse collapse" data-bs-parent="#accordionExample2">
                  <div class="accordion-body fs-18">
                   Certainly, it is advised for all TradersFind members to frequently update their login password in order to maintain the security and confidentiality of their accounts.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapse35">
                    5. How do I edit or update my Company Profile?
                  </button>
                </h2>
                <div id="collapse35" class="accordion-collapse collapse" data-bs-parent="#accordionExample2">
                  <div class="accordion-body fs-18">
                   <ul style="list-style-type: disc;">
                  <li>Go to the 'My Profile' option.</li>
                  <li>Choose 'Company Profile' from the menu that appears.</li>
                  <li>You will be taken to the 'Edit Company Information' page.</li>
                  <li>On this page, you can make changes to your company's details, such as its logo, information, business type, year of establishment, ownership type, and more.</li>
                  </ul>
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapse36">
                    6. How do I update my mobile number for receiving SMS?
                  </button>
                </h2>
                <div id="collapse36" class="accordion-collapse collapse" data-bs-parent="#accordionExample2">
                  <div class="accordion-body fs-18">
                   Simply click on the ‘Whatsapp‘ button above to update your mobile number. We will process your request and provide an update within 24 hours.
                  </div>
                </div>
              </div>

              </div>        
</div>
<div class="tab-pane fade" id="v-enquiry-management">
            <div class="fs-3 text-dark  fwbold fw-bold px-md-3">Inquiry Management</div>
            <div class="accordion faqaccor" id="accordionExample3">
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapse41">
                          1. What is an inquiry?
                  </button>
                </h2>
                <div id="collapse41" class="accordion-collapse collapse show" data-bs-parent="#accordionExample3">
                  <div class="accordion-body"> 
                    An inquiry is a request for information, clarification, or action made by an individual or organization to another individual or organization. In business or commerce, inquiries often refer to requests for product or service information, pricing, availability, or other related details. Inquiries can be made through various communication channels such as email, phone, or in-person.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapse42">
                    2. Why am I getting so few inquiries?
                  </button>
                </h2>
                <div id="collapse42" class="accordion-collapse collapse" data-bs-parent="#accordionExample3">
                  <div class="accordion-body fs-18">
                    There could be several reasons why you are getting fewer or no inquiries. This might be due to insufficient information about your product, the quality of your listing, the pricing, buyer preferences, keywords, and so on. Another possible reason for not receiving inquiries could be that your email address or mobile number is incorrect.In order to generate more inquiries, it is important to purchase our premium packages.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapse43">
                    3. What should I do to get more relevant inquiries?
                  </button>
                </h2>
                <div id="collapse43" class="accordion-collapse collapse" data-bs-parent="#accordionExample3">
                  <div class="accordion-body fs-18">
                   <ul style="list-style-type: disc;">
                    <li> Ensuring all product details are fully completed.</li>
<li>Adding engaging text descriptions, tables, images, and other elements to attract potential buyers.</li>
<li>Maintaining a competitive pricing strategy.</li>
<li>Selecting a relevant product name that includes keywords with high search volume.</li>
<li>Upgrading your membership to enhance your product visibility on various search pages.</li>
                   </ul>
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapse44">
                    4. How many inquiries can I view as a free member?
                  </button>
                </h2>
                <div id="collapse44" class="accordion-collapse collapse" data-bs-parent="#accordionExample3">
                  <div class="accordion-body fs-18">
                  As a free member, you do not have access to view any inquiries. To unlock the ability to view inquiries, you can consider upgrading to one of our paid packages.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapse45">
                    5. How do Business Inquiry, Buy Lead Inquiry, Product Inquiry, and Website Inquiry differ from each other?
                  </button>
                </h2>
                <div id="collapse45" class="accordion-collapse collapse" data-bs-parent="#accordionExample3">
                  <div class="accordion-body fs-18">
                   <ul style="list-style-type: disc;">
                  <li><b>Business Inquiry:</b> The inquiry sent by a buyer on your mini catalog or on your company page.</li>
<li><b>Buy Lead Inquiry:</b> The buy leads that you have purchased and want to send any message to.</li>
<li><b>Product Inquiry:</b> The inquiry sent by a buyer on the product that you have posted online.</li>
<li><b>Website Inquiry:</b> The inquiry received by buyers through your company website.</li>
                  </ul>
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapse46">
                    6. Where do I view inquiries received for my product/service on TradersFind.Com?
                  </button>
                </h2>
                <div id="collapse46" class="accordion-collapse collapse" data-bs-parent="#accordionExample3">
                  <div class="accordion-body fs-18">
                   <ul style="list-style-type: disc;">
                  <li>Click on the 'My Inquiries' option located on the top navigation bar.</li>
<li>Select 'Inbox' from the drop-down menu.</li>
<li>All inquiries that you have received for your product or service through buyers on ExportersIndia.Com can be viewed in the Inbox.</li>
                  </ul>
                  </div>
                </div>
              </div>

               <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapse47">
                    7. How can I generate more relevant inquiries?
                  </button>
                </h2>
                <div id="collapse47" class="accordion-collapse collapse" data-bs-parent="#accordionExample3">
                  <div class="accordion-body fs-18">
                   <ul style="list-style-type: disc;">
                  <li> Improve the quality of your product listing.</li>
<li>Ensure that all product details are complete and accurate, with a completeness score of 100%.</li>
<li>Use text descriptions, tables, images, and other features to make your listing more attractive to potential buyers.</li>
<li>Price your products competitively.</li>
<li>Choose a product name that includes relevant keywords and is likely to receive more searches.</li>
<li>Consider upgrading your membership to increase the visibility of your products on various search pages.</li>
                  </ul>
                  </div>
                </div>
              </div>

              </div>
              </div>

        <div class="tab-pane fade" id="v-enquiry-management">
            <div class="fs-3 text-dark  fwbold fw-bold px-md-3">Add / Update Product</div>
            <div class="accordion faqaccor" id="accordionExample4">
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapse51">
                          1. What Is A Product?
                  </button>
                </h2>
                <div id="collapse51" class="accordion-collapse collapse show" data-bs-parent="#accordionExample4">
                  <div class="accordion-body"> 
                    Products are referred to as the goods presented by the maker, vendors, and providers in our interactive online showroom. The items available on our internet shops are shown along with their images, characteristics, cost, and additional specific details in order to provide prospective buyers with more comprehensive information about the product prior to making a purchase.
                  </div>
                </div>
              </div>
              
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapse52">
                          2. Where Can I Add A New Product?
                  </button>
                </h2>
                <div id="collapse52" class="accordion-collapse collapse show" data-bs-parent="#accordionExample4">
                  <div class="accordion-body"> 
                    In your folder, you have to select the option 'Add New Product' , which is located within the 'Products & Services' tab. By clicking on it, you will be able to include_once a new product.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapse53">
                          3. Is there any other way to add new products?
                  </button>
                </h2>
                <div id="collapse53" class="accordion-collapse collapse show" data-bs-parent="#accordionExample4">
                  <div class="accordion-body"> 
                    To add new products, go to the 'Manage Products/Services' section on your dashboard, and click on the '+Add New Products' button.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapse54">
                          4. What Is The Importance Of Product Name?
                  </button>
                </h2>
                <div id="collapse54" class="accordion-collapse collapse show" data-bs-parent="#accordionExample4">
                  <div class="accordion-body"> 
                    The product name plays an important role in generating valuable business leads because it is displayed to buyers in search results on TradersFind. When the product name is accurate and includes relevant keywords, it grabs the attention of potential buyers and significantly boosts the chances of attracting maximum clicks.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapse55">
                          5. Why Is It Important To Add Product Description?
                  </button>
                </h2>
                <div id="collapse55" class="accordion-collapse collapse show" data-bs-parent="#accordionExample4">
                  <div class="accordion-body"> 
                    By including a product description, you not only provide potential buyers with more details about your product, but you also enhance its visibility in search results. When you provide a detailed  description of your product highlighting its significance to buyers, the likelihood of receiving inquiries about your product increases.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapse56">
                          6. Is It Compulsory To Add Product Images?
                  </button>
                </h2>
                <div id="collapse56" class="accordion-collapse collapse show" data-bs-parent="#accordionExample4">
                  <div class="accordion-body"> 
                    Adding product images is highly recommended, as it enhances the visual appeal and provides valuable information to customers. They help users understand the product's appearance, features, and quality, increasing the likelihood of making a purchase. Images also build trust and credibility, making them an essential component of an effective product listing or marketing strategy.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapse57">
                          7. How Many Images Can I Add?
                  </button>
                </h2>
                <div id="collapse57" class="accordion-collapse collapse show" data-bs-parent="#accordionExample4">
                  <div class="accordion-body"> 
                    Free members have the ability to add up to two images, whereas paid members enjoy the benefit of adding up to five images.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapse58">
                          8. How Do I Add More Images?
                  </button>
                </h2>
                <div id="collapse58" class="accordion-collapse collapse show" data-bs-parent="#accordionExample4">
                  <div class="accordion-body"> 
                    Adding more pictures is easy. After you have uploaded the primary image, you can click on the plus symbol (+) next to it to include_once extra pictures.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapse59">
                          9. What Is Product Category & Why Is It Important?
                  </button>
                </h2>
                <div id="collapse59" class="accordion-collapse collapse show" data-bs-parent="#accordionExample4">
                  <div class="accordion-body"> 
                    The product category refers to the specific group that your product falls into. When buyers search for products, they typically search by category, which simplifies their search process. . Therefore, if your product belongs to the appropriate category, it enhances the likelihood of it being noticed by the intended buyers during their search.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapse591">
                          10. Why Is It Important To Add Specifications Of My Product?
                  </button>
                </h2>
                <div id="collapse591" class="accordion-collapse collapse show" data-bs-parent="#accordionExample4">
                  <div class="accordion-body"> 
                    Adding specifications to your product is important because it provides detailed information about its features, functionality, and technical aspects. Specifications help potential customers understand what your product offers, allowing them to make informed purchasing decisions. Clear and comprehensive specifications can also enhance trust and credibility, differentiate your product from competitors, and reduce the likelihood of misunderstandings or returns.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapse592">
                          11. Can I Edit The Details Added For My Product?
                  </button>
                </h2>
                <div id="collapse592" class="accordion-collapse collapse show" data-bs-parent="#accordionExample4">
                  <div class="accordion-body"> 
                    Yes, you can easily modify, alter, or revise any information of the products you have added, at any  time.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapse593">
                          12. Where can I view all the products that I’ve added on TradersFind?
                  </button>
                </h2>
                <div id="collapse593" class="accordion-collapse collapse show" data-bs-parent="#accordionExample4">
                  <div class="accordion-body"> 
                    To see all the products you have added, you need to go to the seller dashboard. There, you will find the option called "Manage Products/Services." By selecting this option, you will be able to view all the products you have added.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapse594">
                          13. How long does it take for a product to get approved?
                  </button>
                </h2>
                <div id="collapse594" class="accordion-collapse collapse show" data-bs-parent="#accordionExample4">
                  <div class="accordion-body"> 
                    Once the product is added it takes around 24 to 48 hours for it to be approved.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapse594">
                          13. How long does it take for a product to get approved?
                  </button>
                </h2>
                <div id="collapse594" class="accordion-collapse collapse show" data-bs-parent="#accordionExample4">
                  <div class="accordion-body"> 
                    Once the product is added it takes around 24 to 48 hours for it to be approved.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapse595">
                          14. Can I add products as a FREE member?
                  </button>
                </h2>
                <div id="collapse595" class="accordion-collapse collapse show" data-bs-parent="#accordionExample4">
                  <div class="accordion-body"> 
                    Yes,  FREE members have the option to include_once their products on TradersFind
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapse596">
                          15. How many products can I post on TradersFind?
                  </button>
                </h2>
                <div id="collapse596" class="accordion-collapse collapse show" data-bs-parent="#accordionExample4">
                  <div class="accordion-body"> 
                    As a free member, you have the option to post a single product. However, if you wish to post multiple products, you can upgrade to our paid package. Once you've posted a product, it will take approximately 24 hours for it to be featured.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapse597">
                          16. How To Add A New Product?
                  </button>
                </h2>
                <div id="collapse597" class="accordion-collapse collapse show" data-bs-parent="#accordionExample4">
                  <div class="accordion-body"> 
                    To add a new product, you have two options. Firstly, within your folder, navigate to the 'Products/Services' section and click on 'Add New Product'. Alternatively, on the left side, you can click on 'Add New Products' in the 'Quick Links' section. Both options will take you to the 'Add New Products' page.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapse598">
                          17. Is it possible for me to include_once products as a free member?
                  </button>
                </h2>
                <div id="collapse598" class="accordion-collapse collapse show" data-bs-parent="#accordionExample4">
                  <div class="accordion-body"> 
                    Certainly, even as a member without any charges, you have the ability to add your products to TradersFind.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapse599">
                          18. How can I enhance my visibility on TradersFind beyond product listings?
                  </button>
                </h2>
                <div id="collapse599" class="accordion-collapse collapse show" data-bs-parent="#accordionExample4">
                  <div class="accordion-body"> 
                    In addition to product listings, TradersFind offers various promotional opportunities to enhance your visibility on the platform. These may include_once featured product placements, sponsored listings, or banner advertisements. Contact TradersFind's customer support or explore their advertising options for more details.
                  </div>
                </div>
              </div>

          </div>
      </div>

        <div class="tab-pane fade" id="v-manage-business-service">
            <div class="fs-3 text-dark  fwbold fw-bold px-md-3">Manage Business Service</div>
            <div class="accordion faqaccor" id="accordionExample5">
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapse61">
                          1. Can I also post my services on TradersFind?
                  </button>
                </h2>
                <div id="collapse61" class="accordion-collapse collapse show" data-bs-parent="#accordionExample5">
                  <div class="accordion-body"> 
                    Yes, TradersFind is a B2B platform where you can  post your services and connect with people who are looking for those services.
                  </div>
                </div>
              </div>
              
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapse62">
                          2. Things to keep in mind while adding a new service:
                  </button>
                </h2>
                <div id="collapse62" class="accordion-collapse collapse" data-bs-parent="#accordionExample5">
                  <div class="accordion-body"> 
                    <ul style="list-style-type: disc;">
                    <li>Provide a suitable product name</li>
<li>Create a detailed description in the listing to catch the attention of potential buyers.</li>
<li>Attach an image of the product in either .jpg format.</li>
<li>The image should have dimensions of 300x300 pixels to ensure it is clear and easy to see.</li>
                    </ul>
                  </div>
                </div>
              </div>
              
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapse63">
                          3. How do I add my services?
                  </button>
                </h2>
                <div id="collapse63" class="accordion-collapse collapse" data-bs-parent="#accordionExample5">
                  <div class="accordion-body"> 
                    <ul style="list-style-type: disc;">
                    <li>Click on the 'Product/Services' option in the top menu.</li>
<li>Choose 'Add New Service' from the drop-down menu. This action will take you to the 'Add Service' page.</li>
<li>On this page, provide the necessary information for your service, such as the 'Service Name' and 'Service Details'.</li>
<li>Use the 'Browse' button to upload images of the service.</li>
<li>Finally, click on 'Save Detail' to store the service details.</li>
<li>Your service will be successfully added.</li>
                    </ul>
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapse64">
                          4. How long does it take for my services to get approved?
                  </button>
                </h2>
                <div id="collapse64" class="accordion-collapse collapse" data-bs-parent="#accordionExample5">
                  <div class="accordion-body"> 
                    After you submit your services, they undergo a verification process to ensure their suitability before being made available on the website. This verification procedure typically lasts between 24 to 48 hours.
                  </div>
                </div>
              </div>

</div>
</div>

<div class="tab-pane fade" id="v-buy-requirements">
            <div class="fs-3 text-dark  fwbold fw-bold px-md-3">Buy Requirement</div>
            <div class="accordion faqaccor" id="accordionExample6">
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapse71">
                          1. Can I also search for products on TradersFind?
                  </button>
                </h2>
                <div id="collapse71" class="accordion-collapse collapse show" data-bs-parent="#accordionExample6">
                  <div class="accordion-body"> 
                    Yes, in case  you are looking for a particular product, TradersFind is the ideal platform to search for it. It's the best place to find any product you're looking for.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapse72">
                          2. How do I post a ‘Buy Requirement’?
                  </button>
                </h2>
                <div id="collapse72" class="accordion-collapse collapse" data-bs-parent="#accordionExample6">
                  <div class="accordion-body"> 
                    <ul style="list-style-type: disc;">
                    <li>On the homepage of ‘TradersFind’, go to the ‘Post Your Requirement’ section. Here, add the product name, estimated quantity, unit, and description to post your buy requirement.</li>
                      <li>On any product category page or product search page, you can find the ‘Post Your Buy Requirement’ form where you can add the product name, estimated quantity, unit, and description to the post buy requirement.</li>
                    </ul>
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapse73">
                          3. Is there any quick way to add a ‘Buy Requirement’?
                  </button>
                </h2>
                <div id="collapse73" class="accordion-collapse collapse" data-bs-parent="#accordionExample6">
                  <div class="accordion-body"> 
                    <ul style="list-style-type: disc;">
                    <li>You will find the option "Post Your Requirement" on the TradersFind homepage. By clicking on this option, you will be directed to the page where you can post your buy requirement. </li>
                    <li>Additionally, you can also find the "Post Buy Requirement" link at the bottom of the TradersFind homepage.</li>
                    </ul>
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapse74">
                          4. How can I see all the 'Buy Requirements' I've posted?
                  </button>
                </h2>
                <div id="collapse74" class="accordion-collapse collapse" data-bs-parent="#accordionExample6">
                  <div class="accordion-body"> 
                    Navigate to the top navigation bar and hover your cursor over 'My Requirement.' From the menu that appears, choose 'Manage Buy Requirements.' This action will take you to the 'Manage Buy Requirements' page where you can access and view all the buy requirements you have posted until now.
                  </div>
                </div>
              </div>              

            </div>
           </div>

      <div class="tab-pane fade" id="v-verified-buy-leads">
            <div class="fs-3 text-dark  fwbold fw-bold px-md-3">Verified Buy Leads</div>
            <div class="accordion faqaccor" id="accordionExample7">
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapse81">
                          1. What are Buy Leads?
                  </button>
                </h2>
                <div id="collapse81" class="accordion-collapse collapse show" data-bs-parent="#accordionExample7">
                  <div class="accordion-body"> 
                    Buy leads refer to potential customers who have expressed an interest in purchasing a product or service. 
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapse82">
                          2. What do you mean by a ‘Verified Buy lead’?
                  </button>
                </h2>
                <div id="collapse82" class="accordion-collapse collapse" data-bs-parent="#accordionExample7">
                  <div class="accordion-body"> 
                    ‘Verified Buy Lead' refers to a lead where the contact information, such as the Email ID or Phone number, has been verified by our team. 
                  </div>
                </div>
              </div>
             </div>
           </div>

            <div class="tab-pane fade" id="v-premium-memberships">
            <div class="fs-3 text-dark  fwbold fw-bold px-md-3">Premium Membership</div>
            <div class="accordion faqaccor" id="accordionExample8">
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapse81">
                          1. What is “Premium Seller"?
                  </button>
                </h2>
                <div id="collapse81" class="accordion-collapse collapse show" data-bs-parent="#accordionExample8">
                  <div class="accordion-body"> 
                    <ul style="list-style-type: disc;">
                    <li>Premium seller is a service by TradersFind, where paid members get the tag “Premium Seller”.</li>
                    <li>This tag  helps a seller in getting more visibility in listing and search results.</li>
                    </ul>
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapse82">
                          2. How can I get myself listed as a Premium Seller?
                  </button>
                </h2>
                <div id="collapse82" class="accordion-collapse collapse" data-bs-parent="#accordionExample7">
                  <div class="accordion-body"> 
                    In order to get yourself listed as the "Premium Seller"  you need to buy one of our paid packages. If you're interested in purchasing a package, you can contact us on our Whatsapp number: +971 569773623 or visit our website.
                  </div>
                </div>
              </div>
              
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapse83">
                          3. Where can I check my active subscriptions?
                  </button>
                </h2>
                <div id="collapse83" class="accordion-collapse collapse" data-bs-parent="#accordionExample7">
                  <div class="accordion-body"> 
                    Click on “My Membership” and you will get a list of services subscribed by you.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapse84">
                          4. What is Banner Advertisement?
                  </button>
                </h2>
                <div id="collapse84" class="accordion-collapse collapse" data-bs-parent="#accordionExample7">
                  <div class="accordion-body"> 
                    Banner advertisements are created to promote products, services, or events. They are a guaranteed way to gain more attention and engagement from buyers on the platform. These ads will direct buyers to your website, helping to increase the number of people visiting and exploring your site.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapse85">
                          5. What are the benefits of having banners on TradersFind.com?
                  </button>
                </h2>
                <div id="collapse85" class="accordion-collapse collapse" data-bs-parent="#accordionExample7">
                  <div class="accordion-body"> 
                    <ul style="list-style-type: disc;">
                    <li>The banners will help in increasing the numbers of inquiries and online visitors. The banners will be hyper linked to your website.</li>
                    <li>Whenever a user will click on your banner, he will get redirected to your company's website.</li>
                    </ul>
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapse86">
                          6. What are ‘Add-On Services’?
                  </button>
                </h2>
                <div id="collapse86" class="accordion-collapse collapse" data-bs-parent="#accordionExample7">
                  <div class="accordion-body"> 
                    Add-On Services are additional services or features that can be added to a basic product or package. They provide extra options or benefits to enhance the original offering. These services are optional and can be chosen based on personal preferences or specific needs.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapse87">
                          7. How do I avail any ‘Add-on Service’?
                  </button>
                </h2>
                <div id="collapse87" class="accordion-collapse collapse" data-bs-parent="#accordionExample7">
                  <div class="accordion-body"> 
                    Simply click on the ‘Whatsapp‘ button above to avail add on services, you can also email us. Our executives will reach out to you and explain our Add on services in detail.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapse88">
                          8. How can I upgrade to premium membership on ‘TradersFind’?
                  </button>
                </h2>
                <div id="collapse88" class="accordion-collapse collapse" data-bs-parent="#accordionExample7">
                  <div class="accordion-body"> 
                    Here are the steps to upgrade to premium membership on ‘Tradersfind’: 
                    <ul style="list-style-type: disc;">
                      <li>Visit the ‘TradersFind’ website.  </li>
                      <li>Click on the Whatsapp’ button on Header Section.</li>
                      <li>You will be redirected to the live whatsapp chat, where you can have a conversation with our executive.</li>
                    </ul>
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapse89">
                          9. How can I get a banner of my company on ‘TradersFind'?
                  </button>
                </h2>
                <div id="collapse89" class="accordion-collapse collapse" data-bs-parent="#accordionExample7">
                  <div class="accordion-body"> 
                    <ul style="list-style-type: disc;">
                    <li>To have your company's banner displayed on ‘TradersFind', reach out to the ‘TradersFind' team.</li>
                    <li>Click on the 'Whatsapp' button located at the top of the page. </li>
                    <li>Contacting the ‘TradersFind' team through this link will enable you to inquire about placing a banner for your company on TradersFind.</li>
                    </ul>
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapse891">
                          10. How does having banners on ‘TradersFind’ benefit the business?
                  </button>
                </h2>
                <div id="collapse891" class="accordion-collapse collapse" data-bs-parent="#accordionExample7">
                  <div class="accordion-body"> 
                    <ul style="list-style-type: disc;">
                    <li>Placing banners on ‘ TradersFind’ can increase the number of inquiries and online visitors to your business.</li>
                    <li>Your banner will be hyperlinked to your company's website, allowing users to access it with just one click.</li>
                    <li>Whenever a user clicks on your banner, they will be redirected directly to your website, providing a potential opportunity for increased traffic and potential sales.</li>
                    </ul>
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
                          </body></html>
<script src="<?php echo BASE_URL; ?>assets/vendors/bootstrap/bootstrap.bundle.min.js"></script>
<?php
include_once "footer.php";
?>