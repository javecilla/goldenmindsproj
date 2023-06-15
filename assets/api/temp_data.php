<?php
session_start();
if(isset($_POST['preferredCampus'])) {
  $_SESSION['campusSelected'] = $_POST['preferredCampus'];
}

if(isset($_POST['cancelReg'])) {
  session_unset();
  session_destroy();
}