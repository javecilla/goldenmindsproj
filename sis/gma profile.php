<html>
<head>
<title>GMA Profile</title>
</head>

<body onload = "login(), acclvl()" bgcolor = "white">

<table border = 2 style = "background-color: 28110d; border: none; position: absolute; top: 0; left: 0; height: 100; width: 100%;">

<td style = 'border-color: transparent; width: 40; min-width: 40;'>
<img src = 'admin.png' style = 'height: 40; width: 40;'>
</td>

<td style = 'border-color: transparent; min-width: 1042; max-width: 1042;'>
</td>

<form action = "gma student.php" method = "post">
<td style = 'border-color: transparent; width: 120; min-width: 120;'>
<input type = 'submit' value = 'HOME' style = 'border-color: white; border-radius: 5px; background-color: 28110d; color: white; font-size: 20; height: 30; width: 120;'>
<input type = 'hidden' name = 'txtusername' id = 'txthome'>
</td>
</form>

<td style = 'border-color: transparent; width: 120; min-width: 120;'>
<input type = 'button' value = 'LOG OUT' style = 'border-color: white; border-radius: 5px; background-color: 28110d; color: white; font-size: 20; height: 30; width: 120;' onclick = 'logout()'>
</td>

</table>

<img src = "bg.png" style = "position: fixed; top: 100; left: 0; height: 100%; width: 100%;">

<table border = 2 style = 'border-color: 28110d; background-color: transparent; position: absolute; top: 100; left: 0; height: 55; width: 100%;'>

<form action = 'gma profile.php' method = 'post'>
<td style = 'border-color: transparent; width: 280; min-width: 280;'>
<input type = 'submit' name = 'profile' id = 'btnprofile' value = 'Profile' style = 'border-color: EFC372; border-radius: 5px; background-color: EFC372; color: 28110d; font-size: 30; width: 280'>
<input type = 'hidden' name = 'txtusername' id = 'txtprofile'>
<input type = 'hidden' name = 'cmbsearch' id = 'cmbsearch'>
</td>
</form>

<form action = 'gma grades.php' method = 'post'>
<td style = 'border-color: transparent; width: 280; min-width: 280;'>
<input type = 'submit' name = 'grades' id = 'btngrades' value = 'Grades' style = 'border-color: EFC372; border-radius: 5px; background-color: EFC372; color: 28110d; font-size: 30; width: 280'>
<input type = 'hidden' name = 'txtusername' id = 'txtgrades'>
<input type = 'hidden' name = 'cmbsy'>
<input type = 'hidden' name = 'cmbsemester'>
</td>
</form>

<form action = 'gma payments.php' method = 'post'>
<td style = 'border-color: transparent; width: 280; min-width: 280;'>
<input type = 'submit' name = 'payments' id = 'btnpayments' value = 'Payments' style = 'border-color: EFC372; border-radius: 5px; background-color: EFC372; color: 28110d; font-size: 30; width: 280'>
<input type = 'hidden' name = 'txtusername' id = 'txtpayments'>
<input type = 'hidden' name = 'cmbsearch' id = 'cmbsearch'>
</td>
</form>

<td style = 'border-color: transparent; min-width: 478; max-width: 478;'>
</td>

</table>

<form action = 'gma profile.php' method = 'post'>

<input type = 'hidden' name = 'txtuser' id = 'txtuser'>

<input type = 'text' name = 'txtlrn' id = 'txtlrn' style = 'position: absolute; top: 165; left: 5; width: 470; font-size: 30; border-color: black; border-radius: 5px;' placeholder = 'LRN'>

<p style = 'position: absolute; top: 145; left: 480; color: red; font-size: 30;'>
*Required
</p>

<p style = "position: absolute; top: 180; left: 5; font-weight: bold; font-size: 30;">
Learners Name:
</p>

<p style = 'position: absolute; top: 180; left: 214; color: red; font-size: 30;'>
*Required
</p>

