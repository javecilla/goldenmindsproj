<?php
/********************************************************
 *  ©JEROME AVECILLA -> ICT 12 DIGNIFIED S.Y 2022-2023
 *******************************************************/
session_start();
require_once __DIR__ . '/../admin/config/db.connection.php';
require_once __DIR__ . '/../admin/app/functions.php';

  $mode = "enter_email";
  if(isset($_GET['mode'])) {
    $mode = $_GET['mode'];
  }

  //checks if there are any values submitted via HTTP POST method 
  if(count($_POST) > 0) {
    //if there is data present, execute this statment
    switch($mode) {
      //case 1 or step 1 for password reset request validation
      case 'enter_email': 
        $email = $_POST['email'];
        $_SESSION['email'] = $email;
        //validate entered email by user
        if(empty($email)) { 
          $_SESSION['resultMessage'] = "Email is required!";
          $_SESSION['resultMessageCode'] = "warning";
          $_SESSION['actionPerform'] = "send";
        }   
        else if(validate_email($email) !== false) {
          $_SESSION['resultMessage'] = "Invalid email address!";
          $_SESSION['resultMessageCode'] = "warning";
          $_SESSION['actionPerform'] = "send";
        }
        else if(!verify_email($email)) { //function to verify user email
          $_SESSION['resultMessage'] = "Your email $email, is not found!";
          $_SESSION['resultMessageCode'] = "error";
          $_SESSION['actionPerform'] = "send";
        }
        else { 
          $_SESSION['forgot']['email'] = $email;  
          //function send code to user entered email address
          #src code will find in admin/app/functions.php
          send_email_code($email);  
          //redirect to enter code mode and display message
          echo '<script>window.location.href="reset.password.request?mode=enter_code";
                    </script>';
          $_SESSION['resultMessage'] = "A code has been sent to your email $email , Check it out.";
          $_SESSION['resultMessageCode'] = "success";
          $_SESSION['actionPerform'] = "send";
          exit();
        }
        header("Location: reset.password.request?mode=" . urlencode("enter_email"));
        exit();

        break;

      //case 2 or step 2 for password reset request validation
      case 'enter_code': 
        $code = $_POST['code'];
        //function to validate user entered code against database
        #src code will find in admin/app/functions.php
        $result = is_code_correct($code); 
        //validate code entered by user
        if(empty($code)) {
          $_SESSION['resultMessage'] = "Please enter the code!";
          $_SESSION['resultMessageCode'] = "warning";
          $_SESSION['actionPerform'] = "send";
        }
        else if(!is_numeric($code)) {
          $_SESSION['resultMessage'] = "Only numbers will accept.";
          $_SESSION['resultMessageCode'] = "warning";
          $_SESSION['actionPerform'] = "send";
        }
        else if(!isset($_SESSION['email']) || !isset($_SESSION['forgot']['email'])) {
          //if user just copy the url to go enter code mode form
          //push them back to enter email mode or step 1 form
          $_SESSION['resultMessage'] = "Something went wrong.";
          $_SESSION['resultMessageCode'] = "error";
          $_SESSION['actionPerform'] = "send";
          header("Location: reset.password.request?mode=" . urlencode("enter_email"));
          exit();
        }
        else if($result == "The code is correct") {
          $_SESSION['forgot']['code'] = $code;  
          header("Location: reset.password.request?mode=" . urlencode("enter_password"));
          $_SESSION['resultMessage'] = "Code verify successfully.";
          $_SESSION['resultMessageCode'] = "success";
          $_SESSION['actionPerform'] = "verified";
          exit();
        }
        else {
          $_SESSION['resultMessage'] = $result;
          $_SESSION['resultMessageCode'] = "error";
          $_SESSION['actionPerform'] = "send";          
        }
        header("Location: reset.password.request?mode=" . urlencode("enter_code"));
        exit();

        break;

      //case 3 or step 3 for password reset request validation
      case 'enter_password':
        //retrieve and sanitize user inputs 
        $password = mysqli_real_escape_string($connection, $_POST['password']);
        $cpassword = mysqli_real_escape_string($connection, $_POST['cpassword']);

        if(empty($password) || empty($cpassword)) {
          $_SESSION['resultMessage'] = "All fields are required!";
          $_SESSION['resultMessageCode'] = "warning";
          $_SESSION['actionPerform'] = "send";
        }
        else if(contains_spaces($password, $cpassword) !== false) {
          $_SESSION['resultMessage'] = "Password should not contain spaces!";
          $_SESSION['resultMessageCode'] = "warning";
          $_SESSION['actionPerform'] = "send";
        }
        else if(password_not_match($password, $cpassword) !== false) {
          $_SESSION['resultMessage'] = "Password and confirm password does not match!";
          $_SESSION['resultMessageCode'] = "warning";
          $_SESSION['actionPerform'] = "send";
        }
        else if(password_short($password, $cpassword) !== false) {
          $_SESSION['resultMessage'] = "Your password is too short, Try atleast 8 characters.";
          $_SESSION['resultMessageCode'] = "warning";
          $_SESSION['actionPerform'] = "send";
        }
        else if(!isset($_SESSION['forgot']['email']) || !isset($_SESSION['forgot']['code'])) {
          //if user just copy the url to go password reset form
          //push them back to enter email mode or step 1 form
          $_SESSION['resultMessage'] = "Something went wrong.";
          $_SESSION['resultMessageCode'] = "error";
          $_SESSION['actionPerform'] = "send";

          header("Location: reset.password.request?mode=" . urlencode("enter_email"));
          exit();
        }
        else { 
          //function to update users password 
          #src code will find in admin/app/functions.php
          save_password($password);                      
        }
        header("Location: reset.password.request?mode=" . urlencode("enter_password"));
        exit();

        break;

      default:
        break; 
    }
  }
