<?php $page='kegiatan-detail';?>
<?php
include "./config/database.php";
$result = mysqli_query($db, "SELECT judul,deskripsi,kontak,order_kontak,alamat FROM web_profile");
$web = mysqli_fetch_array($result);
$url = explode('/', $_SERVER["PHP_SELF"]);
$slug = $url[3];
$kegiatan = mysqli_query($db, "SELECT * FROM kegiatan WHERE slug='$slug'");
$detail = mysqli_fetch_array($kegiatan);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?php echo $web['judul']; ?></title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="../assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">

  <!-- Fontawesome File -->
  <link href="../assets/css/font-awesome.min.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: MyBiz - v2.1.0
  * Template URL: https://bootstrapmade.com/mybiz-free-business-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>
<body>

  <!-- ======= Header ======= -->
  <?php include"partials/nav.php"?>
  <!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Kegiatan Detail</h2>
          <ol>
            <li><a href="/darul-hijrah-web">Beranda</a></li>
            <li>Kegiatan Detail</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Detail Section ======= -->
    <div class="row p-4">
      <div class="col-lg-1"></div>
      <div class="col-lg-7 py-4 mb-4">
          <div class="container">
              <h2><?= $detail['judul'] ?> - <label class="text-secondary"><?= substr($detail['updated_at'],0,10) ?></label></h2>
            <div class="portfolio-details-container mb-4">
              <div class="owl-carousel portfolio-details-carousel">
                <img src="../uploaded_files/<?= $detail['cover'] ?>" class="img-fluid" style="max-height:600px;">
              </div>
            </div>
            <div class="portfolio-description">
              <p><?= $detail['deskripsi'] ?></p>
            </div>
          </div>
      </div>
      <div class="col-lg-auto">
      </div>
      <div class="col-lg-3 py-4 ">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="mb-4">Kegiatan lain</h3>
            <section id="team" class="team" style="padding:0;">
            <?php
              $events = mysqli_query($db, "SELECT * FROM kegiatan WHERE slug NOT IN('$slug') ORDER BY updated_at DESC LIMIT 3");
              while($others = mysqli_fetch_array($events)){
            ?>
              <div class="container mb-4">
                <div class="member d-flex align-items-start">
                  <div class="member-info" style="padding:0;">
                    <img src="../uploaded_files/<?= $others['cover'] ?>" class="img-fluid mb-2" style="max-height:200px;">
                    <a href="/darul-hijrah-web/kegiatan-detail.php/<?=$others['slug']?>"><h4><?= $others['judul'] ?></h4></a>
                    <span><?= substr($others['updated_at'],0,10) ?></span>
                  </div>
                </div>
              </div>
              <?php } ?>
            </section>  
          </div>
        </div>
      </div>
    </div>
    <!-- End Detail Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
<footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-5 col-md-6 text-center">
            <div class="footer-info">
              <h3><?php echo $web['judul']; ?></h3>
              <p>
                <?php echo $web['deskripsi']; ?><br><br>
              </p>
            </div>
          </div>

          <div class="col-lg-5 col-md-6 text-center">
            <div class="footer-info">
              <h3>Alamat</h3>
              <p>
                <?php echo $web['alamat']; ?><br>
                <strong>Kontak:</strong> <?php echo $web['kontak']; ?><br>
                <strong>Order Kontak:</strong> <?php echo $web['order_kontak']; ?><br>
              </p>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Menu</h4>
            <ul>
              <li class=""><i class="bx bx-chevron-right"></i> <a href="/darul-hijrah-web">Beranda</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="/darul-hijrah-web/kegiatan.php">Kegiatan</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="/darul-hijrah-web/kelas.php">Kelas</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="/darul-hijrah-web/kitab.php">Kitab</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="/darul-hijrah-web/tentang.php">Tentang</a></li>
            </ul>
          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>MyBiz</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/mybiz-free-business-bootstrap-theme/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        <br>
        Customized by <a href="https://www.instagram.com/limadigital.id/">LimaDigital</a>
      </div>
    </div>
  </footer>

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/jquery/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>
  <script src="../assets/vendor/jquery-sticky/jquery.sticky.js"></script>
  <script src="../assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="../assets/vendor/counterup/counterup.min.js"></script>
  <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../assets/vendor/venobox/venobox.min.js"></script>
  <script src="../assets/vendor/owl.carousel/owl.carousel.min.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>
  <!-- End Footer -->

</body>

</html>