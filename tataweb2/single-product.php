<?php
   SESSION_START();
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
	<link rel="stylesheet" href="css/main.css">
</head>

<body>

	<!-- Start Header Area -->
<?php include 'menu.php'; ?>
	<!-- End Header Area -->

	<!-- Start Banner Area -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Product Details Page</h1>
					<nav class="d-flex align-items-center">
						<a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
						<a href="#">Shop<span class="lnr lnr-arrow-right"></span></a>
						<a href="single-product.html">product-details</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->

	<!--================Single Product Area =================-->
	<div class="product_image_area">
		<div class="container">
			<div class="row s_product_inner">
			<?php
			$idbrg=$_GET['idb'];
			$rs=mysqli_query($conn,"SELECT b.id_brg, m.nama_mrk, j.nama_jns, b.harga_brg, b.stok_brg, b.deskrip, b.gambar FROM barang b
						  join merek m on b.id_mrk=m.id_mrk
						  join jenis j on b.id_jns=j.id_jns
						  WHERE id_brg='$idbrg' ORDER BY b.id_brg");
			$row=mysqli_fetch_array($rs);
			?>
				<div class="col-lg-6">
					<div class="single-prd-item">
						<img class="img-fluid" <?php echo "img src='../asset/".$row['gambar']."'";?> alt="" style="height: 500px; width:500px">
					</div>
				</div>
				<div class="col-lg-5 offset-lg-1">
					<div class="s_product_text">
						<h3><?php echo $row['nama_mrk']; ?> <?php echo $row['nama_jns']; ?></h3>
						<h2>Rp. <?php echo number_format($row['harga_brg']); ?></h2>
						<p><?php echo $row['deskrip']; ?></p>
						<form method="POST">
						<div class="product_count">
							<label for="qty">Quantity:</label>
							<input type="number" name="qty" id="qty" max="<?php echo $row['stok_brg']?>" value="1">
						</div>
						<div class="card_area d-flex align-items-center">
							<button type="submit" name="tocart" class="primary-btn">Add to Cart</button>
						</div>
						</form>
						<?php
						@$idbrg=$_GET['idb'];
						@$jumlah = $_POST['qty'];
						if(isset($_POST['tocart'])){
							if(isset($_SESSION['cart'][$idbrg]) == 0){
								$_SESSION['cart'][$idbrg]=$jumlah;

								echo"<script>alert('produk telah masuk ke keranjang')</script>";
								echo"<script>location= 'cart.php';</script>";
							}else{
								$qtyawal = $_SESSION['cart'][$idbrg];
								$totqty = $qtyawal + $jumlah;
								$_SESSION['cart'][$idbrg]=$totqty;

								echo"<script>alert('produk telah masuk ke keranjang')</script>";
								echo"<script>location= 'cart.php';</script>";
							}
						}
						?>
					</div>
				</div>

			</div>
		</div>
	</div>
	<!--================End Single Product Area =================-->

	<!-- start footer Area -->
	<footer class="footer-area section_gap">
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

	<script src="js/vendor/jquery-2.2.4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
	 crossorigin="anonymous"></script>
	<script src="js/vendor/bootstrap.min.js"></script>
	<script src="js/jquery.ajaxchimp.min.js"></script>
	<script src="js/jquery.nice-select.min.js"></script>
	<script src="js/jquery.sticky.js"></script>
	<script src="js/nouislider.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<!--gmaps Js-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
	<script src="js/gmaps.min.js"></script>
	<script src="js/main.js"></script>

</body>

</html>
