<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Password</title>
</head>

<body>

    <h2>Update Password</h2>
    <form action="passupdate.php" method="POST">
        <label for="old-password">Old Password:</label>
        <input type="password" id="old-password" name="old-password" required>
        <br><br>

        <label for="new-password">New Password:</label>
        <input type="password" id="new-password" name="new-password" required>
        <br><br>

        <label for="confirm-password">Confirm New Password:</label>
        <input type="password" id="confirm-password" name="confirm-password" required>
        <br><br>

        <button type="submit">Update Password</button>
    </form>

</body>

</html>