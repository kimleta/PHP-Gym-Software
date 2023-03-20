<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'horvatovmiroslav');
define('DB_PASSWORD', 'Li7AWAzg2qu8t9k');
define('DB_NAME', 'diplomski');

$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
if($con === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>