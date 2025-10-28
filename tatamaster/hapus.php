<?php
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/TataAstana/koneksi.php";
   include_once($path);
	$id=$_GET['id'];
	$sql="delete from barang where id_brg='$id'";
	$rs=mysqli_query($conn,$sql);
	echo "<script>
		window.location='dashboard.php';
	</script>";
?>
<html>
	<body>
		
	</body>
</html>