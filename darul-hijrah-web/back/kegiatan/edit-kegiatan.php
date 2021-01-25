<?php
include '../../config/database.php';
session_start();
if(!isset($_SESSION["username"])){
  header("location: ../login.php");
  exit;
}
$id = $_GET['id'];
$data = mysqli_query($db, "SELECT id,judul,cover,deskripsi FROM kegiatan WHERE id='$id'");
$data = mysqli_fetch_array($data);
?>
<!DOCTYPE html>
<html lang="en">

<?php include"../partials/header.php"; ?>
<script src="https://cdn.ckeditor.com/4.12.1/standard-all/ckeditor.js"></script>
<script src="../../assets/ckfinder/ckfinder.js"></script>
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
            <h1 class="h3 mb-0 text-gray-800">Edit Kategori Kitab</h1>
            <a href="kegiatan.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-table fa-sm text-white-50"></i> Lihat</a>
          </div>

          <!-- Content Row -->
          <div class="row">
            <div class="col-lg-12">
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Edit Kategori Kitab</h6>
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
                  <form action="update-kegiatan.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $data['id'] ?>">
                    <div class="form-group">
                      <label for="judul">Judul</label><span style="color:red;">*</span>
                      <input type="text" name="judul" id="judul" class="form-control" placeholder="ex: Mengaji bersama" value="<?php echo $data['judul'] ?>">
                    </div>
                    <div class="form-group">
                      <label for="deskripsi">Deskripsi</label>
                      <textarea name="deskripsi" id="deskripsi">
                        <?php echo $data['deskripsi'] ?>
                      </textarea>
                      <script type="text/javascript">
                        var editor = CKEDITOR.replace('deskripsi');
                        CKFinder.setupCKEditor(editor);
                      </script>
                    </div>
                    <div class="form-group">
                      <label for="cover">Cover</label><span style="color:red;">*</span><br>
                      <input type="file" name="cover" id="cover"><br><br>
                      <img src="../../uploaded_files/<?php echo $data['cover']; ?>" width="130px" height="150px">
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
  <script src="/darul-hijrah-web/assets/ckeditor_4.15.1_full/build/ckeditor.js"></script>
  <script>ClassicEditor
			.create( document.querySelector( '.editor' ), {
				
				toolbar: {
					items: [
						'heading',
						'|',
						'bold',
						'italic',
						'link',
						'bulletedList',
						'numberedList',
						'|',
						'indent',
						'outdent',
						'|',
						'imageUpload',
						'blockQuote',
						'undo',
						'redo',
						'mediaEmbed'
					]
				},
				language: 'id',
				image: {
					toolbar: [
						'imageTextAlternative',
						'imageStyle:full',
						'imageStyle:side'
					]
				},
				licenseKey: '',
				
			} )
			.then( editor => {
				window.editor = editor;
		
				
				
				
			} )
			.catch( error => {
				console.error( 'Oops, something gone wrong!' );
				console.error( 'Please, report the following error in the https://github.com/ckeditor/ckeditor5 with the build id and the error stack trace:' );
				console.warn( 'Build id: o2qpzlyc8398-vbug5tlkyq9p' );
				console.error( error );
			} );
  </script>
</body>

</html>