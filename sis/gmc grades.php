<html>
<head>
<title>GMC Grades</title>
</head>

<body onload = "login(), status()" bgcolor = "white">

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

<input type = 'hidden' name = 'txtstatus' id = 'txtstatus'>

</th>

<th style = 'border-color: transparent; width: 600;'>
</th>

</tr>
</table>

<br>

<table border = 2 cellspacing = 0 style = 'height: 400; width: 1000; border-color: black; position: relative; top: 0;'>
<tr>

<td style = 'height: 40; font-size: 30; font-weight: bold; background-color: EFC372; text-align: center;'>
Learner's Information
</tr>
</td>

<tr style = 'height: 250;'>
<td style = "font-weight: bold; font-size: 30; text-align: center;">

LRN:

<br>

<input type = 'text' name = 'txtlrn' id = 'txtlrn' style = 'font-size: 30; height: 40; width: 900; background-color: transparent; border-color: 28110d; border-radius: 5px; text-align: center;' readonly>

<br><br>

Learner's Name:

<br>

<input type = 'text' name = 'txtlearnersname' id = 'txtlearnersname' style = 'font-size: 30; height: 40; width: 900; background-color: transparent; border-color: 28110d; border-radius: 5px; text-align: center;' readonly>

</td>
</tr>

<tr>
<td style = 'height: 40; font-size: 30; font-weight: bold; background-color: EFC372; text-align: center;'>
Enrollment Status
</td>
</tr>

<tr style = 'height: 450;'>
<td style = "font-weight: bold; font-size: 30; text-align: center;">

School Year:

<br>

<input type = 'text' name = 'txtsy' id = 'txtsy' style = 'font-size: 30; height: 40; width: 900; background-color: transparent; border-color: 28110d; border-radius: 5px; text-align: center;' readonly>

<br><br>

Semester:

<br>

<input type = 'text' name = 'txtsemester' id = 'txtsemester' style = 'font-size: 30; height: 40; width: 900; background-color: transparent; border-color: 28110d; border-radius: 5px; text-align: center;' readonly>

<br><br>

Track / Strand:

<br>

<input type = 'text' name = 'txtstrand' id = 'txtstrand' style = 'font-size: 20; height: 40; width: 900; background-color: transparent; border-color: 28110d; border-radius: 5px; text-align: center;' readonly>

<br><br>

Year and Section:

<br>

<input type = 'text' name = 'txtyrsec' id = 'txtyrsec' style = 'font-size: 30; height: 40; width: 900; background-color: transparent; border-color: 28110d; border-radius: 5px; text-align: center;' readonly>

</td>
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
echo"<script>document.getElementById('txtacctname').value = '$row[account_name]'</script>";
echo"<script>document.getElementById('txtaccesslevel').value = '$row[access_level]'</script>";
echo"<script>document.getElementById('txtstatus').value = '$row[status]'</script>";
}

// Student Information

$sql = mysqli_query($cn, "select * from student_information where username = '$txtusername'");
$username = mysqli_num_rows($sql);

while($row = mysqli_fetch_assoc($sql))
{	
echo"<script>document.getElementById('txtlrn').value = '$row[lrn]'</script>";
echo"<script>document.getElementById('txtlearnersname').value = '$row[learners_name]'</script>";
echo"<script>document.getElementById('txtsy').value = '$row[sy]'</script>";
echo"<script>document.getElementById('txtsemester').value = '$row[semester]'</script>";
echo"<script>document.getElementById('txtstrand').value = '$row[strand]'</script>";
echo"<script>document.getElementById('txtyrsec').value = '$row[yr_sec]'</script>";
}

echo"<center>";

echo"<table border = 1 cellspacing = 0 style = 'width: 1000; border-color: black; border-left: none; border-right: none; position: relative; top: 20;'>";

//First Semester

echo"<tr>
<th style = 'border-left: 3px solid black; border-right: none; text-align: left; font-size: 25;'>
Grade 11 First Semester
</th>
<th style = 'border-left: none; border-right: none;'>
</th>
<th style = 'border-left: none; border-right: none;'>
</th>
<th style = 'border-left: none; border-right: 3px solid black;'>
</th>
</tr>";

