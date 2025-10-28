<?php 
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/TataAstana/koneksi.php";
   include_once($path);
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
	
	<!-- form -->
	<div class="container-fluid">
	<form method="POST" action="index.php">
		<table class="table">
			<thead>
				<tr>					
					<th colspan="5">
					  <!-- Nav Menu -->
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
								<a class="nav-link active" href="listbrg.php">List Barang</a>
							  </li>
							  <li class="nav-item">
								<a class="nav-link" href="#">Laporan Penjualan</a>
							  </li>
							</ul>
						</div>
					  </th>
				</tr>
				
				<tr>
					<th scope="col" colspan="5"><h3><p class="text-center">List Barang</p></h3></th>
				</tr>
				<tr>
					<th scope="col">Jenis Barang</th>
					<th scope="col">Merek Barang</th>
					<th scope="col">Harga Barang</th>
					<th scope="col">Stok Barang</th>
					<th scope="col"></th>
				</tr>
			</thead>
			<tbody>
			<?php
				$rs=mysqli_query($conn,"select * from barang b, merek m, jenis j where m.id_mrk=b.id_mrk and j.id_jns=b.id_jns");
				while($row=mysqli_fetch_array($rs)){
					echo "<tr>";
						echo "<td>".$row['nama_jns']."</td>";
						echo "<td>".$row['nama_mrk']."</td>";
						echo "<td>".$row['harga_brg']."</td>";
						echo "<td>".$row['stok_brg']."</td>";
						echo "<td><a href='hapus.php?id=".$row['id_brg']."'>hapus</a> /
								  <a href='ubah.php?id=".$row['id_brg']."'>ubah</a>
							  </td>";
					echo "</tr>";
			}?>
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
