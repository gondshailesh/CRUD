<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Password</title>
    <style>
        .error {
            color: red;
        }

        .success {
            color: green;
        }

        .password-strength {
            height: 5px;
            margin-top: 5px;
            width: 100%;
        }
    </style>
</head>

<body>

    <h2>Create Password</h2>
    <form action="password.php" method="POST" onsubmit="return validatePassword()">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <span id="password-error" class="error"></span>
        <br><br>

        <label for="confirm-password">Confirm Password:</label>
        <input type="password" id="confirm-password" name="confirm-password" required>
        <span id="confirm-error" class="error"></span>
        <br><br>

        <div>
            <label>Password Strength:</label>
            <div id="strength-bar" class="password-strength"></div>
        </div>
        <br><br>

        <button type="submit">Create Password</button>
    </form>

    <script>
        // Password strength function
        function checkPasswordStrength(password) {
            let strength = 0;

            // Check length
            if (password.length >= 8) strength += 1;

            // Check for uppercase letters
            if (/[A-Z]/.test(password)) strength += 1;

            // Check for numbers
            if (/\d/.test(password)) strength += 1;

            // Check for special characters
            if (/[!@#$%^&*(),.?":{}|<>]/.test(password)) strength += 1;

            // Update the strength bar and feedback
            const strengthBar = document.getElementById("strength-bar");
            const strengthLevels = ['red', 'orange', 'yellow', 'green'];
            strengthBar.style.width = (strength * 25) + "%";
            strengthBar.style.backgroundColor = strengthLevels[strength];

            return strength;
        }

        // Validate password on submit
        function validatePassword() {
            const password = document.getElementById("password").value;
            const confirmPassword = document.getElementById("confirm-password").value;
            let valid = true;

            // Reset errors
            document.getElementById("password-error").innerHTML = "";
            document.getElementById("confirm-error").innerHTML = "";

            // Password strength validation
            const strength = checkPasswordStrength(password);
            if (strength < 3) {
                document.getElementById("password-error").innerHTML = "Password is too weak. It must have at least 8 characters, one uppercase letter, one number, and one special character.";
                valid = false;
            }

            // Check if passwords match
            if (password !== confirmPassword) {
                document.getElementById("confirm-error").innerHTML = "Passwords do not match.";
                valid = false;
            }

            return valid;
        }
    </script>

</body>

</html>