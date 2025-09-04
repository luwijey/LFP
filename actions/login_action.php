<?php 
include '../components/connection.php';
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['email'])) {
    $gmail = $_POST['email'];
    $pass = $_POST['password'];

    $stmt = $conn -> prepare("SELECT `gmail`, `password`, `name` FROM `user` WHERE `gmail` = ? LIMIT 1");
    $stmt -> bind_param("s", $gmail);
    $stmt -> execute();
    $user = $stmt -> get_result();
    
    if ($user -> num_rows === 1){
        $row = $user -> fetch_assoc();
        $name = $row['name'];
        
        if(password_verify($pass, $row['password'])){
            $_SESSION['email'] = $gmail;
            $_SESSION['name'] = $name;
            echo "Login Successful !";
            header("Location: ../main/lfp.php");
            exit;
        }
        else {  
            echo "Invalid credentials please try again";
        }
    }
    else { 
            echo "User not found";
    }
    $stmt->close();
    $conn->close();
}
else {
    echo "Request Invalid: " . $conn -> error; 
}

?>