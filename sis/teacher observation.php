<html>
<head>
<title>Online Classroom Observation System</title>
</head>
<body>

<img src = "bg.png" style = "position: fixed; top: 100; left: 0; height: 100%; width: 100%;">

<center>

<form action = 'teacher observation.php' method = 'post'>

<table border = '1' cellspacing = 0 style = 'border: none; width: 1000; position: relative;'>

<tr style = 'border: 2px solid black; background-color: EFC372'>
<th>
<label style = 'font-size: 40;'>
Name of School
</label>
</th>
</tr>

<?php
$cn = mysqli_connect('localhost', 'root', '', 'gmcbulac_db_gmc');
//$cn = mysqli_connect('localhost', 'gmcbulac_derek03', 'derek030872', 'gmcbulac_db_gmc');
$sql = mysqli_query($cn, "select * from subj_load group by branch asc;");
while($row = mysqli_fetch_assoc($sql))
{
echo"
<form action = 'teacher observation.php' method = 'post'>
<tr style = 'border: 2px solid black; height: 60;'>
<th style = 'border-top: none; border-bottom: none;'>
<input type = 'submit' name = 'yrsec' id = 'btnbranch' value = '$row[branch]' style = 'width: 800; font-size: 25;'>
<input type = 'hidden' name = 'txtbranch' value = '$row[branch]'>
<input type = 'hidden' name = 'txtyrsec' value = '$row[yr_sec]'>
</th>
</tr>
</form>";
}
?>

<tr style = 'border: 2px solid black; background-color: EFC372'>
<th>
<label style = 'font-size: 40;'>
Year and Section
</label>
</th>
</tr>

<?php
$cn = mysqli_connect('localhost', 'root', '', 'gmcbulac_db_gmc');
//$cn = mysqli_connect('localhost', 'gmcbulac_derek03', 'derek030872', 'gmcbulac_db_gmc');

if(isset($_POST['yrsec']))
{

$txtbranch = $_POST['txtbranch'];

$sql = mysqli_query($cn, "select * from subj_load where branch = '$txtbranch' group by yr_sec asc;");
while($row = mysqli_fetch_assoc($sql))
{
echo"
<form action = 'teacher observation.php' method = 'post'>
<tr style = 'border: 2px solid black; height: 60;'>
<th style = 'border-top: none; border-bottom: none;'>
<input type = 'submit' name = 'yrsec' id = 'btnyrsec' value = '$row[yr_sec]' style = 'width: 800; font-size: 25;'>
<input type = 'hidden' name = 'txtbranch' value = '$row[branch]'>
<input type = 'hidden' name = 'txtyrsec' value = '$row[yr_sec]'>
</th>
</tr>
</form>";
}

}

?>

<tr style = 'border: 2px solid black; background-color: EFC372'>
<th>
<label style = 'font-size: 40;'>
Student Information
</label>
</th>
</tr>

<tr style = 'border: 2px solid black; height: 200;'>
<th style = 'border-top: none; border-bottom: none;'>

<label style = 'font-size: 30;'>
Date of Observation:
</label>
<br>
<input type = 'date' name = 'dtpdate' id = 'dtpdate' style = 'width: 800; font-size: 25; text-align: center;' required>

<br><br>

<label style = 'font-size: 30;'>
Name of Student:
</label>
<br>
<input type = 'text' name = 'txtstudname' id = 'txtstudname' style = 'width: 800; font-size: 25; text-align: center;' required>

</th>
</tr>


<tr style = 'border: 2px solid black; background-color: EFC372'>
<th style = 'border-bottom: none;'>
<label style = 'font-size: 40;'>
Rating Scale:
</label>
</th>
</tr>

<tr style = 'border: 2px solid black'>
<th style = 'text-align: left; height: 130;'>

<label style = 'position: relative; left: 60; font-size: 25;'>
4 - Performance of this item is innovatively done. 
<br>
3 - Performance of this item is satisfactorily done.
<br>
2 - Performance of this item is partially done due to some omissions. 
<br>
1 - Performance of this item is partially done due to serious errors and misconceptions.
<br>
0 - Performance of this item is not observed at all. 
</label>

</th>
</tr>

</table>

<br>

<table border = '1' cellspacing = 0 style = 'border: none; width: 1000;  position: relative;'>

<tr style = 'border: 2px solid black; background-color: EFC372'>
<th style = 'border-bottom: none;'>
<label style = 'font-size: 40;'>
First Subject Teacher
</label>
</th>
</tr>

<?php
$cn = mysqli_connect('localhost', 'root', '', 'gmcbulac_db_gmc');
//$cn = mysqli_connect('localhost', 'gmcbulac_derek03', 'derek030872', 'gmcbulac_db_gmc');

if(isset($_POST['yrsec']))
{

$txtyrsec = $_POST['txtyrsec'];

$sql = mysqli_query($cn, "select * from subj_load where yr_sec = '$txtyrsec' and subj_order = 01");
while($row = mysqli_fetch_assoc($sql))
{
echo"
<tr style = 'border: 2px solid black; height: 200;'>
<th>

<input type = 'hidden' name = 'txtbranch' value = '$row[branch]'>
<input type = 'hidden' name = 'txtyrsec' value = '$row[yr_sec]'>

<label style = 'font-size: 30;'>
Name of Teacher:
</label>
<br>
<input type = 'text' name = 'txtteacher1' id = 'txtteacher1' style = 'width: 900; font-size: 25; text-align: center;' value = '$row[teacher]' readonly required>

<br><br>

<label style = 'font-size: 30;'>
Subject of Instruction:
</label>
<br>
<input type = 'text' name = 'txtsubjdesc1' id = 'txtsubjdesc1' style = 'width: 900; font-size: 25; text-align: center;' value = '$row[subj_desc]' readonly required>

</th>
</tr>";
}

}

?>

</table>

<table border = '1' cellspacing = 0 style = 'border: none; width: 1000;  position: relative;'>

<tr  style = 'border: 2px solid black'>
<th style = 'text-align: left; font-size: 25;'>
TEACHER ACTIONS
</th>
</tr>

</table>

<table border = '1' cellspacing = 0 style = 'border: none; width: 1000;  position: relative;'>

<tr style = 'border: 2px solid black'>

<th style = 'text-align: center; min-width: 20; max-width: 20; font-size: 25;'>
1
</th>

<th style = 'text-align: left; min-width: 500; max-width: 500; overflow: hidden; font-size: 25;'>
The teacher communicates clear expectations of student performance in line with the unit standards and competencies.
</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'aa4' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("a1").value = "4";
document.getElementById("aa0").checked = false;
document.getElementById("aa1").checked = false;
document.getElementById("aa2").checked = false;
document.getElementById("aa3").checked = false;'>4
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'aa3' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("a1").value = "3";
document.getElementById("aa0").checked = false;
document.getElementById("aa1").checked = false;
document.getElementById("aa2").checked = false;
document.getElementById("aa4").checked = false;'>3
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'aa2' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("a1").value = "2";
document.getElementById("aa0").checked = false;
document.getElementById("aa1").checked = false;
document.getElementById("aa3").checked = false;
document.getElementById("aa4").checked = false;'>2
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'aa1' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("a1").value = "1";
document.getElementById("aa0").checked = false;
document.getElementById("aa2").checked = false;
document.getElementById("aa3").checked = false;
document.getElementById("aa4").checked = false;'>1
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'aa0' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("a1").value = "0.00";
document.getElementById("aa1").checked = false;
document.getElementById("aa2").checked = false;
document.getElementById("aa3").checked = false;
document.getElementById("aa4").checked = false;'>0
</label>

</th>

<input type = 'text' name = 'a1' id = 'a1' style = 'display: none;' required>

</tr>

<tr style = 'border: 2px solid black'>

<th style = 'text-align: center; min-width: 20; max-width: 20; font-size: 25;'>
2
</th>

<th style = 'text-align: left; min-width: 500; max-width: 500; overflow: hidden; font-size: 25;'>
The teacher utilizes various learning materials, resources and strategies to enable all students to learn and achieve the unit standards and competencies and learning goals.
</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'ab4' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("a2").value = "4";
document.getElementById("ab0").checked = false;
document.getElementById("ab1").checked = false;
document.getElementById("ab2").checked = false;
document.getElementById("ab3").checked = false;'>4
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'ab3' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("a2").value = "3";
document.getElementById("ab0").checked = false;
document.getElementById("ab1").checked = false;
document.getElementById("ab2").checked = false;
document.getElementById("ab4").checked = false;'>3
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'ab2' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("a2").value = "2";
document.getElementById("ab0").checked = false;
document.getElementById("ab1").checked = false;
document.getElementById("ab3").checked = false;
document.getElementById("ab4").checked = false;'>2
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'ab1' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("a2").value = "1";
document.getElementById("ab0").checked = false;
document.getElementById("ab2").checked = false;
document.getElementById("ab3").checked = false;
document.getElementById("ab4").checked = false;'>1
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'ab0' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("a2").value = "0.00";
document.getElementById("ab1").checked = false;
document.getElementById("ab2").checked = false;
document.getElementById("ab3").checked = false;
document.getElementById("ab4").checked = false;'>0
</label>

</th>

<input type = 'text' name = 'a2' id = 'a2' style = 'display: none;' required>

</tr>

<tr style = 'border: 2px solid black'>

<th style = 'text-align: center; min-width: 20; max-width: 20; font-size: 25;'>
3
</th>

<th style = 'text-align: left; min-width: 500; max-width: 500; overflow: hidden; font-size: 25;'>
The teacher monitors and checks on students’ learning and attainment of the unit standards and competencies by conducting varied forms of assessments during class discussion.
</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'ac4' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("a3").value = "4";
document.getElementById("ac0").checked = false;
document.getElementById("ac1").checked = false;
document.getElementById("ac2").checked = false;
document.getElementById("ac3").checked = false;'>4
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'a3' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("a3").value = "3";
document.getElementById("ac0").checked = false;
document.getElementById("ac1").checked = false;
document.getElementById("ac2").checked = false;
document.getElementById("ac4").checked = false;'>3
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'ac2' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("a3").value = "2";
document.getElementById("ac0").checked = false;
document.getElementById("ac1").checked = false;
document.getElementById("ac3").checked = false;
document.getElementById("ac4").checked = false;'>2
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'ac1' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("a3").value = "1";
document.getElementById("ac0").checked = false;
document.getElementById("ac2").checked = false;
document.getElementById("ac3").checked = false;
document.getElementById("ac4").checked = false;'>1
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'ac0' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("a3").value = "0.00";
document.getElementById("ac1").checked = false;
document.getElementById("ac2").checked = false;
document.getElementById("ac3").checked = false;
document.getElementById("ac4").checked = false;'>0
</label>

</th>

<input type = 'text' name = 'a3' id = 'a3' style = 'display: none;' required>

</tr>

<tr style = 'border: 2px solid black'>

<th style = 'text-align: center; min-width: 20; max-width: 20; font-size: 25;'>
4
</th>

<th style = 'text-align: left; min-width: 500; max-width: 500; overflow: hidden; font-size: 25;'>
The teacher provides appropriate feedback or interventions to enable students in attaining the unit standards and competencies.
</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'ad4' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("a4").value = "4";
document.getElementById("ad0").checked = false;
document.getElementById("ad1").checked = false;
document.getElementById("ad2").checked = false;
document.getElementById("ad3").checked = false;'>4
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'ad3' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("a4").value = "3";
document.getElementById("ad0").checked = false;
document.getElementById("ad1").checked = false;
document.getElementById("ad2").checked = false;
document.getElementById("ad4").checked = false;'>3
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'ad2' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("a4").value = "2";
document.getElementById("ad0").checked = false;
document.getElementById("ad1").checked = false;
document.getElementById("ad3").checked = false;
document.getElementById("ad4").checked = false;'>2
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'ad1' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("a4").value = "1";
document.getElementById("ad0").checked = false;
document.getElementById("ad2").checked = false;
document.getElementById("ad3").checked = false;
document.getElementById("ad4").checked = false;'>1
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'ad0' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("a4").value = "0.00";
document.getElementById("ad1").checked = false;
document.getElementById("ad2").checked = false;
document.getElementById("ad3").checked = false;
document.getElementById("ad4").checked = false;'>0
</label>

</th>

<input type = 'text' name = 'a4' id = 'a4' style = 'display: none;' required>

</tr>

<tr style = 'border: 2px solid black'>

<th style = 'text-align: center; min-width: 20; max-width: 20; font-size: 25;'>
5
</th>

<th style = 'text-align: left; min-width: 500; max-width: 500; overflow: hidden; font-size: 25;'>
The teacher manages the classroom environment and time in a way that supports student learning and the achievement of the unit standards and competencies.
</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'ae4' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("a5").value = "4";
document.getElementById("ae0").checked = false;
document.getElementById("ae1").checked = false;
document.getElementById("ae2").checked = false;
document.getElementById("ae3").checked = false;'>4
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'ae3' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("a5").value = "3";
document.getElementById("ae0").checked = false;
document.getElementById("ae1").checked = false;
document.getElementById("ae2").checked = false;
document.getElementById("ae4").checked = false;'>3
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'ae2' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("a5").value = "2";
document.getElementById("ae0").checked = false;
document.getElementById("ae1").checked = false;
document.getElementById("ae3").checked = false;
document.getElementById("ae4").checked = false;'>2
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'ae1' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("a5").value = "1";
document.getElementById("ae0").checked = false;
document.getElementById("ae2").checked = false;
document.getElementById("ae3").checked = false;
document.getElementById("ae4").checked = false;'>1
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'ae0' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("a5").value = "0.00";
document.getElementById("ae1").checked = false;
document.getElementById("ae2").checked = false;
document.getElementById("ae3").checked = false;
document.getElementById("ae4").checked = false;'>0
</label>

</th>

<input type = 'text' name = 'a5' id = 'a5' style = 'display: none;' required>

</tr>

<tr style = 'border: 2px solid black'>

<th style = 'text-align: center; min-width: 20; max-width: 20; font-size: 25;'>
6
</th>

<th style = 'text-align: left; min-width: 500; max-width: 500; overflow: hidden; font-size: 25;'>
The teacher processes students’ understanding by asking clarifying or critical thinking questions related to the unit standards or competencies.
</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'af4' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("a6").value = "4";
document.getElementById("af0").checked = false;
document.getElementById("af1").checked = false;
document.getElementById("af2").checked = false;
document.getElementById("af3").checked = false;'>4
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'f3' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("a6").value = "3";
document.getElementById("af0").checked = false;
document.getElementById("af1").checked = false;
document.getElementById("af2").checked = false;
document.getElementById("af4").checked = false;'>3
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'af2' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("a6").value = "2";
document.getElementById("af0").checked = false;
document.getElementById("af1").checked = false;
document.getElementById("af3").checked = false;
document.getElementById("af4").checked = false;'>2
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'af1' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("a6").value = "1";
document.getElementById("af0").checked = false;
document.getElementById("af2").checked = false;
document.getElementById("af3").checked = false;
document.getElementById("af4").checked = false;'>1
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'af0' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("a6").value = "0.00";
document.getElementById("af1").checked = false;
document.getElementById("af2").checked = false;
document.getElementById("af3").checked = false;
document.getElementById("af4").checked = false;'>0
</label>

</th>

<input type = 'text' name = 'a6' id = 'a6' style = 'display: none;' required>

</tr>

</table>









<br>

<table border = '1' cellspacing = 0 style = 'border: none; width: 1000;  position: relative;'>

<tr style = 'border: 2px solid black; background-color: EFC372'>
<th style = 'border-bottom: none;'>
<label style = 'font-size: 40;'>
Second Subject Teacher
</label>
</th>
</tr>

