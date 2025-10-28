<?php
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/TataAstana/koneksi.php";
   include_once($path);
	$id_brg=$_GET['id'];
	$rs=mysqli_query($conn,"select * from barang where id_brg='$id_brg'");
	$row=mysqli_fetch_array($rs);
	if(isset($_POST['update'])){
		@$harga_brg=$_POST['hrgbrg'];
    @$ukuran_brg=$_POST['ukrbrg'];
    @$tebal_brg=$_POST['ktblbrg'];
    @$panjang_brg=$_POST['pjgbrg'];
		@$des_brg=$_POST['desk'];
		$sql="UPDATE `barang` SET `harga_brg`='$harga_brg',`ukuran_brg`='$ukuran_brg',`tebal_brg`='$tebal_brg',`panjang_brg`='$panjang_brg',`deskrip`='$des_brg' WHERE id_brg=$_GET[id]";
		$rs=mysqli_query($conn,$sql);
		echo "<script>
    window.location='dashboard.php';
			</script>";
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

  <title>TATA ASTANA Admin - Ubah Data Barang</title>

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
    <ul class="sidebar navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="dashboard.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Pages</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">Login Screens:</h6>
          <a class="dropdown-item" href="profil.php">Profil Admin</a>
          <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">Logout</a>
          <div class="dropdown-divider"></div>
          <h6 class="dropdown-header">Pengaturan Barang</h6>
          <a class="dropdown-item" href="supplier.php">Data Supplier</a>
          <a class="dropdown-item" href="restok.php">Restok barang</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="charts.html">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Charts</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="tables.html">
          <i class="fas fa-fw fa-table"></i>
          <span>Data Pelanggan</span></a>
      </li>
    </ul>

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

        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Ubah Data Barang</div>
          <div class="card-body">
		  <form method="POST" action="ubhbrg.php?id=<?php echo $_GET ['id']?>">
            <div class="table-responsive">
              <table class="table table-bordered" id="formjenis" width="100%" cellspacing="0">
                <tbody>
				<tr>
				  <td>
				  <div class="form-group">
					<label for="Inputjenis">Jenis Barang</label>
					<select class="form-control" id="jnsbrg" name="jnsbrg" disabled>
					  <?php
							$rs=mysqli_query($conn,"Select * from jenis");
							while($jns=mysqli_fetch_array($rs)){
								if($row[id_jns]==$jns[0]){
									echo '<option value="'.$jns[0].'" selected>'.$jns[1].'</option>';
								}else
									echo'<option value="'.$jns[0].'" >'.$jns[1].'</option>';

							}
						?>
					</select>
					</div>
				  </td>

          <td>
            <div class="form-group">
  					<label for="Inputmerek">Harga (RP.)</label>
  					<input type="text" class="form-control" id="hrgbrg" name="hrgbrg" value="<?php echo $row['harga_brg'];?>">
  				  </div>
          </td>
				</tr>

				<tr>
				  <td>
				  <div class="form-group">
					<label for="Inputharga">Merek Barang</label>
					<select class="form-control" id="mrkbrg" name="mrkbrg" disabled>
					  <?php
							$rs=mysqli_query($conn,"Select * from merek");
							while($mrk=mysqli_fetch_array($rs)){
								if($row[id_mrk]==$mrk[0]){
									echo '<option value="'.$mkr[0].'" selected>'.$mrk[1].'</option>';
								}else
									echo'<option value="'.$mrk[0].'">'.$mrk[1].'</option>';

							}
						?>
					</select>
					</div>
				  </td>

          <td>
				  <fieldset disabled>
				  <div class="form-group">
					<label for="Inputstok">Stok Barang</label>
					<input type="text" class="form-control" id="stkbrg" name="stkbrg" value="<?php echo $row['stok_brg'];?>">
					</div>
				  </fieldset>
				  </td>
				</tr>

				<tr>
				  <td>
				  <div class="form-group">
					<label for="Inputmerek">Ukuran (Meter)</label>
					<input type="text" class="form-control" id="ukrbrg" name="ukrbrg" value="<?php echo $row['ukuran_brg'];?>">
				  </div>
				  </td>

          <td rowspan="2">
				  <div class="form-group">
					<label for="exampleFormControlTextarea1">Deskripsi Barang</label>
					<textarea class="form-control" id="desk" name="desk" rows="6" required><?php echo $row['deskrip'] ?></textarea>
				  </div>
				  </td>
				</tr>

				<tr>
				  <td>
				  <div class="form-group">
					<label for="Inputstok">Ketebalan (Milimeter)</label>
					<input type="text" class="form-control" id="ktblbrg" name="ktblbrg" value="<?php echo $row['tebal_brg'];?>">
					</div>
				  </td>
				</tr>

        <tr>
          <td>
            <div class="form-group">
  					<label for="Inputstok">Panjang (Meter)</label>
  					<input type="text" class="form-control" id="pjgbrg" name="pjgbrg" value="<?php echo $row['panjang_brg'];?>">
          </td>

          <td>
					</br>
					<button type="submit" class="btn btn-primary btn-lg btn-block" name="update">Update</button>
				  </td>
        </tr>
                </tbody>
              </table>
            </div>
		  </form>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>

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
