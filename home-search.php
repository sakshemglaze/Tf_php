<?php include_once 'config.php'; ?>
<link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/hs.css" />
<link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/vendors/bootstrap/bootstrap.min.css">

<section class="search-bar">
    <div class="search-contents py-4">
        <h1 class="text-white text-center"><strong><b>LARGEST ONLINE B2B PORTAL </b></strong></h1>
        <div class="container mt-2">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <form  class="search-form"
                        id="homepageSearch" inViewport  action="" method="post" >

                        <div class="input-group mb-3 w-100 position-relative">
                            <span class="input-group-text bg-white" id="basic-addon1"><img
                                    src="assets/images/location-3.png" width="16" height="17" alt="" class="me-lg-3 me-2 img-fluid" />
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
                                <select area-label="state" name="location" formControlName="location" #locationSelect  class="form-select no-border" >
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


                                <input type="text" id="search"  autofocus class="form-control border-rounded-end" placeholder="What are you looking for..">
                               
                                <div class="submit-button">
                                        <!-- <img src="assets/images/Voice-icon.png" alt="" class="me-lg-3 me-1 img-fluid" width="15"> -->
                                <button type="submit" class="btn-primary-gradiant w-100 h-100 px-2 px-lg-5">
                                        <!-- <img src="assets/images/search-icon.png" width="18" class="me-lg-2" alt=""> -->
                                      <span class="d-lg-inline">Search</span>
                                </button>
                              </div>
                              </div>
                              <style>
    .search-result {
        position: absolute;
      
        width: 50%;
        z-index: 999; /* Set z-index to appear above other content */
     
       
    }
</style>
                              <ul class="form-control search-result"  style="display: none; max-height: 200px; overflow-y: auto;">
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
                var actionURL = "category/" + encodeURIComponent(searchTerm)+'/'+suggestion.id;
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
                    var suggestionItem = $('<li></li>').text(suggestion.productName).click(function() {
            
                $('#search').val(suggestion.productName); 
                var searchTermp = $('#search').val().replace(/\s+/g, '-');
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
                    var suggestionItem = $('<li></li>').text(suggestion).click(function() {
                        $('#search').val(suggestion); 
                var searchTermp = $('#search').val().replace(/\s+/g, '-');
                var actionURL = "seller/" + encodeURIComponent(searchTermp);
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
 
    

                           
                        </div>
                       
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="<?php echo BASE_URL; ?>assets/vendors/bootstrap/bootstrap.bundle.min.js"></script>