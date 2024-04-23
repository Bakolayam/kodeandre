<?php
include('../db/koneksi.php');
$name = $_POST['name'];
$deskripsi = $_POST['description'];
$tanggal = date('Y-m-d');
$user_id = $_POST['user_id'];
$album_id = $_POST['album_id'];
// menupulasi pengambilan foto
$rand = rand();
$ekstensi = array('png', 'jpg', 'jpeg', 'gif');
$filename = $_FILES['foto']['name'];
$ukuran = $_FILES['foto']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

if (!in_array($ext, $ekstensi)) {
    // logika jika extensi yang diupload bukan foto(jpg, png, jpeg, gif )
    echo "<script>
 alert('Format file bukan gambar');
 window.location.href='../tambah_foto.php';
 </script>";
} else {
    if ($ukuran < 1044070) {
        // jika ukurannya tidak lebih dari 1MB
        $namafotobaru = $rand . '_' . $filename;
        move_uploaded_file($_FILES['foto']['tmp_name'], '../gambar/' . $rand . '_' . $filename);
        $lokasi_foto = 'gambar/' . $namafotobaru;
        $query = mysqli_query(
            $koneksi,
            "INSERT INTO foto (`JudulFoto`, `DeskripsiFoto`, `TanggalUnggah`,`LokasiFile`, `AlbumID`, `userid`)
             VALUES ('$name', '$deskripsi','$tanggal','$lokasi_foto', '$album_id', '$user_id')"
        );
        if ($query) {
            echo "<script>
                    window.location.href='../index.php';
                 </script>";
        } else {
            die("Error: " . mysqli_error($koneksi));
        }
    } else {
        // jika ukuran foto lebih dari 1MM
        echo "<script>
                 alert('Ukuran foto terlalu besar');
                window.location.href='../tambah_foto.php';
              </script>";
    }
}
