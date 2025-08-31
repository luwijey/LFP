<?php
include '../components/connection.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $gmail = trim($_POST['email']);
    

    $verifyEmail = "SELECT * FROM user WHERE gmail = ? ";
    $stmt = $conn -> prepare($verifyEmail);
    $stmt -> bind_param("s", $gmail);
    $stmt -> execute();
    $user = $stmt -> get_result();

    if($user -> num_rows == 0){
        $fullName = $_POST['fullname'];
        $password = $_POST['password'];
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $filteredFullname = trim(ucwords(strtolower($fullName)));
        
        $insertUser = $conn -> prepare("INSERT INTO user (`name`, `gmail`, `password`) VALUES (?, ?, ?) ");
        $insertUser -> bind_param("sss", $filteredFullname, $gmail, $hashedPassword);

        if($insertUser -> execute()){
            echo "<script> 
            alert ('User has successfully registered!'); 
            window.location.href='../main/login.php'; 
            </script> ";
        }
        else{
            echo "User failed to register" . $conn -> error;
        }
        $insertUser->close();
    } else {
        echo "<script> 
            alert ('User already exist!'); 
            window.location.href='../main/login.php'; 
            </script> "; 
    }
    $stmt -> close();
    $conn -> close(); 
}

?>