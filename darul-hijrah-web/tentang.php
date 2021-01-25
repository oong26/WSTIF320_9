<?php 
  include"partials/header.php";
  include "./config/database.php";
  $page='tentang';
  $result = mysqli_query($db, "SELECT judul,deskripsi,sejarah,kontak,visi,misi FROM web_profile");
  while($results = mysqli_fetch_array($result)){
?>
<body>

  <!-- ======= Header ======= -->
  <?php include"partials/nav.php" ?>
  <!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Tentang</h2>
          <ol>
            <li><a href="/darul-hijrah-web">Beranda</a></li>
            <li>Tentang</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

      <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

      <div class="row content">
          <div class="col-lg-6">
            <h2>Visi</h2>
            <h3>Visi pondok pesantren Darul Hijrah</h3>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0">
            <p>
              <?php echo $results['visi']; ?>
            </p>
          </div>
        </div>
        <br><br>
        <div class="row content">
          <div class="col-lg-6">
            <h2>Misi</h2>
            <h3>Misi pondok pesantren Darul Hijrah</h3>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0">
            <p>
            <?php echo $results['misi']; ?>
            </p>
          </div>
        </div>
        <br>
        <div class="row content">
          <div class="col-lg-6">
            <h2>Sejarah</h2>
            <h3>Sejarah pondok pesantren Darul Hijrah</h3>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0">
            <p>
              <?php echo $results['sejarah']; ?>

            </p>
          </div>
        </div>
        <br><br>
        <div class="row content">
          <div class="col-lg-6">
            <h2>Profil</h2>
            <h3>Profil pondok pesantren Darul Hijrah</h3>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0">
            <p>
            <?php echo $results['deskripsi']; ?>
            </p>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php include"partials/footer.php" ?>
  <!-- End Footer -->

</body>
<?php } ?>

</html>