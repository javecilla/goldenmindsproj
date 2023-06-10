<!DOCTYPE html>
<html lang="en">
<head>
  <title>Online Application - Golden Minds Bulacan</title>
  <?php require_once __DIR__ . '/components/links.php'; ?>
  <style>
    .center {
      display: flex;
      justify-content: center;
      align-items: center;
    }


    .qualifications_card {
      width: 97%;
      border-bottom: 2px solid #996515;
      text-align: justify; 
      text-justify: inter-word;
    }

    .qualifications_card .quali-head-title {
      font-size: 18px;
    }

    .quali-label, .quali-input, .quali-select {
      font-size: 15px!important;
      color: #212529!important;
      opacity: .8;
    }

    input[type="radio"],
    label.radio {
      cursor: pointer;
    }

    label.radio:hover {
      text-decoration: underline;
    }

    p.snote {
      font-size: 15px!important;
      color: #212529!important;
      opacity: .8;
    }


 
    .preregister-box {
      display: flex;
      justify-content: center;
      align-items: center;
      width: 87%;
      margin-top: 4%;
    }
    .f-card {
      border: 1px solid #DE673E!important;
    }

    .f-header {
      background: #DE673E;
    }

    p.reminderp, p.infomationp {
      font-size: 15px!important;
    }

    .s-card {
      border-top: 5px solid #FAD419!important;
      margin-top: -3%!important;
    }

    .t-card {
      border-top: 5px solid #5BCE43!important;
      margin-top: -3%!important;
    }
    .date-reg-label {
      font-size: 15px;
    }

    .date-reg {
      font-size: 15px;
    }

    .f-header-col-2 {
      background: #5F76E8;
    }

    /*progressbar*/
    #progressbar {
        margin-bottom: 30px;
        overflow: hidden;
        /*CSS counters to number the steps*/
        counter-reset: step;
    }
    #progressbar li {
        list-style-type: none;
        color: #868e96;
        text-transform: uppercase;
        font-size: 11px!important;
        float: left;
        position: relative;
        letter-spacing: 1px;
        width: 25%;
    }
    #progressbar li:before {
        content: counter(step);
        counter-increment: step;
        width: 24px;
        height: 24px;
        display: flex;
        align-items: center;
        justify-content: center;
        line-height: -10px;
                    
        font-size: 12px;
        color: #868e96;
        background: #fff;
        border-radius: 25px;
        margin: 0 auto 8px auto;
    }
    /*marking active/completed steps blue*/
    /*The number of the step and the connector before it = blue*/
    #progressbar li.active:before, #progressbar li.active:after {
        background: #5F76E8!important;
        fill: #5F76E8!important;
        color: white;
    }
    #progressbar li.noactive:before, #progressbar li.noactive:after {
        background: gray!important;
        fill: gray!important;
        color: white;
        opacity: .3;
    }
    .progress {
        height: 5px;
    }

    .pword-requirements {
        display: none;
    }
    .pword-requirements ul{
      padding: 0;
      margin: 0 0 10px;
      list-style-type: none;
    }
    .pword-requirements ul li {
        font-size: 10px!important;
        color: red;
    }

    .pword-requirements ul li.activeli {
        color: green;
    }

    .pword-requirements ul li span:before {
        content: "✖";
    }

    .pword-requirements ul li.activeli span:before {
        content: "✔";
        
    }
    .eye {
        background: transparent!important;
    }
    .eye:hover {
        color: gray!important;
        opacity: .8!important;
    }
    /* Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }

    /* Firefox */
    input[type=number] {
      -moz-appearance: textfield;
    }
    input,
    input::placeholder {
        font-size: 12px!important;
    }
    select,
    option {
      font-size: 13px!important;
    }
    small.guide {
      font-size: 11px!important;
      line-height: 4px!important;
    }

    label {
      font-size: 12px!important;
      color: #1c2d41;
    }
    label.typeform {
      font-size: 16px!important;
      color: #1c2d41;
      border-bottom: 2px solid #5F76E8!important;
    }
    .radio {
      cursor: pointer;
    }
    .radio:hover {
      text-decoration: underline;
    }

    input.is-optional {
      border: 1px solid #fdc16a;
    }
    input.is-default {
      border: 1px solid #5F76E8!important;
    }
    span.age {
      font-size: 13px;
    }
 
  </style>
