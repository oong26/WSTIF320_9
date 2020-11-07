<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Sistem Akademik - Cek Data</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

  <?php include "./sidebar.php" ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>



          </ul>

        </nav>
        <!-- End of Topbar -->
 <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Content Row -->
          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Data Mahasiswa</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="get">
                  <div class="form-group">
                      <label for="sel1">Pilih Mahasiswa:</label>
                      <select class="form-control" name="nim">
                          <?php
                          include "koneksi.php";
                          //Perintah sql untuk menampilkan semua data pada tabel mahasiswa
                          $sql="select nim,nama from mahasiswa";

                          $hasil=mysqli_query($host,$sql);
                          $no=0;
                          while ($data = mysqli_fetch_array($hasil)) {
                              $no++;

                              $ket="";
                              if (isset($_GET['nim'])) {
                                  $nim = trim($_GET['nim']);

                                  if ($nim==$data['nim'])
                                  {
                                      $ket="selected";
                                  }
                              }
                              ?>
                              <option <?php echo $ket; ?> value="<?php echo $data['nim'];?>"><?php echo $data['nim'];?> - <?php echo $data['nama'];?></option>
                              <?php
                          }
                          ?>
                      </select>
                  </div>
                  <div class="form-group">
                      <input type="submit" class="btn btn-info" value="Pilih">
                  </div>
              </form>
              <?php

              if (isset($_GET['nim'])) {
                  $nim=$_GET["nim"];

                  $sql="select * from mahasiswa where nim='$nim'";
                  $hasil= mysqli_query($host,$sql);
                  $data = mysqli_fetch_assoc($hasil);
              }
              ?>

                  <div class="form-group">
                      <label>nim:</label>
                      <input type="text" name="nim" value="<?php echo $data['nim']; ?>" class="form-control" required />
                  </div>
                  <div class="form-group">
                      <label>Nama:</label>
                      <input type="text" name="nama" value="<?php echo $data['nama']; ?>" class="form-control"  required/>
                  </div>
                  <div class="form-group">
                      <label>Tanggal Lahir:</label>
                      <input type="date" name="tgl_lahir" value="<?php echo $data['tgl_lahir']; ?>" class="form-control" required/>
                  </div>
                  <div class="form-group">
                      <label>Agama:</label>
                      <input type="text" name="agama" value="<?php echo $data['agama']; ?>" class="form-control"required/>
                  </div>
                </div>
              </div>
            </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
      </body>

</html>