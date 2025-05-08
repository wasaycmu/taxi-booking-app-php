<?php
/*
Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password)
*/
session_start();
$link = mysqli_connect('mysql-multi-04.qatar.cmu.local','awasay','islamispeace786','Karwa','3327');
$mobileNumber = $_SESSION['mobileNumber'];
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$dropOff = $_GET['dropOff'];
$sql = "insert into Customer_Favorites (Favorites, mobileNumber) values ('$dropOff', '$mobileNumber');";

if(mysqli_query($link, $sql)){
    header("location: favoriteDone.html");
} else{
    header("location: favoriteError.html");
}
 
mysqli_close($link);
?>

