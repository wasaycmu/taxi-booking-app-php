<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Update Records Form</title>
</head>
<body>
   <form action="" method="post" name="myform">
<?php
    session_start();
    $emp_no = $_POST['emp_number']; 
    $_SESSION['S_emp_no'] = $emp_no;
    $link = mysqli_connect('mysql-multi-04.qatar.cmu.local','awasay','islamispeace786','Karwa','3327');

    if(!$link) {
        die("<p>Error connecting to database:".mysqli_error()."</p>");
    }else{
        echo "<p>Connected to MySQL !</p>";
    }   
 ?>
     
    <p>
        <label for="employeeNo">Employee Number:</label>
        <input type="text" name="emp_number" id="emp_number" value="<?=(isset($_SESSION['S_emp_no'] ) ? $_SESSION['S_emp_no']  : "")?>" readonly>
        <br/>
    </p>
 <?php     
    $sql = "select * from employees where emp_no ='$emp_no'";
    if($result = mysqli_query($link, $sql)){
        if(mysqli_num_rows($result) > 0){ 
             while ($row = mysqli_fetch_row($result)){
                echo "<label for=first>employees Name:</label>";
                echo "<input type=text name=first id=first value='". $row[2] ."'/>";
                echo "<input type=submit name=update_button  value='Click me to Update Values' />";
            }
        }
    }
 
    if (isset($_POST['update_button'])) {
        $emp_no = $_SESSION['S_emp_no']; 
        $firstname = $_POST['first'];
        $updatesql = "update employees set first_name='$firstname' where emp_no='$emp_no'";
        if ($link->query($updatesql) === TRUE) {
            session_destroy();
            header('Location: ./message.html');
        } else {
        echo "Error updating record: " . $link->error;
        }
    }
?>

</form>
</body>
</html>