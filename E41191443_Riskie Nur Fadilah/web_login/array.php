<?php
$nama = [
    'username'=>'riskienf',
    'password'=>'1234'
];
if ($_POST['user']==$nama['username']){
    if ($_POST['pass']==$nama['password']){
    include("index.php");
    }
    else {
        echo "Username dan Password Salah";
    }}
    else {
        echo "Harap Periksa Kembali";
    }

?>