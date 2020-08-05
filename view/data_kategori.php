<?php
error_reporting(0);
session_start();
include '../php/koneksi.php';
if($_SESSION['username']==''){
    echo "<script>window.alert('Maaf, Anda Harus Login'); window.location=('../loginadm.php')</script>";
}else{
    if($_SESSION['akses']!='admin'){
        echo "<script>window.alert('Maaf, Anda tidak memiliki akses'); window.location=('../view/index.php')</script>";
    }
}
include 'layout/h_tabel.php';
include 'layout/n.php';
?>
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Data Kategori</h1>
    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        List Data
                    </h6>
                </div>
                <div class="card-body">
                    <table class="table table-bordered data-table" id="dataTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th class="text-center">Gambar</th>
                                <th class="text-center">Nama</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i =1;
                            $query = mysqli_query($koneksi,"select * from kategori order by id desc");
                            while($row=mysqli_fetch_assoc($query)) { ?>
                            <tr class="gradeX">
                                <td class="text-center">
                                    <?php echo $i++;?>
                                </td>
                                <td class="text-center">
                                    <img src="../assets/gambar/kategori/<?php echo $row['gambar'];?>"
                                        class="img-thumbnail" width="200px" alt="...">

                                </td>
                                <td class="text-center">
                                    <?php echo $row['nama'];?>
                                </td>
                                <td class="text-center">
                                    <a href="#editModal<?php echo $row[id];?>" data-toggle="modal"
                                        class="btn btn-mini btn-primary">edit</a>
                                    <a href="../php/aksi_hapus_kategori.php?id=<?php echo $row[id];?>"
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
        <div class="col-lg-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Data</h6>
                </div>
                <div class="card-body">
                    <form action="../php/aksi_tambah_kategori.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="email">Nama</label>
                            <input type="text" class="form-control" name="nama" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Gambar</label>
                            <input type="file" class="form-control" accept="image/*" name="gambar" required>
                        </div>
                        <div class="form-actions text-center">
                            <button type="submit" class="btn btn-success btn-large">Simpan</button>
                            <button type="reset" class="btn btn-danger btn-large">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
$query2 = mysqli_query($koneksi,"select * from kategori order by id desc");
while($row2=mysqli_fetch_assoc($query2)) { ?>
<div class="modal fade" id="editModal<?php echo $row2['id'];?>" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="../php/aksi_edit_kategori.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="email">Nama</label>
                        <input type="hidden" name="kode" value="<?php echo $row2['id'];?>">
                        <input type="hidden" name="berkas_lama" value="<?php echo $row2['gambar'];?>">
                        <input type="text" class="form-control" value="<?php echo $row2['nama'];?>" name="nama"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="email">Gambar Baru*</label><br>
                        <img src="../assets/gambar/kategori/<?php echo $row2['gambar'];?>"
                                        class="img-thumbnail" width="200px" alt="..."><br>
                        <input type="file" class="form-control" accept="image/*" name="gambar">
                    </div>
                    <div class="form-actions text-right">
                        <button type="submit" class="btn btn-success btn-large">Simpan</button>
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php } ?>
<?php
include'layout/f_tabel.php';
?>