echo"<tr>
<th style = 'border-left: 3px solid black; height: 20; width: 560; font-size: 25;'>
Subjects
</th>
<th style = 'height: 20; width: 110; font-size: 25;'>
1st Quarter
</th>
<th style = 'height: 20; width: 110; font-size: 25;'>
2nd Quarter
</th>
<th style = 'border-right: 3px solid black; height: 20; width: 150; font-size: 25;'>
Semester Final Grade
</th>
</tr>";

echo"<tr>
<th style = 'border-left: 3px solid black; border-right: none; text-align: left; font-size: 25;'>
Core Subjects
</th>
<th style = 'border-left: none; border-right: none;'>
</th>
<th style = 'border-left: none; border-right: none;'>
</th>
<th style = 'border-left: none; border-right: 3px solid black;'>
</th>
</tr>";

$sql = mysqli_query($cn, "select * from grades where username = '$txtusername' and semester = '1st' and yr_sec like '%11%' and subj_type = 'Core' order by subj_order, subj_desc asc;");
$grades = mysqli_num_rows($sql);

while($row = mysqli_fetch_assoc($sql))
{
echo"<tr>
<td style = 'border-left: 3px solid black; min-width: 560; max-width: 560; text-align: left; font-size: 25;'>".$row['subj_desc']."</td>
<td style = 'width: 110; text-align: center; font-size: 25;'>".$row['midterm']."</td>
<td style = 'width: 110; text-align: center; font-size: 25;'>".$row['finals']."</td>
<td style = 'border-right: 3px solid black; width: 150; text-align: center; font-size: 25;'>".$row['ave']."</td>
</tr>";
}

echo"<tr>
<th style = 'border-left: 3px solid black; border-right: none; text-align: left; font-size: 25;'>
Applied Subjects
</th>
<th style = 'border-left: none; border-right: none;'>
</th>
<th style = 'border-left: none; border-right: none;'>
</th>
<th style = 'border-left: none; border-right: 3px solid black;'>
</th>
</tr>";

$sql = mysqli_query($cn, "select * from grades where username = '$txtusername' and semester = '1st' and yr_sec like '%11%' and subj_type = 'Applied' order by subj_order, subj_desc asc;");
$grades = mysqli_num_rows($sql);

while($row = mysqli_fetch_assoc($sql))
{
echo"<tr>
<td style = 'border-left: 3px solid black; min-width: 560; max-width: 560; text-align: left; font-size: 25;'>".$row['subj_desc']."</td>
<td style = 'width: 110; text-align: center; font-size: 25;'>".$row['midterm']."</td>
<td style = 'width: 110; text-align: center; font-size: 25;'>".$row['finals']."</td>
<td style = 'border-right: 3px solid black; width: 150; text-align: center; font-size: 25;'>".$row['ave']."</td>
</tr>";
}

echo"<tr>
<th style = 'border-left: 3px solid black; border-right: none; text-align: left; font-size: 25;'>
Specialized Subjects
</th>
<th style = 'border-left: none; border-right: none;'>
</th>
<th style = 'border-left: none; border-right: none;'>
</th>
<th style = 'border-left: none; border-right: 3px solid black;'>
</th>
</tr>";

$sql = mysqli_query($cn, "select * from grades where username = '$txtusername' and semester = '1st' and yr_sec like '%11%' and subj_type = 'Specialized' order by subj_order, subj_desc asc;");
$grades = mysqli_num_rows($sql);

while($row = mysqli_fetch_assoc($sql))
{
echo"<tr>
<td style = 'border-left: 3px solid black; min-width: 560; max-width: 560; text-align: left; font-size: 25;'>".$row['subj_desc']."</td>
<td style = 'width: 110; text-align: center; font-size: 25;'>".$row['midterm']."</td>
<td style = 'width: 110; text-align: center; font-size: 25;'>".$row['finals']."</td>
<td style = 'border-right: 3px solid black; width: 150; text-align: center; font-size: 25;'>".$row['ave']."</td>
</tr>";
}

// General Average

$sql = mysqli_query($cn, "select AVG(ave) from grades where username = '$txtusername' and semester = '1st' and yr_sec like '%11%'");
$average = mysqli_num_rows($sql);
	
while($row = mysqli_fetch_assoc($sql))
{
echo"<tr>
<td style = 'border-left: 3px solid black; border-right: none; font-weight: bold; text-align: right; font-size: 25;'>
General Average for the Semester
</td>
<td style = 'border-left: none; border-right: none;'>
</td>
<td style = 'border-left: none;'>
</td>
<td style = 'border-right: 3px solid black; width: 80; font-size: 25; font-weight: bold; text-align: center;'>";
$genave = $row['AVG(ave)'];
echo$genave = round($genave,0);
echo"</td>
</tr>";
}

