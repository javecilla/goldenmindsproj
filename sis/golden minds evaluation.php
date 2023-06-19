<html>
<head>
<title>Golden Minds Online Evaluation System</title>
</head>
<body>

<img src = "bg.png" style = "position: fixed; top: 100; left: 0; height: 100%; width: 100%;">

<center>

<table border = '1' cellspacing = 0 style = 'border: none; width: 1000; position: relative;'>
<tr style = 'border: 2px solid black;'>
<th>
<img src = 'logoM.png' style = 'height: 300; width: 950;'>
</th>
</tr>
</table>

<table border = '1' cellspacing = 0 style = 'border: none; width: 1000; position: relative;'>

<?php
$cn = mysqli_connect('localhost', 'root', '', 'gmcbulac_db_gmc');
//$cn = mysqli_connect('localhost', 'gmcbulac_derek03', 'derek030872', 'gmcbulac_db_gmc');

$sql = mysqli_query($cn, "select * from subj_load group by branch asc;");
while($row = mysqli_fetch_assoc($sql))
{
echo"
<form action = 'golden minds evaluation.php' method = 'post'>
<tr style = 'border: 2px solid black;'>
<th style = 'border-top: none; border-bottom: none;'>
<br>
<input type = 'submit' name = 'yrsec' id = 'btnbranch' value = '$row[branch]' style = 'width: 800; font-size: 25; font-family: times new roman;'>
<input type = 'hidden' name = 'txtbranch' value = '$row[branch]'>
<input type = 'hidden' name = 'txtyrsec' value = '$row[yr_sec]'>
<br><br>
</th>
</tr>
</form>";
}
?>

</table>

<table border = '1' cellspacing = 0 style = 'border: none; width: 1000; position: relative;'>

<?php
$cn = mysqli_connect('localhost', 'root', '', 'gmcbulac_db_gmc');
//$cn = mysqli_connect('localhost', 'gmcbulac_derek03', 'derek030872', 'gmcbulac_db_gmc');

if(isset($_POST['yrsec']))
{

echo"<tr style = 'border: 2px solid black; background-color: EFC372;'>
<th style = 'font-size: 25;'>
Student Information
</th>
</tr>";

$txtbranch = $_POST['txtbranch'];

$sql = mysqli_query($cn, "select * from subj_load where branch = '$txtbranch' group by yr_sec asc;");
while($row = mysqli_fetch_assoc($sql))
{
echo"
<form action = 'golden minds evaluation.php' method = 'post'>
<tr style = 'border: 2px solid black;'>
<th style = 'border-top: none; border-bottom: none;'>
<br>
<input type = 'submit' name = 'yrsec' id = 'btnyrsec' value = '$row[yr_sec]' style = 'width: 800; font-size: 25; font-family: times new roman;'>
<input type = 'hidden' name = 'txtbranch' value = '$row[branch]'>
<input type = 'hidden' name = 'txtyrsec' value = '$row[yr_sec]'>
</th>
</tr>
</form>";
}

echo"<form action = 'golden minds evaluation.php' method = 'post'>";

echo"<tr style = 'border: 2px solid black;'>
<th style = 'border-top: none; border-bottom: none; font-size: 25;'>
<br>
Student Name:
<br>
<input type = 'text' name = 'txtstudname' id = 'txtstudname' style = 'width: 800; font-size: 25; text-align: center;' placeholder = 'Last Name, First Name Middle Initial' required>
<br><br>
</th>
</tr>";

}

?>

</table>

<table border = '1' cellspacing = 0 style = 'border: none; width: 1000; position: relative;'>

<tr style = 'border: 2px solid black;'>
<th style = 'border-bottom: none; background-color: EFC372; text-align: left;'>
RATING SCALE:
</th>
</tr>

<tr style = 'border: 2px solid black'>
<th style = 'border-bottom: none; text-align: left;'>

<label style = 'position: relative; left: 60;'>
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

<table border = '1' cellspacing = 0 style = 'border: none; width: 1000; position: relative;'>

<tr style = 'border: 2px solid black;'>

<th style = 'width: 200; max-width: 200; overflow: hidden;'>

<textarea name = 'txtbranch' id = 'txtbranch' style = 'height: 40; width: 200; border: none; font-family: times new roman;' readonly required>
</textarea>

<br>

<textarea name = 'txtyrsec' id = 'txtyrsec' style = 'height: 40; width: 200; border: none; font-family: times new roman;' readonly required>
</textarea>

</th>

<th style = 'width: 80;'>

<textarea name = 'txtteacher1' id = 'txtteacher1' style = 'height: 40; width: 75; border: none; font-family: times new roman;' readonly required>
</textarea>

<br>

<textarea name = 'txtsubjdesc1' id = 'txtsubjdesc1' style = 'height: 40; width: 75; border: none; font-family: times new roman;' readonly required>
</textarea>

</th>

<th style = 'width: 80;'>

<textarea name = 'txtteacher2' id = 'txtteacher2' style = 'height: 40; width: 75; border: none; font-family: times new roman;' readonly required>
</textarea>

<br>

<textarea name = 'txtsubjdesc2' id = 'txtsubjdesc2' style = 'height: 40; width: 75; border: none; font-family: times new roman;' readonly required>
</textarea>

</th>

<th style = 'width: 80;'>

<textarea name = 'txtteacher3' id = 'txtteacher3' style = 'height: 40; width: 75; border: none; font-family: times new roman;' readonly required>
</textarea>

<br>

<textarea name = 'txtsubjdesc3' id = 'txtsubjdesc3' style = 'height: 40; width: 75; border: none; font-family: times new roman;' readonly required>
</textarea>

</th>

<th style = 'width: 80;'>

<textarea name = 'txtteacher4' id = 'txtteacher4' style = 'height: 40; width: 75; border: none; font-family: times new roman;' readonly>
</textarea>

<br>

<textarea name = 'txtsubjdesc4' id = 'txtsubjdesc4' style = 'height: 40; width: 75; border: none; font-family: times new roman;' readonly required>
</textarea>

</th>

<th style = 'width: 80;'>

<textarea name = 'txtteacher5' id = 'txtteacher5' style = 'height: 40; width: 75; border: none; font-family: times new roman;' readonly>
</textarea>

<br>

<textarea name = 'txtsubjdesc5' id = 'txtsubjdesc5' style = 'height: 40; width: 75; border: none; font-family: times new roman;' readonly required>
</textarea>

</th>

<th style = 'width: 80;'>

<textarea name = 'txtteacher6' id = 'txtteacher6' style = 'height: 40; width: 75; border: none; font-family: times new roman;' readonly>
</textarea>

<br>

<textarea name = 'txtsubjdesc6' id = 'txtsubjdesc6' style = 'height: 40; width: 75; border: none; font-family: times new roman;' readonly required>
</textarea>

</th>

<th style = 'width: 80;'>

<textarea name = 'txtteacher7' id = 'txtteacher7' style = 'height: 40; width: 75; border: none; font-family: times new roman;' readonly>
</textarea>

<br>

<textarea name = 'txtsubjdesc7' id = 'txtsubjdesc7' style = 'height: 40; width: 75; border: none; font-family: times new roman;' readonly required>
</textarea>

</th>

<th style = 'width: 80;'>

<textarea name = 'txtteacher8' id = 'txtteacher8' style = 'height: 40; width: 75; border: none; font-family: times new roman;' readonly>
</textarea>

<br>

<textarea name = 'txtsubjdesc8' id = 'txtsubjdesc8' style = 'height: 40; width: 75; border: none; font-family: times new roman;' readonly required>
</textarea>

</th>

<th style = 'width: 80;'>

<textarea name = 'txtteacher9' id = 'txtteacher9' style = 'height: 40; width: 75; border: none; font-family: times new roman;' readonly>
</textarea>

<br>

<textarea name = 'txtsubjdesc9' id = 'txtsubjdesc9' style = 'height: 40; width: 75; border: none; font-family: times new roman;' readonly required>
</textarea>

</th>

<th style = 'width: 80;'>

<textarea name = 'txtteacher10' id = 'txtteacher10' style = 'height: 40; width: 75; border: none; font-family: times new roman;' readonly>
</textarea>

