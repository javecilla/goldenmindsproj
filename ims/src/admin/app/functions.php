<?php
/********************************************************
 *  ©JEROME AVECILLA -> ICT 12 DIGNIFIED S.Y 2022-2023
 * ******************************************************/
require_once __DIR__ . '/../config/db.connection.php';
ini_set('display_errors',  1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/***********************************************************
    REUSABLE FUNCTIONS FOR INPUTS VALIDATION
**********************************************************/
function validate_email($email) {
    global $connection;

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true; //email is not valid
    } else {
        return false; //valid
    }
}

function contains_numeric_symbol($username) {
    global $connection;

    if(!preg_match("/^[a-zA-Z ]*$/", $username)) {
        return true; //username field contains numbers, symbol etc.
    }
    else {
        return false; //NOT 
    }
}

function empty_input($username, $password) {
    global $connection;

    if(empty($username) || empty($password)) {
        return true; //empty field
    }
    else {
        return false; //not empty
    }
}   

function contains_spaces($password, $cpassword) {
    global $connection;

    if(strpos($password, ' ') !== false && strpos($cpassword, ' ') !== false) {
        return true; //password contains spaces
    } else {
        return false; //not
    }
}

function password_not_match($password, $cpassword) {
    global $connection;

    if($password !== $cpassword) {
        return true; //password and cpassword does not match
    } else {
        return false; //match
    }
}

function password_short($password, $cpassword) {
    global $connection;

    if(strlen($password) < 8 && strlen($cpassword) < 8) {
        return true; //password is lesser than 8
    } else {
        return false; //greater than 8
    }
}

function valid_image_extension($imageExtension, $validImageExtension) {
    global $connection;

    if(!in_array($imageExtension, $validImageExtension)) {
        return true; //submitted img is NOT inarray e.g [jpg, png, jpeg]
    } else {
        return false; //img is valid
    }
}

function valid_image_name($image_name) {
    global $connection;

    if(preg_match('/[^a-zA-Z]/', $image_name)) {
        return true; //image name contains numbers, symbols etc.
    } else {
        return false; //not 
    }
}

function valid_image_size($image_size) {
    global $connection;

    if($image_size > 1200000) {
        return true; //submitted image is greater than 1MB
    } else {
        return false; //NOT 
    }
}

