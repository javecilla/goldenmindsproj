<html>
<head>
<title>GMC F-137 Back Page</title>
</head>
</body> 

<table border = 1 style = 'position: absolute; top: 20; left: 20; border: none;'>
<tr>
<td style = 'border: none; width: 590;'>

<table border = 1 cellspacing = 0 style = ' border-color: transparent; width: 880;'>

<tr>
<td style = 'border: none; width: 590;'>

<input type = 'text' style = 'color: black; font-weight: bold; width: 50; border: none; font-size: 12;' value = 'Page 2' disabled>

<input type = 'text' name = 'txtlearnersname' id = 'txtlearnersname' style = 'position: absolute; left: 130; color: black; font-weight: bold; width: 500; border: none; font-size: 12;' disabled>

<input type = 'text' style = 'position: absolute; left: 790; color: black; font-weight: bold; width: 90; border: none; font-size: 12;' value = 'Form 137-SHS' disabled>
</td>
</tr>

<tr>

<td style = 'width: 100; max-width: 100; font-family: Arial Narrow; font-size: 12; border: 2px solid black; border-left: none; border-right: none; border-bottom: none;'>

&nbsp;&nbsp;&nbsp;

<label style = 'font-size: 12; font-family: Arial Narrow; font-weight: bold;'>
SCHOOL:
</label>

<input type = 'text' name = 'txtschool' id = 'txtschool' style = 'color: black; font-weight: bold; width: 340; border: 1px solid black; border-left: none; border-top: none; border-right: none; font-size: 12;' disabled>

<label style = 'font-size: 12; font-family: Arial Narrow; font-weight: bold;'>
SCHOOL ID:
</label>

<input type = 'text' name = 'txtschoolid' id = 'txtschoolid' style = 'color: black; font-weight: bold; width: 100; border: 1px solid black; border-left: none; border-top: none; border-right: none; font-size: 12;' disabled>

<label style = 'font-size: 12; font-family: Arial Narrow; font-weight: bold;'>
GRADE LEVEL:
</label>

<input type = 'text' style = 'color: black; font-weight: bold; width: 50; border: 1px solid black; border-left: none; border-top: none; border-right: none; font-size: 12;' value = '12' disabled>

<label style = 'font-size: 12; font-family: Arial Narrow; font-weight: bold;'>
SY:
</label>

<input type = 'text' name = 'txtsy' id = 'txtsy' style = 'color: black; font-weight: bold; width: 90; border: 1px solid black; border-left: none; border-top: none; border-right: none; font-size: 12;' disabled>

<label style = 'font-size: 12; font-family: Arial Narrow; font-weight: bold;'>
SEM:
</label>

<input type = 'text' style = 'color: black; font-weight: bold; width: 42; border: 1px solid black; border-left: none; border-top: none; border-right: none; font-size: 12;' value = '1ST' disabled>

<br>

&nbsp;&nbsp;&nbsp;

<label style = 'font-size: 12; font-family: Arial Narrow; font-weight: bold;'>
TRACK/STRAND:
</label>

<input type = 'text' name = 'txtstrand' id = 'txtstrand' style = 'color: black; font-weight: bold; width: 480; border: 1px solid black; border-left: none; border-top: none; border-right: none; font-size: 12;' disabled>

&nbsp;&nbsp;&nbsp;&nbsp;

<label style = 'font-size: 12; font-family: Arial Narrow; font-weight: bold;'>
SECTION:
</label>

<input type = 'text' name = 'txtsec' id = 'txtsec' style = 'color: black; font-weight: bold; width: 230; border: 1px solid black; border-left: none; border-top: none; border-right: none; font-size: 12;' disabled>

</td>
</tr>
</table>

<?php

$cn = mysqli_connect('localhost', 'root', '', 'gmcbulac_db_gmc');
//$cn = mysqli_connect('localhost', 'gmcbulac_derek03', 'derek030872', 'gmcbulac_db_gmc');

$txtuser = $_POST['txtuser'];

// First Semester

echo"<table border = 1 cellspacing = 0 style = 'width: 880; border: none;'>";

echo"<tr>

<th style = 'width: 100; max-width: 100; font-family: Arial Narrow; font-size: 12; background-color: #B2BABB; border: 2px solid black; border-right: 1.5px solid black; border-bottom: 1.5px solid black;' rowspan = 2>
Indicate if Subject is CORE, APPLIED, or SPECIALIZED
</th>

<th style = 'width: 550; max-width: 550; font-family: Arial Narrow; font-size: 12; background-color: #B2BABB; border: 2px solid black; border-left: none; border-right: 1.5px solid black; border-bottom: 1.5px solid black;' rowspan = 2>
SUBJECTS
</th>

<th style = 'width: 120; max-width: 120; font-family: Arial Narrow; font-size: 12; background-color: #B2BABB; border: 2px solid black; border-left: none; border-right: 1.5px solid black; border-bottom: none;' colspan = 2>
Quarter
</th>

<th style = 'width: 70; max-width: 70; font-family: Arial Narrow; font-size: 12; background-color: #B2BABB; border: 2px solid black; border-left: none; border-right: 1.5px solid black; border-bottom: 1.5px solid black;' rowspan = 2>
SEM FINAL GRADE
</th>

<th style = 'width: 60; max-width: 60; font-family: Arial Narrow; font-size: 12; background-color: #B2BABB; border: 2px solid black; border-left: none; border-bottom: 1.5px solid black;' rowspan = 2>
ACTION TAKEN
</th>

</tr>";

echo"<tr>

<th style = 'width: 60; max-width: 60; font-family: Arial Narrow; font-size: 12; background-color: #B2BABB; border: 2px solid black; border-left: none; border-right: 1.5px solid black; border-bottom: 1.5px solid black; border-top: 1.5px solid black;'>
1ST
</th>

<th style = 'width: 60; max-width: 60; font-family: Arial Narrow; font-size: 12; background-color: #B2BABB; border: 2px solid black; border-left: none; border-right: 1.5px solid black; border-bottom: 1.5px solid black; border-top: 1.5px solid black;'>
2ND
</th>

</tr>";

// 1st Semester
$sql = mysqli_query($cn, "select * from grades where username = '$txtuser' and semester = '1st' and yr_sec like '%12%' order by subj_order asc;");
$grades = mysqli_num_rows($sql);

while($row = mysqli_fetch_assoc($sql))
{
echo"<tr>

<td style = 'height: 13; width: 100; max-width: 100; font-family: Arial Narrow; font-size: 12; text-align: center; border: 2px solid black; border-right: 1.5px solid black; border-top: none; border-bottom: 1.5px solid black;'>".$row['subj_type']."</td>

<td style = 'height: 13; width: 550; max-width: 550; font-family: Arial Narrow; font-size: 12; border: 2px solid black; border-left: none; border-right: 1.5px solid black; border-top: none; border-bottom: 1.5px solid black;'>".$row['subj_desc']."</td>

<td style = 'height: 13; width: 60; max-width: 60; font-family: Arial Narrow; font-size: 12; text-align: center; border: 2px solid black; border-left: none; border-right: 1.5px solid black; border-top: none; border-bottom: 1.5px solid black;'>".$row['midterm']."</td>

<td style = 'height: 13; width: 60; max-width: 60; font-family: Arial Narrow; font-size: 12; text-align: center; border: 2px solid black; border-left: none; border-right: 1.5px solid black; border-top: none; border-bottom: 1.5px solid black;'>".$row['finals']."</td>

<td style = 'height: 13; width: 70; max-width: 70; font-family: Arial Narrow; font-size: 12; text-align: center; border: 2px solid black; border-left: none; border-right: 1.5px solid black; border-top: none; border-bottom: 1.5px solid black;'>".$row['ave']."</td>

<td style = 'height: 13; width: 60; max-width: 60; font-family: Arial Narrow; font-size: 12; text-align: center; border: 2px solid black; border-left: none; border-top: none; border-bottom: 1.5px solid black;'>".$row['remarks']."</td>

</tr>";
}


