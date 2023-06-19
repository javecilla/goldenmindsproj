<html>
<head>
<title>Student List</title>
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

<table border = 2 style = "border-color: 28110d; width: 1000; border-left: 3px solid black; border-right: 3px solid black; position: relative; top: 0;">

<tr>
<th style = 'border-color: transparent; text-align: center;'>

<br>

<form action = "gmc student list.php" method = "post">

<input type = 'search' list = 'search' name = 'cmbsearch' id = 'cmbsearch' style = 'height: 40; width: 360; text-align: center; border-color: 28110d; border-radius: 5px; font-size: 25;' placeholder = 'Username / LRN / Name' onchange = 'clrsy(), clryrsec()'>

<input list = 'sy' name = 'cmbsy' id = 'cmbsy' style = 'font-size: 25; height: 40; width: 210; text-align: center; border-color: 28110d; border-radius: 5px;' placeholder = 'School Year' onclick = 'clrsy()' onchange = 'clrsearch()'>

<input list = 'yrsec' name = 'cmbyrsec' id = 'cmbyrsec' style = 'font-size: 25; height: 40; width: 210; text-align: center; border-color: 28110d; border-radius: 5px;' placeholder = 'Year & Section' onclick = 'clryrsec()' onchange = 'clrsearch()'>

<input type = 'submit' name = "search" id = 'btnsearch' value = 'Search' style = 'height: 40; width: 110; font-size: 25;'>

<input type = 'hidden' name = 'txtusername' value = '<?php echo $username;?>'>

</form>

</th>
</tr>

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
//$studno = $row['student_no'];
$username = $row['username'];
$gma = $row['username'];
$gmc = $row['username'];
echo"<script>document.getElementById('txtacctname').value = '$row[account_name]'</script>";
echo"<script>document.getElementById('txtaccesslevel').value = '$row[access_level]'</script>";
}

// Searchbox
	
$sql = mysqli_query($cn, "select * from student_information order by learners_name asc;");
$student_info = mysqli_num_rows($sql);

echo"<datalist id = 'search'>";
while($row = mysqli_fetch_assoc($sql))
{
echo"<option value = '$row[username]'>";
echo"<option value = '$row[lrn]'>";
echo"<option value = '$row[learners_name]'>";
}
echo"</datalist>";

echo"<center>";

echo"<table border = 2 cellspacing = 0 style = 'width: 1000; border-color: black; position: relative; top: 0;'>";

echo"<tr>
<th style = 'font-size: 30; width: 200; max-width: 200;'>Username</th>
<th style = 'font-size: 30; width: 200; max-width: 200;'>LRN</th>
<th style = 'font-size: 30; width: 200; max-width: 200;'>Learners Name</th>
<th style = 'font-size: 25; width: 150; max-width: 150;'>Student Information</th>
<th style = 'font-size: 30; width: 150; max-width: 150; text-align: right; border-right: none;'>GRA</th>
<th style = 'font-size: 30; width: 150; max-width: 150; text-align: left; border-left: none;'>DES</th>	
</tr>";

