<?php include_once 'config.php'; ?>
<link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/hs.css" />
<link rel="stylesheet" href=" 	https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

<section class="search-bar">
    <div class="search-contents py-4">
        <h1 class="text-white text-center"><strong><b>LARGEST ONLINE B2B PORTAL </b></strong></h1>
        <div class="container mt-2">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <form  class="search-form"
                        id="homepageSearch" inViewport  action="index.php" method="post" >

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
<?php
 function autoCompleteSearch($searchText) {
   
    if (
      $searchText &&
      trim($searchText) != "" &&
      strlen(trim($searchText)) > 1 &&
      strlen($searchText) > 2
    ) {
        $encodedString = urlencode($searchText);
        $res = get('api/search-suggestions' . '?searchText=' . $encodedString,
        true,
        null,
        false);
        $resBody = json_decode($res);
        print_r($resBody);
        
       
}
 }
?>
                            <!-- <input type="text" class="form-control border-rounded-end"
                                placeholder="What are you looking for.." /> -->

                                <input type="text" id="search" name="search" autofocus class="form-control border-rounded-end" placeholder="What are you looking for..">
    <div class="submit-button">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    $('#search').keyup(function() {
        var searchText = $(this).val();
        if (searchText.length >= 3) {
           console.log("hello");
             $.ajax({
                url: 'suggestions.php',
                method: 'GET',
                data: { searchText: searchText },
                dataType: 'json',
                success: function(response) {
                   
                    $('#suggestions').html('');
                    $.each(response, function(index, suggestion) {
                        $('#suggestions').append('<div>' + suggestion + '</div>');
                    });
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                }
            });
        }
    });
});
</script>

        <!-- <img src="assets/images/Voice-icon.png" alt="" class="me-lg-3 me-1 img-fluid" width="15"> -->
        <button type="submit" class="btn-primary-gradiant w-100 h-100 px-2 px-lg-5">
            <!-- <img src="assets/images/search-icon.png" width="18" class="me-lg-2" alt=""> -->
            <span class="d-lg-inline">Search</span>
        </button>
    </div>

                           
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>