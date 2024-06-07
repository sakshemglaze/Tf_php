<html>
    <head>

<?php include_once 'config.php'; ?>
<?php
    $SeoParams = [
          'title' => 'UAE B2B Marketing Blogs to Read in 2024',
          'metaTitle' => 'UAE B2B Marketing Blogs to Read in 2024',
          'metaDescription' => 'UAE B2B Marketing Blogs to Read in 2024. Best Business Blog on business topics including: management, marketing, education, technology, innovation and more.',
       ];
       include_once 'services/seo.php';
        $seo = new seoService();
                $seo->setSeoTags($SeoParams);
?>

</head>
<body>
<?php
include_once "header-sub.php";
?>
<section class="hidden-content container-fluid mt-4">
    <div class="row">
        <div class="col-lg-12">
           <?php
           include_once 'banner.php';
           ?>  
        </div>
    </div>
</section>

<section class="container">
    <div class="row">
        <div class="col-lg-8 mt-4 card-shadow rounded-2 bg-white p-2">
            <!--<h2 class="my-4 text-uppercase fw-bold">Latest Blog</h2>-->
            <?php
           include_once 'services/url.php';
           $urlService = new UrlService(); 

            $blogList = '';
            function getFilterBlog($payload, $queryParams) {
                if (isset($payload['productCategoryIds']) && count($payload['productCategoryIds']) > 0) {
                    $queryParams['categoryIds'] = implode(',', $payload['productCategoryIds']);
                }
                if (isset($payload['selectedLanguage']) && trim($payload['selectedLanguage']) != '') {
                    $queryParams['language'] = trim($payload['selectedLanguage']);
                }
                if (isset($payload['dateFilter']) && isset($payload['dateFilter']['startRange']) && $payload['dateFilter']['startRange'] != '') {
                    $queryParams['startDate'] = $payload['dateFilter']['startRange'];
                }
                if (isset($payload['dateFilter']) && isset($payload['dateFilter']['endRange']) && $payload['dateFilter']['endRange'] != '') {
                    $queryParams['endDate'] = $payload['dateFilter']['endRange'];
                }
                require_once "post.php";
                $res = get('api/guest/filter-blogs', true, $queryParams);
                return $res;
            }

            function onChangeFilter($attribute = null, $value = null) {
                $payload = [];
                $startDate = null;
                $endDate = null;
                $dateFilter = null;
                $isShowShimmer = true;
                $selectedMonth = '';
                $selectedYear = '';
                $selectedLanguage = '';
                $selectedCategories = array();

                if ($attribute == 'month') {
                    $selectedMonth = intval($value) > 0 ? intval($value) : null;
                } elseif ($attribute == 'year') {
                    $selectedYear = intval($value) > 0 ? intval($value) : null;
                } elseif ($attribute == 'language') {
                    $selectedLanguage = $value != 'None' ? $value : null;
                }

                if ($selectedMonth && $selectedYear) {
                    $startDate = new DateTime($electedYear . '-' . $selectedMonth . '-01');
                    $endDate = new DateTime($selectedYear . '-' . ($selectedMonth + 1) . '-01');
                    $endDate->modify('-1 day');
                    $dateFilter = [
                        "endRange" => $endDate->format('Y-m-d\TH:i:s.v\Z'),
                        "startRange" => $startDate->format('Y-m-d\TH:i:s.v\Z')
                    ];
                    $payload = [
                        "dateFilter" => $dateFilter
                    ];
                } elseif ($selectedYear) {
                    $startDate = new DateTime($selectedYear . '-01-01');
                    $endDate = new DateTime(($selectedYear + 1) . '-01-01');
                    $endDate->modify('-1 day');
                    $dateFilter = [
                        "endRange" => $endDate->format('Y-m-d\TH:i:s.v\Z'),
                        "startRange" => $startDate->format('Y-m-d\TH:i:s.v\Z')
                    ];
                    $payload = [
                        "dateFilter" => $dateFilter
                    ];
                }

                if ($selectedCategories && count($selectedCategories) > 0) {
                    $payload = [
                        "productCategoryIds" => $selectedCategories
                    ];
                }

                if ($selectedLanguage) {
                    $payload = [
                        "language" => $selectedLanguage
                    ];
                }

                $apiResponse = getFilterBlog($payload, ["page" => 0, "size" => 8, "createdDate" => 'desc']);
                $isShowShimmer = false;
                $blogList = json_decode($apiResponse);
                return $blogList;
            }
            
            $blogList = onChangeFilter();
            
            ?>
            <div class="row">
                
                <?php foreach ($blogList as $blog){
                     // $desc = custom_mb_strimwidth($blog->description, 0, 250, '...');
                     //print_r($blog->blogUrl);
                    ?>
                   
                    <div class="col-lg-6 mb-4 align-items-center front_blog">
                        <div class="hello">
                            <?php if ($blog->image == null || $blog->image == 'null' || $blog->image == ''): ?>
                                <a target="_blank" href="<?php echo BASE_URL.$urlService->getBlogUrl($blog->title); ?>">
                                    <img src="<?php echo BASE_URL; ?>assets/images/tflogo.webp" alt="<?= $blog->altText ? $blog->altText : 'blog image' ?>">
                                </a>
                            <?php else : ?>
                            <a target="_blank" href="<?php echo BASE_URL.$urlService->getBlogUrl($blog->title); ?>">
                                <?php if (isset($blog->image)) {
                                $blogimgurl = IMAGE_URL . $blog->image->id . '.webp'; }
                                ?>
                                <img class="img-fluid" width="100%" src="<?php echo $blogimgurl; ?>" alt="blogimg">
                            </a>
                            <?php endif; ?>
                            <div class="front_blog2">
                                <p><?php echo $blog->subTitle; ?></p>
                                <h1 style="font-size: x-large;"><a href="<?php echo BASE_URL.$urlService->getBlogUrl(isset($blog->blogUrl)?$blog->blogUrl:$blog->title); ?>"><?php echo $blog->title; ?></a></h1>
                                <!-- <p class='roohit'></p> -->
                                    <?php //echo $desc; ?>
                                <small class="mt-1 d-block"><?php echo $blog->createdBy; ?>, <?php echo date('d M y', strtotime($blog->createdDate)); ?></small>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div id="loadmoreblog">
              
            </div>
        </div>
         <div class="col-lg-4 mt-4">
            <?php
           
                $resultb= get('api/guest/blog-categories', true);
                $blogcat=json_decode($resultb);
             
            ?>
            <div class="card-shadow p-2 rounded-2 bg-white">
                <h5 class="border-bottom pb-2 fw-bold">Group Categories</h5>
                <ul class="category-filter flex-wrap mb-2"> 
                    <?php
                    foreach($blogcat as $bcat){
                    ?>
                    <li><a href='blog'><?php  echo $bcat->categoryName?></li></a>
                    <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
    
    </div>
  
</section>
<script src="services/storegeService.js"></script>


<script>

let urlService ="<?php new UrlService() ?>"
//let loadedData=[];

let page = 1;
let isLoading = false;
// Function to fetch blogs
function fetchBlogs() {
    // Check if already loading, return if true
    if (isLoading) {
        return;
    }

    isLoading = true;
    const myObject1 = new StorageService();

    let pagination = {
        "page": page,
        "size": 10,
        "createdDate": 'desc'
    };

    const queryString = new URLSearchParams(pagination).toString();
    var url = "<?php echo API_URL?>api/guest/filter-blogs" + '?' + queryString;
    var token = myObject1.getItem('userAccessToken');
    console.log(token);

    fetch(url, {
        method: "GET",
        headers: {
            "Content-Type": "application/json",
            Authorization: 'Bearer ' + token,
        }
    })
        .then(function (response) {
            console.log("working...", response.status);
            return response.json();
        })
        .then(function (data) {
            console.log(data);
            //console.log(page);
           // loadedData = loadedData.concat(data);
            createBlogElements(data)
            //console.log(loadedData);
            console.log(page);
           
            page++; // Increment page after successful fetch
        })
        .catch(function (error) {
            console.log(error);
        })
        .finally(() => {
        isLoading = false; // Reset loading flag
    });
        
}


// Function to create blog elements
function createBlogElements(loadedData) {
    const BASE_URL = "https://www.tradersfind.com/";
    const IMAGE_URL = "https://doc.tradersfind.com/images/";

    // Get the parent container
    const parentElement = document.getElementById("loadmoreblog");

    // Iterate over the loadedData array in pairs of two
    for (let i = 0; i < loadedData.length; i += 2) {
        // Create a row container for every two blogs
        const rowContainer = document.createElement("div");
        rowContainer.className = "row mb-4";

        // Create blog elements for the current pair
        for (let j = i; j < i + 2 && j < loadedData.length; j++) {
            const blogData = loadedData[j];

            // Create column container for the blog
            const colContainer = document.createElement("div");
            colContainer.className = "col-lg-6";

            // Create inner div for the blog
            const innerDiv = document.createElement("div");
            innerDiv.className = "hello";

            // Check if blog image exists and add default image if not
            if (!blogData.image || blogData.image.image === 'null' || blogData.image.image === '') {
                const imageLink = document.createElement("a");
                imageLink.setAttribute("target", "_blank");
                imageLink.setAttribute("href", BASE_URL + 'blog/' + blogData.title.trim().toLowerCase().replace(/[&,\s]+/g, '-'));

                const image = document.createElement("img");
                image.setAttribute("src", IMAGE_URL + "YP-logo@2x.png");
                image.setAttribute("alt", blogData.altText ? blogData.altText : 'blog image');

                imageLink.appendChild(image);
                innerDiv.appendChild(imageLink);
            }

            // Create link for blog
            const blogLink = document.createElement("a");
            blogLink.setAttribute("target", "_blank");
            blogLink.setAttribute("href", BASE_URL + 'blog/' + blogData.title.trim().toLowerCase().replace(/[&,\s]+/g, '-'));

            // Create blog image if it exists
            if (blogData.image && blogData.image.id) {
                const blogImg = document.createElement("img");
                blogImg.className = "img-fluid";
                blogImg.setAttribute("width", "100%");
                blogImg.setAttribute("src", IMAGE_URL + blogData.image.id + '.webp');
                blogImg.setAttribute("alt", "blogimg");

                blogLink.appendChild(blogImg);
                innerDiv.appendChild(blogLink);
            }

            // Create front_blog2 div
            const frontBlog2Div = document.createElement("div");
            frontBlog2Div.classList.add('front_blog2');

            // Create paragraph for subtitle
            const subtitleParagraph = document.createElement("p");
            subtitleParagraph.textContent = blogData.subTitle;
            frontBlog2Div.appendChild(subtitleParagraph);

            // Create heading for blog title
            const titleHeading = document.createElement("h1");
            titleHeading.setAttribute("style","font-size: x-large;");
            const titleLink = document.createElement("a");
            titleLink.setAttribute("href", BASE_URL + 'blog/' + blogData.title.trim().toLowerCase().replace(/[&,\s]+/g, '-'));
            titleLink.textContent = blogData.title;
            titleHeading.appendChild(titleLink);
            frontBlog2Div.appendChild(titleHeading);

            // Create small tag for author and date
            const smallTag = document.createElement("small");
            smallTag.className = "mt-1 d-block";
            smallTag.textContent = blogData.createdBy + ", " + new Date(blogData.createdDate).toLocaleDateString('en-US', { day: 'numeric', month: 'short', year: 'numeric' });
            frontBlog2Div.appendChild(smallTag);

            // Append front_blog2 div to inner div
            innerDiv.appendChild(frontBlog2Div);

            // Append inner div to column container
            colContainer.appendChild(innerDiv);

            // Append column container to row container
            rowContainer.appendChild(colContainer);
        }

        // Append row container to the parent element
        parentElement.appendChild(rowContainer);
    }
}

function handleIntersection(entries, observer) {
    entries.forEach(entry => {
        if (entry.isIntersecting && entry.intersectionRatio > 0) {
            fetchBlogs();
        }
    });
}

const observer = new IntersectionObserver(handleIntersection, {
    root: null,
    rootMargin: '0px',
    threshold: 0.1
});

const bottomElement = document.getElementById('loadmoreblog');

observer.observe(bottomElement);

</script>


</body> 
</html>

<?php
include_once "footer.php";
?>