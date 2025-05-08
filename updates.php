<?php

	session_start();

	$link = mysqli_connect('mysql-multi-04.qatar.cmu.local','awasay','islamispeace786','Karwa','3327');
	 
	// Check connection
	if($link === false){
		die("ERROR: Could not connect. " . mysqli_connect_error());
	}
	$bookingID = $_SESSION['bookID'];
	$destination = $_POST['destination'];
	$departure = $_POST['departure'];
	$pickTime = $_POST['pickTime'];
	$pickDate = $_POST['pickDate'];
	$extraDetails = $_POST['extraDetails'];

	$sql = "UPDATE Booking
			SET DropOffLocation = '$destination' , pickUpDate = '$pickDate' , pickUpTime = '$pickTime', PickUpLocation = '$departure', AddBookingInfo= '$extraDetails'
			WHERE BookingID = '$bookingID';";		

	if(mysqli_query($link, $sql)){
		header("location: updateDone.html");
	} else{
		echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
	}
	 
	mysqli_close($link);
	
?>
