  <?php
    $currentUrl = $_SERVER['REQUEST_URI'];
    $name = '';
//print_r('welcome3');
  ?>
    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
        <div class="carousel-inner">
          <?php          
	$webPageName = 'Search Product Top';
          require_once 'post.php';
           $responseBanner = post('api/keywords-banner', array($name, $webPageName));
print_r('w4');
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
<hr  size="5" width="100%">  
