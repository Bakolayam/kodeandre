<?php
include('../db/koneksi.php');
$username = $_POST['username'];
$password = md5($_POST['password']);
// ambil data yang sesuai
$data = mysqli_query(
    $koneksi, "SELECT * FROM user WHERE username='$username' AND password='$password'");
// cek daata yang ditemukan
$cek = mysqli_num_rows($data);

// logika login
if ($cek > 0) {
    // mengaktifkan session php
    session_start();
    $_SESSION['username'] = $username;
    $_SESSION['status'] = "login";

    echo "<script>
            window.location.href='../index.php';
         </script>";
} else {
    echo "<script>
            alert('Kayaknya masih ada yg salah, coba register');
            window.location.href='../auth/login.php';
         </script>";
}
