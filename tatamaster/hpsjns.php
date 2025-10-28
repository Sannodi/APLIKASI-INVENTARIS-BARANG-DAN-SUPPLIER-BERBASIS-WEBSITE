<?php
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/TataAstana/koneksi.php";
   include_once($path);
	$id=$_GET['id'];
	$sql="delete from jenis where id_jns='$id'";
	$rs=mysqli_query($conn,$sql);
	echo "<script>
		window.location='jenis.php';
	</script>";
?>
<html>
	<body>
		
	</body>
</html>