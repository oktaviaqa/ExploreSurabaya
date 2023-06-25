<?php
require 'functions.php';
$wisata = query("SELECT * FROM menu_wisata");
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
  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="index.php">ExploreSurabaya.</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a href="index.php" class="nav-link">BERANDA</a>
          <li class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">KATEGORI</a>
            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
              <li><a class="dropdown-item" href="kategori-alam.php">Wisata Alam</a></li>
              <li><a class="dropdown-item" href="kategori-religi.php">Wisata Religi</a></li>
              <li><a class="dropdown-item" href="kategori-sejarah.php">Wisata Sejarah</a></li>
              <li><a class="dropdown-item" href="kategori-keluarga.php">Wisata Keluarga</a></li>
              <li><a class="dropdown-item" href="kategori-oleholeh.php">Pusat Oleh-oleh</a></li>
            </ul>
          </li>
          </li>
          <li class="nav-item">
            <a href="informasi.php" class="nav-link">INFORMASI</a>
          </li>
          <li class="nav-item cta">
            <a href="rute.php" class="nav-link"><span>RUTE</span></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- END nav -->

  <div class="hero-wrap">
    <div class="overlay"></div>
    <div class="container-lg">
      <div class="row slider-text align-items-center justify-content-center" data-scrollax-parent="true">
        <div class="col-md-8 ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
          <h1 class="headline" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">
            Jelajahi lebih dari <span> puluhan++</span> <br /> destinasi <span>Wisata</span> di Surabaya
          </h1>
          <div class="section-form">
            <form id="form-input" method="post" class="search-form">
              <div class="fields-form" style="width: 100%;">

                <!-- Lokasi anda -->
                <div class="textfield-search">
                  <div class="label"><i class="fa-sharp fa-solid fa-map-pin"></i>
                    <p>Dimana</p>
                  </div>
                  <div class="input-field">
                    <input id="input-place" type="text" class="form-control" placeholder="Lokasi anda ?" />
                  </div>
                </div>

                <!-- kemana tujuan anda -->
                <div class="select-wrap textfield-search">
                  <div class="label"> <i class="fa-solid fa-map-location-dot"></i>
                    <p>Kemana</p>
                  </div>
                  <div class="input-field">
                    <select id="destination" name="destination" class="form-control" placeholder="keyword search">
                      <option value="">Tujuan Anda</option>
                      <?php foreach ($wisata as $row) : ?>
                        <option value='<?= $row["lat"]; ?>,<?= $row["lng"]; ?>'><?= $row["nama_wisata"]; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>

                <!-- tambahkan tujuan anda -->
                <div id="more-destination-select" class="select-wrap textfield-search" style="display: none;">
                  <div class="label"> <i class="fa-solid fa-map-location-dot"></i>
                    <p>Tambahkan</p>
                  </div>
                  <div class="input-field">
                    <select id="destination2" name="destination" class="form-control" placeholder="keyword search">
                      <option value="">Tujuan Selanjutnya</option>
                      <?php foreach ($wisata as $row) : ?>
                        <option value='<?= $row["lat"]; ?>,<?= $row["lng"]; ?>'><?= $row["nama_wisata"]; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
                <div class="cta-box">
                  <div class="ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
                    <button id="button-submit" type="submit" class="search-submit btn btn-primary">
                      <i class="fa-sharp fa-solid fa-magnifying-glass-location"></i>
                    </button>
                  </div>
                  <div class="ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
                    <button id="more-destination-button" type="button" class="search-submit btn btn-secondary">
                      <i class="fas fa-plus"></i>
                    </button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="container about-section">
    <div class="row justify-content-start">
      <div class="col-sm-12 col-md-6 col-lg-6">
        <img src="https://images.unsplash.com/photo-1501179691627-eeaa65ea017c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2070&q=80" alt="" class="img-fluid rounded mb-5">
      </div>
      <div class="col-sm-12 col-md-6 col-lg-6">
        <p>Surabaya bukan hanya terkenal dengan keindahan bunga tabebuyanya saja. Berkunjung ke kota pahlawan tersebut memungkinkan Anda mengunjungi tempat wisata Surabaya yang lebih beragam dan Instagramable.</p>
        <p data-scrollax="properties: { translateY: '30%', opacity: 1.6 }" style="color:#ffc512; font: bold;"> Find great places to stay, eat, shop, or visit from local experts</p>
      </div>
    </div>
  </div>

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen">
    <svg class="circular" width="48px" height="48px">
      <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
      <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
    </svg>
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
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDn8aXn8325UmPKIis8GaDAY2nTY42Ki0s&libraries=places"></script>
  <script src="assets/js/google-map2.js"></script>
  <script src="assets/js/main.js"></script>
  <script src="assets/js/multipleDestination.js"></script>
</body>

</html>