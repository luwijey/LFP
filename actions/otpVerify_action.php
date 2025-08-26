<?php
include '../components/connection.php';

session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['otp'])){

    $otpArray = $_POST['otp'];
    $enteredOTP = implode("", $otpArray);

    if (!isset($_SESSION['otpSent']) || !isset($_SESSION['otp-expiry'])) {
        echo json_encode(["success" => false, "message" => "OTP not found. Please Request again."]);
        exit;
    }

    if (time() > $_SESSION['otp-expiry']) { 
        echo json_encode(["success" => false, "message" => "OTP expired, please request a new one."]);
        exit;
    } 

    if (strlen($enteredOTP) < 6){
        echo json_encode(["success" => false, "message" => "Please input complete OTP."]);
        exit;
    }

    if ($enteredOTP == $_SESSION['otpSent']) {
        echo json_encode(["success" => true, "message" => "OTP verified!"]);
        unset($_SESSION['otpSent']);
        unset($_SESSION['otp-expiry']);
        exit;
    }
    else {
        echo json_encode(["success" => false, "message" => "Invalid OTP!"]);
        exit;
    }   
} else { 
    echo json_encode(["success" => false, "message" => "Invalid Request"]);
}

?>