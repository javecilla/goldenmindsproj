<html>
<head>
<title>GMA Grades</title>
</head>

<body onload = "login(), acclvl()" bgcolor = "white">

<table border = 2 style = "background-color: 28110d; border: none; position: absolute; top: 0; left: 0; height: 100; width: 100%;">

<td style = 'border-color: transparent; width: 40; min-width: 40;'>
<img src = 'admin.png' style = 'height: 40; width: 40;'>
</td>

<td style = 'border-color: transparent; min-width: 414; max-width: 414;'>
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
<td style = 'border-color: transparent; width: 200; min-width: 200;'>
<input type = 'submit' name = 'profile' id = 'btnprofile' value = 'Profile' style = 'border-color: EFC372; border-radius: 5px; background-color: EFC372; color: 28110d; font-size: 30; width: 200'>
<input type = 'hidden' name = 'txtusername' id = 'txtprofile'>
<input type = 'hidden' name = 'cmbsearch' id = 'cmbsearch'>
</td>
</form>

<form action = 'gma grades.php' method = 'post'>
<td style = 'border-color: transparent; width: 200; min-width: 200;'>
<input type = 'submit' name = 'grades' id = 'btngrades' value = 'Grades' style = 'border-color: EFC372; border-radius: 5px; background-color: EFC372; color: 28110d; font-size: 30; width: 200'>
<input type = 'hidden' name = 'txtusername' id = 'txtgrades'>
<input type = 'hidden' name = 'cmbsy'>
<input type = 'hidden' name = 'cmbsemester'>
</td>
</form>

<form action = 'gma payments.php' method = 'post'>
<td style = 'border-color: transparent; width: 200; min-width: 200;'>
<input type = 'submit' name = 'payments' id = 'btnpayments' value = 'Payments' style = 'border-color: EFC372; border-radius: 5px; background-color: EFC372; color: 28110d; font-size: 30; width: 200'>
<input type = 'hidden' name = 'txtusername' id = 'txtpayments'>
<input type = 'hidden' name = 'cmbsearch' id = 'cmbsearch'>
</td>
</form>

<td style = 'border-color: transparent; min-width: 90; max-width: 90;'>
</td>

</table>

<form action = 'gma grades.php' method = 'post'>

<table border = 1 style = 'height: 80; width: 700; position: absolute; left: 15; top: 170; border-color: black;'>
<td style = 'min-width: 120; max-width: 120; overflow: hidden; border-color: transparent;'>

<p style = "position: absolute; top: 0; left: 5; font-weight: bold;">
Username:
</p>

<input type = 'text' name = 'txtuser' id = 'txtuser' style = 'position: absolute; top: 40; left: 5; height: 30; width: 200; border-color: 28110d; border-radius: 5px;' readonly>

<p style = "position: absolute; top: 0; left: 210; font-weight: bold;">
LRN:
</p>

<input type = 'text' name = 'txtlrn' id = 'txtlrn' style = 'position: absolute; top: 40; left: 210; height: 30; width: 200; border-color: 28110d; border-radius: 5px;' readonly>

<p style = "position: absolute; top: 0; left: 415; font-weight: bold;">
Learners Name:
</p>

<input type = 'text' name = 'txtlearnersname' id = 'txtlearnersname' style = 'position: absolute; top: 40; left: 415; height: 30; width: 280; border-color: 28110d; border-radius: 5px;' readonly>

</td>
</table>

<table border = 1 style = 'height: 50; width: 700; position: absolute; left: 15; top: 249; border-color: black;'>
<td style = 'min-width: 120; max-width: 120; overflow: hidden; border-color: transparent;'>

<input list = 'sy' name = 'cmbsy' id = 'cmbsy' style = 'position: absolute; top: 10; left: 5; height: 30; width: 150; text-align: center; border-color: 28110d; border-radius: 5px;' placeholder = 'School Year'  onclick = 'clrsy()'>

<input list = 'yrsec' name = 'cmbyrsec' id = 'cmbyrsec' style = 'position: absolute; top: 10; left: 160; height: 30; width: 150; text-align: center; border-color: 28110d; border-radius: 5px;' placeholder = 'Year and Section'  onclick = 'clryrsec()'>

<input type = 'submit' name = 'okay' id = 'btnok' style = 'position: absolute; top: 10; left: 315; height: 30; min-width: 80; max-width: 120; text-align: center; border-color: 28110d; border-radius: 5px;' value = 'Double Click'>
<input type = 'hidden' name = 'txtusername' id = 'txtok' style = 'position: absolute; top: 100; left: 750;'>

</td>
</table>

<table border = 1 style = 'height: 30; width: 700; position: absolute; left: 15; top: 300; border-color: black;'>

<td style = 'min-width: 150; max-width: 150; overflow: hidden; border-color: black; text-align: center; font-weight: bold;'>
Learning Areas
</th>

<td style = 'min-width: 50; max-width: 50; overflow: hidden; border-color: black; text-align: center; font-weight: bold;'>
1st
</th>

<td style = 'min-width: 50; max-width: 50; overflow: hidden; border-color: black; text-align: center; font-weight: bold;'>
2nd
</th>

<td style = 'min-width: 50; max-width: 50; overflow: hidden; border-color: black; text-align: center; font-weight: bold;'>
3rd
</th>

<td style = 'min-width: 50; max-width: 50; overflow: hidden; border-color: black; text-align: center; font-weight: bold;'>
4th
</th>

<td style = 'min-width: 60; max-width: 60; overflow: hidden; border-color: black; text-align: center; font-weight: bold;'>
Average
</th>

<td style = 'min-width: 60; max-width: 60; overflow: hidden; border-color: black; text-align: center; font-weight: bold;'>
Remarks
</th>

</table>

<table border = 1 style = 'height: 30; width: 700; position: absolute; left: 15; top: 330; border-color: black;'>
<td style = 'min-width: 150; max-width: 150; overflow: hidden; border-color: transparent; text-align: left; font-weight: bold;'>
<input type = 'text' name = 'txtfil' id = 'txtfil' style = 'min-width: 200; max-width: 200; font-size: 15; border-color: transparent; border-radius: 5px; text-align: left;' readonly>
</th>

<td style = 'min-width: 50; max-width: 50; overflow: hidden; border-color: transparent; text-align: center; font-weight: bold;'>
<input type = 'number' name = 'txtfil1st' id = 'txtfil1st' style = 'min-width: 60; max-width: 60; font-size: 15; border-color: 28110d; border-radius: 5px; text-align: center;' readonly>
</th>

<td style = 'min-width: 50; max-width: 50; overflow: hidden; border-color: transparent; text-align: center; font-weight: bold;'>
<input type = 'number' name = 'txtfil2nd' id = 'txtfil2nd' style = 'min-width: 60; max-width: 60; font-size: 15; border-color: 28110d; border-radius: 5px; text-align: center;' readonly>
</th>

<td style = 'min-width: 50; max-width: 50; overflow: hidden; border-color: transparent; text-align: center; font-weight: bold;'>
<input type = 'number' name = 'txtfil3rd' id = 'txtfil3rd' style = 'min-width: 60; max-width: 60; font-size: 15; border-color: 28110d; border-radius: 5px; text-align: center;' readonly>
</th>

<td style = 'min-width: 50; max-width: 50; overflow: hidden; border-color: transparent; text-align: center; font-weight: bold;'>
<input type = 'number' name = 'txtfil4th' id = 'txtfil4th' style = 'min-width: 60; max-width: 60; font-size: 15; border-color: 28110d; border-radius: 5px; text-align: center;' readonly>
</th>

<td style = 'min-width: 60; max-width: 60; overflow: hidden; border-color: transparent; text-align: center; font-weight: bold;'>
<input type = 'number' name = 'txtfilave' id = 'txtfilave' style = 'min-width: 80; max-width: 80; font-size: 15; border-color: 28110d; border-radius: 5px; text-align: center; font-weight: bold;' readonly>
</th>

<td style = 'min-width: 60; max-width: 60; overflow: hidden; border-color: transparent; text-align: center; font-weight: bold;'>
<input type = 'text' name = 'txtfilremarks' id = 'txtfilremarks' style = 'min-width: 80; max-width: 80; font-size: 15; border-color: 28110d; border-radius: 5px; text-align: center; font-weight: bold;' readonly>
</th>

</table>

<table border = 1 style = 'height: 30; width: 700; position: absolute; left: 15; top: 360; border-color: black;'>

<td style = 'min-width: 150; max-width: 150; overflow: hidden; border-color: transparent; text-align: left; font-weight: bold;'>
<input type = 'text' name = 'txteng' id = 'txteng' style = 'min-width: 200; max-width: 200; font-size: 15; border-color: transparent; border-radius: 5px; text-align: left;' readonly>
</th>

<td style = 'min-width: 50; max-width: 50; overflow: hidden; border-color: transparent; text-align: center; font-weight: bold;'>
<input type = 'number' name = 'txteng1st' id = 'txteng1st' style = 'min-width: 60; max-width: 60; font-size: 15; border-color: 28110d; border-radius: 5px; text-align: center;' readonly>
</th>

<td style = 'min-width: 50; max-width: 50; overflow: hidden; border-color: transparent; text-align: center; font-weight: bold;'>
<input type = 'number' name = 'txteng2nd' id = 'txteng2nd' style = 'min-width: 60; max-width: 60; font-size: 15; border-color: 28110d; border-radius: 5px; text-align: center;' readonly>
</th>

<td style = 'min-width: 50; max-width: 50; overflow: hidden; border-color: transparent; text-align: center; font-weight: bold;'>
<input type = 'number' name = 'txteng3rd' id = 'txteng3rd' style = 'min-width: 60; max-width: 60; font-size: 15; border-color: 28110d; border-radius: 5px; text-align: center;' readonly>
</th>

<td style = 'min-width: 50; max-width: 50; overflow: hidden; border-color: transparent; text-align: center; font-weight: bold;'>
<input type = 'number' name = 'txteng4th' id = 'txteng4th' style = 'min-width: 60; max-width: 60; font-size: 15; border-color: 28110d; border-radius: 5px; text-align: center;' readonly>
</th>

<td style = 'min-width: 60; max-width: 60; overflow: hidden; border-color: transparent; text-align: center; font-weight: bold;'>
<input type = 'number' name = 'txtengave' id = 'txtengave' style = 'min-width: 80; max-width: 80; font-size: 15; border-color: 28110d; border-radius: 5px; text-align: center; font-weight: bold;' readonly>
</th>

<td style = 'min-width: 60; max-width: 60; overflow: hidden; border-color: transparent; text-align: center; font-weight: bold;'>
<input type = 'text' name = 'txtengremarks' id = 'txtengremarks' style = 'min-width: 80; max-width: 80; font-size: 15; border-color: 28110d; border-radius: 5px; text-align: center; font-weight: bold;' readonly>
</th>

</table>

<table border = 1 style = 'height: 30; width: 700; position: absolute; left: 15; top: 390; border-color: black;'>
<td style = 'min-width: 150; max-width: 150; overflow: hidden; border-color: transparent; text-align: left; font-weight: bold;'>
<input type = 'text' name = 'txtmath' id = 'txtmath' style = 'min-width: 200; max-width: 200; font-size: 15; border-color: transparent; border-radius: 5px; text-align: left;' readonly>
</th>

<td style = 'min-width: 50; max-width: 50; overflow: hidden; border-color: transparent; text-align: center; font-weight: bold;'>
<input type = 'number' name = 'txtmath1st' id = 'txtmath1st' style = 'min-width: 60; max-width: 60; font-size: 15; border-color: 28110d; border-radius: 5px; text-align: center;' readonly>
</th>

<td style = 'min-width: 50; max-width: 50; overflow: hidden; border-color: transparent; text-align: center; font-weight: bold;'>
<input type = 'number' name = 'txtmath2nd' id = 'txtmath2nd' style = 'min-width: 60; max-width: 60; font-size: 15; border-color: 28110d; border-radius: 5px; text-align: center;' readonly>
</th>

<td style = 'min-width: 50; max-width: 50; overflow: hidden; border-color: transparent; text-align: center; font-weight: bold;'>
<input type = 'number' name = 'txtmath3rd' id = 'txtmath3rd' style = 'min-width: 60; max-width: 60; font-size: 15; border-color: 28110d; border-radius: 5px; text-align: center;' readonly>
</th>

<td style = 'min-width: 50; max-width: 50; overflow: hidden; border-color: transparent; text-align: center; font-weight: bold;'>
<input type = 'number' name = 'txtmath4th' id = 'txtmath4th' style = 'min-width: 60; max-width: 60; font-size: 15; border-color: 28110d; border-radius: 5px; text-align: center;' readonly>
</th>

<td style = 'min-width: 60; max-width: 60; overflow: hidden; border-color: transparent; text-align: center; font-weight: bold;'>
<input type = 'number' name = 'txtmathave' id = 'txtmathave' style = 'min-width: 80; max-width: 80; font-size: 15; border-color: 28110d; border-radius: 5px; text-align: center; font-weight: bold;' readonly>
</th>

<td style = 'min-width: 60; max-width: 60; overflow: hidden; border-color: transparent; text-align: center; font-weight: bold;'>
<input type = 'text' name = 'txtmathremarks' id = 'txtmathremarks' style = 'min-width: 80; max-width: 80; font-size: 15; border-color: 28110d; border-radius: 5px; text-align: center; font-weight: bold;' readonly>
</th>

