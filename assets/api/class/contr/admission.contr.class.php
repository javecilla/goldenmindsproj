<?php
require_once __DIR__ . '/../model/admission.model.class.php';
/**
* This class will play as the controller of student admission
* it will perform CRUD or Create, Read, Update and Delete Operation
*/
class AdmissionContr extends AdmissionModel 
{
  //object to control data inserting
  public function createNewStudentRecord($studentDataInput)
  {
    //call this method to extract the data in array and perform action to the data
    $this->setNewStudentRecord($studentDataInput);
  }
}
