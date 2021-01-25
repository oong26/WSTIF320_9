<?php
include 'config/database.php';
$query = mysqli_query($db, "SELECT nama,jumlah_santri FROM kelas ORDER BY nama ASC");
?>
<?php $page='kelas'; include"partials/header.php" ?>
<body>

  <!-- ======= Header ======= -->
  <?php include"partials/nav.php" ?>
  <!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Kelas</h2>
          <ol>
            <li><a href="/darul-hijrah-web">Beranda</a></li>
            <li>Kelas</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Events Section ======= -->
    <section id="events" class="team">
        <div class="container">  
            <div class="col-12 mb-4">
                <form method="get" action="kelas.php">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="search-addon">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </span>
                        </div>
                        <input type="search" name="s" class="form-control" placeholder="Cari info" aria-label="Cari" aria-labelledby="search-addon" value="" required>
                    </div>
                </form>
                <?php if (isset($_GET['s'])) {
                    $s = $_GET['s'];
                    $query = mysqli_query($db, "SELECT nama,jumlah_santri FROM kelas WHERE nama LIKE'%".$s."%'");?>
                    <?php if($query->num_rows > 0){?>
                    <h3 class="font-weight-light my-4">Hasil pencarian dari kata kunci <span class="font-weight-500"> '<?php echo $_GET['s'] ?>'. </span></h3>
                    <?php }else{?>
                    <h3 class="font-weight-light my-4">Hasil tidak ditemukan.</h3>
                    <?php } ?>
                <?php } ?>
            </div>
  
            <div class="row">
            <?php 
                while($data = mysqli_fetch_array($query)){
                $nama = explode(' ', $data['nama']);
            ?>
                <div class="col-lg-4 mb-4">
                    <div class="member d-flex align-items-start">
                        <div class="col-sm-4 mr-4">
                            <label style="font-size: 60pt;"><?php echo substr($nama[0],0,1).substr($nama[1],0,1); ?></label>
                        </div>
                        <div class="member-info">
                            <h4><?php echo $data['nama']; ?></h4>
                            <span><?php echo $data['jumlah_santri']; ?> Santri</span>
                        </div>
                    </div>
                </div>
            <?php } ?>
            </div>
    
        </div>
      </section><!-- End Events Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php include"partials/footer.php" ?>
  <!-- End Footer -->

</body>

</html>