for ($x = 1; $x <= 12 - $grades; $x++)
{
echo"<tr>

<td style = 'height: 13; width: 100; max-width: 100; font-family: Arial Narrow; font-size: 12; text-align: center; border: 2px solid black; border-right: 1.5px solid black; border-top: none; border-bottom: 1.5px solid black;'></td>

<td style = 'height: 13; width: 550; max-width: 550; font-family: Arial Narrow; font-size: 12; border: 2px solid black; border-left: none; border-right: 1.5px solid black; border-top: none; border-bottom: 1.5px solid black;'></td>

<td style = 'height: 13; width: 60; max-width: 60; font-family: Arial Narrow; font-size: 12; text-align: center; border: 2px solid black; border-left: none; border-right: 1.5px solid black; border-top: none; border-bottom: 1.5px solid black;'></td>

<td style = 'height: 13; width: 60; max-width: 60; font-family: Arial Narrow; font-size: 12; text-align: center; border: 2px solid black; border-left: none; border-right: 1.5px solid black; border-top: none; border-bottom: 1.5px solid black;'></td>

<td style = 'height: 13; width: 70; max-width: 70; font-family: Arial Narrow; font-size: 12; text-align: center; border: 2px solid black; border-left: none; border-right: 1.5px solid black; border-top: none; border-bottom: 1.5px solid black;'></td>

<td style = 'height: 13; width: 60; max-width: 60; font-family: Arial Narrow; font-size: 12; text-align: center; border: 2px solid black; border-left: none; border-top: none; border-bottom: 1.5px solid black;'></td>

</tr>";
}

// General Average

$sql = mysqli_query($cn, "select AVG(ave) from grades where username = '$txtuser' and semester = '1st' and yr_sec like '%12%'");
$average = mysqli_num_rows($sql);
	
while($row = mysqli_fetch_assoc($sql))
{
echo"<tr>

<td style = 'font-weight: bold; width: 60; max-width: 60; font-family: Arial Narrow; background-color: #B2BABB; font-size: 12; text-align: center; border: 2px solid black; border-left: 2px solid black; border-right: 1px solid black; border-top: none; border-bottom: 2px solid black; text-align: right;' colspan = 4>
General Ave. for the Semester:
</td>

<td style = 'font-weight: bold; width: 60; max-width: 60; font-family: Arial Narrow; font-size: 12; text-align: center; border: 2px solid black; border-left: none; border-right: 1.5px solid black; border-top: none; border-bottom: 2px solid black;'>
".round($row['AVG(ave)'],0)."
</td>

<td style = 'width: 60; max-width: 60; font-family: Arial Narrow; font-size: 12; text-align: center; border: 2px solid black; border-left: none; border-top: none; border-bottom: 2px solid black;'>
<input type = 'text' name = 'txtremarks' id = 'txtremarks' style = 'width: 60; font-weight: bold; color: black; border: none; background-color: transparent; font-size: 12; font-family: Arial Narrow; text-align: center;' disabled>
</td>

</tr>";
}

echo"</table>";

// General Average

$sql = mysqli_query($cn, "select AVG(ave) from grades where username = '$txtuser' and semester = '1st' and yr_sec like '%12%'");
$average = mysqli_num_rows($sql);
	
while($row = mysqli_fetch_assoc($sql))
{
$genave = $row['AVG(ave)'];
$genave = round($genave,0);

if($genave >= 75)
{
echo"<script>document.getElementById('txtremarks').value = 'PASSED'</script>";
}
else
{
echo"<script>document.getElementById('txtremarks').value = 'FAILED'</script>";
}

}

?>

<table border = 1 cellspacing = 0 style = 'width: 890; border: none;'>
<tr>
<td style = 'border: none;'>

<label style = 'position: absolute; left: 10; font-size: 12; font-family: Arial Narrow; font-weight: bold;'>
REMARKS:
</label>

<input type = 'text' name = 'txtpassed' id = 'txtpassed' style = 'position: absolute; left: 65; color: black; width: 815; border: 1px solid black; border-left: none; border-top: none; border-right: none; font-size: 12;' value = 'PASSED' disabled>

<br>

<label style = 'position: absolute; left: 10; font-size: 12; font-family: Arial Narrow; font-weight: bold;'>
Prepared by: 
</label>

<label style = 'position: absolute; left: 300; font-size: 12; font-family: Arial Narrow; font-weight: bold;'>
Certified True and Correct: 
</label>

<label style = 'position: absolute; left: 740; font-size: 12; font-family: Arial Narrow; font-weight: bold;'>
Date Checked (MM/DD/YYYY): 
</label>

<img id = 'imgsign111' style = 'height: 30; width: 165; position: absolute; left: 70;' onclick = 'clrimgsign()'>

<img id = 'imgprinsign121' src = 'Principal Signature.png' style = 'height: 40; width: 90; position: absolute; left: 437;' onclick = 'clrprinsign()'>

<br>

<input list = 'adviser11' name = 'txtadviser111' id = 'txtadviser111' style = 'position: absolute; left: 10; color: black; width: 280; border: 1px solid black; border-left: none; border-top: none; border-right: none; font-size: 12; font-weight: bold; text-align: center; background-color: transparent;' onclick = 'clrsign11(), sign11()' onkeyup = 'sign11()'>

<input type = 'text' name = 'txtprincipal' id = 'txtprincipal' style = 'position: absolute; left: 340; color: black; width: 280; border: 1px solid black; border-left: none; border-top: none; border-right: none; font-size: 12; font-weight: bold; text-align: center;' value = 'Ms. Leonora T. Malibiran, School Principal' disabled>

<input type = 'text' name = 'txtdate1' id = 'txtdate1' style = 'position: absolute; left: 740; color: black; width: 140; font-size: 125; border: 1px solid black; border-left: none; border-top: none; border-right: none; font-size: 12; font-weight: bold; text-align: center;' onkeyup = 'datechk()'>

<br>

<label style = 'position: absolute; left: 75; font-size: 12; font-family: Arial Narrow;'>
Signature of Adviser over Printed Name
</label>

<label style = 'position: absolute; left: 365; font-size: 12; font-family: Arial Narrow;'>
Signature of Authorized Person over Printed Name, Designation
</label>


<br>

<label style = 'position: absolute; left: 10; font-size: 12; font-family: Arial Narrow; font-weight: bold;'>
REMEDIAL CLASSES
</label>

<label style = 'position: absolute; left: 120; font-size: 12; font-family: Arial Narrow; font-weight: bold;'>
Conducted from (MM/DD/YYYY):
</label>

<input type = 'text' name = 'txtfrom' id = 'txtfrom' style = 'position: absolute; left: 275; color: black; width: 50; border: 1px solid black; border-left: none; border-top: none; border-right: none; font-size: 12; font-weight: bold; text-align: center;'>

