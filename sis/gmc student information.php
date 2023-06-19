<html>
<head>
<title>Student Information</title>
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
//User
if(isset($_POST['search']))
{

$cmbsearch = $_POST['cmbsearch'];

$sql = mysqli_query($cn, "select * from student_information where student_no = '$cmbsearch' or username = '$cmbsearch'");
$search = mysqli_num_rows($sql);

while($row = mysqli_fetch_assoc($sql))
{
$studno = $row['student_no'];
$semester = $row['semester'];
$strand = $row['strand'];
}
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

<table border = 2 style = "border-color: 28110d; height: 2100; width: 1000; border-left: 3px solid black; border-right: 3px solid black; border-bottom: 4px solid black; position: relative; top: 0;">

<form action = 'gmc student information.php' method = 'post'>

<tr style = 'height: 520;'>
<th style = 'border-color: transparent; text-align: center; font-size: 30;'>

<input type = 'hidden' name = "txtstudno" id = 'txtstudno'>
<input type = 'hidden' name = "txtuser" id = 'txtuser'>

Date of Admission:

<br>

<input type = 'date' name = "dtreg" id = 'dtreg' style = 'background-color: transparent; border-color: 28110d; border-radius: 5px; width: 400; font-size: 30;' onclick = 'age()' onchange = 'age()' required>

<br><br>

<input type = 'search' list = 'sy' name = 'cmbsy' id = 'cmbsy' style = 'background-color: transparent; border-color: 28110d; border-radius: 5px; width: 445; font-size: 30; text-align: center;' placeholder = 'School Year' required>

<input type = 'search' list = 'semester' name = 'cmbsemester' id = 'cmbsemester' style = 'background-color: transparent; border-color: 28110d; border-radius: 5px; width: 445; font-size: 30; text-align: center;' placeholder = 'Semester' required>

<br><br>

<input type = 'search' list = 'strand' name = "cmbstrand" id = 'cmbstrand' style = 'background-color: transparent; border-color: 28110d; border-radius: 5px; width: 900; font-size: 30; text-align: center;' placeholder = 'Track / Strand' required>

<br><br>

<input type = 'search' list = 'school' name = "txtschool" id = 'txtschool' style = 'background-color: transparent; border-color: 28110d; border-radius: 5px; width: 900; font-size: 30; text-align: center;' placeholder = 'School' required onclick = 'school()' onkeyup = 'school()'>
<datalist id = 'school'>
<option value = 'Golden Minds Colleges of Balagtas, Bulacan, Inc.'></option>
<option value = 'Golden Minds Colleges of Sta. Maria, Bulacan, Inc.'></option>
</datalist>

<br><br>

<input type = 'search' list = 'schoolid' name = "txtschoolid" id = 'txtschoolid' style = 'background-color: transparent; border-color: 28110d; border-radius: 5px; width: 900; font-size: 30; text-align: center;' placeholder = 'School ID' required readonly>
<datalist id = 'schoolid'>
<option value = '404420'></option>
<option value = '404468'></option>
</datalist>

<br><br>

<input type = 'text' name = "txtlrn" id = 'txtlrn' style = 'background-color: transparent; border-color: 28110d; border-radius: 5px; width: 900; font-size: 30; text-align: center;' placeholder = 'LRN' required>

<input type = 'hidden' name = 'cmblrn' id = 'cmblrn'>

<br><br>

Learners Name:

<br>

<input type = 'text' name = "txtlastname" id = 'txtlastname' style = 'background-color: transparent; border-color: 28110d; border-radius: 5px; width: 250; font-size: 30;' placeholder = 'Last Name' required>

<input type = 'text' name = "txtextensionname" id = 'txtextensionname' style = 'background-color: transparent; border-color: 28110d; border-radius: 5px; width: 130; font-size: 30;' placeholder = 'Ext.'>

<input type = 'text' name = "txtfirstname" id = 'txtfirstname' style = 'background-color: transparent; border-color: 28110d; border-radius: 5px; width: 250; font-size: 30;' placeholder = 'First Name' required>

<input type = 'text' name = "txtmiddlename" id = 'txtmiddlename' style = 'background-color: transparent; border-color: 28110d; border-radius: 5px; width: 250; font-size: 30;' placeholder = 'Middle Name'>

<input type = 'hidden' name = 'cmblearnersname' id = 'cmblearnersname'>

</th>
</tr>

<tr style = 'height: 50;'>
<th style = 'border-color: transparent; text-align: center; font-weight: bold; font-size: 30;'>

Gender:

<input type = 'radio' name = "rbmale" id = 'rbmale' style = 'width: 30; height: 30;' onclick = 'male()'>
M

<input type = 'radio' name = "rbfemale" id = 'rbfemale' style = 'width: 30; height: 30;' onclick = 'female()'>
F

<input type = 'hidden' name = "txtgender" id = 'txtgender' style = 'border-color: 28110d; border-radius: 5px; width: 100; font-size: 20; text-align: center;'>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

Birthday:
<input type = 'date' name = "dtbday" id = 'dtbday' style = 'background-color: transparent; border-color: 28110d; border-radius: 5px; width: 250; font-size: 30; text-align: right;' onclick = 'age()' onchange = 'age()' required>

Age:

<input type = "text" name = "txtage" id = "txtage" style = "background-color: transparent; border-color: 28110d; border-radius: 5px; width: 70; font-size: 30; text-align: center;" readonly>

</th>
</tr>

<tr style = 'height: 1750;'>
<th style = 'border-color: transparent; text-align: center; font-weight: bold; font-size: 30;'>

<input type = 'text' name = "txtnationality" id = 'txtnationality' style = 'background-color: transparent; border-color: 28110d; border-radius: 5px; width: 900; font-size: 30; text-align: center;' placeholder = 'Nationality'>

<br><br>

<input type = 'text' name = "txtbirthplace" id = 'txtbirthplace' style = 'background-color: transparent; border-color: 28110d; border-radius: 5px; width: 900; font-size: 30; text-align: center;' placeholder = 'Place of Birth'>

<br><br>

<input type = 'text' name = "txtreligion" id = 'txtreligion' style = 'background-color: transparent; border-color: 28110d; border-radius: 5px; width: 900; font-size: 30; text-align: center;' placeholder = 'Religion'>

<br><br>

Last School Completion Date:

<br>

<input type = 'date' name = "dtcompletion" id = 'dtcompletion' style = 'background-color: transparent; border-color: 28110d; border-radius: 5px; width: 400; font-size: 30;'>

<br><br>

<input list = 'completerAs' name = 'cmbcompleterAs' id = 'cmbcompleterAs' style = 'background-color: transparent; border-color: 28110d; border-radius: 5px; width: 900; font-size: 30; text-align: center;' onclick = 'clrcompleterAs()' placeholder = 'Completer As'>

<datalist id = 'completerAs'>
<option value = 'High School Completer'></option>
<option value = 'Junior High School Completer'></option>
<option value = 'PEPT Passer'></option>
<option value = 'ALS A&E Passer'></option>
<option value = 'Others'></option>
</datalist>

<br><br>

<input type = 'text' name = "txtschoolname" id = 'txtschoolname' style = 'background-color: transparent; border-color: 28110d; border-radius: 5px; width: 900; font-size: 30; text-align: center;' placeholder = 'School Name'>

<br><br>

<input type = 'text' name = "txtschooladdress" id = 'txtschooladdress' style = 'background-color: transparent; border-color: 28110d; border-radius: 5px; width: 900; font-size: 30; text-align: center;' placeholder = 'School Address'>

<br><br>

<input type = 'number' name = "txtgenave" id = 'txtgenave' style = 'background-color: transparent; border-color: 28110d; border-radius: 5px; width: 900; font-size: 30; text-align: center;' placeholder = 'Gen. Average'>

<br><br>

<input type = 'text' name = "txthouseno" id = 'txthouseno' style = 'background-color: transparent; border-color: 28110d; border-radius: 5px; width: 900; font-size: 30; text-align: center;' placeholder = 'House No./Street Name'>

<br><br>

<input type = 'text' name = "txtbrgy" id = 'txtbrgy' style = 'background-color: transparent; border-color: 28110d; border-radius: 5px; width: 900; font-size: 30; text-align: center;' placeholder = 'Brgy.'>

<br><br>

<input type = 'text' name = "txtcity" id = 'txtcity' style = 'background-color: transparent; border-color: 28110d; border-radius: 5px; width: 900; font-size: 30; text-align: center;' placeholder = 'City/Municipality'>

<br><br>

<input type = 'text' name = "txtprovince" id = 'txtprovince' style = 'background-color: transparent; border-color: 28110d; border-radius: 5px; width: 900; font-size: 30; text-align: center;' placeholder = 'Province'>

<br><br>

<input type = 'text' name = "txtcontactno" id = 'txtcontactno' style = 'background-color: transparent; border-color: 28110d; border-radius: 5px; width: 900; font-size: 30; text-align: center;' placeholder = 'Contact No.'>

<br><br>

<input type = 'text' name = "txtfather" id = 'txtfather' style = 'background-color: transparent; border-color: 28110d; border-radius: 5px; width: 900; font-size: 30; text-align: center;' placeholder = "Father's Name (L.N., F.N. M.N.)">

<br><br>

<input type = 'text' name = "txtfoccupation" id = 'txtfoccupation' style = 'background-color: transparent; border-color: 28110d; border-radius: 5px; width: 900; font-size: 30; text-align: center;' placeholder = 'Occupation'>

<br><br>

<input type = 'text' name = "txtmother" id = 'txtmother' style = 'background-color: transparent; border-color: 28110d; border-radius: 5px; width: 900; font-size: 30; text-align: center;' placeholder = "Mother's Name (L.N., F.N. M.N.)">

<br><br>

<input type = 'text' name = "txtmoccupation" id = 'txtmoccupation' style = 'background-color: transparent; border-color: 28110d; border-radius: 5px; width: 900; font-size: 30; text-align: center;' placeholder = 'Occupation'>

<br><br>

<input type = 'text' name = "txtguardian" id = 'txtguardian' style = 'background-color: transparent; border-color: 28110d; border-radius: 5px; width: 900; font-size: 30; text-align: center;' placeholder = 'Guardian Name (L.N., F.N. M.N.)'>

<br><br>

<input type = 'text' name = "txtrelationship" id = 'txtrelationship' style = 'background-color: transparent; border-color: 28110d; border-radius: 5px; width: 900; font-size: 30; text-align: center;' placeholder = 'Relationship'>

<br><br>

<input type = 'text' name = "txtgcontactno" id = 'txtgcontactno' style = 'background-color: transparent; border-color: 28110d; border-radius: 5px; width: 900; font-size: 30; text-align: center;' placeholder = 'Guardian Contact No.'>

<br><br>

<input type = 'text' name = "txtgoccupation" id = 'txtgoccupation' style = 'background-color: transparent; border-color: 28110d; border-radius: 5px; width: 900; font-size: 30; text-align: center;' placeholder = 'Occupation'>

<br><br>

<input type = 'text' name = "txtguardianaddress" id = 'txtguardianaddress' style = 'background-color: transparent; border-color: 28110d; border-radius: 5px; width: 900; font-size: 30; text-align: center;' placeholder = 'Guardian Address'>

<br><br>

<input type = 'text' name = "txtrname" id = 'txtrname' style = 'background-color: transparent; border-color: 28110d; border-radius: 5px; width: 900; font-size: 30; text-align: center;' placeholder = 'Referral Name'>

<br><br>

<input type = 'text' name = "txtrnum" id = 'txtrnum' style = 'background-color: transparent; border-color: 28110d; border-radius: 5px; width: 900; font-size: 30; text-align: center;' placeholder = 'Referral Number'>

<br><br>

<input type = 'text' name = "txtadviser" id = 'txtadviser' style = 'background-color: transparent; border-color: 28110d; border-radius: 5px; width: 900; font-size: 30; text-align: center;' placeholder = 'Grade 10 Adviser'>

<br><br>

<input type = 'text' name = "txt10sec" id = 'txt10sec' style = 'background-color: transparent; border-color: 28110d; border-radius: 5px; width: 900; font-size: 30; text-align: center;' placeholder = 'Grade 10 Section'>

<br><br>

Documents:

<br><br>

<label>
<input type = 'checkbox' name = 'chkgm' id = 'chkgm' style = 'height: 25; width: 25;' onclick = 'gm()'>
Good Moral
<input type = 'text' name = 'txtgm' id = 'txtgm' style = 'display: none;'>
</label>

<label>
<input type = 'checkbox' name = 'chkcard' id = 'chkcard' style = 'height: 25; width: 25;' onclick = 'card()'>
Card
<input type = 'text' name = 'txtcard' id = 'txtcard' style = 'display: none;'>
</label>

<label>
<input type = 'checkbox' name = 'chkf137' id = 'chkf137' style = 'height: 25; width: 25;' onclick = 'f137()'>
Form 137
<input type = 'text' name = 'txtf137' id = 'txtf137' style = 'display: none;'>
</label>

<label>
<input type = 'checkbox' name = 'chkpsa' id = 'chkpsa' style = 'height: 25; width: 25;' onclick = 'psa()'>
PSA
<input type = 'text' name = 'txtpsa' id = 'txtpsa' style = 'display: none;'>
</label>

<input type = 'text' name = 'txtremarks' id = 'txtremarks' placeholder = 'PSA Remarks' style = 'background-color: transparent; border-color: 28110d; border-radius: 5px; font-size: 25; text-align: left;'>

<br><br>

<label>
<input type = 'checkbox' name = 'chkstudid' id = 'chkstudid' style = 'height: 25; width: 25;' onclick = 'studid()'>
ID
<input type = 'text' name = 'txtstudid' id = 'txtstudid' style = 'display: none;'>
</label>

<label>
<input type = 'checkbox' name = 'chkpe' id = 'chkpe' style = 'height: 25; width: 25;' onclick = 'pe()'>
PE Shirt
<input type = 'text' name = 'txtpe' id = 'txtpe' style = 'display: none;'>
</label>

<label>
<input type = 'checkbox' name = 'chkwaiver' id = 'chkwaiver' style = 'height: 25; width: 25;' onclick = 'waiver()'>
Waiver
<input type = 'text' name = 'txtwaiver' id = 'txtwaiver' style = 'display: none;'>
</label>

<label>
<input type = 'checkbox' name = 'chkuniform' id = 'chkuniform' style = 'height: 25; width: 25;' onclick = 'uniform()'>
Uniform
<input type = 'text' name = 'txtuniform' id = 'txtuniform' style = 'display: none;'>
</label>

<label>
<input type = 'checkbox' name = 'chkallow' id = 'chkallow' style = 'height: 25; width: 25;' onclick = 'allow()'>
Allowance
<input type = 'text' name = 'txtallow' id = 'txtallow' style = 'display: none;'>
</label>

<label>
<input type = 'checkbox' name = 'chkdoc' id = 'chkdoc' style = 'height: 25; width: 25;' onclick = 'doc()'>
Document Filed
<input type = 'text' name = 'txtdoc' id = 'txtdoc' style = 'display: none;'>
</label>

<br><br>

<input type = 'submit' name = 'update' id = 'btnupdate' value = 'Update' style = 'width: 900; font-size: 30; border-color: 28110d; border-radius: 5px; text-align: center; background-color: EFC372;'>

<input type = 'hidden' name = 'txtusername' value = '<?php echo $username;?>'>

</th>
</tr>

</form>

<tr style = 'height: 100;'>
<th style = 'border-color: transparent; text-align: center; font-weight: bold; font-size: 30;'>

<form action = 'gmc print registration.php' method = 'post' target='_blank'>
<input type = 'hidden' name = 'txtstudno' value = '<?php echo $studno;?>'>
<input type = 'hidden' name = 'txtsemester' value = '<?php echo $semester;?>'>
<input type = 'hidden' name = 'txtstrand' value = '<?php echo $strand;?>'>

<input type = 'search' list = 'gradelevel' name = 'cmbgradelevel' id = 'cmbgradelevel' placeholder = 'Grade Level' style = 'width: 445; font-size: 30; border-color: 28110d; border-radius: 5px; text-align: center;' onclick = 'actprt()' onchange = 'actprt()'>

<datalist id = 'gradelevel'>
<option value = '11'></option>
<option value = '12'></option>
</datalist> 

<input type = 'submit' name = 'prtreg' id = 'btnprint' value = 'Print' style = 'width: 445; font-size: 30; border-color: 28110d; border-radius: 5px; text-align: center; background-color: EFC372;' disabled>

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
echo"<script>document.getElementById('txtacctname').value = '$row[account_name]'</script>";
echo"<script>document.getElementById('txtaccesslevel').value = '$row[access_level]'</script>";
}

