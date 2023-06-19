<html>
<head>
<title>GMC Registration Form</title>
</head>
</body> 

<table border = 1 style = 'position: absolute; top: 10; left: 10; border-color: transparent;'>

<tr>
<td style = 'border-color: black; height: 510; width: 785;'>

<center>
<img src = 'GMC Header.png' style = 'position: relative; top: -205; width: 550; height: 80;'>
<center>

<p style = 'position: absolute; top: 90; left: 50; font-size: 12; font-weight: bold;'>
Learner's Name:
</p>

<input type = 'text' name = 'txtlearnersname' id = 'txtlearnersname' style = 'position: absolute; top: 100; left: 170; border-top: none; border-left: none; border-right: none; border-color: black; font-size: 12; font-family: Arial Narrow; background-color: transparent; color: black; width: 300;' disabled>

<p style = 'position: absolute; top: 90; left: 500; font-size: 12; font-weight: bold;'>
LRN:
</p>

<input type = 'text' name = 'txtlrn' id = 'txtlrn' style = 'position: absolute; top: 100; left: 550; border-top: none; border-left: none; border-right: none; border-color: black; font-size: 12; font-family: Arial Narrow; background-color: transparent; color: black; width: 230;' disabled>

<p style = 'position: absolute; top: 110; left: 50; font-size: 12; font-weight: bold;'>
Year and Section:
</p>

<input type = 'text' name = 'txtyrsec' id = 'txtyrsec' style = 'position: absolute; top: 120; left: 170; border-top: none; border-left: none; border-right: none; border-color: black; font-size: 12; font-family: Arial Narrow; background-color: transparent; color: black; width: 300;'>

<p style = 'position: absolute; top: 110; left: 500; font-size: 12; font-weight: bold;'>
Branch:
</p>

<input type = 'text' name = 'txtschool' id = 'txtschool' style = 'position: absolute; top: 120; left: 550; border-top: none; border-left: none; border-right: none; border-color: black; font-size: 12; font-family: Arial Narrow; background-color: transparent; color: black; width: 230;' disabled>

<p style = 'position: absolute; top: 130; left: 50; font-size: 12; font-weight: bold;'>
Track / Strand:
</p>

<input type = 'text' name = 'txtstrand' id = 'txtstrand' style = 'position: absolute; top: 140; left: 170; border-top: none; border-left: none; border-right: none; border-color: black; font-size: 12; font-family: Arial Narrow; background-color: transparent; color: black; width: 610;'>

<p style = 'position: absolute; top: 380; left: 170; font-size: 12;'>
This is to certify that
</p>

<input type = 'text' name = 'txtlname' id = 'txtlname' style = 'position: absolute; top: 390; left: 280; border-top: none; border-left: none; border-right: none; border-color: black; font-size: 12; font-family: Arial Narrow; background-color: transparent; color: black; width: 300; text-align: center;' disabled>

<p style = 'position: absolute; top: 400; left: 365; font-size: 10;'>
(Signature Over Printed Name)
</p>

<p style = 'position: absolute; top: 380; left: 590; font-size: 12;'>
is enrolled in this institution during the
</p>

<input type = 'text' name = 'txtsem' id = 'txtsem' style = 'position: absolute; top: 421; left: 50; font-weight: bold; border: none; font-size: 12; font-family: Arial Narrow; background-color: transparent; color: black; width: 30; text-align: center;' disabled>

<p style = 'position: absolute; top: 410; left: 80; font-size: 12; font-weight: bold;'>
Semester of School Year
</p>

<input type = 'text' name = 'txtscyr' id = 'txtscyr' style = 'position: absolute; top: 421; left: 180; font-weight: bold; border: none; font-size: 12; font-family: Arial Narrow; background-color: transparent; color: black; width: 100; text-align: center;' disabled>

<p style = 'position: absolute; top: 410; left: 260; font-size: 12;'>
and listed above are the subjects available for the current semester.
</p>

<p style = 'position: absolute; top: 440; left: 50; font-size: 12;'>
Certified By:
</p>

<input list = 'acad' name = 'txtacad' id = 'txtacad' style = 'position: absolute; top: 480; left: 50; width: 180; font-size: 12; font-family: Arial; border-top: none; border-left: none; border-right: none; border-color: black; font-weight: bold;' value = 'Danisse Althea C. Celis' onclick = 'acad(), clrsign()' onchange = 'acad()'>

<datalist id = 'acad'>
<option value = 'Danisse Althea C. Celis'></option>
<option value = 'Erishel P. Quintanilla'></option>
</datalist>