<label style = 'position: absolute; left: 330; font-size: 12; font-family: Arial Narrow; font-weight: bold;'>
To (MM/DD/YYYY):
</label>

<input type = 'text' name = 'txtto' id = 'txtto' style = 'position: absolute; left: 420; color: black; width: 50; border: 1px solid black; border-left: none; border-top: none; border-right: none; font-size: 12; font-weight: bold; text-align: center;'>

<label style = 'position: absolute; left: 475; font-size: 12; font-family: Arial Narrow; font-weight: bold;'>
SCHOOL:
</label>

<input type = 'text' name = 'txtschrem' id = 'txtschrem' style = 'position: absolute; left: 525; color: black; width: 240; border: 1px solid black; border-left: none; border-top: none; border-right: none; font-size: 12; font-weight: bold; text-align: center;'>

<label style = 'position: absolute; left: 770; font-size: 12; font-family: Arial Narrow; font-weight: bold;'>
SCHOOL ID:
</label>

<input type = 'text' name = 'txtfrom' id = 'txtfrom' style = 'position: absolute; left: 830; color: black; width: 50; border: 1px solid black; border-left: none; border-top: none; border-right: none; font-size: 12; font-weight: bold; text-align: center;'>

</td>
</tr>
</table>

<br>

<table border = 1 cellspacing = 0 style = 'width: 880; border: none;'>
<tr>

<th style = 'width: 100; max-width: 100; font-family: Arial Narrow; font-size: 12; background-color: #B2BABB; border: 2px solid black; border-right: 1.5px solid black; border-bottom: 1.5px solid black;'>
Indicate if Subject is CORE, APPLIED, or SPECIALIZED
</th>
<th style = 'width: 550; max-width: 550; font-family: Arial Narrow; font-size: 12; background-color: #B2BABB; border: 2px solid black; border-left: none; border-right: 1.5px solid black; border-bottom: 1.5px solid black;'>
SUBJECTS
</th>
<th style = 'width: 60; max-width: 60; font-family: Arial Narrow; font-size: 12; background-color: #B2BABB; border: 2px solid black; border-left: none; border-right: 1.5px solid black; border-bottom: 1.5px solid black;'>
SEM FINAL GRADE
</th>
<th style = 'width: 60; max-width: 60; font-family: Arial Narrow; font-size: 12; background-color: #B2BABB; border: 2px solid black; border-left: none; border-right: 1.5px solid black; border-bottom: 1.5px solid black;'>
REMEDIAL CLASS MARK
</th>
<th style = 'width: 70; max-width: 70; font-family: Arial Narrow; font-size: 12; background-color: #B2BABB; border: 2px solid black; border-left: none; border-right: 1.5px solid black; border-bottom: 1.5px solid black;'>
RECOMPUTED FINAL GRADE
</th>
<th style = 'width: 60; max-width: 60; font-family: Arial Narrow; font-size: 12; background-color: #B2BABB; border: 2px solid black; border-left: none; border-bottom: 1.5px solid black;'>
ACTION TAKEN
</th>
</tr>

<tr>

<td style = 'height: 13; width: 100; max-width: 100; font-family: Arial Narrow; font-size: 12; text-align: center; border: 2px solid black; border-right: 1.5px solid black; border-top: none; border-bottom: 1.5px solid black;'></td>

<td style = 'height: 13; width: 550; max-width: 550; font-family: Arial Narrow; font-size: 12; border: 2px solid black; border-left: none; border-right: 1.5px solid black; border-top: none; border-bottom: 1.5px solid black;'></td>

<td style = 'height: 13; width: 60; max-width: 60; font-family: Arial Narrow; font-size: 12; text-align: center; border: 2px solid black; border-left: none; border-right: 1.5px solid black; border-top: none; border-bottom: 1.5px solid black;'></td>

<td style = 'height: 13; width: 60; max-width: 60; font-family: Arial Narrow; font-size: 12; text-align: center; border: 2px solid black; border-left: none; border-right: 1.5px solid black; border-top: none; border-bottom: 1.5px solid black;'></td>

<td style = 'height: 13; width: 70; max-width: 70; font-family: Arial Narrow; font-size: 12; text-align: center; border: 2px solid black; border-left: none; border-right: 1.5px solid black; border-top: none; border-bottom: 1.5px solid black;'></td>

<td style = 'height: 13; width: 60; max-width: 60; font-family: Arial Narrow; font-size: 12; text-align: center; border: 2px solid black; border-left: none; border-top: none; border-bottom: 1.5px solid black;'></td>

</tr>

<tr>

<td style = 'height: 13; width: 100; max-width: 100; font-family: Arial Narrow; font-size: 12; text-align: center; border: 2px solid black; border-right: 1.5px solid black; border-top: none; border-bottom: 1.5px solid black;'></td>

<td style = 'height: 13; width: 550; max-width: 550; font-family: Arial Narrow; font-size: 12; border: 2px solid black; border-left: none; border-right: 1.5px solid black; border-top: none; border-bottom: 1.5px solid black;'></td>

<td style = 'height: 13; width: 60; max-width: 60; font-family: Arial Narrow; font-size: 12; text-align: center; border: 2px solid black; border-left: none; border-right: 1.5px solid black; border-top: none; border-bottom: 1.5px solid black;'></td>

<td style = 'height: 13; width: 60; max-width: 60; font-family: Arial Narrow; font-size: 12; text-align: center; border: 2px solid black; border-left: none; border-right: 1.5px solid black; border-top: none; border-bottom: 1.5px solid black;'></td>

<td style = 'height: 13; width: 70; max-width: 70; font-family: Arial Narrow; font-size: 12; text-align: center; border: 2px solid black; border-left: none; border-right: 1.5px solid black; border-top: none; border-bottom: 1.5px solid black;'></td>

<td style = 'height: 13; width: 60; max-width: 60; font-family: Arial Narrow; font-size: 12; text-align: center; border: 2px solid black; border-left: none; border-top: none; border-bottom: 1.5px solid black;'></td>

</tr>

<tr>

<td style = 'height: 13; width: 100; max-width: 100; font-family: Arial Narrow; font-size: 12; text-align: center; border: 2px solid black; border-right: 1.5px solid black; border-top: none; border-bottom: 1.5px solid black;'></td>

<td style = 'height: 13; width: 550; max-width: 550; font-family: Arial Narrow; font-size: 12; border: 2px solid black; border-left: none; border-right: 1.5px solid black; border-top: none; border-bottom: 1.5px solid black;'></td>

<td style = 'height: 13; width: 60; max-width: 60; font-family: Arial Narrow; font-size: 12; text-align: center; border: 2px solid black; border-left: none; border-right: 1.5px solid black; border-top: none; border-bottom: 1.5px solid black;'></td>

<td style = 'height: 13; width: 60; max-width: 60; font-family: Arial Narrow; font-size: 12; text-align: center; border: 2px solid black; border-left: none; border-right: 1.5px solid black; border-top: none; border-bottom: 1.5px solid black;'></td>

<td style = 'height: 13; width: 70; max-width: 70; font-family: Arial Narrow; font-size: 12; text-align: center; border: 2px solid black; border-left: none; border-right: 1.5px solid black; border-top: none; border-bottom: 1.5px solid black;'></td>

<td style = 'height: 13; width: 60; max-width: 60; font-family: Arial Narrow; font-size: 12; text-align: center; border: 2px solid black; border-left: none; border-top: none; border-bottom: 1.5px solid black;'></td>