<br>

<textarea name = 'txtsubjdesc10' id = 'txtsubjdesc10' style = 'height: 40; width: 75; border: none; font-family: times new roman;' readonly required>
</textarea>

</th>

</tr>

<?php
$cn = mysqli_connect('localhost', 'root', '', 'gmcbulac_db_gmc');
//$cn = mysqli_connect('localhost', 'gmcbulac_derek03', 'derek030872', 'gmcbulac_db_gmc');

if(isset($_POST['yrsec']))
{

$txtyrsec = $_POST['txtyrsec'];

$sql = mysqli_query($cn, "select * from subj_load where yr_sec = '$txtyrsec'");
while($row = mysqli_fetch_assoc($sql))
{
echo"<script>document.getElementById('txtbranch').value = '$row[branch]'</script>";
echo"<script>document.getElementById('txtyrsec').value = '$row[yr_sec]'</script>";
}

$sql = mysqli_query($cn, "select * from subj_load where yr_sec = '$txtyrsec' and subj_order = 01");
while($row = mysqli_fetch_assoc($sql))
{
echo"<script>document.getElementById('txtteacher1').value = '$row[teacher]'</script>";
echo"<script>document.getElementById('txtsubjdesc1').value = '$row[subj_desc]'</script>";
}

$sql = mysqli_query($cn, "select * from subj_load where yr_sec = '$txtyrsec' and subj_order = 02");
while($row = mysqli_fetch_assoc($sql))
{
echo"<script>document.getElementById('txtteacher2').value = '$row[teacher]'</script>";
echo"<script>document.getElementById('txtsubjdesc2').value = '$row[subj_desc]'</script>";
}

$sql = mysqli_query($cn, "select * from subj_load where yr_sec = '$txtyrsec' and subj_order = 03");
while($row = mysqli_fetch_assoc($sql))
{
echo"<script>document.getElementById('txtteacher3').value = '$row[teacher]'</script>";
echo"<script>document.getElementById('txtsubjdesc3').value = '$row[subj_desc]'</script>";
}

$sql = mysqli_query($cn, "select * from subj_load where yr_sec = '$txtyrsec' and subj_order = 04");
while($row = mysqli_fetch_assoc($sql))
{
echo"<script>document.getElementById('txtteacher4').value = '$row[teacher]'</script>";
echo"<script>document.getElementById('txtsubjdesc4').value = '$row[subj_desc]'</script>";
}

$sql = mysqli_query($cn, "select * from subj_load where yr_sec = '$txtyrsec' and subj_order = 05");
while($row = mysqli_fetch_assoc($sql))
{
echo"<script>document.getElementById('txtteacher5').value = '$row[teacher]'</script>";
echo"<script>document.getElementById('txtsubjdesc5').value = '$row[subj_desc]'</script>";
}

$sql = mysqli_query($cn, "select * from subj_load where yr_sec = '$txtyrsec' and subj_order = 06");
while($row = mysqli_fetch_assoc($sql))
{
echo"<script>document.getElementById('txtteacher6').value = '$row[teacher]'</script>";
echo"<script>document.getElementById('txtsubjdesc6').value = '$row[subj_desc]'</script>";
}

$sql = mysqli_query($cn, "select * from subj_load where yr_sec = '$txtyrsec' and subj_order = 07");
while($row = mysqli_fetch_assoc($sql))
{
echo"<script>document.getElementById('txtteacher7').value = '$row[teacher]'</script>";
echo"<script>document.getElementById('txtsubjdesc7').value = '$row[subj_desc]'</script>";
}

$sql = mysqli_query($cn, "select * from subj_load where yr_sec = '$txtyrsec' and subj_order = 08");
while($row = mysqli_fetch_assoc($sql))
{
echo"<script>document.getElementById('txtteacher8').value = '$row[teacher]'</script>";
echo"<script>document.getElementById('txtsubjdesc8').value = '$row[subj_desc]'</script>";
}

$sql = mysqli_query($cn, "select * from subj_load where yr_sec = '$txtyrsec' and subj_order = 09");
while($row = mysqli_fetch_assoc($sql))
{
echo"<script>document.getElementById('txtteacher9').value = '$row[teacher]'</script>";
echo"<script>document.getElementById('txtsubjdesc9').value = '$row[subj_desc]'</script>";
}

$sql = mysqli_query($cn, "select * from subj_load where yr_sec = '$txtyrsec' and subj_order = 10");
while($row = mysqli_fetch_assoc($sql))
{
echo"<script>document.getElementById('txtteacher10').value = '$row[teacher]'</script>";
echo"<script>document.getElementById('txtsubjdesc10').value = '$row[subj_desc]'</script>";
}

}

?>

<tr style = 'border: 2px solid black;'>
<th style = 'border-top: none; border-bottom: none; background-color: EFC372; text-align: left;'>
ATTENDANCE AND PUNCTUALITY
</th>
</tr>

<tr style = 'border: 2px solid black;'>

<td style = 'border-bottom: none; width: 200; max-width: 200; overflow: hidden;'>
Is the teacher always present during the class schedule?
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'apa1' id = 'apa1' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'apa2' id = 'apa2' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'apa3' id = 'apa3' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'apa4' id = 'apa4' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'apa5' id = 'apa5' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'apa6' id = 'apa6' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'apa7' id = 'apa7' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'apa8' id = 'apa8' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'apa9' id = 'apa9' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'apa10' id = 'apa10' style = 'width: 50; font-size: 20;' required>
</td>

</tr>

<tr style = 'border: 2px solid black;'>

<td style = 'border-bottom: none; width: 200; max-width: 200; overflow: hidden;'>
Does the teacher attend the class on time?
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'apb1' id = 'apb1' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'apb2' id = 'apb2' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'apb3' id = 'apb3' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'apb4' id = 'apb4' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'apb5' id = 'apb5' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'apb6' id = 'apb6' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'apb7' id = 'apb7' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'apb8' id = 'apb8' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'apb9' id = 'apb9' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'apb10' id = 'apb10' style = 'width: 50; font-size: 20;' required>
</td>

</tr>

<tr style = 'border: 2px solid black;'>

<td style = 'width: 200; max-width: 200; overflow: hidden;'>
If the teachers will be late or will not be able to attend the class, does he/she inform the class right away?
</td>

<td style = 'width: 80; text-align: center;'>
<input type = 'number' name = 'apc1' id = 'apc1' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'width: 80; text-align: center;'>
<input type = 'number' name = 'apc2' id = 'apc2' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'width: 80; text-align: center;'>
<input type = 'number' name = 'apc3' id = 'apc3' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'width: 80; text-align: center;'>
<input type = 'number' name = 'apc4' id = 'apc4' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'width: 80; text-align: center;'>
<input type = 'number' name = 'apc5' id = 'apc5' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'width: 80; text-align: center;'>
<input type = 'number' name = 'apc6' id = 'apc6' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'width: 80; text-align: center;'>
<input type = 'number' name = 'apc7' id = 'apc7' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'width: 80; text-align: center;'>
<input type = 'number' name = 'apc8' id = 'apc8' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'width: 80; text-align: center;'>
<input type = 'number' name = 'apc9' id = 'apc9' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'width: 80; text-align: center;'>
<input type = 'number' name = 'apc10' id = 'apc10' style = 'width: 50; font-size: 20;' required>
</td>

</tr>

<tr style = 'border: 2px solid black;'>
<th style = 'border-top: none; border-bottom: none; background-color: EFC372; text-align: left;'>
PERSONALITY AND BEHAVIOR
</th>
</tr>

<tr style = 'border: 2px solid black;'>

<td style = 'border-bottom: none; width: 200; max-width: 200; overflow: hidden;'>
Is the teacher properly groomed and well-dressed during class?
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'pba1' id = 'pba1' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'pba2' id = 'pba2' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'pba3' id = 'pba3' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'pba4' id = 'pba4' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'pba5' id = 'pba5' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'pba6' id = 'pba6' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'pba7' id = 'pba7' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'pba8' id = 'pba8' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'pba9' id = 'pba9' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'pba10' id = 'pba10' style = 'width: 50; font-size: 20;' required>
</td>

