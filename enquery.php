<?php include_once 'config.php'; ?>
<div id="popup-card" class="popup-card" style="display: none;">


<section class="bg-gradiant1 login-title text-center text-white fwbold pb100">
    <div class="container">
        <button type="button" class="btn-close float-end mt-1" aria-label="Close" onclick="closePopup1();"></button>
        <span class="fs-3 pt20">Let Us know What you Need</span>
        <p class="mt-0 mb-0 ">Tell us your requirement. Get Instant quotes from Verified Sellers</p>

    </div>
</section>

<section class="">
    <div class="container">
        <div class="login-detailsBg shadow2">
            <div class="row">
               
                <div class="col-md-8 line">
                    <div class="fs-3 fwbold Details">Requirement Details</div>

                    <form method="post" id="postBuyreq">
                        <div class="mb-3 mt-3">
                            <label>Product / Service</label>
                            <input type="text" class="form-control" name="productName"
                                placeholder="Products / Services you are looking for" required>
                            <div class="is-invalid" >
                                *Product/Service is required
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>Quantity</label>
                                    <input type="text" class="form-control" name="quantity"
                                        placeholder="Estimated Order Quantity">

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>Unit</label>
                                    <select name="quantityUnit" class="form-control"
                                        placeholder="eg:  Dozen,  Piece(s),  Tonr">
                                        <?php
                      $context = stream_context_create([
                        'ssl' => [
                            'verify_peer' => false,
                            'verify_peer_name' => false,
                        ],
                    ]);
                    $resUnit = file_get_contents(BASE_URL . 'assets/testingJson/Units.json', false, $context);
                      $allunit=json_decode($resUnit);
                      foreach($allunit as $unit){
                             ?>
                             <option value="<?php echo $unit;?>">
                            <?php echo $unit;?>
                            </option>
                             <?php
                      }
                      ?>
                                    </select>

                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label>Describe your buying requirement</label>
                                    <textarea class="form-control" id="requirement" name="requirement" rows="2" placeholder="Describe your buying requirement"></textarea>


                                </div>
                            </div>
                 <div class="row mt-1">
                <div class="col-md-6">
                  <div class="mb-1"> &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" id="onetime" name="frequencytype" value="onetime" checked>&nbsp;&nbsp;<label for="onetime">One Time</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-1"> &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" id="recuring" name="frequencytype" value="recuring">&nbsp;&nbsp;<label for="recuring">Recurring</label>
                  </div>
                </div>
              </div> 
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label>Mobile No.</label>
                                    <div class="input-group">


                                        <select name="countryCode" class="form-control mxw-50">
                                          
                                                <option value="+971">+971 - United Arab Emirates.</option>
                       <option value="+91">+91 - India</option>
                                        </select>
                                        <input type="number" name="contactNumber" class="form-control"
                                            placeholder="Mobile" required="number" />

                                    </div>

                                </div>
                            </div>
                        </div>

                        <p>
                                I agree to all the <a href="https://www.tradersfind.com/term-and-conditions" target="_blank" class="text-danger"> Terms of Use </a> stated by TradersFind.com</p>
                                <app-loadp *ngIf="requirementService.spannerval" style="height: 50%; width: 60%; margin-left: -5px;"></app-loadp>
                        <button 
                            class="btn-primary-gradiant px-md-5 py-2 rounded-10 fs-5 fwbold mb-3">Submit
                            Requirement</button>

                    </form>
                   
                </div>
               
                <div class="col-md-4">
                    <div class="fs-3 fwbold Details">Buyers Advantages?</div>

                    <div class="media mt-3">
                        <div class="media-left media-middle">
                            <a href="#">
                                <img class="media-object" src="<?php echo BASE_URL ?>assets/images/login-icon1.jpg">
                            </a>
                        </div>
                        <div class="media-body">
                            <span class="media-heading fwbold  mb-0">Immediate Responses</span>
                            <p class="mt-0 mb-0">Get instant response from sellers.</p>
                        </div>
                    </div>

                    <div class="media ">
                        <div class="media-left media-middle">
                            <a href="#">
                                <img class="media-object" src="<?php echo BASE_URL ?>assets/images/login-icon2.jpg">
                            </a>
                        </div>
                        <div class="media-body">
                            <span class="media-heading fwbold  mb-0">Genuine Sellers</span>
                            <p class="mt-0 mb-0">Verified sellers that meet your needs.</p>
                        </div>
                    </div>

                    <div class="media ">
                        <div class="media-left media-middle">
                            <a href="#">
                                <img class="media-object" src="<?php echo BASE_URL ?>assets/images/login-icon3.jpg">
                            </a>
                        </div>
                        <div class="media-body">
                            <span class="media-heading fwbold  mb-0">Multiple Choices</span>
                            <p class="mt-0 mb-0">Get the power to choose the best!</p>
                        </div>
                    </div>

                </div>
                <!---Right End---->
            </div>
        </div>
    </div>
</section>
</div>
<script>
 
  function closePopup1() {
    document.getElementById("popup-card").style.display = "none";
  }
</script>

