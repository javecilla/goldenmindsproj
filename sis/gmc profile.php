<html>
<head>
<title>Profile</title>
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

</th>

<th style = 'border-color: transparent; width: 600;'>
</th>

</tr>
</table>

<form action = 'gmc profile.php' method = 'post'>

<table border = 2 style = "border-color: 28110d; height: 100%; width: 1000; border-left: 3px solid black; border-right: 3px solid black; border-bottom: 4px solid black; position: relative; top: 0;">

<tr style = 'height: 250; font-size: 30;'>
<th style = 'border-color: transparent; text-align: center;'>

<input type = 'hidden' name = 'txtuser' id = 'txtuser'>

<input type = 'text' name = 'txtlrn' id = 'txtlrn' style = 'height: 60; width: 900; font-size: 30; background-color: transparent; border-color: black; border-radius: 5px; text-align: center;' placeholder = 'LRN' required>

<br><br>

Learners Name:

<br>

<input type = 'text' name = 'txtlastname' id = 'txtlastname' style = 'height: 60; width: 250; font-size: 30;  background-color: transparent; border-color: black; border-radius: 5px; text-align: center;' placeholder = 'Last Name' required>

<input type = 'text' name = 'txtextensionname' id = 'txtextensionname' style = 'height: 60; width: 130; font-size: 30; background-color: transparent; border-color: black; border-radius: 5px; text-align: center;' placeholder = 'Ext.'>

<input type = 'text' name = 'txtfirstname' id = 'txtfirstname' style = 'height: 60; width: 250; font-size: 30;  background-color: transparent; border-color: black; border-radius: 5px; text-align: center;' placeholder = 'First Name' required>

<input type = 'text' name = 'txtmiddlename' id = 'txtmiddlename' style = 'height: 60; width: 250; font-size: 30;  background-color: transparent; border-color: black; border-radius: 5px; text-align: center;' placeholder = 'Middle Name'>

</th>
</tr>

<tr style = 'height: 60;'>
<th style = 'border-color: transparent; text-align: center; font-weight: bold; font-size: 30;'>

Gender:

<input type = "radio" name = "rbmale" id = "rbmale" style = "height: 30; width: 30;" onclick = "male()">
Male

<input type = "radio" name = "rbfemale" id = "rbfemale" style = "height: 30; width: 30;" onclick = "female()">
Female

<input type = 'hidden' name = 'txtgender' id = 'txtgender' style = 'position: absolute; top: 220; left: 550; width: 30; text-align: center' readonly = 'readonly'>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

Birthday:
<input type = 'date' name = 'dtbday' id = 'dtbday' style = 'height: 60; width: 300; font-size: 30; background-color: transparent; border-color: black; border-radius: 5px;'>

</th>
</tr>

<tr style = 'height: 1850;'>
<th style = 'border-color: transparent; text-align: center; font-size: 30;'>

<input type = 'text' name = "txtnationality" id = 'txtnationality' style = 'background-color: transparent; border-color: 28110d; border-radius: 5px; width: 900; font-size: 30; text-align: center;' placeholder = 'Nationality' required>

<br><br>

<input type = 'text' name = 'txtbirthplace' id = 'txtbirthplace' style = 'height: 60; width: 900; font-size: 30;  background-color: transparent; border-color: black; border-radius: 5px; text-align: center;' placeholder = 'Place of Birth'>

<br><br>

<input type = 'text' name = 'txtreligion' id = 'txtreligion' style = 'height: 60; width: 900; font-size: 30;  background-color: transparent; border-color: black; border-radius: 5px; text-align: center;' placeholder = 'Religious Affiliation'>

<br><br>

Complete Address:

<br>

<input type = 'text' name = 'txthouseno' id = 'txthouseno' style = 'height: 60; width: 900; font-size: 30;  background-color: transparent; border-color: black; border-radius: 5px; text-align: center;' placeholder = 'House No./Street/Sitio/Purok'>

<br><br>

<input type = 'text' name = 'txtbrgy' id = 'txtbrgy' style = 'height: 60; width: 900; font-size: 30;  background-color: transparent; border-color: black; border-radius: 5px; text-align: center;' placeholder = 'Barangay'>

<br><br>

<input type = 'text' name = 'txtcity' id = 'txtcity' style = 'height: 60; width: 900; font-size: 30;  background-color: transparent; border-color: black; border-radius: 5px; text-align: center;' placeholder = 'Municipality/City'>

<br><br>

<input type = 'text' name = 'txtprovince' id = 'txtprovince' style = 'height: 60; width: 900; font-size: 30;  background-color: transparent; border-color: black; border-radius: 5px; text-align: center;' placeholder = 'Province'>

<br><br>

<input type = 'text' name = 'txtcontactno' id = 'txtcontactno' style = 'height: 60; width: 900; font-size: 30;  background-color: transparent; border-color: black; border-radius: 5px; text-align: center;' placeholder = 'Contact Number'>

