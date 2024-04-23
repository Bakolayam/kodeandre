<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="../style/auth.css">
</head>

<body>
    <div class="login-container">
        <h3>Login</h3>
        <form action="../backend/aksi_login.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Login</button>
        </form>
        <hr>
        <div style="margin-top: 10px;">
            Belum punya akun? <br>
            <a href="register.php">
                Daftar disini
            </a>
        </div>
    </div>
</body>

</html>