<?php
$cn = mysqli_connect('localhost', 'root', '', 'gmcbulac_db_gmc');
//$cn = mysqli_connect('localhost', 'gmcbulac_derek03', 'derek030872', 'gmcbulac_db_gmc');

if(isset($_POST['yrsec']))
{

$txtyrsec = $_POST['txtyrsec'];

$sql = mysqli_query($cn, "select * from subj_load where yr_sec = '$txtyrsec' and subj_order = 02");
while($row = mysqli_fetch_assoc($sql))
{
echo"
<tr style = 'border: 2px solid black; height: 200;'>
<th>

<input type = 'hidden' name = 'txtbranch' value = '$row[branch]'>
<input type = 'hidden' name = 'txtyrsec' value = '$row[yr_sec]'>

<label style = 'font-size: 30;'>
Name of Teacher:
</label>
<br>
<input type = 'text' name = 'txtteacher2' id = 'txtteacher2' style = 'width: 900; font-size: 25; text-align: center;' value = '$row[teacher]' readonly required>

<br><br>

<label style = 'font-size: 30;'>
Subject of Instruction:
</label>
<br>
<input type = 'text' name = 'txtsubjdesc2' id = 'txtsubjdesc2' style = 'width: 900; font-size: 25; text-align: center;' value = '$row[subj_desc]' readonly required>

</th>
</tr>";
}

}

?>

</table>

<table border = '1' cellspacing = 0 style = 'border: none; width: 1000;  position: relative;'>

<tr  style = 'border: 2px solid black'>
<th style = 'text-align: left; font-size: 25;'>
TEACHER ACTIONS
</th>
</tr>

</table>

<table border = '1' cellspacing = 0 style = 'border: none; width: 1000;  position: relative;'>

<tr style = 'border: 2px solid black'>

<th style = 'text-align: center; min-width: 20; max-width: 20; font-size: 25;'>
1
</th>

<th style = 'text-align: left; min-width: 500; max-width: 500; overflow: hidden; font-size: 25;'>
The teacher communicates clear expectations of student performance in line with the unit standards and competencies.
</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'ba4' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("b1").value = "4";
document.getElementById("ba0").checked = false;
document.getElementById("ba1").checked = false;
document.getElementById("ba2").checked = false;
document.getElementById("ba3").checked = false;'>4
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'ba3' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("b1").value = "3";
document.getElementById("ba0").checked = false;
document.getElementById("ba1").checked = false;
document.getElementById("ba2").checked = false;
document.getElementById("ba4").checked = false;'>3
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'ba2' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("b1").value = "2";
document.getElementById("ba0").checked = false;
document.getElementById("ba1").checked = false;
document.getElementById("ba3").checked = false;
document.getElementById("ba4").checked = false;'>2
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'ba1' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("b1").value = "1";
document.getElementById("ba0").checked = false;
document.getElementById("ba2").checked = false;
document.getElementById("ba3").checked = false;
document.getElementById("ba4").checked = false;'>1
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'ba0' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("b1").value = "0.00";
document.getElementById("ba1").checked = false;
document.getElementById("ba2").checked = false;
document.getElementById("ba3").checked = false;
document.getElementById("ba4").checked = false;'>0
</label>

</th>

<input type = 'text' name = 'b1' id = 'b1' style = 'display: none;' required>

</tr>

<tr style = 'border: 2px solid black'>

<th style = 'text-align: center; min-width: 20; max-width: 20; font-size: 25;'>
2
</th>

<th style = 'text-align: left; min-width: 500; max-width: 500; overflow: hidden; font-size: 25;'>
The teacher utilizes various learning materials, resources and strategies to enable all students to learn and achieve the unit standards and competencies and learning goals.
</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'bb4' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("b2").value = "4";
document.getElementById("bb0").checked = false;
document.getElementById("bb1").checked = false;
document.getElementById("bb2").checked = false;
document.getElementById("bb3").checked = false;'>4
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'bb3' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("b2").value = "3";
document.getElementById("bb0").checked = false;
document.getElementById("bb1").checked = false;
document.getElementById("bb2").checked = false;
document.getElementById("bb4").checked = false;'>3
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'bb2' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("b2").value = "2";
document.getElementById("bb0").checked = false;
document.getElementById("bb1").checked = false;
document.getElementById("bb3").checked = false;
document.getElementById("bb4").checked = false;'>2
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'bb1' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("b2").value = "1";
document.getElementById("bb0").checked = false;
document.getElementById("bb2").checked = false;
document.getElementById("bb3").checked = false;
document.getElementById("bb4").checked = false;'>1
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'bb0' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("b2").value = "0.00";
document.getElementById("bb1").checked = false;
document.getElementById("bb2").checked = false;
document.getElementById("bb3").checked = false;
document.getElementById("bb4").checked = false;'>0
</label>

</th>

<input type = 'text' name = 'b2' id = 'b2' style = 'display: none;' required>

</tr>

<tr style = 'border: 2px solid black'>

<th style = 'text-align: center; min-width: 20; max-width: 20; font-size: 25;'>
3
</th>

<th style = 'text-align: left; min-width: 500; max-width: 500; overflow: hidden; font-size: 25;'>
The teacher monitors and checks on students’ learning and attainment of the unit standards and competencies by conducting varied forms of assessments during class discussion.
</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'bc4' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("b3").value = "4";
document.getElementById("bc0").checked = false;
document.getElementById("bc1").checked = false;
document.getElementById("bc2").checked = false;
document.getElementById("bc3").checked = false;'>4
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'b3' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("b3").value = "3";
document.getElementById("bc0").checked = false;
document.getElementById("bc1").checked = false;
document.getElementById("bc2").checked = false;
document.getElementById("bc4").checked = false;'>3
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'bc2' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("b3").value = "2";
document.getElementById("bc0").checked = false;
document.getElementById("bc1").checked = false;
document.getElementById("bc3").checked = false;
document.getElementById("bc4").checked = false;'>2
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'bc1' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("b3").value = "1";
document.getElementById("bc0").checked = false;
document.getElementById("bc2").checked = false;
document.getElementById("bc3").checked = false;
document.getElementById("bc4").checked = false;'>1
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'bc0' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("b3").value = "0.00";
document.getElementById("bc1").checked = false;
document.getElementById("bc2").checked = false;
document.getElementById("bc3").checked = false;
document.getElementById("bc4").checked = false;'>0
</label>

</th>

<input type = 'text' name = 'b3' id = 'b3' style = 'display: none;' required>

</tr>

<tr style = 'border: 2px solid black'>

<th style = 'text-align: center; min-width: 20; max-width: 20; font-size: 25;'>
4
</th>

<th style = 'text-align: left; min-width: 500; max-width: 500; overflow: hidden; font-size: 25;'>
The teacher provides appropriate feedback or interventions to enable students in attaining the unit standards and competencies.
</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'bd4' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("b4").value = "4";
document.getElementById("bd0").checked = false;
document.getElementById("bd1").checked = false;
document.getElementById("bd2").checked = false;
document.getElementById("bd3").checked = false;'>4
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'bd3' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("b4").value = "3";
document.getElementById("bd0").checked = false;
document.getElementById("bd1").checked = false;
document.getElementById("bd2").checked = false;
document.getElementById("bd4").checked = false;'>3
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'bd2' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("b4").value = "2";
document.getElementById("bd0").checked = false;
document.getElementById("bd1").checked = false;
document.getElementById("bd3").checked = false;
document.getElementById("bd4").checked = false;'>2
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'bd1' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("b4").value = "1";
document.getElementById("bd0").checked = false;
document.getElementById("bd2").checked = false;
document.getElementById("bd3").checked = false;
document.getElementById("bd4").checked = false;'>1
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'bd0' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("b4").value = "0.00";
document.getElementById("bd1").checked = false;
document.getElementById("bd2").checked = false;
document.getElementById("bd3").checked = false;
document.getElementById("bd4").checked = false;'>0
</label>

</th>

<input type = 'text' name = 'b4' id = 'b4' style = 'display: none;' required>

</tr>

<tr style = 'border: 2px solid black'>

<th style = 'text-align: center; min-width: 20; max-width: 20; font-size: 25;'>
5
</th>

<th style = 'text-align: left; min-width: 500; max-width: 500; overflow: hidden; font-size: 25;'>
The teacher manages the classroom environment and time in a way that supports student learning and the achievement of the unit standards and competencies.
</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'be4' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("b5").value = "4";
document.getElementById("be0").checked = false;
document.getElementById("be1").checked = false;
document.getElementById("be2").checked = false;
document.getElementById("be3").checked = false;'>4
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'be3' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("b5").value = "3";
document.getElementById("be0").checked = false;
document.getElementById("be1").checked = false;
document.getElementById("be2").checked = false;
document.getElementById("be4").checked = false;'>3
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'be2' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("b5").value = "2";
document.getElementById("be0").checked = false;
document.getElementById("be1").checked = false;
document.getElementById("be3").checked = false;
document.getElementById("be4").checked = false;'>2
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'be1' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("b5").value = "1";
document.getElementById("be0").checked = false;
document.getElementById("be2").checked = false;
document.getElementById("be3").checked = false;
document.getElementById("be4").checked = false;'>1
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'be0' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("b5").value = "0.00";
document.getElementById("be1").checked = false;
document.getElementById("be2").checked = false;
document.getElementById("be3").checked = false;
document.getElementById("be4").checked = false;'>0
</label>

</th>

<input type = 'text' name = 'b5' id = 'b5' style = 'display: none;' required>

</tr>

<tr style = 'border: 2px solid black'>

<th style = 'text-align: center; min-width: 20; max-width: 20; font-size: 25;'>
6
</th>

<th style = 'text-align: left; min-width: 500; max-width: 500; overflow: hidden; font-size: 25;'>
The teacher processes students’ understanding by asking clarifying or critical thinking questions related to the unit standards or competencies.
</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'bf4' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("b6").value = "4";
document.getElementById("bf0").checked = false;
document.getElementById("bf1").checked = false;
document.getElementById("bf2").checked = false;
document.getElementById("bf3").checked = false;'>4
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'b3' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("b6").value = "3";
document.getElementById("bf0").checked = false;
document.getElementById("bf1").checked = false;
document.getElementById("bf2").checked = false;
document.getElementById("bf4").checked = false;'>3
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'bf2' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("b6").value = "2";
document.getElementById("bf0").checked = false;
document.getElementById("bf1").checked = false;
document.getElementById("bf3").checked = false;
document.getElementById("bf4").checked = false;'>2
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'bf1' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("b6").value = "1";
document.getElementById("bf0").checked = false;
document.getElementById("bf2").checked = false;
document.getElementById("bf3").checked = false;
document.getElementById("bf4").checked = false;'>1
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'bf0' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("b6").value = "0.00";
document.getElementById("bf1").checked = false;
document.getElementById("bf2").checked = false;
document.getElementById("bf3").checked = false;
document.getElementById("bf4").checked = false;'>0
</label>

</th>

<input type = 'text' name = 'b6' id = 'b6' style = 'display: none;' required>

</tr>

</table>














<br>

<table border = '1' cellspacing = 0 style = 'border: none; width: 1000;  position: relative;'>

<tr style = 'border: 2px solid black; background-color: EFC372'>
<th style = 'border-bottom: none;'>
<label style = 'font-size: 40;'>
Third Subject Teacher
</label>
</th>
</tr>

<?php
$cn = mysqli_connect('localhost', 'root', '', 'gmcbulac_db_gmc');
//$cn = mysqli_connect('localhost', 'gmcbulac_derek03', 'derek030872', 'gmcbulac_db_gmc');

if(isset($_POST['yrsec']))
{

$txtyrsec = $_POST['txtyrsec'];

$sql = mysqli_query($cn, "select * from subj_load where yr_sec = '$txtyrsec' and subj_order = 03");
while($row = mysqli_fetch_assoc($sql))
{
echo"
<tr style = 'border: 2px solid black; height: 200;'>
<th>

<input type = 'hidden' name = 'txtbranch' value = '$row[branch]'>
<input type = 'hidden' name = 'txtyrsec' value = '$row[yr_sec]'>

<label style = 'font-size: 30;'>
Name of Teacher:
</label>
<br>
<input type = 'text' name = 'txtteacher3' id = 'txtteacher3' style = 'width: 900; font-size: 25; text-align: center;' value = '$row[teacher]' readonly required>

<br><br>

<label style = 'font-size: 30;'>
Subject of Instruction:
</label>
<br>
<input type = 'text' name = 'txtsubjdesc3' id = 'txtsubjdesc3' style = 'width: 900; font-size: 25; text-align: center;' value = '$row[subj_desc]' readonly required>

</th>
</tr>";
}

}

?>

</table>

<table border = '1' cellspacing = 0 style = 'border: none; width: 1000;  position: relative;'>

<tr  style = 'border: 2px solid black'>
<th style = 'text-align: left; font-size: 25;'>
TEACHER ACTIONS
</th>
</tr>

</table>

<table border = '1' cellspacing = 0 style = 'border: none; width: 1000;  position: relative;'>

<tr style = 'border: 2px solid black'>

<th style = 'text-align: center; min-width: 20; max-width: 20; font-size: 25;'>
1
</th>

<th style = 'text-align: left; min-width: 500; max-width: 500; overflow: hidden; font-size: 25;'>
The teacher communicates clear expectations of student performance in line with the unit standards and competencies.
</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'ca4' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("c1").value = "4";
document.getElementById("ca0").checked = false;
document.getElementById("ca1").checked = false;
document.getElementById("ca2").checked = false;
document.getElementById("ca3").checked = false;'>4
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'ca3' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("c1").value = "3";
document.getElementById("ca0").checked = false;
document.getElementById("ca1").checked = false;
document.getElementById("ca2").checked = false;
document.getElementById("ca4").checked = false;'>3
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'ca2' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("c1").value = "2";
document.getElementById("ca0").checked = false;
document.getElementById("ca1").checked = false;
document.getElementById("ca3").checked = false;
document.getElementById("ca4").checked = false;'>2
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'ca1' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("c1").value = "1";
document.getElementById("ca0").checked = false;
document.getElementById("ca2").checked = false;
document.getElementById("ca3").checked = false;
document.getElementById("ca4").checked = false;'>1
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'ca0' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("c1").value = "0.00";
document.getElementById("ca1").checked = false;
document.getElementById("ca2").checked = false;
document.getElementById("ca3").checked = false;
document.getElementById("ca4").checked = false;'>0
</label>

</th>

<input type = 'text' name = 'c1' id = 'c1' style = 'display: none;' required>

</tr>

<tr style = 'border: 2px solid black'>

<th style = 'text-align: center; min-width: 20; max-width: 20; font-size: 25;'>
2
</th>

<th style = 'text-align: left; min-width: 500; max-width: 500; overflow: hidden; font-size: 25;'>
The teacher utilizes various learning materials, resources and strategies to enable all students to learn and achieve the unit standards and competencies and learning goals.
</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'cb4' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("c2").value = "4";
document.getElementById("cb0").checked = false;
document.getElementById("cb1").checked = false;
document.getElementById("cb2").checked = false;
document.getElementById("cb3").checked = false;'>4
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'cb3' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("c2").value = "3";
document.getElementById("cb0").checked = false;
document.getElementById("cb1").checked = false;
document.getElementById("cb2").checked = false;
document.getElementById("cb4").checked = false;'>3
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'cb2' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("c2").value = "2";
document.getElementById("cb0").checked = false;
document.getElementById("cb1").checked = false;
document.getElementById("cb3").checked = false;
document.getElementById("cb4").checked = false;'>2
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'cb1' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("c2").value = "1";
document.getElementById("cb0").checked = false;
document.getElementById("cb2").checked = false;
document.getElementById("cb3").checked = false;
document.getElementById("cb4").checked = false;'>1
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'cb0' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("c2").value = "0.00";
document.getElementById("cb1").checked = false;
document.getElementById("cb2").checked = false;
document.getElementById("cb3").checked = false;
document.getElementById("cb4").checked = false;'>0
</label>

