<?php
include '../../config/database.php';
session_start();
$id = $_GET['id'];
$deleted = mysqli_query($db, "DELETE FROM kelas WHERE id='$id'");
if($deleted)
    header("location:kelas.php?pesan=Berhasil menghapus data.");
else
    header("location:kelas.php?pesan=gagal");
?>