<img id = 'imgsign' style = 'height: 30; width: 165; position: absolute; top: 455; left: 50;'>

<p style = 'position: absolute; top: 485; left: 50; font-size: 12;'>
Academic Coordinator:
</p>

</td>
</tr>

</table>

<table border = 1 style = 'position: absolute; top: 1060; left: 10; border-color: transparent;'>

<tr>
<td style = 'border-color: black; height: 520; width: 785; border-color: transparent;'>

</td>    
</tr>

<tr>
<td style = 'border-color: black; height: 520; width: 785;'>

<p style = 'position: absolute; top: 540; left: 490; font-size: 12; font-weight: bold;'>
Semester:
</p>

<input type = 'text' name = 'txtsemester' id = 'txtsemester' style = 'position: absolute; top: 550; left: 550; border-top: none; border-left: none; border-right: none; border-color: black; font-size: 12; font-family: Arial Narrow; background-color: transparent; color: black; width: 20;' disabled>

<p style = 'position: absolute; top: 540; left: 600; font-size: 12; font-weight: bold;'>
School Year:
</p>

<input type = 'text' name = 'txtsy' id = 'txtsy' style = 'position: absolute; top: 550; left: 700; border-top: none; border-left: none; border-right: none; border-color: black; font-size: 12; font-family: Arial Narrow; background-color: transparent; color: black; width: 90;' disabled>

<p style = 'position: absolute; top: 590; left: 50; font-size: 12; font-weight: bold;'>
Track / Strand:
</p>

<input type = 'text' name = 'txtstrand2' id = 'txtstrand2' style = 'position: absolute; top: 600; left: 170; border-top: none; border-left: none; border-right: none; border-color: black; font-size: 12; font-family: Arial Narrow; background-color: transparent; color: black; width: 400;' disabled>

<p style = 'position: absolute; top: 590; left: 600; font-size: 12; font-weight: bold;'>
LRN:
</p>

<input type = 'text' name = 'txtlrn2' id = 'txtlrn2' style = 'position: absolute; top: 600; left: 700; border-top: none; border-left: none; border-right: none; border-color: black; font-size: 12; font-family: Arial Narrow; background-color: transparent; color: black; width: 90;' disabled>

<p style = 'position: absolute; top: 620; left: 50; font-size: 12; font-weight: bold;'>
Learner's Name:
</p>

<input type = 'text' name = 'txtlearnersname2' id = 'txtlearnersname2' style = 'position: absolute; top: 630; left: 170; border-top: none; border-left: none; border-right: none; border-color: black; font-size: 12; font-family: Arial Narrow; background-color: transparent; color: black; width: 400;' disabled>

<input type = 'hidden' name = 'txtgender' id = 'txtgender'>

<p style = 'position: absolute; top: 620; left: 600; font-size: 12; font-weight: bold;'>
Gender:
</p>

<input type = 'text' name = 'txtsex' id = 'txtsex' style = 'position: absolute; top: 630; left: 700; border-top: none; border-left: none; border-right: none; border-color: black; font-size: 12; font-family: Arial Narrow; background-color: transparent; color: black; width: 90;' disabled>

<p style = 'position: absolute; top: 650; left: 50; font-size: 12; font-weight: bold;'>
Date of Birth:
</p>

<input type = 'text' name = 'txtbirthday' id = 'txtbirthday' style = 'position: absolute; top: 660; left: 170; border-top: none; border-left: none; border-right: none; border-color: black; font-size: 12; font-family: Arial Narrow; background-color: transparent; color: black; width: 60;' disabled>

<p style = 'position: absolute; top: 650; left: 270; font-size: 12; font-weight: bold;'>
Place of Birth:
</p>

<input type = 'text' name = 'txtbirthplace' id = 'txtbirthplace' style = 'position: absolute; top: 660; left: 370; border-top: none; border-left: none; border-right: none; border-color: black; font-size: 12; font-family: Arial Narrow; background-color: transparent; color: black; width: 200;' disabled>

<p style = 'position: absolute; top: 650; left: 600; font-size: 12; font-weight: bold;'>
Nationality:
</p>

<input type = 'text' name = 'txtnationality' id = 'txtnationality' style = 'position: absolute; top: 660; left: 700; border-top: none; border-left: none; border-right: none; border-color: black; font-size: 12; font-family: Arial Narrow; background-color: transparent; color: black; width: 90;' disabled>

<p style = 'position: absolute; top: 680; left: 50; font-size: 12; font-weight: bold;'>
Last School Attended:
</p>

