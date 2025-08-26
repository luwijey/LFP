<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include '../components/header.php'; ?>
    <?php require '../components/connection.php'; ?>
    <link rel="stylesheet" href="/LFP/css/login.css">
    <link rel="stylesheet" href="/LFP/css/forms.css">
    <script src="../js/forms.js"></script>


    <title>Login</title>
</head>

<body>
    <div class="d-flex justify-content-center align-items-center vh-100 custom-container">
        <div class="card border-0 p-3 bg-transparent custom-card">
            <h3>Turn loss into hope.</h3>
            <p>Report or recover items with the Lost and Found Platform.</p>
        </div>
        <div class="card shadow border-1 p-1 rounded-2">
            <div class="card-body d-flex justify-content-center align-items-center">
                <form action="../actions/login_action.php" method="POST">
                    <div class="form-floating flex-column m-2 custom-input">
                        <input class="form-control custom-input-border" 
                            type="email" id="email" 
                            name="email" placeholder="email" 
                            required
                        >
                        <label for="email">Email</label>
                    </div>   
                    
                    <div class="form-floating position-relative m-2 custom-input">
                        <input 
                            class="form-control custom-input-border" 
                            type="password" id="password" 
                            name="password" placeholder="password"
                            required
                        >
                        <label for="password">Password</label>
                        <i class="fi fi-rr-eye-crossed
                            position-absolute 
                            top-50 end-0 
                            translate-middle-y me-3"
                            style="cursor: pointer; display:none;"
                            id="togglePassword">
                        </i>
                    </div>  

                    <div class="d-flex mt-2 justify-content-center">
                        <button class="btn rounded-2 m-2 p-2 universal-btn" 
                            type="submit">
                            Log In
                        </button>
                    </div>

                    <div class="d-flex m-2 justify-content-center">
                        <a href="../main/forgotPassword.php" class= "link-offset-1 
                            link-underline 
                            link-underline-opacity-0">
                            Forgot Password?
                        </a>
                    </div>

                    <div class="d-flex container border-top p-3 mt-4 justify-content-center custom-reg-container">
                       <a class="btn rounded-2 custom-btn-register" 
                        href="../main/register.php" 
                        role="button">
                        Register
                        </a>
                    </div>
                </form>
                <div class="logo-wrapper">
                    <img class="m-3" src="../uploads/LF_logo.png" 
                        height="350px;" 
                        width="350px;" 
                        alt="LF_Logo"
                    >
                </div>
            </div>
        </div>
    </div>
</body>

</html> 