<input type = 'text' name = 'txtlastname' id = 'txtlastname' style = 'position: absolute; top: 245; left: 5; width: 200; font-size: 30;  border-color: black; border-radius: 5px;' placeholder = 'Last Name'>
<input type = 'text' name = 'txtextensionname' id = 'txtextensionname' style = 'position: absolute; top: 245; left: 210; width: 60; font-size: 30;  border-color: black; border-radius: 5px;' placeholder = 'Ext.'>
<input type = 'text' name = 'txtfirstname' id = 'txtfirstname' style = 'position: absolute; top: 245; left: 275; width: 200; font-size: 30;  border-color: black; border-radius: 5px;' placeholder = 'First Name'>
<input type = 'text' name = 'txtmiddlename' id = 'txtmiddlename' style = 'position: absolute; top: 245; left: 480; width: 200; font-size: 30;  border-color: black; border-radius: 5px;' placeholder = 'Middle Name'>

<p style = "position: absolute; top: 260; left: 5; font-weight: bold; font-size: 30;">
Gender:
</p>

<input type = "radio" name = "rbmale" id = "rbmale" style = "position: absolute; top: 290; left: 120; height: 30; width: 30;" onclick = "male()">

<p style = "position: absolute; top: 260; left: 160; font-size: 30;">
Male
</p>

<input type = "radio" name = "rbfemale" id = "rbfemale" style = "position: absolute; top: 290; left: 230; height: 30; width: 30;" onclick = "female()">

<p style = "position: absolute; top: 260; left: 270; font-size: 30;">
Female
</p>

<input type = 'hidden' name = 'txtgender' id = 'txtgender' style = 'position: absolute; top: 220; left: 550; width: 30; text-align: center' readonly = 'readonly'>

<p style = "position: absolute; top: 300; left: 5; font-weight: bold; font-size: 30;">
Birthday:
</p>

<input type = 'date' name = 'dtbday' id = 'dtbday' style = 'position: absolute; top: 365; left: 5; width: 265; font-size: 30;  border-color: black; border-radius: 5px;'>

<input type = 'text' name = 'txtbirthplace' id = 'txtbirthplace' style = 'position: absolute; top: 365; left: 275; width: 405; font-size: 30;  border-color: black; border-radius: 5px;' placeholder = 'Place of Birth'>

<input type = 'text' name = 'txtreligion' id = 'txtreligion' style = 'position: absolute; top: 420; left: 5; width: 675; font-size: 30;  border-color: black; border-radius: 5px;' placeholder = 'Religious Affiliation'>

<p style = "position: absolute; top: 440; left: 5; font-weight: bold; font-size: 30;">
Complete Address:
</p>

<input type = 'text' name = 'txthouseno' id = 'txthouseno' style = 'position: absolute; top: 505; left: 5; width: 675; font-size: 30;  border-color: black; border-radius: 5px;' placeholder = 'House No./Street/Sitio/Purok'>

<input type = 'text' name = 'txtbrgy' id = 'txtbrgy' style = 'position: absolute; top: 550; left: 5; width: 675; font-size: 30;  border-color: black; border-radius: 5px;' placeholder = 'Barangay'>

<input type = 'text' name = 'txtcity' id = 'txtcity' style = 'position: absolute; top: 595; left: 5; width: 675; font-size: 30;  border-color: black; border-radius: 5px;' placeholder = 'Municipality/City'>

<input type = 'text' name = 'txtprovince' id = 'txtprovince' style = 'position: absolute; top: 640; left: 5; width: 675; font-size: 30;  border-color: black; border-radius: 5px;' placeholder = 'Province'>

<p style = "position: absolute; top: 660; left: 5; font-weight: bold; font-size: 30;">
Father's Name:
</p>

<input type = 'text' name = 'txtfather' id = 'txtfather' style = 'position: absolute; top: 720; left: 5; width: 675; font-size: 30;  border-color: black; border-radius: 5px;' placeholder = 'Last Name, First Name, Ext. Name, Middle Name'>

