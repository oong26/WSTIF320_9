<?php
include("../../config/database.php");
session_start();
if(!isset($_SESSION["username"])){
  header("location: ../login.php");
  exit;
}
$result = mysqli_query($db, "SELECT * FROM banner ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="en">

  <?php include"../partials/header.php"; ?>
  <link href="/darul-hijrah-web/assets/back/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
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
            <h1 class="h3 mb-0 text-gray-800">Banner</h1>
            <a href="/darul-hijrah-web/back/banner/banner-tambah.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah</a>
          </div>

          <!-- Content Row -->
          <div class="row">
            <div class="col-lg-12">
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Banner</h6>
                </div>
                <div class="card-body">
                <?php
                    if(isset($_GET['pesan'])){
                      $pesan = $_GET['pesan'];
                      if($pesan !== "gagal"){
                        ?>
                        <div class="alert alert-success">
                          <strong>Berhasil!</strong> <?php echo $pesan ?>
                        </div>
                        <?php
                      }
                    }
                  ?>
                  <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th class="text-center">#</th>
                          <th class="text-center">Caption</th>
                          <th class="text-center">Banner</th>
                          <th class="text-center">Opsi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no=0; while($data = mysqli_fetch_array($result)){ $no++; ?>
                        <tr>
                          <td class="text-center"><?php echo $no; ?></td>
                          <td class="text-center">
                          <?php if($data['caption'] != null){echo $data['caption'];}else{ ?>
                          -
                          <?php } ?>
                          </td>
                          <td class="text-center">
                            <img src="../../uploaded_files/banner/<?php echo $data['img']; ?>" width="100px" height="100px">
                          </td>
                          <td class="text-center">
                            <a href="edit-banner.php?id=<?php echo$data['id']; ?>">Edit</a> | <a href="hapus-banner.php?id=<?php echo$data['id']; ?>">Hapus</a>
                          </td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
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
  <script src="/darul-hijrah-web/assets/back/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="/darul-hijrah-web/assets/back/vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <script>
  $(document).ready(function() {
    $('#dataTable').DataTable();
  });
  </script>
</body>

</html>