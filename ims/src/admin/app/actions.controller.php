<?php
/********************************************************
 *  ©JEROME AVECILLA -> ICT 12 DIGNIFIED S.Y 2022-2023
 *******************************************************/
session_start();
require_once __DIR__ . '/../config/db.connection.php';
//include_once('../config/db.connection.php');
require_once __DIR__ . '/functions.php';
ini_set('display_errors',  1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/*********************************
 * ACTIONS FOR LOGIN 
 ********************************/

//check if login button is click or set
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
   //retrieve and sanitize user inputs
   $username = mysqli_real_escape_string($connection, strtolower($_POST['username']));
   $password = mysqli_real_escape_string($connection, $_POST['password']);

   //start validate user inputs
   try {
      if(empty_input($username, $password) !== false) {
         $_SESSION['resultMessage'] = "All fields is required!!";
         $_SESSION['resultMessageCode'] = "warning";
         $_SESSION['actionPerform'] = "login";       
      }
      else if(contains_numeric_symbol($username) !== false) {
         $_SESSION['resultMessage'] = "Only <b>letters</b> and <b>white space</b> entry are allowed!";
         $_SESSION['resultMessageCode'] = "warning";
         $_SESSION['actionPerform'] = "login";  
      }
      else {
         //function to validate user against database
         #src code can find in app folder -> functions.php
         validate_login_user($username, $password);
      }

      header("Location: ../../auth/login");
      exit();
      //header("Location: ../debugging-page");
   } 
   catch(Exception $e) {
      echo "An error occured: " . $e->getMessage();
   }
}

/*********************************
 * ACTIONS FOR ADMIN PROFILE
 ********************************/
//check if change photo is set
else if(isset($_FILES['profile_img']['name'])) {
   $username = $_SESSION['username'];
   //retrieve and sanitize the submitted image by user
   $image_name = mysqli_real_escape_string($connection, $_FILES['profile_img']['name']);
   $image_name = strtolower(trim($image_name));  
   $image_name = preg_replace("/[^a-z0-9.]/", "_", $image_name);
   $image_size = $_FILES['profile_img']['size'];
   $tmpName = $_FILES['profile_img']['tmp_name'];
   $imageType = $_FILES['profile_img']['type'];

   //set valid image
   $validImageExtension = ['jpeg', 'jpg', 'png'];
   $imageExtension = explode('.', $image_name);
   $image_name = $imageExtension[0]; 
   $imageExtension = strtolower(end($imageExtension));
   try {
      //start validate submitted image
      if(valid_image_extension($imageExtension, $validImageExtension) !== false) {
         $_SESSION['error_profile'] = "Only 'jpeg, jpg, png' format will accept.";
      } 
      else if(valid_image_name($image_name) !== false) {
         $_SESSION['error_profile'] ="Invalid characters in filename, Rename the file as your desire.
            Please use only letters (uppercase or lowercase).";
      }
      else if(valid_image_size($image_size) !== false) {
         $_SESSION['error_profile'] = "Image file size is too large, try another image atleast 1MB.";
      }
      else {
         update_user_profile($username, $image_name, $imageExtension, $tmpName);
      } 
      header("Location: ../profile");
      exit(); 
   } 
   catch(Exception $e) {
      echo "An error occured: " . $e->getMessage();
   }
}

//check if change password is set
else if(isset($_POST['change_pass'])) {
   //get username that stored in session
   $username = $_SESSION['username']; 
   //retrieve and sanitize user inputs
   $oldPassword = mysqli_real_escape_string($connection, $_POST['oldPassword']);
   $password = mysqli_real_escape_string($connection, $_POST['newPassword']);
   $cpassword = mysqli_real_escape_string($connection, $_POST['confirmPassword']);

   try {
      //start validate user inputs
      if(empty($oldPassword) || empty($password) || empty($cpassword)) {
         $_SESSION['error_password'] = "All fields are required!!";
      }
      else if(contains_spaces($password, $cpassword) !== false) {
         $_SESSION['error_password'] = "Password should not contain spaces!";
      }
      else if(password_not_match($password, $cpassword) !== false) {
         $_SESSION['error_password'] = "Password and confirm password does not match!";
      }
      else if(password_short($password, $cpassword) !== false) {
         $_SESSION['error_password'] = "Your password is too short, Try atleast 8 characters.";
      }
      else {
         //function to validate request against database
         change_password($username, $oldPassword, $password, $cpassword); 
      }
         
      header("Location: ../profile");
      exit();   
   } 
   catch(Exception $e) {
      echo "An error occured: " . $e->getMessage();
   }        
}
//check if update user information button is set
else if(isset($_POST['update_info'])) {
   //get username that stored in session
   $username = $_SESSION['username'];

   //retrieve and sanitize user inputs
   $acct_name =  mysqli_real_escape_string($connection, $_POST['account_name']);
   $school_branch = mysqli_real_escape_string($connection, $_POST['school_branch']);
   $address =  mysqli_real_escape_string($connection, $_POST['address']);
   $phone_number =  mysqli_real_escape_string($connection, $_POST['phone_number']);
   $birthday =  mysqli_real_escape_string($connection, $_POST['birthday']);
   $gender =  mysqli_real_escape_string($connection, $_POST['gender']);

   try {
      update_user_info($username, $acct_name, $school_branch, $address, $phone_number, $birthday, $gender);
   } 
   catch(Exception $e) {
      echo "An error occured: " . $e->getMessage();
   }     
}
 

