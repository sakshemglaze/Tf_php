<?php
//ob_start();
include_once 'config.php'; ?>
<meta name="robots" content="index, follow">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/postbuyreq.css" />
<link rel="stylesheet" href="<?php echo BASE_URL; ?>asses/vendors/bootstrap/bootstrap.min.css">
<script src="services/storegeService.js"></script>

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
       function closePopup() {
    document.getElementById("popup-card-otp").style.display = "none";
  }
  function submitRequirement(formdata,data){
  var productname=document.getElementById("productName").value;
  
  var quantity=document.getElementById("quantity").value;
  var Unit=document.getElementById("quantityUnit").value;
  var requirement=document.getElementById("requirement").value;
 
  var countryCode=document.getElementById("countryCode").value;
  var contactNumber=document.getElementById("contactNumber").value;
  
//console.log(productname);
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
        document.getElementById("postBuyreq").reset();

       // formdata.frequencytype=lol;
       var url="<?php echo API_URL?>api/enquiries";

      
       console.log(url);
       const myObject1 = new StorageService();
      var token=myObject1.getItem('userAccessToken');

fetch(url, {
    method: "POST",
    headers: {
        "Content-Type": "application/json",
        Authorization: 'Bearer ' + token,
    },
    body: JSON.stringify(formdata),
})
    .then(function (response) {
        return response.json();
    })
    .then(function (data) {
        console.log(data);
        if(confirm('Your Request is submitted successfully!! Please click OK.')) {
        window.location.href = '/';
    }
    })
    .catch(function (error) {
        console.log(error);
        if(confirm('Your Request is not submitted !!! Due To some issue Please click OK.')) {
          window.location.href = '/';
        }
    })
    ;
  console.log(data);
  }
</script>

