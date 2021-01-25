<?php
include 'config/database.php';
$last_id = $_POST['last_class_id'];
$kelas = mysqli_query($db, "SELECT * FROM kelas WHERE id > '$last_id' ORDER BY id ASC LIMIT 3");
$output = '';
$class_id = '';
if($kelas->num_rows > 0){
    while($data = mysqli_fetch_array($kelas)){
        $class_id = $data['id'];
        $output .= '<div class="col-lg-4 mb-4">
                        <div class="member d-flex align-items-start">
                            <div class="col-sm-4 mr-4">
                                <label style="font-size: 60pt;">'.substr($nama[0],0,1).substr($nama[1],0,1).'</label>
                            </div>
                            <div class="member-info">
                                <h4>'.$data["nama"].'</h4>
                                <span>'.$data["jumlah_santri"].' Santri</span>
                            </div>
                        </div>
                    </div>';
        
    }
    $output .= '<div class="row" id="removed_class"><div class="col-lg-12 text-center"><button class="btn btn-danger m-2" id="btn_more" data-class="'.$class_id.'">Load More</button></div></div>';
    echo $output;
}

?>