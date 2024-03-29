<?php include_once 'config.php'; 
$SeoParams = [
    'title' => 'Reach TradersFind - UAEs Largest Online B2B Portal',
    'metaTitle' => 'Reach TradersFind - UAEs Largest Online B2B Portal',
    'metaDescription' => 'Have queries or suggestions? Contact us at TradersFind, UAEs Largest Online B2B Portal. Your gateway to seamless business interactions and solutions',
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

<!--<app-home-search></app-home-search>-->

<section class="container__box mt35">
    <div class="container">
        <div class="text-center">
            <h1>Contact <span class="tt">Us </span></h1>
            <p align="justify">If you have any questions, feel free to get in touch with us. Our team of experts will review your business information and call you back to explain how TradersFind, presented by Interconnect Marketing Management L.L.C, can help you get quotes for your business.</p>
        </div>

        <div class="bg_box mt35">
            <strong class="text-center" style="color: #333;">Tradersfind.com</strong>
            <div class="row">
                <div class="col-sm-8">
                    <ul>
                        <li>
                            <img src="<?php echo BASE_URL; ?>assets/img/map1.png" width="40" height="40" alt="location" /> 
                            <div class="text_11" style="color: #333;">606 Binary Tower by Omniyat Business Bay, Dubai</div>
                            <div class="text_11">&nbsp;</div>
                        </li>
                        <li>
                            <img src="<?php echo BASE_URL; ?>assets/img/phone11.png" width="40" height="40" alt="phone" />
                            <div class="text_11" style="color: #333;">Sales : +971 502943313</div>
                            <div class="text_11" style="color: #333;">Support : +971 502943313</div>
                        </li>
                        <li>
                            <img src="<?php echo BASE_URL; ?>assets/img/email1.png" width="40" height="40" alt="post buy requirements" />
                            <a href="/post-buy-requirements" title="post-buy-requirements" style="color: #333;">Click here to share your queries.</a>
                        </li>
                    </ul>
                    <div class="pt1_20">
                        <p>For any assistance, call us at <span>:</span></p>
                        <p style="color: #333;">+971 502 943 313</p>
                        <p style="color: #666;">(9:30 AM to 6:00 PM (UTC), Mon to Sat)</p>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="right_box_img">
                        <img src="<?php echo BASE_URL; ?>assets/img/email2.webp" style="max-width: 100%; height: auto; display: block; margin: 0 auto;" alt="email" />
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</section>


<div class="container-fluid">
    <div class="row m-0">
        <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d8587.158095269046!2d55.260973706244265!3d25.187866169823273!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1s606%20Binary%20Tower%20by%20Omniyat%20Business%20Bay%2C%20Dubai!5e0!3m2!1sen!2sin!4v1700827868995!5m2!1sen!2sin" 
                width="600" 
                height="450" 
                style="border:0;" 
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade" 
                title="Google Map Location of Binary Tower by Omniyat Business Bay, Dubai">
        </iframe>
    </div>
    
</div>
        </body></html>
<?php 
include_once 'footer.php';
?>