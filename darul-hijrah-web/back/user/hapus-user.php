<?php
include '../../config/database.php';
session_start();
$id = $_GET['id'];
$deleted = mysqli_query($db, "DELETE FROM akun WHERE id='$id'");
if($deleted)
    header("location:user.php?pesan=Berhasil menghapus data.");
else
    header("location:user.php?pesan=gagal");
?>