</th>

<input type = 'text' name = 'c2' id = 'c2' style = 'display: none;' required>

</tr>

<tr style = 'border: 2px solid black'>

<th style = 'text-align: center; min-width: 20; max-width: 20; font-size: 25;'>
3
</th>

<th style = 'text-align: left; min-width: 500; max-width: 500; overflow: hidden; font-size: 25;'>
The teacher monitors and checks on students’ learning and attainment of the unit standards and competencies by conducting varied forms of assessments during class discussion.
</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'cc4' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("c3").value = "4";
document.getElementById("cc0").checked = false;
document.getElementById("cc1").checked = false;
document.getElementById("cc2").checked = false;
document.getElementById("cc3").checked = false;'>4
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'c3' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("c3").value = "3";
document.getElementById("cc0").checked = false;
document.getElementById("cc1").checked = false;
document.getElementById("cc2").checked = false;
document.getElementById("cc4").checked = false;'>3
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'cc2' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("c3").value = "2";
document.getElementById("cc0").checked = false;
document.getElementById("cc1").checked = false;
document.getElementById("cc3").checked = false;
document.getElementById("cc4").checked = false;'>2
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'cc1' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("c3").value = "1";
document.getElementById("cc0").checked = false;
document.getElementById("cc2").checked = false;
document.getElementById("cc3").checked = false;
document.getElementById("cc4").checked = false;'>1
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'cc0' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("c3").value = "0.00";
document.getElementById("cc1").checked = false;
document.getElementById("cc2").checked = false;
document.getElementById("cc3").checked = false;
document.getElementById("cc4").checked = false;'>0
</label>

</th>

<input type = 'text' name = 'c3' id = 'c3' style = 'display: none;' required>

</tr>

<tr style = 'border: 2px solid black'>

<th style = 'text-align: center; min-width: 20; max-width: 20; font-size: 25;'>
4
</th>

<th style = 'text-align: left; min-width: 500; max-width: 500; overflow: hidden; font-size: 25;'>
The teacher provides appropriate feedback or interventions to enable students in attaining the unit standards and competencies.
</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'cd4' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("c4").value = "4";
document.getElementById("cd0").checked = false;
document.getElementById("cd1").checked = false;
document.getElementById("cd2").checked = false;
document.getElementById("cd3").checked = false;'>4
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'cd3' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("c4").value = "3";
document.getElementById("cd0").checked = false;
document.getElementById("cd1").checked = false;
document.getElementById("cd2").checked = false;
document.getElementById("cd4").checked = false;'>3
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'cd2' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("c4").value = "2";
document.getElementById("cd0").checked = false;
document.getElementById("cd1").checked = false;
document.getElementById("cd3").checked = false;
document.getElementById("cd4").checked = false;'>2
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'cd1' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("c4").value = "1";
document.getElementById("cd0").checked = false;
document.getElementById("cd2").checked = false;
document.getElementById("cd3").checked = false;
document.getElementById("cd4").checked = false;'>1
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'cd0' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("c4").value = "0.00";
document.getElementById("cd1").checked = false;
document.getElementById("cd2").checked = false;
document.getElementById("cd3").checked = false;
document.getElementById("cd4").checked = false;'>0
</label>

</th>

<input type = 'text' name = 'c4' id = 'c4' style = 'display: none;' required>

</tr>

<tr style = 'border: 2px solid black'>

<th style = 'text-align: center; min-width: 20; max-width: 20; font-size: 25;'>
5
</th>

<th style = 'text-align: left; min-width: 500; max-width: 500; overflow: hidden; font-size: 25;'>
The teacher manages the classroom environment and time in a way that supports student learning and the achievement of the unit standards and competencies.
</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'ce4' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("c5").value = "4";
document.getElementById("ce0").checked = false;
document.getElementById("ce1").checked = false;
document.getElementById("ce2").checked = false;
document.getElementById("ce3").checked = false;'>4
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'ce3' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("c5").value = "3";
document.getElementById("ce0").checked = false;
document.getElementById("ce1").checked = false;
document.getElementById("ce2").checked = false;
document.getElementById("ce4").checked = false;'>3
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'ce2' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("c5").value = "2";
document.getElementById("ce0").checked = false;
document.getElementById("ce1").checked = false;
document.getElementById("ce3").checked = false;
document.getElementById("ce4").checked = false;'>2
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'ce1' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("c5").value = "1";
document.getElementById("ce0").checked = false;
document.getElementById("ce2").checked = false;
document.getElementById("ce3").checked = false;
document.getElementById("ce4").checked = false;'>1
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'ce0' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("c5").value = "0.00";
document.getElementById("ce1").checked = false;
document.getElementById("ce2").checked = false;
document.getElementById("ce3").checked = false;
document.getElementById("ce4").checked = false;'>0
</label>

</th>

<input type = 'text' name = 'c5' id = 'c5' style = 'display: none;' required>

</tr>

<tr style = 'border: 2px solid black'>

<th style = 'text-align: center; min-width: 20; max-width: 20; font-size: 25;'>
6
</th>

<th style = 'text-align: left; min-width: 500; max-width: 500; overflow: hidden; font-size: 25;'>
The teacher processes students’ understanding by asking clarifying or critical thinking questions related to the unit standards or competencies.
</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'cf4' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("c6").value = "4";
document.getElementById("cf0").checked = false;
document.getElementById("cf1").checked = false;
document.getElementById("cf2").checked = false;
document.getElementById("cf3").checked = false;'>4
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'c3' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("c6").value = "3";
document.getElementById("cf0").checked = false;
document.getElementById("cf1").checked = false;
document.getElementById("cf2").checked = false;
document.getElementById("cf4").checked = false;'>3
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'cf2' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("c6").value = "2";
document.getElementById("cf0").checked = false;
document.getElementById("cf1").checked = false;
document.getElementById("cf3").checked = false;
document.getElementById("cf4").checked = false;'>2
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'cf1' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("c6").value = "1";
document.getElementById("cf0").checked = false;
document.getElementById("cf2").checked = false;
document.getElementById("cf3").checked = false;
document.getElementById("cf4").checked = false;'>1
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'cf0' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("c6").value = "0.00";
document.getElementById("cf1").checked = false;
document.getElementById("cf2").checked = false;
document.getElementById("cf3").checked = false;
document.getElementById("cf4").checked = false;'>0
</label>

</th>

<input type = 'text' name = 'c6' id = 'c6' style = 'display: none;' required>

</tr>

</table>














<br>

<table border = '1' cellspacing = 0 style = 'border: none; width: 1000;  position: relative;'>

<tr style = 'border: 2px solid black; background-color: EFC372'>
<th style = 'border-bottom: none;'>
<label style = 'font-size: 40;'>
Fourth Subject Teacher
</label>
</th>
</tr>

<?php
$cn = mysqli_connect('localhost', 'root', '', 'gmcbulac_db_gmc');
//$cn = mysqli_connect('localhost', 'gmcbulac_derek03', 'derek030872', 'gmcbulac_db_gmc');

if(isset($_POST['yrsec']))
{

$txtyrsec = $_POST['txtyrsec'];

$sql = mysqli_query($cn, "select * from subj_load where yr_sec = '$txtyrsec' and subj_order = 04");
while($row = mysqli_fetch_assoc($sql))
{
echo"
<tr style = 'border: 2px solid black; height: 200;'>
<th>

<input type = 'hidden' name = 'txtbranch' value = '$row[branch]'>
<input type = 'hidden' name = 'txtyrsec' value = '$row[yr_sec]'>

<label style = 'font-size: 30;'>
Name of Teacher:
</label>
<br>
<input type = 'text' name = 'txtteacher4' id = 'txtteacher4' style = 'width: 900; font-size: 25; text-align: center;' value = '$row[teacher]' readonly required>

<br><br>

<label style = 'font-size: 30;'>
Subject of Instruction:
</label>
<br>
<input type = 'text' name = 'txtsubjdesc4' id = 'txtsubjdesc4' style = 'width: 900; font-size: 25; text-align: center;' value = '$row[subj_desc]' readonly required>

</th>
</tr>";
}

}

?>

</table>

<table border = '1' cellspacing = 0 style = 'border: none; width: 1000;  position: relative;'>

<tr  style = 'border: 2px solid black'>
<th style = 'text-align: left; font-size: 25;'>
TEACHER ACTIONS
</th>
</tr>

</table>

<table border = '1' cellspacing = 0 style = 'border: none; width: 1000;  position: relative;'>

<tr style = 'border: 2px solid black'>

<th style = 'text-align: center; min-width: 20; max-width: 20; font-size: 25;'>
1
</th>

<th style = 'text-align: left; min-width: 500; max-width: 500; overflow: hidden; font-size: 25;'>
The teacher communicates clear expectations of student performance in line with the unit standards and competencies.
</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'da4' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("d1").value = "4";
document.getElementById("da0").checked = false;
document.getElementById("da1").checked = false;
document.getElementById("da2").checked = false;
document.getElementById("da3").checked = false;'>4
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'da3' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("d1").value = "3";
document.getElementById("da0").checked = false;
document.getElementById("da1").checked = false;
document.getElementById("da2").checked = false;
document.getElementById("da4").checked = false;'>3
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'da2' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("d1").value = "2";
document.getElementById("da0").checked = false;
document.getElementById("da1").checked = false;
document.getElementById("da3").checked = false;
document.getElementById("da4").checked = false;'>2
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'da1' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("d1").value = "1";
document.getElementById("da0").checked = false;
document.getElementById("da2").checked = false;
document.getElementById("da3").checked = false;
document.getElementById("da4").checked = false;'>1
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'da0' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("d1").value = "0.00";
document.getElementById("da1").checked = false;
document.getElementById("da2").checked = false;
document.getElementById("da3").checked = false;
document.getElementById("da4").checked = false;'>0
</label>

</th>

<input type = 'text' name = 'd1' id = 'd1' style = 'display: none;' required>

</tr>

<tr style = 'border: 2px solid black'>

<th style = 'text-align: center; min-width: 20; max-width: 20; font-size: 25;'>
2
</th>

<th style = 'text-align: left; min-width: 500; max-width: 500; overflow: hidden; font-size: 25;'>
The teacher utilizes various learning materials, resources and strategies to enable all students to learn and achieve the unit standards and competencies and learning goals.
</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'db4' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("d2").value = "4";
document.getElementById("db0").checked = false;
document.getElementById("db1").checked = false;
document.getElementById("db2").checked = false;
document.getElementById("db3").checked = false;'>4
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'db3' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("d2").value = "3";
document.getElementById("db0").checked = false;
document.getElementById("db1").checked = false;
document.getElementById("db2").checked = false;
document.getElementById("db4").checked = false;'>3
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'db2' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("d2").value = "2";
document.getElementById("db0").checked = false;
document.getElementById("db1").checked = false;
document.getElementById("db3").checked = false;
document.getElementById("db4").checked = false;'>2
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'db1' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("d2").value = "1";
document.getElementById("db0").checked = false;
document.getElementById("db2").checked = false;
document.getElementById("db3").checked = false;
document.getElementById("db4").checked = false;'>1
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'db0' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("d2").value = "0.00";
document.getElementById("db1").checked = false;
document.getElementById("db2").checked = false;
document.getElementById("db3").checked = false;
document.getElementById("db4").checked = false;'>0
</label>

</th>

<input type = 'text' name = 'd2' id = 'd2' style = 'display: none;' required>

</tr>

<tr style = 'border: 2px solid black'>

<th style = 'text-align: center; min-width: 20; max-width: 20; font-size: 25;'>
3
</th>

<th style = 'text-align: left; min-width: 500; max-width: 500; overflow: hidden; font-size: 25;'>
The teacher monitors and checks on students’ learning and attainment of the unit standards and competencies by conducting varied forms of assessments during class discussion.
</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'dc4' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("d3").value = "4";
document.getElementById("dc0").checked = false;
document.getElementById("dc1").checked = false;
document.getElementById("dc2").checked = false;
document.getElementById("dc3").checked = false;'>4
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'd3' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("d3").value = "3";
document.getElementById("dc0").checked = false;
document.getElementById("dc1").checked = false;
document.getElementById("dc2").checked = false;
document.getElementById("dc4").checked = false;'>3
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'dc2' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("d3").value = "2";
document.getElementById("dc0").checked = false;
document.getElementById("dc1").checked = false;
document.getElementById("dc3").checked = false;
document.getElementById("dc4").checked = false;'>2
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'dc1' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("d3").value = "1";
document.getElementById("dc0").checked = false;
document.getElementById("dc2").checked = false;
document.getElementById("dc3").checked = false;
document.getElementById("dc4").checked = false;'>1
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'dc0' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("d3").value = "0.00";
document.getElementById("dc1").checked = false;
document.getElementById("dc2").checked = false;
document.getElementById("dc3").checked = false;
document.getElementById("dc4").checked = false;'>0
</label>

</th>

<input type = 'text' name = 'd3' id = 'd3' style = 'display: none;' required>

</tr>

<tr style = 'border: 2px solid black'>

<th style = 'text-align: center; min-width: 20; max-width: 20; font-size: 25;'>
4
</th>

<th style = 'text-align: left; min-width: 500; max-width: 500; overflow: hidden; font-size: 25;'>
The teacher provides appropriate feedback or interventions to enable students in attaining the unit standards and competencies.
</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'dd4' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("d4").value = "4";
document.getElementById("dd0").checked = false;
document.getElementById("dd1").checked = false;
document.getElementById("dd2").checked = false;
document.getElementById("dd3").checked = false;'>4
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'dd3' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("d4").value = "3";
document.getElementById("dd0").checked = false;
document.getElementById("dd1").checked = false;
document.getElementById("dd2").checked = false;
document.getElementById("dd4").checked = false;'>3
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'dd2' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("d4").value = "2";
document.getElementById("dd0").checked = false;
document.getElementById("dd1").checked = false;
document.getElementById("dd3").checked = false;
document.getElementById("dd4").checked = false;'>2
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'dd1' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("d4").value = "1";
document.getElementById("dd0").checked = false;
document.getElementById("dd2").checked = false;
document.getElementById("dd3").checked = false;
document.getElementById("dd4").checked = false;'>1
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'dd0' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("d4").value = "0.00";
document.getElementById("dd1").checked = false;
document.getElementById("dd2").checked = false;
document.getElementById("dd3").checked = false;
document.getElementById("dd4").checked = false;'>0
</label>

</th>

<input type = 'text' name = 'd4' id = 'd4' style = 'display: none;' required>

</tr>

<tr style = 'border: 2px solid black'>

<th style = 'text-align: center; min-width: 20; max-width: 20; font-size: 25;'>
5
</th>

<th style = 'text-align: left; min-width: 500; max-width: 500; overflow: hidden; font-size: 25;'>
The teacher manages the classroom environment and time in a way that supports student learning and the achievement of the unit standards and competencies.
</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'de4' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("d5").value = "4";
document.getElementById("de0").checked = false;
document.getElementById("de1").checked = false;
document.getElementById("de2").checked = false;
document.getElementById("de3").checked = false;'>4
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'de3' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("d5").value = "3";
document.getElementById("de0").checked = false;
document.getElementById("de1").checked = false;
document.getElementById("de2").checked = false;
document.getElementById("de4").checked = false;'>3
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'de2' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("d5").value = "2";
document.getElementById("de0").checked = false;
document.getElementById("de1").checked = false;
document.getElementById("de3").checked = false;
document.getElementById("de4").checked = false;'>2
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'de1' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("d5").value = "1";
document.getElementById("de0").checked = false;
document.getElementById("de2").checked = false;
document.getElementById("de3").checked = false;
document.getElementById("de4").checked = false;'>1
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'de0' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("d5").value = "0.00";
document.getElementById("de1").checked = false;
document.getElementById("de2").checked = false;
document.getElementById("de3").checked = false;
document.getElementById("de4").checked = false;'>0
</label>

