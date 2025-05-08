<!DOCTYPE html>
<html lang="en">
<head>
<title>Karwa WebApp</title>
<style>
p{	
	style=color:white; 
	font-family:Century Gothic; 
	font-size:150%; 
	text-align: center;
}

</style>
</head>
<body bgcolor="#00e6e6">
	<p style="text-align:center">
		<img src="karwa.png" style= "width:100px;height:100px;";>
	</p>
	
	<p  style="color:white; font-family:Century Gothic ; font-size:250%; text-align: center;">Favorites</p>
	
<?php
/*
Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password)
*/
session_start();

$link = mysqli_connect('mysql-multi-04.qatar.cmu.local','awasay','islamispeace786','Karwa','3327');
// Check connection
if($link == false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
//
$mob = $_SESSION['mobileNumber'];

$result = mysqli_query($link, "select Favorites from Customer_Favorites where mobileNumber = ". $mob);
$count = mysqli_num_rows($result);
$i = 1;
if ($count > 0) {
    // output data of each row
	echo "<p style=color:white; font-family:Century Gothic ; font-size:150%; text-align: center;>Here are your top 10 Favorites: </p>";
	echo "<p style=color:white;>";
    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
		echo $i . " | ". $row["Favorites"]. "<br>";
		$i += 1;
	}
	echo "</p>";
}

mysqli_close($link);
?>

	<p style="text-align:center">
		<form align="center" action="Favorites.html" method="post" style="color:white; font-family:Century Gothic ; font-size:130%; text-align: center;">
			<input type="submit" value="Go Back" />
		</form>
	</p>
</body>
</html>