/*********************************
 * ACTIONS FOR USER MANAGEMENT
 ********************************/ 

//check if add account or user button is set
else if(isset($_POST['addBtn'])) {
   //Retrieve and sanitize data submitted
   $account_name = mysqli_real_escape_string($connection, $_POST['aname']);
   $username = mysqli_real_escape_string($connection, strtolower($_POST['uname']));
   $password = mysqli_real_escape_string($connection, $_POST['pword']);
   $cpassword = mysqli_real_escape_string($connection, $_POST['cpword']);
   $address = mysqli_real_escape_string($connection, $_POST['address']);
   $phone_number = mysqli_real_escape_string($connection, $_POST['phone_number']);
   $email = mysqli_real_escape_string($connection, strtolower($_POST['email']));
   $s_branch = mysqli_real_escape_string($connection, $_POST['s_branch']);
   $birthday = mysqli_real_escape_string($connection, $_POST['birthday']);
   $gender = mysqli_real_escape_string($connection, $_POST['gender']);     
   //Hash the user's entered password 
   $hashed_password = password_hash($password, PASSWORD_DEFAULT);


   //image data initialization and sanization   
   $image_name = mysqli_real_escape_string($connection, $_FILES['profileImg']['name']);
   $image_name = strtolower(trim($image_name));  
   $image_name = preg_replace("/[^a-z0-9.]/", "_", $image_name);  

   $image_size = $_FILES['profileImg']['size'];
   $image_tmp = $_FILES['profileImg']['tmp_name'];
   $image_type = $_FILES['profileImg']['type'];

   //set valid image
   $validImageExtension = ['jpeg', 'jpg', 'png'];
   $imageExtension = explode('.', $image_name); 
   $image_name = $imageExtension[0]; 
   $imageExtension = strtolower(end($imageExtension));

   try {
      //start validate user inputs
      if(contains_spaces($password, $cpassword) !== false) {
         $_SESSION['resultMessage'] = "Password should not contain spaces!";
         $_SESSION['resultMessageCode'] = "warning";
      }
      else if(password_not_match($password, $cpassword) !== false) {
         $_SESSION['resultMessage'] = "Password and confirm password does not match!";
         $_SESSION['resultMessageCode'] = "warning";
      }
      else if(validate_email($email) !== false) {
         $_SESSION['resultMessage'] = "Invalid email address!";
         $_SESSION['resultMessageCode'] = "warning";
      }
      else if(valid_image_extension($imageExtension, $validImageExtension) !== false) {
         $_SESSION['resultMessage'] = "Failed to add new user. Please enter valid image format [e.g. 'jpeg, jpg, png' format will accept.]";
         $_SESSION['resultMessageCode'] = "warning";
      }
      else if(valid_image_size($image_size) !== false) {
         $_SESSION['resultMessage'] = "Failed to add new users. Image file size is too large, try another image atleast 1MB.";
         $_SESSION['resultMessageCode'] = "warning";
      }
      else if(uidExist($username, $email) !== false) {
         $_SESSION['resultMessage'] = "Failed to add new users: Username or Email is already taken, try another one";
         $_SESSION['resultMessageCode'] = "warning";
      }
      else {
         //function to create new user
         #src code will find in app/functions.php
         create_new_user($account_name, $username, $hashed_password, $address, $phone_number,
            $email, $s_branch, $birthday, $gender, $image_name, $imageExtension, $image_tmp);
      }
      header("Location: ../accounts");
      exit();

   } catch(Exception $e) {
      echo "An error occured: " . $e->getMessage();
   }                          
}
//check delete button is set
else if(isset($_POST['deleteUserBtnSet'])) {
   // $user_id = $_POST['delete_id'];
   $deleteThatUser = $_POST['deleteUserId'];

   try {
      delete_existing_user($deleteThatUser);
   } catch(Exception $e) {
      echo "An error occured: " . $e->getMessage();
   }  
}
//check if view button is set
else if(isset($_POST['checking_viewbtn'])) {
   $u_id = $_POST['user_id'];

   try {
      view_user_inmodal($u_id);
   } catch(Exception $e) {
      echo "An error occured: " . $e->getMessage();
   }     
}
//update user status
else if(isset($_GET['user_id'])) {
   $userId = $_GET['user_id'];
   $userStatus = $_GET['user_status'];

   try {
      $query1 = "UPDATE users 
         SET status = ? 
         WHERE id = ?";
      $stmt = mysqli_prepare($connection, $query1);
      if(!$stmt){ throw new Exception("Failed to prepare statement: " . mysqli_error($connection)); }

      mysqli_stmt_bind_param($stmt, "ii", $userStatus, $userId);
      //check execution
      if(!mysqli_stmt_execute($stmt)) {
         throw new Exception("Failed to execute statement: " . mysqli_stmt_error($stmt));
      } else {
         $_SESSION['resultMessage'] = "User account status updated successfully";
         $_SESSION['resultMessageCode'] = "success";
         $_SESSION['actionPerform'] = "Update";
      }
      header('Location: ../accounts');
      exit();

      mysqli_stmt_close($stmt);
   } catch(Exception $e) {
      echo "An error occured: " . $e->getMessage();
   }  
}