</th>

<input type = 'text' name = 'd5' id = 'd5' style = 'display: none;' required>

</tr>

<tr style = 'border: 2px solid black'>

<th style = 'text-align: center; min-width: 20; max-width: 20; font-size: 25;'>
6
</th>

<th style = 'text-align: left; min-width: 500; max-width: 500; overflow: hidden; font-size: 25;'>
The teacher processes students’ understanding by asking clarifying or critical thinking questions related to the unit standards or competencies.
</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'df4' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("d6").value = "4";
document.getElementById("df0").checked = false;
document.getElementById("df1").checked = false;
document.getElementById("df2").checked = false;
document.getElementById("df3").checked = false;'>4
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'd3' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("d6").value = "3";
document.getElementById("df0").checked = false;
document.getElementById("df1").checked = false;
document.getElementById("df2").checked = false;
document.getElementById("df4").checked = false;'>3
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'df2' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("d6").value = "2";
document.getElementById("df0").checked = false;
document.getElementById("df1").checked = false;
document.getElementById("df3").checked = false;
document.getElementById("df4").checked = false;'>2
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'df1' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("d6").value = "1";
document.getElementById("df0").checked = false;
document.getElementById("df2").checked = false;
document.getElementById("df3").checked = false;
document.getElementById("df4").checked = false;'>1
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'df0' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("d6").value = "0.00";
document.getElementById("df1").checked = false;
document.getElementById("df2").checked = false;
document.getElementById("df3").checked = false;
document.getElementById("df4").checked = false;'>0
</label>

</th>

<input type = 'text' name = 'd6' id = 'd6' style = 'display: none;' required>

</tr>

</table>












<br>

<table border = '1' cellspacing = 0 style = 'border: none; width: 1000;  position: relative;'>

<tr style = 'border: 2px solid black; background-color: EFC372'>
<th style = 'border-bottom: none;'>
<label style = 'font-size: 40;'>
Fifth Subject Teacher
</label>
</th>
</tr>

<?php
$cn = mysqli_connect('localhost', 'root', '', 'gmcbulac_db_gmc');
//$cn = mysqli_connect('localhost', 'gmcbulac_derek03', 'derek030872', 'gmcbulac_db_gmc');

if(isset($_POST['yrsec']))
{

$txtyrsec = $_POST['txtyrsec'];

$sql = mysqli_query($cn, "select * from subj_load where yr_sec = '$txtyrsec' and subj_order = 05");
while($row = mysqli_fetch_assoc($sql))
{
echo"
<tr style = 'border: 2px solid black; height: 200;'>
<th>

<input type = 'hidden' name = 'txtbranch' value = '$row[branch]'>
<input type = 'hidden' name = 'txtyrsec' value = '$row[yr_sec]'>

<label style = 'font-size: 30;'>
Name of Teacher:
</label>
<br>
<input type = 'text' name = 'txtteacher5' id = 'txtteacher5' style = 'width: 900; font-size: 25; text-align: center;' value = '$row[teacher]' readonly required>

<br><br>

<label style = 'font-size: 30;'>
Subject of Instruction:
</label>
<br>
<input type = 'text' name = 'txtsubjdesc5' id = 'txtsubjdesc5' style = 'width: 900; font-size: 25; text-align: center;' value = '$row[subj_desc]' readonly required>

</th>
</tr>";
}

}

?>

</table>

<table border = '1' cellspacing = 0 style = 'border: none; width: 1000;  position: relative;'>

<tr  style = 'border: 2px solid black'>
<th style = 'text-align: left; font-size: 25;'>
TEACHER ACTIONS
</th>
</tr>

</table>

<table border = '1' cellspacing = 0 style = 'border: none; width: 1000;  position: relative;'>

<tr style = 'border: 2px solid black'>

<th style = 'text-align: center; min-width: 20; max-width: 20; font-size: 25;'>
1
</th>

<th style = 'text-align: left; min-width: 500; max-width: 500; overflow: hidden; font-size: 25;'>
The teacher communicates clear expectations of student performance in line with the unit standards and competencies.
</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'ea4' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("e1").value = "4";
document.getElementById("ea0").checked = false;
document.getElementById("ea1").checked = false;
document.getElementById("ea2").checked = false;
document.getElementById("ea3").checked = false;'>4
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'ea3' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("e1").value = "3";
document.getElementById("ea0").checked = false;
document.getElementById("ea1").checked = false;
document.getElementById("ea2").checked = false;
document.getElementById("ea4").checked = false;'>3
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'ea2' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("e1").value = "2";
document.getElementById("ea0").checked = false;
document.getElementById("ea1").checked = false;
document.getElementById("ea3").checked = false;
document.getElementById("ea4").checked = false;'>2
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'ea1' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("e1").value = "1";
document.getElementById("ea0").checked = false;
document.getElementById("ea2").checked = false;
document.getElementById("ea3").checked = false;
document.getElementById("ea4").checked = false;'>1
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'ea0' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("e1").value = "0.00";
document.getElementById("ea1").checked = false;
document.getElementById("ea2").checked = false;
document.getElementById("ea3").checked = false;
document.getElementById("ea4").checked = false;'>0
</label>

</th>

<input type = 'text' name = 'e1' id = 'e1' style = 'display: none;' required>

</tr>

<tr style = 'border: 2px solid black'>

<th style = 'text-align: center; min-width: 20; max-width: 20; font-size: 25;'>
2
</th>

<th style = 'text-align: left; min-width: 500; max-width: 500; overflow: hidden; font-size: 25;'>
The teacher utilizes various learning materials, resources and strategies to enable all students to learn and achieve the unit standards and competencies and learning goals.
</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'eb4' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("e2").value = "4";
document.getElementById("eb0").checked = false;
document.getElementById("eb1").checked = false;
document.getElementById("eb2").checked = false;
document.getElementById("eb3").checked = false;'>4
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'eb3' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("e2").value = "3";
document.getElementById("eb0").checked = false;
document.getElementById("eb1").checked = false;
document.getElementById("eb2").checked = false;
document.getElementById("eb4").checked = false;'>3
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'eb2' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("e2").value = "2";
document.getElementById("eb0").checked = false;
document.getElementById("eb1").checked = false;
document.getElementById("eb3").checked = false;
document.getElementById("eb4").checked = false;'>2
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'eb1' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("e2").value = "1";
document.getElementById("eb0").checked = false;
document.getElementById("eb2").checked = false;
document.getElementById("eb3").checked = false;
document.getElementById("eb4").checked = false;'>1
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'eb0' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("e2").value = "0.00";
document.getElementById("eb1").checked = false;
document.getElementById("eb2").checked = false;
document.getElementById("eb3").checked = false;
document.getElementById("eb4").checked = false;'>0
</label>

</th>

<input type = 'text' name = 'e2' id = 'e2' style = 'display: none;' required>

</tr>

<tr style = 'border: 2px solid black'>

<th style = 'text-align: center; min-width: 20; max-width: 20; font-size: 25;'>
3
</th>

<th style = 'text-align: left; min-width: 500; max-width: 500; overflow: hidden; font-size: 25;'>
The teacher monitors and checks on students’ learning and attainment of the unit standards and competencies by conducting varied forms of assessments during class discussion.
</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'ec4' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("e3").value = "4";
document.getElementById("ec0").checked = false;
document.getElementById("ec1").checked = false;
document.getElementById("ec2").checked = false;
document.getElementById("ec3").checked = false;'>4
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'e3' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("e3").value = "3";
document.getElementById("ec0").checked = false;
document.getElementById("ec1").checked = false;
document.getElementById("ec2").checked = false;
document.getElementById("ec4").checked = false;'>3
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'ec2' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("e3").value = "2";
document.getElementById("ec0").checked = false;
document.getElementById("ec1").checked = false;
document.getElementById("ec3").checked = false;
document.getElementById("ec4").checked = false;'>2
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'ec1' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("e3").value = "1";
document.getElementById("ec0").checked = false;
document.getElementById("ec2").checked = false;
document.getElementById("ec3").checked = false;
document.getElementById("ec4").checked = false;'>1
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'ec0' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("e3").value = "0.00";
document.getElementById("ec1").checked = false;
document.getElementById("ec2").checked = false;
document.getElementById("ec3").checked = false;
document.getElementById("ec4").checked = false;'>0
</label>

</th>

<input type = 'text' name = 'e3' id = 'e3' style = 'display: none;' required>

</tr>

<tr style = 'border: 2px solid black'>

<th style = 'text-align: center; min-width: 20; max-width: 20; font-size: 25;'>
4
</th>

<th style = 'text-align: left; min-width: 500; max-width: 500; overflow: hidden; font-size: 25;'>
The teacher provides appropriate feedback or interventions to enable students in attaining the unit standards and competencies.
</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'ed4' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("e4").value = "4";
document.getElementById("ed0").checked = false;
document.getElementById("ed1").checked = false;
document.getElementById("ed2").checked = false;
document.getElementById("ed3").checked = false;'>4
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'ed3' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("e4").value = "3";
document.getElementById("ed0").checked = false;
document.getElementById("ed1").checked = false;
document.getElementById("ed2").checked = false;
document.getElementById("ed4").checked = false;'>3
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'ed2' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("e4").value = "2";
document.getElementById("ed0").checked = false;
document.getElementById("ed1").checked = false;
document.getElementById("ed3").checked = false;
document.getElementById("ed4").checked = false;'>2
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'ed1' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("e4").value = "1";
document.getElementById("ed0").checked = false;
document.getElementById("ed2").checked = false;
document.getElementById("ed3").checked = false;
document.getElementById("ed4").checked = false;'>1
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'ed0' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("e4").value = "0.00";
document.getElementById("ed1").checked = false;
document.getElementById("ed2").checked = false;
document.getElementById("ed3").checked = false;
document.getElementById("ed4").checked = false;'>0
</label>

</th>

<input type = 'text' name = 'e4' id = 'e4' style = 'display: none;' required>

</tr>

<tr style = 'border: 2px solid black'>

<th style = 'text-align: center; min-width: 20; max-width: 20; font-size: 25;'>
5
</th>

<th style = 'text-align: left; min-width: 500; max-width: 500; overflow: hidden; font-size: 25;'>
The teacher manages the classroom environment and time in a way that supports student learning and the achievement of the unit standards and competencies.
</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'ee4' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("e5").value = "4";
document.getElementById("ee0").checked = false;
document.getElementById("ee1").checked = false;
document.getElementById("ee2").checked = false;
document.getElementById("ee3").checked = false;'>4
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'ee3' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("e5").value = "3";
document.getElementById("ee0").checked = false;
document.getElementById("ee1").checked = false;
document.getElementById("ee2").checked = false;
document.getElementById("ee4").checked = false;'>3
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'ee2' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("e5").value = "2";
document.getElementById("ee0").checked = false;
document.getElementById("ee1").checked = false;
document.getElementById("ee3").checked = false;
document.getElementById("ee4").checked = false;'>2
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'ee1' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("e5").value = "1";
document.getElementById("ee0").checked = false;
document.getElementById("ee2").checked = false;
document.getElementById("ee3").checked = false;
document.getElementById("ee4").checked = false;'>1
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'ee0' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("e5").value = "0.00";
document.getElementById("ee1").checked = false;
document.getElementById("ee2").checked = false;
document.getElementById("ee3").checked = false;
document.getElementById("ee4").checked = false;'>0
</label>

</th>

<input type = 'text' name = 'e5' id = 'e5' style = 'display: none;' required>

</tr>

<tr style = 'border: 2px solid black'>

<th style = 'text-align: center; min-width: 20; max-width: 20; font-size: 25;'>
6
</th>

<th style = 'text-align: left; min-width: 500; max-width: 500; overflow: hidden; font-size: 25;'>
The teacher processes students’ understanding by asking clarifying or critical thinking questions related to the unit standards or competencies.
</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'ef4' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("e6").value = "4";
document.getElementById("ef0").checked = false;
document.getElementById("ef1").checked = false;
document.getElementById("ef2").checked = false;
document.getElementById("ef3").checked = false;'>4
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'ef3' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("e6").value = "3";
document.getElementById("ef0").checked = false;
document.getElementById("ef1").checked = false;
document.getElementById("ef2").checked = false;
document.getElementById("ef4").checked = false;'>3
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'ef2' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("e6").value = "2";
document.getElementById("ef0").checked = false;
document.getElementById("ef1").checked = false;
document.getElementById("ef3").checked = false;
document.getElementById("ef4").checked = false;'>2
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'ef1' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("e6").value = "1";
document.getElementById("ef0").checked = false;
document.getElementById("ef2").checked = false;
document.getElementById("ef3").checked = false;
document.getElementById("ef4").checked = false;'>1
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'ef0' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("e6").value = "0.00";
document.getElementById("ef1").checked = false;
document.getElementById("ef2").checked = false;
document.getElementById("ef3").checked = false;
document.getElementById("ef4").checked = false;'>0
</label>

</th>

<input type = 'text' name = 'e6' id = 'e6' style = 'display: none;' required>

</tr>

</table>












<br>

<table border = '1' cellspacing = 0 style = 'border: none; width: 1000;  position: relative;'>

<tr style = 'border: 2px solid black; background-color: EFC372'>
<th style = 'border-bottom: none;'>
<label style = 'font-size: 40;'>
Sixth Subject Teacher
</label>
</th>
</tr>

<?php
$cn = mysqli_connect('localhost', 'root', '', 'gmcbulac_db_gmc');
//$cn = mysqli_connect('localhost', 'gmcbulac_derek03', 'derek030872', 'gmcbulac_db_gmc');

if(isset($_POST['yrsec']))
{

$txtyrsec = $_POST['txtyrsec'];

$sql = mysqli_query($cn, "select * from subj_load where yr_sec = '$txtyrsec' and subj_order = 06");
while($row = mysqli_fetch_assoc($sql))
{
echo"
<tr style = 'border: 2px solid black; height: 200;'>
<th>

<input type = 'hidden' name = 'txtbranch' value = '$row[branch]'>
<input type = 'hidden' name = 'txtyrsec' value = '$row[yr_sec]'>

<label style = 'font-size: 30;'>
Name of Teacher:
</label>
<br>
<input type = 'text' name = 'txtteacher6' id = 'txtteacher6' style = 'width: 900; font-size: 25; text-align: center;' value = '$row[teacher]' readonly required>

<br><br>

<label style = 'font-size: 30;'>
Subject of Instruction:
</label>
<br>
<input type = 'text' name = 'txtsubjdesc6' id = 'txtsubjdesc6' style = 'width: 900; font-size: 25; text-align: center;' value = '$row[subj_desc]' readonly required>

</th>
</tr>";
}

}

?>

</table>

<table border = '1' cellspacing = 0 style = 'border: none; width: 1000;  position: relative;'>

<tr  style = 'border: 2px solid black'>
<th style = 'text-align: left; font-size: 25;'>
TEACHER ACTIONS
</th>
</tr>

</table>

<table border = '1' cellspacing = 0 style = 'border: none; width: 1000;  position: relative;'>

<tr style = 'border: 2px solid black'>

<th style = 'text-align: center; min-width: 20; max-width: 20; font-size: 25;'>
1
</th>

