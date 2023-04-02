<?php

include('databaseConnection.php');

$adminID = $_SESSION["adminID"];


// Array of all locations for this user
$sqlUsers = "SELECT `ID`, `Name`, `End Date`,`Number` FROM `user` ORDER BY `End Date` ASC; ";
$result = mysqli_query($con, $sqlUsers);
$resultArray = mysqli_fetch_all($result, MYSQLI_ASSOC);


$arrayMembers =[]; 

foreach($resultArray as $key => $member){

   $date =  strtotime($member["End Date"]);
    $time = time();



    $dangerZone= 604800 ; // Week

    if($date-$time < $dangerZone) {
        $member["status"] = 1 ;   /// Warning
        
    }

    if($date-$time < 0) {
        $member["status"] = 2 ;   /// Expired
        $arrayMembers[] = $member ;
        continue ;
    }

    $arrayMembers[] = $member ;

}