<input type = 'text' name = 'txtschoolname' id = 'txtschoolname' style = 'position: absolute; top: 690; left: 170; width: 400; color: black; border-top: none; border-left: none; border-right: none; border-color: black; font-size: 12; background-color: transparent; font-family: Arial Narrow;' disabled>

<p style = 'position: absolute; top: 680; left: 600; font-size: 12; font-weight: bold;'>
Completion Date:
</p>

<input type = 'text' name = 'txtcompletiondate' id = 'txtcompletiondate' style = 'position: absolute; top: 690; left: 700; width: 90;  color: black; border-top: none; border-left: none; border-right: none; border-color: black; background-color: transparent; font-size: 12; font-family: Arial Narrow;' disabled>

<p style = 'position: absolute; top: 710; left: 50; font-size: 12; font-weight: bold;'>
School Address:
</p>

<input type = 'text' name = 'txtschooladdress' id = 'txtschooladdress' style = 'position: absolute; top: 720; left: 170; width: 620;  color: black; border-top: none; border-left: none; border-right: none; border-color: black; background-color: transparent; font-size: 12; font-family: Arial Narrow;' disabled>

<p style = 'position: absolute; top: 740; left: 50; font-size: 12; font-weight: bold;'>
Permanent Address:
</p>

<input type = 'text' name = 'txtaddress' id = 'txtaddress' style = 'position: absolute; top: 750; left: 170; width: 400; color: black; border-top: none; border-left: none; border-right: none; border-color: black; background-color: transparent; font-size: 12; font-family: Arial Narrow;' disabled>

<p style = 'position: absolute; top: 740; left: 600; font-size: 12; font-weight: bold;'>
Contact No:
</p>

<input type = 'text' name = 'txtcontactno' id = 'txtcontactno' style = 'position: absolute; top: 750; left: 700; width: 90; color: black; border-top: none; border-left: none; border-right: none; border-color: black; background-color: transparent; font-size: 12; font-family: Arial Narrow;' disabled>

<p style = 'position: absolute; top: 770; left: 50; font-size: 12; font-weight: bold;'>
Father's Name:
</p>

<input type = 'text' name = 'txtfather' id = 'txtfather' style = 'position: absolute; top: 780; left: 170; width: 400; color: black; border-top: none; border-left: none; border-right: none; border-color: black; background-color: transparent; font-size: 12; font-family: Arial Narrow;' disabled>

<p style = 'position: absolute; top: 770; left: 600; font-size: 12; font-weight: bold;'>
Occupation:
</p>

<input type = 'text' name = 'txtfoccupation' id = 'txtfoccupation' style = 'position: absolute; top: 780; left: 700; width: 300; color: black; border-top: none; border-left: none; border-right: none; border-color: black; background-color: transparent; font-size: 12; font-family: Arial Narrow; width: 90;' disabled>

<p style = 'position: absolute; top: 800; left: 50; font-size: 12; font-weight: bold;'>
Mother's Name:
</p>

<input type = 'text' name = 'txtmother' id = 'txtmother' style = 'position: absolute; top: 810; left: 170; width: 400; color: black; border-top: none; border-left: none; border-right: none; border-color: black; background-color: transparent; font-size: 12; font-family: Arial Narrow;' disabled>

<p style = 'position: absolute; top: 800; left: 600; font-size: 12; font-weight: bold;'>
Occupation:
</p>

<input type = 'text' name = 'txtmoccupation' id = 'txtmoccupation' style = 'position: absolute; top: 810; left: 700; width: 300; color: black; border-top: none; border-left: none; border-right: none; border-color: black; background-color: transparent; font-size: 12; font-family: Arial Narrow; width: 90;' disabled>

<p style = 'position: absolute; top: 830; left: 50; font-size: 12; font-weight: bold;'>
Guardian Name:
</p>

<input type = 'text' name = 'txtguardian' id = 'txtguardian' style = 'position: absolute; top: 840; left: 170; width: 200; color: black; border-top: none; border-left: none; border-right: none; border-color: black; background-color: transparent; font-size: 12; font-family: Arial Narrow;' disabled>

<p style = 'position: absolute; top: 830; left: 380; font-size: 12; font-weight: bold;'>
Relationship:
</p>

<input type = 'text' name = 'txtrelationship' id = 'txtrelationship' style = 'position: absolute; top: 840; left: 460; width: 110; color: black; border-top: none; border-left: none; border-right: none; border-color: black; background-color: transparent; font-size: 12; font-family: Arial Narrow;' disabled>

<p style = 'position: absolute; top: 830; left: 600; font-size: 12; font-weight: bold;'>
Contact No:
</p>

