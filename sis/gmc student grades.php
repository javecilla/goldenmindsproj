<html>
<head>
<title>GMC Student Grades</title>
</head>

<body bgcolor = "white">

<img src = "bg.png" style = "position: fixed; top: 100; left: 0; height: 100%; width: 100%;">

<?php
$cn = mysqli_connect('localhost', 'root', '', 'gmcbulac_db_gmc');
//$cn = mysqli_connect('localhost', 'gmcbulac_derek03', 'derek030872', 'gmcbulac_db_gmc');
$txtusername = $_POST['txtusername'];
$sql = mysqli_query($cn, "select * from account_registration where username = '$txtusername'");
$userdata = mysqli_num_rows($sql);

echo"<script>
var name = localStorage['objectToPass']
if($userdata == 0 || name == 'undefined')
{
window.location.href = 'gmc login.html'
}
</script>";

$row = mysqli_fetch_assoc($sql);
$username = $row['username'];

//User
if(isset($_POST['search']))
{
$cmbsearch = $_POST['cmbsearch'];
$sql = mysqli_query($cn, "select * from student_information where username = '$cmbsearch' or lrn = '$cmbsearch' or learners_name = '$cmbsearch'");
$row = mysqli_fetch_assoc($sql);
$user = $row['username'];
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

<center>

<form action = 'gmc student grades.php' method = 'post'>

<table border = 2 cellspacing = 0 style = 'width: 1000; border: none; position: relative; top: 0;'>

<tr>
<th style = 'text-align: left; height: 10; background-color: EFC372; border: 3px solid black; border-bottom: none; font-size: 30'>
Learners Information
</tr>
</th>

<tr>
<th style = 'height: 320; border: 3px solid black; border-bottom: none; font-size: 30;'>

Username:
<br>
<input type = 'text' name = 'txtuser' id = 'txtuser' style = 'height: 40; width: 900; background-color: transparent; border-color: 28110d; border-radius: 5px; font-size: 25; text-align: center;' readonly>

<br><br>

LRN:
<br>
<input type = 'text' name = 'txtlrn' id = 'txtlrn' style = 'height: 40; width: 900; background-color: transparent; border-color: 28110d; border-radius: 5px; font-size: 25; text-align: center;' readonly>

<br><br>

Learners Name:
<br>
<input type = 'text' name = 'txtlearnersname' id = 'txtlearnersname' style = 'height: 40; width: 900; background-color: transparent; border-color: 28110d; border-radius: 5px; font-size: 25; text-align: center;' readonly>

</th>
</tr>

<tr>
<th style = 'height: 100; border: 3px solid black; border-bottom: none;'>

<input list = 'sy' name = 'cmbsy' id = 'cmbsy' style = 'height: 40; width: 200; text-align: center; border-color: 28110d; border-radius: 5px; font-size: 25;' placeholder = 'School Year' onclick = 'clryrsec(), calc()' onkeyup = 'calc()' required>

<input list = 'semester' name = 'cmbsemester' id = 'cmbsemester' style = 'height: 40; width: 200; text-align: center; border-color: 28110d; border-radius: 5px; font-size: 25;' placeholder = 'Semester' readonly>

<input list = 'strand' name = 'cmbstrand' id = 'cmbstrand' style = 'height: 40; width: 200; text-align: center; border-color: 28110d; border-radius: 5px; font-size: 25;' placeholder = 'Track / Strand' readonly>

<input list = 'yrsec' name = 'cmbyrsec' id = 'cmbyrsec' style = 'height: 40; width: 200; text-align: center; border-color: 28110d; border-radius: 5px; font-size: 25;' placeholder = 'Year and Section' onclick = 'clryrsec(), calc()' onkeyup = 'calc()' required>

<input type = 'hidden' name = 'cmbyear' id = 'cmbyear' style = 'width: 20;'>

<input type = 'submit' name = 'save' id = 'btnsave' style = 'height: 40; width: 110; text-align: center;  font-size: 25;' value = 'Save' onclick = 'calc()'>

</th>
</tr>

<tr>
<th style = 'height: 600; border: 3px solid black;'>

<input list = 'subjdesc' name = 'cmbsubjdesc' id = 'cmbsubjdesc' style = 'height: 40; width: 400; text-align: center; border-color: 28110d; border-radius: 5px; font-size: 25;' placeholder = 'Subject Description 1' readonly onclick = 'clrsubjdesc()'>
<input type = 'number' name = 'txtmidterm' id = 'txtmidterm' style = 'height: 40; width: 110; text-align: center; border-color: 28110d; border-radius: 5px; font-size: 25;' placeholder = 'MG' onkeyup = 'calc(), act_delete()' onclick = 'calc()'>
<input type = 'number' name = 'txtfinals' id = 'txtfinals' style = 'height: 40; width: 110; text-align: center; border-color: 28110d; border-radius: 5px; font-size: 25;' placeholder = 'FG' onkeyup = 'calc(), act_delete()' onclick = 'calc()'>
<input type = 'text' name = 'txtave' id = 'txtave' style = 'height: 40; width: 110; text-align: center; border-color: 28110d; border-radius: 5px; font-size: 25;' placeholder = 'Average' readonly = 'readonly'>
<input type = 'text' name = 'txtremarks' id = 'txtremarks' style = 'height: 40; width: 150; text-align: center; border-color: 28110d; border-radius: 5px; font-size: 25;' placeholder = 'Remarks' readonly = 'readonly'>
<input type = 'submit' name = 'delete01' id = 'btndelete' style = 'height: 40; width: 40; text-align: center;  font-size: 25; color: red; font-weight: bold;' value = 'x'>

<br><br>

<input list = 'subjdesc' name = 'cmbsubjdesc2' id = 'cmbsubjdesc2' style = 'height: 40; width: 400; text-align: center; border-color: 28110d; border-radius: 5px; font-size: 25;' placeholder = 'Subject Description 2' readonly onclick = 'clrsubjdesc2()'>
<input type = 'number' name = 'txtmidterm2' id = 'txtmidterm2' style = 'height: 40; width: 110; text-align: center; border-color: 28110d; border-radius: 5px; font-size: 25;' placeholder = 'MG' onkeyup = 'calc(), act_delete()' onclick = 'calc()'>
<input type = 'number' name = 'txtfinals2' id = 'txtfinals2' style = 'height: 40; width: 110; text-align: center; border-color: 28110d; border-radius: 5px; font-size: 25;' placeholder = 'FG' onkeyup = 'calc(), act_delete()' onclick = 'calc()'>
<input type = 'text' name = 'txtave2' id = 'txtave2' style = 'height: 40; width: 110; text-align: center; border-color: 28110d; border-radius: 5px; font-size: 25;' placeholder = 'Average' readonly = 'readonly'>
<input type = 'text' name = 'txtremarks2' id = 'txtremarks2' style = 'height: 40; width: 150; text-align: center; border-color: 28110d; border-radius: 5px; font-size: 25;' placeholder = 'Remarks' readonly = 'readonly'>
<input type = 'submit' name = 'delete02' id = 'btndelete02' style = 'height: 40; width: 40; text-align: center;  font-size: 25; color: red; font-weight: bold;' value = 'x'>

<br><br>

<input list = 'subjdesc' name = 'cmbsubjdesc3' id = 'cmbsubjdesc3' style = 'height: 40; width: 400; text-align: center; border-color: 28110d; border-radius: 5px; font-size: 25;' placeholder = 'Subject Description 3' readonly onclick = 'clrsubjdesc3()'>
<input type = 'number' name = 'txtmidterm3' id = 'txtmidterm3' style = 'height: 40; width: 110; text-align: center; border-color: 28110d; border-radius: 5px; font-size: 25;' placeholder = 'MG' onkeyup = 'calc(), act_delete()' onclick = 'calc()'>
<input type = 'number' name = 'txtfinals3' id = 'txtfinals3' style = 'height: 40; width: 110; text-align: center; border-color: 28110d; border-radius: 5px; font-size: 25;' placeholder = 'FG' onkeyup = 'calc(), act_delete()' onclick = 'calc()'>
<input type = 'text' name = 'txtave3' id = 'txtave3' style = 'height: 40; width: 110; text-align: center; border-color: 28110d; border-radius: 5px; font-size: 25;' placeholder = 'Average' readonly = 'readonly'>
<input type = 'text' name = 'txtremarks3' id = 'txtremarks3' style = 'height: 40; width: 150; text-align: center; border-color: 28110d; border-radius: 5px; font-size: 25;' placeholder = 'Remarks' readonly = 'readonly'>
<input type = 'submit' name = 'delete03' id = 'btndelete03' style = 'height: 40; width: 40; text-align: center;  font-size: 25; color: red; font-weight: bold;' value = 'x'>

<br><br>

<input list = 'subjdesc' name = 'cmbsubjdesc4' id = 'cmbsubjdesc4' style = 'height: 40; width: 400; text-align: center; border-color: 28110d; border-radius: 5px; font-size: 25;' placeholder = 'Subject Description 4' readonly onclick = 'clrsubjdesc4()'>
<input type = 'number' name = 'txtmidterm4' id = 'txtmidterm4' style = 'height: 40; width: 110; text-align: center; border-color: 28110d; border-radius: 5px; font-size: 25;' placeholder = 'MG' onkeyup = 'calc(), act_delete()' onclick = 'calc()'>
<input type = 'number' name = 'txtfinals4' id = 'txtfinals4' style = 'height: 40; width: 110; text-align: center; border-color: 28110d; border-radius: 5px; font-size: 25;' placeholder = 'FG' onkeyup = 'calc(), act_delete()' onclick = 'calc()'>
<input type = 'text' name = 'txtave4' id = 'txtave4' style = 'height: 40; width: 110; text-align: center; border-color: 28110d; border-radius: 5px; font-size: 25;' placeholder = 'Average' readonly = 'readonly'>
<input type = 'text' name = 'txtremarks4' id = 'txtremarks4' style = 'height: 40; width: 150; text-align: center; border-color: 28110d; border-radius: 5px; font-size: 25;' placeholder = 'Remarks' readonly = 'readonly'>
<input type = 'submit' name = 'delete04' id = 'btndelete04' style = 'height: 40; width: 40; text-align: center;  font-size: 25; color: red; font-weight: bold;' value = 'x'>

<br><br>

<input list = 'subjdesc' name = 'cmbsubjdesc5' id = 'cmbsubjdesc5' style = 'height: 40; width: 400; text-align: center; border-color: 28110d; border-radius: 5px; font-size: 25;' placeholder = 'Subject Description 5' readonly onclick = 'clrsubjdesc5()'>
<input type = 'number' name = 'txtmidterm5' id = 'txtmidterm5' style = 'height: 40; width: 110; text-align: center; border-color: 28110d; border-radius: 5px; font-size: 25;' placeholder = 'MG' onkeyup = 'calc(), act_delete()' onclick = 'calc()'>
<input type = 'number' name = 'txtfinals5' id = 'txtfinals5' style = 'height: 40; width: 110; text-align: center; border-color: 28110d; border-radius: 5px; font-size: 25;' placeholder = 'FG' onkeyup = 'calc(), act_delete()' onclick = 'calc()'>
<input type = 'text' name = 'txtave5' id = 'txtave5' style = 'height: 40; width: 110; text-align: center; border-color: 28110d; border-radius: 5px; font-size: 25;' placeholder = 'Average' readonly = 'readonly'>
<input type = 'text' name = 'txtremarks5' id = 'txtremarks5' style = 'height: 40; width: 150; text-align: center; border-color: 28110d; border-radius: 5px; font-size: 25;' placeholder = 'Remarks' readonly = 'readonly'>
<input type = 'submit' name = 'delete05' id = 'btndelete05' style = 'height: 40; width: 40; text-align: center;  font-size: 25; color: red; font-weight: bold;' value = 'x'>

<br><br>

<input list = 'subjdesc' name = 'cmbsubjdesc6' id = 'cmbsubjdesc6' style = 'height: 40; width: 400; text-align: center; border-color: 28110d; border-radius: 5px; font-size: 25;' placeholder = 'Subject Description 6' readonly onclick = 'clrsubjdesc6()'>
<input type = 'number' name = 'txtmidterm6' id = 'txtmidterm6' style = 'height: 40; width: 110; text-align: center; border-color: 28110d; border-radius: 5px; font-size: 25;' placeholder = 'MG' onkeyup = 'calc(), act_delete()' onclick = 'calc()'>
<input type = 'number' name = 'txtfinals6' id = 'txtfinals6' style = 'height: 40; width: 110; text-align: center; border-color: 28110d; border-radius: 5px; font-size: 25;' placeholder = 'FG' onkeyup = 'calc(), act_delete()' onclick = 'calc()'>
<input type = 'text' name = 'txtave6' id = 'txtave6' style = 'height: 40; width: 110; text-align: center; border-color: 28110d; border-radius: 5px; font-size: 25;' placeholder = 'Average' readonly = 'readonly'>
<input type = 'text' name = 'txtremarks6' id = 'txtremarks6' style = 'height: 40; width: 150; text-align: center; border-color: 28110d; border-radius: 5px; font-size: 25;' placeholder = 'Remarks' readonly = 'readonly'>
<input type = 'submit' name = 'delete06' id = 'btndelete06' style = 'height: 40; width: 40; text-align: center;  font-size: 25; color: red; font-weight: bold;' value = 'x'>

<br><br>

<input list = 'subjdesc' name = 'cmbsubjdesc7' id = 'cmbsubjdesc7' style = 'height: 40; width: 400; text-align: center; border-color: 28110d; border-radius: 5px; font-size: 25;' placeholder = 'Subject Description 7' readonly onclick = 'clrsubjdesc7()'>
<input type = 'number' name = 'txtmidterm7' id = 'txtmidterm7' style = 'height: 40; width: 110; text-align: center; border-color: 28110d; border-radius: 5px; font-size: 25;' placeholder = 'MG' onkeyup = 'calc(), act_delete()' onclick = 'calc()'>
<input type = 'number' name = 'txtfinals7' id = 'txtfinals7' style = 'height: 40; width: 110; text-align: center; border-color: 28110d; border-radius: 5px; font-size: 25;' placeholder = 'FG' onkeyup = 'calc(), act_delete()' onclick = 'calc()'>
<input type = 'text' name = 'txtave7' id = 'txtave7' style = 'height: 40; width: 110; text-align: center; border-color: 28110d; border-radius: 5px; font-size: 25;' placeholder = 'Average' readonly = 'readonly'>
<input type = 'text' name = 'txtremarks7' id = 'txtremarks7' style = 'height: 40; width: 150; text-align: center; border-color: 28110d; border-radius: 5px; font-size: 25;' placeholder = 'Remarks' readonly = 'readonly'>
<input type = 'submit' name = 'delete07' id = 'btndelete07' style = 'height: 40; width: 40; text-align: center;  font-size: 25; color: red; font-weight: bold;' value = 'x'>

<br><br>

<input list = 'subjdesc' name = 'cmbsubjdesc8' id = 'cmbsubjdesc8' style = 'height: 40; width: 400; text-align: center; border-color: 28110d; border-radius: 5px; font-size: 25;' placeholder = 'Subject Description 8' readonly onclick = 'clrsubjdesc8()'>
<input type = 'number' name = 'txtmidterm8' id = 'txtmidterm8' style = 'height: 40; width: 110; text-align: center; border-color: 28110d; border-radius: 5px; font-size: 25;' placeholder = 'MG' onkeyup = 'calc(), act_delete()' onclick = 'calc()'>
<input type = 'number' name = 'txtfinals8' id = 'txtfinals8' style = 'height: 40; width: 110; text-align: center; border-color: 28110d; border-radius: 5px; font-size: 25;' placeholder = 'FG' onkeyup = 'calc(), act_delete()' onclick = 'calc()'>
<input type = 'text' name = 'txtave8' id = 'txtave8' style = 'height: 40; width: 110; text-align: center; border-color: 28110d; border-radius: 5px; font-size: 25;' placeholder = 'Average' readonly = 'readonly'>
<input type = 'text' name = 'txtremarks8' id = 'txtremarks8' style = 'height: 40; width: 150; text-align: center; border-color: 28110d; border-radius: 5px; font-size: 25;' placeholder = 'Remarks' readonly = 'readonly'>
<input type = 'submit' name = 'delete08' id = 'btndelete08' style = 'height: 40; width: 40; text-align: center;  font-size: 25; color: red; font-weight: bold;' value = 'x'>

<br><br>

<input list = 'subjdesc' name = 'cmbsubjdesc9' id = 'cmbsubjdesc9' style = 'height: 40; width: 400; text-align: center; border-color: 28110d; border-radius: 5px; font-size: 25;' placeholder = 'Subject Description 9' readonly onclick = 'clrsubjdesc9()'>
<input type = 'number' name = 'txtmidterm9' id = 'txtmidterm9' style = 'height: 40; width: 110; text-align: center; border-color: 28110d; border-radius: 5px; font-size: 25;' placeholder = 'MG' onkeyup = 'calc(), act_delete()' onclick = 'calc()'>
<input type = 'number' name = 'txtfinals9' id = 'txtfinals9' style = 'height: 40; width: 110; text-align: center; border-color: 28110d; border-radius: 5px; font-size: 25;' placeholder = 'FG' onkeyup = 'calc(), act_delete()' onclick = 'calc()'>
<input type = 'text' name = 'txtave9' id = 'txtave9' style = 'height: 40; width: 110; text-align: center; border-color: 28110d; border-radius: 5px; font-size: 25;' placeholder = 'Average' readonly = 'readonly'>
<input type = 'text' name = 'txtremarks9' id = 'txtremarks9' style = 'height: 40; width: 150; text-align: center; border-color: 28110d; border-radius: 5px; font-size: 25;' placeholder = 'Remarks' readonly = 'readonly'>
<input type = 'submit' name = 'delete09' id = 'btndelete09' style = 'height: 40; width: 40; text-align: center;  font-size: 25; color: red; font-weight: bold;' value = 'x'>

<br><br>

<input list = 'subjdesc' name = 'cmbsubjdesc10' id = 'cmbsubjdesc10' style = 'height: 40; width: 400; text-align: center; border-color: 28110d; border-radius: 5px; font-size: 25;' placeholder = 'Subject Description 10' readonly onclick = 'clrsubjdesc10()'>
<input type = 'number' name = 'txtmidterm10' id = 'txtmidterm10' style = 'height: 40; width: 110; text-align: center; border-color: 28110d; border-radius: 5px; font-size: 25;' placeholder = 'MG' onkeyup = 'calc(), act_delete()' onclick = 'calc()'>
<input type = 'number' name = 'txtfinals10' id = 'txtfinals10' style = 'height: 40; width: 110; text-align: center; border-color: 28110d; border-radius: 5px; font-size: 25;' placeholder = 'FG' onkeyup = 'calc(), act_delete()' onclick = 'calc()'>
<input type = 'text' name = 'txtave10' id = 'txtave10' style = 'height: 40; width: 110; text-align: center; border-color: 28110d; border-radius: 5px; font-size: 25;' placeholder = 'Average' readonly = 'readonly'>
<input type = 'text' name = 'txtremarks10' id = 'txtremarks10' style = 'height: 40; width: 150; text-align: center; border-color: 28110d; border-radius: 5px; font-size: 25;' placeholder = 'Remarks' readonly = 'readonly'>
<input type = 'submit' name = 'delete10' id = 'btndelete10' style = 'height: 40; width: 40; text-align: center;  font-size: 25; color: red; font-weight: bold;' value = 'x'>

</th>
</tr>


</table>

<br>

<input type = 'hidden' name = 'txtusername' value = '<?php echo $username;?>'>
<input type = 'text' name = 'cmbsearch' value = '<?php echo $user;?>'>

</form>

<table border = 2 cellspacing = 0 style = 'width: 1000; border: none; position: relative; top: 0;'>

<tr>

<th style = 'text-align: left; height: 10; background-color: EFC372; border: 3px solid black; border-right: none; border-bottom: none; font-size: 30'>
Credentials
</th>

<th style = 'text-align: left; height: 10; background-color: EFC372; border: 3px solid black; border-left: none; border-right: none; border-bottom: none; font-size: 30'>
</th>

<th style = 'text-align: left; height: 10; background-color: EFC372; border: 3px solid black; border-left: none; border-right: none; border-bottom: none; font-size: 30'>
</th>

<th style = 'text-align: left; height: 10; background-color: EFC372; border: 3px solid black; border-left: none; border-bottom: none; font-size: 30'>
</th>

</tr>

<tr>

<th style = 'height: 80; border: 3px solid black; border-right: none;'>

<br>

<form action = 'gmc F137-Front.php' method = 'post' target='_blank'>
<input type = 'submit' name = 'prtfront' id = 'btnprtfront' style = 'height: 40; width: 200; text-align: center;  font-size: 25;' value = 'F137-Front'>
<input type = 'hidden' name = 'txtuser' value = '<?php echo $user;?>'>
<input type = 'hidden' name = 'txtusername' value = '<?php echo $username;?>'>
</form>

</th>

<th style = 'height: 80; border: 3px solid black; border-left: none; border-right: none;'>

<br>

<form action = 'gmc F137-Back.php' method = 'post' target='_blank'>
<input type = 'submit' name = 'prtback' id = 'btnprtback' style = 'height: 40; width: 200; text-align: center;  font-size: 25;' value = 'F137-Back'>
<input type = 'hidden' name = 'txtuser' value = '<?php echo $user;?>'>
<input type = 'hidden' name = 'txtusername' value = '<?php echo $username;?>'>
</form>

</th>

<th style = 'height: 80; border: 3px solid black; border-left: none; border-right: none;'>

<br>

<form action = 'gmc F138.php' method = 'post' target='_blank'>
<input type = 'submit' name = 'prtF138' id = 'btnprtF138' style = 'height: 40; width: 200; text-align: center;  font-size: 25;' value = 'F138'>
<input type = 'hidden' name = 'txtuser' value = '<?php echo $user;?>'>
<input type = 'hidden' name = 'txtusername' value = '<?php echo $username;?>'>
<input type = 'hidden' name = 'txtsyg11' id = 'txtsyg11'>
<input type = 'hidden' name = 'txtsyg12' id = 'txtsyg12'>
</form>

</th>

<th style = 'height: 80; border: 3px solid black; border-left: none;'>

<br>

<form action = 'gmc diploma.php' method = 'post' target='_blank'>
<input type = 'submit' name = 'prtdiploma' id = 'btnprtdiploma' style = 'height: 40; width: 200; text-align: center; font-size: 25;' value = 'Diploma'>
<input type = 'hidden' name = 'txtuser' value = '<?php echo $user;?>'>
<input type = 'hidden' name = 'txtgradday' id = 'txtgradday'>
</form>

</th>
</tr>

</table>

<br>

<table border = 2 cellspacing = 0 style = 'width: 1000; border: none; position: relative; top: 0;'>

<tr>
<th style = 'text-align: left; height: 10; background-color: EFC372; border: 3px solid black; border-bottom: none; font-size: 30'>
Account Status
</th>
</tr>

<tr>
<th style = 'height: 80; border: 3px solid black;'>

<br>

<form action = 'gmc student grades.php' method = 'post'>
<input type = 'submit' name = 'activate' id = 'btnactivate' style = 'font-size: 25; height: 40; width: 200; text-align: center;' value = 'Activate' disabled = true>

<input type = 'submit' name = 'deactivate' id = 'btndeactivate' style = 'font-size: 25; height: 40; width: 200; text-align: center;' value = 'Deactivate' disabled = true>

<input type = 'text' name = 'txtstatus' id = 'txtstatus' style = 'font-size: 25; height: 40; width: 500; text-align: center; border-color: 28110d; border-radius: 5px;' readonly placeholder = 'Status'>

<input type = 'hidden' name = 'txtuser' value = '<?php echo $user;?>'>
<input type = 'hidden' name = 'txtusername' value = '<?php echo $username;?>'>

</form>

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

$txtstrand = $_POST['txtstrand'];
$cmbyear = $_POST['cmbyear'];
$cmbsem = $_POST['cmbsem'];

$sql = mysqli_query($cn, "select * from account_registration where username = '$txtusername'");
$username = mysqli_num_rows($sql);

while($row = mysqli_fetch_assoc($sql))
{
echo"<script>document.getElementById('txtacctname').value = '$row[account_name]'</script>";
echo"<script>document.getElementById('txtaccesslevel').value = '$row[access_level]'</script>";
}

// Searchbox
	
$sql = mysqli_query($cn, "select * from student_information order by learners_name asc;");
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

if(!empty($cmbsearch))
{
    
$sql = mysqli_query($cn, "select * from student_information where username = '$cmbsearch' or lrn = '$cmbsearch' or learners_name = '$cmbsearch'");
$search = mysqli_num_rows($sql);

if($search >= 1)
{
while($row = mysqli_fetch_assoc($sql))
{
echo"<script>document.getElementById('txtuser').value = '$row[username]'</script>";
echo"<script>document.getElementById('txtlrn').value = '$row[lrn]'</script>";
echo"<script>document.getElementById('txtlearnersname').value = '$row[learners_name]'</script>";
echo"<script>document.getElementById('cmbsy').value = '$row[sy]'</script>";
echo"<script>document.getElementById('cmbsemester').value = '$cmbsem'</script>";
echo"<script>document.getElementById('cmbstrand').value = '$row[strand]'</script>";
echo"<script>document.getElementById('cmbyrsec').value = '$row[yr_sec]'</script>";
echo"<script>document.getElementById('cmbyear').value = '$cmbyear'</script>";
}
}

// Account Status

$sql = mysqli_query($cn, "select * from account_registration where username = '$cmbsearch'");
$search = mysqli_num_rows($sql);

if($search >= 1)
{
while($row = mysqli_fetch_assoc($sql))
{
echo"<script>document.getElementById('btnactivate').disabled = false</script>";
echo"<script>document.getElementById('btndeactivate').disabled = false</script>";
echo"<script>document.getElementById('txtacctuser').value = '$row[username]'</script>";
echo"<script>document.getElementById('txtstatus').value = '$row[status]'</script>";
}
}

}
else
{
echo "<script>alert('No Record Found')</script>";
echo "<script>history.go(-1)</script>";  
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

// Subject Lists

$sql = mysqli_query($cn, "select * from subjects where teacher = '$txtusername' and strand = '$txtstrand' and semester = '$cmbsem' and yr_sec = '$cmbyear' group by subj_desc asc;");
$subjdesc = mysqli_num_rows($sql);

echo"<datalist id = 'subjdesc'></th>";
while($row = mysqli_fetch_assoc($sql))
{
echo"<option value = '$row[subj_desc]'>";
}
echo"</datalist>";

//01

$sql = mysqli_query($cn, "select * from subjects where teacher = '$txtusername' and strand = '$txtstrand' and semester = '$cmbsem' and yr_sec = '$cmbyear' and subj_order = '01'");
$subjdesc1 = mysqli_num_rows($sql);

if($subjdesc1 == 1)
{
while($row = mysqli_fetch_assoc($sql))
{
echo"<script>document.getElementById('cmbsubjdesc').value = '$row[subj_desc]'</script>";
}
}
else
{
$sql = mysqli_query($cn, "select * from subjects where strand = '$txtstrand' and semester = '$cmbsem' and yr_sec = '$cmbyear' and subj_order = '01'");
while($row = mysqli_fetch_assoc($sql))
{
echo"<script>document.getElementById('cmbsubjdesc').value = '$row[subj_desc]'</script>";
echo"<script>document.getElementById('cmbsubjdesc').disabled = true</script>";
echo"<script>document.getElementById('txtmidterm').disabled = true</script>";
echo"<script>document.getElementById('txtfinals').disabled = true</script>";
echo"<script>document.getElementById('txtave').disabled = true</script>";
echo"<script>document.getElementById('txtremarks').disabled = true</script>";
echo"<script>document.getElementById('btndelete').disabled = true</script>";
}
}

$sql = mysqli_query($cn, "select * from grades where username = '$cmbsearch' and strand = '$txtstrand' and semester = '$cmbsem' and yr_sec like '%$cmbyear%' and subj_order = '01'");
$grades = mysqli_num_rows($sql);

while($row = mysqli_fetch_assoc($sql))
{
echo"<script>document.getElementById('txtmidterm').value = '$row[midterm]'</script>";
echo"<script>document.getElementById('txtfinals').value = '$row[finals]'</script>";
echo"<script>document.getElementById('txtave').value = '$row[ave]'</script>";
echo"<script>document.getElementById('txtremarks').value = '$row[remarks]'</script>";
}

if($subjdesc1 == 0)
{
echo"<script>document.getElementById('cmbsubjdesc').disabled = true</script>";
echo"<script>document.getElementById('txtmidterm').disabled = true</script>";
echo"<script>document.getElementById('txtfinals').disabled = true</script>";
echo"<script>document.getElementById('txtave').disabled = true</script>";
echo"<script>document.getElementById('txtremarks').disabled = true</script>";
echo"<script>document.getElementById('btndelete').disabled = true</script>";
}
	
//02

$sql = mysqli_query($cn, "select * from subjects where teacher = '$txtusername' and strand = '$txtstrand' and semester = '$cmbsem' and yr_sec = '$cmbyear' and subj_order = '02'");
$subjdesc2 = mysqli_num_rows($sql);

if($subjdesc2 == 1)
{
while($row = mysqli_fetch_assoc($sql))
{
echo"<script>document.getElementById('cmbsubjdesc2').value = '$row[subj_desc]'</script>";
}
}
else
{
$sql = mysqli_query($cn, "select * from subjects where strand = '$txtstrand' and semester = '$cmbsem' and yr_sec = '$cmbyear' and subj_order = '02'");
while($row = mysqli_fetch_assoc($sql))
{
echo"<script>document.getElementById('cmbsubjdesc2').value = '$row[subj_desc]'</script>";
echo"<script>document.getElementById('cmbsubjdesc2').disabled = true</script>";
echo"<script>document.getElementById('txtmidterm2').disabled = true</script>";
echo"<script>document.getElementById('txtfinals2').disabled = true</script>";
echo"<script>document.getElementById('txtave2').disabled = true</script>";
echo"<script>document.getElementById('txtremarks2').disabled = true</script>";
echo"<script>document.getElementById('btndelete02').disabled = true</script>";
}
}

$sql = mysqli_query($cn, "select * from grades where username = '$cmbsearch' and strand = '$txtstrand' and semester = '$cmbsem' and yr_sec like '%$cmbyear%' and subj_order = '02'");
$grades = mysqli_num_rows($sql);

while($row = mysqli_fetch_assoc($sql))
{
echo"<script>document.getElementById('txtmidterm2').value = '$row[midterm]'</script>";
echo"<script>document.getElementById('txtfinals2').value = '$row[finals]'</script>";
echo"<script>document.getElementById('txtave2').value = '$row[ave]'</script>";
echo"<script>document.getElementById('txtremarks2').value = '$row[remarks]'</script>";
}

if($subjdesc2 == 0)
{
echo"<script>document.getElementById('cmbsubjdesc2').disabled = true</script>";
echo"<script>document.getElementById('txtmidterm2').disabled = true</script>";
echo"<script>document.getElementById('txtfinals2').disabled = true</script>";
echo"<script>document.getElementById('txtave2').disabled = true</script>";
echo"<script>document.getElementById('txtremarks2').disabled = true</script>";
echo"<script>document.getElementById('btndelete02').disabled = true</script>";
}

//03

$sql = mysqli_query($cn, "select * from subjects where teacher = '$txtusername' and strand = '$txtstrand' and semester = '$cmbsem' and yr_sec = '$cmbyear' and subj_order = '03'");
$subjdesc3 = mysqli_num_rows($sql);

if($subjdesc3 == 1)
{
while($row = mysqli_fetch_assoc($sql))
{
echo"<script>document.getElementById('cmbsubjdesc3').value = '$row[subj_desc]'</script>";
}
}
else
{
$sql = mysqli_query($cn, "select * from subjects where strand = '$txtstrand' and semester = '$cmbsem' and yr_sec = '$cmbyear' and subj_order = '03'");
while($row = mysqli_fetch_assoc($sql))
{
echo"<script>document.getElementById('cmbsubjdesc3').value = '$row[subj_desc]'</script>";
echo"<script>document.getElementById('cmbsubjdesc3').disabled = true</script>";
echo"<script>document.getElementById('txtmidterm3').disabled = true</script>";
echo"<script>document.getElementById('txtfinals3').disabled = true</script>";
echo"<script>document.getElementById('txtave3').disabled = true</script>";
echo"<script>document.getElementById('txtremarks3').disabled = true</script>";
echo"<script>document.getElementById('btndelete03').disabled = true</script>";
}
}

$sql = mysqli_query($cn, "select * from grades where username = '$cmbsearch' and strand = '$txtstrand' and semester = '$cmbsem' and yr_sec like '%$cmbyear%' and subj_order = '03'");
$grades = mysqli_num_rows($sql);

while($row = mysqli_fetch_assoc($sql))
{
echo"<script>document.getElementById('txtmidterm3').value = '$row[midterm]'</script>";
echo"<script>document.getElementById('txtfinals3').value = '$row[finals]'</script>";
echo"<script>document.getElementById('txtave3').value = '$row[ave]'</script>";
echo"<script>document.getElementById('txtremarks3').value = '$row[remarks]'</script>";
}

if($subjdesc3 == 0)
{
echo"<script>document.getElementById('cmbsubjdesc3').disabled = true</script>";
echo"<script>document.getElementById('txtmidterm3').disabled = true</script>";
echo"<script>document.getElementById('txtfinals3').disabled = true</script>";
echo"<script>document.getElementById('txtave3').disabled = true</script>";
echo"<script>document.getElementById('txtremarks3').disabled = true</script>";
echo"<script>document.getElementById('btndelete03').disabled = true</script>";
}

//04

$sql = mysqli_query($cn, "select * from subjects where teacher = '$txtusername' and strand = '$txtstrand' and semester = '$cmbsem' and yr_sec = '$cmbyear' and subj_order = '04'");
$subjdesc4 = mysqli_num_rows($sql);

if($subjdesc4 == 1)
{
while($row = mysqli_fetch_assoc($sql))
{
echo"<script>document.getElementById('cmbsubjdesc4').value = '$row[subj_desc]'</script>";
}
}
else
{
$sql = mysqli_query($cn, "select * from subjects where strand = '$txtstrand' and semester = '$cmbsem' and yr_sec = '$cmbyear' and subj_order = '04'");
while($row = mysqli_fetch_assoc($sql))
{
echo"<script>document.getElementById('cmbsubjdesc4').value = '$row[subj_desc]'</script>";
echo"<script>document.getElementById('cmbsubjdesc4').disabled = true</script>";
echo"<script>document.getElementById('txtmidterm4').disabled = true</script>";
echo"<script>document.getElementById('txtfinals4').disabled = true</script>";
echo"<script>document.getElementById('txtave4').disabled = true</script>";
echo"<script>document.getElementById('txtremarks4').disabled = true</script>";
echo"<script>document.getElementById('btndelete04').disabled = true</script>";
}
}

$sql = mysqli_query($cn, "select * from grades where username = '$cmbsearch' and strand = '$txtstrand' and semester = '$cmbsem' and yr_sec like '%$cmbyear%' and subj_order = '04'");
$grades = mysqli_num_rows($sql);

while($row = mysqli_fetch_assoc($sql))
{
echo"<script>document.getElementById('txtmidterm4').value = '$row[midterm]'</script>";
echo"<script>document.getElementById('txtfinals4').value = '$row[finals]'</script>";
echo"<script>document.getElementById('txtave4').value = '$row[ave]'</script>";
echo"<script>document.getElementById('txtremarks4').value = '$row[remarks]'</script>";
}

if($subjdesc4 == 0)
{
echo"<script>document.getElementById('cmbsubjdesc4').disabled = true</script>";
echo"<script>document.getElementById('txtmidterm4').disabled = true</script>";
echo"<script>document.getElementById('txtfinals4').disabled = true</script>";
echo"<script>document.getElementById('txtave4').disabled = true</script>";
echo"<script>document.getElementById('txtremarks4').disabled = true</script>";
echo"<script>document.getElementById('btndelete04').disabled = true</script>";
}

//05

$sql = mysqli_query($cn, "select * from subjects where teacher = '$txtusername' and strand = '$txtstrand' and semester = '$cmbsem' and yr_sec = '$cmbyear' and subj_order = '05'");
$subjdesc5 = mysqli_num_rows($sql);

if($subjdesc5 == 1)
{
while($row = mysqli_fetch_assoc($sql))
{
echo"<script>document.getElementById('cmbsubjdesc5').value = '$row[subj_desc]'</script>";
}
}
else
{
$sql = mysqli_query($cn, "select * from subjects where strand = '$txtstrand' and semester = '$cmbsem' and yr_sec = '$cmbyear' and subj_order = '05'");
while($row = mysqli_fetch_assoc($sql))
{
echo"<script>document.getElementById('cmbsubjdesc5').value = '$row[subj_desc]'</script>";
echo"<script>document.getElementById('cmbsubjdesc5').disabled = true</script>";
echo"<script>document.getElementById('txtmidterm5').disabled = true</script>";
echo"<script>document.getElementById('txtfinals5').disabled = true</script>";
echo"<script>document.getElementById('txtave5').disabled = true</script>";
echo"<script>document.getElementById('txtremarks5').disabled = true</script>";
echo"<script>document.getElementById('btndelete05').disabled = true</script>";
}
}

$sql = mysqli_query($cn, "select * from grades where username = '$cmbsearch' and strand = '$txtstrand' and semester = '$cmbsem' and yr_sec like '%$cmbyear%' and subj_order = '05'");
$grades = mysqli_num_rows($sql);

while($row = mysqli_fetch_assoc($sql))
{
echo"<script>document.getElementById('txtmidterm5').value = '$row[midterm]'</script>";
echo"<script>document.getElementById('txtfinals5').value = '$row[finals]'</script>";
echo"<script>document.getElementById('txtave5').value = '$row[ave]'</script>";
echo"<script>document.getElementById('txtremarks5').value = '$row[remarks]'</script>";
}

if($subjdesc5 == 0)
{
echo"<script>document.getElementById('cmbsubjdesc5').disabled = true</script>";
echo"<script>document.getElementById('txtmidterm5').disabled = true</script>";
echo"<script>document.getElementById('txtfinals5').disabled = true</script>";
echo"<script>document.getElementById('txtave5').disabled = true</script>";
echo"<script>document.getElementById('txtremarks5').disabled = true</script>";
echo"<script>document.getElementById('btndelete05').disabled = true</script>";
}

//06

$sql = mysqli_query($cn, "select * from subjects where teacher = '$txtusername' and strand = '$txtstrand' and semester = '$cmbsem' and yr_sec = '$cmbyear' and subj_order = '06'");
$subjdesc6 = mysqli_num_rows($sql);

if($subjdesc6 == 1)
{
while($row = mysqli_fetch_assoc($sql))
{
echo"<script>document.getElementById('cmbsubjdesc6').value = '$row[subj_desc]'</script>";
}
}
else
{
$sql = mysqli_query($cn, "select * from subjects where strand = '$txtstrand' and semester = '$cmbsem' and yr_sec = '$cmbyear' and subj_order = '06'");
while($row = mysqli_fetch_assoc($sql))
{
echo"<script>document.getElementById('cmbsubjdesc6').value = '$row[subj_desc]'</script>";
echo"<script>document.getElementById('cmbsubjdesc6').disabled = true</script>";
echo"<script>document.getElementById('txtmidterm6').disabled = true</script>";
echo"<script>document.getElementById('txtfinals6').disabled = true</script>";
echo"<script>document.getElementById('txtave6').disabled = true</script>";
echo"<script>document.getElementById('txtremarks6').disabled = true</script>";
echo"<script>document.getElementById('btndelete06').disabled = true</script>";
}
}

$sql = mysqli_query($cn, "select * from grades where username = '$cmbsearch' and strand = '$txtstrand' and semester = '$cmbsem' and yr_sec like '%$cmbyear%' and subj_order = '06'");
$grades = mysqli_num_rows($sql);

while($row = mysqli_fetch_assoc($sql))
{
echo"<script>document.getElementById('txtmidterm6').value = '$row[midterm]'</script>";
echo"<script>document.getElementById('txtfinals6').value = '$row[finals]'</script>";
echo"<script>document.getElementById('txtave6').value = '$row[ave]'</script>";
echo"<script>document.getElementById('txtremarks6').value = '$row[remarks]'</script>";
}

if($subjdesc6 == 0)
{
echo"<script>document.getElementById('cmbsubjdesc6').disabled = true</script>";
echo"<script>document.getElementById('txtmidterm6').disabled = true</script>";
echo"<script>document.getElementById('txtfinals6').disabled = true</script>";
echo"<script>document.getElementById('txtave6').disabled = true</script>";
echo"<script>document.getElementById('txtremarks6').disabled = true</script>";
echo"<script>document.getElementById('btndelete06').disabled = true</script>";
}

//07

$sql = mysqli_query($cn, "select * from subjects where teacher = '$txtusername' and strand = '$txtstrand' and semester = '$cmbsem' and yr_sec = '$cmbyear' and subj_order = '07'");
$subjdesc7 = mysqli_num_rows($sql);

if($subjdesc7 == 1)
{
while($row = mysqli_fetch_assoc($sql))
{
echo"<script>document.getElementById('cmbsubjdesc7').value = '$row[subj_desc]'</script>";
}
}
else
{
$sql = mysqli_query($cn, "select * from subjects where strand = '$txtstrand' and semester = '$cmbsem' and yr_sec = '$cmbyear' and subj_order = '07'");
while($row = mysqli_fetch_assoc($sql))
{
echo"<script>document.getElementById('cmbsubjdesc7').value = '$row[subj_desc]'</script>";
echo"<script>document.getElementById('cmbsubjdesc7').disabled = true</script>";
echo"<script>document.getElementById('txtmidterm7').disabled = true</script>";
echo"<script>document.getElementById('txtfinals7').disabled = true</script>";
echo"<script>document.getElementById('txtave7').disabled = true</script>";
echo"<script>document.getElementById('txtremarks7').disabled = true</script>";
echo"<script>document.getElementById('btndelete07').disabled = true</script>";
}
}

$sql = mysqli_query($cn, "select * from grades where username = '$cmbsearch' and strand = '$txtstrand' and semester = '$cmbsem' and yr_sec like '%$cmbyear%' and subj_order = '07'");
$grades = mysqli_num_rows($sql);

while($row = mysqli_fetch_assoc($sql))
{
echo"<script>document.getElementById('txtmidterm7').value = '$row[midterm]'</script>";
echo"<script>document.getElementById('txtfinals7').value = '$row[finals]'</script>";
echo"<script>document.getElementById('txtave7').value = '$row[ave]'</script>";
echo"<script>document.getElementById('txtremarks7').value = '$row[remarks]'</script>";
}

if($subjdesc7 == 0)
{
echo"<script>document.getElementById('cmbsubjdesc7').disabled = true</script>";
echo"<script>document.getElementById('txtmidterm7').disabled = true</script>";
echo"<script>document.getElementById('txtfinals7').disabled = true</script>";
echo"<script>document.getElementById('txtave7').disabled = true</script>";
echo"<script>document.getElementById('txtremarks7').disabled = true</script>";
echo"<script>document.getElementById('btndelete07').disabled = true</script>";
}

//08
	
$sql = mysqli_query($cn, "select * from subjects where teacher = '$txtusername' and strand = '$txtstrand' and semester = '$cmbsem' and yr_sec = '$cmbyear' and subj_order = '08'");
$subjdesc8 = mysqli_num_rows($sql);

if($subjdesc8 == 1)
{
while($row = mysqli_fetch_assoc($sql))
{
echo"<script>document.getElementById('cmbsubjdesc8').value = '$row[subj_desc]'</script>";
}
}
else
{
$sql = mysqli_query($cn, "select * from subjects where strand = '$txtstrand' and semester = '$cmbsem' and yr_sec = '$cmbyear' and subj_order = '08'");
while($row = mysqli_fetch_assoc($sql))
{
echo"<script>document.getElementById('cmbsubjdesc8').value = '$row[subj_desc]'</script>";
echo"<script>document.getElementById('cmbsubjdesc8').disabled = true</script>";
echo"<script>document.getElementById('txtmidterm8').disabled = true</script>";
echo"<script>document.getElementById('txtfinals8').disabled = true</script>";
echo"<script>document.getElementById('txtave8').disabled = true</script>";
echo"<script>document.getElementById('txtremarks8').disabled = true</script>";
echo"<script>document.getElementById('btndelete08').disabled = true</script>";
}
}

$sql = mysqli_query($cn, "select * from grades where username = '$cmbsearch' and strand = '$txtstrand' and semester = '$cmbsem' and yr_sec like '%$cmbyear%' and subj_order = '08'");
$grades = mysqli_num_rows($sql);

while($row = mysqli_fetch_assoc($sql))
{
echo"<script>document.getElementById('txtmidterm8').value = '$row[midterm]'</script>";
echo"<script>document.getElementById('txtfinals8').value = '$row[finals]'</script>";
echo"<script>document.getElementById('txtave8').value = '$row[ave]'</script>";
echo"<script>document.getElementById('txtremarks8').value = '$row[remarks]'</script>";
}

if($subjdesc8 == 0)
{
echo"<script>document.getElementById('cmbsubjdesc8').disabled = true</script>";
echo"<script>document.getElementById('txtmidterm8').disabled = true</script>";
echo"<script>document.getElementById('txtfinals8').disabled = true</script>";
echo"<script>document.getElementById('txtave8').disabled = true</script>";
echo"<script>document.getElementById('txtremarks8').disabled = true</script>";
echo"<script>document.getElementById('btndelete08').disabled = true</script>";
}

//09

$sql = mysqli_query($cn, "select * from subjects where teacher = '$txtusername' and strand = '$txtstrand' and semester = '$cmbsem' and yr_sec = '$cmbyear' and subj_order = '09'");
$subjdesc9 = mysqli_num_rows($sql);

if($subjdesc9 == 1)
{
while($row = mysqli_fetch_assoc($sql))
{
echo"<script>document.getElementById('cmbsubjdesc9').value = '$row[subj_desc]'</script>";
}
}
else
{
$sql = mysqli_query($cn, "select * from subjects where strand = '$txtstrand' and semester = '$cmbsem' and yr_sec = '$cmbyear' and subj_order = '09'");
while($row = mysqli_fetch_assoc($sql))
{
echo"<script>document.getElementById('cmbsubjdesc9').value = '$row[subj_desc]'</script>";
echo"<script>document.getElementById('cmbsubjdesc9').disabled = true</script>";
echo"<script>document.getElementById('txtmidterm9').disabled = true</script>";
echo"<script>document.getElementById('txtfinals9').disabled = true</script>";
echo"<script>document.getElementById('txtave9').disabled = true</script>";
echo"<script>document.getElementById('txtremarks9').disabled = true</script>";
echo"<script>document.getElementById('btndelete09').disabled = true</script>";
}
}

$sql = mysqli_query($cn, "select * from grades where username = '$cmbsearch' and strand = '$txtstrand' and semester = '$cmbsem' and yr_sec like '%$cmbyear%' and subj_order = '09'");
$grades = mysqli_num_rows($sql);

while($row = mysqli_fetch_assoc($sql))
{
echo"<script>document.getElementById('txtmidterm9').value = '$row[midterm]'</script>";
echo"<script>document.getElementById('txtfinals9').value = '$row[finals]'</script>";
echo"<script>document.getElementById('txtave9').value = '$row[ave]'</script>";
echo"<script>document.getElementById('txtremarks9').value = '$row[remarks]'</script>";
}

if($subjdesc9 == 0)
{
echo"<script>document.getElementById('cmbsubjdesc9').disabled = true</script>";
echo"<script>document.getElementById('txtmidterm9').disabled = true</script>";
echo"<script>document.getElementById('txtfinals9').disabled = true</script>";
echo"<script>document.getElementById('txtave9').disabled = true</script>";
echo"<script>document.getElementById('txtremarks9').disabled = true</script>";
echo"<script>document.getElementById('btndelete09').disabled = true</script>";
}

//10

$sql = mysqli_query($cn, "select * from subjects where teacher = '$txtusername' and strand = '$txtstrand' and semester = '$cmbsem' and yr_sec = '$cmbyear' and subj_order = '10'");
$subjdesc10 = mysqli_num_rows($sql);

if($subjdesc10 == 1)
{
while($row = mysqli_fetch_assoc($sql))
{
echo"<script>document.getElementById('cmbsubjdesc10').value = '$row[subj_desc]'</script>";
}
}
else
{
$sql = mysqli_query($cn, "select * from subjects where strand = '$txtstrand' and semester = '$cmbsem' and yr_sec = '$cmbyear' and subj_order = '10'");
while($row = mysqli_fetch_assoc($sql))
{
echo"<script>document.getElementById('cmbsubjdesc10').value = '$row[subj_desc]'</script>";
echo"<script>document.getElementById('cmbsubjdesc10').disabled = true</script>";
echo"<script>document.getElementById('txtmidterm10').disabled = true</script>";
echo"<script>document.getElementById('txtfinals10').disabled = true</script>";
echo"<script>document.getElementById('txtave10').disabled = true</script>";
echo"<script>document.getElementById('txtremarks10').disabled = true</script>";
echo"<script>document.getElementById('btndelete10').disabled = true</script>";
}
}

$sql = mysqli_query($cn, "select * from grades where username = '$cmbsearch' and strand = '$txtstrand' and semester = '$cmbsem' and yr_sec like '%$cmbyear%' and subj_order = '10'");
$grades = mysqli_num_rows($sql);

while($row = mysqli_fetch_assoc($sql))
{
echo"<script>document.getElementById('txtmidterm10').value = '$row[midterm]'</script>";
echo"<script>document.getElementById('txtfinals10').value = '$row[finals]'</script>";
echo"<script>document.getElementById('txtave10').value = '$row[ave]'</script>";
echo"<script>document.getElementById('txtremarks10').value = '$row[remarks]'</script>";
}

if($subjdesc10 == 0)
{
echo"<script>document.getElementById('cmbsubjdesc10').disabled = true</script>";
echo"<script>document.getElementById('txtmidterm10').disabled = true</script>";
echo"<script>document.getElementById('txtfinals10').disabled = true</script>";
echo"<script>document.getElementById('txtave10').disabled = true</script>";
echo"<script>document.getElementById('txtremarks10').disabled = true</script>";
echo"<script>document.getElementById('btndelete10').disabled = true</script>";
}
	
echo"<center>";

// Data Table

echo"<table border = 1 cellspacing = 0 style = 'width: 1000; border-color: black; border-left: none; border-right: none; position: relative; top: 20;'>";

//Grade 12 Second Semester

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
<th style = 'border-left: 3px solid black; height: 20; width: 600; font-size: 25;'>
Subjects
</th>
<th style = 'height: 20; width: 100; font-size: 25;'>
3rd Quarter
</th>
<th style = 'height: 20; width: 100; font-size: 25;'>
4th Quarter
</th>
<th style = 'border-right: 3px solid black; height: 20; width: 100; font-size: 25;'>
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

if(isset($_POST['search']))
{
$cmbsearch = $_POST['cmbsearch'];
$txtstrand = $_POST['txtstrand'];
$sql = mysqli_query($cn, "select * from grades where (username = '$cmbsearch' or lrn = '$cmbsearch' or learners_name = '$cmbsearch') and semester = '2nd' and strand = '$txtstrand' and yr_sec like '%12%' and subj_type = 'Core' order by subj_order, subj_desc asc;");
$grades = mysqli_num_rows($sql);
while($row = mysqli_fetch_assoc($sql))
{
echo"<tr>
<td style = 'border-left: 3px solid black; min-width: 200; max-width: 200; text-align: left; font-size: 25;'>".$row['subj_desc']."</td>
<td style = 'width: 100; text-align: center; font-size: 25;'>".$row['midterm']."</td>
<td style = 'width: 100; text-align: center; font-size: 25;'>".$row['finals']."</td>
<td style = 'border-right: 3px solid black; width: 100; text-align: center; font-weight: bold; font-size: 25;'>".$row['ave']."</td>
</tr>";
}
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

if(isset($_POST['search']))
{
$cmbsearch = $_POST['cmbsearch'];
$sql = mysqli_query($cn, "select * from grades where (username = '$cmbsearch' or lrn = '$cmbsearch' or learners_name = '$cmbsearch') and semester = '2nd' and strand = '$txtstrand' and yr_sec like '%12%' and subj_type = 'Applied' order by subj_order, subj_desc asc;");
$grades = mysqli_num_rows($sql);
while($row = mysqli_fetch_assoc($sql))
{
echo"<tr>
<td style = 'border-left: 3px solid black; min-width: 200; max-width: 200; text-align: left; font-size: 25;'>".$row['subj_desc']."</td>
<td style = 'width: 100; text-align: center; font-size: 25;'>".$row['midterm']."</td>
<td style = 'width: 100; text-align: center; font-size: 25;'>".$row['finals']."</td>
<td style = 'border-right: 3px solid black; width: 100; text-align: center; font-weight: bold; font-size: 25;'>".$row['ave']."</td>
</tr>";
}
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

if(isset($_POST['search']))
{
$cmbsearch = $_POST['cmbsearch'];
$sql = mysqli_query($cn, "select * from grades where (username = '$cmbsearch' or lrn = '$cmbsearch' or learners_name = '$cmbsearch') and semester = '2nd' and strand = '$txtstrand' and yr_sec like '%12%' and subj_type = 'Specialized' order by subj_order, subj_desc asc;");
$grades = mysqli_num_rows($sql);
while($row = mysqli_fetch_assoc($sql))
{
echo"<tr>
<td style = 'border-left: 3px solid black; min-width: 200; max-width: 200; text-align: left; font-size: 25;'>".$row['subj_desc']."</td>
<td style = 'width: 100; text-align: center; font-size: 25;'>".$row['midterm']."</td>
<td style = 'width: 100; text-align: center; font-size: 25;'>".$row['finals']."</td>
<td style = 'border-right: 3px solid black; width: 100; text-align: center; font-weight: bold; font-size: 25;'>".$row['ave']."</td>
</tr>";
}
}

// General Average

if(isset($_POST['search']))
{
$cmbsearch = $_POST['cmbsearch'];
$sql = mysqli_query($cn, "select AVG(ave) from grades where (username = '$cmbsearch' or lrn = '$cmbsearch' or learners_name = '$cmbsearch') and semester = '2nd' and strand = '$txtstrand' and yr_sec like '%12%'");
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
<td style = 'border-right: 3px solid black; width: 80; font-weight: bold; text-align: center; font-weight: bold; font-size: 25;'>";
$genave = $row['AVG(ave)'];
echo$genave = round($genave,2);
echo"</td>
</tr>";
}
}

// Total Subjects

if(isset($_POST['search']))
{
$cmbsearch = $_POST['cmbsearch'];
$sql = mysqli_query($cn, "select COUNT(subj_desc) from grades where (username = '$cmbsearch' or lrn = '$cmbsearch' or learners_name = '$cmbsearch') and semester = '2nd' and strand = '$txtstrand' and yr_sec like '%12%'");
$subjdesc = mysqli_num_rows($sql);

while($row = mysqli_fetch_assoc($sql))
{
$cnt = $row['COUNT(subj_desc)'];
if($cnt >=1)
{
echo"<tr>
<td style = 'border-left: 3px solid black; border-right: none; text-align: left; background-color: EFC372; font-size: 25;'>
Total Number of Subjects: $cnt
</td>
<td style = 'border-left: none; border-right: none; background-color: EFC372;'>
</td>
<td style = 'border-left: none; border-right: none; background-color: EFC372;'>
</td>
<td style = 'border-left: none; border-right: 3px solid black; background-color: EFC372;'>
</td>
</tr>";
}
}
}

echo"<tr>
<td style = 'border-right: none; border-left: none; height: 20;'>
</td>
<td style = 'border-left: none; border-right: none;'>
</td>
<td style = 'border-left: none; border-right: none;'>
</td>
<td style = 'border-left: none; border-right: none;'>
</td>
</tr>";

//Grade 12 First Semester

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
<th style = 'border-left: 3px solid black; height: 20; width: 600; font-size: 25;'>
Subjects
</th>
<th style = 'height: 20; width: 100; font-size: 25;'>
1st Quarter
</th>
<th style = 'height: 20; width: 100; font-size: 25;'>
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

if(isset($_POST['search']))
{
$cmbsearch = $_POST['cmbsearch'];
$sql = mysqli_query($cn, "select * from grades where (username = '$cmbsearch' or lrn = '$cmbsearch' or learners_name = '$cmbsearch') and semester = '1st' and strand = '$txtstrand' and yr_sec like '%12%' and subj_type = 'Core' order by subj_order, subj_desc asc;");
$grades = mysqli_num_rows($sql);
while($row = mysqli_fetch_assoc($sql))
{
echo"<tr>
<td style = 'border-left: 3px solid black; min-width: 200; max-width: 200; text-align: left; font-size: 25;'>".$row['subj_desc']."</td>
<td style = 'width: 100; text-align: center; font-size: 25;'>".$row['midterm']."</td>
<td style = 'width: 100; text-align: center; font-size: 25;'>".$row['finals']."</td>
<td style = 'border-right: 3px solid black; width: 100; text-align: center; font-weight: bold; font-size: 25;'>".$row['ave']."</td>
</tr>";
}
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

if(isset($_POST['search']))
{
$cmbsearch = $_POST['cmbsearch'];
$sql = mysqli_query($cn, "select * from grades where (username = '$cmbsearch' or lrn = '$cmbsearch' or learners_name = '$cmbsearch') and semester = '1st' and strand = '$txtstrand' and yr_sec like '%12%' and subj_type = 'Applied' order by subj_order, subj_desc asc;");
$grades = mysqli_num_rows($sql);
while($row = mysqli_fetch_assoc($sql))
{
echo"<tr>
<td style = 'border-left: 3px solid black; min-width: 200; max-width: 200; text-align: left; font-size: 25;'>".$row['subj_desc']."</td>
<td style = 'width: 100; text-align: center; font-size: 25;'>".$row['midterm']."</td>
<td style = 'width: 100; text-align: center; font-size: 25;'>".$row['finals']."</td>
<td style = 'border-right: 3px solid black; width: 100; text-align: center; font-weight: bold; font-size: 25;'>".$row['ave']."</td>
</tr>";
}
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

if(isset($_POST['search']))
{
$cmbsearch = $_POST['cmbsearch'];
$sql = mysqli_query($cn, "select * from grades where (username = '$cmbsearch' or lrn = '$cmbsearch' or learners_name = '$cmbsearch') and semester = '1st' and strand = '$txtstrand' and yr_sec like '%12%' and subj_type = 'Specialized' order by subj_order, subj_desc asc;");
$grades = mysqli_num_rows($sql);
while($row = mysqli_fetch_assoc($sql))
{
echo"<tr>
<td style = 'border-left: 3px solid black; min-width: 200; max-width: 200; text-align: left; font-size: 25;'>".$row['subj_desc']."</td>
<td style = 'width: 100; text-align: center; font-size: 25;'>".$row['midterm']."</td>
<td style = 'width: 100; text-align: center; font-size: 25;'>".$row['finals']."</td>
<td style = 'border-right: 3px solid black; width: 100; text-align: center; font-weight: bold; font-size: 25;'>".$row['ave']."</td>
</tr>";
}
}

// General Average

if(isset($_POST['search']))
{
$cmbsearch = $_POST['cmbsearch'];
$sql = mysqli_query($cn, "select AVG(ave) from grades where (username = '$cmbsearch' or lrn = '$cmbsearch' or learners_name = '$cmbsearch') and semester = '1st' and strand = '$txtstrand' and yr_sec like '%12%'");
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
<td style = 'border-right: 3px solid black; width: 80; font-weight: bold; text-align: center; font-weight: bold; font-size: 25;'>";
$genave = $row['AVG(ave)'];
echo$genave = round($genave,2);
echo"</td>
</tr>";
}
}

// Total Subjects

if(isset($_POST['search']))
{
$cmbsearch = $_POST['cmbsearch'];
$sql = mysqli_query($cn, "select COUNT(subj_desc) from grades where (username = '$cmbsearch' or lrn = '$cmbsearch' or learners_name = '$cmbsearch') and semester = '1st' and strand = '$txtstrand' and yr_sec like '%12%'");
$subjdesc = mysqli_num_rows($sql);

while($row = mysqli_fetch_assoc($sql))
{
$cnt = $row['COUNT(subj_desc)'];
if($cnt >=1)
{
echo"<tr>
<td style = 'border-left: 3px solid black; border-right: none; text-align: left; background-color: EFC372; font-size: 25;'>
Total Number of Subjects: $cnt
</td>
<td style = 'border-left: none; border-right: none; background-color: EFC372;'>
</td>
<td style = 'border-left: none; border-right: none; background-color: EFC372;'>
</td>
<td style = 'border-left: none; border-right: 3px solid black; background-color: EFC372;'>
</td>
</tr>";
}
}
}

echo"<tr>
<td style = 'border-right: none; border-left: none; height: 20;'>
</td>
<td style = 'border-left: none; border-right: none;'>
</td>
<td style = 'border-left: none; border-right: none;'>
</td>
<td style = 'border-left: none; border-right: none;'>
</td>
</tr>";

//Grade 11 Second Semester

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
<th style = 'border-left: 3px solid black; height: 20; width: 600; font-size: 25;'>
Subjects
</th>
<th style = 'height: 20; width: 100; font-size: 25;'>
3rd Quarter
</th>
<th style = 'height: 20; width: 100; font-size: 25;'>
4th Quarter
</th>
<th style = 'border-right: 3px solid black; height: 20; width: 100; font-size: 25;'>
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

if(isset($_POST['search']))
{
$cmbsearch = $_POST['cmbsearch'];
$sql = mysqli_query($cn, "select * from grades where (username = '$cmbsearch' or lrn = '$cmbsearch' or learners_name = '$cmbsearch') and semester = '2nd' and strand = '$txtstrand' and yr_sec like '%11%' and subj_type = 'Core' order by subj_order, subj_desc asc;");
$grades = mysqli_num_rows($sql);
while($row = mysqli_fetch_assoc($sql))
{
echo"<tr>
<td style = 'border-left: 3px solid black; min-width: 200; max-width: 200; text-align: left; font-size: 25;'>".$row['subj_desc']."</td>
<td style = 'width: 100; text-align: center; font-size: 25;'>".$row['midterm']."</td>
<td style = 'width: 100; text-align: center; font-size: 25;'>".$row['finals']."</td>
<td style = 'border-right: 3px solid black; width: 100; text-align: center; font-weight: bold; font-size: 25;'>".$row['ave']."</td>
</tr>";
}
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

if(isset($_POST['search']))
{
$cmbsearch = $_POST['cmbsearch'];
$sql = mysqli_query($cn, "select * from grades where (username = '$cmbsearch' or lrn = '$cmbsearch' or learners_name = '$cmbsearch') and semester = '2nd' and strand = '$txtstrand' and yr_sec like '%11%' and subj_type = 'Applied' order by subj_order, subj_desc asc;");
$grades = mysqli_num_rows($sql);
while($row = mysqli_fetch_assoc($sql))
{
echo"<tr>
<td style = 'border-left: 3px solid black; min-width: 200; max-width: 200; text-align: left; font-size: 25;'>".$row['subj_desc']."</td>
<td style = 'width: 100; text-align: center; font-size: 25;'>".$row['midterm']."</td>
<td style = 'width: 100; text-align: center; font-size: 25;'>".$row['finals']."</td>
<td style = 'border-right: 3px solid black; width: 100; text-align: center; font-weight: bold; font-size: 25;'>".$row['ave']."</td>
</tr>";
}
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

if(isset($_POST['search']))
{
$cmbsearch = $_POST['cmbsearch'];
$sql = mysqli_query($cn, "select * from grades where (username = '$cmbsearch' or lrn = '$cmbsearch' or learners_name = '$cmbsearch') and semester = '2nd' and strand = '$txtstrand' and yr_sec like '%11%' and subj_type = 'Specialized' order by subj_order, subj_desc asc;");
$grades = mysqli_num_rows($sql);
while($row = mysqli_fetch_assoc($sql))
{
echo"<tr>
<td style = 'border-left: 3px solid black; min-width: 200; max-width: 200; text-align: left; font-size: 25;'>".$row['subj_desc']."</td>
<td style = 'width: 100; text-align: center; font-size: 25;'>".$row['midterm']."</td>
<td style = 'width: 100; text-align: center; font-size: 25;'>".$row['finals']."</td>
<td style = 'border-right: 3px solid black; width: 100; text-align: center; font-weight: bold; font-size: 25;'>".$row['ave']."</td>
</tr>";
}
}

// General Average

if(isset($_POST['search']))
{
$cmbsearch = $_POST['cmbsearch'];
$sql = mysqli_query($cn, "select AVG(ave) from grades where (username = '$cmbsearch' or lrn = '$cmbsearch' or learners_name = '$cmbsearch') and semester = '2nd' and strand = '$txtstrand' and yr_sec like '%11%'");
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
<td style = 'border-right: 3px solid black; width: 80; font-weight: bold; text-align: center; font-weight: bold; font-size: 25;'>";
$genave = $row['AVG(ave)'];
echo$genave = round($genave,2);
echo"</td>
</tr>";
}
}

// Total Subjects

if(isset($_POST['search']))
{
$cmbsearch = $_POST['cmbsearch'];
$sql = mysqli_query($cn, "select COUNT(subj_desc) from grades where (username = '$cmbsearch' or lrn = '$cmbsearch' or learners_name = '$cmbsearch') and semester = '2nd' and strand = '$txtstrand' and yr_sec like '%11%'");
$subjdesc = mysqli_num_rows($sql);

while($row = mysqli_fetch_assoc($sql))
{
$cnt = $row['COUNT(subj_desc)'];
if($cnt >=1)
{
echo"<tr>
<td style = 'border-left: 3px solid black; border-right: none; text-align: left; background-color: EFC372; font-size: 25;'>
Total Number of Subjects: $cnt
</td>
<td style = 'border-left: none; border-right: none; background-color: EFC372;'>
</td>
<td style = 'border-left: none; border-right: none; background-color: EFC372;'>
</td>
<td style = 'border-left: none; border-right: 3px solid black; background-color: EFC372;'>
</td>
</tr>";
}
}
}

echo"<tr>
<td style = 'border-right: none; border-left: none; height: 20;'>
</td>
<td style = 'border-left: none; border-right: none;'>
</td>
<td style = 'border-left: none; border-right: none;'>
</td>
<td style = 'border-left: none; border-right: none;'>
</td>
</tr>";

//Grade 11 First Semester

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
<th style = 'border-left: 3px solid black; height: 20; width: 600; font-size: 25;'>
Subjects
</th>
<th style = 'height: 20; width: 100; font-size: 25;'>
1st Quarter
</th>
<th style = 'height: 20; width: 100; font-size: 25;'>
2nd Quarter
</th>
<th style = 'border-right: 3px solid black; height: 20; width: 100; font-size: 25;'>
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

if(isset($_POST['search']))
{
$cmbsearch = $_POST['cmbsearch'];
$sql = mysqli_query($cn, "select * from grades where (username = '$cmbsearch' or lrn = '$cmbsearch' or learners_name = '$cmbsearch') and semester = '1st' and strand = '$txtstrand' and yr_sec like '%11%' and subj_type = 'Core' order by subj_order, subj_desc asc;");
$grades = mysqli_num_rows($sql);
while($row = mysqli_fetch_assoc($sql))
{
echo"<tr>
<td style = 'border-left: 3px solid black; min-width: 200; max-width: 200; text-align: left; font-size: 25;'>".$row['subj_desc']."</td>
<td style = 'width: 100; text-align: center; font-size: 25;'>".$row['midterm']."</td>
<td style = 'width: 100; text-align: center; font-size: 25;'>".$row['finals']."</td>
<td style = 'border-right: 3px solid black; width: 100; text-align: center; font-weight: bold; font-size: 25;'>".$row['ave']."</td>
</tr>";
}
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

if(isset($_POST['search']))
{
$cmbsearch = $_POST['cmbsearch'];
$sql = mysqli_query($cn, "select * from grades where (username = '$cmbsearch' or lrn = '$cmbsearch' or learners_name = '$cmbsearch') and semester = '1st' and strand = '$txtstrand' and yr_sec like '%11%' and subj_type = 'Applied' order by subj_order, subj_desc asc;");
$grades = mysqli_num_rows($sql);
while($row = mysqli_fetch_assoc($sql))
{
echo"<tr>
<td style = 'border-left: 3px solid black; min-width: 200; max-width: 200; text-align: left; font-size: 25;'>".$row['subj_desc']."</td>
<td style = 'width: 100; text-align: center; font-size: 25;'>".$row['midterm']."</td>
<td style = 'width: 100; text-align: center; font-size: 25;'>".$row['finals']."</td>
<td style = 'border-right: 3px solid black; width: 100; text-align: center; font-weight: bold; font-size: 25;'>".$row['ave']."</td>
</tr>";
}
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

if(isset($_POST['search']))
{
$cmbsearch = $_POST['cmbsearch'];
$sql = mysqli_query($cn, "select * from grades where (username = '$cmbsearch' or lrn = '$cmbsearch' or learners_name = '$cmbsearch') and semester = '1st' and strand = '$txtstrand' and yr_sec like '%11%' and subj_type = 'Specialized' order by subj_order, subj_desc asc;");
$grades = mysqli_num_rows($sql);
while($row = mysqli_fetch_assoc($sql))
{
echo"<tr>
<td style = 'border-left: 3px solid black; min-width: 200; max-width: 200; text-align: left; font-size: 25;'>".$row['subj_desc']."</td>
<td style = 'width: 100; text-align: center; font-size: 25;'>".$row['midterm']."</td>
<td style = 'width: 100; text-align: center; font-size: 25;'>".$row['finals']."</td>
<td style = 'border-right: 3px solid black; width: 100; text-align: center; font-weight: bold; font-size: 25;'>".$row['ave']."</td>
</tr>";
}
}

// General Average

if(isset($_POST['search']))
{
$cmbsearch = $_POST['cmbsearch'];
$sql = mysqli_query($cn, "select AVG(ave) from grades where (username = '$cmbsearch' or lrn = '$cmbsearch' or learners_name = '$cmbsearch') and semester = '1st' and strand = '$txtstrand' and yr_sec like '%11%'");
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
<td style = 'border-right: 3px solid black; border-bottom: 2px solid black; width: 80; font-weight: bold; font-size: 25; text-align: center;'>";
$genave = $row['AVG(ave)'];
echo$genave = round($genave,2);
echo"</td>
</tr>";
}
}

// Total Subjects

if(isset($_POST['search']))
{
$cmbsearch = $_POST['cmbsearch'];
$sql = mysqli_query($cn, "select COUNT(subj_desc) from grades where (username = '$cmbsearch' or lrn = '$cmbsearch' or learners_name = '$cmbsearch') and semester = '1st' and strand = '$txtstrand' and yr_sec like '%11%'");
$subjdesc = mysqli_num_rows($sql);

while($row = mysqli_fetch_assoc($sql))
{
$cnt = $row['COUNT(subj_desc)'];
if($cnt >=1)
{
echo"<tr>
<td style = 'border-left: 3px solid black; border-right: none; text-align: left; background-color: EFC372; font-size: 25;'>
Total Number of Subjects: $cnt
</td>
<td style = 'border-left: none; border-right: none; background-color: EFC372;'>
</td>
<td style = 'border-left: none; border-right: none; background-color: EFC372;'>
</td>
<td style = 'border-left: none; border-right: 3px solid black; background-color: EFC372;'>
</td>
</tr>";
}
}
}

echo"<tr>
<td style = 'border-right: none; border-left: none; height: 20;'>
</td>
<td style = 'border-left: none; border-right: none;'>
</td>
<td style = 'border-left: none; border-right: none;'>
</td>
<td style = 'border-left: none; border-right: none;'>
</td>
</tr>";

echo"</table>";

echo"</center>";

if(isset($_POST['search']))
{
//G11
$cmbsearch = $_POST['cmbsearch'];
$sql = mysqli_query($cn, "select * from grades where (username = '$cmbsearch' or lrn = '$cmbsearch' or learners_name = '$cmbsearch') and yr_sec like '%11%'");
$sy = mysqli_num_rows($sql);	
while($row = mysqli_fetch_assoc($sql))
{
echo"<script>document.getElementById('txtsyg11').value = '$row[sy]'</script>";
}
//G12
$cmbsearch = $_POST['cmbsearch'];
$sql = mysqli_query($cn, "select * from grades where (username = '$cmbsearch' or lrn = '$cmbsearch' or learners_name = '$cmbsearch') and yr_sec like '%12%'");
$sy = mysqli_num_rows($sql);	
while($row = mysqli_fetch_assoc($sql))
{
echo"<script>document.getElementById('txtsyg12').value = '$row[sy]'</script>";
echo"<script>document.getElementById('txtgradday').value = '$row[sy]'</script>";
}
}


// Save

if(isset($_POST['save']))
{

$txtuser = $_POST['txtuser'];
$txtlrn = $_POST['txtlrn'];
$txtlearnersname = $_POST['txtlearnersname'];
$cmbsy = $_POST['cmbsy'];
$cmbsemester = $_POST['cmbsemester'];
$cmbstrand = $_POST['cmbstrand'];
$cmbyrsec = $_POST['cmbyrsec'];
$cmbyear = $_POST['cmbyear'];

$txtusername = $_POST['txtusername'];

$cmbsubjdesc = $_POST['cmbsubjdesc'];
$cmbsubjdesc2 = $_POST['cmbsubjdesc2'];
$cmbsubjdesc3 = $_POST['cmbsubjdesc3'];
$cmbsubjdesc4 = $_POST['cmbsubjdesc4'];
$cmbsubjdesc5 = $_POST['cmbsubjdesc5'];
$cmbsubjdesc6 = $_POST['cmbsubjdesc6'];
$cmbsubjdesc7 = $_POST['cmbsubjdesc7'];
$cmbsubjdesc8 = $_POST['cmbsubjdesc8'];
$cmbsubjdesc9 = $_POST['cmbsubjdesc9'];
$cmbsubjdesc10 = $_POST['cmbsubjdesc10'];

$txtmidterm = $_POST['txtmidterm'];
$txtmidterm2 = $_POST['txtmidterm2'];
$txtmidterm3 = $_POST['txtmidterm3'];
$txtmidterm4 = $_POST['txtmidterm4'];
$txtmidterm5 = $_POST['txtmidterm5'];
$txtmidterm6 = $_POST['txtmidterm6'];
$txtmidterm7 = $_POST['txtmidterm7'];
$txtmidterm8 = $_POST['txtmidterm8'];
$txtmidterm9 = $_POST['txtmidterm9'];
$txtmidterm10 = $_POST['txtmidterm10'];

$txtfinals = $_POST['txtfinals'];
$txtfinals2 = $_POST['txtfinals2'];
$txtfinals3 = $_POST['txtfinals3'];
$txtfinals4 = $_POST['txtfinals4'];
$txtfinals5 = $_POST['txtfinals5'];
$txtfinals6 = $_POST['txtfinals6'];
$txtfinals7 = $_POST['txtfinals7'];
$txtfinals8 = $_POST['txtfinals8'];
$txtfinals9 = $_POST['txtfinals9'];
$txtfinals10 = $_POST['txtfinals10'];

$txtave = $_POST['txtave'];
$txtave2 = $_POST['txtave2'];
$txtave3 = $_POST['txtave3'];
$txtave4 = $_POST['txtave4'];
$txtave5 = $_POST['txtave5'];
$txtave6 = $_POST['txtave6'];
$txtave7 = $_POST['txtave7'];
$txtave8 = $_POST['txtave8'];
$txtave9 = $_POST['txtave9'];
$txtave10 = $_POST['txtave10'];

$txtremarks = $_POST['txtremarks'];
$txtremarks2 = $_POST['txtremarks2'];
$txtremarks3 = $_POST['txtremarks3'];
$txtremarks4 = $_POST['txtremarks4'];
$txtremarks5 = $_POST['txtremarks5'];
$txtremarks6 = $_POST['txtremarks6'];
$txtremarks7 = $_POST['txtremarks7'];
$txtremarks8 = $_POST['txtremarks8'];
$txtremarks9 = $_POST['txtremarks9'];
$txtremarks10 = $_POST['txtremarks10'];

// Invalid School Year

if(!empty($cmbsy))
{
$sql = mysqli_query($cn, "select * from school_year where sy = '$cmbsy'");
$sy = mysqli_num_rows($sql);
if($sy == 0)
{
echo "<script>alert('Invalid School Year')</script>";
echo"<script>history.go(-1)</script>";
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
echo"<script>history.go(-1)</script>";
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
echo"<script>history.go(-1)</script>";
}
}

// Invalid Year and Section

if(!empty($cmbstrand) && !empty($cmbyrsec) && !empty($cmbyear))
{
$sql = mysqli_query($cn, "select * from yr_sec where strand = '$cmbstrand' and yr_sec = '$cmbyrsec' and yr_sec like '%$cmbyear%'");
$yrsec = mysqli_num_rows($sql);
if($yrsec == 0)
{
echo "<script>alert('Invalid Year and Section')</script>";
echo"<script>history.go(-1)</script>";
}
}

//Semester, Strand, Year Level, Subject Description

$sql = mysqli_query($cn, "select * from subjects where semester = '$cmbsemester' and strand = '$cmbstrand' and yr_sec = '$cmbyear' and subj_desc = '$cmbsubjdesc'");
$ssylsd01 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from subjects where semester = '$cmbsemester' and strand = '$cmbstrand' and yr_sec = '$cmbyear' and subj_desc = '$cmbsubjdesc2'");
$ssylsd02 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from subjects where semester = '$cmbsemester' and strand = '$cmbstrand' and yr_sec = '$cmbyear' and subj_desc = '$cmbsubjdesc3'");
$ssylsd03 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from subjects where semester = '$cmbsemester' and strand = '$cmbstrand' and yr_sec = '$cmbyear' and subj_desc = '$cmbsubjdesc4'");
$ssylsd04 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from subjects where semester = '$cmbsemester' and strand = '$cmbstrand' and yr_sec = '$cmbyear' and subj_desc = '$cmbsubjdesc5'");
$ssylsd05 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from subjects where semester = '$cmbsemester' and strand = '$cmbstrand' and yr_sec = '$cmbyear' and subj_desc = '$cmbsubjdesc6'");
$ssylsd06 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from subjects where semester = '$cmbsemester' and strand = '$cmbstrand' and yr_sec = '$cmbyear' and subj_desc = '$cmbsubjdesc7'");
$ssylsd07 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from subjects where semester = '$cmbsemester' and strand = '$cmbstrand' and yr_sec = '$cmbyear' and subj_desc = '$cmbsubjdesc8'");
$ssylsd08 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from subjects where semester = '$cmbsemester' and strand = '$cmbstrand' and yr_sec = '$cmbyear' and subj_desc = '$cmbsubjdesc9'");
$ssylsd09 = mysqli_num_rows($sql);

$sql = mysqli_query($cn, "select * from subjects where semester = '$cmbsemester' and strand = '$cmbstrand' and yr_sec = '$cmbyear' and subj_desc = '$cmbsubjdesc10'");
$ssylsd10 = mysqli_num_rows($sql);

//Enroll

if(!empty($cmbsy) && $sy == 1
&& !empty($cmbsemester) && $semester == 1
&& !empty($cmbstrand) && $strand == 1
&& !empty($cmbyrsec) && $yrsec == 1)
{

$sql = mysqli_query($cn, "update student_information set sy = '$cmbsy', semester = '$cmbsemester', strand = '$cmbstrand', yr_sec = '$cmbyrsec' where username = '$txtuser'");

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

// Subject Description 1

if(!empty($cmbsubjdesc) && $ssylsd01 >= 1)
{

$sql = mysqli_query($cn, "select * from grades where username = '$txtuser' and subj_desc = '$cmbsubjdesc'");
$user = mysqli_num_rows($sql);
if($user == 0)
{
$sql = mysqli_query($cn, "insert into grades (username, lrn, learners_name, sy, semester, strand, yr_sec, subj_desc, midterm, finals, ave, remarks) values ('$txtuser', '$txtlrn', '$txtlearnersname', '$cmbsy', '$cmbsemester', '$cmbstrand', '$cmbyrsec', '$cmbsubjdesc', '$txtmidterm', '$txtfinals', '$txtave', '$txtremarks')");
}
else
{
$sql = mysqli_query($cn, "update grades set sy = '$cmbsy', semester = '$cmbsemester', strand = '$cmbstrand', yr_sec = '$cmbyrsec', subj_desc = '$cmbsubjdesc', midterm = '$txtmidterm', finals = '$txtfinals', ave = '$txtave', remarks = '$txtremarks' where username = '$txtuser' and subj_desc = '$cmbsubjdesc'");
}

// Update Subject Type and Order

$sql = mysqli_query($cn, "select * from subjects where subj_desc = '$cmbsubjdesc' and strand = '$cmbstrand'");
$subjdesc = mysqli_num_rows($sql);
while($row = mysqli_fetch_assoc($sql))
{
$sql = mysqli_query($cn, "update grades set subj_desc = '$cmbsubjdesc', subj_type = '$row[subj_type]', subj_order = '$row[subj_order]', category = '$row[category]' where subj_desc = '$cmbsubjdesc' and strand = '$cmbstrand'");
}

}

// Subject Description 2

if(!empty($cmbsubjdesc2) && $ssylsd02 >= 1)
{	

$sql = mysqli_query($cn, "select * from grades where username = '$txtuser' and subj_desc = '$cmbsubjdesc2'");
$user = mysqli_num_rows($sql);
if($user == 0)
{
$sql = mysqli_query($cn, "insert into grades (username, lrn, learners_name, sy, semester, strand, yr_sec, subj_desc, midterm, finals, ave, remarks) values ('$txtuser', '$txtlrn', '$txtlearnersname', '$cmbsy', '$cmbsemester', '$cmbstrand', '$cmbyrsec', '$cmbsubjdesc2', '$txtmidterm2', '$txtfinals2', '$txtave2', '$txtremarks2')");
}
else
{
$sql = mysqli_query($cn, "update grades set sy = '$cmbsy', semester = '$cmbsemester', strand = '$cmbstrand', yr_sec = '$cmbyrsec', subj_desc = '$cmbsubjdesc2', midterm = '$txtmidterm2', finals = '$txtfinals2', ave = '$txtave2', remarks = '$txtremarks2' where username = '$txtuser' and subj_desc = '$cmbsubjdesc2'");
}

// Update Subject Type and Order

$sql = mysqli_query($cn, "select * from subjects where subj_desc = '$cmbsubjdesc2' and strand = '$cmbstrand'");
$subjdesc = mysqli_num_rows($sql);
while($row = mysqli_fetch_assoc($sql))
{
$sql = mysqli_query($cn, "update grades set subj_desc = '$cmbsubjdesc2', subj_type = '$row[subj_type]', subj_order = '$row[subj_order]', category = '$row[category]' where subj_desc = '$cmbsubjdesc2' and strand = '$cmbstrand'");
}

}

// Subject Description 3

if(!empty($cmbsubjdesc3) && $ssylsd03 >= 1)
{	

$sql = mysqli_query($cn, "select * from grades where username = '$txtuser' and subj_desc = '$cmbsubjdesc3'");
$user = mysqli_num_rows($sql);
if($user == 0)
{
$sql = mysqli_query($cn, "insert into grades (username, lrn, learners_name, sy, semester, strand, yr_sec, subj_desc, midterm, finals, ave, remarks) values ('$txtuser', '$txtlrn', '$txtlearnersname', '$cmbsy', '$cmbsemester', '$cmbstrand', '$cmbyrsec', '$cmbsubjdesc3', '$txtmidterm3', '$txtfinals3', '$txtave3', '$txtremarks3')");
}
else
{
$sql = mysqli_query($cn, "update grades set sy = '$cmbsy', semester = '$cmbsemester', strand = '$cmbstrand', yr_sec = '$cmbyrsec', subj_desc = '$cmbsubjdesc3', midterm = '$txtmidterm3', finals = '$txtfinals3', ave = '$txtave3', remarks = '$txtremarks3' where username = '$txtuser' and subj_desc = '$cmbsubjdesc3'");
}

// Update Subject Type and Order

$sql = mysqli_query($cn, "select * from subjects where subj_desc = '$cmbsubjdesc3' and strand = '$cmbstrand' ");
$subjdesc = mysqli_num_rows($sql);
while($row = mysqli_fetch_assoc($sql))
{
$sql = mysqli_query($cn, "update grades set subj_desc = '$cmbsubjdesc3', subj_type = '$row[subj_type]', subj_order = '$row[subj_order]', category = '$row[category]' where subj_desc = '$cmbsubjdesc3' and strand = '$cmbstrand'");
}

}

// Subject Description 4

if(!empty($cmbsubjdesc4) && $ssylsd04 >= 1)
{	

$sql = mysqli_query($cn, "select * from grades where username = '$txtuser' and subj_desc = '$cmbsubjdesc4'");
$user = mysqli_num_rows($sql);
if($user == 0)
{
$sql = mysqli_query($cn, "insert into grades (username, lrn, learners_name, sy, semester, strand, yr_sec, subj_desc, midterm, finals, ave, remarks) values ('$txtuser', '$txtlrn', '$txtlearnersname', '$cmbsy', '$cmbsemester', '$cmbstrand', '$cmbyrsec', '$cmbsubjdesc4', '$txtmidterm4', '$txtfinals4', '$txtave4', '$txtremarks4')");
}
else
{
$sql = mysqli_query($cn, "update grades set sy = '$cmbsy', semester = '$cmbsemester', strand = '$cmbstrand', yr_sec = '$cmbyrsec', subj_desc = '$cmbsubjdesc4', midterm = '$txtmidterm4', finals = '$txtfinals4', ave = '$txtave4', remarks = '$txtremarks4' where username = '$txtuser' and subj_desc = '$cmbsubjdesc4'");
}

// Update Subject Type and Order

$sql = mysqli_query($cn, "select * from subjects where subj_desc = '$cmbsubjdesc4' and strand = '$cmbstrand'");
$subjdesc = mysqli_num_rows($sql);
while($row = mysqli_fetch_assoc($sql))
{
$sql = mysqli_query($cn, "update grades set subj_desc = '$cmbsubjdesc4', subj_type = '$row[subj_type]', subj_order = '$row[subj_order]', category = '$row[category]' where subj_desc = '$cmbsubjdesc4' and strand = '$cmbstrand'");
}

}

// Subject Description 5

if(!empty($cmbsubjdesc5) && $ssylsd05 >= 1)
{	

$sql = mysqli_query($cn, "select * from grades where username = '$txtuser' and subj_desc = '$cmbsubjdesc5'");
$user = mysqli_num_rows($sql);
if($user == 0)
{
$sql = mysqli_query($cn, "insert into grades (username, lrn, learners_name, sy, semester, strand, yr_sec, subj_desc, midterm, finals, ave, remarks) values ('$txtuser', '$txtlrn', '$txtlearnersname', '$cmbsy', '$cmbsemester', '$cmbstrand', '$cmbyrsec', '$cmbsubjdesc5', '$txtmidterm5', '$txtfinals5', '$txtave5', '$txtremarks5')");
}
else
{
$sql = mysqli_query($cn, "update grades set sy = '$cmbsy', semester = '$cmbsemester', strand = '$cmbstrand', yr_sec = '$cmbyrsec', subj_desc = '$cmbsubjdesc5', midterm = '$txtmidterm5', finals = '$txtfinals5', ave = '$txtave5', remarks = '$txtremarks5' where username = '$txtuser' and subj_desc = '$cmbsubjdesc5'");
}

// Update Subject Type and Order

$sql = mysqli_query($cn, "select * from subjects where subj_desc = '$cmbsubjdesc5' and strand = '$cmbstrand'");
$subjdesc = mysqli_num_rows($sql);
while($row = mysqli_fetch_assoc($sql))
{
$sql = mysqli_query($cn, "update grades set subj_desc = '$cmbsubjdesc5', subj_type = '$row[subj_type]', subj_order = '$row[subj_order]', category = '$row[category]' where subj_desc = '$cmbsubjdesc5' and strand = '$cmbstrand'");
}

}

// Subject Description 6

if(!empty($cmbsubjdesc6) && $ssylsd06 >= 1)
{	

$sql = mysqli_query($cn, "select * from grades where username = '$txtuser' and subj_desc = '$cmbsubjdesc6'");
$user = mysqli_num_rows($sql);
if($user == 0)
{
$sql = mysqli_query($cn, "insert into grades (username, lrn, learners_name, sy, semester, strand, yr_sec, subj_desc, midterm, finals, ave, remarks) values ('$txtuser', '$txtlrn', '$txtlearnersname', '$cmbsy', '$cmbsemester', '$cmbstrand', '$cmbyrsec', '$cmbsubjdesc6', '$txtmidterm6', '$txtfinals6', '$txtave6', '$txtremarks6')");
}
else
{
$sql = mysqli_query($cn, "update grades set sy = '$cmbsy', semester = '$cmbsemester', strand = '$cmbstrand', yr_sec = '$cmbyrsec', subj_desc = '$cmbsubjdesc6', midterm = '$txtmidterm6', finals = '$txtfinals6', ave = '$txtave6', remarks = '$txtremarks6' where username = '$txtuser' and subj_desc = '$cmbsubjdesc6'");
}

// Update Subject Type and Order

$sql = mysqli_query($cn, "select * from subjects where subj_desc = '$cmbsubjdesc6' and strand = '$cmbstrand'");
$subjdesc = mysqli_num_rows($sql);
while($row = mysqli_fetch_assoc($sql))
{
$sql = mysqli_query($cn, "update grades set subj_desc = '$cmbsubjdesc6', subj_type = '$row[subj_type]', subj_order = '$row[subj_order]', category = '$row[category]' where subj_desc = '$cmbsubjdesc6' and strand = '$cmbstrand'");
}

}

// Subject Description 7

if(!empty($cmbsubjdesc7) && $ssylsd07 >= 1)
{	

$sql = mysqli_query($cn, "select * from grades where username = '$txtuser' and subj_desc = '$cmbsubjdesc7'");
$user = mysqli_num_rows($sql);
if($user == 0)
{
$sql = mysqli_query($cn, "insert into grades (username, lrn, learners_name, sy, semester, strand, yr_sec, subj_desc, midterm, finals, ave, remarks) values ('$txtuser', '$txtlrn', '$txtlearnersname', '$cmbsy', '$cmbsemester', '$cmbstrand', '$cmbyrsec', '$cmbsubjdesc7', '$txtmidterm7', '$txtfinals7', '$txtave7', '$txtremarks7')");
}
else
{
$sql = mysqli_query($cn, "update grades set sy = '$cmbsy', semester = '$cmbsemester', strand = '$cmbstrand', yr_sec = '$cmbyrsec', subj_desc = '$cmbsubjdesc7', midterm = '$txtmidterm7', finals = '$txtfinals7', ave = '$txtave7', remarks = '$txtremarks7' where username = '$txtuser' and subj_desc = '$cmbsubjdesc7'");
}

// Update Subject Type and Order

$sql = mysqli_query($cn, "select * from subjects where subj_desc = '$cmbsubjdesc7' and strand = '$cmbstrand'");
$subjdesc = mysqli_num_rows($sql);
while($row = mysqli_fetch_assoc($sql))
{
$sql = mysqli_query($cn, "update grades set subj_desc = '$cmbsubjdesc7', subj_type = '$row[subj_type]', subj_order = '$row[subj_order]', category = '$row[category]' where subj_desc = '$cmbsubjdesc7' and strand = '$cmbstrand'");
}

}	

// Subject Description 8

if(!empty($cmbsubjdesc8) && $ssylsd08 >= 1)
{

$sql = mysqli_query($cn, "select * from grades where username = '$txtuser' and subj_desc = '$cmbsubjdesc8'");
$user = mysqli_num_rows($sql);
if($user == 0)
{
$sql = mysqli_query($cn, "insert into grades (username, lrn, learners_name, sy, semester, strand, yr_sec, subj_desc, midterm, finals, ave, remarks) values ('$txtuser', '$txtlrn', '$txtlearnersname', '$cmbsy', '$cmbsemester', '$cmbstrand', '$cmbyrsec', '$cmbsubjdesc8', '$txtmidterm8', '$txtfinals8', '$txtave8', '$txtremarks8')");
}
else
{
$sql = mysqli_query($cn, "update grades set sy = '$cmbsy', semester = '$cmbsemester', strand = '$cmbstrand', yr_sec = '$cmbyrsec', subj_desc = '$cmbsubjdesc8', midterm = '$txtmidterm8', finals = '$txtfinals8', ave = '$txtave8', remarks = '$txtremarks8' where username = '$txtuser' and subj_desc = '$cmbsubjdesc8'");
}

// Update Subject Type and Order

$sql = mysqli_query($cn, "select * from subjects where subj_desc = '$cmbsubjdesc8' and strand = '$cmbstrand'");
$subjdesc = mysqli_num_rows($sql);
while($row = mysqli_fetch_assoc($sql))
{
$sql = mysqli_query($cn, "update grades set subj_desc = '$cmbsubjdesc8', subj_type = '$row[subj_type]', subj_order = '$row[subj_order]', category = '$row[category]' where subj_desc = '$cmbsubjdesc8' and strand = '$cmbstrand'");
}

}

// Subject Description 9

if(!empty($cmbsubjdesc9) && $ssylsd09 >= 1)
{	

$sql = mysqli_query($cn, "select * from grades where username = '$txtuser' and subj_desc = '$cmbsubjdesc9'");
$user = mysqli_num_rows($sql);
if($user == 0)
{
$sql = mysqli_query($cn, "insert into grades (username, lrn, learners_name, sy, semester, strand, yr_sec, subj_desc, midterm, finals, ave, remarks) values ('$txtuser', '$txtlrn', '$txtlearnersname', '$cmbsy', '$cmbsemester', '$cmbstrand', '$cmbyrsec', '$cmbsubjdesc9', '$txtmidterm9', '$txtfinals9', '$txtave9', '$txtremarks9')");
}
else
{
$sql = mysqli_query($cn, "update grades set sy = '$cmbsy', semester = '$cmbsemester', strand = '$cmbstrand', yr_sec = '$cmbyrsec', subj_desc = '$cmbsubjdesc9', midterm = '$txtmidterm9', finals = '$txtfinals9', ave = '$txtave9', remarks = '$txtremarks9' where username = '$txtuser' and subj_desc = '$cmbsubjdesc9'");
}

// Update Subject Type and Order

$sql = mysqli_query($cn, "select * from subjects where subj_desc = '$cmbsubjdesc9' and strand = '$cmbstrand'");
$subjdesc = mysqli_num_rows($sql);
while($row = mysqli_fetch_assoc($sql))
{
$sql = mysqli_query($cn, "update grades set subj_desc = '$cmbsubjdesc9', subj_type = '$row[subj_type]', subj_order = '$row[subj_order]', category = '$row[category]' where subj_desc = '$cmbsubjdesc9' and strand = '$cmbstrand'");
}

}

// Subject Description 10

if(!empty($cmbsubjdesc10) && $ssylsd10 >= 1)
{	

$sql = mysqli_query($cn, "select * from grades where username = '$txtuser' and subj_desc = '$cmbsubjdesc10'");
$user = mysqli_num_rows($sql);
if($user == 0)
{
$sql = mysqli_query($cn, "insert into grades (username, lrn, learners_name, sy, semester, strand, yr_sec, subj_desc, midterm, finals, ave, remarks) values ('$txtuser', '$txtlrn', '$txtlearnersname', '$cmbsy', '$cmbsemester', '$cmbstrand', '$cmbyrsec', '$cmbsubjdesc10', '$txtmidterm10', '$txtfinals10', '$txtave10', '$txtremarks10')");
}
else
{
$sql = mysqli_query($cn, "update grades set sy = '$cmbsy', semester = '$cmbsemester', strand = '$cmbstrand', yr_sec = '$cmbyrsec', subj_desc = '$cmbsubjdesc10', midterm = '$txtmidterm10', finals = '$txtfinals10', ave = '$txtave10', remarks = '$txtremarks10' where username = '$txtuser' and subj_desc = '$cmbsubjdesc10'");
}

// Update Subject Type and Order

$sql = mysqli_query($cn, "select * from subjects where subj_desc = '$cmbsubjdesc10' and strand = '$cmbstrand'");
$subjdesc = mysqli_num_rows($sql);
while($row = mysqli_fetch_assoc($sql))
{
$sql = mysqli_query($cn, "update grades set subj_desc = '$cmbsubjdesc10', subj_type = '$row[subj_type]', subj_order = '$row[subj_order]', category = '$row[category]' where subj_desc = '$cmbsubjdesc10' and strand = '$cmbstrand'");
}

}

echo"<script>
alert('Record Saved')
history.go(-1)
document.getElementById('cmbyear').value = document.getElementById('cmbyrsec').value
</script>";

}

else
{
echo"<script>alert('Failed')</script>";
echo"<script>history.go(-1)</script>";
}

}

// Delete

if(isset($_POST['delete01']))
{
$txtuser = $_POST['txtuser'];
$cmbsubjdesc = $_POST['cmbsubjdesc'];
if(!empty($txtuser)
&& !empty($cmbsubjdesc))
{
$sql = mysqli_query($cn, "delete from grades where username = '$txtuser' and subj_desc = '$cmbsubjdesc'");
echo "<script>alert('Record Deleted')</script>";
echo "<script>history.go(-1)</script>";
}
else
{
echo"<script>history.go(-1)</script>";
}
}

if(isset($_POST['delete02']))
{
$txtuser = $_POST['txtuser'];
$cmbsubjdesc2 = $_POST['cmbsubjdesc2'];
if(!empty($txtuser)
&& !empty($cmbsubjdesc2))
{
$sql = mysqli_query($cn, "delete from grades where username = '$txtuser' and subj_desc = '$cmbsubjdesc2'");
echo "<script>alert('Record Deleted')</script>";
echo "<script>history.go(-1)</script>";
}
else
{
echo"<script>history.go(-1)</script>";
}
}

if(isset($_POST['delete03']))
{
$txtuser = $_POST['txtuser'];
$cmbsubjdesc3 = $_POST['cmbsubjdesc3'];
if(!empty($txtuser)
&& !empty($cmbsubjdesc3))
{
$sql = mysqli_query($cn, "delete from grades where username = '$txtuser' and subj_desc = '$cmbsubjdesc3'");
echo "<script>alert('Record Deleted')</script>";
echo "<script>history.go(-1)</script>";
}
else
{
echo"<script>history.go(-1)</script>";
}
}

if(isset($_POST['delete04']))
{
$txtuser = $_POST['txtuser'];
$cmbsubjdesc4 = $_POST['cmbsubjdesc4'];
if(!empty($txtuser)
&& !empty($cmbsubjdesc4))
{
$sql = mysqli_query($cn, "delete from grades where username = '$txtuser' and subj_desc = '$cmbsubjdesc4'");
echo "<script>alert('Record Deleted')</script>";
echo "<script>history.go(-1)</script>";
}
else
{
echo"<script>history.go(-1)</script>";
}
}

if(isset($_POST['delete05']))
{
$txtuser = $_POST['txtuser'];
$cmbsubjdesc5 = $_POST['cmbsubjdesc5'];
if(!empty($txtuser)
&& !empty($cmbsubjdesc5))
{
$sql = mysqli_query($cn, "delete from grades where username = '$txtuser' and subj_desc = '$cmbsubjdesc5'");
echo "<script>alert('Record Deleted')</script>";
echo "<script>history.go(-1)</script>";
}
else
{
echo"<script>history.go(-1)</script>";
}
}

if(isset($_POST['delete06']))
{
$txtuser = $_POST['txtuser'];
$cmbsubjdesc6 = $_POST['cmbsubjdesc6'];
if(!empty($txtuser)
&& !empty($cmbsubjdesc6))
{
$sql = mysqli_query($cn, "delete from grades where username = '$txtuser' and subj_desc = '$cmbsubjdesc6'");
echo "<script>alert('Record Deleted')</script>";
echo "<script>history.go(-1)</script>";
}
else
{
echo"<script>history.go(-1)</script>";
}
}

if(isset($_POST['delete07']))
{
$txtuser = $_POST['txtuser'];
$cmbsubjdesc7 = $_POST['cmbsubjdesc7'];
if(!empty($txtuser)
&& !empty($cmbsubjdesc7))
{
$sql = mysqli_query($cn, "delete from grades where username = '$txtuser' and subj_desc = '$cmbsubjdesc7'");
echo "<script>alert('Record Deleted')</script>";
echo "<script>history.go(-1)</script>";
}
else
{
echo"<script>history.go(-1)</script>";
}
}

if(isset($_POST['delete08']))
{
$txtuser = $_POST['txtuser'];
$cmbsubjdesc8 = $_POST['cmbsubjdesc8'];
if(!empty($txtuser)
&& !empty($cmbsubjdesc8))
{
$sql = mysqli_query($cn, "delete from grades where username = '$txtuser' and subj_desc = '$cmbsubjdesc8'");
echo "<script>alert('Record Deleted')</script>";
echo "<script>history.go(-1)</script>";
}
else
{
echo"<script>history.go(-1)</script>";
}
}

if(isset($_POST['delete09']))
{
$txtuser = $_POST['txtuser'];
$cmbsubjdesc9 = $_POST['cmbsubjdesc9'];
if(!empty($txtuser)
&& !empty($cmbsubjdesc9))
{
$sql = mysqli_query($cn, "delete from grades where username = '$txtuser' and subj_desc = '$cmbsubjdesc9'");
echo "<script>alert('Record Deleted')</script>";
echo "<script>history.go(-1)</script>";
}
else
{
echo"<script>history.go(-1)</script>";
}
}

if(isset($_POST['delete10']))
{
$txtuser = $_POST['txtuser'];
$cmbsubjdesc10 = $_POST['cmbsubjdesc10'];
if(!empty($txtuser)
&& !empty($cmbsubjdesc10))
{
$sql = mysqli_query($cn, "delete from grades where username = '$txtuser' and subj_desc = '$cmbsubjdesc10'");
echo "<script>alert('Record Deleted')</script>";
echo "<script>history.go(-1)</script>";
}
else
{
echo"<script>history.go(-1)</script>";
}
}

// Print

if(isset($_POST['prtfront']))
{	
$cmbsearch = $_POST['cmbsearch'];
$sql = mysqli_query($cn, "select * from enrolled_students where username = '$cmbsearch' or lrn = '$cmbsearch' or learners_name = '$cmbsearch'");
$search = mysqli_num_rows($sql);
if($search == 1)
{
while($row = mysqli_fetch_assoc($sql))
{	
echo"<input type = 'hidden' name = 'txtusername' id = 'txtprintgrades' style = 'position: absolute; top: 900; left: 50;' value = '$row[username]'>";
}
}
}

if(isset($_POST['activate']))
{
	
$txtuser = $_POST['txtuser'];

// Activate

if(!empty($txtuser))
{	
$sql = mysqli_query($cn, "update account_registration set status = 'Active' where username = '$txtuser'");

echo "<script>alert('Account Activated')</script>";
echo "<script>history.go(-1)</script>";
}

}

// Deactivate

if(isset($_POST['deactivate']))
{

$txtuser = $_POST['txtuser'];

if(!empty($txtuser))
{
$sql = mysqli_query($cn, "update account_registration set status = 'Deactivated' where username = '$txtuser'");
}

echo "<script>alert('Account Deactivated')</script>";
echo "<script>history.go(-1)</script>";

}

?>

<script>

// Logout

function logout()
{
localStorage.removeItem('objectToPass');
window.location.href = 'gmc login.html';
}

// School Year

function clrsy()
{
document.getElementById('cmbsy').value = ''
}

// Semester

function clrsem()
{
document.getElementById('cmbsemester').value = ''
}

//Strand

function clrstrand()
{
document.getElementById('cmbstrand').value = ''
}

// Year and Section

function clryrsec()
{
document.getElementById('cmbyrsec').value = ''
}

// Subject Description

function clrsubjdesc()
{
document.getElementById('cmbsubjdesc').disabled = true
document.getElementById('txtmidterm').disabled = true
document.getElementById('txtfinals').disabled = true
document.getElementById('txtave').disabled = true
document.getElementById('txtremarks').disabled = true
document.getElementById('btndelete').disabled = true
}
function clrsubjdesc2()
{
document.getElementById('cmbsubjdesc2').disabled = true
document.getElementById('txtmidterm2').disabled = true
document.getElementById('txtfinals2').disabled = true
document.getElementById('txtave2').disabled = true
document.getElementById('txtremarks2').disabled = true
document.getElementById('btndelete02').disabled = true
}
function clrsubjdesc3()
{
document.getElementById('cmbsubjdesc3').disabled = true
document.getElementById('txtmidterm3').disabled = true
document.getElementById('txtfinals3').disabled = true
document.getElementById('txtave3').disabled = true
document.getElementById('txtremarks3').disabled = true
document.getElementById('btndelete03').disabled = true
}
function clrsubjdesc4()
{
document.getElementById('cmbsubjdesc4').disabled = true
document.getElementById('txtmidterm4').disabled = true
document.getElementById('txtfinals4').disabled = true
document.getElementById('txtave4').disabled = true
document.getElementById('txtremarks4').disabled = true
document.getElementById('btndelete04').disabled = true
}
function clrsubjdesc5()
{
document.getElementById('cmbsubjdesc5').disabled = true
document.getElementById('txtmidterm5').disabled = true
document.getElementById('txtfinals5').disabled = true
document.getElementById('txtave5').disabled = true
document.getElementById('txtremarks5').disabled = true
document.getElementById('btndelete05').disabled = true
}
function clrsubjdesc6()
{
document.getElementById('cmbsubjdesc6').disabled = true
document.getElementById('txtmidterm6').disabled = true
document.getElementById('txtfinals6').disabled = true
document.getElementById('txtave6').disabled = true
document.getElementById('txtremarks6').disabled = true
document.getElementById('btndelete06').disabled = true
}
function clrsubjdesc7()
{
document.getElementById('cmbsubjdesc7').disabled = true
document.getElementById('txtmidterm7').disabled = true
document.getElementById('txtfinals7').disabled = true
document.getElementById('txtave7').disabled = true
document.getElementById('txtremarks7').disabled = true
document.getElementById('btndelete07').disabled = true
}
function clrsubjdesc8()
{
document.getElementById('cmbsubjdesc8').disabled = true
document.getElementById('txtmidterm8').disabled = true
document.getElementById('txtfinals8').disabled = true
document.getElementById('txtave8').disabled = true
document.getElementById('txtremarks8').disabled = true
document.getElementById('btndelete08').disabled = true
}
function clrsubjdesc9()
{
document.getElementById('cmbsubjdesc9').disabled = true
document.getElementById('txtmidterm9').disabled = true
document.getElementById('txtfinals9').disabled = true
document.getElementById('txtave9').disabled = true
document.getElementById('txtremarks9').disabled = true
document.getElementById('btndelete09').disabled = true
}
function clrsubjdesc10()
{
document.getElementById('cmbsubjdesc10').disabled = true
document.getElementById('txtmidterm10').disabled = true
document.getElementById('txtfinals10').disabled = true
document.getElementById('txtave10').disabled = true
document.getElementById('txtremarks10').disabled = true
document.getElementById('btndelete10').disabled = true
}

// Calculate

function calc()
{

// Average

if(document.getElementById('txtmidterm').value != '' 
&& document.getElementById('txtfinals').value != '')
{
var ave1 = (parseFloat(document.getElementById('txtmidterm').value) + parseFloat(document.getElementById('txtfinals').value)) / 2
document.getElementById('txtave').value = Math.round(ave1)
}
else
{
document.getElementById('txtave').value = ''
}

if(document.getElementById('txtmidterm2').value != '' 
&& document.getElementById('txtfinals2').value != '')
{
var ave2 = (parseFloat(document.getElementById('txtmidterm2').value) + parseFloat(document.getElementById('txtfinals2').value)) / 2
document.getElementById('txtave2').value = Math.round(ave2)
}
else
{
document.getElementById('txtave2').value = ''
}

if(document.getElementById('txtmidterm3').value != '' 
&& document.getElementById('txtfinals3').value != '')
{
var ave3 = (parseFloat(document.getElementById('txtmidterm3').value) + parseFloat(document.getElementById('txtfinals3').value)) / 2
document.getElementById('txtave3').value = Math.round(ave3)
}
else
{
document.getElementById('txtave3').value = ''
}

if(document.getElementById('txtmidterm4').value != '' 
&& document.getElementById('txtfinals4').value != '')
{
var ave4 = (parseFloat(document.getElementById('txtmidterm4').value) + parseFloat(document.getElementById('txtfinals4').value)) / 2
document.getElementById('txtave4').value = Math.round(ave4)
}
else
{
document.getElementById('txtave4').value = ''
}

if(document.getElementById('txtmidterm5').value != '' 
&& document.getElementById('txtfinals5').value != '')
{
var ave5 = (parseFloat(document.getElementById('txtmidterm5').value) + parseFloat(document.getElementById('txtfinals5').value)) / 2
document.getElementById('txtave5').value = Math.round(ave5)
}
else
{
document.getElementById('txtave5').value = ''
}

if(document.getElementById('txtmidterm6').value != '' 
&& document.getElementById('txtfinals6').value != '')
{
var ave6 = (parseFloat(document.getElementById('txtmidterm6').value) + parseFloat(document.getElementById('txtfinals6').value)) / 2
document.getElementById('txtave6').value = Math.round(ave6)
}
else
{
document.getElementById('txtave6').value = ''
}

if(document.getElementById('txtmidterm7').value != '' 
&& document.getElementById('txtfinals7').value != '')
{
var ave7 = (parseFloat(document.getElementById('txtmidterm7').value) + parseFloat(document.getElementById('txtfinals7').value)) / 2
document.getElementById('txtave7').value = Math.round(ave7)
}
else
{
document.getElementById('txtave7').value = ''
}

if(document.getElementById('txtmidterm8').value != '' 
&& document.getElementById('txtfinals8').value != '')
{
var ave8 = (parseFloat(document.getElementById('txtmidterm8').value) + parseFloat(document.getElementById('txtfinals8').value)) / 2
document.getElementById('txtave8').value = Math.round(ave8)
}
else
{
document.getElementById('txtave8').value = ''
}

if(document.getElementById('txtmidterm9').value != '' 
&& document.getElementById('txtfinals9').value != '')
{
var ave9 = (parseFloat(document.getElementById('txtmidterm9').value) + parseFloat(document.getElementById('txtfinals9').value)) / 2
document.getElementById('txtave9').value = Math.round(ave9)
}
else
{
document.getElementById('txtave9').value = ''
}

if(document.getElementById('txtmidterm10').value != '' 
&& document.getElementById('txtfinals10').value != '')
{
var ave10 = (parseFloat(document.getElementById('txtmidterm10').value) + parseFloat(document.getElementById('txtfinals10').value)) / 2
document.getElementById('txtave10').value = Math.round(ave10)
}
else
{
document.getElementById('txtave10').value = ''
}

// Remarks

if(document.getElementById('txtave').value != '')
{
if(document.getElementById('txtave').value >= 74.5)
{
document.getElementById('txtremarks').value = 'PASSED'
}
else
{
document.getElementById('txtremarks').value = 'FAILED'
}
}
else
{
document.getElementById('txtremarks').value = ''
}

if(document.getElementById('txtave2').value != '')
{
if(document.getElementById('txtave2').value >= 74.5)
{
document.getElementById('txtremarks2').value = 'PASSED'
}
else
{
document.getElementById('txtremarks2').value = 'FAILED'
}
}
else
{
document.getElementById('txtremarks2').value = ''
}

if(document.getElementById('txtave3').value != '')
{
if(document.getElementById('txtave3').value >= 74.5)
{
document.getElementById('txtremarks3').value = 'PASSED'
}
else
{
document.getElementById('txtremarks3').value = 'FAILED'
}
}
else
{
document.getElementById('txtremarks3').value = ''
}

if(document.getElementById('txtave4').value != '')
{
if(document.getElementById('txtave4').value >= 74.5)
{
document.getElementById('txtremarks4').value = 'PASSED'
}
else
{
document.getElementById('txtremarks4').value = 'FAILED'
}
}
else
{
document.getElementById('txtremarks4').value = ''
}

if(document.getElementById('txtave5').value != '')
{
if(document.getElementById('txtave5').value >= 74.5)
{
document.getElementById('txtremarks5').value = 'PASSED'
}
else
{
document.getElementById('txtremarks5').value = 'FAILED'
}
}
else
{
document.getElementById('txtremarks5').value = ''
}

if(document.getElementById('txtave6').value != '')
{
if(document.getElementById('txtave6').value >= 74.5)
{
document.getElementById('txtremarks6').value = 'PASSED'
}
else
{
document.getElementById('txtremarks6').value = 'FAILED'
}
}
else
{
document.getElementById('txtremarks6').value = ''
}

if(document.getElementById('txtave7').value != '')
{
if(document.getElementById('txtave7').value >= 74.5)
{
document.getElementById('txtremarks7').value = 'PASSED'
}
else
{
document.getElementById('txtremarks7').value = 'FAILED'
}
}
else
{
document.getElementById('txtremarks7').value = ''
}

if(document.getElementById('txtave8').value != '')
{
if(document.getElementById('txtave8').value >= 74.5)
{
document.getElementById('txtremarks8').value = 'PASSED'
}
else
{
document.getElementById('txtremarks8').value = 'FAILED'
}
}
else
{
document.getElementById('txtremarks8').value = ''
}

if(document.getElementById('txtave9').value != '')
{
if(document.getElementById('txtave9').value >= 74.5)
{
document.getElementById('txtremarks9').value = 'PASSED'
}
else
{
document.getElementById('txtremarks9').value = 'FAILED'
}
}
else
{
document.getElementById('txtremarks9').value = ''
}

if(document.getElementById('txtave10').value != '')
{
if(document.getElementById('txtave10').value >= 74.5)
{
document.getElementById('txtremarks10').value = 'PASSED'
}
else
{
document.getElementById('txtremarks10').value = 'FAILED'
}
}
else
{
document.getElementById('txtremarks10').value = ''
}

}

</script>