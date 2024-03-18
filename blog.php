<html>
    <head>


<?php include_once "config.php";
    include_once 'services/url.php';
    $urlService = new UrlService();

    $currentUrl=$_SERVER['REQUEST_URI'];
    $urlparts=explode('/',$currentUrl);
    $blogUrl=end($urlparts);

    include_once "post.php";
    $blogtitle=str_replace('-',' ',$blogUrl);
    $blogp= get('api/guest/blogs-by-title', false,['blogTitle' => $blogtitle]);
    $blog=json_decode($blogp);
    $size=5;
    $queryParams=['size'=> $size, 'sort'=> "createdDate,desc" ];
    $letestBlog=get('api/guest/blogs', false, $queryParams);
    $latestBlogs=json_decode($letestBlog);


    $SeoParams = [
        'title' => isset($blog->metaTitle) && $blog->metaTitle != '' ? $blog->metaTitle : $blog->productName . ' in ' . $blog->seller->state . ' - ' . $blog->sellerCompanyName,
        'metaTitle' => isset($blog->metaTitle) && $blog->metaTitle != '' ? $blog->metaTitle : $blog->productName . ' in ' . $blog->seller->state . ' - ' . $blog->sellerCompanyName,
        'metaDescription' => isset($blog->metaDescription) && $blog->metaDescription != '' ? $blog->metaDescription : null,
        'metaKeywords' => isset($blog->metaKeywords) && $blog->metaKeywords != '' ? $blog->metaKeywords : null,
        'fbTitle' => isset($blog->fbTitle) && $blog->fbTitle != '' ? $blog->fbTitle : null,
        'fbDescription' => isset($blog->fbDescription) && $blog->fbDescription != '' ? $blog->fbDescription : null,
        'fbImage' => isset($blog->fbImage) ? API_URL . 'api/guest/imageContentDownload/' . $blog->fbImage.id : 'undefined',
        'fbUrl' => isset($blog->fbUrl) && $blog->fbUrl != '' ? $blog->fbUrl : null,
        'twitterTitle' => isset($blog->twitterTitle) && $blog->twitterTitle != '' ? $blog->twitterTitle : null,
        'twitterDescription' => isset($blog->twitterDescription) && $blog->twitterDescription != '' ? $blog->twitterDescription : null,
        'twitterImage' => isset($blog->twitterImage) ? API_URL . 'api/guest/imageContentDownload/' . $blog->twitterImage.id : 'undefined',
        'twitterSite' => isset($blog->twitterSite) && $blog->twitterSite != '' ? $blog->twitterSite : null,
        'twitterCard' => isset($blog->twitterCard) && $blog->twitterCard != '' ? $blog->twitterCard : null,
    ];
 include_once 'services/seo.php';
  $seo = new seoService();
          $seo->setSeoTags($SeoParams);
?>
<link rel="stylesheet" href="<?php echo BASE_URL;?>/assets/css/blogls.css" />
</head>
<body>
<?php 
include_once "header-sub.php";
?>
<div class="container blog-page-container">
    <section class="search-breadcrumb">
        <div class="row">
            <div class="mt-4 col-md-12 col-sm-12 col-xs-12 search-banner">
                <a href="/">Home</a> >
                <a href="/blog">Blogs</a> >
                <a href="<?php echo $urlService->getBlogUrl($blog->title); ?>"><?php echo $blog->title; ?></a>
            </div>
        </div>
    </section>
    
    <div class="row">
        <div class="col-lg-8 mt-4  card-shadow rounded-2 bg-white p-2">
            <div class="pageheader front_blog22">
                <div class="row col-md-12">
                    <h1 style="font-size: x-large;"><?php echo $blog->title; ?></h1>
                </div>
                <div class="blogDate">
                    <p><?php echo date('d M Y', strtotime($blog->createdDate)); ?></p>
                </div>
            </div>
            
            <div class="blogContent blogContent2">

                <div <?php if($blog->image != null && isset($blog->image->imageContent)): ?> <?php endif; ?>>
         
                   <img src="<?php echo IMAGE_URL.$blog->image->id.'.webp';?>" alt="">
                </div>
                <div <?php if($blog->image == null || $blog->image == 'null' || $blog->image == ''): ?>      <?php endif; ?>>
                    <!-- <img class="img-fluid w-100" src="<?php echo BASE_URL;?>assets/images/YP-logo@2x.png"
                        alt="<?php echo $blog->altText ? $blog->altText : 'blog image'; ?>" class="img-hw"> -->
                </div>
                <div>

                </div>
                <p><?php echo $blog->description; ?></p>
            </div>
        </div>
        <div class="col-lg-4 mt-4">
            <div class="blogHeading ">
                <!--<button class="btn btn-large" href="#">BLOGS</button>-->
            </div>
            <div <?php if($latestBlogs): ?>class="popularBlogs card-shadow rounded-2 bg-white p-2"<?php endif; ?>>
                <?php if($latestBlogs): ?>
                    <?php foreach($latestBlogs as $blg): ?>
                        <div class="blog">
                            <a href="<?php echo $urlService->getBlogUrl($blg->title); ?>" style="cursor: pointer;">

                                <img src="<?php echo IMAGE_URL. $blg->image->id.'.webp'; ?>"alt="<?php echo $blog->altText ? $blog->altText : 'blog imageeeeee'; ?>" class="img-fluid ">
                                <img <?php if($blg->image == null || $blg->image == 'null' || $blg->image == ''): ?>src="assets/images/YP-logo@2x.png"class="img-fluid"alt="<?php echo $blog->altText ? $blog->altText : 'blog image'; ?>" <?php endif; ?>>
                                <h5 class="mb-0"><?php echo $blg->title; ?></h5>
                                <!-- <p class="line-clamp" [innerHTML]="blg.description | slice:0:250"></p></p>-->
                            </a>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
                                </body></html>
<?php 
include_once 'footer.php';
?>

