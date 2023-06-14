<?php
session_start();
$timezone = date_default_timezone_set('Asia/Manila');
if(isset($_SESSION['campusSelected'])) {
  $campusSelected = $_SESSION['campusSelected'];
}
?>
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
      font-size: 16px;
    }

    .quali-label, .quali-input, .quali-select {
      font-size: 14px!important;
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
      width: 95%;
      margin-top: 4%;
    }
    .f-card {
      border: 1px solid #DE673E!important;
    }

    .f-header {
      background: #DE673E;
    }

    p.reminderp, p.infomationp {
      font-size: 13px!important;
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
      font-size: 13px;
    }

    .date-reg {
      font-size: 13px;
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
        font-size: 13px!important;
        float: left;
        position: relative;
        letter-spacing: 1px;

        width: 24%;
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
        font-size: 13px!important;
        color: red;
    }

    .pword-requirements ul li.activeli {
        color: green;
    }

    .pword-requirements ul li span:before {
        content: "X";
    }

    .pword-requirements ul li.activeli span:before {
        content: "✓";
        
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
        font-size: 13px!important;
    }
    select,
    option {
      font-size: 13px!important;
    }
    small.guide {
      font-size: 13px!important;
      line-height: 4px!important;
    }

    label {
      font-size: 13px!important;
      color: #1c2d41;
    }
    label.typeform {
      font-size: 14px!important;
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
    .col-form-label {
      font-size: 15px!important;
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

          <?php
        }
        if(isset($_GET['mode'])) {
          ?>
             <div class="auth-wrapper center">
              <div class="preregister-box">
                <div class="row">
                  <!-- start first column -->
                  <div class="col-md-4">
                    <div class="card border-danger f-card">
                      <div class="card-header f-header p-1"><h5 class="mb-0 text-white p-2">Reminder</h5></div>
                      <div class="card-body p-0">
                        <p class="card-text p-3 reminderp" style="text-align: justify; text-justify: inter-word; color: #000;">
                          An applicant is only allowed to have one (1) account to apply and one (1) admission evaluation 
                          for Golden Minds Branch/Campus. Multiple accounts, multiple applications, and falsification of 
                          submitted information will disqualify your admission to Golden Minds.
                        </p>
                      </div>
                    </div>

                    <div class="card border-danger s-card">
                      <div class="card-body p-0">
                        <p class="card-text p-3 infomationp" style="text-align: justify; text-justify: inter-word; color: #000;">
                          This is form is for <b><?=$campusSelected?></b>.
                          Please make sure that the information you will provide is true and correct.
                          <br/><br/>
                          All fields are required.
                        </p>
                      </div>
                    </div>
                    <div class="card border-danger t-card">
                      <div class="card-body p-0">
                        <p class="card-text p-3" style="color: #000">
                          <?php
                            if(isset($_SESSION['useremail']) && isset($_SESSION['lrn'])) {
                              ?>
                              <span class="applicant">
                                <span class="date-reg-label">Applicant:</span>&nbsp; 
                                <strong><span class="date-reg "><?=$_SESSION['useremail']?></span></strong>
                              </span><br/>
                              <span class="applicant">
                                <span class="date-reg-label">LRN:</span>&nbsp; 
                                <strong><span class="date-reg "><?=$_SESSION['lrn']?></span></strong>
                              </span>
                              <?php
                            }
                          ?>
                          <br/>
                          <span class="date-reg-label">Date of Registration</span>:&nbsp; 
                          <strong><span class="date-reg"><?php echo date("F j, Y")?></span></strong>
                        </p>
                      </div>
                    </div>
                  </div><!--end first column-->
                  <!-- start second column -->
                  <div class="col-md-8">
                    <form method="POST" enctype="multipart/form-data" id="ThisForm"
                    class="ThisForm form-inline" role="form" autocomplete="off">
                      <?php
                        if($_GET['mode'] == 'create_acct') {
                          ?>
                            <div class="card">
                              <div class="card-header f-header-col-2 p-1">
                                <h5 class="mb-0 text-white p-2"><span>Create Account</span></h5>
                              </div>
                                <!-- start progressbar -->
                                <center>
                                  <div class="progress mt-5 mb-2" style="width: 90%;">
                                    <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="15" aria-valuemin="0" 
                                    aria-valuemax="100" style="width: 15%;"></div>
                                  </div>
                                </center>
                                <!-- step form list -->
                                <ul id="progressbar" class="text-center">
                                  <li class="active text-capitalize">Create Account</li>
                                  <li class="noactive text-capitalize">Fill-up Form</li>
                                  <li class="noactive text-capitalize">Finalized Form</li>
                                  <li class="noactive text-capitalize">Check Result</li>
                                </ul>
                                <!-- start input fields for first column -->                        
                                <div class="form-group row p-3">
                                  <!-- type of form -->
                                  <center><label class="text-uppercase typeform mb-4">Account Information</label></center>
                                  <label for="" class="col-sm-3 col-form-label" >
                                    <strong>Student LRN</strong>:
                                  </label>
                                  <div class="col-sm-9 mb-3">
                                    <div class="input-group">
                                      <input type="number" class="form-control" id="lrn" placeholder="LRN" autocomplete="off" />
                                      <span class="input-group-text eye"><i class=" fas fa-user"></i></span>
                                    </div>
                                    <small class="guide">Please enter your LRN</small>
                                  </div>

                                  <label for="" class="col-sm-3 col-form-label">
                                    <strong>Contact No.</strong>:
                                  </label>
                                  <div class="col-sm-9 mb-3">
                                    <div class="input-group">
                                      <input type="number" class="form-control" id="phonenum" placeholder="Phone number" autocomplete="off" />
                                      <span class="input-group-text eye"><i class="fas fa-phone"></i></span>
                                    </div>
                                    <small class="guide">Your valid phone number. Example: [(+63) 900 0000 000]</small>
                                  </div>

                                  <label for="" class="col-sm-3 col-form-label">
                                    <strong>E-mail Address</strong>:
                                  </label>
                                  <div class="col-sm-9 mb-3">
                                    <div class="input-group">
                                      <input type="text" class="form-control" id="email" placeholder="E-mail Address" autocomplete="off"/>
                                      <span class="input-group-text eye"><i class="fas fa-envelope"></i></span>
                                    </div>
                                    <small class="guide">Your valid e-mail address, which you can access anytime.</small><br/><br/>
                                    <div class="input-group">
                                      <input type="text" class="form-control" id="remail" placeholder="Re-type your e-mail address again" autocomplete="off"/>
                                      <span class="input-group-text eye" id=""><i class="fas fa-envelope"></i></span>
                                    </div>
                                    <small class="guide mb-3">Re-type your e-mail address again</small><br/>
                                    <small class="guide"><span><b>Note</b></span>: You can only use one(1) e-mail address per online registration and this email is use to in order to login your account in SIMS iApply.</small>
                                  </div>


                                  <label for="" class="col-sm-3 col-form-label">
                                    <strong>Password</strong>:
                                  </label>
                                  <div class="col-sm-9">
                                    <div class="input-group">
                                      <input type="password" class="form-control" id="pword" placeholder="Password" autocomplete="off" onpaste="false" aria-label="password" aria-describedby="basic-addon1"/>
                                      <span class="input-group-text eye"><i class="fas fa-lock"></i></span>
                                    </div>
                                    <small class="guide mb-5">Use a very strong password and remember it always</small><br/>
                                    <div class="pword-requirements">
                                      <ul>
                                        <li class="lowercase"><span></span> Must contain at least <b>one lowercase letter</b></li>
                                        <li class="uppercase"><span></span> Must contain at least <b>one uppercase letter</b></li>
                                        <li class="hasNum"><span></span> Must contain at least <b>one number</b></li>
                                        <li class="hasSpecialChar"><span></span> Must contain at least <b>one special characters</b></li>
                                        <li class="hasEightchar"><span></span> Minimum of <b>eight (8) characters</b></li>
                                      </ul>
                                    </div>
                                    <div class="input-group mt-3" id="show_hide_password">
                                      <input type="password" class="form-control" id="repword" placeholder="Re-type your password again" autocomplete="off" onpaste="false" />
                                      <a href="javascript:void(0)" class="input-group-text eye"><i class="fas fa-eye-slash"></i></a>
                                    </div>
                                    <small class="guide">Re-type your password again</small>
                                  </div>
                                </div> <!--end form group-->
                                <div class="actions-btn mt-4 p-3">
                                  <button type="button" onclick="cancel('signin')" class="btlogin btn btn-secondary btn-sm">Cancel</button>
                                  <button type="button" id="step1" class="btn btn-success btn-sm float-end">
                                    Next <i class=" fas fa-arrow-right"></i>
                                  </button>
                                </div>
                              </div><!--card body column 2-->
                            </div><!--card column 2-->
                          <?php
                        }
                        else if($_GET['mode'] == 'fill_up') {
                          ?>
                            <div class="card">
                              <div class="card-header f-header-col-2 p-1">
                                <h5 class="mb-0 text-white p-2">Enrollment Form / 
                                  <span>Fill-up Application Form</span>
                                </h5>
                              </div>
                              <div class="card-body p-0">
                              <!-- start progressbar -->
                              <center>
                                <div class="progress mt-5 mb-2" style="width: 90%;">
                                  <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="15" 
                                    aria-valuemin="0" aria-valuemax="100" style="width: 45%;">
                                  </div>
                                </div>
                              </center>
                              <ul id="progressbar" class="text-center">
                                <li class="active text-capitalize">
                                  <span class="hidden-xs">Create Account</span></li>
                                <li class="active text-capitalize">
                                  <span class="hidden-xs">Fill-up Form</span></li>
                                <li class="noactive text-capitalize">
                                  <span class="hidden-xs">Finalized Form<span></li>
                                <li class="noactive text-capitalize">
                                  <span class="hidden-xs">Check Result</span></li>
                              </ul>
                        
                              <!-- start input fields for step2 -->
                              <div class="form-group row p-2">
                                <!-- type of form -->
                                <center><label class="text-uppercase typeform mb-4">Applying For</label></center>
                                <label for="" class="col-sm-3 col-form-label label">
                                  <strong>Application Type</strong>:
                                </label>
                                <div class="col-sm-9 mb-3">
                                  <select class="form-select" id="applicType">
                                    <option value="defaultSelected" selected>--SELECT--</option>
                                    <option value="Freshman">Freshman</option>
                                    <option value="Transfery">Transfery</option>
                                    <option value="ALS">ALS</option>
                                  </select>
                                  <small class="guide">Select your application type</small>
                                </div>

                                <label for="" class="col-sm-3 col-form-label label">
                                  <strong>Academic Year & Term</strong>:
                                </label>
                                <div class="col-sm-9 mb-3">
                                  <select class="form-select" id="academicYear">
                                    <option value="defaultSelected" selected>--SELECT--</option>
                                    <option value="2023-2024-1st Semester">2023-2024-1st Semester</option>
                                    <option value="2023-2024-2nd Semester">2023-2024-2nd Semester</option>
                                  </select>
                                  <small class="guide">Select the academic year you applying for</small>
                                </div>

                                <label for="" class="col-sm-3 col-form-label label">
                                  <strong>School Campus</strong>:
                                </label>
                                <div class="col-sm-9 mb-3">
                                  <input type="text" class="form-control" style="cursor: no-drop" value="<?php echo $_SESSION['campusSelected'];?>" id="campus" readonly/>
                                  <small class="guide">This branch/campus is selected because you select this campus in qualification form as preferred campus. Make sure that the information you entered is true and correct.</small>
                                </div>

                                <label for="" class="col-sm-3 col-form-label label">
                                  <strong>Strand</strong>:
                                </label>
                                <div class="col-sm-9 mb-3">
                                  <select class="form-select" id="strand">
                                    <option value="defaultSelected" selected>--SELECT--</option>
                                    <option value="Science, Technology, Engineering, and Mathematics (STEM)">
                                      Science, Technology, Engineering, and Mathematics (STEM)
                                    </option>
                                    <option value="Accountancy, Business and Management (ABM)">
                                      Accountancy, Business and Management (ABM)
                                    </option>
                                    <option value="Humanities and Social Sciences (HUMSS)">
                                      Humanities and Social Sciences (HUMSS)
                                    </option>
                                    <option value="Technical-Vocational Livelihood Information Communication and Technology (TVL-ICT)">
                                      Technical-Vocational Livelihood Information Communication and Technology (TVL-ICT)
                                    </option>
                                    <option value="Technical-Vocational Livelihood Home Economics (TVL-HE)">
                                      Technical-Vocational Livelihood Home Economics (TVL-HE)
                                    </option>
                                    <option value="General Academic Strand (GAS)">
                                      General Academic Strand (GAS)
                                    </option>
                                  </select>
                                  <small class="guide">Select your preferred strand</small>
                                </div>

                                <label for="" class="col-sm-3 col-form-label label">
                                  <strong>Grade / Level</strong>:
                                </label>
                                <div class="col-sm-9 mb-3">
                                  <select class="form-select" id="gradeLevel">
                                    <option value="defaultSelected" selected>--SELECT--</option>
                                    <option value="Grade 11">Grade 11</option>
                                    <option value="Grade 12">Grade 12</option>
                                  </select>
                                  <small class="guide">Select your grade level</small>
                                </div>

                                <!-- type of form -->
                                <center><label class="text-uppercase typeform mb-4">Personal Information</label></center>

                                <label for="firstname" class="col-sm-3 col-form-label">
                                  <strong>First Name</strong>:
                                </label>
                                <div class="col-sm-9 mb-3">
                                  <input type="text" class="form-control" id="fname" placeholder="First Name" autocomplete="off"/>
                                  <small class="guide">Your complete first name based on your PSA birth certificate</small>
                                </div>

                                <label for="lastname" class="col-sm-3 col-form-label">
                                  <strong>Last Name</strong>:
                                </label>
                                <div class="col-sm-9 mb-3">
                                  <input type="text" class="form-control" id="lname" placeholder="Last Name" autocomplete="off"/>
                                  <small class="guide">Your complete last name based on your PSA birth certificate</small>
                                </div>

                                <label for="middlename" class="col-sm-3 col-form-label">
                                  <strong>Middle Name</strong>:
                                </label>
                                <div class="col-sm-9 mb-3">
                                  <input type="text" class="form-control" id="mname" placeholder="Middle Name" autocomplete="off"/>
                                  <div class="row">
                                    <div class="col-6">
                                      <label><strong>M.I</strong></label>
                                      <input type="text" maxlength="1" id="MI" class="form-control" placeholder="S" />
                                    </div>
                                    <div class="col-6">
                                      <label><strong>Ext.</strong></label>
                                      <input type="text" maxlength="5" id="extname" class="form-control" placeholder="Jr., Sr. lll" />
                                    </div>
                                  </div>
                                  <small class="guide">Your complete middle name, your middle initial and your extension name based on your PSA birth certificate (Leave it blank if not applicable to you)</small><br/>
                                </div>                          

                                <label for="" class="col-sm-3 col-form-label">
                                  <strong>Date of Birth</strong>:
                                </label>
                                <div class="col-sm-9 mb-3">
                                  <div class="input-group">
                                    <span class="input-group-text"><span class="age">Age</span> </span>
                                    <input type="date" class="form-control" id="dob" name="dob"/>
                                  </div>
                                  <small class="guide">Select the month, day and year of your birth, or type it following this format: mm/dd/yyyy (Example: 03/24/2004)</small>
                                </div>

                                <label for="lastname" class="col-sm-3 col-form-label">
                                  <strong>Place of Birth</strong>:
                                </label>
                                <div class="col-sm-9 mb-3">
                                  <input type="text" class="form-control" id="pob" placeholder="Place of Birth" autocomplete="off"/>
                                  <small class="guide">Your complete place of birth based on your PSA birth certificate</small>
                                </div>

                                <label for="" class="col-sm-3 col-form-label label">
                                  <strong>Gender</strong>:
                                </label>
                                <div class="col-sm-9 mb-3" data-input-id="gender">
                                  <div class="form-control" id="selectedGender">
                                    <label class="radio">
                                      <input type="radio" name="gender" class="male"/> Male
                                    </label>&nbsp;&nbsp;&nbsp;
                                    <label class="radio">
                                      <input type="radio" name="gender" class="female"/> Female
                                    </label>&nbsp;&nbsp;&nbsp;
                                    <label class="radio">
                                      <input type="radio" name="gender" class="others"/> Others
                                    </label>
                                    <input type="hidden" id="gender" class="gender"/>
                                  </div>
                                  <small class="guide">Please select your gender</small>
                                </div>

                                <label for="" class="col-sm-3 col-form-label label">
                                  <strong>Civil Status</strong>:
                                </label>
                                <div class="col-sm-9 mb-3">
                                  <select class="form-select" id="civilStatus">
                                    <option value="defaultSelected" selected>--SELECT--</option>
                                    <option value="Single">Single</option>
                                    <option value="Married ">Married </option>
                                    <option value="Divorced ">Divorced </option>
                                    <option value="Widowed  ">Widowed  </option>
                                  </select>
                                  <small class="guide">Select your civil / marital status </small>
                                </div>

                                <label for="" class="col-sm-3 col-form-label">
                                  <strong>Province / Region</strong>:
                                </label>
                                <div class="col-sm-9 mb-3">
                                  <input type="text" class="form-control" id="province" placeholder="Province / Region" autocomplete="off"/>
                                  <small class="guide">Please enter your province or region</small>
                                </div>

                                <label for="" class="col-sm-3 col-form-label">
                                  <strong>City / Municipality</strong>:
                                </label>
                                <div class="col-sm-9 mb-3">
                                  <input type="text" class="form-control" id="city" placeholder="City" autocomplete="off"/>
                                  <small class="guide">Please enter your city</small>
                                </div>

                                <label for="" class="col-sm-3 col-form-label">
                                  <strong>Address</strong>:
                                </label>
                                <div class="col-sm-9 mb-3">
                                  <input type="text" class="form-control" id="address" placeholder="Address" autocomplete="off"/>
                                  <small class="guide">Your complete current address based on your PSA birth certificate. Example: [Ph7, Blk3, Lot24 Demacia St. Brgy. Summon]</small>
                                </div>

                                <label for="" class="col-sm-3 col-form-label">
                                  <strong>Nationality</strong>:
                                </label>
                                <div class="col-sm-9 mb-3">
                                  <input type="text" class="form-control" id="nationality" placeholder="Nationality" autocomplete="off"/>
                                  <small class="guide">Please enter your nationality</small>
                                </div>

                                <label for="" class="col-sm-3 col-form-label">
                                  <strong>Religion</strong>:
                                </label>
                                <div class="col-sm-9 mb-3">
                                  <input type="text" class="form-control" id="religion" placeholder="Religion" autocomplete="off"/>
                                  <small class="guide">Please enter your religion</small>
                                </div>

                                <label for="" class="col-sm-3 col-form-label">
                                  <strong>Ethnicity</strong>:
                                </label>
                                <div class="col-sm-9 mb-3">
                                  <input type="text" class="form-control" id="ethnicity" placeholder="Ethnicity" autocomplete="off"/>
                                  <small class="guide">Your ethnicity (Leave it blank if not applicable to you)</small>
                                </div>
                              </div><!--end form inputs-->

                              <div class="actions-btn mt-4 p-3">
                                <button type="button" onclick="cancel('signin')" class="btlogin btn btn-secondary btn-sm">Cancel</button>
                                <button type="button" id="step2" class="btn btn-success btn-sm float-end">
                                  Continue <i class=" fas fa-arrow-right"></i>
                                </button>
                              </div>
                            </div><!--card body column 2-->
                          </div><!--card column 2-->
                          <?php
                        }
                      ?>  
                    </form>
                  </div>
                </div><!--row-->
              </div><!--end preregister box-->
            </div><!--auth wrapper-->
          <?php
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

<script defer>
  //======================
  //  RE-USABLE  FUNCTION
  //======================

  //to check fields val
  function isEmpty(field) {
    return field === '';
  }

  //back to signin
  function cancel(url) { 
    Swal.fire({
      title: "Confirm",
      text: "You are about to leave this page.",
      icon: "info",
      customClass: 'swal-wide',
      confirmButtonText: "Leave",
      confirmButtonColor: "#149ddd",
      showCancelButton: true,
      cancelButtonText: "Cancel",
      allowEscapeKey : false,
      allowOutsideClick: false
    }).then((response) => {
      if(response.isConfirmed) {
        $.ajax({
          method: "POST",
          url: "api/data.php",
          data: { cancelReg: true },
          success: function(response) {
            //window.location.replace('home');
            // window.history.go(-2);
            window.location.href= 'home';
          }
        });
      }
    });
  }

  //radio selection
  const radioGroups = document.querySelectorAll('.radio-group');
  radioGroups.forEach(group => {
    group.addEventListener('click', event => {
      const inputId = event.target.closest('.radio-group').dataset.inputId;
      const radioValue = event.target.value;
      const inputElement = document.getElementById(inputId);
      inputElement.value = radioValue;
    });
  });

  //validate input onkeyup
  function validateInput(input, errorMsg) {
    input.keyup(function() {
      var inputVal = $(this).val();
      if(inputVal === '') {
        input.addClass('is-invalid');
        input.removeClass('is-valid');
        errorMsg.addClass('text-danger');
        errorMsg.text('This field is required.');
      } else {
        input.removeClass('is-invalid');
        input.addClass('is-valid');
        errorMsg.removeClass('text-danger');
        errorMsg.text('');
      }
    });
  }

  //validate selection field
  function validateSelectField(fieldId) {
    var field = $('#' + fieldId);
    var fieldInput = field.val();
    if(fieldInput === 'defaultSelected') {
      field.addClass('is-invalid');
      field.removeClass('is-valid');
    } else {
      field.removeClass('is-invalid');
      field.addClass('');
    }
  }

  //validate all radio field
  function validateRadioInput(groupId, inputName) {
    $('#' + groupId).on('change', 'input[name="' + inputName + '"]', function() {
      var inputValue = $('input[name="' + inputName + '"]:checked').val();
      if(inputValue === '' || inputValue === undefined) {
        $('#' + groupId).addClass('is-invalid');
        $('#' + groupId).removeClass('is-valid');
      } else {
        $('#' + groupId).removeClass('is-invalid');
        $('#' + groupId).addClass('');
      }
    });
  }

  //check email
  function validateEmail(emailId, msgId) {
    $(emailId).keyup(function() {
      var email = $(this).val();
      var regx_email = /^([a-zA-z]+)([0-9]+)?(@)([a-zA-Z]{5,10}(.)([a-zA-Z]+))$/i;
      if(!regx_email.test(email)) {
        $(emailId).addClass('is-invalid');
        $(emailId).removeClass('is-valid'); // remove is-valid class
        $(msgId).addClass('text-danger');
        $(msgId).text('Invalid, email should be "sample@gmail.com".');
      } else {
        $(emailId).removeClass('is-invalid'); // remove is-invalid class
        $(emailId).addClass('is-valid');
        $(msgId).removeClass('text-danger');
        $(msgId).text('');
      }
    });
  }

  //auto calculate age
  function calculateAge(dobInput, ageOutput) {
    $(dobInput).on('change', function() {
      var dob = new Date($(this).val());
      var today = new Date();
      var age = Math.floor((today - dob) / (365.25 * 24 * 60 * 60 * 1000));
      $(ageOutput).text('Age: ' + age);
    });
  }

  //onchange photo
  function readURL(input) {
    if(input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
          $('.image-upload-wrap').hide();

          $('.file-upload-image').attr('src', e.target.result);
          $('.file-upload-content').show();

          $('.image-title').html(input.files[0].name);
      };
      reader.readAsDataURL(input.files[0]);
    } else {
      removeUpload();
    }
  }

  //to remove selected photo
  function removeUpload() {
    $('.file-upload-input').replaceWith($('.file-upload-input').clone());
    $('.file-upload-content').hide();
    $('.image-upload-wrap').show();
  }
  //drag and drop down photo
  $('.image-upload-wrap').bind('dragover', function () {
    $('.image-upload-wrap').addClass('image-dropping');
  });
  $('.image-upload-wrap').bind('dragleave', function () {
    $('.image-upload-wrap').removeClass('image-dropping');
  });


  //==============================
  // BUTTON ACTION->DATA HOLDER
  //==============================

  $(document).ready(function() {

    /*------------------------
    QUALIFICATION FORM VALIDATIONS
    --------------------------*/

    $('.seeSample').on('click', function(e) {
      e.preventDefault();
      Swal.fire({
        title: 'Sample Photo:',
        html: '<img src="resources/images/general/sample.jpg" class="p-2 img-thumbnail img-responsive" width="150">',
        confirmButtonText: 'OK',
        confirmButtonColor: '#996515',
        allowEscapeKey : false,
        allowOutsideClick: false
      });
    });

    //validate all dropdown selection 
    $('#relationship').on('change', function() {
      validateSelectField('relationship');
    });
    $('#campus').on('change', function() {
      validateSelectField('campus');
    });

    //validate all radio input
    validateRadioInput('academicStatus', 'academic_status');
    validateRadioInput('isFiliCitizen', 'citizen');
    validateRadioInput('isLivingPh', 'living_philippines');
    validateRadioInput('isEnrolled', 'already_enrolled');
    validateRadioInput('firstApply', 'first_time');

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
          confirmButtonColor: "#5f76e8",
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
      }
      else if(livingInPh === 'No') {
        Swal.fire({
          title: "",
          html: "<h4 class='text-danger'>Sorry, we cannot continue because of the following reason/s:</h4><hr/><h6><strong>The applicant is not currently living in the Philippines</strong></h6><br/><label style='font-size: 15px!important;'>It is recommended that the applicant is either near or accessible to the branch/campus when pursuing senior high school undergraduate studies. For more information please read the <a href='javascript:void(0)'>qualification requirement</a>.</label>", 
          icon: "warning",
          confirmButtonText: "Okay",
          confirmButtonColor: "#5f76e8",
          showConfirmButton: true,
          allowEscapeKey : false,
          allowOutsideClick: false
        }).then((actionOne) => {
          if(actionOne) {
            $('#qualification_form').trigger('reset');
            $('#qualification_form').find('.is-invalid').removeClass('is-invalid');
            $('#qualification_form').find('.is-valid').removeClass('is-valid');
            return false;
          }
        });
      }
      else if(alreadyEnrolled === 'Yes') {
        Swal.fire({
          title: "",
          html: "<h4 class='text-danger'>Sorry, we cannot continue because of the following reason/s:</h4><hr/><h6><strong>The applicant was enrolled (or is currently enrolled) in other Golden Minds Branch/Campus or other schools.</strong></h6><br/><label style='font-size: 15px!important;'>The applicant cannot take this admission evaluation if he/she is already a student of Golden Minds or other school. As an option, the applicant may be admitted as transfer student. For more information please read the <a href='javascript:void(0)'>qualification requirement</a>.</label>", 
          icon: "warning",
          confirmButtonText: "Okay",
          confirmButtonColor: "#5f76e8",
          showConfirmButton: true,
          allowEscapeKey : false,
          allowOutsideClick: false
        }).then((actionTwo) => {
          if(actionTwo) {
            $('#qualification_form').trigger('reset');
            $('#qualification_form').find('.is-invalid').removeClass('is-invalid');
            $('#qualification_form').find('.is-valid').removeClass('is-valid');
            return false;
          }
        });
      }
      else if(firstTimeApply === 'No') {
        Swal.fire({
          title: "",
          html: "<h4 class='text-danger'>Sorry, we cannot continue because of the following reason/s:</h4><hr/><h6><strong>The applicant should graduate Junior High School first</strong></h6><label style='font-size: 15px!important'>A Grade 10 student is expected to have graduated before classes start this october.</label><br/><br/><h6><strong>One account and one application only per applicant</strong></h6><label style='font-size: 15px!important'>An applicant can only have one (1) Golden Minds student account. For more information please read the <a href='javascript:void(0)'>qualification requirement</a>.</label>", 
          icon: "warning",
          confirmButtonText: "Okay",
          confirmButtonColor: "#5f76e8",
          showConfirmButton: true,
          allowEscapeKey : false,
          allowOutsideClick: false
        }).then((actionThree) => {
          if(actionThree) {
            $('#qualification_form').trigger('reset');
            $('#qualification_form').find('.is-invalid').removeClass('is-invalid');
            $('#qualification_form').find('.is-valid').removeClass('is-valid');
            return false;
          }
        });
      }
      else if(preferredCampus === "") {
        Swal.fire({
          title: "",
          html: "<h4 class='text-danger'>Please specify which campus you want to enrolled.</h4>", 
          icon: "warning",
          confirmButtonText: "Okay",
          confirmButtonColor: "#5f76e8",
          showConfirmButton: true,
          allowEscapeKey : false,
          allowOutsideClick: false
        }).then((actionFour) => {
          if(actionFour) {
            $('#campus').addClass('is-invalid');
            return false;
          }
        });
      }
      //If student passed for all qualification requirements, then they can go in fill up form
      else {
        //alert("Success");
        Swal.fire({
          title: "Confirm your Information",
          html: "Submission of false information will disqualify the applicant from enrollment/admission in Golden Minds.<br/><br/>Is this true and correct?",
          icon: "info",
          showConfirmButton: true,
          confirmButtonText: "Okay",
          confirmButtonColor: "#5f76e8",
          showCancelButton: true,
          cancelButtonText: "Cancel",
          showLoaderOnConfirm: true,
          allowEscapeKey : false,
          allowOutsideClick: false,
          preConfirm: (response) => {
            if(!response) { return false; } 
            else {
              return new Promise(function(resolve) {
                setTimeout(function () {
                  //send ajax request to preregister the applicant
                  $.ajax({
                    method: "POST",
                    url: "assets/api/temp_data.php",
                    data: { preferredCampus: preferredCampus },
                    success: function(key) {
                      window.location.href = 'online_application?at=' + '<?=$_GET['at']?>&mode=create_acct';
                    }
                  });
                }, 1000);
              });
            }
          },
          allowOutsideClick: () => !Swal.isLoading()
        });
      }
    });


    /*------------------------
    CREATE ACCOUNT FORM VALIDATIONS
    --------------------------*/
    //if password input focus show password requirement
    $('#pword').on('focus', function() { $('.pword-requirements').slideDown(); }); //onfocus pword show pword requirement                        
    $('#pword').on('blur', function() {  $('.pword-requirements').slideUp(); }); //hide
                                 
    //password requirements
    $('#pword').on('keyup', function() {
      var pword = $(this).val();
      //has lowercase
      if(pword.match(/[a-z]/g)) {
        $('.lowercase').addClass('activeli');
        $('.lowercase').removeClass('inactiveli');
      } else {
        $('.lowercase').addClass('inactiveli');
        $('.lowercase').removeClass('activeli');
      }
      //has uppercase
     if(pword.match(/[A-Z]/g)) {
        $('.uppercase').addClass('activeli');
        $('.uppercase').removeClass('inactiveli');
      } else {
        $('.uppercase').addClass('inactiveli');
        $('.uppercase').removeClass('activeli');
      }
      //has number
      if(pword.match(/[0-9]/g)) {
        $('.hasNum').addClass('activeli');
        $('.hasNum').removeClass('inactiveli');
      } else {
        $('.hasNum').addClass('inactiveli');
        $('.hasNum').removeClass('activeli');
      }
      //has special characters
      if(pword.match(/[!@#$%^&*]/g)) {
        $('.hasSpecialChar').addClass('activeli');
        $('.hasSpecialChar').removeClass('inactiveli');
      } else {
        $('.hasSpecialChar').addClass('inactiveli');
        $('.hasSpecialChar').removeClass('activeli');
      }
      //has minimum 8 char
      if(pword.length == 8 || pword.length > 8) {
        $('.hasEightchar').addClass('activeli');
        $('.hasEightchar').removeClass('inactiveli');
        $('#pword').addClass('');
        $('#pword').removeClass('is-invalid');         
      } else {
        $('.hasEightchar').addClass('inactiveli');
        $('.hasEightchar').removeClass('activeli');
        $('#pword').addClass('is-invalid');
        $('#pword').removeClass('');
      } 
      // validateInput($('#pword'), $('#pword'));
    });

    //hide and show password
    $("#show_hide_password a").on('click', function(event) {
      event.preventDefault();
      if($('#show_hide_password input').attr("type") == "text"){
        $('#show_hide_password input').attr('type', 'password');
        $('#show_hide_password i').addClass( "fa-eye-slash" );
        $('#show_hide_password i').removeClass( "fa-eye" );
      } else if($('#show_hide_password input').attr("type") == "password"){
        $('#show_hide_password input').attr('type', 'text');
        $('#show_hide_password i').removeClass( "fa-eye-slash" );
        $('#show_hide_password i').addClass( "fa-eye" );
      }
    });


    $('#step1').on('click', function(e) {
      e.preventDefault();
      var lrn = $('#lrn').val();
      var phonenum = $('#phonenum').val();
      var useremail = $('#email').val();
      var userpword = $('#pword').val();

      var userRemail = $('#remail').val();
      var userRepword = $('#repword').val();

      //check if input fields empty or not
      if(isEmpty(lrn) || isEmpty(phonenum) || isEmpty(useremail) || isEmpty(userRemail) || isEmpty(userpword) || isEmpty(userRepword)) {
        Swal.fire({
          title: "Warning",
          text: "All fields is required!",
          icon: "error",
          confirmButtonText: "Close",
          confirmButtonColor: "#cc3f5a",
          showConfirmButton: true,
          allowEscapeKey : false,
          allowOutsideClick: false
        }).then((resultOne) => {
          if(resultOne.isConfirmed) {
            $('#lrn').addClass('is-invalid');
            $('#phonenum').addClass('is-invalid');
            $('#email').addClass('is-invalid');
            $('#remail').addClass('is-invalid');
            $('#pword').addClass('is-invalid');
            $('#repword').addClass('is-invalid');
          }
        });
      } else {
        //check if retype email is match to first email
        if(!userRemail.match(useremail)) {
        Swal.fire({
          title: "Warning",
          text: "E-mail and Re-type e-mail is not match!",
          icon: "error",
          confirmButtonText: "Close",
          confirmButtonColor: "#cc3f5a",
          showConfirmButton: true,
          allowEscapeKey : false,
          allowOutsideClick: false
        }).then((resultTwo) => {
          if(resultTwo.isConfirmed) {
            $('#remail').addClass('is-invalid');
            $('#remail').removeClass('is-valid');
          }
        });
        } else {
          //check if repassword  is match to first passowrd
          if(!userRepword.match(userpword)) {
            Swal.fire({
              title: "Warning",
              text: "Password and Re-type password is not match!",
              icon: "error",
              confirmButtonText: "Close",
              confirmButtonColor: "#cc3f5a",
              showConfirmButton: true,
              allowEscapeKey : false,
              allowOutsideClick: false
            }).then((resultThree) => {
              if(resultThree.isConfirmed) {
                $('#repword').addClass('is-invalid');
                $('#repword').removeClass('is-valid');
                $('#repword').focus();
              }
            });   
          } else {
            //success here..
            Swal.fire({
              title: "Confirm your Information",
              html: "Submission of false information will disqualify the applicant from enrollment/admission in Golden Minds.<br/><br/>Is this true and correct?",
              icon: "info",
              showConfirmButton: true,
              confirmButtonText: "Okay",
              confirmButtonColor: "#5f76e8",
              showCancelButton: true,
              cancelButtonText: "Cancel",
              showLoaderOnConfirm: true,
              allowEscapeKey : false,
              allowOutsideClick: false,
                preConfirm: (response) => { 
                  if(!response) {  return false; }
                  else {
                    return new Promise(function(resolve) { 
                      setTimeout(function () { 
                        //send ajax request to stored the user input in session
                        $.ajax({
                          method: "POST",
                          url: "assets/api/temp_data.php",
                          data: {
                            lrn: lrn,
                            phonenum: phonenum,
                            useremail: useremail,
                            userpword: userpword
                          },
                          success: function(result) {
                            //redirect to next step
                            // alert(result);
                            // location.reload();
                            window.location.href = 'online_application?at=' + '<?=$_GET['at']?>&mode=fill_up';
                          },
                          error: function(error) {
                            alert(error);
                          }
                        });
                      }, 1000);
                    });
                  }
                },
                allowOutsideClick: () => !Swal.isLoading()
            });
          }
        }
      }    
    });

    //step2 action button->validation here
    
  }); //end of document->ready->function                             
</script>