<p style = "position: absolute; top: 740; left: 5; font-weight: bold; font-size: 30;">
Mother's Name:
</p>

<input type = 'text' name = 'txtmother' id = 'txtmother' style = 'position: absolute; top: 800; left: 5; width: 675; font-size: 30;  border-color: black; border-radius: 5px;' placeholder = 'Last Name, First Name, Ext. Name, Middle Name'>

<p style = "position: absolute; top: 820; left: 5; font-weight: bold; font-size: 30;">
Guardian Name:
</p>

<input type = 'text' name = 'txtguardian' id = 'txtguardian' style = 'position: absolute; top: 880; left: 5; width: 675; font-size: 30;  border-color: black; border-radius: 5px;' placeholder = 'Last Name, First Name, Ext. Name, Middle Name'>

<input type = 'text' name = 'txtrelationship' id = 'txtrelationship' style = 'position: absolute; top: 925; left: 5; width: 675; font-size: 30;  border-color: black; border-radius: 5px;' placeholder = 'Relationship'>

<input type = 'text' name = 'txtcontactno' id = 'txtcontactno' style = 'position: absolute; top: 970; left: 5; width: 675; font-size: 30;  border-color: black; border-radius: 5px;' placeholder = 'Contact No. of Parent/Guardian'>

<input type = 'text' name = 'txtoccupation' id = 'txtoccupation' style = 'position: absolute; top: 1015; left: 5; width: 675; font-size: 30;  border-color: black; border-radius: 5px;' placeholder = 'Occupation'>

<input type = 'text' name = 'txtguardianaddress' id = 'txtguardianaddress' style = 'position: absolute; top: 1060; left: 5; width: 675; font-size: 30;  border-color: black; border-radius: 5px;' placeholder = 'Guardian Address'>

<input type = 'submit' name = 'update' id = 'btnupdate' value = 'Update Profile' style = 'position: absolute; top: 1120; left: 5; width: 675; font-size: 30; border-color: EFC372; border-radius: 5px; background-color: EFC372;'>

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

//Profile

$sql = mysqli_query($cn, "select * from student_information where username = '$txtusername'");
$username = mysqli_num_rows($sql);
	
while($row = mysqli_fetch_assoc($sql))
{
echo"<script>document.getElementById('txtuser').value = '$row[username]'</script>";
echo"<script>document.getElementById('txtlrn').value = '$row[lrn]'</script>";
echo"<script>document.getElementById('txtlastname').value = '$row[last_name]'</script>";
echo"<script>document.getElementById('txtextensionname').value = '$row[extension_name]'</script>";
echo"<script>document.getElementById('txtfirstname').value = '$row[first_name]'</script>";
echo"<script>document.getElementById('txtmiddlename').value = '$row[middle_name]'</script>";

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
echo"<script>document.getElementById('txtbirthplace').value = '$row[birthplace]'</script>";
echo"<script>document.getElementById('txtreligion').value = '$row[religion]'</script>";
echo"<script>document.getElementById('txthouseno').value = '$row[house_no]'</script>";
echo"<script>document.getElementById('txtbrgy').value = '$row[brgy]'</script>";
echo"<script>document.getElementById('txtcity').value = '$row[city]'</script>";
echo"<script>document.getElementById('txtprovince').value = '$row[province]'</script>";
echo"<script>document.getElementById('txtfather').value = '$row[fathers_name]'</script>";
echo"<script>document.getElementById('txtmother').value = '$row[mothers_name]'</script>";
echo"<script>document.getElementById('txtguardian').value = '$row[guardian_name]'</script>";
echo"<script>document.getElementById('txtrelationship').value = '$row[relationship]'</script>";
echo"<script>document.getElementById('txtcontactno').value = '$row[contact_no]'</script>";
echo"<script>document.getElementById('txtoccupation').value = '$row[occupation]'</script>";
echo"<script>document.getElementById('txtguardianaddress').value = '$row[guardian_address]'</script>";
}

