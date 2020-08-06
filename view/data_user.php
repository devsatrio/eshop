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
include 'layout/h.php';
include 'layout/n.php'; ?>
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Data User</h1>
    <div class="row">
        <div class="col-lg-12">
            <div class="accordion" id="accordionExample">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h2 class="mb-0">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#listdata"
                                aria-expanded="true" aria-controls="collapseOne">
                                List Data
                            </button>
                        </h2>
                    </div>
                    <div id="listdata" class="collapse show" aria-labelledby="headingOne"
                        data-parent="#accordionExample">
                        <div class="card-body">
                            <table class="table table-bordered data-table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Username</th>
                                        <th>No.telp</th>
                                        <th>Alamat</th>
                                        <th>Status</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                      $i =1;
                                      $query = mysqli_query($koneksi,"select * from user order by id desc");
                                      while($row=mysqli_fetch_assoc($query)) { ?>
                                    <tr class="gradeX">
                                        <td><?php echo $i++;?></td>
                                        <td><?php echo $row['nama'];?></td>
                                        <td><?php echo $row['username'];?></td>
                                        <td><?php echo $row['telp'];?></td>
                                        <td><?php echo $row['alamat'];?></td>
                                        <td><?php echo $row['status'];?></td>
                                        <td style="text-align: center;">
                                            <a href="#editModal<?php echo $row[id];?>" data-toggle="modal"
                                                class="btn btn-sm btn-primary"><i class="fa fa-wrench"></i></a>
                                            <a href="../php/aksi_hapus_user.php?id=<?php echo $row[id];?>"
                                                class="btn btn-sm btn-danger"
                                                onclick="return confirm('Hapus data ?')"><i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h2 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                data-target="#tambahdata" aria-expanded="false" aria-controls="collapseTwo">
                                Tambah Data
                            </button>
                        </h2>
                    </div>
                    <div id="tambahdata" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <div class="card-body">
                            <form action="../php/aksi_tambah_user.php" method="post">
                                <div class="form-group">
                                    <label for="email">Nama</label>
                                    <input type="text" class="form-control" name="nama" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Alamat</label>
                                    <input type="text" class="form-control" name="alamat" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">No.Telp</label>
                                    <input class="form-control" type="number" min="0" name="telp" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Status</label>
                                    <select name="status" class="form-control">
                                        <?php if($_SESSION['level']!='Programmer'){?>
                                        <option value="Admin">Admin</option>
                                        <option value="Super Admin">Super Admin</option>
                                        <?php }else{?>
                                        <option value="Admin">Admin</option>
                                        <option value="Super Admin">Super Admin</option>
                                        <option value="Programmer">Programmer</option>
                                        <?php }?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="email">Username</label>
                                    <input type="text" autocomplete="new-username" class="form-control" name="user"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Password</label>
                                    <input type="password" autocomplete="new-password" class="form-control" name="pass"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Konfirmasi Password</label>
                                    <input type="password" class="form-control" name="kpass" required>
                                </div>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <button type="button" class="btn btn-danger"
                                        onclick="history.go(-1)">Kembali</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
$query2 = mysqli_query($koneksi,"select * from user order by id desc");
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
                <form action="../php/aksi_edit_user.php" method="post">
                    <div class="form-group">
                        <label for="email">Nama</label>
                        <input type="text" value="<?php echo $row2['nama'];?>" class="form-control" name="nama"
                            required>
                        <input type="hidden" name="kode" value="<?php echo $row2['id'];?>" />
                    </div>
                    <div class="form-group">
                        <label for="email">Alamat</label>
                        <input type="text" class="form-control" value="<?php echo $row2['alamat'];?>" name="alamat"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="email">No.Telp</label>
                        <input class="form-control" value="<?php echo $row2['telp'];?>" type="number" min="0"
                            name="telp" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Status</label>
                        <select name="status" class="form-control">
                            <?php if($_SESSION['level']!='Programmer'){?>
                            <option value="Admin" <?php if($row2['status']=='Admin'){ echo "selected";}?>>Admin</option>
                            <option value="Super Admin" <?php if($row2['status']=='Super Admin'){ echo "selected";}?>>
                                Super Admin</option>
                            <?php }else{?>
                            <option value="Admin" <?php if($row2['status']=='Admin'){ echo "selected";}?>>Admin</option>
                            <option value="Super Admin" <?php if($row2['status']=='Super Admin'){ echo "selected";}?>>
                                Super Admin</option>
                            <option value="Programmer" <?php if($row2['status']=='Programmer'){ echo "selected";}?>>
                                Programmer</option>
                            <?php }?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="email">Username</label>
                        <input type="text" autocomplete="new-username" class="form-control" name="user"
                            value="<?php echo $row2['username'];?>" required>
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
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php } ?>
<?php
include'layout/f.php';
?>