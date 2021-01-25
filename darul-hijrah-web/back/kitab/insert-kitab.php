<?php
include '../../config/database.php';
session_start();
date_default_timezone_set('Asia/Jakarta');
$kode = $_POST['kode'];
$judul = $_POST['judul'];
$slug = preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower($judul));
$penulis = $_POST['penulis'];
$penerbit = $_POST['penerbit'];
$deskripsi = $_POST['deskripsi'];
$cover = date("His").'_'.$_FILES['cover']['name'];
$kategori = $_POST['kategori'];
$tahun = $_POST['tahun'];
$stok = $_POST['stok'];
$harga = $_POST['harga'];
$target_dir = "../../uploaded_files/kitab/";
$target_file = $target_dir . $cover;
$img_type = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$extensions_arr = array("jpg","jpeg","png","jfif");
$maxsize = 3242880;//3mb 
$datetime = date("y-M-d H:i:s", time());
if(in_array($img_type, $extensions_arr)){
    if(($_FILES['banner']['size'] >= $maxsize) || ($_FILES["cover"]["size"] == 0)){
        header("location:kitab-tambah.php?pesan=filetoolarge");
    }
    else{
        if(move_uploaded_file($_FILES['cover']['tmp_name'],$target_file)){
            $store = mysqli_query($db, "INSERT INTO kitab VALUES('$kode','$judul','$kategori','$deskripsi','$cover','$penulis','$penerbit','$tahun','$stok','$harga','$slug','$datetime','$datetime')");
            if($store)
                header("location:kitab.php?pesan=Data berhasil disimpan.");
            else
                header("location:kitab-tambah.php?pesan=gagal");
        }
    }
}
?>