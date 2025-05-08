<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Login Check</title>
</head>
<body>

<?php
/*
Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password)
*/
session_start();
$link = mysqli_connect('mysql-multi-04.qatar.cmu.local','awasay','islamispeace786','Karwa','3327');
if($link === false){
// Check connection
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$mob_no = $_POST['mobileNumber'];
$password = $_POST['password'];


// attempt insert query execution
$sql = "select * from Customer where mobileNumber = $mob_no AND password = '$password';";
$result = mysqli_query($link,$sql);
$count = mysqli_num_rows($result);

if($count > 0) {
   $_SESSION['mobileNumber'] = $mob_no;
   header("location: Menu.html");
}else {
   header("location: loginError.html");
}
 
// close connection
mysqli_close($link);
?>

