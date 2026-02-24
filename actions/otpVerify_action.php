<?php
include '../components/connection.php';

session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['otp'])){

    $otpArray = $_POST['otp'];
    $enteredOTP = implode("", $otpArray);

    $otpSent = $_SESSION['otpSent'];
    $otpExpiry = $_SESSION['otp-expiry'];

    if (!isset($otpSent) || !isset($otpExpiry)) {
        echo json_encode(["success" => false, "message" => "OTP not found. Please Request again."]);
        exit;
    }

    if (time() > $otpExpiry) { 
        echo json_encode(["success" => false, "message" => "OTP expired, please request a new one."]);
        exit;
    } 

    if (strlen($enteredOTP) < 6){
        echo json_encode(["success" => false, "message" => "Please input complete OTP."]);
        exit;
    }

    if ($enteredOTP == $otpSent) {
        echo json_encode(["success" => true, "message" => "OTP verified!"]);
        unset($otpSent);
        unset($otpExpiry);
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