<?php
session_start();
require "connection.php";
$_SESSION['count']=0;
?>

<!DOCTYPE html>
<html>
<head>
<title>Payment</title>
<style type="text/css">
h1{color:#99004d;
font-size:50pt;
font-family:'calibri';
margin-bottom:5px;
}
p{color:#70db70;
font-size:35pt;
font-family:'Cursive';
}
a{color:#ff3399;
font-size:25pt;
font-family:Verdana;}
body
{
	background-image:url(https://hdqwalls.com/download/women-back-buses-1366x768.jpg);
}
</style>
</head>
<center><h1>Luxury Travels</h1></center>
<body>
<p>Payment Succesful!</p>
<a href="passenger.php">Proceed!</a>
</body>
</html>