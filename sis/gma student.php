<html>
<head>
<title>GMA Student</title>
</head>

<body onload = "login(), acclvl()" bgcolor = "white">

<table border = 2 style = "background-color: 28110d; border: none; position: absolute; top: 0; left: 0; height: 100; width: 100%;">

<td style = 'border-color: transparent; width: 40; min-width: 40;'>
<img src = 'admin.png' style = 'height: 40; width: 40;'>
</td>

<td style = 'border-color: transparent; min-width: 916; max-width: 916;'>
</td>

<td style = 'border-color: transparent; width: 120; min-width: 120;'>
<input type = 'button' value = 'HOME' style = 'border-color: white; border-radius: 5px; background-color: 28110d; color: white; font-size: 20; height: 30; width: 120;' onclick = 'return show("Page1","Page2");'>
</td>

<td style = 'border-color: transparent; width: 115; min-width: 115;'>
<input type = "button" value = 'ACCOUNT' style = 'border-color: white; border-radius: 5px; background-color: 28110d; color: white; font-size: 20; height: 30 width: 120;' onclick = 'return show("Page2","Page1");'>
</td>

<td style = 'border-color: transparent; width: 120; min-width: 120;'>
<input type = 'button' value = 'LOG OUT' style = 'border-color: white; border-radius: 5px; background-color: 28110d; color: white; font-size: 20; height: 30; width: 120;' onclick = 'logout()'>
</td>

</table>

<img src = "bg.png" style = "position: fixed; top: 100; left: 0; height: 100%; width: 100%;">

<div id = 'Page1'>

<table border = 2 style = 'border-color: 28110d; background-color: transparent; position: absolute; top: 100; left: 0; height: 55; width: 100%;'>

<form action = 'gma profile.php' method = 'post'>
<td style = 'border-color: transparent; width: 280; min-width: 280;'>
<input type = 'submit' name = 'profile' id = 'btnprofile' value = 'Profile' style = 'border-color: EFC372; border-radius: 5px; background-color: EFC372; color: 28110d; font-size: 30; width: 280'>
<input type = 'hidden' name = 'txtusername' id = 'txtprofile'>
<input type = 'hidden' name = 'cmbsearch' id = 'cmbsearch'>
</td>
</form>

<form action = 'gma grades.php' method = 'post'>
<td style = 'border-color: transparent; width: 280; min-width: 280;'>
<input type = 'submit' name = 'grades' id = 'btngrades' value = 'Grades' style = 'border-color: EFC372; border-radius: 5px; background-color: EFC372; color: 28110d; font-size: 30; width: 280'>
<input type = 'hidden' name = 'txtusername' id = 'txtgrades'>
<input type = 'hidden' name = 'cmbsy'>
<input type = 'hidden' name = 'cmbsemester'>
</td>
</form>

<form action = 'gma payments.php' method = 'post'>
<td style = 'border-color: transparent; width: 280; min-width: 280;'>
<input type = 'submit' name = 'payments' id = 'btnpayments' value = 'Payments' style = 'border-color: EFC372; border-radius: 5px; background-color: EFC372; color: 28110d; font-size: 30; width: 280'>
<input type = 'hidden' name = 'txtusername' id = 'txtpayments'>
<input type = 'hidden' name = 'cmbsearch' id = 'cmbsearch'>
</td>
</form>

<td style = 'border-color: transparent; min-width: 473; max-width: 473;'>
</td>

</table>

</div>

<div id = 'Page2' style = 'display:none'>

<form action = 'gma student.php' method = 'post'>

<p style = 'position: absolute; top: 100; left: 5; font-weight: bold; font-size: 30; width: 300; text-align: left;'>
Account Number:
</p>
<input type = 'text' name = 'txtacctno' id = 'txtacctno' style = 'width: 500; position: absolute; top: 165; left: 5; font-size: 30; border-radius: 5px; border-color: 28110d;' readonly = 'readonly'>

<p style = 'position: absolute; top: 180; left: 5; font-weight: bold; font-size: 30; width: 300; text-align: left;'>
Access Level:
</p>
<input type = 'text' name = 'txtaccesslevel' id = 'txtaccesslevel' style = 'width: 500; position: absolute; top: 245; left: 5; font-size: 30; border-radius: 5px; border-color: 28110d;' readonly = 'readonly'>

<p style = 'position: absolute; top: 260; left: 5; font-weight: bold; font-size: 30; width: 300; text-align: left;'>
Account Name:
</p>
<input type = 'text' name = 'txtacctname' id = 'txtacctname' style = 'width: 500; position: absolute; top: 325; left: 5; font-size: 30; border-radius: 5px; border-color: 28110d;'>

<p style = 'position: absolute; top: 340; left: 5; font-weight: bold; font-size: 30; width: 300; text-align: left;'>
Username:
</p>
<input type = 'text' name = 'txtuser' id = 'txtuser' style = 'width: 500; position: absolute; top: 405; left: 5; font-size: 30; border-radius: 5px; border-color: 28110d;' readonly = 'readonly'>

<p style = 'position: absolute; top: 420; left: 5; font-weight: bold; font-size: 30; width: 300; text-align: left;'>
Current Password:
</p>
<input type = 'password' name = 'txtcurrent' id = 'txtcurrent' style = 'width: 500; position: absolute; top: 485; left: 5; font-size: 30; border-radius: 5px; border-color: 28110d;'>

