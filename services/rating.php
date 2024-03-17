<link rel="stylesheet" href="<?php echo BASE_URL ?>/assets/css/rating.css" />
<?php
 include_once 'config.php';
print_r($rating);
?>
        <span class="verified2">
        
                            <?php if ($rating == 1) : ?>
                                <ul class="star-rating d-flex">
                                <li><img src="<?php echo BASE_URL; ?>assets/images/level/l1.png" alt="Rating1" width="15" height="20"/>-</li></ul>
                            <?php elseif ($rating == 2) : ?>
                                <ul class="star-rating d-flex" >
                                <li><img src="<?php echo BASE_URL; ?>assets/images/level/l2.png" alt="Rating2" width="15" height="20"/>-</li></ul>
                            <?php elseif ($rating == 3) : ?>
                                <ul class="star-rating d-flex">
                                <li><img src="<?php echo BASE_URL; ?>assets/images/level/l3.png" alt="Rating3" width="15" height="20"/>-</li></ul>
                            <?php elseif ($rating == 4) : ?>
                                <ul class="star-rating d-flex">
                                <li><img src="<?php echo BASE_URL; ?>assets/images/level/l4.png" alt="Rating4" width="15" height="20"/></li></ul>
                            <?php elseif ($rating == 5) : ?>
                                <ul class="star-rating d-flex">
                                <li><img src="<?php echo BASE_URL; ?>assets/images/level/l5.png" alt="Rating5" width="15" height="20"/></li> </ul>
                            <?php endif; ?>
                        </span>
