<?php 
include 'koneksi.php';
$nik = $_POST['nik'];
$nama = $_POST['nama'];
$tanggal_lhr = $_POST['tanggal_lhr'];
$jurusan = $_POST['jurusan'];
$umur = $_POST['umur'];
$jk = $_POST['jk'];

mysqli_query($kon,"update mahasiswa set nama='$nama', jk='$jk', tanggal_lhr='$tanggal_lhr', jurusan='$jurusan', umur='$umur' where nik='$nik'");
header("location:form.php");
?> 