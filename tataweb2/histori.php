<?php
SESSION_START();
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/TataAstana/koneksi.php";
include_once($path);

if(!isset($_SESSION['username']['id_pel']) OR empty($_SESSION['username']['id_pel'])){
  echo "<script>alert('Silahkan Login Terlebih Dahulu')</script>";
  echo "<script>location='login.php'</script>";
  exit();
}
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
                    <h1>Histori Pembelian
                    <p><?php echo $_SESSION['username']['nama_pel'];?></p></h1>
                    <nav class="d-flex align-items-center">
                        <a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="category.html">Histori</a>
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
                                <th scope="col">Nama Pembeli</th>
                                <th scope="col">Tanggal Pembelian</th>
                                <th scope="col">Subtotal</th>
                                <th scope="col">Status</th>
                                <th scope="col">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
            <?php
            $nomor=1;
            $idpel = $_SESSION['username']['id_pel'];
            $rs=mysqli_query($conn,"SELECT * FROM pembelian p, user u
              where p.id_pel=u.id_pel AND p.id_pel='$idpel'");
            while($row=mysqli_fetch_assoc($rs)){
             ?>
                            <tr>
                								<td>
                									<?php echo $nomor?>
                								</td>
                                <td>
                                  <?php echo $row['nama_pel']; ?>
                                </td>
                                <td>
                                    <?php echo $row['tanggal_pem']; ?>
                                </td>
                                <td>
									                  Rp. <?php echo number_format($row['total_pem']); ?>
                                </td>
                                <td>
                                    <?php
                                    if($row['status_pem'] == 'Pembayaran Tidak Sah'){
                                      echo "<script>alert('Bukti pembayaran tidak sesuai dengan nota pembelian harap cek nota pembelian anda')</script>";
                                      echo $row['status_pem'];
                                    }else {
                                      echo $row['status_pem'];
                                    }
                                     ?>
                                </td>
                                <td>
									                  <a href="nota.php?idpem=<?php echo $row['id_pem'] ?>" class="btn btn-info">nota</a>
                                </td>
                            </tr>
            <?php $nomor++;?>
            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!--================End Cart Area =================-->

    <!-- start footer Area -->
    <?php include 'footer.php'; ?>
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
