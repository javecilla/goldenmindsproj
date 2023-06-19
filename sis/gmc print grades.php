<html>
<head>
<title>Copy of Grades</title>
</head>

<body onload = "login()" bgcolor = "white">

<img src = "bg.png" style = "position: absolute; top: 0; left: 0; height: 30; width: 30; height: 100%; width: 100%;">

<p style = "position: absolute; top: 50; left: 50; font-weight: bold;">
LRN:
</p>

<p style = "position: absolute; top: 80; left: 50; font-weight: bold;">
Learners Name:
</p>

<p style = "position: absolute; top: 150; left: 50; font-weight: bold;">
School Year:
</p>

<p style = "position: absolute; top: 180; left: 50; font-weight: bold;">
Semester:
</p>

<p style = "position: absolute; top: 150; left: 300; font-weight: bold;">
Track / Strand:

<p style = "position: absolute; top: 180; left: 300; font-weight: bold;">
Year and Section:
</p>

<input type = 'hidden' name = 'txtusername' id = 'txtusername' style = 'position: absolute; top: 1000; left: 100;'>

<table border = 1 style = 'height: 30; width: 65%; position: relative; left: 40; top: 270; border-color: black;'>
<th style = 'min-width: 80; max-width: 80; text-align: center;  border: none'>School Year</th>
<th style = 'min-width: 80; max-width: 80; text-align: center;  border: none'>Semester</th>
<th style = 'min-width: 150; max-width: 150; text-align: center;  border: none'>Subject Description</th>
<th style = 'min-width: 70; max-width: 70; text-align: center;  border: none'>Midterm</th>
<th style = 'min-width: 70; max-width: 70; text-align: center;  border: none'>Finals</th>
<th style = 'min-width: 70; max-width: 70; text-align: center;  border: none'>Average</th>
<th style = 'min-width: 80; max-width: 80; text-align: center;  border: none'>Remarks</th>
</table>

</body>
</html>

<?php

//$cn = mysqli_connect('localhost', 'root', '', 'gmcbulac_db_gmc');
$cn = mysqli_connect('localhost', 'gmcbulac_derek03', 'derek030872', 'gmcbulac_db_gmc');
if(!$cn)
{
echo'Unable to connect';
}

// Student Information
	
$txtusername = $_POST['txtusername'];
	
$sql = mysqli_query($cn, "select * from student_information where username = '$txtusername'");
$username = mysqli_num_rows($sql);

if(!empty($txtusername))
{
	
while($row = mysqli_fetch_assoc($sql))
{	

echo"<input type = 'hidden' name = 'txtuser' id = 'txtuser' style = 'position: absolute; top: 900; left: 100;' value = '$row[username]'>";

echo"<p style = 'position: absolute; top: 50; left: 200;'>";
echo"$row[lrn]";
echo"</p>";

echo"<p style = 'position: absolute; top: 80; left: 200;'>";
echo"$row[learners_name]";
echo"</p>";

}

$sql = mysqli_query($cn, "select * from enrolled_students where username = '$txtusername'");
$username = mysqli_num_rows($sql);

while($row = mysqli_fetch_assoc($sql))
{	

echo"<p style = 'position: absolute; top: 150; left: 150;'>";
echo"$row[sy]";
echo"</p>";

echo"<p style = 'position: absolute; top: 180; left: 150;'>";
echo"$row[semester]";
echo"</p>";

echo"<p style = 'position: absolute; top: 150; left: 450;'>";
echo"$row[strand]";
echo"</p>";

echo"<p style = 'position: absolute; top: 180; left: 450;'>";
echo"$row[yr_sec]";
echo"</p>";

}

// Data Table

$txtusername = $_POST['txtusername'];

$sql = mysqli_query($cn, "select * from grades where username = '$txtusername' order by sy, semester, subj_desc asc;");
$username = mysqli_num_rows($sql);

while($row = mysqli_fetch_assoc($sql))
{	
echo"<table border = 1 style = 'height: 30; width: 65%; position: relative; left: 40; top: 270; border-color: black;'>";
echo"<td style = 'min-width: 80; max-width: 80; overflow: hidden; text-align: center; border: none;'>".$row['sy']."</td>";
echo"<td style = 'min-width: 80; max-width: 80; overflow: hidden; text-align: center; border: none;'>".$row['semester']."</td>";
echo"<td style = 'min-width: 150; max-width: 150; overflow: hidden; text-align: center; border: none;'>".$row['subj_desc']."</td>";
echo"<td style = 'min-width: 70; max-width: 70; overflow: hidden; text-align: center; border: none;'>".$row['midterm']."</td>";
echo"<td style = 'min-width: 70; max-width: 70; overflow: hidden; text-align: center; border: none;'>".$row['finals']."</td>";
echo"<td style = 'min-width: 70; max-width: 70; overflow: hidden; text-align: center; border: none;'>".$row['ave']."</td>";
echo"<td style = 'min-width: 80; max-width: 80; overflow: hidden; text-align: center; border: none;'>".$row['remarks']."</td>";
echo"</table>";
}

}

else
{
echo "<script>alert('Under Development')</script>";
echo "<script>window.close()</script>";
}

echo"<script>";

echo"document.getElementById('txtusername').value = document.getElementById('txtuser').value;";
echo"function login()";
echo"{";
echo"if(document.getElementById('txtusername').value == '')";
echo"{";
echo"window.location.href = 'login.html';";
echo"}";
echo"}";

echo"</script>";

?>
