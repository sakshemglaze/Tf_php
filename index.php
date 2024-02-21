
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href=" 	https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/style.css" >
    <link rel="stylesheet" href="./assets/css/footer.css" >
    <link rel="stylesheet" href="./assets/css/headersub.css" >
</head>
<body>

<header class="container-fluid shadow-sm border-bottom bg-white sticky-top inner_header1 ">
    <div class="d-flex align-items-center position-relative flex-wrap">

        <a href="/" title="TradersFind" aria-label="TradersFind - Largest B2B online Portal">
          <img src="assets/images/TradersFind.webp" alt="TradersFind" class="order-1 inner_header_logo" width="110" height="70" Rel="Nofollow" />
        </a>
       
    <form method="post" action="index.php" class="w-100 position-relative ms-auto mw-600 order-3 order-md-2 mt-md-0 ddd">
    <div class="input-group input-group-lg w-100 position-relative ms-auto mw-600 order-3 order-md-2 mt-md-0">
          <input  autofocus type="text" class="form-control " name="searchText" placeholder="What are you looking for.."
                  style="height: 45px; border-top-right-radius: 10px; border-bottom-right-radius: 10px;">

          <div class="submit-button">
           
            <button  type="submit" class="btn-primary-gradiant w-100 h-100 px-2 px-lg-5">
              <img src="assets/images/search-icon.png" width="18" class="me-lg-2" alt="" />
              <div class="d-none d-lg-inline">Search</div>
            </button>
          </div>
         
               
        </div></form>
    
    <div class="sidemenu align-items-center order-4 inner_header">
        <a href="https://api.whatsapp.com/send?phone=971569773623&text=Browsed TradersFind" class="mx-4" title="Whatsapp_chat" aria-label="Chat with Tradersfind support team" target="_blank">
          <img src="assets/images/whatsapp-chat.webp" alt="Whatsapp_chat" style="height: 46px;"></a>
        <div class="login-button-top d-flex align-items-center mw-200" *ngIf="!this.storageService.getItem('login')">
          <img src="assets/images/user.png" alt="" />
          <a href="login" class="border-end-black px-3 me-3 lh-sm nowrap">Sign In </a>
          <a href="register-your-business">Join Free</a>
        </div>
</div>
</div>
</header>
    <?php
  
            class FilterDTO {}
            $name= $_POST['searchText']? $_POST['searchText']:"cleaning services";

            $filterDto = new FilterDTO();
            $payload = array(
                'searchText' => $name ,
                'searchTextType' => 'subcategory',
                'filterDto' => $filterDto
            );
            $queryParams= array('page'=>0, 'size'=> 10) ;
            function getItem($item) {
               
                $value = $_COOKIE[$item] ?? null;
                if ($value !== null) {
                    $decodedValue = json_decode($value, true);
                    return json_last_error() === JSON_ERROR_NONE ? $decodedValue : $value;
                } else {
                    return $value;
                }
           return null;
        }
         
        function post($url, $request, $observeResponseFlag = false, $queryParams = null, $authRequired = false, $responseType = null) {
            $token = getItem("userAccessToken");
        
            $headers = array(
                'Content-Type: application/json'
            );
            if ($authRequired) {
                $headers[] = 'Authorization: Bearer ' . $token;
            }
            $ch = curl_init('https://api.tradersfind.com/'. $url);
        
            $postData = json_encode($request);
        
            if ($queryParams) {
                $url .= '?' . http_build_query($queryParams);
            }
        
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

            $response = curl_exec($ch);
           
           $rereasponse= json_decode($response);
         return $rereasponse;   
        }

        $data =   post(
                'api/new-search-products',
                $payload,
                true,
                $queryParams,
                false
              );
              ?>
              <section class="container-fluid mt-1">
              <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
                <?php
          $webPageName = 'Search Product Top';
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
        
              </section>
              <hr  size="5" width="100%">  
<div class="row gy-2">
    <div class="col-lg-3 col-xxl-2">
        
      <div class="sticky-top" style="top:12%;"> <a href="https://wa.link/hy8kan" title="TradersFind" target="_blank">
        <img src="assets/images/poster1.webp" class="img-fluid mt-4 w-100" alt="Poster" /></a>
      </div>
    </p></div>
    <div class="col-lg-9 col-xxl-10 home-cleaning-Bg">

   
                           <?php
                        
              foreach ($data as $prod) {
                if (is_array($prod)) {
                    ?>
                    <div class="row gy-4">
                        <?php
                      foreach ($prod as $onep) {
                        if (is_object($onep) && isset($onep->id)) {
                           $prodData=$onep;
                           ?>
                           <div class= "col-lg-6 ">
                            <?php
                           include 'product.php';
                           
                        }
                        ?>
                          </div>
                          <?php
                      }
                          ?>
                    </div>
                    <?php
                }
            }
           
          ?> 
    </div>    
</div>


    <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
include "footer.php"
?>