<?php
$link = mysqli_connect('localhost','root','','employees','3306');
if(mysqli_connect_errno()) {
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
}else{
echo "<p>Connected to MySQL !</p>";
}
// Attempt select query execution
$sql = "select * from employees limit 20";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
    	echo "<p>Employee number in table employees:</p>";
		echo "<ul>";
        while($row = mysqli_fetch_array($result)){
                echo "<li><b>Emp No:</b>" . $row[0] . "</li>";
                echo "<br/>";
        }
        // Close result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . $link ->connect_error;
}
?>
