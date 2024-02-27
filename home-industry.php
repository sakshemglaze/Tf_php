<link rel="stylesheet" href="./assets/css/hi.css" />
<div class="categories card-shadow rounded-10">
    <div class="d-flex align-items-center ps-2 mb-3">
      <img src="assets/images/Category-icon2.png" alt="Industry" width="19" height="12"  />
      <h4 class="mb-0 ms-3 fw-semibold">Categories</h4>
    </div>
      <?php
      $industry = array();
      array_push($industry, array("House Keeping Services", "6450d5651381f473d7f9da4d", "./assets/images/industry/House-Keeping-Services.jpg"));
array_push($industry, array("Travel, Tourism & Hotels", "6450d5651381f473d7f9da64", "./assets/images/industry/Travel,-Tourism-&-Hotels.jpg"));
array_push($industry, array("Architecture & Interiors", "6450d5651381f473d7f9da30", "./assets/images/industry/Architecture-&-Interiors.jpg"));
array_push($industry, array("Building & Construction", "6450d5651381f473d7f9da65", "./assets/images/industry/Building-&-Constructio.jpg"));
array_push($industry, array("Chemicals, Dyes & Solvents", "6450d5651381f473d7f9da37", "./assets/images/industry/Chemicals,-Dyes-&-Solvents.jpg"));
array_push($industry, array("Industrial Supplies", "6450d5651381f473d7f9da51", "./assets/images/industry/Industrial_Supplies.jpg"));

      ?>
    <ul>
      <li class="has-category" >
        <?php
        foreach($industry as $indus){
            ?>
            <h5>
            <a [href]="#" title="<?php echo $indus[0];?>">
              <span><img src="<?php echo $indus[2];?>" alt="I" width="30" height="30" /></span>&nbsp; 
             
              <?php if (strlen($indus[0]) > 200) {
                echo substr($indus[0], 0, 200);
                     } else {
                echo $indus[0];
                     }?>
              <span
                *ngIf="category[0].length > 200">...</span>
            </a>  </h5>
            <?php
        }
        ?>
       
       
      </li>
  
      <li class="has-category"> <h5>
        <a href="industry.php">
          <span><img src="./assets/images/browse-icon.png" alt="" width="30" height="30" /></span>
          &nbsp;All Categories
        </a> </h5>
  
      </li>
    </ul> 
  </div>
  