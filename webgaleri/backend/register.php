<?php
include('../db/koneksi.php');
$username = $_POST['username'];
$password = md5($_POST['password']);
$email = $_POST['email'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$query = mysqli_query(
    $koneksi, "INSERT INTO user (`username`, `password`, `email`, `namalengkap`, `alamat`)
    VALUES ('$username', '$password','$email','$nama','$alamat')");
if ($query) {
    echo "<script>
 alert('Yeyyy, Anda berhasil terdaftar, silahkan login');
 window.location.href='../auth/login.php';
 </script>";
} else {
    die("Error: " . mysqli_error($koneksi));
}
