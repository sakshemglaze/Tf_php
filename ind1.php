<?php 
//error_reporting(E_ALL);
//ini_set('display_errors', 1);

include_once 'config.php'; 
  include_once 'services/url.php';
  $urlService = new UrlService();
?>
<?php
    $currentUrl = $_SERVER['REQUEST_URI'];
?>
<?php       
           $page = isset($_GET['page']) ? $_GET['page'] : 0;
           $page = 0;
           $size = 6;
            require_once 'post.php';
        $data =  get('api/industries'.'?size=' . $size . '&page=' . $page . '&sort=industryName,asc',true );
             //$data1 = json_decode($data);
             $data1 = array_filter(json_decode($data), function($record) {
              if($record->status != 'false' && count($record->productsCategories)>0){
              //  print_r(count($record->productsCategories).'<br>');
              foreach ($record->productsCategories as $category) {
               
                if ($category->status != 'false') {
                  foreach ($category->productsSubcategories as $subcategory) {
                    if($subcategory->status!='false'){
                      return true; 
                    }
                  //print_r($category);
                  }
                }
            }
          }
                return false; });
          
             // $data = findActive($data1);
             // print_r($data1);

              ?>
<!DOCTYPE html>
<html lang="en">
<head>
  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    $SeoParams = [
          'title' => 'Browse Sellers from UAEs Largest Online B2B Portal',
          'metaTitle' => 'Browse Sellers from UAEs Largest Online B2B Portal',
          'metaDescription' => 'Browse Sellers products and services on the UAEs Largest Online B2B Portal. Connect with leading sellers for successful business deals on TradersFind',
          'metaKeywords' => 'Tradersfind industry, industries',
       ];
       include_once 'services/seo.php';
        $seo = new seoService();
                $seo->setSeoTags($SeoParams);
?>
</head>
<body>
<?php include_once "header-sub.php"; ?>
<script src="<?php echo BASE_URL; ?>assets/js/lazy-load.js"></script>

<section class="container-fluid ">
  <?php include_once "banner.php"; ?>
</section>
<section class="p-3">
  <nav style="--bs-breadcrumb-divider: '>'" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/">TradersFind </a></li>

      <li class="breadcrumb-item active" aria-current="page">
        Industry
      </li>
    </ol>
  </nav>
</section>

<section class="container-fluid ">
  <!-- third row -->
  
  <?php
  $i = 0;
