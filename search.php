<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex nofollow" >
    <title>Document</title>
    <link rel="stylesheet" href=" 	https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
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
            }else{
              $name= $_POST['search'];
            }
          

            $filterDto = new FilterDTO();
            $payload = array(
                'searchText' => $name ,
                'searchTextType' => 'subcategory',
                'filterDto' => $filterDto
            );
            $queryParams= array('page'=>0, 'size'=> 10) ;
            require_once 'post.php';
        $data =   post(
                'api/new-search-products',
                $payload,
                true,
                $queryParams,
                false
              );
              $length = count(($data->products));
              ?>
              <section class="container-fluid mt-1">
              <?php include "banner.php";     ?>
              </section>
            
              <section class="p-2">

<div style="text-align: center;">
  <h1 class="me-2 fwbold  text-capitalize mb-0"><?php echo $name?>
    <span *ngIf="location=='null'"> in UAE</span>
    <!-- <span *ngIf="location != 'null'"> in {{ location }}</span> -->
  </h1>
  <small class="fwbold">(<?php print_r($length)?>+ products available) </small>
</div>
<div *ngIf="subcategoryDetails && this.location == 'null' && subcategoryDetails.shortDescription ">
  <span
    [innerHTML]="this.showMore1?
    subcategoryDetails.shortDescription.length > shortDesc
    ? subcategoryDetails.shortDescription.substring(0,shortDesc) : subcategoryDetails.shortDescription: subcategoryDetails.shortDescription">

  </span>
  <span *ngIf="subcategoryDetails.shortDescription.length > shortDesc"
    style="color:brown; position: absolute;">&nbsp;<b> <a (click)="this.toggleShowMore1()">{{
        this.showMore1 ? '... View more' : 'View less' }} </a> </b></span>
</div>
<br>
<nav style="--bs-breadcrumb-divider: '>'" aria-label="breadcrumb" *ngIf="products">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/">TradersFind</a></li>
    <li class="breadcrumb-item" *ngIf="industryDetails"><a
        [href]="getIndustryUrl(industryDetails.industryName, industryDetails.id)">{{industryDetails.industryName}}</a>
    </li>

    <li class="breadcrumb-item" *ngIf="categoryDetails"><a
        [href]="getCategoryUrl(categoryDetails.categoryName, categoryDetails.id)">{{categoryDetails.categoryName}}</a>
    </li>

    <li class="breadcrumb-item active fwbold text-capitalize " aria-current="page" >
      {{this.searchText}} <span *ngIf="location !== 'null'"> &nbsp;>&nbsp; {{location}} </span>
    </li>
  </ol>
</nav>
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
        <img src="assets/images/poster1.webp" class="img-fluid mt-4 w-100" alt="Poster" /></a>
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

    <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  
</body>
</html>
<?php
include "footer.php"
?>