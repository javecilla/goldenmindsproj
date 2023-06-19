<html>
<head>
<title>Registered Students</title>
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

<form action = 'gmc registration.php' method = 'post'>

<input type = 'search' list = 'accounts' name = 'cmbsearch' id = 'cmbsearch' style = 'height: 40; width: 545; text-align: center; border-color: 28110d; border-radius: 5px; font-size: 25;' placeholder = "LRN / Learner's Name">

<input type = 'submit' name = "search" id = 'btnsearch' value = 'Search' style = 'height: 40; font-size: 25;'>

<input type = 'hidden' name = 'txtusername' value = '<?php echo $username;?>'>

</form>

</th>
</tr>

</table>

<form action = 'gmc registration.php' method = 'post'>

<table border = 2 style = "border-color: 28110d; width: 1000; border-left: 3px solid black; border-right: 3px solid black; border-bottom: 3px solid black; position: relative; top: 0;">
<tr style = 'height: 450;'>

<th style = 'border-color: transparent; font-size: 25;'>

<input type = 'text' name = 'txtstudno' id = 'txtstudno' style = 'height: 40; width: 900; background-color: transparent; border-color: 28110d; border-radius: 5px; text-align: center; font-size: 25;' placeholder = 'Student Number' readonly>

<br><br>

<input type = 'text' name = 'txtaccntname' id = 'txtaccntname' style = 'height: 40; width: 900; background-color: transparent; border-color: 28110d; border-radius: 5px; text-align: center; font-size: 25;' placeholder = 'Account Name' disabled required>

<br><br>

<input type = 'text' name = 'txtuser' id = 'txtuser' style = 'height: 40; width: 900; background-color: transparent; border-color: 28110d; border-radius: 5px; text-align: center; font-size: 25;' placeholder = 'Username' disabled required>

<br><br>

<input type = 'password' name = 'txtpass' id = 'txtpass' style = 'height: 40; width: 900; background-color: transparent; border-color: 28110d; border-radius: 5px; text-align: center; font-size: 25;' placeholder = 'Password' disabled required>

<br><br>

<input type = 'password' name = 'txtconfirm' id = 'txtconfirm' style = 'height: 40; width: 900; background-color: transparent; border-color: 28110d; border-radius: 5px; text-align: center; font-size: 25;' placeholder = 'Confirm Password' disabled required>

<br><br>

<input type = "submit" name = "register" id = "btnregister" style = "font-size: 30; height: 50; width: 900; text-align: center; background-color: EFC372; border-color: EFC372; border-radius: 20px; color: white;" value = "Register" disabled>

<input type = 'hidden' name = 'txtusername' value = '<?php echo $username;?>'>

</th>

</tr>
</table>

</form>

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
$username = $row['username'];
echo"<script>document.getElementById('txtacctname').value = '$row[account_name]'</script>";
echo"<script>document.getElementById('txtaccesslevel').value = '$row[access_level]'</script>";
}

if(isset($_POST['register']))
{

$txtstudno = $_POST['txtstudno'];
$txtaccesslevel = $_POST['txtaccesslevel'];
$txtaccntname = $_POST['txtaccntname'];
$txtuser = $_POST['txtuser'];
$txtpass = $_POST['txtpass'];
$txtconfirm = $_POST['txtconfirm'];

// Existing Username

if(!empty($txtuser))
{
$sql = mysqli_query($cn, "select * from account_registration where username = '$txtuser'");
$user = mysqli_num_rows($sql);
if($user == 1)
{
echo "<script>alert('Existing Username')</script>";
echo "<script>history.go(-1)</script>";
}
}

// Short Password
if(!empty($txtpass) && !empty($txtconfirm))
{
if(strlen($txtpass) < 8 && strlen($txtconfirm) < 8)
{
echo "<script>alert('Short Password')</script>";
echo "<script>history.go(-1)</script>";
}
}

// Password Mismatch

if(!empty($txtpass) && !empty($txtconfirm))
{
if($txtpass != $txtconfirm)
{
echo "<script>alert('Password Mismatch')</script>";
echo "<script>history.go(-1)</script>";
}
}

// Register

if(!empty($txtstudno) 
&& !empty($txtaccntname) 
&& !empty($txtuser) && $user != 1 
&& !empty($txtpass) && strlen($txtpass) > 7 
&& !empty($txtconfirm) && strlen($txtconfirm) > 7 
&& $txtpass == $txtconfirm)
{
$sql = mysqli_query($cn, "insert into account_registration (access_level, account_name, username, pass, status) values ('Student', '$txtaccntname', '$txtuser', '$txtpass', 'Active')");

$sql = mysqli_query($cn, "update student_information set username = '$txtuser' where student_no = '$txtstudno'");

echo "<script>alert('Registration Successful')</script>";
}

}

