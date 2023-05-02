<?php
include "config/loginLogic.php";
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
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
            text-align:center;
            width:20vh;
            position: relative;
            margin-top: 2vh;
            z-index: 1000 ;
            }
    </style>
</head>
<body class="bg-light">
    <div class="container shadow-lg">
        <h2 style="text-align:center">Login</h2>
        <form style ="text-align:center;" method="post">
                <img class = "landingLogo" style ="text-align:center;" src="public/img/AlogoBlack.png">
                <br><br>
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
            </div>    
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
            <p><a href="index.php">Go back to homepage</a>.</p>
        </form>
    </div>
</body>
</html>