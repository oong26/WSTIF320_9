<?php
include '../../config/database.php';
session_start();
$nama = $_POST['nama'];
$jumlah_santri = $_POST['jumlah_santri'];
$slug = preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower($nama));
$store = mysqli_query($db, "INSERT INTO kelas(nama,jumlah_santri,slug)VALUES('$nama', '$jumlah_santri', '$slug')");
if($store)
    header("location:kelas.php?pesan=berhasil");
else
    header("location:kelas-tambah.php?pesan=gagal");
?>