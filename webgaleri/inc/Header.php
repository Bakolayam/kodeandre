<?php
session_start();
if ($_SESSION['status'] != "login") {
  header("location:auth/login.php?pesan=belum_login");
}

// ambil nama dari database
include('db/koneksi.php');
$username = $_SESSION['username'];
$query = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username'");
$user = mysqli_fetch_assoc($query);
?>

<div class="user-info" style="z-index: 10;">
  <a href="index.php" style="color: white;">
    <i class="fa fa-bold" aria-hidden="true">
      <h1>Galeri</h1>
    </i>
  </a>
  <div class="menu" style='font-size:22px;'>
    <ul>
      <li><a href="index.php">Beranda</a></li>
      <li><a href="tambah_album.php">Tambah Album</a></li>
      <li><a href="tambah_foto.php">Tambah Foto</a></li>
    </ul>
  </div>
  <div class="profile-header">
  <span class="profile-name">Selamat datang, <?php echo $user['NamaLengkap'] . "!"; ?></span>
<a href="backend/logout.php" class="logout-button" style="
  display: flex;
  flex-direction: column;
  align-items: center;
  padding: 4px 12px;
  font-family: -apple-system, BlinkMacSystemFont, 'Roboto', sans-serif;
  border-radius: 6px;
  border: none;
  color: #fff;
  background: linear-gradient(180deg, #4B91F7 0%, #367AF6 100%);
  background-origin: border-box;
  box-shadow: 0px 0.5px 1.5px rgba(54, 122, 246, 0.25), inset 0px 0.8px 0px -0.25px rgba(255, 255, 255, 0.2);
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
  /* Added margin-left for spacing */
  margin-left: 10px; /* Adjust the value for desired spacing */
">Logout</a>

  </div>
</div>