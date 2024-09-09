<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
  
     
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

   <title>Registration Form</title>
</head>
<body>
    <div class="container">
        <header>Registration</header>

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="form first">
                <div class="details personal">
                    <span class="title">Personal Details</span>

                    <div class="fields">
                        <div class="input-field">
                            <label for="name">Full Name</label>
                            <input type="text" name="txtname" id="name" placeholder="Enter your name" required>
                        </div>

                        <div class="input-field">
                            <label for="email">Email</label>
                            <input type="email" name="txtemail" id="email" placeholder="Enter your email" required>
                        </div>

                        <div class="input-field">
                            <label for="mobileno">Mobile Number</label>
                            <input type="tel" name="intmobileno" id="mobileno" placeholder="Enter mobile number" required>
                        </div>

                        <div class="input-field">
                            <label for="password">Password</label>
                            <input type="password" name="txtpassword" id="password" placeholder="Enter password" required>
                        </div>

                        <div class="input-field">
                            <label for="conpassword">Confirm Password</label>
                            <input type="password" name="txtconpassword" id="conpassword" placeholder="Confirm password" required>
                        </div>

                        <div class="input-field">
    <label for="dept">Department</label>
    <select name="dept" id="dept" required>
        <option disabled selected>Select Department</option>
        <option>MCA</option>
        <option>AI & DATA SCIENCE</option>
        <option>CSE</option>
    </select>
</div>


                        <div class="input-field">
                            <label for="role">Role</label>
                            <select name="txtrole" id="role" required>
                                <option disabled selected>Select Role</option>
                                <option>Teacher</option>
                                <option>Student</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div>    
                <button type="submit" class="btn btn-success" name="submit">Register</button>
                </div>

                

                <div class="login-signup">
                    <span class="text">Already a Member?
                        <a href="lg.php" class="text signup-link">Login Now</a>
                    </span>
                </div>
            </div> 
        </form>
    </div>

    <script src="script.js"></script>
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
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

//echo "Connected successfully";

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $name = $_POST['txtname'];
    $email = $_POST['txtemail'];
    $mobileno = $_POST['intmobileno'];
    $password = $_POST['txtpassword'];
    $conpassword = $_POST['txtconpassword'];
    $dept = $_POST['dept'];
    $role = $_POST['txtrole'];

    // Check if name or email already exists
    $duplicate = mysqli_query($con, "SELECT * FROM reg WHERE name = '$name' OR email = '$email'");
    if (mysqli_num_rows($duplicate) > 0) {
        echo "<script>alert('Name or email has already been taken');</script>";
    } else {
        if ($password == $conpassword) {
            // Assuming you have an 'id' column in your 'reg' table with AUTO_INCREMENT
            $query = "insert into reg  values ('$id','$name', '$email', '$mobileno', '$password', '$dept', '$role')";
            
            if (mysqli_query($con, $query)) {
                echo "<script>alert('Registration successful');</script>";
                header("Location: lg.php");
            } else {
                echo "<script>alert('Error: " . mysqli_error($con) . "');</script>";
            }
        } else {
            echo "<script>alert('Passwords do not match');</script>";
        }
    }
}
?>

<style>
    /* ===== Google Font Import - Poppins ===== */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&display=swap');
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}
body{
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    background:  #c1851e;
}
.container{
    position: relative;
    max-width: 900px;
    width: 100%;
    border-radius: 6px;
    padding: 30px;
    margin: 0 15px;
    background-color: #fff;
    box-shadow: 0 5px 10px rgba(0,0,0,0.1);
}
.container header{
    position: relative;
    font-size: 20px;
    font-weight: 600;
    color: #333;
}
.container header::before{
    content: "";
    position: absolute;
    left: 0;
    bottom: -2px;
    height: 3px;
    width: 27px;
    border-radius: 8px;
    background-color: #c1851e;
}
.container form{
    position: relative;
    margin-top: 16px;
    min-height: 490px;
    background-color: #fff;
    overflow: hidden;
}
.container form .form{
    position: absolute;
    background-color: #fff;
    transition: 0.3s ease;
}
.container form .form.second{
    opacity: 0;
    pointer-events: none;
    transform: translateX(100%);
}
form.secActive .form.second{
    opacity: 1;
    pointer-events: auto;
    transform: translateX(0);
}
form.secActive .form.first{
    opacity: 0;
    pointer-events: none;
    transform: translateX(-100%);
}
.container form .title{
    display: block;
    margin-bottom: 8px;
    font-size: 16px;
    font-weight: 500;
    margin: 6px 0;
    color: #333;
}
.container form .fields{
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
}
form .fields .input-field{
    display: flex;
    width: calc(100% / 3 - 15px);
    flex-direction: column;
    margin: 4px 0;
}
.input-field label{
    font-size: 12px;
    font-weight: 500;
    color: #2e2e2e;
}
.input-field input, select{
    outline: none;
    font-size: 14px;
    font-weight: 400;
    color: #333;
    border-radius: 5px;
    border: 1px solid #aaa;
    padding: 0 15px;
    height: 42px;
    margin: 8px 0;
}
.input-field input :focus,
.input-field select:focus{
    box-shadow: 0 3px 6px rgba(0,0,0,0.13);
}
.input-field select,
.input-field input[type="date"]{
    color: #707070;
}
.input-field input[type="date"]:valid{
    color: #333;
}
.container form button, .backBtn{
    display: flex;
    align-items: center;
    justify-content: center;
    height: 45px;
    max-width: 200px;
    width: 100%;
    border: none;
    outline: none;
    color: #fff;
    border-radius: 5px;
    margin: 25px 0;
    background-color: #4070f4;
    transition: all 0.3s linear;
    cursor: pointer;
}
.container form .btnText{
    font-size: 14px;
    font-weight: 400;
}
form button:hover{
    background-color: #265df2;
}
form button i,
form .backBtn i{
    margin: 0 6px;
}
form .backBtn i{
    transform: rotate(180deg);
}
form .buttons{
    display: flex;
    align-items: center;
}
form .buttons button , .backBtn{
    margin-right: 14px;
}

@media (max-width: 750px) {
    .container form{
        overflow-y: scroll;
    }
    .container form::-webkit-scrollbar{
       display: none;
    }
    form .fields .input-field{
        width: calc(100% / 2 - 15px);
    }
}

@media (max-width: 550px) {
    form .fields .input-field{
        width: 100%;
    }
}
</style>






