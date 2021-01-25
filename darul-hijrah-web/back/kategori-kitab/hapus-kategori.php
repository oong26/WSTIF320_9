<?php
include '../../config/database.php';
session_start();
$id = $_GET['id'];
$deleted = mysqli_query($db, "DELETE FROM kategori_kitab WHERE id='$id'");
if($deleted)
    header("location:kategori.php?pesan=Berhasil menghapus data.");
else
    header("location:kategori.php?pesan=gagal");
?>