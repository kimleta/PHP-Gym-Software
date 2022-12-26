<?php
// Include config file
require_once "config/databaseConnection.php";



// If form is submited do registration
if($_SERVER['REQUEST_METHOD'] == 'POST'){

// Get Post parameters, trim them before doing something with him
$username = trim($_POST['username']);
$email = trim($_POST['email']);
$password = trim($_POST['password']);
$confirmPasswword = trim($_POST['confirm_password']);

//To escape SQL injection

$username = stripcslashes($username);  
$password = stripcslashes($password);  
$username = mysqli_real_escape_string($con, $username);  
$password = mysqli_real_escape_string($con, $password);  

// Boolean Variables

$validPass = false;
$validUsername = false;
$validEmail = false;

//Check if password match one another and in right format

$regexPassword = preg_match('/^[a-zA-Z0-9_@!?#]+$/',$username);

if(!$regexPassword){
    echo '<script>alert("Only numbers, letters and special characters: _@!?#")</script>';
}else{
 if($password == $confirmPasswword){
    $pass = true ;
 }else{
    echo '<script>alert("Passwords dosen`t match")</script>';
 }
}


 // Check if username exists and in right format
 if($username){
    $sql = "select * from admin_user where username = '$username'";  
    $result = mysqli_query($con, $sql);  
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
    $count = mysqli_num_rows($result);  

    
    $regexUsername = preg_match('/^[a-zA-Z0-9_@!?#]+$/',$username);

    if(!$regexUsername){
        echo '<script>alert("Only numbers, letters and special characters: _@!?#")</script>';
    }else{
        if($count == 0){
            $validUsername = true;
        }else{
            echo '<script>alert("Username already exists, use another one")</script>';
        }
    }
 }
  // Check if email exists
  if($email){
    $sql = "select * from admin_user where username = '$username'";  
    $result = mysqli_query($con, $sql);  
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
    $count = mysqli_num_rows($result);  

    if($count == 0){
        $validEmail = true;
    }else{
        echo '<script>alert("Username already exists, use another one")</script>';
    }
 }


}





?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .container {
            position: fixed;
            top: 50%;
            left: 50%;
            /* bring your own prefixes */
            transform: translate(-50%, -50%);
        }

        .landingLogo {
            text-align: center;
            width: 20vh;
            position: relative;
            margin-top: 2vh;
            z-index: 1000;
        }
    </style>
</head>

<body class="bg-light">
    <div class="container shadow-lg">
        <h2 style="text-align:center">Sign Up</h2>
        <form style="text-align:center;" method="post">
            <img class="landingLogo" style="text-align:center;" src="public/img/AlogoBlack.png">
            <br><br>
            <div class="form-group">
                <label>E-Mail</label>
                <input type="text" name="email" class="form-control" >
            </div>
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control">
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Register">
            </div>
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
        </form>
    </div>
</body>

</html>