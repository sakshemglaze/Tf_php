<?php include_once 'config.php'; ?>

<link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/vendors/bootstrap/bootstrap.min.css">
<link rel='stylesheet' href='<?php echo BASE_URL; ?>assets/css/owl.carousel.css'>
<link rel='stylesheet' href='<?php echo BASE_URL; ?>assets/css/mystyle.css'>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

 
  <style>
    .toast-message {background: #004c0e; padding: 15px ;  }
    #toast-container>div {padding: 0PX !important; margin-top: 65px !important}
</style>
 
<nav class="navbar sticky-top navbar-expand-lg bg-white">
    <div class="container-fluid">
      <a class="navbar-brand" href="<?php echo BASE_URL; ?>"><img src="<?php echo BASE_URL; ?>assets/images/TradersFind.webp" alt="TradersFind" width="110" height="70" />
      </a>
      <div class="container mobileheader mt-2">
                <div class="col-md-4 offset-md-2 search-bar2">
                    <form  class="search-form"
                        id="homepageSearch" inViewport  action="" method="post" >

                        <div class="input-group mb-3 w-100 position-relative">
                           

                            <!-- <input type="text" class="form-control border-rounded-end"
                                placeholder="What are you looking for.." /> -->


                                <input type="text" name="search"  id="search" autofocus class="form-control border-rounded-end" placeholder="What are you looking for.." autocomplete="off" >
                               
                                <div class="submit-button">
                                        <!-- <img src="assets/images/Voice-icon.png" alt="voice" class="me-lg-3 me-1 img-fluid" width="15"> -->
                                <button type="button" onclick="submitform()" class="btn-primary-gradiant w-100 h-100 px-2 px-lg-5">
                                        <!-- <img src="assets/images/search-icon.png" width="18" class="me-lg-2" alt="search"> -->
                                      <span class="d-lg-inline">Search</span>
                                </button>
                              </div>
                              </div>
                              <style>
    .search-result {
        position: absolute;
        width: 98%;
        z-index: 999; /* Set z-index to appear above other content */
     top: 52px;
       
    }
    
    .search-bar2{position: relative;}
</style>
                              <ul class="form-control search-result"  style="display: none; max-height: 400px; overflow-y: auto;">
    <div class="form-control" id="option_sub"></div>

    <li style="background-image: -moz-linear-gradient(-40deg, rgb(189, 56, 56) 0%, rgb(13, 88, 140) 100%);
        background-image: -webkit-linear-gradient(-40deg, rgb(189, 56, 56) 0%, rgb(13, 88, 140) 100%);
        background-image: -ms-linear-gradient(-40deg, rgb(189, 56, 56) 0%, rgb(13, 88, 140) 100%); color: #fff;">
        <strong>&nbsp;&nbsp;Products</strong>
    </li>

    <div class="form-control" id="option_prod"></div>

    <li style="background-image: -moz-linear-gradient(-40deg, rgb(189, 56, 56) 0%, rgb(13, 88, 140) 100%);
        background-image: -webkit-linear-gradient(-40deg, rgb(189, 56, 56) 0%, rgb(13, 88, 140) 100%);
        background-image: -ms-linear-gradient(-40deg, rgb(189, 56, 56) 0%, rgb(13, 88, 140) 100%); color: #fff;">
        <strong>&nbsp;&nbsp;Company</strong>
    </li>

    <div class="form-control " id="option_com"></div>
</ul>

<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>-->
<script src="<?php echo BASE_URL;?>assets/js/jquery-3.6.1.min.js"> </script>
<script>
    $(document).ready(function () {
        $('#search').keyup(function () {
            var searchText = $(this).val();
            if (searchText.length >= 3) {
                $.ajax({
                    url: "https://api.tradersfind.com/api/search-suggestions",
                    dataType: "json",
                    data: { searchText: searchText },
                    success: function (data) {
                        console.log(data);
                        displaySuggestionssubcat(data.subCatNames);
                        displaySuggestionsprod(data.productNames);
                        displaySuggestionssell(data.sellerNames);
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }else {
            $('.search-result').hide(); // Hide the ul element if searchText length is less than 3
        }
        });
        $(document).on('click', function (event) {
        // Check if the click event target is not inside the dropdown
        if (!$(event.target).closest('.search-result').length && !$(event.target).is('#search')) {
            $('.search-result').hide(); // Hide the dropdown
        }
    });


    function displaySuggestionssubcat(suggestions) {
            if (suggestions) {
                $('#option_sub').empty();
                suggestions.forEach(function (suggestion) {
                    var suggestionItem = $('<li></li>').text(suggestion.subCategoryName).click(function() {
                       
                $('#search').val(suggestion.subCategoryName); 

                var searchTerm = $('#search').val().replace(/\s+/g, '-').toLowerCase();
                var actionURL = '<?php echo BASE_URL; ?>'+"category/" + encodeURIComponent((suggestion.subcategoryUrl?suggestion.subcategoryUrl:suggestion.subCategoryName).replace(/\s/g, '-').toLowerCase());
                $('#homepageSearch').attr('action', actionURL);
                $('#homepageSearch').submit();
            });
            $('#option_sub').append(suggestionItem);
                });
                $('.search-result').show(); 
            }
        }

        function displaySuggestionsprod(suggestions) {
            console.log(suggestions);
            if (suggestions) {
                $('#option_prod').empty();
                suggestions.forEach(function (suggestion) {
                    console.log();
                 var idprod=suggestion.id;
                    var suggestionItem = $('<li></li>').text(suggestion.productName).click(function() {
            
                $('#search').val(suggestion.productName); 
                var searchTermp = $('#search').val().replace(/\s+/g, '-');
                searchTermp=searchTermp.toLowerCase();
                
                var subcatnurl=(suggestion.productUrl?suggestion.productUrl:suggestion.productName).toLowerCase().replace(/\s/g,'-');
                console.log(idprod);
                var actionURL = "product/" + encodeURIComponent(searchTermp)+'/'+suggestion.id;
                $('#homepageSearch').attr('action', actionURL);
                $('#homepageSearch').submit();
                $('.search-result').hide(); 
            });
            $('#option_prod').append(suggestionItem);  
               });
                $('.search-result').show();
            }
        }

        function displaySuggestionssell(suggestions) {
            console.log(suggestions);
            if (suggestions) {
                $('#option_com').empty();
                suggestions.forEach(function (suggestion) {
                    var suggestionItem = $('<li></li>').text(suggestion.sellerCompanyName).click(function() {
                        $('#search').val(suggestion.sellerCompanyName); 
                var searchTermp = $('#search').val().replace(/\s+/g, '-');
                searchTermp=searchTermp.toLowerCase();
                var actionURL = "<?php echo  BASE_URL ?>seller/" + encodeURIComponent((suggestion.sellerUrl?suggestion.sellerUrl:suggestion.sellerCompanyName).toLowerCase().replace(/\s/g,'-'));
                $('#homepageSearch').attr('action', actionURL);
                $('#homepageSearch').submit();

                $('.search-result').hide(); 
            });
            $('#option_com').append(suggestionItem);
                });
                $('.search-result').show(); // Show the ul element
            }
        }
    });
</script>


 
    

                           
                        </div>
                       
                    </form>
                </div>
            </div>
        
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
<img src="<?php echo BASE_URL; ?>assets/images/business.png" alt="business" width="16" height="16" />

        </div>  
        </div>
  
      </div>
    </div>
   
  </nav>
  <script src="<?php echo BASE_URL; ?>assets/vendors/bootstrap/bootstrap.bundle.min.js"></script>

  