<html>
<head>
<title>Enrolled Students</title>
</head>

<body onload = "login(), acclvl()" bgcolor = "white">

<table border = 2 style = "background-color: 28110d; border: none; position: absolute; top: 0; left: 0; height: 100; width: 100%;">
    
<td style = 'border-color: transparent; min-width: 40; max-width: 40;'>
<img src = 'admin.png' style = 'height: 40; min-width: 40; max-width: 40;'>
</td>

<td style = 'border-color: transparent; min-width: 800; max-width: 800;'>
</td>

<form action = "gmc teacher.php" method = "post">
<td style = 'border-color: transparent; width: 120;'>
<input type = 'submit' value = 'HOME' style = 'border-color: white; border-radius: 5px; background-color: 28110d; color: white; font-size: 20; height: 30; width: 120;'>
<input type = 'hidden' name = 'txtusername' id = 'txthome'>
</td>
</form>

<td style = 'border-color: transparent; width: 120;'>
<input type = 'button' value = 'LOG OUT' style = 'border-color: white; border-radius: 5px; background-color: 28110d; color: white; font-size: 20; height: 30; width: 120;' onclick = 'logout()'>
</td>

<td style = 'border-color: transparent; min-width: 100; max-width: 100;'>
</td>

</table>

<img src = "bg.png" style = "position: absolute; top: 100; left: 0; height: 100%; width: 100%;">

<table border = 2 style = 'border-color: 28110d; background-color: transparent; position: absolute; top: 100; left: 0; height: 55; width: 100%;'>

<form action = 'gmc student information.php' method = 'post'>
<td style = 'border-color: transparent; width: 280;'>
<input type = 'submit' name = 'studinfo' id = 'btnstudinfo' value = 'Student Information' style = 'border-color: EFC372; border-radius: 5px; background-color: EFC372; color: 28110d; font-size: 30; width: 280'>
<input type = 'hidden' name = 'txtusername' id = 'txtstudinfo'>
<input type = 'hidden' name = 'cmbsearch' id = 'cmbsearch'>
</td>
</form>

<form action = 'gmc enroll students.php' method = 'post'>
<td style = 'border-color: transparent; width: 280;'>
<input type = 'submit' name = 'enroll' id = 'btnenroll' value = 'Enroll Students' style = 'border-color: EFC372; border-radius: 5px; background-color: EFC372; color: 28110d; font-size: 30; width: 280'>
<input type = 'hidden' name = 'txtusername' id = 'txtenroll'>
<input type = 'hidden' name = 'cmbsearch' id = 'cmbsearch'>
</td>
</form>

<form action = 'gmc student grades.php' method = 'post'>
<td style = 'border-color: transparent; width: 280;'>
<input type = 'submit' name = 'gmcgrades' id = 'btngmcgrades' value = 'GMC Grades' style = 'border-color: EFC372; border-radius: 5px; background-color: EFC372; color: 28110d; font-size: 30; width: 280'>
<input type = 'hidden' name = 'txtusername' id = 'txtgmcgrades'>
<input type = 'hidden' name = 'cmbsearch' id = 'cmbsearch'>
</td>
</form>

<form action = 'gma student grades.php' method = 'post'>
<td style = 'border-color: transparent; width: 280;'>
<input type = 'submit' name = 'gmagrades' id = 'btngmagrades' value = 'GMA Grades' style = 'border-color: EFC372; border-radius: 5px; background-color: EFC372; color: 28110d; font-size: 30; width: 280'>
<input type = 'hidden' name = 'txtusername' id = 'txtgmagrades'>
<input type = 'hidden' name = 'cmbsearch' id = 'cmbsearch'>
</td>
</form>

<td style = 'border-color: transparent; min-width: 342; max-width: 342;'>
</td>

</table>

<form action = 'gmc enroll students.php' method = 'post'>
<input list = 'search' name = 'cmbsearch' id = 'cmbsearch' style = 'height: 30; width: 300; text-align: center; border-color: 28110d; border-radius: 5px; position: absolute; top: 160; left: 15;'>
<input type = 'submit' name = "search" id = 'btnsearch' value = 'Search' style = 'font-size: 20; border-color: 28110d; position: absolute; top: 160; left: 320; border-radius: 5px;'>
<input type = "hidden" name = "txtusername" id = "txtsearch">
</form>

<form action = 'gmc enroll students.php' method = 'post'>

