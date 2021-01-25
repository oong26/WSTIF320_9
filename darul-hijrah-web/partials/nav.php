<header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center">
    <?php
      // Create database connection using config file
      include_once("./config/database.php");

      // Fetch all users data from database
      $result = mysqli_query($db, "SELECT * FROM web_profile");
      $data = null;
      while($data = mysqli_fetch_array($result)) {
        
    ?>

      <div class="logo mr-auto">
        <h1 class="text-light"><a href="/darul-hijrah-web"><?php echo $data['judul'];?></a></h1>
      <?php } ?>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>
      <nav class="nav-menu d-none d-lg-block">
        <ul>
        <?php $url = substr($_SERVER["REQUEST_URI"],strrpos($_SERVER["REQUEST_URI"],"/"));?>
          <li class="<?php echo($url === '/')? "active":""; ?>"><a href="/darul-hijrah-web">Beranda</a></li>
          <li class="<?php echo(strpos($url,'kegiatan') == true)? "active":""; ?>"><a href="/darul-hijrah-web/kegiatan.php">Kegiatan</a></li>
          <li class="<?php echo(strpos($url,'kelas') == true)? "active":""; ?>"><a href="/darul-hijrah-web/kelas.php">Kelas</a></li>
          <li class="<?php echo(strpos($url,'kitab') == true)? "active":""; ?>"><a href="/darul-hijrah-web/kitab.php">Kitab</a></li>         
          <li class="<?php echo(strpos($url,'tentang') == true)? "active":""; ?>"><a href="/darul-hijrah-web/tentang.php">Tentang</a></li>
          <li class="<?php echo(strpos($url,'kontak') == true)? "active":""; ?>"><a href="/darul-hijrah-web/kontak.php">Kontak</a></li>

        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header>