// Student Information

if(isset($_POST['search']))
{

$cmbsearch = $_POST['cmbsearch'];

$sql = mysqli_query($cn, "select * from student_information where student_no = '$cmbsearch' or username = '$cmbsearch'");
$search = mysqli_num_rows($sql);

while($row = mysqli_fetch_assoc($sql))
{
echo"<script>document.getElementById('txtstudno').value = '$row[student_no]'</script>";
echo"<script>document.getElementById('txtuser').value = '$row[username]'</script>";
echo"<script>document.getElementById('dtreg').value = '$row[reg_date]'</script>";
echo"<script>document.getElementById('cmbsy').value = '$row[sy]'</script>";
echo"<script>document.getElementById('cmbsemester').value = '$row[semester]'</script>";
echo"<script>document.getElementById('cmbstrand').value = '$row[strand]'</script>";
echo"<script>document.getElementById('txtschool').value = '$row[school]'</script>";
echo"<script>document.getElementById('txtschoolid').value = '$row[school_id]'</script>";
echo"<script>document.getElementById('txtlrn').value = '$row[lrn]'</script>";
echo"<script>document.getElementById('cmblrn').value = '$row[lrn]'</script>";
echo"<script>document.getElementById('txtlastname').value = '$row[last_name]'</script>";
echo"<script>document.getElementById('txtextensionname').value = '$row[extension_name]'</script>";
echo"<script>document.getElementById('txtfirstname').value = '$row[first_name]'</script>";
echo"<script>document.getElementById('txtmiddlename').value = '$row[middle_name]'</script>";
echo"<script>document.getElementById('cmblearnersname').value = '$row[learners_name]'</script>";

echo"<script>document.getElementById('txtgender').value = '$row[gender]'</script>";

echo"<script>
if(document.getElementById('txtgender').value == 'M')
{
document.getElementById('rbmale').checked = true
}
if(document.getElementById('txtgender').value == 'F')
{
document.getElementById('rbfemale').checked = true
}
</script>";

echo"<script>document.getElementById('dtbday').value = '$row[birthday]'</script>";
echo"<script>document.getElementById('txtage').value = '$row[age]'</script>";
echo"<script>document.getElementById('txtnationality').value = '$row[nationality]'</script>";
echo"<script>document.getElementById('txtbirthplace').value = '$row[birthplace]'</script>";
echo"<script>document.getElementById('txtreligion').value = '$row[religion]'</script>";
echo"<script>document.getElementById('dtcompletion').value = '$row[completion_date]'</script>";
echo"<script>document.getElementById('cmbcompleterAs').value = '$row[completer_as]'</script>";
echo"<script>document.getElementById('txtschoolname').value = '$row[school_name]'</script>";
echo"<script>document.getElementById('txtschooladdress').value = '$row[school_address]'</script>";
echo"<script>document.getElementById('txtgenave').value = '$row[gen_ave]'</script>";
echo"<script>document.getElementById('txthouseno').value = '$row[house_no]'</script>";
echo"<script>document.getElementById('txtbrgy').value = '$row[brgy]'</script>";
echo"<script>document.getElementById('txtcity').value = '$row[city]'</script>";
echo"<script>document.getElementById('txtprovince').value = '$row[province]'</script>";
echo"<script>document.getElementById('txtcontactno').value = '$row[contact_no]'</script>";
echo"<script>document.getElementById('txtfather').value = '$row[fathers_name]'</script>";
echo"<script>document.getElementById('txtfoccupation').value = '$row[foccupation]'</script>";
echo"<script>document.getElementById('txtmother').value = '$row[mothers_name]'</script>";
echo"<script>document.getElementById('txtmoccupation').value = '$row[moccupation]'</script>";
echo"<script>document.getElementById('txtguardian').value = '$row[guardian_name]'</script>";
echo"<script>document.getElementById('txtrelationship').value = '$row[relationship]'</script>";
echo"<script>document.getElementById('txtgcontactno').value = '$row[gcontact_no]'</script>";
echo"<script>document.getElementById('txtgoccupation').value = '$row[goccupation]'</script>";
echo"<script>document.getElementById('txtguardianaddress').value = '$row[guardian_address]'</script>";
echo"<script>document.getElementById('txtrname').value = '$row[referral_name]'</script>";
echo"<script>document.getElementById('txtrnum').value = '$row[referral_number]'</script>";
echo"<script>document.getElementById('txtadviser').value = '$row[grade10_adviser]'</script>";
echo"<script>document.getElementById('txt10sec').value = '$row[grade10_section]'</script>";

echo"<script>document.getElementById('txtgm').value = '$row[good_moral]'</script>";
echo"<script>document.getElementById('txtcard').value = '$row[card]'</script>";
echo"<script>document.getElementById('txtf137').value = '$row[f137]'</script>";
echo"<script>document.getElementById('txtpsa').value = '$row[psa]'</script>";
echo"<script>document.getElementById('txtremarks').value = '$row[psa_remarks]'</script>";
echo"<script>document.getElementById('txtstudid').value = '$row[stud_id]'</script>";
echo"<script>document.getElementById('txtpe').value = '$row[pe_shirt]'</script>";
echo"<script>document.getElementById('txtwaiver').value = '$row[waiver]'</script>";
echo"<script>document.getElementById('txtuniform').value = '$row[uniform]'</script>";
echo"<script>document.getElementById('txtallow').value = '$row[allowance]'</script>";
echo"<script>document.getElementById('txtdoc').value = '$row[document_filed]'</script>";

echo"<script>

if(document.getElementById('txtgm').value == 'Ok')
{
document.getElementById('chkgm').checked = true
}

if(document.getElementById('txtcard').value == 'Ok')
{
document.getElementById('chkcard').checked = true
}

if(document.getElementById('txtf137').value == 'Ok')
{
document.getElementById('chkf137').checked = true
}

if(document.getElementById('txtpsa').value == 'Ok')
{
document.getElementById('chkpsa').checked = true
}

if(document.getElementById('txtstudid').value == 'Ok')
{
document.getElementById('chkstudid').checked = true
}

if(document.getElementById('txtpe').value == 'Ok')
{
document.getElementById('chkpe').checked = true
}

if(document.getElementById('txtwaiver').value == 'Ok')
{
document.getElementById('chkwaiver').checked = true
}

if(document.getElementById('txtuniform').value == 'Ok')
{
document.getElementById('chkuniform').checked = true
}

if(document.getElementById('txtallow').value == 'Ok')
{
document.getElementById('chkallow').checked = true
}

if(document.getElementById('txtdoc').value == 'Ok')
{
document.getElementById('chkdoc').checked = true
}

</script>";

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

if(isset($_POST['update']))
{

$txtstudno = $_POST['txtstudno'];
$txtuser = $_POST['txtuser'];
$dtreg = $_POST['dtreg'];
$cmbsy = $_POST['cmbsy'];
$cmbsemester = $_POST['cmbsemester'];
$cmbstrand = $_POST['cmbstrand'];
$txtschool = $_POST['txtschool'];
$txtschoolid = $_POST['txtschoolid'];
$txtlrn = $_POST['txtlrn'];
$cmblrn = $_POST['cmblrn'];
$txtlastname = $_POST['txtlastname'];
$txtextensionname = $_POST['txtextensionname'];
$txtfirstname = $_POST['txtfirstname'];
$txtmiddlename = $_POST['txtmiddlename'];
$cmblearnersname = $_POST['cmblearnersname'];
$txtgender = $_POST['txtgender'];
$dtbday = $_POST['dtbday'];
$txtage = $_POST['txtage'];
$txtnationality = $_POST['txtnationality'];
$txtbirthplace = $_POST['txtbirthplace'];
$txtreligion = $_POST['txtreligion'];
$dtcompletion = $_POST['dtcompletion'];
$cmbcompleterAs = $_POST['cmbcompleterAs'];
$txtschoolname = $_POST['txtschoolname'];
$txtschooladdress = $_POST['txtschooladdress'];
$txtgenave = $_POST['txtgenave'];
$txthouseno = $_POST['txthouseno'];
$txtbrgy = $_POST['txtbrgy'];
$txtcity = $_POST['txtcity'];
$txtprovince = $_POST['txtprovince'];
$txtcontactno = $_POST['txtcontactno'];
$txtfather = $_POST['txtfather'];
$txtfoccupation = $_POST['txtfoccupation'];
$txtmother = $_POST['txtmother'];
$txtmoccupation = $_POST['txtmoccupation'];
$txtguardian = $_POST['txtguardian'];
$txtrelationship = $_POST['txtrelationship'];
$txtgcontactno = $_POST['txtgcontactno'];
$txtgoccupation = $_POST['txtgoccupation'];
$txtguardianaddress = $_POST['txtguardianaddress'];
$txtrname = $_POST['txtrname'];
$txtrnum = $_POST['txtrnum'];
$txtadviser = $_POST['txtadviser'];
$txt10sec = $_POST['txt10sec'];
$txtgm = $_POST['txtgm'];
$txtcard = $_POST['txtcard'];
$txtf137 = $_POST['txtf137'];
$txtpsa = $_POST['txtpsa'];
$txtremarks = $_POST['txtremarks'];
$txtstudid = $_POST['txtstudid'];
$txtpe = $_POST['txtpe'];
$txtwaiver = $_POST['txtwaiver'];
$txtuniform = $_POST['txtuniform'];
$txtallow = $_POST['txtallow'];
$txtdoc = $_POST['txtdoc'];

// Save or Update

if(!empty($txtstudno))
{
$sql = mysqli_query($cn, "update student_information set reg_date = '$dtreg', sy = '$cmbsy', semester = '$cmbsemester', strand = '$cmbstrand', school = '$txtschool', school_id = '$txtschoolid', lrn = '$txtlrn', learners_name = '$txtlastname$txtextensionname, $txtfirstname $txtmiddlename', last_name = '$txtlastname', extension_name = '$txtextensionname', first_name = '$txtfirstname', middle_name = '$txtmiddlename', gender = '$txtgender', birthday = '$dtbday', age = $txtage, nationality = '$txtnationality', birthplace = '$txtbirthplace', religion = '$txtreligion', completion_date = '$dtcompletion', completer_as = '$cmbcompleterAs', school_name = '$txtschoolname', school_address = '$txtschooladdress', gen_ave = '$txtgenave', house_no = '$txthouseno', brgy = '$txtbrgy', city = '$txtcity', province = '$txtprovince', contact_no = '$txtcontactno', fathers_name = '$txtfather', foccupation = '$txtfoccupation', mothers_name = '$txtmother', moccupation = '$txtmoccupation', guardian_name = '$txtguardian', relationship = '$txtrelationship', gcontact_no = '$txtgcontactno', goccupation = '$txtgoccupation', guardian_address = '$txtguardianaddress', referral_name = '$txtrname', referral_number = '$txtrnum', grade10_adviser = '$txtadviser', grade10_section = '$txt10sec', good_moral = '$txtgm', card = '$txtcard', f137 = '$txtf137', psa = '$txtpsa', psa_remarks = '$txtremarks', stud_id = '$txtstudid', pe_shirt = '$txtpe', waiver = '$txtwaiver', uniform = '$txtuniform', allowance = '$txtallow', document_filed = '$txtdoc' where student_no = '$txtstudno'");
}

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

function school()
{
if(document.getElementById('txtschool').value == 'Golden Minds Colleges of Balagtas, Bulacan, Inc.')
{
document.getElementById('txtschoolid').value = '404420'
}
if(document.getElementById('txtschool').value == 'Golden Minds Colleges of Sta. Maria, Bulacan, Inc.')
{
document.getElementById('txtschoolid').value = '404468'
}
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

function gm()
{
if(document.getElementById('chkgm').checked == true)
{
document.getElementById('txtgm').value = 'Ok'
}
else
{
document.getElementById('txtgm').value = ''
}
}

function card()
{
if(document.getElementById('chkcard').checked == true)
{
document.getElementById('txtcard').value = 'Ok'
}
else
{
document.getElementById('txtcard').value = ''
}
}

function f137()
{
if(document.getElementById('chkf137').checked == true)
{
document.getElementById('txtf137').value = 'Ok'
}
else
{
document.getElementById('txtf137').value = ''
}
}

function psa()
{
if(document.getElementById('chkpsa').checked == true)
{
document.getElementById('txtpsa').value = 'Ok'
}
else
{
document.getElementById('txtpsa').value = ''
}
}

function studid()
{
if(document.getElementById('chkstudid').checked == true)
{
document.getElementById('txtstudid').value = 'Ok'
}
else
{
document.getElementById('txtstudid').value = ''
}
}

function pe()
{
if(document.getElementById('chkpe').checked == true)
{
document.getElementById('txtpe').value = 'Ok'
}
else
{
document.getElementById('txtpe').value = ''
}
}

function waiver()
{
if(document.getElementById('chkwaiver').checked == true)
{
document.getElementById('txtwaiver').value = 'Ok'
}
else
{
document.getElementById('txtwaiver').value = ''
}
}

function uniform()
{
if(document.getElementById('chkuniform').checked == true)
{
document.getElementById('txtuniform').value = 'Ok'
}
else
{
document.getElementById('txtuniform').value = ''
}
}

function allow()
{
if(document.getElementById('chkallow').checked == true)
{
document.getElementById('txtallow').value = 'Ok'
}
else
{
document.getElementById('txtallow').value = ''
}
}

function doc()
{
if(document.getElementById('chkdoc').checked == true)
{
document.getElementById('txtdoc').value = 'Ok'
}
else
{
document.getElementById('txtdoc').value = ''
}
}

function actprt()
{
if(document.getElementById('cmbgradelevel').value != '')
{
document.getElementById('btnprint').disabled = false;
}
else
{
document.getElementById('btnprint').disabled = true;	
}

}

</script>