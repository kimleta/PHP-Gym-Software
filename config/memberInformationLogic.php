<?php
include('databaseConnection.php');


// Location logic


if (!isset($_GET['id'])) {
    header("Location: /dashboard.php");
    exit();
}

$id = $_GET['id'];

// Retrieve user data
$sql = "SELECT * FROM `user` WHERE id=$id";
$resultUser = mysqli_query($con, $sql);

if (!$resultUser) {
    // Handle error
    exit("Error retrieving user data");
}

$user = mysqli_fetch_assoc($resultUser);

// Retrieve package name
$sqlPackage = "SELECT `Name` FROM `package_info` WHERE `ID` = '{$user['Package ID']}'";
$resultPackage = mysqli_query($con, $sqlPackage);

if (!$resultPackage) {
    // Handle error
    exit("Error retrieving package data");
}

$package = mysqli_fetch_assoc($resultPackage);

$user['Package'] = $package['Name'];

// Delete user
if (isset($_GET["action"]) && $_GET["action"] == "delete") {
    $sqlDelete = "DELETE FROM `user` WHERE ID = '$id'";
    $result = mysqli_query($con, $sqlDelete);

    if ($result) {
        header("Location: /members.php");
        exit();
    } else {
        // Handle error
        exit("Error deleting user");
    }
}

// Update user's end date
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $months = $_POST['months'];

    $sqlDate = "SELECT `End Date` FROM `user` WHERE `ID` = '$id'";
    $resultDate = mysqli_query($con, $sqlDate);

    if (!$resultDate) {
        // Handle error
        exit("Error retrieving user end date");
    }

    $userEndDate = mysqli_fetch_assoc($resultDate)['End Date'];
    $newEndDate = date("Y-m-d", strtotime("+$months months", strtotime($userEndDate)));

    $sqlUpdateDate = "UPDATE `user` SET `End Date` = '$newEndDate' WHERE `ID` = '$id'";
    $resultUpdateDate = mysqli_query($con, $sqlUpdateDate);

    if (!$resultUpdateDate) {
        // Handle error
        exit("Error updating user end date");
    }

    header("Location: /member-info.php?id=$id");
    exit();
}
