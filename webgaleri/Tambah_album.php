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
        $queryalbum = mysqli_query($koneksi, "SELECT * FROM album WHERE albumid = '$id'");
        $album = mysqli_fetch_assoc($queryalbum);
        $action = "backend/aksi_update_album.php";
    } else {
        $action = "backend/aksi_tambah_album.php";
    }
    ?>
    <div class="content">
        <div class="form-container">
            <h2>Tambahkan Album</h2>
            <hr>
            <form action="<?php echo $action ?>" method="post">
                <label for="albumName">Album Name:</label>
                <input type="text" id="albumName" name="albumName" value="<?php echo isset($album['NamaAlbum']) ? $album['NamaAlbum'] : ''; ?>" required>
                <label for="description">Description:</label>
                <textarea id="description" name="description" rows="4" required><?php echo isset($album['Deskripsi']) ? $album['Deskripsi'] : ''; ?></textarea>
                <!-- ambil user id -->
                <input type="hidden" name="user_id" value="<?php echo $user['UserID'] ?>">
                <input type="hidden" name="album_id" value="<?php echo $id ?>">
                <button type="submit">Simpan Album</button>
            </form>
        </div>
    </div>
    <?php
    include('inc/footer.php')
    ?>
</body>

</html>