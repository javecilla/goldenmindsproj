<html>
<head>
<title>User Accounts</title>
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
//User
if(isset($_POST['search']))
{
$cmbsearch = $_POST['cmbsearch'];
$sql = mysqli_query($cn, "select * from account_registration where account_no = '$cmbsearch' or access_level = '$cmbsearch' or account_name = '$cmbsearch' or username = '$cmbsearch'");
$search = mysqli_num_rows($sql);
while($row = mysqli_fetch_assoc($sql))
{
$user = $row['username'];
}
}
?>

<center>

<table border = 2 style = "background-color: 28110d; border: none; height: 100; width: 1000; position: relative; top: 0;">

<tr>
<th style = 'border-color: transparent; text-align: center;'>
<img src = 'logoM.png' style = 'height: 300; width: 950;'>
</th>
</tr>

<tr>

<th style = 'border-color: transparent; text-align: right;'>
<form action = 'gmc home.php' method = 'post'>
<input type = 'submit' value = 'HOME' style = 'border-color: white; border-radius: 5px; background-color: 28110d; color: white; font-size: 20; height: 50; width: 120; position: absolute; top: 255; left: 590;'>
<input type = 'hidden' name = 'txtusername' value = '<?php echo $username;?>'>
</form>
</th>

<th style = 'border-color: transparent; text-align: center;'>
<form action = 'gmc account.php' method = 'post'>
<input type = "submit" name = 'btnacct' id = 'btnacct' value = 'ACCOUNT' style = 'border-color: white; border-radius: 5px; background-color: 28110d; color: white; font-size: 20; height: 50; width: 120; position: absolute; top: 255; left: 720;'>
<input type = 'hidden' name = 'txtusername' value = '<?php echo $username;?>'>
</form>
</th>

<th style = 'border-color: transparent; text-align: left;'>
<form action = '' method = ''>
<input type = 'button' value = 'LOG OUT' style = 'border-color: white; border-radius: 5px; background-color: 28110d; color: white; font-size: 20; height: 50; width: 120; position: absolute; top: 255; left: 850;' onclick = 'logout()'>
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

<form action = 'gmc home.php' method = 'post'>

<input type = 'text' name = 'txtacctname' id = 'txtacctname' style = 'font-size: 30; font-weight: bold; background-color: transparent; border-color: transparent; width: 600; font-family: times new roman;' readonly>

<input type = 'text' name = 'txtaccesslevel' id = 'txtaccesslevel' style = 'font-size: 20; font-weight: bold; font-style: italic; background-color: transparent; border-color: transparent; width: 90; font-family: times new roman;' readonly>

<input type = 'text' name = 'txtpost' id = 'txtpost' style = 'font-size: 25; height: 40; width: 400; font-family: times new roman; border-radius: 10px; text-align: center;' placeholder = "What's on your Golden Minds?" required>

<input type = 'submit' name = 'btnpost' id = 'btnpost' style = 'font-size: 25; height: 40; width: 100; font-family: times new roman' value = "Post">

<input type = 'hidden' name = 'txtusername' value = '<?php echo $username;?>'>

</form>

</th>

<th style = 'border-color: transparent; width: 600;'>
</th>

</tr>
</table>

<table border = 2 style = "border-color: 28110d; width: 1000; border-left: 3px solid black; border-right: 3px solid black; border-bottom: 3px solid black; position: relative; top: 0;">

<tr>
<th style = 'border-color: transparent; text-align: left;'>

<br>

<form action = 'gmc user accounts.php' method = 'post'>

<input type = 'search' list = 'accounts' name = 'cmbsearch' id = 'cmbsearch' style = 'height: 40; width: 700; text-align: center; border-color: 28110d; border-radius: 5px; font-size: 25;' placeholder = 'Account No / Access Level / Account Name / Username'>

<input type = 'submit' name = "search" id = 'btnsearch' value = 'Search' style = 'height: 40; font-size: 25;'>

<input type = 'hidden' name = 'txtusername' value = '<?php echo $username;?>'>

</form>

