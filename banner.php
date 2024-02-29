<!--<section class="container-fluid mt-1">-->
    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <?php
          $webPageName = 'Search Product Top';
          require_once 'post.php';
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
<!--</section>-->
<hr  size="5" width="100%">  