if(isset($_POST['btndelete']))
{
$txtstudno = $_POST['txtstudno'];

if(!empty($txtstudno))
{
$sql = mysqli_query($cn, "delete from student_information where student_no = '$txtstudno'");
echo "<script>alert('Record Deleted')</script>";
}
}

// Searchbox
	
$sql = mysqli_query($cn, "select * from student_information where username = '' order by learners_name asc;");
$account_reg = mysqli_num_rows($sql);

echo"<datalist id = 'accounts'>";
while($row = mysqli_fetch_assoc($sql))
{
echo"<option value = '$row[lrn]'>";
echo"<option value = '$row[learners_name]'>";
}
echo"</datalist>";

if(isset($_POST['search']))
{
$cmbsearch = $_POST['cmbsearch'];

$sql = mysqli_query($cn, "select * from student_information where username = '' and (lrn = '$cmbsearch' or learners_name = '$cmbsearch') order by learners_name asc;");
$search = mysqli_num_rows($sql);

while($row = mysqli_fetch_assoc($sql))
{
echo"<script>document.getElementById('txtstudno').value = '$row[student_no]'</script>";	
echo"<script>document.getElementById('txtaccntname').disabled = false</script>";
echo"<script>document.getElementById('txtuser').disabled = false</script>";
echo"<script>document.getElementById('txtpass').disabled = false</script>";
echo"<script>document.getElementById('txtconfirm').disabled = false</script>";
echo"<script>document.getElementById('btnregister').disabled = false</script>";
}
}

// Data Table

echo"<table border = 2 cellspacing = 0 style = 'width: 1000; position: relative; top: 0;'>";

