<?php 

$server = "localhost";
$username = "root";
$password = "";
$db = "lf_db";

$conn = mysqli_connect($server = "localhost", $username = "root", $password = "", $db = "lf_db");

    if(!$conn) {
        die("Connection Failed: " . mysqli_connect_error());
    }
?>
