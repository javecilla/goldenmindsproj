<html>
<head>
<title>Summary of Grades</title>
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

<table border = 2 style = "border-color: 28110d; width: 1000; border-left: 3px solid black; border-right: 3px solid black; position: relative; top: 0;">

<tr>
<th style = 'border-color: transparent; text-align: center;'>

<br>

<form action = 'gmc sog.php' method = 'post'>

<input type = 'search' list = 'sy' name = 'cmbsy' id = 'cmbsy' style = 'height: 40; width: 210; text-align: center; border-color: 28110d; border-radius: 5px; font-size: 25;' placeholder = 'School Year'>

<input type = 'search' list = 'semester' name = 'cmbsemester' id = 'cmbsemester' style = 'height: 40; width: 210; text-align: center; border-color: 28110d; border-radius: 5px; font-size: 25;' placeholder = 'Semester'>

<input type = 'search' list = 'yrsec' name = 'cmbyrsec' id = 'cmbyrsec' style = 'height: 40; width: 210; text-align: center; border-color: 28110d; border-radius: 5px; font-size: 22;' placeholder = 'Year & Section'>

<input type = 'search' list = 'award' name = 'cmbaward' id = 'cmbaward' style = 'height: 40; width: 210; text-align: center; border-color: 28110d; border-radius: 5px; font-size: 25;' placeholder = 'Award'>

<input type = 'submit' name = "okay" id = 'btnok' value = 'Okay' style = 'height: 40; width: 100; font-weight: bold; font-size: 25;'>

<input type = 'hidden' name = 'txtusername' value = '<?php echo $username;?>'>

</form>

</th>
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

// School Year

$sql = mysqli_query($cn, "select * from school_year order by sy desc;");
$sy = mysqli_num_rows($sql);

echo"<datalist id = 'sy'>";
while($row = mysqli_fetch_assoc($sql))
{
echo"<option value = '$row[sy]'>";
}
echo"</datalist>";

// Semester

$sql = mysqli_query($cn, "select * from semester order by semester asc;");
$semester = mysqli_num_rows($sql);

