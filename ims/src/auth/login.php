<?php
session_start();
ini_set('display_errors',  1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head> 
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=0"/>
    <meta name="robots" content="noindex, nofollow" />  
    <!-- Page description and ext information-->
    <meta name="description" content="&lt;%=GMCIS Login.strAppName %>" />
    <meta name="author" content="Jerome Avecilla" /> 
    <meta name="copyright" content="Golden Minds Colleges" />
    <meta name="category" content="GMCIS Log In, Inventory System" />

    <title>GMCIS Log In v1.2</title> 
    <link rel="icon" type="image/x-icon" href="../admin/resources/images/system-photo/gmc.favicon.png" sizes="16x16" /> 

    <!--LIBRARY ICONS FILE-->
    <link href="../../vendor/libs/icons/all.min.css" rel="stylesheet" />
    <link href="../../vendor/libs/icons/fontawesome.min.css" rel="stylesheet" />
    <!--LIBRARY FRAMEWORK[BOOTSTRAP] FILE-->
    <link href="../../vendor/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <!-- CSS CORE FILE -->
    <link href="../admin/resources/css/style.css" rel="stylesheet" />     
    <link  rel="stylesheet" type="text/css" href="../admin/resources/css/login.css" defer />
    <link rel="stylesheet" type="text/css" href="../../vendor/plugins/sweetalert/sweetalert.css">
    <!--LIBRARY FRAMEWORK[JQUERY] FILE-->
    <script src="../../vendor/plugins/jquery/jquery.min.js"></script>
          
    <!--LIBRARY FRAMEWORK[BOOTSTRAP] FILE-->
    <script src="../../vendor/libs/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../vendor/libs/bootstrap/js/preloader/pace.min.js"></script> 
    <script src="../../vendor/plugins/sweetalert/sweetalert.min.js"></script>
  </head>

  <body oncontextmenu="return false" 
  style="background-image: url('../admin/resources/images/system-photo/bg-school.png');
    background-attachment: fixed;
    background-repeat: no-repeat;
    background-size: cover;
    overflow-x: hidden;">
    <?php require_once __DIR__ . '/msgalert.controller.php';?>
    <div class="row justify-content-center">
      <div class="login-content">
        <div class="logo text-center">
          <a href="login">
            <img src="../admin/resources/images/system-photo/gmc.png" class="login-logo img-responsive"  alt="GMC logo" />
          </a> 
        </div> 
        <div class="login-form container">
          <div class="form">
            <h3 class="form-title">Inventory System</h3><br/>
            <form action="../admin/app/actions.controller.php" method="POST" id="loginForm">
              <?php
                if(isset($_SESSION['error_message'])) { ?>
                  <p class="text-danger error-msg"><?=$_SESSION['error_message'];?></p>
              <?php unset($_SESSION['error_message']); } ?> 

              <input type="hidden" name="acct_name"/>
              <div class="form-group">
                <!--FOR USERNAME INPUT BOX--> 
                <div class="input-group mb-2">
                  <i class="fa fa-user icon"></i>
                  <input type="text" placeholder="Username"  class="username-input-field" 
                  name="username" id="uname" onpaste="false" autocomplete="off"/> 
                </div>
                <!--FOR PASSWORD INPUT BOX-->
                <div class="input-group " id="show_hide_password">
                  <span class="fa-solid icon fa-key"></span>  
                  <input type="password" placeholder="Password" class="password-input-field "
                  name="password" id="pword" onpaste="false" autocomplete="off"  />
                  <div class="btn-addon" >
                    <a href=""><i class="fa fa-eye-slash eye-icon"></i></a>
                  </div>
                </div>  
              </div>
              <?php
                if(isset($_SESSION['locked'])) { //check locked
                  $locked_duration = time() - $_SESSION['locked']; //set locked duration
                  if($locked_duration > 60) { //if locked duration reach 60 seconds or 1 minute
                    // NOTE: pedeng i set ang time duration depende sa security requirements
                    unset($_SESSION['locked']);  //remove login locked
                    unset($_SESSION['login_attempts']);  //reset login attempt
                  }
                }
              ?> 

              <?php
                // Check if the user has exceeded the maximum login attempts, attempt available = 4
                if(isset($_SESSION['login_attempts']) && $_SESSION['login_attempts'] >= 4) {
                  // If the user has exceeded the maximum login attempts, then login button will lock
                  $_SESSION['locked'] = time();
                  ?>
                  <p class='attempt-message text-danger'>
                    <span><b>System says:</b></span> Due to repeated and many login attempts or other suspicious activity, login for your account is temporarily
                    disabled. Please try again later, after a minute.
                  </p>
                  <?php
                } else {
                  ?>          
                  <button type="submit" name="login" class="login-btn btn btn-flat m-b-15">
                    Login <i class="fa-solid fa-right-to-bracket"></i>
                  </button>
                  <?php 
                } 
              ?>
            </form><br/> 
            <!-- PASSWORD RESET REQUEST -->
            <div class="forgot-password mb-4">
              <h4 class="forgot-password">Forgot your password?</h4>
              <div class="reset-password"> 
                <span class="first-sentence"> If you are having trouble logging in,</span>
                <a href="reset.password.request?mode=enter_email" class="link">
                  <span><i> please click here </i></span>
                </a> 
                <span class="second-sentence">&nbsp; to reset your password.</span>
              </div>    
            </div>
            <div class="col rounded-2 mb-3 hr"></div> <!--HORIZONTAL LINE-->
            <!--ACKNOWLEDGEMENT-->
            <p class="notes" style="">
              Note: This system is for authorized users only. If you do not have an account, please contact the system administrator to request access.
            </p>   
          </div>
        </div>
        <!-- DEVELOPER CREDITS -->
        <div class="developer mt-4 text-center text-white">
          <span class="d-block">Copyright &copy; 2023 - GMCIS</span>
          <small>Developed by ICT 12-Dignified SMB-Researchers.</small>
        </div>
      </div>
    </div>
   </body>
</html>
<script defer type="text/javascript">
  //Auto focus in input username when login page load or reload
   window.onload = function() {
    var usernameInput = document.getElementById("uname");
    usernameInput.focus();
   }

   //prevent history back
   function preventBack() {
      window.history.forward(); 
   }
   setTimeout("preventBack()", 0); //set timeout 0 milliseconds deley
   window.onunload = function(){null}; 

  //Hide and show password
  $(document).ready(function() {
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
  });

  //prevent viewing source code
  document.onkeydown = function(e) {
    if(e.keyCode == 123) {
      return false;
    }
    if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)){
      return false;
    }
    if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)){
      return false;
    }
    if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)){
      return false;
    }
    if(e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)){
      return false;
    }      
  }
</script>