/*********************************
 *ACTIONS FOR CATEGORY MANAGEMENT
 ********************************/ 

#FOR CATEGORY ACTIONS

//check if add button is set
else if(isset($_POST['add_category'])) {
   $category_name = $_POST['category_name'];

   try {
      add_new_category($category_name);

   } catch(Exception $e) {
      echo "An error occured: " . $e->getMessage();
   }  
}
//check if edit button is set
else if(isset($_POST['edit_category_btn'])) {
   $category_id = $_POST['edit_id'];
   $entered_category_name = $_POST['edit_category_name'];

   try {
      update_category($category_id, $entered_category_name);

   } catch(Exception $e) {
      echo "An error occured: " . $e->getMessage();
   }
}
//check if delete button is set
else if(isset($_POST['deleteBtnSetCategory'])) {
   $deleteThatCategory = $_POST['deleteCategoryId'];

   try {
      delete_category($deleteThatCategory);

   } catch(Exception $e) {
      echo "An error occured: " . $e->getMessage();
   }  
}
//Update category status
else if(isset($_GET['category_id'])) {
   $categoryId = $_GET['category_id'];
   $categoryStatus = $_GET['category_status'];

   try {
      $query = "UPDATE categories 
         SET category_status = ?
         WHERE category_id = ?";
      $stmt = mysqli_prepare($connection, $query);
      if(!$stmt){ throw new Exception("Failed to prepare statement: " . mysqli_error($connection)); }
      mysqli_stmt_bind_param($stmt, "ii", $categoryStatus, $categoryId);
      //check execution
      if(!mysqli_stmt_execute($stmt)) {
         throw new Exception("Failed to execute statement: " . mysqli_stmt_error($stmt));
      } else {
         $_SESSION['resultMessage'] = "Category status updated successfully";
         $_SESSION['resultMessageCode'] = "success";
         $_SESSION['actionPerform'] = "Update"; 
      }
      header('Location: ../categories');
      exit();

      mysqli_stmt_close($stmt);

   } catch (Exception $e) {
      echo "An error occured: " . $e->getMessage();      
   }
}

#FOR EQUIPMENT TYPE ACTIONS

//check if add button is set
else if(isset($_POST['addEquipType'])) {
   $equipmentType = $_POST['equipment_type'];

   try {
      add_equipment_type($equipmentType);

   } catch(Exception $e) {
      echo "An error occured: " . $e->getMessage();
   }
}
//check if edit button is set
else if(isset($_POST['editEquipType'])) {
   $equipmentTypeId = $_POST['editEquip_id'];
   $equipmentTypeName = $_POST['edit_equip_name'];

   try {
      update_equipment_type($equipmentTypeId, $equipmentTypeName);

   } catch (Exception $e) {
      echo "An error occured: " . $e->getMessage();
   }
}
//check if delete button is set
else if(isset($_POST['deleteBtnSetEquipType'])) {
   $deletedThatEquipmentType = $_POST['deleteEquipTypeId'];

   try {
      delete_equipment_type($deletedThatEquipmentType);

   } catch (Exception $e) {
      echo "An error occured: " . $e->getMessage();
   }
}
//Update equipment type status
else if(isset($_GET['equipType_id'])) {
   $equipTypeId = $_GET['equipType_id'];
   $equipStatus = $_GET['equip_status'];

   try {
      $query = "UPDATE equipment_type 
         SET equip_status = ?
         WHERE equip_id = ?";
      $stmt = mysqli_prepare($connection, $query);
      if(!$stmt){ throw new Exception("Failed to prepare statement: " . mysqli_error($connection)); }
      mysqli_stmt_bind_param($stmt, "ii", $equipStatus, $equipTypeId);
      //check execution
      if(!mysqli_stmt_execute($stmt)) {
         throw new Exception("Failed to execute statement: " . mysqli_stmt_error($stmt));
      } else {
         $_SESSION['resultMessage'] = "Equipment Type status updated successfully";
         $_SESSION['resultMessageCode'] = "success";
         $_SESSION['actionPerform'] = "Update";
      }
      header('location: ../categories');
      exit();

      mysqli_stmt_close($stmt);

   } catch (Exception $e) {
      echo "An error occured: " . $e->getMessage();          
   }
}


