<?php
include '../../config/database.php';
session_start();
$id = $_GET['id'];
$data = mysqli_query($db, "SELECT cover FROM kegiatan WHERE id='$id'");
$current_image = mysqli_fetch_array($data);
$deleted = mysqli_query($db, "DELETE FROM kegiatan WHERE id='$id'");
if($deleted){
    unlink("../../uploaded_files/".$current_image['cover']);
    header("location:kegiatan.php?pesan=Berhasil menghapus data.");
}
else
    header("location:kegiatan.php?pesan=gagal");
?>