if(!empty($cmbsearch))
{
	
if(isset($_POST['search']))
{
	
$cmbsearch = $_POST['cmbsearch'];

$sql = mysqli_query($cn, "select * from student_information where username = '' and (lrn like '%$cmbsearch%' or learners_name like '%$cmbsearch%') order by learners_name asc;");
$search = mysqli_num_rows($sql);

while($row = mysqli_fetch_assoc($sql))
{
echo"<tr>
<th style = 'font-size: 20; min-width: 50; max-width: 50; background-color: blue; color: yellow;'>Reg. Date</th>
<th style = 'font-size: 20; min-width: 50; max-width: 50; background-color: blue; color: yellow;'>S.Y.</th>
<th style = 'font-size: 20; min-width: 50; max-width: 50; background-color: blue; color: yellow;'>Semester</th>
<th style = 'font-size: 20; min-width: 50; max-width: 50; background-color: blue; color: yellow;'>Branch</th>
<th style = 'font-size: 20; min-width: 50; max-width: 50; background-color: blue; color: yellow;'>Strand</th>
<th style = 'font-size: 20; min-width: 50; max-width: 50; background-color: blue; color: yellow;'>LRN</th>
<th style = 'font-size: 20; min-width: 50; max-width: 50; background-color: blue; color: yellow;'>Learners Name</th>
<th style = 'font-size: 20; min-width: 50; max-width: 50; background-color: blue; color: yellow;'>Gender</th>
<th style = 'font-size: 20; min-width: 50; max-width: 50; background-color: blue; color: yellow;'>Birthday</th>
<th style = 'font-size: 20; min-width: 50; max-width: 50; background-color: blue; color: yellow;'>Birthplace</th>
</tr>

<tr>
<td style = 'font-size: 20; text-align: center; min-width: 50; max-width: 50; overflow: hidden;'>".$row['reg_date']."</td>
<td style = 'font-size: 20; text-align: center; min-width: 50; max-width: 50; overflow: hidden;'>".$row['sy']."</td>
<td style = 'font-size: 20; text-align: center; min-width: 50; max-width: 50; overflow: hidden;'>".$row['semester']."</td>
<td style = 'font-size: 20; text-align: center; min-width: 50; max-width: 50; overflow: hidden;'>".$row['school']."</td>
<td style = 'font-size: 20; text-align: center; min-width: 50; max-width: 50; overflow: hidden;'>".$row['strand']."</td>
<td style = 'font-size: 20; text-align: center; min-width: 50; max-width: 50; overflow: hidden;'>".$row['lrn']."</td>
<td style = 'font-size: 20; text-align: center; min-width: 50; max-width: 50; overflow: hidden;'>".$row['learners_name']."</td>
<td style = 'font-size: 20; text-align: center; min-width: 50; max-width: 50; overflow: hidden;'>".$row['gender']."</td>
<td style = 'font-size: 20; text-align: center; min-width: 50; max-width: 50; overflow: hidden;'>".$row['birthday']."</td>
<td style = 'font-size: 20; text-align: center; min-width: 50; max-width: 50; overflow: hidden;'>".$row['birthplace']."</td>
</tr>";

echo"<tr>
<th style = 'font-size: 20; min-width: 50; max-width: 50; background-color: blue; color: yellow;'>Nationality</th>
<th style = 'font-size: 20; min-width: 50; max-width: 50; background-color: blue; color: yellow;'>Religion</th>
<th style = 'font-size: 20; min-width: 50; max-width: 50; background-color: blue; color: yellow;'>Completion Date</th>
<th style = 'font-size: 20; min-width: 50; max-width: 50; background-color: blue; color: yellow;'>Completer As</th>
<th style = 'font-size: 20; min-width: 50; max-width: 50; background-color: blue; color: yellow;'>Last School Attended</th>
<th style = 'font-size: 20; min-width: 50; max-width: 50; background-color: blue; color: yellow;'>Last School Address</th>
<th style = 'font-size: 20; min-width: 50; max-width: 50; background-color: blue; color: yellow;'>House No.</th>
<th style = 'font-size: 20; min-width: 50; max-width: 50; background-color: blue; color: yellow;'>Brgy.</th>
<th style = 'font-size: 20; min-width: 50; max-width: 50; background-color: blue; color: yellow;'>City</th>
<th style = 'font-size: 20; min-width: 50; max-width: 50; background-color: blue; color: yellow;'>Province</th>
</tr>

<tr>
<td style = 'font-size: 20; text-align: center; min-width: 50; max-width: 50; overflow: hidden;'>".$row['nationality']."</td>
<td style = 'font-size: 20; text-align: center; min-width: 50; max-width: 50; overflow: hidden;'>".$row['religion']."</td>
<td style = 'font-size: 20; text-align: center; min-width: 50; max-width: 50; overflow: hidden;'>".$row['completion_date']."</td>
<td style = 'font-size: 20; text-align: center; min-width: 50; max-width: 50; overflow: hidden;'>".$row['completer_as']."</td>
<td style = 'font-size: 20; text-align: center; min-width: 50; max-width: 50; overflow: hidden;'>".$row['school_name']."</td>
<td style = 'font-size: 20; text-align: center; min-width: 50; max-width: 50; overflow: hidden;'>".$row['school_address']."</td>
<td style = 'font-size: 20; text-align: center; min-width: 50; max-width: 50; overflow: hidden;'>".$row['house_no']."</td>
<td style = 'font-size: 20; text-align: center; min-width: 50; max-width: 50; overflow: hidden;'>".$row['brgy']."</td>
<td style = 'font-size: 20; text-align: center; min-width: 50; max-width: 50; overflow: hidden;'>".$row['city']."</td>
<td style = 'font-size: 20; text-align: center; min-width: 50; max-width: 50; overflow: hidden;'>".$row['province']."</td>
</tr>";

echo"<tr>
<th style = 'font-size: 20; min-width: 50; max-width: 50; background-color: blue; color: yellow;'>Contact No.</th>
<th style = 'font-size: 20; min-width: 50; max-width: 50; background-color: blue; color: yellow;'>Father's Name</th>
<th style = 'font-size: 20; min-width: 50; max-width: 50; background-color: blue; color: yellow;'>Occupation</th>
<th style = 'font-size: 20; min-width: 50; max-width: 50; background-color: blue; color: yellow;'>Mother's Name</th>
<th style = 'font-size: 20; min-width: 50; max-width: 50; background-color: blue; color: yellow;'>Occupation</th>
<th style = 'font-size: 20; min-width: 50; max-width: 50; background-color: blue; color: yellow;'>Guardian Name</th>
<th style = 'font-size: 20; min-width: 50; max-width: 50; background-color: blue; color: yellow;'>Relationship</th>
<th style = 'font-size: 20; min-width: 50; max-width: 50; background-color: blue; color: yellow;'>Guardian Contact No.</th>
<th style = 'font-size: 20; min-width: 50; max-width: 50; background-color: blue; color: yellow;'>Occupation</th>
<th style = 'font-size: 20; min-width: 50; max-width: 50; background-color: blue; color: yellow;'>Guardian Address</th>
</tr>

<tr>
<td style = 'font-size: 20; text-align: center; min-width: 50; max-width: 50; overflow: hidden;'>".$row['contact_no']."</td>
<td style = 'font-size: 20; text-align: center; min-width: 50; max-width: 50; overflow: hidden;'>".$row['fathers_name']."</td>
<td style = 'font-size: 20; text-align: center; min-width: 50; max-width: 50; overflow: hidden;'>".$row['foccupation']."</td>
<td style = 'font-size: 20; text-align: center; min-width: 50; max-width: 50; overflow: hidden;'>".$row['mothers_name']."</td>
<td style = 'font-size: 20; text-align: center; min-width: 50; max-width: 50; overflow: hidden;'>".$row['moccupation']."</td>
<td style = 'font-size: 20; text-align: center; min-width: 50; max-width: 50; overflow: hidden;'>".$row['guardian_name']."</td>
<td style = 'font-size: 20; text-align: center; min-width: 50; max-width: 50; overflow: hidden;'>".$row['relationship']."</td>
<td style = 'font-size: 20; text-align: center; min-width: 50; max-width: 50; overflow: hidden;'>".$row['gcontact_no']."</td>
<td style = 'font-size: 20; text-align: center; min-width: 50; max-width: 50; overflow: hidden;'>".$row['goccupation']."</td>
<td style = 'font-size: 20; text-align: center; min-width: 50; max-width: 50; overflow: hidden;'>".$row['guardian_address']."</td>
</tr>";

echo"<tr>
<td style = 'text-align: center; min-width: 50; max-width: 50; border: none;'>
<form action = 'gmc registration.php' method = 'post'>
<br>
<input type = 'hidden' name = 'txtstudno' value = '$row[student_no]'>
<input type = 'submit' name =  'btndelete' value = 'Delete' style = 'font-size: 20;'>
<input type = 'hidden' name = 'txtusername' value = '$username'>
</form>
</td>
</tr>";

}

}

}

