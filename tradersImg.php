<?php include_once 'services/config.php'; ?>
<link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/tradersimg.css" />
<?php

$width = '';

if ($id) {
    if (is_null($imageContent) || !isset($imageContent)) {
    
      $imageContenth = 'https://d1o1xqr29l8ebx.cloudfront.net/images/'.$id .".webp";
    
    } else {

        require_once 'post.php';
        $tradImg=get('api/images/'.$id, false);
  
      $tradImage=json_decode($tradImg);
        if ($tradImage->imageContent && $tradImage->imageContentContentType) {
          $imageContenth = "data:image/webp;base64" + "," + res.imageContent;
        } else if ($tradImage->imageContent && !$tradImage->imageContentContentType) {
          $imageContenth = "data:image/webp;base64" + "," + res.imageContent;
        } else {
          $imageContenth ='https://d1o1xqr29l8ebx.cloudfront.net/images/'.$id .".webp";
        }
      }
      
    } else{
   
    $imageContenth = "assets/images/tflogo.webp";
    }

        function fullwidth() {
            return array('width' => $width . '%');
        }
    
        function normalwidth() {
            return array('width'=> '140px');
        }
    
   
    $style = !empty($width) ? fullwidth($width) : normalwidth();

    ?>
    
   
    <img class="<?php echo $class; ?>" <?php if (!empty($imageContenth)) : ?>
        src="<?php echo $imageContenth; ?>"<?php endif; ?> alt="<?php echo !empty($prodName) ? $prodName : 'TradersFind'; ?>"
        style="width: <?php echo $style['width']; ?>" width="100%" rel="nofollow" loading="eager" />
  