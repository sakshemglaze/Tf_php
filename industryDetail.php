<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

    include_once 'config.php';

    include_once 'services/url.php';
    $urlService = new UrlService();

    $currentUrl = $_SERVER['REQUEST_URI'];
    $urlParts = explode('/', $currentUrl);
    $industryName = $matches[1];
    $id = $matches[2];

    $index=0;
            class FilterDTO {}
            //$name= $_POST['searchText']? $_POST['searchText']:"cleaning services";
            $filterDto = new FilterDTO();
            $payload = array();
            $page = 0;
            $size = 6;
            require_once 'post.php';
        $data =  get('api/industries/' . $matches[2] .'?size=' . $size . '&page=' . $page . '&sort=industryName,asc',true );
              $data1 = json_decode($data);
             // $data = findActive($data1);
              //print_r($data);

        $SeoParams = [
          'title' => isset($data1->metaTitle) && $data1->metaTitle != '' ? $data1->metaTitle : $data1->productName . ' in ' . $data1->seller->state . ' - ' . $data1->sellerCompanyName,
          'metaTitle' => isset($data1->metaTitle) && $data1->metaTitle != '' ? $data1->metaTitle : $data1->productName . ' in ' . $data1->seller->state . ' - ' . $data1->sellerCompanyName,
          'metaDescription' => isset($data1->industryDescription) && $data1->industryDescription != '' ? $data1->industryDescription : '',
          'metaKeywords' => isset($data1->Keywords) && $data1->Keywords != '' ? implode(',', $data1->Keywords) : $data1->industryName,
          'fbTitle' => isset($data1->fbTitle) && $data1->fbTitle != '' ? $data1->fbTitle : $data1->productName,
          'fbDescription' => isset($data1->fbDescription) && $data1->fbDescription != '' ? $data1->fbDescription : $data1->productDescription,
          'fbImage' => isset($data1->fbImage) ? API_URL . 'api/guest/imageContentDownload/' . $data1->fbImage.id : 'undefined',
          'fbUrl' => isset($data1->fbUrl) && $data1->fbUrl != '' ? $data1->fbUrl : null,
          'twitterTitle' => isset($data1->twitterTitle) && $data1->twitterTitle != '' ? $data1->twitterTitle : $data1->productName,
          'twitterDescription' => isset($data1->twitterDescription) && $data1->twitterDescription != '' ? $data1->twitterDescription : $data1->productDescription,
          'twitterImage' => isset($data1->twitterImage) ? API_URL . 'api/guest/imageContentDownload/' . $data1->twitterImage.id : 'undefined',
          'twitterSite' => isset($data1->twitterSite) && $data1->twitterSite != '' ? $data1->twitterSite : null,
          'twitterCard' => isset($data1->twitterCard) && $data1->twitterCard != '' ? $data1->twitterCard : null,
       ];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php 
        include_once 'services/seo.php';
        $seo = new seoService();
        $seo->setSeoTags($SeoParams); ?>
</head>
<body>
<script src="<?php echo BASE_URL; ?>assets/js/lazy-load.js"></script>
<?php
include_once "header-sub.php";    
              ?>
<section class="container-fluid ">
  <?php include_once "banner.php"; ?>
</section>
<section class="p-3">
  <nav style="--bs-breadcrumb-divider: '>'" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/">TradersFind </a></li>
      <li class="breadcrumb-item" aria-current="page"><a href="<?php echo BASE_URL;?>industry"> Industry </a> </li>
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
       2foreach ($data1->productsCategories as $cat) {
                echo '<div class="col-lg-4">';
                    echo '<div class="card border-0 category-hover">';
                        echo '<div class="card-body">';
                            echo '<h2 class="mb-3 fw-semibold fs-4">';
                            echo '<a href="' . BASE_URL  . $urlService->getGroupCategoryUrl($cat->categoryName, $cat->id) . '">' . $cat->categoryName . '</a>';
                            echo '</h2>';
                            echo '<div class="d-flex align-items-start">';
                               echo '<img data-src="' . IMAGE_URL . $cat->image->id .'.webp" class="lazy me-3 rounded-10 img-fluid" height="70" width="70" alt="Category">' ;
                                echo '<ul class="list-style-disc ms-4">';
                                    foreach (array_slice($cat->productsSubcategories, 0, 5) as $subcat) {
                                        echo '<li>';
                                            echo '<h3 class="fs-6"><a href="' . BASE_URL  . $urlService->getCategoryUrl($subcat->subCategoryName, $subcat->id) . '">' . $subcat->subCategoryName . '</a></h3>';
                                        echo '</li>';
                                                                        }
                                    echo '<li>';
                                        echo '<a href="' . BASE_URL  . $urlService->getGroupCategoryUrl($cat->categoryName, $cat->id) . '"> + View All</a>';
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
include_once "inquiry.php";

include_once "footer.php";
?>
                                    </body>
                                    </html>
