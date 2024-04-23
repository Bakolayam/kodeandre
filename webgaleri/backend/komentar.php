<?php
include('../db/koneksi.php');

$foto_id = $_GET['fotoid'];
$user_id = $_GET['userid'];
$tanggal = date('Y-m-d');
$komentar = filter_input(INPUT_POST, 'komentar', FILTER_SANITIZE_STRING);

// Validasi komentar
if (empty($komentar)) {
  echo "<script>
    alert('Komentar tidak boleh kosong!');
    window.location.href='../lihat_foto.php?id=$foto_id';
  </script>";
  exit;
}

// Insert komentar
try {
  $query = $koneksi->prepare("INSERT INTO komentarfoto
    (`fotoid`, `userid`, `isikomentar`, `tanggalkomentar`)
    VALUES (?, ?, ?, ?)");
  $query->bind_param('ssss', $foto_id, $user_id, $komentar, $tanggal);
  $query->execute();

  if ($query->affected_rows > 0) {
    echo "<script>
      alert('Komentar berhasil ditambahkan!');
      window.location.href='../lihat_foto.php?id=$foto_id';
    </script>";
  } else {
    echo "<script>
      alert('Gagal menambahkan komentar!');
      window.location.href='../lihat_foto.php?id=$foto_id';
    </script>";
  }
} catch (Exception $e) {
  echo "<script>
    alert('Terjadi kesalahan saat menambahkan komentar: " . $e->getMessage() . "');
    window.location.href='../lihat_foto.php?id=$foto_id';
  </script>";
}