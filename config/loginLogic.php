<?php 

error_reporting(0);

    include('databaseConnection.php');  
    $username = $_POST['username'];  
    $password = $_POST['password'];  
    if($username || $password){
        //to prevent from mysqli injection  
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($con, $username);  
        $password = mysqli_real_escape_string($con, $password);  
      
        $sql = "select * from admin_user where username = '$username' and password = '$password'";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
          
        if($count == 1){  
            session_start();
            $_SESSION["loggedin"] = true;
            $_SESSION["username"] = $username;  
            $_SESSION['plan'] = $row['plan']; 
            header("location: ./dashboard.php");  
        }  
        else{  
            ?>
            <script type="text/javascript">
            alert('Invalid username or password!');
            </script>
            <?php 
        }     }
?>  