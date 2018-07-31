<?php
session_start();
?>
<?php
if($_SERVER['REQUEST_METHOD']=='POST')
	{if(isset($_POST['login'])){
		$email=$_POST['email'];
		$password=$_POST['password'];
		require "connection.php";
		$sql="select * from credentials where email= '{$email}' and password='{$password}'";
		$res=mysqli_query($conn,$sql);
		if(!$res)
			{echo "<p>Query Error</p>";}
		else if(mysqli_num_rows($res)==0)
			{echo"<p>Invalid Email Or Password ,Please Try Again!!</p>";}
		else
			{	$_SESSION['username']=$email;
				$row=mysqli_fetch_assoc($res);
			 foreach($row as $key=>$val) 
				{if($key=="first_name")
					{$_SESSION['name']=$val;
					 header("location: success.php");	
					}	
				}
			}		
	}}
?>
<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<style type="text/css">
table{margin-top: 100px;
color:blue;
font-size:25pt;
font-family:'garamond';
font-style:italic;
}
p{color:#b30000;
font-size:25pt;
font-family:'impact';
}
h1{color:cyan;
font-size:50pt;
font-family:bookman;}
body
{
	background-image:url(https://wallpaperscraft.com/image/london_city_bus_night_59178_1366x768.jpg);
}
</style>
</head>
<body>
	<h1><center>Luxury Travels</center></h1>
	<table cellspacing="15px">
	<form action="login.php" method="POST">
	<tr>
	<td>Email Address :</td>
	<td><input type="text" name="email"/></td>
	</tr>
	<tr>
	<td>Password :</td>
	<td><input type="password" name="password"/></td>
	</tr>
	<tr>
	<td><input type="submit" name="login" value="Login"/></td>
	</tr>
</table>
</body>
</html>