<?php
session_start();
include 'dbconnect.php';

?>

<!DOCTYPE html>
<html>

<head>
	<title>Perpustakaan</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Falenda Flora, Ruben Agung Santoso" />
	<script type="application/x-javascript">
		addEventListener("load", function() {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/font-awesome.css" rel="stylesheet">
	<script src="js/jquery-1.11.1.min.js"></script>
	<link href='//fonts.googleapis.com/css?family=Raleway:400,100,100italic,200,200italic,300,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
	<script type="text/javascript" src="js/move-top.js"></script>
	<script type="text/javascript" src="js/easing.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event) {
				event.preventDefault();
				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 1000);
			});
		});
	</script>
</head>

<body>
	<div class="agileits_header">
		<div class="container">
			<div class="w3l_offers">
			</div>
			<div class="agile-login">
				<ul>
					<?php
					if (!isset($_SESSION['log'])) {
						echo '
					<li><a href="registered.php"> Daftar</a></li>
					<li><a href="login.php">Masuk</a></li>
					';
					} else {

						if ($_SESSION['role'] == 'Member') {
							echo '
					<li style="color:white">Halo, ' . $_SESSION["name"] . '
					<li><a href="logout.php">Keluar?</a></li>
					';
						} else {
							echo '
					<li style="color:white">Halo, ' . $_SESSION["name"] . '
					<li><a href="admin">Admin Panel</a></li>
					<li><a href="logout.php">Keluar?</a></li>
					';
						};
					}
					?>
				</ul>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>

	<div class="logo_products">
		<div class="container">
			<div class="w3ls_logo_products_left1">
				<ul class="phone_email">
					</i></li>
				</ul>
			</div>
			<div class="w3ls_logo_products_left">
				<h1><a href="index.php"><img src="logoo.png" width="15%" height="15%">      Perpustakaan</a><a>SD 1 BAYEM</a></h1>
			</div>
			<div class="w3l_search">
				<form action="search.php" method="post">
					<input type="search" name="Search" placeholder="Cari produk...">
					<button type="submit" class="btn btn-default search" aria-label="Left Align">
						<i class="fa fa-search" aria-hidden="true"> </i>
					</button>
					<div class="clearfix"></div>
				</form>
			</div>

			<div class="clearfix"> </div>
		</div>
	</div>

	<div class="navigation-agileits">
		<div class="container">
			<nav class="navbar navbar-default">
				<div class="navbar-header nav_2">
					<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
					<ul class="nav navbar-nav">
						<li class="active"><a href="index.php" class="act">Home</a></li>
						<!-- Mega Menu -->
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Kategori Buku<b class="caret"></b></a>
							<ul class="dropdown-menu multi-column columns-3">
								<div class="row">
									<div class="multi-gd-img">
										<ul class="multi-column-dropdown">
											<h6>Kategori</h6>

											<?php
											$kat = mysqli_query($conn, "SELECT * from kategori order by idkategori ASC");
											while ($p = mysqli_fetch_array($kat)) {

											?>
												<li><a href="kategori.php?idkategori=<?php echo $p['idkategori'] ?>"><?php echo $p['namakategori'] ?></a></li>

											<?php
											}
											?>
										</ul>
									</div>

								</div>
							</ul>
						</li>
						<li><a href="cart.php">List Buku yang Akan Di Pinjam</a></li>
						<li><a href="daftarorder.php">Transaksi Peminjaman</a></li>
					</ul>
				</div>
			</nav>
		</div>
	</div>

	<div class="top-brands">
		<div class="container">
			<h2>List Buku</h2>
			<div class="grid_3 grid_5">
				<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
					<div id="myTabContent" class="tab-content">
						<div role="tabpanel" class="tab-pane fade in active" id="expeditions" aria-labelledby="expeditions-tab">
							<div class="agile-tp">
								<?php
								if (!isset($_SESSION['name'])) {
								} else {
									echo 'Untukmu, ' . $_SESSION['name'] . '!';
								}
								?>
								</h5>
							</div>
							<div class="agile_top_brands_grids">

								<?php
								$brgs = mysqli_query($conn, "SELECT * from produk order by idproduk ASC");
								$no = 1;
								while ($p = mysqli_fetch_array($brgs)) {

								?>
									<div class="col-md-4 top_brand_left">
										<div class="hover14 column">
											<div class="agile_top_brand_left_grid">
												<div class="agile_top_brand_left_grid_pos">
													<img src="images/offer.png" alt=" " class="img-responsive" />
												</div>
												<div class="agile_top_brand_left_grid1">
													<figure>
														<div class="snipcart-item block">
															<div class="snipcart-thumb">
																<a href="product.php?idproduk=<?php echo $p['idproduk'] ?>"><img title=" " alt=" " src="<?php echo $p['gambar'] ?>" width="200px" height="200px" /></a>
																<p><?php echo $p['namabuku'] ?></p>
																<div class="stars">
																	<?php
																	$bintang = '<i class="fa fa-star blue-star" aria-hidden="true"></i>';
																	$rate = $p['rate'];

																	for ($n = 1; $n <= $rate; $n++) {
																		echo '<i class="fa fa-star blue-star" aria-hidden="true"></i>';
																	};
																	?>
																</div>
															</div>
															<div class="snipcart-details top_brand_home_details">
																<fieldset>
																	<a href="product.php?idproduk=<?php echo $p['idproduk'] ?>"><input type="submit" class="button" value="Lihat Buku" /></a>
																</fieldset>
															</div>
														</div>
													</figure>
												</div>
											</div>
										</div>
									</div>
								<?php
								}
								?>


								<div class="clearfix"> </div>
							</div>
						</div>


					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="footer">
		<div class="container">
			<div class="w3_footer_grids">
				<div class="col-md-4 w3_footer_grid">
					<h3>Hubungi Kami</h3>

					<ul class="address">
						<li><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>Bayem, Kutoarjo, Purworejo</li>
						<li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="mailto:info@email">info@sd1bayem.com</a></li>
						<li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>0815-5090-880</li>
					</ul>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>

		<div class="footer-copy">

			<div class="container">
				<p>© 2022 | SD Negeri 1 Bayem</p>
			</div>
		</div>

	</div>
	<script src="js/bootstrap.min.js"></script>

	<script type="text/javascript">
		$(document).ready(function() {
			var defaults = {
				containerID: 'toTop',
				containerHoverID: 'toTopHover',
				scrollSpeed: 4000,
				easingType: 'linear'
			};
			$().UItoTop({
				easingType: 'easeOutQuart'
			});

		});
	</script>

	<script src="js/skdslider.min.js"></script>
	<link href="css/skdslider.css" rel="stylesheet">
	<script type="text/javascript">
		jQuery(document).ready(function() {
			jQuery('#demo1').skdslider({
				'delay': 5000,
				'animationSpeed': 2000,
				'showNextPrev': true,
				'showPlayButton': true,
				'autoSlide': true,
				'animationType': 'fading'
			});

			jQuery('#responsive').change(function() {
				$('#responsive_wrapper').width(jQuery(this).val());
			});

		});
	</script>
</body>

</html>