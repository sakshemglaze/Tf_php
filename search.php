<?php 

include_once 'config.php';
       
     include_once 'services/url.php';
     $urlService = new UrlService(); 
     $name = str_replace("-", " ", $matches[1]);
    // $id = str_replace("-", " ", $matches[2]);
    
    $userAgent = $_SERVER['HTTP_USER_AGENT'];
    $isMobile = preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i', $userAgent);
    $textType=$matches[0];
    $location = 'UAE';
    $keyword = 'yes';
    $keywordDescription="";

    $indexr=0;
    $page=0;
    if ($isMobile) {
      $size = 5;
    } else {
      $size=10;
    }

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
      public $productSubCategoryFilter;
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
         
  
            $payload = array(
                'searchText' => strtolower($subcategory->subCategoryName) ,
                'searchTextType' => 'subcategory',
                'filterDto' => $filterDto
            );  
            if(!isset($subcategory->subCategoryName)){
              $new_url = str_replace('/category/', '/search/', $currentUrl);
    
              header('Location: ' . $new_url, true, 301);
              exit;
            }else{

           
            $queryParams= array('page'=> $page, 'size'=> $size) ;          
            $data1 =  postforprod(
              'api/new-search-products',
              $payload,
              true,
              $queryParams,
              false
            );
           
           $data=$data1['data'];
           $totallength=$data1['xTotalCount'];
          // print_r(gettype($data));
           //print_r($data);

        if($data['sponsoredProduct']!=null){
            $length=count(($data['products']))+1;
        }else{
              $length = count(($data['products']));
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
        // $SeoParams = [
        //   'title' => isset($subcategory->metaTitle) && $subcategory->metaTitle != '' ? str_replace('uae',$location1,strtolower($subcategory->metaTitle)) : $subcategory->subCategoryName . ' at best price in ' . $location1 . ' on Tradersfind.com',
        //   'metaTitle' => isset($subcategory->metaTitle) && $subcategory->metaTitle != '' ? str_replace('uae',$location1,strtolower($subcategory->metaTitle)) : $subcategory->subCategoryName . ' at best price in ' . $location1 . ' on Tradersfind.com',
        //   'metaDescription' => isset($subcategory->subCategoryDescription) && $subcategory->subCategoryDescription !='' ? str_replace('uae',$location1,strtolower($subcategory->subCategoryDescription)) : 'Searching for ' . $subcategory->subCategoryName . ' at best price in ' . $location1 . '? Choose from a wide range of companies provide' . $subcategory->subCategoryName . ' online on Tradersfind.com',
        //   'metaKeywords' => isset($subcategory->keywords) && $subcategory->keywords != '' ? str_replace('uae',$location1,strtolower($subcategory->keywords)) : $subcategory->subCategoryName . ', ' . $subcategory->subCategoryName . ' in '. $location1,
        //   'fbTitle' => isset($subcategory->fbTitle) && $subcategory->fbTitle !='' ? str_replace('uae',$location1,strtolower($subcategory->fbTitle)) : null,
        //   'fbDescription' => isset($subcategory->fbDescription) ? str_replace('uae',$location,strtolower($subcategory->fbDescription)) : null,
        //   'fbImage' => isset($subcategory->fbImage) ? $subcategory->fbImage : '',
        //   'fbUrl' => isset($subcategory->fbUrl) ? $subcategory->fbUrl : '',
        //   'twitterTitle' => isset($subcategory->twitterTitle) && $subcategory->twitterTitle !='' ? str_replace('uae',$location1,strtolower($subcategory->twitterTitle)) : null,
        //   'twitterDescription' => isset($subcategory->twitterDescription) ? $subcategory -> twitterDescription : null,
        //   'twitterImage' => isset($subcategory->twitterImage) ? $subcategory->twitterImage : null,
        //   'twitterSite' => isset($subcategory->twitterSite) ? $subcategory->twitterSite : '',
        //   'twitterCard' => isset($subcategory->twitterCard) ? $subcategory->twitterCard : null,
        //   'schemaDescription' => isset($subcategory->schemaDescription) ? $subcategory->schemaDescription : '',
        //   ];
        include_once 'catmetas.php';
        //print_r("first if");
      }
  }
  else if( $numParts==3 && basename($parts[1])=='search'){//will be change
            $subcatName=str_replace('-',' ',basename($parts[2]));
            $subcategory = json_decode(get ( 'api/guest/products-subcategorie/' . $subcatName));

  $filterDto->productSubCategoryFilter = isset($_POST['productSubCategoryFilter'])?$_POST['productSubCategoryFilter']:null;


            $payload = array(
              'searchText' => isset($subcategory) ? $subcategory->subCategoryName : $subcatName ,
              'searchTextType' => null,
              'filterDto' => $filterDto
          );  
        
          $queryParams= array('page'=> $page, 'size'=> $size) ;
        
          $data1 =  postforprod(
            'api/new-search-products',
            $payload,
            true,
            $queryParams,
            false
          );
          $data=$data1['data'];
          $totallength=$data1['xTotalCount'];
           // $length = count(($data->products));
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
        
          $data1 =  postforprod(
            'api/new-search-products',
            $payload,
            true,
            $queryParams,
            false
          );
          $data=$data1['data'];
          $totallength=$data1['xTotalCount'];
           // $length = count(($data->products));
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
          
            $data1 =  postforprod(
              'api/new-search-products',
              $payload,
              true,
              $queryParams,
              false
            );
            $data=$data1['data'];
            $totallength=$data1['xTotalCount'];
              //$length = count(($data->products));              
                //print_r($subcategory);
              $category = json_decode(get(
                'api/guest/products-categories-na/' . $subcategory->title, $queryParams
              ));
             // print($subcategory->subCategoryName);
              
              $industry = json_decode(get(
                'api/industries-na/' . $category[0]->title,$queryParams) );
                
include_once 'catmetas.php';
  //print_r("else");
          }
          if ($totallength == 0) {
                 header("Location: /not-found");
                 exit();
               }
       // print_r($location);
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
       
    
    
    <input type="hidden" id="productSubCategoryFilter" name="productSubCategoryFilter" value="">
   
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
    echo '<span> in ' . str_replace("-"," " ,$location).'</span>';
  } ?>
  </h1>
  <small class="fwbold">(<?php echo $totallength ; ?> products available) </small>
