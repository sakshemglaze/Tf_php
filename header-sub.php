<link rel="stylesheet" href="./assets/css/headsub.css" >
<header class="container-fluid shadow-sm border-bottom bg-white sticky-top inner_header1 ">
    <div class="d-flex align-items-center position-relative flex-wrap">

        <a href="index.php" title="TradersFind" aria-label="TradersFind - Largest B2B online Portal">
          <img src="assets/images/TradersFind.webp" alt="TradersFind" class="order-1 inner_header_logo" width="110" height="70" Rel="Nofollow" />
        </a>
       
    <form method="post" action="index.php" class="w-100 position-relative ms-auto mw-600 order-3 order-md-2 mt-md-0 ddd">
    <div class="input-group input-group-lg w-100 position-relative ms-auto mw-600 order-3 order-md-2 mt-md-0">
          <input  autofocus type="text" class="form-control " name="searchText" placeholder="What are you looking for.."
                  style="height: 45px; border-top-right-radius: 10px; border-bottom-right-radius: 10px;">

          <div class="submit-button">
           
            <button  type="submit" class="btn-primary-gradiant w-100 h-100 px-2 px-lg-5">
              <img src="assets/images/search-icon.png" width="18" class="me-lg-2" alt="" />
              <div class="d-none d-lg-inline">Search</div>
            </button>
          </div>
         
               
        </div></form>
    
    <div class="sidemenu align-items-center order-4 inner_header">
        <a href="https://api.whatsapp.com/send?phone=971569773623&text=Browsed TradersFind" class="mx-4" title="Whatsapp_chat" aria-label="Chat with Tradersfind support team" target="_blank">
          <img src="assets/images/whatsapp-chat.webp" alt="Whatsapp_chat" style="height: 46px;"></a>
        <div class="login-button-top d-flex align-items-center mw-200" *ngIf="!this.storageService.getItem('login')">
          <img src="assets/images/user.png" alt="" />
          <a href="signIn.php" class="border-end-black px-3 me-3 lh-sm nowrap">Sign In </a>
          <a href="registration.php">Join Free</a>
        </div>
</div>
</div>
</header>