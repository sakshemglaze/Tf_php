<?php include_once 'config.php'; ?>
<link rel="stylesheet" href="assets/css/otp.css">
<link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/vendors/bootstrap/bootstrap.min.css">
<style>
    .popup-card-otp {
  display: none;
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 40%;
  max-height: 80vh; 
  overflow-y: auto;
  background-color: white;
  padding: 20px;
  border-radius: 5px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
  z-index: 999999;
}
</style>
<?php
$formdata_json = json_encode($formdata);
// Define a variable $modal to simulate the modal functionality
$modal = true; // You can set it to false if modal is not needed
?>
<?php if($modal): ?>
<div id="popup-card-otp" class="popup-card-otp" style="display: none;">
    <div class="modal-dialog modal-lg ">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        onclick="closePopup()"></button> 
            </div>
            <div class="modal-body text-center pt-0">
                <div class="logo mb-2"><img src="assets/images/otp-logo.webp" width="120px"/></div>
                <hr>
                <h2 class="fs-3 fwbold text-danger">Dear Valued Customer,</h2>
                <p class="fs-6 mt-2">Welcome to TradersFind, one of the largest B2B and B2C marketplace in United Arab
                    Emirates where we connect buyers and sellers with each other on a single platform.</p>
                <div class="mt-2 fs-5 text-info fwbold">Please enter below the received verification code</div>
                <div class="mb-3 mt-3">
                    <input type="text" id="otp" class="form-control setotp" placeholder="Enter OTP">
                </div>
                <button type="button"
                        class="btn-primary-gradiant px-md-5 py-2 rounded-10 fs-5 fwbold mb-3 mt-2 text-center"
                        onclick='verifyOtp(document.querySelector(".setotp").value, <?php echo $contenctNo; ?>,<?php echo $formdata_json; ?>)'>
                    Verify OTP
                </button>
                <!--<div class="mt-2 fs-5 text-dark fwbold">Kindly enter the verification code in the given space on the
                    website.</div>-->
                <div class="fs-5 mt-2">Thanks for using <a class="text-info fwbold fs-5">TradersFind.</a></div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>