</table>

<table border = 1 style = 'height: 30; width: 700; position: absolute; left: 15; top: 420; border-color: black;'>
<td style = 'min-width: 150; max-width: 150; overflow: hidden; border-color: transparent; text-align: left; font-weight: bold;'>
<input type = 'text' name = 'txtsci' id = 'txtsci' style = 'min-width: 200; max-width: 200; font-size: 15; border-color: transparent; border-radius: 5px; text-align: left;' readonly>
</th>

<td style = 'min-width: 50; max-width: 50; overflow: hidden; border-color: transparent; text-align: center; font-weight: bold;'>
<input type = 'number' name = 'txtsci1st' id = 'txtsci1st' style = 'min-width: 60; max-width: 60; font-size: 15; border-color: 28110d; border-radius: 5px; text-align: center;' readonly>
</th>

<td style = 'min-width: 50; max-width: 50; overflow: hidden; border-color: transparent; text-align: center; font-weight: bold;'>
<input type = 'number' name = 'txtsci2nd' id = 'txtsci2nd' style = 'min-width: 60; max-width: 60; font-size: 15; border-color: 28110d; border-radius: 5px; text-align: center;' readonly>
</th>

<td style = 'min-width: 50; max-width: 50; overflow: hidden; border-color: transparent; text-align: center; font-weight: bold;'>
<input type = 'number' name = 'txtsci3rd' id = 'txtsci3rd' style = 'min-width: 60; max-width: 60; font-size: 15; border-color: 28110d; border-radius: 5px; text-align: center;' readonly>
</th>

<td style = 'min-width: 50; max-width: 50; overflow: hidden; border-color: transparent; text-align: center; font-weight: bold;'>
<input type = 'number' name = 'txtsci4th' id = 'txtsci4th' style = 'min-width: 60; max-width: 60; font-size: 15; border-color: 28110d; border-radius: 5px; text-align: center;' readonly>
</th>

<td style = 'min-width: 60; max-width: 60; overflow: hidden; border-color: transparent; text-align: center; font-weight: bold;'>
<input type = 'number' name = 'txtsciave' id = 'txtsciave' style = 'min-width: 80; max-width: 80; font-size: 15; border-color: 28110d; border-radius: 5px; text-align: center; font-weight: bold;' readonly>
</th>

<td style = 'min-width: 60; max-width: 60; overflow: hidden; border-color: transparent; text-align: center; font-weight: bold;'>
<input type = 'text' name = 'txtsciremarks' id = 'txtsciremarks' style = 'min-width: 80; max-width: 80; font-size: 15; border-color: 28110d; border-radius: 5px; text-align: center; font-weight: bold;' readonly>
</th>

</table>

<table border = 1 style = 'height: 30; width: 700; position: absolute; left: 15; top: 450; border-color: black;'>
<td style = 'min-width: 150; max-width: 150; overflow: hidden; border-color: transparent; text-align: left; font-weight: bold;'>
<input type = 'text' name = 'txtmkbyn' id = 'txtmkbyn' style = 'min-width: 200; max-width: 200; font-size: 15; border-color: transparent; border-radius: 5px; text-align: left;' readonly>
</th>

<td style = 'min-width: 50; max-width: 50; overflow: hidden; border-color: transparent; text-align: center; font-weight: bold;'>
<input type = 'number' name = 'txtmkbyn1st' id = 'txtmkbyn1st' style = 'min-width: 60; max-width: 60; font-size: 15; border-color: 28110d; border-radius: 5px; text-align: center; background-color: yellow;' readonly>
</th>

<td style = 'min-width: 50; max-width: 50; overflow: hidden; border-color: transparent; text-align: center; font-weight: bold;'>
<input type = 'number' name = 'txtmkbyn2nd' id = 'txtmkbyn2nd' style = 'min-width: 60; max-width: 60; font-size: 15; border-color: 28110d; border-radius: 5px; text-align: center;  background-color: yellow;' readonly>
</th>

<td style = 'min-width: 50; max-width: 50; overflow: hidden; border-color: transparent; text-align: center; font-weight: bold;'>
<input type = 'number' name = 'txtmkbyn3rd' id = 'txtmkbyn3rd' style = 'min-width: 60; max-width: 60; font-size: 15; border-color: 28110d; border-radius: 5px; text-align: center;  background-color: yellow;' readonly>
</th>

<td style = 'min-width: 50; max-width: 50; overflow: hidden; border-color: transparent; text-align: center; font-weight: bold;'>
<input type = 'number' name = 'txtmkbyn4th' id = 'txtmkbyn4th' style = 'min-width: 60; max-width: 60; font-size: 15; border-color: 28110d; border-radius: 5px; text-align: center;  background-color: yellow;' readonly>
</th>

<td style = 'min-width: 60; max-width: 60; overflow: hidden; border-color: transparent; text-align: center; font-weight: bold;'>
<input type = 'number' name = 'txtmkbynave' id = 'txtmkbynave' style = 'min-width: 80; max-width: 80; font-size: 15; border-color: 28110d; border-radius: 5px; text-align: center; font-weight: bold; background-color: yellow;' readonly>
</th>

<td style = 'min-width: 60; max-width: 60; overflow: hidden; border-color: transparent; text-align: center; font-weight: bold;'>
<input type = 'text' name = 'txtmkbynremarks' id = 'txtmkbynremarks' style = 'min-width: 80; max-width: 80; font-size: 15; border-color: 28110d; border-radius: 5px; text-align: center; font-weight: bold; background-color: yellow;' readonly>
</th>

</table>

<table border = 1 style = 'height: 30; width: 700; position: absolute; left: 15; top: 480; border-color: black;'>
<td style = 'min-width: 150; max-width: 150; overflow: hidden; border-color: transparent; text-align: left; font-weight: bold;'>
<input type = 'text' name = 'txtvalues' id = 'txtvalues' style = 'min-width: 200; max-width: 200; font-size: 15; border-color: transparent; border-radius: 5px; text-align: left;' readonly>
</th>

<td style = 'min-width: 50; max-width: 50; overflow: hidden; border-color: transparent; text-align: center; font-weight: bold;'>
<input type = 'number' name = 'txtvalues1st' id = 'txtvalues1st' style = 'min-width: 60; max-width: 60; font-size: 15; border-color: 28110d; border-radius: 5px; text-align: center;' readonly>
</th>

<td style = 'min-width: 50; max-width: 50; overflow: hidden; border-color: transparent; text-align: center; font-weight: bold;'>
<input type = 'number' name = 'txtvalues2nd' id = 'txtvalues2nd' style = 'min-width: 60; max-width: 60; font-size: 15; border-color: 28110d; border-radius: 5px; text-align: center;' readonly>
</th>

<td style = 'min-width: 50; max-width: 50; overflow: hidden; border-color: transparent; text-align: center; font-weight: bold;'>
<input type = 'number' name = 'txtvalues3rd' id = 'txtvalues3rd' style = 'min-width: 60; max-width: 60; font-size: 15; border-color: 28110d; border-radius: 5px; text-align: center;' readonly>
</th>

<td style = 'min-width: 50; max-width: 50; overflow: hidden; border-color: transparent; text-align: center; font-weight: bold;'>
<input type = 'number' name = 'txtvalues4th' id = 'txtvalues4th' style = 'min-width: 60; max-width: 60; font-size: 15; border-color: 28110d; border-radius: 5px; text-align: center;' readonly>
</th>

<td style = 'min-width: 60; max-width: 60; overflow: hidden; border-color: transparent; text-align: center; font-weight: bold;'>
<input type = 'number' name = 'txtvaluesave' id = 'txtvaluesave' style = 'min-width: 80; max-width: 80; font-size: 15; border-color: 28110d; border-radius: 5px; text-align: center; font-weight: bold;' readonly>
</th>

<td style = 'min-width: 60; max-width: 60; overflow: hidden; border-color: transparent; text-align: center; font-weight: bold;'>
<input type = 'text' name = 'txtvaluesremarks' id = 'txtvaluesremarks' style = 'min-width: 80; max-width: 80; font-size: 15; border-color: 28110d; border-radius: 5px; text-align: center; font-weight: bold;' readonly>
</th>

</table>

<table border = 1 style = 'height: 30; width: 700; position: absolute; left: 15; top: 510; border-color: black;'>
<td style = 'min-width: 150; max-width: 150; overflow: hidden; border-color: transparent; text-align: left; font-weight: bold;'>
<input type = 'text' name = 'txtap' id = 'txtap' style = 'min-width: 200; max-width: 200; font-size: 15; border-color: transparent; border-radius: 5px; text-align: left;' readonly>
</th>

<td style = 'min-width: 50; max-width: 50; overflow: hidden; border-color: transparent; text-align: center; font-weight: bold;'>
<input type = 'number' name = 'txtap1st' id = 'txtap1st' style = 'min-width: 60; max-width: 60; font-size: 15; border-color: 28110d; border-radius: 5px; text-align: center;' readonly>
</th>

<td style = 'min-width: 50; max-width: 50; overflow: hidden; border-color: transparent; text-align: center; font-weight: bold;'>
<input type = 'number' name = 'txtap2nd' id = 'txtap2nd' style = 'min-width: 60; max-width: 60; font-size: 15; border-color: 28110d; border-radius: 5px; text-align: center;' readonly>
</th>

<td style = 'min-width: 50; max-width: 50; overflow: hidden; border-color: transparent; text-align: center; font-weight: bold;'>
<input type = 'number' name = 'txtap3rd' id = 'txtap3rd' style = 'min-width: 60; max-width: 60; font-size: 15; border-color: 28110d; border-radius: 5px; text-align: center;' readonly>
</th>

<td style = 'min-width: 50; max-width: 50; overflow: hidden; border-color: transparent; text-align: center; font-weight: bold;'>
<input type = 'number' name = 'txtap4th' id = 'txtap4th' style = 'min-width: 60; max-width: 60; font-size: 15; border-color: 28110d; border-radius: 5px; text-align: center;' readonly>
</th>

<td style = 'min-width: 60; max-width: 60; overflow: hidden; border-color: transparent; text-align: center; font-weight: bold;'>
<input type = 'number' name = 'txtapave' id = 'txtapave' style = 'min-width: 80; max-width: 80; font-size: 15; border-color: 28110d; border-radius: 5px; text-align: center; font-weight: bold;' readonly>
</th>

<td style = 'min-width: 60; max-width: 60; overflow: hidden; border-color: transparent; text-align: center; font-weight: bold;'>
<input type = 'text' name = 'txtapremarks' id = 'txtapremarks' style = 'min-width: 80; max-width: 80; font-size: 15; border-color: 28110d; border-radius: 5px; text-align: center; font-weight: bold;' readonly>
</th>

</table>

<table border = 1 style = 'height: 30; width: 700; position: absolute; left: 15; top: 540; border-color: black;'>
<td style = 'min-width: 150; max-width: 150; overflow: hidden; border-color: transparent; text-align: left; font-weight: bold;'>
<input type = 'text' name = 'txttle' id = 'txttle' style = 'min-width: 200; max-width: 200; font-size: 15; border-color: transparent; border-radius: 5px; text-align: left;' readonly>
</th>

<td style = 'min-width: 50; max-width: 50; overflow: hidden; border-color: transparent; text-align: center; font-weight: bold;'>
<input type = 'number' name = 'txttle1st' id = 'txttle1st' style = 'min-width: 60; max-width: 60; font-size: 15; border-color: 28110d; border-radius: 5px; text-align: center;' >
</th>

<td style = 'min-width: 50; max-width: 50; overflow: hidden; border-color: transparent; text-align: center; font-weight: bold;'>
<input type = 'number' name = 'txttle2nd' id = 'txttle2nd' style = 'min-width: 60; max-width: 60; font-size: 15; border-color: 28110d; border-radius: 5px; text-align: center;' readonly>
</th>

<td style = 'min-width: 50; max-width: 50; overflow: hidden; border-color: transparent; text-align: center; font-weight: bold;'>
<input type = 'number' name = 'txttle3rd' id = 'txttle3rd' style = 'min-width: 60; max-width: 60; font-size: 15; border-color: 28110d; border-radius: 5px; text-align: center;' readonly>
</th>

<td style = 'min-width: 50; max-width: 50; overflow: hidden; border-color: transparent; text-align: center; font-weight: bold;'>
<input type = 'number' name = 'txttle4th' id = 'txttle4th' style = 'min-width: 60; max-width: 60; font-size: 15; border-color: 28110d; border-radius: 5px; text-align: center;' readonly>
</th>

<td style = 'min-width: 60; max-width: 60; overflow: hidden; border-color: transparent; text-align: center; font-weight: bold;'>
<input type = 'number' name = 'txttleave' id = 'txttleave' style = 'min-width: 80; max-width: 80; font-size: 15; border-color: 28110d; border-radius: 5px; text-align: center; font-weight: bold;' readonly>
</th>

<td style = 'min-width: 60; max-width: 60; overflow: hidden; border-color: transparent; text-align: center; font-weight: bold;'>
<input type = 'text' name = 'txttleremarks' id = 'txttleremarks' style = 'min-width: 80; max-width: 80; font-size: 15; border-color: 28110d; border-radius: 5px; text-align: center; font-weight: bold;' readonly>
</th>

</table>

