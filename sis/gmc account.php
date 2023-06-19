<html>
<head>
<title>Account</title>
</head>

<body onload = "login()" bgcolor = "white">

<img src = "bg.png" style = "position: fixed; top: 100; left: 0; height: 100%; width: 100%;">

<input type = 'hidden' name = 'txtusername' id = 'txtusername'>
<?php
$cn = mysqli_connect('localhost', 'root', '', 'gmcbulac_db_gmc');
//$cn = mysqli_connect('localhost', 'gmcbulac_derek03', 'derek030872', 'gmcbulac_db_gmc');
$txtusername = $_POST['txtusername'];
$sql = mysqli_query($cn, "select * from account_registration where username = '$txtusername'");
while($row = mysqli_fetch_assoc($sql))
{
$username = $row['username'];
}
?>

<center>

<table border = 2 style = "background-color: 28110d; border: none; height: 100; width: 1000; position: relative; top: 0;">

<tr>
<th style = 'border-color: transparent; text-align: center;'>
<img src = 'logoM.png' style = 'height: 400; width: 950;'>
</th>
</tr>

<tr>

<th style = 'border-color: transparent; text-align: right;'>
<form action = 'gmc home.php' method = 'post'>
<input type = 'submit' value = 'HOME' style = 'border-color: white; border-radius: 5px; background-color: 28110d; color: white; font-size: 20; height: 50; width: 120; position: absolute; top: 350; left: 590;'>
<input type = 'hidden' name = 'txtusername' value = '<?php echo $username;?>'>
</form>
</th>

<th style = 'border-color: transparent; text-align: center;'>
<form action = 'gmc account.php' method = 'post'>
<input type = "submit" name = 'btnacct' id = 'btnacct' value = 'ACCOUNT' style = 'border-color: white; border-radius: 5px; background-color: 28110d; color: white; font-size: 20; height: 50; width: 120; position: absolute; top: 350; left: 720;'>
<input type = 'hidden' name = 'txtusername' value = '<?php echo $username;?>'>
</form>
</th>

<th style = 'border-color: transparent; text-align: left;'>
<form action = '' method = ''>
<input type = 'button' value = 'LOG OUT' style = 'border-color: white; border-radius: 5px; background-color: 28110d; color: white; font-size: 20; height: 50; width: 120; position: absolute; top: 350; left: 850;' onclick = 'logout()'>
</form>
</th>

</tr>

</table>

<table border = 2 style = "border-color: 28110d; height: 100; width: 1000; border-left: 3px solid black; border-right: 3px solid black; position: relative; top: 0;">
<tr>

<th style = 'border-color: transparent; text-align: left;'>
<img src = 'admin.png' style = 'height: 40; width: 40;'>
</th>

<th style = 'border-color: transparent; width: 150; text-align: left;'>

<input type = 'text' name = 'txtacctname' id = 'txtacctname' style = 'font-size: 30; font-weight: bold; background-color: transparent; border-color: transparent; width: 600; font-family: times new roman;' readonly>

<input type = 'text' name = 'txtaccesslevel' id = 'txtaccesslevel' style = 'font-size: 20; font-weight: bold; font-style: italic; background-color: transparent; border-color: transparent; width: 90; font-family: times new roman;' readonly>

<input type = 'text' name = 'txtpost' id = 'txtpost' style = 'font-size: 25; height: 40; width: 400; font-family: times new roman; border-radius: 10px; text-align: center;' placeholder = "What's on your Golden Minds?">

</th>

<th style = 'border-color: transparent; width: 600;'>
</th>

</tr>
</table>

<table border = 2 style = "border-color: 28110d; height: 100%; width: 1000; border-left: 3px solid black; border-right: 3px solid black; border-bottom: 4px solid black; position: relative; top: 0;">

<form action = 'gmc account.php' method = 'post'>

<tr style = 'height: 1050;'>
<th style = 'border-color: transparent; text-align: center; font-size: 30;'>

Account Number:

<br>

<input type = 'text' name = 'txtacctno' id = 'txtacctno' style = 'height: 60; width: 900; font-size: 30; border-radius: 5px; background-color: transparent; border-color: 28110d; text-align: center;' readonly = 'readonly'>

<br><br>

Access Level:

<br>

<input type = 'text' name = 'txtacclvl' id = 'txtacclvl' style = 'height: 60; width: 900; font-size: 30; border-radius: 5px; background-color: transparent; border-color: 28110d; text-align: center;' readonly = 'readonly'>