<th style = 'text-align: left; min-width: 500; max-width: 500; overflow: hidden; font-size: 25;'>
The teacher communicates clear expectations of student performance in line with the unit standards and competencies.
</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'fa4' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("f01").value = "4";
document.getElementById("fa0").checked = false;
document.getElementById("fa1").checked = false;
document.getElementById("fa2").checked = false;
document.getElementById("fa3").checked = false;'>4
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'fa3' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("f01").value = "3";
document.getElementById("fa0").checked = false;
document.getElementById("fa1").checked = false;
document.getElementById("fa2").checked = false;
document.getElementById("fa4").checked = false;'>3
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'fa2' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("f01").value = "2";
document.getElementById("fa0").checked = false;
document.getElementById("fa1").checked = false;
document.getElementById("fa3").checked = false;
document.getElementById("fa4").checked = false;'>2
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'fa1' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("f01").value = "1";
document.getElementById("fa0").checked = false;
document.getElementById("fa2").checked = false;
document.getElementById("fa3").checked = false;
document.getElementById("fa4").checked = false;'>1
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'fa0' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("f01").value = "0.00";
document.getElementById("fa1").checked = false;
document.getElementById("fa2").checked = false;
document.getElementById("fa3").checked = false;
document.getElementById("fa4").checked = false;'>0
</label>

</th>

<input type = 'text' name = 'f01' id = 'f01' style = 'display: none;' required>

</tr>

<tr style = 'border: 2px solid black'>

<th style = 'text-align: center; min-width: 20; max-width: 20; font-size: 25;'>
2
</th>

<th style = 'text-align: left; min-width: 500; max-width: 500; overflow: hidden; font-size: 25;'>
The teacher utilizes various learning materials, resources and strategies to enable all students to learn and achieve the unit standards and competencies and learning goals.
</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'fb4' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("f02").value = "4";
document.getElementById("fb0").checked = false;
document.getElementById("fb1").checked = false;
document.getElementById("fb2").checked = false;
document.getElementById("fb3").checked = false;'>4
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'fb3' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("f02").value = "3";
document.getElementById("fb0").checked = false;
document.getElementById("fb1").checked = false;
document.getElementById("fb2").checked = false;
document.getElementById("fb4").checked = false;'>3
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'fb2' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("f02").value = "2";
document.getElementById("fb0").checked = false;
document.getElementById("fb1").checked = false;
document.getElementById("fb3").checked = false;
document.getElementById("fb4").checked = false;'>2
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'fb1' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("f02").value = "1";
document.getElementById("fb0").checked = false;
document.getElementById("fb2").checked = false;
document.getElementById("fb3").checked = false;
document.getElementById("fb4").checked = false;'>1
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'fb0' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("f02").value = "0.00";
document.getElementById("fb1").checked = false;
document.getElementById("fb2").checked = false;
document.getElementById("fb3").checked = false;
document.getElementById("fb4").checked = false;'>0
</label>

</th>

<input type = 'text' name = 'f02' id = 'f02' style = 'display: none;' required>

</tr>

<tr style = 'border: 2px solid black'>

<th style = 'text-align: center; min-width: 20; max-width: 20; font-size: 25;'>
3
</th>

<th style = 'text-align: left; min-width: 500; max-width: 500; overflow: hidden; font-size: 25;'>
The teacher monitors and checks on students’ learning and attainment of the unit standards and competencies by conducting varied forms of assessments during class discussion.
</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'fc4' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("f03").value = "4";
document.getElementById("fc0").checked = false;
document.getElementById("fc1").checked = false;
document.getElementById("fc2").checked = false;
document.getElementById("fc3").checked = false;'>4
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'fc3' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("f03").value = "3";
document.getElementById("fc0").checked = false;
document.getElementById("fc1").checked = false;
document.getElementById("fc2").checked = false;
document.getElementById("fc4").checked = false;'>3
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'fc2' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("f03").value = "2";
document.getElementById("fc0").checked = false;
document.getElementById("fc1").checked = false;
document.getElementById("fc3").checked = false;
document.getElementById("fc4").checked = false;'>2
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'fc1' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("f03").value = "1";
document.getElementById("fc0").checked = false;
document.getElementById("fc2").checked = false;
document.getElementById("fc3").checked = false;
document.getElementById("fc4").checked = false;'>1
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'fc0' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("f03").value = "0.00";
document.getElementById("fc1").checked = false;
document.getElementById("fc2").checked = false;
document.getElementById("fc3").checked = false;
document.getElementById("fc4").checked = false;'>0
</label>

</th>

<input type = 'text' name = 'f03' id = 'f03' style = 'display: none;' required>

</tr>

<tr style = 'border: 2px solid black'>

<th style = 'text-align: center; min-width: 20; max-width: 20; font-size: 25;'>
4
</th>

<th style = 'text-align: left; min-width: 500; max-width: 500; overflow: hidden; font-size: 25;'>
The teacher provides appropriate feedback or interventions to enable students in attaining the unit standards and competencies.
</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'fd4' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("f04").value = "4";
document.getElementById("fd0").checked = false;
document.getElementById("fd1").checked = false;
document.getElementById("fd2").checked = false;
document.getElementById("fd3").checked = false;'>4
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'fd3' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("f04").value = "3";
document.getElementById("fd0").checked = false;
document.getElementById("fd1").checked = false;
document.getElementById("fd2").checked = false;
document.getElementById("fd4").checked = false;'>3
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'fd2' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("f04").value = "2";
document.getElementById("fd0").checked = false;
document.getElementById("fd1").checked = false;
document.getElementById("fd3").checked = false;
document.getElementById("fd4").checked = false;'>2
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'fd1' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("f04").value = "1";
document.getElementById("fd0").checked = false;
document.getElementById("fd2").checked = false;
document.getElementById("fd3").checked = false;
document.getElementById("fd4").checked = false;'>1
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'fd0' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("f04").value = "0.00";
document.getElementById("fd1").checked = false;
document.getElementById("fd2").checked = false;
document.getElementById("fd3").checked = false;
document.getElementById("fd4").checked = false;'>0
</label>

</th>

<input type = 'text' name = 'f04' id = 'f04' style = 'display: none;' required>

</tr>

<tr style = 'border: 2px solid black'>

<th style = 'text-align: center; min-width: 20; max-width: 20; font-size: 25;'>
5
</th>

<th style = 'text-align: left; min-width: 500; max-width: 500; overflow: hidden; font-size: 25;'>
The teacher manages the classroom environment and time in a way that supports student learning and the achievement of the unit standards and competencies.
</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'fe4' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("f05").value = "4";
document.getElementById("fe0").checked = false;
document.getElementById("fe1").checked = false;
document.getElementById("fe2").checked = false;
document.getElementById("fe3").checked = false;'>4
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'fe3' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("f05").value = "3";
document.getElementById("fe0").checked = false;
document.getElementById("fe1").checked = false;
document.getElementById("fe2").checked = false;
document.getElementById("fe4").checked = false;'>3
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'fe2' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("f05").value = "2";
document.getElementById("fe0").checked = false;
document.getElementById("fe1").checked = false;
document.getElementById("fe3").checked = false;
document.getElementById("fe4").checked = false;'>2
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'fe1' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("f05").value = "1";
document.getElementById("fe0").checked = false;
document.getElementById("fe2").checked = false;
document.getElementById("fe3").checked = false;
document.getElementById("fe4").checked = false;'>1
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'fe0' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("f05").value = "0.00";
document.getElementById("fe1").checked = false;
document.getElementById("fe2").checked = false;
document.getElementById("fe3").checked = false;
document.getElementById("fe4").checked = false;'>0
</label>

</th>

<input type = 'text' name = 'f05' id = 'f05' style = 'display: none;' required>

</tr>

<tr style = 'border: 2px solid black'>

<th style = 'text-align: center; min-width: 20; max-width: 20; font-size: 25;'>
6
</th>

<th style = 'text-align: left; min-width: 500; max-width: 500; overflow: hidden; font-size: 25;'>
The teacher processes students’ understanding by asking clarifying or critical thinking questions related to the unit standards or competencies.
</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'ff4' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("f06").value = "4";
document.getElementById("ff0").checked = false;
document.getElementById("ff1").checked = false;
document.getElementById("ff2").checked = false;
document.getElementById("ff3").checked = false;'>4
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'ff3' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("f06").value = "3";
document.getElementById("ff0").checked = false;
document.getElementById("ff1").checked = false;
document.getElementById("ff2").checked = false;
document.getElementById("ff4").checked = false;'>3
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'ff2' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("f06").value = "2";
document.getElementById("ff0").checked = false;
document.getElementById("ff1").checked = false;
document.getElementById("ff3").checked = false;
document.getElementById("ff4").checked = false;'>2
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'ff1' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("f06").value = "1";
document.getElementById("ff0").checked = false;
document.getElementById("ff2").checked = false;
document.getElementById("ff3").checked = false;
document.getElementById("ff4").checked = false;'>1
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'ff0' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("f06").value = "0.00";
document.getElementById("ff1").checked = false;
document.getElementById("ff2").checked = false;
document.getElementById("ff3").checked = false;
document.getElementById("ff4").checked = false;'>0
</label>

</th>

<input type = 'text' name = 'f06' id = 'f06' style = 'display: none;' required>

</tr>

</table>












<br>

<table border = '1' cellspacing = 0 style = 'border: none; width: 1000;  position: relative;'>

<tr style = 'border: 2px solid black; background-color: EFC372'>
<th style = 'border-bottom: none;'>
<label style = 'font-size: 40;'>
Seventh Subject Teacher
</label>
</th>
</tr>

<?php
$cn = mysqli_connect('localhost', 'root', '', 'gmcbulac_db_gmc');
//$cn = mysqli_connect('localhost', 'gmcbulac_derek03', 'derek030872', 'gmcbulac_db_gmc');

if(isset($_POST['yrsec']))
{

$txtyrsec = $_POST['txtyrsec'];

$sql = mysqli_query($cn, "select * from subj_load where yr_sec = '$txtyrsec' and subj_order = 07");
while($row = mysqli_fetch_assoc($sql))
{
echo"
<tr style = 'border: 2px solid black; height: 200;'>
<th>

<input type = 'hidden' name = 'txtbranch' value = '$row[branch]'>
<input type = 'hidden' name = 'txtyrsec' value = '$row[yr_sec]'>

<label style = 'font-size: 30;'>
Name of Teacher:
</label>
<br>
<input type = 'text' name = 'txtteacher7' id = 'txtteacher7' style = 'width: 900; font-size: 25; text-align: center;' value = '$row[teacher]' readonly required>

<br><br>

<label style = 'font-size: 30;'>
Subject of Instruction:
</label>
<br>
<input type = 'text' name = 'txtsubjdesc7' id = 'txtsubjdesc7' style = 'width: 900; font-size: 25; text-align: center;' value = '$row[subj_desc]' readonly required>

</th>
</tr>";
}

}

?>

</table>

<table border = '1' cellspacing = 0 style = 'border: none; width: 1000;  position: relative;'>

<tr  style = 'border: 2px solid black'>
<th style = 'text-align: left; font-size: 25;'>
TEACHER ACTIONS
</th>
</tr>

</table>

<table border = '1' cellspacing = 0 style = 'border: none; width: 1000;  position: relative;'>

<tr style = 'border: 2px solid black'>

<th style = 'text-align: center; min-width: 20; max-width: 20; font-size: 25;'>
1
</th>

<th style = 'text-align: left; min-width: 500; max-width: 500; overflow: hidden; font-size: 25;'>
The teacher communicates clear expectations of student performance in line with the unit standards and competencies.
</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'ga4' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("g01").value = "4";
document.getElementById("ga0").checked = false;
document.getElementById("ga1").checked = false;
document.getElementById("ga2").checked = false;
document.getElementById("ga3").checked = false;'>4
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'ga3' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("g01").value = "3";
document.getElementById("ga0").checked = false;
document.getElementById("ga1").checked = false;
document.getElementById("ga2").checked = false;
document.getElementById("ga4").checked = false;'>3
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'ga2' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("g01").value = "2";
document.getElementById("ga0").checked = false;
document.getElementById("ga1").checked = false;
document.getElementById("ga3").checked = false;
document.getElementById("ga4").checked = false;'>2
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'ga1' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("g01").value = "1";
document.getElementById("ga0").checked = false;
document.getElementById("ga2").checked = false;
document.getElementById("ga3").checked = false;
document.getElementById("ga4").checked = false;'>1
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'ga0' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("g01").value = "0.00";
document.getElementById("ga1").checked = false;
document.getElementById("ga2").checked = false;
document.getElementById("ga3").checked = false;
document.getElementById("ga4").checked = false;'>0
</label>

</th>

<input type = 'text' name = 'g01' id = 'g01' style = 'display: none;' required>

</tr>

<tr style = 'border: 2px solid black'>

<th style = 'text-align: center; min-width: 20; max-width: 20; font-size: 25;'>
2
</th>

<th style = 'text-align: left; min-width: 500; max-width: 500; overflow: hidden; font-size: 25;'>
The teacher utilizes various learning materials, resources and strategies to enable all students to learn and achieve the unit standards and competencies and learning goals.
</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'gb4' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("g02").value = "4";
document.getElementById("gb0").checked = false;
document.getElementById("gb1").checked = false;
document.getElementById("gb2").checked = false;
document.getElementById("gb3").checked = false;'>4
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'gb3' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("g02").value = "3";
document.getElementById("gb0").checked = false;
document.getElementById("gb1").checked = false;
document.getElementById("gb2").checked = false;
document.getElementById("gb4").checked = false;'>3
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'gb2' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("g02").value = "2";
document.getElementById("gb0").checked = false;
document.getElementById("gb1").checked = false;
document.getElementById("gb3").checked = false;
document.getElementById("gb4").checked = false;'>2
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'gb1' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("g02").value = "1";
document.getElementById("gb0").checked = false;
document.getElementById("gb2").checked = false;
document.getElementById("gb3").checked = false;
document.getElementById("gb4").checked = false;'>1
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'gb0' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("g02").value = "0.00";
document.getElementById("gb1").checked = false;
document.getElementById("gb2").checked = false;
document.getElementById("gb3").checked = false;
document.getElementById("gb4").checked = false;'>0
</label>

</th>

<input type = 'text' name = 'g02' id = 'g02' style = 'display: none;' required>

</tr>

<tr style = 'border: 2px solid black'>

<th style = 'text-align: center; min-width: 20; max-width: 20; font-size: 25;'>
3
</th>

<th style = 'text-align: left; min-width: 500; max-width: 500; overflow: hidden; font-size: 25;'>
The teacher monitors and checks on students’ learning and attainment of the unit standards and competencies by conducting varied forms of assessments during class discussion.
</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'gc4' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("g03").value = "4";
document.getElementById("gc0").checked = false;
document.getElementById("gc1").checked = false;
document.getElementById("gc2").checked = false;
document.getElementById("gc3").checked = false;'>4
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'gc3' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("g03").value = "3";
document.getElementById("gc0").checked = false;
document.getElementById("gc1").checked = false;
document.getElementById("gc2").checked = false;
document.getElementById("gc4").checked = false;'>3
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'gc2' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("g03").value = "2";
document.getElementById("gc0").checked = false;
document.getElementById("gc1").checked = false;
document.getElementById("gc3").checked = false;
document.getElementById("gc4").checked = false;'>2
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'gc1' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("g03").value = "1";
document.getElementById("gc0").checked = false;
document.getElementById("gc2").checked = false;
document.getElementById("gc3").checked = false;
document.getElementById("gc4").checked = false;'>1
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'gc0' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("g03").value = "0.00";
document.getElementById("gc1").checked = false;
document.getElementById("gc2").checked = false;
document.getElementById("gc3").checked = false;
document.getElementById("gc4").checked = false;'>0
</label>

</th>

<input type = 'text' name = 'g03' id = 'g03' style = 'display: none;' required>

</tr>

<tr style = 'border: 2px solid black'>

<th style = 'text-align: center; min-width: 20; max-width: 20; font-size: 25;'>
4
</th>

