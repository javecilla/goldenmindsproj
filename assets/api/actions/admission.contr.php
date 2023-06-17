<?php
require_once __DIR__ . '/../class/contr/admission.contr.class.php';
error_reporting(E_ALL);

#action to handle payload request for student admission
if(isset($_POST['objFormData'])) {
  $payload = $_POST['objFormData'];
  //print_r($payload);
  //echo "payload recieve";

  /** 
  * sanitized and extract the data submitted by user
  * stored all data submiited in array
  */

  $studentDataInput = array(
    'dof' => $payload['dof'],
    'gradeLevel' => $payload['gradeLevel'],
    'schoolYear' => $payload['schoolYear'],
    'semester' => $payload['semester'],
    'campus' => $payload['campus'],
    'strand' => $payload['strand'],
    'lrn' => filter_var($payload['lrn'], FILTER_SANITIZE_NUMBER_INT),
    'studentFullName' => htmlspecialchars($payload['studentFullName'], ENT_QUOTES | ENT_HTML5),
    'gender' => $payload['gender'],
    'dob' => $payload['dob'],
    'pob' => htmlspecialchars($payload['pob'], ENT_QUOTES | ENT_HTML5),
    'nationality' => htmlspecialchars($payload['nationality'], ENT_QUOTES | ENT_HTML5),
    'religion' => htmlspecialchars($payload['religion'], ENT_QUOTES | ENT_HTML5),
    'address' => htmlspecialchars($payload['address'], ENT_QUOTES | ENT_HTML5),
    'brgy' => htmlspecialchars($payload['brgy'], ENT_QUOTES | ENT_HTML5),
    'city' => htmlspecialchars($payload['city'], ENT_QUOTES | ENT_HTML5),
    'province' => htmlspecialchars($payload['province'], ENT_QUOTES | ENT_HTML5),
    'contactNo' => filter_var($payload['contactNo'], FILTER_SANITIZE_NUMBER_INT),
    'completionDate' => $payload['completionDate'],
    'completerAs' => $payload['completerAs'],
    'fsn' => htmlspecialchars($payload['fsn'], ENT_QUOTES | ENT_HTML5),
    'fsa' => htmlspecialchars($payload['fsa'], ENT_QUOTES | ENT_HTML5),
    'fan' => htmlspecialchars($payload['fan'], ENT_QUOTES | ENT_HTML5),
    'fs' => htmlspecialchars($payload['fs'], ENT_QUOTES | ENT_HTML5),
    'fatherFullName' => htmlspecialchars($payload['fatherFullName'], ENT_QUOTES | ENT_HTML5),
    'occupationFather' => htmlspecialchars($payload['occupationFather'], ENT_QUOTES | ENT_HTML5),
    'motherFullName' => htmlspecialchars($payload['motherFullName'], ENT_QUOTES | ENT_HTML5),
    'occupationMother' => htmlspecialchars($payload['occupationMother'], ENT_QUOTES | ENT_HTML5),
    'guardianFullName' => htmlspecialchars($payload['guardianFullName'], ENT_QUOTES | ENT_HTML5),
    'rsGuardian' => htmlspecialchars($payload['rsGuardian'], ENT_QUOTES | ENT_HTML5),
    'occupationGuardian' => htmlspecialchars($payload['occupationGuardian'], ENT_QUOTES | ENT_HTML5),
    'cnGuardian' => filter_var($payload['cnGuardian'], FILTER_SANITIZE_NUMBER_INT),
    'referralName' => htmlspecialchars($payload['referralName'], ENT_QUOTES | ENT_HTML5),
    'referralNumber' => filter_var($payload['referralNumber'], FILTER_SANITIZE_NUMBER_INT),

    'goodMoral' => $payload['goodMoral'],
    'card' => $payload['card'],
    'form137' => $payload['form137'],
    'psa' => htmlspecialchars($payload['psa'], ENT_QUOTES | ENT_HTML5),
    'ID' => $payload['ID'],
    'peShirt' => $payload['peShirt'],
    'waiver' => $payload['waiver'],
    'uniform' => $payload['uniform'],
    'allowance' => $payload['allowance'],
    'docuFiled' => $payload['docuFiled']
  );

  //print_r($studentDataInput);
  $insertDataObj = new AdmissionContr();
	$insertDataObj->createNewStudentRecord($studentDataInput);
}