function uidExist($username, $email) {
    global $connection;

    $query = "SELECT * FROM users WHERE uname = ? OR email = ?";
    $stmt = mysqli_stmt_init($connection);
    if(!mysqli_stmt_prepare($stmt, $query)) {
        $_SESSION['danger_message'] ="An error occurred while preparing statement: " . mysqli_error($connection);
        header("Location: admin-user-management?failed=" . urlencode("something went wrong"));
        exit();
    } 

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);
    //check if data exist in database with entered username->email, grab the data
    if($row = mysqli_fetch_assoc($resultData)) {
        return $row; //return row if there is an data same as entered data by user
    } else {
        $result = false; //username and/or email is NOT exist
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function verify_email($email) {
    global $connection;

    //retrieve and sanitize entered email by user
    $email = mysqli_real_escape_string($connection, $email); 

    //prepare statement
    $stmt = mysqli_prepare($connection, "SELECT * FROM users WHERE email = ? LIMIT 1");
    if(!$stmt) { 
       $_SESSION['danger_message'] ="An error occurred while preparing statement: " . mysqli_error($connection);
    }
    mysqli_stmt_bind_param($stmt, "s", $email);
    //check if statment sucessfuly executed
    if(mysqli_stmt_execute($stmt)) { 
        $result = mysqli_stmt_get_result($stmt);
        //check if there is data found from result
        if(mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['acct_name'] = $row['acct_name'];
            $_SESSION['email'] = $row['email'];
            return true;
        }
        return false; //no data found
    } else {
        $_SESSION['danger_message'] ="An error occurred while executing the statement: " . mysqli_stmt_error($stmt);
    }

    mysqli_stmt_close($stmt);    
}



/********************************************
    FUNCTION FOR LOGIN AUTHENTICATION
*********************************************/
function validate_login_user($username, $password) {
   global $connection;

    //prepare statement
    $stmt = mysqli_prepare($connection, "SELECT * FROM users WHERE uname = ? LIMIT 1");
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    try {
      //check if user exists in db
      if(mysqli_num_rows($result) > 0) {
         $row = mysqli_fetch_assoc($result);
         $_SESSION['acct_name'] = $row['acct_name'];
         //check if password is match in db
         if($row['pword'] !== null && password_verify($password, $row['pword'])) {
            //check if account is active 
            if($row['status'] == 1) {
                //generate new session id and update user session id and login time in db
                session_regenerate_id();
                $user_session_id = session_id();
                $stmt = mysqli_prepare($connection, "UPDATE users SET session_id = ?, is_logged_in = 1, login_time = NOW() WHERE id = ?");
                mysqli_stmt_bind_param($stmt, "si", $user_session_id, $row['id']);  
                mysqli_stmt_execute($stmt);

                //store user data in session variable
                $_SESSION['session_id'] = $user_session_id;
                $_SESSION['username'] = $row['uname']; 
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['user_status'] = $row['status'];
                $_SESSION['verify_status'] = $row['verified'];
                $_SESSION['login_time'] = $row['login_time'];
                $_SESSION['last_active_time'] = time();

                //then redirect to the dashboard
                header("Location: ../dashboard");
                $_SESSION['message'] = "WELCOME ADMIN";
                exit();
            } else { //account status is inactive
                $_SESSION['resultMessage'] = "Your account, <b>'".$_SESSION['acct_name']."'</b>, is currently inactive. If you require more information about your account status, please contact the administrator for assistance.";
               $_SESSION['resultMessageCode'] = "warning";
               $_SESSION['actionPerform'] = "login";   
            }
            
         } else { //incorrect password
            $_SESSION['login_attempts']++; //increment login attempt
            $_SESSION['resultMessage'] = "Invalid <span><b>username or password</b></span>. Please try again.";
            $_SESSION['resultMessageCode'] = "warning";
            $_SESSION['actionPerform'] = "login";   
         }
       } else { //user not found
         $_SESSION['login_attempts']++;
         $_SESSION['resultMessage'] = "Invalid <span><b>username or password</b></span>. Please try again.";
         $_SESSION['resultMessageCode'] = "warning";
         $_SESSION['actionPerform'] = "login";   
      }

      header("Location: ../../auth/login");
      exit();

      mysqli_stmt_close($stmt); //close all statement query action
       
    } catch (Exception $e) {
       echo "An error occurred: " . $e->getMessage();
    } 
}


/********************************************
    FUNCTIONS FOR PASSWORD RESET REQUEST
*********************************************/
function send_email_code($email) {
    global $connection;

    //prepare statment to delete generated code as same email
    $stmt = mysqli_prepare($connection, "DELETE FROM codes WHERE email = ?");
    if(!$stmt) { //check for errors in preparing the statement
        $_SESSION['danger_message'] ="An error occurred while preparing statement: " . mysqli_error($connection);
    }
    mysqli_stmt_bind_param($stmt, "s", $email);
    //check if statement successfully executed
    if(!mysqli_stmt_execute($stmt)) {  
        $_SESSION['danger_message'] ="An error occurred while executing the statement: " . mysqli_stmt_error($stmt);
    } 
       
    $expire = time() + (60 * 5);            //expire the code for 5minutes
    $code = rand(10000, 99999);              //generate random number to be send users email
    $email = mysqli_escape_string($connection, $email);  //retrieve and sanitize entered email by user

    //prepare statment to insert new generated code to the entered email by user
    $stmt = mysqli_prepare($connection, "INSERT INTO codes (email, code, expire) VALUES (?, ?, ?)");
    if(!$stmt) { 
        $_SESSION['danger_message'] ="An error occurred while preparing statement: " . mysqli_error($connection);
    }
    mysqli_stmt_bind_param($stmt, "ssi", $email, $code, $expire);
    if(!mysqli_stmt_execute($stmt)) {
        $_SESSION['danger_message'] ="An error occurred while executing the statement: " . mysqli_stmt_error($stmt);
    }

    //include mail function
    require_once 'mailController.php'; 

    //send mail function 
    send_mail_code($email, 
        'GMC IS', 
        'Password Reset Request Confirmation',
        "<img src='https://www.goldenmindsbulacan.com/logoM.png' width='555'/>
        <p style='font-size: 14px;'>
            We are writing to confirm that we have received a password reset request
            for your account <br/><b>'".$_SESSION['acct_name']."'. </b>In response, we
            have sent you an email containing a code that you will<br/>need to complete
            the reset process.
            <br/><br/>
            Please note that this email is being sent as a security measure to
            protect your account from<br/>unauthorized access.
            <br/><br/>
            Your code for the password reset process is: <span><b>'".$code."'</b><span><br/>
            <br/>
            Please enter this code on the password reset page to proceed with
            resetting your password.
            <br/><br/>
            Thank you for your attention to this matter.
            <br/><br/>
            Sincerely,
            <br/><br/>
            <b>GMCIS PRR v1.2</b>
        </p>                            
    ");
    //check function
    if(!function_exists('send_mail_code')) {
        $_SESSION['danger_message'] = "The function is not enabled to the server.";
    }

    mysqli_stmt_close($stmt);
}

//check if the code entered by user match in system generated code

function is_code_correct($code) {
    global $connection;

    $code = mysqli_real_escape_string($connection, $code);
    $expire = time();
    $email = mysqli_real_escape_string($connection, $_SESSION['email']);

    //prepare statement to read data from db
    $stmt = mysqli_prepare($connection, "SELECT * FROM codes WHERE code = ? AND email = ? 
        ORDER BY id DESC LIMIT 1");
    if(!$stmt) {
        $_SESSION['danger_message'] ="An error occurred while preparing statement: " . mysqli_error($connection);
    }
    mysqli_stmt_bind_param($stmt, "is", $code, $email);
    //check if statment sucessfuly executed
    if(mysqli_stmt_execute($stmt)) { 
        $result = mysqli_stmt_get_result($stmt);
        //check if there is data found from result
        if(mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            //check code expiration
            if($row['expire'] > $expire) {
                return "The code is correct";
            } else {
                return "The code is expired.";
            }

        } else {
            return "The code is incorrect.";
        }

    } else {
        $_SESSION['danger_message'] ="An error occurred while executing the statement: " . mysqli_stmt_error($stmt);
    }

    mysqli_stmt_close($stmt);
}
//if code successfully validated then this function for saving their password reset
function save_password($password) {
    global $connection;

    //hash the password before it save in db 
    $password = password_hash($password, PASSWORD_DEFAULT); 
    $email = mysqli_real_escape_string($connection, $_SESSION['forgot']['email']);

    //prepararing statement to update user password
    $stmt = mysqli_prepare($connection, "UPDATE users SET pword = ?  WHERE email = ? LIMIT 1");
    if(!$stmt) {
        $_SESSION['danger_message'] ="An error occurred while preparing statement: " . mysqli_error($connection);
    }
    mysqli_stmt_bind_param($stmt, "ss", $password, $email);
    if(!mysqli_stmt_execute($stmt)) {
        $_SESSION['danger_message'] ="An error occurred while executing the statement: " . mysqli_stmt_error($stmt);
    }

    if(isset($_SESSION['forgot']['email'])) { 
        unset($_SESSION['forgot']['email']); //unsent all users session
    }
 
    header("Location: login");
    //$_SESSION['resetsucess_message'] = "You can now login your account.";
    $_SESSION['resultMessage'] = "You can now login your account.";
    $_SESSION['resultMessageCode'] = "success";
    $_SESSION['actionPerform'] = "reset";

    exit();

    mysqli_stmt_close($stmt);
}


/********************************************
    FUNCTIONS FOR USER PROFILE
*********************************************/
function update_user_profile($username, $image_name, $imageExtension, $tmpName) {
    global $connection;

    $newImageName = $image_name;
    $newImageExt = $imageExtension;

    //move user upload photo into user-photo-upload folder
    move_uploaded_file($tmpName, "../resources/images/user-photo-upload/" .$newImageName.'.'.$newImageExt);

    //start updating image in db
    $query = "UPDATE users 
        SET profile_img =?, img_extension =?
        WHERE uname=?";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, 'sss', $newImageName, $newImageExt, $_SESSION['username']);
    $result = mysqli_stmt_execute($stmt);
    if($result){
        $_SESSION['message'] = "Profile photo successfully change.";
    } else {
        $_SESSION['message'] = "Something went wrong!" . mysqli_error($connection);
    }

    header("Location: ../profile");
    exit();
}

function change_password($username, $oldPassword, $password, $cpassword) {
    global $connection;

    //checking user credentials
    $query = "SELECT pword FROM users WHERE uname = ?";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, "s", $_SESSION['username']);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);

    //check if entered password is match to the database password
    if(!password_verify($oldPassword, $row['pword'])) {
        $_SESSION['error_password'] = "Old password does not match in database password!";
    }    
    else {
        //hash the password before it save in database
        $hashpwd = password_hash($password, PASSWORD_DEFAULT);
        $query = "UPDATE users SET pword = ? WHERE uname = ? LIMIT 1";
        $stmt = mysqli_prepare($connection, $query);
        mysqli_stmt_bind_param($stmt, "ss", $hashpwd, $_SESSION['username']);
        $result = mysqli_stmt_execute($stmt);
        if($result) {
            $_SESSION['message'] = "Password updated successfully.";
        } else {
            $_SESSION['message'] = "Something went wrong: " . mysqli_error($connection);
        }   
    }

    mysqli_stmt_close($stmt);

    header("Location: ../profile");
    exit();     
}

function update_user_info($username, $acct_name, $school_branch, $address, $phone_number, $birthday, $gender) {
    global $connection;

    $query = "UPDATE users 
        SET acct_name=?, school_branch=?, address=?, phone_number=?, birthday=?, gender=?
        WHERE uname=?";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, "sssisss", $acct_name, $school_branch, $address, $phone_number, $birthday, $gender, $_SESSION['username']);
    $result = mysqli_stmt_execute($stmt);
    if($result) { // Check if result is executed successfully
        $_SESSION['message'] = "Account Info updated successfully";
    }
    else {
        $_SESSION['message'] = "Failed to update account info";
    }

    mysqli_stmt_close($stmt);

    header("Location: ../profile");
    exit();
}


/***********************************************************
    FUNCTIONS FOR USER MANAGEMENT->ACCOUNT REGISTRATION
**********************************************************/
function create_new_user($account_name, $username, $hashed_password, $address, $phone_number,
    $email, $s_branch, $birthday, $gender, $image_name, $imageExtension, $image_tmp) {
    global $connection;
    //move user upload photo into user-photo-upload folder
    move_uploaded_file($image_tmp, "../resources/images/user-photo-upload/" .$image_name.'.'.$imageExtension);
   //prepare the query with placeholders for the values
    $query = "INSERT INTO users (`acct_name`, `uname`, `pword`, `address`, `phone_number`, `email`, `school_branch`, `birthday`, `gender`, `profile_img`, `img_extension`) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    // prepare the statement
    $stmt = mysqli_prepare($connection, $query);
    if(!$stmt) {  throw new Exception("Failed to prepare statement: " . mysqli_error($connection)); }
    //bind the values to the placeholders in the statement
    mysqli_stmt_bind_param($stmt, "sssssssssss", $account_name, $username, $hashed_password, $address, $phone_number, $email, $s_branch, $birthday, $gender, $image_name, $imageExtension);
    if(mysqli_stmt_execute($stmt) > 0) {
        //store user information to session
        $user_id = mysqli_insert_id($connection);
        $_SESSION['user_id'] = $user_id;
        $_SESSION['acct_name'] = $account_name;
        $_SESSION['email'] = $email;
        // $_SESSION['message'] = "Successfully added <b>'".$_SESSION['acct_name']."'</b> as new Admin!";
        $_SESSION['resultMessage'] = "Successfully added new Admin!";
        $_SESSION['resultMessageCode'] = "success";
        $_SESSION['actionPerform'] = "Add";

    } else {
        throw new Exception("Failed to execute statement: " . mysqli_stmt_error($stmt));
    }

    header("Location: ../accounts");
    exit();

    mysqli_stmt_close($stmt);
}

function delete_existing_user($deleteThatUser) {
    global $connection;

    $query = "DELETE FROM users WHERE id = ?";
    $stmt = mysqli_prepare($connection, $query);
    if(!$stmt) {  // check if the statement was prepared successfully
        throw new Exception("Failed to prepare statement" . mysqli_error($connection));
    }
    mysqli_stmt_bind_param($stmt, "i", $deleteThatUser);
    if(!mysqli_stmt_execute($stmt)) {
        throw new Exception("Failed to prepare execute" . mysqli_stmt_error($stmt));
    } 

    mysqli_stmt_close($stmt);
}

function view_user_inmodal($u_id) {
    global $connection;
    //echo $return = $u_id;

    $stmt = mysqli_prepare($connection, "SELECT * FROM users WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "i", $u_id);
    if(!mysqli_stmt_execute($stmt)) {
        $_SESSION['danger_message'] ="An error occurred while executing the statement: " . mysqli_stmt_error($stmt);
    }
     $result = mysqli_stmt_get_result($stmt);

    //check if data is exist or not               
    if(mysqli_num_rows($result) > 0) {
        foreach($result as $user) { //fetch all data found
            //convert date format in db
            $acct_created = date("M-d-Y / H:i A", strtotime($user['acct_created'])); 
            ?>
                <div class="img-container d-flex justify-content-center align-items-center">  
                    <img src="resources/images/user-photo-upload/<?= $user['profile_img'] . '.' . $user['img_extension'];?>" 
                        id="pImage" alt="User Profile" 
                        style="width: 8.5rem!important; height: 8.1rem; border-radius: 50%; border: 0.5px solid gray;
                            box-shadow: 0 4px 4px 0 rgba(0, 0, 0, .1);
                    "/>
                </div>
                <br/>
                <label for="BI"><b>Basic Information</b></label>
                <p class="form-control" style="margin-bottom: 5px;"><?= $user['acct_name']; ?></p>
                <p class="form-control" style="margin-bottom: 15px;"><?= $user['school_branch']; ?></p>

                <label for="CI"><b>Contact Information</b></label>
                <p class="form-control" style="margin-bottom: 5px;"><?= $user['address']; ?></p>
                <p class="form-control" style="margin-bottom: 5px;"><?= $user['phone_number']; ?></p>
                <p class="form-control" style="margin-bottom: 15px;"><?= $user['email']; ?></p>

                <label for="OI"><b>Other Information</b></label><br/>
                <small for="bod">Birthday</small>
                <p class="form-control" style="margin-bottom: 5px;"><?= $user['birthday']; ?></p>  
                                
                <small for="gender">Gender:</small>
                <p class="form-control" style="margin-bottom: 5px;"><?= $user['gender']; ?></p>
                <small for="AC">Account Created:</small>
                <p class="form-control" style="margin-bottom: 5px;"><?=  $acct_created; ?></p> 
            <?php
        }   
    } else {
        echo "<h5>No Record Found</h5>";
    }

    mysqli_stmt_close($stmt);
}


/********************************************
    FUNCTIONS FOR CATEGORY->TYPE
*********************************************/
function add_new_category($category_name) {
    global $connection;

    //declare username that stored in session var
    $user_name = $_SESSION['username'];
    $uid = $_SESSION['user_id'];    

    $stmt = mysqli_prepare($connection, "SELECT * FROM users WHERE uname = ?");
    mysqli_stmt_bind_param($stmt, "s", $user_name);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_array($result);
    $user_id = $row['id'];

    //read subbmitted data from db
    $stmt = mysqli_prepare($connection, "SELECT COUNT(*) as count FROM categories WHERE category_name = ?");
    mysqli_stmt_bind_param($stmt, "s", $category_name);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);
    $category = $row['count'];

    //check if categories already exist in db
    if($category == 0) { 
        $stmt = mysqli_prepare($connection, "INSERT INTO categories (`category_name`, `date_added`, `user_id`) 
        VALUES (?, NOW(), ?)");
        mysqli_stmt_bind_param($stmt, "si", $category_name, $user_id);

        if(mysqli_stmt_execute($stmt)) {
            $categoryId = mysqli_insert_id($connection);
            $_SESSION['category_id'] = $categoryId;
            $_SESSION['category_name'] = $category_name;

            $_SESSION['resultMessage'] = "Successfully added $category_name as new category record.";
            $_SESSION['resultMessageCode'] = "success";
            $_SESSION['actionPerform'] = "Add";
        } else {
            $_SESSION['resultMessage'] = "Failed to add new category";
            $_SESSION['resultMessageCode'] = "error";
        }
    } else { 
        $_SESSION['resultMessage'] = "Failed to add new category: $category_name is already exist."; 
        $_SESSION['resultMessageCode'] = "warning";
    }

    header("Location: ../categories");
    exit();

    mysqli_stmt_close($stmt);
}

function update_category($category_id, $entered_category_name) {
    global $connection;
    
    $stmt = mysqli_prepare($connection, "UPDATE categories SET category_name = ? WHERE category_id = ?");
    mysqli_stmt_bind_param($stmt, "si", $entered_category_name, $category_id);
    mysqli_stmt_execute($stmt);

    //check result if it is successfully executed
    if(mysqli_stmt_affected_rows($stmt) > 0) { 
        $_SESSION['resultMessage'] = "Successfully updated category CID $category_id to $entered_category_name";
        $_SESSION['resultMessageCode'] = "success";
        $_SESSION['actionPerform'] = "Update";

    } else {
        $_SESSION['resultMessage'] = "Failed to update category: $entered_category_name is already exist.";
        $_SESSION['resultMessageCode'] = "warning";
    }

    header("Location: ../categories");
    exit();

    mysqli_stmt_close($stmt);
}

function delete_category($deleteThatCategory) {
    global $connection;

    //start deleting data
    $stmt = mysqli_prepare($connection, "DELETE FROM categories  WHERE category_id = ?");
    if(!$stmt){
        throw new Exception("Failed to prepare statement" . mysqli_error($connection));
    }
    mysqli_stmt_bind_param($stmt, "i", $deleteThatCategory);
    if(!mysqli_stmt_execute($stmt)){
        throw new Exception("Failed to prepare statement" . mysqli_stmt_error($stmt));
    }
}



/********************************************
    FUNCTIONS FOR EQUIPMENT->TYPE
*********************************************/
function add_equipment_type($equipmentType) {
    global $connection;

      //declare username that stored in session var
    $user_name = $_SESSION['username'];
    $uid = $_SESSION['user_id'];    

    $query = "SELECT * FROM users WHERE uname = ?";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, "s", $user_name);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if (!$result) { //check result
        die('Query error: ' . mysqli_error($connection));
    }
    $row = mysqli_fetch_array($result);
    $user_id = $row['id'];

    //read submitted data from db
    $sql = "SELECT COUNT(*) as count 
            FROM equipment_type 
            WHERE equip_type = ?";
    $stmt = mysqli_prepare($connection, $sql);
    mysqli_stmt_bind_param($stmt, "s", $_POST['equipment_type']);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if (!$result) {
        die('Query Error: ' . mysqli_error($connection));
    }
    $row = mysqli_fetch_assoc($result);
    $equiptype = $row['count'];

    //checking equipment type in db : 1 = exist and 0 = not exist
    if ($equiptype == 0) {
        $query = "INSERT INTO equipment_type (`equip_type`, `user_id`) 
                  VALUES (?, ?)";
        $stmt = mysqli_prepare($connection, $query);
        mysqli_stmt_bind_param($stmt, "si", $_POST['equipment_type'], $user_id);
        $result = mysqli_stmt_execute($stmt);
        //check if the result of query successfully executed or not 
        if ($result) {
            $equiptype = mysqli_insert_id($connection);
            $_SESSION['equiptypeId'] = $equiptype;
            $_SESSION['equipment_type_name'] = $equipmentType;

            $_SESSION['resultMessage'] = "Successfully added $equipmentType as new equipment type record.";
            $_SESSION['resultMessageCode'] = "success";
            $_SESSION['actionPerform'] = "Add";
        } else {
            $_SESSION['resultMessage'] = "Failed to add new equipment type";
            $_SESSION['resultMessageCode'] = "error";
        }
    } else {
        $_SESSION['resultMessage'] = "Failed to add new equipment type: $equipmentType is already exist.";
        $_SESSION['resultMessageCode'] = "warning";
    }

    mysqli_stmt_close($stmt);

    header("Location: ../categories");
    exit();
}

function update_equipment_type($equipmentTypeId, $equipmentTypeName) {
    global $connection;

    $stmt = mysqli_prepare($connection, "UPDATE equipment_type 
        SET equip_type = ? 
        WHERE equip_id = ?");
    mysqli_stmt_bind_param($stmt, "si", $equipmentTypeName, $equipmentTypeId);

    if(mysqli_stmt_execute($stmt)) {
        $_SESSION['resultMessage'] = "Successfully updated ETID $equipmentTypeId to $equipmentTypeName ";
        $_SESSION['resultMessageCode'] = "success";
        $_SESSION['actionPerform'] = "Update";

    } else {
        $_SESSION['resultMessage'] = "Failed to update equipment type: $equipmentTypeName is already exist.";
        $_SESSION['resultMessageCode'] = "warning";
    }

    mysqli_stmt_close($stmt);

    header("Location: ../categories");
    exit();
}

function delete_equipment_type($deletedThatEquipmentType) {
    global $connection;

    $stmt = mysqli_prepare($connection, "DELETE FROM equipment_type WHERE equip_id = ?");
    if(!$stmt){
        throw new Exception("Failed to prepare statement" . mysqli_error($connection));
    }
    mysqli_stmt_bind_param($stmt, "i", $deletedThatEquipmentType);
    if(!mysqli_stmt_execute($stmt)){
        throw new Exception("Failed to prepare statement" . mysqli_stmt_error($stmt));
    }
    mysqli_stmt_close($stmt);
}



/********************************************
    FUNCTIONS FOR LOCATION->RACK
*********************************************/
function add_location_rack($locationRack) {
    global $connection;

    $user_name = $_SESSION['username'];
    $uid = $_SESSION['user_id'];    

    $query = "SELECT * FROM users WHERE uname = ?";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, "s", $user_name);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if(!$result) {
       die('Query error: ' . mysqli_error($connection));
    }
    $row = mysqli_fetch_array($result);
    $user_id = $row['id'];

    $sql = "SELECT COUNT(*) as count 
        FROM location_branch 
        WHERE location = ?";
    $stmt = mysqli_prepare($connection, $sql);
    mysqli_stmt_bind_param($stmt, "s", $_POST['location_rack']);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if(!$result) {   
        die('Query Error: ' . mysqli_error($connection));
    }
    $row = mysqli_fetch_assoc($result);
    $locrack = $row['count'];

    //check if location is already exist in db
    if($locrack == 0) {     
        $query = "INSERT INTO location_branch (`location`, `user_id`) 
            VALUES (?, ?)";
        $stmt = mysqli_prepare($connection, $query);
        mysqli_stmt_bind_param($stmt, "si", $locationRack, $user_id);
        $result = mysqli_stmt_execute($stmt);
        //check if the get_result of query successfully executed or not 
        if($result) {
            $locationId = mysqli_insert_id($connection);
            $_SESSION['locationId'] = $locationId;
            $_SESSION['locationName'] = $locationRack;

            $_SESSION['resultMessage'] = "Successfully added $locationRack as new location rack record.";
            $_SESSION['resultMessageCode'] = "success";
            $_SESSION['actionPerform'] = "Add";
        } else {
            $_SESSION['resultMessage'] = "Failed to add new Location Rack";
            $_SESSION['resultMessageCode'] = "error";

        }
    } else { 
        $_SESSION['resultMessage'] = "Failed to add new Location Rack: $locationRack is already exist.";
        $_SESSION['resultMessageCode'] = "warning";
    }

    mysqli_stmt_close($stmt);

    header("Location: ../categories");
    exit();
}

function update_location_rack($locationRackId, $locationRackName) {
    global $connection;

    //start updating data
    $query = "UPDATE location_branch SET location = ? WHERE id = ?";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, "si", $locationRackName, $locationRackId);
    mysqli_stmt_execute($stmt);

    if(mysqli_affected_rows($connection) > 0) {
        $_SESSION['resultMessage'] = "Successfully updated LRID $locationRackId to $locationRackName";
        $_SESSION['resultMessageCode'] = "success";
        $_SESSION['actionPerform'] = "Update";
    } else {
        $_SESSION['resultMessage'] = "Failed to update Location Rack: $locationRackName is already exist.";
        $_SESSION['resultMessageCode'] = "warning";
    }
    mysqli_stmt_close($stmt);

    header("Location: ../categories");
    exit();
}

