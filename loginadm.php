<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login Page</title>
    <!-- Custom fonts for this template-->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">
  </head>
  <body class="bg-gradient-primary">
    <div class="container">
      <!-- Outer Row -->
      <div class="row justify-content-center">
        <div class="col-xl-6 col-lg-6 col-md-6">
          <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
              <!-- Nested Row within Card Body -->
              <div class="row">
                <div class="col-lg-12">
                  <div class="p-5">
                    <div class="text-center">
                      <h1 class="h4 text-gray-900 mb-4">Login Admin & Karyawan</h1>
                    </div>
                    <form class="user" method="post" action="php/aksi_login.php">
                      <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Masukan Username" name="username" autocomplete="new-username" required autofocus>
                      </div>
                      <div class="form-group">
                        <input type="password" class="form-control form-control-user" name="password" id="exampleInputPassword" placeholder="Password" autocomplete="new-password" required autofocus>
                      </div>
                      <div class="form-group">
                        <div class="custom-control custom-checkbox small">
                          <input type="checkbox" class="custom-control-input" id="customCheck" onclick="tampilsandi()">
                          <label class="custom-control-label" for="customCheck">Lihat Password</label>
                          
                        </div>
                      </div>
                      <button type="submit" class="btn btn-primary btn-user btn-block">
                      Login
                      </button>
                      <a href="index.php" class="btn btn-danger btn-user btn-block">
                      Home
                      </a>
                    </form>
                    <hr>
                    <div class="text-center">
                      <a class="small" href="#" data-toggle="modal" data-target="#exampleModalLong">Lupa Password?</a><br>
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Lupa Password ?</h5>
              
            </div>
            <div class="modal-body text-center">
              <img src="assets/img/programmer.jpg" width="75%">
              <h3 class="text-danger">Segera Hubungi Developer</h3>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
    <script>
    function tampilsandi() {
    var x = document.getElementById("exampleInputPassword");
    if (x.type === "password") {
    x.type = "text";
    }else{
    x.type = "password";
    }
    }
    </script>
  </body>
</html>