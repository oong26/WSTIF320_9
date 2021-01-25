<?php
include '../../config/database.php';
session_start();
$id = $_POST['id'];
$nama = $_POST['nama'];
$jumlah_santri = $_POST['jumlah_santri'];
$slug = preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower($nama));
$data = mysqli_query($db, "UPDATE kelas SET nama='$nama', jumlah_santri='$jumlah_santri', slug='$slug' WHERE id='$id'");
if($data){
    header("location:kelas.php?pesan=Data berhasil diperbarui.");
}
else{
    header("location:kelas-tambah.php?pesan=gagal");
}
?>