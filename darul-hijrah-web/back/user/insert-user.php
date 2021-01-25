<?php
include '../../config/database.php';
session_start();
$nama = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];
$store = mysqli_query($db, "INSERT INTO akun(nama,username,password)VALUES('$nama', '$username','$password')");
if($store)
    header("location:user.php?pesan=berhasil");
else
    header("location:user-tambah.php?pesan=gagal");
?>