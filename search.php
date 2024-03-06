<?php include_once 'config.php';
       
     include_once 'services/url.php';
     $urlService = new UrlService(); 
     $name = str_replace("-", " ", $matches[1]);
     $id = str_replace("-", " ", $matches[2]);
   //print_r($name);
    $subCategoryId = $matches[2];
    $location = 'UAE';
    //print_r($name);

    $indexr=0;
            class FilterDTO {}
           
         $location="";
            $filterDto = new FilterDTO();
            $payload = array(
                'searchText' => $name ,
                'searchTextType' => 'subcategory',
                'filterDto' => $filterDto
            );  
            $queryParams= array('page'=>0, 'size'=> 12) ;
            require_once 'post.php';
        $data =  post(
                'api/new-search-products',
                $payload,
                $queryParams,
              );
              $length = count(($data->products));
              //print_r($data->products);
              $subcategory = json_decode(get ( 'api/guest/products-subcategories/' . $subCategoryId));
              //print_r($subcategory);  
              $category = json_decode(get(
                'api/guest/products-categories-na/' . $subcategory->title, $queryParams
              ));
              //print_r($category[0]);
              $industry = json_decode(get(
                'api/industries-na/' . $category[0]->title,$queryParams) );
              //print_r($subcategory);

              $SeoParams = [
                'title' => $subcategory->subCategoryName,
                'metaTitle' => $subcategory->metaTitle !== null ? $subcategory->metaTitle : $subcategory->subCategoryName,
                'metaDescription' => $subcategory->metaDescription !== null ? $subcategory->metaDescription : $subcategory->subCategoryDescription,
                'metaKeywords' => $subcategory->keywords !== null ? $subcategory->keywords : 'tradersfind, b2b portal, list of companies in uae, b2b marketplace, business directory, manufacturers in uae, suppliers in uae, buyers in uae, yellowpages uae, importers in uae, uae companies directory, b2b website, business marketplace, local business listings, business directory in uae',
                'fbTitle' => $subcategory->fbTitle !== null ? $subcategory->fbTitle : $subCategory->subCategoryName,
                'fbDescription' => $subcategory->fbDescription !== null ? $subcategory->fbDescription : '',
                'fbImage' => $subcategory->fbImage !== null ? $subCategory->fbImage : '',
                'fbUrl' => $subcategory->fbUrl !== null ? $subCategory->fbUrl : '',
                'twitterTitle' => $subcategory->twitterTitle !== null ? $subcategory->twitterTitle : $subCategory->subCategoryName,
                'twitterDescription' => $subcategory->twitterDescription !== null ? $subcategory -> twitterDescription : '',
                'twitterImage' => $subcategory->twitterImage !== null ? $subCategory->twitterImage : '',
                'twitterSite' => $subcategory->twitterSite !== null ? $subCategory->twitterSite : '',
                'twitterCard' => $subcategory->twitterCard !== null ? $subCategory->twitterCard : '',
                'schemaDescription' => $subcategory->schemaDescription != null ? $subCategory->schemaDescription : '',
                ];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="robots" content="noindex nofollow" >
  <?php 
  include_once 'services/seo.php';
  $seo = new seoService();
                $seo->setSeoTags($SeoParams);

  ?>
      
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/vendors/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/style.css" >
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/enquery.css" > 
    
</head>

<body>
    <?php
    include_once "header-sub.php";
    ?>
    <section class="container-fluid mt-1">
       <?php include_once "banner.php";     ?>
    </section>
            
<section class="p-2">
<nav style="--bs-breadcrumb-divider: '>'" aria-label="breadcrumb" *ngIf="products">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/">TradersFind</a></li>
    <li class="breadcrumb-item" ><a
        href="/<?php echo $urlService->getIndustryUrl($industry[0]->industryName,$industry[0]->id) ?>"><?php echo $industry[0]->industryName ?></a>
    </li>
    <li class="breadcrumb-item"><a
        href="/<?php echo $urlService->getGroupCategoryUrl($category[0]->categoryName,$category[0]->id) ?>"><?php echo $category[0]->categoryName ?></a>

    </li>
    <li class="breadcrumb-item active fwbold text-capitalize " aria-current="page" >
    <?php echo $subcategory->subCategoryName;

    ?>
    </li>
  </ol>
