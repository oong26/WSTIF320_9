<?php
include("../config/database.php");
session_start();
if(!isset($_SESSION["username"])){
  header("location: ../login.php");
  exit;
}
$data = mysqli_query($db, "SELECT id,laboratorium,musholla,asrama,pengajar FROM web_profile ORDER BY id DESC LIMIT 1");
$data = mysqli_fetch_array($data);
$page = 'root';
?>
<!DOCTYPE html>
<html lang="en">

<?php include"partials/header.php"; ?>
</head>
<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php include"partials/sidebar.php"; ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php include"partials/top-bar.php"; ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Fasilitas</h1>
          </div>

          <!-- Content Row -->
          <div class="row">
            <div class="col-lg-12">
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Fasilitas</h6>
                </div>
                <div class="card-body">
                <?php
                    if(isset($_GET['pesan'])){
                      $pesan = $_GET['pesan'];
                      if($pesan == "berhasil"){
                        ?>
                        <div class="alert alert-success">
                          <strong>Berhasil!</strong> Data berhasil diperbarui.
                        </div>
                        <?php
                      }
                      if($pesan == "gagal"){
                        ?>
                        <div class="alert alert-danger">
                          <strong>Gagal!</strong> Terjadi kesalahan.
                        </div>
                        <?php
                      }
                    }
                  ?>
                  <form action="update-fasilitas.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                    <div class="row">
                      <div class="col-6">
                        <div class="form-group">
                          <label for="lab">Laboratorium</label><span style="color:red;">*</span>
                          <input type="number" name="lab" id="lab" class="form-control" placeholder="ex: 100" value="<?php echo $data['laboratorium']; ?>">
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="form-group">
                          <div class="form-group">
                            <label for="musholla">Musholla</label><span style="color:red;">*</span>
                            <input type="number" name="musholla" id="musholla" class="form-control" placeholder="ex: 100" value="<?php echo $data['musholla']; ?>">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-6">
                        <div class="form-group">
                          <label for="asrama">Asrama</label><span style="color:red;">*</span>
                          <input type="number" name="asrama" id="asrama" class="form-control" placeholder="ex: 100" value="<?php echo $data['asrama']; ?>">
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="form-group">
                          <div class="form-group">
                            <label for="pengajar">Pengajar</label><span style="color:red;">*</span>
                            <input type="number" name="pengajar" id="pengajar" class="form-control" placeholder="ex: 150" value="<?php echo $data['pengajar']; ?>">
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
  <?php include"partials/logout-modal.php"; ?>

  <!-- assets -->
  <?php include"partials/footer.php"; ?>
</body>

</html>