</tr>

<tr style = 'border: 2px solid black;'>

<td style = 'border-bottom: none; width: 200; max-width: 200; overflow: hidden;'>
Does the teacher show patience to all students?
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'pbb1' id = 'pbb1' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'pbb2' id = 'pbb2' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'pbb3' id = 'pbb3' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'pbb4' id = 'pbb4' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'pbb5' id = 'pbb5' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'pbb6' id = 'pbb6' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'pbb7' id = 'pbb7' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'pbb8' id = 'pbb8' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'pbb9' id = 'pbb9' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'pbb10' id = 'pbb10' style = 'width: 50; font-size: 20;' required>
</td>

</tr>

<tr style = 'border: 2px solid black;'>

<td style = 'border-bottom: none; width: 200; max-width: 200; overflow: hidden;'>
Does the teacher acknowledge and appreciate student's performance?
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'pbc1' id = 'pbc1' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'pbc2' id = 'pbc2' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'pbc3' id = 'pbc3' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'pbc4' id = 'pbc4' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'pbc5' id = 'pbc5' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'pbc6' id = 'pbc6' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'pbc7' id = 'pbc7' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'pbc8' id = 'pbc8' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'pbc9' id = 'pbc9' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'pbc10' id = 'pbc10' style = 'width: 50; font-size: 20;' required>
</td>

</tr>

<tr style = 'border: 2px solid black;'>

<td style = 'width: 200; max-width: 200; overflow: hidden;'>
Is the teacher kind, accommodating and considerate to all?
</td>

<td style = 'width: 80; text-align: center;'>
<input type = 'number' name = 'pbd1' id = 'pbd1' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'width: 80; text-align: center;'>
<input type = 'number' name = 'pbd2' id = 'pbd2' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'width: 80; text-align: center;'>
<input type = 'number' name = 'pbd3' id = 'pbd3' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'width: 80; text-align: center;'>
<input type = 'number' name = 'pbd4' id = 'pbd4' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'width: 80; text-align: center;'>
<input type = 'number' name = 'pbd5' id = 'pbd5' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'width: 80; text-align: center;'>
<input type = 'number' name = 'pbd6' id = 'pbd6' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'width: 80; text-align: center;'>
<input type = 'number' name = 'pbd7' id = 'pbd7' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'width: 80; text-align: center;'>
<input type = 'number' name = 'pbd8' id = 'pbd8' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'width: 80; text-align: center;'>
<input type = 'number' name = 'pbd9' id = 'pbd9' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'width: 80; text-align: center;'>
<input type = 'number' name = 'pbd10' id = 'pbd10' style = 'width: 50; font-size: 20;' required>
</td>

</tr>

<tr style = 'border: 2px solid black;'>
<th style = 'border-top: none;  border-bottom: none; background-color: EFC372; text-align: left;'>
PROFESSIONALISM
</th>
</tr>

<tr style = 'border: 2px solid black;'>

<td style = 'border-bottom: none; width: 200; max-width: 200; overflow: hidden;'>
Does the teacher support and promote activities/events of the school?
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'pra1' id = 'pra1' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'pra2' id = 'pra2' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'pra3' id = 'pra3' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'pra4' id = 'pra4' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'pra5' id = 'pra5' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'pra6' id = 'pra6' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'pra7' id = 'pra7' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'pra8' id = 'pra8' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'pra9' id = 'pra9' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'pra10' id = 'pra10' style = 'width: 50; font-size: 20;' required>
</td>

</tr>

<tr style = 'border: 2px solid black;'>

<td style = 'border-bottom: none; width: 200; max-width: 200; overflow: hidden;'>
Does the teacher exhibit fairness?
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'prb1' id = 'prb1' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'prb2' id = 'prb2' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'prb3' id = 'prb3' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'prb4' id = 'prb4' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'prb5' id = 'prb5' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'prb6' id = 'prb6' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'prb7' id = 'prb7' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'prb8' id = 'prb8' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'prb9' id = 'prb9' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'prb10' id = 'prb10' style = 'width: 50; font-size: 20;' required>
</td>

</tr>

<tr style = 'border: 2px solid black;'>

<td style = 'width: 200; max-width: 200; overflow: hidden;'>
Does the teacher resolve student issues professionally within class?
</td>

<td style = 'width: 80; text-align: center;'>
<input type = 'number' name = 'prc1' id = 'prc1' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'width: 80; text-align: center;'>
<input type = 'number' name = 'prc2' id = 'prc2' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'width: 80; text-align: center;'>
<input type = 'number' name = 'prc3' id = 'prc3' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'width: 80; text-align: center;'>
<input type = 'number' name = 'prc4' id = 'prc4' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'width: 80; text-align: center;'>
<input type = 'number' name = 'prc5' id = 'prc5' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'width: 80; text-align: center;'>
<input type = 'number' name = 'prc6' id = 'prc6' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'width: 80; text-align: center;'>
<input type = 'number' name = 'prc7' id = 'prc7' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'width: 80; text-align: center;'>
<input type = 'number' name = 'prc8' id = 'prc8' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'width: 80; text-align: center;'>
<input type = 'number' name = 'prc9' id = 'prc9' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'width: 80; text-align: center;'>
<input type = 'number' name = 'prc10' id = 'prc10' style = 'width: 50; font-size: 20;' required>
</td>

</tr>

<tr style = 'border: 2px solid black;'>
<th style = 'border-top: none;  border-bottom: none; background-color: EFC372; text-align: left;'>
DELIVERY AND MASTERY OF SUBJECT
</th>
</tr>

<tr style = 'border: 2px solid black;'>

<td style = 'border-bottom: none; width: 200; max-width: 200; overflow: hidden;'>
Does the teacher have full mastery of the subject matter?
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'dma1' id = 'dma1' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'dma2' id = 'dma2' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'dma3' id = 'dma3' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'dma4' id = 'dma4' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'dma5' id = 'dma5' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'dma6' id = 'dma6' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'dma7' id = 'dma7' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'dma8' id = 'dma8' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'dma9' id = 'dma9' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'dma10' id = 'dma10' style = 'width: 50; font-size: 20;' required>
</td>

</tr>

<tr style = 'border: 2px solid black;'>

<td style = 'border-bottom: none; width: 200; max-width: 200; overflow: hidden;'>
Does the teacher speak clearly?
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'dmb1' id = 'dmb1' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'dmb2' id = 'dmb2' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'dmb3' id = 'dmb3' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'dmb4' id = 'dmb4' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'dmb5' id = 'dmb5' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'dmb6' id = 'dmb6' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'dmb7' id = 'dmb7' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'dmb8' id = 'dmb8' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'dmb9' id = 'dmb9' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'dmb10' id = 'dmb10' style = 'width: 50; font-size: 20;' required>
</td>

</tr>

<tr style = 'border: 2px solid black;'>

<td style = 'border-bottom: none; width: 200; max-width: 200; overflow: hidden;'>
Does the teacher make sure everyone understand better the lessons presented?
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'dmc1' id = 'dmc1' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'dmc2' id = 'dmc2' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'dmc3' id = 'dmc3' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'dmc4' id = 'dmc4' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'dmc5' id = 'dmc5' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'dmc6' id = 'dmc6' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'dmc7' id = 'dmc7' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'dmc8' id = 'dmc8' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'dmc9' id = 'dmc9' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'dmc10' id = 'dmc10' style = 'width: 50; font-size: 20;' required>
</td>

</tr>

<tr style = 'border: 2px solid black;'>

<td style = 'width: 200; max-width: 200; overflow: hidden;'>
Does the teacher give real-life scenario in relation the the discussion?
</td>

