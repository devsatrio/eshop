<?php 
include 'koneksi.php';
$id = $_GET['id'];
$query = mysqli_query($koneksi,"delete from keranjang where id='$id'");
echo "<script>window.alert('Data Berhasil Dihapus'); window.location=('../keranjang.php')</script>";
?>