function delete_location_rack($deleteThatLocationRack) {
    global $connection;

   // start deleting data
    $query = "DELETE FROM location_branch WHERE id = ?";
    $stmt = mysqli_prepare($connection, $query);
    if(!$stmt){
        throw new Exception("Failed to prepare statement" . mysqli_error($connection));
    }
    mysqli_stmt_bind_param($stmt, "i", $deleteThatLocationRack);
    if(!mysqli_stmt_execute($stmt)){
        throw new Exception("Failed to prepare statement" . mysqli_stmt_error($stmt));
    }
    mysqli_stmt_close($stmt);
}



/********************************************
    FUNCTIONS FOR UNIT->TYPE
*********************************************/
function add_unit_type($unitType) {
    global $connection;

    $user_name = $_SESSION['username'];
    $uid = $_SESSION['user_id'];

    $query = "SELECT * FROM users WHERE uname = ?";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, "s", $user_name);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if (!$result) {
        die('Query error: ' . mysqli_error($connection));
    }
    $row = mysqli_fetch_array($result);
    $user_id = $row['id'];

    $sql = "SELECT COUNT(*) as count FROM equipment_unit WHERE unit_type = ?";
    $stmt = mysqli_prepare($connection, $sql);
    mysqli_stmt_bind_param($stmt, "s", $_POST['unit_type']);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if (!$result) {
        die('Query Error: ' . mysqli_error($connection));
    }

    $row = mysqli_fetch_assoc($result);
    $unittype = $row['count'];

    if ($unittype == 0) {
        $query = "INSERT INTO equipment_unit (`unit_type`, `user_id`) VALUES (?, ?)";
        $stmt = mysqli_prepare($connection, $query);
        mysqli_stmt_bind_param($stmt, "si", $unitType, $user_id);
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            $unitTypeId = mysqli_insert_id($connection);
            $_SESSION['unitType'] = $unitTypeId;
            $_SESSION['unitTypeName'] = $unitType;

            $_SESSION['resultMessage'] = "Successfully added $unitType as new unit type.";
            $_SESSION['resultMessageCode'] = "success";
            $_SESSION['actionPerform'] = "Add";
        } else {
            $_SESSION['resultMessage'] = "Failed to add new unit type";
            $_SESSION['resultMessageCode'] = "error";
        }
    } else {
        $_SESSION['resultMessage'] = "Failed to add new unit type: $unitType is already exist.";
        $_SESSION['resultMessageCode'] = "warning";
    }

    mysqli_stmt_close($stmt);

    header("Location: ../categories");
    exit();
}

