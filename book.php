<?php
session_start();
?>
<?php
if($_SERVER['REQUEST_METHOD']=='POST')
	{if(isset($_POST['search'])){
		$source=$_POST['source'];
		$destination=$_POST['destination'];
		$seats=$_POST['seats'];
		$seat_type=$_POST['seat_type'];
		$day=$_POST['day'];
		$month=$_POST['month'];
		$year=$_POST['year'];
	if(empty($source)||empty($destination)||empty($seats)||empty($seat_type)||empty($day)||empty($month)||empty($year)||$source=="Source"||$destination=="Destination"||$seat_type=="Seat Type"||$year=="Year"||$month=="Month"||$day=="Day")
		{ echo"<p>Oops! Can't Leave Any Field Blank</p>";}
	else if((($month==4||$month==6||$month==9||$month==11)&&($day==31))||((($year%4==0)&&(($year%100!=0)||($year%400==0)))&&($month==2&&$day>29))||(!(($year%4==0)&&(($year%100!=0)||($year%400==0)))&&($month==2&&$day>28)))
	{echo"<p>Please Enter A Valid Date!!</p>";}
	else if($source==$destination)
		{echo"<p>Can't choose same source and destination!!</p>";}
	else if($seats<=0){echo"<p>Select valid number of passengers</p>";}
		else
		{$_SESSION['source']=$_POST['source'];
		$_SESSION['destination']=$_POST['destination'];
		$_SESSION['seats']=$_POST['seats'];
		$_SESSION['seat_type']=$_POST['seat_type'];
		$_SESSION['day']=$_POST['day'];
		$_SESSION['dot']=$year.'/'.$month.'/'.$day; 
		header("location: buslist.php" );}}}
?>
<!DOCTYPE html>
<html>
<head>
<title>Book</title>
<style type="text/css">
h1{color:blue;
font-size:50pt;
font-family:'calibri';
margin-bottom:5px;
}
p{color:#00ff80;
font-size:25pt;
font-family:'Blagovest';
}
table{
color:#ff0080;
font-size:25pt;
font-family:'calibri';
font-style:italic;
margin-top:50px;
}
body
{
	background-image:url(https://wallpaperscraft.com/image/globe_map_table_travel_25767_1366x768.jpg);
}
</style>
</head>
<body>
<center><h1>Luxury Travels</h1></center>
<table cellspacing="15px">
	<form action="book.php" method="POST">
	<tr>
	<td>Source :</td>
			<td><select name="source">
				<option>Source</option>
				<option>Mumbai</option>
				<option>Delhi</option>
				<option>Kolkata</option>
				<option>Bangalore</option>
				<option>Chennai</option>
				</select>
			</td>	
	</tr>
	<tr>
	<td>Destination :</td>
	<td><select name="destination">
				<option>Destination</option>
				<option>Mumbai</option>
				<option>Delhi</option>
				<option>Kolkata</option>
				<option>Bangalore</option>
				<option>Chennai</option>
				</select>
			</td>	
	</tr>
	<tr>
	<td>Date Of Travel :</td>
			<td><select name="year">
				<option>Year</option>
				<option>2018</option>
				<option>2019</option>
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
	<td>Number Of Passengers :</td>
	<td><input type="number" name="seats"/></td>
	</tr>
	<tr>
	<td>Seat Type :</td>
	<td><select name="seat_type">
		<option>Seat Type</option>
		<option>Air Conditioned</option>
		<option>Non Air Conditioned</option>
		</select>
	</td>
	</tr>
	<tr>
	<td><input type="submit" name="search" value="Search"/></td>
	</tr>
</table>
</body>
</html>