else
{

$sql = mysqli_query($cn, "select * from student_information where username = '' order by learners_name asc;");
$search = mysqli_num_rows($sql);

while($row = mysqli_fetch_assoc($sql))
{
echo"<tr>
<th style = 'font-size: 20; min-width: 50; max-width: 50; background-color: blue; color: yellow;'>Reg. Date</th>
<th style = 'font-size: 20; min-width: 50; max-width: 50; background-color: blue; color: yellow;'>S.Y.</th>
<th style = 'font-size: 20; min-width: 50; max-width: 50; background-color: blue; color: yellow;'>Semester</th>
<th style = 'font-size: 20; min-width: 50; max-width: 50; background-color: blue; color: yellow;'>Branch</th>
<th style = 'font-size: 20; min-width: 50; max-width: 50; background-color: blue; color: yellow;'>Strand</th>
<th style = 'font-size: 20; min-width: 50; max-width: 50; background-color: blue; color: yellow;'>LRN</th>
<th style = 'font-size: 20; min-width: 50; max-width: 50; background-color: blue; color: yellow;'>Learners Name</th>
<th style = 'font-size: 20; min-width: 50; max-width: 50; background-color: blue; color: yellow;'>Gender</th>
<th style = 'font-size: 20; min-width: 50; max-width: 50; background-color: blue; color: yellow;'>Birthday</th>
<th style = 'font-size: 20; min-width: 50; max-width: 50; background-color: blue; color: yellow;'>Birthplace</th>
</tr>

<tr>
<td style = 'font-size: 20; text-align: center; min-width: 50; max-width: 50; overflow: hidden;'>".$row['reg_date']."</td>
<td style = 'font-size: 20; text-align: center; min-width: 50; max-width: 50; overflow: hidden;'>".$row['sy']."</td>
<td style = 'font-size: 20; text-align: center; min-width: 50; max-width: 50; overflow: hidden;'>".$row['semester']."</td>
<td style = 'font-size: 20; text-align: center; min-width: 50; max-width: 50; overflow: hidden;'>".$row['school']."</td>
<td style = 'font-size: 20; text-align: center; min-width: 50; max-width: 50; overflow: hidden;'>".$row['strand']."</td>
<td style = 'font-size: 20; text-align: center; min-width: 50; max-width: 50; overflow: hidden;'>".$row['lrn']."</td>
<td style = 'font-size: 20; text-align: center; min-width: 50; max-width: 50; overflow: hidden;'>".$row['learners_name']."</td>
<td style = 'font-size: 20; text-align: center; min-width: 50; max-width: 50; overflow: hidden;'>".$row['gender']."</td>
<td style = 'font-size: 20; text-align: center; min-width: 50; max-width: 50; overflow: hidden;'>".$row['birthday']."</td>
<td style = 'font-size: 20; text-align: center; min-width: 50; max-width: 50; overflow: hidden;'>".$row['birthplace']."</td>
</tr>";

echo"<tr>
<th style = 'font-size: 20; min-width: 50; max-width: 50; background-color: blue; color: yellow;'>Nationality</th>
<th style = 'font-size: 20; min-width: 50; max-width: 50; background-color: blue; color: yellow;'>Religion</th>
<th style = 'font-size: 20; min-width: 50; max-width: 50; background-color: blue; color: yellow;'>Completion Date</th>
<th style = 'font-size: 20; min-width: 50; max-width: 50; background-color: blue; color: yellow;'>Completer As</th>
<th style = 'font-size: 20; min-width: 50; max-width: 50; background-color: blue; color: yellow;'>Last School Attended</th>
<th style = 'font-size: 20; min-width: 50; max-width: 50; background-color: blue; color: yellow;'>Last School Address</th>
<th style = 'font-size: 20; min-width: 50; max-width: 50; background-color: blue; color: yellow;'>House No.</th>
<th style = 'font-size: 20; min-width: 50; max-width: 50; background-color: blue; color: yellow;'>Brgy.</th>
<th style = 'font-size: 20; min-width: 50; max-width: 50; background-color: blue; color: yellow;'>City</th>
<th style = 'font-size: 20; min-width: 50; max-width: 50; background-color: blue; color: yellow;'>Province</th>
</tr>

<tr>
<td style = 'font-size: 20; text-align: center; min-width: 50; max-width: 50; overflow: hidden;'>".$row['nationality']."</td>
<td style = 'font-size: 20; text-align: center; min-width: 50; max-width: 50; overflow: hidden;'>".$row['religion']."</td>
<td style = 'font-size: 20; text-align: center; min-width: 50; max-width: 50; overflow: hidden;'>".$row['completion_date']."</td>
<td style = 'font-size: 20; text-align: center; min-width: 50; max-width: 50; overflow: hidden;'>".$row['completer_as']."</td>
<td style = 'font-size: 20; text-align: center; min-width: 50; max-width: 50; overflow: hidden;'>".$row['school_name']."</td>
<td style = 'font-size: 20; text-align: center; min-width: 50; max-width: 50; overflow: hidden;'>".$row['school_address']."</td>
<td style = 'font-size: 20; text-align: center; min-width: 50; max-width: 50; overflow: hidden;'>".$row['house_no']."</td>
<td style = 'font-size: 20; text-align: center; min-width: 50; max-width: 50; overflow: hidden;'>".$row['brgy']."</td>
<td style = 'font-size: 20; text-align: center; min-width: 50; max-width: 50; overflow: hidden;'>".$row['city']."</td>
<td style = 'font-size: 20; text-align: center; min-width: 50; max-width: 50; overflow: hidden;'>".$row['province']."</td>
</tr>";

echo"<tr>
<th style = 'font-size: 20; min-width: 50; max-width: 50; background-color: blue; color: yellow;'>Contact No.</th>
<th style = 'font-size: 20; min-width: 50; max-width: 50; background-color: blue; color: yellow;'>Father's Name</th>
<th style = 'font-size: 20; min-width: 50; max-width: 50; background-color: blue; color: yellow;'>Occupation</th>
<th style = 'font-size: 20; min-width: 50; max-width: 50; background-color: blue; color: yellow;'>Mother's Name</th>
<th style = 'font-size: 20; min-width: 50; max-width: 50; background-color: blue; color: yellow;'>Occupation</th>
<th style = 'font-size: 20; min-width: 50; max-width: 50; background-color: blue; color: yellow;'>Guardian Name</th>
<th style = 'font-size: 20; min-width: 50; max-width: 50; background-color: blue; color: yellow;'>Relationship</th>
<th style = 'font-size: 20; min-width: 50; max-width: 50; background-color: blue; color: yellow;'>Guardian Contact No.</th>
<th style = 'font-size: 20; min-width: 50; max-width: 50; background-color: blue; color: yellow;'>Occupation</th>
<th style = 'font-size: 20; min-width: 50; max-width: 50; background-color: blue; color: yellow;'>Guardian Address</th>
</tr>

<tr>
<td style = 'font-size: 20; text-align: center; min-width: 50; max-width: 50; overflow: hidden;'>".$row['contact_no']."</td>
<td style = 'font-size: 20; text-align: center; min-width: 50; max-width: 50; overflow: hidden;'>".$row['fathers_name']."</td>
<td style = 'font-size: 20; text-align: center; min-width: 50; max-width: 50; overflow: hidden;'>".$row['foccupation']."</td>
<td style = 'font-size: 20; text-align: center; min-width: 50; max-width: 50; overflow: hidden;'>".$row['mothers_name']."</td>
<td style = 'font-size: 20; text-align: center; min-width: 50; max-width: 50; overflow: hidden;'>".$row['moccupation']."</td>
<td style = 'font-size: 20; text-align: center; min-width: 50; max-width: 50; overflow: hidden;'>".$row['guardian_name']."</td>
<td style = 'font-size: 20; text-align: center; min-width: 50; max-width: 50; overflow: hidden;'>".$row['relationship']."</td>
<td style = 'font-size: 20; text-align: center; min-width: 50; max-width: 50; overflow: hidden;'>".$row['gcontact_no']."</td>
<td style = 'font-size: 20; text-align: center; min-width: 50; max-width: 50; overflow: hidden;'>".$row['goccupation']."</td>
<td style = 'font-size: 20; text-align: center; min-width: 50; max-width: 50; overflow: hidden;'>".$row['guardian_address']."</td>
</tr>";

echo"<tr>
<td style = 'text-align: center; min-width: 50; max-width: 50; border: none;'>
<form action = 'gmc registration.php' method = 'post'>
<br>
<input type = 'hidden' name = 'txtstudno' value = '$row[student_no]'>
<input type = 'submit' name =  'btndelete' value = 'Delete' style = 'font-size: 20;'>
<input type = 'hidden' name = 'txtusername' value = '$username'>
</form>
</td>
</tr>";

}

}

echo"</table>";

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