<section class="">
  <div class="container">
    <div class="login-detailsBg shadow2">
      <div class="row">
        <!----Left---->
        <div class="col-lg-8 line">
          <div class="fs-3 fwbold Details">Requirement Details</div>

          <form method="post" id="postBuyreq">
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

              <div class="col-md-12  mb-3">
                  <label>Describe your buying requirement</label>
                  <textarea class="form-control" id="requirement" name="requirement" rows="2" placeholder="Describe your buying requirement"></textarea>
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
                    <input  id="contactNumber"  type="phone" name="contactNumber" class="form-control" placeholder="Mobile"
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
            <button onclick="startfomsubmition()"
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
    });

   function otpLogin(otpAuthData, mobileNumber,formdata) {
    console.log(mobileNumber);
      const myObject = new StorageService();
      $.ajax({
        url: "https://api.tradersfind.com/api/authenticate-otp",
  method: "POST",
  dataType: "json",
  contentType: "application/json",
  data: JSON.stringify(otpAuthData),
  success: function (data) {
                       console.log(data);
                       myObject.setItem('userAccessToken', data['id_token']);
                       myObject.setItem('isLoggedIn', '1');
                       myObject.setItem('loggedVia', 'mobile');
                       myObject.setItem('userData', mobileNumber);
                       myObject.setItem('userMobile', mobileNumber);
                       myObject.setItem('login', mobileNumber);
                       myObject.setItem('userFname', "User");
                       submitRequirement(formdata,data);
    
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
      //this.verifyRequestProcessing = false;
    
      //var that = this;
      // setTimeout(function () { that.authService.authenticateUser(); }, 3000);
      // this.messageService.add({
      //   severity: "success",
      //   summary:
      //     'Otp verified successfully.',
      // });
      // this.dialogRef.close();
      // this.modalService.dismissAll();
      // this._router.navigate(['/']);
    }
    function otpRegister(otpAuthData, mobileNumber,formdata){
     
      const myObject1 = new StorageService();
      $.ajax({
        url: "https://api.tradersfind.com/api/register-otp",
  method: "POST",
  dataType: "json",
  contentType: "application/json",
  data: JSON.stringify(otpAuthData),
  success: function (data) {
                       console.log(data);
                       myObject1.setItem('userAccessToken', data['id_token']);
                       myObject1.setItem('isLoggedIn', '1');
                       myObject1.setItem('loggedVia', 'mobile');
                       myObject1.setItem('userData', mobileNumber);
                       myObject1.setItem('userMobile', mobileNumber);
                       myObject1.setItem('login', mobileNumber);
                       myObject1.setItem('userFname', "User");
                       submitRequirement(formdata,data);
    
                    },
                    error: function (xhr, status, error) {
                      console.log("test reg")
                        console.error(xhr.responseText);
                    }
                });
  }
    
    

    function verifyOtp(event,mobnumber,formdata){
           // var otm=document.getElementById('otp').value;
           // console.log(mobnumber);
           var newmobnum='+'+mobnumber;
           let otpAuthData = {
              phone: newmobnum,
              otpValue: event,
              login: newmobnum,
              isMobileLogin: true,
              langKey: "en"
    };
           var otpres='';
            $.ajax({
                    url: "https://api.tradersfind.com/api/guest/users/"+'+'+mobnumber,
                    dataType: "json",
                    data: { },
                    success: function (data) {
                       
                        if (data != "NotFound") {
          //console.log(otpAuthData,mobileNumber)
          otpLogin(otpAuthData, newmobnum,formdata);
          console.log("1");
        }
        else {
          otpRegister(otpAuthData, newmobnum,formdata);
          console.log("2");
        }
                    },
                    error: function (xhr, status, error) {
                        if(xhr.responseText!='NotFound'){
                          otpLogin(otpAuthData, newmobnum,formdata);
                        }else{
                          console.log("tttttttttt");
                          otpRegister(otpAuthData, newmobnum,formdata);
                        }
                    }
                });
            closePopup();

        }

       function startfomsubmition(){

        }
          </script>
          <?php

function sendOtp($contenctNo,$formdata){
 

  $payload=array('phone'=> $contenctNo, 'loginmethod'=>'WHATSAPP');
  $data123=post(
  'api/otps',
  $payload,
  false,
  //isWhatsapp ? { type: 'whatsapp' } : {type: 'email'},
  array("type"=> 'WHATSAPP'),
  false);
  //print_r($data123->title);
  if(isset($data123->title)&& $data123->title=='ContactNo not Valid.'){
   
    echo "<script>
    if(confirm('Please click on OK and send a message (Register Me) on our whatsapp number (+971569773623) to register.')) {
        window.open('https://api.whatsapp.com/send?phone=971569773623&text=Register%20Me', '_blank');
    }
  </script>";
  }else{
  include_once 'otp.php';
 // echo $contenctNo;
  echo '<script>document.getElementById("popup-card-otp").style.display = "block";</script>';
  }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $productName = $_POST['productName'];
    $quantity = $_POST['quantity'];
    $quantityUnit = $_POST['quantityUnit'];
    $requirement = $_POST['requirement'];
    $frequencytype = $_POST['frequencytype'];
    $countryCode = $_POST['countryCode'];
    $contactNumber = $_POST['contactNumber'];
    
    $formdata = array(
      'enquirerContactNumber' => $countryCode . $contactNumber,
      'enquiryMessage' => $requirement,
      'productName' => $productName,
      'quantity' => $quantity,
      'unit' => $quantityUnit,
      'status' => 'New',
      'frequencytype' => $frequencytype,
      'enquirerName'=>''
    );

  //echo "Form submitted successfully!";
 // echo $productName;
 // header("Location: post-buy-requirements");
 $contenctNo=$countryCode.$contactNumber;
 include_once 'post.php';
 //print_r($contenctNo);
 $respons=sendOtp($contenctNo,$formdata);



} else {
 
   
}
//ob_end_flush();
?>
            
  
          <!-- <app-otp *ngIf="this.requirementService.isVerification"
            [countryCode]="this.requirementService.productSellerForm.value.countryCode"
            [mobileNo]="this.requirementService.productSellerForm.value.contactNumber"></app-otp> -->

        </div>
        <!---Left End---->
        <!---Right---->
        <div class="col-lg-4">
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