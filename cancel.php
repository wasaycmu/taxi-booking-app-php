<?php
/*
Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password)
*/
$link = mysqli_connect('mysql-multi-04.qatar.cmu.local','awasay','islamispeace786','Karwa','3327');
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
$bookingID = $_GET['bookingID'];
$sql = "DELETE FROM Booking WHERE BookingID = '$bookingID';";

if(mysqli_query($link, $sql)){
    header("location: cancelDone.html");
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
mysqli_close($link);
?>

