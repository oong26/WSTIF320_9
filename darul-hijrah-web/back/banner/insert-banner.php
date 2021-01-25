<?php
include '../../config/database.php';
session_start();
date_default_timezone_set('Asia/Jakarta');
$banner = date("His").'_'.$_FILES['banner']['name'];
$caption = $_POST['caption'];
$target_dir = "../../uploaded_files/banner/";
$target_file = $target_dir . $banner;
$img_type = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$extensions_arr = array("jpg","jpeg","png","ico");
$maxsize = 3242880;//3mb 
if($_FILES['banner']['name'] != null || $_FILES['banner']['name'] != ''){
    if(in_array($img_type, $extensions_arr)){
        if(($_FILES['banner']['size'] >= $maxsize) || ($_FILES["banner"]["size"] == 0)){
            header("location:banner-tambah.php?pesan=filetoolarge");
        }
        else{
            if(move_uploaded_file($_FILES['banner']['tmp_name'],$target_file)){
                $store = mysqli_query($db, "INSERT INTO banner(img,caption)VALUES('$banner','$caption')");
                if($store)
                    header("location:banner.php?pesan=berhasil");
                else
                    header("location:banner-tambah.php?pesan=gagal");
            }
        }
    }
}
else
    header("location:banner-tambah.php?pesan=gambarkosong");
?>