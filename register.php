<?php
// Include config file
require_once "config/databaseConnection.php";


// Include register logic
include "config/registerLogic.php";



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
                <input type="email" name="email" class="form-control" <?php if($email){?> value="<?= $email ?>" <?php } ?> required >
            </div>
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control"<?php if($username){?> value="<?= $username ?>" <?php } ?> required >
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" <?php if($password){?> value="<?= $password ?>" <?php } ?> required >
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control" required >
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Register">
            </div>
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
        </form>
    </div>
</body>

</html>