echo"<tr>
<td style = 'border-right: none; border-left: none; height: 50;'>
</td>
<td style = 'border-left: none; border-right: none;'>
</td>
<td style = 'border-left: none; border-right: none;'>
</td>
<td style = 'border-left: none; border-right: none;'>
</td>
</tr>";

//Second Semester

echo"<tr>
<th style = 'border-left: 3px solid black; border-right: none; text-align: left; font-size: 25;'>
Grade 11 Second Semester
</th>
<th style = 'border-left: none; border-right: none;'>
</th>
<th style = 'border-left: none; border-right: none;'>
</th>
<th style = 'border-left: none; border-right: 3px solid black;'>
</th>
</tr>";

echo"<tr>
<th style = 'border-left: 3px solid black; height: 20; width: 560; font-size: 25;'>
Subjects
</th>
<th style = 'height: 20; width: 110; font-size: 25;'>
3rd Quarter
</th>
<th style = 'height: 20; width: 110; font-size: 25;'>
4th Quarter
</th>
<th style = 'border-right: 3px solid black; height: 20; width: 150; font-size: 25;'>
Semester Final Grade
</th>
</tr>";

echo"<tr>
<th style = 'border-left: 3px solid black; border-right: none; text-align: left; font-size: 25;'>
Core Subjects
</th>
<th style = 'border-left: none; border-right: none;'>
</th>
<th style = 'border-left: none; border-right: none;'>
</th>
<th style = 'border-left: none; border-right: 3px solid black;'>
</th>
</tr>";

$sql = mysqli_query($cn, "select * from grades where username = '$txtusername' and semester = '2nd' and yr_sec like '%11%' and subj_type = 'Core' order by subj_order, subj_desc asc;");
$grades = mysqli_num_rows($sql);

while($row = mysqli_fetch_assoc($sql))
{
echo"<tr>
<td style = 'border-left: 3px solid black; min-width: 560; max-width: 560; text-align: left; font-size: 25;'>".$row['subj_desc']."</td>
<td style = 'width: 110; text-align: center; font-size: 25;'>".$row['midterm']."</td>
<td style = 'width: 110; text-align: center; font-size: 25;'>".$row['finals']."</td>
<td style = 'border-right: 3px solid black; width: 150; text-align: center; font-size: 25;'>".$row['ave']."</td>
</tr>";
}

echo"<tr>
<th style = 'border-left: 3px solid black; border-right: none; text-align: left; font-size: 25;'>
Applied Subjects
</th>
<th style = 'border-left: none; border-right: none;'>
</th>
<th style = 'border-left: none; border-right: none;'>
</th>
<th style = 'border-left: none; border-right: 3px solid black;'>
</th>
</tr>";

$sql = mysqli_query($cn, "select * from grades where username = '$txtusername' and semester = '2nd' and yr_sec like '%11%' and subj_type = 'Applied' order by subj_order, subj_desc asc;");
$grades = mysqli_num_rows($sql);

while($row = mysqli_fetch_assoc($sql))
{
echo"<tr>
<td style = 'border-left: 3px solid black; min-width: 560; max-width: 560; text-align: left; font-size: 25;'>".$row['subj_desc']."</td>
<td style = 'width: 110; text-align: center; font-size: 25;'>".$row['midterm']."</td>
<td style = 'width: 110; text-align: center; font-size: 25;'>".$row['finals']."</td>
<td style = 'border-right: 3px solid black; width: 150; text-align: center; font-size: 25;'>".$row['ave']."</td>
</tr>";
}

echo"<tr>
<th style = 'border-left: 3px solid black; border-right: none; text-align: left; font-size: 25;'>
Specialized Subjects
</th>
<th style = 'border-left: none; border-right: none;'>
</th>
<th style = 'border-left: none; border-right: none;'>
</th>
<th style = 'border-left: none; border-right: 3px solid black;'>
</th>
</tr>";

$sql = mysqli_query($cn, "select * from grades where username = '$txtusername' and semester = '2nd' and yr_sec like '%11%' and subj_type = 'Specialized' order by subj_order, subj_desc asc;");
$grades = mysqli_num_rows($sql);

