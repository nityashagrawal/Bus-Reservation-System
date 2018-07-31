<?php
session_start();
echo "<center><h1>Luxury Travels</h1></center>";
echo "<center><h2>Welcome {$_SESSION['name']} !!</h1></center>";

?>
<!DOCTYYPE html>
<html>
<head>
<title>Success</title>
<style type="text/css">
h2{color:lime;
font-size:30pt;
font-family:'verdana';
}
h1{color:orange;
font-size:50pt;
font-family:'calibri';
margin-bottom:5px;
}
a{color:cyan;
font-size:25pt;
font-family:bookman;}
body
{
	background-image:url(https://img.wallpapersafari.com/desktop/1366/768/54/83/RxEkrV.jpg);
}
</style>
</head>
<body><p>
<a href="book.php">Book!</a><br/><br/><br/><br/><br/><br/>
<a href="cancel.php">Cancel!</a>
</p></body>
</html>