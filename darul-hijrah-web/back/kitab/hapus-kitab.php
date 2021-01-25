<?php
include '../../config/database.php';
session_start();
$kode = $_GET['k'];
$data = mysqli_query($db, "SELECT cover FROM kitab WHERE kode_kitab='$kode'");
$current_image = mysqli_fetch_array($data);
$deleted = mysqli_query($db, "DELETE FROM kitab WHERE kode_kitab='$kode'");
if($deleted){
    unlink("../../uploaded_files/kitab/".$current_image['cover']);
    header("location:kitab.php?pesan=Berhasil menghapus data.");
}
else{
    header("location:kitab.php?pesan=gagal");
}
?>