<br><br>

Father's Name:

<br>

<input type = 'text' name = 'txtfather' id = 'txtfather' style = 'height: 60; width: 900; font-size: 30;  background-color: transparent; border-color: black; border-radius: 5px; text-align: center;' placeholder = 'Last Name, First Name, Ext. Name, Middle Name'>

<br><br>

<input type = 'text' name = 'txtfoccupation' id = 'txtfoccupation' style = 'height: 60; width: 900; font-size: 30;  background-color: transparent; border-color: black; border-radius: 5px; text-align: center;' placeholder = 'Occupation'>

<br><br>

Mother's Name:

<input type = 'text' name = 'txtmother' id = 'txtmother' style = 'height: 60; width: 900; font-size: 30;  background-color: transparent; border-color: black; border-radius: 5px; text-align: center;' placeholder = 'Last Name, First Name, Ext. Name, Middle Name'>

<br><br>

<input type = 'text' name = 'txtmoccupation' id = 'txtmoccupation' style = 'height: 60; width: 900; font-size: 30;  background-color: transparent; border-color: black; border-radius: 5px; text-align: center;' placeholder = 'Occupation'>

<br><br>

Guardian Name:

<br>

<input type = 'text' name = 'txtguardian' id = 'txtguardian' style = 'height: 60; width: 900; font-size: 30;  background-color: transparent; border-color: black; border-radius: 5px; text-align: center;' placeholder = 'Last Name, First Name, Ext. Name, Middle Name'>

<br><br>

<input type = 'text' name = 'txtrelationship' id = 'txtrelationship' style = 'height: 60; width: 900; font-size: 30; background-color: transparent; border-color: black; border-radius: 5px; text-align: center;' placeholder = 'Relationship'>

<br><br>

<input type = 'text' name = 'txtgcontactno' id = 'txtgcontactno' style = 'height: 60; width: 900; font-size: 30;  background-color: transparent; border-color: black; border-radius: 5px; text-align: center;' placeholder = 'Contact No. of Parent/Guardian'>

<br><br>

<input type = 'text' name = 'txtgoccupation' id = 'txtgoccupation' style = 'height: 60; width: 900; font-size: 30;  background-color: transparent; border-color: black; border-radius: 5px; text-align: center;' placeholder = 'Occupation'>

<br><br>

<input type = 'text' name = 'txtguardianaddress' id = 'txtguardianaddress' style = 'height: 60; width: 900; font-size: 30; background-color: transparent; border-color: black; border-radius: 5px; text-align: center;' placeholder = 'Guardian Address'>

<br><br>

<input type = 'submit' name = 'update' id = 'btnupdate' value = 'Update Profile' style = 'height: 60; width: 900; font-size: 30; border-color: EFC372; border-radius: 5px; background-color: EFC372;' disabled>

<input type = 'hidden' name = 'txtusername' value = '<?php echo $username;?>'>

</th>
</tr>

<tr>
<th style = 'border-color: transparent; text-align: center;'>

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

// Account Info
	
$txtusername = $_POST['txtusername'];

$sql = mysqli_query($cn, "select * from account_registration where username = '$txtusername'");
$username = mysqli_num_rows($sql);

while($row = mysqli_fetch_assoc($sql))
{
echo"<script>document.getElementById('txtacctname').value = '$row[account_name]'</script>";
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
echo"<script>document.getElementById('txtnationality').value = '$row[nationality]'</script>";
echo"<script>document.getElementById('txtbirthplace').value = '$row[birthplace]'</script>";
echo"<script>document.getElementById('txtreligion').value = '$row[religion]'</script>";
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
echo"<script>document.getElementById('btnupdate').disabled = false</script>";
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
$txtnationality = $_POST['txtnationality'];
$txtbirthplace = $_POST['txtbirthplace'];
$txtreligion = $_POST['txtreligion'];
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

// Save or Update

$sql = mysqli_query($cn, "update student_information set lrn = '$txtlrn', learners_name = '$txtlastname$txtextensionname, $txtfirstname $txtmiddlename', last_name = '$txtlastname', extension_name = '$txtextensionname', first_name = '$txtfirstname', middle_name = '$txtmiddlename', gender = '$txtgender', birthday = '$dtbday', age = '$txtage', nationality = '$txtnationality', birthplace = '$txtbirthplace', religion = '$txtreligion', house_no = '$txthouseno', brgy = '$txtbrgy', city = '$txtcity', province = '$txtprovince', contact_no = '$txtcontactno', fathers_name = '$txtfather', foccupation = '$txtfoccupation', mothers_name = '$txtmother', moccupation = '$txtmoccupation', guardian_name = '$txtguardian', relationship = '$txtrelationship', gcontact_no = '$txtgcontactno', goccupation = '$txtgoccupation', guardian_address = '$txtguardianaddress' where username = '$txtuser'");

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