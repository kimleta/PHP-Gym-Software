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


$sqlPackages = "select * from `group_sessions` where `GymID` in ($gymIds)";
$resultPackages = mysqli_query($con, $sqlPackages);
$resultArrayPackages = mysqli_fetch_all($resultPackages, MYSQLI_ASSOC);

$sortedPackages = []; 

foreach($resultArrayPackages as $key=> $value){
    // Get name of package
    $value['Gym Name'] = $sortedArray[$value['Gym ID']];
    $sortedPackages[] = $value ;
}


////



if ($_SERVER['REQUEST_METHOD'] === 'POST') { 

    if($_GET['button'] == "delete") {
        $selectOption = $_POST['package'];

        $sqlDelete = "delete from `group_sessions` where `ID` = '$selectOption'";
        $result = mysqli_query($con, $sqlDelete);

        if($result){
            $_POST = array();
            header('Location: /sessions.php');
        } 

    }
    
    if($_GET['button'] == "add") {

        $name = $_POST["name"];
        $date = $_POST["date"];
        $time = $_POST["time"];
        $instructor = $_POST["instructor"];

        $selectOption = $_POST["PackLocation"];


        foreach($sortedArray as $key=>$value){
            if($value == $selectOption){
                $gymID = $key ;
            }
        }


        // Check if there 
        /// inserting into DB
        $sqlPackage = "INSERT INTO `group_sessions`(`Date`, `Name`, `Time`, `GymID`, `Location`, `Fitness instructor`) VALUES ('$date','$name','$time','$gymID','$selectOption','$instructor')";
        //var_dump($sqlPackage);exit;
        $result = mysqli_query($con, $sqlPackage);

        
        if($result){
            $_POST = array();
            header('Location: /sessions.php');
        } 
    }
    
}



?>