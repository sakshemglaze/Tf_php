<div class="categories categories2   card-shadow rounded-10">
    <div class="d-flex align-items-center ps-2 mb-3">
      <img src="<?php echo BASE_URL?>assets/images/Category-icon2.png" alt="Industry" width="19" height="12"  />
      <h4 class="mb-0 ms-3 fw-semibold">Categories</h4>
    </div>
      <?php
      include_once "post.php";

      $industrys=get('api/featured-industry',true);
      //print_r($industrys);
      
      $industry = array();
      array_push($industry, array("Electrical Equipment", "6450d5651381f473d7f9da3e", "./assets/images/industry/Electrical-Equipment.svg"));
array_push($industry, array("Financial & Legal Services", "6450d5651381f473d7f9da43", "./assets/images/industry/Financial-&-Legal-Services.svg"));
array_push($industry, array("Engineering Services", "6450d5651381f473d7f9da40", "./assets/images/industry/Engineering-Services.svg"));
array_push($industry, array("Building & Construction", "6450d5651381f473d7f9da65", "./assets/images/industry/Building-&-Construction.svg"));
array_push($industry, array("Industrial Plants & Machinery", "6450d5651381f473d7f9da50", "./assets/images/industry/Industrial-Plants-&-Machinery.svg"));
array_push($industry, array("Kitchen Utensils & Appliances", "6450d5651381f473d7f9da53", "./assets/images/industry/Kitchen-Utensils-&-Appliances.svg"));
array_push($industry, array("Packaging Machines & Goods", "6450d5651381f473d7f9da5a", "./assets/images/industry/Packaging-Machines-&-Goods.svg"));

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
              <span><img src="<?php echo BASE_URL. $indus[2];?>" alt="<?php echo $indus[0];?>" width="30" height="30" /></span>&nbsp; 
             
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
          <span><img src="<?php echo BASE_URL?>assets/images/all-category.svg" alt="browse-icon" width="30" height="30" /></span>
          &nbsp;All Categories
        </a> </h5>
  
      </li>
    </ul> 
  </div>
  