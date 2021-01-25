<?php
include("../../config/database.php");
session_start();
if(!isset($_SESSION["username"])){
  header("location: ../login.php");
  exit;
}
$result = mysqli_query($db, "SELECT kode_kitab FROM kitab ORDER BY kode_kitab");
$count = mysqli_num_rows($result);
$kode = '';
if($count > 0){
  $result = mysqli_query($db, "SELECT kode_kitab FROM kitab ORDER BY kode_kitab DESC LIMIT 1");
  $data = mysqli_fetch_array($result);
  $lastIncrement = substr($data['kode_kitab'],2);
  $kode = 'K-'.str_pad($lastIncrement + 1, 3, 0, STR_PAD_LEFT);
}
else{
  $kode = 'K-001';
}
$kategori = mysqli_query($db, "SELECT id,kategori FROM kategori_kitab ORDER BY kategori ASC");
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
            <h1 class="h3 mb-0 text-gray-800">Tambah Kitab</h1>
            <a href="kitab.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-table fa-sm text-white-50"></i> Lihat</a>
          </div>

          <!-- Content Row -->
          <div class="row">
            <div class="col-lg-12">
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Tambah Kitab</h6>
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
                  <form action="insert-kitab.php" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="kode" class="form-control" value="<?php echo $kode ?>">
                    <div class="row">
                      <div class="col-6">
                        <div class="form-group">
                          <label for="kode">Kode Kitab</label><span style="color:red;">*</span>
                          <input type="text" id="kode" class="form-control" placeholder="ex: K-001" value="<?php echo $kode ?>" disabled>
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="form-group">
                          <label for="judul">Judul</label><span style="color:red;">*</span>
                          <input type="text" name="judul" id="judul" class="form-control" placeholder="ex: Aqidah Thahawiyah">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-6">
                        <div class="form-group">
                          <label for="penulis">Penulis</label><span style="color:red;">*</span>
                          <input type="text" name="penulis" id="penulis" class="form-control" placeholder="ex: Oong">
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="form-group">
                          <label for="penerbit">Penerbit</label><span style="color:red;">*</span>
                          <input type="text" name="penerbit" id="penerbit" class="form-control" placeholder="ex: Darul Hijrah">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-6">
                        <div class="form-group">
                          <label for="deskripsi">Deskripsi</label><span style="color:red;">*</span>
                          <textarea name="deskripsi" id="deskripsi" class="form-control" cols="30" rows="5"></textarea>
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="form-group">
                          <label for="cover">Cover</label><span style="color:red;">*</span>
                          <br>
                          <input type="file" name="cover" id="cover">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-6">
                        <div class="form-group">
                          <label for="kategori">Kategori</label><span style="color:red;">*</span>
                          <select name="kategori" id="kategori" class="form-control">
                          <option value="">Pilih Kategori</option>
                          <?php while($item = mysqli_fetch_array($kategori)){ ?>
                            <option value="<?php echo $item['id']; ?>"><?php echo $item['kategori']; ?></option>
                          <?php } ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="form-group">
                          <label for="tahun">Tahun</label><span style="color:red;">*</span>
                          <input type="number" name="tahun" id="tahun" class="form-control" placeholder="ex: 2020">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-6">
                        <div class="form-group">
                          <label for="stok">Stok</label><span style="color:red;">*</span>
                          <input type="number" name="stok" id="stok" class="form-control" placeholder="ex: 2020">
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="form-group">
                          <label for="harga">Harga(Rp.)</label><span style="color:red;">*</span>
                          <input type="text" name="harga" id="harga" class="form-control" placeholder="ex: 20.000">
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