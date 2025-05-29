  <?php
    $currentUrl = $_SERVER['REQUEST_URI'];
    $name = '';
//print_r('welcome3');
  ?>
    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <?php          
	$webPageName = 'Search Product Top';
          require_once 'post.php';
           $responseBanner = post('api/keywords-banner', array($name, $webPageName));
//print_r('w4');
           foreach($responseBanner as $index => $ban){
            $banner = $ban;
              ?>
              <div class="carousel-item <?php echo $index === 0 ? 'active' : ''; ?>">
   
              <?php
	//print_r($banner->link);
            $newban = IMAGE_URL . $banner->image->id . ".webp";
           
            echo '<a href="' . $banner->link . '" target="_blank"> <img src="' . $newban . '" alt="Banner Image" width="100%"> </a>';
            ?>
            </div>
            <?php
           }
            ?>
        </div>   
    </div>    
<hr  size="5" width="100%">  
