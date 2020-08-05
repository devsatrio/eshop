<?php
error_reporting(0);	
session_start();

include 'koneksi.php';
$kode       = $_POST['kode'];
$telp_satu 	    = $_POST['telp_satu'];
$telp_dua     = $_POST['telp_dua'];
$email       = $_POST['email'];
$alamat   = $_POST['alamat'];
$fb     = $_POST['fb'];
$ig   = $_POST['ig'];
$norek   = $_POST['norek'];
$carabayar   = $_POST['carabayar'];
$keterangan  = $_POST['keterangan'];

$query = mysqli_query($koneksi,"update setting set rekening='$norek',cara_bayar='$carabayar', telp_satu='$telp_satu', telp_dua='$telp_dua', email='$email', alamat='$alamat', link_fb='$fb', link_ig='$ig', deskripsi='$keterangan' where id='$kode'");
echo "<script>window.alert('Data Berhasil Disimpan'); window.location=('../view/setting_web.php')</script>"; 
?>