<br><br>

Account Name:

<br>

<input type = 'text' name = 'txtaccntname' id = 'txtaccntname' style = 'height: 60; width: 900; font-size: 30; border-radius: 5px; background-color: transparent; border-color: 28110d; text-align: center;' required>

<br><br>

Username:

<br>

<input type = 'text' name = 'txtuser' id = 'txtuser' style = 'height: 60; width: 900; font-size: 30; border-radius: 5px; background-color: transparent; border-color: 28110d; text-align: center;' readonly = 'readonly'>

<br><br>

Current Password:

<br>

<input type = 'password' name = 'txtcurrent' id = 'txtcurrent' style = 'height: 60; width: 900; font-size: 30; border-radius: 5px; background-color: transparent; border-color: 28110d; text-align: center;' required>

<br><br>

New Password:

<br>

<input type = 'password' name = 'txtnew' id = 'txtnew' style = 'height: 60; width: 900; font-size: 30; border-radius: 5px; background-color: transparent; border-color: 28110d; text-align: center;' required>

<br><br>

Confirm Password:

<br>

<input type = 'password' name = 'txtconfirm' id = 'txtconfirm' style = 'height: 60; width: 900; font-size: 30; border-radius: 5px; background-color: transparent; border-color: 28110d; text-align: center;' required>

<br><br>

<input type = 'submit' name = 'update' id = 'btnupdate' value = 'Update Account' style = 'height: 60; width: 900; border-color: EFC372; border-radius: 5px; background-color: EFC372; color: 28110d; font-size: 30;'>

<input type = 'hidden' name = 'txtusername' value = '<?php echo $username;?>'>

</th>
</tr>

<tr>
<th style = 'border-color: transparent; text-align: center;'>

</th>
</tr>

</form>

</table>

</center>


</body>
</html>

<?php

$cn = mysqli_connect('localhost', 'root', '', 'gmcbulac_db_gmc');
//$cn = mysqli_connect('localhost', 'gmcbulac_derek03', 'derek030872', 'gmcbulac_db_gmc');

// Account Info
	
$txtusername = $_POST['txtusername'];

$sql = mysqli_query($cn, "select * from account_registration where username = '$txtusername'");
$username = mysqli_num_rows($sql);

while($row = mysqli_fetch_assoc($sql))
{
echo"<script>document.getElementById('txtacctname').value = '$row[account_name]'</script>";
echo"<script>document.getElementById('txtaccesslevel').value = '$row[access_level]'</script>";

echo"<script>document.getElementById('txtacctno').value = '$row[account_no]'</script>";
echo"<script>document.getElementById('txtaccntname').value = '$row[account_name]'</script>";
echo"<script>document.getElementById('txtacclvl').value = '$row[access_level]'</script>";
echo"<script>document.getElementById('txtacctname').value = '$row[account_name]'</script>";
echo"<script>document.getElementById('txtuser').value = '$row[username]'</script>";
}

if(isset($_POST['update']))
{

$txtacctno = $_POST['txtacctno'];
$txtacclvl = $_POST['txtacclvl'];
$txtaccntname = $_POST['txtaccntname'];
$txtuser = $_POST['txtuser'];
$txtcurrent = $_POST['txtcurrent'];
$txtnew = $_POST['txtnew'];
$txtconfirm = $_POST['txtconfirm'];

// Current Password

if(!empty($txtcurrent))
{
$sql = mysqli_query($cn, "select * from account_registration where username = '$txtuser' and pass = '$txtcurrent'");
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
&& !empty($txtacclvl) 
&& !empty($txtaccntname) 
&& !empty($txtuser)
&& !empty($txtcurrent) && $current != 0
&& !empty($txtnew) && strlen($txtnew) > 7 
&& !empty($txtconfirm) && strlen($txtconfirm) > 7 
&& $txtnew == $txtconfirm)
{	
$sql = mysqli_query($cn, "update account_registration set account_name = '$txtaccntname', pass = '$txtnew' where account_no = '$txtacctno'");

echo"<script>alert('Record Updated')</script>";
}

}

?>

<script>

// Login

document.getElementById('txtusername').value = localStorage['objectToPass'];

function login()
{
if(document.getElementById('txtusername').value == 'undefined' || document.getElementById('txtacctname').value == '')
{
window.location.href = 'gmc login.html';
}
}

// Logout

function logout()
{
localStorage.removeItem('objectToPass');
window.location.href = 'gmc login.html';
}

</script>