<table border = 1 style = 'height: 30; width: 700; position: absolute; left: 15; top: 570; border-color: black;'>
<td style = 'min-width: 150; max-width: 150; overflow: hidden; border-color: transparent; text-align: left; font-weight: bold;'>
<input type = 'text' name = 'txtmapeh' id = 'txtmapeh' style = 'min-width: 200; max-width: 200; font-size: 15; border-color: transparent; border-radius: 5px; text-align: left;' readonly>
</th>

<td style = 'min-width: 50; max-width: 50; overflow: hidden; border-color: transparent; text-align: center; font-weight: bold;'>
<input type = 'number' name = 'txtmapeh1st' id = 'txtmapeh1st' style = 'min-width: 60; max-width: 60; font-size: 15; border-color: 28110d; border-radius: 5px; text-align: center; background-color: yellow;' readonly>
</th>

<td style = 'min-width: 50; max-width: 50; overflow: hidden; border-color: transparent; text-align: center; font-weight: bold;'>
<input type = 'number' name = 'txtmapeh2nd' id = 'txtmapeh2nd' style = 'min-width: 60; max-width: 60; font-size: 15; border-color: 28110d; border-radius: 5px; text-align: center; background-color: yellow;' readonly>
</th>

<td style = 'min-width: 50; max-width: 50; overflow: hidden; border-color: transparent; text-align: center; font-weight: bold;'>
<input type = 'number' name = 'txtmapeh3rd' id = 'txtmapeh3rd' style = 'min-width: 60; max-width: 60; font-size: 15; border-color: 28110d; border-radius: 5px; text-align: center; background-color: yellow;' readonly>
</th>

<td style = 'min-width: 50; max-width: 50; overflow: hidden; border-color: transparent; text-align: center; font-weight: bold;'>
<input type = 'number' name = 'txtmapeh4th' id = 'txtmapeh4th' style = 'min-width: 60; max-width: 60; font-size: 15; border-color: 28110d; border-radius: 5px; text-align: center; background-color: yellow;' readonly>
</th>

<td style = 'min-width: 60; max-width: 60; overflow: hidden; border-color: transparent; text-align: center; font-weight: bold;'>
<input type = 'number' name = 'txtmapehave' id = 'txtmapehave' style = 'min-width: 80; max-width: 80; font-size: 15; border-color: 28110d; border-radius: 5px; text-align: center; font-weight: bold; background-color: yellow;' readonly>
</th>

<td style = 'min-width: 60; max-width: 60; overflow: hidden; border-color: transparent; text-align: center; font-weight: bold;'>
<input type = 'text' name = 'txtmapehremarks' id = 'txtmapehremarks' style = 'min-width: 80; max-width: 80; font-size: 15; border-color: 28110d; border-radius: 5px; text-align: center; font-weight: bold; background-color: yellow;' readonly>
</th>

</table>

<table border = 1 style = 'height: 30; width: 700; position: absolute; left: 15; top: 600; border-color: black;'>
<td style = 'min-width: 150; max-width: 150; overflow: hidden; border-color: transparent; text-align: left; font-weight: bold;'>
<input type = 'text' name = 'txtmusic' id = 'txtmusic' style = 'position: absolute; left: 15; top: 4; min-width: 189; max-width: 189; font-size: 15; border-color: transparent; border-radius: 5px; text-align: left;' readonly>
</th>

<td style = 'min-width: 50; max-width: 50; overflow: hidden; border-color: transparent; text-align: center; font-weight: bold;'>
<input type = 'number' name = 'txtmusic1st' id = 'txtmusic1st' style = 'min-width: 60; max-width: 60; font-size: 15; border-color: 28110d; border-radius: 5px; text-align: center;' readonly>
</th>

<td style = 'min-width: 50; max-width: 50; overflow: hidden; border-color: transparent; text-align: center; font-weight: bold;'>
<input type = 'number' name = 'txtmusic2nd' id = 'txtmusic2nd' style = 'min-width: 60; max-width: 60; font-size: 15; border-color: 28110d; border-radius: 5px; text-align: center;' readonly>
</th>

<td style = 'min-width: 50; max-width: 50; overflow: hidden; border-color: transparent; text-align: center; font-weight: bold;'>
<input type = 'number' name = 'txtmusic3rd' id = 'txtmusic3rd' style = 'min-width: 60; max-width: 60; font-size: 15; border-color: 28110d; border-radius: 5px; text-align: center;' readonly>
</th>

<td style = 'min-width: 50; max-width: 50; overflow: hidden; border-color: transparent; text-align: center; font-weight: bold;'>
<input type = 'number' name = 'txtmusic4th' id = 'txtmusic4th' style = 'min-width: 60; max-width: 60; font-size: 15; border-color: 28110d; border-radius: 5px; text-align: center;' readonly>
</th>

<td style = 'min-width: 60; max-width: 60; overflow: hidden; border-color: transparent; text-align: center; font-weight: bold;'>
<input type = 'number' name = 'txtmusicave' id = 'txtmusicave' style = 'min-width: 80; max-width: 80; font-size: 15; border-color: 28110d; border-radius: 5px; text-align: center; font-weight: bold;' readonly>
</th>

<td style = 'min-width: 60; max-width: 60; overflow: hidden; border-color: transparent; text-align: center; font-weight: bold;'>
<input type = 'text' name = 'txtmusicremarks' id = 'txtmusicremarks' style = 'min-width: 80; max-width: 80; font-size: 15; border-color: 28110d; border-radius: 5px; text-align: center; font-weight: bold;' readonly>
</th>

</table>

<table border = 1 style = 'height: 30; width: 700; position: absolute; left: 15; top: 630; border-color: black;'>
<td style = 'min-width: 150; max-width: 150; overflow: hidden; border-color: transparent; text-align: left; font-weight: bold;'>
<input type = 'text' name = 'txtarts' id = 'txtarts' style = 'position: absolute; left: 15; top: 4; min-width: 189; max-width: 189; font-size: 15; border-color: transparent; border-radius: 5px; text-align: left;' readonly>
</th>

<td style = 'min-width: 50; max-width: 50; overflow: hidden; border-color: transparent; text-align: center; font-weight: bold;'>
<input type = 'number' name = 'txtarts1st' id = 'txtarts1st' style = 'min-width: 60; max-width: 60; font-size: 15; border-color: 28110d; border-radius: 5px; text-align: center;' readonly>
</th>

<td style = 'min-width: 50; max-width: 50; overflow: hidden; border-color: transparent; text-align: center; font-weight: bold;'>
<input type = 'number' name = 'txtarts2nd' id = 'txtarts2nd' style = 'min-width: 60; max-width: 60; font-size: 15; border-color: 28110d; border-radius: 5px; text-align: center;' readonly>
</th>

<td style = 'min-width: 50; max-width: 50; overflow: hidden; border-color: transparent; text-align: center; font-weight: bold;'>
<input type = 'number' name = 'txtarts3rd' id = 'txtarts3rd' style = 'min-width: 60; max-width: 60; font-size: 15; border-color: 28110d; border-radius: 5px; text-align: center;' readonly>
</th>

<td style = 'min-width: 50; max-width: 50; overflow: hidden; border-color: transparent; text-align: center; font-weight: bold;'>
<input type = 'number' name = 'txtarts4th' id = 'txtarts4th' style = 'min-width: 60; max-width: 60; font-size: 15; border-color: 28110d; border-radius: 5px; text-align: center;' readonly>
</th>

<td style = 'min-width: 60; max-width: 60; overflow: hidden; border-color: transparent; text-align: center; font-weight: bold;'>
<input type = 'number' name = 'txtartsave' id = 'txtartsave' style = 'min-width: 80; max-width: 80; font-size: 15; border-color: 28110d; border-radius: 5px; text-align: center; font-weight: bold;' readonly>
</th>

<td style = 'min-width: 60; max-width: 60; overflow: hidden; border-color: transparent; text-align: center; font-weight: bold;'>
<input type = 'text' name = 'txtartsremarks' id = 'txtartsremarks' style = 'min-width: 80; max-width: 80; font-size: 15; border-color: 28110d; border-radius: 5px; text-align: center; font-weight: bold;' readonly>
</th>

</table>

<table border = 1 style = 'height: 30; width: 700; position: absolute; left: 15; top: 660; border-color: black;'>
<td style = 'min-width: 150; max-width: 150; overflow: hidden; border-color: transparent; text-align: left; font-weight: bold;'>
<input type = 'text' name = 'txtpe' id = 'txtpe' style = 'position: absolute; left: 15; top: 4; min-width: 189; max-width: 189; font-size: 15; border-color: transparent; border-radius: 5px; text-align: left;' readonly>
</th>

<td style = 'min-width: 50; max-width: 50; overflow: hidden; border-color: transparent; text-align: center; font-weight: bold;'>
<input type = 'number' name = 'txtpe1st' id = 'txtpe1st' style = 'min-width: 60; max-width: 60; font-size: 15; border-color: 28110d; border-radius: 5px; text-align: center;' readonly>
</th>

<td style = 'min-width: 50; max-width: 50; overflow: hidden; border-color: transparent; text-align: center; font-weight: bold;'>
<input type = 'number' name = 'txtpe2nd' id = 'txtpe2nd' style = 'min-width: 60; max-width: 60; font-size: 15; border-color: 28110d; border-radius: 5px; text-align: center;' readonly>
</th>

<td style = 'min-width: 50; max-width: 50; overflow: hidden; border-color: transparent; text-align: center; font-weight: bold;'>
<input type = 'number' name = 'txtpe3rd' id = 'txtpe3rd' style = 'min-width: 60; max-width: 60; font-size: 15; border-color: 28110d; border-radius: 5px; text-align: center;' readonly>
</th>

<td style = 'min-width: 50; max-width: 50; overflow: hidden; border-color: transparent; text-align: center; font-weight: bold;'>
<input type = 'number' name = 'txtpe4th' id = 'txtpe4th' style = 'min-width: 60; max-width: 60; font-size: 15; border-color: 28110d; border-radius: 5px; text-align: center;' readonly>
</th>

<td style = 'min-width: 60; max-width: 60; overflow: hidden; border-color: transparent; text-align: center; font-weight: bold;'>
<input type = 'number' name = 'txtpeave' id = 'txtpeave' style = 'min-width: 80; max-width: 80; font-size: 15; border-color: 28110d; border-radius: 5px; text-align: center; font-weight: bold;' readonly>
</th>

<td style = 'min-width: 60; max-width: 60; overflow: hidden; border-color: transparent; text-align: center; font-weight: bold;'>
<input type = 'text' name = 'txtperemarks' id = 'txtperemarks' style = 'min-width: 80; max-width: 80; font-size: 15; border-color: 28110d; border-radius: 5px; text-align: center; font-weight: bold;' readonly>
</th>

</table>

<table border = 1 style = 'height: 30; width: 700; position: absolute; left: 15; top: 690; border-color: black;'>
<td style = 'min-width: 150; max-width: 150; overflow: hidden; border-color: transparent; text-align: left; font-weight: bold;'>
<input type = 'text' name = 'txthealth' id = 'txthealth' style = 'position: absolute; left: 15; top: 4; min-width: 189; max-width: 189; font-size: 15; border-color: transparent; border-radius: 5px; text-align: left;' readonly>
</th>

<td style = 'min-width: 50; max-width: 50; overflow: hidden; border-color: transparent; text-align: center; font-weight: bold;'>
<input type = 'number' name = 'txthealth1st' id = 'txthealth1st' style = 'min-width: 60; max-width: 60; font-size: 15; border-color: 28110d; border-radius: 5px; text-align: center;' readonly>
</th>

<td style = 'min-width: 50; max-width: 50; overflow: hidden; border-color: transparent; text-align: center; font-weight: bold;'>
<input type = 'number' name = 'txthealth2nd' id = 'txthealth2nd' style = 'min-width: 60; max-width: 60; font-size: 15; border-color: 28110d; border-radius: 5px; text-align: center;' readonly>
</th>

<td style = 'min-width: 50; max-width: 50; overflow: hidden; border-color: transparent; text-align: center; font-weight: bold;'>
<input type = 'number' name = 'txthealth3rd' id = 'txthealth3rd' style = 'min-width: 60; max-width: 60; font-size: 15; border-color: 28110d; border-radius: 5px; text-align: center;' readonly>
</th>

<td style = 'min-width: 50; max-width: 50; overflow: hidden; border-color: transparent; text-align: center; font-weight: bold;'>
<input type = 'number' name = 'txthealth4th' id = 'txthealth4th' style = 'min-width: 60; max-width: 60; font-size: 15; border-color: 28110d; border-radius: 5px; text-align: center;' readonly>
</th>

<td style = 'min-width: 60; max-width: 60; overflow: hidden; border-color: transparent; text-align: center; font-weight: bold;'>
<input type = 'number' name = 'txthealthave' id = 'txthealthave' style = 'min-width: 80; max-width: 80; font-size: 15; border-color: 28110d; border-radius: 5px; text-align: center; font-weight: bold;' readonly>
</th>

<td style = 'min-width: 60; max-width: 60; overflow: hidden; border-color: transparent; text-align: center; font-weight: bold;'>
<input type = 'text' name = 'txthealthremarks' id = 'txthealthremarks' style = 'min-width: 80; max-width: 80; font-size: 15; border-color: 28110d; border-radius: 5px; text-align: center; font-weight: bold;' readonly>
</th>

</table>

