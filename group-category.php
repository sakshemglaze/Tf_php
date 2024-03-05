<?php include_once 'config.php'; 
    include_once 'services/url.php';
    $urlService = new UrlService();
?>
<?php
    $currentUrl = $_SERVER['REQUEST_URI'];   
    $grpCatName = $matches[1];
    $id = $matches[2];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Industry</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/vendors/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/cate.css" />
</head>
<body>
<script src="<?php echo BASE_URL; ?>assets/js/lazy-load.js"></script>
<?php
    include_once "header-sub.php";
    
    $index=0;
            class FilterDTO {}
            //$name= $_POST['searchText']? $_POST['searchText']:"cleaning services";
            $filterDto = new FilterDTO();
            $payload = array();
            $page = 0;
            $size = 6;
            $queryParams= array('page'=>0, 'size'=> 6) ;
            require_once 'post.php';
        $data =  get(
                'api/guest/products-categories/' . $matches[2] .'?size=' . $size . '&page=' . $page . '&sort=categoryName,asc',
                 true
              );
              $data1 = json_decode($data);
              $industry =  json_decode(get(
                'api/industries-na/' . $data1->title . '?size=10&sort=industryName',true
              ));
              //$data = findActive($data1);

              //print_r($industry[0]);
              ?>
<section class="container-fluid ">
  <?php include_once "banner.php"; ?>
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
      <li class="breadcrumb-item" ><a
          href="/<?php echo $urlService->getIndustryUrl($industry[0]->industryName, $industry[0]->id) ?>"><?php echo $industry[0]->industryName; ?>
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
              <img data-src="<?php echo IMAGE_URL . $data1->image->id;?>.webp" class="lazy w-100" alt="Group-Category" />

            </div>
            <h2 class="fs-4 fwbold mt-4"><?php echo $data1->categoryName; ?></h2>
          </div>
        </div>
        <div class="col-lg-10 position-relative">
          <ul class="sub_category_list">
            <?php
              
            foreach ($data1->productsSubcategories as $subCat) {
            
            echo '<li>';
              echo '<a href="' . B_URL . '/' . $urlService->getCategoryUrl($subCat->subCategoryName, $subCat->id) . '" class="product-box">';
                echo '<div class="pro_image">';
                 if (isset($subCat->image)) {
                  echo '<img data-src="' . IMAGE_URL . $subCat->image->id .'.webp" class="lazy w-100" alt="Category" />';
                 } else {
                   echo '<img data-src="' . BASE_URL . 'assets/images/TradersFind.webp" class="lazy" alt="Category" />';
                 } 
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
include_once "inquiry.php" ?>
                </body></html>
<?php 
include_once "footer.php"                 ?>