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
    <h1 class="h3 mb-4 text-gray-800">Data Pengguna</h1>
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
                                <th>Nama</th>
                                <th>Status</th>
                                <th>No.Telp</th>
                                <th>Alamat</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i =1;
                            $query = mysqli_query($koneksi,"select * from pengguna order by id desc");
                            while($row=mysqli_fetch_assoc($query)) { ?>
                            <tr class="gradeX">
                                <td class="text-center">
                                    <?php echo $i++;?>
                                </td>
                                <td>
                                    <?php echo $row['nama'];?>
                                </td>
                                <td>
                                    <?php if($row['status']=='Aktif'){ ?>
                                        <span class="badge badge-success"><?php echo $row['status'];?></span>
                                    <?php }else{ ?>
                                        <span class="badge badge-danger"><?php echo $row['status'];?></span>
                                    <?php } ?>
                                    
                                </td>
                                <td>
                                    <?php echo $row['notelp'];?>
                                </td>
                                <td>
                                    <?php echo $row['alamat'];?>
                                </td>
                                <td class="text-center">
                                    <a href="#editModal<?php echo $row[id];?>" data-toggle="modal"
                                        class="btn btn-mini btn-primary">edit</a>
                                    <a href="../php/aksi_hapus_pengguna.php?id=<?php echo $row[id];?>"
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
                    <form action="../php/aksi_tambah_pengguna.php" method="post">
                        <div class="form-group">
                            <label for="email">Nama</label>
                            <input type="text" class="form-control" name="nama" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Alamat</label>
                            <input type="text" class="form-control" name="alamat" required>
                        </div>
                        <div class="form-group">
                            <label for="email">No. Telpon</label>
                            <input type="number" min="0" class="form-control" name="telp" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Username</label>
                            <input type="text" class="form-control" name="username" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Status</label>
                            <select name="status" class="form-control">
                                <option value="Aktif">Aktif</option>
                                <option value="Non Aktif">Non Aktif</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="email">Password</label>
                            <input type="password" class="form-control" name="password" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Konfirmasi Password</label>
                            <input type="password" class="form-control" name="kpassword" required>
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
$query2 = mysqli_query($koneksi,"select * from pengguna order by id desc");
while($row2=mysqli_fetch_assoc($query2)) { ?>
<div class="modal fade bd-example-modal-lg" id="editModal<?php echo $row2['id'];?>" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="../php/aksi_edit_pengguna.php" method="post">
                    <div class="form-group">
                        <label for="email">Nama</label>
                        <input type="hidden" name="kode" value="<?php echo $row2['id'];?>">
                        <input type="text" class="form-control" value="<?php echo $row2['nama'];?>" name="nama"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="email">Alamat</label>
                        <input type="text" class="form-control" name="alamat" value="<?php echo $row2['alamat'];?>"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="email">No. Telpon</label>
                        <input type="number" min="0" class="form-control" value="<?php echo $row2['notelp'];?>"
                            name="telp" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Username</label>
                        <input type="text" class="form-control" autocomplete="new-username" name="username"
                            value="<?php echo $row2['username'];?>" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Status</label>
                        <select name="status" class="form-control">
                            <option value="Aktif" <?php if($row2['status']=='Aktif'){ echo "selected";}?>>Aktif</option>
                            <option value="Non Aktif" <?php if($row2['status']=='Non Aktif'){ echo "selected";}?>>Non Aktif</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="email">*Password Baru</label>
                        <input type="password" class="form-control" autocomplete="new-password" name="password">
                    </div>
                    <div class="form-group">
                        <label for="email">*Konfirmasi Password Baru</label>
                        <input type="password" class="form-control" name="kpassword">
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