while($row = mysqli_fetch_assoc($sql))
{
echo"<tr>
<td style = 'border-left: 3px solid black; min-width: 560; max-width: 560; text-align: left; font-size: 25;'>".$row['subj_desc']."</td>
<td style = 'width: 110; text-align: center; font-size: 25;'>".$row['midterm']."</td>
<td style = 'width: 110; text-align: center; font-size: 25;'>".$row['finals']."</td>
<td style = 'border-right: 3px solid black; width: 150; text-align: center; font-size: 25;'>".$row['ave']."</td>
</tr>";
}

// General Average

$sql = mysqli_query($cn, "select AVG(ave) from grades where username = '$txtusername' and semester = '2nd' and yr_sec like '%11%'");
$average = mysqli_num_rows($sql);
	
while($row = mysqli_fetch_assoc($sql))
{
echo"<tr>
<td style = 'border-left: 3px solid black; border-right: none; font-weight: bold; text-align: right; font-size: 25;'>
General Average for the Semester
</td>
<td style = 'border-left: none; border-right: none;'>
</td>
<td style = 'border-left: none;'>
</td>
<td style = 'border-right: 3px solid black; width: 80; font-size: 25; font-weight: bold; text-align: center;'>";
$genave = $row['AVG(ave)'];
echo$genave = round($genave,0);
echo"</td>
</tr>";
}

echo"<tr>
<td style = 'border-right: none; border-left: none; height: 50;'>
</td>
<td style = 'border-left: none; border-right: none;'>
</td>
<td style = 'border-left: none; border-right: none;'>
</td>
<td style = 'border-left: none; border-right: none;'>
</td>
</tr>";

//First Semester

echo"<tr>
<th style = 'border-left: 3px solid black; border-right: none; text-align: left; font-size: 25;'>
Grade 12 First Semester
</th>
<th style = 'border-left: none; border-right: none;'>
</th>
<th style = 'border-left: none; border-right: none;'>
</th>
<th style = 'border-left: none; border-right: 3px solid black;'>
</th>
</tr>";

echo"<tr>
<th style = 'border-left: 3px solid black; height: 20; width: 560; font-size: 25;'>
Subjects
</th>
<th style = 'height: 20; width: 110; font-size: 25;'>
1st Quarter
</th>
<th style = 'height: 20; width: 110; font-size: 25;'>
2nd Quarter
</th>
<th style = 'border-right: 3px solid black; height: 20; width: 150; font-size: 25;'>
Semester Final Grade
</th>
</tr>";

echo"<tr>
<th style = 'border-left: 3px solid black; border-right: none; text-align: left; font-size: 25;'>
Core Subjects
</th>
<th style = 'border-left: none; border-right: none;'>
</th>
<th style = 'border-left: none; border-right: none;'>
</th>
<th style = 'border-left: none; border-right: 3px solid black;'>
</th>
</tr>";

$sql = mysqli_query($cn, "select * from grades where username = '$txtusername' and semester = '1st' and yr_sec like '%12%' and subj_type = 'Core' order by subj_order, subj_desc asc;");
$grades = mysqli_num_rows($sql);

while($row = mysqli_fetch_assoc($sql))
{
echo"<tr>
<td style = 'border-left: 3px solid black; min-width: 560; max-width: 560; text-align: left; font-size: 25;'>".$row['subj_desc']."</td>
<td style = 'width: 110; text-align: center; font-size: 25;'>".$row['midterm']."</td>
<td style = 'width: 110; text-align: center; font-size: 25;'>".$row['finals']."</td>
<td style = 'border-right: 3px solid black; width: 150; text-align: center; font-size: 25;'>".$row['ave']."</td>
</tr>";
}

echo"<tr>
<th style = 'border-left: 3px solid black; border-right: none; text-align: left; font-size: 25;'>
Applied Subjects
</th>
<th style = 'border-left: none; border-right: none;'>
</th>
<th style = 'border-left: none; border-right: none;'>
</th>
<th style = 'border-left: none; border-right: 3px solid black;'>
</th>
</tr>";

$sql = mysqli_query($cn, "select * from grades where username = '$txtusername' and semester = '1st' and yr_sec like '%12%' and subj_type = 'Applied' order by subj_order, subj_desc asc;");
$grades = mysqli_num_rows($sql);