function update_unit_type($unitTypeId, $unitTypeName) {
    global $connection;


    // start updating data
    $stmt = mysqli_prepare($connection, "UPDATE equipment_unit SET unit_type = ? WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "si", $unitTypeName, $unitTypeId);
    $result = mysqli_stmt_execute($stmt);

    if($result) {
        $_SESSION['resultMessage'] = "Successfully updated UTID $unitTypeId  to $unitTypeName";
        $_SESSION['resultMessageCode'] = "success";
        $_SESSION['actionPerform'] = "Update";
    } else {
        $_SESSION['resultMessage'] = "Failed to update unit type: $unitTypeName is already exist.";
        $_SESSION['resultMessageCode'] = "warning";
    }

    mysqli_stmt_close($stmt);

    header("Location: ../categories");
    exit();
}

function delete_unit_type($deleteThatUnitType) {
    global $connection;

    $query = "DELETE FROM equipment_unit WHERE id = ?";
    $stmt = mysqli_prepare($connection, $query);
    if(!$stmt){
        throw new Exception("Failed to prepare statement" . mysqli_error($connection));
    }
    mysqli_stmt_bind_param($stmt, "i", $deleteThatUnitType);
    if(!mysqli_stmt_execute($stmt)){
        throw new Exception("Failed to prepare statement" . mysqli_stmt_error($stmt));
    }
    mysqli_stmt_close($stmt);
}



/********************************************
    FUNCTIONS FOR EQUIPMENT RECORD
*********************************************/
function add_new_equipment($entered_equipment_name, $entered_equipment_type_id, $entered_category_id,
    $entered_location_id, $entered_unit_id, $entered_price, $entered_stock,$entered_quantity,
    $entered_amount, $set_condition, $image_name, $imageExtension, $image_tmp, $user_id) {

    global $connection;

    //declare username that stored in session var
    $user_name = $_SESSION['username'];
    $uid = $_SESSION['user_id'];

    $query = "SELECT * FROM users WHERE uname = ?";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, "s", $user_name);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if (!$result) {
        die('Query error: ' . mysqli_error($connection));
    }
    $row = mysqli_fetch_array($result);
    $user_id = $row['id'];

    $sql = "SELECT COUNT(*) as count FROM equipment WHERE equipment_name = ?";
    $stmt = mysqli_prepare($connection, $sql);
    mysqli_stmt_bind_param($stmt, "s", $_POST['equipmentName']);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if (!$result) { die('Query Error: ' . mysqli_error($connection)); }

    $row = mysqli_fetch_assoc($result);
    $insereted_equipment = $row['count'];
	
	//submited images stored in 'equipment-photo-uploads' folder
         move_uploaded_file($image_tmp, "../resources/images/equipment-photo-upload/" .$image_name.'.'.$imageExtension);
        //start inserting data inputted into database
       $query = "INSERT INTO equipment 
            (`category_id`, `equipment_name`, `type_id`, `location_id`, `unit_id`, `price`, `stock`, `quantity`, `amount`, `conditions`, `equipment_img`, `img_extension`, `user_id`) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";         
        $stmt = mysqli_prepare($connection, $query);
        mysqli_stmt_bind_param($stmt, "isiiiiiiiissi", $entered_category_id, $entered_equipment_name, $entered_equipment_type_id, $entered_location_id, $entered_unit_id, $entered_price, $entered_stock, $entered_quantity, $entered_amount, $set_condition, $image_name, $imageExtension, $user_id);
        $result = mysqli_stmt_execute($stmt);

        //check if the result of query successfully executed or not 
        if($result) { 
            $_SESSION['resultMessage'] = "Sucessfully added '".$entered_equipment_name."' as new equipment record";
            $_SESSION['resultMessageCode'] = "success";
            $_SESSION['actionPerform'] = "Add";
        } else { 
            // $_SESSION['danger_message']="Failed to add equipment, Something went wrong";
            $_SESSION['resultMessage'] = "Failed to add equipment, Something went wrong";
            $_SESSION['resultMessageCode'] = "error" . mysqli_stmt_error($stmt);
        }


    mysqli_stmt_close($stmt);

    header("Location: ../equipments");
    exit();
}