<table border = 1 style = 'height: 110; width: 700; position: absolute; left: 15; top: 200; border-color: black;'>
<td style = 'min-width: 120; max-width: 120; overflow: hidden; border-color: transparent;'>

<p style = 'position: absolute; top: 0; left: 5; font-weight: bold; color: gold;'>
Learners Information
</p>

<p style = "position: absolute; top: 30; left: 5; font-weight: bold;">
Username:
</p>

<input type = 'text' name = 'txtprtuser' id = 'txtprtuser' style = 'position: absolute; top: 70; left: 5; height: 30; width: 200; border-color: 28110d; border-radius: 5px;' disabled = true>

<input type = 'hidden' name = 'txtuser' id = 'txtuser' style = 'position: absolute; top: 70; left: 5; height: 30; width: 200; border-color: 28110d; border-radius: 5px;'>

<p style = "position: absolute; top: 30; left: 210; font-weight: bold;">
LRN:
</p>

<input type = 'text' name = 'prttxtlrn' id = 'txtprtlrn' style = 'position: absolute; top: 70; left: 210; height: 30; width: 200; border-color: 28110d; border-radius: 5px;' disabled = true>

<input type = 'hidden' name = 'txtlrn' id = 'txtlrn' style = 'position: absolute; top: 70; left: 210; height: 30; width: 200; border-color: 28110d; border-radius: 5px;'>

<p style = "position: absolute; top: 30; left: 415; font-weight: bold;">
Learners Name:
</p>

<input type = 'text' name = 'txtprtlearnersname' id = 'txtprtlearnersname' style = 'position: absolute; top: 70; left: 415; height: 30; width: 275; border-color: 28110d; border-radius: 5px;' disabled = true>

<input type = 'hidden' name = 'txtlearnersname' id = 'txtlearnersname' style = 'position: absolute; top: 70; left: 415; height: 30; width: 275; border-color: 28110d; border-radius: 5px;'>

</td>
</table>

<table border = 1 style = 'height: 80; width: 700; position: absolute; left: 15; top: 310; border-color: black;'>
<td style = 'min-width: 120; max-width: 120; overflow: hidden; border-color: transparent;'>

<p style = 'position: absolute; top: 0; left: 5; font-weight: bold; color: gold;'>
Last School Attended
</p>

<input list = 'completerAs' name = 'cmbcompleterAs' id = 'cmbcompleterAs' style = 'position: absolute; top: 40; left: 5; height: 30; width: 150; text-align: center; border-color: 28110d; border-radius: 5px;' placeholder = 'Completer As' onclick = 'clrcompleterAs()'>

<datalist id = 'completerAs'>
<option value = 'High School Completer'></option>
<option value = 'Junior High School Completer'></option>
<option value = 'PEPT Passer'></option>
<option value = 'ALS A&E Passer'></option>
</datalist>

<input type = 'text' name = 'txtschoolname' id = 'txtschoolname' style = 'position: absolute; top: 40; left: 160; height: 30; width: 220; text-align: center; border-color: 28110d; border-radius: 5px;' placeholder = 'School Name'>

<input type = 'text' name = 'txtschooladdress' id = 'txtschooladdress' style = 'position: absolute; top: 40; left: 385; height: 30; width: 220; text-align: center; border-color: 28110d; border-radius: 5px;' placeholder = 'School Address'>

<input type = 'number' name = 'txtgenave' id = 'txtgenave' style = 'position: absolute; top: 40; left: 610; height: 30; width: 80; text-align: center; border-color: 28110d; border-radius: 5px;' placeholder = 'Gen. Ave.'>

</td>
</table>

<table border = 1 style = 'height: 80; width: 700; position: absolute; left: 15; top: 390; border-color: black;'>
<td style = 'min-width: 120; max-width: 120; overflow: hidden; border-color: transparent;'>

<p style = 'position: absolute; top: 0; left: 5; font-weight: bold; color: gold;'>
Senior High School
</p>

<input type = 'text' name = 'txtschool' id = 'txtschool' style = 'position: absolute; top: 40; left: 5; height: 30; width: 560; text-align: center; border-color: 28110d; border-radius: 5px;' placeholder = 'School'>

<input type = 'text' name = 'txtschoolid' id = 'txtschoolid' style = 'position: absolute; top: 40; left: 570; height: 30; width: 120; text-align: center; border-color: 28110d; border-radius: 5px;' placeholder = 'School ID'>