while($row = mysqli_fetch_assoc($sql))
{
echo"<tr>
<td style = 'border-left: 3px solid black; min-width: 560; max-width: 560; text-align: left; font-size: 25;'>".$row['subj_desc']."</td>
<td style = 'width: 110; text-align: center; font-size: 25;'>".$row['midterm']."</td>
<td style = 'width: 110; text-align: center; font-size: 25;'>".$row['finals']."</td>
<td style = 'border-right: 3px solid black; width: 150; text-align: center; font-size: 25;'>".$row['ave']."</td>
</tr>";
}

echo"<tr>
<th style = 'border-left: 3px solid black; border-right: none; text-align: left; font-size: 25;'>
Specialized Subjects
</th>
<th style = 'border-left: none; border-right: none;'>
</th>
<th style = 'border-left: none; border-right: none;'>
</th>
<th style = 'border-left: none; border-right: 3px solid black;'>
</th>
</tr>";

$sql = mysqli_query($cn, "select * from grades where username = '$txtusername' and semester = '1st' and yr_sec like '%12%' and subj_type = 'Specialized' order by subj_order, subj_desc asc;");
$grades = mysqli_num_rows($sql);

while($row = mysqli_fetch_assoc($sql))
{
echo"<tr>
<td style = 'border-left: 3px solid black; min-width: 560; max-width: 560; text-align: left; font-size: 25;'>".$row['subj_desc']."</td>
<td style = 'width: 110; text-align: center; font-size: 25;'>".$row['midterm']."</td>
<td style = 'width: 110; text-align: center; font-size: 25;'>".$row['finals']."</td>
<td style = 'border-right: 3px solid black; width: 150; text-align: center; font-size: 25;'>".$row['ave']."</td>
</tr>";
}

// General Average

$sql = mysqli_query($cn, "select AVG(ave) from grades where username = '$txtusername' and semester = '1st' and yr_sec like '%12%'");
$average = mysqli_num_rows($sql);
	
while($row = mysqli_fetch_assoc($sql))
{
echo"<tr>
<td style = 'border-left: 3px solid black; border-right: none; font-weight: bold; text-align: right; font-size: 25;'>
General Average for the Semester
</td>
<td style = 'border-left: none; border-right: none;'>
</td>
<td style = 'border-left: none;'>
</td>
<td style = 'border-right: 3px solid black; width: 80; font-size: 25; font-weight: bold; text-align: center;'>";
$genave = $row['AVG(ave)'];
echo$genave = round($genave,0);
echo"</td>
</tr>";
}

echo"<tr>
<td style = 'border-right: none; border-left: none; height: 50;'>
</td>
<td style = 'border-left: none; border-right: none;'>
</td>
<td style = 'border-left: none; border-right: none;'>
</td>
<td style = 'border-left: none; border-right: none;'>
</td>
</tr>";

//Second Semester

echo"<tr>
<th style = 'border-left: 3px solid black; border-right: none; text-align: left; font-size: 25;'>
Grade 12 Second Semester
</th>
<th style = 'border-left: none; border-right: none;'>
</th>
<th style = 'border-left: none; border-right: none;'>
</th>
<th style = 'border-left: none; border-right: 3px solid black;'>
</th>
</tr>";

echo"<tr>
<th style = 'border-left: 3px solid black; height: 20; width: 560; font-size: 25;'>
Subjects
</th>
<th style = 'height: 20; width: 110; font-size: 25;'>
3rd Quarter
</th>
<th style = 'height: 20; width: 110; font-size: 25;'>
4th Quarter
</th>
<th style = 'border-right: 3px solid black; height: 20; width: 150; font-size: 25;'>
Semester Final Grade
</th>
</tr>";

echo"<tr>
<th style = 'border-left: 3px solid black; border-right: none; text-align: left; font-size: 25;'>
Core Subjects
</th>
<th style = 'border-left: none; border-right: none;'>
</th>
<th style = 'border-left: none; border-right: none;'>
</th>
<th style = 'border-right: 3px solid black; border-left: none;'>
</th>
</tr>";

$sql = mysqli_query($cn, "select * from grades where username = '$txtusername' and semester = '2nd' and yr_sec like '%12%' and subj_type = 'Core' order by subj_order, subj_desc asc;");
$grades = mysqli_num_rows($sql);

