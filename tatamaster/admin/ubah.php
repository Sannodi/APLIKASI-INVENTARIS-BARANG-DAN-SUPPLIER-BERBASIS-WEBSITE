<?php
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/TataAstana/koneksi.php";
   include_once($path);
	$id_brg=$_GET['id'];
	$rs=mysqli_query($conn,"select * from barang where id_brg='$id_brg'");
	$row=mysqli_fetch_array($rs);
	if(isset($_POST['update'])){
		@$jenis_brg=$_POST['jnsbrg'];
		@$merek_brg=$_POST['mrkbrg'];
		@$harga_brg=$_POST['hrgbrg'];
		@$gambar=$_POST['image'];
		@$des_brg=$_POST['desk'];
		$sql="UPDATE `barang` SET `id_jns`='$jenis_brg',`id_mrk`='$merek_brg',`harga_brg`='$harga_brg',`gambar`='$gambar',`deskrip`='$des_brg' WHERE id_brg=$_GET[id]";
		$rs=mysqli_query($conn,$sql);
		echo "<script>
				window.location='listbrg.php';
			</script>";
	}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	    
	<title>Tata Astana</title>
	<link rel="stylesheet" type="text/css" href="style.css">
  </head>
 
  <body>
    <!-- Nav Brand image -->
	<div class="container-fluid">
	<nav class="navbar navbar-dark bg-dark">
	  <a class="navbar-brand" href="index.php">
		<img src="/TataAstana/images/tatarev.png" height=30>
	  </a>
	  <form class="form-inline my-2 my-lg-0">
	  <div class="container">
		<ul class="nav nav-pills">
		  <li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">ADMIN</a>
			<div class="dropdown-menu">
			  <a class="dropdown-item" href="#">Profil</a>
			  <a class="dropdown-item" href="#">Pengaturan Akun</a>
			  <div class="dropdown-divider"></div>
			  <a class="dropdown-item" href="logout.php">Log Out</a>
			</div>
		  </li>
		</ul>
	  </div>
	  </form>
	</nav>
	</div>
	<div class="container">
		<ul class="nav nav-pills nav-fill">
		  <li class="nav-item">
			<a class="nav-link" href="home.php">Beranda</a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link" href="jnsbrg.php">Jenis Barang</a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link" href="mrkbrg.php">Merek Barang</a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link" href="tmbhbrg.php">Tambah Barang</a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link active" href="listbrg.php">Ubah Barang</a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link" href="#">Laporan Penjualan</a>
		  </li>
		</ul>
	</div>
	
	<!-- form -->
	<div class="container-fluid">
	<form method="POST" action="ubah.php?id=<?php echo $_GET ['id']?>">
		<table class="table">
		  <thead>
			<tr>
			  <th scope="col" colspan="2"><h3><p class="text-center">Form Ubah Barang</p></h3></th>
			</tr>
		  </thead>
		  <tbody>
			<tr>
			  <td>
			  <div class="form-group">
				<label for="Inputjenis">Jenis Barang</label>
				<select class="form-control" id="jnsbrg" name="jnsbrg">
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
			  <td rowspan="2">
			  <div class="form-group">
				<label for="exampleFormControlTextarea1">Deskripsi Barang</label>
				<textarea class="form-control" id="desk" name="desk" rows="6" value="<?php echo $row['$des_brg'];?>"></textarea>
			  </div>
			  </td>
			</tr>
			
			<tr>
			  <td>
			  <div class="form-group">
				<label for="Inputharga">Merek Barang</label>
				<select class="form-control" id="mrkbrg" name="mrkbrg">
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
			</tr>

			<tr>
			  <td>
			  <div class="form-group">
				<label for="Inputmerek">Harga (RP.)</label>
				<input type="text" class="form-control" id="hrgbrg" name="hrgbrg" value="<?php echo $row['harga_brg'];?>">
			  </div>
			  </td>
			  <td>
				<label>Gambar Produk</label>
				<ul>
				  <form action="" method="post" enctype="multipart/form-data">
				  Pilih File : <input type="file" name="image">
				  </form>
				</ul>
			  </td>
			</tr>
			
			<tr>
			  <td>
			  <fieldset disabled>
			  <div class="form-group">
				<label for="Inputstok">Stok Barang</label>
				<input type="text" class="form-control" id="stkbrg" name="stkbrg" value="<?php echo $row[4];?>">
				</div>
			  </fieldset>
			  </td>
			  <td>
				</br>
				<button type="submit" class="btn btn-primary btn-lg btn-block" name="update">Update</button>
			  </td>
			</tr>
		  </tbody>
		</table>
	</form>
	</div>
	
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>