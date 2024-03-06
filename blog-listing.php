<?php include_once 'config.php'; ?>
<link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/blog.css" />
<link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/vendors/bootstrap/bootstrap.min.css">
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

                $apiResponse = getFilterBlog($payload, ["page" => 0, "size" => 6, "createdDate" => 'desc']);
                $isShowShimmer = false;
                $blogList = json_decode($apiResponse);
                return $blogList;
            }

            $blogList = onChangeFilter();
            
            ?>
            <div class="row">
                
                <?php foreach ($blogList as $blog){
                     $desc=mb_strimwidth($blog->description, 0, 250, '...')
                    ?>
                   
                    <div class="col-lg-6 mb-4 align-items-center front_blog">
                        <div class="hello">
                            <?php if ($blog->image == null || $blog->image == 'null' || $blog->image == ''): ?>
                                <a target="_blank" href="<?php echo BASE_URL.$urlService->getBlogUrl($blog->title); ?>">
                                    <img src="<?php echo BASE_URL; ?>assets/images/YP-logo@2x.png" alt="<?= $blog->altText ? $blog->altText : 'blog image' ?>">
                                </a>
                            <?php endif; ?>
                            <a target="_blank" href="<?php echo BASE_URL.$urlService->getBlogUrl($blog->title); ?>">
                                <?php
                                $blogimgurl = IMAGE_URL . $blog->image->id . '.webp';
                                ?>
                                <img class="img-fluid" width="100%" src="<?php echo $blogimgurl; ?>" alt="blogimg">
                            </a>
                            <div class="front_blog2">
                                <p><?php echo $blog->subTitle; ?></p>
                                <h1 style="font-size: x-large;"><a href="<?php echo BASE_URL.$urlService->getBlogUrl($blog->title); ?>"><?php echo $blog->title; ?></a></h1>
                                <!-- <p class='roohit'><?php echo $desc;?></p> -->
                                <small class="mt-1 d-block"><?php echo $blog->createdBy; ?>, <?php echo date('d M y', strtotime($blog->createdDate)); ?></small>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="row mt-4">
                <div class="col-lg-6">
                  <nav aria-label="...">
                    <ul class="pagination">
                      <li class="page-item disabled">
                        <a class="page-link">Previous</a>
                      </li>
                      <li class="page-item active"><a class="page-link" href="#">1</a></li>
                      <li class="page-item " aria-current="page">
                        <a class="page-link" href="#">2</a>
                      </li>
                      <li class="page-item"><a class="page-link" href="#">3</a></li>
                      <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                      </li>
                    </ul>
                  </nav>
                </div>
            </div>
        </div>
         <div class="col-lg-4 mt-4">
            <?php
           
                $resultb= get('api/guest/blog-categories', true);
                $blogcat=json_decode($resultb);
             
            ?>
            <div class="card-shadow p-2 rounded-2 bg-white">
                <h5 class="border-bottom pb-2 fw-bold">Categories</h5>
                <ul class="category-filter flex-wrap mb-2"> 
                    <?php
                    foreach($blogcat as $bcat){
                    ?>
                    <li><a href='hdjs'><?php  echo $bcat->categoryName?></li></a>
                    <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
    
    </div>
  
</section>


<?php
include_once "footer.php";
?>