<?php 

error_reporting(0);



include('databaseConnection.php');  
if($_GET['button'] == "delete") {
}

if($_GET['button'] == "add") {
    
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') { 

    $name = $_POST['name'];

    $description = $_POST['desctiption'];

    $sql = "INSERT INTO `package_info`(`Gym ID`, `Name`, `descripction`) VALUES ('$name','$description')";
    $result = mysqli_query($con, $sql);


}



?>