</th>
</tr>

</table>

<table border = 2 style = "border-color: 28110d; width: 1000; border-left: 3px solid black; border-right: 3px solid black; border-bottom: 3px solid black; position: relative; top: 0;">
<tr style = 'height: 520;'>

<th style = 'border-color: transparent; font-size: 25;'>
	
Account Number:

<br>

<input type = 'text' name = 'txtacctno' id = 'txtacctno' style = 'height: 40; width: 900; background-color: transparent; border-color: 28110d; border-radius: 5px; text-align: center; font-size: 25;' readonly>

<br><br>

Access Level:

<br>

<input type = 'text' name = 'txtacclvl' id = 'txtacclvl' style = 'height: 40; width: 900; background-color: transparent; border-color: 28110d; border-radius: 5px; text-align: center; font-size: 25;' readonly>

<br><br>

Account Name:

<br>

<input type = 'text' name = 'txtaccntname' id = 'txtaccntname' style = 'height: 40; width: 900; background-color: transparent; border-color: 28110d; border-radius: 5px; text-align: center; font-size: 25;' readonly>

<br><br>

Username:

<br>

<input type = 'text' name = 'txtuser' id = 'txtuser' style = 'height: 40; width: 900; background-color: transparent; border-color: 28110d; border-radius: 5px; text-align: center; font-size: 25;' readonly>

<br><br>

Password:

<br>

<input type = 'text' name = 'txtpass' id = 'txtpass' style = 'height: 40; width: 900; background-color: transparent; border-color: 28110d; border-radius: 5px; text-align: center; font-size: 25;' readonly>

</th>

</tr>
</table>

<table border = 2 style = "border-color: 28110d; width: 1000; border-left: 3px solid black; border-right: 3px solid black; border-bottom: 3px solid black; position: relative; top: 0;">

<tr>
<th style = 'border-color: transparent; text-align: center;'>

<br>

<form action = 'gmc user accounts.php' method = 'post'>

<input type = 'text' name = 'txtstatus' id = 'txtstatus' style = 'font-size: 25; height: 40; width: 900; text-align: center; border-color: 28110d; border-radius: 5px;' readonly placeholder = 'Status'>

<br><br>

<input type = 'submit' name = 'activate' id = 'btnactivate' style = 'font-size: 25; height: 40; width: 448; text-align: center;' value = 'Activate' disabled = true>

<input type = 'submit' name = 'deactivate' id = 'btndeactivate' style = 'font-size: 25; height: 40; width: 448; text-align: center;' value = 'Deactivate' disabled = true>

<input type = 'hidden' name = 'txtuser' value = '<?php echo $user;?>'>
<input type = 'hidden' name = 'txtusername' value = '<?php echo $username;?>'>

</form>

</td>
</tr>

</table>
	
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
}

// Searchbox
	
$sql = mysqli_query($cn, "select * from account_registration order by account_name asc;");
$account_reg = mysqli_num_rows($sql);

echo"<datalist id = 'accounts'>";
while($row = mysqli_fetch_assoc($sql))
{
echo"<option value = '$row[account_no]'>";
echo"<option value = '$row[access_level]'>";
echo"<option value = '$row[account_name]'>";
echo"<option value = '$row[username]'>";
}
echo"</datalist>";

// Student Information

if(isset($_POST['search']))
{
	
$cmbsearch = $_POST['cmbsearch'];

$sql = mysqli_query($cn, "select * from account_registration where account_no = '$cmbsearch' or account_name = '$cmbsearch' or username = '$cmbsearch' order by account_name asc;");
$search = mysqli_num_rows($sql);

while($row = mysqli_fetch_assoc($sql))
{
echo"<script>document.getElementById('txtacctno').value = '$row[account_no]'</script>";
echo"<script>document.getElementById('txtacclvl').value = '$row[access_level]'</script>";
echo"<script>document.getElementById('txtaccntname').value = '$row[account_name]'</script>";
echo"<script>document.getElementById('txtuser').value = '$row[username]'</script>";
echo"<script>document.getElementById('txtpass').value = '$row[pass]'</script>";
echo"<script>document.getElementById('btnactivate').disabled = false</script>";
echo"<script>document.getElementById('btndeactivate').disabled = false</script>";
echo"<script>document.getElementById('txtstatus').value = '$row[status]'</script>";
}

}

