<?php include"partials/header.php" ?>
<body>

  <!-- ======= Header ======= -->
  <?php include"partials/nav.php" ?>
  <!-- End Header -->
  <?php
      // Create database connection using config file
      include "./config/database.php";

      $ruang_kelas = mysqli_query($db, "SELECT COUNT(id) AS jumlah_kelas,SUM(jumlah_santri) AS santri FROM kelas");
      $kelass = mysqli_query($db, "SELECT nama,jumlah_santri FROM kelas ORDER BY id DESC LIMIT 4");
      $events = mysqli_query($db, "SELECT judul,cover,deskripsi,slug,updated_at FROM kegiatan ORDER BY updated_at DESC LIMIT 4");
      $kategori_kitab = mysqli_query($db, "SELECT * FROM kategori_kitab JOIN kitab ON kategori_kitab.id = kitab.id_kategori GROUP BY kitab.id_kategori");
      $kitab = mysqli_query($db, "SELECT k.judul,k.cover,k.slug,kk.kategori FROM kitab AS k INNER JOIN kategori_kitab AS kk ON k.id_kategori = kk.id ORDER BY kk.kategori ASC LIMIT 9");
      $result = mysqli_query($db, "SELECT judul,logo,deskripsi,sejarah,kontak,laboratorium,musholla,asrama,pengajar,visi,misi FROM web_profile");
      while($data = mysqli_fetch_array($result)){
  ?>
  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
      <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">

        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

        <?php
          $banner = mysqli_query($db, "SELECT id,img FROM banner ORDER BY id ASC");
          $index = 0;
          while($carousel = mysqli_fetch_array($banner)){
        ?>
        <img src="uploaded_files/banner/<?php echo $carousel['img']; ?>" class="carousel-item <?php echo($index === 0)? "active":""; ?>">

          <?php $index++; } ?>

        </div>

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon ri-arrow-left-line" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>

        <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon ri-arrow-right-line" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>

      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">
    
    <!-- ======= Fasilitas Section ======= -->
    <section id="fasilitas" class="counts">
      <div class="container">

        <div class="text-center title">
          <h3>Apa yang kami memiliki?</h3>
          <p>Fasilitas yang kami sediakan di Pondok Pesantren Darul Hijrah.</p>
        </div>

        <div class="row counters">
          <?php while($kelas = mysqli_fetch_array($ruang_kelas)){ ?>
          <div class="col-lg-4 col-6 text-center">
            <span data-toggle="counter-up"><?php echo $kelas['jumlah_kelas']; ?></span>
            <p>Ruang Kelas</p>
          </div>

          <div class="col-lg-4 col-6 text-center">
            <span data-toggle="counter-up"><?php echo $kelas['santri'];?></span>
            <p>Santri</p>
          </div>
          <?php }?>

          <div class="col-lg-4 col-6 text-center">
            <span data-toggle="counter-up"><?php echo $data['laboratorium'];?></span>
            <p>Laboratorium</p>
          </div>

          <div class="col-lg-4 col-6 text-center">
            <span data-toggle="counter-up"><?php echo $data['musholla'];?></span>
            <p>Musholla</p>
          </div>

          <div class="col-lg-4 col-6 text-center">
            <span data-toggle="counter-up"><?php echo $data['pengajar'];?></span>
            <p>Pengajar</p>
          </div>

          <div class="col-lg-4 col-6 text-center">
            <span data-toggle="counter-up"><?php echo $data['asrama'];?></span>
            <p>Asrama</p>
          </div>

        </div>

      </div>
    </section><!-- End Fasilitas Section -->

    <!-- ======= Services Section ======= -->
    <section id="kelas" class="services section-bg">
      <div class="container">

        <div class="section-title">
          <span>Kelas</span>
          <h2>Kelas</h2>
          <p>Kelas-kelas di Pondok Pesantren Darul Hijrah</p>
        </div>
        <div class="row">
        <?php while($class = mysqli_fetch_array($kelass)){ ?>
          <div class="col-md-6">
            <div class="icon-box">
              <i class="icofont-ui-home"></i>
              <h4><a href="#"><?php echo $class['nama']; ?></a></h4>
              <p>Jumlah Santri = <?php echo $class['jumlah_santri']; ?></p>
            </div>
          </div>
        <?php } ?>
        </div>
      </div>
    </section><!-- End Services Section -->

    <!-- ======= Kitab Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container">

        <div class="section-title">
          <span>Kitab</span>
          <h2>Kitab</h2>
          <p>Kitab-kitab yang kami sediakan</p>
        </div>

        <div class="row">
          <div class="col-lg-12">
            <ul id="portfolio-flters">
            <li data-filter="*" class="filter-active">Semua</li>
            <?php while($kategori = mysqli_fetch_array($kategori_kitab)){ ?>
              <li data-filter=".<?php echo preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower($kategori['kategori'])) ?>"><?php echo $kategori['kategori']; ?></li>
            <?php } ?>
            </ul>
          </div>
        </div>

        <div class="row portfolio-container">
        <?php while($kitabs = mysqli_fetch_array($kitab)){ ?>
          <div class="col-lg-4 col-md-6 portfolio-item <?php echo preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower($kitabs['kategori'])) ?>">
            <div class="portfolio-wrap p-2">
              <div class="text-center">
                <img src="uploaded_files/kitab/<?php echo $kitabs['cover']; ?>" class="img-fluid" style="height:250px !important;"></div>
                <div class="portfolio-info">
                  <h4><?php echo $kitabs['judul']; ?></h4>
                  <p><?php echo $kitabs['kategori']; ?></p>
                  <div class="portfolio-links">
                    <a href="uploaded_files/kitab/<?php echo $kitabs['cover']; ?>" data-gall="portfolioGallery" class="venobox" title="App 1"><i class="ri-add-fill"></i></a>
                    <a href="kitab-detail.php/<?php echo $kitabs['slug']; ?>" title="More Details"><i class="ri-links-fill"></i></a>
                  </div>
                </div>
            </div>
          </div>
          <?php } ?>
        </div>

      </div>
    </section>
    <!-- End Kitab Section -->

    <!-- ======= Events Section ======= -->
    <section id="events" class="team">
      <div class="container">

        <div class="section-title">
          <span>Kegiatan</span>
          <h2>Kegiatan</h2>
          <p>Kegiatan di Pondok Pesantren Darul Hijrah</p>
        </div>

        <div class="row">
          <?php while($kegiatan = mysqli_fetch_array($events)){ ?>
          <div class="col-lg-6 mb-2">
            <div class="member d-flex align-items-start">
              <div class="pic"><img src="uploaded_files/<?php echo $kegiatan['cover']; ?>" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4><?php echo $kegiatan['judul']; ?></h4>
                <span><?php echo $kegiatan['updated_at']; ?></span>
                <p>Explicabo voluptatem mollitia et repellat qui dolorum quasi</p>
                <p>
                  <a href="">Selengkapnya</a>
                </p>
              </div>
            </div>
          </div>
          <?php } ?>
        </div>

      </div>
    </section><!-- End Events Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">
        <div class="section-title">
          <span>Tentang kami</span>
          <h2>Tentang Kami</h2>
          <!-- <p>Temukan lokasi kami di peta.</p> -->
        </div>
      </div>

       <!-- ======= Testimonials Section ======= -->
      <section id="testimonials" class="testimonials">
        <div class="container">

          <div class="owl-carousel testimonials-carousel">

            <div class="testimonial-item">
              <h2><?php echo $data['judul']; ?></h2>
              <h3>Visi</h3>
              <!-- <h4>Ceo &amp; Founder</h4> -->
              <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                <?php echo $data['visi']; ?>
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
            </div>

            <div class="testimonial-item">
              <h2><?php echo $data['judul']; ?></h2>
              <h3>Misi</h3>
              <!-- <h4>Designer</h4> -->
              <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                <?php echo $data['misi'] ?>
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
            </div>

          </div>

        </div>
      </section><!-- End Testimonials Section -->

        <!-- ======= About Section ======= -->
      <section id="about" class="about">
        <div class="container">

          <div class="row content">
            <div class="col-lg-6">
              <h2>Sejarah</h2>
              <h3>Sejarah pondok pesantren Darul Hijrah</h3>
            </div>
            <div class="col-lg-6 pt-4 pt-lg-0">
              <p>
                <?php echo $data['sejarah']; ?>

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
              <?php echo $data['deskripsi']; ?>
              </p>
            </div>
          </div>

        </div>
      </section><!-- End About Section -->

      <div class="map" style="padding: 20px !important;">
        <!-- <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" allowfullscreen></iframe> -->
        <iframe style="border:0; width: 100%; height: 450px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d64243.28070826192!2d113.49550690777761!3d-7.134344829043081!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb96bd898c48b0bcc!2sPondok%20pesantren%20DARUL%20HIJRAH!5e0!3m2!1sid!2sid!4v1604491055705!5m2!1sid!2sid" frameborder="0" allowfullscreen></iframe>
      </div>

    </section>
    <!-- End Contact Section -->

  </main><!-- End #main -->
  <?php } ?>
  <!-- ======= Footer ======= -->
  <?php include"partials/footer.php" ?>
  <!-- End Footer -->
</body>
</html>