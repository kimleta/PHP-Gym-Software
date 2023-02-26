<?php

include('databaseConnection.php');  


if($_GET['name'] OR $_GET['id']){

    if($_GET['id']){

    $_GET['id'] = ltrim($_GET['id'], "0"); 
    $sqlMembers = "select * from `user` where ID =". $_GET['id'];
        //var_dump($sqlMembers);exit;
    } else{

    $sqlMembers = "select * from `user` where Name LIKE '". $_GET['name']."%'";

    }

    $result = mysqli_query($con, $sqlMembers);
    $resultArray = mysqli_fetch_all($result, MYSQLI_ASSOC);
     
    foreach($resultArray as $key =>$array){

    $packageID= $array['Package ID'];

    $sqlPackage = "select `Name` from `package_info` where `ID` = '$packageID'" ;

    $resultPackage = mysqli_query($con, $sqlPackage);
    $resultArrayPackages = mysqli_fetch_all($resultPackage, MYSQLI_ASSOC);
    $resultArray[$key]['Package Name'] = $resultArrayPackages[0]["Name"];

    }



}