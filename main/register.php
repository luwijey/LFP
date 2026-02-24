<?php
    include '../components/header.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/LFP/css/forms.css">
    <script defer src="../js/forms.js"></script>
    <title>Register Account</title>
</head>
<body>
    <div class="text-center">
        <div class="container p-4">
            <h3>Turn loss into hope.</h3>
        </div>
        <div class="container d-flex justify-content-center ">
            <form action="../actions/register_action.php" method="POST">
                <div class="card shadow p-4 border-1 rounded-2">
                    <div class="container border-bottom p-2 mb-4">
                        <h3>Create an Account</h3>
                        <p>Sign up to track lost or found items with ease.</p>
                    </div>
                    <div class="mb-2">
                        <input class="form-control" 
                            type="text" 
                            name="fullname" 
                            id="fullname" 
                            placeholder="Full Name"
                            required
                        >
                    </div>
                    <div class="mb-2">
                        <input  class="form-control" 
                            type="email" 
                            name="email" 
                            id="email" 
                            placeholder="Email"
                            required
                        >
                    </div>
                    <div class="mb-2 position-relative">
                        <input  class="form-control" 
                            type="password" 
                            name="password" 
                            id="password" 
                            placeholder="Password"
                            required
                        >
                        <i class="fi fi-rr-eye-crossed
                            position-absolute 
                            top-50 end-0 
                            translate-middle-y me-3"
                            style="cursor: pointer; display: none;"
                            id="togglePassword">
                        </i>
                    </div>
                    <div class="mt-4">
                        <button class="btn p-2 mb-3 universal-btn rounded-2" 
                            type="submit"> Register
                        </button>
                        <a href="../main/login.php">Already have account?</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>