<?php
require 'functions.php';
$wisata = mysqli_query($conn, "SELECT * FROM menu_wisata");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Proyek Akhir wkwk</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Alex+Brush" rel="stylesheet" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link rel="stylesheet" href="assets/css/open-iconic-bootstrap.min.css" />
  <link rel="stylesheet" href="assets/css/animate.css" />

  <link rel="stylesheet" href="assets/css/owl.carousel.min.css" />
  <link rel="stylesheet" href="assets/css/owl.theme.default.min.css" />
  <link rel="stylesheet" href="assets/css/magnific-popup.css" />

  <link rel="stylesheet" href="assets/css/aos.css" />

  <link rel="stylesheet" href="assets/css/ionicons.min.css" />

  <link rel="stylesheet" href="assets/css/bootstrap-datepicker.css" />
  <link rel="stylesheet" href="assets/css/jquery.timepicker.css" />

  <link rel="stylesheet" href="assets/css/flaticon.css" />
  <link rel="stylesheet" href="assets/css/icomoon.css" />
  <link rel="stylesheet" href="assets/css/style.css" />
  <link rel="stylesheet" href="assets/css/style2.css" />
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar" style="box-shadow: 0 2px 2px -2px rgba(0, 0, 0, 0.2)">
    <div class="container">
      <a class="navbar-brand" style="color: #000" href="index.php">ExploreSurabaya.</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a style="color: #000" href="index.php" class="nav-link">BERANDA</a>
          </li>

          <li class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: #000">KATEGORI</a>
            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
              <li><a class="dropdown-item" href="alam.php">Wisata Alam</a></li>
              <li><a class="dropdown-item" href="religi.php">Wisata Religi</a></li>
              <li><a class="dropdown-item" href="sejarah.php">Wisata Sejarah</a></li>
              <li><a class="dropdown-item" href="keluarga.php">Wisata Keluarga</a></li>
              <li><a class="dropdown-item" href="oleholeh.php">Pusat Oleh-oleh</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a style="color: #000" href="informasi.php" class="nav-link">INFORMASI</a>
          </li>
          <li class="nav-item cta">
            <a style="background: #f85959" href="rute.php" class="nav-link"><span>RUTE</span></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container" id="show-data">
    <h1 class="headline-news">Good News From Surabaya</h1>

    <?php foreach ($wisata as $row) : ?>
      <div class="item-informasi card mb-3">
        <div class="row card-box">
          <div class="image col-md-6">
            <img src="<?=$row["foto_wisata"];?>" alt="<?= $row["nama_wisata"]; ?>">
          </div>
          <div class="col-md-6">
            <div class="card-body">
              <h5 class="card-title"><?= $row["nama_wisata"]; ?></h5>
              <p class="published-at">Diakses pada tanggal 26 April 2023</p>
              <p class="card-text">
                <?= $row["informasi"];  ?>
              </p>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="assets/js/popper.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/jquery.easing.1.3.js"></script>
  <script src="assets/js/jquery.waypoints.min.js"></script>
  <script src="assets/js/jquery.stellar.min.js"></script>
  <script src="assets/js/owl.carousel.min.js"></script>
  <script src="assets/js/jquery.magnific-popup.min.js"></script>
  <script src="assets/js/aos.js"></script>
  <script src="assets/js/jquery.animateNumber.min.js"></script>
  <script src="assets/js/bootstrap-datepicker.js"></script>
  <script src="assets/js/jquery.timepicker.min.js"></script>
  <script src="assets/js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDn8aXn8325UmPKIis8GaDAY2nTY42Ki0s&sensor=false"></script>
  <script src="assets/js/google-map.js"></script>
  <script src="assets/js/main.js"></script>
  <script src="assets/js/informasi.js"></script>
</body>

</html>