<th style = 'text-align: left; min-width: 500; max-width: 500; overflow: hidden; font-size: 25;'>
The teacher provides appropriate feedback or interventions to enable students in attaining the unit standards and competencies.
</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'gd4' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("g04").value = "4";
document.getElementById("gd0").checked = false;
document.getElementById("gd1").checked = false;
document.getElementById("gd2").checked = false;
document.getElementById("gd3").checked = false;'>4
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'gd3' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("g04").value = "3";
document.getElementById("gd0").checked = false;
document.getElementById("gd1").checked = false;
document.getElementById("gd2").checked = false;
document.getElementById("gd4").checked = false;'>3
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'gd2' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("g04").value = "2";
document.getElementById("gd0").checked = false;
document.getElementById("gd1").checked = false;
document.getElementById("gd3").checked = false;
document.getElementById("gd4").checked = false;'>2
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'gd1' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("g04").value = "1";
document.getElementById("gd0").checked = false;
document.getElementById("gd2").checked = false;
document.getElementById("gd3").checked = false;
document.getElementById("gd4").checked = false;'>1
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'gd0' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("g04").value = "0.00";
document.getElementById("gd1").checked = false;
document.getElementById("gd2").checked = false;
document.getElementById("gd3").checked = false;
document.getElementById("gd4").checked = false;'>0
</label>

</th>

<input type = 'text' name = 'g04' id = 'g04' style = 'display: none;' required>

</tr>

<tr style = 'border: 2px solid black'>

<th style = 'text-align: center; min-width: 20; max-width: 20; font-size: 25;'>
5
</th>

<th style = 'text-align: left; min-width: 500; max-width: 500; overflow: hidden; font-size: 25;'>
The teacher manages the classroom environment and time in a way that supports student learning and the achievement of the unit standards and competencies.
</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'ge4' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("g05").value = "4";
document.getElementById("ge0").checked = false;
document.getElementById("ge1").checked = false;
document.getElementById("ge2").checked = false;
document.getElementById("ge3").checked = false;'>4
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'ge3' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("g05").value = "3";
document.getElementById("ge0").checked = false;
document.getElementById("ge1").checked = false;
document.getElementById("ge2").checked = false;
document.getElementById("ge4").checked = false;'>3
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'ge2' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("g05").value = "2";
document.getElementById("ge0").checked = false;
document.getElementById("ge1").checked = false;
document.getElementById("ge3").checked = false;
document.getElementById("ge4").checked = false;'>2
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'ge1' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("g05").value = "1";
document.getElementById("ge0").checked = false;
document.getElementById("ge2").checked = false;
document.getElementById("ge3").checked = false;
document.getElementById("ge4").checked = false;'>1
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'ge0' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("g05").value = "0.00";
document.getElementById("ge1").checked = false;
document.getElementById("ge2").checked = false;
document.getElementById("ge3").checked = false;
document.getElementById("ge4").checked = false;'>0
</label>

</th>

<input type = 'text' name = 'g05' id = 'g05' style = 'display: none;' required>

</tr>

<tr style = 'border: 2px solid black'>

<th style = 'text-align: center; min-width: 20; max-width: 20; font-size: 25;'>
6
</th>

<th style = 'text-align: left; min-width: 500; max-width: 500; overflow: hidden; font-size: 25;'>
The teacher processes students’ understanding by asking clarifying or critical thinking questions related to the unit standards or competencies.
</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'gf4' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("g06").value = "4";
document.getElementById("gf0").checked = false;
document.getElementById("gf1").checked = false;
document.getElementById("gf2").checked = false;
document.getElementById("gf3").checked = false;'>4
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'gf3' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("g06").value = "3";
document.getElementById("gf0").checked = false;
document.getElementById("gf1").checked = false;
document.getElementById("gf2").checked = false;
document.getElementById("gf4").checked = false;'>3
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'gf2' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("g06").value = "2";
document.getElementById("gf0").checked = false;
document.getElementById("gf1").checked = false;
document.getElementById("gf3").checked = false;
document.getElementById("gf4").checked = false;'>2
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'gf1' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("g06").value = "1";
document.getElementById("gf0").checked = false;
document.getElementById("gf2").checked = false;
document.getElementById("gf3").checked = false;
document.getElementById("gf4").checked = false;'>1
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'gf0' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("g06").value = "0.00";
document.getElementById("gf1").checked = false;
document.getElementById("gf2").checked = false;
document.getElementById("gf3").checked = false;
document.getElementById("gf4").checked = false;'>0
</label>

</th>

<input type = 'text' name = 'g06' id = 'g06' style = 'display: none;' required>

</tr>

</table>










<br>

<table border = '1' cellspacing = 0 style = 'border: none; width: 1000;  position: relative;'>

<tr style = 'border: 2px solid black; background-color: EFC372'>
<th style = 'border-bottom: none;'>
<label style = 'font-size: 40;'>
Eighth Subject Teacher
</label>
</th>
</tr>

<?php
$cn = mysqli_connect('localhost', 'root', '', 'gmcbulac_db_gmc');
//$cn = mysqli_connect('localhost', 'gmcbulac_derek03', 'derek030872', 'gmcbulac_db_gmc');

if(isset($_POST['yrsec']))
{

$txtyrsec = $_POST['txtyrsec'];

$sql = mysqli_query($cn, "select * from subj_load where yr_sec = '$txtyrsec' and subj_order = 08");
while($row = mysqli_fetch_assoc($sql))
{
echo"
<tr style = 'border: 2px solid black; height: 200;'>
<th>

<input type = 'hidden' name = 'txtbranch' value = '$row[branch]'>
<input type = 'hidden' name = 'txtyrsec' value = '$row[yr_sec]'>

<label style = 'font-size: 30;'>
Name of Teacher:
</label>
<br>
<input type = 'text' name = 'txtteacher8' id = 'txtteacher8' style = 'width: 900; font-size: 25; text-align: center;' value = '$row[teacher]' readonly required>

<br><br>

<label style = 'font-size: 30;'>
Subject of Instruction:
</label>
<br>
<input type = 'text' name = 'txtsubjdesc8' id = 'txtsubjdesc8' style = 'width: 900; font-size: 25; text-align: center;' value = '$row[subj_desc]' readonly required>

</th>
</tr>";
}

}

?>

</table>

<table border = '1' cellspacing = 0 style = 'border: none; width: 1000;  position: relative;'>

<tr  style = 'border: 2px solid black'>
<th style = 'text-align: left; font-size: 25;'>
TEACHER ACTIONS
</th>
</tr>

</table>

<table border = '1' cellspacing = 0 style = 'border: none; width: 1000;  position: relative;'>

<tr style = 'border: 2px solid black'>

<th style = 'text-align: center; min-width: 20; max-width: 20; font-size: 25;'>
1
</th>

<th style = 'text-align: left; min-width: 500; max-width: 500; overflow: hidden; font-size: 25;'>
The teacher communicates clear expectations of student performance in line with the unit standards and competencies.
</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'ha4' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("h01").value = "4";
document.getElementById("ha0").checked = false;
document.getElementById("ha1").checked = false;
document.getElementById("ha2").checked = false;
document.getElementById("ha3").checked = false;'>4
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'ha3' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("h01").value = "3";
document.getElementById("ha0").checked = false;
document.getElementById("ha1").checked = false;
document.getElementById("ha2").checked = false;
document.getElementById("ha4").checked = false;'>3
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'ha2' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("h01").value = "2";
document.getElementById("ha0").checked = false;
document.getElementById("ha1").checked = false;
document.getElementById("ha3").checked = false;
document.getElementById("ha4").checked = false;'>2
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'ha1' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("h01").value = "1";
document.getElementById("ha0").checked = false;
document.getElementById("ha2").checked = false;
document.getElementById("ha3").checked = false;
document.getElementById("ha4").checked = false;'>1
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'ha0' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("h01").value = "0.00";
document.getElementById("ha1").checked = false;
document.getElementById("ha2").checked = false;
document.getElementById("ha3").checked = false;
document.getElementById("ha4").checked = false;'>0
</label>

</th>

<input type = 'text' name = 'h01' id = 'h01' style = 'display: none;' required>

</tr>

<tr style = 'border: 2px solid black'>

<th style = 'text-align: center; min-width: 20; max-width: 20; font-size: 25;'>
2
</th>

<th style = 'text-align: left; min-width: 500; max-width: 500; overflow: hidden; font-size: 25;'>
The teacher utilizes various learning materials, resources and strategies to enable all students to learn and achieve the unit standards and competencies and learning goals.
</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'hb4' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("h02").value = "4";
document.getElementById("hb0").checked = false;
document.getElementById("hb1").checked = false;
document.getElementById("hb2").checked = false;
document.getElementById("hb3").checked = false;'>4
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'hb3' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("h02").value = "3";
document.getElementById("hb0").checked = false;
document.getElementById("hb1").checked = false;
document.getElementById("hb2").checked = false;
document.getElementById("hb4").checked = false;'>3
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'hb2' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("h02").value = "2";
document.getElementById("hb0").checked = false;
document.getElementById("hb1").checked = false;
document.getElementById("hb3").checked = false;
document.getElementById("hb4").checked = false;'>2
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'hb1' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("h02").value = "1";
document.getElementById("hb0").checked = false;
document.getElementById("hb2").checked = false;
document.getElementById("hb3").checked = false;
document.getElementById("hb4").checked = false;'>1
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'hb0' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("h02").value = "0.00";
document.getElementById("hb1").checked = false;
document.getElementById("hb2").checked = false;
document.getElementById("hb3").checked = false;
document.getElementById("hb4").checked = false;'>0
</label>

</th>

<input type = 'text' name = 'h02' id = 'h02' style = 'display: none;' required>

</tr>

<tr style = 'border: 2px solid black'>

<th style = 'text-align: center; min-width: 20; max-width: 20; font-size: 25;'>
3
</th>

<th style = 'text-align: left; min-width: 500; max-width: 500; overflow: hidden; font-size: 25;'>
The teacher monitors and checks on students’ learning and attainment of the unit standards and competencies by conducting varied forms of assessments during class discussion.
</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'hc4' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("h03").value = "4";
document.getElementById("hc0").checked = false;
document.getElementById("hc1").checked = false;
document.getElementById("hc2").checked = false;
document.getElementById("hc3").checked = false;'>4
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'hc3' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("h03").value = "3";
document.getElementById("hc0").checked = false;
document.getElementById("hc1").checked = false;
document.getElementById("hc2").checked = false;
document.getElementById("hc4").checked = false;'>3
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'hc2' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("h03").value = "2";
document.getElementById("hc0").checked = false;
document.getElementById("hc1").checked = false;
document.getElementById("hc3").checked = false;
document.getElementById("hc4").checked = false;'>2
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'hc1' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("h03").value = "1";
document.getElementById("hc0").checked = false;
document.getElementById("hc2").checked = false;
document.getElementById("hc3").checked = false;
document.getElementById("hc4").checked = false;'>1
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'hc0' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("h03").value = "0.00";
document.getElementById("hc1").checked = false;
document.getElementById("hc2").checked = false;
document.getElementById("hc3").checked = false;
document.getElementById("hc4").checked = false;'>0
</label>

</th>

<input type = 'text' name = 'h03' id = 'h03' style = 'display: none;' required>

</tr>

<tr style = 'border: 2px solid black'>

<th style = 'text-align: center; min-width: 20; max-width: 20; font-size: 25;'>
4
</th>

<th style = 'text-align: left; min-width: 500; max-width: 500; overflow: hidden; font-size: 25;'>
The teacher provides appropriate feedback or interventions to enable students in attaining the unit standards and competencies.
</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'hd4' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("h04").value = "4";
document.getElementById("hd0").checked = false;
document.getElementById("hd1").checked = false;
document.getElementById("hd2").checked = false;
document.getElementById("hd3").checked = false;'>4
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'hd3' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("h04").value = "3";
document.getElementById("hd0").checked = false;
document.getElementById("hd1").checked = false;
document.getElementById("hd2").checked = false;
document.getElementById("hd4").checked = false;'>3
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'hd2' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("h04").value = "2";
document.getElementById("hd0").checked = false;
document.getElementById("hd1").checked = false;
document.getElementById("hd3").checked = false;
document.getElementById("hd4").checked = false;'>2
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'hd1' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("h04").value = "1";
document.getElementById("hd0").checked = false;
document.getElementById("hd2").checked = false;
document.getElementById("hd3").checked = false;
document.getElementById("hd4").checked = false;'>1
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'hd0' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("h04").value = "0.00";
document.getElementById("hd1").checked = false;
document.getElementById("hd2").checked = false;
document.getElementById("hd3").checked = false;
document.getElementById("hd4").checked = false;'>0
</label>

</th>

<input type = 'text' name = 'h04' id = 'h04' style = 'display: none;' required>

</tr>

<tr style = 'border: 2px solid black'>

<th style = 'text-align: center; min-width: 20; max-width: 20; font-size: 25;'>
5
</th>

<th style = 'text-align: left; min-width: 500; max-width: 500; overflow: hidden; font-size: 25;'>
The teacher manages the classroom environment and time in a way that supports student learning and the achievement of the unit standards and competencies.
</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'he4' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("h05").value = "4";
document.getElementById("he0").checked = false;
document.getElementById("he1").checked = false;
document.getElementById("he2").checked = false;
document.getElementById("he3").checked = false;'>4
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'he3' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("h05").value = "3";
document.getElementById("he0").checked = false;
document.getElementById("he1").checked = false;
document.getElementById("he2").checked = false;
document.getElementById("he4").checked = false;'>3
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'he2' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("h05").value = "2";
document.getElementById("he0").checked = false;
document.getElementById("he1").checked = false;
document.getElementById("he3").checked = false;
document.getElementById("he4").checked = false;'>2
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'he1' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("h05").value = "1";
document.getElementById("he0").checked = false;
document.getElementById("he2").checked = false;
document.getElementById("he3").checked = false;
document.getElementById("he4").checked = false;'>1
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'he0' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("h05").value = "0.00";
document.getElementById("he1").checked = false;
document.getElementById("he2").checked = false;
document.getElementById("he3").checked = false;
document.getElementById("he4").checked = false;'>0
</label>

</th>

<input type = 'text' name = 'h05' id = 'h05' style = 'display: none;' required>

</tr>

<tr style = 'border: 2px solid black'>

<th style = 'text-align: center; min-width: 20; max-width: 20; font-size: 25;'>
6
</th>

<th style = 'text-align: left; min-width: 500; max-width: 500; overflow: hidden; font-size: 25;'>
The teacher processes students’ understanding by asking clarifying or critical thinking questions related to the unit standards or competencies.
</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'hf4' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("h06").value = "4";
document.getElementById("hf0").checked = false;
document.getElementById("hf1").checked = false;
document.getElementById("hf2").checked = false;
document.getElementById("hf3").checked = false;'>4
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'hf3' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("h06").value = "3";
document.getElementById("hf0").checked = false;
document.getElementById("hf1").checked = false;
document.getElementById("hf2").checked = false;
document.getElementById("hf4").checked = false;'>3
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'hf2' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("h06").value = "2";
document.getElementById("hf0").checked = false;
document.getElementById("hf1").checked = false;
document.getElementById("hf3").checked = false;
document.getElementById("hf4").checked = false;'>2
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'hf1' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("h06").value = "1";
document.getElementById("hf0").checked = false;
document.getElementById("hf2").checked = false;
document.getElementById("hf3").checked = false;
document.getElementById("hf4").checked = false;'>1
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'hf0' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("h06").value = "0.00";
document.getElementById("hf1").checked = false;
document.getElementById("hf2").checked = false;
document.getElementById("hf3").checked = false;
document.getElementById("hf4").checked = false;'>0
</label>

</th>

<input type = 'text' name = 'h06' id = 'h06' style = 'display: none;' required>