<input type = 'text' name = 'txtgcontactno' id = 'txtgcontactno' style = 'position: absolute; top: 840; left: 700; width: 300; color: black; border-top: none; border-left: none; border-right: none; border-color: black; background-color: transparent; font-size: 12; font-family: Arial Narrow; width: 90;' disabled>

<p style = 'position: absolute; top: 870; left: 50; font-size: 12; font-weight: bold;'>
Voucher Program Beneficiary (VPB): ___Yes ___No (Others)__________________________________
</p>

<p style = 'position: absolute; top: 900; left: 50; font-size: 12; font-weight: bold;'>
Amount Paid:
</p>

<p style = 'position: absolute; top: 900; left: 150; font-size: 12; font-weight: bold;'>
_____________________________________
</p>

<p style = 'position: absolute; top: 920; left: 50; font-size: 12; font-weight: bold;'>
Date Paid:
</p>

<p style = 'position: absolute; top: 920; left: 150; font-size: 12; font-weight: bold;'>
_____________________________________
</p>

<p style = 'position: absolute; top: 940; left: 50; font-size: 12; font-weight: bold;'>
OR No:
</p>

<p style = 'position: absolute; top: 940; left: 150; font-size: 12; font-weight: bold;'>
_____________________________________
</p>

<p style = 'position: absolute; top: 900; left: 450; font-size: 12; font-weight: bold;'>
Payment Received By:
</p>

<p style = 'position: absolute; top: 900; left: 570; font-size: 12; font-weight: bold;'>
_____________________________________
</p>

<p style = 'position: absolute; top: 920; left: 450; font-size: 12; font-weight: bold;'>
Noted By:
</p>

<p style = 'position: absolute; top: 920; left: 570; font-size: 12; font-weight: bold;'>
_____________________________________
</p>

<center>
<p style = 'position: relative; top: 200; font-size: 12; font-weight: bold;'>
I hereby certify that the abovementioned information is true and correct.
</p>
<center>

<p style = 'position: absolute; top: 990; left: 50; font-size: 12; font-weight: bold;'>
___________________________________
</p>

<p style = 'position: absolute; top: 1010; left: 50; font-size: 12; font-weight: bold;'>
Student's Signature Over Printed Name
</p>

<p style = 'position: absolute; top: 1010; left: 450; font-size: 12; font-weight: bold;'>
Note: registration fee for non-voucher students is non-refundable.
</p>

</td>
</tr>

</table>

<style>
@page {margin: 0mm;}
</style>

</body>
</html>

<?php

$cn = mysqli_connect('localhost', 'root', '', 'gmcbulac_db_gmc');
//$cn = mysqli_connect('localhost', 'gmcbulac_derek03', 'derek030872', 'gmcbulac_db_gmc');

// Student Information

$txtstudno = $_POST['txtstudno'];

$sql = mysqli_query($cn, "select * from student_information where student_no = '$txtstudno'");
$studno = mysqli_num_rows($sql);
	
while($row = mysqli_fetch_assoc($sql))
{
echo"<script>document.getElementById('txtlearnersname').value = '$row[learners_name]'</script>";
echo"<script>document.getElementById('txtlrn').value = '$row[lrn]'</script>";
echo"<script>document.getElementById('txtyrsec').value = '$row[yr_sec]'</script>";
echo"<script>document.getElementById('txtschool').value = '$row[school]'</script>";
echo"<script>document.getElementById('txtstrand').value = '$row[strand]'</script>";

echo"<script>document.getElementById('txtlname').value = '$row[learners_name]'</script>";
echo"<script>document.getElementById('txtsem').value = '$row[semester]'</script>";
echo"<script>document.getElementById('txtscyr').value = '$row[sy]'</script>";

echo"<script>document.getElementById('txtsemester').value = '$row[semester]'</script>";
echo"<script>document.getElementById('txtsy').value = '$row[sy]'</script>";
echo"<script>document.getElementById('txtstrand2').value = '$row[strand]'</script>";
echo"<script>document.getElementById('txtlrn2').value = '$row[lrn]'</script>";
echo"<script>document.getElementById('txtlearnersname2').value = '$row[learners_name]'</script>";

// Gender

echo"<script>document.getElementById('txtgender').value = '$row[gender]'</script>";

echo"<script>
if(document.getElementById('txtgender').value == 'M')
{
document.getElementById('txtsex').value = 'MALE'
}
if(document.getElementById('txtgender').value == 'F')
{
document.getElementById('txtsex').value = 'FEMALE'
}
</script>";

$birthday = date_create("$row[birthday]");
$birthday = date_format($birthday,"m/d/Y");
echo"<script>document.getElementById('txtbirthday').value = '$birthday'</script>";

echo"<script>document.getElementById('txtbirthplace').value = '$row[birthplace]'</script>";
echo"<script>document.getElementById('txtnationality').value = '$row[nationality]'</script>";
echo"<script>document.getElementById('txtschoolname').value = '$row[school_name]'</script>";

$completion = date_create("$row[completion_date]");
$completion = date_format($completion,"m/d/Y");
echo"<script>document.getElementById('txtcompletiondate').value = '$completion'</script>";

echo"<script>document.getElementById('txtschooladdress').value = '$row[school_address]'</script>";
echo"<script>document.getElementById('txtaddress').value = '$row[house_no], $row[brgy], $row[city], $row[province]'</script>";
echo"<script>document.getElementById('txtcontactno').value = '$row[contact_no]'</script>";
echo"<script>document.getElementById('txtfather').value = '$row[fathers_name]'</script>";
echo"<script>document.getElementById('txtfoccupation').value = '$row[foccupation]'</script>";
echo"<script>document.getElementById('txtmother').value = '$row[mothers_name]'</script>";
echo"<script>document.getElementById('txtmoccupation').value = '$row[moccupation]'</script>";
echo"<script>document.getElementById('txtguardian').value = '$row[guardian_name]'</script>";
echo"<script>document.getElementById('txtrelationship').value = '$row[relationship]'</script>";
echo"<script>document.getElementById('txtgcontactno').value = '$row[gcontact_no]'</script>";
}

