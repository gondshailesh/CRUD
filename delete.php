<?php
require 'header.php';

if (isset($_GET['id'])) {



    $id = $_GET['id'];

    $sql = "DELETE FROM `student` WHERE `id`= '$id'";

    if (mysqli_query($conn, $sql)) {
        header('Location:CREATE.PHP?msg=Record deleted successfully');
        exit();
    } else {
        // Handle query error
        die("Error deleting record: " . mysqli_error($conn));
    }
} else {
    die("No ID provided for deletion.");
}



?>



<?php
require 'footer.php';
?>