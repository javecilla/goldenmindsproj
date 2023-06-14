<?php
try {
  define('DB_HOST', 'localhost');
  define('DB_USER', 'root');
  define('DB_PASSWORD', '');
  define('DB_NAME', 'inventorydb');

  $connection = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
  if ($connection->connect_errno) {
    throw new Exception("Failed to connect database: " . $connection->connect_error);
  }

  $username = mysqli_real_escape_string($connection, $_POST['username']);
  $password = mysqli_real_escape_string($connection, $_POST['password']);

  //prepare statement
  $stmt = mysqli_prepare($connection, "SELECT * FROM users WHERE uname = ? LIMIT 1");
  mysqli_stmt_bind_param($stmt, "s", $username);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
  $row = mysqli_fetch_assoc($result);

  //check if user exists in db
  if(mysqli_num_rows($result) > 0) {
    //check if password is match in db
    if($row['pword'] !== null && password_verify($password, $row['pword'])) {
      echo json_encode(array('success' => true));
    } else {
      echo json_encode(array('success' => false));
    }
  } else {
    echo json_encode(array('success' => false));
  }
} catch (Exception $e) {
  echo "An error occurred: " . $e->getMessage();
}