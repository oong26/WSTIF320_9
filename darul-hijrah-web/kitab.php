<?php
include 'config/database.php';
$kategori_kitab = mysqli_query($db, "SELECT * FROM kategori_kitab");
$kitab = mysqli_query($db, "SELECT k.judul,k.cover,k.slug, kk.kategori FROM kitab AS k INNER JOIN kategori_kitab AS kk ON k.id_kategori = kk.id ORDER BY kk.kategori ASC LIMIT 6");
?>
<?php $page='kitab'; include"partials/header.php"?>
<body>
	<!-- ======= Header ======= -->
	<?php include"partials/nav.php"?>
	<!-- End Header -->
	<main id="main">
		<!-- ======= Breadcrumbs ======= -->
		<section class="breadcrumbs">
			<div class="container">
				<div class="d-flex justify-content-between align-items-center">
					<h2>Kitab</h2>
					<ol>
						<li>
							<a href="/darul-hijrah-web">Beranda</a>
						</li>
						<li>Kitab</li>
					</ol>
				</div>
			</div>
		</section>
		<!-- End Breadcrumbs -->
		<!-- ======= Kitab Section ======= -->
		<section id="portfolio" class="portfolio">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<ul id="portfolio-flters">
							<li data-filter="*" class="filter-active">Semua</li>
							<?php while($kategori = mysqli_fetch_array($kategori_kitab)){ ?>
							<li data-filter=".
								<?php echo preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower($kategori['kategori'])) ?>">
								<?php echo $kategori['kategori']; ?>
							</li>
							<?php } ?>
						</ul>
					</div>
				</div>
				<div class="col-12 mb-4">
					<form method="get" action="kitab.php">
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text" id="search-addon">
									<i class="fa fa-search" aria-hidden="true"></i>
								</span>
							</div>
							<input type="search" name="s" class="form-control" placeholder="Cari kitab" aria-label="Cari" aria-labelledby="search-addon" value="" required>
							</div>
						</form>
						<?php if (isset($_GET['s'])) { 
                    $cari = $_GET['s'];
                    $kitab = mysqli_query($db, "SELECT k.judul,k.cover,k.slug, kk.kategori FROM kitab AS k INNER JOIN kategori_kitab AS kk ON k.id_kategori = kk.id WHERE k.judul LIKE '%".$cari."%' ORDER BY kk.kategori ASC")?>
						<?php if($kitab->num_rows > 0){?>
						<h3 class="font-weight-light my-4">Hasil pencarian dari kata kunci 
							<span class="font-weight-500"> '
								<?php echo $_GET['s'] ?>'. 
							</span>
						</h3>
						<?php }else{?>
						<h3 class="font-weight-light my-4">Hasil tidak ditemukan.</h3>
						<?php } ?>
						<?php } ?>
					</div>
					<div class="row" id="load_data">
						<?php while($kitabs = mysqli_fetch_array($kitab)){ ?>
						<div class="col-lg-4 col-md-6 portfolio-item 
							<?php echo preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower($kitabs['kategori'])) ?>">
							<div class="portfolio-wrap p-2">
								<div class="text-center">
									<img src="uploaded_files/kitab/
										<?php echo $kitabs['cover']; ?>" class="img-fluid" style="height:250px !important;">
									</div>
									<div class="portfolio-info">
										<h4>
											<?php echo $kitabs['judul']; ?>
										</h4>
										<p>
											<?php echo $kitabs['kategori']; ?>
										</p>
										<div class="portfolio-links">
											<a href="uploaded_files/kitab/
												<?php echo $kitabs['cover']; ?>" data-gall="portfolioGallery" class="venobox" title="App 1">
												<i class="ri-add-fill"></i>
											</a>
											<a href="kitab-detail.php/
												<?php echo $kitabs['slug']; ?>" title="More Details">
												<i class="ri-links-fill"></i>
											</a>
										</div>
									</div>
								</div>
							</div>
							<?php $kitab_id = $kitabs['id']; } ?>
						</div>
					</div>
					<div class="row" id="removed_class">
						<div class="col-lg-12 text-center">
							<button class="btn btn-danger m-2" id="btn_more" data-event="
								<?= $kitab_id;?>">Load More
							</button>
						</div>
					</div>
				</div>
			</section>
			<!-- End Kitab Section -->
		</main>
		<!-- End #main -->
		<!-- ======= Footer ======= -->
		<?php include"partials/footer.php" ?>
		<!-- End Footer -->
		<script>
      $(document).ready(function(){
          $(document).on('click', '#btn_more', function(){
              var last_kitab_id = $(this).data("event");
              $("#btn_more").html("Loading...");
              $.ajax({
                  url:"load_kitab.php",
                  method:"POST",
                  data:{last_kitab_id:last_kitab_id},
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