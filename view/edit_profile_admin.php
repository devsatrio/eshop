<?php
error_reporting(1);
session_start();
include '../php/koneksi.php';
if($_SESSION['username']==''){
echo "<script>window.alert('Maaf, Anda Harus Login'); window.location=('../loginadm.php')</script>";
}
include 'layout/h.php';
include 'layout/n.php';
?>
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Profile Saya</h1>
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Data</h6>
                </div>
                <div class="card-body">
                    <?php
                    $query = mysqli_query($koneksi,"select * from user where id='$_SESSION[id]'");
                    while($row=mysqli_fetch_assoc($query)) { ?>
                    <form action="../php/aksi_edit_profil_admin.php" method="post">
                        <div class="form-group">
                            <label for="email">Nama</label>
                            <input type="text" value="<?php echo $row['nama'];?>" class="form-control" name="nama"
                                required>
                            <input type="hidden" name="kode" value="<?php echo $row['id'];?>" />
                        </div>
                        <div class="form-group">
                            <label for="email">Alamat</label>
                            <input type="text" class="form-control" value="<?php echo $row['alamat'];?>" name="alamat"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="email">No.Telp</label>
                            <input class="form-control" value="<?php echo $row['telp'];?>" type="number" min="0"
                                name="telp" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Username</label>
                            <input type="text" autocomplete="new-username" class="form-control" name="user"
                                value="<?php echo $row['username'];?>" required>
                        </div>
                        <div class="form-group">
                            <label for="email">*Password baru</label>
                            <input type="password" autocomplete="new-password" class="form-control" name="pass">
                        </div>
                        <div class="form-group">
                            <label for="email">*Konfirmasi Password baru</label>
                            <input type="password" class="form-control" name="kpass">
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <button class="btn btn-danger" onclick="history.go(-1)" type="button">Kembali</button>
                        </div>
                    </form>
                    <?php }?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include'layout/f.php';
?>