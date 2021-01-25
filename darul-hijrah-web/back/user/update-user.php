<?php
include '../../config/database.php';
session_start();
$id = $_POST['id'];
$nama = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];
date_default_timezone_set('Asia/Jakarta');
$time = date("Y-m-d H:i:s", time());
$data = mysqli_query($db, "UPDATE akun SET nama='$nama', username='$username', password='$password', updated_at='$time' WHERE id='$id'");
if($data){
    header("location:user.php?pesan=Data berhasil diperbarui.");
}
else{
    header("location:edit-user.php?pesan=gagal");
}
?>