</tr>

</table>












<br>

<table border = '1' cellspacing = 0 style = 'border: none; width: 1000;  position: relative;'>

<tr style = 'border: 2px solid black; background-color: EFC372'>
<th style = 'border-bottom: none;'>
<label style = 'font-size: 40;'>
Ninth Subject Teacher
</label>
</th>
</tr>

<?php
$cn = mysqli_connect('localhost', 'root', '', 'gmcbulac_db_gmc');
//$cn = mysqli_connect('localhost', 'gmcbulac_derek03', 'derek030872', 'gmcbulac_db_gmc');

if(isset($_POST['yrsec']))
{

$txtyrsec = $_POST['txtyrsec'];

$sql = mysqli_query($cn, "select * from subj_load where yr_sec = '$txtyrsec' and subj_order = 09");
while($row = mysqli_fetch_assoc($sql))
{
echo"
<tr style = 'border: 2px solid black; height: 200;'>
<th>

<input type = 'hidden' name = 'txtbranch' value = '$row[branch]'>
<input type = 'hidden' name = 'txtyrsec' value = '$row[yr_sec]'>

<label style = 'font-size: 30;'>
Name of Teacher:
</label>
<br>
<input type = 'text' name = 'txtteacher9' id = 'txtteacher9' style = 'width: 900; font-size: 25; text-align: center;' value = '$row[teacher]' readonly required>

<br><br>

<label style = 'font-size: 30;'>
Subject of Instruction:
</label>
<br>
<input type = 'text' name = 'txtsubjdesc9' id = 'txtsubjdesc9' style = 'width: 900; font-size: 25; text-align: center;' value = '$row[subj_desc]' readonly required>

</th>
</tr>";
}

}

?>

</table>

<table border = '1' cellspacing = 0 style = 'border: none; width: 1000;  position: relative;'>

<tr  style = 'border: 2px solid black'>
<th style = 'text-align: left; font-size: 25;'>
TEACHER ACTIONS
</th>
</tr>

</table>

<table border = '1' cellspacing = 0 style = 'border: none; width: 1000;  position: relative;'>

<tr style = 'border: 2px solid black'>

<th style = 'text-align: center; min-width: 20; max-width: 20; font-size: 25;'>
1
</th>

<th style = 'text-align: left; min-width: 500; max-width: 500; overflow: hidden; font-size: 25;'>
The teacher communicates clear expectations of student performance in line with the unit standards and competencies.
</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'ia4' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("i01").value = "4";
document.getElementById("ia0").checked = false;
document.getElementById("ia1").checked = false;
document.getElementById("ia2").checked = false;
document.getElementById("ia3").checked = false;'>4
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'ia3' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("i01").value = "3";
document.getElementById("ia0").checked = false;
document.getElementById("ia1").checked = false;
document.getElementById("ia2").checked = false;
document.getElementById("ia4").checked = false;'>3
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'ia2' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("i01").value = "2";
document.getElementById("ia0").checked = false;
document.getElementById("ia1").checked = false;
document.getElementById("ia3").checked = false;
document.getElementById("ia4").checked = false;'>2
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'ia1' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("i01").value = "1";
document.getElementById("ia0").checked = false;
document.getElementById("ia2").checked = false;
document.getElementById("ia3").checked = false;
document.getElementById("ia4").checked = false;'>1
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'ia0' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("i01").value = "0.00";
document.getElementById("ia1").checked = false;
document.getElementById("ia2").checked = false;
document.getElementById("ia3").checked = false;
document.getElementById("ia4").checked = false;'>0
</label>

</th>

<input type = 'text' name = 'i01' id = 'i01' style = 'display: none;' required>

</tr>

<tr style = 'border: 2px solid black'>

<th style = 'text-align: center; min-width: 20; max-width: 20; font-size: 25;'>
2
</th>

<th style = 'text-align: left; min-width: 500; max-width: 500; overflow: hidden; font-size: 25;'>
The teacher utilizes various learning materials, resources and strategies to enable all students to learn and achieve the unit standards and competencies and learning goals.
</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'ib4' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("i02").value = "4";
document.getElementById("ib0").checked = false;
document.getElementById("ib1").checked = false;
document.getElementById("ib2").checked = false;
document.getElementById("ib3").checked = false;'>4
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'ib3' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("i02").value = "3";
document.getElementById("ib0").checked = false;
document.getElementById("ib1").checked = false;
document.getElementById("ib2").checked = false;
document.getElementById("ib4").checked = false;'>3
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'ib2' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("i02").value = "2";
document.getElementById("ib0").checked = false;
document.getElementById("ib1").checked = false;
document.getElementById("ib3").checked = false;
document.getElementById("ib4").checked = false;'>2
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'ib1' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("i02").value = "1";
document.getElementById("ib0").checked = false;
document.getElementById("ib2").checked = false;
document.getElementById("ib3").checked = false;
document.getElementById("ib4").checked = false;'>1
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'ib0' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("i02").value = "0.00";
document.getElementById("ib1").checked = false;
document.getElementById("ib2").checked = false;
document.getElementById("ib3").checked = false;
document.getElementById("ib4").checked = false;'>0
</label>

</th>

<input type = 'text' name = 'i02' id = 'i02' style = 'display: none;' required>

</tr>

<tr style = 'border: 2px solid black'>

<th style = 'text-align: center; min-width: 20; max-width: 20; font-size: 25;'>
3
</th>

<th style = 'text-align: left; min-width: 500; max-width: 500; overflow: hidden; font-size: 25;'>
The teacher monitors and checks on students’ learning and attainment of the unit standards and competencies by conducting varied forms of assessments during class discussion.
</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'ic4' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("i03").value = "4";
document.getElementById("ic0").checked = false;
document.getElementById("ic1").checked = false;
document.getElementById("ic2").checked = false;
document.getElementById("ic3").checked = false;'>4
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'ic3' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("i03").value = "3";
document.getElementById("ic0").checked = false;
document.getElementById("ic1").checked = false;
document.getElementById("ic2").checked = false;
document.getElementById("ic4").checked = false;'>3
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'ic2' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("i03").value = "2";
document.getElementById("ic0").checked = false;
document.getElementById("ic1").checked = false;
document.getElementById("ic3").checked = false;
document.getElementById("ic4").checked = false;'>2
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'ic1' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("i03").value = "1";
document.getElementById("ic0").checked = false;
document.getElementById("ic2").checked = false;
document.getElementById("ic3").checked = false;
document.getElementById("ic4").checked = false;'>1
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'ic0' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("i03").value = "0.00";
document.getElementById("ic1").checked = false;
document.getElementById("ic2").checked = false;
document.getElementById("ic3").checked = false;
document.getElementById("ic4").checked = false;'>0
</label>

</th>

<input type = 'text' name = 'i03' id = 'i03' style = 'display: none;' required>

</tr>

<tr style = 'border: 2px solid black'>

<th style = 'text-align: center; min-width: 20; max-width: 20; font-size: 25;'>
4
</th>

<th style = 'text-align: left; min-width: 500; max-width: 500; overflow: hidden; font-size: 25;'>
The teacher provides appropriate feedback or interventions to enable students in attaining the unit standards and competencies.
</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'id4' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("i04").value = "4";
document.getElementById("id0").checked = false;
document.getElementById("id1").checked = false;
document.getElementById("id2").checked = false;
document.getElementById("id3").checked = false;'>4
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'id3' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("i04").value = "3";
document.getElementById("id0").checked = false;
document.getElementById("id1").checked = false;
document.getElementById("id2").checked = false;
document.getElementById("id4").checked = false;'>3
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'id2' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("i04").value = "2";
document.getElementById("id0").checked = false;
document.getElementById("id1").checked = false;
document.getElementById("id3").checked = false;
document.getElementById("id4").checked = false;'>2
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'id1' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("i04").value = "1";
document.getElementById("id0").checked = false;
document.getElementById("id2").checked = false;
document.getElementById("id3").checked = false;
document.getElementById("id4").checked = false;'>1
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'id0' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("i04").value = "0.00";
document.getElementById("id1").checked = false;
document.getElementById("id2").checked = false;
document.getElementById("id3").checked = false;
document.getElementById("id4").checked = false;'>0
</label>

</th>

<input type = 'text' name = 'i04' id = 'i04' style = 'display: none;' required>

</tr>

<tr style = 'border: 2px solid black'>

<th style = 'text-align: center; min-width: 20; max-width: 20; font-size: 25;'>
5
</th>

<th style = 'text-align: left; min-width: 500; max-width: 500; overflow: hidden; font-size: 25;'>
The teacher manages the classroom environment and time in a way that supports student learning and the achievement of the unit standards and competencies.
</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'ie4' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("i05").value = "4";
document.getElementById("ie0").checked = false;
document.getElementById("ie1").checked = false;
document.getElementById("ie2").checked = false;
document.getElementById("ie3").checked = false;'>4
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'ie3' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("i05").value = "3";
document.getElementById("ie0").checked = false;
document.getElementById("ie1").checked = false;
document.getElementById("ie2").checked = false;
document.getElementById("ie4").checked = false;'>3
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'ie2' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("i05").value = "2";
document.getElementById("ie0").checked = false;
document.getElementById("ie1").checked = false;
document.getElementById("ie3").checked = false;
document.getElementById("ie4").checked = false;'>2
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'ie1' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("i05").value = "1";
document.getElementById("ie0").checked = false;
document.getElementById("ie2").checked = false;
document.getElementById("ie3").checked = false;
document.getElementById("ie4").checked = false;'>1
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'ie0' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("i05").value = "0.00";
document.getElementById("ie1").checked = false;
document.getElementById("ie2").checked = false;
document.getElementById("ie3").checked = false;
document.getElementById("ie4").checked = false;'>0
</label>

</th>

<input type = 'text' name = 'i05' id = 'i05' style = 'display: none;' required>

</tr>

<tr style = 'border: 2px solid black'>

<th style = 'text-align: center; min-width: 20; max-width: 20; font-size: 25;'>
6
</th>

<th style = 'text-align: left; min-width: 500; max-width: 500; overflow: hidden; font-size: 25;'>
The teacher processes students’ understanding by asking clarifying or critical thinking questions related to the unit standards or competencies.
</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'if4' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("i06").value = "4";
document.getElementById("if0").checked = false;
document.getElementById("if1").checked = false;
document.getElementById("if2").checked = false;
document.getElementById("if3").checked = false;'>4
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'if3' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("i06").value = "3";
document.getElementById("if0").checked = false;
document.getElementById("if1").checked = false;
document.getElementById("if2").checked = false;
document.getElementById("if4").checked = false;'>3
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'if2' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("i06").value = "2";
document.getElementById("if0").checked = false;
document.getElementById("if1").checked = false;
document.getElementById("if3").checked = false;
document.getElementById("if4").checked = false;'>2
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'if1' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("i06").value = "1";
document.getElementById("if0").checked = false;
document.getElementById("if2").checked = false;
document.getElementById("if3").checked = false;
document.getElementById("if4").checked = false;'>1
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'if0' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("i06").value = "0.00";
document.getElementById("if1").checked = false;
document.getElementById("if2").checked = false;
document.getElementById("if3").checked = false;
document.getElementById("if4").checked = false;'>0
</label>

</th>

<input type = 'text' name = 'i06' id = 'i06' style = 'display: none;' required>

</tr>

</table>












<br>

<table border = '1' cellspacing = 0 style = 'border: none; width: 1000;  position: relative;'>

<tr style = 'border: 2px solid black; background-color: EFC372'>
<th style = 'border-bottom: none;'>
<label style = 'font-size: 40;'>
Tenth Subject Teacher
</label>
</th>
</tr>

<?php
$cn = mysqli_connect('localhost', 'root', '', 'gmcbulac_db_gmc');
//$cn = mysqli_connect('localhost', 'gmcbulac_derek03', 'derek030872', 'gmcbulac_db_gmc');

if(isset($_POST['yrsec']))
{

$txtyrsec = $_POST['txtyrsec'];

$sql = mysqli_query($cn, "select * from subj_load where yr_sec = '$txtyrsec' and subj_order = 10");
while($row = mysqli_fetch_assoc($sql))
{
echo"
<tr style = 'border: 2px solid black; height: 200;'>
<th>

<input type = 'hidden' name = 'txtbranch' value = '$row[branch]'>
<input type = 'hidden' name = 'txtyrsec' value = '$row[yr_sec]'>

<label style = 'font-size: 30;'>
Name of Teacher:
</label>
<br>
<input type = 'text' name = 'txtteacher10' id = 'txtteacher10' style = 'width: 900; font-size: 25; text-align: center;' value = '$row[teacher]' readonly required>

<br><br>

<label style = 'font-size: 30;'>
Subject of Instruction:
</label>
<br>
<input type = 'text' name = 'txtsubjdesc10' id = 'txtsubjdesc10' style = 'width: 900; font-size: 25; text-align: center;' value = '$row[subj_desc]' readonly required>

</th>
</tr>";
}

}

?>

</table>

<table border = '1' cellspacing = 0 style = 'border: none; width: 1000;  position: relative;'>

<tr  style = 'border: 2px solid black'>
<th style = 'text-align: left; font-size: 25;'>
TEACHER ACTIONS
</th>
</tr>

</table>

<table border = '1' cellspacing = 0 style = 'border: none; width: 1000;  position: relative;'>

<tr style = 'border: 2px solid black'>

<th style = 'text-align: center; min-width: 20; max-width: 20; font-size: 25;'>
1
</th>

<th style = 'text-align: left; min-width: 500; max-width: 500; overflow: hidden; font-size: 25;'>
The teacher communicates clear expectations of student performance in line with the unit standards and competencies.
</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'ja4' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("j01").value = "4";
document.getElementById("ja0").checked = false;
document.getElementById("ja1").checked = false;
document.getElementById("ja2").checked = false;
document.getElementById("ja3").checked = false;'>4
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'ja3' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("j01").value = "3";
document.getElementById("ja0").checked = false;
document.getElementById("ja1").checked = false;
document.getElementById("ja2").checked = false;
document.getElementById("ja4").checked = false;'>3
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'ja2' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("j01").value = "2";
document.getElementById("ja0").checked = false;
document.getElementById("ja1").checked = false;
document.getElementById("ja3").checked = false;
document.getElementById("ja4").checked = false;'>2
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'ja1' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("j01").value = "1";
document.getElementById("ja0").checked = false;
document.getElementById("ja2").checked = false;
document.getElementById("ja3").checked = false;
document.getElementById("ja4").checked = false;'>1
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'ja0' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("j01").value = "0.00";
document.getElementById("ja1").checked = false;
document.getElementById("ja2").checked = false;
document.getElementById("ja3").checked = false;
document.getElementById("ja4").checked = false;'>0
</label>

</th>

<input type = 'text' name = 'j01' id = 'j01' style = 'display: none;' required>

</tr>

<tr style = 'border: 2px solid black'>

<th style = 'text-align: center; min-width: 20; max-width: 20; font-size: 25;'>
2
</th>

<th style = 'text-align: left; min-width: 500; max-width: 500; overflow: hidden; font-size: 25;'>
The teacher utilizes various learning materials, resources and strategies to enable all students to learn and achieve the unit standards and competencies and learning goals.
</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'jb4' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("j02").value = "4";
document.getElementById("jb0").checked = false;
document.getElementById("jb1").checked = false;
document.getElementById("jb2").checked = false;
document.getElementById("jb3").checked = false;'>4
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'jb3' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("j02").value = "3";
document.getElementById("jb0").checked = false;
document.getElementById("jb1").checked = false;
document.getElementById("jb2").checked = false;
document.getElementById("jb4").checked = false;'>3
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'jb2' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("j02").value = "2";
document.getElementById("jb0").checked = false;
document.getElementById("jb1").checked = false;
document.getElementById("jb3").checked = false;
document.getElementById("jb4").checked = false;'>2
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'jb1' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("j02").value = "1";
document.getElementById("jb0").checked = false;
document.getElementById("jb2").checked = false;
document.getElementById("jb3").checked = false;
document.getElementById("jb4").checked = false;'>1
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'jb0' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("j02").value = "0.00";
document.getElementById("jb1").checked = false;
document.getElementById("jb2").checked = false;
document.getElementById("jb3").checked = false;
document.getElementById("jb4").checked = false;'>0
</label>

