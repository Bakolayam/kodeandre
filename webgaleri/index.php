<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Albumku - Photo Gallery</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fontawesome/5.15.1/css/all.min.css"> <link rel="stylesheet" href="style/index.css">
</head>
<body>
  <?php
    include('inc/header.php');
  ?>

  <div class="content">
    <div class="photo-list">
      <?php
        include('inc/foto.php');
      ?>
    </div>
    <div class="sidebar">
      <div class="sidebar-content">
        <?php
          include('inc/album.php');
        ?>
      </div>
    </div>
  </div>

  <?php
    include('inc/footer.php');
  ?>
</body>
</html>
