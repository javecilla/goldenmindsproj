<!DOCTYPE html>
<html lang="en">
<head>
<title>Account Registration</title>
   <?php require_once __DIR__ . '/links.php'?>
</head>
<body>
  <div class="auth-wrapper center" id="center" style="width: 100%!important;">
    <div class="card qualifications_card">
      <div class="card-header" style="background-color: #996515; color:#fff; opacity: .8;">
        <h2 class="text-white quali-head-title pb-3">Enrollment / Application Form</h2>
      </div>
      <div class="card-body">
        <form action="/" method="/" id="qualification_form"> 
          <div class="row">
            <!-- first column -->
            <div class="col-lg-6">
              <label class="text-uppercase typeform mb-4">Applying For</label>

              <div class="">
                <h6 class="card-title text-muted">Date of Admission:</h6>
                <input type = 'date' name = "dtreg" id = 'dtreg' class="form-control" onclick = 'age()' onchange = 'age()' required>
              </div> 

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
                <select class="form-select quali-select" name = 'cmbsy' id = 'cmbsy'>
                  <option value="" selected>-- SELECT --</option>
                  <option value="2023-2024">2023-2024</option>
                  <option value="2022-2023">2022-2023</option>
                  <option value="2021-2022">2021-2022</option>
                </select>
              </div>

              <div class="mt-3">
                <label class="mb-1 quali-label"><strong>• Semester <span class="text-danger">*</span></strong></label>
                <select class="form-select quali-select" name = 'cmbsemester' id = 'cmbsemester'>
                  <option value="" selected>-- SELECT --</option>
                  <option value="1st Semester">1st Semester</option>
                  <option value="2nd Semester">2nd Semester</option>
                </select>
              </div>

              <div class="mt-3">
                <label class="mb-1 quali-label"><strong>• School Branch/Campus</strong></label>
                <select class="form-select quali-select" name = "txtschool" id = 'txtschool'>
                  <option value="" selected>Select your preferred Golden Minds Branch/Campus...</option>
                  <option value="Sta. Maria, Bulacan">Sta. Maria, Bulacan</option>
                  <option value="Balagtas, Bulacan">Balagtas, Bulacan</option>
                </select>
              </div>

              <div class="mt-3">
                <label class="mb-1 quali-label"><strong>• Track/Strand <span class="text-danger">*</span></strong></label>
                <input type = 'search' list = 'strand' name = 'cmbstrand' id = 'cmbstrand' 
                class="form-control" placeholder = 'Track / Strand' required>
              </div>

              <div class="mt-3 mb-4">
                <label class="mb-1 quali-label"><strong>• LRN <span class="text-primary">*</span></strong> Leave it blank if not applicable to you</label>
                <div class="form-control">
                  <input name = "txtlrn" id = 'txtlrn' type="text" class="form-control" placeholder="Enter your LRN"/>
                </div>
              </div>

              <label class="text-uppercase typeform mb-4">Personal Information</label>  
              <div class="mt-3 mb-4">
                <label class="mb-1 quali-label"><strong>• Full Name <span class="text-danger">*</span></strong></label>
                <input name = "txtlrn" id = 'txtlrn' type="text" class="form-control" placeholder="Your full name"/>
                <small class="guide"><span class="text-danger">*</span> Your complete name based on your PSA birth certificate</small>
              </div>

              <div class="mt-3 radio-group">
                <label class="mb-1 quali-label"><strong>• Gender / Sex <span class="text-danger">*</span></strong></label>
                <div class="form-control">
                  <label class="radio quali-label">
                    <input type="radio" name = "rbmale" id = 'rbmale' onclick = 'male()'/> Male
                  </label>&nbsp;&nbsp;
                  <label class="radio quali-label">
                    <input type="radio" name = "rbfemale" id = 'rbfemale' onclick = 'female()'/> Female
                  </label>
                  <input type="hidden"  name = "txtgender" id = 'txtgender'/>
                </div>
              </div>

              <div class="mt-3">
                <label class="mb-1 quali-label"><strong>• Date of Birth <span class="text-danger">*</span></strong></label>
                <div class="input-group">
                  <span class="input-group-text"><span name = "txtage" id = "txtage">Age: </span></span>
                  <input type="date" name = "dtbday" id = 'dtbday' onclick = 'age()' onchange = 'age()' class="form-control" />
                </div>
                <small class="guide"><span class="text-danger">*</span> Select the month, day and year of your birth, or type it following this format: mm/dd/yyyy (Example: 24/03/2004)</small>
              </div>

              <div class="mt-3">
                <label class="mb-1 quali-label"><strong>• Place of Birth <span class="text-danger">*</span></strong></label>
                <input type="text" name = "txtbirthplace" id = 'txtbirthplace' class="form-control" placeholder="Your Place of Birth"/>
                <small class="guide"><span class="text-danger">*</span> Your complete place of birth based on your PSA birth certificate</small>
              </div>

              <div class="mt-3">
                <div class="row">
                   <div class="col-6">
                    <label class="mb-1 quali-label"><strong>• Nationality <span class="text-danger">*</span></strong></label>
                    <input type="text" name = "txtnationality" id = 'txtnationality' class="form-control" placeholder="Your Nationality"/>
                  </div>
                  <div class="col-6">
                    <label class="mb-1 quali-label"><strong>• Religion <span class="text-danger">*</span></strong></label>
                    <input type="text" name = "txtreligion" id = 'txtreligion' class="form-control" placeholder="Your Religion" />
                  </div>
                </div>
              </div>

              <label class="text-uppercase typeform mb-4 mt-4">Address and Contact Details</label>
              <div class="mt-3">
                <label class="mb-2 quali-label"><strong>• Address <span class="text-danger">*</span></strong></label>
                <input type="text" name = "txthouseno" id = 'txthouseno' class="form-control" placeholder="House no. Street Name" />
                <small class="guide"><span class="text-danger">*</span> Your complete current address based on your PSA birth certificate. Example: [Ph7, Blk3, Lot24 Demacia St.]</small>   
              </div>

              <div class="mt-3">
                <label class="mb-2 quali-label"><strong>• Baranggay <span class="text-danger">*</span></strong></label>
                <input type="text" name = "txtbrgy" id = 'txtbrgy' class="form-control" placeholder="Ex: Brgy. Sagabal"/>
              </div>

              <div class="mt-3">
                <label class="mb-2 quali-label"><strong>• City / Municipality <span class="text-danger">*</span></strong></label>
                <input type="text" name = "txtcity" id = 'txtcity' class="form-control" placeholder="Your City"/>
              </div>

              <div class="mt-3">
                <label class="mb-2 quali-label"><strong>• Province / Region <span class="text-danger">*</span></strong></label>
                <input type="text" name = "txtprovince" id = 'txtprovince' class="form-control" placeholder="Your Province"/>
              </div>

              <div class="mt-3">
                <label class="mb-2 quali-label"><strong>• Contact No. <span class="text-danger">*</span></strong></label>
                <input type="number" name = "txtcontactno" id = 'txtcontactno' class="form-control" placeholder="Phone Number"/>
              </div>
            </div> <!--end first column-->

            <!-- second column -->
            <div class="col-lg-6"> 
              <label class="text-uppercase typeform mb-4">Student Last School Attended</label>
              <div class="mt-3">
                <label class="mb-2 quali-label"><strong>• Completion Date </strong></label>
                <input type="date" name = "dtcompletion" id = 'dtcompletion' class="form-control"/>
              </div>

              <div class="mt-3">
                <label class="mb-2 quali-label"><strong>• Completer as <br/><span class="text-primary"> *</span></strong> Please specify what type of completer are you</label>
                <input list = 'completerAs' name = 'cmbcompleterAs' id = 'cmbcompleterAs' onclick = 'clrcompleterAs()' placeholder = 'Completer As' class="form-control"/>
                <datalist id = 'completerAs'>
                  <option value = 'High School Completer'></option>
                  <option value = 'Junior High School Completer'></option>
                  <option value = 'PEPT Passer'></option>
                  <option value = 'ALS A&E Passer'></option>
                  <option value = 'Others'></option>
                </datalist>
              </div>

              <div class="mt-3">
                <label class="quali-label mb-2"><strong>• Former School Name <span class="text-danger"> *</span></strong></label>
                <input type="text" name = "txtschoolname" id = 'txtschoolname' class="form-control" placeholder="Last School Attended" />
              </div>

              <div class="mt-3">
                <label class="quali-label mb-2"><strong>• Former School Address <span class="text-danger"> *</span></strong></label>
                <input type="text" name = "txtschooladdress" id = 'txtschooladdress'class="form-control" placeholder="Last School Attended"/>
              </div>

              <div class="mt-3">
                <label class="quali-label mb-2"><small class="guide">
                  <span class="text-primary">*</span> <strong>Note:</strong> 
                    Enter name of your former grade 10 teacher and section 
                    (For graduate High School and Junior High School). Leave it blank if not applicable to you.</small></label>
                <div class="row">
                  <div class="col-6">
                    <input type="text" name = "txtadviser" id = 'txtadviser' class="form-control" placeholder="Grade 10 Adviser"/>
                   </div>
                  <div class="col-6">
                    <input type="text" name = "txt10sec" id = 'txt10sec' class="form-control" placeholder="Grade 10 Section"/>
                  </div>
                </div>
              </div>

              <label class="text-uppercase typeform mb-4 mt-4">Parents / Guardian Information</label>
              <div class="mt-3">
                <label class="quali-label mb-2"><strong>• Father's Information <span class="text-danger">*</span></strong></label>
                <div class="row mt-1">
                  <div class="col-6">
                    <input type="text" name = "txtfather" id = 'txtfather'class="form-control" placeholder="Father's full name (L.N., F.N. M.N.)"/>
                  </div> 
                  <div class="col-6">
                    <input type="text" name = "txtfoccupation" id = 'txtfoccupation' class="form-control" placeholder="Occupation" />
                  </div>
                </div>

                <div class="mt-3">
                  <label class="quali-label mb-2"><strong>• Mother's Information <span class="text-danger">*</span></strong></label>
                  <div class="row mt-1">
                    <div class="col-6">
                      <input type="text" name = "txtmother" id = 'txtmother' class="form-control" placeholder="Mother's full name (L.N., F.N. M.N.)"/>
                    </div> 
                    <div class="col-6">
                      <input type="text" name = "txtmoccupation" id = 'txtmoccupation' class="form-control" placeholder="Occupation" />
                    </div>
                  </div>
                </div>

                <label class="text-uppercase typeform mb-4 mt-4">Contact Emergency Person</label>
                <div class="mt-2">
                  <label class="quali-label mb-2"><strong>• Guardian Information <span class="text-danger">*</span></strong></label>
                  <div class="row mt-1">
                    <div class="col-6">
                      <input type="text" name = "txtguardian" id = 'txtguardian' class="form-control" placeholder="Guardian full name (L.N., F.N. M.N.)"/>
                    </div> 
                    <div class="col-6 mt-2">
                      <input type="text" name = "txtrelationship" id = 'txtrelationship' class="form-control" placeholder="Relationship" />
                    </div>
                  </div>
                  <div class="row mt-1">
                    <div class="col-6">
                      <input type="text" name = "txtgcontactno" id = 'txtgcontactno' class="form-control" placeholder="Guardian Contact no."/>
                    </div> 
                    <div class="col-6 mt-2">
                      <input type="text" name = "txtgoccupation" id = 'txtgoccupation' class="form-control" placeholder="Occupation" />
                    </div>
                  </div>
                  <input type = 'text' name = "txtguardianaddress" id = 'txtguardianaddress' class="form-control" placeholder = 'Guardian Address'>
                </div>

                <label class="text-uppercase typeform mb-4 mt-4">Referral Person's Information</label><br/>
                <label class="guide"><span class="text-primary">*</span> <strong>Note:</strong> Enter your referral information thus Leave it blank if not applicable to you.</label>
                <div class="mt-2">
                  <div class="row mt-1">
                    <div class="col-6">
                      <input type="text" name = "txtrname" id = 'txtrname' class="form-control" placeholder="Refferal Name" />
                    </div> 
                    <div class="col-6">
                      <input type="text" name = "txtrnum" id = 'txtrnum' class="form-control" placeholder="Refferal Number" />
                    </div>
                  </div>
                </div>

                <label class="text-uppercase typeform mb-4 mt-4">Documents</label><br/>
                <label class="guide"><span class="text-primary">*</span> <strong>Note:</strong> Please check the documents if you already have.</label>
                <div class="mt-2">
                  <div class="row">
                    <div class="col-4">
                      <label>
                        <input type="checkbox" name = 'chkgm' id = 'chkgm' onclick = 'gm()'/> <span>Good Moral</span>
                        <input type="hidden" name = 'txtgm' id = 'txtgm'/>
                      </label>
                    </div>
                    <div class="col-4">
                      <label>
                        <input type="checkbox" name = 'chkcard' id = 'chkcard' onclick = 'card()'/> <span>Card</span>
                        <input type="hidden" name = 'txtcard' id = 'txtcard'/>
                      </label>
                    </div>
                    <div class="col-4">
                      <label>
                        <input type="checkbox" name = 'chkf137' id = 'chkf137' onclick = 'f137()'/> <span>Form 137</span>
                        <input type="hidden" name = 'txtf137' id = 'txtf137'/>
                      </label>
                    </div>
                  </div>

                  <label class="mt-3">
                    <input type="checkbox" name = 'chkpsa' id = 'chkpsa' onclick = 'psa()'/> <span>PSA</span>
                    <input type="text" name = 'txtremarks' id = 'txtremarks' placeholder="PSA Remarks"/><br/><br/>
                    <span><span class="text-danger mt-2">*</span> <strong>Note:</strong> Please specifies your psa submitted [e.g., Photocopy/Xerox or Orginal]</span><br/><br/>
                    <input type="hidden" name = 'txtpsa' id = 'txtpsa'/>
                  </label>
                          
                  <div class="row mb-3">
                    <div class="col-4">
                      <label>
                        <input type="checkbox" name = 'chkstudid' id = 'chkstudid' onclick = 'studid()'/> <span>ID</span>
                        <input type="hidden" name = 'txtstudid' id = 'txtstudid'/>
                      </label>
                    </div>
                    <div class="col-4">
                      <label>
                        <input type="checkbox" name = 'chkpe' id = 'chkpe' onclick = 'pe()'/> <span>PE Shirt</span>
                        <input type="hidden" iname = 'txtpe' id = 'txtpe'/>
                      </label>
                    </div>
                    <div class="col-4">
                      <label>
                        <input type="checkbox" name = 'chkwaiver' id = 'chkwaiver' onclick = 'waiver()'/> <span>Waiver</span>
                        <input type="hidden" name = 'txtwaiver' id = 'txtwaiver'/>
                      </label>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-4">
                      <label>
                        <input type="checkbox" name = 'chkuniform' id = 'chkuniform' onclick = 'uniform()'/> <span>Uniform</span>
                        <input type="hidden" name = 'txtuniform' id = 'txtuniform'/>
                      </label>
                    </div>
                    <div class="col-4">
                      <label>
                        <input type="checkbox" name = 'chkallow' id = 'chkallow' onclick = 'allow()'/> <span>Allowance</span>
                        <input type="hidden" name = 'txtallow' id = 'txtallow'/>
                      </label>
                    </div>
                    <div class="col-4">
                      <label>
                        <input type="checkbox" name = 'chkdoc' id = 'chkdoc' onclick = 'doc()'/> <span>Document Filed</span>
                        <input type="hidden" name = 'txtdoc' id = 'txtdoc'/>
                      </label>
                    </div>
                  </div>
                </div>
              </div><!--end second column-->
            </div><!--row-->
            <div class="actions-btn mt-4">
              <button type="button" name = "back2" id = "btnback2" class="btn btn-secondary btn-sm ">Back</button>
              <button type="submit" onclick="test()" name = "register2" id = "btnregister2" class="btn btn-sm float-end" style="background-color: #996515; color:#fff; opacity: .8;">
                Submit <i class=" fas fa-arrow-right"></i>
              </button>
            </div>
          </form> 
        </div><!--card body-->
      </div><!--card-->
    </div><!--End login box-->
  </body>
</html>