function view_equipment($viewDataEquipment) {
    global $connection;

    //start reading data
    $query = "SELECT e.*, c.category_name, t.equip_type, l.location, u.unit_type, a.acct_name
        FROM equipment e 
        INNER JOIN categories c ON e.category_id = c.category_id 
        INNER JOIN equipment_type t ON e.type_id = t.equip_id
        INNER JOIN location_branch l ON e.location_id = l.id
        INNER JOIN equipment_unit u ON e.unit_id = u.id
        INNER JOIN users a ON e.user_id = a.id
        WHERE e.id = ?";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, "i", $viewDataEquipment);     
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if(!$result) { die('Query error: ' . mysqli_error($connection)); }

    //check if data exist in db
    if(mysqli_num_rows($result) > 0)  {
        //if it is exist, fetch all data found
        while($row = mysqli_fetch_assoc($result)) {
            //convert date format in db
            $date_added = date("M-d-Y / H:i A", strtotime($row['date_added']));
            $date_updated = date("M-d-Y / H:i A", $row['date_updated']);  
            ?>
                <div class="img-container d-flex justify-content-center align-items-center">  
                    <img src="resources/images/equipment-photo-upload/<?= $row['equipment_img'] . '.' .$row['img_extension']; ?>" style="width: 15rem; height:9rem;"/>
                </div> 
                <small>Equipment Type</small>
                <p class="form-control m-b-5"><?= $row['equip_type']; ?></p>
                <small>Equipment Name</small>
                <p class="form-control m-b-5"><?= $row['equipment_name']; ?></p>
                <small>Unit Type</small>
                <p class="form-control m-b-5"><?= $row['unit_type']; ?></p>
                <small>Location Rack</small>
                <p class="form-control m-b-5"><?= $row['location']; ?></p>
                <small>Category</small>
                <p class="form-control m-b-5"><?= $row['category_name']; ?></p>
                <small>Price</small>
                <p class="form-control m-b-5"><?= $row['price']; ?></p>
                <small>Stocks</small>
                <p class="form-control m-b-5"><?= $row['stock']; ?></p>
                <small>In use</small>
                <p class="form-control m-b-5"><?= $row['in_use']; ?></p>
                <small>Available Quantity</small>
                <p class="form-control m-b-5"><?= $row['quantity']; ?></p>
                <small>Total Amount</small>
                <p class="form-control m-b-5"><?= $row['amount']; ?></p>
                <small>Date Added</small>
                <!-- display the converted date -->
                <p class="form-control m-b-5"><?= $date_added; ?></p>
                <small>Added By</small>
                <p class="form-control m-b-5"><?= $row['acct_name']; ?></p>
                <small>Date Updated</small>
                <!-- display the converted date -->
                <p class="form-control m-b-5"><?= $date_updated; ?></p>
                <small>Updated By</small>
                <p class="form-control m-b-5"><?= $row['acct_name']; ?></p>

            <?php
        }   
    } else { 
        ?><h5>No Record Found</h5><?php 
    }

    mysqli_stmt_close($stmt);
}

