<?php
$cn = new mysqli('localhost', 'root', '', 'gmcbulac_db_gmc');
if(isset($_POST['arrDataGrades'])) {

   $gradesDataExtract = $_POST['arrDataGrades'];
   //print_r($gradesDataExtract);
   
   //extract all data that is stored in this array
   foreach($gradesDataExtract as $data) {
      $studentName = $data["studentname"];
      $subject_desc = $data["subjname"];
      $firstSem_grade = $data["fsemgrade"];
      $secondSem_grade = $data["ssemgrade"];
      $finalgrade_ave = $data["finalave"];
      $student_remarks = $data["remarks"];

      //insert all data submitted
      $stmt = $cn->prepare("INSERT INTO grades(subj_desc, midterm, finals, ave, remarks) 
         VALUES(?, ?, ?, ?, ?, ?)");
      $stmt->bind_param("ssiiis", $subject_desc, $firstSem_grade, $secondSem_grade, $finalgrade_ave, $student_remarks);
      $stmt->execute();

      //check execution
      if($stmt->affected_rows <= 0) {
         $errMsg = "Failed to Insert";
         $error = array('error' => 1, 'message' => $errMsg);
         echo json_encode($error);
         exit();
      }
   }

   //if the loop completes without errors, all rows were inserted successfully
   echo "Insert success";
   exit();
}

if(isset($_POST['toSaveOnlyOneRow'])) {
   $subjectDesc2 = $_POST['subjectName2'];
   $fsemGrade2 = filter_var($_POST['fsemGrade2'], FILTER_SANITIZE_NUMBER_INT);
   $ssemGrade2 = filter_var($_POST['ssemGrade2'], FILTER_SANITIZE_NUMBER_INT);
   $remarks2 = $_POST['remarks2'];
   $finalAve2 = $_POST['finalAve2'];
   $studentName2 = $_POST['studentName2'];

   $stmt = $cn->prepare("INSERT INTO grades(student_name, subject_desc, first_sem_grade, second_sem_grade, final_average, remarks) 
      VALUES(?, ?, ?, ?, ?, ?)");
   $stmt->bind_param("ssiiis", $studentName2, $subjectDesc2, $fsemGrade2, $ssemGrade2, $finalAve2, $remarks2);
   $stmt->execute();

   //check execution
   if($stmt->affected_rows <= 0) {
      $errMsg = "Failed to Insert";
      $error = array('error' => 1, 'message' => $errMsg);
      echo json_encode($error);
      exit();
   } 
   else {
      echo "Successfully Save";
      exit();
   }
}

?>
