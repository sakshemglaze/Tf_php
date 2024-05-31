<?php
  require_once 'post.php';
  $blogs=get('api/guest/homeblogs' .'?page=' . '0' . '&size=' .'5', true);
  $jblog=json_decode($blogs);
?> 
<div class="categories card-shadow rounded-10">
    <div class="d-flex align-items-center ps-2 mb-3">
      <img src="<?php echo BASE_URL?>assets/images/Category-icon2.png" alt="Industry" width="19" height="12"  />
      <h4 class="mb-0 ms-3 fw-semibold">Categories</h4>
    </div>
      <?php
      include_once "post.php";

      $industrys=get('api/featured-industry',true);
      //print_r($industrys);
      
      $industry = array();
      array_push($industry, array("House Keeping Services", "6450d5651381f473d7f9da4d", "./assets/images/industry/House-Keeping-Services.jpg"));
array_push($industry, array("Travel, Tourism & Hotels", "6450d5651381f473d7f9da64", "./assets/images/industry/Travel,-Tourism-&-Hotels.jpg"));
array_push($industry, array("Architecture & Interiors", "6450d5651381f473d7f9da30", "./assets/images/industry/Architecture-&-Interiors.jpg"));
array_push($industry, array("Building & Construction", "6450d5651381f473d7f9da65", "./assets/images/industry/Building-&-Constructio.jpg"));
array_push($industry, array("Chemicals, Dyes & Solvents", "6450d5651381f473d7f9da37", "./assets/images/industry/Chemicals,-Dyes-&-Solvents.jpg"));
array_push($industry, array("Industrial Supplies", "6450d5651381f473d7f9da51", "./assets/images/industry/Industrial_Supplies.jpg"));

      ?>
    <ul>
    
        <?php
        include_once 'services/url.php';
        $urlService = new UrlService();
        
        foreach($industry as $indus){

            ?>
              <li class="has-category" >
            <h5>
            <a href="<?php echo BASE_URL. $urlService->getIndustryUrl($indus[0],$indus[1]); ?>" title="<?php echo $indus[0];?>">
              <span><img src="<?php echo BASE_URL. $indus[2];?>" alt="I" width="30" height="30" /></span>&nbsp; 
             
              <?php if (strlen($indus[0]) > 200) {
                echo substr($indus[0], 0, 200);
                     } else {
                echo $indus[0];
                     }?>
              
            </a>  </h5>
            </li>
            <?php
        }
        ?>
      <li class="has-category"> <h5>
        <a href="industry">
          <span><img src="<?php echo BASE_URL?>assets/images/browse-icon.png" alt="" width="30" height="30" /></span>
          &nbsp;All Categories
        </a> </h5>
  
      </li>
    </ul> 
  </div>
  