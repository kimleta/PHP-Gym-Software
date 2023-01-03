<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'horv_gymsoftware');
define('DB_PASSWORD', 'eEKGgn@P4xweE5oz');
define('DB_NAME', 'horv_gymsoftware');

$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
if($con === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>