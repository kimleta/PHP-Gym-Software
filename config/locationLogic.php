<?php

include 'databaseConnection.php';

$adminID = $_SESSION["adminID"];

//Array of all locations for this user

$sqlLocations = "select * from `location` where `Admin ID` = '$adminID'";
$result = mysqli_query($con, $sqlLocations);
$array = [];

$resultArray = mysqli_fetch_all($result, MYSQLI_ASSOC);

// For adding and deleting locations
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];

    if ($_GET['button'] == "delete") {

        $selectOption = $_POST['location'];
        $sqlDelete = "delete from `location` where `Name` = '$selectOption'";
        $result = mysqli_query($con, $sqlDelete);

        if($result){
            $_POST = array();
            header('Location: /location.php');
        }
    }

    if ($_GET['button'] == "add") {

        if (empty($name)) {
            echo "<script>alert('Please enter a name of location!')</script>";
        } else {

            //Check if this user has this location alredy

            $sqlCheck = "select * from `location` where `Name` = '$name' and `Admin ID` = '$adminID'";
            $result = mysqli_query($con, $sqlCheck);
            $count = mysqli_num_rows($result);

            //If there is location with that name
            if ($count > 0) {
                echo "<script>alert('This location for this user exists !')</script>";
            } else {
                // Insert new location
                $sql = "INSERT INTO `location`(`Name`, `Admin ID`) VALUES ('$name','$adminID')";
                $result = mysqli_query($con, $sql);

                if ($result) {
                    $_POST = array();
                    header('Location: /location.php');
                } else {
                    echo "<script>alert('You failed inserting new location, please try again leter')</script>";
                }

            }

        }
    }
}
