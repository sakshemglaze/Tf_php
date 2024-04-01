<?php include_once 'config.php'; ?>
<script src="services/storegeService.js"></script>
<script>
       function closePopup() {
    document.getElementById("popup-card-otp").style.display = "none";
  }
   function submitRequirement(formdata){
 
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
  
          <form method="post" id="postBuyreq">
            <input type="text" class="form-control" name="productName"
              placeholder="Product Name / Service" />
  
            <div class="row mt-1">
              <div class="col-md-6">
                <div class="mb-3">
                  <label>Quantity</label>
                  <input type="text" class="form-control" name="quantity"
                    placeholder="Estimated Order Quantity">
  
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="quantityUnit">Unit</label>
                  <select id="quantityUnit" name="quantityUnit" class="form-control" placeholder="eg: Dozen, Piece(s), Tonr">
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
              name="requirement"></textarea>
             <div class="row mt-3">
                  <div class="col-md-6">
                    <div class="mb-3"> &nbsp;&nbsp;&nbsp;&nbsp;
                      <input type="radio" id="onetime" name="frequencytype"  name="frequencytype" value="onetime" checked>&nbsp;&nbsp;<label for="onetime">One Time</label>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="mb-3"> &nbsp;&nbsp;&nbsp;&nbsp;
                      <input type="radio" name="frequencytype" id="recuring" name="frequencytype" value="recuring">&nbsp;&nbsp;<label for="recuring">Recurring</label>
                    </div>
                  </div>
                </div>
  
            <div class="row mt-1">
              <div class="col-lg-6">
                <div class="input-group">
                  <label for="moNumber">.</label>
                  <select id="moNumber" name="countryCode" class="form-control mxw-50">
                       <option value="+971">+971 - United Arab Emirates</option>
                       <option value="+91">+91 - India</option>

                 </select>
                  <input type="number" name="contactNumber" class="form-control" placeholder="Mobile"
                    required="number" />
                </div>
              </div>
              <div class="col-lg-6">
                <button class="btn-primary-gradiant w-100 rounded-2 mt10">
                  Post Your Request Now
                </button>
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
      echo $_SERVER["REQUEST_METHOD"];
          if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if(isset($_POST['productName'])){
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
      'frequencytype' => $frequencytype
    );

  //echo "Form submitted successfully!";
 // echo $productName;
 // header("Location: post-buy-requirements");
 $contenctNo=$countryCode.$contactNumber;
 include_once 'post.php';
 //print_r($contenctNo);
 $respons=sendOtp($contenctNo,$formdata);

  }

} else {
 
 
}
  ?>
        </div>
      </div>
    </div>
  </div>
  