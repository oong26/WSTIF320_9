<?php
$web = mysqli_query($db, "SELECT * FROM web_profile");
while($web_data = mysqli_fetch_array($web)){
?>
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/darul-hijrah-web/back/">
        <div class="sidebar-brand-icon ">
          <i class="fas fa-university"></i>
        </div>
        <div class="sidebar-brand-text mx-3"><?php echo $web_data['judul']; ?> </div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">
  <?php $url = substr($_SERVER["REQUEST_URI"],strrpos($_SERVER["REQUEST_URI"],"/")+0); ?>
      <!-- Nav Item - Dashboard -->
      <li class="nav-item <?php echo($url === '/')? "active":""; ?>">
        <a class="nav-link" href="/darul-hijrah-web/back/">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      
      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Menu
      </div>

      <!-- Nav Item - Tables -->
      <li class="nav-item <?php echo(strpos($url,'web') == true)? "active":""; ?>">
        <a class="nav-link" href="/darul-hijrah-web/back/web.php">
          <i class="fas fa-fw fa-globe"></i>
          <span>Web</span></a>
      </li>

      <li class="nav-item <?php echo(strpos($url,'fasilitas') == true)? "active":""; ?>">
        <a class="nav-link" href="/darul-hijrah-web/back/fasilitas.php">
          <i class="fas fa-fw fa-home"></i>
          <span>Fasilitas</span></a>
      </li>

      <li class="nav-item <?php echo(strpos($url,'banner') == true)? "active":""; ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBanner" aria-expanded="true" aria-controls="collapseBanner">
          <i class="fas fa-fw fa-images"></i>
          <span>Banner</span>
        </a>
        <div id="collapseBanner" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Banner</h6>
            <a class="collapse-item" href="/darul-hijrah-web/back/banner/banner.php">Lihat</a>
            <a class="collapse-item" href="/darul-hijrah-web/back/banner/banner-tambah.php">Tambah</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item <?php echo(strpos($url,'user') == true)? "active":""; ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-user"></i>
          <span>User</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">User</h6>
            <a class="collapse-item" href="/darul-hijrah-web/back/user/user.php">Lihat</a>
            <a class="collapse-item" href="/darul-hijrah-web/back/user/user-tambah.php">Tambah</a>
          </div>
        </div>
      </li>

      <li class="nav-item <?php echo(strpos($url,'kelas') == true)? "active":""; ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseKelas" aria-expanded="true" aria-controls="collapseKelas">
          <i class="fas fa-fw fa-graduation-cap"></i>
          <span>Kelas</span>
        </a>
        <div id="collapseKelas" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Kelas</h6>
            <a class="collapse-item" href="/darul-hijrah-web/back/kelas/kelas.php">Lihat</a>
            <a class="collapse-item" href="/darul-hijrah-web/back/kelas/kelas-tambah.php">Tambah</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item <?php echo(strpos($url,'kategori') == true)? "active":""; ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseKategoriKitab" aria-expanded="true" aria-controls="collapseKategoriKitab">
          <i class="fas fa-fw fa-book"></i>
          <span>Kategori Kitab</span>
        </a>
        <div id="collapseKategoriKitab" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Kategori Kitab</h6>
            <a class="collapse-item" href="/darul-hijrah-web/back/kategori-kitab/kategori.php">Lihat</a>
            <a class="collapse-item" href="/darul-hijrah-web/back/kategori-kitab/kategori-tambah.php">Tambah</a>
          </div>
        </div>
      </li>

      <li class="nav-item <?php echo(strpos($url,'kitab') == true)? "active":""; ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseKitab" aria-expanded="true" aria-controls="collapseKitab">
          <i class="fas fa-fw fa-book"></i>
          <span>Kitab</span>
        </a>
        <div id="collapseKitab" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Kitab</h6>
            <a class="collapse-item" href="/darul-hijrah-web/back/kitab/kitab.php">Lihat</a>
            <a class="collapse-item" href="/darul-hijrah-web/back/kitab/kitab-tambah.php">Tambah</a>
          </div>
        </div>
      </li>

      <li class="nav-item <?php echo(strpos($url,'kegiatan') == true)? "active":""; ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseKegiatan" aria-expanded="true" aria-controls="collapseKegiatan">
          <i class="fas fa-fw fa-handshake"></i>
          <span>Kegiatan</span>
        </a>
        <div id="collapseKegiatan" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Kegiatan</h6>
            <a class="collapse-item" href="/darul-hijrah-web/back/kegiatan/kegiatan.php">Lihat</a>
            <a class="collapse-item" href="/darul-hijrah-web/back/kegiatan/kegiatan-tambah.php">Tambah</a>
          </div>
        </div>
      </li>

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
<?php } ?>