</th>

<input type = 'text' name = 'j02' id = 'j02' style = 'display: none;' required>

</tr>

<tr style = 'border: 2px solid black'>

<th style = 'text-align: center; min-width: 20; max-width: 20; font-size: 25;'>
3
</th>

<th style = 'text-align: left; min-width: 500; max-width: 500; overflow: hidden; font-size: 25;'>
The teacher monitors and checks on students’ learning and attainment of the unit standards and competencies by conducting varied forms of assessments during class discussion.
</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'jc4' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("j03").value = "4";
document.getElementById("jc0").checked = false;
document.getElementById("jc1").checked = false;
document.getElementById("jc2").checked = false;
document.getElementById("jc3").checked = false;'>4
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'jc3' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("j03").value = "3";
document.getElementById("jc0").checked = false;
document.getElementById("jc1").checked = false;
document.getElementById("jc2").checked = false;
document.getElementById("jc4").checked = false;'>3
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'jc2' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("j03").value = "2";
document.getElementById("jc0").checked = false;
document.getElementById("jc1").checked = false;
document.getElementById("jc3").checked = false;
document.getElementById("jc4").checked = false;'>2
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'jc1' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("j03").value = "1";
document.getElementById("jc0").checked = false;
document.getElementById("jc2").checked = false;
document.getElementById("jc3").checked = false;
document.getElementById("jc4").checked = false;'>1
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'jc0' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("j03").value = "0.00";
document.getElementById("jc1").checked = false;
document.getElementById("jc2").checked = false;
document.getElementById("jc3").checked = false;
document.getElementById("jc4").checked = false;'>0
</label>

</th>

<input type = 'text' name = 'j03' id = 'j03' style = 'display: none;' required>

</tr>

<tr style = 'border: 2px solid black'>

<th style = 'text-align: center; min-width: 20; max-width: 20; font-size: 25;'>
4
</th>

<th style = 'text-align: left; min-width: 500; max-width: 500; overflow: hidden; font-size: 25;'>
The teacher provides appropriate feedback or interventions to enable students in attaining the unit standards and competencies.
</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'jd4' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("j04").value = "4";
document.getElementById("jd0").checked = false;
document.getElementById("jd1").checked = false;
document.getElementById("jd2").checked = false;
document.getElementById("jd3").checked = false;'>4
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'jd3' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("j04").value = "3";
document.getElementById("jd0").checked = false;
document.getElementById("jd1").checked = false;
document.getElementById("jd2").checked = false;
document.getElementById("jd4").checked = false;'>3
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'jd2' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("j04").value = "2";
document.getElementById("jd0").checked = false;
document.getElementById("jd1").checked = false;
document.getElementById("jd3").checked = false;
document.getElementById("jd4").checked = false;'>2
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'jd1' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("j04").value = "1";
document.getElementById("jd0").checked = false;
document.getElementById("jd2").checked = false;
document.getElementById("jd3").checked = false;
document.getElementById("jd4").checked = false;'>1
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'jd0' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("j04").value = "0.00";
document.getElementById("jd1").checked = false;
document.getElementById("jd2").checked = false;
document.getElementById("jd3").checked = false;
document.getElementById("jd4").checked = false;'>0
</label>

</th>

<input type = 'text' name = 'j04' id = 'j04' style = 'display: none;' required>

</tr>

<tr style = 'border: 2px solid black'>

<th style = 'text-align: center; min-width: 20; max-width: 20; font-size: 25;'>
5
</th>

<th style = 'text-align: left; min-width: 500; max-width: 500; overflow: hidden; font-size: 25;'>
The teacher manages the classroom environment and time in a way that supports student learning and the achievement of the unit standards and competencies.
</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'je4' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("j05").value = "4";
document.getElementById("je0").checked = false;
document.getElementById("je1").checked = false;
document.getElementById("je2").checked = false;
document.getElementById("je3").checked = false;'>4
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'je3' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("j05").value = "3";
document.getElementById("je0").checked = false;
document.getElementById("je1").checked = false;
document.getElementById("je2").checked = false;
document.getElementById("je4").checked = false;'>3
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'je2' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("j05").value = "2";
document.getElementById("je0").checked = false;
document.getElementById("je1").checked = false;
document.getElementById("je3").checked = false;
document.getElementById("je4").checked = false;'>2
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'je1' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("j05").value = "1";
document.getElementById("je0").checked = false;
document.getElementById("je2").checked = false;
document.getElementById("je3").checked = false;
document.getElementById("je4").checked = false;'>1
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'je0' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("j05").value = "0.00";
document.getElementById("je1").checked = false;
document.getElementById("je2").checked = false;
document.getElementById("je3").checked = false;
document.getElementById("je4").checked = false;'>0
</label>

</th>

<input type = 'text' name = 'j05' id = 'j05' style = 'display: none;' required>

</tr>

<tr style = 'border: 2px solid black'>

<th style = 'text-align: center; min-width: 20; max-width: 20; font-size: 25;'>
6
</th>

<th style = 'text-align: left; min-width: 500; max-width: 500; overflow: hidden; font-size: 25;'>
The teacher processes students’ understanding by asking clarifying or critical thinking questions related to the unit standards or competencies.
</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'jf4' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("j06").value = "4";
document.getElementById("jf0").checked = false;
document.getElementById("jf1").checked = false;
document.getElementById("jf2").checked = false;
document.getElementById("jf3").checked = false;'>4
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'jf3' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("j06").value = "3";
document.getElementById("jf0").checked = false;
document.getElementById("jf1").checked = false;
document.getElementById("jf2").checked = false;
document.getElementById("jf4").checked = false;'>3
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'jf2' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("j06").value = "2";
document.getElementById("jf0").checked = false;
document.getElementById("jf1").checked = false;
document.getElementById("jf3").checked = false;
document.getElementById("jf4").checked = false;'>2
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'jf1' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("j06").value = "1";
document.getElementById("jf0").checked = false;
document.getElementById("jf2").checked = false;
document.getElementById("jf3").checked = false;
document.getElementById("jf4").checked = false;'>1
</label>

</th>

<th style = 'text-align: center;'>

<label style = 'background-color: yellow; font-size: 25;'>
<input type = 'radio' id = 'jf0' style = 'height: 20; width: 20;' onclick = 
'document.getElementById("j06").value = "0.00";
document.getElementById("jf1").checked = false;
document.getElementById("jf2").checked = false;
document.getElementById("jf3").checked = false;
document.getElementById("jf4").checked = false;'>0
</label>

</th>

<input type = 'text' name = 'j06' id = 'j06' style = 'display: none;' required>

</tr>

</table>











<table border = '1' cellspacing = 0 style = 'border: none; width: 1000;  position: relative;'>

<tr  style = 'border: 2px solid black; height: 70;'>
<th>

<input type = 'submit' value = 'Save' name = 'btnsave' id = 'btnsave' style = 'font-size: 25; width: 300;'>

</th>
</tr>

</table>

</form>

</center>

</body>
</html>

<?php

$cn = mysqli_connect('localhost', 'root', '', 'gmcbulac_db_gmc');
//$cn = mysqli_connect('localhost', 'gmcbulac_derek03', 'derek030872', 'gmcbulac_db_gmc');


if(isset($_POST['btnsave']))
{
$txtbranch = $_POST['txtbranch'];
$txtyrsec = $_POST['txtyrsec'];
$dtpdate = $_POST['dtpdate'];
$txtstudname = $_POST['txtstudname'];

// Teacher 1

$txtteacher1 = $_POST['txtteacher1'];
$txtsubjdesc1 = $_POST['txtsubjdesc1'];
$a1 = $_POST['a1'];
$a2 = $_POST['a2'];
$a3 = $_POST['a3'];
$a4 = $_POST['a4'];
$a5 = $_POST['a5'];
$a6 = $_POST['a6'];

$sql = mysqli_query($cn, "insert into tbl_observation (branch, yr_sec, obs_date, stud_name, teacher, subj_desc, ta1, ta2, ta3, ta4, ta5, ta6) values ('$txtbranch', '$txtyrsec', '$dtpdate', '$txtstudname', '$txtteacher1', '$txtsubjdesc1', '$a1', '$a2', '$a3', '$a4', '$a5', '$a6')");

//Teacher 2

$txtteacher2 = $_POST['txtteacher2'];
$txtsubjdesc2 = $_POST['txtsubjdesc2'];
$b1 = $_POST['b1'];
$b2 = $_POST['b2'];
$b3 = $_POST['b3'];
$b4 = $_POST['b4'];
$b5 = $_POST['b5'];
$b6 = $_POST['b6'];

$sql = mysqli_query($cn, "insert into tbl_observation (branch, yr_sec, obs_date, stud_name, teacher, subj_desc, ta1, ta2, ta3, ta4, ta5, ta6) values ('$txtbranch', '$txtyrsec', '$dtpdate', '$txtstudname', '$txtteacher2', '$txtsubjdesc2', '$b1', '$b2', '$b3', '$b4', '$b5', '$b6')");

//Teacher 3

$txtteacher3 = $_POST['txtteacher3'];
$txtsubjdesc3 = $_POST['txtsubjdesc3'];
$c1 = $_POST['c1'];
$c2 = $_POST['c2'];
$c3 = $_POST['c3'];
$c4 = $_POST['c4'];
$c5 = $_POST['c5'];
$c6 = $_POST['c6'];

$sql = mysqli_query($cn, "insert into tbl_observation (branch, yr_sec, obs_date, stud_name, teacher, subj_desc, ta1, ta2, ta3, ta4, ta5, ta6) values ('$txtbranch', '$txtyrsec', '$dtpdate', '$txtstudname', '$txtteacher3', '$txtsubjdesc3', '$c1', '$c2', '$c3', '$c4', '$c5', '$c6')");

//Teacher 4

$txtteacher4 = $_POST['txtteacher4'];
$txtsubjdesc4 = $_POST['txtsubjdesc4'];
$d1 = $_POST['d1'];
$d2 = $_POST['d2'];
$d3 = $_POST['d3'];
$d4 = $_POST['d4'];
$d5 = $_POST['d5'];
$d6 = $_POST['d6'];

$sql = mysqli_query($cn, "insert into tbl_observation (branch, yr_sec, obs_date, stud_name, teacher, subj_desc, ta1, ta2, ta3, ta4, ta5, ta6) values ('$txtbranch', '$txtyrsec', '$dtpdate', '$txtstudname', '$txtteacher4', '$txtsubjdesc4', '$d1', '$d2', '$d3', '$d4', '$d5', '$d6')");

//Teacher 5

$txtteacher5 = $_POST['txtteacher5'];
$txtsubjdesc5 = $_POST['txtsubjdesc5'];
$e1 = $_POST['e1'];
$e2 = $_POST['e2'];
$e3 = $_POST['e3'];
$e4 = $_POST['e4'];
$e5 = $_POST['e5'];
$e6 = $_POST['e6'];

$sql = mysqli_query($cn, "insert into tbl_observation (branch, yr_sec, obs_date, stud_name, teacher, subj_desc, ta1, ta2, ta3, ta4, ta5, ta6) values ('$txtbranch', '$txtyrsec', '$dtpdate', '$txtstudname', '$txtteacher5', '$txtsubjdesc5', '$e1', '$e2', '$e3', '$e4', '$e5', '$e6')");

//Teacher 6

$txtteacher6 = $_POST['txtteacher6'];
$txtsubjdesc6 = $_POST['txtsubjdesc6'];
$f01 = $_POST['f01'];
$f02 = $_POST['f02'];
$f03 = $_POST['f03'];
$f04 = $_POST['f04'];
$f05 = $_POST['f05'];
$f06 = $_POST['f06'];

$sql = mysqli_query($cn, "insert into tbl_observation (branch, yr_sec, obs_date, stud_name, teacher, subj_desc, ta1, ta2, ta3, ta4, ta5, ta6) values ('$txtbranch', '$txtyrsec', '$dtpdate', '$txtstudname', '$txtteacher6', '$txtsubjdesc6', '$f01', '$f02', '$f03', '$f04', '$f05', '$f06')");

//Teacher 7

$txtteacher7 = $_POST['txtteacher7'];
$txtsubjdesc7 = $_POST['txtsubjdesc7'];
$g01 = $_POST['g01'];
$g02 = $_POST['g02'];
$g03 = $_POST['g03'];
$g04 = $_POST['g04'];
$g05 = $_POST['g05'];
$g06 = $_POST['g06'];

$sql = mysqli_query($cn, "insert into tbl_observation (branch, yr_sec, obs_date, stud_name, teacher, subj_desc, ta1, ta2, ta3, ta4, ta5, ta6) values ('$txtbranch', '$txtyrsec', '$dtpdate', '$txtstudname', '$txtteacher7', '$txtsubjdesc7', '$g01', '$g02', '$g03', '$g04', '$g05', '$g06')");


//Teacher 8

$txtteacher8 = $_POST['txtteacher8'];
$txtsubjdesc8 = $_POST['txtsubjdesc8'];
$h01 = $_POST['h01'];
$h02 = $_POST['h02'];
$h03 = $_POST['h03'];
$h04 = $_POST['h04'];
$h05 = $_POST['h05'];
$h06 = $_POST['h06'];

$sql = mysqli_query($cn, "insert into tbl_observation (branch, yr_sec, obs_date, stud_name, teacher, subj_desc, ta1, ta2, ta3, ta4, ta5, ta6) values ('$txtbranch', '$txtyrsec', '$dtpdate', '$txtstudname', '$txtteacher8', '$txtsubjdesc8', '$h01', '$h02', '$h03', '$h04', '$h05', '$h06')");

//Teacher 9

$txtteacher9 = $_POST['txtteacher9'];
$txtsubjdesc9 = $_POST['txtsubjdesc9'];
$i01 = $_POST['i01'];
$i02 = $_POST['i02'];
$i03 = $_POST['i03'];
$i04 = $_POST['i04'];
$i05 = $_POST['i05'];
$i06 = $_POST['i06'];

$sql = mysqli_query($cn, "insert into tbl_observation (branch, yr_sec, obs_date, stud_name, teacher, subj_desc, ta1, ta2, ta3, ta4, ta5, ta6) values ('$txtbranch', '$txtyrsec', '$dtpdate', '$txtstudname', '$txtteacher9', '$txtsubjdesc9', '$i01', '$i02', '$i03', '$i04', '$i05', '$i06')");

//Teacher 10

$txtteacher10 = $_POST['txtteacher10'];
$txtsubjdesc10 = $_POST['txtsubjdesc10'];
$j01 = $_POST['j01'];
$j02 = $_POST['j02'];
$j03 = $_POST['j03'];
$j04 = $_POST['j04'];
$j05 = $_POST['j05'];
$j06 = $_POST['j06'];

$sql = mysqli_query($cn, "insert into tbl_observation (branch, yr_sec, obs_date, stud_name, teacher, subj_desc, ta1, ta2, ta3, ta4, ta5, ta6) values ('$txtbranch', '$txtyrsec', '$dtpdate', '$txtstudname', '$txtteacher10', '$txtsubjdesc10', '$j01', '$j02', '$j03', '$j04', '$j05', '$j06')");

echo"<script>alert('Record Saved')</script>";
//echo"<script>history.go(-1)</script>";

}

?>
<script>



</script>