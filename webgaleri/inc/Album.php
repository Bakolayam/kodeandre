<?php
include('db/koneksi.php');
$query = mysqli_query($koneksi, "SELECT * FROM album, user WHERE album.userid = user.userid ORDER
BY album.albumID desc");
echo '<h2 style="padding:4px">Daftar Album</h2>';
while ($data = mysqli_fetch_array($query)) {
?>
    
    <a href="lihat_album.php?id=<?php echo $data['AlbumID'] ?>">
        <div class="album-list">
            <h3><?php echo $data['NamaAlbum'] ?></h3>
            <p>Dibuat : <?php echo $data['TanggalDibuat'] ?></p>
            <p>Pembuat: <?php echo $data['NamaLengkap'] ?></p>
            <?php
            if ($data['UserID'] == $user['UserID']) {
            ?>
                <a class="btn-edit" href="tambah_album.php?id=<?php echo $data['AlbumID'] ?>">Edit</a> |
                <a class="btn-hapus" href="backend/aksi_hapus_album.php?id=<?php echo $data['AlbumID'] ?>">Hapus</a>
            <?php
            }
            ?>
        </div>
    </a>
<?php
}
?>