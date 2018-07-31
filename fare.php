<?php
session_start();
require "connection.php";
?>

<!DOCTYPE html>
<html>
<head>
<title>Fare</title>
<style type="text/css">
h1{color:#99004d;
font-size:50pt;
font-family:'calibri';
margin-bottom:5px;
}
p{color:#ccccb3;
font-size:35pt;
font-family:'Tw Cen MT';
}
a{color:#996600;
font-size:25pt;
font-family:Verdana;}
body
{
	background-image:url(https://images.wallpaperscraft.com/image/road_trees_shadow_119606_1366x768.jpg);
}
</style>
</head>
<center><h1>Luxury Travels</h1></center>
<body>
<?php
echo"<p>Your Total Fare Is: Rs.";
echo $_SESSION['fare']*$_SESSION['seats'];
?>
<br><br>
<a href="payment.php">Proceed To Payment!</a>
</body>
</html>