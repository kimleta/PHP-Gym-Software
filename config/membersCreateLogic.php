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





///// Get Packages
$gymIds = [] ;

foreach($resultArray as $key => $value){
    $gymIds[] = $value['id'] ;
}
$gymIds = implode(",",$gymIds);

$sqlPackages = "select * from `package_info` where `Gym ID` in ($gymIds)";
$resultPackages = mysqli_query($con, $sqlPackages);
$resultArrayPackages = mysqli_fetch_all($resultPackages, MYSQLI_ASSOC);

$sortedPackages = []; 



foreach($resultArrayPackages as $key=> $value){
    $sortedPackages[$value["ID"]] = $value["Name"] ;
}

////



if ($_SERVER['REQUEST_METHOD'] === 'POST') { 

        $name = $_POST["name"];
        $address = $_POST["address"];
        $number = $_POST["number"];
        $months = $_POST["months"];
        $location = $_POST["location"];
        $PackPackage = $_POST["PackPackage"];

        $startDate = date("Y-m-d") ;
        $endDate = date("Y-m-d", strtotime(' + '.$months.' months'));

        foreach($sortedArray as $key=>$value){
            if($value == $location){
                $gymID = $key ;
            }
        }

        foreach($sortedPackages as $key=>$value){
            if($value == $PackPackage){
                $package = $key ;
            }
        }


        // Check if there 
        /// inserting into DB
        $sqlUser = "INSERT INTO `user`(`Name`, `Address`, `Number`, `GymID`, `Start Date`, `End Date`, `Package ID`) VALUES ('$name','$address','$number','$gymID','$startDate','$endDate','$package')";
        $result = mysqli_query($con, $sqlUser);

        if($result){
            $_POST = array();
            header('Location: /members.php');
        } 
    }
    



?>