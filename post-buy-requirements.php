<?php include_once 'config.php'; ?>
<link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/postbuyreq.css" />
<link rel="stylesheet" href="<?php echo BASE_URL; ?>asses/vendors/bootstrap/bootstrap.min.css">
<?php
include_once "header-sub.php";
?>
<p-toast></p-toast>
<section class="bg-gradiant1 login-title text-center text-white fwbold pb100">
  <div class="container">
    <h2 class="fs-3 pt20">Let Us know What you Need</h2>
    <p class="mt-0 mb-0 ">Tell us your requirement. Get Instant quotes from Verified Sellers</p>
  </div>
</section>

<section class="">
  <div class="container">
    <div class="login-detailsBg shadow2">
      <div class="row">
        <!----Left---->
        <div class="col-md-8 line">
          <div class="fs-3 fwbold Details">Requirement Details</div>

          <form method="post">
            <div class="mb-3 mt-3">
              <label>Product / Service</label>
              <input type="text" class="form-control" name="productName"
                placeholder="Products / Services you are looking for" required>
              <div class="is-invalid" *ngIf="
              !this.requirementService.productSellerForm.controls['productName']
                .valid &&
              this.requirementService.productSellerForm.controls['productName']
                .touched
            ">
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
                      $resUnit=file_get_contents('./assets/testingJson/Units.json');
                      $allunit=json_decode($resUnit);
                      foreach($allunit as $unit){
                             ?>
                             <option value="<?php echo $unit;?>">
                            <?php echo $unit;?>
                            </option>
                             <?php
                      }
                      ?>                  </select>

                </div>
              </div>

              <div class="col-md-12">
                <div class="mb-3">
                  <label>Describe your buying requirement</label>
                  <textarea name="requirement" class="form-control"
                    placeholder="Describe your buying requirement">
                  </textarea>

                </div>
              </div>
              
              <div class="row mt-1">
                <div class="col-md-6">
                  <div class="mb-1"> &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" id="onetime" name="frequencytype" name="frequencytype" value="onetime" checked>&nbsp;&nbsp;<label for="onetime">One Time</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-1"> &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" id="recuring" name="frequencytype" name="frequencytype" value="recuring">&nbsp;&nbsp;<label for="recuring">Recurring</label>
                  </div>
                </div>
              </div>

              <div class="col-md-12">
                <div class="mb-3">
                  <label>Mobile No.</label>
                  <div class="input-group">
                    <select name="countryCode" class="form-control mxw-50">
                      <!--<option *ngFor="let opt of this.requirementService.countries" value="{{opt.code}}">{{ opt.code }} - {{ opt.name }}     </option>-->
                      <option value="+971">+971 - United Arab Emirates.</option>
                       <option value="+91">+91 - India</option>
                    </select>
                    <input type="number" name="contactNumber" class="form-control" placeholder="Mobile"
                      required="number" />

                  </div>

                </div>
              </div>
              <div class="col-md-12">
                  <div class="form-check ms-2">
                    <input class="form-check-input fs-5" type="checkbox" value="" id="flexCheckChecked"
                           checked>
                    <label class="form-check-label" for="flexCheckChecked">
                      I agree to all the <a class="text-danger" href="https://www.tradersfind.com/term-and-conditions" target="_blank">Terms of Use </a> stated by TradersFind.com
                    </label>
                  </div>
              </div>
            </div>
            <button 
              class="btn-primary-gradiant px-md-5 py-2 rounded-10 fs-5 fwbold mt-3 mb-3">Submit Requirement</button>
            
          </form>
          <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $productName = $_POST['productName'];
    $quantity = $_POST['quantity'];
    $quantityUnit = $_POST['quantityUnit'];
    $requirement = $_POST['requirement'];
    $frequencytype = $_POST['frequencytype'];
    $countryCode = $_POST['countryCode'];
    $contactNumber = $_POST['contactNumber'];

    echo "Form submitted successfully!";
} else {
   
    echo "Error: Form not submitted!";
}
?>
          
          <!-- <app-otp *ngIf="this.requirementService.isVerification"
            [countryCode]="this.requirementService.productSellerForm.value.countryCode"
            [mobileNo]="this.requirementService.productSellerForm.value.contactNumber"></app-otp> -->

        </div>
        <!---Left End---->
        <!---Right---->
        <div class="col-md-4">
          <div class="fs-3 fwbold Details">Buyers Advantages?</div>

          <div class="media mt-3">
            <div class="media-left media-middle">
              <a href="#">
                <img class="media-object" src="<?php echo BASE_URL ?>assets/images/login-icon1.jpg">
              </a>
            </div>
            <div class="media-body">
              <h4 class="media-heading fwbold  mb-0">Immediate Responses</h4>
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
              <h4 class="media-heading fwbold  mb-0">Genuine Sellers</h4>
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
              <h4 class="media-heading fwbold  mb-0">Multiple Choices</h4>
              <p class="mt-0 mb-0">Get the power to choose the best!</p>
            </div>
          </div>

        </div>
        <!---Right End---->
      </div>
    </div>
  </div>
</section>
<?php
include_once "footer.php";
?>