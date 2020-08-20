<!DOCTYPE html>
<html lang="zxx">
<?php include 'php/koneksi.php';?>
<?php include 'base_h.php';?>

<body class="js">
    <?php include 'base_nav.php';?>
    <?php
    $kode = $_SESSION['id'];
    echo $kode;
    $users = mysqli_query($koneksi,"select * from pengguna where id='$kode'");
    while($user=mysqli_fetch_assoc($users)) {?>
    <section id="contact-us" class="contact-us section mt-1" style="padding-top:25px;">
        <div class="container">
            <div class="contact-head">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2 col-12">
                        <h2>Edit Profile</h2>
                        <div class="single-head mt-2">
                            <form action="php/aksi_profile_user.php" method="post">
                            <input type="hidden" name="kode" value="<?=$user['id']?>">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" name="nama" value="<?php echo $user['nama'];?>" class="form-control"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Username</label>
                                    <input type="text" name="username" value="<?php echo $user['username'];?>" class="form-control"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Alamat</label>
                                    <input type="text" name="alamat" value="<?php echo $user['alamat'];?>" class="form-control"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">No.Telp</label>
                                    <input type="text" name="notelp" value="<?php echo $user['notelp'];?>" class="form-control"
                                        required>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password Baru *</label>
                                    <input type="password" class="form-control" name="pass"
                                        placeholder="Password baru">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Konfirmasi Password Baru *</label>
                                    <input type="password" class="form-control" name="kpass"
                                        placeholder="Konfirmasi Password Baru">
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php } ?>



    <?php include 'base_f.php';?>

</body>

</html>