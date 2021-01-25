<?php
  include 'config/database.php';
  $slug = substr($_SERVER["REQUEST_URI"],strrpos($_SERVER["REQUEST_URI"],"/")+1);
  $result = mysqli_query($db, "SELECT judul,order_kontak FROM web_profile");
  $web = mysqli_fetch_array($result);
  $query = mysqli_query($db, "SELECT k.*,kk.kategori FROM kitab AS k INNER JOIN kategori_kitab AS kk ON k.id_kategori = kk.id WHERE slug='$slug'");
  $page='kitab';
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
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

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
  <?php include"partials/nav.php"; ?>
  <!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2><?php echo $web['judul']; ?></h2>
          <ol>
            <li><a href="{{url('/">Beranda</a></li>
            <li><?php echo $web['judul']; ?></li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->
    
    <!-- ======= Detail Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
      <?php while($data = mysqli_fetch_array($query)){ ?>
        <div class="container">
  
          <div class="portfolio-details-container">
        
            <div class="row">
              <div class="col-md-4 mb-4">
                <img class="ml-4 mt-3" src="../uploaded_files/kitab/<?php echo $data['cover'] ?>" width="170px" height="220px">
              </div>
              <div class="col-md-8">
                <div class="card">
                  <div class="card-header">
                    <h3>Rincian Kitab</h3>
                  </div>
                  <div class="card-body">
                    <ul style="list-style-type:none;">
                      <li><strong>Kode Kitab</strong>: <?php echo $data['kode_kitab'];?></li>
                      <li><strong>Judul</strong>: <?php echo $data['judul'];?></li>
                      <li><strong>Kategori</strong>: <?php echo $data['kategori'];?></li>
                      <li><strong>Penulis</strong>: <?php echo $data['penulis'];?></li>
                      <li><strong>Penerbit</strong>: <?php echo $data['penerbit'];?></li>
                      <li><strong>Tahun</strong>: <?php echo $data['tahun'];?></li>
                      <li><strong>Stok</strong>: <?php echo $data['stok'];?></li>
                      <li><strong>Harga</strong>: <?php echo $data['harga'];?></li>
                      <li><strong>Diupload</strong>: <?php $d = explode(" ", $data['updated_at']); echo $d[0];?></li>
                    </ul>
                    <a target="_blank" href="https://api.whatsapp.com/send/?phone=<?php echo $web['order_kontak'] ?>&text=<?php echo $data['kode_kitab'] ?>"><button class="btn btn-success">Order Via Whatsapp</button></a>
                  </div>
                </div>
              </div>
            </div>
  
            
  
          </div>
  
          <div class="portfolio-description">
            <!-- <h2>Deskripsi</h2> -->
            <p>
              <?php echo $data['deskripsi']; ?>
            </p>
          </div>
  
        </div>
      <?php } ?>
    </section>
    <!-- End Detail Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php include"partials/footer.php"; ?>
  <!-- End Footer -->

</body>

</html>