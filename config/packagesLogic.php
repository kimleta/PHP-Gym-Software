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
    // Get name of package
    $value['Gym Name'] = $sortedArray[$value['Gym ID']];
    $sortedPackages[] = $value ;
}

////


if($_GET["id"]){

    $id = $_GET["id"];

    $sqlPackagesByID = "select * from `package_info` where `ID`= '$id'";
    $resultPackagesByID = mysqli_query($con, $sqlPackagesByID);
    $resultArrayPackagesByID = mysqli_fetch_all($resultPackagesByID, MYSQLI_ASSOC);

}



if ($_SERVER['REQUEST_METHOD'] === 'POST') { 

    if($_GET['button'] == "delete") {
        $selectOption = $_POST['package'];

        $sqlDelete = "delete from `package_info` where `ID` = '$selectOption'";
        $result = mysqli_query($con, $sqlDelete);

        if($result){
            $_POST = array();
            header('Location: /packages.php');
        } 

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
        $result = mysqli_query($con, $sqlPackage);

        
        if($result){
            $_POST = array();
            header('Location: /packages.php');
        } 
    }
    if($_GET["id"]){

        $idPackage = $resultArrayPackagesByID[0]["ID"];
        $name = $_POST["name"];
        $description = $_POST["description"];

        $selectOption = $_POST["PackLocation"];
    
        foreach($sortedArray as $key=>$value){
            if($value == $selectOption){
                $gymIdForUpdate = $key ;
            }
        }


        $sqlPackagesUpdate = "UPDATE `package_info` SET `Gym ID`='$gymIdForUpdate',`Name`='$name',`descripction`='$description' WHERE `ID` = '$idPackage'";
        $resultPackagesUpdate = mysqli_query($con, $sqlPackagesUpdate);
    
        if($resultPackagesUpdate){
            $_POST = array();
            header('Location: /packages.php');
        } 

    }
    
    
}



?>