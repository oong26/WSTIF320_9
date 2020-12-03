<?php
$email = $_POST['email'];
$password = $_POST['password'];
$email_saya = "mkhalil26122000@gmail.com";
$password_saya = 12345678;

session_start();

if((strcasecmp($email_saya, $email) == 0)&&($password_saya==$password)){
    $_SESSION['email'] = $email_saya;
    header("location:index.php?pesan=berhasil");
}
else{
    header("location:login.php?pesan=gagal");
}
?>