function set_equipment($user_id, $equipment_id, $equipmentName, $condition) {
    global $connection;
    // First, update all changes that the user made
    $stmt = mysqli_prepare($connection, "UPDATE equipment SET equipment_name = ?, conditions = ?, date_updated = NOW(), admins_id = ? WHERE id = ?");
    if(!$stmt) {
         throw new Exception("Failed to prepare statement: " . mysqli_error($connection));
      }
    mysqli_stmt_bind_param($stmt, "siii", $equipmentName, $condition, $user_id, $equipment_id);

    if(!mysqli_stmt_execute($stmt)) {
        throw new Exception("Failed to execute statement: " . mysqli_stmt_error($stmt));
    }

    $_SESSION['resultMessage'] = "Equipment ID No. '".$equipment_id."' updated successfully.";
    $_SESSION['resultMessageCode'] = "success";
     $_SESSION['actionPerform'] = "Update";

    header("Location: ../equipments");
    exit();
}

function update_equipment($user_id, $equipment_id, $equipmentName, $condition, $update_stock, $update_quantity, $update_amount) {
    global $connection;

    try {
      mysqli_autocommit($connection, FALSE); 

      // First, update all changes that the user made
      $stmt = mysqli_prepare($connection, "UPDATE equipment SET equipment_name = ?, stock = ?, quantity = ?, amount = ?, conditions = ?, date_updated = NOW(), admins_id = ? WHERE id = ?");
      if(!$stmt) {
         throw new Exception("Failed to prepare statement: " . mysqli_error($connection));
      }
      mysqli_stmt_bind_param($stmt, "siiiiii", $equipmentName, $update_stock, $update_quantity, $update_amount, $condition, $user_id, $equipment_id);


      if(!mysqli_stmt_execute($stmt)) {
         throw new Exception("Failed to execute statement: " . mysqli_stmt_error($stmt));
      }

      // Check the equipment data inside the equipment table in the database 
      $select_equipment = "SELECT * FROM equipment WHERE id = ?";
      $stmt = mysqli_prepare($connection, $select_equipment);
      mysqli_stmt_bind_param($stmt, "i", $equipment_id);
      if (!mysqli_stmt_execute($stmt)) {
         throw new Exception("Failed to execute statement: " . mysqli_stmt_error($stmt));
      }
      $result = mysqli_stmt_get_result($stmt);
      $row = mysqli_fetch_assoc($result);

      // Check if the quantity is greater than 0. If it is, update the equipment status to available
      if($row['quantity'] > 0) {
         $updateEquipmentStatus = "UPDATE equipment
            SET status = 1
            WHERE id = ?";
         $stmt = mysqli_prepare($connection, $updateEquipmentStatus);
         if(!$stmt) {
            throw new Exception("Failed to prepare statement: " . mysqli_error($connection));
         }
         mysqli_stmt_bind_param($stmt, "i", $equipment_id);
         if (!mysqli_stmt_execute($stmt)) {
            throw new Exception("Failed to execute statement: " . mysqli_stmt_error($stmt));
         }
      }

      mysqli_commit($connection); // Commit the transaction
      mysqli_stmt_close($stmt); // Close all statement query actions

      $_SESSION['resultMessage'] = "Equipment ID No. '".$equipment_id."' updated successfully.";
      $_SESSION['resultMessageCode'] = "success";
      $_SESSION['actionPerform'] = "Update";

      header("Location: ../equipments");
      exit();


   } catch (Exception $e) {
      mysqli_rollback($connection);
      echo "An error occurred: " . $e->getMessage();
   }
}

function delete_equipment($deleteThatEquipment) {
    global $connection;

    //start deleting data
    $query = "DELETE FROM equipment WHERE id= ? "; 
    $stmt = mysqli_prepare($connection, $query);
    if(!$stmt) {
        throw new Exception("Failed to prepare statement" . mysqli_error($connection));
    }
    mysqli_stmt_bind_param($stmt, "i", $deleteThatEquipment);
    if(!mysqli_stmt_execute($stmt)){
        throw new Exception("Failed to execute statement" . mysqli_stmt_error($stmt));
    }
    //if success delete the equipment

    mysqli_stmt_close($stmt);
}


/********************************************
    FUNCTIONS FOR TRANSACTION
*********************************************/
function insert_costumer_details($costumerName, $email, $phoneNumber, $address, $schoolBranch, $rolePosition, $user_id, $url, $costumerStatus) {
   global $connection;

   try {
      $query = "INSERT INTO costumers(`name`, `email`, `phone_number`, `address`, `school_id`, `role_position`, `costumer_status`, `admin_id`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
      $stmt = mysqli_prepare($connection, $query);
      if(!$stmt) {
         throw new Exception("Failed to prepare statement: " . mysqli_error($connection));
      }
      mysqli_stmt_bind_param($stmt, "ssssisii", $costumerName, $email, $phoneNumber, $address, $schoolBranch,  $rolePosition, $costumerStatus, $user_id);
      if(!mysqli_stmt_execute($stmt)){
         throw new Exception("Faield to execute statement: " . mysqli_stmt_error($stmt));
      }

      $_SESSION['resultMessage'] = "Sucessfully added '".$costumerName."' as new barrower record!";
      $_SESSION['resultMessageCode'] = "success";
      $_SESSION['actionPerform'] = "Add";

      header("Location: ../barrow?location_rack=" . $url);
      exit();

      mysqli_stmt_close($stmt);

   } catch (Exception $e) {
      echo "An error occurred: " .$e->getMessage();
   } catch (Exception $e) {
      echo "An error occurred: " .$e->getLine();
   }
}