</td>
</table>

<table border = 1 style = 'height: 80; width: 700; position: absolute; left: 15; top: 470; border-color: black;'>
<td style = 'min-width: 120; max-width: 120; overflow: hidden; border-color: transparent;'>

<p style = 'position: absolute; top: 0; left: 5; font-weight: bold; color: gold;'>
Enrollment Status
</p>

<input list = 'sy' name = 'cmbsy' id = 'cmbsy' style = 'position: absolute; top: 40; left: 5; height: 30; width: 130; text-align: center; border-color: 28110d; border-radius: 5px;' placeholder = 'School Year' onclick = 'clrsy()'>

<input list = 'semester' name = 'cmbsemester' id = 'cmbsemester' style = 'position: absolute; top: 40; left: 140; height: 30; width: 130; text-align: center; border-color: 28110d; border-radius: 5px;' placeholder = 'Semester' onclick = 'clrsem()'>

<input list = 'strand' name = 'cmbstrand' id = 'cmbstrand' style = 'position: absolute; top: 40; left: 275; height: 30; width: 130; text-align: center; border-color: 28110d; border-radius: 5px;' placeholder = 'Track / Strand' onclick = 'clrstrand()'>

<input list = 'yrsec' name = 'cmbyrsec' id = 'cmbyrsec' style = 'position: absolute; top: 40; left: 410; height: 30; width: 130; text-align: center; border-color: 28110d; border-radius: 5px;' placeholder = 'Year and Section' onclick = 'clryrsec()'>

<input type = 'submit' name = 'save' id = 'btnsave' value = 'Save' style = 'position: absolute; top: 40; left: 545; height: 30; width: 70; font-size: 20; border-color: 28110d; border-radius: 5px;'>

<input type = 'submit' name = 'delete' id = 'btndelete' value = 'Delete' style = 'position: absolute; top: 40; left: 620; height: 30; width: 70; font-size: 20; border-color: 28110d; border-radius: 5px;' disabled = true>

</td>
</table>

<input type = 'hidden' name = 'txtusername' id = 'txtsearch'>
<input type = 'hidden' name = 'cmbsearch' id = 'cmbsearch'>

</form>

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

// Searchbox
	
$sql = mysqli_query($cn, "select * from student_information order by lrn asc;");
$lrn = mysqli_num_rows($sql);

echo"<datalist id = 'search'>";
while($row = mysqli_fetch_assoc($sql))
{
echo"<option value = '$row[username]'>";
echo"<option value = '$row[lrn]'>";
echo"<option value = '$row[learners_name]'>";
}
echo"</datalist>";
	
// Student Information