<table border = 1 style = 'height: 30; width: 700; position: absolute; left: 15; top: 720; border-color: black;'>
<td style = 'min-width: 150; max-width: 150; overflow: hidden; border-color: transparent; text-align: left; font-weight: bold;'>
<input type = 'text' name = 'txtcom' id = 'txtcom' style = 'min-width: 200; max-width: 200; font-size: 15; border-color: transparent; border-radius: 5px; text-align: left;' readonly>
</th>

<td style = 'min-width: 50; max-width: 50; overflow: hidden; border-color: transparent; text-align: center; font-weight: bold;'>
<input type = 'number' name = 'txtcom1st' id = 'txtcom1st' style = 'min-width: 60; max-width: 60; font-size: 15; border-color: 28110d; border-radius: 5px; text-align: center;' readonly>
</th>

<td style = 'min-width: 50; max-width: 50; overflow: hidden; border-color: transparent; text-align: center; font-weight: bold;'>
<input type = 'number' name = 'txtcom2nd' id = 'txtcom2nd' style = 'min-width: 60; max-width: 60; font-size: 15; border-color: 28110d; border-radius: 5px; text-align: center;' readonly>
</th>

<td style = 'min-width: 50; max-width: 50; overflow: hidden; border-color: transparent; text-align: center; font-weight: bold;'>
<input type = 'number' name = 'txtcom3rd' id = 'txtcom3rd' style = 'min-width: 60; max-width: 60; font-size: 15; border-color: 28110d; border-radius: 5px; text-align: center;' readonly>
</th>

<td style = 'min-width: 50; max-width: 50; overflow: hidden; border-color: transparent; text-align: center; font-weight: bold;'>
<input type = 'number' name = 'txtcom4th' id = 'txtcom4th' style = 'min-width: 60; max-width: 60; font-size: 15; border-color: 28110d; border-radius: 5px; text-align: center;' readonly>
</th>

<td style = 'min-width: 60; max-width: 60; overflow: hidden; border-color: transparent; text-align: center; font-weight: bold;'>
<input type = 'number' name = 'txtcomave' id = 'txtcomave' style = 'min-width: 80; max-width: 80; font-size: 15; border-color: 28110d; border-radius: 5px; text-align: center; font-weight: bold;' readonly>
</th>

<td style = 'min-width: 60; max-width: 60; overflow: hidden; border-color: transparent; text-align: center; font-weight: bold;'>
<input type = 'text' name = 'txtcomremarks' id = 'txtcomremarks' style = 'min-width: 80; max-width: 80; font-size: 15; border-color: 28110d; border-radius: 5px; text-align: center; font-weight: bold;' readonly>
</th>

</table>

<table border = 1 style = 'height: 30; width: 700; position: absolute; left: 15; top: 750; border-color: black;'>
<td style = 'min-width: 150; max-width: 150; overflow: hidden; border-color: transparent; text-align: left; font-weight: bold;'>
<input type = 'text' name = 'txtmt' id = 'txtmt' style = 'min-width: 200; max-width: 200; font-size: 15; border-color: transparent; border-radius: 5px; text-align: left;' readonly>
</th>

<td style = 'min-width: 50; max-width: 50; overflow: hidden; border-color: transparent; text-align: center; font-weight: bold;'>
<input type = 'number' name = 'txtmt1st' id = 'txtmt1st' style = 'min-width: 60; max-width: 60; font-size: 15; border-color: 28110d; border-radius: 5px; text-align: center;' readonly>
</th>

<td style = 'min-width: 50; max-width: 50; overflow: hidden; border-color: transparent; text-align: center; font-weight: bold;'>
<input type = 'number' name = 'txtmt2nd' id = 'txtmt2nd' style = 'min-width: 60; max-width: 60; font-size: 15; border-color: 28110d; border-radius: 5px; text-align: center;' readonly>
</th>

<td style = 'min-width: 50; max-width: 50; overflow: hidden; border-color: transparent; text-align: center; font-weight: bold;'>
<input type = 'number' name = 'txtmt3rd' id = 'txtmt3rd' style = 'min-width: 60; max-width: 60; font-size: 15; border-color: 28110d; border-radius: 5px; text-align: center;' readonly>
</th>

<td style = 'min-width: 50; max-width: 50; overflow: hidden; border-color: transparent; text-align: center; font-weight: bold;'>
<input type = 'number' name = 'txtmt4th' id = 'txtmt4th' style = 'min-width: 60; max-width: 60; font-size: 15; border-color: 28110d; border-radius: 5px; text-align: center;' readonly>
</th>

<td style = 'min-width: 60; max-width: 60; overflow: hidden; border-color: transparent; text-align: center; font-weight: bold;'>
<input type = 'number' name = 'txtmtave' id = 'txtmtave' style = 'min-width: 80; max-width: 80; font-size: 15; border-color: 28110d; border-radius: 5px; text-align: center; font-weight: bold;' readonly>
</th>

<td style = 'min-width: 60; max-width: 60; overflow: hidden; border-color: transparent; text-align: center; font-weight: bold;'>
<input type = 'text' name = 'txtmtremarks' id = 'txtmtremarks' style = 'min-width: 80; max-width: 80; font-size: 15; border-color: 28110d; border-radius: 5px; text-align: center; font-weight: bold;' readonly>
</th>

</table>

<table border = 1 style = 'height: 90; width: 700; position: absolute; left: 15; top: 720; border-color: transparent;'>
<td style = 'min-width: 150; max-width: 150; overflow: hidden; border-color: transparent; text-align: left; font-weight: bold;'>

</th>

</table>

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
echo"<p style = 'position: absolute; top: 15; left: 50; color: white; font-size: 25; font-weight: bold; min-width: 200; max:width: 200;'>";
echo"Welcome $row[access_level], $row[account_name]";
echo"</p>";
echo"<script>document.getElementById('txtaccesslevel').value = '$row[access_level]'</script>";
}

// Student Information
	
$txtusername = $_POST['txtusername'];

$sql = mysqli_query($cn, "select * from student_information where username = '$txtusername'");
$search = mysqli_num_rows($sql);

if($search == 1)
{
while($row = mysqli_fetch_assoc($sql))
{
echo"<script>document.getElementById('txtuser').value = '$row[username]'</script>";
echo"<script>document.getElementById('txtlrn').value = '$row[lrn]'</script>";
echo"<script>document.getElementById('txtlearnersname').value = '$row[learners_name]'</script>";
echo"<script>document.getElementById('cmbsy').value = '$row[school_year]'</script>";
echo"<script>document.getElementById('cmbyrsec').value = '$row[year_section]'</script>";
}
}

// School Year

$sql = mysqli_query($cn, "select * from grades_gma where username = '$txtusername' group by sy desc;");
$sy = mysqli_num_rows($sql);

echo"<datalist id = 'sy'>";
while($row = mysqli_fetch_assoc($sql))
{
echo"<option value = '$row[sy]'>";
}
echo"</datalist>";

// Year and Section

$sql = mysqli_query($cn, "select * from grades_gma where username = '$txtusername' group by sy desc;");
$yr_sec = mysqli_num_rows($sql);

echo"<datalist id = 'yrsec'>";
while($row = mysqli_fetch_assoc($sql))
{
echo"<option value = '$row[yr_sec]'>";
}
echo"</datalist>";

// Data Table

