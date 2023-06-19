<?php

//$cn = mysqli_connect('localhost', 'root', '', 'gmcbulac_db_gmc');
$cn = mysqli_connect('localhost', 'gmcbulac_derek03', 'derek030872', 'gmcbulac_db_gmc');

if(!$cn)
{
echo'Unable to connect';
}

if(isset($_POST['register']))
{
	
$txtaccesslevel = $_POST['txtaccesslevel'];
$txtacctname = $_POST['txtacctname'];
$txtusername = $_POST['txtusername'];
$txtpass = $_POST['txtpass'];
$txtconfirm = $_POST['txtconfirm'];

// Existing Username

if(!empty($txtusername))
{
$sql = mysqli_query($cn, "select * from account_registration where username = '$txtusername'");
$username = mysqli_num_rows($sql);
if($username == 1)
{
echo "<script>alert('Existing Username')</script>";
}
}

// Short Password
if(!empty($txtpass) && !empty($txtconfirm))
{
if(strlen($txtpass) < 8 && strlen($txtconfirm) < 8)
{
echo "<script>alert('Short Password')</script>";
}
}

// Password Mismatch

if(!empty($txtpass) && !empty($txtconfirm))
{
if($txtpass != $txtconfirm)
{
echo "<script>alert('Password Mismatch')</script>";
}
}

// Register

if(!empty($txtaccesslevel) 
&& !empty($txtacctname) 
&& !empty($txtusername) && $username != 1 
&& !empty($txtpass) && strlen($txtpass) > 7 
&& !empty($txtconfirm) && strlen($txtconfirm) > 7 
&& $txtpass == $txtconfirm)
{	

if($txtaccesslevel == 'Student')
{
$sql = mysqli_query($cn, "insert into account_registration (access_level, account_name, username, pass, status) values ('$txtaccesslevel', '$txtacctname', '$txtusername', '$txtpass', 'Approved')");
$sql = mysqli_query($cn, "insert into student_information (username) values ('$txtusername')");
}
else
{
$sql = mysqli_query($cn, "insert into account_registration (access_level, account_name, username, pass, status) values ('$txtaccesslevel', '$txtacctname', '$txtusername', '$txtpass', '')");
$sql = mysqli_query($cn, "insert into student_information (username) values ('$txtusername')");
}

echo "<script>alert('Registration Successful')</script>";
echo "<script>window.location='gma account registration.html'</script>";
}
else
{
echo "<script>alert('Registration Failed')</script>";
echo "<script>history.go(-1)</script>";
}

}

?>