<?php include_once 'config.php'; ?>
<link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/vendors/bootstrap/bootstrap.min.css">
<link rel='stylesheet' href='<?php echo BASE_URL; ?>assets/css/mystyle.css'>
<link rel='stylesheet' href='<?php echo BASE_URL; ?>assets/css/owl.carousel.css'>
 

<header class="container-fluid shadow-sm border-bottom bg-white sticky-top inner_header1 ">
    <div class="d-flex align-items-center position-relative flex-wrap">

        <a href="<?php echo BASE_URL; ?>" title="TradersFind" aria-label="TradersFind - Largest B2B online Portal">
          <img src="<?php echo BASE_URL; ?>assets/images/TradersFind.webp" alt="TradersFind" class="order-1 inner_header_logo" width="110" height="70" Rel="Nofollow" />
        </a>
        <?php
      $currecntUrlHS=$_SERVER['REQUEST_URI'];
      $part=explode('/',$currecntUrlHS);
      //$suncat=basename($part[3]);//will change
      $countparts=count($part);
      if($countparts>=3){
        $suncat=basename($part[2]);//will change
      }else{
        $suncat='';
      }

      $searchtext12 = htmlspecialchars(str_replace('-',' ', $suncat));
      //$numParts = count($parts);
     
       ?>
       <style>
    .search-result {
        position: absolute;
      
        width:100%;
        z-index: 9999999; /* Set z-index to appear above other content */
     
       
    }
</style>
<script>
function submitform(){
       // var location=document.getElementById("locationSelect").value;
        var searchtex=document.getElementById("search").value;
        var baseurl='<?php echo BASE_URL?>';
        var bsearchurl=baseurl;
       
        bsearchurl = bsearchurl + 'search/' + searchtex.replace(/ /g, '-').toLowerCase();

            
        // else{
        //     bsearchurl=bsearchurl+'search'+'/' + searchtex.replace(' ', '-')+ "/"+location;
        // }
        document.getElementById("homepageSearch").action=bsearchurl;
        document.getElementById("homepageSearch").submit();

    }
</script>
<form method="post" action="" id="homepageSearch" class="w-100 position-relative ms-auto mw-600 order-3 order-md-2 mt-md-0 ddd">

    <div class="input-group input-group-lg w-100 position-relative ms-auto mw-600 order-3 order-md-2 mt-md-0">
          <input  autofocus type="text" class="form-control " id="search" name="searchText"  placeholder="What are you looking for.."
                  style="height: 45px; border-top-right-radius: 10px; border-bottom-right-radius: 10px;" autocomplete="off" value="<?php echo $searchtext12;?>">

          <div class="submit-button">
           
            <button  type="submit" onclick="submitform()" class="btn-primary-gradiant w-100 h-100 px-2 px-lg-5">
              <img src="<?php echo BASE_URL; ?>assets/images/search-icon.png" width="18" class="me-lg-2" alt="search" />
              <div class="d-none d-lg-inline">Search</div>
            </button>
          </div>
          </div>
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
          //  console.log(suggestions);
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
                    var suggestionItem = $('<li></li><br>').text(suggestion.productName).click(function() {
            
                $('#search').val(suggestion.productName); 
                var searchTermp = $('#search').val().replace(/\s+/g, '-');
                searchTermp =searchTermp.toLowerCase();
                var actionURL = "<?php echo  BASE_URL ?>product/" + encodeURIComponent((suggestion.productUrl?suggestion.productUrl:suggestion.productName).toLowerCase().replace(/\s/g,'-'));
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
                    var suggestionItem = $('<li></li><br>').text(suggestion.sellerCompanyName).click(function() {
                        $('#search').val(suggestion); 
                var searchTermp = $('#search').val().replace(/\s+/g, '-');
                var actionURL = "<?php echo  BASE_URL ?>seller/" + encodeURIComponent((suggestion.sellerUrl?suggestion.sellerUrl:suggestion.sellerCompanyName).toLowerCase().replace(/\s/g,'-'));
                $('#homepageSearch').attr('action', actionURL);
                $('#homepageSearch').submit();

                $('#search').val(suggestion); 
                $('.search-result').hide(); 
            });
            $('#option_com').append(suggestionItem);
                });
                $('.search-result').show(); // Show the ul element
            }
        }
    });
</script>
 
</form>
    <div class="sidemenu align-items-center order-4 inner_header">
        <a href="https://api.whatsapp.com/send?phone=971569773623&text=Browsed TradersFind" class="mx-4" title="Whatsapp_chat" aria-label="Chat with Tradersfind support team" target="_blank">
          <img src="<?php echo BASE_URL; ?>assets/images/whatsapp-chat.webp" alt="Whatsapp_chat" style="height: 46px;"></a>
        <div class="login-button-top d-flex align-items-center mw-200" *ngIf="!this.storageService.getItem('login')">
        <a href="<?php echo BASE_URL ?>register-your-business">Add Your Business</a>&nbsp;
        <img src="<?php echo BASE_URL; ?>assets/images/business.png" alt="" width="16" height="16" />
        </div>
</div>
</div>
</header>