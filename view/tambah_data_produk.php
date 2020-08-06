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
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Data</h6>
                </div>
                <div class="card-body">
                    <form action="../php/aksi_tambah_produk.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="email">Nama</label>
                            <input type="text" class="form-control" name="nama" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Kategori</label>
                            <select name="kategori" class="form-control">
                                <?php
                            $query = mysqli_query($koneksi,"select * from kategori order by id desc");
                            while($row=mysqli_fetch_assoc($query)) { ?>
                                <option value="<?php echo $row['id']?>"><?php echo $row['nama']?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="email">Stok</label>
                            <input type="number" min="0" class="form-control" name="stok" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Harga</label>
                            <input type="number" min="0" class="form-control" name="harga" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Deskripsi</label>
                            <textarea name="deskripsi" rows="4" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="email">Gambar</label>
                            <input type="file" class="form-control" name="gambar" accept="image/*" required>
                        </div>
                        <div class="form-actions text-center">
                            <button type="submit" class="btn btn-success btn-large">Simpan</button>
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