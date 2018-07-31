<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<title>Completed</title>
<style type="text/css">
h1{color:#bfff80;
font-size:50pt;
font-family:'calibri';
margin-bottom:5px;
}
p{color:#a3c2c2;
font-size:35pt;
font-family:'Perpetua';
}
table{
color:#dd99ff;
font-size:20pt;
font-family:'calibri';
font-style:italic;
}
body
{
	background-image:url(http://api.hdwallpapers5k.com/resource/fileuploads/photos/albums/1564/1ea92f70-42da-42e4-ab49-0d8701ea0d84.jpg?quality=100&w=1366&h=768&mode=crop);
}
</style>
</head>
<body>
<center><h1>Luxury Travels</h1></center>
<p>Booking Succesful!!!!!!!!!</p>
<?php
   session_destroy();
?>
</body>
</html>