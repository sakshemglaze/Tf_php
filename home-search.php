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
                        id="homepageSearch" inViewport  action="search.php" method="post" >

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


                                <input type="text" name="search" autofocus class="form-control border-rounded-end" placeholder="What are you looking for..">

    <div class="submit-button">
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
<script src="<?php echo BASE_URL; ?>assets/vendors/bootstrap/bootstrap.bundle.min.js"></script>