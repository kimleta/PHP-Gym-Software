<?php
    include('databaseConnection.php');  

if(!$_GET['id']){
    header("Location: /dashboard.php");
}else{
    $id = $_GET['id'];
    $sql = "SELECT * FROM `user` WHERE id=($id)" ;
    $resultUser = mysqli_query($con, $sql);
    $resultArrayUser = mysqli_fetch_all($resultUser, MYSQLI_ASSOC);

    
    $packageID= $resultArrayUser[0]['Package ID'];

    $sqlPackage = "select `Name` from `package_info` where `ID` = '$packageID'" ;

    $resultPackage = mysqli_query($con, $sqlPackage);
    $resultArrayPackages = mysqli_fetch_all($resultPackage, MYSQLI_ASSOC);
    $resultArrayUser[0]['Package'] = $resultArrayPackages[0]['Name'];


    if($_POST['months']){
        
    }
    
}