<?php
error_reporting(0);
session_start();
include '../php/koneksi.php';
if($_SESSION['username']==''){
    echo "<script>window.alert('Maaf, Anda Harus Login'); window.location=('../loginadm.php')</script>";
}else{
    if($_SESSION['akses']!='admin'){
        echo "<script>window.alert('Maaf, Anda tidak memiliki akses'); window.location=('../index.php')</script>";
    }
}
include 'layout/h_tabel.php';
include 'layout/n.php';
?>
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Laporan Pembelian</h1>
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Cari berdasarkan tanggal</h6>
                </div>
                <div class="card-body">
                    <form action="tampil_laporan_pembelian.php" method="get" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="email">Dari Tanggal</label>
                            <input type="date" class="form-control" name="tglsatu" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Sampai Tanggal</label>
                            <input type="date" class="form-control" name="tgldua" required>
                        </div>
                        <div class="form-actions text-center">
                            <button type="submit" class="btn btn-success btn-large">Tampilkan</button>
                            <button type="button" onclick="history.go(-1)"
                                class="btn btn-danger btn-large">Kembali</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include'layout/f_tabel.php';
?>