// Data Table

echo"<center>";

echo"<table border = 2 cellspacing = 0 style = 'width: 1000; position: relative; top: 0;'>";

echo"<tr>
<th style = 'font-size: 30;'>Account No.</th>
<th style = 'font-size: 30;'>Access Level</th>
<th style = 'font-size: 30;'>Account Name</th>
<th style = 'font-size: 30;'>Username</th>
<th style = 'font-size: 30;'>Password</th>
<th style = 'font-size: 30;'>Status</th>
</tr>";

if(!empty($cmbsearch))
{
	
if(isset($_POST['search']))
{
	
$cmbsearch = $_POST['cmbsearch'];

$sql = mysqli_query($cn, "select * from account_registration where account_no = '$cmbsearch' or access_level like '%$cmbsearch%' or account_name like '%$cmbsearch%' or username like '%$cmbsearch%' order by status, account_name asc;");
$search = mysqli_num_rows($sql);

while($row = mysqli_fetch_assoc($sql))
{
echo"<tr>
<td style = 'font-size: 25; text-align: center; min-width: 100; max-width: 100; overflow: hidden;'>".$row['account_no']."</td>
<td style = 'font-size: 25; text-align: center; min-width: 150; max-width: 150; overflow: hidden;'>".$row['access_level']."</td>
<td style = 'font-size: 25; text-align: center; min-width: 200; max-width: 200; overflow: hidden;'>".$row['account_name']."</td>
<td style = 'font-size: 25; text-align: center; min-width: 150; max-width: 150; overflow: hidden;'>".$row['username']."</td>
<td style = 'font-size: 25; text-align: center; min-width: 150; max-width: 150; overflow: hidden;'>".$row['pass']."</td>
<td style = 'font-size: 25; text-align: center; min-width: 150; max-width: 150; overflow: hidden;'>".$row['status']."</td>
</tr>";
}

}

}

else
{
$sql = mysqli_query($cn, "select * from account_registration order by status, account_name asc;");
$search = mysqli_num_rows($sql);

while($row = mysqli_fetch_assoc($sql))
{
echo"<tr>
<td style = 'font-size: 25; text-align: center; min-width: 100; max-width: 100; overflow: hidden;'>".$row['account_no']."</td>
<td style = 'font-size: 25; text-align: center; min-width: 150; max-width: 150; overflow: hidden;'>".$row['access_level']."</td>
<td style = 'font-size: 25; text-align: center; min-width: 200; max-width: 200; overflow: hidden;'>".$row['account_name']."</td>
<td style = 'font-size: 25; text-align: center; min-width: 150; max-width: 150; overflow: hidden;'>".$row['username']."</td>
<td style = 'font-size: 25; text-align: center; min-width: 150; max-width: 150; overflow: hidden;'>".$row['pass']."</td>
<td style = 'font-size: 25; text-align: center; min-width: 150; max-width: 150; overflow: hidden;'>".$row['status']."</td>
</tr>";
}	

}

echo"</table>";
echo"</center>";

if(isset($_POST['activate']))
{
	
$txtuser = $_POST['txtuser'];

// Activate

if(!empty($txtuser))
{	
$sql = mysqli_query($cn, "update account_registration set status = 'Active' where username = '$txtuser'");

echo "<script>alert('Account Activated')</script>";
echo "<script>history.go(-1)</script>";
}

}

// Deactivate

if(isset($_POST['deactivate']))
{

$txtuser = $_POST['txtuser'];

if(!empty($txtuser))
{
$sql = mysqli_query($cn, "update account_registration set status = 'Deactivated' where username = '$txtuser'");
}

echo "<script>alert('Account Deactivated')</script>";
echo "<script>history.go(-1)</script>";
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
