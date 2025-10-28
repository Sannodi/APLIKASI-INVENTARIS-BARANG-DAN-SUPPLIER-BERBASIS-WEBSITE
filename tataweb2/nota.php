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
$idpem = $_GET['idpem'];
$rs=mysqli_query($conn,"SELECT * FROM pembelian p, user u, ongkir o
  where p.id_pel=u.id_pel AND p.id_ongkir=o.id_ongkir AND p.id_pem='$idpem'");
  $row=mysqli_fetch_assoc($rs);
 ?>
<section class="cart_area">
  <div class="container">
    <div class="card mb-3">
      <div class="card-header">
        Nota Pembelian <?php echo $_SESSION['username']['nama_pel']; ?>
      </div>
      <div class="card-body">
      <form method="POST">
        <table>
          <tr>
            <td>Nama Pembeli</td>
            <td>:</td>
            <td><?php echo $row['nama_pel']; ?></td>
          </tr>
          <tr>
            <td>Alamat Pembeli</td>
            <td>:</td>
            <td><?php echo $row['alamat_pel']; ?></td>
          </tr>
          <tr>
            <td>Nomor Telp</td>
            <td>:</td>
            <td><?php echo $row['no_telp_pel']; ?></td>
          </tr>
          <tr>
            <td>Alamat Pengiriman</td>
            <td>:</td>
            <td><?php echo $row['alamat_kirim']; ?>, <?php echo $row['daerah_ongkir']; ?></td>
          </tr>
          <tr>
            <td>Ongkir</td>
            <td>:</td>
            <td>Rp. <?php echo number_format($row['tarif']); ?></td>
          </tr>
          <tr>
            <td>Total Pembelian</td>
            <td>:</td>
            <td>Rp. <?php echo number_format($row['total_pem']); ?></td>
          </tr>
        </table>

        <h3><p class="text-center">List Pembelian Barang</p></h3>

            <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
              <th scope="col">NO</th>
              <th scope="col">Nama Barang</th>
              <th scope="col">Harga Satuan</th>
              <th scope="col">Jumlah</th>
              <th scope="col">Subtotal</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $nomor=1;
            $sql = mysqli_query($conn,"SELECT * FROM pembelian p, pemb_brg pb, barang b, jenis j, merek m
              WHERE p.id_pem=pb.id_pem AND pb.id_brg=b.id_brg AND b.id_jns=j.id_jns AND b.id_mrk=m.id_mrk AND p.id_pem='$idpem'");
            while($rw=mysqli_fetch_assoc($sql)){
              $jml = $rw['jumlah'];
              $hrg = $rw['harga_brg'];
              $subtot = $jml*$hrg;
              echo "<tr>";
                echo "<td>".$nomor."</td>";
                echo "<td>".$rw['nama_mrk']." ".$rw['nama_jns']."</td>";
                echo "<td>Rp. ".number_format($rw['harga_brg'])."</td>";
                echo "<td>".$rw['jumlah']."</td>";
                echo "<td>Rp. ".number_format($subtot)."</td>";
              echo "</tr>";
              $nomor++;
            }?>
            </tbody>
            <tfoot>
              <tr>
                <th scope="col" colspan="4">Total</th>
                <th scope="col">Rp. <?php echo number_format($row['total_pem']); ?></th>
              </tr>
            </tfoot>
            </table>
            </div>
            <?php
            if($row['status_pem']=='Pending' OR $row['status_pem']=='Pembayaran Tidak Sah'):
             ?>
            <p>Status : <?php echo $row['status_pem']; ?></p>
            <p>Silahkan melakukan pembayaran ke BANK BCA 6755443722 CV.Tata</p>
            <a href="bayar.php?idpem=<?php echo $row['id_pem'] ?>" class="btn btn-success">pembayaran</a>
            <?php else: ?>
              <p>Status : <?php echo $row['status_pem']; ?></p>
            <?php endif ?>
      </form>
      </div>
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