if(isset($_POST['okay']))
{

$txtuser = $_POST['txtuser'];
$cmbsy = $_POST['cmbsy'];
$cmbyrsec = $_POST['cmbyrsec'];

// Invalid School Year

if(!empty($cmbsy))
{
$sql = mysqli_query($cn, "select * from school_year where sy = '$cmbsy'");
$sy = mysqli_num_rows($sql);
if($sy == 0)
{
echo "<script>alert('Invalid School Year')</script>";
}
}

// Invalid Year and Section

if(!empty($cmbyrsec))
{
$sql = mysqli_query($cn, "select * from subjects_gma where yr_sec = '$cmbyrsec'");
$yrsec = mysqli_num_rows($sql);
if($yrsec == 0)
{
echo "<script>alert('Invalid Year and Section')</script>";
}
}

// Student Information

$sql = mysqli_query($cn, "select * from student_information where username = '$txtuser'");
$search = mysqli_num_rows($sql);
if($search == 1)
{
while($row = mysqli_fetch_assoc($sql))
{
echo"<script>document.getElementById('txtuser').value = '$row[username]'</script>";
echo"<script>document.getElementById('txtlrn').value = '$row[lrn]'</script>";
echo"<script>document.getElementById('txtlearnersname').value = '$row[learners_name]'</script>";
}
}

// School Year and Section

$sql = mysqli_query($cn, "select * from grades_gma where username = '$txtuser' and sy = '$cmbsy' and yr_sec = '$cmbyrsec' group by yr_sec;");
$yrsec = mysqli_num_rows($sql);
if($yrsec == 1)
{
while($row = mysqli_fetch_assoc($sql))
{
echo"<script>document.getElementById('cmbsy').value = '$row[sy]'</script>";
echo"<script>document.getElementById('cmbyrsec').value = '$row[yr_sec]'</script>";
}
}

// Subjects

$sql = mysqli_query($cn, "select * from subjects_gma where yr_sec = '$cmbyrsec'");
$subjdesc = mysqli_num_rows($sql);
if($subjdesc == 1)
{
while($row = mysqli_fetch_assoc($sql))
{
echo"<script>document.getElementById('txteng').value = '$row[subj1]'</script>";
echo"<script>document.getElementById('txtmath').value = '$row[subj2]'</script>";
echo"<script>document.getElementById('txtsci').value = '$row[subj3]'</script>";
echo"<script>document.getElementById('txtfil').value = '$row[subj4]'</script>";

// Araling Panlipunan
echo"<script>document.getElementById('txtap').value = '$row[subj5]'</script>";
echo"<script>
if(document.getElementById('txtap').value != '')
{
document.getElementById('txtap').type = 'text'
document.getElementById('txtap1st').type = 'number'
document.getElementById('txtap2nd').type = 'number'
document.getElementById('txtap3rd').type = 'number'
document.getElementById('txtap4th').type = 'number'
document.getElementById('txtapave').type = 'number'
document.getElementById('txtapremarks').type = 'text'
}
else
{
document.getElementById('txtap').type = 'hidden'
document.getElementById('txtap1st').type = 'hidden'
document.getElementById('txtap2nd').type = 'hidden'
document.getElementById('txtap3rd').type = 'hidden'
document.getElementById('txtap4th').type = 'hidden'
document.getElementById('txtapave').type = 'hidden'
document.getElementById('txtapremarks').type = 'hidden'
}
</script>";

// MAPEH
echo"<script>document.getElementById('txtmapeh').value = '$row[subj6]'</script>";
echo"<script>
if(document.getElementById('txtmapeh').value != '')
{
document.getElementById('txtmapeh').type = 'text'
document.getElementById('txtmapeh1st').type = 'number'
document.getElementById('txtmapeh2nd').type = 'number'
document.getElementById('txtmapeh3rd').type = 'number'
document.getElementById('txtmapeh4th').type = 'number'
document.getElementById('txtmapehave').type = 'number'
document.getElementById('txtmapehremarks').type = 'text'
}
else
{
document.getElementById('txtmapeh').type = 'hidden'
document.getElementById('txtmapeh1st').type = 'hidden'
document.getElementById('txtmapeh2nd').type = 'hidden'
document.getElementById('txtmapeh3rd').type = 'hidden'
document.getElementById('txtmapeh4th').type = 'hidden'
document.getElementById('txtmapehave').type = 'hidden'
document.getElementById('txtmapehremarks').type = 'hidden'
}
</script>";

// Music
echo"<script>document.getElementById('txtmusic').value = '$row[subj7]'</script>";
echo"<script>
if(document.getElementById('txtmusic').value != '')
{
document.getElementById('txtmusic').type = 'text'
document.getElementById('txtmusic1st').type = 'number'
document.getElementById('txtmusic2nd').type = 'number'
document.getElementById('txtmusic3rd').type = 'number'
document.getElementById('txtmusic4th').type = 'number'
document.getElementById('txtmusicave').type = 'number'
document.getElementById('txtmusicremarks').type = 'text'
}
else
{
document.getElementById('txtmusic').type = 'hidden'
document.getElementById('txtmusic1st').type = 'hidden'
document.getElementById('txtmusic2nd').type = 'hidden'
document.getElementById('txtmusic3rd').type = 'hidden'
document.getElementById('txtmusic4th').type = 'hidden'
document.getElementById('txtmusicave').type = 'hidden'
document.getElementById('txtmusicremarks').type = 'hidden'
}
</script>";

// Arts
echo"<script>document.getElementById('txtarts').value = '$row[subj8]'</script>";
echo"<script>
if(document.getElementById('txtarts').value != '')
{
document.getElementById('txtarts').type = 'text'
document.getElementById('txtarts1st').type = 'number'
document.getElementById('txtarts2nd').type = 'number'
document.getElementById('txtarts3rd').type = 'number'
document.getElementById('txtarts4th').type = 'number'
document.getElementById('txtartsave').type = 'number'
document.getElementById('txtartsremarks').type = 'text'
}
else
{
document.getElementById('txtarts').type = 'hidden'
document.getElementById('txtarts1st').type = 'hidden'
document.getElementById('txtarts2nd').type = 'hidden'
document.getElementById('txtarts3rd').type = 'hidden'
document.getElementById('txtarts4th').type = 'hidden'
document.getElementById('txtartsave').type = 'hidden'
document.getElementById('txtartsremarks').type = 'hidden'
}
</script>";

// PE
echo"<script>document.getElementById('txtpe').value = '$row[subj9]'</script>";
echo"<script>
if(document.getElementById('txtpe').value != '')
{
document.getElementById('txtpe').type = 'text'
document.getElementById('txtpe1st').type = 'number'
document.getElementById('txtpe2nd').type = 'number'
document.getElementById('txtpe3rd').type = 'number'
document.getElementById('txtpe4th').type = 'number'
document.getElementById('txtpeave').type = 'number'
document.getElementById('txtperemarks').type = 'text'
}
else
{
document.getElementById('txtpe').type = 'hidden'
document.getElementById('txtpe1st').type = 'hidden'
document.getElementById('txtpe2nd').type = 'hidden'
document.getElementById('txtpe3rd').type = 'hidden'
document.getElementById('txtpe4th').type = 'hidden'
document.getElementById('txtpeave').type = 'hidden'
document.getElementById('txtperemarks').type = 'hidden'
}
</script>";

echo"<script>document.getElementById('txthealth').value = '$row[subj10]'</script>";
echo"<script>
if(document.getElementById('txthealth').value != '')
{
document.getElementById('txthealth').type = 'text'
document.getElementById('txthealth1st').type = 'number'
document.getElementById('txthealth2nd').type = 'number'
document.getElementById('txthealth3rd').type = 'number'
document.getElementById('txthealth4th').type = 'number'
document.getElementById('txthealthave').type = 'number'
document.getElementById('txthealthremarks').type = 'text'
}
else
{
document.getElementById('txthealth').type = 'hidden'
document.getElementById('txthealth1st').type = 'hidden'
document.getElementById('txthealth2nd').type = 'hidden'
document.getElementById('txthealth3rd').type = 'hidden'
document.getElementById('txthealth4th').type = 'hidden'
document.getElementById('txthealthave').type = 'hidden'
document.getElementById('txthealthremarks').type = 'hidden'
}
</script>";

// HELE/TLE
echo"<script>document.getElementById('txttle').value = '$row[subj11]'</script>";
echo"<script>
if(document.getElementById('txttle').value != '')
{
document.getElementById('txttle').type = 'text'
document.getElementById('txttle1st').type = 'number'
document.getElementById('txttle2nd').type = 'number'
document.getElementById('txttle3rd').type = 'number'
document.getElementById('txttle4th').type = 'number'
document.getElementById('txttleave').type = 'number'
document.getElementById('txttleremarks').type = 'text'
}
else
{
document.getElementById('txttle').type = 'hidden'
document.getElementById('txttle1st').type = 'hidden'
document.getElementById('txttle2nd').type = 'hidden'
document.getElementById('txttle3rd').type = 'hidden'
document.getElementById('txttle4th').type = 'hidden'
document.getElementById('txttleave').type = 'hidden'
document.getElementById('txttleremarks').type = 'hidden'
}
</script>";

echo"<script>document.getElementById('txtvalues').value = '$row[subj12]'</script>";

// Computer
echo"<script>document.getElementById('txtcom').value = '$row[subj13]'</script>";
echo"<script>
if(document.getElementById('txtcom').value != '')
{
document.getElementById('txtcom').type = 'text'
document.getElementById('txtcom1st').type = 'number'
document.getElementById('txtcom2nd').type = 'number'
document.getElementById('txtcom3rd').type = 'number'
document.getElementById('txtcom4th').type = 'number'
document.getElementById('txtcomave').type = 'number'
document.getElementById('txtcomremarks').type = 'text'
}
else
{
document.getElementById('txtcom').type = 'hidden'
document.getElementById('txtcom1st').type = 'hidden'
document.getElementById('txtcom2nd').type = 'hidden'
document.getElementById('txtcom3rd').type = 'hidden'
document.getElementById('txtcom4th').type = 'hidden'
document.getElementById('txtcomave').type = 'hidden'
document.getElementById('txtcomremarks').type = 'hidden'
}
</script>";

// Makabayan
echo"<script>document.getElementById('txtmkbyn').value = '$row[subj14]'</script>";
echo"<script>
if(document.getElementById('txtmkbyn').value != '')
{
document.getElementById('txtmkbyn').type = 'text'
document.getElementById('txtmkbyn1st').type = 'number'
document.getElementById('txtmkbyn2nd').type = 'number'
document.getElementById('txtmkbyn3rd').type = 'number'
document.getElementById('txtmkbyn4th').type = 'number'
document.getElementById('txtmkbynave').type = 'number'
document.getElementById('txtmkbynremarks').type = 'text'
}
else
{
document.getElementById('txtmkbyn').type = 'hidden'
document.getElementById('txtmkbyn1st').type = 'hidden'
document.getElementById('txtmkbyn2nd').type = 'hidden'
document.getElementById('txtmkbyn3rd').type = 'hidden'
document.getElementById('txtmkbyn4th').type = 'hidden'
document.getElementById('txtmkbynave').type = 'hidden'
document.getElementById('txtmkbynremarks').type = 'hidden'
}
</script>";

// Mother Tongue
echo"<script>document.getElementById('txtmt').value = '$row[subj15]'</script>";
echo"<script>
if(document.getElementById('txtmt').value != '')
{
document.getElementById('txtmt').type = 'text'
document.getElementById('txtmt1st').type = 'number'
document.getElementById('txtmt2nd').type = 'number'
document.getElementById('txtmt3rd').type = 'number'
document.getElementById('txtmt4th').type = 'number'
document.getElementById('txtmtave').type = 'number'
document.getElementById('txtmtremarks').type = 'text'
}
else
{
document.getElementById('txtmt').type = 'hidden'
document.getElementById('txtmt1st').type = 'hidden'
document.getElementById('txtmt2nd').type = 'hidden'
document.getElementById('txtmt3rd').type = 'hidden'
document.getElementById('txtmt4th').type = 'hidden'
document.getElementById('txtmtave').type = 'hidden'
document.getElementById('txtmtremarks').type = 'hidden'
}
</script>";

}
}

// English

$txteng = $_POST['txteng'];

$sql = mysqli_query($cn, "select * from grades_gma where username = '$txtuser' and sy = '$cmbsy' and subj_desc = '$txteng'");
$grades = mysqli_num_rows($sql);
if($grades == 1)
{
while($row = mysqli_fetch_assoc($sql))
{
echo"<script>document.getElementById('txteng1st').value = '$row[firstQtr]'</script>";
echo"<script>document.getElementById('txteng2nd').value = '$row[secondQtr]'</script>";
echo"<script>document.getElementById('txteng3rd').value = '$row[thirdQtr]'</script>";
echo"<script>document.getElementById('txteng4th').value = '$row[fourthQtr]'</script>";
echo"<script>document.getElementById('txtengave').value = '$row[ave]'</script>";
echo"<script>document.getElementById('txtengremarks').value = '$row[remarks]'</script>";
}
}

// Mathematics

$txtmath = $_POST['txtmath'];

$sql = mysqli_query($cn, "select * from grades_gma where username = '$txtuser' and sy = '$cmbsy' and subj_desc = '$txtmath'");
$grades = mysqli_num_rows($sql);
if($grades == 1)
{
while($row = mysqli_fetch_assoc($sql))
{
echo"<script>document.getElementById('txtmath1st').value = '$row[firstQtr]'</script>";
echo"<script>document.getElementById('txtmath2nd').value = '$row[secondQtr]'</script>";
echo"<script>document.getElementById('txtmath3rd').value = '$row[thirdQtr]'</script>";
echo"<script>document.getElementById('txtmath4th').value = '$row[fourthQtr]'</script>";
echo"<script>document.getElementById('txtmathave').value = '$row[ave]'</script>";
echo"<script>document.getElementById('txtmathremarks').value = '$row[remarks]'</script>";
}
}

// Science

$txtsci = $_POST['txtsci'];

$sql = mysqli_query($cn, "select * from grades_gma where username = '$txtuser' and sy = '$cmbsy' and subj_desc = '$txtsci'");
$grades = mysqli_num_rows($sql);
if($grades == 1)
{
while($row = mysqli_fetch_assoc($sql))
{
echo"<script>document.getElementById('txtsci1st').value = '$row[firstQtr]'</script>";
echo"<script>document.getElementById('txtsci2nd').value = '$row[secondQtr]'</script>";
echo"<script>document.getElementById('txtsci3rd').value = '$row[thirdQtr]'</script>";
echo"<script>document.getElementById('txtsci4th').value = '$row[fourthQtr]'</script>";
echo"<script>document.getElementById('txtsciave').value = '$row[ave]'</script>";
echo"<script>document.getElementById('txtsciremarks').value = '$row[remarks]'</script>";
}
}

// Filipino

$txtfil = $_POST['txtfil'];

$sql = mysqli_query($cn, "select * from grades_gma where username = '$txtuser' and sy = '$cmbsy' and subj_desc = '$txtfil'");
$grades = mysqli_num_rows($sql);
if($grades == 1)
{
while($row = mysqli_fetch_assoc($sql))
{
echo"<script>document.getElementById('txtfil1st').value = '$row[firstQtr]'</script>";
echo"<script>document.getElementById('txtfil2nd').value = '$row[secondQtr]'</script>";
echo"<script>document.getElementById('txtfil3rd').value = '$row[thirdQtr]'</script>";
echo"<script>document.getElementById('txtfil4th').value = '$row[fourthQtr]'</script>";
echo"<script>document.getElementById('txtfilave').value = '$row[ave]'</script>";
echo"<script>document.getElementById('txtfilremarks').value = '$row[remarks]'</script>";
}
}

// Araling Panlipunan

$txtap = $_POST['txtap'];

$sql = mysqli_query($cn, "select * from grades_gma where username = '$txtuser' and sy = '$cmbsy' and subj_desc = '$txtap'");
$grades = mysqli_num_rows($sql);
if($grades == 1)
{
while($row = mysqli_fetch_assoc($sql))
{
echo"<script>document.getElementById('txtap1st').value = '$row[firstQtr]'</script>";
echo"<script>document.getElementById('txtap2nd').value = '$row[secondQtr]'</script>";
echo"<script>document.getElementById('txtap3rd').value = '$row[thirdQtr]'</script>";
echo"<script>document.getElementById('txtap4th').value = '$row[fourthQtr]'</script>";
echo"<script>document.getElementById('txtapave').value = '$row[ave]'</script>";
echo"<script>document.getElementById('txtapremarks').value = '$row[remarks]'</script>";
}
}

// MAPEH

$txtmapeh = $_POST['txtmapeh'];

$sql = mysqli_query($cn, "select * from grades_gma where username = '$txtuser' and sy = '$cmbsy' and subj_desc = '$txtmapeh'");
$grades = mysqli_num_rows($sql);
if($grades == 1)
{
while($row = mysqli_fetch_assoc($sql))
{
echo"<script>document.getElementById('txtmapeh1st').value = '$row[firstQtr]'</script>";
echo"<script>document.getElementById('txtmapeh2nd').value = '$row[secondQtr]'</script>";
echo"<script>document.getElementById('txtmapeh3rd').value = '$row[thirdQtr]'</script>";
echo"<script>document.getElementById('txtmapeh4th').value = '$row[fourthQtr]'</script>";
echo"<script>document.getElementById('txtmapehave').value = '$row[ave]'</script>";
echo"<script>document.getElementById('txtmapehremarks').value = '$row[remarks]'</script>";
}
}

// Music

$txtmusic = $_POST['txtmusic'];

$sql = mysqli_query($cn, "select * from grades_gma where username = '$txtuser' and sy = '$cmbsy' and subj_desc = '$txtmusic'");
$grades = mysqli_num_rows($sql);
if($grades == 1)
{
while($row = mysqli_fetch_assoc($sql))
{
echo"<script>document.getElementById('txtmusic1st').value = '$row[firstQtr]'</script>";
echo"<script>document.getElementById('txtmusic2nd').value = '$row[secondQtr]'</script>";
echo"<script>document.getElementById('txtmusic3rd').value = '$row[thirdQtr]'</script>";
echo"<script>document.getElementById('txtmusic4th').value = '$row[fourthQtr]'</script>";
echo"<script>document.getElementById('txtmusicave').value = '$row[ave]'</script>";
echo"<script>document.getElementById('txtmusicremarks').value = '$row[remarks]'</script>";
}
}

// Arts

$txtarts = $_POST['txtarts'];

$sql = mysqli_query($cn, "select * from grades_gma where username = '$txtuser' and sy = '$cmbsy' and subj_desc = '$txtarts'");
$grades = mysqli_num_rows($sql);
if($grades == 1)
{
while($row = mysqli_fetch_assoc($sql))
{
echo"<script>document.getElementById('txtarts1st').value = '$row[firstQtr]'</script>";
echo"<script>document.getElementById('txtarts2nd').value = '$row[secondQtr]'</script>";
echo"<script>document.getElementById('txtarts3rd').value = '$row[thirdQtr]'</script>";
echo"<script>document.getElementById('txtarts4th').value = '$row[fourthQtr]'</script>";
echo"<script>document.getElementById('txtartsave').value = '$row[ave]'</script>";
echo"<script>document.getElementById('txtartsremarks').value = '$row[remarks]'</script>";
}
}

// PE

$txtpe = $_POST['txtpe'];

$sql = mysqli_query($cn, "select * from grades_gma where username = '$txtuser' and sy = '$cmbsy' and subj_desc = '$txtpe'");
$grades = mysqli_num_rows($sql);
if($grades == 1)
{
while($row = mysqli_fetch_assoc($sql))
{
echo"<script>document.getElementById('txtpe1st').value = '$row[firstQtr]'</script>";
echo"<script>document.getElementById('txtpe2nd').value = '$row[secondQtr]'</script>";
echo"<script>document.getElementById('txtpe3rd').value = '$row[thirdQtr]'</script>";
echo"<script>document.getElementById('txtpe4th').value = '$row[fourthQtr]'</script>";
echo"<script>document.getElementById('txtpeave').value = '$row[ave]'</script>";
echo"<script>document.getElementById('txtperemarks').value = '$row[remarks]'</script>";
}
}

// Health

$txthealth = $_POST['txthealth'];

$sql = mysqli_query($cn, "select * from grades_gma where username = '$txtuser' and sy = '$cmbsy' and subj_desc = '$txthealth'");
$grades = mysqli_num_rows($sql);
if($grades == 1)
{
while($row = mysqli_fetch_assoc($sql))
{
echo"<script>document.getElementById('txthealth1st').value = '$row[firstQtr]'</script>";
echo"<script>document.getElementById('txthealth2nd').value = '$row[secondQtr]'</script>";
echo"<script>document.getElementById('txthealth3rd').value = '$row[thirdQtr]'</script>";
echo"<script>document.getElementById('txthealth4th').value = '$row[fourthQtr]'</script>";
echo"<script>document.getElementById('txthealthave').value = '$row[ave]'</script>";
echo"<script>document.getElementById('txthealthremarks').value = '$row[remarks]'</script>";
}
}

// T.L.E.

$txttle = $_POST['txttle'];

$sql = mysqli_query($cn, "select * from grades_gma where username = '$txtuser' and sy = '$cmbsy' and subj_desc = '$txttle'");
$grades = mysqli_num_rows($sql);
if($grades == 1)
{
while($row = mysqli_fetch_assoc($sql))
{
echo"<script>document.getElementById('txttle1st').value = '$row[firstQtr]'</script>";
echo"<script>document.getElementById('txttle2nd').value = '$row[secondQtr]'</script>";
echo"<script>document.getElementById('txttle3rd').value = '$row[thirdQtr]'</script>";
echo"<script>document.getElementById('txttle4th').value = '$row[fourthQtr]'</script>";
echo"<script>document.getElementById('txttleave').value = '$row[ave]'</script>";
echo"<script>document.getElementById('txttleremarks').value = '$row[remarks]'</script>";
}
}

// Values

$txtvalues = $_POST['txtvalues'];

$sql = mysqli_query($cn, "select * from grades_gma where username = '$txtuser' and sy = '$cmbsy' and subj_desc = '$txtvalues'");
$grades = mysqli_num_rows($sql);
if($grades == 1)
{
while($row = mysqli_fetch_assoc($sql))
{
echo"<script>document.getElementById('txtvalues1st').value = '$row[firstQtr]'</script>";
echo"<script>document.getElementById('txtvalues2nd').value = '$row[secondQtr]'</script>";
echo"<script>document.getElementById('txtvalues3rd').value = '$row[thirdQtr]'</script>";
echo"<script>document.getElementById('txtvalues4th').value = '$row[fourthQtr]'</script>";
echo"<script>document.getElementById('txtvaluesave').value = '$row[ave]'</script>";
echo"<script>document.getElementById('txtvaluesremarks').value = '$row[remarks]'</script>";
}
}

// Computer

$txtcom = $_POST['txtcom'];

$sql = mysqli_query($cn, "select * from grades_gma where username = '$txtuser' and sy = '$cmbsy' and subj_desc = '$txtcom'");
$grades = mysqli_num_rows($sql);
if($grades == 1)
{
while($row = mysqli_fetch_assoc($sql))
{
echo"<script>document.getElementById('txtcom1st').value = '$row[firstQtr]'</script>";
echo"<script>document.getElementById('txtcom2nd').value = '$row[secondQtr]'</script>";
echo"<script>document.getElementById('txtcom3rd').value = '$row[thirdQtr]'</script>";
echo"<script>document.getElementById('txtcom4th').value = '$row[fourthQtr]'</script>";
echo"<script>document.getElementById('txtcomave').value = '$row[ave]'</script>";
echo"<script>document.getElementById('txtcomremarks').value = '$row[remarks]'</script>";
}
}

// Makabayan

$txtmkbyn = $_POST['txtmkbyn'];

$sql = mysqli_query($cn, "select * from grades_gma where username = '$txtuser' and sy = '$cmbsy' and subj_desc = '$txtmkbyn'");
$grades = mysqli_num_rows($sql);
if($grades == 1)
{
while($row = mysqli_fetch_assoc($sql))
{
echo"<script>document.getElementById('txtmkbyn1st').value = '$row[firstQtr]'</script>";
echo"<script>document.getElementById('txtmkbyn2nd').value = '$row[secondQtr]'</script>";
echo"<script>document.getElementById('txtmkbyn3rd').value = '$row[thirdQtr]'</script>";
echo"<script>document.getElementById('txtmkbyn4th').value = '$row[fourthQtr]'</script>";
echo"<script>document.getElementById('txtmkbynave').value = '$row[ave]'</script>";
echo"<script>document.getElementById('txtmkbynremarks').value = '$row[remarks]'</script>";
}
}

// Mother Tongue

$txtmt = $_POST['txtmt'];

$sql = mysqli_query($cn, "select * from grades_gma where username = '$txtuser' and sy = '$cmbsy' and subj_desc = '$txtmt'");
$grades = mysqli_num_rows($sql);
if($grades == 1)
{
while($row = mysqli_fetch_assoc($sql))
{
echo"<script>document.getElementById('txtmt1st').value = '$row[firstQtr]'</script>";
echo"<script>document.getElementById('txtmt2nd').value = '$row[secondQtr]'</script>";
echo"<script>document.getElementById('txtmt3rd').value = '$row[thirdQtr]'</script>";
echo"<script>document.getElementById('txtmt4th').value = '$row[fourthQtr]'</script>";
echo"<script>document.getElementById('txtmtave').value = '$row[ave]'</script>";
echo"<script>document.getElementById('txtmtremarks').value = '$row[remarks]'</script>";
}
}

echo"<script>document.getElementById('btnsave').disabled = false</script>";

$sql = mysqli_query($cn, "select * from grades_gma where username = '$txtuser' and sy = '$cmbsy' and yr_sec = '$cmbyrsec'");
$search = mysqli_num_rows($sql);
if($search == 0)
{
echo "<script>alert('No Record Found')</script>";
}

}