foreach ($data1 as $category) {
 if(count($category->productsCategories)>0){
 // print_r($category->productsCategories);
   $i= $i + 1;
    echo '<div class="row  gy-4 bg-white">';
    echo '<div class="col-lg-12">';
    echo '<h1 class="text-center fwbold text-uppercase text-black"><a href="' . $urlService->getIndustryUrl($category->industryName, $category->id) .'">' . $category->industryName . '</a></h1>';
    echo '</div>';
    echo '<div class="col-lg-3 text-center">';
    if (!empty($category->image)) { 
        $indImage = IMAGE_URL . $category->image->id . ".webp";
        echo '<a href="' . $urlService->getIndustryUrl($category->industryName, $category->id) . '"> <img data-src="' . $indImage . '" class="img-fluid lazy" alt="Industry" width="70%" /></a>';
    }
    echo '</div>';
    //if ($size == $i) {
    //echo '<div class="col-lg-9 industry">';
    //} else {
      echo '<div class="col-lg-9">';
    //}
    echo '<div class="row gy-4">';
  $filteredCategories = array_filter($category->productsCategories, function($record) {
    if ($record->status == 'true') {
        foreach ($record->productsSubcategories as $subcategory) {
            if ($subcategory->status != 'false') {
                return true; // If any subcategory has status true, include the category
            }
        }
    }
    return false; // If category status is not true or no subcategory has status true, exclude the category
});

    foreach (array_slice($filteredCategories, 0, 6) as $cat) {
     // print_r($cat->productsSubcategories);
        echo '<div class="col-lg-4">';
        echo '<div class="d-flex align-items-center gap-2">';
        if(isset($cat->image->id)){
          $catImage = IMAGE_URL . $cat->image->id . ".webp";
        }else{
          $catImage="https://www.tradersfind.com/assets/images/TradersFind.webp";
        }
       
        echo '<a href="' . $urlService->getGroupCategoryUrl($cat->categoryName, $cat->id) . '"> <img data-src="' . $catImage . '" class="lazy" alt="Category" width="140px" /> </a>';
        echo '<div class="inddetails">';
        echo '<h2 class="fs-6 fwbold"><a href="' . $urlService->getGroupCategoryUrl($cat->categoryName, $cat->id) . '" title="' . $cat->categoryName . '">' . $cat->categoryName . '</a></h2>';
        echo '<ul class="mt-4 text-black">';
       // print_r($cat);
        $filteredSubCategories = array_filter($cat->productsSubcategories, function($record) {
          return $record->status == 'true'; });
       
        foreach (array_slice($filteredSubCategories, 0, 3) as $subcat) {
         // print_r($filteredCategories);
            echo '<li><a href="' . $urlService->getCategoryUrl($subcat->subCategoryName, $subcat->id) . '" title="' . $subcat->subCategoryName . '">' . $subcat->subCategoryName . '</a></li>';
        }
        echo '<li><a href="' . $urlService->getGroupCategoryUrl($cat->categoryName, $cat->id) . '"> + View All</a></li>';
        echo '</ul>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
  
    echo '</div>';
    echo '</div>';
    echo '</div>';

    echo '<div class="col-lg-12">';
      echo '<div class="row bg-grey">';
        echo '<div class="col-lg-12 position-relative sub_category_list2 ">';
         echo '<ul class="sub_category_list">';
         
          shuffle($filteredCategories);
          if (count($filteredCategories) > 6) {
          foreach (array_slice($filteredCategories, 0, 4) as $cat) {
            echo '<li>';
              echo '<a href="' . $urlService->getGroupCategoryUrl($cat->categoryName, $cat->id) . '" class="align-items-center flex-row d-flex gap-3 flex-wrap flex-md-nowrap  justify-content-md-start">';
                echo '<div class="pro_image">';
                if(isset($cat->image->id)){
                  $picId= IMAGE_URL . $cat->image->id . ".webp";
                }else{
                  $picId="https://www.tradersfind.com/assets/images/TradersFind.webp";
                }
                  echo'<img data-src="' . $picId . '" class="lazy"' . 'alt="Category" width="140px"/>';
                echo'</div>';
                echo'<h2 class="fs-6 fw-bold">' . $cat->categoryName .'</h2>';
              echo'</a>';
            echo '</li>';
          }}
          echo '</ul>';
          echo '<a href="' . $urlService->getIndustryUrl($category->industryName, $category->id) .'" class="btn-primary-gradiant subcatbtn">View More</a>';
      echo '</div>';
     echo '</div>';
    echo '</div>';

    echo '</div>';
    echo '<br />';
    echo '<br />';
        }
}
?>
<div class="row  gy-4 bg-white" id="industriesContainer"> </div>
</section>
<input type="hidden" id="currentPage" value="<?php echo $page; ?>">

<section class="container-fluid mt-4">
  <div class="row gy-4">
    <div class="col-12 industry">
      <hr />
    </div>
  </div>
</section>
<div id="popup" class="popup">
    <div class="popup-content">
        <div class="loader"></div>
    </div>
</div>

<?php 
include_once "inquiry.php" ?>
        </body></html>
<?php
include_once "footer.php";
?>

<script>
    var data1 = [];
  // Function to load more industries
  function loadMoreIndustries() {
    var currentPage = parseInt(document.getElementById('currentPage').value);
    var nextPage = currentPage + 1;

    // Make an AJAX request to load more industries
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'https://api.tradersfind.com/api/industries' + '?size=' + <?php echo $size; ?> + '&page=' + nextPage + '&sort=industryName,asc', true);
    xhr.onreadystatechange = function() {
      if (xhr.readyState == 4 && xhr.status == 200) {
        //console.log(xhr.responseText);
        var newIndustries = JSON.parse(xhr.responseText);
        if (newIndustries.length === 0 ) { 
        /*var industryDiv = document.createElement('div');
        industryDiv.classList.add('row', 'gy-4', 'bg-white');
        var industryTitleDiv = document.createElement('div');
          industryTitleDiv.classList.add('col-lg-12');
          var industryTitle = document.createElement('h1');
          industryTitle.classList.add('text-black','fwbold','text-center', 'text-uppercase');
          var industryTitleLink = document.createElement('a');
          industryTitleLink.href = '';
          industryTitleLink.textContent = 'End of last record !!!';
          industryTitleLink.classList.add('text-center', 'fwbold', 'text-uppercase', 'text-black');
          industryTitle.appendChild(industryTitleLink);
          industryTitleDiv.appendChild(industryTitle);
          industryDiv.appendChild(industryTitleDiv);
          document.getElementById('industriesContainer').appendChild(industryDiv);
          */
          return; 
        }
        // Append new industries to the existing list
        // Assuming data1 is the array containing industries
        var filteredIndustries = newIndustries.filter(function(industry) {
    if (industry.status !== 'false') {
        for (var i = 0; i < industry.productsCategories.length; i++) {
            var category = industry.productsCategories[i];
            if (category.status !== 'false') {
                for (var j = 0; j < category.productsSubcategories.length; j++) {
                    var subcat = category.productsSubcategories[j];
                    if (subcat.status !== 'false') {
                      console.log("hello");
                        return true;
                    }
                }
            }
        }
    }
    return false;
});
        data1 = data1.concat(filteredIndustries);
       console.log(data1);
        document.getElementById('currentPage').value = nextPage;
        // Render the new industries on the page
        //console.log(filteredIndustries);
        renderIndustries(filteredIndustries);
      }
    };
    xhr.send();
    //hidePopup();
  }

  // Function to render industries on the page
  // Function to render industries on the page
  
  var IMAGE_URL = 'https://doc.tradersfind.com/images/';
