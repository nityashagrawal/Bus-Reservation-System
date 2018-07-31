<?php
session_start();
require "connection.php";
?>


<!DOCTYPE html>
<html>
<head>
<title>Details</title>
<style type="text/css">
h1{color:#ff6699;
font-size:50pt;
font-family:'calibri';
margin-bottom:5px;
}
p{color:#ffff80;
font-size:25pt;
font-family:'Courier';
}
a{color:#d2a679;
font-size:25pt;
font-family:Verdana;}
body
{
	background-image:url(https://images.wallpaperscraft.com/image/road_marking_clouds_dawn_119319_1366x768.jpg);
}
</style>
</head>
<body>
<center><h1>Luxury Travels</h1></center>
<?php
	$source=$_SESSION['source'];
	$destination=$_SESSION['destination'];
	$day=$_SESSION['day'];
	$seats=$_SESSION['seats'];
	$seat_type=$_SESSION['seat_type'];
	$dot=$_SESSION['dot'];
	
	$sql=" select busno from buslist where city1='{$source}' and city2='{$destination}' ";
	$sql1=" select busno from buslist where city1='{$destination}' and city2='{$source}' "; 
	$res=mysqli_query($conn,$sql);
	$res1=mysqli_query($conn,$sql1); $a=0;
	if((!$res)||(!$res1)){ echo "<p> Query Error!!</p>";}
	else 
		{
			if (mysqli_num_rows($res)==0)
				{ if($day%2==1)
						{ $a=0;
						  while($row=mysqli_fetch_assoc($res1))
							{ foreach($row as $key=>$value)
								{$a=max($a,$value);}}}
				 else
					{ $a=100;
						  while($row=mysqli_fetch_assoc($res1))
							{ foreach($row as $key=>$value)
								{$a=min($a,$value);}}}}
			else
				{ if($day%2==1)
						{ $a=100;
						  while($row=mysqli_fetch_assoc($res))
							{ foreach($row as $key=>$value)
								{$a=min($a,$value);}}}
				 else
					{ $a=0;
						  while($row=mysqli_fetch_assoc($res))
							{ foreach($row as $key=>$value)
								{$a=max($a,$value);}}}}
		}
		echo"<p>Your Bus Number Is : {$a}</p>";
		if($seat_type=="Air Conditioned")
			{$sql="select fare('{$a}',1)";}
		else
			{$sql="select fare('{$a}',0)";}
		$res=mysqli_query($conn,$sql);
		while($row=mysqli_fetch_assoc($res))
			{ foreach($row as $key=>$value)
			{echo"<p>Your Fare Per Seat Is : Rs.{$value}</p>";$_SESSION['fare']=$value;}}
		echo"<p>Number Of Passengers : {$seats} {$seat_type} Seats</p>";
		echo"<p>Arrival Time At {$source} : 08:00 A.M.</p>";
		echo'<a href="fare.php">Book This!</a>';
		$_SESSION['busno']=$a;
		
?>
</body>
</html>