</nav>
<div style="text-align: center;">
  <h1 class="me-2 fwbold  text-capitalize mb-0"><?php echo $subcategory->subCategoryName?>
  <?php if ($location == null) {
    echo '<span> in UAE</span>';
  } else {
    echo '<span> in ' . $location;
  } ?>
  </h1>
  <small class="fwbold">(<?php print_r($length)?> products available) </small>
</div>
<?php 

if ($subcategory->shortDescription != '' && $location === '') {
 echo '<div>';
 echo '<span [innerHTML]="' . substr($subcategory->shortDescription, 0, 400) . '"> </span>';
 if(strlen($subcategory->shortDescription) >= 400) {
  echo '<span style="color:brown; position: absolute;">&nbsp;<b> <a (click)=""> View more : View less</a> </b></span>';
 } else {
  echo '<span style="color:brown; position: absolute;">&nbsp;<b> <a (click)=""> View more : View less</a> </b></span>';
 }
  echo '</div>';
  } ?>
<br>


</section>
<div class="row gy-2">
    <div class="col-lg-3 col-xxl-2">
       <?php
        $userAgent = $_SERVER['HTTP_USER_AGENT'];
        $isMobile = preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i', $userAgent);
        //$imagePath = $isMobile ? 'assets/images/poster1.webp' : 'assets/images/poster1.gif';
        if(!$isMobile ) {
      ?>
      <div class="sticky-top" style="top:12%;"> <a href="https://wa.link/hy8kan" title="TradersFind" target="_blank">
        <img data-src="<?php echo BASE_URL; ?>assets/images/poster1.webp" class="lazy img-fluid mt-4 w-100" alt="Poster" /></a>
      </div>
      <?php } ?>
    </p></div>
    <div class="col-lg-9 col-xxl-10 home-cleaning-Bg">
    <div class="row">
        <div class="col-lg-12">
          <div class="shadow2 row align-items-center mx-1">
            <div class="col-lg-8">
              <ul class="d-flex align-items-center flex-wrap rightnav" *ngIf="filters">
                <?php 
                //print_r($location);
                if ($location == null || $location == 'UAE' ) { 
                echo '<li><a href="'. $name .'" class="active" >All UAE</a></li>';
                } else {
                  echo '<li><a href="'. $name .'" >All UAE</a></li>';
                }
                  foreach(($data->states) as $state){
                    echo'<li >';
                    echo '<a href="#">'. $state .'</a>';
                    echo' </li>';
                  };
                  ?>
               
              </ul>
            </div>
          </div>
        </div>
      </div>
   
                           <?php
                           if($data->sponsoredProduct!=null){
                          $premiumprod=$data->sponsoredProduct;
                        include_once "premiumProd.php";
                           }
                           //print_r($data);
              foreach ($data as $inde1 => $prod) {
                
                if (is_array($prod)) {
                  //print_r($prod);
                    ?>
                    <div class="row gy-4">
                        <?php
                      foreach ($prod as $inde => $onep) {
                        $indexr=$inde;
                        if (is_object($onep) && isset($onep->id)) {
                           $prodData=$onep;
                           //print_r($prodData);
                           ?>
                           <div class= "col-lg-6 ">
                            <?php
                              include 'product.php';  
                           ?>
                          </div>
                          <?php
                        }
                      }
                          ?>
                    </div>                    
                    <?php
                }
            }
          
          ?> 
          <div class="post-request-text ">
          <section class="easysource my-4 py-2">
            <?php
             include_once "post-request.php";
              ?>
               </section>
          </div>
          <div class="row">
          <p class="search-product-text">
        
        <?php
        if(isset($data->sponsoredProduct->productsSubcategory->categoryDescriptionPage)){
                      print_r( $data->sponsoredProduct->productsSubcategory->categoryDescriptionPage);
                         ?>
        </p>
        <?php
        }
        ?>
        </div>
    </div>    
</div>

    <script src="<?php echo BASE_URL; ?>assets/vendors/bootstrap/bootstrap.bundle.min.js"></script>
  <script src="<?php echo BASE_URL; ?>assets/js/lazy-load.js"></script> 
</body>
</html>
<?php
include_once "footer.php"
?>
