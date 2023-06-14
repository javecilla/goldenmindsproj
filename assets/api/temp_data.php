<?php
session_start();
if(isset($_POST['preferredCampus'])) {
  $_SESSION['campusSelected'] = $_POST['preferredCampus'];
}

if(isset($_POST['useremail'])) {
  if(!filter_var($_POST['useremail'], FILTER_VALIDATE_EMAIL)) {
    $errMsg = "Invalid Email Address! Please provide a valid email.";
    #response array
    $error = array('error' => 1, 'message' => $errMsg);
    //printing out php array and converting it into json format
    echo json_encode($error);
    exit();  
  } else {
    $_SESSION['lrn'] = $_POST['lrn'];
    $_SESSION['phonenum'] = $_POST['phonenum'];
    $_SESSION['useremail'] = $_POST['useremail'];
    $_SESSION['userpword'] = $_POST['userpword'];
  } 
}