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
        <h3>Register</h3>
        <form action="../backend/register.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <label for="email">email:</label>
            <input type="email" id="email" name="email" required>
            <label for="nama">Nama Lengkap:</label>
            <input type="text" id="nama" name="nama" required>
            <label for="alamat">Alamat:</label>
            <input type="text" id="alamat" name="alamat" required>
            <button type="submit">Login</button>
        </form>
        <hr>
        <div style="margin-top: 10px;">
            Sudah memiliki akun? <br>
            <a href="login.php">
                Login disini
            </a>
        </div>
    </div>
</body>

</html>