</tr>

<tr>

<td style = 'height: 13; width: 100; max-width: 100; font-family: Arial Narrow; font-size: 12; text-align: center; border: 2px solid black; border-right: 1.5px solid black; border-top: none; border-bottom: 1.5px solid black;'></td>

<td style = 'height: 13; width: 550; max-width: 550; font-family: Arial Narrow; font-size: 12; border: 2px solid black; border-left: none; border-right: 1.5px solid black; border-top: none; border-bottom: 1.5px solid black;'></td>

<td style = 'height: 13; width: 60; max-width: 60; font-family: Arial Narrow; font-size: 12; text-align: center; border: 2px solid black; border-left: none; border-right: 1.5px solid black; border-top: none; border-bottom: 1.5px solid black;'></td>

<td style = 'height: 13; width: 60; max-width: 60; font-family: Arial Narrow; font-size: 12; text-align: center; border: 2px solid black; border-left: none; border-right: 1.5px solid black; border-top: none; border-bottom: 1.5px solid black;'></td>

<td style = 'height: 13; width: 70; max-width: 70; font-family: Arial Narrow; font-size: 12; text-align: center; border: 2px solid black; border-left: none; border-right: 1.5px solid black; border-top: none; border-bottom: 1.5px solid black;'></td>

<td style = 'height: 13; width: 60; max-width: 60; font-family: Arial Narrow; font-size: 12; text-align: center; border: 2px solid black; border-left: none; border-top: none; border-bottom: 1.5px solid black;'></td>

</tr>

</table>

<table border = 1 cellspacing = 0 style = 'width: 890; border: none;'>
<tr>
<td style = 'border: none;'>

<label style = 'position: absolute; left: 10; font-size: 12; font-family: Arial Narrow;'>
Name of Teacher/Adviser:
</label>

<input type = 'text' name = 'txtteacher' id = 'txtteacher' style = 'position: absolute; left: 125; color: black; width: 520; border: 1px solid black; border-left: none; border-top: none; border-right: none; font-size: 12;'>

<label style = 'position: absolute; left: 650; font-size: 12; font-family: Arial Narrow;'>
Signature:
</label>

<input type = 'text' name = 'txtsign' id = 'txtsign' style = 'position: absolute; left: 700; color: black; width: 180; border: 1px solid black; border-left: none; border-top: none; border-right: none; font-size: 12;'>

</td>
</tr>
</table>

<br><br>

<table border = 1 cellspacing = 0 style = 'border-color: transparent; width: 880;'>
<tr>
<td style = 'width: 100; max-width: 100; font-family: Arial Narrow; font-size: 12; border: none;'>

&nbsp;&nbsp;&nbsp;

<label style = 'font-size: 12; font-family: Arial Narrow; font-weight: bold;'>
SCHOOL:
</label>

<input type = 'text' name = 'txtschool2' id = 'txtschool2' style = 'color: black; font-weight: bold; width: 340; border: 1px solid black; border-left: none; border-top: none; border-right: none; font-size: 12;' disabled>

<label style = 'font-size: 12; font-family: Arial Narrow; font-weight: bold;'>
SCHOOL ID:
</label>

<input type = 'text' name = 'txtschoolid2' id = 'txtschoolid2' style = 'color: black; font-weight: bold; width: 100; border: 1px solid black; border-left: none; border-top: none; border-right: none; font-size: 12;' disabled>

<label style = 'font-size: 12; font-family: Arial Narrow; font-weight: bold;'>
GRADE LEVEL:
</label>

<input type = 'text' style = 'color: black; font-weight: bold; width: 50; border: 1px solid black; border-left: none; border-top: none; border-right: none; font-size: 12;' value = '12' disabled>

<label style = 'font-size: 12; font-family: Arial Narrow; font-weight: bold;'>
SY:
</label>

<input type = 'text' name = 'txtsy2' id = 'txtsy2' style = 'color: black; font-weight: bold; width: 90; border: 1px solid black; border-left: none; border-top: none; border-right: none; font-size: 12;' disabled>

<label style = 'font-size: 12; font-family: Arial Narrow; font-weight: bold;'>
SEM:
</label>

<input type = 'text' style = 'color: black; font-weight: bold; width: 42; border: 1px solid black; border-left: none; border-top: none; border-right: none; font-size: 12;' value = '2ND' disabled>

<br>

&nbsp;&nbsp;&nbsp;

<label style = 'font-size: 12; font-family: Arial Narrow; font-weight: bold;'>
TRACK/STRAND:
</label>

<input type = 'text' name = 'txtstrand2' id = 'txtstrand2' style = 'color: black; font-weight: bold; width: 480; border: 1px solid black; border-left: none; border-top: none; border-right: none; font-size: 12;' disabled>

&nbsp;&nbsp;&nbsp;&nbsp;

<label style = 'font-size: 12; font-family: Arial Narrow; font-weight: bold;'>
SECTION:
</label>

<input type = 'text' name = 'txtsec2' id = 'txtsec2' style = 'color: black; font-weight: bold; width: 230; border: 1px solid black; border-left: none; border-top: none; border-right: none; font-size: 12;' disabled>

</td>
</tr>
</table>

<?php

$cn = mysqli_connect('localhost', 'root', '', 'gmcbulac_db_gmc');
//$cn = mysqli_connect('localhost', 'gmcbulac_derek03', 'derek030872', 'gmcbulac_db_gmc');

$txtuser = $_POST['txtuser'];

// 2nd Semester
	
echo"<table border = 1 cellspacing = 0 style = 'width: 880; border: none;'>";

echo"<tr>

<th style = 'width: 100; max-width: 100; font-family: Arial Narrow; font-size: 12; background-color: #B2BABB; border: 2px solid black; border-right: 1.5px solid black; border-bottom: 1.5px solid black;' rowspan = 2>
Indicate if Subject is CORE, APPLIED, or SPECIALIZED
</th>

<th style = 'width: 550; max-width: 550; font-family: Arial Narrow; font-size: 12; background-color: #B2BABB; border: 2px solid black; border-left: none; border-right: 1.5px solid black; border-bottom: 1.5px solid black;' rowspan = 2>
SUBJECTS
</th>

<th style = 'width: 120; max-width: 120; font-family: Arial Narrow; font-size: 12; background-color: #B2BABB; border: 2px solid black; border-left: none; border-right: 1.5px solid black; border-bottom: none;' colspan = 2>
Quarter
</th>

<th style = 'width: 70; max-width: 70; font-family: Arial Narrow; font-size: 12; background-color: #B2BABB; border: 2px solid black; border-left: none; border-right: 1.5px solid black; border-bottom: 1.5px solid black;' rowspan = 2>
SEM FINAL GRADE
</th>

<th style = 'width: 60; max-width: 60; font-family: Arial Narrow; font-size: 12; background-color: #B2BABB; border: 2px solid black; border-left: none; border-bottom: 1.5px solid black;' rowspan = 2>
ACTION TAKEN
</th>

</tr>";

echo"<tr>

<th style = 'width: 60; max-width: 60; font-family: Arial Narrow; font-size: 12; background-color: #B2BABB; border: 2px solid black; border-left: none; border-right: 1.5px solid black; border-bottom: 1.5px solid black; border-top: 1.5px solid black;'>
3RD
</th>

