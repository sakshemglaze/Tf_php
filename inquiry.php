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
