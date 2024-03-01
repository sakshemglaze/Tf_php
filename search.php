<?php include_once 'config.php'; 
     include_once 'services/url.php';
     $urlService = new UrlService(); 
    $name = str_replace("-", " ", $matches[1]);
  //print_r($name);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex nofollow" >
    <title>Search Results</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/vendors/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/style.css" >
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/enquery.css" > 
    
</head>
<body>


    <?php
    include "header-sub.php";
    $indexr=0;
            class FilterDTO {}
            if(isset($_POST['searchText'])){
              $name= $_POST['searchText'];
              print_r('post');
            } /*
            else{
               $name= $_POST['search'];
               print_r($name);
            }*/
         
            $filterDto = new FilterDTO();
            $payload = array(
                'searchText' => $name ,
                'searchTextType' => 'subcategory',
                'filterDto' => $filterDto
            );  
            $queryParams= array('page'=>0, 'size'=> 12) ;
            require_once 'post.php';
        $data =   post(
                'api/new-search-products',
                $payload,
                true,
                $queryParams,
                false
              );
              $length = count(($data->products));
              print_r($data->productsCategories);
              $category =   get(
                'api/guest/products-categories-na/' . $data->title,
                true,
                $queryParams
              );
              print_r('category ' . $category[0]->title);
              $industry =   get(
                'api/industries-na/' . $category[0]->title,true,$queryParams
              );
              //print_r($industry);
              ?>
              <section class="container-fluid mt-1">
              <?php include "banner.php";     ?>
              </section>
            
<section class="p-2">
<nav style="--bs-breadcrumb-divider: '>'" aria-label="breadcrumb" *ngIf="products">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/">TradersFind</a></li>
    <li class="breadcrumb-item" *ngIf="industryDetails"><a
        [href]="getIndustryUrl(industryDetails.industryName, industryDetails.id)"><?php echo $industry[0]->industryName ?></a>
    </li>

    <li class="breadcrumb-item" *ngIf="categoryDetails"><a
        [href]="getCategoryUrl(categoryDetails.categoryName, categoryDetails.id)"><?php echo $category->categoryName ?></a>
    </li>

    <li class="breadcrumb-item active fwbold text-capitalize " aria-current="page" >
    <?php echo $name  ;
    if ($location != '') {
     echo $location; } ?>
    </li>
  </ol>
</nav>
<div style="text-align: center;">
  <h1 class="me-2 fwbold  text-capitalize mb-0"><?php echo $name?>
    <span *ngIf="location=='null'"> in UAE</span>
  </h1>
  <small class="fwbold">(<?php print_r($length)?> products available) </small>
</div>
<?php 
  if ($data->shortDescription != '' && $location === 'null') {
 echo '<div>';
  echo '<span [innerHTML]=""> </span>';
  echo '<span style="color:brown; position: absolute;">&nbsp;<b> <a (click)=""> View more : View less</a> </b></span>';
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

                <li><a
                href='#'
                   >All UAE</a></li>

                
                  <?php
                  foreach(($data->states) as $state){
                    echo'<li >';
                    echo '<a href=\'#\'>'. $state .'</a>';
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
                        include "premiumProd.php";
                           }
              foreach ($data as $inde1 => $prod) {
                
                if (is_array($prod)) {
                    ?>
                    <div class="row gy-4">
                        <?php
                      foreach ($prod as $inde => $onep) {
                        $indexr=$inde;
                        if (is_object($onep) && isset($onep->id)) {
                           $prodData=$onep;
                           ?>
                           <div class= "col-lg-6 ">
                            <?php
                           include 'product.php';
                           
                        }
                        ?>
                          </div>
                          <?php
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
             include "post-request.php";
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
include "footer.php"
?>
