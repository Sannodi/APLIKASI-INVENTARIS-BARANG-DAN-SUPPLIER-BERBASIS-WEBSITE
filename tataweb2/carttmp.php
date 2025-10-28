<?php
   SESSION_START();
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/TataAstana/koneksi.php";
   include_once($path);
   
   $idbrg=$_GET['idprb'];
   if(isset($_SESSION['cart'][$idbrg])){
	$_SESSION['cart'][$idbrg]+=1;
   }else{
    $_SESSION['cart'][$idbrg]=1;
   }
   
   echo"<script>alert('produk telah masuk ke keranjang')</script>";
   echo"<script>location= 'cart.php';</script>";
?>