</div>
<div class="sortdescription-card" id="sortdescription-card" style="display:none"> 
  <p><?php if(isset($subcategory->locations)){
      foreach($subcategory->locations as $Sdlocation){
   
        if($Sdlocation->location==$location1 && isset($Sdlocation->shortDescription) && $Sdlocation->shortDescription !=''){
          $shortDescription=$Sdlocation->shortDescription;
        }elseif(isset($subcategory->shortDescription) && $location==''){
          $shortDescription = $subcategory->shortDescription; 
     
        }else{
          $shortDescription = "<p>
          Find the best {$subcategory->subCategoryName} in $location1 at competitive prices. Discover a wide range of
          {$subcategory->subCategoryName} from top companies, manufacturers, dealers, and distributors across $location1.
          Take advantage of exclusive bulk ordering discounts and connect with sellers directly to secure the best
          deals. Whether you're looking for any other {$subcategory->subCategoryName} 
          product in $location1, TradersFind makes it easy to find the perfect match for your business needs. 
      
          Contact us today, and we'll connect you with the leading {$subcategory->subCategoryName} provider in $location1. Simplify your
          sourcing and get the best prices on high-quality {$subcategory->subCategoryName} products in $location1. TradersFind offers 
          you a variety of {$subcategory->subCategoryName} options from verified companies that will fulfill your requirements at most 
          competitive prices.
      </p>";
        }
      }}elseif(isset($subcategory->shortDescription) && $location==''){
        $shortDescription = $subcategory->shortDescription; 
      
      }else{
     
        $shortDescription = "<p>
            Find the best {$subcategory->subCategoryName} in $location1 at competitive prices. Discover a wide range of
            {$subcategory->subCategoryName} from top companies, manufacturers, dealers, and distributors across $location1.
            Take advantage of exclusive bulk ordering discounts and connect with sellers directly to secure the best
            deals. Whether you're looking for any other {$subcategory->subCategoryName} 
            product in $location1, TradersFind makes it easy to find the perfect match for your business needs. 
        
            Contact us today, and we'll connect you with the leading {$subcategory->subCategoryName} provider in $location1. Simplify your
            sourcing and get the best prices on high-quality {$subcategory->subCategoryName} products in $location1. TradersFind offers 
            you a variety of {$subcategory->subCategoryName} options from verified companies that will fulfill your requirements at most 
            competitive prices.
        </p>";
        
      } 
  echo $shortDescription;
  ?></p>
  <button type="button" style='color:brown; border: none;' onclick="closePopsdesc()">view less</button>

