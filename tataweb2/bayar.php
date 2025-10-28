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
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
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
                    <h1>Nota Dan Pembayaran</h1>
                    <nav class="d-flex align-items-center">
                        <a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="category.html">Nota Dan Pembayaran</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================Checkout Area =================-->

<?php
@$idpem = $_GET['idpem'];
$rs=mysqli_query($conn,"SELECT * FROM pembelian p, user u
  where p.id_pel=u.id_pel AND  p.id_pem='$idpem'");
  $row=mysqli_fetch_array($rs);
 ?>
<section class="cart_area">
  <div class="container">
    <div class="card mb-3">
      <div class="card-header">
        Komfirmasi Pembayaran
      </div>
      <div class="card-body">
        <h3><p class="text">KONFIRMASI PEMBAYARAN</p></h3>
        <h5><p class="text">Total tagihan anda Rp. <?php echo number_format($row['total_pem']) ?></p></h5>
      <form method="POST" action="bayar.php" enctype="multipart/form-data">
        <div class="table-responsive">
        <table class="table" id="dataTable" width="100%" cellspacing="0">
        <thead>

        </thead>
        <tbody>
          <tr>
            <th>Nomor Pembayaran</th>
            <th><input type="text" class="from-control" name="v" value="<?php echo $v = $_GET['idpem'] ?>" readonly></input></th>
          </tr>
          <tr>
            <th>Nama Penyetor</th>
            <th><input type="text" class="from-control" name="nama"></input></th>
          </tr>
          <tr>
            <th>Nama Bank</th>
            <th><input type="text" class="from-control" name="bank"></input></th>
          </tr>
          <tr>
            <th>Bukti Pembayaran</th>
            <th>
              <p>Pilih Gambar : <input type="file" name="bukti"></p>
              <p class="text-danger">foto bukti harus jpg</p>
            </th>
          </tr>
        </tbody>
        </table>
        </div>
        <button type="submit" class="btn btn-primary" name="kirim">Kirim</button>
      </form>
      </div>

      <?php
      if(isset($_POST['kirim'])){
        $idpem = $_POST['v'];
        $nama = $_POST['nama'];
        $bank = $_POST['bank'];
        $tanggal = Date("Y-m-d");

        $gambukti = $_FILES['bukti']['name'];
        $gmbkt = date("YmdHis").$gambukti;
        $direct = "C:/xampp/htdocs/TataAstana/tataweb2/buktipem/";
        $target = $direct.basename($gmbkt);

        $query = mysqli_query($conn, "INSERT INTO `bayar`(`id_pem`, `nama`, `bank`, `tanggal`,`bukti`) VALUES ('$idpem','$nama','$bank','$tanggal','$gmbkt')");
        if(move_uploaded_file($_FILES['bukti']['tmp_name'], $target)){
            $msg = "Image uploaded successfully";
        }else{
          $msg = "Failed to upload image";
        }

        $sql = mysqli_query($conn, "UPDATE pembelian SET status_pem='Sudah Dibayar' WHERE id_pem='$idpem'");
          echo "<script>
              alert('Data Berhasil Disimpan');
              	window.location='histori.php';
              </script>";
      }
       ?>
    </div>
  </div>
</section>
    <!--================End Checkout Area =================-->

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
