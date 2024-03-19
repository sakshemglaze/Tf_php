<?php include_once 'config.php'; ?>
<link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/userlogin.css" />

    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/footer.css" >
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/vendors/bootstrap/bootstrap.min.css">
    <script src="<?php echo BASE_URL; ?>assets/vendors/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        var loginMethod='';
        var mobilno='';
        function onClickEmailLogin()
        {
            $('.contcode').hide();
           console.log("email");
           loginMethod="EMAIL";
        }
        function onClickWhatsappLogin()
        {
            $('.contcode').show();
            loginMethod="WHATSAPP";
            console.log("whatsapp");
        }
        function onClickSmsLogin()
        {
            $('.contcode').show();
            loginMethod="SMS";
            console.log("Sms");
        }
  
        function verifyOtp(event,lolnumber){
           // var otm=document.getElementById('otp').value;
           // console.log("success"+event+lol);
           
            $.ajax({
                    url: "https://api.tradersfind.com/api/guest/users/"+lolnumber,
                    dataType: "json",
                    data: { },
                    success: function (data) {
                        console.log(data);
                       
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            closePopup();

        }

        function closePopup() {
    document.getElementById("popup-card-otp").style.display = "none";
  }
        </script>
        <?php
        include_once 'post.php';
        function sendOtp($contenctNo){

            $payload=array('phone'=> '+919639330901', 'loginmethod'=>'WHATSAPP');
            $data123=post(
            'api/otps',
            $payload,
            false,
            //isWhatsapp ? { type: 'whatsapp' } : {type: 'email'},
            array("type"=> 'WHATSAPP'),
            false);
            include_once 'otp.php';
           // echo $contenctNo;
            echo '<script>document.getElementById("popup-card-otp").style.display = "block";</script>';
            //print_r($data123);
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $contenctNo=null;
            if(isset($_POST['mobileNa'])){
                $countryCode=isset($_POST['countryCode'])?$_POST['countryCode']:'';
            $mobileno=isset($_POST['mobileNa'])?$_POST['mobileNa']:'';
            $contenctNo=$countryCode.$mobileno;
            echo $contenctNo;
            $respons=sendOtp($contenctNo);
            }
            $contenctNo=null;

        }
        ?>
   
<div class="Signin-body">
    <div class="signin-panel">
        <div class="container">
            <div class="row g-0">
                <div class="col-lg-5 ">
                    <div class="position-relative d-none d-lg-block">
                        <img src="assets/images/login-bg2.jpg" class="w-100" alt="login">
                        <div class="middle-content">
                            <h4 class="border-bottom-red-left text-white fs-6">Welcome back to<br>
                                <strong>TradersFind</strong>
                            </h4>
                            <p class="mt-4 text-white">Sign in to continue to your account</p>
                        </div>
                        <div class="logo-login-fotter"> <a href="/">
                                <img src="assets/images/footer-logo.webp" width="200" alt="login"> </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="bg-white w-100 h-100 px-md-5 px-3 pt-4 pb-2">
                        <h2 class="border-center text-center fs-4">Sign in</h2>
                        <p class="text-center my-3">Sign in using your registered phone<br>
                            number or email ID</p>
                            <?php
                                $sendingSMS=false;
                             ?>
                        <form class="p-4" method="post" >
    <div class="text-center mb-3" <?php echo $sendingSMS ? 'style="display: none;"' : ''; ?>>
   <input type="radio" id="password" value="password" name="loginmode" formControlName="loginmode" onclick="onClickEmailLogin()" >
&nbsp;<label for="password">Email OTP &nbsp;</label>
<input type="radio" id="whatsapp" value="whatsapp" name="loginmode" formControlName="loginmode" onclick="onClickWhatsappLogin()" checked>
&nbsp;<label for="whatsapp">Whatsapp OTP &nbsp;</label>
<input type="radio" id="sms" value="sms" name="loginmode" formControlName="loginmode" onclick="onClickSmsLogin()">
&nbsp;<label for="sms">SMS OTP &nbsp;</label>

    </div>
    <div <?php echo !$sendingSMS ? 'style="display: none;"' : ''; ?>>
        Please wait, sending OTP ...
    </div>
                            <div class="mb-4 input-group">
                                <!--<span><img src="assets/images/mail-black.png" alt=""></span>-->
                                <span *ngIf="this.loginMethod != 'EMAIL'" class="contcode">
                                    <select formControlName="countryCode" id="ccId" name="countryCode" class="form-control mxw-50" style="width: auto;">
                                    <?php
                $json_data = file_get_contents(  BASE_URL.'assets/testingJson/country_codes_v1.json');
                $countries = json_decode($json_data);

                foreach ($countries as $code) {
                ?>
                    <option value="<?php echo $code->code; ?>">
                        <?php echo $code->code . ' - ' . $code->name; ?>
                    </option>
                <?php
                }
                ?>
                                    </select>
                                </span>
                                <input type="text" id="contentId"  name="mobileNa" placeholder="Mobile or Email ID" class="form-control" autocomplete="off">
                                
                            </div>
                            
                            <!--<div class="signininput mb-2" >
                                <span><img src="assets/images/otp.png" alt="otp"></span>
                                <input formControlName="password" type="password" placeholder="Password">
                            </div>-->
                            <app-loadp *ngIf="requirementService1.spannerval" style="height: 50%; width: 60%; margin-left: -5px;"></app-loadp>
                            <!-- <button id="button1" formControlName="submit" -->
                            <button id="button1"
                                class="btn btn-primary w-100 signbtn rounded-10 d-flex align-items-center justify-content-center" >
                                <img src="assets/images/arrow-right.png" class="me-2" alt=""> Send OTP </button>
                        </form>
                        <app-otp *ngIf="this.requirementService.isVerification"
                        [mobileNo]="loginEmailFormGroup.get('email').value" 
                        [countryCode]="this.loginMethod != 'EMAIL'? loginEmailFormGroup.get('countryCode').value:''"></app-otp>

                        <!--
                        <div class="text-end mt-1">
                            <a href="forgotpassword" class="ms-auto ">Forgot password?</a>
                        </div>
                         <div class="centerequalline"><span></span> Or <span></span></div>
                               <ul class="social-icon">
                                    <li *ngIf="this.loginMethod != loginMethods.GMAIL" (click)="onClickGmailLogin()"><a href="javascript:void(0)"><i class="google-icon"></i></a></li>
                                    <li *ngIf="this.loginMethod != loginMethods.FACEBOOK" (click)="onClickFacebookLogin()"><a href="javascript:void(0)"><i class="fb-icon"></i></a></li>
                                  </ul>
                                -->
                        <div class="text-center"> <a href="register-your-business">
                            <button class="btn btn-light btnlight2 px-4 mt-4">Create an account</button></a>
                            <button class="btn btn-light btnlight2 px-4 mt-4" onclick="history.back()">
                                Close </button>
                        </div> 
                        <!--<div> <button class="btn-outline-gradiant btn btn-sm w-100 d-center" onclick="history.back()">
                                Close </button></div> -->
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</div>

