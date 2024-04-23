<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Albumku - Photo Gallery</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fontawesome/5.15.1/css/all.min.css"> <!-- Memasukkan Font Awesome untuk ikon -->
    <link rel="stylesheet" href="style/index.css">
    <style>
        .labg{
            background-color: black;
            color: white;
        }
    </style>
</head>

<body>
    <?php
    include('inc/header.php')
    ?>
    <!-- jika terdeteksi get id -->
    <?php

    // Get the album ID from the URL
    $albumID = isset($_GET['id']) ? $_GET['id'] : die('Album ID not specified.');

    // Fetch the photos from the database
    $query = mysqli_query($koneksi, "SELECT * FROM foto WHERE albumID = '$albumID'");

    echo "<div class='labg'><h2><center>Foto Dalam Album</center></h2></div>";
    echo "<div class='content'>";
    echo "<div class='photo-listal'>";
    // echo "<div class='photo-card'>";


    // Check if there are any photos
    if (mysqli_num_rows($query) > 0) {
        // Display each photo
        while ($foto = mysqli_fetch_array($query)) {
            echo "<div class='photo-card'>";
            echo "<div class='relative'>";
            echo '<a href="lihat_foto.php?id=' . (isset($foto['FotoID']) ? $foto['FotoID'] : '') . '">';
            echo "<img src='" . $foto['LokasiFile'] . "' alt='Photo'>";
            echo "<div class='details'>";
            echo isset($foto['JudulFoto']) ? $foto['JudulFoto'] : '';
            echo "</div>";
            echo "</div>";
            echo "</div>";
            // echo "<div class='sidebar'>";
            // echo "<div class='sidebar-content'>";
            // echo "<div class='album-list'>";
            //    include('inc/album.php');
            // echo "</div>";
            // echo "</div>";
            // echo "</div>";

        }
    } else {
        echo "<p>No photos in this album.</p>";
    }


    echo "</div>";
    echo "</div>";
    ?>


    <?php
    include('inc/footer.php')
    ?>
</body>

</html>