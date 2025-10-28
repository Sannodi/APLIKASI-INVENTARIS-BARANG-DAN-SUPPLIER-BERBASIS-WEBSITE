<?php
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/TataAstana/koneksi.php";
   include_once($path);
?>

<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="shortcut icon" href="img/fav.png">
	<!-- Author Meta -->
	<meta name="author" content="CodePixar">
	<!-- Meta Description -->
	<meta name="description" content="">
	<!-- Meta Keyword -->
	<meta name="keywords" content="">
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!-- Site Title -->
	<title>Tata Atana Onlie</title>
	<!--
		CSS
		============================================= -->
	<link rel="stylesheet" href="css/linearicons.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/themify-icons.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="stylesheet" href="css/nice-select.css">
	<link rel="stylesheet" href="css/nouislider.min.css">
	<link rel="stylesheet" href="css/ion.rangeSlider.css" />
	<link rel="stylesheet" href="css/ion.rangeSlider.skinFlat.css" />
	<link rel="stylesheet" href="css/magnific-popup.css">
	<link rel="stylesheet" href="css/main.css">
</head>

<body>

	<!-- Start Header Area -->
<?php include 'menu.php'; ?>
	<!-- End Header Area -->

	<!-- start banner Area -->
	<section class="banner-area">
		<div class="container">
			<div class="row fullscreen align-items-center justify-content-start">
				<div class="col-lg-12">
				<div class="row">
					<div class="col-lg-5 col-md-6">
						<div class="banner-content">

						</div>
					</div>
					<div class="col-lg-7">
						<div class="banner-img">
							<img class="img-fluid" src="img/banner/tata-bnr.png" alt="">
						</div>
					</div>
				</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End banner Area -->

	<!-- start features Area -->
	<section class="features-area section_gap">
		<div class="container">
			<div class="row features-inner">
				<!-- single features -->
				<div class="col-lg-4 col-md-6 col-sm-6">
					<div class="single-features">
						<div class="f-icon">
							<img src="img/features/f-icon1.png" alt="">
						</div>
						<h6>Pengiriman lebih cepat</h6>
					</div>
				</div>

				<!-- single features -->
				<div class="col-lg-4 col-md-6 col-sm-6">
					<div class="single-features">
						<div class="f-icon">
							<img src="img/features/f-icon3.png" alt="">
						</div>
						<h6>Layanan 24 jam</h6>
					</div>
				</div>
				<!-- single features -->
				<div class="col-lg-4 col-md-6 col-sm-6">
					<div class="single-features">
						<div class="f-icon">
							<img src="img/features/f-icon4.png" alt="">
						</div>
						<h6>Pembayaran mudah dan nyaman</h6>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- end features Area -->

	<!-- Start category Area -->
	<section class="category-area">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-8 col-md-12">
					<div class="row">
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End category Area -->

	<!-- start product Area -->

	<!--<section class="owl-carousel active-product-area section_gap">
		<!-- single product slide -->
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-6 text-center">
						<div class="section-title">
							<h1>Latest Products</h1>
						</div>
					</div>
				</div>
				<!-- single product -->
				<div class="row">
				<?php
				$query = "SELECT b.id_brg, m.nama_mrk, j.nama_jns, b.harga_brg, b.deskrip, b.gambar FROM barang b
						  join merek m on b.id_mrk=m.id_mrk
						  join jenis j on b.id_jns=j.id_jns
						  ORDER BY b.id_brg";
				$result = mysqli_query($conn, $query);
				if(mysqli_num_rows($result) > 0){
					while($row = mysqli_fetch_array($result)){
				?>
				<div class="col-lg-3 col-md-6">
				<form method="POST" action="dashboard.php?action=add=&id=<?php echo $row['id_brg']; ?>">
					<div class="single-product">
						<img class="card-img-top" <?php echo "img src='../asset/".$row['gambar']."'";?> alt="">
						<div class="product-details">
							<h6><?php echo $row['nama_mrk']; ?> <?php echo $row['nama_jns']; ?></h6>
							<div class="price">
								<h6>Rp. <?php echo $row['harga_brg']; ?></h6>
								<h6 class="l-through">Rp. <?php echo $row['harga_brg']; ?></h6>
							</div>
							<div class="prd-bottom">
									<a href="" class="social-info">
									<span class="ti-bag"></span>
									<p class="hover-text">add to bag</p>
								</a>
								<a href="" class="social-info">
									<span class="lnr lnr-heart"></span>
									<p class="hover-text">Wishlist</p>
								</a>
								<a href="" class="social-info">
									<span class="lnr lnr-sync"></span>
									<p class="hover-text">compare</p>
								</a>
								<a href="single-product.php?idb=<?php echo $row['id_brg']?>" class="social-info">
										<span class="lnr lnr-move"></span>
									<p class="hover-text">view more</p>
								</a>
							</div>
						</div>
					</div>
				</form>
				</div>
				<?php
					}
				}
				?>

	<!-- End related-product Area -->

	<!-- start footer Area -->
	<footer class="footer-area section_gap" id="about">
		<div class="container">
			<div class="row">
				<div class="col-lg-4  col-md-6 col-sm-6">
					<div class="single-footer-widget">
						<h6>Tentang Kami</h6>
						<p>Tata Astana adalah penyedia baja ringan atau yang biasa disebut galvalum
						yang terbaik dan berkualitas tinggi.</p>
					</div>
				</div>
				<div class="col-lg-4  col-md-6 col-sm-6">
					<div class="single-footer-widget mail-chimp">
						<h6 class="mb-20">Kontak</h6>
						<ul>
							<li>Jl Raya Sari Rogo Ruko Citra City, Sari Rogo (031) 70339247</li>
							<li><a href="contact.php">selengkapnya</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-sm-6">
					<div class="single-footer-widget">
						<h6>Follow Us</h6>
						<p>Let us be social</p>
						<div class="footer-social d-flex align-items-center">
							<a href="#"><i class="fa fa-facebook"></i></a>
							<a href="#"><i class="fa fa-whatsapp"></i></a>
							<a href="#"><i class="fa fa-google"></i></a>
						</div>
					</div>
				</div>
			</div>
			<div class="footer-bottom d-flex justify-content-center align-items-center flex-wrap">
				<p class="footer-text m-0"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
				Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | TataAstana-site
				<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
				</p>
			</div>
		</div>
	</footer>
	<!-- End footer Area -->

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="index.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

	<script src="js/vendor/jquery-2.2.4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
	 crossorigin="anonymous"></script>
	<script src="js/vendor/bootstrap.min.js"></script>
	<script src="js/jquery.ajaxchimp.min.js"></script>
	<script src="js/jquery.nice-select.min.js"></script>
	<script src="js/jquery.sticky.js"></script>
	<script src="js/nouislider.min.js"></script>
	<script src="js/countdown.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<!--gmaps Js-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
	<script src="js/gmaps.min.js"></script>
	<script src="js/main.js"></script>
</body>

</html>
