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
                Form Surat Jalan
              </div>
              <div class="card-body">
              <form method="POST">
                <table>
                  <tr>
                    <td>DEPO TATA ASTANA</td>
                  </tr>
                  <tr>
                    <td>Jl. Raya Sari Rogo Ruko Citra City, Sidoarjo</td>
                  </tr>
                  <tr>
                    <td>Telp : (031) 70339247</td>
                  </tr>
                </table>

                <hr>
                <br/>

                <table width="100%" cellspacing="0">
                  <tr>
                    <td>
                      <table>
                        <tr>
                          <td>Nomor Faktur</td>
                          <td>:</td>
                          <td><?php echo (rand()."<br>"); ?></td>
                        </tr>
                        <tr>
                          <td>Tanggal</td>
                          <td>:</td>
                          <td><?php echo date('d/M/Y') ?></td>
                        </tr>
                      </table>
                    </td>
                    <td width="40%"></td>
                    <td>
                      <table>
                        <tr>
                          <td>Dikirim Kepada</td>
                          <td>:</td>
                          <td><?php echo $row['nama_pel']; ?></td>
                        </tr>
                        <tr>
                          <td>Alamat Pengiriman</td>
                          <td>:</td>
                          <td><?php echo $row['alamat_kirim']; ?>, <?php echo $row['daerah_ongkir']; ?></td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                </table>
                    <br>
                    <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                      <th scope="col">NO</th>
                      <th scope="col">Nama Barang</th>
                      <th scope="col">Jumlah</th>
                      <th scope="col">Satuan</th>
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
                        echo "<td>".$rw['jumlah']."</td>";
                        echo "<td>Pcs</td>";
                      echo "</tr>";
                      $nomor++;
                    }?>
                    </tbody>
                    </table>
                  </div>
                  <?php echo "<a href='cetaksj.php?id=".$idpem."' class='btn btn-success'>Print</a>"; ?>
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
