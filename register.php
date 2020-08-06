<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Register Page</title>
    <!-- Custom fonts for this template-->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.css" rel="stylesheet">
</head>

<body class="bg-gradient-primary">
    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form class="user" method="post" action="php/aksi_register_frontend.php">
                                <div class="form-group">
                                    <label for="email">Nama</label>
                                    <input type="text" class="form-control form-control-user" name="nama" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Alamat</label>
                                    <input type="text" class="form-control form-control-user" name="alamat" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">No. Telpon</label>
                                    <input type="number" min="0" class="form-control form-control-user" name="telp"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Username</label>
                                    <input type="text" class="form-control form-control-user" name="username" required>
                                </div>
                                <input type="hidden" name="status" value="Aktif">

                                <div class="form-group">
                                    <label for="email">Password</label>
                                    <input type="password" class="form-control form-control-user" name="password" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Konfirmasi Password</label>
                                    <input type="password" class="form-control form-control-user" name="kpassword" required>
                                </div>
                                
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Register Account
                                </button>
                                <a href="index.php" class="btn btn-danger btn-user btn-block">
                                    Back to home
                                </a>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="login.php">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="assets/js/sb-admin-2.min.js"></script>
    
</body>

</html>