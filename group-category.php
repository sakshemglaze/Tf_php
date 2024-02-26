<?php
    $currentUrl = $_SERVER['REQUEST_URI'];
    $urlParts = explode('/', $currentUrl);
    $industryName = $urlParts[2];
    $id = $urlParts[3];
    print_r ($id);   
?>
<!DOCTYPE html>
<html lang="en">
<head>
  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Industry</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <!--<link rel="stylesheet" href="./assets/bootstrap/bootstrap.min.css">-->
    <link rel="stylesheet" href="/assets/css/cate.css" />
</head>
<body>
<script src="./assets/js/lazy-load.js"></script>
<?php
    include "header-sub.php";
    
    $index=0;
            class FilterDTO {}
            //$name= $_POST['searchText']? $_POST['searchText']:"cleaning services";
            $filterDto = new FilterDTO();
            $payload = array();
            $page = 0;
            $size = 6;
            require_once 'post.php';
        $data =  get(
                'api/guest/products-categories/6450d35b1381f473d7f9d7a4'.'?size=' . $size . '&page=' . $page . '&sort=categoryName,asc',
                 true
              );
              $data1 = json_decode($data);
              //$data = findActive($data1);
              //print_r($data1->productsSubcategories);
              ?>
<section class="container-fluid ">
  <?php include "banner.php"; ?>
</section>

<section class="container-fluid ">
  <div class="hidden-content row">
    <div class="col-lg-12">
       <app-banner-adv [bannerPosition]="'Category'" [renderServerSide]="false" [image]="'na'"> 
      </app-banner-adv> 
    </div>
  </div>

</section> 

<section class="p-3">
  <nav style="--bs-breadcrumb-divider: '>'" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/">TradersFind </a></li>

      <li class="breadcrumb-item" *ngIf="industryDetails"><a
          [href]="getIndustryUrl(industryDetails.industryName, industryDetails.id)"><?php echo $data1->industryName; ?>
        </a></li>

      <li class="breadcrumb-item active" aria-current="page" *ngIf="categoryDetails">
      <?php echo $data1->categoryName; ?>
      </li>
    </ol>
  </nav>
</section>

<section class="container-fluid">
  <div class="row gy-4">
    <div class="col-ld-12 text-center">
      <h1 class="border-center fs-1" *ngIf="categoryDetails">
      <?php echo $data1->categoryName; ?>
      </h1>
    </div>
  </div>
  <div class="row gy-5">
    <div class="col-lg-12">
      <div class="row bg-white">
        <div class="col-lg-2 bg-grey" *ngIf="categoryDetails">
          <div class="d-flex flex-wrap p-4 flex-column align-items-center h-100">
            <div class="pro_image w-100">
              <img data-src="https://doc.tradersfind.com/images/<?php echo $data1->image->id;?>.webp" class="lazy w-100" alt="Group-Category" />

            </div>
            <h2 class="fs-4 fwbold mt-4"><?php echo $data1->subCategoryName; ?></h2>
          </div>
        </div>
        <div class="col-lg-10 position-relative">
          <ul class="sub_category_list">
            <?php
            foreach ($data1->productsSubcategories as $subCat) {
            echo '<li>';
              echo '<a [href]="" class="product-box">';
                echo '<div class="pro_image">';
                  echo '<img data-src="https://doc.tradersfind.com/images/' . $subCat->id .'.webp" class="lazy w-100" alt="Category" />';
                echo '</div>';
                echo '<h2 class="fs-18">'. $subCat->subCategoryName . '</h2>';
              echo '</a>';
            echo '</li>';
            
                } ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
<?php
include "inquiry.php" ?>
                </body></html>
<?php 
include "footer.php"                 ?>