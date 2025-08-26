<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include '../components/header.php'; ?>
    <link rel="stylesheet" href="/LFP/css/forms.css">
    <link rel="stylesheet" href="/LFP/css/forgotPw.css">
    <script defer src="../js/forms.js"></script>
    <title>Forgot Password</title>
</head>
<body>
    <div class="container p-2 align-items-center justify-content-center vh-100 custom-container">
        <div class="container p-3 d-flex justify-content-center">
            <nav style="--bs-breadcrumb-divider: '->';" aria-label="breadcrumb">
                <ol class="breadcrumb" >
                    <li class="breadcrumb-item">
                        <a href="#enterEmail" id="verify-label" class="link-dark link-underline link-underline-opacity-0">
                            Verify Email
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#enterOTP" id="OTP-label" class="link-dark link-underline link-underline-opacity-0">
                            OTP
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#enterNewPass" id="newPass-label" class="link-dark link-underline link-underline-opacity-0">
                            New Password
                        </a>
                    </li>
                </ol>
            </nav>
        </div>  
        <!--Verify Email-->
        <div class="container p-2 mt-2 " id="enterEmail">
            <div class="container card mx-auto" style="width:25rem;" >
                <div class="card-header pt-3">
                    <h3>Recover Account</h3> 
                </div>
                <div class="card-body">
                    <form id="emailForm">
                        <p>Please enter your email for OTP.</p> 
                        <div class="form-floating">
                            <input class="form-control" id="email" name="email" type="email" placeholder="Email" required>
                            <label for="email">Email</label>
                        </div>
                        <div class="card-footer mt-3 d-flex justify-content-around gap-4">
                            <button class="btn universal-btn " type="submit" id="otp-btn" >Send OTP</button>
                            <button class="btn btn-link universal-btn" 
                                    onclick="window.location.href='../main/login.php'" type="button">
                                    Cancel
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--Enter OTP-->
        <div class="container p-2 mt-2 d-none" id="enterOTP">
            <div class="container card mx-auto" style="width:25rem;" >
                <div class="card-header pt-3 ">
                    <h3>OTP Verification</h3> 
                </div>
                <div class="card-body">
                    <form id="otpForm">
                        <p>Please enter your OTP for verification.</p> 
                        <div class="d-flex input-group mb-3">
                            <input type="text" inputmode="numeric" maxlength="1" 
                                class="otp-input input-group-text form-control m-1 border border-1 border-dark-subtle" 
                                id="otp-1" 
                                name="otp[]"
                                autocomplete="otp-password"
                            >
                            <input type="text" inputmode="numeric" maxlength="1" 
                                class="otp-input input-group-text form-control m-1 border border-1 border-dark-subtle" 
                                id="otp-2" 
                                name="otp[]"
                                autocomplete="otp-password"
                            >
                            <input type="text" inputmode="numeric" maxlength="1" 
                                class="otp-input input-group-text form-control m-1 border border-1 border-dark-subtle" 
                                id="otp-3" 
                                name="otp[]"
                                autocomplete="otp-password"
                            >
                            <input type="text" inputmode="numeric" maxlength="1" 
                                class="otp-input input-group-text form-control m-1 border border-1 border-dark-subtle" 
                                id="otp-4" 
                                name="otp[]"
                                autocomplete="otp-password"
                            >
                            <input type="text" inputmode="numeric" maxlength="1" 
                                class="otp-input input-group-text form-control m-1 border border-1 border-dark-subtle" 
                                id="otp-5" 
                                name="otp[]"
                                autocomplete="otp-password"
                            >
                            <input type="text" inputmode="numeric" maxlength="1" 
                                class="otp-input input-group-text form-control m-1 border border-1 border-dark-subtle" 
                                id="otp-6" 
                                name="otp[]"
                                autocomplete="otp-password"
                            >
                        </div>
                        <div class="card-footer p-4 mt-3 ">
                            <button class="btn universal-btn " type="submit" id="verify-btn" >Verify</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--New Password-->
        <div class="container p-2 mt-2 d-none" id="enterNewPass">
            <div class="container card mx-auto" style="width:25rem;">
                <div class="card-header pt-3 ">
                    <h3>New Password</h3> 
                </div>
                <div class="card-body">
                    <form id="newPassForm" action="../actions/newPass_action.php" method="POST">
                        <p>Enter your new password.</p> 
                        <div class="form-floating">
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
                        <div class="card-footer p-4 mt-4 ">
                            <button class="btn universal-btn " type="submit" id="create-btn" >Create Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>    
    </div>
</body>
</html>