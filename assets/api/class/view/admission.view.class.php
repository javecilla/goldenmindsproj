<?php
require_once __DIR__ . '/../model/admission.model.class.php';

/**
* This class is have one functionality, to get user data and fetch into browser
* this class is extended with the AdmissionModel; so AdmissionView class can
* access all methods and properties that have AdmissionModel, regardless the
* visibility of methods.
*/

class AdmissionView extends AdmissionModel 
{
  public function showData()
  {
    $result = $this->getData();
    foreach($result as $row) {
      //echo "Student Name: " . $row['student_name'] . "<br>";
      print_r($row['student_name']);
    }
  }
}