</div>
<script>
  function readmoreSdesc(){
    document.getElementById("sortdescription-card").style.display='block'
    document.getElementById("viewmorebutten").style.display='none'
  }
  function closePopsdesc(){
    document.getElementById("sortdescription-card").style.display='none'
    document.getElementById("viewmorebutten").style.display='block'
  }
</script>
<span id='viewmorebutten'>
<?php 

if (isset($category )&&isset($subcategory->shortDescription) && $subcategory->shortDescription && $location === '') {
  echo '<div class="two-line-containers">';
  
  //$shortenedDescription = substr($shortDescription, 0, 400);
  if (strlen($shortDescription) >= 400) {
    echo '<a href="javascript:void(0);" onclick="toggleDescription()"><div id="short-desc" style="display: inline;">' . $shortDescription . '</div></a>';
    echo '<div id="full-desc" style="display: none;">' . $shortDescription . '<span style="color:brown;">&nbsp;<b><a href="javascript:void(0);" onclick="toggleDescription()"> View less</a></b></span></div>';

} else {
  echo '<div id="full-desc" style="display: inline;">' . $shortDescription . '</div>';
}
  echo '</div>';
  
  echo '<button style="color:brown; border: none;" onclick="readmoreSdesc()">
    view more
  </button>';
  
  
  }else if(isset($subcategory->locations)){
      foreach($subcategory->locations as $Sdlocation){
   
        if(strtolower(isset($Sdlocation->location)?$Sdlocation->location:'')==strtolower($location1) && isset($Sdlocation->shortDescription) && $Sdlocation->shortDescription!='' ){
          echo $Sdlocation->shortDescription;
          echo '<button style="color:brown; border: none;" onclick="readmoreSdesc()">
          view more
        </button>';
        }else if(isset($subcategory->subCategoryName)){
          echo "<p>
          Find the best $subcategory->subCategoryName in $location1 at competitive prices. Discover a wide range of
          $subcategory->subCategoryName from top companies, manufacturers, dealers, and distributors across $location1.
           Take advantage of exclusive bulk ordering discounts and connect with sellers directly to secure the best
           deals. Whether you're looking for any other  $subcategory->subCategoryName 
            product in $location1, TradersFind makes it easy to find the perfect match for...
          </p>";
          echo '<button style="color:brown; border: none;" onclick="readmoreSdesc()">
          view more
        </button>';
        }
      }
   
  }else{
    if(isset($subcategory->subCategoryName)){
      echo "<p>
      Find the best $subcategory->subCategoryName in $location1 at competitive prices. Discover a wide range of
      $subcategory->subCategoryName from top companies, manufacturers, dealers, and distributors across $location1.
       Take advantage of exclusive bulk ordering discounts and connect with sellers directly to secure the best
       deals. Whether you're looking for any other  $subcategory->subCategoryName 
        product in $location1, TradersFind makes it easy to find the perfect match for...
      </p>";
      echo '<button style="color:brown; border: none;" onclick="readmoreSdesc()">
      view more
    </button>';
    }
  } ?>
 
