<?php include_once 'config.php'; 

?>
<script>
    function submitform(){
        var location=document.getElementById("locationSelect").value.toLowerCase().replace(/\s+/g, '-');
        var searchtex=document.getElementById("search").value;
        var baseurl='<?php echo BASE_URL?>';
        var bsearchurl=baseurl;
        if(location && location=='uae'){
            bsearchurl = bsearchurl + 'search/' + searchtex.toLowerCase().replace(/\s+/g, '-'); 
        }else{
            bsearchurl=bsearchurl+'search'+'/' + searchtex.toLowerCase().replace(/\s+/g, '-')+ "/"+location;
        }
        document.getElementById("homepageSearch").action=bsearchurl;
        document.getElementById("homepageSearch").submit();

    }
</script>
<section class="search-bar ">
    <div class="search-contents py-4">
        <h1 class="text-white text-center"><strong><b>LARGEST ONLINE B2B PORTAL </b></strong></h1>
        <div class="container mt-2">
            <div class="row">
                <div class="col-md-8 offset-md-2 search-bar2">
                    <form  class="search-form"
                        id="homepageSearch" inViewport  action="" method="post" >

                        <div class="input-group mb-3 w-100 position-relative">
                            <span class="input-group-text bg-white" id="basic-addon1"><img
                                    src="<?php echo BASE_URL?>assets/images/location-3.png" width="16" height="17" alt="location" class="me-lg-3 me-2 img-fluid" />
                               <?php
                                $areas = array(
                                    "UAE",
                                    "Dubai",
                                    "Sharjah",
                                   
                                    "Ras Al Khaimah",
                                    "Abu Dhabi",
                                    "Ajman",
                                    "Fujairah",
                                    "Umm Al Quwain",
                                );
                               ?>
                                <select area-label="state" name="location" formControlName="location" id="locationSelect"   class="form-select no-border" >
                                    <!-- class="form-select no-border" (change)="onChangeLocation(locationSelect.value)"> -->
                                     <?php
                                     foreach($areas as $area){
                                        ?>
                                        <option class="dropdown-item" 
                                        value="<?php echo $area;?>">
                                       <?php
                                       echo $area;
                                       ?>
                                    </option>
                                     <?php
                                     }
                                     ?>
                                    
                                </select>
                            </span>

                            <!-- <input type="text" class="form-control border-rounded-end"
                                placeholder="What are you looking for.." /> -->


                                <input type="text"  id="search" autofocus class="form-control border-rounded-end" placeholder="What are you looking for.." autocomplete="off" >
                               
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
            console.log(suggestions);
            if (suggestions) {
                $('#option_sub').empty();
                suggestions.forEach(function (suggestion) {
                    var suggestionItem = $('<li></li>').text(suggestion.subCategoryName).click(function() {
                       
                $('#search').val(suggestion.subCategoryName); 
                var searchTerm = $('#search').val().replace(/\s+/g, '-');
                searchTerm =searchTerm.toLowerCase();
                var statelocation = document.getElementById('locationSelect').value.toLowerCase().replace(/\s+/g,'-');
                if (document.getElementById('locationSelect').value.toLowerCase() != 'uae') {
                    var actionURL = "<?php echo  BASE_URL ?>category/" + encodeURIComponent((suggestion.subcategoryUrl?suggestion.subcategoryUrl:suggestion.subCategoryName).toLowerCase().replace(/\s/g, '-')) + '/' + statelocation;
                } else {
                    var actionURL = "<?php echo  BASE_URL ?>category/" + encodeURIComponent((suggestion.subcategoryUrl?suggestion.subcategoryUrl:suggestion.subCategoryName).toLowerCase().replace(/\s/g, '-'));
                }
                $('#homepageSearch').attr('action', actionURL);
                $('#homepageSearch').submit();
                $('.search-result').hide();
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
                    var suggestionItem = $('<li></li>').text(suggestion.productName).click(function() {
            
                $('#search').val(suggestion.productName); 
                var searchTermp = $('#search').val().replace(/\s+/g, '-');
                searchTermp=searchTermp.toLowerCase();
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
        </div>
    </div>
</section>
<script src="<?php echo BASE_URL; ?>assets/vendors/bootstrap/bootstrap.bundle.min.js"></script>