// Save

if(isset($_POST['save']))
{

$txtuser = $_POST['txtuser'];
$txtlrn = $_POST['txtlrn'];
$txtlearnersname = $_POST['txtlearnersname'];
$cmbsy = $_POST['cmbsy'];
$cmbyrsec = $_POST['cmbyrsec'];

$txtmath = $_POST['txtmath'];
$txtsci = $_POST['txtsci'];
$txtfil = $_POST['txtfil'];
$txtap = $_POST['txtap'];
$txtmapeh = $_POST['txtmapeh'];
$txtmusic = $_POST['txtmusic'];
$txtarts = $_POST['txtarts'];
$txtpe = $_POST['txtpe'];
$txthealth = $_POST['txthealth'];
$txttle = $_POST['txttle'];
$txtvalues = $_POST['txtvalues'];

// Invalid School Year

if(!empty($cmbsy))
{
$sql = mysqli_query($cn, "select * from school_year where sy = '$cmbsy'");
$sy = mysqli_num_rows($sql);
if($sy == 0)
{
echo "<script>alert('Invalid School Year')</script>";
}
}

// Invalid Year and Section

if(!empty($cmbyrsec))
{
$sql = mysqli_query($cn, "select * from subjects_gma where yr_sec = '$cmbyrsec'");
$yrsec = mysqli_num_rows($sql);
if($yrsec == 0)
{
echo "<script>alert('Invalid Year and Section')</script>";
}
}

if(!empty($cmbsy) && $sy == 1
&& !empty($cmbyrsec) && $yrsec == 1)
{

// English

$txteng = $_POST['txteng'];
$txteng1st = $_POST['txteng1st'];
$txteng2nd = $_POST['txteng2nd'];
$txteng3rd = $_POST['txteng3rd'];
$txteng4th = $_POST['txteng4th'];
$txtengave = $_POST['txtengave'];
$txtengremarks = $_POST['txtengremarks'];

if(!empty($txteng))
{
$sql = mysqli_query($cn, "select * from grades_gma where username = '$txtuser' and subj_desc = '$txteng'");
$subjdesc = mysqli_num_rows($sql);
if($subjdesc == 0)
{
$sql = mysqli_query($cn, "insert into grades_gma (username, lrn, learners_name, sy, yr_sec, subj_desc, firstQtr, secondQtr, thirdQtr, fourthQtr, ave, remarks) values ('$txtuser', '$txtlrn', '$txtlearnersname', '$cmbsy', '$cmbyrsec', '$txteng', '$txteng1st', '$txteng2nd', '$txteng3rd', '$txteng4th', '$txtengave', '$txtengremarks')");
}
else
{
$sql = mysqli_query($cn, "update grades_gma set sy = '$cmbsy', yr_sec = '$cmbyrsec', subj_desc = '$txteng', firstQtr = '$txteng1st', secondQtr = '$txteng2nd', thirdQtr = '$txteng3rd', fourthQtr = '$txteng4th', ave = '$txtengave', remarks = '$txtengremarks' where username = '$txtuser' and subj_desc = '$txteng'");
}
}

// Mathematics

$txtmath = $_POST['txtmath'];
$txtmath1st = $_POST['txtmath1st'];
$txtmath2nd = $_POST['txtmath2nd'];
$txtmath3rd = $_POST['txtmath3rd'];
$txtmath4th = $_POST['txtmath4th'];
$txtmathave = $_POST['txtmathave'];
$txtmathremarks = $_POST['txtmathremarks'];

if(!empty($txtmath))
{
$sql = mysqli_query($cn, "select * from grades_gma where username = '$txtuser' and subj_desc = '$txtmath'");
$subjdesc = mysqli_num_rows($sql);
if($subjdesc == 0)
{
$sql = mysqli_query($cn, "insert into grades_gma (username, lrn, learners_name, sy, yr_sec, subj_desc, firstQtr, secondQtr, thirdQtr, fourthQtr, ave, remarks) values ('$txtuser', '$txtlrn', '$txtlearnersname', '$cmbsy', '$cmbyrsec', '$txtmath', '$txtmath1st', '$txtmath2nd', '$txtmath3rd', '$txtmath4th', '$txtmathave', '$txtmathremarks')");
}
else
{
$sql = mysqli_query($cn, "update grades_gma set sy = '$cmbsy', yr_sec = '$cmbyrsec', subj_desc = '$txtmath', firstQtr = '$txtmath1st', secondQtr = '$txtmath2nd', thirdQtr = '$txtmath3rd', fourthQtr = '$txtmath4th', ave = '$txtmathave', remarks = '$txtmathremarks' where username = '$txtuser' and subj_desc = '$txtmath'");
}
}

// Science

$txtsci = $_POST['txtsci'];
$txtsci1st = $_POST['txtsci1st'];
$txtsci2nd = $_POST['txtsci2nd'];
$txtsci3rd = $_POST['txtsci3rd'];
$txtsci4th = $_POST['txtsci4th'];
$txtsciave = $_POST['txtsciave'];
$txtsciremarks = $_POST['txtsciremarks'];

if(!empty($txtsci))
{
$sql = mysqli_query($cn, "select * from grades_gma where username = '$txtuser' and subj_desc = '$txtsci'");
$subjdesc = mysqli_num_rows($sql);
if($subjdesc == 0)
{
$sql = mysqli_query($cn, "insert into grades_gma (username, lrn, learners_name, sy, yr_sec, subj_desc, firstQtr, secondQtr, thirdQtr, fourthQtr, ave, remarks) values ('$txtuser', '$txtlrn', '$txtlearnersname', '$cmbsy', '$cmbyrsec', '$txtsci', '$txtsci1st', '$txtsci2nd', '$txtsci3rd', '$txtsci4th', '$txtsciave', '$txtsciremarks')");
}
else
{
$sql = mysqli_query($cn, "update grades_gma set sy = '$cmbsy', yr_sec = '$cmbyrsec', subj_desc = '$txtsci', firstQtr = '$txtsci1st', secondQtr = '$txtsci2nd', thirdQtr = '$txtsci3rd', fourthQtr = '$txtsci4th', ave = '$txtsciave', remarks = '$txtsciremarks' where username = '$txtuser' and subj_desc = '$txtsci'");
}
}

// Filipino

$txtfil = $_POST['txtfil'];
$txtfil1st = $_POST['txtfil1st'];
$txtfil2nd = $_POST['txtfil2nd'];
$txtfil3rd = $_POST['txtfil3rd'];
$txtfil4th = $_POST['txtfil4th'];
$txtfilave = $_POST['txtfilave'];
$txtfilremarks = $_POST['txtfilremarks'];

if(!empty($txtfil))
{
$sql = mysqli_query($cn, "select * from grades_gma where username = '$txtuser' and subj_desc = '$txtfil'");
$subjdesc = mysqli_num_rows($sql);
if($subjdesc == 0)
{
$sql = mysqli_query($cn, "insert into grades_gma (username, lrn, learners_name, sy, yr_sec, subj_desc, firstQtr, secondQtr, thirdQtr, fourthQtr, ave, remarks) values ('$txtuser', '$txtlrn', '$txtlearnersname', '$cmbsy', '$cmbyrsec', '$txtfil', '$txtfil1st', '$txtfil2nd', '$txtfil3rd', '$txtfil4th', '$txtfilave', '$txtfilremarks')");
}
else
{
$sql = mysqli_query($cn, "update grades_gma set sy = '$cmbsy', yr_sec = '$cmbyrsec', subj_desc = '$txtfil', firstQtr = '$txtfil1st', secondQtr = '$txtfil2nd', thirdQtr = '$txtfil3rd', fourthQtr = '$txtfil4th', ave = '$txtfilave', remarks = '$txtfilremarks' where username = '$txtuser' and subj_desc = '$txtfil'");
}
}

// Araling Panlipunan

$txtap = $_POST['txtap'];
$txtap1st = $_POST['txtap1st'];
$txtap2nd = $_POST['txtap2nd'];
$txtap3rd = $_POST['txtap3rd'];
$txtap4th = $_POST['txtap4th'];
$txtapave = $_POST['txtapave'];
$txtapremarks = $_POST['txtapremarks'];

if(!empty($txtap))
{
$sql = mysqli_query($cn, "select * from grades_gma where username = '$txtuser' and subj_desc = '$txtap'");
$subjdesc = mysqli_num_rows($sql);
if($subjdesc == 0)
{
$sql = mysqli_query($cn, "insert into grades_gma (username, lrn, learners_name, sy, yr_sec, subj_desc, firstQtr, secondQtr, thirdQtr, fourthQtr, ave, remarks) values ('$txtuser', '$txtlrn', '$txtlearnersname', '$cmbsy', '$cmbyrsec', '$txtap', '$txtap1st', '$txtap2nd', '$txtap3rd', '$txtap4th', '$txtapave', '$txtapremarks')");
}
else
{
$sql = mysqli_query($cn, "update grades_gma set sy = '$cmbsy', yr_sec = '$cmbyrsec', subj_desc = '$txtap', firstQtr = '$txtap1st', secondQtr = '$txtap2nd', thirdQtr = '$txtap3rd', fourthQtr = '$txtap4th', ave = '$txtapave', remarks = '$txtapremarks' where username = '$txtuser' and subj_desc = '$txtap'");
}
}

// MAPEH

$txtmapeh = $_POST['txtmapeh'];
$txtmapeh1st = $_POST['txtmapeh1st'];
$txtmapeh2nd = $_POST['txtmapeh2nd'];
$txtmapeh3rd = $_POST['txtmapeh3rd'];
$txtmapeh4th = $_POST['txtmapeh4th'];
$txtmapehave = $_POST['txtmapehave'];
$txtmapehremarks = $_POST['txtmapehremarks'];

if(!empty($txtmapeh))
{
$sql = mysqli_query($cn, "select * from grades_gma where username = '$txtuser' and subj_desc = '$txtmapeh'");
$subjdesc = mysqli_num_rows($sql);
if($subjdesc == 0)
{
$sql = mysqli_query($cn, "insert into grades_gma (username, lrn, learners_name, sy, yr_sec, subj_desc, firstQtr, secondQtr, thirdQtr, fourthQtr, ave, remarks) values ('$txtuser', '$txtlrn', '$txtlearnersname', '$cmbsy', '$cmbyrsec', '$txtmapeh', '$txtmapeh1st', '$txtmapeh2nd', '$txtmapeh3rd', '$txtmapeh4th', '$txtmapehave', '$txtmapehremarks')");
}
else
{
$sql = mysqli_query($cn, "update grades_gma set sy = '$cmbsy', yr_sec = '$cmbyrsec', subj_desc = '$txtmapeh', firstQtr = '$txtmapeh1st', secondQtr = '$txtmapeh2nd', thirdQtr = '$txtmapeh3rd', fourthQtr = '$txtmapeh4th', ave = '$txtmapehave', remarks = '$txtmapehremarks' where username = '$txtuser' and subj_desc = '$txtmapeh'");
}
}

// Music

$txtmusic = $_POST['txtmusic'];
$txtmusic1st = $_POST['txtmusic1st'];
$txtmusic2nd = $_POST['txtmusic2nd'];
$txtmusic3rd = $_POST['txtmusic3rd'];
$txtmusic4th = $_POST['txtmusic4th'];
$txtmusicave = $_POST['txtmusicave'];
$txtmusicremarks = $_POST['txtmusicremarks'];

if(!empty($txtmusic))
{
$sql = mysqli_query($cn, "select * from grades_gma where username = '$txtuser' and subj_desc = '$txtmusic'");
$subjdesc = mysqli_num_rows($sql);
if($subjdesc == 0)
{
$sql = mysqli_query($cn, "insert into grades_gma (username, lrn, learners_name, sy, yr_sec, subj_desc, firstQtr, secondQtr, thirdQtr, fourthQtr, ave, remarks) values ('$txtuser', '$txtlrn', '$txtlearnersname', '$cmbsy', '$cmbyrsec', '$txtmusic', '$txtmusic1st', '$txtmusic2nd', '$txtmusic3rd', '$txtmusic4th', '$txtmusicave', '$txtmusicremarks')");
}
else
{
$sql = mysqli_query($cn, "update grades_gma set sy = '$cmbsy', yr_sec = '$cmbyrsec', subj_desc = '$txtmusic', firstQtr = '$txtmusic1st', secondQtr = '$txtmusic2nd', thirdQtr = '$txtmusic3rd', fourthQtr = '$txtmusic4th', ave = '$txtmusicave', remarks = '$txtmusicremarks' where username = '$txtuser' and subj_desc = '$txtmusic'");
}
}

// Arts

$txtarts = $_POST['txtarts'];
$txtarts1st = $_POST['txtarts1st'];
$txtarts2nd = $_POST['txtarts2nd'];
$txtarts3rd = $_POST['txtarts3rd'];
$txtarts4th = $_POST['txtarts4th'];
$txtartsave = $_POST['txtartsave'];
$txtartsremarks = $_POST['txtartsremarks'];

if(!empty($txtarts))
{
$sql = mysqli_query($cn, "select * from grades_gma where username = '$txtuser' and subj_desc = '$txtarts'");
$subjdesc = mysqli_num_rows($sql);
if($subjdesc == 0)
{
$sql = mysqli_query($cn, "insert into grades_gma (username, lrn, learners_name, sy, yr_sec, subj_desc, firstQtr, secondQtr, thirdQtr, fourthQtr, ave, remarks) values ('$txtuser', '$txtlrn', '$txtlearnersname', '$cmbsy', '$cmbyrsec', '$txtarts', '$txtarts1st', '$txtarts2nd', '$txtarts3rd', '$txtarts4th', '$txtartsave', '$txtartsremarks')");
}
else
{
$sql = mysqli_query($cn, "update grades_gma set sy = '$cmbsy', yr_sec = '$cmbyrsec', subj_desc = '$txtarts', firstQtr = '$txtarts1st', secondQtr = '$txtarts2nd', thirdQtr = '$txtarts3rd', fourthQtr = '$txtarts4th', ave = '$txtartsave', remarks = '$txtartsremarks' where username = '$txtuser' and subj_desc = '$txtarts'");
}
}

// P.E.

$txtpe = $_POST['txtpe'];
$txtpe1st = $_POST['txtpe1st'];
$txtpe2nd = $_POST['txtpe2nd'];
$txtpe3rd = $_POST['txtpe3rd'];
$txtpe4th = $_POST['txtpe4th'];
$txtpeave = $_POST['txtpeave'];
$txtperemarks = $_POST['txtperemarks'];

if(!empty($txtpe))
{
$sql = mysqli_query($cn, "select * from grades_gma where username = '$txtuser' and subj_desc = '$txtpe'");
$subjdesc = mysqli_num_rows($sql);
if($subjdesc == 0)
{
$sql = mysqli_query($cn, "insert into grades_gma (username, lrn, learners_name, sy, yr_sec, subj_desc, firstQtr, secondQtr, thirdQtr, fourthQtr, ave, remarks) values ('$txtuser', '$txtlrn', '$txtlearnersname', '$cmbsy', '$cmbyrsec', '$txtpe', '$txtpe1st', '$txtpe2nd', '$txtpe3rd', '$txtpe4th', '$txtpeave', '$txtperemarks')");
}
else
{
$sql = mysqli_query($cn, "update grades_gma set sy = '$cmbsy', yr_sec = '$cmbyrsec', subj_desc = '$txtpe', firstQtr = '$txtpe1st', secondQtr = '$txtpe2nd', thirdQtr = '$txtpe3rd', fourthQtr = '$txtpe4th', ave = '$txtpeave', remarks = '$txtperemarks' where username = '$txtuser' and subj_desc = '$txtpe'");
}
}

// Health

$txthealth = $_POST['txthealth'];
$txthealth1st = $_POST['txthealth1st'];
$txthealth2nd = $_POST['txthealth2nd'];
$txthealth3rd = $_POST['txthealth3rd'];
$txthealth4th = $_POST['txthealth4th'];
$txthealthave = $_POST['txthealthave'];
$txthealthremarks = $_POST['txthealthremarks'];

if(!empty($txthealth))
{
$sql = mysqli_query($cn, "select * from grades_gma where username = '$txtuser' and subj_desc = '$txthealth'");
$subjdesc = mysqli_num_rows($sql);
if($subjdesc == 0)
{
$sql = mysqli_query($cn, "insert into grades_gma (username, lrn, learners_name, sy, yr_sec, subj_desc, firstQtr, secondQtr, thirdQtr, fourthQtr, ave, remarks) values ('$txtuser', '$txtlrn', '$txtlearnersname', '$cmbsy', '$cmbyrsec', '$txthealth', '$txthealth1st', '$txthealth2nd', '$txthealth3rd', '$txthealth4th', '$txthealthave', '$txthealthremarks')");
}
else
{
$sql = mysqli_query($cn, "update grades_gma set sy = '$cmbsy', yr_sec = '$cmbyrsec', subj_desc = '$txthealth', firstQtr = '$txthealth1st', secondQtr = '$txthealth2nd', thirdQtr = '$txthealth3rd', fourthQtr = '$txthealth4th', ave = '$txthealthave', remarks = '$txthealthremarks' where username = '$txtuser' and subj_desc = '$txthealth'");
}
}

// T.L.E

$txttle = $_POST['txttle'];
$txttle1st = $_POST['txttle1st'];
$txttle2nd = $_POST['txttle2nd'];
$txttle3rd = $_POST['txttle3rd'];
$txttle4th = $_POST['txttle4th'];
$txttleave = $_POST['txttleave'];
$txttleremarks = $_POST['txttleremarks'];

if(!empty($txttle))
{
$sql = mysqli_query($cn, "select * from grades_gma where username = '$txtuser' and subj_desc = '$txttle'");
$subjdesc = mysqli_num_rows($sql);
if($subjdesc == 0)
{
$sql = mysqli_query($cn, "insert into grades_gma (username, lrn, learners_name, sy, yr_sec, subj_desc, firstQtr, secondQtr, thirdQtr, fourthQtr, ave, remarks) values ('$txtuser', '$txtlrn', '$txtlearnersname', '$cmbsy', '$cmbyrsec', '$txttle', '$txttle1st', '$txttle2nd', '$txttle3rd', '$txttle4th', '$txttleave', '$txttleremarks')");
}
else
{
$sql = mysqli_query($cn, "update grades_gma set sy = '$cmbsy', yr_sec = '$cmbyrsec', subj_desc = '$txttle', firstQtr = '$txttle1st', secondQtr = '$txttle2nd', thirdQtr = '$txttle3rd', fourthQtr = '$txttle4th', ave = '$txttleave', remarks = '$txttleremarks' where username = '$txtuser' and subj_desc = '$txttle'");
}
}

// Values Education

$txtvalues = $_POST['txtvalues'];
$txtvalues1st = $_POST['txtvalues1st'];
$txtvalues2nd = $_POST['txtvalues2nd'];
$txtvalues3rd = $_POST['txtvalues3rd'];
$txtvalues4th = $_POST['txtvalues4th'];
$txtvaluesave = $_POST['txtvaluesave'];
$txtvaluesremarks = $_POST['txtvaluesremarks'];

if(!empty($txtvalues))
{
$sql = mysqli_query($cn, "select * from grades_gma where username = '$txtuser' and subj_desc = '$txtvalues'");
$subjdesc = mysqli_num_rows($sql);
if($subjdesc == 0)
{
$sql = mysqli_query($cn, "insert into grades_gma (username, lrn, learners_name, sy, yr_sec, subj_desc, firstQtr, secondQtr, thirdQtr, fourthQtr, ave, remarks) values ('$txtuser', '$txtlrn', '$txtlearnersname', '$cmbsy', '$cmbyrsec', '$txtvalues', '$txtvalues1st', '$txtvalues2nd', '$txtvalues3rd', '$txtvalues4th', '$txtvaluesave', '$txtvaluesremarks')");
}
else
{
$sql = mysqli_query($cn, "update grades_gma set sy = '$cmbsy', yr_sec = '$cmbyrsec', subj_desc = '$txtvalues', firstQtr = '$txtvalues1st', secondQtr = '$txtvalues2nd', thirdQtr = '$txtvalues3rd', fourthQtr = '$txtvalues4th', ave = '$txtvaluesave', remarks = '$txtvaluesremarks' where username = '$txtuser' and subj_desc = '$txtvalues'");
}
}

// Computer

$txtcom = $_POST['txtcom'];
$txtcom1st = $_POST['txtcom1st'];
$txtcom2nd = $_POST['txtcom2nd'];
$txtcom3rd = $_POST['txtcom3rd'];
$txtcom4th = $_POST['txtcom4th'];
$txtcomave = $_POST['txtcomave'];
$txtcomremarks = $_POST['txtcomremarks'];

if(!empty($txtcom))
{
$sql = mysqli_query($cn, "select * from grades_gma where username = '$txtuser' and subj_desc = '$txtcom'");
$subjdesc = mysqli_num_rows($sql);
if($subjdesc == 0)
{
$sql = mysqli_query($cn, "insert into grades_gma (username, lrn, learners_name, sy, yr_sec, subj_desc, firstQtr, secondQtr, thirdQtr, fourthQtr, ave, remarks) values ('$txtuser', '$txtlrn', '$txtlearnersname', '$cmbsy', '$cmbyrsec', '$txtcom', '$txtcom1st', '$txtcom2nd', '$txtcom3rd', '$txtcom4th', '$txtcomave', '$txtcomremarks')");
}
else
{
$sql = mysqli_query($cn, "update grades_gma set sy = '$cmbsy', yr_sec = '$cmbyrsec', subj_desc = '$txtcom', firstQtr = '$txtcom1st', secondQtr = '$txtcom2nd', thirdQtr = '$txtcom3rd', fourthQtr = '$txtcom4th', ave = '$txtcomave', remarks = '$txtcomremarks' where username = '$txtuser' and subj_desc = '$txtcom'");
}
}

echo "<script>alert('Record Saved')</script>";
echo "<script>history.go(-1)</script>";
}
else
{
echo "<script>alert('Failed')</script>";
echo "<script>history.go(-1)</script>";
}

}













