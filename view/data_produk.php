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
    <h1 class="h3 mb-4 text-gray-800">Data Produk</h1>
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow">
                <div class="card-header py-3">
                    <a href="tambah_data_produk.php" class="btn btn-primary">Tambah Data Produk</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered data-table" id="dataTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Kategori</th>
                                <th>Stok</th>
                                <th>Harga</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i =1;
                            $query = mysqli_query($koneksi,"select produk.*,kategori.nama as namakategori from produk left join kategori on kategori.id = produk.id_kategori order by produk.id desc");
                            while($row=mysqli_fetch_assoc($query)) { ?>
                            <tr class="gradeX">
                                <td class="text-center">
                                    <?php echo $i++;?>
                                </td>
                                <td>
                                    <?php echo $row['nama'];?>
                                </td>
                                <td>
                                    <?php echo $row['namakategori'];?>
                                </td>
                                <td>
                                    <?php echo $row['stok'];?> Pcs
                                </td>
                                <td>
                                    <?php echo "Rp. ".number_format($row['harga'],0,',','.'); ?>
                                </td>
                                <td class="text-center">
                                    <a href="edit_data_produk.php?id=<?php echo $row[id];?>"
                                        class="btn btn-mini btn-primary">edit</a>
                                    <a href="../php/aksi_hapus_produk.php?id=<?php echo $row[id];?>"
                                        class="btn btn-mini btn-danger" onclick="return confirm('Hapus data ?')">hapus
                                    </a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include'layout/f_tabel.php';
?>