<?php 
include 'koneksi.php';
$id = $_GET['id'];
$querydua = mysqli_query($koneksi,"delete from transaksi_detail where id_transaksi='$id'");
$query = mysqli_query($koneksi,"delete from transaksi where id='$id'");
echo "<script>window.alert('Data Berhasil Dihapus'); window.location=('../view/data_pembelian.php')</script>";
?>