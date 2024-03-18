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
<script>
  
  function submitRequirement(){
  var productname=document.getElementById("productName").value;
  var quantity=document.getElementById("quantity").value;
  var Unit=document.getElementById("quantityUnit").value;
  var requirement=document.getElementById("requirement").value;
 
  var countryCode=document.getElementById("countryCode").value;
  var contactNumber=document.getElementById("contactNumber").value;
console.log(productname);
        let payload = {
          enquirerName: 'Atulyadav',
          enquirerContactNumber: countryCode+contactNumber,
          enquirerEmail:'atul@sakshemit.com',
          enquiryMessage: requirement,
          productName:productname,
          quantity: quantity,
          unit: Unit,
          buyer: { id: '651266a6be013b38a26b35bf' },
          status: 'New',
          frequencytype: lol
        }
       var url="<?php echo API_URL?>api/enquiries";
       console.log(url);
      
fetch(url, {
    method: "POST",
    headers: {
        "Content-Type": "application/json",
       // Authorization: 'Bearer ' + token,
    },
    body: JSON.stringify(payload),
})
    .then(function (response) {
        return response.json();
    })
    .then(function (data) {
        console.log(data);
    })
    .catch(function (error) {
        console.log(error);
    });
  console.log(payload);
  }
</script>

<section class="">
  <div class="container">
    <div class="login-detailsBg shadow2">
      <div class="row">
        <!----Left---->
        <div class="col-md-8 line">
          <div class="fs-3 fwbold Details">Requirement Details</div>

          <form  id="postbuyrequridform">
            <div class="mb-3 mt-3">
              <label>Product / Service</label>
              <input type="text" id="productName" class="form-control" name="productName"
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
                  <input type="text" id="quantity" class="form-control" name="quantity"
                    placeholder="Estimated Order Quantity">

                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label>Unit</label>
                  <select id="quantityUnit" name="quantityUnit" class="form-control"
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
                  <textarea id="requirement" name="requirement" class="form-control"
                    placeholder="Describe your buying requirement">
                  </textarea>

                </div>
              </div>
              
              <div class="row mt-1">
                <div class="col-md-6">
                  <div class="mb-1"> &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" id="onetime" name="frequencytype"  value="onetime" checked>&nbsp;&nbsp;<label for="onetime">One Time</label>
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
                    <select id="countryCode" name="countryCode" class="form-control mxw-50">
                      <!--<option *ngFor="let opt of this.requirementService.countries" value="{{opt.code}}">{{ opt.code }} - {{ opt.name }}     </option>-->
                      <option value="+971">+971 - United Arab Emirates.</option>
                       <option value="+91">+91 - India</option>
                    </select>
                    <input  id="contactNumber"  type="number" name="contactNumber" class="form-control" placeholder="Mobile"
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
            <button onclick="submitRequirement()"
              class="btn-primary-gradiant px-md-5 py-2 rounded-10 fs-5 fwbold mt-3 mb-3">Submit Requirement</button>
            
          </form>

          <script>
              var lol='';
    var frequencytype=document.getElementsByName('frequencytype');
  frequencytype.forEach(function(radioButton) {
        radioButton.addEventListener('change', function() {
            var selectedValue = this.value;
            lol=selectedValue;
            console.log(selectedValue); // Log the selected value
        });
    })
          </script>
          <?php
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     // Retrieve form data
//     $productName = $_POST['productName'];
//     $quantity = $_POST['quantity'];
//     $quantityUnit = $_POST['quantityUnit'];
//     $requirement = $_POST['requirement'];
//     $frequencytype = $_POST['frequencytype'];
//     $countryCode = $_POST['countryCode'];
//     $contactNumber = $_POST['contactNumber'];

//     echo "Form submitted successfully!";
// } else {
   
//     echo "Error: Form not submitted!";
// }
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
                <img class="media-object" src="<?php echo  BASE_URL ?>assets/images/login-icon1.jpg">
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
                <img class="media-object" src="<?php echo  BASE_URL ?>assets/images/login-icon2.jpg">
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
                <img class="media-object" src="<?php echo  BASE_URL ?>assets/images/login-icon3.jpg">
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