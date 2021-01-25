<?php
include("../../config/database.php");
session_start();
if(!isset($_SESSION["username"])){
  header("location: ../login.php");
  exit;
}
$result = mysqli_query($db, "SELECT kode_kitab,judul,cover,stok,harga FROM kitab ORDER BY updated_at DESC");
?>
<!DOCTYPE html>
<html lang="en">

  <?php include"../partials/header.php"; ?>
  <link href="../../assets/back/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
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
            <h1 class="h3 mb-0 text-gray-800">Kitab</h1>
            <a href="kitab-tambah.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah</a>
          </div>

          <!-- Content Row -->
          <div class="row">
            <div class="col-lg-12">
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Kitab</h6>
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
                          <th class="text-center">Kode Kitab</th>
                          <th class="text-center">Kitab</th>
                          <th class="text-center">Stok</th>
                          <th class="text-center">Harga</th>
                          <th class="text-center">Opsi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no=0; while($data = mysqli_fetch_array($result)){ $no++; ?>
                        <tr>
                          <td class="text-center"><?php echo $no; ?></td>
                          <td class="text-center"><?php echo $data['kode_kitab']; ?></td>
                          <td class="text-center">
                            <img src="../../uploaded_files/kitab/<?php echo $data['cover']; ?>" width="120px" height="150px">
                            <br>
                            <label for=""><?php echo $data['judul']; ?></label>
                          </td>
                          <td class="text-center"><?php echo $data['stok']; ?></td>
                          <td class="text-right">Rp.<?php echo number_format($data['harga'],2); ?></td>
                          <td class="text-center">
                              <button class="btn btn-primary showDetail" data-toggle="modal" data-target="#detailKitab" data-url="detail-kitab.php?k=<?php echo $data['kode_kitab']; ?>" >Detail</button>
                              <a href="edit-kitab.php?k=<?php echo $data['kode_kitab']; ?>" class="btn btn-success">Edit</a>
                              <a href="hapus-kitab.php?k=<?php echo $data['kode_kitab']; ?>" class="btn btn-danger">Hapus</a>
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

      <!-- Detail Modal -->
      <div class="modal" id="detailKitab">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
      
            <div class="modal-header">
              <h4 class="modal-title">Detail Kitab</h4>
            </div>
      
            <div class="modal-body p-4">
              <div class="row">
                <div class="col-2">
                  <img id="cover" src="" width="130px" height="150px">
                </div>
                <div class="col-8 ml-4">
                  <div class="row">
                    <div class="col-sm-4">
                      Kode Kitab
                    </div>
                    <div class="col-sm-2">
                      :
                    </div>
                    <div class="col-sm-6">
                      <label id="kode_kitab"></label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-4">
                      Judul
                    </div>
                    <div class="col-sm-2">
                      : 
                    </div>
                    <div class="col-sm-6">
                      <p id="judul"></p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-4">
                      Kategori
                    </div>
                    <div class="col-sm-2">
                      : 
                    </div>
                    <div class="col-sm-6">
                      <label id="kategori"></label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-4">
                      Deskripsi
                    </div>
                    <div class="col-sm-2">
                      : 
                    </div>
                    <div class="col-lg-6">
                      <label id="deskripsi"></label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-4">
                      Penulis
                    </div>
                    <div class="col-sm-2">
                      : 
                    </div>
                    <div class="col-sm-6">
                      <label id="penulis"></label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-4">
                      Penerbit
                    </div>
                    <div class="col-sm-2">
                      : 
                    </div>
                    <div class="col-sm-6">
                      <label id="penerbit"></label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-4">
                      Tahun
                    </div>
                    <div class="col-sm-2">
                      : 
                    </div>
                    <div class="col-sm-6">
                      <label id="tahun"></label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-4">
                      Stok
                    </div>
                    <div class="col-sm-2">
                      : 
                    </div>
                    <div class="col-sm-6">
                      <label id="stok"></label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-4">
                      Harga
                    </div>
                    <div class="col-sm-2">
                      : 
                    </div>
                    <div class="col-sm-6">
                      <label id="harga"></label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
      
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

          </div>
        </div>
      </div>
      <!-- End of Detail Modal -->

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
  <script src="../../assets/back/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../../assets/back/vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <script>
  $(document).ready(function() {
    $('#dataTable').DataTable();
  });
  $(document).ready(function (){
    $('.showDetail').click(function () {
      let url = $(this).attr('data-url')
      $.ajax({
        type: "get",
        url: url,
        dataType: "json",
        success: function (response) {
          $('#cover').attr("src",'../../uploaded_files/kitab/'+response.cover)
          $('#kode_kitab').html(response.kode_kitab)
          $('#judul').html(response.judul)
          $('#kategori').html(response.kategori)
          $('#deskripsi').html(response.deskripsi)
          $('#penerbit').html(response.penerbit)
          $('#penulis').html(response.penulis)
          $('#tahun').html(response.tahun)
          $('#stok').html(response.stok)
          $('#harga').html("Rp. "+parseInt(response.harga).toLocaleString())
        }
      });
    });
  })
  </script>
</body>

</html>