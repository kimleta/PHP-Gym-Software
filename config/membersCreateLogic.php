<?php
include('databaseConnection.php');

$adminID = $_SESSION["adminID"];

// Array of all locations for this user
$sqlLocations = "SELECT id, name FROM `location` WHERE `Admin ID` = '$adminID'";
$result = mysqli_query($con, $sqlLocations);
$resultArray = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Sort locations by id (key) and name (value)
$sortedArray = [];
foreach ($resultArray as $value) {
    $sortedArray[$value["id"]] = $value["name"];
}

// Get packages for all locations
$gymIds = array_column($resultArray, "id");
$gymIds = implode(",", $gymIds);

$sqlPackages = "SELECT * FROM `package_info` WHERE `Gym ID` IN ($gymIds)";
$resultPackages = mysqli_query($con, $sqlPackages);
$resultArrayPackages = mysqli_fetch_all($resultPackages, MYSQLI_ASSOC);

// Sort packages by id (key) and name (value)
$sortedPackages = [];
foreach ($resultArrayPackages as $value) {
    $sortedPackages[$value["ID"]] = $value["Name"];
}

// Process POST request to add user
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST["name"];
    $address = $_POST["address"];
    $number = $_POST["number"];
    $months = $_POST["months"];
    $location = $_POST["location"];
    $packPackage = $_POST["PackPackage"];

    $startDate = date("Y-m-d");
    $endDate = date("Y-m-d", strtotime(' + '.$months.' months'));

    // Find the gym ID based on the selected location
    $gymID = array_search($location, $sortedArray);

    // Find the package ID based on the selected package name
    $package = array_search($packPackage, $sortedPackages);

    // Insert new user into database
    $sqlUser = "INSERT INTO `user`(`Name`, `Address`, `Number`, `GymID`, `Start Date`, `End Date`, `Package ID`)
                VALUES ('$name','$address','$number','$gymID','$startDate','$endDate','$package')";
    $result = mysqli_query($con, $sqlUser);

    if ($result) {
        $_POST = array();
        header('Location: /members.php');
    }
}
?>
