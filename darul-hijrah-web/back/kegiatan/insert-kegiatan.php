<?php
include '../../config/database.php';
session_start();
date_default_timezone_set('Asia/Jakarta');
$judul = $_POST['judul'];
$deskripsi = $_POST['deskripsi'];
$cover = date("His").'_'.$_FILES['cover']['name'];
$target_dir = "../../uploaded_files/";
$target_file = $target_dir . $cover;
$img_type = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$extensions_arr = array("jpg","jpeg","png","jfif");
$maxsize = 3242880;//3mb 
$slug = preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower($judul));
if(in_array($img_type, $extensions_arr)){
    if(($_FILES['cover']['size'] >= $maxsize) || ($_FILES["cover"]["size"] == 0)){
        header("location:kegiatan-tambah.php?pesan=filetoolarge");
    }
    else{
        if(move_uploaded_file($_FILES['cover']['tmp_name'],$target_file)){
            $store = mysqli_query($db, "INSERT INTO kegiatan(judul,cover,deskripsi,slug)VALUES('$judul','$cover','$deskripsi','$slug')");
            if($store)
                header("location:kegiatan.php?pesan=berhasil");
            else
                header("location:kegiatan-tambah.php?pesan=gagal");
        }
    }
}
else
    header("location:kegiatan-tambah.php?pesan=gagal");
?>