<?php
include '../../config/database.php';
session_start();
$id = $_POST['id'];
$kategori = $_POST['kategori'];
$data = mysqli_query($db, "UPDATE kategori_kitab SET kategori='$kategori' WHERE id='$id'");
if($data){
    header("location:kategori.php?pesan=Data berhasil diperbarui.");
}
else{
    header("location:kategori-tambah.php?pesan=gagal");
}
?>