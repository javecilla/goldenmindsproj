<html>
<head>
<title>GMA Login</title>
</head>

<body onload = "admin(), teacher(), student(), acclvl()">

<img src = "imgbg.png" style = "height: 100%; width: 100%; position: fixed; top: 0; left: 0;">

<center>

<table border = 2 style = 'width: 250; border-color: black; background-color: white; height: 200; width: 600; position: relative; top: 200; border-radius: 5px;'>
<td style = 'border: none; font-size: 50; position: absolute; top: 10; left: 10;'>

<form action = 'gmc admin.php' method = 'post'>
<input type = 'hidden' name = 'btnadmin' id = 'btnadmin' value = 'Ok' style = 'border: none; background-color: blue; color: white; width: 150; height: 60; font-size: 40; position: absolute; top: 100; left: 400; border-radius: 5px;'>
<input type = 'hidden' name = 'txtusername' id = 'txtadmin'>
</form>

<form action = 'gmc teacher.php' method = 'post'>
<input type = 'hidden' name = 'btnteacher' id = 'btnteacher' value = 'Ok' style = 'border: none; background-color: blue; color: white; width: 150; height: 60; font-size: 40; position: absolute; top: 100; left: 400; border-radius: 5px;'>
<input type = 'hidden' name = 'txtusername' id = 'txtteacher'>
</form>

<form action = 'gma student.php' method = 'post'>
<input type = 'hidden' name = 'btnstudent' id = 'btnstudent' value = 'Ok' style = 'border: none; background-color: blue; color: white; width: 150; height: 60; font-size: 40; position: absolute; top: 100; left: 400; border-radius: 5px;'>
<input type = 'hidden' name = 'txtusername' id = 'txtstudent'>
</form>

</td>
</table>

</center>

<input type = 'hidden' name = 'txtusername' id = 'txtusername'>
<input type = 'hidden' name = 'txtaccesslevel' id = 'txtaccesslevel'>

</body>
</html>

<?php

$cn = mysqli_connect('localhost', 'root', '', 'gmcbulac_db_gmc');
//$cn = mysqli_connect('localhost', 'gmcbulac_derek03', 'derek030872', 'gmcbulac_db_gmc');
if(!$cn)
{
echo'Unable to connect';
}

// Login

if(isset($_POST['btnlogin']))
{
	
$txtusername = $_POST['txtusername'];
$txtpass = $_POST['txtpass'];

$sql = mysqli_query($cn, "select * from account_registration where username = '$txtusername' and pass = '$txtpass' and (status = 'Approved' or status = 'Active')");
$login = mysqli_num_rows($sql);

if(!empty($txtusername) && !empty($txtpass) && $login == 1)
{

while($row = mysqli_fetch_assoc($sql))
{
echo"<script>document.getElementById('txtaccesslevel').value = '$row[access_level]'</script>";
echo"<center>";
echo"<p style = 'position: relative; top: -40; left: -100; font-size: 50;'>";
echo"Login Successful";
echo"</p>";
echo"</center>";
}

}
else
{
echo "<script>alert('Login Failed')</script>";
echo "<script>window.location='gma login.html'</script>";
}

}

?>

<script>

// Admin

function admin()
{
if(document.getElementById('txtaccesslevel').value == 'Admin')
{
document.getElementById('btnadmin').type = 'submit'
}
else
{
document.getElementById('btnadmin').type = 'hidden'
}
}

// Teacher

function teacher()
{
if(document.getElementById('txtaccesslevel').value == 'Teacher')
{
document.getElementById('btnteacher').type = 'submit'
}
else
{
document.getElementById('btnteacher').type = 'hidden'
}
}

// Student

function student()
{
if(document.getElementById('txtaccesslevel').value == 'Student')
{
document.getElementById('btnstudent').type = 'submit'
}
else
{
document.getElementById('btnstudent').type = 'hidden'
}
}

// Username

document.getElementById('txtusername').value = localStorage['objectToPass'];

document.getElementById('txtadmin').value = document.getElementById('txtusername').value;
document.getElementById('txtteacher').value = document.getElementById('txtusername').value;
document.getElementById('txtstudent').value = document.getElementById('txtusername').value;

// Force Logout

function acclvl()
{
if(document.getElementById('txtaccesslevel').value == '')
{
window.location.href = 'gma login.html';
}
}

</script>