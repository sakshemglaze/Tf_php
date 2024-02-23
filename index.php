
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href=" 	https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/style.css" >
    <link rel="stylesheet" href="./assets/css/footer.css" >
    <link rel="stylesheet" href="./assets/css/headersub.css" >
    <link rel="stylesheet" href="./assets/css/enquery.css" >
</head>
<body>


    <?php
    include "header-sub.php";
  
            class FilterDTO {}
            $name= $_POST['searchText']? $_POST['searchText']:"cleaning services";

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
              ?>
              <section class="container-fluid mt-1">
              <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
                <?php
          $webPageName = 'Search Product Top';
           $responseBanner = post('api/keywords-banner', array($name, $webPageName));
           foreach($responseBanner as $index => $ban){
            $banner = $ban;
              ?>
              <div class="carousel-item <?php echo $index === 0 ? 'active' : ''; ?>">
   
              <?php
            $newban = "https://doc.tradersfind.com/images/" . $banner->image->id . ".webp";
           
            echo '<img src="' . $newban . '" alt="Banner Image" width="100%">';
            ?>
            </div>
            <?php
           }
            ?>
            

</div>   
        </div>
        
              </section>
              <hr  size="5" width="100%">  
              <small class="fwbold">
                
                 </small>
<div class="row gy-2">
    <div class="col-lg-3 col-xxl-2">
        
      <div class="sticky-top" style="top:12%;"> <a href="https://wa.link/hy8kan" title="TradersFind" target="_blank">
        <img src="assets/images/poster1.webp" class="img-fluid mt-4 w-100" alt="Poster" /></a>
      </div>
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
              foreach ($data as $prod) {
                if (is_array($prod)) {
                    ?>
                    <div class="row gy-4">
                        <?php
                      foreach ($prod as $onep) {
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
    </div>    
</div>
<p class="search-product-text">
        
<?php
              print_r( $data->sponsoredProduct->productsSubcategory->categoryDescriptionPage);
                 ?>
</p>
    <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  
</body>
</html>
<?php
include "footer.php"
?>