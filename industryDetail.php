<?php
    include_once 'config.php';

    include_once 'services/url.php';
    $urlService = new UrlService();

    $currentUrl = $_SERVER['REQUEST_URI'];
    $urlParts = explode('/', $currentUrl);
    $industryName = $matches[1];
    $id = $matches[2];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Industry </title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/vendors/bootstrap/bootstrap.min.css">
   
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/indusdetail.css" />
</head>
<body>
<script src="<?php echo BASE_URL; ?>assets/js/lazy-load.js"></script>
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
                'api/industries/6450d5651381f473d7f9da2f?size=' . $size . '&page=' . $page . '&sort=industryName,asc',
                 true
              );
              $data1 = json_decode($data);
             // $data = findActive($data1);
              //print_r($data);
              ?>
<section class="container-fluid ">
  <?php include "banner.php"; ?>
</section>
<section class="p-3">
  <nav style="--bs-breadcrumb-divider: '>'" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/">TradersFind </a></li>
      <li class="breadcrumb-item" aria-current="page"><a href="/industry"> Industry </a> </li>
      <li class="breadcrumb-item active" aria-current="page"> <?php echo $data1->industryName; ?> </li>
    </ol>
  </nav>
</section>

<section class="container-fluid ">
    <div class="row gy-4">
        <div class="col-ld-12 text-center">
            <h1 class="border-center fs-1"><?php echo $data1->industryName; ?></h1>
        </div>
        <div class="col-lg-12">
            <br>
        </div>

        <?php 
        foreach ($data1->productsCategories as $cat) {
                echo '<div class="col-lg-4">';
                    echo '<div class="card border-0 category-hover">';
                        echo '<div class="card-body">';
                            echo '<h2 class="mb-3 fw-semibold fs-4">';
                                echo '<a href="/' . $urlService->getGroupCategoryUrl($cat->categoryName, $cat->id) . '">'. $cat->categoryName .'</a>';
                            echo '</h2>';
                            echo '<div class="d-flex align-items-start">';
                               echo '<img data-src="' . IMAGE_URL . $cat->image->id .'.webp" class="lazy me-3 rounded-10 img-fluid" height="70" width="70" alt="Category">' ;
                                echo '<ul class="list-style-disc ms-4">';
                                    foreach (array_slice($cat->productsSubcategories, 0, 5) as $subcat) {
                                        echo '<li>';
                                            echo '<a href="/' . $urlService->getCategoryUrl($subcat->subCategoryName, $subcat->id) . '">' . $subcat->subCategoryName . '</a>';
                                        echo '</li>';
                                                                        }
                                    echo '<li>';
                                        echo '<a href="/' . $urlService->getGroupCategoryUrl($cat->categoryName, $cat->id) . '"> + View All</a>';
                                    echo '</li>';
                                echo '</ul>';
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            }
                                     ?>
    </div>
</section>
<?php
include "inquiry.php";

include "footer.php";
?>
                                    </body>
                                    </html>