function renderIndustries(industries) {
  industries.forEach(function(category) {
    var industryDiv = document.createElement('div');
    industryDiv.classList.add('row', 'gy-4', 'bg-white');

    var industryTitleDiv = document.createElement('div');
    industryTitleDiv.classList.add('col-lg-12');

    var industryTitle = document.createElement('h1');
    industryTitle.classList.add('text-black','fwbold','text-center', 'text-uppercase');
    var industryTitleLink = document.createElement('a');
    industryTitleLink.href = urlService.getIndustryUrl(category.industryName, category.id);
    industryTitleLink.textContent = category.industryName;
    industryTitleLink.classList.add('text-center', 'fwbold', 'text-uppercase', 'text-black');

    industryTitle.appendChild(industryTitleLink);
    industryTitleDiv.appendChild(industryTitle);
    industryDiv.appendChild(industryTitleDiv);

    var industryImageDiv = document.createElement('div');
    industryImageDiv.classList.add('col-lg-3', 'text-center');

    if (!!category.image) {
      var indImage = 'https://doc.tradersfind.com/images/' + category.image.id + '.webp';
      var industryImageLink = document.createElement('a');
      industryImageLink.href = urlService.getIndustryUrl(category.industryName, category.id);

      var industryImage = document.createElement('img');
      industryImage.setAttribute('src', indImage);
      industryImage.classList.add('img-fluid', 'img-size');
      industryImage.alt = 'Industry';
      //industryImage.width = '100%';

      industryImageLink.appendChild(industryImage);
      industryImageDiv.appendChild(industryImageLink);
    }

    industryDiv.appendChild(industryImageDiv);

    var industryDetailsDiv = document.createElement('div'); 
    industryDetailsDiv.classList.add('col-lg-9');
    var categoriesRowDiv = document.createElement('div');
    categoriesRowDiv.classList.add('row', 'gy-4');
    //console.log(category.productsCategories);
    var count = 0;
    var filteredCategories = category.productsCategories.filter(function(industry) {
    return industry.status === 'true'; });
    //console.log(filteredCategories);
    filteredCategories = shuffleArray(filteredCategories);
    filteredCategories.forEach(function(cat) {
    var storecat = cat.productsSubcategories;
    var hasTrueSubcat = storecat.some(function(subcat1) {
        if (subcat1.status !== 'false') {
            console.log("hyy from if");
            count++; // Increment the counter
            if (count <= 6){ return true
            }
            else{
              return false;
            }; 
        } else {
            console.log("hyy from else");
            return false;
        }
    });

    if (hasTrueSubcat) {
        var categoryDiv = document.createElement('div');
        categoryDiv.classList.add('col-lg-4');

        var categoryImageDiv = document.createElement('div');
        categoryImageDiv.classList.add('d-flex', 'align-items-center', 'gap-3');

        var catImage = IMAGE_URL + cat.image.id + '.webp';
        var categoryImageLink = document.createElement('a');
        categoryImageLink.href = urlService.getGroupCategoryUrl(cat.categoryName, cat.id);

        var categoryImage = document.createElement('img');
        categoryImage.setAttribute('src', catImage);
        categoryImage.classList.add('lazy', 'img-cat');
        categoryImage.alt = 'Category';

        categoryImageLink.appendChild(categoryImage);
        categoryImageDiv.appendChild(categoryImageLink);

        var categoryDetailsDiv = document.createElement('div');
        categoryDetailsDiv.classList.add('inddetails');

        var categoryTitle = document.createElement('h2');
        categoryTitle.classList.add('fs-6', 'fwbold');
        var categoryTitleLink = document.createElement('a');
        categoryTitleLink.href = urlService.getGroupCategoryUrl(cat.categoryName, cat.id);
        categoryTitleLink.title = cat.categoryName;
        categoryTitleLink.textContent = cat.categoryName;
        categoryTitle.appendChild(categoryTitleLink);

        var subcategoriesUl = document.createElement('ul');
        subcategoriesUl.classList.add('mt-4', 'text-black');
        var filteredSubcategories = cat.productsSubcategories.filter(function(subcat) {
            return subcat.status === 'true';
        });
        filteredSubcategories.slice(0, 3).forEach(function(subcat) {
            var subcategoryLi = document.createElement('li');
            var subcategoryLink = document.createElement('a');
            subcategoryLink.href = urlService.getCategoryUrl(subcat.subCategoryName, subcat.id);
            subcategoryLink.title = subcat.subCategoryName;
            subcategoryLink.textContent = subcat.subCategoryName;
            subcategoryLi.appendChild(subcategoryLink);
            subcategoriesUl.appendChild(subcategoryLi);
        });

        var viewAllLink = document.createElement('li');
        var viewAllLinkAnchor = document.createElement('a');
        viewAllLinkAnchor.href = urlService.getGroupCategoryUrl(cat.categoryName, cat.id);
        viewAllLinkAnchor.textContent = '+ View All';
        viewAllLink.appendChild(viewAllLinkAnchor);
        subcategoriesUl.appendChild(viewAllLink);

        categoryDetailsDiv.appendChild(categoryTitle);
        categoryDetailsDiv.appendChild(subcategoriesUl);
        categoryImageDiv.appendChild(categoryDetailsDiv);
        categoryDiv.appendChild(categoryImageDiv);

        categoriesRowDiv.appendChild(categoryDiv);
    }
});


    industryDetailsDiv.appendChild(categoriesRowDiv);
    industryDiv.appendChild(industryDetailsDiv);

    var industryListingDiv = document.createElement('div');
    industryListingDiv.classList.add('col-lg-12');

    var subCategoryListDiv = document.createElement('div');
    subCategoryListDiv.classList.add('row', 'bg-grey');

    var subCategoryListPositionDiv = document.createElement('div');
    subCategoryListPositionDiv.classList.add('col-lg-12', 'position-relative', 'sub_category_list2');

    var subCategoryListUl = document.createElement('ul');
    subCategoryListUl.classList.add('sub_category_list');

    category.productsCategories.slice(0, 4).forEach(function(cat) {
      var subCategoryListItem = document.createElement('li');
      var subCategoryListItemAnchor = document.createElement('a');
      subCategoryListItemAnchor.classList.add('align-items-center', 'flex-row', 'd-flex', 'gap-3', 'flex-wrap', 'flex-md-nowrap', 'justify-content-md-start');
      subCategoryListItemAnchor.href = urlService.getGroupCategoryUrl(cat.categoryName, cat.id);

      var proImageDiv = document.createElement('div');
      proImageDiv.classList.add('pro_image');

      var proImage = document.createElement('img');
      proImage.setAttribute('src', IMAGE_URL + cat.image.id + '.webp');
      proImage.classList.add('lazy');
      proImage.alt = 'Category';
      //proImage.width = '140px';

      var proImageAnchor = document.createElement('a');
      proImageAnchor.href = urlService.getGroupCategoryUrl(cat.categoryName, cat.id);
      proImageAnchor.textContent = cat.categoryName;
      proImageAnchor.classList.add('fs-6', 'fw-bold');

      proImageDiv.appendChild(proImage);
      subCategoryListItemAnchor.appendChild(proImageDiv);
      subCategoryListItemAnchor.appendChild(proImageAnchor);
      subCategoryListItem.appendChild(subCategoryListItemAnchor);
      subCategoryListUl.appendChild(subCategoryListItem);
    });

    var viewMoreLink = document.createElement('a');
    viewMoreLink.href = urlService.getIndustryUrl(category.industryName, category.id);
    viewMoreLink.classList.add('btn-primary-gradiant', 'subcatbtn');
    viewMoreLink.textContent = 'View More';

    subCategoryListPositionDiv.appendChild(subCategoryListUl);
    subCategoryListPositionDiv.appendChild(viewMoreLink);
    subCategoryListDiv.appendChild(subCategoryListPositionDiv);
    industryListingDiv.appendChild(subCategoryListDiv);
    industryDiv.appendChild(industryListingDiv);

    document.getElementById('industriesContainer').appendChild(industryDiv);
  });
}

  var urlService = {
  getIndustryUrl: function(industryName, industryId) {
    return 'industry/' + industryName.toLowerCase().replace(/[^\w\s]/gi, '').replace(/\s+/g, '-') ;
  },
  getGroupCategoryUrl: function(categoryName, categoryId) {
    return 'group-category/' + categoryName.toLowerCase().replace(/[^\w\s]/gi, '').replace(/\s+/g, '-') ;
  },
  getCategoryUrl: function(subCategoryName, subCategoryId) {
    return 'category/' + subCategoryName.toLowerCase().replace(/[^\w\s]/gi, '').replace(/\s+/g, '-')  ;
  }
};

// Callback function for the IntersectionObserver
function handleIntersection(entries, observer) {
  entries.forEach((entry) => {
    if (entry.isIntersecting) {
      // If the last industry element is intersecting with the viewport, load more industries
      loadMoreIndustries();
    }
  });
}

// Create a new IntersectionObserver
const observer = new IntersectionObserver(handleIntersection, {
  root: null,
  rootMargin: '0px',
  threshold: 0.1, // Trigger when 10% of the last industry element is visible
});

// Find the last industry element
const lastIndustryElement = document.querySelector('.industry:last-of-type');
//console.log(lastIndustryElement);
// If the last industry element exists, observe it
if (lastIndustryElement) {
  observer.observe(lastIndustryElement);
}
function shuffleArray(array) {
  return array.sort(() => Math.random() - 0.5);
}
</script>