<th style = 'width: 60; max-width: 60; font-family: Arial Narrow; font-size: 12; background-color: #B2BABB; border: 2px solid black; border-left: none; border-right: 1.5px solid black; border-bottom: 1.5px solid black; border-top: 1.5px solid black;'>
4TH
</th>

</tr>";

// 2nd Semester
$sql = mysqli_query($cn, "select * from grades where username = '$txtuser' and semester = '2nd' and yr_sec like '%12%' order by subj_order asc;");
$grades = mysqli_num_rows($sql);

while($row = mysqli_fetch_assoc($sql))
{
echo"<tr>

<td style = 'height: 13; width: 100; max-width: 100; font-family: Arial Narrow; font-size: 12; text-align: center; border: 2px solid black; border-right: 1.5px solid black; border-top: none; border-bottom: 1.5px solid black;'>".$row['subj_type']."</td>

<td style = 'height: 13; width: 550; max-width: 550; font-family: Arial Narrow; font-size: 12; border: 2px solid black; border-left: none; border-right: 1.5px solid black; border-top: none; border-bottom: 1.5px solid black;'>".$row['subj_desc']."</td>

<td style = 'height: 13; width: 60; max-width: 60; font-family: Arial Narrow; font-size: 12; text-align: center; border: 2px solid black; border-left: none; border-right: 1.5px solid black; border-top: none; border-bottom: 1.5px solid black;'>".$row['midterm']."</td>

<td style = 'height: 13; width: 60; max-width: 60; font-family: Arial Narrow; font-size: 12; text-align: center; border: 2px solid black; border-left: none; border-right: 1.5px solid black; border-top: none; border-bottom: 1.5px solid black;'>".$row['finals']."</td>

<td style = 'height: 13; width: 70; max-width: 70; font-family: Arial Narrow; font-size: 12; text-align: center; border: 2px solid black; border-left: none; border-right: 1.5px solid black; border-top: none; border-bottom: 1.5px solid black;'>".$row['ave']."</td>

<td style = 'height: 13; width: 60; max-width: 60; font-family: Arial Narrow; font-size: 12; text-align: center; border: 2px solid black; border-left: none; border-top: none; border-bottom: 1.5px solid black;'>".$row['remarks']."</td>

</tr>";
}


for ($x = 1; $x <= 12 - $grades; $x++)
{
echo"<tr>

<td style = 'height: 13; width: 100; max-width: 100; font-family: Arial Narrow; font-size: 12; text-align: center; border: 2px solid black; border-right: 1.5px solid black; border-top: none; border-bottom: 1.5px solid black;'></td>

<td style = 'height: 13; width: 550; max-width: 550; font-family: Arial Narrow; font-size: 12; border: 2px solid black; border-left: none; border-right: 1.5px solid black; border-top: none; border-bottom: 1.5px solid black;'></td>

<td style = 'height: 13; width: 60; max-width: 60; font-family: Arial Narrow; font-size: 12; text-align: center; border: 2px solid black; border-left: none; border-right: 1.5px solid black; border-top: none; border-bottom: 1.5px solid black;'></td>

<td style = 'height: 13; width: 60; max-width: 60; font-family: Arial Narrow; font-size: 12; text-align: center; border: 2px solid black; border-left: none; border-right: 1.5px solid black; border-top: none; border-bottom: 1.5px solid black;'></td>

<td style = 'height: 13; width: 70; max-width: 70; font-family: Arial Narrow; font-size: 12; text-align: center; border: 2px solid black; border-left: none; border-right: 1.5px solid black; border-top: none; border-bottom: 1.5px solid black;'></td>

<td style = 'height: 13; width: 60; max-width: 60; font-family: Arial Narrow; font-size: 12; text-align: center; border: 2px solid black; border-left: none; border-top: none; border-bottom: 1.5px solid black;'></td>

</tr>";
}

// General Average

$sql = mysqli_query($cn, "select AVG(ave) from grades where username = '$txtuser' and semester = '2nd' and yr_sec like '%12%'");
$average = mysqli_num_rows($sql);
	
while($row = mysqli_fetch_assoc($sql))
{
echo"<tr>

<td style = 'font-weight: bold; width: 60; max-width: 60; font-family: Arial Narrow; background-color: #B2BABB; font-size: 12; text-align: center; border: 2px solid black; border-left: 2px solid black; border-right: 1px solid black; border-top: none; border-bottom: 2px solid black; text-align: right;' colspan = 4>
General Ave. for the Semester:
</td>

<td style = 'font-weight: bold; width: 60; max-width: 60; font-family: Arial Narrow; font-size: 12; text-align: center; border: 2px solid black; border-left: none; border-right: 1.5px solid black; border-top: none; border-bottom: 2px solid black;'>
<input type = 'text' id = 'txtave122' value = ".round($row['AVG(ave)'],0)." style = 'font-weight: bold; width: 50; text-align: center; font-family: Arial Narrow; font-size: 12; border: none;' readonly>
</td>

<td style = 'width: 60; max-width: 60; font-family: Arial Narrow; font-size: 12; text-align: center; border: 2px solid black; border-left: none; border-top: none; border-bottom: 2px solid black;'>
<input type = 'text' name = 'txtremarks2' id = 'txtremarks2' style = 'width: 60; font-weight: bold; color: black; border: none; background-color: transparent; font-size: 12; font-family: Arial Narrow; text-align: center;' readonly>
</td>

</tr>";
}

echo"</table>";

// General Average

$sql = mysqli_query($cn, "select AVG(ave) from grades where username = '$txtuser' and semester = '2nd' and yr_sec like '%12%'");
$average = mysqli_num_rows($sql);
	
while($row = mysqli_fetch_assoc($sql))
{
$genave = $row['AVG(ave)'];
$genave = round($genave,0);

if($genave >= 75)
{
echo"<script>document.getElementById('txtremarks2').value = 'PASSED'</script>";
}
else
{
echo"<script>document.getElementById('txtremarks2').value = 'FAILED'</script>";
}

}

echo"<script>
if(document.getElementById('txtave122').value == 0)
{
document.getElementById('txtave122').value = ''
document.getElementById('txtremarks2').value = ''
}
</script>";

?>

<table border = 1 cellspacing = 0 style = 'width: 890; border: none;'>
<tr>
<td style = 'border: none;'>

<label style = 'position: absolute; left: 10; font-size: 12; font-family: Arial Narrow; font-weight: bold;'>
REMARKS:
</label>

<input type = 'text' name = 'txtpassed' id = 'txtpassed' style = 'position: absolute; left: 65; color: black; width: 815; border: 1px solid black; border-left: none; border-top: none; border-right: none; font-size: 12;' value = 'PASSED' disabled>

<br>

<label style = 'position: absolute; left: 10; font-size: 12; font-family: Arial Narrow; font-weight: bold;'>
Prepared by: 
</label>

<label style = 'position: absolute; left: 300; font-size: 12; font-family: Arial Narrow; font-weight: bold;'>
Certified True and Correct: 
</label>

<label style = 'position: absolute; left: 740; font-size: 12; font-family: Arial Narrow; font-weight: bold;'>
Date Checked (MM/DD/YYYY): 
</label>

<img id = 'imgsign112' style = 'height: 30; width: 165; position: absolute; left: 70;'>

<img id = 'imgprinsign122' src = 'Principal Signature.png' style = 'height: 40; width: 90; position: absolute; left: 437;'>

<br>

