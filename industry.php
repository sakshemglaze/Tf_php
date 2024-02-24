<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <!--<link rel="stylesheet" href="./assets/bootstrap/bootstrap.min.css">-->
    <link rel="stylesheet" href="/assets/css/indus.css" />
</head>
<body>
<script src="./assets/js/lazy-load.js"></script>
<?php
    include "header-sub.php";
    $index=0;
            class FilterDTO {}
            //$name= $_POST['searchText']? $_POST['searchText']:"cleaning services";
            $filterDto = new FilterDTO();
            $payload = array();
            $page = 0;
            $size = 6;
            require_once 'post.php';
        $data =  get(
                'api/industries'.'?size=' . $size . '&page=' . $page . '&sort=industryName,asc',
                 true
              );
              $data1 = json_decode($data);
             // $data = findActive($data1);
              //print_r($data);
              ?>
<section class="hidden-content container-fluid ">
  <?php include "banner.php"; ?>
</section>
<section class="p-3">
  <nav style="--bs-breadcrumb-divider: '>'" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/">TradersFind </a></li>

      <li class="breadcrumb-item active" aria-current="page">
        Industry
      </li>
    </ol>
  </nav>
</section>

<section class="container-fluid ">
  <!-- third row -->
  
  <?php
foreach ($data1 as $category) {
    echo '<div class="row  gy-4 bg-white">';
    echo '<div class="col-lg-12">';
    echo '<h3 class="text-center fwbold text-uppercase text-black-50"><a href="">' . $category->industryName . '</a></h3>';
    echo '</div>';
    echo '<div class="col-lg-3 text-center">';
    if (!empty($category->image)) { 
        $indImage = "https://doc.tradersfind.com/images/" . $category->image->id . ".webp";
        echo '<img data-src="' . $indImage . '" class="img-fluid lazy" alt="Industry" width="70%" />';
    }
    echo '</div>';
    echo '<div class="col-lg-9">';
    echo '<div class="row gy-4">';
    foreach (array_slice($category->productsCategories, 0, 6) as $cat) {
        echo '<div class="col-lg-4">';
        echo '<div class="d-flex align-items-center gap-3">';
        $catImage = "https://doc.tradersfind.com/images/" . $cat->image->id . ".webp";
        echo '<img data-src="' . $catImage . '" class="lazy" alt="Category" width="140px" />';
        echo '<div class="inddetails">';
        echo '<h4 class="fs-6 fwbold"><a href="' . $cat->categoryUrl . '" title="' . $cat->categoryName . '">' . $cat->categoryName . '</a></h4>';
        echo '<ul class="mt-4 text-black-50">';
        foreach (array_slice($cat->productsSubcategories, 0, 3) as $subcat) {
            echo '<li><a href="' . $subcat->subCategoryUrl . '" title="' . $subcat->subCategoryName . '">' . $subcat->subCategoryName . '</a></li>';
        }
        echo '<li><a href="' . $cat->categoryUrl . '"> + View All</a></li>';
        echo '</ul>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '<br />';
    echo '<br />';
}
?>

  <pagination-controls id="industry_listing_pagination" (pageChange)="getNext($event)" [responsive]="true"
    [maxSize]="20"></pagination-controls>
</section>

<section class="container-fluid mt-4" *ngIf="popular_categories">
  <div class="row gy-4">
    <div class="col-12">
      <hr />
    </div>
  </div>
</section>
<section class="bg-grey2 mt-5" *ngIf="popular_categories">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <div class="p-md-4 my-3">
          <div class="card border-0 shadow-lg">
            <div class="card-header text-center bg-gradiant">
              <h5 class="mb-0 py-1 fs-3">
                INQUIRE FOR YOUR BUYING REQUIREMENT
              </h5>
            </div>
            <div class="card-body p-md-5">
              <h4 class="text-uppercase mb-5 fw-semibold">
                Tell us about your requirement
              </h4>
              <form *ngIf="this.requirementService.prodDetailFrom"
              [ngClass]="!this.requirementService.isFormvalid?'was-validated':''"
              [formGroup]="this.requirementService.prodDetailFrom">
              <div class="row">
                <div class="col-lg-6">
                  <label for="" class="form-label fw-semibold fs-5">Describe in few words *</label>
                  <textarea name=""  formControlName="description" class="form-control" id="" cols="30" rows="6"
                    placeholder="Please include product name, order quantity, usage, special request if any in your inquery."></textarea>
                  <button class="p-0 text-blue bg-transparent border-0 mt-3 fs-5">
                    + Add Attachment
                  </button>
                </div>
                <div class="col-lg-6">
                  <div class="row gy-4">
                    <div class="col-lg-6">
                      <label for="" class="form-label fw-semibold fs-5">Email ID*</label>
                      <input type="text" formControlName="enquirerEmail" class="form-control" placeholder="Email ID" />
                    </div>
                    <div class="input-group">
                      <select formControlName="noCode" class="form-control mxw-50">
                        <option *ngFor="let opt of this.requirementService.countries"
                          value="{{opt.code}}">{{ opt.code }}- {{ opt.name }}
                        </option>
                      </select>
                      <!--</div>
                <div class="col-lg-6">-->
                      <input type="text" formControlName="mobileNo" class="form-control"
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
                    <app-loadp *ngIf="requirementService.spannerval" style="height: 50%; width: 60%; margin-left: -5px;"></app-loadp>
                    <div class="col-lg-12">
                      <button (click)="this.requirementService.onClickSubmitRequirement()"
              class="btn-primary-gradiant px-md-5 py-2 rounded-10 fs-5 fwbold mt-3 mb-3">Send Inquiry</button>
            
                    </div>
                  </div>
                </div>
              </div>
            </form>
          
            <app-otp *ngIf="this.requirementService.isVerification"
            [countryCode]="this.requirementService.prodDetailFrom.value.noCode"
            [mobileNo]="this.requirementService.prodDetailFrom.value.mobileNo"></app-otp>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

        </body></html>
<?php
include "footer.php";
?>