<td style = 'width: 80; text-align: center;'>
<input type = 'number' name = 'dmd1' id = 'dmd1' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'width: 80; text-align: center;'>
<input type = 'number' name = 'dmd2' id = 'dmd2' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'width: 80; text-align: center;'>
<input type = 'number' name = 'dmd3' id = 'dmd3' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'width: 80; text-align: center;'>
<input type = 'number' name = 'dmd4' id = 'dmd4' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'width: 80; text-align: center;'>
<input type = 'number' name = 'dmd5' id = 'dmd5' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'width: 80; text-align: center;'>
<input type = 'number' name = 'dmd6' id = 'dmd6' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'width: 80; text-align: center;'>
<input type = 'number' name = 'dmd7' id = 'dmd7' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'width: 80; text-align: center;'>
<input type = 'number' name = 'dmd8' id = 'dmd8' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'width: 80; text-align: center;'>
<input type = 'number' name = 'dmd9' id = 'dmd9' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'width: 80; text-align: center;'>
<input type = 'number' name = 'dmd10' id = 'dmd10' style = 'width: 50; font-size: 20;' required>
</td>

</tr>

<tr style = 'border: 2px solid black;'>
<th style = 'border-top: none; border-bottom: none; background-color: EFC372; text-align: left;'>
CLASSROOM MANAGEMENT
</th>
</tr>

<tr style = 'border: 2px solid black;'>

<td style = 'border-bottom: none; width: 200; max-width: 200; overflow: hidden;'>
Does the teacher encourage students to participate in the discussion?
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'cma1' id = 'cma1' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'cma2' id = 'cma2' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'cma3' id = 'cma3' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'cma4' id = 'cma4' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'cma5' id = 'cma5' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'cma6' id = 'cma6' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'cma7' id = 'cma7' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'cma8' id = 'cma8' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'cma9' id = 'cma9' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'cma10' id = 'cma10' style = 'width: 50; font-size: 20;' required>
</td>

</tr>

<tr style = 'border: 2px solid black;'>

<td style = 'border-bottom: none; width: 200; max-width: 200; overflow: hidden;'>
Does the teacher do preliminary activities such as prayer, checking of attendance and checking of classroom environment?
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'cmb1' id = 'cmb1' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'cmb2' id = 'cmb2' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'cmb3' id = 'cmb3' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'cmb4' id = 'cmb4' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'cmb5' id = 'cmb5' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'cmb6' id = 'cmb6' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'cmb7' id = 'cmb7' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'cmb8' id = 'cmb8' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'cmb9' id = 'cmb9' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'cmb10' id = 'cmb10' style = 'width: 50; font-size: 20;' required>
</td>

</tr>

<tr style = 'border: 2px solid black;'>

<td style = 'border-bottom: none; width: 200; max-width: 200; overflow: hidden;'>
Does the teacher give students feedbacks on students who participated?
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'cmc1' id = 'cmc1' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'cmc2' id = 'cmc2' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'cmc3' id = 'cmc3' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'cmc4' id = 'cmc4' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'cmc5' id = 'cmc5' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'cmc6' id = 'cmc6' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'cmc7' id = 'cmc7' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'cmc9' id = 'cmc8' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'cmc9' id = 'cmc9' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'cmc10' id = 'cmc10' style = 'width: 50; font-size: 20;' required>
</td>

</tr>

<tr style = 'border: 2px solid black;'>

<td style = 'border-bottom: none; width: 200; max-width: 200; overflow: hidden;'>
Does the students inform the students on the result of their assessment?
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'cmd1' id = 'cmd1' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'cmd2' id = 'cmd2' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'cmd3' id = 'cmd3' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'cmd4' id = 'cmd4' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'cmd5' id = 'cmd5' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'cmd1' id = 'cmd6' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'cmd7' id = 'cmd7' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'cmd8' id = 'cmd8' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'cmd9' id = 'cmd9' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'cmd10' id = 'cmd10' style = 'width: 50; font-size: 20;' required>
</td>

</tr>

<tr style = 'border: 2px solid black;'>

<td style = 'border-bottom: none; width: 200; max-width: 200; overflow: hidden;'>
Does the teacher make sure that everyone is engaged on the discussion?
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'cme1' id = 'cme1' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'cme2' id = 'cme2' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'cme3' id = 'cme3' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'cme4' id = 'cme4' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'cme5' id = 'cme5' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'cme6' id = 'cme6' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'cme7' id = 'cme7' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'cme8' id = 'cme8' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'cme9' id = 'cme9' style = 'width: 50; font-size: 20;' required>
</td>

<td style = 'border-bottom: none; width: 80; text-align: center;'>
<input type = 'number' name = 'cme10' id = 'cme10' style = 'width: 50; font-size: 20;' required>
</td>

</tr>

<tr style = 'border: 2px solid black;'>

<th style = 'border-bottom: none; border-right: none; height: 100; width: 200; max-width: 200; overflow: hidden; background-color: EFC372;'>
COMMENTS
</th>

<th style = 'border-bottom: none; border-left: none; border-right: none; width: 80; background-color: EFC372;'>
<textarea name = 'txtcomment1' id = 'txtcomment1' style = 'height: 75; width: 75;'>
</textarea>
</th>

<th style = 'border-bottom: none; border-left: none; border-right: none; width: 80; background-color: EFC372;'>
<textarea name = 'txtcomment2' id = 'txtcomment2' style = 'height: 75; width: 75;'>
</textarea>
</th>

<th style = 'border-bottom: none; border-left: none; border-right: none; width: 80; background-color: EFC372;'>
<textarea name = 'txtcomment3' id = 'txtcomment3' style = 'height: 75; width: 75;'>
</textarea>
</th>

<th style = 'border-bottom: none; border-left: none; border-right: none; width: 80; background-color: EFC372;'>
<textarea name = 'txtcomment4' id = 'txtcomment4' style = 'height: 75; width: 75;'>
</textarea>
</th>

<th style = 'border-bottom: none; border-left: none; border-right: none; width: 80; background-color: EFC372;'>
<textarea name = 'txtcomment5' id = 'txtcomment5' style = 'height: 75; width: 75;'>
</textarea>
</th>

<th style = 'border-bottom: none; border-left: none; border-right: none; width: 80; background-color: EFC372;'>
<textarea name = 'txtcomment6' id = 'txtcomment6' style = 'height: 75; width: 75;'>
</textarea>
</th>

<th style = 'border-bottom: none; border-left: none; border-right: none; width: 80; background-color: EFC372;'>
<textarea name = 'txtcomment7' id = 'txtcomment7' style = 'height: 75; width: 75;'>
</textarea>
</th>

<th style = 'border-bottom: none; border-left: none; border-right: none; width: 80; background-color: EFC372;'>
<textarea name = 'txtcomment8' id = 'txtcomment8' style = 'height: 75; width: 75;'>
</textarea>
</th>

<th style = 'border-bottom: none; border-left: none; border-right: none; width: 80; background-color: EFC372;'>
<textarea name = 'txtcomment9' id = 'txtcomment9' style = 'height: 75; width: 75;'>
</textarea>
</th>

<th style = 'border-bottom: none; border-left: none; width: 80; background-color: EFC372;'>
<textarea name = 'txtcomment10' id = 'txtcomment10' style = 'height: 75; width: 75;'>
</textarea>
</th>

</tr>

</table>

<table border = '1' cellspacing = 0 style = 'border: none; width: 1000; position: relative;'>
<tr style = 'border: 2px solid black;'>
<th style = 'height: 60;'>
<input type = 'submit' value = 'Save' name = 'btnsave' id = 'btnsave' style = 'width: 100; font-size: 25; font-family: times new roman;'>
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

//Save

