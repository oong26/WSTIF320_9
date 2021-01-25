<?php
include '../../config/database.php';
session_start();
if(!isset($_SESSION["username"])){
  header("location: ../login.php");
  exit;
}
$id = $_GET['id'];
$data = mysqli_query($db, "SELECT id,nama,jumlah_santri FROM kelas WHERE id='$id'");
$data = mysqli_fetch_array($data);
?>
<!DOCTYPE html>
<html lang="en">

<?php include"../partials/header.php"; ?>
</head>
<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php include"../partials/sidebar.php"; ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php include"../partials/top-bar.php"; ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Kelas</h1>
            <a href="kelas.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-table fa-sm text-white-50"></i> Lihat</a>
          </div>

          <!-- Content Row -->
          <div class="row">
            <div class="col-lg-12">
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Edit Kelas</h6>
                </div>
                <div class="card-body">
                <?php
                    if(isset($_GET['pesan'])){
                      $pesan = $_GET['pesan'];
                      if($pesan == "gagal"){
                        ?>
                        <div class="alert alert-danger">
                          <strong>Gagal!</strong> Terjadi kesalahan.
                        </div>
                        <?php
                      }
                    }
                  ?>
                  <form action="update-kelas.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                    <div class="row">
                      <div class="col-6">
                        <div class="form-group">
                          <label for="nama">Nama Kelas</label><span style="color:red;">*</span>
                          <input type="text" name="nama" id="nama" class="form-control" placeholder="ex: Kelas XXX" value="<?php echo $data['nama']; ?>">
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="form-group">
                          <div class="form-group">
                            <label for="jumlah_santri">Jumlah Santri</label><span style="color:red;">*</span>
                            <input type="number" name="jumlah_santri" id="jumlah_santri" class="form-control" placeholder="ex: 100" value="<?php echo $data['jumlah_santri']; ?>">
                          </div>
                        </div>
                      </div>
                    </div>
                    <button type="reset" class="btn btn-danger">Reset</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </form>
                </div>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2020.</span>
            <span>Customized by &copy; <a href="https://www.instagram.com/limadigital.id/">LimaDigital</a> 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <?php include"../partials/logout-modal.php"; ?>

  <!-- assets -->
  <?php include"../partials/footer.php"; ?>
</body>

</html>