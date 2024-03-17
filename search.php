<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

//print_r('Welcome search');
include_once 'config.php';
       
     include_once 'services/url.php';
     $urlService = new UrlService(); 
     $name = str_replace("-", " ", $matches[1]);
     $id = str_replace("-", " ", $matches[2]);
   
    $subCategoryId = $matches[2];
    $location = 'UAE';
    $keyword = 'yes';
    //print_r($name);
    //print_r($subCategoryId);

    include_once "header-sub.php";



    $indexr=0;
    $page=0;
    $size=20;

    $currentUrl = $_SERVER['REQUEST_URI'];
    $parts = explode('/', $currentUrl);
  
    
    $numParts = count($parts);
    if($numParts>=4){
    $category1 = basename($parts[3]); // Extract the category part
    }else{
      $category1='';
    }
    $searchtext = htmlspecialchars(str_replace('-',' ', $category1));
    class FilterDTO {
      public $stateFilter;
  }
  $filterDto = new FilterDTO();
  if( $numParts==5){//will change
    $location= basename($parts[3]);//will change
    $subCategoryId=basename($parts[4]);//will change
    $filterDto->stateFilter=[ucwords(str_replace('-'," ",$location))];
    $name = str_replace("-", " ", $matches[1]);//neverchange
    $id = str_replace("-", " ", $matches[3]);//will change
  }else if($numParts==3){//will change
    $keyword=basename($parts[2]);//will change
   // print_r($keyword);
  }else if(basename($parts[1])=='search' && $numParts==4 ){//will change
   // $location="";
   // print_r("locationkeywordstatehjedf");
    $location= basename($parts[3]);//will change
    
    $filterDto->stateFilter=[ucwords(str_replace('-'," ",$location))];
}
else{
  $location="";
 // print_r("locationkeyword");
}
  //print_r($location);
  require_once 'post.php';
         if($location==""){
          
            $payload = array(
                'searchText' => $name ,
                'searchTextType' => 'subcategory',
                'filterDto' => $filterDto
            );  
           
            $queryParams= array('page'=> $page, 'size'=> $size) ;
          
            $data =  post(
              'api/new-search-products',
              $payload,
              true,
              $queryParams,
              false
            );
if($data->sponsoredProduct!=null){
  $length=count(($data->products))+1;
}else{
              $length = count(($data->products));
}
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
  'metaTitle' => isset($subcategory->metaTitle) ? $subcategory->metaTitle : $subcategory->subCategoryName,
  'metaDescription' => isset($subcategory->metaDescription) ? $subcategory->metaDescription : $subcategory->subCategoryDescription,
  'metaKeywords' => isset($subcategory->keywords) ? $subcategory->keywords : 'tradersfind, b2b portal, list of companies in uae, b2b marketplace, business directory, manufacturers in uae, suppliers in uae, buyers in uae, yellowpages uae, importers in uae, uae companies directory, b2b website, business marketplace, local business listings, business directory in uae',
  'fbTitle' => isset($subcategory->fbTitle) ? $subcategory->fbTitle : $subCategory->subCategoryName,
  'fbDescription' => isset($subcategory->fbDescription) ? $subcategory->fbDescription : '',
  'fbImage' => isset($subcategory->fbImage) ? $subcategory->fbImage : '',
  'fbUrl' => isset($subcategory->fbUrl) ? $subcategory->fbUrl : '',
  'twitterTitle' => isset($subcategory->twitterTitle) ? $subcategory->twitterTitle : $subcategory->subCategoryName,
  'twitterDescription' => isset($subcategory->twitterDescription) ? $subcategory -> twitterDescription : '',
  'twitterImage' => isset($subcategory->twitterImage) ? $subcategory->twitterImage : '',
  'twitterSite' => isset($subcategory->twitterSite) ? $subcategory->twitterSite : '',
  'twitterCard' => isset($subcategory->twitterCard) ? $subcategory->twitterCard : '',
  'schemaDescription' => isset($subcategory->schemaDescription) ? $subcategory->schemaDescription : '',
  ];
  //print_r("first if");
          }else if( $numParts==3){//will be change
  
            $payload = array(
              'searchText' => $name ,
              'searchTextType' => null,
              'filterDto' => $filterDto
          );  
        
          //print_r($payload);
         
          $queryParams= array('page'=> $page, 'size'=> $size) ;
        
          $data =  post(
            'api/new-search-products',
            $payload,
            true,
            $queryParams,
            false
          );
          //print_r("++++++");
            $length = count(($data->products));
            //print_r($data->products);
          //  $subcategory = json_decode(get ( 'api/guest/products-subcategories/644fb84b294b4e53e904728f'));
            //print_r($subcategory);  
          //  $category = json_decode(get(
          //    'api/guest/products-categories-na/' . $subcategory->title, $queryParams
           // ));
           // //print_r($category[0]);
          //  $industry = json_decode(get(
           //   'api/industries-na/' . $category[0]->title,$queryParams) );
            //print_r($subcategory);
           // $SeoParams = [];
           // print_r("second if");
          }else if(basename($parts[1])=='search' && $numParts==4 ){//will change

            $payload = array(
              'searchText' => $name ,
              'searchTextType' => null,
              'filterDto' => $filterDto
          );  
        
          //print_r($payload);
         
          $queryParams= array('page'=> $page, 'size'=> $size) ;
        
          $data =  post(
            'api/new-search-products',
            $payload,
            true,
            $queryParams,
            false
          );
          
            $length = count(($data->products));
           // print_r("third if");
            //$SeoParams = [];
          }
         
          else{
            
            $payload = array(
                'searchText' => $name ,
                'searchTextType' => 'subcategory',
                'filterDto' => $filterDto
            );  
          
            //print_r($payload);
           
            $queryParams= array('page'=> $page, 'size'=> $size) ;
          
            $data =  post(
              'api/new-search-products',
              $payload,
              true,
              $queryParams,
              false
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
  'metaTitle' => isset($subcategory->metaTitle) ? $subcategory->metaTitle : $subcategory->subCategoryName,
  'metaDescription' => isset($subcategory->metaDescription) ? $subcategory->metaDescription : $subcategory->subCategoryDescription,
  'metaKeywords' => isset($subcategory->keywords) ? $subcategory->keywords : 'tradersfind, b2b portal, list of companies in uae, b2b marketplace, business directory, manufacturers in uae, suppliers in uae, buyers in uae, yellowpages uae, importers in uae, uae companies directory, b2b website, business marketplace, local business listings, business directory in uae',
  'fbTitle' => isset($subcategory->fbTitle) ? $subcategory->fbTitle : $subCategory->subCategoryName,
  'fbDescription' => isset($subcategory->fbDescription) ? $subcategory->fbDescription : '',
  'fbImage' => isset($subcategory->fbImage) ? $subcategory->fbImage : '',
  'fbUrl' => isset($subcategory->fbUrl) ? $subcategory->fbUrl : '',
  'twitterTitle' => isset($subcategory->twitterTitle) ? $subcategory->twitterTitle : $subcategory->subCategoryName,
  'twitterDescription' => isset($subcategory->twitterDescription) ? $subcategory -> twitterDescription : '',
  'twitterImage' => isset($subcategory->twitterImage) ? $subcategory->twitterImage : '',
  'twitterSite' => isset($subcategory->twitterSite) ? $subcategory->twitterSite : '',
  'twitterCard' => isset($subcategory->twitterCard) ? $subcategory->twitterCard : '',
  'schemaDescription' => isset($subcategory->schemaDescription) ? $subcategory->schemaDescription : '',
  ];
  //print_r("else");
          }

              
              
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
  if(isset($SeoParams)){
    $seo->setSeoTags($SeoParams);
  }
         

  ?>
      
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/vendors/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/style.css" >
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/enquery.css" > 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
</head>

