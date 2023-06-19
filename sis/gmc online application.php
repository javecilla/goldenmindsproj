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
  <?php require_once __DIR__ . '/../components/links.php'; ?>
  <style>
    .btt_btn {
      padding: 10px!important;
      border-radius: 50%; 
      background-color: #996515; 
      color: #fff;
      opacity: .6;
    }
    .btt_btn:hover {
      color: #fff;
      opacity: .7;
    }
    .center {
      display: flex!important;
      justify-content: center!important;
      align-items: center!important;
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
      color: #212529!important;
      opacity: .8;
    }

    label {
      font-size: 13px!important;
      color: #1c2d41;
    }
    label.typeform {
      font-size: 16px!important;
      color: #1c2d41;
      font-weight: 600;
      border-bottom: 2px solid #996515!important;
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
    <?php require_once __DIR__ . '/../components/header.php';?>
		<?php require_once __DIR__ . '/../components/navbar.php'; ?>

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
            <div class="auth-wrapper center" id="center" style="width: 100%!important;">
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
                      </div><!--end second column-->
                    </div><!--row-->
                    <div class="actions-btn mt-4">
                      <button type="button" onclick="cancel('signin')" class="btn btn-secondary btn-sm ">Cancel </button>
                      <button type="button" id="next" class="btn btn-sm float-end" style="background-color: #996515; color:#fff; opacity: .8;">
                        Next <i class=" fas fa-arrow-right"></i>
                      </button>
                    </div>
                  </form> 
                </div><!--card body-->
              </div><!--card-->
            </div><!--End login box-->
          <?php
        }
        if(isset($_GET['mode']) && $_GET['mode'] == 'fill_up') {
          ?>
            <div class="auth-wrapper center" id="center" style="width: 100%!important;">
              <div class="card qualifications_card">
                <div class="card-header" style="background-color: #996515; color:#fff; opacity: .8;">
                  <h2 class="text-white quali-head-title pb-3">Enrollment / Application Form</h2>
                </div>
                <div class="card-body">
                  <h6 class="card-title text-muted">Date of Admission: 
                    <span><strong><?php echo date("l, F j, Y")?></strong></span>
                    <input type="hidden" id="dateRegistration" value="<?php echo date("l, F j, Y")?>"/>
                  </h6><hr class="text-muted">

                  <form action="/" method="/" id="qualification_form"> 
                    <div class="row">
                      <!-- first column -->
                      <div class="col-lg-6">
                        <label class="text-uppercase typeform mb-4">Applying For</label>
                        <div class="">
                          <label class="mb-1 quali-label"><strong>• Grade Level <span class="text-danger">*</span></strong></label>
                          <select class="form-select quali-select" id="gradeLevel">
                            <option value="" selected>-- SELECT --</option>
                            <option value="Grade 11">Grade 11</option>
                            <option value="Grade 12">Grade 12</option>
                          </select>
                        </div>

                        <div class="">
                          <label class="mb-1 mt-3 quali-label"><strong>• School Year <span class="text-danger">*</span></strong></label>
                          <select class="form-select quali-select" id="schoolYear">
                            <option value="" selected>-- SELECT --</option>
                            <option value="2023-2024">2023-2024</option>
                            <option value="2022-2023">2022-2023</option>
                            <option value="2021-2022">2021-2022</option>
                          </select>
                        </div>

                        <div class="mt-3">
                          <label class="mb-1 quali-label"><strong>• Semester <span class="text-danger">*</span></strong></label>
                          <select class="form-select quali-select" id="semester">
                            <option value="" selected>-- SELECT --</option>
                            <option value="1st Semester">1st Semester</option>
                            <option value="2nd Semester">2nd Semester</option>
                          </select>
                        </div>

                        <div class="mt-3">
                          <label class="mb-1 quali-label"><strong>• School Branch/Campus</strong></label>
                          <input type="text"  class="form-control text-dark" value="<?php if(isset($_SESSION['campusSelected'])) { echo $_SESSION['campusSelected']; } ?>" id="campus"/>
                          <small class="mb-1 guide"><strong><span class="text-danger">*</span></strong> This branch/campus is selected because you select this campus in qualification form as preferred campus. Make sure that the information you entered is true and correct.</small>
                        </div>

                        <div class="mt-3">
                          <label class="mb-1 quali-label"><strong>• Track/Strand <span class="text-danger">*</span></strong></label>
                          <select class="form-select quali-select" id="strand">
                            <option value="" selected>-- SELECT --</option>
                            <option value="STEM">Science, Technology Engineering and Mathematics (STEM)</option>
                            <option value="ABM">Accountancy, Business and Management (ABM)</option>
                            <option value="HUMSS">Humanities and Social Sciences (HUMSS)</option>
                            <option value="GAS">General Academic Strand (GAS)</option>
                            <option value="TVL-HE">Technical-Vocational-Livelihood Home Economics (TVL-HE)</option>
                            <option value="TVL-ICT">Technical-Vocational-Livelihood Information and Communications Technology (TVL-ICT)</option>
                          </select>
                        </div>

                        <div class="mt-3 mb-4">
                          <label class="mb-1 quali-label"><strong>• LRN <span class="text-primary">*</span></strong> Leave it blank if not applicable to you</label>
                          <div class="form-control">
                            <input type="number" class="form-control" id="lrn" placeholder="Enter your LRN"/>
                          </div>
                        </div>

                        <label class="text-uppercase typeform mb-4">Personal Information</label>
                        <div class="row">
                          <div class="col-6 mt-2">
                            <label class="mb-1 quali-label"><strong>• Last Name <span class="text-danger">*</span></strong></label>
                            <input type="text" class="form-control" id="lastName"placeholder="Your Last Name"/>
                          </div>
                          <div class="col-6 mt-2">
                            <label class="mb-1 quali-label"><strong>• First Name <span class="text-danger">*</span></strong></label>
                            <input type="text" class="form-control" id="firstName" placeholder="Your First Name"/>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-6 mt-3">
                            <label class="mb-1 quali-label"><strong>• Middle Name <span class="text-primary">*</span></strong></label>
                            <input type="text" class="form-control" id="middleName" placeholder="Your Last Name"/>
                          </div>
                          <div class="col-6 mt-3">
                            <label class="mb-2 quali-label"><strong>• Ext Name <span class="text-primary">*</span></strong></label>
                            <input type="text" class="form-control" id="extName"placeholder="Your First Name"/>
                          </div>
                          <label class="mb-1 guide"><strong><span class="text-danger">*</span></strong> Leave it blank if not applicable to you [Middle and/or Ext Name].</label>
                        </div>

                        <div class="mt-3 radio-group" data-input-id="gender">
                          <label class="mb-1 quali-label"><strong>• Gender / Sex <span class="text-danger">*</span></strong></label>
                          <div class="form-control" id="isGender">
                            <label class="radio quali-label">
                              <input type="radio" name="gender" value="Male"/> Male
                            </label>&nbsp;&nbsp;
                            <label class="radio quali-label">
                              <input type="radio" name="gender" value="Female"/> Female
                            </label>
                            <input type="hidden" id="gender"/>
                          </div>
                        </div>

                        <div class="mt-3">
                          <label class="mb-1 quali-label"><strong>• Date of Birth <span class="text-danger">*</span></strong></label>
                          <div class="input-group">
                            <span class="input-group-text"><span class="age">Age: </span> </span>
                            <input type="date" class="form-control" id="dob" name="dob"/>
                          </div>
                          <small class="guide"><span class="text-danger">*</span> Select the month, day and year of your birth, or type it following this format: mm/dd/yyyy (Example: 24/03/2004)</small>
                        </div>

                        <div class="mt-3">
                          <label class="mb-1 quali-label"><strong>• Place of Birth <span class="text-danger">*</span></strong></label>
                          <input type="text" class="form-control" placeholder="Your Place of Birth" id="pob"/>
                          <small class="guide"><span class="text-danger">*</span> Your complete place of birth based on your PSA birth certificate</small>
                        </div>

                        <div class="mt-3">
                          <div class="row">
                            <div class="col-6">
                              <label class="mb-1 quali-label"><strong>• Nationality <span class="text-danger">*</span></strong></label>
                              <input type="text" class="form-control" placeholder="Your Nationality" id="nationality"/>
                            </div>
                            <div class="col-6">
                              <label class="mb-1 quali-label"><strong>• Religion <span class="text-danger">*</span></strong></label>
                              <input type="text" class="form-control" placeholder="Your Religion" id="religion"/>
                            </div>
                          </div>
                        </div>

                        <label class="text-uppercase typeform mb-4 mt-4">Address and Contact Details</label>
                        <div class="mt-3">
                          <label class="mb-2 quali-label"><strong>• Address <span class="text-danger">*</span></strong></label>
                          <input type="text" class="form-control" placeholder="House no. Street Name" id="address"/>
                          <small class="guide"><span class="text-danger">*</span> Your complete current address based on your PSA birth certificate. Example: [Ph7, Blk3, Lot24 Demacia St.]</small>   
                        </div>

                        <div class="mt-3">
                          <label class="mb-2 quali-label"><strong>• Baranggay <span class="text-danger">*</span></strong></label>
                          <input type="text" class="form-control" placeholder="Ex: Brgy. Sagabal" id="baranggay"/>
                        </div>

                        <div class="mt-3">
                          <label class="mb-2 quali-label"><strong>• City / Municipality <span class="text-danger">*</span></strong></label>
                          <input type="text" class="form-control" placeholder="Your City" id="city"/>
                        </div>

                        <div class="mt-3">
                          <label class="mb-2 quali-label"><strong>• Province / Region <span class="text-danger">*</span></strong></label>
                          <input type="text" class="form-control" placeholder="Your Province" id="province"/>
                        </div>

                        <div class="mt-3">
                          <label class="mb-2 quali-label"><strong>• Contact No. <span class="text-danger">*</span></strong></label>
                          <input type="number" class="form-control" placeholder="Phone Number" id="contactNo"/>
                        </div>
                      </div> <!--end first column-->

                      <!-- second column -->
                      <div class="col-lg-6"> 
                        <label class="text-uppercase typeform mb-4">Student Last School Attended</label>
                        <div class="mt-3">
                          <label class="mb-2 quali-label"><strong>• Completion Date </strong></label>
                          <input type="date" class="form-control" id="completionDate"/>
                        </div>

                        <div class="mt-3">
                          <label class="mb-2 quali-label"><strong>• Completer as <br/><span class="text-primary"> *</span></strong> Please specify what type of completer are you</label>
                          <select class="form-select quali-select" id="completerAs">
                            <option value="" selected>-- SELECT --</option>
                            <option value="High School Completer">High School Completer</option>
                            <option value="Junior High School Completer (Grade 10)">Junior High School Completer (Grade 10)</option>
                            <option value="PEPT Passer">PEPT Passer</option>
                            <option value="ALS A&E Passer">ALS A&E Passer</option>
                            <option value="Others">Others</option>
                          </select>
                        </div>

                        <div class="mt-3">
                          <label class="quali-label mb-2"><strong>• Former School Name <span class="text-danger"> *</span></strong></label>
                          <input type="text" class="form-control" placeholder="Last School Attended" id="formerSchoolName"/>
                        </div>

                        <div class="mt-3">
                          <label class="quali-label mb-2"><strong>• Former School Address <span class="text-danger"> *</span></strong></label>
                          <input type="text" class="form-control" placeholder="Last School Attended" id="formerSchoolAddress"/>
                        </div>

                        <div class="mt-3">
                          <label class="quali-label mb-2"><strong>• Grade 10 (GWA) <span class="text-danger"> *</span></strong></label>
                          <input type="number" class="form-control" placeholder="Your G10 Average" id="g10gwa"/>
                        </div>

                        <div class="mt-3">
                          <label class="quali-label mb-2"><small class="guide">
                            <span class="text-primary">*</span> <strong>Note:</strong> 
                            Enter name of your former grade 10 teacher and section 
                            (For graduate High School and Junior High School). Leave it blank if not applicable to you.</small></label>
                          <div class="row">
                            <div class="col-6">
                              <input type="text" class="form-control" placeholder="Grade 10 Adviser"
                              id="formerAdviserName"/>
                            </div>
                            <div class="col-6">
                              <input type="text" class="form-control" placeholder="Grade 10 Section"
                              id="formerSectionName"/>
                            </div>
                          </div>
                        </div>

                        <label class="text-uppercase typeform mb-4 mt-4">Parents / Guardian Information</label>
                        <div class="mt-3">
                          <label class="quali-label mb-2"><strong>• Father's Information <span class="text-danger">*</span></strong></label>
                          <div class="row mt-1">
                            <div class="col-6">
                              <input type="text" class="form-control" placeholder="Last Name" 
                              id="lnFather"/>
                            </div> 
                            <div class="col-6">
                              <input type="text" class="form-control" placeholder="First Name" 
                              id="fnFather"/>
                            </div>
                          </div>
                          <div class="row mt-2">
                            <div class="col-6">
                              <input type="text" class="form-control" placeholder="Middle Name" 
                              id="mnFather"/>
                            </div> 
                            <div class="col-6">
                              <input type="text" class="form-control" placeholder="Occupation" 
                              id="occupationFather"/>
                            </div>
                          </div>
                        </div>

                        <div class="mt-3">
                          <label class="quali-label mb-2"><strong>• Mother's Information <span class="text-danger">*</span></strong></label>
                          <div class="row mt-1">
                            <div class="col-6">
                              <input type="text" class="form-control" placeholder="Last Name" 
                              id="lnMother"/>
                            </div> 
                            <div class="col-6">
                              <input type="text" class="form-control" placeholder="First Name" 
                              id="fnMother"/>
                            </div>
                          </div>
                          <div class="row mt-2">
                            <div class="col-6">
                              <input type="text" class="form-control" placeholder="Middle Name" 
                              id="mnMother"/>
                            </div> 
                            <div class="col-6">
                              <input type="text" class="form-control" placeholder="Occupation" 
                              id="occupationMother"/>
                            </div>
                          </div>
                        </div>

                        <label class="text-uppercase typeform mb-4 mt-4">Contact Emergency Person</label>
                        <div class="mt-2">
                          <label class="quali-label mb-2"><strong>• Guardian Information <span class="text-danger">*</span></strong></label>
                          <div class="row mt-1">
                            <div class="col-6">
                              <input type="text" class="form-control" placeholder="Last Name" 
                              id="lnGuardian"/>
                            </div> 
                            <div class="col-6">
                              <input type="text" class="form-control" placeholder="First Name" 
                              id="fnGuardian"/>
                            </div>
                          </div>
                          <div class="row mt-2">
                            <div class="col-6">
                              <input type="text" class="form-control" placeholder="Middle Name" 
                              id="mnGuardian"/>
                            </div> 
                            <div class="col-6">
                              <input type="text" class="form-control" placeholder="Relationship" 
                              id="rsGuardian"/>
                            </div>
                          </div>
                          <div class="row mt-2">
                            <div class="col-6">
                              <input type="text" class="form-control" placeholder="Occupation" 
                              id="occupationGuardian"/>
                            </div> 
                            <div class="col-6">
                              <input type="text" class="form-control" placeholder="Contact No." 
                              id="cnGuardian"/>
                            </div>
                          </div>
                        </div>

                        <label class="text-uppercase typeform mb-4 mt-4">Referral Person's Information</label><br/>
                        <label class="guide"><span class="text-primary">*</span> <strong>Note:</strong> Enter your referral information thus Leave it blank if not applicable to you.</label>
                        <div class="mt-2">
                          <div class="row mt-1">
                            <div class="col-6">
                              <input type="text" class="form-control" placeholder="Refferal Name" id="referralName"/>
                            </div> 
                            <div class="col-6">
                              <input type="text" class="form-control" placeholder="Refferal Number" id="referralNumber"/>
                            </div>
                          </div>
                        </div>

                        <label class="text-uppercase typeform mb-4 mt-4">Documents</label><br/>
                        <label class="guide"><span class="text-primary">*</span> <strong>Note:</strong> Please check the documents if you already have.</label>
                        <div class="mt-2">
                          <div class="row">
                            <div class="col-4">
                              <label>
                                <input type="checkbox" onclick="subDoc('Good Moral')"/> <span>Good Moral</span>
                                <input type="hidden" id="good_moral"/>
                              </label>
                            </div>
                            <div class="col-4">
                              <label>
                                <input type="checkbox" onclick="subDoc('Card')"/> <span>Card</span>
                                <input type="hidden" id="card"/>
                              </label>
                            </div>
                            <div class="col-4">
                              <label>
                                <input type="checkbox" onclick="subDoc('Form 137')"/> <span>Form 137</span>
                                <input type="hidden" id="form_137"/>
                              </label>
                            </div>
                          </div>

                          <label class="mt-3">
                            <input type="checkbox" onclick="subDoc('PSA')"/> <span>PSA</span>
                            <input type="text" placeholder="PSA Remarks" id="psa_remarks"/><br/><br/>
                            <span><span class="text-danger mt-2">*</span> <strong>Note:</strong> Please specifies your psa submitted [e.g., Photocopy/Xerox or Orginal]</span><br/><br/>
                            <input type="hidden" id="psa"/>
                          </label>
                          
                          <div class="row mb-3">
                            <div class="col-4">
                              <label >
                                <input type="checkbox" onclick="subDoc('ID')"/> <span>ID</span>
                                <input type="hidden" id="id"/>
                              </label>
                            </div>
                            <div class="col-4">
                              <label>
                                <input type="checkbox" onclick="subDoc('PE Shirt')"/> <span>PE Shirt</span>
                                <input type="hidden" id="peShirt"/>
                              </label>
                            </div>
                            <div class="col-4">
                              <label>
                                <input type="checkbox" onclick="subDoc('Waiver')"/> <span>Waiver</span>
                                <input type="hidden" id="waiver"/>
                              </label>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-4">
                              <label>
                                <input type="checkbox" onclick="subDoc('Uniform')"/> <span>Uniform</span>
                                <input type="hidden" id="uniform"/>
                              </label>
                            </div>
                            <div class="col-4">
                              <label>
                                <input type="checkbox" onclick="subDoc('Allowance')"/> <span>Allowance</span>
                                <input type="hidden" id="allowance"/>
                              </label>
                            </div>
                            <div class="col-4">
                              <label>
                                <input type="checkbox" onclick="subDoc('Document Filed')"/> <span>Document Filed</span>
                                <input type="hidden" id="docuFiled"/>
                              </label>
                            </div>
                          </div>

                        </div>
                      </div><!--end second column-->
                    </div><!--row-->
                    <div class="actions-btn mt-4">
                      <button type="button" onclick="cancel('signin')" class="btn btn-secondary btn-sm ">Cancel</button>
                      <button type="button" id="submit" class="btn btn-sm float-end" style="background-color: #996515; color:#fff; opacity: .8;">
                        Submit <i class=" fas fa-arrow-right"></i>
                      </button>
                    </div>
                  </form> 
                </div><!--card body-->
              </div><!--card-->
            </div><!--End login box-->
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

      <div id ="back-to-top" style="display: none;">
        <a class="p-0 btn btn-xs position-fixed top btt_btn" id="top" href="#top">
          <i class="fa-solid fa-chevron-up" style="font-size: 20px"></i>
        </a>
      </div>
  
    <?php require_once __DIR__ . '/components/footer.php'; ?>
  </main>
</body>
</html>

<script defer>
  //======================
  //  RE-USABLE  FUNCTION
  //======================

  //check submitted documents
  function subDoc(value) {
    if(value === 'Good Moral') {
      //alert(value);
      $('#good_moral').val('Ok');
    }
    else if(value === 'Card') {
      //alert(value);
      $('#card').val('Ok');
    }
    else if(value === 'Form 137') {
      //alert(value);
      $('#form_137').val('Ok');
    }
    else if(value === 'PSA') {
      //alert(value);
      $('#psa').val('Ok');
    }
    else if(value === 'ID') {
      //alert(value);
      $('#id').val('Ok');
    }
    else if(value === 'PE Shirt') {
      //alert(value);
      $('#peShirt').val('Ok');
    }
    else if(value === 'Waiver') {
      //alert(value);
      $('#waiver').val('Ok');
    }
    else if(value === 'Uniform') {
      //alert(value);
      $('#uniform').val('Ok');
    }
    else if(value === 'Allowance') {
      //alert(value);
      $('#allowance').val('Ok');
    }
    else if(value === 'Document Filed') {
      //alert(value);
      $('#docuFiled').val('Ok');
    } 
  }
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
    if(fieldInput === '') {
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

  //==============================
  // BUTTON ACTION->DATA HOLDER
  //==============================

  $(document).ready(function() {

    /*------------------------
    QUALIFICATION FORM VALIDATIONS
    --------------------------*/
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
        });
      }
      else if(firstTimeApply === 'No') {
        Swal.fire({
          title: "",
          html: "<h4 class='text-danger'>Sorry, we cannot continue because of the following reason/s:</h4><hr/><h6><strong>The applicant should graduate Junior High School first</strong></h6><label style='font-size: 15px!important'>A Grade 10 student is expected to have graduated before classes start this october.</label>", 
          icon: "warning",
          confirmButtonText: "Okay",
          confirmButtonColor: "#5f76e8",
          showConfirmButton: true,
          allowEscapeKey : false,
          allowOutsideClick: false
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
                    url: "assets/api/data/temp_data.php",
                    data: { preferredCampus: preferredCampus },
                    success: function(key) {
                      window.location.href = 'online_application?at=' + '<?=$_GET['at']?>&mode=fill_up';
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

    $('#dob').on('change', function() {
	    validateSelectField('dob');
	  });
	  //auto calute the user age depending on the date
	  calculateAge('#dob', '.age');

    $('#submit').on('click', function(e) {
      e.preventDefault();
      //alert("test");
      const dof = $('#dateRegistration').val();
      let gradeLevel = $('#gradeLevel').val();
      let schoolYear  = $('#schoolYear').val();
      let semester = $('#semester').val();
      const campus = $('#campus').val();
      let strand = $('#strand').val();
      let lrn = $('#lrn').val();

      let lastName = $('#lastName').val();
      let firstName = $('#firstName').val();
      let middleName = $('#middleName').val();
      let extName = $('#extName').val();
      //concatenate to the student name to get their full name
      var studentFullName = lastName + ', ' + firstName + ' ' + middleName + ' ' + extName;
      //alert(studentFullName);

      let gender = $('#gender').val();
      let dob = $('#dob').val();
      let pob = $('#pob').val();
      let nationality = $('#nationality').val();
      let religion = $('#religion').val();
      let address = $('#address').val();
      let brgy = $('#baranggay').val();
      let city = $('#city').val();
      let province = $('#province').val();
      let contactNo = $('#contactNo').val();

      let completionDate = $('#completionDate').val();
      let completerAs = $('#completerAs').val();
      let fsn = $('#formerSchoolName').val();
      let fsa = $('#formerSchoolAddress').val();
      let gwa = $('#g10gwa').val();
      let fan = $('#formerAdviserName').val();
      let fs = $('#formerSectionName').val();
      

      let lnFather = $('#lnFather').val();
      let fnFather = $('#fnFather').val();
      let mnFather = $('#mnFather').val();
      var fatherFullName = lnFather + ', ' + fnFather + ' ' + mnFather + ' ';
      //alert(fatherFullName);
      let occupationFather = $('#occupationFather').val();

      let lnMother = $('#lnMother').val();
      let fnMother = $('#fnMother').val();
      let mnMother = $('#mnMother').val();
      var motherFullName = lnMother + ', ' + fnMother + ' ' + mnMother + ' ';
      //alert(motherFullName);
      let occupationMother = $('#occupationMother').val();

      let lnGuardian = $('#lnGuardian').val();
      let fnGuardian = $('#fnGuardian').val();
      let mnGuardian = $('#mnGuardian').val();
      var guardianFullName = lnGuardian + ', ' + fnGuardian + ', ' + mnGuardian + '. ';
      //alert(guardianFullName);
      let rsGuardian = $('#rsGuardian').val();
      let occupationGuardian = $('#occupationGuardian').val();
      let cnGuardian = $('#cnGuardian').val();

      let referralName = $('#referralName').val();
      let referralNumber = $('#referralNumber').val();

      let  goodMoral = $('#good_moral').val();
      let  card = $('#card').val();
      let  form137 = $('#form_137').val();

      let  psac1 = $('#psa').val();
      let  psac2 = $('#psa_remarks').val();
      var  psa = psac1 + '(' + psac2 + ')';
      

      let  ID = $('#id').val();
      let  peShirt = $('#peShirt').val();
      let  waiver = $('#waiver').val();
      let  uniform = $('#uniform').val();
      let  allowance = $('#allowance').val();
      let  docuFiled = $('#docuFiled').val();

      //alert(psa);

      //initialized object and store all data objFormData
      const objFormData = {
        dof: dof,
        gradeLevel: gradeLevel,
        schoolYear: schoolYear,
        semester: semester,
        campus: campus,
        strand: strand,
        lrn: lrn,
        studentFullName: studentFullName,
        gender: gender,
        dob: dob,
        pob: pob,
        nationality: nationality,
        religion: religion,
        address: address,
        brgy: brgy,
        city: city,
        province: province,
        contactNo: contactNo,
        completionDate: completionDate,
        completerAs: completerAs,
        fsn: fsn,
        fsa: fsa,
        fan: fan,
        fs: fs,
        fatherFullName: fatherFullName,
        occupationFather: occupationFather,
        motherFullName: motherFullName,
        occupationMother: occupationMother,
        guardianFullName: guardianFullName,
        rsGuardian: rsGuardian,
        occupationGuardian: occupationGuardian,
        cnGuardian: cnGuardian,
        referralName: referralName,
        referralNumber: referralNumber,

        goodMoral: goodMoral,
        card: card,
        form137: form137,
        psa: psa,
        ID: ID,
        peShirt: peShirt,
        waiver: waiver,
        uniform: uniform,
        allowance: allowance,
        docuFiled: docuFiled
      };
      //console.table(objFormData);
      if(
        isEmpty(gradeLevel) && 
        isEmpty(schoolYear) && 
        isEmpty(semester) && 
        isEmpty(strand) && 
        isEmpty(lrn) && 
        isEmpty(lastName) && 
        isEmpty(firstName) && 
        isEmpty(gender) && 
        isEmpty(dob) && 
        isEmpty(pob) && 
        isEmpty(nationality) && 
        isEmpty(religion) && 
        isEmpty(address) && 
        isEmpty(brgy) && 
        isEmpty(city) && 
        isEmpty(province) && 
        isEmpty(contactNo) && 
        isEmpty(completionDate) && 
        isEmpty(completerAs) && 
        isEmpty(fsn) &&
        isEmpty(fsa) && 
        isEmpty(fan) && 
        isEmpty(fs) && 
        isEmpty(lnFather) && 
        isEmpty(fnFather) && 
        isEmpty(occupationFather) && 
        isEmpty(lnMother) && 
        isEmpty(fnMother) && 
        isEmpty(occupationMother) && 
        isEmpty(lnGuardian) && 
        isEmpty(fnGuardian) && 
        isEmpty(rsGuardian) && 
        isEmpty(occupationGuardian) && 
        isEmpty(cnGuardian)
      ) 
      {
        //alert("Empty");
        Swal.fire({
          title: "Warning",
          html: "Please ensure that you fill up all the field contains red asterisk. Double check your form.",
          icon: "warning",
          confirmButtonText: "Okay",
          confirmButtonColor: "#996515",
          showConfirmButton: true,
          allowEscapeKey : false,
          allowOutsideClick: false
        });
      }
      else {
        //alert("success");
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
            else 
            {
              return new Promise(function(resolve) { 
                setTimeout(function () {
                  //alert("test");
                  //send ajax request to the server
                  $.ajax({
                    method: "POST",
                    url: "assets/api/actions/admission.contr.php",
                    data: { objFormData: objFormData },
                    success: function(result) {
                      //console.log(result);
                      // alert(result);
                      // location.reload();
                      Swal.fire({
                        title: "Thank you! <br/>" + result,
                        html: "Your online application was successfully submitted.<br/>Kindly monitor your email for notifications regarding the status and updates on your admission/enrollment application.",
                        imageUrl: "resources/images/general/gmc/gmc_logo.png",
                        imageHeight: 90,
                        imageAlt: 'Golden Mind School Logo',
                        confirmButtonText: "Okay",
                        confirmButtonColor: "#996515",
                        allowEscapeKey : false,
                        allowOutsideClick: false
                      }).then((res) => {
                        if(res) {
                          //location.reload();
                          window.location.href = 'programs?sp=shs';
                        }
                      });
                    },
                    error: function(error) {
                      alert(error);
                    }
                  });
                }, 3000); //set 3s loading to process data in server
              }); //Promise
            } //end else
          }, //preconfirm
          allowOutsideClick: () => !Swal.isLoading()
        }); //swal
      } //else
    }); //submit
  }); //end of document->ready->function                             
</script>