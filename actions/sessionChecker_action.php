<?php
session_start();

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header("Expires: 0");

if (!isset($_SESSION['email'])) {
    header("Location: ../actions/404.php");
    exit();
}

$user_ID = $_SESSION['id'];
$name = $_SESSION['name'];
$email = $_SESSION['email'];

?>
