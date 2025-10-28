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
    <title>Tata Astana Online</title>

    <!--
            CSS
            ============================================= -->
    <link rel="stylesheet" href="css/linearicons.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/nouislider.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
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
                    <h1>Shopping Cart</h1>
                    <nav class="d-flex align-items-center">
                        <a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="category.html">Cart</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================Cart Area =================-->
    <section class="cart_area">
        <div class="container">
            <div class="cart_inner">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
								                <th scope="col">NO</th>
                                <th scope="col">Product</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
						<?php $nomor=1; ?>
						<?php $total=0; ?>
						<?php if(isset($_SESSION['cart']) == 0): ?>
						<?php else: ?>
						<?php foreach($_SESSION['cart'] as $idbrg => $jumlah): ?>
						<?php
						$brg = mysqli_query($conn, "SELECT b.id_brg, m.nama_mrk, j.nama_jns, b.harga_brg, b.gambar FROM barang b
						  join merek m on b.id_mrk=m.id_mrk
						  join jenis j on b.id_jns=j.id_jns
						  where id_brg='$idbrg'");
						$row = mysqli_fetch_assoc($brg);
						$subhrg = $row['harga_brg']*$jumlah;
						?>
                            <tr>
								<td>
									<?php echo $nomor?>
								</td>
                                <td>
                                    <div class="media">
                                        <div class="d-flex">
                                            <img <?php echo "img src='../asset/".$row['gambar']."'";?> alt="" style="height: 150px; width:200px;">
                                        </div>
                                        <div class="media-body">
                                            <p><?php echo $row['nama_mrk']; ?> <?php echo $row['nama_jns']; ?></p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h5>Rp. <?php echo number_format($row['harga_brg']); ?></h5>
                                </td>
                                <td>
									<h5><?php echo $jumlah; ?></h5>
                                </td>
                                <td>
                                    <h5>Rp. <?php echo number_format($subhrg); ?></h5>
                                </td>
                            </tr>
						<?php $nomor++;?>
						<?php $total+=$subhrg; ?>
						<?php endforeach ?>
						<?php endif ?>
                            <tr>
                                <td>

                                </td>
								<td>

                                </td>
                                <td>

                                </td>
                                <td>
                                    <h5>Total</h5>
                                </td>
                                <td>
                                    <h5>Rp. <?php echo number_format($total);?></h5>
                                </td>
                            </tr>
                            <tr class="out_button_area">
                                <td>

                                </td>
								<td>

                                </td>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>
                                    <div class="checkout_btn_inner d-flex align-items-center">
                                        <a class="gray_btn" href="index.php">Continue Shopping</a>
										<?php if(isset($_SESSION['username']) == 0):?>
										<a class="primary-btn" href="login.php">Proceed to checkout</a>
										<?php else: ?>
										<a class="primary-btn" href="checkout.php">Proceed to checkout</a>
										<?php endif?>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!--================End Cart Area =================-->

    <!-- start footer Area -->
<?php include 'footer.php' ?>
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