#FOR LOCATION RACK ACTIONS

//check if add button is set
else if(isset($_POST['addLocRack'])) {
   $locationRack = $_POST['location_rack'];

   try {
      add_location_rack($locationRack);
   } catch(Exception $e) {
      echo "An error occured: " . $e->getMessage();
   }
}
//check if edit button is set 
else if(isset($_POST['editLocRack'])) {
   $locationRackId = $_POST['editLocRack_id'];
   $locationRackName = $_POST['edit_locrack_name'];

   try {
      update_location_rack($locationRackId, $locationRackName);   

   } catch(Exception $e) {
      echo "An error occured: " . $e->getMessage();
   }
}
//check if delete button is set
else if(isset($_POST['deleteBtnSetLocationRack'])) {
   $deleteThatLocationRack = $_POST['deleteLocationRackId'];

   try {
      delete_location_rack($deleteThatLocationRack);
         
   } catch(Exception $e) {
      echo "An error occured: " . $e->getMessage();
   }
}
//Update location rack status
else if(isset($_GET['locationRack_id'])) {
   $locationRackId = $_GET['locationRack_id'];
   $locationRackStatus = $_GET['location_status'];

   try {
      $query = "UPDATE location_branch 
         SET location_status = ?
         WHERE id = ?";
      $stmt = mysqli_prepare($connection, $query);
      if(!$stmt){ throw new Exception("Failed to prepare statement: " . mysqli_error($connection)); }
      mysqli_stmt_bind_param($stmt, "ii", $locationRackStatus, $locationRackId);
      //check execution
      if(!mysqli_stmt_execute($stmt)) {
         throw new Exception("Failed to execute statement: " . mysqli_stmt_error($stmt));
      } else {
         $_SESSION['resultMessage'] = "Location Rack status updated successfully";
         $_SESSION['resultMessageCode'] = "success";
         $_SESSION['actionPerform'] = "Update";  
      }
      header('location: ../categories');
      exit();

      mysqli_stmt_close($stmt);

   } catch (Exception $e) {
      echo "An error occured: " . $e->getMessage();      
   }
}

#FOR UNIT TYPE ACTIONS

//check if add button is set
else if(isset($_POST['addUnitType'])) {
   $unitType = $_POST['unit_type'];

   try {
      add_unit_type($unitType);
   } catch(Exception $e) {
      echo "An error occured: " . $e->getMessage();
   }           
}
//check if edit button is set
else if(isset($_POST['editUnitType'])) {
   $unitTypeId = $_POST['editUnitType_id'];
   $unitTypeName = $_POST['edit_unitType_name'];

   try {
      update_unit_type($unitTypeId, $unitTypeName);

   } catch(Exception $e) {
      echo "An error occured: " . $e->getMessage();
   }
}
//check if delete button is set
else if(isset($_POST['deleteBtnSetUnitType'])) {
   $deleteThatUnitType = $_POST['deleteUnitTypeId'];

   try {
      delete_unit_type($deleteThatUnitType);
         
   } catch(Exception $e) {
      echo "An error occured: " . $e->getMessage();
   }
}
//Update unit type status
else if(isset($_GET['unitType_Id'])) {
   $unitTypeId = $_GET['unitType_Id'];
   $unitTypeStatus = $_GET['unit_status'];

   try {
      $query = "UPDATE equipment_unit 
         SET unit_status = ?
         WHERE id = ?";
      $stmt = mysqli_prepare($connection, $query);
      if(!$stmt){ throw new Exception("Failed to prepare statement: " . mysqli_error($connection)); }
      mysqli_stmt_bind_param($stmt, "ii", $unitTypeStatus, $unitTypeId);
      //check execution
      if(!mysqli_stmt_execute($stmt)) {
         throw new Exception("Failed to execute statement: " . mysqli_stmt_error($stmt));
      } else {
         $_SESSION['resultMessage'] = "Unit type status updated successfully";
         $_SESSION['resultMessageCode'] = "success";
         $_SESSION['actionPerform'] = "Update";
      }
      header('location: ../categories');
      exit();

      mysqli_stmt_close($stmt);
   } catch (Exception $e) {
      echo "An error occured: " . $e->getMessage();      
   }
}


/*********************************
 *ACTIONS FOR EQUIPMENT MANAGEMENT
 ********************************/ 

