<?php
session_start();
require "connection.php";
?>

<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
	if(empty($_POST['cancel'])){echo"<p>Select a valid passenger!!</p>";}
else{
{$sql1="delete from passenger where Id={$_POST['cancel']}";
$res1=mysqli_query($conn,$sql1);

}
}
}
?>

<!DOCTYPE html>
<html>
<head>

<title>
Previous Bookings 
</title></head>
<body>
<style type="text/css">
h1{color:#d279a6;
font-size:50pt;
font-family:'calibri';
margin-bottom:5px;
}
p{color:#ffcc66;
font-size:15pt;
font-family:'Fantasy';
}
table{
color:#dd99ff;
font-size:20pt;
font-family:'calibri';
font-style:italic;
}
body
{
	background-image:url(https://desktop-backgrounds-org.s3.amazonaws.com/1366x768/sad-face-alone_2.jpg);
}
</style>
<center><h1>Luxury Travels</h1></center>
<?php
$sql="select Id,`Bus no.`,Name,Gender,Contact from passenger where bookeremail='{$_SESSION['username']}'  ";
$res=mysqli_query($conn,$sql);
$cancel=0;
echo '<form action="cancel.php" method="post" >';
if(!$res) {echo "query error";}
else if(mysqli_num_rows($res)==0){echo"<p>You have no previous bookings!!</p>";}
else {
while($row=mysqli_fetch_assoc($res))
{echo"<p>";
foreach($row as $key=>$value)
{echo "<b>{$key}</b> : {$value} &nbsp;&nbsp;"; if($key=="Id") {$GLOBALS['cancel']=$value ;} }
echo "<input type='radio' name='cancel' value={$cancel}> CANCEL THIS!";echo"</p>";
}
echo '<p><input type="submit" name="submit" value="Submit"></p>' ;
echo "</form>";}
?>
</body>
</html>