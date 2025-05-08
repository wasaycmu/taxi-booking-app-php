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
 
// Escape user inputs for security
$email = $_POST['e_mail'];
$first = $_POST['f_name'];
$last = $_POST['l_name'];
$mobile = $_POST['mobile_number'];
$pass = $_POST['password'];
// attempt insert query execution
$sql = "INSERT INTO Customer (Email, FirstName, LastName, mobileNumber, password ) VALUES ('$email', '$first','$last','$mobile', '$pass')";

if(mysqli_query($link, $sql)){
    echo "User created successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// close connection
mysqli_close($link);
?>