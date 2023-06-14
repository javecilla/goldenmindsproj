<?php
	//testablishing database connection
	try {
		define('DB_HOST', 'localhost');
		define('DB_USER', 'root');
		define('DB_PASSWORD', '');
		define('DB_NAME', 'inventorydb');

		$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		if ($conn->connect_errno) {
      throw new Exception("Failed to connect database: " . $conn->connect_error);
    }
	} catch (Exception $e) {
		echo "An error occured: " . $e->getMessage();
	} finally {
		//echo "Database connected successfully!";
	}

	//set the name of the backup file
	$backupFile = DB_NAME . "_" . date("Ymd-His") . ".sql"; //db_student_20230404-132705.sql

	//open a new file handle for writing the backup data
	$handle = fopen($backupFile, 'w');

	//fetch all the tables in the database
	$tables = array();
	$query = "SHOW TABLES";
	$stmt = mysqli_prepare($conn, $query);
	mysqli_stmt_execute($stmt);
	$result = mysqli_stmt_get_result($stmt);
	while($row = mysqli_fetch_row($result)) {
		$tables[] = $row[0];
	}

	//loop through each table and write the SQL commands to the backup file
	foreach($tables as $table) {
		$query = "SELECT * FROM $table";
		$stmt = mysqli_prepare($conn, $query);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		$numFields = mysqli_num_fields($result);
		$numRows = mysqli_num_rows($result);

		fwrite($handle, "DROP TABLE IF EXISTS $table;\n");

		$query2 = "SHOW CREATE TABLE $table";
		$stmt2 = mysqli_prepare($conn, $query2);
		mysqli_stmt_execute($stmt2);
		$result2 = mysqli_stmt_get_result($stmt2);
		$row2 = mysqli_fetch_row($result2);
		fwrite($handle, $row2[1] . ";\n");

		while ($row = mysqli_fetch_row($result)) {
     	$sql = "INSERT INTO $table VALUES(";
	    for($j = 0; $j < $numFields; $j++) {
	      $row[$j] = mysqli_real_escape_string($conn, $row[$j]);
	      if(isset($row[$j])) {
	        $sql .= '"' . $row[$j] . '"';
	      } else {
	        $sql .= '""';
	      }
	      if ($j < ($numFields - 1)) {
	        $sql .= ',';
	      }
	    }
	    $sql .= ");\n";
	    fwrite($handle, $sql);
   	}
	}

	//close the file handle and database connection
	fclose($handle);
	mysqli_close($conn);

	//prompt the user to download the backup file
	header('Content-Description: File Transfer');
	header('Content-Type: application/octet-stream');
	header('Content-Disposition: attachment; filename=' . basename($backupFile));
	header('Content-Transfer-Encoding: binary');
	header('Content-Length: ' . filesize($backupFile));
	readfile($backupFile);
	exit;
?>