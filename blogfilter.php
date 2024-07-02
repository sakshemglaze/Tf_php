<?php

include_once 'services/url.php';
$urlService = new UrlService(); 

$categoryid = isset($_GET['category_name']) ? $_GET['category_name'] : null;


function getFilterBlogf($payload, $queryParams) {
    if (isset($payload['productCategoryIds'])) {
        $queryParams['categoryIds'] =  $payload['productCategoryIds'];
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

function onChangeFilterf($categoryid,$attribute = null, $value = null) {
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

    if ($categoryid ) {
        $payload = [
            "productCategoryIds" => $categoryid
        ];
    }

    if ($selectedLanguage) {
        $payload = [
            "language" => $selectedLanguage
        ];
    }

    $apiResponse = getFilterBlogf($payload, ["page" => 0, "size" => 10, "createdDate" => 'desc']);
    $isShowShimmer = false;
    $blogList = json_decode($apiResponse);
    return $blogList;
}

$blogList = onChangeFilterf($categoryid);
?>
<div class="row" id="blogs">
                
<?php foreach ($blogList as $blog){
     // $desc = custom_mb_strimwidth($blog->description, 0, 250, '...');
     //print_r($blog->blogUrl);
    ?>
   
    <div class="col-md-6 mb-4 align-items-center front_blog">
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
                <h1 class="fs-5 text-center fw-bold mt-3"><a href="<?php echo BASE_URL.$urlService->getBlogUrl(isset($blog->blogUrl)?$blog->blogUrl:$blog->title); ?>"><?php echo $blog->title; ?></a></h1>

                <!-- <p class='roohit'></p> -->
                    <?php //echo $desc; ?>
                <small class="mt-1 d-block text-center"><?php echo $blog->createdBy; ?>, <?php echo date('d M y', strtotime($blog->createdDate)); ?></small>
            </div>
        </div>
    </div>
<?php } ?>
</div>
<div>
<hr style="margin:2px">
<div style="text-align: center; margin: 15px;">
    <span class="btn btn-primary-gradiant">Other Blogs</span>
</div>
</div>
