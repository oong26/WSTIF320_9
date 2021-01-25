<?php
session_start();
include '../config/database.php';
$username = $_POST['username'];
$password = $_POST['password'];
$user=mysqli_query($db, "select * from akun where username='$username' and password='$password'");
$cek = mysqli_num_rows($user);
if($cek > 0){
    $_SESSION['username'] = $username;
    header("location:index.php?pesan=berhasil");
}
else{
    header("location:login.php?pesan=gagal");
}
?>