if(isset($_POST['search']))
{

$cmbsearch = $_POST['cmbsearch'];
$cmbsy = $_POST['cmbsy'];
$cmbyrsec = $_POST['cmbyrsec'];

if(!empty($cmbsearch) && empty($cmbsy) && empty($cmbyrsec))
{

$sql = mysqli_query($cn, "select * from student_information where (username like '%$cmbsearch%' or lrn like '%$cmbsearch%' or learners_name like '%$cmbsearch%') order by learners_name asc;");
$search = mysqli_num_rows($sql);

while($row = mysqli_fetch_assoc($sql))
{
echo"<tr>

<td style = 'font-size: 25; text-align: center; min-width: 200; max-width: 200; overflow: hidden;'>".$row['username']."</td>
<td style = 'font-size: 25; text-align: center; min-width: 200; max-width: 200; overflow: hidden;'>".$row['lrn']."</td>
<td  style = 'font-size: 25; text-align: center; min-width: 200; max-width: 200; overflow: hidden;'>".$row['learners_name']."</td>

<td  style = 'font-size: 25; text-align: center; min-width: 150; max-width: 150;'>
<form action = 'gmc student information.php' method = 'post'>
<input type = 'submit' name = 'search' id = 'btnstudinfo' style = 'font-size: 25; font-family: times new roman' value = 'Stud. Info.'>
<input type = 'hidden' name = 'cmbsearch' value = '$row[student_no]'>
<input type = 'hidden' name = 'cmblrn' value = '$row[lrn]'>
<input type = 'hidden' name = 'txtusername' value = '$username'>
</form>
</td>

<td  style = 'font-size: 25; text-align: center; min-width: 75; max-width: 75;'>

<form action = 'gmc student grades.php' method = 'post'>
<input type = 'hidden' name = 'cmbsearch' value = '$row[username]'>
<input type = 'hidden' name = 'txtusername' value = '$username'>
<input type = 'hidden' name = 'txtstrand' value = '$row[strand]'>
<input type = 'hidden' name = 'cmbyear' value = '11'>
<input type = 'hidden' name = 'cmbsem' value = '1st'>
<input type = 'submit' name = 'search' id = 'btngmc' style = 'font-size: 15; font-family: times new roman;' value = 'G11-1st Sem'>
</form>

<form action = 'gmc student grades.php' method = 'post'>
<input type = 'hidden' name = 'cmbsearch' value = '$row[username]'>
<input type = 'hidden' name = 'txtusername' value = '$username'>
<input type = 'hidden' name = 'txtstrand' value = '$row[strand]'>
<input type = 'hidden' name = 'cmbyear' value = '11'>
<input type = 'hidden' name = 'cmbsem' value = '2nd'>
<input type = 'submit' name = 'search' id = 'btngmc' style = 'font-size: 15; font-family: times new roman;' value = 'G11-2nd Sem'>
</form>

</td>

<td  style = 'font-size: 25; text-align: center; min-width: 75; max-width: 75;'>

<form action = 'gmc student grades.php' method = 'post'>
<input type = 'hidden' name = 'cmbsearch' value = '$row[username]'>
<input type = 'hidden' name = 'txtusername' value = '$username'>
<input type = 'hidden' name = 'txtstrand' value = '$row[strand]'>
<input type = 'hidden' name = 'cmbyear' value = '12'>
<input type = 'hidden' name = 'cmbsem' value = '1st'>
<input type = 'submit' name = 'search' id = 'btngmc' style = 'font-size: 15; font-family: times new roman;' value = 'G12-1st Sem'>
</form>

<form action = 'gmc student grades.php' method = 'post'>
<input type = 'hidden' name = 'cmbsearch' value = '$row[username]'>
<input type = 'hidden' name = 'txtusername' value = '$username'>
<input type = 'hidden' name = 'txtstrand' value = '$row[strand]'>
<input type = 'hidden' name = 'cmbyear' value = '12'>
<input type = 'hidden' name = 'cmbsem' value = '2nd'>
<input type = 'submit' name = 'search' id = 'btngmc' style = 'font-size: 15; font-family: times new roman;' value = 'G12-2nd Sem'>

</td>

</tr>";
}

$sql = mysqli_query($cn, "select COUNT(username) from student_information where (username like '%$cmbsearch%' or lrn like '%$cmbsearch%' or learners_name like '%$cmbsearch%')");
$username = mysqli_num_rows($sql);
	
while($row = mysqli_fetch_assoc($sql))
{

$cnt = $row['COUNT(username)'];
if($cnt >=1)
{
echo"<td style = 'text-align: center;'>";
echo"<p style = 'font-size: 25; font-weight: bold;'>";
echo"Total Number of Students: $cnt";
echo"</p>";
echo"</td>";

echo"<td style = 'text-align: center; border-right: none;'>";
echo"</td>";
echo"<td style = 'text-align: center; border-left: none; border-right: none;'>";
echo"</td>";
echo"<td style = 'text-align: center; border-left: none; border-right: none;'>";
echo"</td>";
echo"<td style = 'text-align: center; border-left: none; border-right: none;'>";
echo"</td>";
echo"<td style = 'text-align: center; border-left: none;'>";
echo"</td>";

}
echo"</tr>";
}

}

else if(empty($cmbsearch) && !empty($cmbsy) && !empty($cmbyrsec))
{

$sql = mysqli_query($cn, "select * from student_information where school_year = '$cmbsy' and year_section = '$cmbyrsec' order by learners_name asc;");
$search = mysqli_num_rows($sql);

while($row = mysqli_fetch_assoc($sql))
{
echo"<tr>

<td style = 'font-size: 25; text-align: center; min-width: 200; max-width: 200; overflow: hidden;'>".$row['username']."</td>
<td style = 'font-size: 25; text-align: center; min-width: 200; max-width: 200; overflow: hidden;'>".$row['lrn']."</td>
<td  style = 'font-size: 25; text-align: center; min-width: 200; max-width: 200; overflow: hidden;'>".$row['learners_name']."</td>

<td  style = 'font-size: 25; text-align: center; min-width: 150; max-width: 150;'>
<form action = 'gmc student information.php' method = 'post'>
<input type = 'submit' name = 'search' id = 'btnstudinfo' style = 'font-size: 25; font-family: times new roman' value = 'Stud. Info.'>
<input type = 'hidden' name = 'cmbsearch' value = '$row[username]'>
<input type = 'hidden' name = 'txtusername' value = '$gma'>
</form>
</td>

<td  style = 'font-size: 25; text-align: center; min-width: 75; max-width: 75;'>
<form action = 'gmc student grades.php' method = 'post'>
<input type = 'submit' name = 'search' id = 'btngmc' style = 'font-size: 25; font-family: times new roman' value = 'GMC'>
<input type = 'hidden' name = 'cmbsearch' value = '$row[username]'>
<input type = 'hidden' name = 'txtusername' value = '$gma'>
</form>
</td>

<td  style = 'font-size: 25; text-align: center; min-width: 75; max-width: 75;'>
<form action = 'gma student grades.php' method = 'post'>
<input type = 'submit' name = 'search' id = 'btngma' style = 'font-size: 25; font-family: times new roman' value = 'GMA'>
<input type = 'hidden' name = 'cmbsearch' value = '$row[username]'>
<input type = 'hidden' name = 'txtusername' value = '$gma'>
</form>
</td>

</tr>";
echo"<script>document.getElementById('cmbsy').value = '$row[sy]'</script>";
echo"<script>document.getElementById('cmbyrsec').value = '$row[yr_sec]'</script>";
}

$sql = mysqli_query($cn, "select COUNT(username) from student_information where school_year = '$cmbsy' and year_section = '$cmbyrsec'");
$username = mysqli_num_rows($sql);
	
while($row = mysqli_fetch_assoc($sql))
{

$cnt = $row['COUNT(username)'];
if($cnt >=1)
{
echo"<td style = 'text-align: center;'>";
echo"<p style = 'font-size: 25; font-weight: bold;'>";
echo"Total Number of Students: $cnt";
echo"</p>";
echo"</td>";

echo"<td style = 'text-align: center; border-right: none;'>";
echo"</td>";
echo"<td style = 'text-align: center; border-left: none; border-right: none;'>";
echo"</td>";
echo"<td style = 'text-align: center; border-left: none; border-right: none;'>";
echo"</td>";
echo"<td style = 'text-align: center; border-left: none; border-right: none;'>";
echo"</td>";
echo"<td style = 'text-align: center; border-left: none;'>";
echo"</td>";

}
echo"</tr>";
}

$sql = mysqli_query($cn, "select * from enrolled_students where sy = '$cmbsy' and yr_sec = '$cmbyrsec' order by learners_name asc;");
$search = mysqli_num_rows($sql);

while($row = mysqli_fetch_assoc($sql))
{
echo"<tr>

<td style = 'font-size: 25; text-align: center; min-width: 200; max-width: 200; overflow: hidden;'>".$row['username']."</td>
<td style = 'font-size: 25; text-align: center; min-width: 200; max-width: 200; overflow: hidden;'>".$row['lrn']."</td>
<td  style = 'font-size: 25; text-align: center; min-width: 200; max-width: 200; overflow: hidden;'>".$row['learners_name']."</td>

<td  style = 'font-size: 25; text-align: center; min-width: 150; max-width: 150;'>
<form action = 'gmc student information.php' method = 'post'>
<input type = 'submit' name = 'search' id = 'btnstudinfo' style = 'font-size: 25; font-family: times new roman' value = 'Stud. Info.'>
<input type = 'hidden' name = 'cmbsearch' value = '$row[username]'>
<input type = 'hidden' name = 'txtusername' value = '$gmc'>
</form>
</td>

<td  style = 'font-size: 25; text-align: center; min-width: 75; max-width: 75;'>

<form action = 'gmc student grades.php' method = 'post'>
<input type = 'hidden' name = 'cmbsearch' value = '$row[username]'>
<input type = 'hidden' name = 'txtusername' value = '$gmc'>
<input type = 'hidden' name = 'txtstrand' value = '$row[strand]'>
<input type = 'hidden' name = 'cmbyear' value = '11'>
<input type = 'hidden' name = 'cmbsem' value = '1st'>
<input type = 'submit' name = 'search' id = 'btngmc' style = 'font-size: 15; font-family: times new roman;' value = 'G11-1st Sem'>
</form>

<form action = 'gmc student grades.php' method = 'post'>
<input type = 'hidden' name = 'cmbsearch' value = '$row[username]'>
<input type = 'hidden' name = 'txtusername' value = '$gmc'>
<input type = 'hidden' name = 'txtstrand' value = '$row[strand]'>
<input type = 'hidden' name = 'cmbyear' value = '11'>
<input type = 'hidden' name = 'cmbsem' value = '2nd'>
<input type = 'submit' name = 'search' id = 'btngmc' style = 'font-size: 15; font-family: times new roman;' value = 'G11-2nd Sem'>
</form>

</td>

<td  style = 'font-size: 25; text-align: center; min-width: 75; max-width: 75;'>

<form action = 'gmc student grades.php' method = 'post'>
<input type = 'hidden' name = 'cmbsearch' value = '$row[username]'>
<input type = 'hidden' name = 'txtusername' value = '$gmc'>
<input type = 'hidden' name = 'txtstrand' value = '$row[strand]'>
<input type = 'hidden' name = 'cmbyear' value = '12'>
<input type = 'hidden' name = 'cmbsem' value = '1st'>
<input type = 'submit' name = 'search' id = 'btngmc' style = 'font-size: 15; font-family: times new roman;' value = 'G12-1st Sem'>
</form>

<form action = 'gmc student grades.php' method = 'post'>
<input type = 'hidden' name = 'cmbsearch' value = '$row[username]'>
<input type = 'hidden' name = 'txtusername' value = '$gmc'>
<input type = 'hidden' name = 'txtstrand' value = '$row[strand]'>
<input type = 'hidden' name = 'cmbyear' value = '12'>
<input type = 'hidden' name = 'cmbsem' value = '2nd'>
<input type = 'submit' name = 'search' id = 'btngmc' style = 'font-size: 15; font-family: times new roman;' value = 'G12-2nd Sem'>
</form>

</td>

</tr>";
echo"<script>document.getElementById('cmbsy').value = '$row[sy]'</script>";
echo"<script>document.getElementById('cmbyrsec').value = '$row[yr_sec]'</script>";
}

$sql = mysqli_query($cn, "select COUNT(username) from enrolled_students where sy = '$cmbsy' and yr_sec = '$cmbyrsec'");
$username = mysqli_num_rows($sql);
	
while($row = mysqli_fetch_assoc($sql))
{

$cnt = $row['COUNT(username)'];
if($cnt >=1)
{
echo"<td style = 'text-align: center;'>";
echo"<p style = 'font-size: 25; font-weight: bold;'>";
echo"Total Number of Students: $cnt";
echo"</p>";
echo"</td>";

echo"<td style = 'text-align: center; border-right: none;'>";
echo"</td>";
echo"<td style = 'text-align: center; border-left: none; border-right: none;'>";
echo"</td>";
echo"<td style = 'text-align: center; border-left: none; border-right: none;'>";
echo"</td>";
echo"<td style = 'text-align: center; border-left: none; border-right: none;'>";
echo"</td>";
echo"<td style = 'text-align: center; border-left: none;'>";
echo"</td>";

}
echo"</tr>";
}

}

else
{
$sql = mysqli_query($cn, "select * from student_information order by learners_name asc limit 500;");
$search = mysqli_num_rows($sql);

while($row = mysqli_fetch_assoc($sql))
{
echo"<tr>

<td style = 'font-size: 25; text-align: center; min-width: 200; max-width: 200; overflow: hidden;'>".$row['username']."</td>
<td style = 'font-size: 25; text-align: center; min-width: 200; max-width: 200; overflow: hidden;'>".$row['lrn']."</td>
<td  style = 'font-size: 25; text-align: center; min-width: 200; max-width: 200; overflow: hidden;'>".$row['learners_name']."</td>

<td  style = 'font-size: 25; text-align: center; min-width: 150; max-width: 150;'>
<form action = 'gmc student information.php' method = 'post'>
<input type = 'submit' name = 'search' id = 'btnstudinfo' style = 'font-size: 25; font-family: times new roman' value = 'Stud. Info.'>
<input type = 'hidden' name = 'cmbsearch' value = '$row[student_no]'>
<input type = 'hidden' name = 'txtusername' value = '$username'>
</form>
</td>

<td  style = 'font-size: 25; text-align: center; min-width: 75; max-width: 75;'>

<form action = 'gmc student grades.php' method = 'post'>
<input type = 'hidden' name = 'cmbsearch' value = '$row[username]'>
<input type = 'hidden' name = 'txtusername' value = '$username'>
<input type = 'hidden' name = 'txtstrand' value = '$row[strand]'>
<input type = 'hidden' name = 'cmbyear' value = '11'>
<input type = 'hidden' name = 'cmbsem' value = '1st'>
<input type = 'submit' name = 'search' id = 'btngmc' style = 'font-size: 15; font-family: times new roman;' value = 'G11-1st Sem'>
</form>

<form action = 'gmc student grades.php' method = 'post'>
<input type = 'hidden' name = 'cmbsearch' value = '$row[username]'>
<input type = 'hidden' name = 'txtusername' value = '$username'>
<input type = 'hidden' name = 'txtstrand' value = '$row[strand]'>
<input type = 'hidden' name = 'cmbyear' value = '11'>
<input type = 'hidden' name = 'cmbsem' value = '2nd'>
<input type = 'submit' name = 'search' id = 'btngmc' style = 'font-size: 15; font-family: times new roman;' value = 'G11-2nd Sem'>
</form>

</td>

<td  style = 'font-size: 25; text-align: center; min-width: 75; max-width: 75;'>

<form action = 'gmc student grades.php' method = 'post'>
<input type = 'hidden' name = 'cmbsearch' value = '$row[username]'>
<input type = 'hidden' name = 'txtusername' value = '$username'>
<input type = 'hidden' name = 'txtstrand' value = '$row[strand]'>
<input type = 'hidden' name = 'cmbyear' value = '12'>
<input type = 'hidden' name = 'cmbsem' value = '1st'>
<input type = 'submit' name = 'search' id = 'btngmc' style = 'font-size: 15; font-family: times new roman;' value = 'G12-1st Sem'>
</form>

<form action = 'gmc student grades.php' method = 'post'>
<input type = 'hidden' name = 'cmbsearch' value = '$row[username]'>
<input type = 'hidden' name = 'txtusername' value = '$username'>
<input type = 'hidden' name = 'txtstrand' value = '$row[strand]'>
<input type = 'hidden' name = 'cmbyear' value = '12'>
<input type = 'hidden' name = 'cmbsem' value = '2nd'>
<input type = 'submit' name = 'search' id = 'btngmc' style = 'font-size: 15; font-family: times new roman;' value = 'G12-2nd Sem'>
</form>

</td>

</tr>";
}
}

}

