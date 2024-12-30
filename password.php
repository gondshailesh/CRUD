<?php
// Assuming you have a MySQL connection
$servername = "localhost";
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password
$dbname = "students"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm-password'];

    // Basic server-side validation
    if (empty($password) || empty($confirmPassword)) {
        die("Password fields cannot be empty.");
    }

    if ($password !== $confirmPassword) {
        die("Passwords do not match.");
    }

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert the hashed password into the database
    // Assuming you have a 'users' table with 'password' column
    $stmt = $conn->prepare("INSERT INTO login (password) VALUES (?)");
    $stmt->bind_param("s", $hashedPassword);

    if ($stmt->execute()) {
        echo "Password created successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

// Close connection
$conn->close();