// Delete

if(isset($_POST['delete']))
{

$txtuser = $_POST['txtuser'];
$cmbsubjdesc = $_POST['cmbsubjdesc'];

if(!empty($txtuser)
&& !empty($cmbsubjdesc))
{
$sql = mysqli_query($cn, "delete from grades where username = '$txtuser' and subj_desc = '$cmbsubjdesc'");
}

echo "<script>alert('Record Deleted')</script>";
echo "<script>history.go(-1)</script>";

}

// Print

if(isset($_POST['search']))
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

?>

<script>

// Username

document.getElementById('txtusername').value = localStorage['objectToPass'];

document.getElementById('txthome').value = document.getElementById('txtusername').value;
document.getElementById('txtprofile').value = document.getElementById('txtusername').value;
document.getElementById('txtgrades').value = document.getElementById('txtusername').value;
document.getElementById('txtok').value = document.getElementById('txtusername').value;

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

// School Year

function clrsy()
{
document.getElementById('cmbsy').value = ''

document.getElementById('txteng').value = ''
document.getElementById('txteng1st').value = ''
document.getElementById('txteng2nd').value = ''
document.getElementById('txteng3rd').value = ''
document.getElementById('txteng4th').value = ''
document.getElementById('txtengave').value = ''
document.getElementById('txtengremarks').value = ''

document.getElementById('txtmath').value = ''
document.getElementById('txtmath1st').value = ''
document.getElementById('txtmath2nd').value = ''
document.getElementById('txtmath3rd').value = ''
document.getElementById('txtmath4th').value = ''
document.getElementById('txtmathave').value = ''
document.getElementById('txtmathremarks').value = ''

document.getElementById('txtsci').value = ''
document.getElementById('txtsci1st').value = ''
document.getElementById('txtsci2nd').value = ''
document.getElementById('txtsci3rd').value = ''
document.getElementById('txtsci4th').value = ''
document.getElementById('txtsciave').value = ''
document.getElementById('txtsciremarks').value = ''

document.getElementById('txtfil').value = ''
document.getElementById('txtfil1st').value = ''
document.getElementById('txtfil2nd').value = ''
document.getElementById('txtfil3rd').value = ''
document.getElementById('txtfil4th').value = ''
document.getElementById('txtfilave').value = ''
document.getElementById('txtfilremarks').value = ''

document.getElementById('txtap').value = ''
document.getElementById('txtap1st').value = ''
document.getElementById('txtap2nd').value = ''
document.getElementById('txtap3rd').value = ''
document.getElementById('txtap4th').value = ''
document.getElementById('txtapave').value = ''
document.getElementById('txtapremarks').value = ''

document.getElementById('txtmapeh').value = ''
document.getElementById('txtmapeh1st').value = ''
document.getElementById('txtmapeh2nd').value = ''
document.getElementById('txtmapeh3rd').value = ''
document.getElementById('txtmapeh4th').value = ''
document.getElementById('txtmapehave').value = ''
document.getElementById('txtmapehremarks').value = ''

document.getElementById('txtmusic').value = ''
document.getElementById('txtmusic1st').value = ''
document.getElementById('txtmusic2nd').value = ''
document.getElementById('txtmusic3rd').value = ''
document.getElementById('txtmusic4th').value = ''
document.getElementById('txtmusicave').value = ''
document.getElementById('txtmusicremarks').value = ''

document.getElementById('txtarts').value = ''
document.getElementById('txtarts1st').value = ''
document.getElementById('txtarts2nd').value = ''
document.getElementById('txtarts3rd').value = ''
document.getElementById('txtarts4th').value = ''
document.getElementById('txtartsave').value = ''
document.getElementById('txtartsremarks').value = ''

document.getElementById('txtpe').value = ''
document.getElementById('txtpe1st').value = ''
document.getElementById('txtpe2nd').value = ''
document.getElementById('txtpe3rd').value = ''
document.getElementById('txtpe4th').value = ''
document.getElementById('txtpeave').value = ''
document.getElementById('txtperemarks').value = ''

document.getElementById('txthealth').value = ''
document.getElementById('txthealth1st').value = ''
document.getElementById('txthealth2nd').value = ''
document.getElementById('txthealth3rd').value = ''
document.getElementById('txthealth4th').value = ''
document.getElementById('txthealthave').value = ''
document.getElementById('txthealthremarks').value = ''

document.getElementById('txttle').value = ''
document.getElementById('txttle1st').value = ''
document.getElementById('txttle2nd').value = ''
document.getElementById('txttle3rd').value = ''
document.getElementById('txttle4th').value = ''
document.getElementById('txttleave').value = ''
document.getElementById('txttleremarks').value = ''

document.getElementById('txtvalues').value = ''
document.getElementById('txtvalues1st').value = ''
document.getElementById('txtvalues2nd').value = ''
document.getElementById('txtvalues3rd').value = ''
document.getElementById('txtvalues4th').value = ''
document.getElementById('txtvaluesave').value = ''
document.getElementById('txtvaluesremarks').value = ''

document.getElementById('txtcom').value = ''
document.getElementById('txtcom1st').value = ''
document.getElementById('txtcom2nd').value = ''
document.getElementById('txtcom3rd').value = ''
document.getElementById('txtcom4th').value = ''
document.getElementById('txtcomave').value = ''
document.getElementById('txtcomremarks').value = ''

document.getElementById('txtmkbyn').value = ''
document.getElementById('txtmkbyn1st').value = ''
document.getElementById('txtmkbyn2nd').value = ''
document.getElementById('txtmkbyn3rd').value = ''
document.getElementById('txtmkbyn4th').value = ''
document.getElementById('txtmkbynave').value = ''
document.getElementById('txtmkbynremarks').value = ''

document.getElementById('txtmt').value = ''
document.getElementById('txtmt1st').value = ''
document.getElementById('txtmt2nd').value = ''
document.getElementById('txtmt3rd').value = ''
document.getElementById('txtmt4th').value = ''
document.getElementById('txtmtave').value = ''
document.getElementById('txtmtremarks').value = ''

}

