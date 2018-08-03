<?php
session_start();
?>
<?php
if($_SERVER['REQUEST_METHOD']=='POST')
{if(isset($_POST['Login']))
	{header("location: login.php");}
 elseif(isset($_POST['Signup']))
	{header("location: signup.php");}}
?>
<!DOCTYPE html>
<html>
<head>
<title>
Welcome Aboard!
</title>
<style type="text/css">
p{color:white;
font-size:15pt;
font-family:'Times New Roman';
text-align:right;}
h1{color:red;
font-size:50pt;
font-family:bookman;}
form{color:green;
font-size:18pt;
font-family:calibri;
}
body
{
	background-image:url(https://wallpaperscraft.com/image/amsterdam_bus_city_69325_1366x768.jpg);
}
</style>
</head>
<body>
<h1><center>Luxury Travels</center></h1>
<form action="index.php"method="post">
Already a member?&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='submit' name='Login' value='Login' /><br />
New member?&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='submit' name='Signup' value='Sign Up' /><br /><br /><br /><br /><br /><br />
<p><i>
India, with its well-planned network of roadways makes traveling by road an easy alternative.<br />
Most of the towns and cities within India are well connected to each other by state and national highways.<br />
We offer daily scheduled bus services and bookings can be made for online bus tickets for any of the buses. <br />
With the best in online bus ticket reservation one can book bus tickets for major routes all across India. <br />
You can choose from AC/ Non-AC bus booking Services amongst others. <br />
Most of these luxury buses are a great way to travel, especially A.C sleeper coaches as they offer great service. <br />
You can choose for the best deals and enjoy a pleasant ride all the way through. <br />
All A/C buses are fitted with upholstered seats that can be reclined and most offer entertainment as well.<br />
On important routes, connecting major cities and smaller towns various bus services are always available. <br />
Choose the origin and destination city, select your journey date and use the bus-booking engine to get best travel deals on all types of coaches. <br />
All you need to do is book your ticket online, print it out and you’re ready to go!!<br />
</i></p>
</body>
</html>
