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
		$fare=0;
		if($seat_type=="Sleeper")
			{if($a==1||$a==2){$fare=2675;}
			 if($a==3||$a==4){$fare=3500;}
			 if($a==5||$a==6){$fare=1750;}
			 if($a==7||$a==8){$fare=2339;}
			 if($a==9||$a==10){$fare=2684;}
			 if($a==11||$a==12){$fare=3675;}
			 if($a==13||$a==14){$fare=3830;}
			 if($a==15||$a==16){$fare=3319;}
			 if($a==17||$a==18){$fare=2947;}
			 if($a==19||$a==20){$fare=607;}
			}
		else
			{if($a==1||$a==2){$fare=2675;}
			 if($a==3||$a==4){$fare=3500;}
			 if($a==5||$a==6){$fare=1500;}
			 if($a==7||$a==8){$fare=2339;}
			 if($a==9||$a==10){$fare=2300;}
			 if($a==11||$a==12){$fare=3150;}
			 if($a==13||$a==14){$fare=3300;}
			 if($a==15||$a==16){$fare=2845;}
			 if($a==17||$a==18){$fare=2526 ;}
			 if($a==1||$a==2){$fare=520;}
			}
		echo"<p>Your Fare Per Seat Is : Rs.{$fare}</p>";$_SESSION['fare']=$fare;
		echo"<p>Number Of Passengers : {$seats} {$seat_type} Seats</p>";
		echo"<p>Arrival Time At {$source} : 08:00 A.M.</p>";
		echo'<a href="fare.php">Book This!</a>';
		$_SESSION['busno']=$a;
		
?>
</body>
</html>