<input type = 'text' name = 'txtadviser112' id = 'txtadviser112' style = 'position: absolute; left: 10; color: black; width: 280; border: 1px solid black; border-left: none; border-top: none; border-right: none; font-size: 12; font-weight: bold; text-align: center;'  disabled>

<input type = 'text' name = 'txtprincipal' id = 'txtprincipal' style = 'position: absolute; left: 340; color: black; width: 280; border: 1px solid black; border-left: none; border-top: none; border-right: none; font-size: 12; font-weight: bold; text-align: center;'  value = 'Ms. Leonora T. Malibiran, School Principal' disabled>

<input type = 'text' name = 'txtdate2' id = 'txtdate2' style = 'position: absolute; left: 740; color: black; width: 140; font-size: 125; border: 1px solid black; border-left: none; border-top: none; border-right: none; font-size: 12; font-weight: bold; text-align: center;' readonly>

<br>

<label style = 'position: absolute; left: 75; font-size: 12; font-family: Arial Narrow;'>
Signature of Adviser over Printed Name
</label>

<label style = 'position: absolute; left: 365; font-size: 12; font-family: Arial Narrow;'>
Signature of Authorized Person over Printed Name, Designation
</label>


<br>

<label style = 'position: absolute; left: 10; font-size: 12; font-family: Arial Narrow; font-weight: bold;'>
REMEDIAL CLASSES
</label>

<label style = 'position: absolute; left: 120; font-size: 12; font-family: Arial Narrow; font-weight: bold;'>
Conducted from (MM/DD/YYYY):
</label>

<input type = 'text' name = 'txtfrom' id = 'txtfrom' style = 'position: absolute; left: 275; color: black; width: 50; border: 1px solid black; border-left: none; border-top: none; border-right: none; font-size: 12; font-weight: bold; text-align: center;'>

<label style = 'position: absolute; left: 330; font-size: 12; font-family: Arial Narrow; font-weight: bold;'>
To (MM/DD/YYYY):
</label>

<input type = 'text' name = 'txtto' id = 'txtto' style = 'position: absolute; left: 420; color: black; width: 50; border: 1px solid black; border-left: none; border-top: none; border-right: none; font-size: 12; font-weight: bold; text-align: center;'>

<label style = 'position: absolute; left: 475; font-size: 12; font-family: Arial Narrow; font-weight: bold;'>
SCHOOL:
</label>

<input type = 'text' name = 'txtschrem' id = 'txtschrem' style = 'position: absolute; left: 525; color: black; width: 240; border: 1px solid black; border-left: none; border-top: none; border-right: none; font-size: 12; font-weight: bold; text-align: center;'>

<label style = 'position: absolute; left: 770; font-size: 12; font-family: Arial Narrow; font-weight: bold;'>
SCHOOL ID:
</label>

<input type = 'text' name = 'txtfrom' id = 'txtfrom' style = 'position: absolute; left: 830; color: black; width: 50; border: 1px solid black; border-left: none; border-top: none; border-right: none; font-size: 12; font-weight: bold; text-align: center;'>

</td>
</tr>
</table>

<br>

<table border = 1 cellspacing = 0 style = 'width: 880; border: none;'>
<tr>

<th style = 'width: 100; max-width: 100; font-family: Arial Narrow; font-size: 12; background-color: #B2BABB; border: 2px solid black; border-right: 1.5px solid black; border-bottom: 1.5px solid black;'>
Indicate if Subject is CORE, APPLIED, or SPECIALIZED
</th>
<th style = 'width: 550; max-width: 550; font-family: Arial Narrow; font-size: 12; background-color: #B2BABB; border: 2px solid black; border-left: none; border-right: 1.5px solid black; border-bottom: 1.5px solid black;'>
SUBJECTS
</th>
<th style = 'width: 60; max-width: 60; font-family: Arial Narrow; font-size: 12; background-color: #B2BABB; border: 2px solid black; border-left: none; border-right: 1.5px solid black; border-bottom: 1.5px solid black;'>
SEM FINAL GRADE
</th>
<th style = 'width: 60; max-width: 60; font-family: Arial Narrow; font-size: 12; background-color: #B2BABB; border: 2px solid black; border-left: none; border-right: 1.5px solid black; border-bottom: 1.5px solid black;'>
REMEDIAL CLASS MARK
</th>
<th style = 'width: 70; max-width: 70; font-family: Arial Narrow; font-size: 12; background-color: #B2BABB; border: 2px solid black; border-left: none; border-right: 1.5px solid black; border-bottom: 1.5px solid black;'>
RECOMPUTED FINAL GRADE
</th>
<th style = 'width: 60; max-width: 60; font-family: Arial Narrow; font-size: 12; background-color: #B2BABB; border: 2px solid black; border-left: none; border-bottom: 1.5px solid black;'>
ACTION TAKEN
</th>
</tr>

<tr>

<td style = 'height: 13; width: 100; max-width: 100; font-family: Arial Narrow; font-size: 12; text-align: center; border: 2px solid black; border-right: 1.5px solid black; border-top: none; border-bottom: 1.5px solid black;'></td>

<td style = 'height: 13; width: 550; max-width: 550; font-family: Arial Narrow; font-size: 12; border: 2px solid black; border-left: none; border-right: 1.5px solid black; border-top: none; border-bottom: 1.5px solid black;'></td>

<td style = 'height: 13; width: 60; max-width: 60; font-family: Arial Narrow; font-size: 12; text-align: center; border: 2px solid black; border-left: none; border-right: 1.5px solid black; border-top: none; border-bottom: 1.5px solid black;'></td>

<td style = 'height: 13; width: 60; max-width: 60; font-family: Arial Narrow; font-size: 12; text-align: center; border: 2px solid black; border-left: none; border-right: 1.5px solid black; border-top: none; border-bottom: 1.5px solid black;'></td>

<td style = 'height: 13; width: 70; max-width: 70; font-family: Arial Narrow; font-size: 12; text-align: center; border: 2px solid black; border-left: none; border-right: 1.5px solid black; border-top: none; border-bottom: 1.5px solid black;'></td>

<td style = 'height: 13; width: 60; max-width: 60; font-family: Arial Narrow; font-size: 12; text-align: center; border: 2px solid black; border-left: none; border-top: none; border-bottom: 1.5px solid black;'></td>

</tr>

<tr>

<td style = 'height: 13; width: 100; max-width: 100; font-family: Arial Narrow; font-size: 12; text-align: center; border: 2px solid black; border-right: 1.5px solid black; border-top: none; border-bottom: 1.5px solid black;'></td>

<td style = 'height: 13; width: 550; max-width: 550; font-family: Arial Narrow; font-size: 12; border: 2px solid black; border-left: none; border-right: 1.5px solid black; border-top: none; border-bottom: 1.5px solid black;'></td>

<td style = 'height: 13; width: 60; max-width: 60; font-family: Arial Narrow; font-size: 12; text-align: center; border: 2px solid black; border-left: none; border-right: 1.5px solid black; border-top: none; border-bottom: 1.5px solid black;'></td>

<td style = 'height: 13; width: 60; max-width: 60; font-family: Arial Narrow; font-size: 12; text-align: center; border: 2px solid black; border-left: none; border-right: 1.5px solid black; border-top: none; border-bottom: 1.5px solid black;'></td>

<td style = 'height: 13; width: 70; max-width: 70; font-family: Arial Narrow; font-size: 12; text-align: center; border: 2px solid black; border-left: none; border-right: 1.5px solid black; border-top: none; border-bottom: 1.5px solid black;'></td>

