<?php

include('databaseConnection.php');

/// Packages logic, change if and location to name


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if($_POST["id"]) {
        $id = $_POST["id"];
    }else{
        $id = 'null' ;
    }
    if($_POST["name"]) {
        $name = $_POST["name"];
    }else{
        $name = 'null' ;
    }

    $sql = "SELECT *  FROM `user` WHERE `ID` = $id OR `Name` LIKE '%$name%' ";

    $result = mysqli_query($con, $sql);

    $user = mysqli_fetch_assoc($result);




    if($user){

        /// Check if user is active if yes dont do nothing :) 
        $user = implode("|",$user);
        $s = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 7)), 0, 7);
        $cookieName = "member-" .$s ;
        setcookie($cookieName, $user ,time()+7200);
        header("Location: dashboard.php");
    }else{
        echo "<script>alert('There is no user with name or ID like that !')</script>";
    }



    
}

if($_GET['remove']){

    $id = $_GET['remove'] ;
    setcookie($id, null ,time()-10);
    header("Location: dashboard.php");

}

$arrayOfMemberCookies = [] ;

foreach($_COOKIE as $key => $value){
    if(substr($key,0,6) == "member"){
        $arrayOfMemberCookies[] = $key ; 
    }
}