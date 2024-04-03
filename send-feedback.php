<?php include_once 'config.php'; 
$SeoParams = [
  'title' => 'TradersFind Feedback Form: Improve Trading Journey',
  'metaTitle' => 'TradersFind Feedback Form: Improve Trading Journey',
  'metaDescription' => 'Share your valuable feedback through our TradersFind feedback form to enhance the trading experience. Your input makes a difference!',
              'metaKeywords' => null,
              'fbTitle' => null,
              'fbDescription' => null,
              'fbImage' => null,
              'fbUrl' => null,
              'twitterTitle' => null,
              'twitterDescription' => null,
              'twitterImage' => null,
              'twitterSite' => null,
              'twitterCard' => null,
];


?>
  <?php
                   include_once 'post.php';
                function submitfeedback($data){
                 
                 $data= post('api/saveFeedback',$data,true,null,true);
                 header("Location: ".'/feedback');
                 exit;
                 //print_r($data);

                }
                if($_SERVER['REQUEST_METHOD']=="POST"){
                  if(isset($_POST['email'])){
                  $userMail=$_POST['email'];
                  $userfullname=$_POST['fullname'];
                  $usercompName=$_POST['companyName'];
                  $userArea=$_POST['area'];
                  $userMoNumber=$_POST['phoneNumber'];
                  $userquery=$_POST['feedbackContent'];
                  $feedbackType=$_POST['feedbackType'];
                  $payload=array(
                    'feedbackType'=>$feedbackType,
                    'feedbackContent'=>$userquery,
                    'email'=>$userMail,
                    'fullName'=>$userfullname,
                    'companyName'=>$usercompName,
                    'area'=>$userArea,
                    'phoneNo'=>$userMoNumber
                  );
                 $submit= submitfeedback($payload);
                 //print_r($submit);

                }
                

              }
                ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php 
        include_once 'services/seo.php';
        $seo = new seoService();
        $seo->setSeoTags($SeoParams); 
    ?>
</head>
<body>
    <?php
        include_once 'header-sub.php';
    ?>

    <section class="feedbackBg mb-5 mt-5">
        <div class="container">
            <div class="text-center px-md-5 ">
                <h2 class="border-center text-center fs-2"> <span class="text-info">TradersFind </span> <span class="text-danger">Feedback Form </span></h2>
                <p class="fs-5 py-3 fwbold ">Kindly utilize the form provided below to share your valuable feedback with us. Your input is pivotal in enhancing the user experience we offer. Thank you for taking the time to help us improve.</p>
            </div>

            <div class="shadow2 feedback2 rounded-10 px-md-5 pt-4">
                <form id="feedbackForm"  method="post">
                    <div class="form-group">
                        <label>Feedback Type</label>
                        <select class="form-select" name="feedbackType" aria-label="Default select example">
                            <option disabled selected >-----Select Feedback Type-----</option>
                            <option value="Suggestions">Suggestions</option>
                            <option value="Appreciation">Appreciation</option>
                            <option value="Bug / Error Report">Bug / Error Report</option>
                            <option value="Purchase Requirement">Purchase Requirement</option>
                            <option value="Complaint">Complaint</option>
                            <option value="Interested in Services">Interested in Services</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Write Your Feedback</label>
                        <textarea id="feedbackContent" name="feedbackContent" placeholder="Minimum 50 to 3000 Characters" class="form-control2" rows="5"></textarea>
                        <div id="feedbackContentError" class="text-danger" style="display:none;">Feedback content is required and should be between 50 and 3000 characters.</div>
                    </div>
                    <div class="row  pb-4">
                        <h2 class="mt-3 fs-5 text-info fwbold">Your Contact Information</h2>
                        <div class="form-group col-sm-6">
                            <label>Email id <span class="text-danger mb-0 fwbold">*</span></label>
                            <input type="text" name="email" class="form-control" placeholder="Enter your email">
                        </div>
                        <div class="form-group col-sm-6">
                            <label>Company Name (optional)</label>
                            <input type="text" name="companyName" class="form-control" placeholder="Company Name">
                        </div>
                        <div class="form-group col-sm-6">
                            <label>Full Name <span class="text-danger mb-0 fwbold">*</span></label>
                            <input type="text" name="fullname" class="form-control" placeholder="Enter your name">
                        </div>
                        <div class="form-group col-sm-6">
                            <label>Emirates </label>
                            <select class="form-select" name="area" aria-label="Default select example">
                                <option value="" disabled selected>Select Emirates</option>
                                <!-- Assuming $areas is an array populated with data -->
                                <?php $areas=array( "UAE","Dubai","Sharjah","Ras Al Khaimah","Abu Dhabi","Ajman","Fujairah","Umm Al Quwain")?>
                                <?php foreach ($areas as $area): ?>
                                    <option value="<?php echo $area; ?>"><?php echo $area; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group col-sm-6">
                            <label>Mobile/Cell Phone </label>
                            <input type="text" name="phoneNumber" class="form-control" placeholder="Enter Mobile/Phone number">
                        </div>
                        <button type="submit" class="btn-primary-gradiant px-md-5 py-2 rounded-10 fs-4 fwbold mt-4">Submit</button>
                    </div>
                </form>
              
            </div>
        </div>
    </section>

    <script>
        document.getElementById('feedbackForm').addEventListener('submit', function(event) {
            var feedbackContent = document.getElementById('feedbackContent').value;
            if (feedbackContent.length < 50 || feedbackContent.length > 3000) {
                document.getElementById('feedbackContentError').style.display = 'block';
                event.preventDefault(); // Prevent form submission
            }
        });
    </script>
</body>
</html>


<?php
include_once "footer.php";
?>