function insert_into_cart_list($equipmentID) {
   global $connection;

   $barrow_table = '';
      $message = ''; 
      //start performing actions
      try {
         //add equipment into barrow cart list
         if($_POST["action"] == "add") {
            if(isset($_SESSION['equipment_cart'])) 
            {
               $is_available = 0;
               foreach ($_SESSION['equipment_cart'] as $keys => $values) 
               {
                  if($_SESSION['equipment_cart'][$keys]['equipment_id'] == $_POST['equipment_id']) 
                  {
                     $is_available++;
                     $_SESSION['equipment_cart'][$keys]['equipment_bquantity'] = $_SESSION['equipment_cart'][$keys]['equipment_bquantity'] + $_POST['equipment_bquantity'];
                  }
               }
               if($is_available < 1) 
               {
                  $item_array = array(
                     'equipment_id'       =>    $_POST['equipment_id'],
                     'equipment_name'     => $_POST['equipment_name'],
                     'equipment_price'    => $_POST['equipment_price'],
                     'availableQuantity'     =>    $_POST['availableQuantity'],
                     'equipment_bquantity'   => $_POST['equipment_bquantity'],
                     'updatedAvailableQty'   => $_POST['updatedAvailableQty'] 
                  );
                  $_SESSION['equipment_cart'][] = $item_array;

                  $_SESSION['resultMessage'] = "Equipment has been added in to list!";
                  $_SESSION['resultMessageCode'] = "success";
                  $_SESSION['actionPerform'] = "Add";
               }
            } 
            else 
            {
               $item_array = array(
                  'equipment_id'       =>    $_POST['equipment_id'],
                  'equipment_name'     => $_POST['equipment_name'],
                  'equipment_price'    => $_POST['equipment_price'],
                  'availableQuantity'     =>    $_POST['availableQuantity'],
                  'equipment_bquantity'   => $_POST['equipment_bquantity'],
                  'updatedAvailableQty'   => $_POST['updatedAvailableQty'] 
               );
               $_SESSION['equipment_cart'][] = $item_array;

               $_SESSION['resultMessage'] = "Equipment has been added in to list!";
               $_SESSION['resultMessageCode'] = "success";
               $_SESSION['actionPerform'] = "Add";
            }
         }
      
         //delete or remove equipment in barrow cart list
         if($_POST["action"] == "remove") {
            foreach($_SESSION['equipment_cart'] as $keys => $values) 
            {
               if($values["equipment_id"] == $_POST["equipment_id"])
               {
                  unset($_SESSION["equipment_cart"][$keys]);
                  // $message = '<label class="text-success">Equipment Removed</label>';
               }
            }
         }

         //update or change the quantity of equipment in barrow cart list
         if($_POST["action"] == "bquantity_change") {
            foreach($_SESSION['equipment_cart'] as $keys => $values) 
            {
               if($values["equipment_id"] == $_POST["equipment_id"])
               {
                  $_SESSION["equipment_cart"][$keys]['equipment_bquantity'] == $_POST["bquantity"];

               }
            }
         }

         //display the equipment barrow in table
         $barrow_table .= '
            '.$message.'
               <table id="tbl_barrow_list" class="table barrow-data-table  table-bordered">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Date Barrow</th>
                  <th>Quantity</th>
                  <th>Price</th>
                  <th>Sub Total</th>
                  <th class="text-center">Action</th>
                </tr>
              </thead>
               ';
            //check if cart is empty
            if(!empty($_SESSION['equipment_cart'])) {
               $total = 0;
               foreach($_SESSION['equipment_cart'] as $keys => $values) {
                  $barrow_table .= ' 
                  <tbody>
               <tr>
                 <form action="" metdod="POST">
                    <td>'.$values["equipment_name"].'</td>
                    <td>Mar-21-2023 / 23:16 PM</td>
                    <td>
                       <input type="hidden" id="barrowEquipmentId'.$values["equipment_id"].'" 
                       value="'.$values["equipment_id"].'"/>

                        <input type="text" name="barrowquantity[]" 
                           class="form-control bquantity editquantity"
                           value="'.$values["equipment_bquantity"].'"  
                           id="bquantity'.$values["equipment_id"].'" 
                          data-equipment_id="'.$values["equipment_id"].'"     
                        />
                           <td>
                    <td>'.$values["equipment_price"].'</td>
                    <td>'.$values["equipment_bquantity"] * $values["equipment_price"].'</td>
                    <td>
                       <button type="submit" name="delete" id="'.$values["equipment_id"].'"  
                         class="remove_that_equipment btn-danger btn btn-sm m-r-20">
                         Remove
                        </button> 
                    </td>
                 </form>
               </tr>
             </tbody>
                  ';

               $total = $total + ($values["equipment_bquantity"] * $values["equipment_price"]);
            }
            $barrow_table .= ' 
               <tfoot>
            <tr>
              <th colspan="4" class="text-right">Total Amount</th>
              <th> '.$total.'</th>
              <th></th>
            </tr>
           </tfoot>                                 
            ';
         }
         $barrow_table .= '</table>';
         $output = array(
            'barrow_table' => $barrow_table,
            'cart_item'    =>    count($_SESSION['equipment_cart'])
         );

         echo json_encode($output); //convert data in json format and send back to ajax request

         // header("Location: admin-barrow");
         // exit();  
      } 
      catch(Exception $e) {
         echo "An error occured: " . $e->getMessage(); 
      }
}

