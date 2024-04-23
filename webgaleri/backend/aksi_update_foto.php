<?php
include('../db/koneksi.php');

// Validasi input
$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$deskripsi = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);

// Pengecekan error
if (empty($name) || empty($deskripsi)) {
  echo "<script>
    alert('Nama dan deskripsi foto tidak boleh kosong!');
    window.location.href='../tambah_foto.php';
  </script>";
  exit;
}

$tanggal = date('Y-m-d');
$user_id = $_POST['user_id'];
$album_id = $_POST['album_id'];
$id = $_POST['foto_id'];

// Menangani pengambilan foto
$rand = rand();
$ekstensi = array('png', 'jpg', 'jpeg', 'gif');
$filename = $_FILES['foto']['name'];
$ukuran = $_FILES['foto']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

// Validasi ekstensi file
if (!in_array($ext, $ekstensi)) {
  echo "<script>
    alert('Ekstensi file tidak valid!');
    window.location.href='../tambah_foto.php';
  </script>";
  exit;
}

// Validasi ukuran file
if ($ukuran > 1048576) {
  echo "<script>
    alert('Ukuran file terlalu besar!');
    window.location.href='../tambah_foto.php';
  </script>";
  exit;
}

// Mengecek apakah file yang diupload benar-benar gambar
$image_info = getimagesize($_FILES['foto']['tmp_name']);
if (!$image_info) {
  echo "<script>
    alert('File yang diupload bukan gambar!');
    window.location.href='../tambah_foto.php';
  </script>";
  exit;
}

// Memindahkan file foto
$namafotobaru = $rand . '_' . $filename;
move_uploaded_file($_FILES['foto']['tmp_name'], '../gambar/' . $namafotobaru);
$lokasi_foto = 'gambar/' . $namafotobaru;

// Update foto ke database
try {
  $query = $koneksi->prepare("UPDATE foto
    SET JudulFoto = ?, DeskripsiFoto = ?, TanggalUnggah = ?, LokasiFile = ?, AlbumID = ?, userid = ?
    WHERE FotoID = ?");
  $query->bind_param('sssssss', $name, $deskripsi, $tanggal, $lokasi_foto, $album_id, $user_id, $id);
  $query->execute();

  if ($query->affected_rows > 0) {
    echo "<script>
      window.location.href='../index.php';
    </script>";
  } else {
    echo "<script>
      alert('Gagal memperbarui foto!');
      window.location.href='../tambah_foto.php';
    </script>";
  }
} catch (Exception $e) {
  echo "<script>
    alert('Terjadi kesalahan saat memperbarui foto: " . $e->getMessage() . "');
    window.location.href='../tambah_foto.php';
  </script>";
}
?>