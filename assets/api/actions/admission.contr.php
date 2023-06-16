<?php
require_once __DIR__ . '/../class/contr/admission.contr.class.php';
error_reporting(E_ALL);

#action to handle payload request for student admission
if(isset($_POST['objFormData'])) {
  //$payload = $_POST['objFormData'];
  //print_r($payload);
  //echo "payload recieve";

  /** 
  * sanitized and extract the data submitted by user
  * stored all data submiited in array
  */

  $studentDataInput = array(
    'dof' => $_POST['dof'],
    'gradeLevel' => $_POST['gradeLevel'],
    'schoolYear' => $_POST['schoolYear'],
    'semester' => $_POST['semester'],
    'campus' => $_POST['campus'],
    'strand' => $_POST['strand'],
    'lrn' => filter_var($_POST['lrn'], FILTER_SANITIZE_NUMBER_INT),
    'studentFullName' => filter_var($_POST['studentFullName'], FILTER_SANITIZE_STRING),
    'gender' => $_POST['gender'],
    'dob' => $_POST['dob'],
    'pob' => filter_var($_POST['pob'], FILTER_SANITIZE_STRING),
    'nationality' => filter_var($_POST['nationality'], FILTER_SANITIZE_STRING),
    'religion' => filter_var($_POST['religion'], FILTER_SANITIZE_STRING),
    'address' => filter_var($_POST['address'], FILTER_SANITIZE_STRING),
    'brgy' => filter_var($_POST['brgy'], FILTER_SANITIZE_STRING),
    'city' => filter_var($_POST['city'], FILTER_SANITIZE_STRING),
    'province' => filter_var($_POST['province'], FILTER_SANITIZE_STRING),
    'contactNo' => filter_var($_POST['contactNo'], FILTER_SANITIZE_NUMBER_INT),
    'completionDate' => $_POST['completionDate'],
    'completerAs' => $_POST['completerAs'],
    'fsn' => filter_var($_POST['fsn'], FILTER_SANITIZE_STRING),
    'fsa' => filter_var($_POST['fsa'], FILTER_SANITIZE_STRING),
    'fan' => filter_var($_POST['fan'], FILTER_SANITIZE_STRING),
    'fs' => filter_var($_POST['fs'], FILTER_SANITIZE_STRING),
    'fatherFullName' => filter_var($_POST['fatherFullName'], FILTER_SANITIZE_STRING),
    'occupationFather' => filter_var($_POST['occupationFather'], FILTER_SANITIZE_STRING),
    'motherFullName' => filter_var($_POST['motherFullName'], FILTER_SANITIZE_STRING),
    'occupationMother' => filter_var($_POST['occupationMother'], FILTER_SANITIZE_STRING),
    'guardianFullName' => filter_var($_POST['guardianFullName'], FILTER_SANITIZE_STRING),
    'rsGuardian' => filter_var($_POST['rsGuardian'], FILTER_SANITIZE_STRING),
    'occupationGuardian' => filter_var($_POST['occupationGuardian'], FILTER_SANITIZE_STRING),
    'cnGuardian' => filter_var($_POST['cnGuardian'], FILTER_SANITIZE_NUMBER_INT),
    'referralName' => filter_var($_POST['referralName'], FILTER_SANITIZE_STRING),
    'referralNumber' => filter_var($_POST['referralNumber'], FILTER_SANITIZE_NUMBER_INT),
  );

  $insertDataObj = new AdmissionContr();
	$insertDataObj->createNewStudentRecord($studentDataInput);
}