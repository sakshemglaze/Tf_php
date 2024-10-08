<?php include_once 'config.php';
$SeoParams = [
  'title' => 'Buyer FAQs | Frequently Asked Questions | TradersFind',
  'metaTitle' => 'Buyer FAQs | Frequently Asked Questions | TradersFind',
  'metaDescription' => 'Buyer FAQs - Frequently Asked Questions by buyers related to buying queries. Below are the questions frequently asked by our buyers.',
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
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php 
        include_once 'services/seo.php';
        $seo = new seoService();
        $seo->setSeoTags($SeoParams); ?>

</head>
<body>
<?php
include_once 'header-sub.php';
?>

<section class="p-3">
  <nav style="--bs-breadcrumb-divider: '>'" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/">TradersFind</a></li>
      <li class="breadcrumb-item"><a href="/help">Help Centre</a></li>
      <li class="breadcrumb-item active" aria-current="page">
        Buyers Frequently Asked Question
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
          <div class="fwbold fw-bold fs-5 mt-4 mb-2">BUYER'S HELP CENTER</div>
          <div class="nav flex-column nav-pills fwbold fw-bold fs-5">
            <button class="nav-link1  active" data-bs-toggle="pill" data-bs-target="#v-pills-serch-product-companies" type="button" aria-selected="true">Serch Product & Companies</button>
            <button class="nav-link1" data-bs-toggle="pill" data-bs-target="#v-pills-discover-right-sellers" type="button" aria-selected="false">Discover Right Sellers</button>
            <button class="nav-link1" data-bs-toggle="pill" data-bs-target="#v-pills-buying-methods" type="button" aria-selected="false">Buying Methods</button>
            <button class="nav-link1" data-bs-toggle="pill" data-bs-target="#v-pills-requirement-steps" type="button" aria-selected="false">Post Requirement Steps</button>
           <!--<button class="nav-link1" data-bs-toggle="pill" data-bs-target="#v-pills-complaint" type="button" aria-selected="false">Complaint</button> -->
          </div>
        </div>

        <div class="tab-content col-lg-9 px-sm-3 mb-5">
          <div class="tab-pane fade show active" id="v-pills-serch-product-companies">
            <div class="fs-3 text-dark  fwbold fw-bold px-md-3">Search Product & Companies</div>
            <div class="accordion faqaccor" id="accordionExample">
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapseOne">
                    1. How do I search for products on TradersFind?
                  </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    <ul style="list-style-type: disc;">
                    <li>Go to TradersFind.com’s Homepage </li>
                    <li>In the search bar, write the name of the product you are looking for</li>
                    <li>Click on the search button </li>
Note: Add a relevant name to get a relevant product in the search result.
                    </ul>
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapseTwo">
                    2. How do I browse the products by their category?
                  </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                  <div class="accordion-body ">
                    <ul style="list-style-type: disc;">
                      <li>TradersFind homepage has different categories of products from various industries.</li>
                      <li>Click on "All Categories" to see a larger list and choose from there.</li>
                      <li>You can click on the industry to which the category belongs and select the category from that industry.</li>
                      <li>Use the search tab to look for products.</li>
                      <li>On the search result page, find related categories to narrow down your search.</li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapseThree" aria-controls="collapseThree">
                    3. What is ‘Buying Requirement'?
                  </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    A buying requirement is a request from a potential buyer looking to purchase a specific product or service. This request includes details such as product specifications, quantity, price range, and other relevant information. The buyer sends out a buying requirement to attract potential suppliers and manufacturers who can fulfill their requirements. 
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapsefour" aria-controls="collapsefour">
                    4. What are the perks of posting a ‘Buying Requirement?
                  </button>
                </h2>
                <div id="collapsefour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    Posting a "Buying Requirement" can have several benefits:
                    <ul style="list-style-type: disc;">
                    <li>Time and Effort Saving</li>
                    <li>Connect with Verified Sellers</li>
                    <li>Assured Product Quality</li>
                    <li>Competitive Pricing </li> </ul>
                  </div>
                </div>
              </div>
            </div>

          </div>
          <div class="tab-pane fade" id="v-pills-discover-right-sellers">
            <div class="fs-3 text-dark  fwbold fw-bold px-md-3">Discover Right & Verified Suppliers</div>
              <div class="accordion faqaccor" id="accordionExample1">
               <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapse21">
                    1. How to search for Sellers on TradersFind.Com?
                  </button>
                </h2>
                <div id="collapse21" class="accordion-collapse collapse show" data-bs-parent="#accordionExample1">
                  <div class="accordion-body">
                    TradersFind has a vast database of thousands of suppliers. To connect with a genuine supplier, You can check the verification status or Trust stamp of the supplier.
                  </div> 
                </div>
               </div> 
            
               <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapse22">
                    2. What do you mean by Trust Stamp?
                  </button>
                </h2>
                <div id="collapse22" class="accordion-collapse collapse" data-bs-parent="#accordionExample1">
                  <div class="accordion-body">
                    A trust stamp issued by TradersFind to its members whose business details and documents have been verified by our team. It is based upon the verified record of certified documents pertaining to the proof of existence, legal status, statutory approvals, affiliations and quality certifications. This stamp helps to find the right supplier or seller.
                  </div> 
                </div>
               </div> 
          
               <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapse23">
                    3. Why should I trust the sellers with Trust Stamp?
                  </button>
                </h2>
                <div id="collapse23" class="accordion-collapse collapse" data-bs-parent="#accordionExample1">
                  <div class="accordion-body">
                    Those sellers who have taken the paid membership package get the Trust Stamp. Moreover, all the details of the sellers with the Trust stamp have been verified by the team of TradersFind.
                  </div> 
                </div>
               </div> 
        
               <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapse24">
                    4. How to search suppliers by location?
                  </button>
                </h2>
                <div id="collapse24" class="accordion-collapse collapse" data-bs-parent="#accordionExample1">
                  <div class="accordion-body">
                    <ul style="list-style-type: disc;">
                      <li>To search for a supplier based on location, you need to use the search bar and enter the product/services name you are looking for. </li>
                      <li>Then, you will be redirected to the sub category page, Where you will find a location filter on top of the results. </li>
                      <li>From there, you can simply choose the location you want to search for suppliers in.</li>
                    </ul>
                  </div> 
                </div>
               </div> 
          
               <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapse25">
                    5. How to search by company name?
                  </button>
                </h2>
                <div id="collapse25" class="accordion-collapse collapse" data-bs-parent="#accordionExample1">
                  <div class="accordion-body">
                    <ul style="list-style-type: disc;">
                    <li>Enter the name of the company in the search box and click 'Search'. </li>
                    <li>You will get the company you were looking for.</li>
                    </ul>
                  </div> 
                </div>
               </div> 
              </div>
          </div>
          <div class="tab-pane fade" id="v-pills-buying-methods">
            <div class="fs-3 text-dark  fwbold fw-bold px-md-3">Buying Method</div>
              <div class="accordion faqaccor" id="accordionExample2">
               <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse31">
                    1. How do I find sellers for my buying requirement? 
                  </button>
                </h2>
                <div id="collapse31" class="accordion-collapse collapse show" data-bs-parent="#accordionExample2">
                  <div class="accordion-body">
                    TradersFind.Com makes things easy for all the buyers to find the right sellers for their buying requirements. All you need to do is post your buying requirement and you will be contacted by the top sellers of those products.
                  </div> 
                </div>
               </div> 
           

               <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapse32">
                    2. What is a Buying Lead?
                  </button>
                </h2>
                <div id="collapse32" class="accordion-collapse collapse" data-bs-parent="#accordionExample2">
                  <div class="accordion-body">
                  The buying requirement that you post on TradersFind.Com is called your buying lead.
                  </div> 
                </div>
               </div> 
        
               <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapse33">
                    3. How do I post a Buying Lead?
                  </button>
                </h2>
                <div id="collapse33" class="accordion-collapse collapse" data-bs-parent="#accordionExample2">
                  <div class="accordion-body">
                    <ul style="list-style-type:square">
                      <li>On the homepage of ‘TradersFind’, go to the ‘Post Your Requirement’ section. Here, add the product name, estimated quantity, unit, and description to post your buy requirement.</li>
                      <li>On any product category page or product search page, you can find the ‘Post Your Buy Requirement’ form where you can add the product name, estimated quantity, unit, and description to the post buy requirement.</li>
                    </ul>
                  </div> 
                </div>
               </div> 
           
               <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapse34">
                    4. Do I need to register on TradersFind.com to post my requirement?
                  </button>
                </h2>
                <div id="collapse34" class="accordion-collapse collapse" data-bs-parent="#accordionExample2">
                  <div class="accordion-body">
                    No, registration is not mandatory for buyers to post their buying requirement on TradersFind.com.
                  </div> 
                </div>
               </div> 
          
               <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapse35">
                    5. Is it compulsory to register on TradersFind.Com to contact sellers?
                  </button>
                </h2>
                <div id="collapse35" class="accordion-collapse collapse" data-bs-parent="#accordionExample2">
                  <div class="accordion-body">
                    No, Registration is not mandatory to contact any seller. You just have to enter your contact information each time you send an enquiry to a seller. 
                    However, registering on the website can expedite the entire process. Once you have   completed registration, you can view contact information and send enquiries without  having to enter your contact information each time you try to view contact or send enquiry.
                  </div> 
                </div>
               </div> 
           
               <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapse36">
                    6. Benefits of posting a Buying Lead.
                  </button>
                </h2>
                <div id="collapse36" class="accordion-collapse collapse" data-bs-parent="#accordionExample2">
                  <div class="accordion-body"> <ul style="list-style-type: disc;">
                    <li>Time and Effort Saving</li>
                    <li>Connect with Verified Sellers</li>
                    <li>Assured Product Quality</li>
                    <li>Competitive Pricing</li>
                  </ul>
                  </div> 
                </div>
               </div> 
            
               <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapse75">
                    7. What are the benefits of registering as a buyer on ‘TradersFind’?
                  </button>
                </h2>
                <div id="collapse75" class="accordion-collapse collapse" data-bs-parent="#accordionExample2">
                  <div class="accordion-body">
                    TradersFind is a platform that connects buyers and sellers. By registering as a buyer on TradersFind, you can enjoy various benefits, including:
                    <ul><li>
                      You can send inquiries easily without having to type in your contact information every time you want to send a message. </li>
                      <li>You can also post your buying requirements quickly.</li> </ul>
                  </div> 
                </div>
               </div> 
            
               <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapse85">
                    8. How many Buying Leads can I post?
                  </button>
                </h2>
                <div id="collapse85" class="accordion-collapse" data-bs-parent="#accordionExample2">
                  <div class="accordion-body">
                    There is no limit to the number of buying leads you can post. Feel free to post as many buying leads as you need to fulfill your requirements.
                  </div> 
                </div>
               </div> 
              </div>

          </div>

          <div class="tab-pane fade" id="v-pills-requirement-steps">
             <div class="fs-3 text-dark  fwbold fw-bold px-md-3">Post Requirement Steps</div>
              <div class="accordion faqaccor" id="accordionExample3">
               <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapseOne">
                    1. What are the steps of posting a Requirement?
                  </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample3">
                  <div class="accordion-body">
                    <ul  style="list-style-type:square">
                     <li>On the homepage of ‘TradersFind’, go to the ‘Post Your Requirement’ section. Here, add the product name, estimated quantity, unit, and description to post your buy requirement. </li>
                      <li>On any product category page or product search page, you can find the ‘Post Your Buy Requirement’ form where you can add the product name, estimated quantity, unit, and description to the post buy requirement. </li>
                    </ul>
                  </div> 
                </div>
               </div> 
              
               <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapse2">
                    2. What is the use of adding a product description?
                  </button>
                </h2>
                <div id="collapse2" class="accordion-collapse collapse" data-bs-parent="#accordionExample3">
                  <div class="accordion-body">
                    The product name plays an important role in generating valuable business leads because it 
                    is displayed to buyers in search results on TradersFind. When the product name is accurate 
                    and includes relevant keywords, it grabs the attention of potential buyers and significantly 
                    boosts the chances of attracting maximum clicks.
                  </div> 
                </div>
               </div> 
            
               <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapse3">
                    3. What are product attributes? When can I add them?
                  </button>
                </h2>
                <div id="collapse3" class="accordion-collapse collapse" data-bs-parent="#accordionExample3">
                  <div class="accordion-body">
                    Product attributes are the details or specifications that you can include_once in your product to make it more descriptive and attract sellers who are interested in it.
                  </div> 
                </div>
               </div> 
          
               <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapse4">
                    4. How can I receive responses or proposals from suppliers?
                  </button>
                </h2>
                <div id="collapse4" class="accordion-collapse collapse" data-bs-parent="#accordionExample3">
                  <div class="accordion-body">
                    Once you post a requirement on TradersFind, suppliers who match your criteria will be notified. They can then submit their proposals or quotes directly through the portal. You will receive these responses via email, depending on your notification settings.
                  </div> 
                </div>
               </div> 
            
               <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapse5">
                    5. How long does it take to receive responses from suppliers after posting a requirement?
                  </button>
                </h2>
                <div id="collapse5" class="accordion-collapse collapse" data-bs-parent="#accordionExample3">
                  <div class="accordion-body">
                    The time it takes to receive responses from suppliers may vary depending on various factors, including the nature of your requirement, the industry, and the urgency of your request. Typically, you can expect to receive responses within a few hours.
                  </div> 
                </div>
               </div> 
              </div>

            </div>
          <div class="tab-pane fade" id="v-pills-complaint">5</div>
        </div>
      </div>


    </div>
  </div>
</section>
                    </body></html>
<script src="<?php echo BASE_URL; ?>assets/vendors/bootstrap/bootstrap.bundle.min.js"></script>
<?php
include_once 'footer.php';
?>