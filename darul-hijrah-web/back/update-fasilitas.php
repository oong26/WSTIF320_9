<?php
include '../config/database.php';
session_start();
$id = $_POST['id'];
$lab = $_POST['lab'];
$musholla = $_POST['musholla'];
$asrama = $_POST['asrama'];
$pengajar = $_POST['pengajar'];
$data = mysqli_query($db, "UPDATE web_profile SET laboratorium='$lab', musholla='$musholla', asrama='$asrama', pengajar='$pengajar' WHERE id='$id'");
if($data){
    header("location:fasilitas.php?pesan=berhasil");
}
else{
    header("location:fasilitas.php?pesan=gagal");
}
?>