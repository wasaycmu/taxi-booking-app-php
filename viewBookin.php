<head>
<title>Karwa WebApp</title>
<style>
p{	
	style=color:white; 
	font-family:Century Gothic; 
	font-size:150%; 
	text-align: center;
}
td{
	style=color:white; 
	font-family:Century Gothic;
}
th{
	style=color:white; 
	font-family:Century Gothic; 
}
table{
	align: center;
}
#phpdiv {
  top: 50%;
  left: 50%;
  margin: 50px 0 0 225px;
}
</style>
</head>
<body bgcolor="#00e6e6">
	<p style="text-align:center">
	<img src="karwa.png" style= "width:100px;height:100px;";>
	</p>
	<p  style="color:white; font-family:Century Gothic ; font-size:250%; text-align: center;">Karwa Booking</p>
	<br>
	<br>
	<br>
	
	<p  style="color:white; font-family:Century Gothic ; font-size:150%; text-align: center;">Here is a table of your bookings: </p>
<div id = "phpdiv"> 
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
$result = mysqli_query($link, "select TaxiID, DriverID, BookingID, DropOffLocation, PickUpLocation, 
bookingTime, bookingDate, pickUpTime, pickUpDate, TotalFare, ETA, AddBookingInfo
from Booking where mobileNumber = '$mob';");
$count = mysqli_num_rows($result);


if ($count > 0) {

echo "<p style=color:white ;>" . "<table border='1' style=color:black; text-align: center;>
<tr text-align: center;>
<th>Taxi ID</th>
<th>Driver ID</th>
<th>Booking ID</th>
<th>Drop Off Location</th>
<th>Pick Up Location</th>
<th>Booking Time</th>
<th>Booking Date</th>
<th>Pick Up Time</th>
<th>Pick Up Date</th>
<th>Total Fare</th>
<th>ETA</th>
<th>Extra Details</th>
<th>Cancel</th>
<th>Update</th>
</tr>";


    // output data of each row
	while($row = mysqli_fetch_array($result))
		{
		echo "<tr>";
		echo "<td>" . $row['TaxiID'] . "</td>";
		echo "<td>" . $row['DriverID'] . "</td>";
		echo "<td>" . $row['BookingID'] . "</td>";
		echo "<td>" . $row['DropOffLocation'] . "</td>";
		echo "<td>" . $row['PickUpLocation'] . "</td>";
		echo "<td>" . $row['bookingTime'] . "</td>";
		echo "<td>" . $row['bookingDate'] . "</td>";
		echo "<td>" . $row['pickUpTime'] . "</td>";
		echo "<td>" . $row['pickUpDate'] . "</td>";
		echo "<td>" . $row['TotalFare'] . "</td>";
		echo "<td>" . $row['ETA'] . "</td>";
		echo "<td>" . $row['AddBookingInfo'] . "</td>";
		echo "<td>" . "<a href=cancel.php?bookingID=".$row['BookingID']." value='cancle' />";
        echo " Cancel" . "</td>";
        echo "<td>" ."<a href=makeFavorite.php?dropOff=".$row['DropOffLocation']." value='favorite' />";
        echo " Make Favorite" . "</td>";

		echo "</tr>";
	}
	echo "</table>";
	echo "</p>";
}

mysqli_close($link);

?>
</div>
	<p style="text-align:center">
		<form align="center" action="Booking.html" method="post" style="color:white; font-family:Century Gothic ; font-size:130%; text-align: center;">
			<input type="submit" value="Go Back" />
		</form>
	</p>
</body>
</html>
