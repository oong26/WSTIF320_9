
<?php 
session_start();
include "koneksi.php";
if ($_POST['aksi']=="tambah") {
$nim = $_POST['nim'];
$nama = $_POST['nama'];
$tgl_lahir = $_POST['tgl_lahir'];
$agama = $_POST['agama'];
$username = $_POST['username'];
$password = $_POST['password'];
mysqli_query($conn,"INSERT INTO mahasiswa VALUES('".$nim."','".$nama."','".$tgl_lahir."','".$agama."','".$username."','".$password."')");
if {
    $_SESSION['alert'] ="Berhasil tambah";
}
else{
    $_SESSION['alert'] ="Gagal tambah";
}
}
?>
