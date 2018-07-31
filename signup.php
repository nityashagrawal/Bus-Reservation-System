<?php
session_start();
?>
<?php
if($_SERVER['REQUEST_METHOD']=='POST')
	{if(isset($_POST['signup'])){
		$email=$_POST['email'];
		$password=$_POST['password'];
		$firstname=$_POST['firstname'];
		$lastname=$_POST['lastname'];
		if(!empty($_POST['gender'])){$gender=$_POST['gender'];}
		$address=$_POST['address'];
		$repassword=$_POST['repassword'];
		$year=$_POST['year'];
		$month=$_POST['month'];
		$day=$_POST['day'];
		$dob=$year.'/'.$month.'/'.$day;
		require "connection.php";
		$sql="select * from credentials where email= '{$email}' ";
		$res=mysqli_query($conn,$sql);
		if(empty($firstname)||empty($lastname)||empty($email)||empty($password)||empty($gender)||empty($year)||empty($month)||empty($day)||empty($address)||empty($repassword))
			{ echo"<p>Oops! Can't Leave Any Field Blank!!</p>";}
		else if($password!=$repassword)
			{echo"<p>Passwords Don't Match , Please Try Again!!</p>";}
		else if(strlen($password)<=6){echo"<p>Enter A Password With More Than 6 Characters!!</p>";}
		else if(mysqli_num_rows($res)!=0)
			{echo"<p>This Email Has Already Been Registered, Please Use Another One!!</p>";}
		else if((($month==4||$month==6||$month==9||$month==11)&&($day==31))||((($year%4==0)&&(($year%100!=0)||($year%400==0)))&&($month==2&&$day>29))||(!(($year%4==0)&&(($year%100!=0)||($year%400==0)))&&($month==2&&$day>28)))
			{echo"<p>Please Enter A Valid Date!!</p>";}
		else {
				$sql1="INSERT INTO credentials(first_name,last_name,gender,dob,email,password,address) " .
				"VALUES('$firstname','$lastname','$gender','$dob','$email','$password','$address')";
				$res1=mysqli_query($conn,$sql1);
				if(!$res1){echo"Query Error!!";}
				else{ $_SESSION['username']=$email;$_SESSION['name']=$firstname;
				header("location: success.php");}
	}}}
?>
<!DOCTYPE html>
<html>
<head>
<title>Sign up</title>
<style type="text/css">
table{
color:black;
font-size:20pt;
font-family:'calibri';
font-style:italic;
}
p{color:red;
font-size:25pt;
font-family:'impact';
}
h1{color:green;
font-size:40pt;
font-family:bookman;}
body
{
	background-image:url(https://wallpaperscraft.com/image/bus_toy_grass_117171_1366x768.jpg);
}
</style>
</head>
<body>
	<h1><center>Luxury Travels</center></h1>
	<table cellspacing="15px">
	<form action="signup.php" method="POST">
	<tr>
	<td>First Name :</td>
	<td><input type="text" name="firstname"/></td>
	</tr>
	<tr>
	<td>Last Name :</td>
	<td><input type="text" name="lastname"/></td>
	</tr>
	<tr>
	<td>Address :</td>
	<td><textarea name="address"></textarea></td>
	</tr>
	<tr>
	<td>Gender :</td>
	<td><input type="radio" name="gender" value="male"/>Male
		<input type="radio" name="gender" value="female"/>FeMale</td>
	</tr>
	<tr>
	<td>Date Of Birth :</td>
			<td><select name="year">
				<option>Year</option>
				<option>1989</option>
				<option>1990</option>
				<option>1991</option>
				<option>1992</option>
				<option>1993</option>
				<option>1994</option>
				<option>1995</option>
				<option>1996</option>
				<option>1997</option>
				<option>1998</option>
				<option>1999</option>
				<option>2000</option>
				</select>
				<select name="month">
				<option>Month</option>
				<option>1</option>
				<option>2</option>
				<option>3</option>
				<option>4</option>
				<option>5</option>
				<option>6</option>
				<option>7</option>
				<option>8</option>
				<option>9</option>
				<option>10</option>
				<option>11</option>
				<option>12</option>
				</select>
				<select name="day">
				<option>Day</option>
				<option>1</option>
				<option>2</option>
				<option>3</option>
				<option>4</option>
				<option>5</option>
				<option>6</option>
				<option>7</option>
				<option>8</option>
				<option>9</option>
				<option>10</option>
				<option>11</option>
				<option>12</option>
				<option>13</option>
				<option>14</option>
				<option>15</option>
				<option>16</option>
				<option>17</option>
				<option>18</option>
				<option>19</option>
				<option>20</option>
				<option>21</option>
				<option>22</option>
				<option>23</option>
				<option>24</option>
				<option>25</option>
				<option>26</option>
				<option>27</option>
				<option>28</option>
				<option>29</option>
				<option>30</option>
				<option>31</option>
				</select></td>
	</tr>
	<tr>
	<td>Email Address :</td>
	<td><input type="text" name="email"/></td>
	</tr>
	<tr>
	<td>Password (greater than 6 characters):</td>
	<td><input type="password" name="password"/></td>
	</tr>
	<td>Retype Password :</td>
	<td><input type="password" name="repassword"/></td>
	</tr>
	<tr>
	<td><input type="submit" name="signup" value="Signup"/></td>
	</tr>
</table>
</body>
</html>