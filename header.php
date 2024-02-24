<link rel="stylesheet" href=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="./assets/css/head.css" >
<nav class="navbar sticky-top navbar-expand-lg bg-white">
    <div class="container-fluid">
      <a class="navbar-brand" href="/"><img src="assets/images/TradersFind.webp" alt="TradersFind" width="110" height="70" />
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <div class="sidemenu ms-auto align-items-center ">
  
        <button class="btn-primary-gradiant" routerLink="post-buy-requirements" >Post Buy Requirements</button>
        <ul class="navigation">
          <li class="has-sub-menu">
            For Buyer
            <ul>
              <li><a href="browse-sellers">Browse Sellers</a></li>
              <li><a href="buyer-faq">Buyer FAQ </a></li>
            </ul>
          </li>
  
          <li class="has-sub-menu">
            For Seller
            <ul>
              <li><a href="register-your-business">Sell Your Products</a></li>
              <!--<li>Latest Buy Leads</li> -->
              <li><a href="seller-faq">Seller FAQ</a></li>
            </ul>
          </li>
  
          <li class="has-sub-menu">
            Need Help
            <ul>
              <li><a href="feedback">Send Feedback</a></li>
              <li><a href="complaint">Raise a Complaint</a></li>
              <!--<li><a href="advertise-with-us">Advertise with Us</a></li>
              <li><a routerLink="">Email Us</a></li>-->
              <li><a href="contact-us">Contact Us</a></li>
              <!--  <li>Chat with Us</li> -->
            </ul>
          </li>
        </ul>
        <a target="_blank" href="https://api.whatsapp.com/send?phone=971569773623&text=Browsed TradersFind" title="Whatsapp Chat" class="mx-4 whatsappBg">
          <img src="assets/images/whatsapp-chat.webp" alt="" width="186" height="44" /></a>
        <div class="login-button-top" *ngIf="this.userName==''">
          <img src="assets/images/user.png" alt="" width="16" height="16" />
          <a routerLink="login" class="border-end-black px-3 me-3 lh-sm">Sign In</a>
          <a routerLink="register-your-business">Join Free</a>
        </div>
        
        
  
  
        </div>
  
      </div>
    </div>
  </nav>
  <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

  