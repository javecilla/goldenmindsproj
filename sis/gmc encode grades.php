<html>
<head>
<title>Student Grades</title>
</head>
<body>

<script src="jquery-3.7.0.min.js"></script>

<center>

<form action = 'gmc encode grades.php' method = 'post'>

<table border = 2 cellspacing = 0 style = 'width: 50%;'>
<tr>

<th style = 'width: 50%'>
Subject Description
</th>
<th style = 'width: 10%'>
Midterm
</th>
<th style = 'width: 10%'>
Finals
</th>
<th style = 'width: 10%'>
Average
</th>
<th style = 'width: 10%'>
Remarks
</th>
<th style = 'width: 10%'>
<input type = 'button' name = 'btnsaveall' id = 'btnsaveall' value = 'Save All' onclick = 'saveall()'>
</th>
</tr>

<?php

$cn = mysqli_connect('localhost', 'root', '', 'gmcbulac_db_gmc');
//$cn = mysqli_connect('localhost', 'gmcbulac_derek03', 'derek030872', 'gmcbulac_db_gmc');

//$sql = mysqli_query($cn, "select * from subjects where teacher = '$txtusername' and strand = '$txtstrand' and semester = '$cmbsem' and yr_sec = '$cmbyear' and subj_order = '01'");

$sql = mysqli_query($cn, "select * from subjects where strand = 'Technical-Vocational-Livelihood Information and Communications Technology' and semester = '1st' and yr_sec = '11' group by subj_desc order by subj_order asc;");
$subjdesc = mysqli_num_rows($sql);
$rowPKindex = 1;
while($row = mysqli_fetch_assoc($sql))
{
echo"<tr>
<td>
<input type = 'text' name = 'txtsubjdesc$rowPKindex' id = 'txtsubjdesc$rowPKindex' value = '$row[subj_desc]' style = 'width: 100%;' readonly>
</td>

<td>
<input type = 'text' name = 'txtmidterm' id = 'txtmidterm$rowPKindex' style = 'width: 100%;'>
</td>

<td>
<input type = 'text' name = 'txtfinals' id = 'txtfinals$rowPKindex' style = 'width: 100%;'>
</td>

<td>
<input type = 'text' name = 'txtave' id = 'txtave$rowPKindex' style = 'width: 100%;' readonly>
</td>

<td>
<input type = 'text' name = 'txtremarks' id = 'txtremarks$rowPKindex' style = 'width: 100%;' readonly>
</td>

<td>
<input type = 'submit' name = 'btnsave' id = 'btnsave$rowPKindex' value = 'Save$rowPKindex'>
</td>
   
</tr>";
$rowPKindex++;
}

?>
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

//$txtuser = $_POST['txtuser'];
//$txtlrn = $_POST['txtlrn'];
//$txtlearnersname = $_POST['txtlearnersname'];
//$cmbsy = $_POST['cmbsy'];
//$cmbsemester = $_POST['cmbsemester'];
//$cmbstrand = $_POST['cmbstrand'];
//$cmbyrsec = $_POST['cmbyrsec'];
//$cmbyear = $_POST['cmbyear'];
//$txtusername = $_POST['txtusername'];

for ($x = 1; $x <= 12; $x++)
{
$txtsubjdesc[$x] = $_POST['txtsubjdesc.$x'];
$sql = mysqli_query($cn, "insert into grades (subj_desc) values ('$txtsubjdesc$x')");
}

echo"<script>
alert('Record Saved')
history.go(-1)
</script>";

}



?>

<script>
function saveall()
{
document.getElementById('btnsave1').click();
alert('Test1');
}

</script>