<td style = 'height: 13; width: 60; max-width: 60; font-family: Arial Narrow; font-size: 12; text-align: center; border: 2px solid black; border-left: none; border-top: none; border-bottom: 1.5px solid black;'></td>

</tr>

<tr>

<td style = 'height: 13; width: 100; max-width: 100; font-family: Arial Narrow; font-size: 12; text-align: center; border: 2px solid black; border-right: 1.5px solid black; border-top: none; border-bottom: 1.5px solid black;'></td>

<td style = 'height: 13; width: 550; max-width: 550; font-family: Arial Narrow; font-size: 12; border: 2px solid black; border-left: none; border-right: 1.5px solid black; border-top: none; border-bottom: 1.5px solid black;'></td>

<td style = 'height: 13; width: 60; max-width: 60; font-family: Arial Narrow; font-size: 12; text-align: center; border: 2px solid black; border-left: none; border-right: 1.5px solid black; border-top: none; border-bottom: 1.5px solid black;'></td>

<td style = 'height: 13; width: 60; max-width: 60; font-family: Arial Narrow; font-size: 12; text-align: center; border: 2px solid black; border-left: none; border-right: 1.5px solid black; border-top: none; border-bottom: 1.5px solid black;'></td>

<td style = 'height: 13; width: 70; max-width: 70; font-family: Arial Narrow; font-size: 12; text-align: center; border: 2px solid black; border-left: none; border-right: 1.5px solid black; border-top: none; border-bottom: 1.5px solid black;'></td>

<td style = 'height: 13; width: 60; max-width: 60; font-family: Arial Narrow; font-size: 12; text-align: center; border: 2px solid black; border-left: none; border-top: none; border-bottom: 1.5px solid black;'></td>

</tr>

<tr>

<td style = 'height: 13; width: 100; max-width: 100; font-family: Arial Narrow; font-size: 12; text-align: center; border: 2px solid black; border-right: 1.5px solid black; border-top: none; border-bottom: 2px solid black;'></td>

<td style = 'height: 13; width: 550; max-width: 550; font-family: Arial Narrow; font-size: 12; border: 2px solid black; border-left: none; border-right: 1.5px solid black; border-top: none; border-bottom: 2px solid black;'></td>

<td style = 'height: 13; width: 60; max-width: 60; font-family: Arial Narrow; font-size: 12; text-align: center; border: 2px solid black; border-left: none; border-right: 1.5px solid black; border-top: none; border-bottom: 2px solid black;'></td>

<td style = 'height: 13; width: 60; max-width: 60; font-family: Arial Narrow; font-size: 12; text-align: center; border: 2px solid black; border-left: none; border-right: 1.5px solid black; border-top: none; border-bottom: 2px solid black;'></td>

<td style = 'height: 13; width: 70; max-width: 70; font-family: Arial Narrow; font-size: 12; text-align: center; border: 2px solid black; border-left: none; border-right: 1.5px solid black; border-top: none; border-bottom: 2px solid black;'></td>

<td style = 'height: 13; width: 60; max-width: 60; font-family: Arial Narrow; font-size: 12; text-align: center; border: 2px solid black; border-left: none; border-top: none; border-bottom: 2px solid black;'></td>

</tr>

</table>

<table border = 1 cellspacing = 0 style = 'width: 890; border: none;'>
<tr>
<td style = 'border: none;'>

<label style = 'position: absolute; left: 10; font-size: 12; font-family: Arial Narrow;'>
Name of Teacher/Adviser:
</label>

<input type = 'text' name = 'txtteacher' id = 'txtteacher' style = 'position: absolute; left: 125; color: black; width: 520; border: 1px solid black; border-left: none; border-top: none; border-right: none; font-size: 12;'>

<label style = 'position: absolute; left: 650; font-size: 12; font-family: Arial Narrow;'>
Signature:
</label>

<input type = 'text' name = 'txtsign' id = 'txtsign' style = 'position: absolute; left: 700; color: black; width: 180; border: 1px solid black; border-left: none; border-top: none; border-right: none; font-size: 12;'>

</td>
</tr>
</table>

<br>

<table border = 1 cellspacing = 0 style = 'width: 880; border: none;'>

<tr>
<td style = 'height: 15; width: 100; max-width: 100; font-family: Arial Narrow; font-size: 12; background-color: #B2BABB; border: none;'>
</td>
</tr>

<tr>
<td style = 'border: none;'>

<label style = 'position: absolute; left: 10; font-size: 12; font-family: Arial Narrow; font-weight: bold;'>
Track/Strand Accomplished:
</label>

<input list = 'strand' name = 'txtstrand3' id = 'txtstrand3' style = 'position: absolute; left: 145; color: black; width: 580; border: 1px solid black; border-left: none; border-top: none; border-right: none; font-size: 12; font-weight: bold; background-color: transparent;' onclick = 'clrstrand()'>

<label style = 'position: absolute; left: 730; font-size: 12; font-family: Arial Narrow; font-weight: bold;'>
SHS General Average:
</label>

<input type = 'text' name = 'txtgenave' id = 'txtgenave' style = 'position: absolute; left: 835; color: black; width: 45; border: 1px solid black; border-left: none; border-top: none; border-right: none; font-size: 12; font-weight: bold; text-align: center; font-family: Arial Narrow;' readonly>

<br>

<label style = 'position: absolute; left: 10; font-size: 12; font-family: Arial Narrow; font-weight: bold;'>
Awards/Honors Received:
</label>

<input type = 'text' name = 'txtaward' id = 'txtaward' style = 'position: absolute; left: 140; color: black; width: 450; border: 1px solid black; border-left: none; border-top: none; border-right: none; font-size: 12; font-weight: bold; font-family: Arial Narrow;'>

<label style = 'position: absolute; left: 600; font-size: 12; font-family: Arial Narrow; font-weight: bold;'>
Date of SHS Graduation (MM/DD/YYYY):
</label>

<input type = 'text' name = 'txtgraddate' id = 'txtgraddate' style = 'position: absolute; left: 790; color: black; width: 88; border: 1px solid black; border-left: none; border-top: none; border-right: none; font-size: 12; font-weight: bold; text-align: center; font-family: Arial Narrow;'>

<br>

<label style = 'position: absolute; left: 10; font-size: 12; font-family: Arial Narrow; font-weight: bold;'>
Certified by:
</label>

<input type = 'text' name = 'txtseal' id = 'txtseal' style = 'position: absolute; left: 520; color: black; width: 5; height: 190; border: 1px solid black;  border-top: none; border-right: none; border-bottom: none; font-size: 12;  text-align: center; font-family: Arial Narrow; font-weight: bold;' disabled>

<label style = 'position: absolute; left: 525; font-size: 12; font-family: Arial Narrow; font-weight: bold;'>
Place School Seal Here:
</label>


<br>

<img id = 'imgprinsign123' src = 'Principal Signature.png' style = 'height: 40; width: 90; position: absolute; left: 60;' onclick = 'clrprinsign()'>

<br>

<input type = 'text' name = 'txtprincipal' id = 'txtprincipal' style = 'position: absolute; left: 10; color: black; width: 200; border: 1px solid black; border-left: none; border-top: none; border-right: none; font-size: 12;  text-align: center; font-family: Arial Narrow;' value = 'Ms. Leonora T. Malibiran' disabled>

