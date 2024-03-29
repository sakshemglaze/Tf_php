<?php include_once 'config.php'; ?>

<div class="container">
    <div class="row gy-1">
      <div class="col-lg-6">
        <span class="fw-bold fs-3"><b>EASY SOURCING</b></span>
        <p>An easy way to post your sourcing requests and get quotes.</p>
        <ul class="sellers_text">
          <li>One request, multiple quotes </li>
          <li>Verified suppliers matching </li>
          <li>Quotes comparison and sample request </li>
        </ul>
        
        <a href="about-us" title="TradersFind" class="mt-5"><b>Learn More about us</b></a>
      </div>
      <div class="col-lg-6">
        <div class="card-transparent">
          <span class="fs-4">Let us know what you need?</span>
  
          <form>
            <input type="text" class="form-control" formcontrolName="productName"
              placeholder="Product Name / Service" />
  
            <div class="row mt-1">
              <div class="col-md-6">
                <div class="mb-3">
                  <label>Quantity</label>
                  <input type="text" class="form-control" formControlName="quantity"
                    placeholder="Estimated Order Quantity">
  
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="quantityUnit">Unit</label>
                  <select id="quantityUnit" formControlName="quantityUnit" class="form-control" placeholder="eg: Dozen, Piece(s), Tonr">
                      <!-- <option *ngFor="let unit of this.requirementService.units" [value]="unit">{{unit}}</option> -->
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
            </div>
            <textarea name="" class="form-control" id="" cols="30" rows="3" placeholder="Product Description: "
              formControlName="requirement"></textarea>
             <div class="row mt-3">
                  <div class="col-md-6">
                    <div class="mb-3"> &nbsp;&nbsp;&nbsp;&nbsp;
                      <input type="radio" id="onetime" formControlName="frequencytype"  name="frequencytype" value="onetime" checked>&nbsp;&nbsp;<label for="onetime">One Time</label>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="mb-3"> &nbsp;&nbsp;&nbsp;&nbsp;
                      <input type="radio" formControlName="frequencytype" id="recuring" name="frequencytype" value="recuring">&nbsp;&nbsp;<label for="recuring">Recurring</label>
                    </div>
                  </div>
                </div>
  
            <div class="row mt-1">
              <div class="col-lg-6">
                <div class="input-group">
                  <label for="moNumber">.</label>
                  <select id="moNumber" formControlName="countryCode" class="form-control mxw-50">
                       <option value="+971">+971 - United Arab Emirates</option>
                       <option value="+91">+91 - India</option>

                 </select>
                  <input type="number" formControlName="contactNumber" class="form-control" placeholder="Mobile"
                    required="number" />
                </div>
              </div>
              <div class="col-lg-6">
                <button class="btn-primary-gradiant w-100 rounded-2 mt10"
                  (click)="this.requirementService.onClickSubmitRequirement()">
                  Post Your Request Now
                </button>
              </div>
            </div>
          </form>
          
          <app-otp *ngIf="this.requirementService.isVerification"
              [countryCode]="this.requirementService.productSellerForm.value.countryCode"
              [mobileNo]="this.requirementService.productSellerForm.value.contactNumber"></app-otp>
  
        </div>
      </div>
    </div>
  </div>
  