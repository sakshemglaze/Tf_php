<?php include_once 'config.php'; ?>

<link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/vendors/bootstrap/bootstrap.min.css">
<link rel='stylesheet' href='<?php echo BASE_URL; ?>assets/css/owl.carousel.css'>
<link rel='stylesheet' href='<?php echo BASE_URL; ?>assets/css/mystyle.css'>

<nav class="navbar sticky-top navbar-expand-lg bg-white">
    <div class="container-fluid">
      <a class="navbar-brand" href="<?php echo BASE_URL; ?>"><img src="<?php echo BASE_URL; ?>assets/images/TradersFind.webp" alt="TradersFind" width="110" height="70" />
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
			<div class="sidemenu ms-auto align-items-center ">
  
				<a class="btn-primary-gradiant" href="<?php echo  BASE_URL ?>post-buy-requirements">Post Buy Requirements</a>
				<ul class="navigation">
				  <li class="has-sub-menu">
					For Buyer
					<ul>
					  <li><a href="<?php echo  BASE_URL ?>industry">Browse Sellers</a></li>
					  <li><a href="<?php echo  BASE_URL ?>buyer-faq">Buyer FAQ </a></li>
					</ul>
				  </li>
  
				  <li class="has-sub-menu">
					For Seller
					<ul>
					  <li><a href="<?php echo  BASE_URL ?>register-your-business">Sell Your Products</a></li>
					  <!--<li>Latest Buy Leads</li> -->
					  <li><a href="<?php echo  BASE_URL ?>seller-faq">Seller FAQ</a></li>
					</ul>
				  </li>
  
				  <li class="has-sub-menu">
					Need Help
					<ul>
					  <li><a href="<?php echo  BASE_URL ?>feedback">Send Feedback</a></li>
					  <li><a href="<?php echo  BASE_URL ?>complaint">Raise a Complaint</a></li>
					  <!--<li><a href="advertise-with-us">Advertise with Us</a></li>
					  <li><a routerLink="">Email Us</a></li>-->
					  <li><a href="<?php echo  BASE_URL ?>contact-us">Contact Us</a></li>
					  <!--  <li>Chat with Us</li> -->
					</ul>
				  </li>
				</ul>
				<a target="_blank" href="https://api.whatsapp.com/send?phone=971569773623&text=Browsed TradersFind" title="Whatsapp Chat" class="mx-4 whatsappBg">
				  <img src="<?php echo BASE_URL; ?>assets/images/whatsapp-chat.webp" alt="login" width="186" height="44" /></a>
				<div class="login-button-top" *ngIf="this.userName==''">
					<a href="<?php echo BASE_URL ?>register-your-business">Add Your Business</a>&nbsp;
						<img src="<?php echo BASE_URL; ?>assets/images/business.png" alt="" width="16" height="16" />
			</div>  
      </div>
  
      </div>
    </div>
  </nav>

<!--<script src="<?php echo BASE_URL; ?> assets/vendors/bootstrap/bootstrap.bundle.min.js"></script>-->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  