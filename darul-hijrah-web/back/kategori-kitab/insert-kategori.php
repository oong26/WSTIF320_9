<?php
include '../../config/database.php';
session_start();
$kategori = $_POST['kategori'];
$store = mysqli_query($db, "INSERT INTO kategori_kitab(kategori)VALUES('$kategori')");
if($store)
    header("location:kategori.php?pesan=Data berhasil disimpan.");
else
    header("location:kategori-tambah.php?pesan=gagal");
?>