else
{

$sql = mysqli_query($cn, "select * from student_information order by learners_name asc limit 500;");
$search = mysqli_num_rows($sql);

while($row = mysqli_fetch_assoc($sql))
{
echo"<tr>

<td style = 'font-size: 25; text-align: center; min-width: 200; max-width: 200; overflow: hidden;'>".$row['username']."</td>
<td style = 'font-size: 25; text-align: center; min-width: 200; max-width: 200; overflow: hidden;'>".$row['lrn']."</td>
<td  style = 'font-size: 25; text-align: center; min-width: 200; max-width: 200; overflow: hidden;'>".$row['learners_name']."</td>

<td  style = 'font-size: 25; text-align: center; min-width: 150; max-width: 150;'>
<form action = 'gmc student information.php' method = 'post'>
<input type = 'submit' name = 'search' id = 'btnstudinfo' style = 'font-size: 25; font-family: times new roman' value = 'Stud. Info.'>
<input type = 'hidden' name = 'cmbsearch' value = '$row[student_no]'>
<input type = 'hidden' name = 'txtusername' value = '$username'>
</form>
</td>

<td  style = 'font-size: 25; text-align: center; min-width: 75; max-width: 75;'>

<form action = 'gmc student grades.php' method = 'post'>
<input type = 'hidden' name = 'cmbsearch' value = '$row[username]'>
<input type = 'hidden' name = 'txtusername' value = '$username'>
<input type = 'hidden' name = 'txtstrand' value = '$row[strand]'>
<input type = 'hidden' name = 'cmbyear' value = '11'>
<input type = 'hidden' name = 'cmbsem' value = '1st'>
<input type = 'submit' name = 'search' id = 'btngmc' style = 'font-size: 15; font-family: times new roman;' value = 'G11-1st Sem'>
</form>

<form action = 'gmc student grades.php' method = 'post'>
<input type = 'hidden' name = 'cmbsearch' value = '$row[username]'>
<input type = 'hidden' name = 'txtusername' value = '$username'>
<input type = 'hidden' name = 'txtstrand' value = '$row[strand]'>
<input type = 'hidden' name = 'cmbyear' value = '11'>
<input type = 'hidden' name = 'cmbsem' value = '2nd'>
<input type = 'submit' name = 'search' id = 'btngmc' style = 'font-size: 15; font-family: times new roman;' value = 'G11-2nd Sem'>
</form>

</td>

<td  style = 'font-size: 25; text-align: center; min-width: 75; max-width: 75;'>

<form action = 'gmc student grades.php' method = 'post'>
<input type = 'hidden' name = 'cmbsearch' value = '$row[username]'>
<input type = 'hidden' name = 'txtusername' value = '$username'>
<input type = 'hidden' name = 'txtstrand' value = '$row[strand]'>
<input type = 'hidden' name = 'cmbyear' value = '12'>
<input type = 'hidden' name = 'cmbsem' value = '1st'>
<input type = 'submit' name = 'search' id = 'btngmc' style = 'font-size: 15; font-family: times new roman;' value = 'G12-1st Sem'>
</form>

<form action = 'gmc student grades.php' method = 'post'>
<input type = 'hidden' name = 'cmbsearch' value = '$row[username]'>
<input type = 'hidden' name = 'txtusername' value = '$username'>
<input type = 'hidden' name = 'txtstrand' value = '$row[strand]'>
<input type = 'hidden' name = 'cmbyear' value = '12'>
<input type = 'hidden' name = 'cmbsem' value = '2nd'>
<input type = 'submit' name = 'search' id = 'btngmc' style = 'font-size: 15; font-family: times new roman;' value = 'G12-2nd Sem'>
</form>

</td>

</tr>";
}

}

