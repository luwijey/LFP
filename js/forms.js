document.addEventListener('DOMContentLoaded', function () {

    //function for toggle password.
    const passwordInput = document.getElementById('password');
    const toggleIcon = document.getElementById('togglePassword');

    passwordInput.addEventListener('keyup', function () {
        toggleIcon.style.display = this.value.length > 0 ? "block" : "none";
    });

    toggleIcon.addEventListener('click', function () {
        const isPassword = passwordInput.type === "password";
        passwordInput.type = isPassword ? "text" : "password";

        this.classList.toggle('fi-rr-eye-crossed');
        this.classList.toggle('fi-rr-eye');
    })

    //function for OTP input.
    const otpInputs = document.querySelectorAll('.otp-input');

    otpInputs.forEach((input, index) => {

        input.addEventListener('input', () => {
            const value = input.value;
            if (!/^\d$/.test(value)) {
                input.value = '';
                return;
            }

            if (value.length === 1 && index < otpInputs.length - 1) {
                otpInputs[index + 1].focus();
            }
        });


        input.addEventListener('keydown', (e) => {
            if (e.key === 'Backspace' && input.value.length === 0 && index > 0) {
                otpInputs[index - 1].focus();
            }
        });
    });
});

document.getElementById("emailForm").addEventListener("submit", (e) => {
    e.preventDefault();

    const email = document.getElementById("email").value;

    fetch("../vendor/sendMail.php", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: "email=" + encodeURIComponent(email)
    })
        .then(res => res.json())
        .then(data => {
            console.log("Response from PHP:", data);

            if (data.success) {
                document.getElementById("enterEmail").classList.add("d-none");
                document.getElementById("enterOTP").classList.remove("d-none");
            }
            else {
                alert(data.message);
            }
        })
        .catch(err => console.error("ERROR", err));
});

document.getElementById("enterOTP").addEventListener("submit", (e) => {
    e.preventDefault();

    const formData = new FormData(document.getElementById("otpForm"));

    fetch("../actions/otpVerify_action.php", {
        method: "POST",
        body: formData
    })
        .then(res => res.json())
        .then(data => {
            console.log("Response from PHP:", data);

            if (data.success) {
                document.getElementById("enterOTP").classList.add("d-none");
                document.getElementById("enterNewPass").classList.remove("d-none");
            }
            else {
                alert(data.message);
            }
        })
        .catch(err => console.error("Error Verifying OTP: ", err));

});

