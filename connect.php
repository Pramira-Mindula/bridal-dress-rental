<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bridal_dresses";

//create connection
$conn = new mysqli ($servername, $username, $password, $dbname);

//check the connection
if ($conn -> connect_errno){
    die("Connection Failed : " .$conn -> connect_error);
}
// else {
//     echo "Connection Succeeded";
// }

error_reporting(E_ALL);
ini_set('display_errors', 1);



?>