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
      $stmt = $cn->prepare("INSERT INTO student_information(dateof_reg, grade_lvl, sy, semester, campus, strand, lrn, student_name,
        gender, dateof_birth, placeof_birth, nationality, religion, s_address, brgy, city, province, contact_no, completion_date, completer_as,
        former_sn, former_sa, former_adviser, former_section, father_name, father_occupa, mother_name, mother_occupa, guardian_name, 
        guardian_rs, guardian_occupa, guardian_cn, referral_name, referral_cn)
        VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
      //extract the values from the $userInput array
      $studentData = array(
        's' => $studentDataInput['dof'],
        's' => $studentDataInput['gradeLevel'],
        's' => $studentDataInput['schoolYear'],
        's' => $studentDataInput['semester'],
        's' => $studentDataInput['campus'],
        's' => $studentDataInput['strand'],
        's' => $studentDataInput['lrn'],
        's' => $studentDataInput['studentFullName'],
        's' => $studentDataInput['gender'],
        's' => $studentDataInput['dob'],
        's' => $studentDataInput['pob'],
        's' => $studentDataInput['nationality'],
        's' => $studentDataInput['religion'],
        's' => $studentDataInput['address'],
        's' => $studentDataInput['brgy'],
        's' => $studentDataInput['city'],
        's' => $studentDataInput['province'],
        's' => $studentDataInput['contactNo'],
        's' => $studentDataInput['completionDate'],
        's' => $studentDataInput['completerAs'],
        's' => $studentDataInput['fsn'],
        's' => $studentDataInput['fsa'],
        's' => $studentDataInput['fan'],
        's' => $studentDataInput['fs'],
        's' => $studentDataInput['fatherFullName'],
        's' => $studentDataInput['occupationFather'],
        's' => $studentDataInput['motherFullName'],
        's' => $studentDataInput['occupationMother'],
        's' => $studentDataInput['guardianFullName'],
        's' => $studentDataInput['rsGuardian'],
        's' => $studentDataInput['occupationGuardian'],
        's' => $studentDataInput['cnGuardian'],
        's' => $studentDataInput['referralName'],
        's' => $studentDataInput['referralNumber']
      );
      //bind the data dynamically using a loop
      foreach($studentData as $key) {
        $stmt->bind_param($key, $studentData[$key]);
      }
      //check if its execute successfully
      if(!$stmt->execute()) {
        throw new Exception("Error occurred while executing statement:");
      }
      echo "All Data Inserted Successfully";
      exit();

    } catch(Exception $e) {
      echo "ERROR: " . $e->getMessage();
    }
  }
}
