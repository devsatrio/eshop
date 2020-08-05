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
include 'layout/h.php';
include 'layout/n.php'; ?>
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Data Slider</h1>
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
                                        <th>Judul</th>
                                        <th>Deskripsi</th>
                                        <th>Status</th>
                                        <th>link</th>
                                        <th class="text-center">Gambar</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                      $i =1;
                                      $query = mysqli_query($koneksi,"select * from slider order by id desc");
                                      while($row=mysqli_fetch_assoc($query)) { ?>
                                    <tr class="gradeX">
                                        <td><?php echo $i++;?></td>
                                        <td><?php echo $row['judul'];?></td>
                                        <td><?php echo $row['deskripsi'];?></td>
                                        <td><?php echo $row['status'];?></td>
                                        <td><?php echo $row['link'];?></td>
                                        <td class="text-center"><img src="../assets/gambar/<?php echo $row['gambar'];?>"
                                                alt=".." width="20%"></td>
                                        <td class="text-center">
                                            <a href="#editModal<?php echo $row[id];?>" data-toggle="modal"
                                                class="btn btn-sm btn-primary"><i class="fa fa-wrench"></i></a>
                                            <a href="../php/aksi_hapus_slider.php?id=<?php echo $row[id];?>"
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
                            <form action="../php/aksi_tambah_slider.php" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="email">Judul</label>
                                    <input type="text" class="form-control" name="judul" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Deskripsi</label>
                                    <textarea class="form-control" name="deskripsi"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="email">Link*</label>
                                    <input class="form-control" type="text" name="link">
                                </div>
                                <div class="form-group">
                                    <label for="email">Status</label>
                                    <select name="status" class="form-control">
                                        <option value="Promo">Promo</option>
                                        <option value="Banner">Banner</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="email">Gambar</label>
                                    <input type="file" class="form-control" name="gambar" accept="image/*" required>
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
$query2 = mysqli_query($koneksi,"select * from slider order by id desc");
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
                <form action="../php/aksi_edit_slider.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="email">Judul</label>
                        <input type="text" class="form-control" name="judul" value="<?php echo $row2['judul']?>"
                            required>
                        <input type="hidden" name="kode" value="<?php echo $row2['id']?>">
                        <input type="hidden" name="gambarlama" value="<?php echo $row2['gambar']?>">
                    </div>
                    <div class="form-group">
                        <label for="email">Deskripsi</label>
                        <textarea class="form-control" name="deskripsi"><?php echo $row2['deskripsi']?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="email">Status</label>
                        <select name="status" class="form-control">
                            <option value="Promo" <?php if($row2['status']=='Promo'){ echo 'selected';}?>>Promo</option>
                            <option value="Banner" <?php if($row2['status']=='Banner'){ echo 'selected';}?>>Banner</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="email">Link*</label>
                        <input class="form-control" type="text" name="link" value="<?php echo $row2['judul']?>">
                    </div>
                    <div class="form-group">
                        <label for="email">Gambar lama</label><br>
                        <img src="../assets/gambar/<?php echo $row2['gambar'];?>" alt=".." width="20%">
                    </div>
                    <div class="form-group">
                        <label for="email">Gambar baru*</label>
                        <input type="file" class="form-control" name="gambar" accept="image/*">
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="button" class="btn btn-danger" onclick="history.go(-1)">Kembali</button>
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