while($row = mysqli_fetch_assoc($sql))
{
echo"<tr>
<td style = 'border-left: 3px solid black; min-width: 560; max-width: 560; text-align: left; font-size: 25;'>".$row['subj_desc']."</td>
<td style = 'width: 110; text-align: center; font-size: 25;'>".$row['midterm']."</td>
<td style = 'width: 110; text-align: center; font-size: 25;'>".$row['finals']."</td>
<td style = 'border-right: 3px solid black; width: 150; text-align: center; font-size: 25;'>".$row['ave']."</td>
</tr>";
}

echo"<tr>
<th style = 'border-left: 3px solid black; border-right: none; text-align: left; font-size: 25;'>
Applied Subjects
</th>
<th style = 'border-left: none; border-right: none;'>
</th>
<th style = 'border-left: none; border-right: none;'>
</th>
<th style = 'border-left: none; border-right: 3px solid black;'>
</th>
</tr>";

$sql = mysqli_query($cn, "select * from grades where username = '$txtusername' and semester = '2nd' and yr_sec like '%12%' and subj_type = 'Applied' order by subj_order, subj_desc asc;");
$grades = mysqli_num_rows($sql);

while($row = mysqli_fetch_assoc($sql))
{
echo"<tr>
<td style = 'border-left: 3px solid black; min-width: 560; max-width: 560; text-align: left; font-size: 25;'>".$row['subj_desc']."</td>
<td style = 'width: 110; text-align: center; font-size: 25;'>".$row['midterm']."</td>
<td style = 'width: 110; text-align: center; font-size: 25;'>".$row['finals']."</td>
<td style = 'border-right: 3px solid black; width: 150; text-align: center; font-size: 25;'>".$row['ave']."</td>
</tr>";
}

echo"<tr>
<th style = 'border-left: 3px solid black; border-right: none; text-align: left; font-size: 25;'>
Specialized Subjects
</th>
<th style = 'border-left: none; border-right: none;'>
</th>
<th style = 'border-left: none; border-right: none;'>
</th>
<th style = 'border-left: none; border-right: 3px solid black;'>
</th>
</tr>";

$sql = mysqli_query($cn, "select * from grades where username = '$txtusername' and semester = '2nd' and yr_sec like '%12%' and subj_type = 'Specialized' order by subj_order, subj_desc asc;");
$grades = mysqli_num_rows($sql);

while($row = mysqli_fetch_assoc($sql))
{
echo"<tr>
<td style = 'border-left: 3px solid black; min-width: 560; max-width: 560; text-align: left; font-size: 25;'>".$row['subj_desc']."</td>
<td style = 'width: 110; text-align: center; font-size: 25;'>".$row['midterm']."</td>
<td style = 'width: 110; text-align: center; font-size: 25;'>".$row['finals']."</td>
<td style = 'border-right: 3px solid black; width: 150; text-align: center; font-size: 25;'>".$row['ave']."</td>
</tr>";
}

// General Average

$sql = mysqli_query($cn, "select AVG(ave) from grades where username = '$txtusername' and semester = '2nd' and yr_sec like '%12%'");
$average = mysqli_num_rows($sql);
	
while($row = mysqli_fetch_assoc($sql))
{
echo"<tr>
<td style = 'border-left: 3px solid black; border-right: none; border-bottom: 2px solid black; font-weight: bold; text-align: right; font-size: 25;'>
General Average for the Semester
</td>
<td style = 'border-left: none; border-right: none; border-bottom: 2px solid black;'>
</td>
<td style = 'border-left: none; border-bottom: 2px solid black;'>
</td>
<td style = 'border-right: 3px solid black; border-bottom: 2px solid black; width: 80; font-size: 25; font-weight: bold; text-align: center;'>";
$genave = $row['AVG(ave)'];
echo$genave = round($genave,0);
echo"</td>
</tr>";
}

echo"<tr>
<td style = 'border: none; height: 50; text-align: right; font-weight: bold; font-size: 20;'>
********** Nothing Follows **********
</td>
<td style = 'border: none; height: 50;'>
</td>
<td style = 'border: none; height: 50;'>
</td>
<td style = 'border: none; height: 50;'>
</td>
</tr>";

echo"</table>";

echo"<center>";

?>

<script>

// Login

document.getElementById('txtusername').value = localStorage['objectToPass'];

function login()
{
if(document.getElementById('txtusername').value == 'undefined' || document.getElementById('txtacctname').value == '' || document.getElementById('txtstatus').value == 'Deactivated')
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
