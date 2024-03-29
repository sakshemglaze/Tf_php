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
<html lang="en">
  <head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php 
        include_once 'services/seo.php';
        $seo = new seoService();
        $seo->setSeoTags($SeoParams); ?>

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
      <form [formGroup]="feedbackform">
        <div class="form-group">
          <label> </label>
          <select class="form-select" formControlName="feedbackType" aria-label="Default select example">
            <option disabled selected >-----Select Feedback Type-----</option>
            <option value="Suggestions">Suggestions</option>
            <option value="Appreciation">Appreciation</option>
            <option value="Bug / Error Report">Bug / Error Report</option>
            <option value="Purchase Requirement">Purchase Requirement</option>
            <option value="Complaint">Complaint</option>
            <option value="Interested in Services">Interested in Services</option>
            <option value="3">Other</option>
          </select>
          <div class="text-danger" *ngIf="feedbackform.get('feedbackType')?.invalid && feedbackform.get('feedbackType')?.touched">
            Feedback Type is required.
          </div>
        </div>
        <div class="form-group">
          <label>Write Your Feedback</label>
          <textarea placeholder="Minimum 50 to 3000 Characters" class="form-control2"[(ngModel)]="realVal" formControlName="feedbackContent" (input)="onInput($event)" rows="5"></textarea>
          <div class="text-danger" *ngIf="feedbackform.get('feedbackContent')?.invalid && feedbackform.get('feedbackContent')?.touched">
            Feedback content is required and should be between 50 and 3000 characters.
          </div>
        </div>
        <div class="pt-2 fs-5">
          <div><span class="text-danger mb-0 fwbold">* </span>Your Message: (<span class="text-danger fwbold">{{getRemainingCharacters()}}</span> Characters Remaining)</div>
          <!-- <p class="text-danger fwbold">Enter Detail[50 to 3000 Characters]</p> -->
        </div>

        <div class="row  pb-4">
          <h2 class="mt-3 fs-5 text-info fwbold">Your Contact Information</h2>
          <div class="form-group col-sm-6">
            <label>Email id <span class="text-danger mb-0 fwbold">*</span></label>
            <input type="text" formControlName="email" name="email" class="form-control" placeholder="Enter your email">
            <div class="text-danger" *ngIf="feedbackform.get('email')?.invalid && feedbackform.get('email')?.touched">
              Email is required for Feedback.
            </div>
          </div>
          <div class="form-group col-sm-6">
            <label>Company Name (optional)</label>
            <input type="text" formControlName="companyName" name="companyName" class="form-control" placeholder="Company Name">
            
          </div>
          <div class="form-group col-sm-6">
            <label>Full Name <span class="text-danger mb-0 fwbold">*</span></label>
            <input type="text" name="name" formControlName="fullname" class="form-control" placeholder="Enter your name">
            <div class="text-danger" *ngIf="feedbackform.get('fullname')?.invalid && feedbackform.get('fullname')?.touched">
              Full name is required for Feedback.
            </div>
          </div>
          <div class="form-group col-sm-6">
            <label>Emirates </label>
            <select class="form-select" aria-label="Default select example" formControlName="area" aria-label="Default select example">
              <option class="dropdown-item" *ngFor="let area of areas; let i = index"
              value="{{ area }}">
              {{ area }}
          </option>
            </select>
            <div class="text-danger" *ngIf="feedbackform.get('area')?.invalid && feedbackform.get('area')?.touched">
              Feedback Type is required.
            </div>
          </div>

          <div class="form-group col-sm-6">
            <label>Mobile/Cell Phone </label>
            <input type="text" name="phone" formControlName="phoneNumber" class="form-control" placeholder="Enter Mobile/Phone number">
            <div class="text-danger" *ngIf="feedbackform.get('phoneNumber')?.invalid && feedbackform.get('phoneNumber')?.touched">
            Mobile/Cell Phone  is required for Feedback.
            </div>
          </div>
          
          <button class="btn-primary-gradiant px-md-5 py-2 rounded-10 fs-4 fwbold mt-4" (click)="onSubmit()">Submit </button>
        </div>
      </form>
    </div>
  </div>
</section>
</body></html>
<?php
include_once "footer.php";
?>