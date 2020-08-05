<?php 
include 'koneksi.php';
$id = $_GET['id'];
$caridata = mysqli_query($koneksi,"select * from produk where id='$id'");
while($row=mysqli_fetch_assoc($caridata)) {
    if($row['gambar']!==''){
        $target = '../assets/gambar/produk/'.$row['gambar'];
        if(file_exists($target)){
            unlink($target);
        }
    }
}
$query = mysqli_query($koneksi,"delete from produk where id='$id'");
echo "<script>window.alert('Data Berhasil Dihapus'); window.location=('../view/data_produk.php')</script>";
?>