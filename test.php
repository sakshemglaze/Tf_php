<div class="row" style="margin-top: 165px;">
   
   <div class="col-12">
 
<?php
$jsonData = file_get_contents('php://input');

$phpArray = json_decode($jsonData);

//print_r(gettype($phpArray));
foreach ($phpArray as $inde1 => $prod) {
                
    if (is_array($prod)) { 
      //print_r($prod);
        ?>
        <div id="data-container" class="row gy-4">
            <?php
          foreach ($prod as $inde => $onep) {
            $indexr=$inde;
            if (is_object($onep) && isset($onep->id)) {
                $prodData=$onep;
                //print_r($prodData);
                ?>
                <div class= "col-lg-6 ">
                 <?php
                   include 'product.php';  
                ?>
               </div>
               <?php
            }
          }
              ?>
        </div>         
        <?php
    }
}

?>
  </div>
</div>
<script src="<?php echo BASE_URL; ?>assets/js/lazy-load.js"></script> 