echo"</table>";
echo"</center>";

// School Year

$sql = mysqli_query($cn, "select * from school_year order by sy desc;");
$sy = mysqli_num_rows($sql);

echo"<datalist id = 'sy'>";
while($row = mysqli_fetch_assoc($sql))
{
echo"<option value = '$row[sy]'>";
}
echo"</datalist>";

// Year and Section GMA

$sql = mysqli_query($cn, "select * from subjects_gma order by subj_no asc;");
$yr_sec = mysqli_num_rows($sql);

echo"<datalist id = 'yrsec'>";
while($row = mysqli_fetch_assoc($sql))
{
echo"<option value = '$row[yr_sec]'>";
}

// Year and Section GMC

$sql = mysqli_query($cn, "select * from yr_sec order by yr_sec asc;");
$yr_sec = mysqli_num_rows($sql);

while($row = mysqli_fetch_assoc($sql))
{
echo"<option value = '$row[yr_sec]'>";
}
echo"</datalist>";

if(isset($_POST['update']))
{

$txtuser = $_POST['txtuser'];
$dtreg = $_POST['dtreg'];
$txtlrn = $_POST['txtlrn'];
$txtlastname = $_POST['txtlastname'];
$txtextensionname = $_POST['txtextensionname'];
$txtfirstname = $_POST['txtfirstname'];
$txtmiddlename = $_POST['txtmiddlename'];
$txtgender = $_POST['txtgender'];
$dtbday = $_POST['dtbday'];
$txtage = $_POST['txtage'];
$txtbirthplace = $_POST['txtbirthplace'];
$txtreligion = $_POST['txtreligion'];
$txthouseno = $_POST['txthouseno'];
$txtbrgy = $_POST['txtbrgy'];
$txtcity = $_POST['txtcity'];
$txtprovince = $_POST['txtprovince'];
$txtfather = $_POST['txtfather'];
$txtmother = $_POST['txtmother'];
$txtguardian = $_POST['txtguardian'];
$txtrelationship = $_POST['txtrelationship'];
$txtcontactno = $_POST['txtcontactno'];
$txtoccupation = $_POST['txtoccupation'];
$txtguardianaddress = $_POST['txtguardianaddress'];
$dtcompletion = $_POST['dtcompletion'];
$cmbcompleterAs = $_POST['cmbcompleterAs'];
$txtschoolname = $_POST['txtschoolname'];
$txtschooladdress = $_POST['txtschooladdress'];
$txtgenave = $_POST['txtgenave'];
$txtschool = $_POST['txtschool'];
$txtschoolid = $_POST['txtschoolid'];

// Save or Update

$sql = mysqli_query($cn, "update student_information set reg_date = '$dtreg', lrn = '$txtlrn', learners_name = '$txtlastname$txtextensionname, $txtfirstname $txtmiddlename', last_name = '$txtlastname', extension_name = '$txtextensionname', first_name = '$txtfirstname', middle_name = '$txtmiddlename', gender = '$txtgender', birthday = '$dtbday', age = $txtage, birthplace = '$txtbirthplace', religion = '$txtreligion', house_no = '$txthouseno', brgy = '$txtbrgy', city = '$txtcity', province = '$txtprovince', fathers_name = '$txtfather', mothers_name = '$txtmother', guardian_name = '$txtguardian', relationship = '$txtrelationship', contact_no = '$txtcontactno', occupation = '$txtoccupation', guardian_address = '$txtguardianaddress', completion_date = '$dtcompletion', completer_as = '$cmbcompleterAs', school_name = '$txtschoolname', school_address = '$txtschooladdress', gen_ave = '$txtgenave', school = '$txtschool', school_id = '$txtschoolid' where username = '$txtuser'");

$sql = mysqli_query($cn, "update enrolled_students set lrn = '$txtlrn', learners_name = '$txtlastname$txtextensionname, $txtfirstname $txtmiddlename' where username = '$txtuser'");

$sql = mysqli_query($cn, "update grades set lrn = '$txtlrn', learners_name = '$txtlastname$txtextensionname, $txtfirstname $txtmiddlename' where username = '$txtuser'");

echo "<script>alert('Record Updated')</script>";
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

// Search

function clrsearch()
{
document.getElementById('cmbsearch').value = '';
}

// School Year

function clrsy()
{
document.getElementById('cmbsy').value = '';
}

// Semester

function clryrsec()
{
document.getElementById('cmbyrsec').value = '';
}

function male()
{
document.getElementById('rbfemale').checked = false;
document.getElementById("txtgender").value = "M";
}

function female()
{
document.getElementById('rbmale').checked = false;
document.getElementById("txtgender").value = "F";
}

// Completer As

function clrcompleterAs()
{
document.getElementById('cmbcompleterAs').value = '';
}

function age()
{
var start_date = new Date(document.getElementById('dtbday').value);
var end_date = new Date(document.getElementById('dtreg').value);
var time_difference = end_date.getTime() - start_date.getTime();
var days_difference = time_difference / (1000*3600*24);
var age = Math.round(days_difference/365.25);
document.getElementById('txtage').value = age;
}

function clryear()
{
document.getElementById('cmbyear').value = '';
}

function clrsem()
{
document.getElementById('cmbsem').value = '';
}

</script>