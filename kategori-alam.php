<?php
require 'functions.php';
$wisata = query("SELECT * FROM menu_wisata WHERE kategori='alam'");
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title> Proyek Akhir wkwk</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Alex+Brush" rel="stylesheet">

	<link rel="stylesheet" href="assets/css/open-iconic-bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/animate.css">

	<link rel="stylesheet" href="assets/css/owl.carousel.min.css">
	<link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
	<link rel="stylesheet" href="assets/css/magnific-popup.css">

	<link rel="stylesheet" href="assets/css/aos.css">

	<link rel="stylesheet" href="assets/css/ionicons.min.css">

	<link rel="stylesheet" href="assets/css/bootstrap-datepicker.css">
	<link rel="stylesheet" href="assets/css/jquery.timepicker.css">


	<link rel="stylesheet" href="assets/css/flaticon.css">
	<link rel="stylesheet" href="assets/css/icomoon.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/style2.css">

	<!-- Copy this -->
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css'>
	<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
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
					<li class="nav-item"><a href="index.php" class="nav-link">BERANDA</a></li>
					<li class="nav-item dropdown">
						<p href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" id="navbarDarkDropdownMenuLink" role="button" aria-expanded="false">KATEGORI</p>
						<ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
							<li><a class="dropdown-item" href="kategori-alam.php">Wisata Alam</a></li>
							<li><a class="dropdown-item" href="kategori-religi.php">Wisata Religi</a></li>
							<li><a class="dropdown-item" href="kategori-sejarah.php">Wisata Sejarah</a></li>
							<li><a class="dropdown-item" href="kategori-keluarga.php">Wisata Keluarga</a></li>
							<li><a class="dropdown-item" href="kategori-oleholeh.php">Pusat Oleh-oleh</a></li>
						</ul>
					</li>
					<li class="nav-item"><a href="informasi.php" class="nav-link">INFORMASI</a></li>
					<li class="nav-item cta"><a href="rute.php" class="nav-link"><span>RUTE</span></a></li>
				</ul>
			</div>
		</div>
	</nav>
	<!-- END nav -->
	<div class="alam-hero-wrap">
		<div class="kategori-overlay">
		</div>
		<div class="container wisata-section">
			<div class="row justify-content-start mb-5 pb-3">
				<div class="col-md-7 breadcrumb-section">
					<span><a href="index.php">Home </a> / Wisata Alam</span>
				</div>
			</div>
			<h1 class="headline-wisata">Wisata Alam</h1>

			<div class="row slider-section">
				<div class="col-md-12">
					<div id="news-slider" class="owl-carousel">
						<?php foreach ($wisata as $row) : ?>
							<div class="ftco-animate card-wisata">
								<div class="destination">
									<a class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(<?= $row["foto_wisata"]; ?>); border-radius: 20px 20px 0 0; " href="detail_wisata.php">
										<div class="icon d-flex justify-content-center align-items-center">
											<span class="icon-search2"></span>
										</div>
									</a>
									<div class="text p-3" style="height: 300px; border-radius: 0 0 20px 20px ;">
										<div class="d-flex">
											<div class="one">
												<h3><?= $row["nama_wisata"]; ?></h3>
											</div>
										</div>
										<p>
											<?= substr($row["informasi"], 0, 210);  ?>
										</p>
										<p class="bottom-area d-flex">
											<span><i class="icon-map-o"></i> ppp </span>
											<span class="ml-auto button"><a href='rute.php?lat=<?= $row["lat"]; ?>&lng=<?= $row["lng"]; ?>'>Kunjungi</a></span>
										</p>
									</div>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		</div>


		<!-- loader -->
		<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
				<circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
				<circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
			</svg></div>


		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/jquery-migrate-3.0.1.min.js"></script>

		<!-- Copy this -->
		<script src='https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js'></script>

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
		<script src="assets/js/main.js"></script>
		<script>
			$(document).ready(function() {
				$("#news-slider").owlCarousel({
					items: 3,
					navigation: true,
					navigationText: ["", ""],
					pagination: true,
					autoPlay: true,
					loop: true,
					responsive: {
						0: {
							items: 1
						},
						768: {
							items: 2
						},
						1024: {
							items: 3
						}
					}
				});
			});
		</script>
</body>

</html>