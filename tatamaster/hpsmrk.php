<?php
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/TataAstana/koneksi.php";
   include_once($path);
	$id=$_GET['id'];
	$sql="delete from merek where id_mrk='$id'";
	$rs=mysqli_query($conn,$sql);
	echo "<script>
		window.location='merek.php';
	</script>";
?>
<html>
	<body>
		
	</body>
</html>