// Year and Section

function clryrsec()
{
document.getElementById('cmbyrsec').value = ''

document.getElementById('txteng').value = ''
document.getElementById('txteng1st').value = ''
document.getElementById('txteng2nd').value = ''
document.getElementById('txteng3rd').value = ''
document.getElementById('txteng4th').value = ''
document.getElementById('txtengave').value = ''
document.getElementById('txtengremarks').value = ''

document.getElementById('txtmath').value = ''
document.getElementById('txtmath1st').value = ''
document.getElementById('txtmath2nd').value = ''
document.getElementById('txtmath3rd').value = ''
document.getElementById('txtmath4th').value = ''
document.getElementById('txtmathave').value = ''
document.getElementById('txtmathremarks').value = ''

document.getElementById('txtsci').value = ''
document.getElementById('txtsci1st').value = ''
document.getElementById('txtsci2nd').value = ''
document.getElementById('txtsci3rd').value = ''
document.getElementById('txtsci4th').value = ''
document.getElementById('txtsciave').value = ''
document.getElementById('txtsciremarks').value = ''

document.getElementById('txtfil').value = ''
document.getElementById('txtfil1st').value = ''
document.getElementById('txtfil2nd').value = ''
document.getElementById('txtfil3rd').value = ''
document.getElementById('txtfil4th').value = ''
document.getElementById('txtfilave').value = ''
document.getElementById('txtfilremarks').value = ''

document.getElementById('txtap').value = ''
document.getElementById('txtap1st').value = ''
document.getElementById('txtap2nd').value = ''
document.getElementById('txtap3rd').value = ''
document.getElementById('txtap4th').value = ''
document.getElementById('txtapave').value = ''
document.getElementById('txtapremarks').value = ''

document.getElementById('txtmapeh').value = ''
document.getElementById('txtmapeh1st').value = ''
document.getElementById('txtmapeh2nd').value = ''
document.getElementById('txtmapeh3rd').value = ''
document.getElementById('txtmapeh4th').value = ''
document.getElementById('txtmapehave').value = ''
document.getElementById('txtmapehremarks').value = ''

document.getElementById('txtmusic').value = ''
document.getElementById('txtmusic1st').value = ''
document.getElementById('txtmusic2nd').value = ''
document.getElementById('txtmusic3rd').value = ''
document.getElementById('txtmusic4th').value = ''
document.getElementById('txtmusicave').value = ''
document.getElementById('txtmusicremarks').value = ''

document.getElementById('txtarts').value = ''
document.getElementById('txtarts1st').value = ''
document.getElementById('txtarts2nd').value = ''
document.getElementById('txtarts3rd').value = ''
document.getElementById('txtarts4th').value = ''
document.getElementById('txtartsave').value = ''
document.getElementById('txtartsremarks').value = ''

document.getElementById('txtpe').value = ''
document.getElementById('txtpe1st').value = ''
document.getElementById('txtpe2nd').value = ''
document.getElementById('txtpe3rd').value = ''
document.getElementById('txtpe4th').value = ''
document.getElementById('txtpeave').value = ''
document.getElementById('txtperemarks').value = ''

document.getElementById('txthealth').value = ''
document.getElementById('txthealth1st').value = ''
document.getElementById('txthealth2nd').value = ''
document.getElementById('txthealth3rd').value = ''
document.getElementById('txthealth4th').value = ''
document.getElementById('txthealthave').value = ''
document.getElementById('txthealthremarks').value = ''

document.getElementById('txttle').value = ''
document.getElementById('txttle1st').value = ''
document.getElementById('txttle2nd').value = ''
document.getElementById('txttle3rd').value = ''
document.getElementById('txttle4th').value = ''
document.getElementById('txttleave').value = ''
document.getElementById('txttleremarks').value = ''

document.getElementById('txtvalues').value = ''
document.getElementById('txtvalues1st').value = ''
document.getElementById('txtvalues2nd').value = ''
document.getElementById('txtvalues3rd').value = ''
document.getElementById('txtvalues4th').value = ''
document.getElementById('txtvaluesave').value = ''
document.getElementById('txtvaluesremarks').value = ''

document.getElementById('txtcom').value = ''
document.getElementById('txtcom1st').value = ''
document.getElementById('txtcom2nd').value = ''
document.getElementById('txtcom3rd').value = ''
document.getElementById('txtcom4th').value = ''
document.getElementById('txtcomave').value = ''
document.getElementById('txtcomremarks').value = ''
}

// Enable Save Button

function act_save()
{

if(document.getElementById('cmbsy').value != '' 
&& document.getElementById('cmbsemester').value != ''
&& document.getElementById('cmbstrand').value != ''
&& document.getElementById('cmbyrsec').value != ''
&& document.getElementById('cmbsubjdesc').value != '')
{
document.getElementById('btnsave').disabled = false
}
else
{
document.getElementById('btnsave').disabled = true
}

}

// Enable Delete Button

function act_delete()
{

if(document.getElementById('cmbsy').value != '' 
&& document.getElementById('cmbsemester').value != ''
&& document.getElementById('cmbstrand').value != ''
&& document.getElementById('cmbyrsec').value != ''
&& document.getElementById('cmbsubjdesc').value != ''
&& document.getElementById('txtmidterm').value == '' 
&& document.getElementById('txtfinals').value == '')
{
document.getElementById('btndelete').disabled = false
}
else
{
document.getElementById('btndelete').disabled = true
}

}

</script>