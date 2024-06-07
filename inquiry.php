<?php include_once 'config.php'; ?>
<script src="services/storegeService.js"></script>
    <script>
       function closePopup() {
    document.getElementById("popup-card-otp").style.display = "none";
  }
  function submitRequirement(formdata){
//   var productname=document.getElementById("productName").value;
  
//   var quantity=document.getElementById("quantity").value;
//   var Unit=document.getElementById("quantityUnit").value;
//   var requirement=document.getElementById("requirement").value;
 
//   var countryCode=document.getElementById("countryCode").value;
//   var contactNumber=document.getElementById("contactNumber").value;
  
// //console.log(productname);
//         let payload = {
//           enquirerName: 'Atulyadav',
//           enquirerContactNumber: countryCode+contactNumber,
//           enquirerEmail:'atul@sakshemit.com',
//           enquiryMessage: requirement,
//           productName:productname,
//           quantity: quantity,
//           unit: Unit,
//           buyer: { id: '651266a6be013b38a26b35bf' },
//           status: 'New',
//           frequencytype: lol
//         }
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
          window.location.href = window.location.href;
    }
    })
    .catch(function (error) {
        console.log(error);
        if(confirm('Your Request is not submitted !!! Due To some issue Please click OK.')) {
          window.location.href = window.location.href;
        }
    });
  //console.log(payload);
  }
</script>
<section class="bg-grey2 mt-5" *ngIf="popular_categories">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <div class="p-md-4 my-3">
          <div class="card border-0 shadow-lg">
            <div class="card-header text-center bg-gradiant ">
              <h4 class="mb-0 py-1 fs-5 fw-bold">
                INQUIRE FOR YOUR BUYING REQUIREMENT
              </h4>
            </div>
            <div class="card-body p-md-4">
              <h5 class="text-uppercase mb-3 fw-semibold">
                Tell us about your requirement
              </h5>
              <form method="post" id="postBuyreq">
              <div class="row">
                <div class="col-lg-8">
                  <label for="" class="form-label fw-semibold fs-5">Describe in few words *</label>
                  <textarea name=""  name="description" class="form-control" id="" cols="30" rows="6"
                    placeholder="Please include_once product name, order quantity, usage, special request if any in your inquery."></textarea>
                  <button class="btn-primary-gradiant px-md-5 py-2 rounded-10 mt-3 mb-1 fs-5 fwbold">
                    + Add Attachment
                  </button>
                </div>
                <div class="col-lg-4">
                  <div class="row gy-4">
                    <div class="col-lg-12">
                      <label for="" class="form-label fw-semibold fs-5">Email ID*</label>
                      <input type="text" name="enquirerEmail" class="form-control" placeholder="Email ID" />
                    </div>
                    <div class="input-group">
                    <select name="countryCode" class="form-control mxw-50">
                                          
                                          <option value="+971">+971 - United Arab Emirates.</option>
                 <option value="+91">+91 - India</option>
                                  </select>
                      <!--</div>
                <div class="col-lg-6">-->
                      <input type="text" name="mobileNo" class="form-control"
                        placeholder="Mobile number" width="" />
                    </div>
                    <div class="col-lg-12">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked />
                        <label class="form-check-label" for="flexCheckChecked">
                          I agree to
                          <a href="https://www.tradersfind.com/term-and-conditions" target="_blank" class="text-decoration-underline">terms and conditions</a>
                        </label>
                      </div>
                    </div>
                    <!--<app-loadp *ngIf="requirementService.spannerval" style="height: 50%; width: 60%; margin-left: -5px;"></app-loadp>-->
                    <div class="col-lg-12">
                      <button (click)="this.requirementService.onClickSubmitRequirement()"
              class="btn-primary-gradiant px-md-5 py-2 rounded-10 fs-5 fwbold">Send Inquiry</button>
            
                    </div>
                  </div>
                </div>
              </div>
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
                       submitRequirement(formdata);
    
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
                       submitRequirement(formdata);
    
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
    if(isset($_POST['enquirerEmail'])){
    $enquirer_email = $_POST['enquirerEmail'];
    $requirement = $_POST['description'];
    $countryCode = $_POST['countryCode'];
    $contactNumber = $_POST['mobileNo'];
    
    $formdata = array(
      'enquirerContactNumber' => $countryCode . $contactNumber,
      'enquiryMessage' => $requirement,
      'enquirer_email' => $enquirer_email,
      'status' => 'New'
    );

  //echo "Form submitted successfully!";
 // echo $productName;
 // header("Location: post-buy-requirements");
 $contenctNo=$countryCode.$contactNumber;
 include_once 'post.php';
 print_r($contenctNo);
 $respons=sendOtp($contenctNo,$formdata);

  }

} else {
 
   
}
?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
