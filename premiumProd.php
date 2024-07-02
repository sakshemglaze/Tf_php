<?php include_once 'config.php'; 
    include_once 'services/url.php';
    $urlService = new UrlService(); 
    include_once 'services/masked.php';
    $maskedService = new MaskingService();
    include_once "whatsapp.php";
    $whatsappUrl=new WhatsappUrl();
?>

    <div class="bg-gradiant rounded-20 position-relative shadow-sm mb-4">
        <div class="premium_listing">
            <img src="<?php echo BASE_URL; ?>assets/images/verifiedw2.png" alt="verified_image" width="80" height="30" />
            <img src="<?php echo BASE_URL; ?>assets/images/Premium_listing.png" alt="Premium_listing" width="80" height="30" style="margin-left: 90px;" />
        </div>
        <div class="card bg-transparent border-0">
            <div class="card-body">
                <div class="row mt-2 gx-md-5 gy-4">
                    <div class="col-lg-7 mt-4">
                        <div class="d-flex flex-wrap flex-md-nowrap">
                            <div class="text-white border_img2">
                                <?php
                              if($premiumprod && $premiumprod['images']) {
                                $id=$premiumprod['images'][0]['id'];
                                //print_r($id);
                              }
                                $prodName=$premiumprod['altText']?$premiumprod['altText']:$premiumprod['productName'];
                                if ($premiumprod && $premiumprod['images'] && isset($premiumprod['images'][0]['imageContent']) && $premiumprod['images'][0]['imageContent'] === null) {

                                $imageContent=null;
                                }else{
                                    $imageContent='';  
                                }
                                $class='rounded-10 me-md-4 mb-3 mb-md-0 ';
                                $secondImg=true;
                                include_once "tradersImg.php";

                                ?>
                                <?php if (!empty($premiumprod['price']) && (empty($premiumprod['maxPrice']) || $premiumprod['maxPrice'] === '')) : ?>
                                    <span><strong>Price:</strong> <?php echo $premiumprod['price'] ?></span>
                                <?php elseif (!empty($premiumprod['maxPrice']) && (empty($premiumprod['price']) || $premiumprod['price'] === '')) : ?>
                                    <span><strong>Price:</strong> <?php echo $premiumprod['maxPrice'] ?></span>
                                <?php elseif (!empty($premiumprod['price']) && $premiumprod['price'] !== '' && !empty($premiumprod['maxPrice']) && $premiumprod['maxPrice'] !== '') : ?>
                                    <span><strong>Price:</strong> <?php echo $premiumprod['price'] ?> - <?php echo $premiumprod['maxPrice'] ?></span>
                                <?php endif; ?>
                                <?php if (!empty($premiumprod['currency'])) : ?>
                                    <span><?php echo $premiumprod['currency'] ?> / Piece</span>
                                <?php endif; ?>
                            </div>
                            <div class="text-white lh-sm ms-md-2">
                                <h2 class="text-uppercase fwbold fs-5">
                                <?php echo strlen($premiumprod['productName']) > 100 ? substr($premiumprod['productName'], 0, 100) : $premiumprod['productName'] ?>
                                    <?php if (strlen($premiumprod['productName']) > 100) : ?>...<?php endif; ?>
                                </h2>
                                <div class="">
                                    <ul class="mt-2 small list_box" role="list">
                                        <?php foreach (array_slice(json_decode($premiumprod['specifications'], true), 0, 3) as $spec) : ?>
                                            <li role="listitem">
                                                <span><b><?php echo $spec['SpecificationName']; ?> :</b> <?php echo $spec['SpecValue']; ?> </span>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                                <?php if (!empty($premiumprod['productDescription'])) : ?>
                                    <div class="two-line-content mt-3">
                                        <p class="about_text about_text2"><b>Description: </b><?php echo $premiumprod['productDescription'] ?></p>
                                    </div>
                                <?php endif; ?>
                                <a href="<?php echo $urlService->getProductUrl($premiumprod['productName'],$premiumprod['id']) ?>" target="_blank" title="<?php echo isset($premiumprod['seller'])?$premiumprod['seller']['sellerCompanyName']:'' ?>" class="fwbold d-block" style="padding-left: 82px; color: yellow;">
                                    ...View more
                                </a>
                                <div class="text-white mt-3">
                                    <?php if (!empty($premiumprod['seller']['mainMarkets']) && count($premiumprod['seller']['mainMarkets']) > 0 && (!empty($premiumprod['seller']['mainMarkets'][0]) || $premiumprod['seller']['mainMarkets'][0] !== null)) : ?>
                                        <span class="service-area single-line">
                                            <b>Service Area : </b><?php echo implode(', ', $premiumprod['seller']['mainMarkets']) ?>
                                        </span>
                                    <?php endif; ?>
                                </div>
                                <div class="text-white mt-3">
                                    <?php if(count($reletedSubCategoryS)>0){?>
                                     <span class="single-line">
                                     <b>Other Categories: </b>
                                     <?php
                                     print_r( $reletedSubCategoryS[0]);                          
                                     ?>

                                     <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#<?php echo $modalId1; ?>">
                                        <span aria-hidden="true"><i class="bi bi-plus" style="font-size: 20px; "></i></span>
                                    </button>
                                    </span>
                                    <div class="modal fade" id="<?php echo $modalId1; ?>" tabindex="-1" aria-labelledby="<?php echo $modalId1; ?>Label" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="<?php echo $modalId1; ?>Label" style="color:black;">Other Categories</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <?php
                                                    $formattedString = '';
                                                    foreach ($reletedSubCategoryS as $index => $subcategory2) {
                                                    $url = $urlService->getCategoryUrl($subcategory2);
                                                    if ($index == 0) {
                                                    $formattedString .= '<a href="' . $url . '">' . $subcategory2 . '</a>';
                                                    } else {
                                                    $formattedString .= ' <a  href="' . $url . '"> |' . $subcategory2 . '</a>';
                                                    }
                                                    }
                                                    echo "<Div style='margin-top: 5px;'>" . $formattedString . "</Div>";
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                     <?php }?>
                                </div>
                                <div class="text-white mt-3">
                                    <?php if (!empty($premiumprod['seller']['Brands'])) : ?>
                                        <span class="single-line"><b>Brand : </b> <?php echo $premiumprod['seller']['Brands'] ?><br> </span>
                                    <?php endif; ?>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 mt-0 text-white">
                        <span class="verified2">
                            <?php if ($premiumprod['rating'] === 1) : ?>
                                <img src="<?php echo BASE_URL; ?>assets/images/level/lw1.png" alt="Rating1" width="15" height="20"/>
                            <?php elseif ($premiumprod['rating'] === 2) : ?>
                                <img src="<?php echo BASE_URL; ?>assets/images/level/lw2.png" alt="Rating2" width="15" height="20"/>
                            <?php elseif ($premiumprod['rating'] === 3) : ?>
                                <img src="<?php echo BASE_URL; ?>assets/images/level/lw3.png" alt="Rating3" width="15" height="20"/>
                            <?php elseif ($premiumprod['rating'] === 4) : ?>
                                <img src="<?php echo BASE_URL; ?>assets/images/level/lw4.png" alt="Rating4" width="15" height="20"/>
                            <?php elseif ($premiumprod['rating'] === 5) : ?>
                                <img src="<?php echo BASE_URL; ?>assets/images/level/lw5.png" alt="Rating5" width="15" height="20"/>
                            <?php endif; ?>
                        </span>
                        <h3 class="text-uppercase fwbold fs-6 mt-0" <?php if(isset($premiumprod['seller'])):?>>
                            <u>
                                <a href="/<?php echo $urlService->getSellerUrl($premiumprod['seller']['sellerCompanyName'], $premiumprod['seller']['id']) ?>" target="_blank" class="text-white fs-5" title="<?php echo $premiumprod['seller']['sellerCompanyName'] ?>">
                                    <?php echo strlen($premiumprod['seller']['sellerCompanyName']) > 40 ? substr($premiumprod['seller']['sellerCompanyName'], 0, 40) : $premiumprod['seller']['sellerCompanyName'] ?>
                                    <?php if (strlen($premiumprod['seller']['sellerCompanyName']) > 40) : ?>...<?php endif; ?>
                                </a>
                            </u>
                        </h3 <?php endif;?>>
                        <div class="row gx-3 mt-1 gy-4">
                            <?php if(isset($premiumprod['seller'])):?>
                            <div class="col-6">
                                <div class="">
                                    <div class="card-body pt-0 text-center">
                                        <img src="<?php echo BASE_URL?>image.php?image=<?php echo $premiumprod['seller']['logo']['id']?>" alt="<?php echo $premiumprod['seller']['sellerCompanyName'] ?>" class="img-fluid rounded-10" style="width:160px;" >
                                        <?php
                                        //$id = !empty($premiumprod['seller->logo) ? $premiumprod['seller->logo->id : null;
                                        //$prodName = !empty($premiumprod['seller->sellerCompanyName) ? $premiumprod['seller->sellerCompanyName: $premiumprod['productName;
                                        //$class='img-fluid rounded-10';
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6" style="vertical-align: middle;">
                                <div class="grid2" style="line-height:30px">
                                    <img src="<?php echo BASE_URL?>assets/images/location-white.png" alt="location" width="15" height="17" />
                                        <a href="#" target="_blank">
                                            <?php if (!empty($premiumprod['seller']['mainMarkets']) && count($premiumprod['seller']['mainMarkets']) > 0 && (!empty($premiumprod['seller']['mainMarkets'][0]) || $premiumprod['seller']['mainMarkets'][0] !== null)) : ?>
                                            <span class="service-area text-white"><?php echo implode(', ', $premiumprod['seller']['mainMarkets']) ?>
                                            </span>
                                            <?php elseif ((!empty($premiumprod['seller']['mainMarkets']) && count($premiumprod['seller']['mainMarkets']) == 0) || (isset($premiumprod['seller']['mainMarkets'][0]) && ($premiumprod['seller']['mainMarkets'][0] == null || $premiumprod['seller']['mainMarkets'][0] == '')) && ($premiumprod['seller']['country'] || $premiumprod['seller']['state'] || $premiumprod['seller']['city'])) : ?>
                                            <span class="service-area"><?php echo $premiumprod['seller']['city'] ? $premiumprod['seller']['city']. ", " : "" ?><?php echo $premiumprod['seller']['state'] ? $premiumprod['seller']['state']. ", " : "" ?><?php echo $premiumprod['seller']['country'] ? $premiumprod['seller']['country'] : "" ?>
                                            </span>
                                            <?php endif; ?>
                                        </a>
                                    <img src="<?php echo BASE_URL?>assets/images/crown-white.png" width="18" height="12" alt="Premium Seller" />
                                        Premium Seller
                                    <img src="<?php echo BASE_URL?>assets/images/phone-white.png" alt="Premium_Phone" width="16" height="16" />
                                        <span class="btn-sm text-white" style="text-align: left;" >
                                        <?php 
                                        $maskedService->getMaskedNumber($premiumprod['seller']);
                                        ?>
                                        </span>
                                </div>
                            </div>
                            <div class="col-sm-6 whatsappbtn ">
                                <a href=" <?php echo $whatsappUrl->getProductToWhatsapp($premiumprod['productName'],$premiumprod['id'],$premiumprod['seller'])?>" target="_blank" class="btn btn-sm w-100">
                                Connect on whatsapp
                                </a>
                            </div>
                            <?php endif;?>
                            <div class="col-sm-6 btn-outline-gradiant">
                                <button onclick="openPopup()" class="btn btn-sm w-100 d-center text-white">
                                 <img src="<?php echo BASE_URL?>assets/images/mail-solid.png" alt="Mail" width="17" height="9" /> Send Inquiry
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- JavaScript code to open the popup card -->
    <script>
        function openPopup() {
            document.getElementById("popup-card").style.display = "block";
        }
    </script>
    <script>
    // Function to open the popup card
    function openPopup() {
        document.getElementById("popup-card").style.display = "block";
    }
    </script>
    <script src="<?php echo BASE_URL; ?>assets/js/lazy-load.js"></script>