//check if add button is set
else if(isset($_POST['addBTN']) && isset($_FILES['equipment_img'])) {
   //retrieve and sanitize all user inputs
   $entered_equipment_name =  mysqli_real_escape_string($connection, $_POST['equipmentName']);
   $entered_equipment_type_id = mysqli_real_escape_string($connection, $_POST['equipmentType_id']);   
   $entered_category_id = mysqli_real_escape_string($connection, $_POST['category_id']);
   $entered_location_id = mysqli_real_escape_string($connection, $_POST['equipmentLocation_id']);
   $entered_unit_id = mysqli_real_escape_string($connection, $_POST['equipmentUnit_id']); 
   $entered_price = mysqli_real_escape_string($connection, $_POST['equipmentPrice']);
   $entered_stock = mysqli_real_escape_string($connection, $_POST['numStock']);
   $entered_quantity = mysqli_real_escape_string($connection, $_POST['availQuantity']);
   $entered_amount = mysqli_real_escape_string($connection, $_POST['totalAmount']);
   $set_condition = $_POST['condition'];
   //equipment imagae initialization
   $image_name = mysqli_real_escape_string($connection, $_FILES['equipment_img']['name']);
   $image_name = strtolower(trim($image_name));  
   $image_name = preg_replace("/[^a-z0-9.]/", "_", $image_name);  

   $image_size = $_FILES['equipment_img']['size'];
   $image_tmp = $_FILES['equipment_img']['tmp_name'];
   $image_type = $_FILES['equipment_img']['type'];

   //validate image
   $validImageExtension = ['jpeg', 'jpg', 'png'];
   $imageExtension = explode('.', $image_name); 
   $image_name = $imageExtension[0]; 
   $imageExtension = strtolower(end($imageExtension));

   try { 
      //start validate user input
      if(valid_image_extension($imageExtension, $validImageExtension) !== false) {
         $_SESSION['danger_message'] = "Failed to add equipment. Please enter valid image format [e.g. 'jpeg, jpg, png' format will accept.]";
      }
      if(valid_image_size($image_size) !== false) {
         $_SESSION['danger_message'] = "Failed to add equipment. Image file size is too large, try another image atleast 1MB.";
      }
      //function to add new record of equipment
      add_new_equipment($entered_equipment_name, $entered_equipment_type_id, $entered_category_id,
         $entered_location_id, $entered_unit_id, $entered_price, $entered_stock,$entered_quantity,
         $entered_amount, $set_condition, $image_name, $imageExtension, $image_tmp, $user_id);

      header("Location: ../equipments");
      exit();

   } catch(Exception $e) {
      echo "An error occured: " . $e->getMessage();
   }     
}
//check if view button is set
else if(isset($_POST['executeVIEWBtn'])) {
   $viewDataEquipment = $_POST['equipment_id'];

   try {
      view_equipment($viewDataEquipment);

   } catch(Exception $e) {
      echo "An error occured: " . $e->getMessage();
   }
}
//check if edit button is set
else if(isset($_POST['editBTN'])) {
   $user_id = $_POST['users_id'];
   $equipment_id = $_POST['equipmentId'];
   $equipmentName = mysqli_real_escape_string($connection, $_POST['equipmentName']);
   $condition = mysqli_real_escape_string($connection, $_POST['conditions']);

   $update_stock = isset($_POST['equipmentStock']) && is_numeric($_POST['equipmentStock']) ? intval($_POST['equipmentStock']) : 0;
   $update_quantity = isset($_POST['equipmentAquantity']) && is_numeric($_POST['equipmentAquantity']) ? intval($_POST['equipmentAquantity']) : 0;
    $update_amount = isset($_POST['equipmentTotalAmtDisplay']) && is_numeric($_POST['equipmentTotalAmtDisplay']) ? intval($_POST['equipmentTotalAmtDisplay']) : 0;
    $prev_stock = isset($_POST['prevStock']) ? intval($_POST['prevStock']) : 0;
    
   //check if stock is empty or not a number
   if($update_stock === 0 || !is_numeric($update_stock)) {
     $update_stock = $prev_stock; // set to previous stock value
   }

   //check if any fields are empty
   if($update_stock === 0 || $update_quantity === 0 || $update_amount === 0) {
      // //die("Error: Stock and Quantity fields must not be empty.");
      // $_SESSION['resultMessage'] = "Stock cannot be empty!";
      // $_SESSION['resultMessageCode'] = "error";
      // $_SESSION['actionPerform'] = "Update";
      // //header("Location: ../admin-equipment-record" + $url);
      //  header("Location: ../equipments");
      // exit();
       set_equipment($user_id, $equipment_id, $equipmentName, $condition);

   }

   //   var_dump($user_id); //109
   // var_dump($equipment_id); //69

   // var_dump($update_stock); //10
   //  var_dump($update_quantity); //10
   // var_dump($update_amount); //200

   try {
      update_equipment($user_id, $equipment_id, $equipmentName, $condition, $update_stock, $update_quantity, $update_amount);

   } catch(Exception $e) {
      echo "An error occured: " . $e->getMessage();
   }
}
//check if delete is set
else if(isset($_POST['deleteBtnSetEquipment'])) {
   // $del_id = $_POST['delete_id'];
   $deleteThatEquipment = $_POST['deleteEquipmentId'];
   //var_dump($deleteThatEquipment);
   try {
      delete_equipment($deleteThatEquipment);

   } catch(Exception $e) {
      echo "An error occured: " . $e->getMessage();
   }
}
//update equipment status
else if(isset($_GET['equipment_id'])) {
   $equipmentId = $_GET['equipment_id'];
   $equipmentStatus = $_GET['equipment_status'];

   try {
      $query2 = "UPDATE equipment 
         SET status = ? 
         WHERE id = ?";
      $stmt = mysqli_prepare($connection, $query2);
      if(!$stmt){ throw new Exception("Failed to prepare statement: " . mysqli_error($connection)); }

      mysqli_stmt_bind_param($stmt, "ii", $equipmentStatus, $equipmentId);
      //check execution
      if(!mysqli_stmt_execute($stmt)) {
         throw new Exception("Failed to execute statement: " . mysqli_stmt_error($stmt));
      } else {
         $_SESSION['resultMessage'] = "Equipment status updated successfully";
         $_SESSION['resultMessageCode'] = "success";
         $_SESSION['actionPerform'] = "Update";
      }
      header('location: ../equipments');
      exit();

      mysqli_stmt_close($stmt);
   } catch(Exception $e) {
      echo "An error occured: " . $e->getMessage();
   }  
}


