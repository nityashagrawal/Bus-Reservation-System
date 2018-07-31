<?php
$host="localhost";
$dbuser="root";
$pass="nityash";
$db="bus";
$conn=mysqli_connect($host,$dbuser,$pass,$db);
if(mysqli_connect_errno())
	{die("Connection Failed".mysqli_connect_errno());}
?>