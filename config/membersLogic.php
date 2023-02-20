<?php 


include('databaseConnection.php');  

$adminID = $_SESSION["adminID"];

//Array of all locations for this user

$sqlLocations = "select id,name from `location` where `Admin ID` = '$adminID'";
$result = mysqli_query($con, $sqlLocations);
$resultArray = mysqli_fetch_all($result, MYSQLI_ASSOC);
 
/// Sort them by id(key) and name(value)


$sortedArray = [] ;
foreach($resultArray as $value) {
    $sortedArray[$value["id"]] = $value["name"] ;
}


///// Get Sessions
$gymIds = [] ;

foreach($resultArray as $key => $value){
    $gymIds[] = $value['id'] ;
}
$gymIds = implode(",",$gymIds);


$sqlPackages = "select * from `user` where `GymID` in ($gymIds)";
$resultPackages = mysqli_query($con, $sqlPackages);
$resultArrayPackages = mysqli_fetch_all($resultPackages, MYSQLI_ASSOC);

foreach($resultArrayPackages as $key => $array) {

    $packageID= $array['Package ID'];
    $sqlPackage = "select `Name` from `package_info` where `ID` = '$packageID'" ;

    $resultPackage = mysqli_query($con, $sqlPackage);
    $resultArrayPackage = mysqli_fetch_all($resultPackage, MYSQLI_ASSOC);
    $resultArrayPackages[$key]['Package Name'] = $resultArrayPackage[0]["Name"];
}





?>