<p style = 'position: absolute; top: 500; left: 5; font-weight: bold; font-size: 30; width: 300; text-align: left;'>
New Password:
</p>
<input type = 'password' name = 'txtnew' id = 'txtnew' style = 'width: 500; position: absolute; top: 565; left: 5; font-size: 30; border-radius: 5px; border-color: 28110d;'>

<p style = 'position: absolute; top: 580; left: 5; font-weight: bold; font-size: 30; width: 300; text-align: left;'>
Confirm Password:
</p>
<input type = 'password' name = 'txtconfirm' id = 'txtconfirm' style = 'width: 500; position: absolute; top: 645; left: 5; font-size: 30; border-radius: 5px; border-color: 28110d;'>

<input type = 'submit' name = 'update' id = 'btnupdate' value = 'Update Account' style = 'width: 500; border-color: EFC372; border-radius: 5px; background-color: EFC372; color: 28110d; font-size: 30; position: absolute; top: 730; left: 5;'>

</form>

</div>

</body>
</html>

<?php

//$cn = mysqli_connect('localhost', 'root', '', 'gmcbulac_db_gmc');
$cn = mysqli_connect('localhost', 'gmcbulac_derek03', 'derek030872', 'gmcbulac_db_gmc');
if(!$cn)
{
echo'Unable to connect';
}

// Account Information

echo"<input type = 'hidden' name = 'txtusername' id = 'txtusername' style = 'position: absolute; top: 320; left: 500;'>";
echo"<input type = 'hidden' name = 'txtaccesslevel' id = 'txtaccesslevel' style = 'position: absolute; top: 350; left: 500;'>";

$txtusername = $_POST['txtusername'];

$sql = mysqli_query($cn, "select * from account_registration where username = '$txtusername'");
$username = mysqli_num_rows($sql);

while($row = mysqli_fetch_assoc($sql))
{
echo"<p style = 'position: absolute; top: 15; left: 50; color: white; font-size: 25; font-weight: bold;'>";
echo"Welcome $row[access_level], $row[account_name]";
echo"</p>";
echo"<script>document.getElementById('txtaccesslevel').value = '$row[access_level]'</script>";
}

// Account

$sql = mysqli_query($cn, "select * from account_registration where username = '$txtusername'");
$username = mysqli_num_rows($sql);

while($row = mysqli_fetch_assoc($sql))
{
echo"<script>document.getElementById('txtacctno').value = '$row[account_no]'</script>";
echo"<script>document.getElementById('txtaccesslevel').value = '$row[access_level]'</script>";
echo"<script>document.getElementById('txtacctname').value = '$row[account_name]'</script>";
echo"<script>document.getElementById('txtuser').value = '$row[username]'</script>";
}

if(isset($_POST['update']))
{

$txtacctno = $_POST['txtacctno'];
$txtaccesslevel = $_POST['txtaccesslevel'];
$txtacctname = $_POST['txtacctname'];
$txtuser = $_POST['txtuser'];
$txtcurrent = $_POST['txtcurrent'];
$txtnew = $_POST['txtnew'];
$txtconfirm = $_POST['txtconfirm'];

// Current Password

if(!empty($txtcurrent))
{
$sql = mysqli_query($cn, "select * from account_registration where pass = '$txtcurrent'");
$current = mysqli_num_rows($sql);
if($current == 0)
{
echo"<script>alert('Incorrect Current Password')</script>";
}
}

// Short Password
if(!empty($txtnew) && !empty($txtconfirm))
{
if(strlen($txtnew) < 8 && strlen($txtconfirm) < 8)
{
echo"<script>alert('Short Password')</script>";
}
}

// Password Mismatch

if(!empty($txtnew) && !empty($txtconfirm))
{
if($txtnew != $txtconfirm)
{
echo"<script>alert('Password Mismatch')</script>";
}
}

// Update Account

if(!empty($txtacctno)
&& !empty($txtaccesslevel) 
&& !empty($txtacctname) 
&& !empty($txtuser)
&& !empty($txtcurrent) && $current != 0
&& !empty($txtnew) && strlen($txtnew) > 7 
&& !empty($txtconfirm) && strlen($txtconfirm) > 7 
&& $txtnew == $txtconfirm)
{	
$sql = mysqli_query($cn, "update account_registration set account_name = '$txtacctname', pass = '$txtnew' where account_no = '$txtacctno'");

echo"<script>alert('Record Updated')</script>";
echo"<script>history.go(-1)</script>";
}
else
{
echo"<script>alert('Updating Account Failed. Back to Home Page.')</script>";
echo"<script>history.go(-1)</script>";
}

}

?>

<script>

// Username

document.getElementById('txtusername').value = localStorage['objectToPass'];

document.getElementById('txtprofile').value = document.getElementById('txtusername').value;
document.getElementById('txtgrades').value = document.getElementById('txtusername').value;
document.getElementById('txtpayments').value = document.getElementById('txtusername').value;

// Login

function login()
{
if(document.getElementById('txtusername').value == 'undefined')
{
window.location.href = 'gma login.html';
}
}

// Logout

function logout()
{
localStorage.removeItem('objectToPass');
window.location.href = 'gma login.html';
}

// Force Logout

function acclvl()
{
if(document.getElementById('txtaccesslevel').value == '')
{
window.location.href = 'gma login.html';
}
}

function show(page1, page2)
{
document.getElementById(page1).style.display = 'block';
document.getElementById(page2).style.display = 'none';
return false;
}

</script>
