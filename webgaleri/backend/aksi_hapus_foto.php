<?php
include('../db/koneksi.php');
$id = $_GET['id'];
// Ambil lokasi file dari database
$query_select = mysqli_query($koneksi, "SELECT LokasiFile FROM foto WHERE fotoid='$id'");
$row = mysqli_fetch_assoc($query_select);
$file_location = '../' . $row['LokasiFile'];
// Hapus file dari direktori
if (unlink($file_location)) {
    // Jika file berhasil dihapus, lanjutkan dengan menghapus data dari database
    $query_delete = mysqli_query($koneksi, "DELETE FROM foto WHERE fotoid='$id'");
    if ($query_delete) {
        echo "<script>
                 window.location.href='../index.php';
             </script>";
    } else {
        die("Error deleting from database: " . mysqli_error($koneksi));
    }
} else {
    die("Error deleting file: " . $file_location);
}