if(isset($_POST['btnsave']))
{
$txtstudname = $_POST['txtstudname'];
$txtbranch = $_POST['txtbranch'];
$txtyrsec = $_POST['txtyrsec'];

//Teacher 1

$txtteacher1 = $_POST['txtteacher1'];
$txtsubjdesc1 = $_POST['txtsubjdesc1'];

$apa1 = $_POST['apa1'];
$apb1 = $_POST['apb1'];
$apc1 = $_POST['apc1'];

$pba1 = $_POST['pba1'];
$pbb1 = $_POST['pbb1'];
$pbc1 = $_POST['pbc1'];
$pbd1 = $_POST['pbd1'];

$pra1 = $_POST['pra1'];
$prb1 = $_POST['prb1'];
$prc1 = $_POST['prc1'];

$dma1 = $_POST['dma1'];
$dmb1 = $_POST['dmb1'];
$dmc1 = $_POST['dmc1'];
$dmd1 = $_POST['dmd1'];

$cma1 = $_POST['cma1'];
$cmb1 = $_POST['cmb1'];
$cmc1 = $_POST['cmc1'];
$cmd1 = $_POST['cmd1'];
$cme1 = $_POST['cme1'];

$txtcomment1 = $_POST['txtcomment1'];

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$apa1'");
$sql_apa1 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$apb1'");
$sql_apb1 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$apc1'");
$sql_apc1 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$pba1'");
$sql_pba1 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$pbb1'");
$sql_pbb1 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$pbc1'");
$sql_pbc1 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$pbd1'");
$sql_pbd1 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$pra1'");
$sql_pra1 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$prb1'");
$sql_prb1 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$prc1'");
$sql_prc1 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$dma1'");
$sql_dma1 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$dmb1'");
$sql_dmb1 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$dmc1'");
$sql_dmc1 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$dmd1'");
$sql_dmd1 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$cma1'");
$sql_cma1 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$cmb1'");
$sql_cmb1 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$cmc1'");
$sql_cmc1 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$cmd1'");
$sql_cmd1 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$cme1'");
$sql_cme1 = mysqli_num_rows($sql);

//Teacher 2

$txtteacher2 = $_POST['txtteacher2'];
$txtsubjdesc2 = $_POST['txtsubjdesc2'];

$apa2 = $_POST['apa2'];
$apb2 = $_POST['apb2'];
$apc2 = $_POST['apc2'];

$pba2 = $_POST['pba2'];
$pbb2 = $_POST['pbb2'];
$pbc2 = $_POST['pbc2'];
$pbd2 = $_POST['pbd2'];

$pra2 = $_POST['pra2'];
$prb2 = $_POST['prb2'];
$prc2 = $_POST['prc2'];

$dma2 = $_POST['dma2'];
$dmb2 = $_POST['dmb2'];
$dmc2 = $_POST['dmc2'];
$dmd2 = $_POST['dmd2'];

$cma2 = $_POST['cma2'];
$cmb2 = $_POST['cmb2'];
$cmc2 = $_POST['cmc2'];
$cmd2 = $_POST['cmd2'];
$cme2 = $_POST['cme2'];

$txtcomment2 = $_POST['txtcomment2'];

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$apa2'");
$sql_apa2 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$apb2'");
$sql_apb2 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$apc2'");
$sql_apc2 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$pba2'");
$sql_pba2 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$pbb2'");
$sql_pbb2 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$pbc2'");
$sql_pbc2 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$pbd2'");
$sql_pbd2 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$pra2'");
$sql_pra2 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$prb2'");
$sql_prb2 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$prc2'");
$sql_prc2 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$dma2'");
$sql_dma2 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$dmb2'");
$sql_dmb2 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$dmc2'");
$sql_dmc2 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$dmd2'");
$sql_dmd2 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$cma2'");
$sql_cma2 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$cmb2'");
$sql_cmb2 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$cmc2'");
$sql_cmc2 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$cmd2'");
$sql_cmd2 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$cme2'");
$sql_cme2 = mysqli_num_rows($sql);

//Teacher 3

$txtteacher3 = $_POST['txtteacher3'];
$txtsubjdesc3 = $_POST['txtsubjdesc3'];

$apa3 = $_POST['apa3'];
$apb3 = $_POST['apb3'];
$apc3 = $_POST['apc3'];

$pba3 = $_POST['pba3'];
$pbb3 = $_POST['pbb3'];
$pbc3 = $_POST['pbc3'];
$pbd3 = $_POST['pbd3'];

$pra3 = $_POST['pra3'];
$prb3 = $_POST['prb3'];
$prc3 = $_POST['prc3'];

$dma3 = $_POST['dma3'];
$dmb3 = $_POST['dmb3'];
$dmc3 = $_POST['dmc3'];
$dmd3 = $_POST['dmd3'];

$cma3 = $_POST['cma3'];
$cmb3 = $_POST['cmb3'];
$cmc3 = $_POST['cmc3'];
$cmd3 = $_POST['cmd3'];
$cme3 = $_POST['cme3'];

$txtcomment3 = $_POST['txtcomment3'];

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$apa3'");
$sql_apa3 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$apb3'");
$sql_apb3 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$apc3'");
$sql_apc3 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$pba3'");
$sql_pba3 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$pbb3'");
$sql_pbb3 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$pbc3'");
$sql_pbc3 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$pbd3'");
$sql_pbd3 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$pra3'");
$sql_pra3 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$prb3'");
$sql_prb3 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$prc3'");
$sql_prc3 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$dma3'");
$sql_dma3 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$dmb3'");
$sql_dmb3 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$dmc3'");
$sql_dmc3 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$dmd3'");
$sql_dmd3 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$cma3'");
$sql_cma3 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$cmb3'");
$sql_cmb3 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$cmc3'");
$sql_cmc3 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$cmd3'");
$sql_cmd3 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$cme3'");
$sql_cme3 = mysqli_num_rows($sql);

//Teacher 4

$txtteacher4 = $_POST['txtteacher4'];
$txtsubjdesc4 = $_POST['txtsubjdesc4'];

$apa4 = $_POST['apa4'];
$apb4 = $_POST['apb4'];
$apc4 = $_POST['apc4'];

$pba4 = $_POST['pba4'];
$pbb4 = $_POST['pbb4'];
$pbc4 = $_POST['pbc4'];
$pbd4 = $_POST['pbd4'];

$pra4 = $_POST['pra4'];
$prb4 = $_POST['prb4'];
$prc4 = $_POST['prc4'];

$dma4 = $_POST['dma4'];
$dmb4 = $_POST['dmb4'];
$dmc4 = $_POST['dmc4'];
$dmd4 = $_POST['dmd4'];

$cma4 = $_POST['cma4'];
$cmb4 = $_POST['cmb4'];
$cmc4 = $_POST['cmc4'];
$cmd4 = $_POST['cmd4'];
$cme4 = $_POST['cme4'];

$txtcomment4 = $_POST['txtcomment4'];

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$apa4'");
$sql_apa4 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$apb4'");
$sql_apb4 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$apc4'");
$sql_apc4 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$pba4'");
$sql_pba4 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$pbb4'");
$sql_pbb4 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$pbc4'");
$sql_pbc4 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$pbd4'");
$sql_pbd4 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$pra4'");
$sql_pra4 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$prb4'");
$sql_prb4 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$prc4'");
$sql_prc4 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$dma4'");
$sql_dma4 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$dmb4'");
$sql_dmb4 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$dmc4'");
$sql_dmc4 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$dmd4'");
$sql_dmd4 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$cma4'");
$sql_cma4 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$cmb4'");
$sql_cmb4 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$cmc4'");
$sql_cmc4 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$cmd4'");
$sql_cmd4 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$cme4'");
$sql_cme4 = mysqli_num_rows($sql);

//Teacher 5

$txtteacher5 = $_POST['txtteacher5'];
$txtsubjdesc5 = $_POST['txtsubjdesc5'];

$apa5 = $_POST['apa5'];
$apb5 = $_POST['apb5'];
$apc5 = $_POST['apc5'];

$pba5 = $_POST['pba5'];
$pbb5 = $_POST['pbb5'];
$pbc5 = $_POST['pbc5'];
$pbd5 = $_POST['pbd5'];

$pra5 = $_POST['pra5'];
$prb5 = $_POST['prb5'];
$prc5 = $_POST['prc5'];

$dma5 = $_POST['dma5'];
$dmb5 = $_POST['dmb5'];
$dmc5 = $_POST['dmc5'];
$dmd5 = $_POST['dmd5'];

$cma5 = $_POST['cma5'];
$cmb5 = $_POST['cmb5'];
$cmc5 = $_POST['cmc5'];
$cmd5 = $_POST['cmd5'];
$cme5 = $_POST['cme5'];

$txtcomment5 = $_POST['txtcomment5'];

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$apa5'");
$sql_apa5 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$apb5'");
$sql_apb5 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$apc5'");
$sql_apc5 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$pba5'");
$sql_pba5 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$pbb5'");
$sql_pbb5 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$pbc5'");
$sql_pbc5 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$pbd5'");
$sql_pbd5 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$pra5'");
$sql_pra5 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$prb5'");
$sql_prb5 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$prc5'");
$sql_prc5 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$dma5'");
$sql_dma5 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$dmb5'");
$sql_dmb5 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$dmc5'");
$sql_dmc5 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$dmd5'");
$sql_dmd5 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$cma5'");
$sql_cma5 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$cmb5'");
$sql_cmb5 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$cmc5'");
$sql_cmc5 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$cmd5'");
$sql_cmd5 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$cme5'");
$sql_cme5 = mysqli_num_rows($sql);

//Teacher 6

$txtteacher6 = $_POST['txtteacher6'];
$txtsubjdesc6 = $_POST['txtsubjdesc6'];

$apa6 = $_POST['apa6'];
$apb6 = $_POST['apb6'];
$apc6 = $_POST['apc6'];

$pba6 = $_POST['pba6'];
$pbb6 = $_POST['pbb6'];
$pbc6 = $_POST['pbc6'];
$pbd6 = $_POST['pbd6'];

$pra6 = $_POST['pra6'];
$prb6 = $_POST['prb6'];
$prc6 = $_POST['prc6'];

$dma6 = $_POST['dma6'];
$dmb6 = $_POST['dmb6'];
$dmc6 = $_POST['dmc6'];
$dmd6 = $_POST['dmd6'];

$cma6 = $_POST['cma6'];
$cmb6 = $_POST['cmb6'];
$cmc6 = $_POST['cmc6'];
$cmd6 = $_POST['cmd6'];
$cme6 = $_POST['cme6'];

$txtcomment6 = $_POST['txtcomment6'];

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$apa6'");
$sql_apa6 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$apb6'");
$sql_apb6 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$apc6'");
$sql_apc6 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$pba6'");
$sql_pba6 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$pbb6'");
$sql_pbb6 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$pbc6'");
$sql_pbc6 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$pbd6'");
$sql_pbd6 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$pra6'");
$sql_pra6 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$prb6'");
$sql_prb6 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$prc6'");
$sql_prc6 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$dma6'");
$sql_dma6 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$dmb6'");
$sql_dmb6 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$dmc6'");
$sql_dmc6 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$dmd6'");
$sql_dmd6 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$cma6'");
$sql_cma6 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$cmb6'");
$sql_cmb6 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$cmc6'");
$sql_cmc6 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$cmd6'");
$sql_cmd6 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$cme6'");
$sql_cme6 = mysqli_num_rows($sql);

//Teacher 7

$txtteacher7 = $_POST['txtteacher7'];
$txtsubjdesc7 = $_POST['txtsubjdesc7'];

$apa7 = $_POST['apa7'];
$apb7 = $_POST['apb7'];
$apc7 = $_POST['apc7'];

$pba7 = $_POST['pba7'];
$pbb7 = $_POST['pbb7'];
$pbc7 = $_POST['pbc7'];
$pbd7 = $_POST['pbd7'];

$pra7 = $_POST['pra7'];
$prb7 = $_POST['prb7'];
$prc7 = $_POST['prc7'];

$dma7 = $_POST['dma7'];
$dmb7 = $_POST['dmb7'];
$dmc7 = $_POST['dmc7'];
$dmd7 = $_POST['dmd7'];

$cma7 = $_POST['cma7'];
$cmb7 = $_POST['cmb7'];
$cmc7 = $_POST['cmc7'];
$cmd7 = $_POST['cmd7'];
$cme7 = $_POST['cme7'];

$txtcomment7 = $_POST['txtcomment7'];

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$apa7'");
$sql_apa7 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$apb7'");
$sql_apb7 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$apc7'");
$sql_apc7 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$pba7'");
$sql_pba7 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$pbb7'");
$sql_pbb7 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$pbc7'");
$sql_pbc7 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$pbd7'");
$sql_pbd7 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$pra7'");
$sql_pra7 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$prb7'");
$sql_prb7 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$prc7'");
$sql_prc7 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$dma7'");
$sql_dma7 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$dmb7'");
$sql_dmb7 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$dmc7'");
$sql_dmc7 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$dmd7'");
$sql_dmd7 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$cma7'");
$sql_cma7 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$cmb7'");
$sql_cmb7 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$cmc7'");
$sql_cmc7 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$cmd7'");
$sql_cmd7 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$cme7'");
$sql_cme7 = mysqli_num_rows($sql);

//Teacher 8

$txtteacher8 = $_POST['txtteacher8'];
$txtsubjdesc8 = $_POST['txtsubjdesc8'];

$apa8 = $_POST['apa8'];
$apb8 = $_POST['apb8'];
$apc8 = $_POST['apc8'];

$pba8 = $_POST['pba8'];
$pbb8 = $_POST['pbb8'];
$pbc8 = $_POST['pbc8'];
$pbd8 = $_POST['pbd8'];

$pra8 = $_POST['pra8'];
$prb8 = $_POST['prb8'];
$prc8 = $_POST['prc8'];

$dma8 = $_POST['dma8'];
$dmb8 = $_POST['dmb8'];
$dmc8 = $_POST['dmc8'];
$dmd8 = $_POST['dmd8'];

$cma8 = $_POST['cma8'];
$cmb8 = $_POST['cmb8'];
$cmc8 = $_POST['cmc8'];
$cmd8 = $_POST['cmd8'];
$cme8 = $_POST['cme8'];

$txtcomment8 = $_POST['txtcomment8'];

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$apa8'");
$sql_apa8 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$apb8'");
$sql_apb8 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$apc8'");
$sql_apc8 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$pba8'");
$sql_pba8 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$pbb8'");
$sql_pbb8 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$pbc8'");
$sql_pbc8 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$pbd8'");
$sql_pbd8 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$pra8'");
$sql_pra8 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$prb8'");
$sql_prb8 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$prc8'");
$sql_prc8 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$dma8'");
$sql_dma8 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$dmb8'");
$sql_dmb8 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$dmc8'");
$sql_dmc8 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$dmd8'");
$sql_dmd8 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$cma8'");
$sql_cma8 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$cmb8'");
$sql_cmb8 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$cmc8'");
$sql_cmc8 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$cmd8'");
$sql_cmd8 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$cme8'");
$sql_cme8 = mysqli_num_rows($sql);

//Teacher 9

$txtteacher9 = $_POST['txtteacher9'];
$txtsubjdesc9 = $_POST['txtsubjdesc9'];

$apa9 = $_POST['apa9'];
$apb9 = $_POST['apb9'];
$apc9 = $_POST['apc9'];

$pba9 = $_POST['pba9'];
$pbb9 = $_POST['pbb9'];
$pbc9 = $_POST['pbc9'];
$pbd9 = $_POST['pbd9'];

$pra9 = $_POST['pra9'];
$prb9 = $_POST['prb9'];
$prc9 = $_POST['prc9'];

$dma9 = $_POST['dma9'];
$dmb9 = $_POST['dmb9'];
$dmc9 = $_POST['dmc9'];
$dmd9 = $_POST['dmd9'];

$cma9 = $_POST['cma9'];
$cmb9 = $_POST['cmb9'];
$cmc9 = $_POST['cmc9'];
$cmd9 = $_POST['cmd9'];
$cme9 = $_POST['cme9'];

$txtcomment9 = $_POST['txtcomment9'];

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$apa9'");
$sql_apa9 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$apb9'");
$sql_apb9 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$apc9'");
$sql_apc9 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$pba9'");
$sql_pba9 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$pbb9'");
$sql_pbb9 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$pbc9'");
$sql_pbc9 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$pbd9'");
$sql_pbd9 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$pra9'");
$sql_pra9 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$prb9'");
$sql_prb9 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$prc9'");
$sql_prc9 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$dma9'");
$sql_dma9 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$dmb9'");
$sql_dmb9 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$dmc9'");
$sql_dmc9 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$dmd9'");
$sql_dmd9 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$cma9'");
$sql_cma9 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$cmb9'");
$sql_cmb9 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$cmc9'");
$sql_cmc9 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$cmd9'");
$sql_cmd9 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$cme9'");
$sql_cme9 = mysqli_num_rows($sql);

//Teacher 10

$txtteacher10 = $_POST['txtteacher10'];
$txtsubjdesc10 = $_POST['txtsubjdesc10'];

$apa10 = $_POST['apa10'];
$apb10 = $_POST['apb10'];
$apc10 = $_POST['apc10'];

$pba10 = $_POST['pba10'];
$pbb10 = $_POST['pbb10'];
$pbc10 = $_POST['pbc10'];
$pbd10 = $_POST['pbd10'];

$pra10 = $_POST['pra10'];
$prb10 = $_POST['prb10'];
$prc10 = $_POST['prc10'];

$dma10 = $_POST['dma10'];
$dmb10 = $_POST['dmb10'];
$dmc10 = $_POST['dmc10'];
$dmd10 = $_POST['dmd10'];

$cma10 = $_POST['cma10'];
$cmb10 = $_POST['cmb10'];
$cmc10 = $_POST['cmc10'];
$cmd10 = $_POST['cmd10'];
$cme10 = $_POST['cme10'];

$txtcomment10 = $_POST['txtcomment10'];

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$apa10'");
$sql_apa10 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$apb10'");
$sql_apb10 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$apc10'");
$sql_apc10 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$pba10'");
$sql_pba10 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$pbb10'");
$sql_pbb10 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$pbc10'");
$sql_pbc10 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$pbd10'");
$sql_pbd10 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$pra10'");
$sql_pra10 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$prb10'");
$sql_prb10 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$prc10'");
$sql_prc10 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$dma10'");
$sql_dma10 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$dmb10'");
$sql_dmb10 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$dmc10'");
$sql_dmc10 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$dmd10'");
$sql_dmd10 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$cma10'");
$sql_cma10 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$cmb10'");
$sql_cmb10 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$cmc10'");
$sql_cmc10 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$cmd10'");
$sql_cmd10 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from tbl_scores where scores = '$cme10'");
$sql_cme10 = mysqli_num_rows($sql);

//Save

if($sql_apa1 == 1 && $sql_apb1 == 1 && $sql_apc1 == 1 
&& $sql_pba1 == 1 && $sql_pbb1 == 1 && $sql_pbc1 == 1 && $sql_pbd1 == 1
&& $sql_pra1 == 1 && $sql_prb1 == 1 && $sql_prc1 == 1
&& $sql_dma1 == 1 && $sql_dmb1 == 1 && $sql_dmc1 == 1 && $sql_dmd1 == 1
&& $sql_cma1 == 1 && $sql_cmb1 == 1 && $sql_cmc1 == 1 && $sql_cmd1 == 1 && $sql_cme1 == 1
&& $sql_apa2 == 1 && $sql_apb2 == 1 && $sql_apc2 == 1 
&& $sql_pba2 == 1 && $sql_pbb2 == 1 && $sql_pbc2 == 1 && $sql_pbd2 == 1
&& $sql_pra2 == 1 && $sql_prb2 == 1 && $sql_prc2 == 1
&& $sql_dma2 == 1 && $sql_dmb2 == 1 && $sql_dmc2 == 1 && $sql_dmd2 == 1
&& $sql_cma2 == 1 && $sql_cmb2 == 1 && $sql_cmc2 == 1 && $sql_cmd2 == 1 && $sql_cme2 == 1
&& $sql_apa3 == 1 && $sql_apb3 == 1 && $sql_apc3 == 1 
&& $sql_pba3 == 1 && $sql_pbb3 == 1 && $sql_pbc3 == 1 && $sql_pbd3 == 1
&& $sql_pra3 == 1 && $sql_prb3 == 1 && $sql_prc3 == 1
&& $sql_dma3 == 1 && $sql_dmb3 == 1 && $sql_dmc3 == 1 && $sql_dmd3 == 1
&& $sql_cma3 == 1 && $sql_cmb3 == 1 && $sql_cmc3 == 1 && $sql_cmd3 == 1 && $sql_cme3 == 1
&& $sql_apa4 == 1 && $sql_apb4 == 1 && $sql_apc4 == 1 
&& $sql_pba4 == 1 && $sql_pbb4 == 1 && $sql_pbc4 == 1 && $sql_pbd4 == 1
&& $sql_pra4 == 1 && $sql_prb4 == 1 && $sql_prc4 == 1
&& $sql_dma4 == 1 && $sql_dmb4 == 1 && $sql_dmc4 == 1 && $sql_dmd4 == 1
&& $sql_cma4 == 1 && $sql_cmb4 == 1 && $sql_cmc4 == 1 && $sql_cmd4 == 1 && $sql_cme4 == 1
&& $sql_apa5 == 1 && $sql_apb5 == 1 && $sql_apc5 == 1 
&& $sql_pba5 == 1 && $sql_pbb5 == 1 && $sql_pbc5 == 1 && $sql_pbd5 == 1
&& $sql_pra5 == 1 && $sql_prb5 == 1 && $sql_prc5 == 1
&& $sql_dma5 == 1 && $sql_dmb5 == 1 && $sql_dmc5 == 1 && $sql_dmd5 == 1
&& $sql_cma5 == 1 && $sql_cmb5 == 1 && $sql_cmc5 == 1 && $sql_cmd5 == 1 && $sql_cme5 == 1
&& $sql_apa6 == 1 && $sql_apb6 == 1 && $sql_apc6 == 1 
&& $sql_pba6 == 1 && $sql_pbb6 == 1 && $sql_pbc6 == 1 && $sql_pbd6 == 1
&& $sql_pra6 == 1 && $sql_prb6 == 1 && $sql_prc6 == 1
&& $sql_dma6 == 1 && $sql_dmb6 == 1 && $sql_dmc6 == 1 && $sql_dmd6 == 1
&& $sql_cma6 == 1 && $sql_cmb6 == 1 && $sql_cmc6 == 1 && $sql_cmd6 == 1 && $sql_cme6 == 1
&& $sql_apa7 == 1 && $sql_apb7 == 1 && $sql_apc7 == 1 
&& $sql_pba7 == 1 && $sql_pbb7 == 1 && $sql_pbc7 == 1 && $sql_pbd7 == 1
&& $sql_pra7 == 1 && $sql_prb7 == 1 && $sql_prc7 == 1
&& $sql_dma7 == 1 && $sql_dmb7 == 1 && $sql_dmc7 == 1 && $sql_dmd7 == 1
&& $sql_cma7 == 1 && $sql_cmb7 == 1 && $sql_cmc7 == 1 && $sql_cmd7 == 1 && $sql_cme7 == 1
&& $sql_apa8 == 1 && $sql_apb8 == 1 && $sql_apc8 == 1 
&& $sql_pba8 == 1 && $sql_pbb8 == 1 && $sql_pbc8 == 1 && $sql_pbd8 == 1
&& $sql_pra8 == 1 && $sql_prb8 == 1 && $sql_prc8 == 1
&& $sql_dma8 == 1 && $sql_dmb8 == 1 && $sql_dmc8 == 1 && $sql_dmd8 == 1
&& $sql_cma8 == 1 && $sql_cmb8 == 1 && $sql_cmc8 == 1 && $sql_cmd8 == 1 && $sql_cme8 == 1
&& $sql_apa9 == 1 && $sql_apb9 == 1 && $sql_apc9 == 1 
&& $sql_pba9 == 1 && $sql_pbb9 == 1 && $sql_pbc9 == 1 && $sql_pbd9 == 1
&& $sql_pra9 == 1 && $sql_prb9 == 1 && $sql_prc9 == 1
&& $sql_dma9 == 1 && $sql_dmb9 == 1 && $sql_dmc9 == 1 && $sql_dmd9 == 1
&& $sql_cma9 == 1 && $sql_cmb9 == 1 && $sql_cmc9 == 1 && $sql_cmd9 == 1 && $sql_cme9 == 1
&& $sql_apa10 == 1 && $sql_apb10 == 1 && $sql_apc10 == 1 
&& $sql_pba10 == 1 && $sql_pbb10 == 1 && $sql_pbc10 == 1 && $sql_pbd10 == 1
&& $sql_pra10 == 1 && $sql_prb10 == 1 && $sql_prc10 == 1
&& $sql_dma10 == 1 && $sql_dmb10 == 1 && $sql_dmc10 == 1 && $sql_dmd10 == 1
&& $sql_cma10 == 1 && $sql_cmb10 == 1 && $sql_cmc10 == 1 && $sql_cmd10 == 1 && $sql_cme10 == 1)

{

//1
$sql = mysqli_query($cn, "insert into tbl_observation (stud_name, branch, yr_sec, teacher, subj_desc, apa, apb, apc, pba, pbb, pbc, pbd, pra, prb, prc, dma, dmb, dmc, dmd, cma, cmb, cmc, cmd, cme, comments) 
values 
('$txtstudname', '$txtbranch', '$txtyrsec', '$txtteacher1', '$txtsubjdesc1', '$apa1', '$apb1', '$apc1', '$pba1', '$pbb1', '$pbc1', '$pbd1', '$pra1', '$prb1', '$prc1', '$dma1', '$dmb1', '$dmc1', '$dmd1', '$cma1', '$cmb1', '$cmc1', '$cmd1', '$cme1', '$txtcomment1')");

//2
$sql = mysqli_query($cn, "insert into tbl_observation (stud_name, branch, yr_sec, teacher, subj_desc, apa, apb, apc, pba, pbb, pbc, pbd, pra, prb, prc, dma, dmb, dmc, dmd, cma, cmb, cmc, cmd, cme, comments) 
values 
('$txtstudname', '$txtbranch', '$txtyrsec', '$txtteacher2', '$txtsubjdesc2', '$apa2', '$apb2', '$apc2', '$pba2', '$pbb2', '$pbc2', '$pbd2', '$pra2', '$prb2', '$prc2', '$dma2', '$dmb2', '$dmc2', '$dmd2', '$cma2', '$cmb2', '$cmc2', '$cmd2', '$cme2', '$txtcomment2')");

//3
$sql = mysqli_query($cn, "insert into tbl_observation (stud_name, branch, yr_sec, teacher, subj_desc, apa, apb, apc, pba, pbb, pbc, pbd, pra, prb, prc, dma, dmb, dmc, dmd, cma, cmb, cmc, cmd, cme, comments) 
values 
('$txtstudname', '$txtbranch', '$txtyrsec', '$txtteacher3', '$txtsubjdesc3', '$apa3', '$apb3', '$apc3', '$pba3', '$pbb3', '$pbc3', '$pbd3', '$pra3', '$prb3', '$prc3', '$dma3', '$dmb3', '$dmc3', '$dmd3', '$cma3', '$cmb3', '$cmc3', '$cmd3', '$cme3', '$txtcomment3')");

//4
$sql = mysqli_query($cn, "insert into tbl_observation (stud_name, branch, yr_sec, teacher, subj_desc, apa, apb, apc, pba, pbb, pbc, pbd, pra, prb, prc, dma, dmb, dmc, dmd, cma, cmb, cmc, cmd, cme, comments) 
values 
('$txtstudname', '$txtbranch', '$txtyrsec', '$txtteacher4', '$txtsubjdesc4', '$apa4', '$apb4', '$apc4', '$pba4', '$pbb4', '$pbc4', '$pbd4', '$pra4', '$prb4', '$prc4', '$dma4', '$dmb4', '$dmc4', '$dmd4', '$cma4', '$cmb4', '$cmc4', '$cmd4', '$cme4', '$txtcomment4')");

//5
$sql = mysqli_query($cn, "insert into tbl_observation (stud_name, branch, yr_sec, teacher, subj_desc, apa, apb, apc, pba, pbb, pbc, pbd, pra, prb, prc, dma, dmb, dmc, dmd, cma, cmb, cmc, cmd, cme, comments) 
values 
('$txtstudname', '$txtbranch', '$txtyrsec', '$txtteacher5', '$txtsubjdesc5', '$apa5', '$apb5', '$apc5', '$pba5', '$pbb5', '$pbc5', '$pbd5', '$pra5', '$prb5', '$prc5', '$dma5', '$dmb5', '$dmc5', '$dmd5', '$cma5', '$cmb5', '$cmc5', '$cmd5', '$cme5', '$txtcomment5')");

//6
$sql = mysqli_query($cn, "insert into tbl_observation (stud_name, branch, yr_sec, teacher, subj_desc, apa, apb, apc, pba, pbb, pbc, pbd, pra, prb, prc, dma, dmb, dmc, dmd, cma, cmb, cmc, cmd, cme, comments) 
values 
('$txtstudname', '$txtbranch', '$txtyrsec', '$txtteacher6', '$txtsubjdesc6', '$apa6', '$apb6', '$apc6', '$pba6', '$pbb6', '$pbc6', '$pbd6', '$pra6', '$prb6', '$prc6', '$dma6', '$dmb6', '$dmc6', '$dmd6', '$cma6', '$cmb6', '$cmc6', '$cmd6', '$cme6', '$txtcomment6')");

//7
$sql = mysqli_query($cn, "insert into tbl_observation (stud_name, branch, yr_sec, teacher, subj_desc, apa, apb, apc, pba, pbb, pbc, pbd, pra, prb, prc, dma, dmb, dmc, dmd, cma, cmb, cmc, cmd, cme, comments) 
values 
('$txtstudname', '$txtbranch', '$txtyrsec', '$txtteacher7', '$txtsubjdesc7', '$apa7', '$apb7', '$apc7', '$pba7', '$pbb7', '$pbc7', '$pbd7', '$pra7', '$prb7', '$prc7', '$dma7', '$dmb7', '$dmc7', '$dmd7', '$cma7', '$cmb7', '$cmc7', '$cmd7', '$cme7', '$txtcomment7')");

//8
$sql = mysqli_query($cn, "insert into tbl_observation (stud_name, branch, yr_sec, teacher, subj_desc, apa, apb, apc, pba, pbb, pbc, pbd, pra, prb, prc, dma, dmb, dmc, dmd, cma, cmb, cmc, cmd, cme, comments) 
values 
('$txtstudname', '$txtbranch', '$txtyrsec', '$txtteacher8', '$txtsubjdesc8', '$apa8', '$apb8', '$apc8', '$pba8', '$pbb8', '$pbc8', '$pbd8', '$pra8', '$prb8', '$prc8', '$dma8', '$dmb8', '$dmc8', '$dmd8', '$cma8', '$cmb8', '$cmc8', '$cmd8', '$cme8', '$txtcomment8')");

//9
$sql = mysqli_query($cn, "insert into tbl_observation (stud_name, branch, yr_sec, teacher, subj_desc, apa, apb, apc, pba, pbb, pbc, pbd, pra, prb, prc, dma, dmb, dmc, dmd, cma, cmb, cmc, cmd, cme, comments) 
values 
('$txtstudname', '$txtbranch', '$txtyrsec', '$txtteacher9', '$txtsubjdesc9', '$apa9', '$apb9', '$apc9', '$pba9', '$pbb9', '$pbc9', '$pbd9', '$pra9', '$prb9', '$prc9', '$dma9', '$dmb9', '$dmc9', '$dmd9', '$cma9', '$cmb9', '$cmc9', '$cmd9', '$cme9', '$txtcomment9')");

//10
$sql = mysqli_query($cn, "insert into tbl_observation (stud_name, branch, yr_sec, teacher, subj_desc, apa, apb, apc, pba, pbb, pbc, pbd, pra, prb, prc, dma, dmb, dmc, dmd, cma, cmb, cmc, cmd, cme, comments) 
values 
('$txtstudname', '$txtbranch', '$txtyrsec', '$txtteacher10', '$txtsubjdesc10', '$apa10', '$apb10', '$apc10', '$pba10', '$pbb10', '$pbc10', '$pbd10', '$pra10', '$prb10', '$prc10', '$dma10', '$dmb10', '$dmc10', '$dmd10', '$cma10', '$cmb10', '$cmc10', '$cmd10', '$cme10', '$txtcomment10')");

echo"<script>alert('Record Saved')</script>";
echo"<script>history.go(-1)</script>";
//echo"<script>window.location.href = 'https://goldenmindsbulacan.com'</script>";

}

else
{
echo"<script>alert('Invalid Input Scores')</script>";
echo"<script>history.go(-1)</script>";
}

}

?>