<?php
error_reporting(0);	
session_start();

include 'koneksi.php';
$status = $_POST['status'];
$keterangan = $_POST['keterangan'];
$kode = $_POST['kode'];

$query = mysqli_query($koneksi,"update transaksi set status='$status', keterangan='$keterangan' where id='$kode'");
echo "<script>window.alert('Status berhasil di ubah'); window.location=('../view/data_pembelian.php')</script>";
?>