<body>

    <section class="container-fluid mt-1">
       <?php include_once "banner.php";   
      
       ?>
       
    </section>
    
            
<section class="p-2">
<nav style="--bs-breadcrumb-divider: '>'" aria-label="breadcrumb" *ngIf="products">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/">TradersFind</a></li> 
    <?php if(isset($subcategory)):?>
    <li class="breadcrumb-item" ><a
        href="/<?php echo $urlService->getIndustryUrl($industry[0]->industryName,$industry[0]->id) ?>"><?php echo $industry[0]->industryName ?></a>
    </li>
    <li class="breadcrumb-item"><a
        href="/<?php echo $urlService->getGroupCategoryUrl($category[0]->categoryName,$category[0]->id) ?>"><?php echo $category[0]->categoryName ?></a>

    </li>
    <?php endif;?>
    <li class="breadcrumb-item active fwbold text-capitalize " aria-current="page" >
    <?php echo basename($parts[2]);//will chnage
  
    ?>
    </li>
  </ol>
</nav>
<div style="text-align: center;">

  <h1 class="me-2 fwbold  text-capitalize mb-0"><?php echo basename($parts[2]);?>  <!--will chnage -->
  <?php if ($location == null) {
    echo '<span> in UAE</span>';
  } else {
    echo '<span> in ' . str_replace("-"," " ,$location);
  } ?>
  </h1>
  <small class="fwbold">(<?php print_r($length)?> products available) </small>
