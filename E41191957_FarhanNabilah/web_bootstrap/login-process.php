<?php
session_start();
include 'koneksi.php';

$email = $_POST['email'];
$password = $_POST['password'];

$user = mysqli_query($db,"select * from user where email='$email' and password='$password'");

$cek = mysqli_num_rows($user);

if($cek > 0){
    $_SESSION['email'] = $email;
    header("location:index.php?pesan=berhasil");
}
else{
    header("location:login.php?pesan=gagal".$user);
}
?>