<?php
session_start();
require_once __DIR__ . '/config/db.connection.php';
require_once __DIR__ . '/app/check_user.php';
ini_set('display_errors',  1);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

    <title>GMCIS | Profile</title>
    <link rel="icon" type="image/png" href="resources/images/system-photo/gmc.favicon.png" sizes="16x16" />
    <?php require_once __DIR__ . '/components/css.file-links.inc.php';?>
  </head>
  <body style="background: url('resources/images/system-photo/gmc-bg.png');">
    <?php require_once __DIR__ . '/components/ui.side-nav.php';?>
    <?php require_once __DIR__ . '/components/ui.top-nav.php';?>
    <?php require_once __DIR__ . '/components/js.file-links.inc.php';?>
    <?php require_once __DIR__ . '/components/msgalert.contr.inc.php';?>
    <?php
      $stmt = mysqli_prepare($connection, "SELECT * FROM users WHERE uname = ?");
      mysqli_stmt_bind_param($stmt, "s", $_SESSION['username']);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
      $row = mysqli_fetch_assoc($result); 
      $gender = $row["gender"];         
    ?> 

    <div class="content-wrap">
      <div class="container">
        <?php require_once __DIR__ . '/components/lmsgalert.inc.php';?>
        <div class="row">
          <div class="col-md-4 mb-3">
            <!--PROFILE PIC CARD-->
            <div class="card">
              <div class="card-body">
                <div class="d-flex flex-column align-items-center text-center">
                  <div class=" profile-container">
                    <img src="resources/images/user-photo-upload/<?= $row['profile_img'] . '.' . $row['img_extension']?>" alt="Admin" class="rounded-circle" width="200"/>
                  </div>
                  <div class="mt-3">
                    <form action="app/actions.controller.php" method="POST" enctype="multipart/form-data">
                      <input type="hidden" name="id">
                      <label for="inputTag" class="btn btn-light text-capitalize" style=" cursor: pointer;">
                        <i class="far fa-solid fa-camera text-info"></i>&nbsp; Change profile
                        <input type="file" id="inputTag" name="profile_img" accept=".jpeg, .jpg, .png" style="display: none;"/>
                      </label>
                      <button type="submit" name="save_profile_photo" 
                      class="btn btn-light text-capitalize m-b-9">
                        <i class="far fa-solid fa-floppy-disk text-success"></i> Save
                      </button>   
                    </form>
                  </div>
                </div>
              </div>
            </div> 

            <!--CHANGE PASS CARD-->
            <div class="card mt-3">
              <!-- tab -->
              <div class="customtab2">
                <ul class="nav nav-tabs " role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#changepass" role="tab">
                      <span class="hidden-down">Password</span> 
                    </a> 
                  </li>      
                  <li class="nav-item"> 
                    <a class="nav-link" data-toggle="tab" href="#export" role="tab">
                      <span class="hidden-down">Backups database</span>
                    </a> 
                  </li>
                </ul>
                <div class="tab-content">
                  <!-- first tab -->
                  <div class="tab-pane active" id="changepass" role="tabpanel">
                    <form action="app/actions.controller.php" method="POST">
                      <ul class="list-group list-group-flush" style="border: none;"><br/>
                        <li>
                          <?php 
                            if(isset($_SESSION['error_password'])) { ?>
                            <p class="text-danger"><?=$_SESSION['error_password'];?></p>
                          <?php unset($_SESSION['error_password']); } ?> 
                          <div class="m-b-5">
                            <span>Username:</span>
                            <input type="text" value="<?= $row['uname'];?>" class="form-control" style="pointer-events: none;"/>
                          </div>
                          <div class="m-b-5">
                            <span>Old Password:</span>
                            <input type="password" id="oldPass" name="oldPassword" class="form-control"/>
                          </div>
                          <div class="m-b-5">
                            <span>New Password:</span>
                            <input type="password" id="newPass" name="newPassword" class="form-control" />
                          </div>
                          <div>
                            <span>Confirm Password:</span>
                            <input type="password" id="confirmPass" class="form-control m-b-5" name="confirmPassword" />
                          </div>
                          <label style="cursor: pointer;">
                            <input onclick="show()" type="checkbox" style="accent-color: gray" />&nbsp;Show all password
                          </label>
                          <button type="submit" name="change_pass" class="btn btn-light m-l-20 m-b-9 border-0">
                            <i class="far fa-solid fa-key text-success"></i> Update
                          </button>   
                        </li>
                      </ul>
                    </form>
                  </div><!--end first tab-->

                  <div class="tab-pane" id="export" role="tabpanel"><br/>
                    <label>Database</label><br/>
                    <button type="button" id="dbBackupBtn" onclick="dbBackupBtn()" 
                    class="btn btn-light text-capitalize border-0" > 
                      <i class="fas fa-solid fa-cloud-arrow-down text-primary"></i> Back up now
                    </button><br/><br/>
                    <label>System Documentation</label><br/>
                    <button type="button" onclick="downloadDocuBtn()" class="btn btn-light border-0">
                      <i class="far fa-solid fa-file-arrow-down text-info "></i> Download
                    </button>
                  </div><!--end second tab-->
                </div><!--end tab content-->
              </div><!--end costumtab2-->
            </div><!--end card-->
          </div><!--end col-->

          <!--USER INFORMATION CARD-->
          <div class="col-md-8">
            <div class="card mb-3">
              <div class="card-body">
                <form action="app/actions.controller.php" method="POST">
                  <h6 class="text-secondary">BASIC INFORMATION</h6><hr>
                  <!--USERS ACCOUNT NAME-->
                  <div class="row m-b-8">
                    <div class="col-2">
                      <span class="contact-title">Account Name:</span>
                    </div>
                    <div class="col-10">
                      <input type="text" class="form-control m-l-13" name="account_name" 
                      value="<?= $row['acct_name'];?>" />
                    </div>
                  </div>

                  <!--USERS ROLE-->
                  <div class="row m-b-8">
                    <div class="col-2">
                      <span class="contact-title">Role:</span>
                    </div>
                    <div class="col-10">
                      <input type="text" class="form-control m-l-13" value="Admin" readonly/>
                    </div>
                  </div>

                  <!--USERS ACCOUNT STATUS-->
                  <div class="row">
                    <div class="col-2">
                      <span class="contact-title">Account Status:</span>
                    </div>
                    <div class="col-10">
                      <?php
                        if($row['status'] == 1) {
                          echo '<span><input class="form-control m-l-13 m-b-20" type="text" value="Active" readonly/><a href="actions/user.profile.php?id='.$row['id'].'&status=0" class="text-white"></a></span>';
                        } 
                      ?> 
                    </div>
                  </div>

                  <!--USERS SCHOOL BRANCH-->
                  <div class="row">
                    <div class="col-2">
                      <span class="contact-title">School Branch:</span>
                    </div>
                    <div class="col-10">
                      <input type="text" name="school_branch" value="<?= $row['school_branch'];?>" class="form-control m-l-13" autocomplete="off" />
                    </div>
                  </div><br/>

                  <h6 class="text-secondary">CONTACT INFORMATION</h6><hr>
                  <!--USERS ADDRESS-->
                  <div class="row m-b-8">
                    <div class="col-2">
                      <span class="contact-title">Address:</span>
                    </div>
                    <div class="col-10">
                      <input type="text" class="form-control m-l-13" name="address" value="<?= $row['address'];?>"/>
                    </div>
                  </div>

                  <!--USERS PHONE NUMBER-->
                  <div class="row m-b-5">
                    <div class="col-2">
                      <span class="contact-title">Phone Number:</span>
                    </div>
                    <div class="col-10">
                      <input type="number" class="form-control m-l-13" name="phone_number" 
                      value="<?= $row['phone_number'];?>"/>
                    </div>
                  </div>

                  <!--USERS EMAIL-->
                  <div class="row m-b-8">
                    <div class="col-2">
                      <span class="contact-title">Email:</span>
                    </div>
                    <div class="col-10">
                      <input type="text" class="form-control m-l-13" name="email" 
                      value="<?= $row['email'];?>" readonly/>
                    </div>
                  </div><br/>

                  <h6 class="text-secondary">OTHER INFORMATION</h6><hr>
                  <!--USERS BIRTHDAY-->
                  <div class="row m-b-8">
                    <div class="col-2">
                      <span class="contact-title">Birthday:</span>
                    </div>
                    <div class="col-10">
                      <input type="date" name="birthday" class="form-control m-l-13"
                      value="<?= $row['birthday'];?>" />
                    </div>
                  </div>

                  <!--USERS GENDER-->
                  <div class="row m-b-8">
                    <div class="col-2">
                      <span class="contact-title">Gender:</span>
                    </div>
                    <div class="col-10">
                      <label style="cursor: pointer;" >
                        <input type="radio" class="m-l-13" name="gender" value="Male" 
                        <?= ($gender == 'Male') ? 'checked' : ''; ?> style="accent-color: gray;">&nbsp;Male
                      </label>&nbsp;&nbsp;&nbsp;&nbsp;
                      <label style="cursor: pointer;" >
                        <input type="radio" name="gender" value="Female"
                        <?= ($gender == 'Female') ? 'checked' : ''; ?> style="accent-color: gray;">&nbsp;Female
                      </label>
                    </div>
                  </div>

                  <button type="submit" name="update_info" class="btn btn-light border-0" style="width: 100%;">
                    <i class="far fa-solid fa-floppy-disk text-success"></i> Update Information
                  </button>   
                </form>
              </div>
            </div>
          </div>

        </div><!--end row-->
      </div><!--end container-->     
    </div><!--end content wrap-->
    <!-- modal -->
    <div id="systemDocumentation" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">
              <i class="fa-solid fa-xmark fa-lg"></i>
            </button>
          </div>
          <div class="modal-body mb-3">
            <img src="resources/images/system-photo/documentationbg.jpg" width=400 class="img-responsive m-l-20"/>
            <h5 class="text-danger text-center">THIS FEATURES IS UNDER DEVELOPMENT.</h5>
          </div>
        </div>
      </div>
    </div>

    <script src="../../vendor/plugins/sweetalert/sweetalert2.min.js"></script>
   </body>
