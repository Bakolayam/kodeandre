<?php
include('../db/koneksi.php');
$name = $_POST['albumName'];
$deskripsi = $_POST['description'];
$tanggal = date('Y-m-d');
$user_id = $_POST['user_id'];
$id = $_POST['album_id'];
//  $id = $_GET['id']
$query = mysqli_query($koneksi, "UPDATE album 
 SET NamaAlbum='" . $name . "',Deskripsi='" . $deskripsi . "' WHERE AlbumID='" . $id . "'");
if ($query) {
    echo "<script>
 window.location.href='../index.php';
 </script>";
} else {
    die("Error: " . mysqli_error($koneksi));
}