echo"<datalist id = 'semester'>";
while($row = mysqli_fetch_assoc($sql))
{
echo"<option value = '$row[semester]'>";
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

// Award

$sql = mysqli_query($cn, "select * from subjects group by category asc;");
$semester = mysqli_num_rows($sql);

echo"<datalist id = 'award'>";
while($row = mysqli_fetch_assoc($sql))
{
echo"<option value = '$row[category]'>";
}
echo"</datalist>";

// Data Table

echo"<center>";
echo"<table border = 2 cellspacing = 0 style = 'width: 1000; border-color: black; position: relative; top: 20;'>";

echo"<tr>
<th style = 'font-size: 30;'>Username</th>
<th style = 'font-size: 30;'>LRN</th>
<th style = 'font-size: 30;'>Learners Name</th>
<th style = 'font-size: 30;'>Subjects Taken</th>
<th style = 'font-size: 30;'>General Average</th>
<th style = 'font-size: 30;'>Round-Off</th>
</tr>";

if(isset($_POST['okay']))
{

$cmbsy = $_POST['cmbsy'];
$cmbsemester = $_POST['cmbsemester'];
$cmbyrsec = $_POST['cmbyrsec'];
$cmbaward = $_POST['cmbaward'];

//SY, Sem, Yr&Sec

if(!empty($cmbsy) && !empty($cmbsemester) && !empty($cmbyrsec) && empty($cmbaward))
{

$sql = mysqli_query($cn, "select username, lrn, learners_name, sy, semester, yr_sec, COUNT(subj_desc), AVG(ave) from grades where sy = '$cmbsy' and semester like '%$cmbsemester%' and yr_sec = '$cmbyrsec' group by username order by COUNT(subj_desc) desc, AVG(ave) desc;");

$search = mysqli_num_rows($sql);

while($row = mysqli_fetch_assoc($sql))
{
echo"<tr>
<td style = 'font-size: 25; text-align: center; min-width: 200; max-width: 200; overflow: hidden;'>".$row['username']."</td>
<td style = 'font-size: 25; text-align: center; min-width: 200; max-width: 200; overflow: hidden;'>".$row['lrn']."</td>
<td style = 'font-size: 25; text-align: center; min-width: 200; max-width: 200; overflow: hidden;'>".$row['learners_name']."</td>
<td style = 'font-size: 25; text-align: center; min-width: 100; max-width: 100; overflow: hidden;'>".$row['COUNT(subj_desc)']."</td>
<td style = 'font-size: 25; text-align: center; min-width: 100; max-width: 100; overflow: hidden;'>".round($row['AVG(ave)'],2)."</td>
<td style = 'font-size: 25; text-align: center; min-width: 100; max-width: 100; overflow: hidden;'>".round($row['AVG(ave)'],0)."</td>
</tr>";
echo"<script>document.getElementById('cmbsy').value = '$row[sy]'</script>";
echo"<script>document.getElementById('cmbsemester').value = '$row[semester]'</script>";
echo"<script>document.getElementById('cmbyrsec').value = '$row[yr_sec]'</script>";
}

$sql = mysqli_query($cn, "select COUNT(username) from grades where sy = '$cmbsy' and semester like '%$cmbsemester%' and yr_sec = '$cmbyrsec'");
while($row = mysqli_fetch_assoc($sql))
{
$cntuser = $row['COUNT(username)'];
}

$sql = mysqli_query($cn, "select COUNT(subj_desc) from grades where sy = '$cmbsy' and semester like '%$cmbsemester%' and yr_sec = '$cmbyrsec' group by username;");
while($row = mysqli_fetch_assoc($sql))
{
$cntsubj = $row['COUNT(subj_desc)'];
}

$cnt = $cntuser / $cntsubj;

echo"<tr>";
echo"<td style = 'text-align: center;'>";
if($cnt >= 1)
{
echo"<p style = 'font-size: 30; font-weight: bold;'>";
echo"Total Number of Students: $cnt";
echo"</p>";
echo"</td>";

echo"<td style = 'text-align: center;  border-right: none;'>";
echo"</td>";
echo"<td style = 'text-align: center;  border-left: none; border-right: none;'>";
echo"</td>";
echo"<td style = 'text-align: center;  border-left: none; border-right: none;'>";
echo"</td>";
echo"<td style = 'text-align: center;  border-left: none; border-right: none;'>";
echo"</td>";
echo"<td style = 'text-align: center;  border-left: none;>";
echo"</td>";
}
echo"<tr>";
}

//SY, Yr&Sec

else if(!empty($cmbsy) && empty($cmbsemester) && !empty($cmbyrsec) && empty($cmbaward))
{

$sql = mysqli_query($cn, "select username, lrn, learners_name, sy, semester, yr_sec, COUNT(subj_desc), AVG(ave) from grades where sy = '$cmbsy' and semester like '%$cmbsemester%' and yr_sec = '$cmbyrsec' group by username order by COUNT(subj_desc) desc, AVG(ave) desc;");

$search = mysqli_num_rows($sql);

while($row = mysqli_fetch_assoc($sql))
{
echo"<tr>
<td style = 'font-size: 25; text-align: center; min-width: 200; max-width: 200; overflow: hidden;'>".$row['username']."</td>
<td style = 'font-size: 25; text-align: center; min-width: 200; max-width: 200; overflow: hidden;'>".$row['lrn']."</td>
<td style = 'font-size: 25; text-align: center; min-width: 200; max-width: 200; overflow: hidden;'>".$row['learners_name']."</td>
<td style = 'font-size: 25; text-align: center; min-width: 100; max-width: 100; overflow: hidden;'>".$row['COUNT(subj_desc)']."</td>
<td style = 'font-size: 25; text-align: center; min-width: 100; max-width: 100; overflow: hidden;'>".round($row['AVG(ave)'],2)."</td>
<td style = 'font-size: 25; text-align: center; min-width: 100; max-width: 100; overflow: hidden;'>".round($row['AVG(ave)'],0)."</td>
</tr>";
echo"<script>document.getElementById('cmbsy').value = '$row[sy]'</script>";
echo"<script>document.getElementById('cmbyrsec').value = '$row[yr_sec]'</script>";
}

$sql = mysqli_query($cn, "select COUNT(username) from grades where sy = '$cmbsy' and semester like '%$cmbsemester%' and yr_sec = '$cmbyrsec'");
while($row = mysqli_fetch_assoc($sql))
{
$cntuser = $row['COUNT(username)'];
}

$sql = mysqli_query($cn, "select COUNT(subj_desc) from grades where sy = '$cmbsy' and semester like '%$cmbsemester%' and yr_sec = '$cmbyrsec' group by username;");
while($row = mysqli_fetch_assoc($sql))
{
$cntsubj = $row['COUNT(subj_desc)'];
}

$cnt = $cntuser / $cntsubj;

echo"<tr>";
echo"<td style = 'text-align: center;'>";
if($cnt >= 1)
{
echo"<p style = 'font-size: 30; font-weight: bold;	'>";
echo"Total Number of Students: $cnt";
echo"</p>";
echo"</td>";

echo"<td style = 'text-align: center;  border-right: none;'>";
echo"</td>";
echo"<td style = 'text-align: center;  border-left: none; border-right: none;'>";
echo"</td>";
echo"<td style = 'text-align: center;  border-left: none; border-right: none;'>";
echo"</td>";
echo"<td style = 'text-align: center;  border-left: none; border-right: none;'>";
echo"</td>";
echo"<td style = 'text-align: center;  border-left: none;>";
echo"</td>";
}
echo"<tr>";

$sql = mysqli_query($cn, "select username, lrn, learners_name, sy, yr_sec, COUNT(subj_desc), AVG(ave) from grades_gma where sy = '$cmbsy' and  yr_sec = '$cmbyrsec' group by username order by COUNT(subj_desc) desc, AVG(ave) desc;");

$search = mysqli_num_rows($sql);

while($row = mysqli_fetch_assoc($sql))
{
echo"<tr>
<td style = 'font-size: 25; text-align: center; min-width: 200; max-width: 200; overflow: hidden;'>".$row['username']."</td>
<td style = 'font-size: 25; text-align: center; min-width: 200; max-width: 200; overflow: hidden;'>".$row['lrn']."</td>
<td style = 'font-size: 25; text-align: center; min-width: 200; max-width: 200; overflow: hidden;'>".$row['learners_name']."</td>
<td style = 'font-size: 25; text-align: center; min-width: 100; max-width: 100; overflow: hidden;'>".$row['COUNT(subj_desc)']."</td>
<td style = 'font-size: 25; text-align: center; min-width: 100; max-width: 100; overflow: hidden;'>".round($row['AVG(ave)'],2)."</td>
<td style = 'font-size: 25; text-align: center; min-width: 100; max-width: 100; overflow: hidden;'>".round($row['AVG(ave)'],0)."</td>
</tr>";
echo"<script>document.getElementById('cmbsy').value = '$row[sy]'</script>";
echo"<script>document.getElementById('cmbyrsec').value = '$row[yr_sec]'</script>";
}

$sql = mysqli_query($cn, "select COUNT(username) from grades_gma where sy = '$cmbsy' and yr_sec = '$cmbyrsec'");
while($row = mysqli_fetch_assoc($sql))
{
$cntuser = $row['COUNT(username)'];
}

$sql = mysqli_query($cn, "select COUNT(subj_desc) from grades_gma where sy = '$cmbsy' and yr_sec = '$cmbyrsec' group by username;");
while($row = mysqli_fetch_assoc($sql))
{
$cntsubj = $row['COUNT(subj_desc)'];
}

$cnt = $cntuser / $cntsubj;

echo"<tr>";
echo"<td style = 'text-align: center;'>";
if($cnt >= 1)
{
echo"<p style = 'font-size: 30; font-weight: bold;	'>";
echo"Total Number of Students: $cnt";
echo"</p>";
echo"</td>";

echo"<td style = 'text-align: center;  border-right: none;'>";
echo"</td>";
echo"<td style = 'text-align: center;  border-left: none; border-right: none;'>";
echo"</td>";
echo"<td style = 'text-align: center;  border-left: none; border-right: none;'>";
echo"</td>";
echo"<td style = 'text-align: center;  border-left: none; border-right: none;'>";
echo"</td>";
echo"<td style = 'text-align: center;  border-left: none;>";
echo"</td>";
}
echo"<tr>";
}

//SY, Yr&Sec, Award

else if(!empty($cmbsy) && empty($cmbsemester) && !empty($cmbyrsec) && !empty($cmbaward))
{

$sql = mysqli_query($cn, "select username, lrn, learners_name, sy, semester, yr_sec, COUNT(subj_desc), AVG(ave), category from grades where sy = '$cmbsy' and yr_sec = '$cmbyrsec' and category = '$cmbaward' group by username order by COUNT(subj_desc) desc, AVG(ave) desc;");

$search = mysqli_num_rows($sql);

while($row = mysqli_fetch_assoc($sql))
{
echo"<tr>
<td style = 'font-size: 25; text-align: center; min-width: 200; max-width: 200; overflow: hidden;'>".$row['username']."</td>
<td style = 'font-size: 25; text-align: center; min-width: 200; max-width: 200; overflow: hidden;'>".$row['lrn']."</td>
<td style = 'font-size: 25; text-align: center; min-width: 200; max-width: 200; overflow: hidden;'>".$row['learners_name']."</td>
<td style = 'font-size: 25; text-align: center; min-width: 100; max-width: 100; overflow: hidden;'>".$row['COUNT(subj_desc)']."</td>
<td style = 'font-size: 25; text-align: center; min-width: 100; max-width: 100; overflow: hidden;'>".round($row['AVG(ave)'],2)."</td>
<td style = 'font-size: 25; text-align: center; min-width: 100; max-width: 100; overflow: hidden;'>".round($row['AVG(ave)'],0)."</td>
</tr>";
echo"<script>document.getElementById('cmbsy').value = '$row[sy]'</script>";
echo"<script>document.getElementById('cmbyrsec').value = '$row[yr_sec]'</script>";
echo"<script>document.getElementById('cmbaward').value = '$row[category]'</script>";
}

$sql = mysqli_query($cn, "select COUNT(username) from grades where sy = '$cmbsy' and yr_sec = '$cmbyrsec' and category = '$cmbaward'");
while($row = mysqli_fetch_assoc($sql))
{
$cntuser = $row['COUNT(username)'];
}

$sql = mysqli_query($cn, "select COUNT(subj_desc) from grades where sy = '$cmbsy' and yr_sec = '$cmbyrsec' and category = '$cmbaward' group by username;");
while($row = mysqli_fetch_assoc($sql))
{
$cntsubj = $row['COUNT(subj_desc)'];
}

$cnt = $cntuser / $cntsubj;

echo"<tr>";
echo"<td style = 'text-align: center;'>";
if($cnt >= 1)
{
echo"<p style = 'font-size: 30; font-weight: bold;	'>";
echo"Total Number of Students: $cnt";
echo"</p>";
echo"</td>";

echo"<td style = 'text-align: center;  border-right: none;'>";
echo"</td>";
echo"<td style = 'text-align: center;  border-left: none; border-right: none;'>";
echo"</td>";
echo"<td style = 'text-align: center;  border-left: none; border-right: none;'>";
echo"</td>";
echo"<td style = 'text-align: center;  border-left: none; border-right: none;'>";
echo"</td>";
echo"<td style = 'text-align: center;  border-left: none;>";
echo"</td>";
}
echo"<tr>";
}

//SY, Sem, Yr&Sec, Award

else
{

$sql = mysqli_query($cn, "select username, lrn, learners_name, COUNT(subj_desc), AVG(ave) from grades group by username order by learners_name asc;");
$search = mysqli_num_rows($sql);

while($row = mysqli_fetch_assoc($sql))
{
echo"<tr>
<td style = 'font-size: 25; text-align: center; min-width: 200; max-width: 200; overflow: hidden;'>".$row['username']."</td>
<td style = 'font-size: 25; text-align: center; min-width: 200; max-width: 200; overflow: hidden;'>".$row['lrn']."</td>
<td style = 'font-size: 25; text-align: center; min-width: 200; max-width: 200; overflow: hidden;'>".$row['learners_name']."</td>
<td style = 'font-size: 25; text-align: center; min-width: 100; max-width: 100; overflow: hidden;'>".$row['COUNT(subj_desc)']."</td>
<td style = 'font-size: 25; text-align: center; min-width: 100; max-width: 100; overflow: hidden;'>".round($row['AVG(ave)'],2)."</td>
<td style = 'font-size: 25; text-align: center; min-width: 100; max-width: 100; overflow: hidden;'>".round($row['AVG(ave)'],0)."</td>
</tr>";
}

$sql = mysqli_query($cn, "select username, lrn, learners_name, COUNT(subj_desc), AVG(ave) from grades_gma group by username order by learners_name asc;");
$search = mysqli_num_rows($sql);

while($row = mysqli_fetch_assoc($sql))
{
echo"<tr>
<td style = 'font-size: 25; text-align: center; min-width: 200; max-width: 200; overflow: hidden;'>".$row['username']."</td>
<td style = 'font-size: 25; text-align: center; min-width: 200; max-width: 200; overflow: hidden;'>".$row['lrn']."</td>
<td style = 'font-size: 25; text-align: center; min-width: 200; max-width: 200; overflow: hidden;'>".$row['learners_name']."</td>
<td style = 'font-size: 25; text-align: center; min-width: 100; max-width: 100; overflow: hidden;'>".$row['COUNT(subj_desc)']."</td>
<td style = 'font-size: 25; text-align: center; min-width: 100; max-width: 100; overflow: hidden;'>".round($row['AVG(ave)'],2)."</td>
<td style = 'font-size: 25; text-align: center; min-width: 100; max-width: 100; overflow: hidden;'>".round($row['AVG(ave)'],0)."</td>
</tr>";
}

}

}

//SY, Sem, Yr&Sec, Award

else
{

$sql = mysqli_query($cn, "select username, lrn, learners_name, COUNT(subj_desc), AVG(ave) from grades group by username order by learners_name asc;");
$search = mysqli_num_rows($sql);

while($row = mysqli_fetch_assoc($sql))
{
echo"<tr>
<td style = 'font-size: 25; text-align: center; min-width: 200; max-width: 200; overflow: hidden;'>".$row['username']."</td>
<td style = 'font-size: 25; text-align: center; min-width: 200; max-width: 200; overflow: hidden;'>".$row['lrn']."</td>
<td style = 'font-size: 25; text-align: center; min-width: 200; max-width: 200; overflow: hidden;'>".$row['learners_name']."</td>
<td style = 'font-size: 25; text-align: center; min-width: 100; max-width: 100; overflow: hidden;'>".$row['COUNT(subj_desc)']."</td>
<td style = 'font-size: 25; text-align: center; min-width: 100; max-width: 100; overflow: hidden;'>".round($row['AVG(ave)'],2)."</td>
<td style = 'font-size: 25; text-align: center; min-width: 100; max-width: 100; overflow: hidden;'>".round($row['AVG(ave)'],0)."</td>
</tr>";
}

$sql = mysqli_query($cn, "select username, lrn, learners_name, COUNT(subj_desc), AVG(ave) from grades_gma group by username order by learners_name asc;");
$search = mysqli_num_rows($sql);

while($row = mysqli_fetch_assoc($sql))
{
echo"<tr>
<td style = 'font-size: 25; text-align: center; min-width: 200; max-width: 200; overflow: hidden;'>".$row['username']."</td>
<td style = 'font-size: 25; text-align: center; min-width: 200; max-width: 200; overflow: hidden;'>".$row['lrn']."</td>
<td style = 'font-size: 25; text-align: center; min-width: 200; max-width: 200; overflow: hidden;'>".$row['learners_name']."</td>
<td style = 'font-size: 25; text-align: center; min-width: 100; max-width: 100; overflow: hidden;'>".$row['COUNT(subj_desc)']."</td>
<td style = 'font-size: 25; text-align: center; min-width: 100; max-width: 100; overflow: hidden;'>".round($row['AVG(ave)'],2)."</td>
<td style = 'font-size: 25; text-align: center; min-width: 100; max-width: 100; overflow: hidden;'>".round($row['AVG(ave)'],0)."</td>
</tr>";
}

}

echo"</table>";
echo"</center>";

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