echo"<table border = 1 cellspacing = 0 style = 'width: 720; border-color: black; border-left: none; border-right: none; position: absolute; top: 180; left: 50;'>";

//First Semester

echo"<tr>
<th style = 'border-left: 3px solid black; height: 20; width: 100; font-size: 12;'>
Category
</th>
<th style = 'height: 20; width: 200; font-size: 12;'>
Subject
</th>
<th style = 'border-right: 3px solid black; height: 20; width: 90; font-size: 12;'>
Teacher's Name
</th>
</tr>";

$txtsemester = $_POST['txtsemester'];
$txtstrand = $_POST['txtstrand'];
$cmbgradelevel = $_POST['cmbgradelevel'];

$sql = mysqli_query($cn, "select * from subjects where semester = '$txtsemester' and strand = '$txtstrand' and yr_sec = '$cmbgradelevel' and subj_type = 'Core' group by subj_desc asc;");
$grades = mysqli_num_rows($sql);

while($row = mysqli_fetch_assoc($sql))
{
echo"<tr>
<td style = 'border-left: 3px solid black; width: 100; text-align: center; font-size: 12;'>".$row['subj_type']."</td>
<td style = 'min-width: 200; max-width: 200; text-align: left; font-size: 12;'>".$row['subj_desc']."</td>
<td style = 'border-right: 3px solid black; width: 90; text-align: center; font-size: 12;'></td>
</tr>";
}

$sql = mysqli_query($cn, "select * from subjects where semester = '$txtsemester' and strand = '$txtstrand' and yr_sec = '$cmbgradelevel' and subj_type = 'Applied' group by subj_desc asc;");
$grades = mysqli_num_rows($sql);

while($row = mysqli_fetch_assoc($sql))
{
echo"<tr>
<td style = 'border-left: 3px solid black; width: 100; text-align: center; font-size: 12;'>".$row['subj_type']."</td>
<td style = 'min-width: 200; max-width: 200; text-align: left; font-size: 12;'>".$row['subj_desc']."</td>
<td style = 'border-right: 3px solid black; width: 90; text-align: center; font-size: 12;'></td>
</tr>";
}

$sql = mysqli_query($cn, "select * from subjects where semester = '$txtsemester' and strand = '$txtstrand' and yr_sec = '$cmbgradelevel' and subj_type = 'Specialized' group by subj_desc asc;");
$grades = mysqli_num_rows($sql);

while($row = mysqli_fetch_assoc($sql))
{
echo"<tr>
<td style = 'border-left: 3px solid black; width: 100; text-align: center; font-size: 12;'>".$row['subj_type']."</td>
<td style = 'min-width: 200; max-width: 200; text-align: left; font-size: 12;'>".$row['subj_desc']."</td>
<td style = 'border-right: 3px solid black; width: 90; text-align: center; font-size: 12;'></td>
</tr>";
}

echo"</table>";

?>

<script>

document.getElementById('imgsign').src = document.getElementById('txtacad').value + '.png';

function acad()
{
document.getElementById('imgsign').src = document.getElementById('txtacad').value + '.png';
}

function clrsign()
{
document.getElementById('txtacad').value = '';
}

</script>