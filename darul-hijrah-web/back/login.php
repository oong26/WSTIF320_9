<?php
session_start();
if(isset($_SESSION["username"])){
  header("location: index.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Login</title>

  <!-- Custom fonts for this template-->
  <link href="../assets/back/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../assets/back/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">
  <!-- <p><?php echo "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; ?></p> -->
  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-8 col-lg-10 col-md-7 mt-5">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Silahkan Login</h1>
                  </div>
                  <?php
                    if(isset($_GET['pesan'])){
                      $pesan = $_GET['pesan'];
                      if($pesan == "gagal"){
                        ?>
                        <div class="alert alert-danger">
                          <strong>Gagal!</strong> Anda Gagal login. Akun tidak ditemukan.
                        </div>
                        <?php
                      }
                    }
                  ?>
                  <form class="user" action="login-process.php" method="post">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" name="username" id="exampleInputEmail" placeholder="Masukkan username...">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" name="password" id="exampleInputPassword" placeholder="Password">
                    </div>
                    <input type="submit" class="btn btn-primary btn-user btn-block" value="Login">
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="../assets/back/vendor/jquery/jquery.min.js"></script>
  <script src="../assets/back/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../assets/back/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../assets/back/js/sb-admin-2.min.js"></script>

</body>

</html>