/*********************************
 *ACTIONS FOR TRANSACTION
 ********************************/

//barrow controller
else if(isset($_POST["equipment_id"])) {
   $equipmentID = $_POST["equipment_id"];

   try {
      insert_into_cart_list($equipmentID);
   } catch (Exception $e) {
      echo "An error occured: " . $e->getMessage();
   }
}
//FETCH USER INFORMATION IN FORM FIELDS WHEN THERE NAME IS SELECTED IN DROPDOWN SELECTION
else if(isset($_POST["costumerName"])) {
   $costumerName = $_POST["costumerName"];
   $sql = "SELECT c.*, lb.location
      FROM costumers c
      INNER JOIN location_branch lb ON c.school_id = lb.id 
      WHERE name = ?";
   $stmt = mysqli_prepare($connection, $sql);
   mysqli_stmt_bind_param($stmt, "s", $costumerName);
   mysqli_stmt_execute($stmt);
   $result = mysqli_stmt_get_result($stmt);
   try {
      while($row = mysqli_fetch_array($result)) {
         //store costumer information to variable data
         $data['costumer_id'] = $row["costumer_id"];
         $data['costumer_name'] = $row["name"];
         $data['costumer_email'] = $row["email"];
         $data['costumer_phone_number'] = $row["phone_number"];
         $data['costumer_address'] = $row["address"];
         $data['costumer_school_branch'] = $row["location"];
         $data['costumer_role_position'] = $row["role_position"];
      }
      echo json_encode($data); //convert data in json format and send back to ajax request
   } catch(Exception $e) {
      echo "An error occured: " . $e->getMessage(); 
   }
}
//start inserting barrow equipment in cart into database
else if(isset($_POST["placeBarrowBtn"])) {

   $costumer_id = $_POST['costumer_id'];
   $barrowData = $_POST['barrowData'];
   $barrowStatus = $_POST['barrowStatus'];
   $UserAdminId = $_POST['UserAdminId'];

   // echo $costumer_id;
   // print_r($barrowData);
   // echo $barrowStatus;
   // echo $UserAdminId;

   try {
      //function to perform barrow the equipment
      barrow_equipment($costumer_id, $barrowData, $barrowStatus, $UserAdminId);

   } catch(Exception $e) {
      echo "An error occured: " . $e->getMessage();
   }
}
//DELETE COSTUMER|BARROWER RECORD
else if(isset($_POST['deleteBtnSet'])) {
   $deleteThatCostumer = $_POST['deleteCostumerId'];

   try {
      $query ="DELETE FROM costumers WHERE costumer_id =?";
      $stmt = mysqli_prepare($connection, $query);
      if(!$stmt) {
         throw new Exception("Failed to prepare statement" . mysqli_error($connection));
      }
      mysqli_stmt_bind_param($stmt, "i", $deleteThatCostumer);
      if(!mysqli_stmt_execute($stmt)) {
         throw new Exception("Failed to execute statement" . mysqli_stmt_error($stmt));
      }

      mysqli_stmt_close($stmt);
      //if success delete data  
           
   } catch(Exception $e) {
      echo "An error occured: " . $e->getMessage();
   }
}
//UPDATE COSTUMER|BARROWER STATUS
else if(isset($_GET['id'])) {
   $costumerId = $_GET['id'];
   $costumerStatus = $_GET['status'];

   try {
      $query2 = "UPDATE costumers 
         SET costumer_status = ? 
         WHERE costumer_id = ?";
      $stmt = mysqli_prepare($connection, $query2);
      if(!$stmt){ throw new Exception("Failed to prepare statement: " . mysqli_error($connection)); }

      mysqli_stmt_bind_param($stmt, "ii", $costumerStatus, $costumerId);
      //check execution
      if(!mysqli_stmt_execute($stmt)) {
         throw new Exception("Failed to execute statement: " . mysqli_stmt_error($stmt));
      } else {
         $_SESSION['resultMessage'] = "Costumer or Barrower status updated successfully";
         $_SESSION['resultMessageCode'] = "success";
         $_SESSION['actionPerform'] = "Update";
      }
      header('location: ../return');
      exit();

      mysqli_stmt_close($stmt);
   } catch(Exception $e) {
      echo "An error occured: " . $e->getMessage();
   }  
}
//add new barrower
else if(isset($_POST['add_new_barrower'])) {
   $costumerName = mysqli_real_escape_string($connection, $_POST['fullname']);
   $email = mysqli_real_escape_string($connection, strtolower($_POST['email']));
   $phoneNumber = mysqli_real_escape_string($connection, $_POST['phone_number']);
   $address = mysqli_real_escape_string($connection, $_POST['address']);
   $schoolBranch = mysqli_real_escape_string($connection, $_POST['school']);
   $rolePosition = mysqli_real_escape_string($connection, $_POST['role']);
   $user_id = $_POST['usersId'];
   $url = $_POST['url'];
   $costumerStatus = 1; //set to allowist of barrower status

   try {
      insert_costumer_details($costumerName, $email, $phoneNumber, $address, $schoolBranch, $rolePosition, $user_id, $url, $costumerStatus);
   } catch(Exception $e) {
      echo "An error occured: " . $e->getMessage();
   } catch(Exception $e) {
      echo "An error occured: " . $e->getFile();
   } catch(Exception $e) {
      echo "An error occured: " . $e->getLine();
   }
}
//start updating barrow equipment when its return
else if(isset($_POST['returnDataBtn'])) {
   $costumer_id = $_POST['costumer_id'];
   $usersAdminId = $_POST['usersAdminId'];
   $toReturnData = $_POST['toReturnData'];

   // echo $costumer_id;
   // print_r($toReturnData);
   // echo $usersAdminId;

   try {
      //function to return barrowed the equipment
      return_equipment($costumer_id, $usersAdminId, $toReturnData);

   } catch (Exception $e) {
      echo "An error occured: " . $e->getMessage();
   }
}

