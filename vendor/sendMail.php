<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php'; // Ensure the path is correct
include '../components/connection.php';
header('Content-Type: application/json');

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['email'])) {
    $email = $_POST['email'];

    $verifyEmail = "SELECT * FROM user WHERE gmail = ? ";
    $stmt = $conn -> prepare($verifyEmail);
    $stmt -> bind_param("s", $email); 
    $stmt -> execute();
    $user = $stmt -> get_result();   

    if ($user->num_rows == 0) {
        echo json_encode(["success" => false, "message" => "The email doesn't exist."]);
        exit;
    }

    $otp = rand(100000, 999999);    
    $_SESSION['otpSent'] = $otp;
    $_SESSION['email'] = $email;
    $_SESSION['otp-expiry'] = time() + 300; //5mins expiry 

    $mail = new PHPMailer(true);

    try {
            $mail->isSMTP();
            $mail->Host = 'sandbox.smtp.mailtrap.io'; //SMTP server
            $mail->SMTPAuth = true;
            $mail->Username = '68472658383235'; //Mailtrap username
            $mail->Password = 'df058456c03d03'; //Mailtrap password
            $mail->SMTPSecure = 'tls';
            $mail->Port = 2525;

            // Sender and recipient settings
            $mail->setFrom('info@mailtrap.io', 'LostAndFound');
            $mail->addAddress($email); // Primary recipient

            // Email content
            $mail->isHTML(true); // Set email format to HTML
            $mail->Subject = "OTP for Lost and Found";
            $mail->Body = "Hello ! Your One-Time-Password is:<b>$otp</b>";

            $mail->send();

            echo json_encode(["success" => true, "message" => "OTP sent"]);

            
            $stmt->close();
            $conn->close();
            exit;

        } catch (Exception $e) {
            echo json_encode(["success" => false, "message" => "Mailer Error: " . $mail->ErrorInfo]);
            exit;
        }
    
    
}
else {
    echo json_encode(["success" => false, "message" => "Invalid request."]);
}

?>