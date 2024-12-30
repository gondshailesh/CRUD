<?php
include_once 'login_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $oldPassword = $_POST['old-password'];
    $newPassword = $_POST['new-password'];
    $confirmPassword = $_POST['confirm-password'];

    // Basic validation to ensure the fields are not empty
    if (empty($oldPassword) || empty($newPassword) || empty($confirmPassword)) {
        die("All fields are required.");
    }

    if ($newPassword !== $confirmPassword) {
        die("New passwords do not match.");
    }

    // Assume we have a user_id or username stored in session or passed via GET/POST
    // Example: Getting user_id from the session
    // session_start();
    // if (!isset($_SESSION['user_id'])) {
    //     die("User not logged in.");
    // }

    // $userId = $_SESSION['user_id'];

    // Retrieve the current password from the database
    $stmt = $conn->prepare("SELECT password FROM login WHERE password = ?");
    $stmt->bind_param("i", $userId); // Assuming user_id is an integer
    $stmt->execute();
    $stmt->bind_result($hashedPassword);
    $stmt->fetch();
    $stmt->close();

    // Check if the old password matches
    if (!password_verify($oldPassword, $hashedPassword)) {
        die("Old password is incorrect.");
    }

    // Hash the new password
    $newHashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

    // Update the password in the database
    $updateStmt = $conn->prepare("UPDATE login SET password = ? WHERE password = ?");
    $updateStmt->bind_param("si", $newHashedPassword, $userId);

    if ($updateStmt->execute()) {
        echo "Password updated successfully!";
    } else {
        echo "Error: " . $updateStmt->error;
    }

    $updateStmt->close();
}

// Close the database connection
$conn->close();
