<?php
include '../../config/database.php';
session_start();
$kode = $_GET['k'];
header('Content-Type: application/json');
$result = mysqli_query($db, "SELECT k.*,kk.kategori FROM kitab AS k JOIN kategori_kitab AS kk ON k.id_kategori = kk.id WHERE k.kode_kitab='$kode'");
$data = mysqli_fetch_array($result);
echo json_encode($data);
?>