<?php 
//error_reporting(E_ALL);
//ini_set('display_errors', 1);

include_once 'config.php';
       
     include_once 'services/url.php';
     $urlService = new UrlService(); 
     $name = str_replace("-", " ", $matches[1]);
    // $id = str_replace("-", " ", $matches[2]);
   
  
    $location = 'UAE';
    $keyword = 'yes';
    
    $indexr=0;
    $page=0;
    $size=10;

    $currentUrl = $_SERVER['REQUEST_URI'];
    $parts = explode('/', $currentUrl);
    $numParts = count($parts);
   //print_r($numParts);
    if($numParts>=4){
    $category1 = basename($parts[2]); // Extract the category part
    }else{
      $category1='';
    }
    $searchtext = htmlspecialchars(str_replace('-',' ', $category1));
    class FilterDTO {
      public $stateFilter;
  }
  $filterDto = new FilterDTO();
  if( $numParts==4){//will change
    $location= basename($parts[3]);//will change
  //  $subCategoryId=basename($parts[3]);//will change
    $filterDto->stateFilter=[ucwords(str_replace('-'," ",$location))];
    $name = str_replace("-", " ", $matches[1]);//neverchange
    //$id = str_replace("-", " ", $matches[3]);//will change
  }else if($numParts==3 && $parts[1]=='search'){//will change
    $keyword=basename($parts[2]);//will change
  
  }else if(basename($parts[1])=='search' && $numParts==4 ){//will change
 
    $location= basename($parts[3]);//will change
    
    $filterDto->stateFilter=[ucwords(str_replace('-'," ",$location))];
  }
