<?php
include '../components/connection.php';

session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset ($_SESSION['email'])) {
    $newPass = $_POST['password'];
    $gmail = $_SESSION['email'];

    $newHashedPass = password_hash($newPass, PASSWORD_DEFAULT);

    $updatePassword = $conn -> prepare("UPDATE `user` SET `password` = ? WHERE `gmail` = ?");
    $updatePassword -> bind_param("ss", $newHashedPass, $gmail);

    if($updatePassword -> execute()){
        echo "<script>alert('Password update successfully');
        window.location.href = '../main/login.php'
        </script>";
        unset($_SESSION['email']);
        unset($_SESSION['password']);
        exit;
    }
    else { 
        echo "Error updating the password: " . $conn -> error;
        exit;
    }
}
else {
    echo "Server ERROR: " . $conn -> error;
}
$updatePassword -> close();
$conn -> close();

?>