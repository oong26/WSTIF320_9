<?php
include '../../config/database.php';
session_start();
$id = $_GET['id'];
$data = mysqli_query($db, "SELECT img FROM banner WHERE id='$id'");
$current_image = mysqli_fetch_array($data);
$deleted = mysqli_query($db, "DELETE FROM banner WHERE id='$id'");
if($deleted){
    unlink("../../uploaded_files/banner/".$current_image['img']);
    header("location:banner.php?pesan=Berhasil menghapus data.");
}
else
    header("location:banner.php?pesan=gagal");
?>