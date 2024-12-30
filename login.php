<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Design by foolishdeveloper.com -->
    <title>Login page</title>
</head>
<style>
    /* Basic reset */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    /* Body and page layout */
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f9;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    /* Container for the login form */
    .login-container {
        background-color: white;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        width: 300px;
        text-align: center;
    }

    /* Heading style */
    h2 {
        margin-bottom: 20px;
        color: #333;
    }

    /* Input group style */
    .input-group {
        margin-bottom: 15px;
        text-align: left;
    }

    .input-group label {
        font-size: 14px;
        color: #555;
    }

    .input-group input {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 14px;
        color: #333;
        margin-top: 5px;
    }

    /* Button style */
    .btn {
        width: 100%;
        padding: 10px;
        background-color: #5c6bc0;
        border: none;
        color: white;
        font-size: 16px;
        cursor: pointer;
        border-radius: 4px;
    }

    .btn:hover {
        background-color: #3f51b5;
    }
</style>

<body>

    <div class="login-container">
        <h2>Login</h2>
        <form action="" method="post">
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" class="btn">Login</button>
        </form>
    </div>


    <?php
    session_start();

    require 'login_config.php';


    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Get username and password from the form
        $input_username = $_POST['username'];
        $input_password = $_POST['password'];
        $stmt = $conn->prepare("SELECT id, user_name, password FROM login WHERE user_name = ?");
        $stmt->bind_param("s", $input_username);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            // If the username exists, fetch the data
            $stmt->bind_result($id, $username, $hashed_password);
            $stmt->fetch();

            // Verify password
            if (password_verify($input_password, $hashed_password)) {
                // Correct password, login successful
                $_SESSION['id'] = $id;
                $_SESSION['username'] = $username;
                header("Location: dashboard.php");  // Redirect to a protected page (dashboard.php)
                exit;
            } else {
                // Incorrect password
                echo "Incorrect password.";
            }
        } else {
            // Username not found
            echo "No user found with that username.";
        }

        $stmt->close();
    }

    $conn->close();


    // if ($_POST['username'] == $username && $_POST['password'] == $password) {

    // // Set session variables
    // $_SESSION['username'] = $username;
    // $_SESSION['loggedin'] = true;

    // echo "Login successful!";
    // // Redirect to another page (e.g., dashboard)
    // header("Location: CREATE.PHP");
    // } else {
    // echo "Invalid username or password!";
    // }
    //
    ?>
</body>

</html>