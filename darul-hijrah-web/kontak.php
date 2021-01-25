<?php 
  include"partials/header.php";
  include "./config/database.php";
  $page='tentang';
  $result = mysqli_query($db, "SELECT kontak,order_kontak,alamat FROM web_profile");
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
          <h2>Kontak</h2>
          <ol>
            <li><a href="/darul-hijrah-web">Beranda</a></li>
            <li>Kontak</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

   <!-- ======= Kitab Section ======= -->
   <section id="contact" class="contact">
        <div class="container">
          <div class="section-title">
            <span>Informasi Kontak</span>
            <h2>Informasi Kontak</h2>
            <p>Kontak kami</p>
          </div>
        </div>
  
        <div class="row">
          <div class="col-lg-8">
            <iframe class="m-4" style="border:0; width: 100%; height: 450px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d64243.28070826192!2d113.49550690777761!3d-7.134344829043081!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb96bd898c48b0bcc!2sPondok%20pesantren%20DARUL%20HIJRAH!5e0!3m2!1sid!2sid!4v1604491055705!5m2!1sid!2sid" frameborder="0" allowfullscreen></iframe>
          </div>
          <div class="col-lg-3 ml-2 p-4">
            <h2>Alamat</h2>
            <i style="color:#01b1d7;" class="fa fa-map-marker m-2"></i><label for=""><?= $results['alamat'] ?></label><br><br>
            <h2>Kontak</h2>
            <i style="color:#01b1d7;" class="fa fa-phone m-2"></i><a href=""><?= $results['kontak'] ?></a><br><br>
            <h2>Order Kontak</h2>
            <i style="color:#01b1d7;" class="fa fa-phone m-2"></i><a href=""><?= $results['order_kontak'] ?></a><br>
          </div>
        </div>
  
    </section>
    <!-- End Kitab Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php include"partials/footer.php" ?>
  <!-- End Footer -->

</body>
<?php } ?>

</html>