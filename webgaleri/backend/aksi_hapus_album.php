<?php
include('../db/koneksi.php');
$id = $_GET['id'];
$query = mysqli_query($koneksi, "DELETE FROM album WHERE albumid='$id'");
// echo $id;
if ($query) {
    echo "<script>
            window.location.href='../index.php';
         </script>";
} else {
    die("Error: " . mysqli_error($koneksi));
}
