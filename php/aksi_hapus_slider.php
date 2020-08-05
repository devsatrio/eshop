<?php 
include 'koneksi.php';
$id = $_GET['id'];
$caridata = mysqli_query($koneksi,"select * from slider where id='$id'");
while($row=mysqli_fetch_assoc($caridata)) {
    if($row['gambar']!==''){
        $target = '../assets/gambar/'.$row['gambar'];
        if(file_exists($target)){
            unlink($target);
        }
    }
}
$query = mysqli_query($koneksi,"delete from slider where id='$id'");
echo "<script>window.alert('Data Berhasil Dihapus'); window.location=('../view/data_slider.php')</script>";
?>