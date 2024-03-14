<?php 
//error_reporting(E_ALL);
//ini_set('display_errors', 1);

include_once 'config.php'; 
  include_once 'services/url.php';
  $urlService = new UrlService();
?>
<?php
    $currentUrl = $_SERVER['REQUEST_URI'];
?>
<?php
           $page = 0;
           $size = 6;
            require_once 'post.php';
        $data =  get('api/industries'.'?size=' . $size . '&page=' . $page . '&sort=industryName,asc',true );
             $data1 = json_decode($data);
             // $data = findActive($data1);
             // print_r($data);
              ?>
<!DOCTYPE html>
<html lang="en">
<head>
  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    $SeoParams = [
          'title' => 'Browse Sellers from UAE"s Largest Online B2B Portal',
          'metaTitle' => 'Browse Sellers from UAE"s Largest Online B2B Portal',
          'metaDescription' => 'Browse Sellers products and services on the UAE"s Largest Online B2B Portal. Connect with leading sellers for successful business deals on TradersFind',
       ];
       include_once 'services/seo.php';
        $seo = new seoService();
                $seo->setSeoTags($SeoParams);
?>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/indus.css" />
</head>
<body>
<?php include_once "header-sub.php"; ?>
<script src="<?php echo BASE_URL; ?>assets/js/lazy-load.js"></script>

<section class="container-fluid ">
  <?php include_once "banner.php"; ?>
</section>
<section class="p-3">
  <nav style="--bs-breadcrumb-divider: '>'" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/">TradersFind </a></li>

      <li class="breadcrumb-item active" aria-current="page">
        Industry
      </li>
    </ol>
  </nav>
</section>

<section class="container-fluid ">
  <!-- third row -->
  
  <?php
foreach ($data1 as $category) {
    echo '<div class="row  gy-4 bg-white">';
    echo '<div class="col-lg-12">';
    echo '<h3 class="text-center fwbold text-uppercase text-black-50"><a href="' . $urlService->getIndustryUrl($category->industryName, $category->id) .'">' . $category->industryName . '</a></h3>';
    echo '</div>';
    echo '<div class="col-lg-3 text-center">';
    if (!empty($category->image)) { 
        $indImage = IMAGE_URL . $category->image->id . ".webp";
        echo '<a href="' . $urlService->getIndustryUrl($category->industryName, $category->id) . '"> <img data-src="' . $indImage . '" class="img-fluid lazy" alt="Industry" width="70%" /></a>';
    }
    echo '</div>';
    echo '<div class="col-lg-9">';
    echo '<div class="row gy-4">';
    foreach (array_slice($category->productsCategories, 0, 6) as $cat) {
        echo '<div class="col-lg-4">';
        echo '<div class="d-flex align-items-center gap-3">';
        $catImage = IMAGE_URL . $cat->image->id . ".webp";
        echo '<a href="' . $urlService->getGroupCategoryUrl($cat->categoryName, $cat->id) . '"> <img data-src="' . $catImage . '" class="lazy" alt="Category" width="140px" /> </a>';
        echo '<div class="inddetails">';
        echo '<h4 class="fs-6 fwbold"><a href="' . $urlService->getGroupCategoryUrl($cat->categoryName, $cat->id) . '" title="' . $cat->categoryName . '">' . $cat->categoryName . '</a></h4>';
        echo '<ul class="mt-4 text-black-50">';
        foreach (array_slice($cat->productsSubcategories, 0, 3) as $subcat) {
            echo '<li><a href="' . $urlService->getCategoryUrl($subcat->subCategoryName, $subcat->id) . '" title="' . $subcat->subCategoryName . '">' . $subcat->subCategoryName . '</a></li>';
        }
        echo '<li><a href="' . $urlService->getGroupCategoryUrl($cat->categoryName, $cat->id) . '"> + View All</a></li>';
        echo '</ul>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
    echo '</div>';
    echo '</div>';
    echo '</div>';

    echo '<div class="col-lg-12">';
      echo '<div class="row bg-grey">';
        echo '<div class="col-lg-12 position-relative sub_category_list2 ">';
         echo '<ul class="sub_category_list">';
          foreach (array_slice($category->productsCategories, 0, 4) as $cat) {
            echo '<li>';
              echo '<a href="' . $urlService->getGroupCategoryUrl($cat->categoryName, $cat->id) . '" class="align-items-center flex-row d-flex gap-3 flex-wrap flex-md-nowrap  justify-content-md-start">';
                echo '<div class="pro_image">';
                  echo'<img data-src="' . IMAGE_URL . $cat->image->id . '.webp" class="lazy"' . 'alt="Category" width="140px"/>';
                echo'</div>';
                echo'<h2 class="fs-6 fw-bold">' . $cat->categoryName .'</h2>';
              echo'</a>';
            echo '</li>';
          }
          echo '</ul>';
          echo '<a href="' . $urlService->getIndustryUrl($category->industryName, $category->id) .'" class="btn-primary-gradiant subcatbtn">View More</a>';
      echo '</div>';
     echo '</div>';
    echo '</div>';

    echo '</div>';
    echo '<br />';
    echo '<br />';
}
?>

  <pagination-controls id="industry_listing_pagination" (pageChange)="getNext($event)" [responsive]="true"
    [maxSize]="20"></pagination-controls>
</section>

<section class="container-fluid mt-4" *ngIf="popular_categories">
  <div class="row gy-4">
    <div class="col-12">
      <hr />
    </div>
  </div>
</section>
<?php 
include_once "inquiry.php" ?>
        </body></html>
<?php
include_once "footer.php";
?>
