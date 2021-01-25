<?php
include 'config/database.php';
$result = mysqli_query($db, "SELECT judul,deskripsi,kontak,order_kontak,alamat FROM web_profile");
while($data = mysqli_fetch_array($result)){
?>
<footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-5 col-md-6 text-center">
            <div class="footer-info">
              <h3><?php echo $data['judul']; ?></h3>
              <p>
                <?php echo $data['deskripsi']; ?><br><br>
              </p>
            </div>
          </div>

          <div class="col-lg-5 col-md-6 text-center">
            <div class="footer-info">
              <h3>Alamat</h3>
              <p>
                <?php echo $data['alamat']; ?><br>
                <strong>Kontak:</strong> <?php echo $data['kontak']; ?><br>
                <strong>Order Kontak:</strong> <?php echo $data['order_kontak']; ?><br>
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
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/jquery-sticky/jquery.sticky.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
<?php }?>