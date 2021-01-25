<?php
include '../config/database.php';
session_start();
$id = $_POST['id'];
$judul = $_POST['judul'];
date_default_timezone_set('Asia/Jakarta');
$logo = date("His").'_'.$_FILES['logo']['name'];
$deskripsi = $_POST['deskripsi'];
$sejarah = $_POST['sejarah'];
$visi = $_POST['visi'];
$misi = $_POST['misi'];
$kontak = $_POST['kontak'];
$order_kontak = $_POST['order_kontak'];
$alamat = $_POST['alamat'];
$target_dir = "../uploaded_files/";
$target_file = $target_dir . $logo;
$img_type = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$extensions_arr = array("jpg","jpeg","png","ico");
$maxsize = 3242880;//3mb 
$image = mysqli_query($db, "SELECT logo FROM web_profile WHERE id='$id'");
$current_image = mysqli_fetch_array($image);
if(in_array($img_type, $extensions_arr)){
    if(($_FILES['logo']['size'] >= $maxsize) || ($_FILES["logo"]["size"] == 0)){
        header("location:web.php?pesan=filetoolarge");
    }
    else{
        unlink("../uploaded_files/".$current_image['logo']);
        if(move_uploaded_file($_FILES['logo']['tmp_name'],$target_file)){
            $data = mysqli_query($db, "UPDATE web_profile SET judul='$judul', logo='$logo', deskripsi='$deskripsi', sejarah='$sejarah', visi='$visi', misi='$misi', kontak='$kontak', order_kontak='$order_kontak', alamat='$alamat' WHERE id='$id'");
            if($data){
                header("location:web.php?pesan=berhasil");
            }
            else{
                header("location:web.php?pesan=gagal");
            }
        }
    }
}
$data = mysqli_query($db, "UPDATE web_profile SET judul='$judul', deskripsi='$deskripsi', sejarah='$sejarah', visi='$visi', misi='$misi', kontak='$kontak', order_kontak='$order_kontak', alamat='$alamat' WHERE id='$id'");
if($data){
    header("location:web.php?pesan=berhasil");
}
else{
    header("location:web.php?pesan=gagal");
}
?>