if(isset($_POST['update']))
{

$txtuser = $_POST['txtuser'];
$txtlrn = $_POST['txtlrn'];
$txtlastname = $_POST['txtlastname'];
$txtextensionname = $_POST['txtextensionname'];
$txtfirstname = $_POST['txtfirstname'];
$txtmiddlename = $_POST['txtmiddlename'];
$txtgender = $_POST['txtgender'];
$dtbday = $_POST['dtbday'];
$txtage = $_POST['txtage'];
$txtbirthplace = $_POST['txtbirthplace'];
$txtreligion = $_POST['txtreligion'];
$txthouseno = $_POST['txthouseno'];
$txtbrgy = $_POST['txtbrgy'];
$txtcity = $_POST['txtcity'];
$txtprovince = $_POST['txtprovince'];
$txtfather = $_POST['txtfather'];
$txtmother = $_POST['txtmother'];
$txtguardian = $_POST['txtguardian'];
$txtrelationship = $_POST['txtrelationship'];
$txtcontactno = $_POST['txtcontactno'];
$txtoccupation = $_POST['txtoccupation'];
$txtguardianaddress = $_POST['txtguardianaddress'];

// Existing LRN

if(!empty($txtlrn))
{
$sql = mysqli_query($cn, "select * from student_information where lrn = '$txtlrn'");
$lrn = mysqli_num_rows($sql);
if($lrn == 1)
{
echo "<script>alert('Existing LRN')</script>";
}
}

// Save or Update

if(!empty($txtuser) 
&& !empty($txtlrn)
&& !empty($txtlastname)
&& !empty($txtfirstname))
{

$sql = mysqli_query($cn, "update student_information set lrn = '$txtlrn', learners_name = '$txtlastname$txtextensionname, $txtfirstname $txtmiddlename', last_name = '$txtlastname', extension_name = '$txtextensionname', first_name = '$txtfirstname', middle_name = '$txtmiddlename', gender = '$txtgender', birthday = '$dtbday', age = '$txtage', birthplace = '$txtbirthplace', religion = '$txtreligion', house_no = '$txthouseno', brgy = '$txtbrgy', city = '$txtcity', province = '$txtprovince', fathers_name = '$txtfather', mothers_name = '$txtmother', guardian_name = '$txtguardian', relationship = '$txtrelationship', contact_no = '$txtcontactno', occupation = '$txtoccupation', guardian_address = '$txtguardianaddress' where username = '$txtuser'");

$sql = mysqli_query($cn, "update enrolled_students set lrn = '$txtlrn', learners_name = '$txtlastname$txtextensionname, $txtfirstname $txtmiddlename' where username = '$txtuser'");

$sql = mysqli_query($cn, "update grades set lrn = '$txtlrn', learners_name = '$txtlastname$txtextensionname, $txtfirstname $txtmiddlename' where username = '$txtuser'");

echo "<script>alert('Record Updated')</script>";
echo "<script>history.go(-1)</script>";

}
else
{
echo "<script>alert('LRN and Learners Name are required')</script>";
echo "<script>history.go(-1)</script>";
}

}

?>

<script>

// Username

document.getElementById('txtusername').value = localStorage['objectToPass'];

document.getElementById('txthome').value = document.getElementById('txtusername').value;
document.getElementById('txtprofile').value = document.getElementById('txtusername').value;
document.getElementById('txtgrades').value = document.getElementById('txtusername').value;
document.getElementById('txtpayments').value = document.getElementById('txtusername').value;

// Login

function login()
{
if(document.getElementById('txtusername').value == 'undefined')
{
window.location.href = 'gma login.html';
}
}

// Logout

function logout()
{
localStorage.removeItem('objectToPass');
window.location.href = 'gma login.html';
}

// Force Logout

function acclvl()
{
if(document.getElementById('txtaccesslevel').value == '')
{
window.location.href = 'gma login.html';
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

</script>