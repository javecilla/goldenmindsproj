<?php
require_once __DIR__ . '/../../config/db.connection.php';

/**
*	This class is the only one can interact with the database
*	and Only class that is extends this ;AdmissionModel; class model
* can use the method and properties have AdmissionModel
*/

class AdmissionModel extends Config 
{
  protected function getData() 
  {
    $cn = $this->connect();
    $stmt = $cn->prepare("SELECT * FROM grades");
    $stmt->execute();
    $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $result;
  }

  protected function setNewStudentRecord($studentDataInput)
  {
    try {
      $cn = $this->connect();
      $cn->autocommit(false); //start a transaction

      $stmt = $cn->prepare("INSERT INTO student_information(dateof_reg, grade_lvl, sy, semester, campus, 
        strand, lrn, student_name, gender, dateof_birth, 
        placeof_birth, nationality, religion, s_address, brgy, 
        city, province, contact_no, completion_date, completer_as, 
        former_sn, former_sa, former_adviser, former_section, father_name, 
        father_occupa, mother_name, mother_occupa, guardian_name, guardian_rs, 
        guardian_occupa, guardian_cn, referral_name, referral_cn, good_moral,
        scard, form_137, psa, id, pe_shirt, waiver, uniform, allowance, document_filed) 
        VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ? ,?, ?, ?, ?, ?, ?, ?)");

      // Extract the values from the $studentDataInput array
      $studentData = array(
        $studentDataInput['dof'],
        $studentDataInput['gradeLevel'],
        $studentDataInput['schoolYear'],
        $studentDataInput['semester'],
        $studentDataInput['campus'],
        $studentDataInput['strand'],
        $studentDataInput['lrn'],
        $studentDataInput['studentFullName'],
        $studentDataInput['gender'],
        $studentDataInput['dob'],
        $studentDataInput['pob'],
        $studentDataInput['nationality'],
        $studentDataInput['religion'],
        $studentDataInput['address'],
        $studentDataInput['brgy'],
        $studentDataInput['city'],
        $studentDataInput['province'],
        $studentDataInput['contactNo'],
        $studentDataInput['completionDate'],
        $studentDataInput['completerAs'],
        $studentDataInput['fsn'],
        $studentDataInput['fsa'],
        $studentDataInput['fan'],
        $studentDataInput['fs'],
        $studentDataInput['fatherFullName'],
        $studentDataInput['occupationFather'],
        $studentDataInput['motherFullName'],
        $studentDataInput['occupationMother'],
        $studentDataInput['guardianFullName'],
        $studentDataInput['rsGuardian'],
        $studentDataInput['occupationGuardian'],
        $studentDataInput['cnGuardian'],
        $studentDataInput['referralName'],
        $studentDataInput['referralNumber'],
        $studentDataInput['goodMoral'],
        $studentDataInput['card'],
        $studentDataInput['form137'],
        $studentDataInput['psa'],
        $studentDataInput['ID'],
        $studentDataInput['peShirt'],
        $studentDataInput['waiver'],
        $studentDataInput['uniform'],
        $studentDataInput['allowance'],
        $studentDataInput['docuFiled']
      );
  
      //bind the data dynamically using call_user_func_array
      $bindParams = array_merge(array(str_repeat('s', count($studentData))), $studentData);
      $refBindParams = array();
      foreach($bindParams as $key => &$value) {
        $refBindParams[$key] = &$value;
      }
      call_user_func_array(array($stmt, 'bind_param'), $refBindParams);
  
      //check if it is executed successfully
      if(!$stmt->execute()) {
        throw new Exception("Error occurred while executing statement." .  $stmt->error);
      }

      //commit the transaction if everything is successful
      $cn->commit();
      $cn->autocommit(true); //revert to autocommit mode


      //display the student name in success response
      echo $studentDataInput['studentFullName'];
      exit();
    } catch (Exception $e) {
      //rollback the transaction if an error occurs
      $cn->rollback();
      $cn->autocommit(true); //revert to autocommit mode

      echo "ERROR: " . $e->getMessage();
    }
  }
}
