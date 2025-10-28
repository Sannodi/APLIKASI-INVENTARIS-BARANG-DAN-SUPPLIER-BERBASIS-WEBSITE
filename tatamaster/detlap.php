<?php
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/TataAstana/koneksi.php";
   include_once($path);

   	session_start();
	if($_SESSION['status']!="login"){
		header("location:../tatamaster/index.php?pesan=belum_login");
	}
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>TATA ASTANA Admin - Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="dashboard.php">TATA ASTANA Web Master</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <div class="input-group">
        <!-- <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
          <button class="btn btn-primary" type="button">
            <i class="fas fa-search"></i>
          </button>
        </div>-->
      </div>
    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="profil.php">Settings</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">Logout</a>
        </div>
      </li>
    </ul>

  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
<?php include 'sidebar.php'; ?>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="dashboard.php">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Overview</li>
        </ol>

        <!-- Icon Cards-->
        <div class="row">
          <div class="col-xl-4 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="mr-5">Jenis Barang</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="jenis.php">
                <span class="float-left">(+)</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-4 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="mr-5">Merek Barang</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="merek.php">
                <span class="float-left">(+)</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-4 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="mr-5">Tambah Barang</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="tambah.php">
                <span class="float-left">(+)</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
        </div>

        <!-- Area Chart Example
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-chart-area"></i>
            Area Chart Example</div>
          <div class="card-body">
            <canvas id="myAreaChart" width="100%" height="30"></canvas>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>-->

        <!-- DataTables Example -->
        <?php
        $idpem = $_GET['id'];
        $rs=mysqli_query($conn,"SELECT * FROM pembelian p, user u, ongkir o
          where p.id_pel=u.id_pel AND p.id_ongkir=o.id_ongkir AND p.id_pem='$idpem'");
          $row=mysqli_fetch_assoc($rs);
         ?>
        <section class="cart_area">
          <div class="container">
            <div class="card mb-3">
              <div class="card-header">
                Nota Pembelian <?php echo $row['nama_pel']; ?>
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
                    <table class="table table-bordered" width="100%" cellspacing="0">
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
                    $sts =  $row['status_pem'];
                    if($sts == 'Pending'): ?>
                    <p>Status : <?php echo $row['status_pem']; ?></p>
                    <?php else: ?>
                      <p>Status : <?php echo $row['status_pem']; ?></p>
                      <div class="table-responsive">
                        <?php
                        $query = mysqli_query($conn, "SELECT * FROM bayar b JOIN pembelian p ON b.id_pem=p.id_pem WHERE p.id_pem='$idpem'");
                        $ro = mysqli_fetch_assoc($query);
                         ?>
                         <table style="width: 80%; cellspacing: 0;" >
                           <tr>
                             <th rowspan="3"><img <?php echo "img src='../tataweb2/buktipem/".$ro['bukti']."'"; ?> alt="" style="height: 200px; width:500px"></th>
                             <th>Nama Penyetor</th>
                             <th>:</th>
                             <td><?php echo $ro['nama']; ?></td>
                           </tr>
                           <tr>
                             <th>Nama BANK</th>
                             <th>:</th>
                             <td><?php echo $ro['bank']; ?></td>
                           </tr>
                           <tr>
                             <th colspan="2"></th>
                             <th ><button type="submit" class="btn btn-success" name="verf">Verifikasi</button></th>
                             <th ><button type="submit" class="btn btn-danger" name="verfi">Tidak Sah</button></th>
                           </tr>
                         </table>
                           <?php
                           if(isset($_POST['verf'])){
                             $verf = mysqli_query($conn, "UPDATE pembelian SET status_pem='Terverifikasi' WHERE id_pem='$idpem'");
                             echo "<script>alert('Pembayaran Telah Terverivikasi.')</script>";
                             echo "<script>location='suratjalan.php?id=".$idpem."' </script>";
                           }
                            ?>
                          <?php
                          if(isset($_POST['verfi'])){
                            $verf = mysqli_query($conn, "UPDATE pembelian SET status_pem='Pembayaran Tidak Sah' WHERE id_pem='$idpem'");
                            echo "<script>alert('Pesan pembayaran Tidak Sah telah dikirim.')</script>";
                            echo "<script>location='order.php' </script>";
                          }
                           ?>
                    </div>
                  <?php endif; ?>
              </form>
              </div>
            </div>
          </div>
        </section>
      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © Your Website 2019</span>
          </div>
        </div>
      </footer>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

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

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="js/demo/datatables-demo.js"></script>
  <script src="js/demo/chart-area-demo.js"></script>

</body>

</html>
