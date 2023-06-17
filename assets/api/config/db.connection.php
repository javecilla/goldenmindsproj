<?php
$timezone = date_default_timezone_set('Asia/Manila');

class Config 
{
  protected function connect()
  {
    try {
     //load private credentials from config.credentials->then create dbconnection	    
		 $config = parse_ini_file('db.credentials.ini'); 
		 $connection = new mysqli($config['host'], $config['username'], $config['password'], $config['dbname']);
      
      //check for connection errors
      if($connection->connect_error) {
        throw new Exception("Connection failed: " . $connection->connect_error);
      } 

      //echo "Connected successfully";
      return $connection;

    } catch (Exception $e) {
      echo "Connection error: " . $e->getMessage();
      return null;
    } 
  }
}
