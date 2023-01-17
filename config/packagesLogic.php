<?php 

error_reporting(0);

include('databaseConnection.php');  

$adminID = $_SESSION["adminID"];

//Array of all locations for this user

$sqlLocations = "select * from `location` where `Admin ID` = '$adminID'";
$result = mysqli_query($con, $sqlLocations);
$resultArray = mysqli_fetch_all($result, MYSQLI_ASSOC);

/// Sort them by id(key) and name(value)

$sortedArray = [] ;

foreach($resultArray as $value) {
    $sortedArray[$value["ID"]] = $value["Name"] ;
}

//var_dump($sortedArray);exit;


if ($_SERVER['REQUEST_METHOD'] === 'POST') { 

    if($_GET['button'] == "delete") {
    }
    
    if($_GET['button'] == "add") {

        $name = $_POST["name"];
        $description = $_POST["description"];

        $selectOption = $_POST["PackLocation"];

        foreach($sortedArray as $key=>$value){
            if($value == $selectOption){
                $gymID = $key ;
            }
        }

        // Check if there 
        /// inserting into DB
        $sqlPackage = "INSERT INTO `package_info`( `Gym ID`, `Name`, `descripction`) VALUES ('$gymID','$name','$description')";
        $result = mysqli_query($con, $sql);
    }
    
}



?>