<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Albumku - Photo Gallery</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fontawesome/5.15.1/css/all.min.css"> <!-- Memasukkan Font Awesome untuk ikon -->
    <link rel="stylesheet" href="style/index.css">
</head>

<body>
    <?php
    include('inc/header.php')
    ?>
    <!-- jika terdeteksi get id -->
    <?php
    $id = isset($_GET['id']) ? $_GET['id'] : ''; //dibaca $_GET['id'] atau null
    if ($id) {
        $quedyeditfoto = mysqli_query($koneksi, "SELECT * FROM foto WHERE fotoid='$id'");
        $editfoto = mysqli_fetch_assoc($quedyeditfoto);
        $action = "backend/aksi_update_foto.php";
    } else {
        $action = "backend/aksi_tambah_foto.php";
    }
    ?>
    <div class="content">
        <div class="form-container">
            <h2>Tambahkan Foto</h2>
            <hr>
            <form action="<?php echo $action ?>" method="post" enctype="multipart/form-data">
                <label for="name">Judul Foto:</label>
                <input type="text" id="name" name="name" value="<?php echo isset($editfoto['JudulFoto']) ? $editfoto['JudulFoto'] : ''; ?>" required>
                <label for="description">Deskripsi:</label>
                <textarea id="description" name="description" rows="4" required><?php echo isset($editfoto['DeskripsiFoto']) ? $editfoto['DeskripsiFoto'] : ''; ?></textarea>
                <label for="albumName">Album</label>
                <select name="album_id" id="">
                    <option value="">- Pilih Album -</option>
                    <?php
                    $querydata = mysqli_query($koneksi, "SELECT * from album");
                    while ($dataalbum = mysqli_fetch_array($querydata)) {
                    ?>
                    <option value="<?php echo $dataalbum['AlbumID'] ?>"><?php echo $dataalbum['NamaAlbum'] ?></option>
                    <?php
                    }
                    ?>
                </select>
                <label for="foto">Pilih Foto:</label>
                <input type="file" id="foto" name="foto" value="<?php echo isset($editfoto['NamaAlbum']) ? $editfoto['NamaAlbum'] : ''; ?>">
                <!-- ambil user id -->
                <input type="hidden" name="user_id" value="<?php echo $user['UserID'] ?>">
                <input type="hidden" name="foto_id" value="<?php echo $id ?>">
                <button type="submit">Simpan Album</button>
            </form>
        </div>
    </div>
    <?php
    include('inc/footer.php')
    ?>
</body>

</html>