</html>
    <script defer>
      function downloadDocuBtn() {
        //alert("test");
        $('#systemDocumentation').modal('show');
      }

      function dbBackupBtn() {
        Swal.fire({
          title: "<small style='font-size: 19px'>To ensure that only authorized administrators can perform database backups, please provide your username and password for verification.</small>",
          html: `<input type="text" id="username" class="swal2-input" placeholder="Username" autocomplete="off">
          <input type="password" id="password" class="swal2-input" placeholder="Password">`,
          showCancelButton: true,
          confirmButtonText: 'Submit',
          showLoaderOnConfirm: true,
          preConfirm: () => {
            var username = Swal.getPopup().querySelector('#username').value;
            var password = Swal.getPopup().querySelector('#password').value;
            //start validate login credentials
            if (username === false && password === false) {
              return false;
            } else if (username === '' || password === '') {
              Swal.showValidationMessage(`All fields are required!`);
            } 
            else {
              return new Promise(function(resolve) {
                setTimeout(function() { 
                  //validate user credential
                  resolve(fetch('app/DBbackup/validateCredentials.php', {
                    method: 'POST',
                    headers: {
                      'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: `username=${encodeURIComponent(username)}&password=${encodeURIComponent(password)}`
                  })
                  .then(response => { //get response
                    if(!response.ok) {
                      throw new Error(response.statusText);
                    }
                    return response.json();
                  })
                .then(data => {
                  if(data.success) { //if success
                    Swal.fire({
                      title: "Verify Successfully",
                      text: `Click the button ok to download the file`,
                      icon: "success"
                    }).then((result) => {
                      if(result.isConfirmed) {
                        $.ajax({ //send ajax request
                          url: "app/DBbackup/backupScript.php",
                          success: function(response) {
                            //console.log(response);
                            Swal.fire('Download Successfully!', 'Check your folder [DBbackup]', 'success')
                          }
                        });
                      }
                    });
                  } else {
                    Swal.fire({
                      title: "Failed",
                      text: "Incorrect username or password, please try again!",
                      icon: "error"
                    });
                  }
                })
                .catch(error => {
                  Swal.showValidationMessage(`Request failed: ${error}`)
                }))
              }, 2000); //give server time 2s to processed request
            })
          }
        },
        allowOutsideClick: () => !Swal.isLoading()
      });
    }

    //PREVENT USER TO LOGIN SAME ACCOUNT IN DIFFERENT DEVICE OR LOCATION
    function check_sesssion_id() {
      var session_id = "<?php echo $_SESSION['session_id']; ?>";
      fetch('app/check_login.php').then(function(response){
        return response.json();
      }).then(function(responseData){
        if(responseData.output == 'logout'){
          window.location.href = 'auth/logout.php';
        }
      });
    }
    setInterval(function(){
      check_sesssion_id();
    }, 10000);
         
    //PROFILE PICTURE CHANGE INTERFACE
    let selector = document.querySelector("#inputTag");
    let image = document.querySelector(".profile-container img");

    selector.addEventListener("change", function() {
      const file = this.files[0];
      if(file) { //check file
        const reader = new FileReader();
        //get user file
        reader.addEventListener("load", function() {
          image.setAttribute("src", this.result);//display result
        })
        //show file url
        reader.readAsDataURL(file)  
      }
    })

    //Hide and show password
    function show() {
      let oldPassword = document.getElementById("oldPass");
      let newPassword = document.getElementById("newPass");
      let confirmPassword = document.getElementById("confirmPass");

      if(oldPassword.type === "password" && newPassword.type === "password" && confirmPassword.type === "password") 
      {
         oldPassword.type = "text";
         newPassword.type = "text";
         confirmPassword.type = "text";
      } 
      else 
      {
         oldPassword.type = "password";
         newPassword.type = "password";
         confirmPassword.type = "password";
      }  
    }
  </script>