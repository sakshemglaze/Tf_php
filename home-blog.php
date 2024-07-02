<?php include_once 'config.php'; ?>
<section class="container-fluid">
    <div class="row gy-4">
      <div class="col-lg-12">
        <h3 class="text-center border-center">LATEST BLOG</h3>
      </div>
  <?php
 require_once 'post.php';
 include_once 'services/url.php';
$urlService = new UrlService(); 
  $blogs=get('api/guest/homeblogs' .'?page=' . '0' . '&size=' .'5', true);
  $jblog=json_decode($blogs);
 
  foreach(array_slice($jblog,0,3) as $blog){
  
    $blogimg=IMAGE_URL.$blog->image->id.'.webp';
  ?>
      <div class="col-lg-4 border_img" >
        <a href="<?php echo BASE_URL.$urlService->getBlogUrl($blog->title);?>">
          <div class="blog text-center">
           
            <img src="<?php echo $blogimg; ?>" alt="blog Image">
            <h4 class="fs-14 px-5 mt-4"><strong><?php echo $blog->title ;?></strong></h4>
         
            <p  style="color: brown;" >
              
              <?php
              $createdDateFormatted = date('M j, Y', strtotime($blog->createdDate));
               echo $blog->createdBy.','.$createdDateFormatted ; ?>
            </p>
          </div>
        </a>
      </div>
  <?php
  }
  ?>
    </div>
    <div class="text-center"> <a href="blog">
        <button class="btn-primary-gradiant rounded-2 btn-auto">VIEW ALL</button> </a>
    </div>
  </section>