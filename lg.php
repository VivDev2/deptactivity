<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>  Login Form </title>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>
    <div class="container">
      <form action="#" method="post">
  <div class="title">Login</div>
  <div class="input-box underline">
    <input type="text" placeholder="Enter Your Email" name="txtemail" required>
    <div class="underline"></div>
  </div>
  <div class="input-box">
    <input type="password" placeholder="Enter Your Password" name="txtpassword" required>
    <div class="underline"></div>
  </div>
  <div class="input-box button">
    <input type="submit" name="submit" value="Continue">
  </div>
  <div>
    <span class="text">Not a Member?
      <a href="signup.php" class="text signup-link">Register Now</a>
    </span>
  </div>
</form>

        
    </div>
  </body>
</html>
<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "fex";

// Connection String
$con = mysqli_connect($host, $user, $pass, $db);

// Check connection

if (isset($_POST['submit'])) {
    $email = $_POST['txtemail'];
    $password = $_POST['txtpassword'];

    $query = "select * from reg where email = '$email' and password = '$password'";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) > 0) {
        // User exists, redirect to a welcome page
        header("Location: dashboard.php");
        exit();
    
    } else {
        // Invalid login credentials
        echo "<script>alert('Invalid login credentials');</script>";
    }
}

?>

