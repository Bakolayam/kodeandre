<?php
include('../db/koneksi.php');
$name = $_POST['albumName'];
$deskripsi = $_POST['description'];
$tanggal = date('Y-m-d');
$user_id = $_POST['user_id'];
$query = mysqli_query(
    $koneksi, "INSERT INTO album (`NamaAlbum`, `deskripsi`, `tanggaldibuat`, `userid`)
     VALUES ('$name', '$deskripsi','$tanggal','$user_id')"
);
if ($query) {
    echo "<script>
            window.location.href='../index.php';
         </script>";
} else {
    die("Error: " . mysqli_error($koneksi));
}
