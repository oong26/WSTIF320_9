<?php
include 'config/database.php';
$last_id = $_POST['last_kitab_id'];
$kegiatan = mysqli_query($db, "SELECT k.judul,k.cover,k.slug, kk.kategori FROM kitab AS k INNER JOIN kategori_kitab AS kk ON k.id_kategori = kk.id WHERE k.judul LIKE '%".$cari."%' ORDER BY kk.kategori ASC LIMIT 3");
$output = '';
$kitab_id = '';
if($kegiatan->num_rows > 0){
    while($data = mysqli_fetch_array($kegiatan)){
        $kitab_id = $data['id'];
        $output .= '<div class="col-lg-4 col-md-6 portfolio-item '.preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower($data['kategori'])).'">
                        <div class="portfolio-wrap p-2">
                            <div class="text-center">
                                <img src="uploaded_files/kitab/'.$data['cover'].'" class="img-fluid" style="height:250px !important;"></div>
                                <div class="portfolio-info">
                                    <h4>'.$data['judul'].'</h4>
                                    <p>'.$data['kategori'].'</p>
                                    <div class="portfolio-links">
                                        <a href="uploaded_files/kitab/'.$data['cover'].'" data-gall="portfolioGallery" class="venobox" title="App 1"><i class="ri-add-fill"></i></a>
                                        <a href="kitab-detail.php/'.$data['slug'].'" title="More Details"><i class="ri-links-fill"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>';
        
    }
    $output .= '<div class="row" id="removed_class"><div class="col-lg-12 text-center"><button class="btn btn-danger m-2" id="btn_more" data-event="'.$event_id.'">Load More</button></div></div>';
    echo $output;
}

?>