</span>
<br>

<?php $subcategorys=$data['subCategories'];
 
?>
</section>
<div class="row gy-2">
    <div class="col-lg-3 col-xxl-2">
    <div class="card card-shadow myUL border-0">
  <?php if(count($subcategorys) > 1) { ?>
  <div class="card-body">
    <div class="row">
      <div class="col">
        <button class="btn btn-success btn-sm" onclick="applyFilter()">Apply Filter</button>
      </div>
      <div class="col">
        <button class="btn btn-danger btn-sm" onclick="clearFilter()">Clear Filter</button>
      </div>
    </div>
    <label for="subCategories"><u>Categories</u></label>  
    <div class="left_slide_card_body">
    <?php foreach($subcategorys as $subcate) { ?>
      <div class="form-check">
       
        <input class="form-check-input" onclick="filterSubcat('<?php echo $subcate;?>')" type="checkbox" value="<?php echo $subcate; ?>"/>
        <label class="form-check-label"><?php echo $subcate; ?></label>
  
      </div>
      <?php } ?>
    </div>
  </div>
  <?php } ?>
</div>

<script>
  var selectedSubcategories = [];

  function filterSubcat(subcategory) {
    var index = selectedSubcategories.indexOf(subcategory);
    if (index === -1) {
      selectedSubcategories.push(subcategory);
    } else {
      selectedSubcategories.splice(index, 1);
    }
  }

  function applyFilter() {

    console.log(selectedSubcategories);
    window.location.href =  window.location.href;
    document.getElementById('productSubCategoryFilter').value = selectedSubcategories;
    
  }

  function clearFilter() {
    selectedSubcategories = [];
    // Uncheck all checkboxes
    var checkboxes = document.querySelectorAll('.form-check-input');
    checkboxes.forEach(function(checkbox) {
      checkbox.checked = false;
    });
  }
</script>


    
       <?php
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
                
                  foreach(($data['states']) as $state){
                    if(!isset($category[0])){
                    echo'<li >';
                    echo '<a href="' . BASE_URL . 'search/' . $keyword . '/' .str_replace(' ','-', $state) . '">' . $state . '</a>';
                    echo' </li>';
                    }else{
                      $location1 = str_replace("-"," ",$location);
                      if($state!='Other'){
                      echo'<li >';
                      echo '<a class="' . (strtolower($state) !== $location1 ? 'active' : '') . 'active" href="'.BASE_URL.$urlService->getSubCategoryLocUrl($category[0]->categoryName,$subcatName,$state,1) .'">'. $state .'</a>';
                      echo' </li>';
                      }
                    }
                  };
                  ?>
               
              </ul>
            </div>
          </div>
        </div>
      </div>
    
      <script>
       function closePopup() {
    document.getElementById("popup-card-otp").style.display = "none";
  }
  function submitRequirement(formdata){
  var productname=document.getElementById("productName").value;
  
  var quantity=document.getElementById("quantity").value;
  var Unit=document.getElementById("quantityUnit").value;
  var requirement=document.getElementById("requirement").value;
 
  var countryCode=document.getElementById("countryCode").value;
  var contactNumber=document.getElementById("contactNumber").value;
  
//console.log(productname);
        // let payload = {
        //   enquirerName: 'Atulyadav',
        //   enquirerContactNumber: countryCode+contactNumber,
        //   enquirerEmail:'atul@sakshemit.com',
        //   enquiryMessage: requirement,
        //   productName:productname,
        //   quantity: quantity,
        //   unit: Unit,
        //   buyer: { id: '651266a6be013b38a26b35bf' },
        //   status: 'New',
        //   frequencytype: lol
        // }
        document.getElementById("postBuyreq").reset();

       // formdata.frequencytype=lol;
       var url="<?php echo API_URL?>api/enquiries";
       console.log(url);
       const myObject1 = new StorageService();
      var token=myObject1.getItem('userAccessToken');
fetch(url, {
    method: "POST",
    headers: {
        "Content-Type": "application/json",
        Authorization: 'Bearer ' + token,
    },
    body: JSON.stringify(formdata),
})
    .then(function (response) {
        return response.json();
    })
    .then(function (data) {
        console.log(data);
        if(confirm('Your Request is submitted successfully!! Please click OK.')) {
        window.location.href =  window.location.href;
    }
    })
    .catch(function (error) {
        console.log(error);
        if(confirm('Your Request is not submitted !!! Due To some issue Please click OK.')) {
          window.location.href =  window.location.href;
        }
    });
  //console.log(payload);
  }
