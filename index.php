<?php
$insert = false;
if(isset($_POST['name'])){
    // Set connection variables
    $server = "localhost";
    $username = "root";
    $password = "";

    // Create a database connection
    $con = mysqli_connect($server, $username, $password);

    // Check for connection success
    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    // echo "Success connecting to the db";

    // Collect post variables
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    
    $sql = "INSERT INTO `form`.`entry` (`name`, `age`, `gender`, `email`, `contact`, `date`) VALUES ( '$name', '$age', '$gender', '$email', '$contact', current_timestamp());";
    // echo $sql;

    // Execute the query
    if($con->query($sql) == true){
        // echo "Successfully inserted";

        // Flag for successful insertion
        $insert = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

    // Close the database connection
    $con->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
   <?php
        if($insert == true){
        echo "<p class='msg'> Registered Successfully</p>";
        }
    ?>


  <div class="hd">
      <div class="hrl"></div>
      <h1>Registration Form</h1>
     
      <div class="hr2"></div>

   
     
     <div class="frm">
        <form action="index.php" method="post">
            <input type="text"  name="name" id="name" placeholder="Enter Your Name"> <br>
            <input type="text"  name="age" id="age" placeholder="Enter Your Age"><br>
            <input type="text"  name="gender" id="gender" placeholder="Enter Your Gender"><br>
            <input type="text"  name="email" id="email" placeholder="Enter Your Email"><br>
            <input type="text"  name="contact" id="contact" placeholder="Enter Your Contact no."><br>
            <button class="btn">SUBMIT</button>
        </form>
     </div>
  </div>  
</body>
</html>