if(isset($_POST['search']))
{

$cmbsearch = $_POST['cmbsearch'];

$sql = mysqli_query($cn, "select * from student_information where username = '$cmbsearch' or lrn = '$cmbsearch' or learners_name = '$cmbsearch'");
$search = mysqli_num_rows($sql);

if($search == 1)
{
while($row = mysqli_fetch_assoc($sql))
{
echo"<script>document.getElementById('txtprtuser').value = '$row[username]'</script>";
echo"<script>document.getElementById('txtuser').value = '$row[username]'</script>";
echo"<script>document.getElementById('txtprtlrn').value = '$row[lrn]'</script>";
echo"<script>document.getElementById('txtlrn').value = '$row[lrn]'</script>";
echo"<script>document.getElementById('txtprtlearnersname').value = '$row[learners_name]'</script>";
echo"<script>document.getElementById('txtlearnersname').value = '$row[learners_name]'</script>";
echo"<script>document.getElementById('cmbcompleterAs').value = '$row[completer_as]'</script>";
echo"<script>document.getElementById('txtschoolname').value = '$row[school_name]'</script>";
echo"<script>document.getElementById('txtschooladdress').value = '$row[school_address]'</script>";
echo"<script>document.getElementById('txtgenave').value = '$row[gen_ave]'</script>";
echo"<script>document.getElementById('txtschool').value = '$row[school]'</script>";
echo"<script>document.getElementById('txtschoolid').value = '$row[school_id]'</script>";
echo"<script>document.getElementById('cmbsy').value = '$row[sy]'</script>";
echo"<script>document.getElementById('cmbsemester').value = '$row[semester]'</script>";
echo"<script>document.getElementById('cmbstrand').value = '$row[strand]'</script>";
echo"<script>document.getElementById('cmbyrsec').value = '$row[yr_sec]'</script>";
echo"<script>document.getElementById('btndelete').disabled = false</script>";
}

}
else
{
echo"<script>alert('Student not found')</script>";
echo"<script>history.go(-1)</script>";	
}

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

// Strand

$sql = mysqli_query($cn, "select * from strand order by strand asc;");
$strand = mysqli_num_rows($sql);
echo"<datalist id = 'strand'>";
while($row = mysqli_fetch_assoc($sql))
{
echo"<option value = '$row[strand]'>";
}
echo"</datalist>";

// Year and Section

$sql = mysqli_query($cn, "select * from yr_sec order by yr_sec asc;");
$yr_sec = mysqli_num_rows($sql);
echo"<datalist id = 'yrsec'>";
while($row = mysqli_fetch_assoc($sql))
{
echo"<option value = '$row[yr_sec]'>";
}
echo"</datalist>";

// Data Table

echo"<table border = 1 style = 'height: 30; width: 65%; position: relative; left: 5; top: 560; border-color: black;'>
<th style = 'min-width: 100; max-width: 100; text-align: center;'>LRN</th>
<th style = 'min-width: 120; max-width: 120; text-align: center;'>Learners Name</th>
<th style = 'min-width: 100; max-width: 100; text-align: center;'>School Year</th>
<th style = 'min-width: 80; max-width: 80; text-align: center;'>Semester</th>
<th style = 'min-width: 80; max-width: 80; text-align: center;'>Track / Strand</th>
<th style = 'min-width: 130; max-width: 130; text-align: center;'>Year and Section</th>
</table>";

$cmbsearch = $_POST['cmbsearch'];

$sql = mysqli_query($cn, "select * from enrolled_students where username like '%$cmbsearch%' or lrn like '%$cmbsearch%' or learners_name like '%$cmbsearch%' order by learners_name asc limit 100;");
$search = mysqli_num_rows($sql);

while($row = mysqli_fetch_assoc($sql))
{	
echo"<table border = 1 style = 'height: 30; width: 65%; position: relative; left: 5; top: 560; border-color: black;'>
<td style = 'min-width: 100; max-width: 100; overflow: hidden; text-align: center;'>".$row['lrn']."</td>
<td style = 'min-width: 120; max-width: 120; overflow: hidden; text-align: center;'>".$row['learners_name']."</td>
<td style = 'min-width: 100; max-width: 100; overflow: hidden; text-align: center;'>".$row['sy']."</td>
<td style = 'min-width: 80; max-width: 80; overflow: hidden; text-align: center;'>".$row['semester']."</td>
<td style = 'min-width: 80; max-width: 80; overflow: hidden; text-align: center;'>".$row['strand']."</td>
<td style = 'min-width: 130; max-width: 130; overflow: hidden; text-align: center;'>".$row['yr_sec']."</td>
</table>";
}

// Enroll Students

if(isset($_POST['save']))
{

$txtuser = $_POST['txtuser'];
$txtlrn = $_POST['txtlrn'];
$txtlearnersname = $_POST['txtlearnersname'];
$cmbcompleterAs = $_POST['cmbcompleterAs'];
$txtschoolname = $_POST['txtschoolname'];
$txtschooladdress = $_POST['txtschooladdress'];
$txtgenave = $_POST['txtgenave'];
$txtschool = $_POST['txtschool'];
$txtschoolid = $_POST['txtschoolid'];
$cmbsy = $_POST['cmbsy'];
$cmbsemester = $_POST['cmbsemester'];
$cmbstrand = $_POST['cmbstrand'];
$cmbyrsec = $_POST['cmbyrsec'];

// Invalid School Year

if(!empty($cmbsy))
{
$sql = mysqli_query($cn, "select * from school_year where sy = '$cmbsy'");
$sy = mysqli_num_rows($sql);
if($sy == 0)
{
echo "<script>alert('Invalid School Year')</script>";
}
}

// Invalid Semester

if(!empty($cmbsemester))
{
$sql = mysqli_query($cn, "select * from semester where semester = '$cmbsemester'");
$semester = mysqli_num_rows($sql);
if($semester == 0)
{
echo "<script>alert('Invalid Semester')</script>";
}
}

// Invalid Track / Strand

if(!empty($cmbstrand))
{
$sql = mysqli_query($cn, "select * from strand where strand = '$cmbstrand'");
$strand = mysqli_num_rows($sql);
if($strand == 0)
{
echo "<script>alert('Invalid Track / Strand')</script>";
}
}

// Invalid Year and Section

if(!empty($cmbyrsec))
{
$sql = mysqli_query($cn, "select * from yr_sec where yr_sec = '$cmbyrsec'");
$yrsec = mysqli_num_rows($sql);
if($yrsec == 0)
{
echo "<script>alert('Invalid Year and Section')</script>";
}
}

// Save

if(!empty($txtuser) 
&& !empty($txtlrn) 
&& !empty($txtlearnersname)
&& !empty($cmbcompleterAs)
&& !empty($txtschoolname)
&& !empty($txtschooladdress)
&& !empty($txtgenave)
&& !empty($txtschool)
&& !empty($txtschoolid)
&& !empty($cmbsy) && $sy == 1
&& !empty($cmbsemester) && $semester == 1
&& !empty($cmbstrand) && $strand == 1
&& !empty($cmbyrsec) && $yrsec == 1)
{

$sql = mysqli_query($cn, "update student_information set completer_as = '$cmbcompleterAs', school_name = '$txtschoolname', school_address = '$txtschooladdress', gen_ave = '$txtgenave', school = '$txtschool', school_id = '$txtschoolid', sy = '$cmbsy', semester = '$cmbsemester', strand = '$cmbstrand', yr_sec = '$cmbyrsec' where username = '$txtuser'");

$sql = mysqli_query($cn, "select * from enrolled_students where username = '$txtuser'");
$user = mysqli_num_rows($sql);
if($user == 0)
{
$sql = mysqli_query($cn, "insert into enrolled_students (username, lrn, learners_name, sy, semester, strand, yr_sec) values ('$txtuser', '$txtlrn', '$txtlearnersname', '$cmbsy', '$cmbsemester', '$cmbstrand', '$cmbyrsec')");
}
else
{
$sql = mysqli_query($cn, "update enrolled_students set sy = '$cmbsy', semester = '$cmbsemester', strand = '$cmbstrand', yr_sec = '$cmbyrsec' where username = '$txtuser'");
}
echo "<script>alert('Enrollment Successful')</script>";
echo "<script>history.go(-1)</script>";
}

else
{
echo "<script>alert('Enrollment Failed')</script>";
echo "<script>history.go(-1)</script>";
}

}

// Delete

if(isset($_POST['delete']))
{

$txtuser = $_POST['txtuser'];

if(!empty($txtuser))
{
$sql = mysqli_query($cn, "select * from enrolled_students where username = '$txtuser'");	
$user = mysqli_num_rows($sql);
if($user == 1)
{
$sql = mysqli_query($cn, "delete from enrolled_students where username = '$txtuser'");
$sql = mysqli_query($cn, "delete from grades where username = '$txtuser'");
echo "<script>alert('Record Deleted')</script>";
echo "<script>history.go(-1)</script>";
}
else
{
echo "<script>alert('Unable to delete')</script>";
echo "<script>history.go(-1)</script>";
}

}

}

?>

<script>

// Username

document.getElementById('txtusername').value = localStorage['objectToPass'];

document.getElementById('txthome').value = document.getElementById('txtusername').value;
document.getElementById('txtstudinfo').value = document.getElementById('txtusername').value;
document.getElementById('txtenroll').value = document.getElementById('txtusername').value;
document.getElementById('txtgmcgrades').value = document.getElementById('txtusername').value;
document.getElementById('txtgmagrades').value = document.getElementById('txtusername').value;
document.getElementById('txtsearch').value = document.getElementById('txtusername').value;

// Login

function login()
{
if(document.getElementById('txtusername').value == 'undefined')
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

// Force Logout

function acclvl()
{
if(document.getElementById('txtaccesslevel').value == '')
{
window.location.href = 'gmc login.html';
}
}

// Completer As

function clrcompleterAs()
{
document.getElementById('cmbcompleterAs').value = '';
}

// School Year

function clrsy()
{
document.getElementById('cmbsy').value = '';
}

// Semester

function clrsem()
{
document.getElementById('cmbsemester').value = '';
}

// Strand

function clrstrand()
{
document.getElementById('cmbstrand').value = '';
}

// Year and Section

function clryrsec()
{
document.getElementById('cmbyrsec').value = '';
}

</script>
