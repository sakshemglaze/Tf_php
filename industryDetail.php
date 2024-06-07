<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

    include_once 'config.php';

    include_once 'services/url.php';
    $urlService = new UrlService();

    $currentUrl = $_SERVER['REQUEST_URI'];
    $urlParts = explode('/', $currentUrl);
    $industryName = $matches[1];
    //$id = $matches[2];

    $index=0;
            class FilterDTO {}
            //$name= $_POST['searchText']? $_POST['searchText']:"cleaning services";
            $filterDto = new FilterDTO();
            $payload = array();
            $page = 0;
            $size = 6;
            require_once 'post.php';
        $data =  get('api/industries-by-name/' . $matches[1] .'?size=' . $size . '&page=' . $page . '&sort=industryName,asc',true );
              //$data1 = json_decode($data);
                $data1 = array_filter(json_decode($data), function($record) {
                return $record->status == 'true'; });
             // $data = findActive($data1);
              //print_r($data1[0]);

        $SeoParams = [
          'title' => isset($data1[0]->metaTitle) && $data1[0]->metaTitle != '' ? $data1[0]->metaTitle : $data1[0]->productName . ' in ' . $data1[0]->seller->state . ' - ' . $data1[0]->sellerCompanyName,
          'metaTitle' => isset($data1[0]->metaTitle) && $data1[0]->metaTitle != '' ? $data1[0]->metaTitle : $data1[0]->productName . ' in ' . $data1[0]->seller->state . ' - ' . $data1[0]->sellerCompanyName,
          'metaDescription' => isset($data1[0]->industryDescription) && $data1[0]->industryDescription != '' ? $data1[0]->industryDescription : '',
          'metaKeywords' => isset($data1[0]->Keywords) && $data1[0]->Keywords != '' ? implode(',', $data1[0]->Keywords) : $data1[0]->industryName,
          'fbTitle' => isset($data1[0]->fbTitle) && $data1[0]->fbTitle != '' ? $data1[0]->fbTitle : $data1[0]->productName,
          'fbDescription' => isset($data1[0]->fbDescription) && $data1[0]->fbDescription != '' ? $data1[0]->fbDescription : $data1[0]->productDescription,
          'fbImage' => isset($data1[0]->fbImage) ? API_URL . 'api/guest/imageContentDownload/' . $data1[0]->fbImage.id : 'undefined',
          'fbUrl' => isset($data1[0]->fbUrl) && $data1[0]->fbUrl != '' ? $data1[0]->fbUrl : null,
          'twitterTitle' => isset($data1[0]->twitterTitle) && $data1[0]->twitterTitle != '' ? $data1[0]->twitterTitle : $data1[0]->productName,
          'twitterDescription' => isset($data1[0]->twitterDescription) && $data1[0]->twitterDescription != '' ? $data1[0]->twitterDescription : $data1[0]->productDescription,
          'twitterImage' => isset($data1[0]->twitterImage) ? API_URL . 'api/guest/imageContentDownload/' . $data1[0]->twitterImage.id : 'undefined',
          'twitterSite' => isset($data1[0]->twitterSite) && $data1[0]->twitterSite != '' ? $data1[0]->twitterSite : null,
          'twitterCard' => isset($data1[0]->twitterCard) && $data1[0]->twitterCard != '' ? $data1[0]->twitterCard : null,
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
<section class="p-3 pt-0 pb-0">
  <nav style="--bs-breadcrumb-divider: '>'" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/">TradersFind </a></li>
      <li class="breadcrumb-item" aria-current="page"><a href="<?php echo BASE_URL;?>industry"> Industry </a> </li>
      <li class="breadcrumb-item active" aria-current="page"> <?php echo $data1[0]->industryName; ?> </li>
    </ol>
  </nav>
</section>

<section class="container-fluid ">
    <div class="row gy-4">
        <div class="col-ld-12 text-center">
            <h1 class="border-center fs-1"><?php echo $data1[0]->industryName; ?></h1>
        </div>
    

        <?php 
            $filteredCategories = array_filter($data1[0]->productsCategories, function($record) {
            return ($record->status == 'true' && count($record->productsSubcategories) > 0 ); });
       foreach ($filteredCategories as $cat) {
                echo '<div class="col-lg-4">';
                    echo '<div class="card border-0 category-hover">';
                        echo '<div class="card-body">';
                            echo '<h2 class="mb-3 fw-semibold fs-4">';
                            echo '<a href="' . BASE_URL  . $urlService->getGroupCategoryUrl($cat->categoryName, $cat->id) . '">' . $cat->categoryName . '</a>';
                            echo '</h2>';
                            echo '<div class="d-flex align-items-start">';
                               echo '<img data-src="' . IMAGE_URL . $cat->image->id .'.webp" class="lazy me-3 rounded-10 img-fluid" height="70" width="70" alt="Category">' ;
                                echo '<ul class="list-style-disc ms-4">';
                                    $filteredSubcategories = array_filter($cat->productsSubcategories, function($record) {
                                    return ($record->status == 'true'); });
                                    foreach (array_slice($filteredSubcategories, 0, 5) as $subcat) {
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
