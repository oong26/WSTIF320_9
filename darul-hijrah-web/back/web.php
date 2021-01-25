<?php
include("../config/database.php");
session_start();
if(!isset($_SESSION["username"])){
  header("location: login.php");
  exit;
}
$data = mysqli_query($db, "SELECT id,judul,logo,deskripsi,sejarah,kontak,order_kontak,visi,misi,alamat FROM web_profile ORDER BY id DESC LIMIT 1");
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
            <h1 class="h3 mb-0 text-gray-800">Web</h1>
          </div>

          <!-- Content Row -->
          <div class="row">
            <div class="col-lg-12">
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Web Profile</h6>
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
                  <form action="update-web.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                    <div class="row">
                      <div class="col-6">
                        <div class="form-group">
                          <label for="judul">Judul WEB</label><span style="color:red;">*</span>
                          <input type="text" name="judul" id="judul" class="form-control" placeholder="ex: Darul Hijrah" value="<?php echo $data['judul']; ?>">
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="form-group">
                          <label for="logo">Logo</label>
                          <span style="color:red;">
                          *
                            <?php
                              if(isset($_GET['pesan'])){
                                $pesan = $_GET['pesan'];
                                if($pesan == 'filetoolarge'){?>
                                File terlalu besar. Maksimal file hanya 3MB.
                                <?php
                                }
                              }
                            ?>
                          </span>
                          <div class="row">
                            <div class="col-8">
                              <input type="file" name="logo" id="logo">
                            </div>
                            <?php
                              if($data['logo'] != null){
                            ?>
                            <div class="col-2">
                              <img src="../uploaded_files/<?php echo $data['logo']; ?>" alt="" width="100px" height="100px">
                            </div>
                            <?php } ?>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-6">
                        <div class="form-group">
                          <label for="deskripsi">Deskripsi</label><span style="color:red;">*</span>
                          <textarea name="deskripsi" id="deskripsi" class="form-control" cols="30" rows="5"><?php echo $data['deskripsi']; ?></textarea>
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="form-group">
                          <label for="sejarah">Sejarah</label><span style="color:red;">*</span>
                          <textarea name="sejarah" id="sejarah" class="form-control" cols="30" rows="5"><?php echo $data['sejarah']; ?></textarea>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-6">
                        <div class="form-group">
                          <label for="visi">Visi</label><span style="color:red;">*</span>
                          <textarea name="visi" id="visi" class="form-control" cols="30" rows="5"><?php echo $data['visi']; ?></textarea>
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="form-group">
                          <label for="misi">Misi</label><span style="color:red;">*</span>
                          <textarea name="misi" id="misi" class="form-control" cols="30" rows="5"><?php echo $data['misi']; ?></textarea>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="alamat">Alamat</label><span style="color:red;">*</span>
                      <textarea name="alamat" id="alamat" class="form-control" cols="30" rows="5"><?php echo $data['alamat']; ?></textarea>
                    </div>
                    <div class="row">
                      <div class="col-6">
                        <div class="form-group">
                          <label for="kontak">Kontak</label><span style="color:red;">*</span>
                          <input type="text" name="kontak" id="kontak" class="form-control" placeholder="ex: 085xxxxxxxxx" value="<?php echo $data['kontak']; ?>">
                      </div>
                      </div>
                      <div class="col-6">
                        <div class="form-group">
                        <label for="order_kontak">Order Kontak</label><span style="color:red;">*</span>
                          <input type="text" name="order_kontak" id="order_kontak" class="form-control" placeholder="ex: 085xxxxxxxxx" value="<?php echo $data['order_kontak']; ?>">
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