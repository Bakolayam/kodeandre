<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Albumku - Photo Gallery</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fontawesome/5.15.1/css/all.min.css"> <!-- Memasukkan Font Awesome untuk ikon -->
    <link rel="stylesheet" href="style/index.css">
    <style>
        body {
            color: white;
            overflow-x: hidden;
        }
    </style>
</head>
<body>

    <?php
    include('inc/header.php');
    $id = isset($_GET['id']) ? $_GET['id'] : '';
    $quedyeditfoto = mysqli_query($koneksi, "SELECT * FROM foto WHERE fotoid='$id'");
    $datafoto = mysqli_fetch_assoc($quedyeditfoto);
    ?>

    <div class="content">
        <div class="sidebar-lf">
            <div class="sidebar-content-lf">
                <img src="<?php echo isset($datafoto['LokasiFile']) ? $datafoto['LokasiFile'] : ''; ?>" alt="">
                <br>
                <br>
                Total Komentar :
                <!-- tampilkan jumlah komentar foto -->
                <?php
                $querykomentar = mysqli_query($koneksi, "SELECT COUNT(komentarid) AS jml FROM komentarfoto WHERE fotoid='$id'");
                $datakomentar = mysqli_fetch_assoc($querykomentar);
                ?>
                <b><?php echo isset($datakomentar['jml']) ? $datakomentar['jml'] : 0; ?><br></b> <br>
                Total Like :
                <!-- tampilkan jumlah like foto -->
                <?php
                $querylike = mysqli_query($koneksi, "SELECT COUNT(likeid) AS jml FROM likeFoto WHERE fotoid='$id'");
                $datalike = mysqli_fetch_assoc($querylike);
                ?>
                <b><?php echo isset($datalike['jml']) ? $datalike['jml'] : 0; ?></b> <br> <br>
                <h2><a href="backend/like.php?fotoid=<?php echo $id ?>&userid=<?php echo $user['UserID'] ?>" class="btn">
                        << Klik untuk menyukai >>
                </a></h2>
            </div>
        </div>
        <div class="photo-list">
            <div style="width: 90%;">
                <h1>
                    <?php echo isset($datafoto['JudulFoto']) ? $datafoto['JudulFoto'] : ''; ?>
                </h1>
                <hr>
                <?php
                $userid = isset($datafoto['UserID']) ? $datafoto['UserID'] : '';
                $querypembuat = mysqli_query($koneksi, "SELECT * FROM foto, user WHERE foto.userid='$userid' and user.userid = '$userid'");
                $datapembuat = mysqli_fetch_assoc($querypembuat);
                ?>
                Dibuat Oleh : <b><?php echo isset($datapembuat['NamaLengkap']) ? $datapembuat['NamaLengkap'] : ''; ?></b> <br>
                Dibuat Tanggal : <b><?php echo isset($datafoto['TanggalUnggah']) ? $datafoto['TanggalUnggah'] : ''; ?></b> <br> <br>
                <b>Album :</b>

                <?php
                $dataalbum = isset($datafoto['AlbumID']) ? $datafoto['AlbumID'] : '';
                $queryalbum = mysqli_query($koneksi, "SELECT * FROM foto, album WHERE foto.albumid='$dataalbum' and album.AlbumID = '$dataalbum'");
                $dataalbum = mysqli_fetch_assoc($queryalbum);
                // menampilkan nama album
                echo isset($dataalbum['NamaAlbum']) ? $dataalbum['NamaAlbum'] : '';
                ?>
                <!-- menampilkan deskripsi album -->
                <br>
                <i>(<?php echo isset($dataalbum['Deskripsi']) ? $dataalbum['Deskripsi'] : ''; ?>)</i>
                <br>
                <br>
                <br>
                <b>Deskripsi Foto :</b>
                <br>
                <?php echo isset($datafoto['DeskripsiFoto']) ? $datafoto['DeskripsiFoto'] : ''; ?>
                <hr>
                <br>
                <br>
                <b>Komentar</b>
                <form action="backend/komentar.php?fotoid=<?php echo $id ?>&userid=<?php echo $user['UserID'] ?>" method="post">
                    <textarea name="komentar" style="width: 90%; margin-top: 10px" id="" cols="30" rows="10" placeholder="Masukan komentar anda disini ..."></textarea>
                    <button type="submit" class="btn-edit" style="margin-top: 8px; padding: 10px 20px">Komentari</button>
                </form>
                <div style="margin: 20px 0px 80px 0px;">
                    <?php
                    $qkomentar = mysqli_query($koneksi, "SELECT * FROM komentarfoto WHERE fotoid = $id ORDER BY komentarid DESC");
                    while ($dkomentar = mysqli_fetch_array($qkomentar)) {
                    ?>
                        <div class="komentar" style="margin-top: 20px; border-left: solid 3px blue; padding-left: 10px; border-radius: 8px; margin-right:30px">
                            <!-- ambil data nama penhkomentar -->
                            <?php
                            $pengkomen = $dkomentar['UserID'];
                            $querypengkomentar = mysqli_query($koneksi, "SELECT * FROM user WHERE userid = '$pengkomen'");
                            $datapengkomentar = mysqli_fetch_assoc($querypengkomentar);
                            ?>
                            <b><?php echo isset($datapengkomentar['NamaLengkap']) ? $datapengkomentar['NamaLengkap'] : ''; ?> </b> | <?php echo isset($dkomentar['TanggalKomentar']) ? $dkomentar['TanggalKomentar'] : ''; ?> <br><br>>>
                            <span>
                                <?php echo isset($dkomentar['IsiKomentar']) ? $dkomentar['IsiKomentar'] : '';?>
                            </span>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <?php
    include('inc/footer.php')
    ?>

</body>
</html>