// *****************************
//GENERATE REPORT ACTIONS
//*******************************

//ftech all equiopment in generate report ta ble
else if(isset($_GET['displayEquipments'])) {
   $query = "SELECT e.*, c.category_name, t.equip_type, l.location, u.unit_type
      FROM equipment e 
      INNER JOIN categories c ON e.category_id = c.category_id 
      INNER JOIN equipment_type t ON e.type_id = t.equip_id
      INNER JOIN location_branch l ON e.location_id = l.id
      INNER JOIN equipment_unit u ON e.unit_id = u.id
      ORDER BY e.date_added ASC";
   $stmt = mysqli_prepare($connection, $query);
   mysqli_stmt_execute($stmt);
   $result = mysqli_stmt_get_result($stmt);
   if(mysqli_num_rows($result) > 0) {
      while($equipment = mysqli_fetch_assoc($result)) {
         ?>
         <tr>
            <td><?=$equipment['id']?></td>
            <td><?=$equipment['equipment_name']?></td>
            <td><?=$equipment['category_name']?></td>
            <td><?=$equipment['equip_type']?></td>
            <td><?=$equipment['unit_type']?></td>
            <td><?=$equipment['stock']?></td>
            <td><?=$equipment['in_use']?></td>
            <td><?=$equipment['quantity']?></td>
            <td>
            <?php
               if($equipment['quantity'] < $equipment['conditions']) {
                  echo '<i style="font-size: 14px;">Critical</i>';
               } else {
                  echo '<i style="font-size: 14px;">Good</i>';
               }
            ?>
            </td>
         </tr>
         <?php
      }
   }
}
//FETCH EQUIPMENT DATA IN GENERATE REPORT WHEN LOCATION RACK IS SELECTED
else if(isset($_GET['locationRack'])) {
   $query = "SELECT e.*, c.category_name, t.equip_type, l.*, u.unit_type
      FROM equipment e 
      INNER JOIN categories c ON e.category_id = c.category_id 
      INNER JOIN equipment_type t ON e.type_id = t.equip_id
      INNER JOIN location_branch l ON e.location_id = l.id
      INNER JOIN equipment_unit u ON e.unit_id = u.id
      WHERE l.id = ? 
      ORDER BY e.date_added ASC";
   $stmt = mysqli_prepare($connection, $query);
   mysqli_stmt_bind_param($stmt, "s", $_GET['locationRack']);
   mysqli_stmt_execute($stmt);
   $result = mysqli_stmt_get_result($stmt);
   if(mysqli_num_rows($result) > 0) {
      while($equipment = mysqli_fetch_assoc($result)) {
         ?>
         <tr>
            <td><?=$equipment['id']?></td>
            <td><?=$equipment['equipment_name']?></td>
            <td><?=$equipment['category_name']?></td>
            <td><?=$equipment['equip_type']?></td>
            <td><?=$equipment['unit_type']?></td>
            <td><?=$equipment['stock']?></td>
            <td><?=$equipment['in_use']?></td>
            <td><?=$equipment['quantity']?></td>
            <td>
              <?php
              if($equipment['quantity'] < $equipment['conditions']) {
                echo '<i style="font-size: 14px;">Critical</i>';
              } else {
                echo '<i style="font-size: 14px;">Good</i>';
              }
              ?>
            </td>
         </tr>
         <?php
      }
   } 
   else {
      ?><script> getAllEquipmentData(); </script><?php
   }
}
//fetch equipment data in generate report when its filter both location and by date
else if(isset($_GET['findBtnSet'])) {
   $locationRack = $_GET['selectedLR']; //id
   $fromDate = $_GET['fromDate'];
   $toDate = $_GET['toDate'];
   $query = "SELECT e.*, c.category_name, t.equip_type, l.location, u.unit_type
      FROM equipment e 
      INNER JOIN categories c ON e.category_id = c.category_id 
      INNER JOIN equipment_type t ON e.type_id = t.equip_id
      INNER JOIN location_branch l ON e.location_id = l.id
      INNER JOIN equipment_unit u ON e.unit_id = u.id
      WHERE l.id = ? AND e.date_added BETWEEN ? AND ?
      ORDER BY e.date_added ASC";
   $stmt = mysqli_prepare($connection, $query);
   mysqli_stmt_bind_param($stmt, "iss", $locationRack, $fromDate, $toDate);
   mysqli_stmt_execute($stmt);
   $result = mysqli_stmt_get_result($stmt);
   if(mysqli_num_rows($result) > 0) {
      while($equipment = mysqli_fetch_assoc($result)) {
         ?>
         <tr>
            <td><?=$equipment['id']?></td>
            <td><?=$equipment['equipment_name']?></td>
            <td><?=$equipment['category_name']?></td>
            <td><?=$equipment['equip_type']?></td>
            <td><?=$equipment['unit_type']?></td>
            <td><?=$equipment['stock']?></td>
            <td><?=$equipment['in_use']?></td>
            <td><?=$equipment['quantity']?></td>
            <td>
              <?php
              if($equipment['quantity'] < $equipment['conditions']) {
                echo '<i style="font-size: 14px;">Critical</i>';
              } else {
                echo '<i style="font-size: 14px;">Good</i>';
              }
              ?>
            </td>
         </tr>
         <?php
      }
   }
}
//fetch equipment if search input is set
else if(isset($_GET['searchInput'])) {
   // echo "test";
   $search = $_GET['searchInput'];
   $query = "SELECT e.*, c.category_name, t.equip_type, l.location, u.unit_type
      FROM equipment e 
      INNER JOIN categories c ON e.category_id = c.category_id 
      INNER JOIN equipment_type t ON e.type_id = t.equip_id
      INNER JOIN location_branch l ON e.location_id = l.id
      INNER JOIN equipment_unit u ON e.unit_id = u.id
      WHERE CONCAT(e.equipment_name, ' ', c.category_name, ' ', t.equip_type) LIKE '%$search%'
      ORDER BY e.date_added ASC";
   $stmt = mysqli_prepare($connection, $query);
   mysqli_stmt_execute($stmt);
   $result = mysqli_stmt_get_result($stmt);
   if(mysqli_num_rows($result) > 0) {
      while($equipment = mysqli_fetch_assoc($result)) {
         ?>
         <tr>
            <td><?=$equipment['id']?></td>
            <td><?=$equipment['equipment_name']?></td>
            <td><?=$equipment['category_name']?></td>
            <td><?=$equipment['equip_type']?></td>
            <td><?=$equipment['unit_type']?></td>
            <td><?=$equipment['stock']?></td>
            <td><?=$equipment['in_use']?></td>
            <td><?=$equipment['quantity']?></td>
            <td>
              <?php
              if($equipment['quantity'] < $equipment['conditions']) {
                echo '<i style="font-size: 14px;">Critical</i>';
              } else {
                echo '<i style="font-size: 14px;">Good</i>';
              }
              ?>
            </td>
         </tr>
         <?php
      }
   } 
   else { //no data found
      ?>
      <tr><td colspan="9" class="text-center">Wala ka non hahaha :(</td></tr>
      <?php
   }
}

mysqli_close($connection);