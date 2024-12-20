<?php
require 'header.php';
require_once 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM `student` WHERE `id` = '$id'";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        die("Query Failed: " . mysqli_error($conn));
    } else {
        $row = mysqli_fetch_assoc($result);
    }
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $fname = $_POST['name'];
    $lname = $_POST['last_name'];
    $newage = $_POST['age'];

    $sql = "UPDATE `student` SET `name` = '$fname', `last_name` = '$lname', `age` = '$newage' WHERE `id` = '$id'";
    $result = mysqli_query($conn, $sql);
    
    if (!$result) {
        die("Query Failed: " . mysqli_error($conn));
    } else {
        header('location:CREATE.PHP?update=You Have Successfully Update');
        exit(); // Always exit after a redirect
    }
}
?>

<!-- Modal Edit -->
<div class="container">
    <div class="content-center w-25">
        <form action="update.php?id=<?php echo $row['id']; ?>" method="post" class="form-control">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" placeholder="Enter your name" name="name" value="<?php echo $row['name']; ?>" required>
            </div>
            <div class="form-group">
                <label for="lastname">Last Name:</label>
                <input type="text" class="form-control" id="lastname" placeholder="Enter your last name" name="last_name" value="<?php echo $row['last_name']; ?>" required>
            </div>
            <div class="form-group mb-3">
                <label for="age">Age:</label>
                <input type="number" class="form-control" id="age" placeholder="Enter your age" name="age" value="<?php echo $row['age']; ?>" required>
            </div>
            <button type="button" class="btn btn-info" onclick="window.history.back();">Close</button>
            <button type="submit" class="btn btn-warning me-4" name="update" value="update">Save&nbsp;<i class="fas fa-edit"></i></button>
        </form>
    </div>
</div>

<?php
require 'footer.php';
?>
