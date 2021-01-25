<?php
    include 'config/database.php';
    $kegiatan = mysqli_query($db, "SELECT id,judul,cover,deskripsi,slug,updated_at FROM kegiatan ORDER BY id DESC,updated_at DESC LIMIT 4");
?>
<?php $page='kegiatan'; include"partials/header.php" ?>
<body>

  <!-- ======= Header ======= -->
  <?php include"partials/nav.php" ?>
  <!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Kegiatan</h2>
          <ol>
            <li><a href="/darul-hijrah-web">Beranda</a></li>
            <li>Kegiatan</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Events Section ======= -->
    <section id="events" class="team">
        <div class="container" id="load_data">  
            <div class="col-12 mb-4">
                <form method="get" action="kegiatan.php">
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
                    $cari = $_GET['s'];
                    $kegiatan = mysqli_query($db, "SELECT judul,cover,deskripsi,slug,updated_at FROM kegiatan WHERE judul LIKE '%".$cari."%' ORDER BY updated_at DESC");
                ?>
                    <?php if($kegiatan->num_rows > 0){?>
                    <h3 class="font-weight-light my-4">Hasil pencarian dari kata kunci <span class="font-weight-500"> '<?php echo $_GET['s'] ?>'. </span></h3>
                    <?php }else{?>
                    <h3 class="font-weight-light my-4">Hasil tidak ditemukan.</h3>
                    <?php } ?>
                <?php } ?>
            </div>
  
            <div class="row" >
                <?php while($data = mysqli_fetch_array($kegiatan)){?>
                <div class="col-lg-6 mb-2">
                    <div class="member d-flex align-items-start">
                        <div class="pic"><img src="uploaded_files/<?php echo $data['cover']; ?>" class="img-fluid" style="height:180px !important;"></div>
                        <div class="member-info">
                            <a href="kegiatan-detail.php/<?= $data['slug'] ?>"><h4><?php echo $data['judul']; ?></h4></a>
                            <span><?php echo substr($data['updated_at'],0,10); ?></span>
                            <p>
                                <a href="kegiatan-detail.php/<?= $data['slug'] ?>">Selengkapnya</a>
                            </p>
                        </div>
                    </div>
                </div>
                <?php $event_id = $data['id'];} ?>
            </div>
            <div class="row" id="removed_class">
                <div class="col-lg-12 text-center">
                    <button class="btn btn-danger m-2" id="btn_more" data-event="<?= $event_id;?>">Load More</button>
                </div>
            </div>
    
        </div>
      </section><!-- End Events Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php include"partials/footer.php" ?>
  <!-- End Footer -->
  <script>
      $(document).ready(function(){
          $(document).on('click', '#btn_more', function(){
              var last_event_id = $(this).data("event");
              $("#btn_more").html("Loading...");
              $.ajax({
                  url:"load_kegiatan.php",
                  method:"POST",
                  data:{last_event_id:last_event_id},
                  dataType:"text",
                  success:function(data)
                  {
                      if(data != ''){
                          $('#removed_class').remove();
                          $('#load_data').append(data);
                      }
                      else{
                          $('#removed_class').remove();
                        //   $('#btn_more').html("No Data");
                      }
                  }
              })
          })
      })
  </script>

</body>

</html>