<input type = 'text' name = 'txtdate' id = 'txtdate' style = 'position: absolute; left: 250; color: black; width: 100; border: 1px solid black; border-left: none; border-top: none; border-right: none; font-size: 12;  text-align: center; font-family: Arial Narrow;'>

<br>

<label style = 'position: absolute; left: 25; font-size: 12; font-family: Arial Narrow;'>
Signature of School Head over Printed Name
</label>


<label style = 'position: absolute; left: 290; font-size: 12; font-family: Arial Narrow;'>
Date
</label>

</td>

</tr>
</table>

<br>

<table border = 1 cellspacing = 0 style = 'width: 200; border: none;'>

<tr>
<th style = 'border: none; position: absolute; left: 10; font-size: 12; font-family: Arial Narrow; width: 200; max-width: 200; text-align: left;'>
NOTE:
</th>
</tr>

<tr>
<td style = 'border: 1px solid black; position: absolute; left: 10; font-size: 12; font-family: Arial Narrow;  width: 490; max-width: 490; text-align: left; overflow: hidden; font-style: italic;'>
<br>
This permanent record or a photocopy of this permanent record that bears the seal of the school and the original signature in ink of the School Head shall be considered valid for all legal purposes. Any erasure or alteration made on this copy should be validated by the School Head.
<br>
If the student transfers to another school, the originating school should produce one (1) certified true copy of this permanent record for safekeeping. The receiving school shall continue filling up the original form.
<br>
Upon graduation, the school from which the student graduated should keep the original form and produce one (1) certified true copy for the Division Office.
</td>


</tr>
</table>

<br><br><br><br><br><br><br>

<table border = 1 cellspacing = 0 style = 'width: 880; border: none;'>
<tr>
<td style = 'border: none;'>

<label style = 'position: absolute; left: 10; font-size: 12; font-family: Arial Narrow; font-weight: bold;'>
REMARKS:
</label>

<input type = 'text' name = 'txtpurpose' id = 'txtpurpose' style = 'position: absolute; left: 65; text-align: left; width: 360; font-size: 12; font-family: Arial Narrow; font-weight: bold; border: none; font-style: italic;' placeholder = '(Please indicate the purpose for which this permanent record will be used)'>

<br><br>

<label style = 'position: absolute; left: 15; font-size: 12; font-family: Arial Narrow; font-weight: bold;'>
Date Issued (MM/DD/YYYY):
</label>

<input type = 'text' name = 'txtdate' id = 'txtdate' style = 'position: absolute; left: 150; color: black; width: 100; border: 1px solid black; border-left: none; border-top: none; border-right: none; font-size: 12;  text-align: center; font-family: Arial Narrow;'>

<br><br>

</td>
</tr>
</table>


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
	
$txtuser = $_POST['txtuser'];
	
$sql = mysqli_query($cn, "select * from student_information where username = '$txtuser'");
$username = mysqli_num_rows($sql);
	
while($row = mysqli_fetch_assoc($sql))
{
echo"<script>document.getElementById('txtlearnersname').value = '$row[learners_name]'</script>";

echo"<script>document.getElementById('txtschool').value = '$row[school]'</script>";
echo"<script>document.getElementById('txtschool2').value = '$row[school]'</script>";

echo"<script>document.getElementById('txtschoolid').value = '$row[school_id]'</script>";
echo"<script>document.getElementById('txtschoolid2').value = '$row[school_id]'</script>";
}

$sql = mysqli_query($cn, "select * from enrolled_students where username = '$txtuser'");
$username = mysqli_num_rows($sql);
	
while($row = mysqli_fetch_assoc($sql))
{
echo"<script>document.getElementById('txtstrand').value = '$row[strand]'</script>";
echo"<script>document.getElementById('txtstrand2').value = '$row[strand]'</script>";
echo"<script>document.getElementById('txtstrand3').value = '$row[strand]'</script>";
}

// First Semester

$sql = mysqli_query($cn, "select * from grades where username = '$txtuser' and semester = '1st' and yr_sec like '%12%' group by semester asc;");
$grades = mysqli_num_rows($sql);
	
while($row = mysqli_fetch_assoc($sql))
{	
echo"<script>document.getElementById('txtsy').value = '$row[sy]'</script>";
echo"<script>document.getElementById('txtsy2').value = '$row[sy]'</script>";

echo"<script>document.getElementById('txtsec').value = '$row[yr_sec]'</script>";
echo"<script>document.getElementById('txtsec2').value = '$row[yr_sec]'</script>";
}





// Adviser

$txtusername = $_POST['txtusername'];

$sql = mysqli_query($cn, "select * from account_registration where username = '$txtusername'");
$username = mysqli_num_rows($sql);
	
while($row = mysqli_fetch_assoc($sql))
{
echo"<script>document.getElementById('txtadviser111').value = '$row[account_name]'</script>";

echo"<script>document.getElementById('txtadviser112').value = '$row[account_name]'</script>";
}

$sql = mysqli_query($cn, "select * from adviser order by adviser asc;");
$adviser = mysqli_num_rows($sql);

echo"<datalist id = 'adviser11'>";
while($row = mysqli_fetch_assoc($sql))
{
echo"<option value = '$row[adviser]'>";
}
echo"</datalist>";

//Strand

$sql = mysqli_query($cn, "select * from strand order by strand asc;");
$strand = mysqli_num_rows($sql);

echo"<datalist id = 'strand'>";
while($row = mysqli_fetch_assoc($sql))
{
echo"<option value = '$row[strand]'>";
}
echo"</datalist>";

// SHS General Average

$sql = mysqli_query($cn, "select AVG(ave) from grades where username = '$txtuser'");
$average = mysqli_num_rows($sql);
	
while($row = mysqli_fetch_assoc($sql))
{
$shsgenave = $row['AVG(ave)'];
$shsgenave = round($shsgenave,0);

echo"<script>document.getElementById('txtgenave').value = '$shsgenave'</script>";
}

echo"<script>
if(document.getElementById('txtave122').value == 0)
{
document.getElementById('txtgenave').value = ''
}
</script>";

?>

<script>

function datechk()
{
document.getElementById('txtdate2').value = document.getElementById('txtdate1').value
}

document.getElementById('imgsign111').src = document.getElementById('txtadviser111').value + '.png';
document.getElementById('imgsign112').src = document.getElementById('txtadviser111').value + '.png';

function sign11()
{
document.getElementById('imgsign111').src = document.getElementById('txtadviser111').value + '.png';
document.getElementById('imgsign112').src = document.getElementById('txtadviser111').value + '.png';
document.getElementById('txtadviser112').value = document.getElementById('txtadviser111').value;
}
function sign12()
{
document.getElementById('imgsign12').src = document.getElementById('txtadviser121').value + '.png';
document.getElementById('txtadviser122').value = document.getElementById('txtadviser121').value;
}

function clrsign11()
{
document.getElementById('txtadviser111').value = '';
}
function clrsign12()
{
document.getElementById('txtadviser121').value = '';
}

function clrstrand()
{
document.getElementById('txtstrand3').value = '';
}

function clrimgsign()
{
document.getElementById('imgsign111').style = 'display: none;';
document.getElementById('imgsign112').style = 'display: none;';
}

function clrprinsign()
{
document.getElementById('imgprinsign121').style = 'display: none;';
document.getElementById('imgprinsign122').style = 'display: none;';
document.getElementById('imgprinsign123').style = 'display: none;';
}

</script>