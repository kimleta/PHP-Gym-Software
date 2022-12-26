<?php
error_reporting(0);
// If form is submited do registration
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

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

    $regexPassword = preg_match('/^[a-zA-Z0-9_@!?#]+$/', $username);

    if (!$regexPassword) {
        echo '<script>alert("Only numbers, letters and special characters: _@!?#")</script>';
    } else {
        if ($password == $confirmPasswword) {
            $validPass = true;
        } else {
            echo '<script>alert("Passwords dosen`t match")</script>';
        }
    }


    // Check if username exists and in right format
    if ($username) {
        $sql = "select * from admin_user where username = '$username'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);


        $regexUsername = preg_match('/^[a-zA-Z0-9_@!?#]+$/', $username);

        if (!$regexUsername) {
            echo '<script>alert("Only numbers, letters and special characters: _@!?# are allowed")</script>';
        } else {
            if ($count == 0) {
                $validUsername = true;
            } else {
                echo '<script>alert("Username already exists, use another one")</script>';
            }
        }
    }
    // Check if email exists
    if ($email) {

        $regexEmail = preg_match('/^[a-zA-Z0-9@.]+$/', $email);


        if (!$regexEmail) {
            echo '<script>alert("Only numbers, letters and special characters: @. are allowed")</script>';
        } else {

            $sql = "select * from admin_user where email = '$email'";
            $result = mysqli_query($con, $sql);
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $count = mysqli_num_rows($result);

            if ($count == 0) {
                $validEmail = true;
            } else {
                echo '<script>alert("Email already exists")</script>';
            }
        }
    }


    /// Send query to database if everything is TRUE 

        if($validEmail && $validPass && $validUsername){
            $sql = "INSERT INTO `admin_user`(`email`, `username`, `password`, `plan`) VALUES ('$email','$username','$password','Free')";
            $result = mysqli_query($con, $sql);


            // Emtpying Post Data
            $_POST = array();

            header("location: success.php");
            
        }

}








?>