</div>
<?php 

if (isset($subcategory->shortDescription) && $subcategory->shortDescription && $location === '') {
  echo '<div>';
  $shortDescription = $subcategory->shortDescription;
  $shortenedDescription = substr($shortDescription, 0, 400);
  echo '<span id="short-desc">' . $shortenedDescription . '</span>';
  if (strlen($shortDescription) > 400) {
      echo '<span style="color:brown;">&nbsp;<b><a href="javascript:void(0);" onclick="toggleDescription()"> View more</a></b></span>';
  } //else {
  //echo '<span id="full-desc" style="display:inline;">' . $shortDescription . '</span>';
  //}
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
              <ul class="d-flex align-items-center flex-wrap rightnav" >
                <?php 
                //print_r($location);
                if (($location == null || $location == 'UAE' )&& isset($category[0])) { 
                  
                  echo '<li ><a class="active" href="'.BASE_URL.$urlService->getSubcategoryAllLocUrl($category[0]->categoryName,$subcategory->subCategoryName,'all',$id) .'" >All UAE</a></li>';
                } else if(!isset($category[0])){
                  echo '<li><a href="'.BASE_URL.basename($parts[1]).'/'.basename($parts[2]).'" >All UAE</a></li>';
                  //will change
                }else{
                  echo '<li ><a href="'.BASE_URL.$urlService->getSubcategoryAllLocUrl($category[0]->categoryName,$subcategory->subCategoryName,'all',$id) .'" >All UAE</a></li>';
                 
                }
                
                  foreach(($data->states) as $state){
                    if(!isset($category[0])){
                    echo'<li >';
                    echo '<a href="' . BASE_URL . 'search/' . $keyword . '/' .str_replace(' ','-', $state) . '">' . $state . '</a>';
                    echo' </li>';
                    }else{
                      $location1 = str_replace("-"," ",$location);
                      echo'<li >';
                      echo '<a class="' . (strtolower($state) !== $location1 ? 'active' : '') . 'active" href="'.BASE_URL.$urlService->getSubCategoryLocUrl($category[0]->categoryName,$subcategory->subCategoryName,$state,$id) .'">'. $state .'</a>';
                      echo' </li>';
                    }
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
                    <div id="data-container" class="row gy-4">
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
       <div id="productList">
  
</div>
<div id="result"></div>
                 
          <div class="post-request-text ">
          <div class="text-center my-2" >
          <?php if (!($length < 10)): ?>
            
          <button  id="loadMoreBtn" onclick="lod()"class="btn-primary-gradiant rounded-2 btn-auto"> LOAD MORE RESULTS ... </button>
         
        </div>
        <?php endif; ?>
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
        // Sanitize the value
        $currentUrl = $_SERVER['REQUEST_URI'];
        $parts = explode('/', $currentUrl);
        $category = basename($parts[2]); // Extract the category part
        $searchtext = htmlspecialchars(str_replace('-',' ', $category)); // Sanitize the value
        ?>
        </div>
    </div>    
</div>

<script>
  let page=1;
  var searchtext = "<?php echo $searchtext; ?>";
  
  function lod(){
    let payload= {
    searchText: searchtext,
    searchTextType: 'subcategory',
    filterDto: {}
     
}
console.log(searchtext);
searchProductNew(payload, page).then(response => {
     
        console.log(response);
        var jsonString = JSON.stringify(response);
    
    
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "/test.php", true);
    xhr.setRequestHeader("Content-Type", "application/json");
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                document.getElementById("result").innerHTML =document.getElementById("result").innerHTML + xhr.responseText; 
            } else {
                console.error('Error:', xhr.status);
            }
        }
    };
    xhr.send(jsonString);
    })
    .catch(error => {
       
        console.error(error);
    });
    page++;
  }
</script>
<script src='<?php echo BASE_URL; ?>services/moreproductjs.js'></script>
    <script src="<?php echo BASE_URL; ?>assets/vendors/bootstrap/bootstrap.bundle.min.js"></script>
  <script src="<?php echo BASE_URL; ?>assets/js/lazy-load.js"></script> 
</body>
</html>
<script>
function toggleDescription() {
                var shortDesc = document.getElementById("short-desc");
                var fullDesc = document.getElementById("full-desc");
                var moreText = document.querySelector("#short-desc + span a");

                if (fullDesc.style.display === "none") {
                    shortDesc.style.display = "none";
                    fullDesc.style.display = "inline";
                    moreText.innerHTML = " View less";
                } else {
                    shortDesc.style.display = "inline";
                    fullDesc.style.display = "none";
                    moreText.innerHTML = " View more";
                }
            }
          </script>
<?php
include_once "footer.php"
?>
