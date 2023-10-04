<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <!-- Your CSS and JavaScript includes go here -->
</head>
<body>
    <h1>Reset Password</h1>
    <form method="post" action="proses_reset_password.php">
        <!-- Tambahkan input untuk password baru dan konfirmasi password baru di sini -->
        <label for="new_password">New Password:</label>
        <input type="password" id="new_password" name="new_password" required><br>

        <label for="confirm_password">Confirm Password:</label>
        <input type="password" id="confirm_password" name="confirm_password" required><br>

        <input type="submit" value="Reset Password">
    </form>
</body>
</html>