//close connection
mysqli_close($connection);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

    <title>GMCIS PRR v1.2</title>
    <link rel="icon" type="image/x-icon" href="../admin/resources/images/system-photo/gmc.favicon.png" sizes="16x16" /> 
    <!--LIBRARY ICONS FILE-->
    <link href="../../vendor/libs/bootstrap/css/icons/helper.css" rel="stylesheet"/>
    <!--LIBRARY ICONS FILE-->
    <link href="../../vendor/libs/icons/all.min.css" rel="stylesheet" />
    <link href="../../vendor/libs/icons/fontawesome.min.css" rel="stylesheet" />
    <!--LIBRARY FRAMEWORK[BOOTSTRAP] FILE-->
    <link href="../../vendor/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="../../vendor/plugins/sweetalert/sweetalert.css">
    <!-- CSS CORE FILE -->
    <link href="../admin/resources/css/style.css" rel="stylesheet" />     
    <link async href="../admin/resources/css/pwdreset.css" rel="stylesheet" defer />

    
    <script src="../../vendor/plugins/jquery/jquery.min.js"></script>  

    <script src="../../vendor/plugins/sweetalert/sweetalert.min.js"></script>       
    <script src="../../vendor/libs/bootstrap/js/bootstrap.min.js"></script>

    <script src="../../vendor/libs/bootstrap/js/preloader/pace.min.js"></script>
    <script async src="../resources/js/scripts.js" defer></script>
    <script src="../resources/js/resetpwdRequest.js" defer></script>
    
  </head>
  <body
  style="background-image: url('../admin/resources/images/system-photo/gmc-bg.png');
    background-attachment: fixed;
    background-repeat: no-repeat;
    background-size: cover;
    overflow-x: hidden;"> 
    <div class="row justify-content-center">
      <div class="col-lg-6">
        <div class="login-content m-t-100">
          <?php include('msgalert.controller.php');?>
          <div class="forgot-password">
            <div class="container" style="width: 100%!important;">
              <?php
                switch($mode) {
                  //STEP 1 VALIDATION FORM
                  case 'enter_email':
                    ?>
                    <h5 class="mb-4 text-uppercase text-muted">
                      <i class="ti-shift-right-alt"></i><b>password reset request</b>
                    </h5> 
                    <!-- start progressbar -->
                    <div class="progress mb-2">
                      <div class="progress-bar bg-success" role="progressbar" 
                      aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"
                      style="width: 25%;"></div>
                    </div>
                    <ul id="progressbar" class="text-center">
                      <li class="active text-success">User Email</li>
                      <li>Code Verification</li>
                      <li>Reset Password</li>
                    </ul>
                    
                    <!--user guide-->
                    <p class="form-control instruction1" style="height: 80px!important; padding: 15px; background: #F0FBFA!important; font-size: 15px;">
                      <i class="fa-solid fa-circle-info info-icon"></i>&nbsp;
                      Please be advised that the code will be sent to the email address associated with your account. To continue reset your password as may follows instructions.
                    </p><hr/>
                    <form action="reset.password.request.php?mode=enter_email" method="POST">

                      <!--FOR EMAIL INPUT BOX--> 
                      <label class="label">Enter your email: <span class="asterisk">*</span></label>
                      <div class="input-group mb-4">
                        <i class="fa-solid fa-envelope email-icon"></i>
                        <input type="email" name="email" id="email" placeholder="sample@domain.com"  class="email-input-field form-control" autocomplete="on" /> 
                      </div>
                      <div class="action-group">
                        <div class="row">
                          <div class="col-5">
                            <button type="submit" name="next" class="btn next btn-success btn-flat">  
                              Next <i class="fa-solid fa-arrow-right"></i>
                            </button><br/><br/>
                          </div>
                        </div>
                        <p class="signin-btn">Back to <a href="login"> Login</a></p>
                      </div><br/> 
                    </form>
                    <?php
                    break;
                  //STEP 2 VALIDATION FORM
                  case 'enter_code':
                    ?>
                      <h5 class="mb-4 text-uppercase text-muted">
                        <i class="ti-shift-right-alt"></i><b>password reset request</b>
                      </h5> 
                      <!-- start progressbar -->
                      <div class="progress mb-2">
                        <div class="progress-bar bg-success" role="progressbar" 
                        aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"
                        style="width: 55%;"></div>
                      </div>
                      <ul id="progressbar" class="text-center">
                        <li class="active text-success">User Email</li>
                        <li class="active text-success">Code Verification</li>
                        <li>Reset Password</li>
                      </ul>
                      <!--user guide-->
                      <p class="form-control instruction2" style="height: 100px!important; 
                        padding: 15px; font-size: 15px; background: #F0FBFA!important;">
                        <i class="fa-solid fa-circle-info info-icon" ></i>&nbsp;
                        Kindly take note that the code sent to your email is time-sensitive and will expire after 5 minutes. To ensure a successful verification process, we kindly request that you enter the code within the specified timeframe.
                      </p><hr/>
                      <form action="reset.password.request.php?mode=enter_code" method="POST">
                        <?php 
                          if(isset($_SESSION['error_resetpwd'])) { ?>
                          <p class="text-danger" style="position: absolute; left: 24%"><?=$_SESSION['error_resetpwd'];?></p>
                        <?php unset($_SESSION['error_resetpwd']); } ?> 
                        <!--FOR CODE INPUT BOX--> 
                        <label for="code" class="label">Enter the code:<span class="asterisk">*</span></label>
                        <div class="input-group mb-4">
                          <i class="fa-solid fa-key code-icon"></i>
                          <input type="text" name="code" placeholder="#####"  class="code-input-field form-control" autocomplete="off"/> 
                        </div>
                        <div class="action-group">
                          <div class="row">
                            <div class="col-5">
                              <button type="submit" name="next" class="btn next btn-success btn-flat">  
                                Next <i class="fa-solid fa-arrow-right"></i>
                              </button><br/><br/>
                            </div>
                            <div class="col-5">
                              <button type="button" name="" class="btn cancel btn-flat" 
                              onclick="window.location.href='reset.password.request.php?passwordreset=request'">Cancel</button>
                            </div>
                          </div>
                          <p class="signin-btn">Back to <a href="login"> Login</a></p>
                        </div><br/>             
                      </form>
                    <?php
                    break;
                    //STEP 3 VALIDATION FORM
                    case 'enter_password':
                      ?>
                        <h5 class="mb-4 text-uppercase text-muted">
                          <i class="ti-shift-right-alt"></i><b>password reset request</b>
                        </h5> 
                        <!-- start progressbar -->
                        <div class="progress mb-2">
                          <div class="progress-bar bg-success" role="progressbar" 
                          aria-valuenow="99" aria-valuemin="0" aria-valuemax="100"
                          style="width: 99%;"></div>
                        </div>
                        <ul id="progressbar" class="text-center">
                          <li class="active text-success">User Email</li>
                          <li class="active text-success">Code Verification</li>
                          <li class="active text-success">Reset Password</li>
                        </ul>
                        <!--user guide-->
                        <p class="form-control instruction2" style="height: 55px!important; 
                          padding: 15px; font-size: 15px; background: #F0FBFA!important;">
                          <i class="fa-solid fa-circle-info info-icon" ></i>&nbsp;
                          You may now choose a new password for your account.
                        </p><hr/>

                        <form action="reset.password.request.php?mode=enter_password" method="POST">
                          <?php 
                            if(isset($_SESSION['error_resetpwd'])) { ?>
                              <p class="text-danger" style="position: absolute; left: 30%">
                              <?=$_SESSION['error_resetpwd'];?></p>
                          <?php unset($_SESSION['error_resetpwd']); } ?>

                          <!--FOR PASSWORD INPUT BOX-->
                          <label for="password" class="label">Enter new password: 
                            <span class="asterisk">*</span>
                          </label>
                          <div class="input-group" id="show_hide_password">
                            <span class="fa-solid fa-lock-open code-icon"></span>  
                            <input type="password" name="password" id="pwd" placeholder="00000000" class="form-control password-input-field" autocomplete="off" />
                            <div class="btn-addon">
                              <a href=""><i class="fa fa-eye-slash eye-icon"></i></a>
                            </div>
                          </div>
                          <br/><!--FOR CONFIRM PASSWORD INPUT BOX-->
                          <label for="cpassword" class="label">Confirm your password: 
                            <span class="asterisk">*</span>
                          </label>
                          <div class="input-group" id="show_hide_password">
                            <span class="fa-solid fa-lock code-icon"></span>
                            <input type="password" name="cpassword" id="cpwd" placeholder="00000000" class="form-control password-input-field" autocomplete="off" />
                            <div class="btn-addon">
                              <a href=""><i class="fa fa-eye-slash eye-icon"></i></a>
                            </div>
                          </div><br/>
                          <div class="action-group">
                            <div class="row">
                              <div class="col-5">
                                <button type="submit" name="next" class="btn next btn-success btn-flat"> 
                                  Save &nbsp;<i class="fa-solid fa-floppy-disk"></i>
                                </button><br/><br/>
                              </div>
                              <div class="col-5">
                                <button type="button" name="" class="btn cancel btn-flat" 
                                  onclick="window.location.href='reset.password.request.php?passwordreset=request'">
                                  Cancel
                                </button>
                              </div>
                            </div>
                            <p class="signin-btn">Back to <a href="login"> Login</a></p>
                          </div><br/>   
                        </form>
                      <?php
                      break;

                      default:
                      break; 
                    }
                  ?> 
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
   </body>
</html>