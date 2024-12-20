<?php
// Define database connection constants
define("HOSTNAME", "localhost");
define("USERNAME", "root");
define("PASSWORD", "");
define("DATABASE", "login");

// Create a connection to the database
$conn = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE);

// Check the connection
if (!$conn) {
    die("Connection Error: " . mysqli_connect_error()); // Display a more detailed error message
} else {
    echo "Connected successfully to the database!";
}
?>