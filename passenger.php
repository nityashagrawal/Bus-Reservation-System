<?php
session_start();
$seat_type=$_SESSION['seat_type'];
require "connection.php";
if($_SERVER['REQUEST_METHOD']=='POST'){
	if($_POST['gender']=="Gender"){echo"<p>Please select a valid gender!!</p>";}
	else if(empty($_POST['name'])||empty($_POST['contact'])||($_POST['contact']<=0)){echo"<p>Please select valid entries</p>";}
	else
{
$sql="INSERT into passenger(`Bus no.`,Name,Gender,Contact,bookeremail,seat_type) values({$_SESSION['busno']},'{$_POST['name']}','{$_POST['gender']}',{$_POST['contact']},'{$_SESSION['username']}',{$_SESSION['seattype']})";

$res = mysqli_query($conn,$sql);
if(!$res) {echo "query error" ;}
$_SESSION['count']=$_SESSION['count']+1;
if($_SESSION['count']==$_SESSION['seats'])
{header("location: done.php");}
}
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Passenger Details</title>
<style type="text/css">
h1{color:#ffffcc;
font-size:50pt;
font-family:'calibri';
margin-bottom:5px;
}
p{color:#d98c8c;
font-size:35pt;
font-family:'Comic Sans MS';
}
table{
color:#dd99ff;
font-size:20pt;
font-family:'calibri';
font-style:italic;
}
body
{
	background-image:url(https://www.10wallpaper.com/wallpaper/1366x768/1306/Buses-Life_photography_HD_wallpaper_1366x768.jpg);
}
</style>
</head>
<body>
<center><h1>Luxury Travels</h1></center>
<p>Enter passenger details !</p>
<table cellspacing="15px">
<form action="passenger.php" method="post">
<tr>
<td>Name : </td>
<td><input type="text" name="name" > <br></td>
</tr>
<tr>
<td>Gender : </td>
<td><select name="gender"><option>Gender</option><option value='m'>Male </option><option value='f'>Female</option>
</select><br></td>
<tr>
<td>Contact no.: </td>
<td><input type="number" name="contact"><br></td>
</tr> 

<?php 

if($seat_type=="Air Conditioned") $_SESSION['seattype']=0;
else $_SESSION['seattype']=10;
?>
<tr>
<td><input type="submit" name="next" value="Next"></td>
</tr>

</table>
</body>
</html>