</head>
<body>
  <main id="main_content">
    <?php require_once __DIR__ . '/components/header.php';?>
		<?php require_once __DIR__ . '/components/navbar.php'; ?>

    <?php
    if(isset($_GET['at'])) {
      if($_GET['at'] == 'pre_kinder') {
        ?>
        <h4>pre kinder</h4>
        <?php
      }
      else if($_GET['at'] == 'jhs') {
        ?>  
          <h4>jhs</h4>
        <?php
      }
      else if($_GET['at'] == 'elementary') {
        ?>
        <h4>elementary</h4>
        <?php
      }
      else if($_GET['at'] == 'shs') {
        if(isset($_GET['form']) && $_GET['form'] == 'qualifications') {
          ?>
            <div class="auth-wrapper center" id="center">
              <div class="card qualifications_card">
                <div class="card-header" style="background-color: #996515; color:#fff; opacity: .8;">
                  <h2 class="text-white quali-head-title pb-3">Qualifications</h2>
                </div>
                <div class="card-body">
                  <h6 class="card-title text-muted">Please answer all the following questions</h6><hr class="text-muted">
                  <form action="/" method="/" id="qualification_form"> 
                    <div class="row">
                      <!-- first column -->
                      <div class="col-lg-6">
                        <div class="first-q">
                          <label class="mb-1 quali-label"><strong>1. What is your relationship to the applicant?</strong></label>
                          <select class="form-select quali-select" id="relationship">
                            <option value="" selected>Please select an answer...</option>
                            <option value="Applicant">I am the applicant</option>
                            <option value="Daughter">My son/daughter</option>
                            <option value="Relative">My relative(brother/sister/nephew/niece/cousin/father/mother/etc.)</option>
                            <option value="Friend">My friend</option>
                            <option value="Workmate">My colleague/workmate</option>
                          </select>
                        </div>

                        <div class="second-q mt-4 radio-group" data-input-id="academic_status">
                          <label class="mb-1 quali-label"><strong>2. What is the academic status of the applicant?</strong></label>
                          <div class="form-control" id="academicStatus">
                            <label class="radio quali-label">
                              <input type="radio" name="academic_status" value="first"/> An JHS(Grade 10) graduating student this october 2023 or later
                            </label>
                            <label class="mt-1 radio quali-label">
                              <input type="radio" name="academic_status" value="second"/> Graduated JHS(Grade 10) already or will graduate on or before August 2023
                            </label>
                            <input type="hidden" id="academic_status"/>
                          </div>
                        </div>

                        <div class="third-q mt-4 radio-group" data-input-id="citizen">
                          <label class="mb-1 quali-label"><strong>3. Is the applicant a Filipino citizen?</strong></label>
                          <div class="form-control" id="isFiliCitizen">
                            <label class="radio quali-label">
                              <input type="radio" name="citizen" value="Yes"/> Yes
                            </label>&nbsp;&nbsp;
                            <label class="radio quali-label">
                              <input type="radio" name="citizen" value="No"/> No
                            </label>
                            <input type="hidden" id="citizen"/>
                          </div>
                        </div>

                        <div class="fourth-q mt-4 mb-4 radio-group" data-input-id="living_philippines">
                          <label class="mb-1 quali-label"><strong>4. Is the applicant currently living in the Philippines?</strong></label>
                          <div class="form-control" id="isLivingPh">
                            <label class="radio quali-label">
                              <input type="radio" name="living_philippines" value="Yes"/> Yes
                            </label>&nbsp;&nbsp;
                            <label class="radio quali-label">
                              <input type="radio" name="living_philippines" value="No"/> No
                            </label>
                            <input type="hidden" id="living_philippines"/>
                          </div>
                        </div>

                      </div>

                      <!-- second column -->
                      <div class="col-lg-6"> 
                        <div class="fifth-q radio-group" data-input-id="already_enrolled">
                          <label class="mb-1 quali-label"><strong>5. Is the applicant already enrolled (or was previously enrolled) in other Golden Minds Branch/Campus or other schools?</strong></label>
                          <div class="form-control" id="isEnrolled">
                            <label class="radio quali-label">
                              <input type="radio" name="already_enrolled" value="Yes" class="custom-control-input"/> Yes
                            </label>&nbsp;&nbsp;
                            <label class="radio quali-label">
                              <input type="radio" name="already_enrolled" value="No" class="custom-control-input"/> No
                            </label>
                            <input type="hidden" id="already_enrolled"/>
                          </div>
                        </div>
                        <div class="six-q mt-4 radio-group" data-input-id="first_time">
                          <label class="mb-1 quali-label"><strong>6. Is this the applicant's first time applying for Golden Minds? </strong></label>
                          <div class="form-control" id="firstApply">
                            <label class="radio quali-label">
                              <input type="radio" name="first_time" value="Yes" class="custom-control-input"/> Yes
                            </label>&nbsp;&nbsp;
                            <label class="radio quali-label">
                              <input type="radio" name="first_time" value="No" class="custom-control-input"/> No
                            </label>
                            <input type="hidden" id="first_time"/>
                          </div>
                        </div>
                        <div class="seven-q mt-4">
                          <label class="mb-1 quali-label"><strong>7. Which Golden Minds Campus is the applicant applying for? </strong></label>
                          <select class="form-select quali-select" id="campus">
                            <option value="" selected>Select your preferred SIMS Branch/Campus...</option>
                            <option value="Sta. Maria, Bulacan">Sta. Maria, Bulacan</option>
                            <option value="Balagtas, Bulacan">Balagtas, Bulacan</option>
                          </select>
                        </div>
                        <div class="mt-4 ">
                          <p class="mb-1 snote"><strong>Note: Prior to filling out the application form, it is advisable for the applicant to have a formal 1x1 or 2x2 photograph prepared for their student profile. The file or image must follow this format: [jpg, png, jpeg]. 
                            <a href="javascript:void(0)" class="seeSample" style="color: #996515; opacity: .8;">Please click here to the example</a></strong>
                          </p>
                        </div>
                      </div><!--end second column-->
                    </div><!--row-->
                    <div class="actions-btn mt-4">
                      <button type="button" onclick="cancel('signin')" class="btn btn-secondary btn-sm ">Cancel (Back to Signin)</button>
                      <button type="button" id="next" class="btn btn-sm float-end" style="background-color: #996515; color:#fff; opacity: .8;">
                        Next <i class=" fas fa-arrow-right"></i>
                      </button>
                    </div>
                  </form> 
                </div><!--card body-->
              </div><!--card-->
            </div><!--End login box-->
          </div><!--end wrapper-->

          <!-- script for qualification form -->
          <script defer>
            $('.seeSample').on('click', function(e) {
              e.preventDefault();
              Swal.fire({
                title: 'Sample Photo:',
                html: '<img src="resources/images/general/sample.jpg" class="p-2 img-thumbnail img-responsive" width="150">',
                confirmButtonText: 'Okay',
                confirmButtonColor: '#996515',
                allowEscapeKey : false,
                allowOutsideClick: false
              });
            });

            $('#next').on('click', function(e) {
              e.preventDefault();
              var relation = $('#relationship').val();
              var status = $('#academic_status').val();
              var citizen = $('#citizen').val();
              var livingInPh = $('#living_philippines').val();
              var alreadyEnrolled = $('#already_enrolled').val();
              var firstTimeApply = $('#first_time').val();
              var preferredCampus = $('#campus').val();

              if(isEmpty(relation) || isEmpty(status) || isEmpty(citizen) || isEmpty(livingInPh) || isEmpty(alreadyEnrolled) || isEmpty(firstTimeApply) || isEmpty(preferredCampus)) {
                //alert("Failed");
                Swal.fire({
                  title: "Warning",
                  text: "All fields is required!",
                  icon: "error",
                  confirmButtonText: "Close",
                  confirmButtonColor: "#cc3f5a",
                  showConfirmButton: true,
                  allowEscapeKey : false,
                  allowOutsideClick: false
                }).then((result) => {
                  if(result.isConfirmed) {
                    $('#relationship').addClass('is-invalid');
                    $('#academicStatus').addClass('is-invalid');
                    $('#isFiliCitizen').addClass('is-invalid');
                    $('#isLivingPh').addClass('is-invalid');
                    $('#isEnrolled').addClass('is-invalid');
                    $('#firstApply').addClass('is-invalid');
                    $('#campus').addClass('is-invalid');
                  }
                }); 
              } else {
                alert("Success");
                window.location.href = 'online_application?at=' + '<?=$_GET['at']?>&mode=create_acct';
              }
            });
          </script>
          <?php
        }
        if(isset($_GET['mode'])) {
          if($_GET['mode'] == 'create_acct') {
            ?>
            <div class="auth-wrapper center">
              <div class="preregister-box">
                <div class="row">
                  <!-- start first column -->
                  <div class="col-md-4">
                    <div class="card border-danger f-card">
                      <div class="card-header f-header p-1"><h5 class="mb-0 text-white p-2">Reminder</h5></div>
                      <div class="card-body p-0">
                        <p class="card-text p-3 reminderp" style="text-align: justify; text-justify: inter-word;">
                          An applicant is only allowed to have one (1) account to apply and one (1) admission evaluation 
                          for Golden Minds Branch/Campus. Multiple accounts, multiple applications, and falsification of 
                          submitted information will disqualify your admission to Golden Minds.
                        </p>
                      </div>
                    </div>

                    <div class="card border-danger s-card">
                      <div class="card-body p-0">
                        <p class="card-text p-3 infomationp" style="text-align: justify; text-justify: inter-word;">
                          This is form is for <b>Sta. Maria, Campus Admission</b>.
                          Please make sure that the information you will provide is true and correct.
                          <br/><br/>
                          All fields are required.
                        </p>
                      </div>
                    </div>

                    <div class="card border-danger t-card">
                      <div class="card-body p-0">
                        <p class="card-text p-3">
                          <span class="applicant">
                              <span class="date-reg-label">Applicant:</span>&nbsp; 
                              <strong><span class="date-reg ">email</span></strong>
                          </span><br/>
                          <span class="applicant">
                              <span class="date-reg-label">LRN:</span>&nbsp; 
                              <strong><span class="date-reg ">lrn</span></strong>
                          </span>
                          <br/>
                          <span class="date-reg-label">Date of Registration</span>:&nbsp; 
                          <strong><span class="date-reg">May 13, 2023</span></strong>
                        </p>
                      </div>
                    </div>
                  </div><!--end first column-->
                </div><!--row-->
              </div><!--end preregister box-->
            </div><!--auth wrapper-->
            <?php
          }
        }
      }
      else if($_GET['at'] == 'main') {
        ?>
        <center id="center">
          <div class="card bg-light mt-4" style="width: 100%;">
            <div class="conatiner-fluid content-inner py-0">
              <div>
                <div class="row">
                  <div class="col-lg-6 col-md-9">
                    <div class="bd-example">
                      <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="" aria-label="Slide 1"></button>
                          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2" class="active" aria-current="true"></button>
                        </div>
                        <div class="carousel-inner">
                          <div class="carousel-item">
                            <center>
                              <img src="resources/images/general/gmc/gmc_test2.jpg" class="img-thumbnail img-responsive" alt="" width="400"/>
                            </center>
                          </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Next</span>
                        </button>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-6">
                    <a href="online_application?at=pre_kinder">
                      <div class="card">
                        <div class="card-body">
                          <div class="d-flex align-items-center justify-content-between mt-1">
                            <div>
                              <h3 class="counter">Pre-Kinder</h3>
                              <button type="button" class="btn btn-warning btn-sm mt-3">Enroll Now</button>
                            </div>
                            <div class="border  bg-soft-warning rounded p-3">
                              <i class="fa-solid fa-users"></i>
                            </div>
                          </div>
                          <div class="mt-4">
                            <div class="progress bg-soft-warning shadow-none w-100" style="height: 6px">
                              <div class="progress-bar bg-warning" data-toggle="progress-bar" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </a>

                    <a href="online_application?at=jhs&form=qualifications">
                      <div class="card">
                        <div class="card-body">
                          <div class="d-flex align-items-center justify-content-between mt-1">
                            <div>
                              <h4 class="counter">Junior High School</h4>
                              <button type="button" class="btn btn-danger btn-sm mt-3"
                              style="margin-left: -70px">Enroll Now</button>
                            </div>
                            <div class="border  bg-soft-danger rounded p-3">
                              <i class="fa-solid fa-users"></i>
                            </div>
                          </div>
                          <div class="mt-4">
                            <div class="progress bg-soft-danger shadow-none w-100" style="height: 6px">
                              <div class="progress-bar bg-danger" data-toggle="progress-bar" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </a>
                  </div>

                  <div class="col-lg-3 col-md-6">
                    <a href="online_application?at=elementary">
                      <div class="card">
                        <div class="card-body">
                          <div class="d-flex align-items-center justify-content-between mt-1">
                            <div>
                              <h3 class="counter">Elementary</h3>
                              <button type="button" class="btn btn-success btn-sm mt-3">Enroll Now</button>
                            </div>
                            <div class="border  bg-soft-success rounded p-3">
                              <i class="fa-solid fa-users"></i>
                            </div>
                          </div>
                          <div class="mt-4">
                            <div class="progress bg-soft-success shadow-none w-100" style="height: 6px">
                              <div class="progress-bar bg-success" data-toggle="progress-bar" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </a>

                    <a href="online_application?at=shs&form=qualifications">
                      <div class="card">
                        <div class="card-body">
                          <div class="d-flex align-items-center justify-content-between mt-1">
                            <div>
                              <h4 class="counter">Senior High School</h4>
                              <button type="button" class="btn btn-primary btn-sm mt-3" 
                              style="margin-left: -70px">Enroll Now</button>
                            </div>
                              <div class="border  bg-soft-primary rounded p-3">
                              <i class="fa-solid fa-users"></i>
                            </div>
                          </div>
                          <div class="mt-4">
                            <div class="progress bg-soft-primary shadow-none w-100" style="height: 6px">
                              <div class="progress-bar bg-primary" data-toggle="progress-bar" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </a>
                  </div>
                
                </div>
              </div>
            </div>
          </div>
        </center>
        <?php
      } 
    } 
    else {
      require_once __DIR__ . '/components/404.php';
    }
    ?>
  
    <?php require_once __DIR__ . '/components/footer.php'; ?>
  </main>
</body>
</html>