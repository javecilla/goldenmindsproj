<?php
//start session 

//set timezone in local
$timezone = date_default_timezone_set('Asia/Manila');
//establishing db connection
$cn = new mysqli('localhost', 'root', '', 'gmcbulac_db_gmc');