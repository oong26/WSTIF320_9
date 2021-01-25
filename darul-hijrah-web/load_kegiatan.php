<?php
include 'config/database.php';
$last_id = $_POST['last_event_id'];
$kegiatan = mysqli_query($db, "SELECT id,judul,cover,deskripsi,slug,updated_at FROM kegiatan WHERE id < '$last_id' ORDER BY id DESC,updated_at DESC LIMIT 2");
$output = '';
$event_id = '';
if($kegiatan->num_rows > 0){
    while($data = mysqli_fetch_array($kegiatan)){
        $event_id = $data['id'];
        $output .= '<div class="col-lg-6 mb-2">
                        <div class="member d-flex align-items-start">
                            <div class="pic"><img src="uploaded_files/'.$data["cover"].'" class="img-fluid" style="height:180px !important;"></div>
                            <div class="member-info">
                                <a href="kegiatan-detail.php/'.$data["slug"].'"><h4>'.$data['judul'].'</h4></a>
                                <span>'.substr($data["updated_at"],0,10).'</span>
                                <p>
                                    <a href="kegiatan-detail.php/'.$data["slug"].'">Selengkapnya</a>
                                </p>
                            </div>
                        </div>
                    </div>';
        
    }
    $output .= '<div class="row" id="removed_class"><div class="col-lg-12 text-center"><button class="btn btn-danger m-2" id="btn_more" data-event="'.$event_id.'">Load More</button></div></div>';
    echo $output;
}

?>