else{
  $location='';

}
  //print_r($location);
  $location1 = str_replace('-',' ',$location);
  require_once 'post.php';
    if($location=="" && $numParts==3){
        $location1 = 'UAE';
          $subcatName=basename($parts[2]);
          $subcategory = json_decode(get ( 'api/guest/products-subcategorie/' . $subcatName));

    //print_r($subcategory->subCategoryName);
            $payload = array(
                'searchText' => $subcategory->subCategoryName ,
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
    //print_r($data);

    $category = json_decode(get(
      'api/guest/products-categories-na/' . $subcategory->title, $queryParams
    ));
    if(isset($category[0]->title)){
      $industry = json_decode(get(
        'api/industries-na/' . $category[0]->title,$queryParams) );
      }

        //print_r(isset($subcategory) && $subcategory->metaDescription !='' ? str_replace('UAE',$location1,$subcategory->metaDescription) : 'Searching for ' . $subcategory->subCategoryName . ' at best price in ' . $location1 . '? Choose from a wide range of companies provide' . $subcategory->subCategoryName . ' online on Tradersfind.com');
        $SeoParams = [
          'title' => isset($subcategory->metaTitle) && $subcategory->metaTitle != '' ? str_replace('UAE',$location1,$subcategory->metaTitle) : $subcategory->subCategoryName . ' at best price in ' . $location1 . ' on Tradersfind.com',
          'metaTitle' => isset($subcategory->metaTitle) && $subcategory->metaTitle != '' ? str_replace('UAE',$location1,$subcategory->metaTitle) : $subcategory->subCategoryName . ' at best price in ' . $location1 . ' on Tradersfind.com',
          'metaDescription' => isset($subcategory->subCategoryDescription) && $subcategory->subCategoryDescription !='' ? str_replace('UAE',$location1,$subcategory->subCategoryDescription) : 'Searching for ' . $subcategory->subCategoryName . ' at best price in ' . $location1 . '? Choose from a wide range of companies provide' . $subcategory->subCategoryName . ' online on Tradersfind.com',
          'metaKeywords' => isset($subcategory->keywords) && $subcategory->keywords != '' ? $subcategory->keywords : $subcategory->subCategoryName . ', ' . $subcategory->subCategoryName . ' in '. $location1,
          'fbTitle' => isset($subcategory->fbTitle) && $subcategory->fbTitle !='' ? $subcategory->fbTitle : null,
          'fbDescription' => isset($subcategory->fbDescription) ? $subcategory->fbDescription : '',
          'fbImage' => isset($subcategory->fbImage) ? $subcategory->fbImage : '',
          'fbUrl' => isset($subcategory->fbUrl) ? $subcategory->fbUrl : '',
          'twitterTitle' => isset($subcategory->twitterTitle) && $subcategory->twitterTitle !='' ? $subcategory->twitterTitle : null,
          'twitterDescription' => isset($subcategory->twitterDescription) ? $subcategory -> twitterDescription : null,
          'twitterImage' => isset($subcategory->twitterImage) ? $subcategory->twitterImage : null,
          'twitterSite' => isset($subcategory->twitterSite) ? $subcategory->twitterSite : '',
          'twitterCard' => isset($subcategory->twitterCard) ? $subcategory->twitterCard : null,
          'schemaDescription' => isset($subcategory->schemaDescription) ? $subcategory->schemaDescription : '',
          ];
        //print_r("first if");
  }
  else if( $numParts==3 && basename($parts[1])=='search'){//will be change
            $subcatName=basename($parts[2]);
            $subcategory = json_decode(get ( 'api/guest/products-subcategorie/' . $subcatName));
            $payload = array(
              'searchText' => isset($subcategory) ? $subcategory->subCategoryName : $subcatName ,
              'searchTextType' => null,
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
          
            $length = count(($data->products));
           //print_r('Welcome search 3');
          }else if(basename($parts[1])=='search' && $numParts==4 ){//will change
            $subcatName=basename($parts[2]);
            $subcategory = json_decode(get ( 'api/guest/products-subcategorie/' . $subcatName));

            $payload = array(
              'searchText' => isset($subcategory) ? $subcategory->subCategoryName : $subcatName ,
              'searchTextType' => null,
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
          
            $length = count(($data->products));
            //print_r('Welcome search 1 4');
          }
         
          else{
            $subcatName=basename($parts[2]);
            $subcategory = json_decode(get ( 'api/guest/products-subcategorie/' . $subcatName));
            $payload = array(
                'searchText' => isset($subcategory) ? $subcategory->subCategoryName : $subcatName  ,
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

              
                //print_r($subcategory);
              $category = json_decode(get(
                'api/guest/products-categories-na/' . $subcategory->title, $queryParams
              ));
             // print($subcategory->subCategoryName);
              
              $industry = json_decode(get(
                'api/industries-na/' . $category[0]->title,$queryParams) );
              
//print_r($subcategory->metaTitle);
$SeoParams = [
          'title' => isset($subcategory->metaTitle) && $subcategory->metaTitle != '' ? str_replace('UAE',$location1,$subcategory->metaTitle) : $subcategory->subCategoryName . ' at best price in ' . $location1 . ' on Tradersfind.com',
          'metaTitle' => isset($subcategory->metaTitle) && $subcategory->metaTitle != '' ? str_replace('UAE',$location1,$subcategory->metaTitle) : $subcategory->subCategoryName . ' at best price in ' . $location1 . ' on Tradersfind.com',
          'metaDescription' => isset($subcategory->metaDescription) && $subcategory->metaDescription !='' ? str_replace('UAE',$location1,$subcategory->metaDescription) : 'Searching for ' . $subcategory->subCategoryName . ' at best price in ' . $location1 . '? Choose from a wide range of companies provide' . $subcategory->subCategoryName . ' online on Tradersfind.com',
          'metaKeywords' => isset($subcategory->keywords) && $subcategory->keywords != '' ? $subcategory->keywords : $subcategory->subCategoryName . ', ' . $subcategory->subCategoryName . ' in '. $location1,
          'fbTitle' => isset($subcategory->fbTitle) && $subcategory->fbTitle !='' ? $subcategory->fbTitle : null,
          'fbDescription' => isset($subcategory->fbDescription) ? $subcategory->fbDescription : '',
          'fbImage' => isset($subcategory->fbImage) ? $subcategory->fbImage : '',
          'fbUrl' => isset($subcategory->fbUrl) ? $subcategory->fbUrl : '',
          'twitterTitle' => isset($subcategory->twitterTitle) && $subcategory->twitterTitle !='' ? $subcategory->twitterTitle : null,
          'twitterDescription' => isset($subcategory->twitterDescription) ? $subcategory -> twitterDescription : null,
          'twitterImage' => isset($subcategory->twitterImage) ? $subcategory->twitterImage : null,
          'twitterSite' => isset($subcategory->twitterSite) ? $subcategory->twitterSite : '',
          'twitterCard' => isset($subcategory->twitterCard) ? $subcategory->twitterCard : null,
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

  <?php 
  include_once 'services/seo.php';
  $seo = new seoService();
  if(isset($SeoParams)){
    $seo->setSeoTags($SeoParams);
  }
?>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/style.css" >
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>-->
    <script src="<?php echo BASE_URL;?>assets/js/jquery-3.6.1.min.js"> </script>
    
</head>
<body>

    <section class="container-fluid mt-1">
       <?php 
       include_once "header-sub.php";
       include_once "banner.php";   
       ?>
       
    </section>
    
            
<section class="p-2">
<nav style="--bs-breadcrumb-divider: '>'" aria-label="breadcrumb" >
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/">TradersFind</a></li> 
    <?php if(isset($category ) ):?>
      <?php if( isset($industry)):?>
    <li class="breadcrumb-item" ><a
        href="/<?php echo $urlService->getIndustryUrl($industry[0]->industryName,$industry[0]->id) ?>"><?php echo $industry[0]->industryName ?></a>
    </li>
    <?php endif;?>
    <li class="breadcrumb-item"><a
        href="/<?php echo $urlService->getGroupCategoryUrl($category[0]->categoryName,$category[0]->id) ?>"><?php echo $category[0]->categoryName ?> </a>

    </li>
    <?php endif;
      if($location == null || $location == 'All UAE' || $location == 'UAE') :?>
    <li class="breadcrumb-item active fwbold text-capitalize " aria-current="page" >
    <?php if(isset($subcategory)) {echo str_replace("-"," ",$subcategory->subCategoryName); } else {echo str_replace("-"," ",$subcatName); } ?>
    </li>
    <?php else :?>
      <?php if(isset($subcategory )):?>
      <li class="breadcrumb-item text-capitalize"> <a href="/<?php echo $urlService->getCategoryUrl($subcatName)?>">
      <?php echo str_replace("-"," ",$subcategory->subCategoryName);//will change ?> </a></li>
      <?php endif;?>
      <?php if(!isset($category )):?>
      <li class="breadcrumb-item text-capitalize"> <a href="<?php echo BASE_URL.basename($parts[1]).'/'.basename($parts[2]) //will change
      ?>">
      <?php if(isset($subcategory)) {echo str_replace("-"," ",($subcategory->subCategoryName)); } else { echo str_replace("-"," ",$subcatName); } ?> </a></li>
      <?php endif;?>
      <li class="breadcrumb-item active fwbold text-capitalize " aria-current="page" >
        <?php echo str_replace("-"," ",$location); ?></li>
    <?php endif; ?>
  </ol>
</nav>
<div style="text-align: center;">
<?php if (isset($category )) { ?>
  <h1 class="me-2 fwbold text-capitalize mb-0"><?php echo str_replace("-", " ", ($subcategory->subCategoryName)); ?>
<?php } else { ?>
  <h1 class="me-2 fwbold text-capitalize mb-0"><?php echo str_replace("-", " ", basename($parts[2])); ?>
<?php } ?>

  <?php if ($location == null) {
    echo '<span> in UAE</span>';
  } else {
    echo '<span> in ' . str_replace("-"," " ,$location);
  } ?>
  </h1>
  <small class="fwbold">(<?php if ($length >= 10) { echo ($length . '+'); } else {echo ($length); } ?> products available) </small>
</div>
<?php 

if (isset($category )&&isset($subcategory->shortDescription) && $subcategory->shortDescription && $location === '') {
  echo '<div class="two-line-containers">';
  $shortDescription = $subcategory->shortDescription;
  //$shortenedDescription = substr($shortDescription, 0, 400);
  
  if (strlen($shortDescription) >= 400) {
      echo '<a href="javascript:void(0);" onclick="toggleDescription()"><div id="short-desc" style="display: inline;">' . $shortDescription . '</div></a>';
      echo '<div id="full-desc" style="display: none;">' . $shortDescription . '<span style="color:brown;">&nbsp;<b><a href="javascript:void(0);" onclick="toggleDescription()"> View less</a></b></span></div>';
  } else {
    echo '<div id="full-desc" style="display: inline;">' . $shortDescription . '</div>';
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
              <ul class="d-flex align-items-center flex-wrap rightnav" >
                <?php 
                //print_r($location);
                if (($location == null || $location == 'UAE' )&& isset($category[0])) { 
                  
                  echo '<li ><a class="active" href="'.BASE_URL.$urlService->getSubcategoryAllLocUrl($category[0]->categoryName,$subcatName,'all',1) .'" >All UAE</a></li>';
                } else if(!isset($category[0])){
                  echo '<li><a href="'.BASE_URL.basename($parts[1]).'/'.basename($parts[2]).'" >All UAE</a></li>';
                  //will change
                }else{
                  echo '<li ><a href="'.BASE_URL.$urlService->getSubcategoryAllLocUrl($category[0]->categoryName,$subcatName,'all',1) .'" >All UAE</a></li>';
                 
                }
                
                  foreach(($data->states) as $state){
                    if(!isset($category[0])){
                    echo'<li >';
                    echo '<a href="' . BASE_URL . 'search/' . $keyword . '/' .str_replace(' ','-', $state) . '">' . $state . '</a>';
                    echo' </li>';
                    }else{
                      $location1 = str_replace("-"," ",$location);
                      echo'<li >';
                      echo '<a class="' . (strtolower($state) !== $location1 ? 'active' : '') . 'active" href="'.BASE_URL.$urlService->getSubCategoryLocUrl($category[0]->categoryName,$subcatName,$state,1) .'">'. $state .'</a>';
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
         
            
          <button  id="loadMoreBtn" onclick="lod()"class="btn-primary-gradiant rounded-2 btn-auto"> LOAD MORE RESULTS ... </button>
         
        </div>
       
          <section class="easysource my-4 py-2" >
            <?php
             include_once "post-request.php";
              ?>
               </section>
          </div>
          <div class="row">
          <p class="search-product-text">
        <div class="cat-desc" id="cat-desc" style="display:none;">
        <?php
        if(isset($subcategory->categoryDescriptionPage)){
                      echo ( $subcategory->categoryDescriptionPage);
                         ?>
                         </div>
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
  var searchtext = "<?php echo $subcategory->subCategoryName; ?>";
  var currentURL = window.location.href;


var urlParts = currentURL.split('/');
var category = urlParts[urlParts.length - 2];

console.log(searchtext);
function lod(){
if(category=='category'){
  console.log(category);
 
    let payload= {
    searchText: searchtext,
    searchTextType: 'subcategory',
    filterDto: {}
     
}

}else{
  payload={
    searchText: searchtext,
    searchTextType: null,
    filterDto: {}
  }

 
}
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
  //alert(document.getElementById("full-desc"));
                var shortDesc = document.getElementById("short-desc");
                var fullDesc = document.getElementById("full-desc");
                var moreText = document.querySelector("#short-desc + span a");
                //alert(moreText);
                if (shortDesc.style.display === "none") {
                    shortDesc.style.display = "inline";
                    fullDesc.style.display = "none";
                    moreText.innerHTML = " View more";
                } else {
                    shortDesc.style.display = "none";
                    fullDesc.style.display = "inline";
                    moreText.innerHTML = " View less";
                }
            }

     // Create an IntersectionObserver
const observer = new IntersectionObserver(handleIntersection, {
  root: null,
  rootMargin: '0px',
  threshold: 0.1 // You can adjust this threshold as needed
});

// Find the element near the bottom of the page
const bottomElement = document.getElementById('loadMoreBtn'); // Change 'bottom-element' to the ID of your actual element

// Start observing the bottom element
observer.observe(bottomElement);

// Function to handle intersection
function handleIntersection(entries, observer) {
  entries.forEach((entry) => {
    if (entry.isIntersecting) {
      // If the bottom element is intersecting with the viewport, it means user has scrolled to the bottom
      // Add your code here to execute when user scrolls to the bottom
      document.getElementById("cat-desc").style.display="block";
      console.log("working...")
    }
  });
}

          </script>
    </div>      
<?php
include_once "footer.php"
?>
