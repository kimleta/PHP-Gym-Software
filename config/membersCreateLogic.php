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
        $result = mysqli_query($con, $sqlPackage);

        
        if($result){
            $_POST = array();
            header('Location: /members.php');
        } 
    }
    
}



?>