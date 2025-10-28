<?php 
// mengaktifkan session
session_start();

// menghapus semua session
session_destroy();

echo"<script>alert('Anda telah logout!')</script>";
echo"<script>location='index.php'</script>";
?>