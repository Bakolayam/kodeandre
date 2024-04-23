<?php
$queryfoto = mysqli_query($koneksi, "SELECT * from foto,album where foto.albumid = album.albumid
ORDER BY foto.fotoid DESC");
$queryfoam =  mysqli_query($koneksi, "SELECT * from foto,user where foto.userid = user.userid
ORDER BY foto.fotoid DESC");
while ($datafoto = mysqli_fetch_array($queryfoto)) {
?>
    <?php
    while ($datafoto = mysqli_fetch_array($queryfoam)) {
    ?>
        <div class="photo-card">
            <div class="relative"> <a href="lihat_foto.php?id=<?php echo isset($datafoto['FotoID']) ? $datafoto['FotoID'] : ''; ?>">
                    <img src="<?php echo isset($datafoto['LokasiFile']) ? $datafoto['LokasiFile'] : ''; ?>" alt="Photo 1">
                </a>
                <div class="absolute">
                    <?php
                    if ($datafoto['UserID'] == $user['UserID']) {
                    ?>
                        <a href="tambah_foto.php?id=<?php echo isset($datafoto['FotoID']) ? $datafoto['FotoID'] : ''; ?>" class="btn-edit">Edit</a>
                        <a href="backend/aksi_hapus_foto.php?id=<?php echo isset($datafoto['FotoID']) ? $datafoto['FotoID'] : ''; ?>" class="btn-hapus">Hapus</a>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <div class="details">
                <?php echo isset($datafoto['JudulFoto']) ? $datafoto['JudulFoto'] : ''; ?>
            </div>
        </div>
<?php
    }
}
?>