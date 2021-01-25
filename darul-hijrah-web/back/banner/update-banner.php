<?php
include '../../config/database.php';
session_start();
date_default_timezone_set('Asia/Jakarta');
$id = $_POST['id'];
$banner = date("His").'_'.$_FILES['banner']['name'];
$caption = $_POST['caption'];
$target_dir = "../../uploaded_files/banner/";
$target_file = $target_dir . $banner;
$img_type = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$extensions_arr = array("jpg","jpeg","png","ico");
$maxsize = 3242880;//3mb 
$data = mysqli_query($db, "SELECT img FROM banner WHERE id='$id'");
$current_image = mysqli_fetch_array($data);
if($_FILES['banner']['name'] != null || $_FILES['banner']['name'] != ''){
    if(in_array($img_type, $extensions_arr)){
        if(($_FILES['banner']['size'] >= $maxsize) || ($_FILES["banner"]["size"] == 0)){
            header("location:banner-tambah.php?pesan=filetoolarge");
        }
        else{
            unlink("../../uploaded_files/banner/".$current_image['img']);
            if(move_uploaded_file($_FILES['banner']['tmp_name'],$target_file)){
                $store = null;
                if(isset($caption))
                    $store = mysqli_query($db, "UPDATE banner SET img='$banner', caption='$caption' WHERE id='$id'");
                else
                    $store = mysqli_query($db, "UPDATE banner SET img='$banner' WHERE id='$id'");
                if($store)
                    header("location:banner.php?pesan=berhasil");
                else
                    header("location:edit-banner.php?id=".$id."&pesan=gagal");
            }
        }
    }
}
else
    header("location:edit-banner.php?id=".$id."&pesan=gambarkosong");
?>