</script>

                           <?php
                            
                           if($data['sponsoredProduct']!=null){
                          $premiumprod=$data['sponsoredProduct'];
                          $reletedselId=$premiumprod["id"] ;
                           
                          $getreltedprod1 = get('api/guest/products/by-seller-related/' . $reletedselId, true);
                          $reletedSubCategorys = [];
                          $arrayOfRelsubcats = [];
                          $arrayRprod1 = json_decode($getreltedprod1);
                          
                          foreach ($arrayRprod1 as $index => $relProd) {
                              //print_r(gettype($relProd));
                              if (is_array($relProd) && count($relProd) != 0) {
                                  foreach ($relProd as $Sprod) {
                                      $arrayOfRelsubcats[] = $Sprod->productSubcategoryName;
                                   
                                  }
                              }
                          }
                          
                          
                          $reletedSubCategoryS = array_unique($arrayOfRelsubcats);
                          $modalId1 = 'popuppluscardModal1' . $indexr;

                          //print_r($premiumprod);
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
                        
                        if (is_array($onep) && isset($onep['productName'])) {
                         
                           $prodData=$onep;
                           
                           $reletedselId=$prodData["id"] ;
                           
                           $getreltedprod = get('api/guest/products/by-seller-related/' . $reletedselId, true);
                           $reletedSubCategory = [];
                           $arrayOfRelsubcat = [];
                           $arrayRprod = json_decode($getreltedprod);
                           
                           foreach ($arrayRprod as $index => $relProd) {
                               //print_r(gettype($relProd));
                               if (is_array($relProd) && count($relProd) != 0) {
                                   foreach ($relProd as $Sprod) {
                                       $arrayOfRelsubcat[] = $Sprod->productSubcategoryName;
                                    
                                   }
                               }
                           }
                           
                           
                           $reletedSubCategory = array_unique($arrayOfRelsubcat);
                           $modalId = 'popuppluscardModal' . $indexr;
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
       <div id="productList"> </div>
<div id="result" ></div>
<script>
              var lol='';
    var frequencytype=document.getElementsByName('frequencytype');
  frequencytype.forEach(function(radioButton) {
        radioButton.addEventListener('change', function() {
            var selectedValue = this.value;
            lol=selectedValue;
            console.log(selectedValue); // Log the selected value
        });
    });

   function otpLogin(otpAuthData, mobileNumber,formdata) {
    console.log(mobileNumber);
      const myObject = new StorageService();
      $.ajax({
        url: "https://api.tradersfind.com/api/authenticate-otp",
  method: "POST",
  dataType: "json",
  contentType: "application/json",
  data: JSON.stringify(otpAuthData),
  success: function (data) {
                       console.log(data);
                       myObject.setItem('userAccessToken', data['id_token']);
                       myObject.setItem('isLoggedIn', '1');
                       myObject.setItem('loggedVia', 'mobile');
                       myObject.setItem('userData', mobileNumber);
                       myObject.setItem('userMobile', mobileNumber);
                       myObject.setItem('login', mobileNumber);
                       myObject.setItem('userFname', "User");
                       submitRequirement(formdata);
    
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
      //this.verifyRequestProcessing = false;
    
      //var that = this;
      // setTimeout(function () { that.authService.authenticateUser(); }, 3000);
      // this.messageService.add({
      //   severity: "success",
      //   summary:
      //     'Otp verified successfully.',
      // });
      // this.dialogRef.close();
      // this.modalService.dismissAll();
      // this._router.navigate(['/']);
    }
    function otpRegister(otpAuthData, mobileNumber,formdata){
     
      const myObject1 = new StorageService();
      $.ajax({
        url: "https://api.tradersfind.com/api/register-otp",
  method: "POST",
  dataType: "json",
  contentType: "application/json",
  data: JSON.stringify(otpAuthData),
  success: function (data) {
                       console.log(data);
                       myObject1.setItem('userAccessToken', data['id_token']);
                       myObject1.setItem('isLoggedIn', '1');
                       myObject1.setItem('loggedVia', 'mobile');
                       myObject1.setItem('userData', mobileNumber);
                       myObject1.setItem('userMobile', mobileNumber);
                       myObject1.setItem('login', mobileNumber);
                       myObject1.setItem('userFname', "User");
                       submitRequirement(formdata);
    
                    },
                    error: function (xhr, status, error) {
                      console.log("test reg")
                        console.error(xhr.responseText);
                    }
                });
  }
    
    

    function verifyOtp(event,mobnumber,formdata){
           // var otm=document.getElementById('otp').value;
           // console.log(mobnumber);
           var newmobnum='+'+mobnumber;
           let otpAuthData = {
              phone: newmobnum,
              otpValue: event,
              login: newmobnum,
              isMobileLogin: true,
              langKey: "en"
    };
           var otpres='';
            $.ajax({
                    url: "https://api.tradersfind.com/api/guest/users/"+'+'+mobnumber,
                    dataType: "json",
                    data: { },
                    success: function (data) {
                       
                        if (data != "NotFound") {
          //console.log(otpAuthData,mobileNumber)
          otpLogin(otpAuthData, newmobnum,formdata);
          console.log("1");
        }
        else {
          otpRegister(otpAuthData, newmobnum,formdata);
          console.log("2");
        }
                    },
                    error: function (xhr, status, error) {
                        if(xhr.responseText!='NotFound'){
                          otpLogin(otpAuthData, newmobnum,formdata);
                        }else{
                          console.log("tttttttttt");
                          otpRegister(otpAuthData, newmobnum,formdata);
                        }
                    }
                });
            closePopup();

        }

       function startfomsubmition(){

        }
          </script>
          <?php

function sendOtp1($contenctNo,$formdata){
 

  $payload=array('phone'=> $contenctNo, 'loginmethod'=>'WHATSAPP');
  $data123=post(
  'api/otps',
  $payload,
  false,
  //isWhatsapp ? { type: 'whatsapp' } : {type: 'email'},
  array("type"=> 'WHATSAPP'),
  false);
  //print_r($data123->title);
  if(isset($data123->title)&& $data123->title=='ContactNo not Valid.'){
   
    echo "<script>
    if(confirm('Please click on OK and send a message (Register Me) on our whatsapp number (+971569773623) to register.')) {
        window.open('https://api.whatsapp.com/send?phone=971569773623&text=Register%20Me', '_blank');
    }
  </script>";
  }else{
  include_once 'otp.php';
 // echo $contenctNo;
  echo '<script>document.getElementById("popup-card-otp").style.display = "block";</script>';
  }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    if(isset($_POST['productName'])){
    $productName = $_POST['productName'];
    $quantity = $_POST['quantity'];
    $quantityUnit = $_POST['quantityUnit'];
    $requirement = $_POST['requirement'];
    $frequencytype = $_POST['frequencytype'];
    $countryCode = $_POST['countryCode'];
    $contactNumber = $_POST['contactNumber'];
    
    $formdata = array(
      'enquirerContactNumber' => $countryCode . $contactNumber,
      'enquiryMessage' => $requirement,
      'productName' => $productName,
      'quantity' => $quantity,
      'unit' => $quantityUnit,
      'status' => 'New',
      'frequencytype' => $frequencytype,
      'enquirerName'=>''
    );

  
 $contenctNo=$countryCode.$contactNumber;
 include_once 'post.php';
 
 $respons=sendOtp1($contenctNo,$formdata);

  }

} else {
 
    
}

?>
          <div class="post-request-text ">
<?php if($totallength>10){
  ?>
          <div class="text-center my-2" >     
          <button  id="loadMoreBtn"  onclick="lod()"class="btn-primary-gradiant rounded-2 btn-auto" style="display: inline-block;"> LOAD MORE RESULTS ... </button>
        
          <?php } ?>
        </div>
       

          <section class="easysource my-4 py-2" >
            <?php
             include_once "post-request.php";
           
              ?>
               </section>
         
          <div class="row">
          <p class="search-product-text">

        <div class="cat-desc" id="cat-desc" style="display:none;">
        <?php
        if($location=="" && isset($subcategory->categoryDescriptionPage)){
                      echo ( $subcategory->categoryDescriptionPage);
        }else if($location=="dubai" && isset($subcategory->keywordDubaiDescription)){
                      echo ( $subcategory->keywordDubaiDescription);
        }else if($location=="abu-dhabi" && isset($subcategory->keywordAbuDhabiDescription)){
                      echo ( $subcategory->keywordAbuDhabiDescription);
        }else if($location=="ajman" && isset($subcategory->keywordAjmanDescription)){
                      echo ( $subcategory->keywordAjmanDescription);
        }else if($location=="fujairah" && isset($subcategory->keywordFujairahDescription)){
                      echo ( $subcategory->keywordFujairahDescription);
        }else if($location=="ras-al-khaimah" && isset($subcategory->keywordRasAlKhaimahDescription)){
                      echo ( $subcategory->keywordRasAlKhaimahDescription);
        }else if($location=="umm-al-quwain" && isset($subcategory->keywordUmmAlQuwainDescription)){
                      echo ( $subcategory->keywordUmmAlQuwainDescription);
        }else if($location=="sharjah" && isset($subcategory->keywordSarjahDescription)){              
                      echo ( $subcategory->keywordSarjahDescription);
                    }?>
                         </div>
        </p>
        <?php
       
   
        $currentUrl = $_SERVER['REQUEST_URI'];
        $parts = explode('/', $currentUrl);
        $category = basename($parts[2]); 
        $searchtext = htmlspecialchars(str_replace('-',' ', $category));
        ?>
        </div>
    </div>    
</div>
 </section>
<script>
  let page=1;
  let size=1;
  var searchtext = "<?php echo isset($subcategory->subCategoryName)?$subcategory->subCategoryName:$subcatName; ?>";

let filterdto1 = <?php echo json_encode($filterDto); ?>;

  var currentURL = window.location.href;


var urlParts = currentURL.split('/');
var category=category = urlParts[3];

console.log(searchtext.replace('-',' '));
console.log(filterdto1);
function lod(){
 let payload= {};

if(category=='category'){
  
 
    payload= {
    searchText: searchtext.replace('-',' '),
    searchTextType: 'subcategory',
    filterDto: filterdto1
     
}

}else{
  payload={
    searchText: searchtext.replace('-',' '),
    searchTextType: null,
    filterDto: filterdto1
  }

 
}
console.log(payload);
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
    size++;
    var tot="<?php echo $totallength;?>"
    if(tot<=size*10){
      document.getElementById("loadMoreBtn").style.display='none';
    }
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

     
const observer = new IntersectionObserver(handleIntersection, {
  root: null,
  rootMargin: '0px',
  threshold: 0.1 
});


const bottomElement = document.getElementById('productList'); 


observer.observe(bottomElement);


function handleIntersection(entries, observer) {
  entries.forEach((entry) => {
    if (entry.isIntersecting) {
      
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
</section>