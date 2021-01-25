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
$data = mysqli_query($db, "SELECT cover FROM kitab WHERE kode_kitab='$kode'");
$current_image = mysqli_fetch_array($data);
$datetime = date("Y-m-d H:i:s", time());
if($_FILES['cover']['name'] != null){
    if(in_array($img_type, $extensions_arr)){
        if(($_FILES['banner']['size'] >= $maxsize) || ($_FILES["cover"]["size"] == 0)){
            header("location:edit-kitab.php?pesan=filetoolarge");
        }
        else{
            unlink("../../uploaded_files/kitab/".$current_image['cover']);
            if(move_uploaded_file($_FILES['cover']['tmp_name'],$target_file)){
                $store = mysqli_query($db, "UPDATE kitab SET judul='$judul', id_kategori='$kategori',deskripsi='$deskripsi',cover='$cover',penulis='$penulis',penerbit='$penerbit',tahun='$tahun',stok='$stok',harga='$harga',slug='$slug',updated_at='$datetime' WHERE kode_kitab='$kode'");
                if($store)
                    header("location:kitab.php?pesan=Data berhasil disimpan.");
                else
                    header("location:edit-kitab.php?pesan=gagal");
            }
        }
    }
}
else{
    $result = mysqli_query($db, "UPDATE kitab SET judul='$judul', id_kategori='$kategori', deskripsi='$deskripsi', penulis='$penulis', penerbit='$penerbit', tahun='$tahun', stok='$stok', harga='$harga', slug='$slug',updated_at='$datetime' WHERE kode_kitab='$kode'");
    if (!$result) {
        header("location:edit-kitab.php?k=".$kode."&pesan=".$e);
    }
    else{
        header("location:kitab.php?pesan=Data berhasil disimpan.");
    }
//     die('Query Error : '.mysqli_errno($db). 
//    ' - '.mysqli_error($db));
}
?>