function barrow_equipment($costumer_id, $barrowData, $barrowStatus, $UserAdminId) {
    global $connection;

    try {

      mysqli_autocommit($connection, FALSE); // start transaction

      //use for each loop to insert each equipment in row
      foreach ($barrowData as $equipment) {
         $equipmentId = $equipment['id'];
         $barrowQuantity = $equipment['quantity'];
         $subTotal = $equipment['subtotal'];

         //INSERT ALL EQUIPMENT IN CART LIST
         $insert_barrow = "INSERT INTO barrowed_equipment (`costumer_id`, `equipment_id`, `barrow_status`, `barrow_date`, `return_date`, `barrow_qty`, `subtotal_amount`, `user_id`) 
            VALUES (?, ?, ?, NOW(), NULL, ?, ?, ?)";
         $stmt = mysqli_prepare($connection, $insert_barrow);
         if(!$stmt) {
            throw new Exception("Failed to prepare statement: " . mysqli_error($connection));
         }

         mysqli_stmt_bind_param($stmt, "iiiiii", $costumer_id, $equipmentId, $barrowStatus, $barrowQuantity, $subTotal, $UserAdminId);
         mysqli_stmt_execute($stmt);

         
         $select_equipment = "SELECT * FROM equipment WHERE id = ?";
         $stmt = mysqli_prepare($connection, $select_equipment);
         mysqli_stmt_bind_param($stmt, "i", $equipmentId);
         if (!mysqli_stmt_execute($stmt)) {
             throw new Exception("Failed to execute statement: " . mysqli_stmt_error($stmt));
         }
         $result = mysqli_stmt_get_result($stmt);
         $row = mysqli_fetch_assoc($result);

         //UPDATE THE QUANTITY AND INUSE OF EQUIPMENT
         //5+5 =10
         $updateInUse = intval($row['in_use']) + intval($barrowQuantity);
         //5-5 =0
         $updateAvailableQty = intval($row['quantity']) - intval($barrowQuantity);

         $update_inuse_aquantity = "UPDATE equipment 
                    SET in_use = ?, quantity = ?
                    WHERE id = ?";
         $stmt = mysqli_prepare($connection, $update_inuse_aquantity);
         mysqli_stmt_bind_param($stmt, "iii", $updateInUse, $updateAvailableQty, $equipmentId);
         if (!mysqli_stmt_execute($stmt)) {
             throw new Exception("Failed to execute statement: " . mysqli_stmt_error($stmt));
         }

         //CHECK IF EQUIPMENT IS NO AVAILABLE STOCK, THEN UPDATE STATUS
         if ($updateAvailableQty == 0) {
            $update_equipment_status = "UPDATE equipment
                  SET status = 0
                  WHERE id = ?";
            $stmt = mysqli_prepare($connection, $update_equipment_status);
            if (!$stmt) {
               throw new Exception("Failed to prepare statement: " . mysqli_error($connection));
            }
            mysqli_stmt_bind_param($stmt, "i", $equipmentId);
            if (!mysqli_stmt_execute($stmt)) {
               throw new Exception("Failed to execute statement: " . mysqli_stmt_error($stmt));
            }
         }

      }

      mysqli_commit($connection); // commit transaction

      //after inserting data in cart to database unsent all equipment in cart list 
      if(isset($_SESSION['equipment_cart'])) {
         foreach($_SESSION['equipment_cart'] as $keys => $values) {
            unset($_SESSION['equipment_cart']);
         }
      }

      $_SESSION['resultMessage'] = "Equipments barrowed successfully!";
      $_SESSION['resultMessageCode'] = "success";
      $_SESSION['actionPerform'] = "barrow";

   } catch (Exception $e) {
        mysqli_rollback($connection); // rollback transaction
        echo "An error occured: " . $e->getMessage();
   }
}

function return_equipment($costumer_id, $usersAdminId, $toReturnData) {
    global $connection;

    try {
        mysqli_autocommit($connection, FALSE); // start transaction

        // use for each loop to update each equipment
        foreach($toReturnData as $barrowedEquipment) {
            $barrowId = $barrowedEquipment['barrow_id'];
            $equipmentId = $barrowedEquipment['equipment_id'];
            $returnQuantity = $barrowedEquipment['quantity'];
            $returnSubtotal = $barrowedEquipment['subTotal'];
            $rqty = $barrowedEquipment['returnedQty'];

            //UPDATE BARROW EQUIPMENT AND SUBTOTAL
            //2 - 2 = 0
            //400 - 400 = 0 
            $updateBarrowQty = "UPDATE barrowed_equipment 
                SET barrow_qty = barrow_qty - ?, 
                    subtotal_amount = subtotal_amount - ?,
                    returned_qty = ?,
                    user_id = ?
                WHERE costumer_id = ?  AND barrow_id = ?";
            $stmt = mysqli_prepare($connection, $updateBarrowQty);
            if (!$stmt) {
                throw new Exception("Failed to prepare statement: " . mysqli_error($connection));
            }
            mysqli_stmt_bind_param($stmt, "iiiiii", $returnQuantity, $returnSubtotal, $rqty, $usersAdminId, $costumer_id, $barrowId);
            if (!mysqli_stmt_execute($stmt)) {
                throw new Exception("Failed to execute statement: " . mysqli_stmt_error($stmt));
            }
            
            //CHECK IF BARROWED EQUIPMENT IS FULLY RETURN THEN UPDATE BARROW STATUS

            $checkBarrowQty = "SELECT be.barrow_qty, e.*
                FROM barrowed_equipment be 
                INNER JOIN equipment e ON be.equipment_id = e.id
                WHERE be.costumer_id = ? 
                AND be.barrow_id = ?";
            $stmt = mysqli_prepare($connection, $checkBarrowQty);
            if (!$stmt) {
                throw new Exception("Failed to prepare statement: " . mysqli_error($connection));
            }
            mysqli_stmt_bind_param($stmt, "ii", $costumer_id, $barrowId);
            if (!mysqli_stmt_execute($stmt)) {
                throw new Exception("Failed to execute statement: " . mysqli_stmt_error($stmt));
            }
            $result = mysqli_stmt_get_result($stmt);
            $row = mysqli_fetch_assoc($result);
            if ($row['barrow_qty'] == 0) {
                //$return_date = date('m-d-Y H:i:s');

                $updateBarrowStatus = "UPDATE barrowed_equipment 
                    SET barrow_status = 0, return_date = NOW()
                    WHERE costumer_id = ? 
                    AND barrow_id = ?";
                $stmt = mysqli_prepare($connection, $updateBarrowStatus);
                if (!$stmt) {
                    throw new Exception("Failed to prepare statement: " . mysqli_error($connection));
                }
                mysqli_stmt_bind_param($stmt, "ii", $costumer_id, $barrowId);
                if (!mysqli_stmt_execute($stmt)) {
                    throw new Exception("Failed to execute statement: " . mysqli_stmt_error($stmt));
                }
            }

            //UPDATE THE QUANTITY AND INUSE OF EQUIPMENT

            //0 + 5 = 5
            $updateAvailableQty = intval($row['quantity']) + intval($returnQuantity);
            //10 - 5 = 5
            $updateInUse = intval($row['in_use']) - intval($returnQuantity);         

            $updateEquipments = "UPDATE equipment 
                SET quantity = ?, in_use = ?
                WHERE id = ?";
            $stmt = mysqli_prepare($connection, $updateEquipments);
            mysqli_stmt_bind_param($stmt, "iii", $updateAvailableQty, $updateInUse, $equipmentId);
            if(!mysqli_stmt_execute($stmt)) {
                throw new Exception("Failed to execute statement: " . mysqli_stmt_error($stmt));
            }

            //CHECK IF EQUIPMENT IS BACK AVAILABLE STOCK, THEN UPDATE STATUS
            if($updateAvailableQty > 1) {
               $update_equipment_status = "UPDATE equipment
                  SET status = 1
                  WHERE id = ?";
               $stmt = mysqli_prepare($connection, $update_equipment_status);
               if (!$stmt) {
                  throw new Exception("Failed to prepare statement: " . mysqli_error($connection));
               }
               mysqli_stmt_bind_param($stmt, "i", $equipmentId);
               if (!mysqli_stmt_execute($stmt)) {
                  throw new Exception("Failed to execute statement: " . mysqli_stmt_error($stmt));
               }
            }

        }  //end loop

        mysqli_commit($connection); // commit transaction

        $_SESSION['resultMessage'] = "Equipments returned successfully!";
        $_SESSION['resultMessageCode'] = "success";
        $_SESSION['actionPerform'] = "return";

    } catch (Exception $e) {
        mysqli_rollback($connection); // rollback transaction
        echo "An error occurred: " . $e->getMessage();
    }
}