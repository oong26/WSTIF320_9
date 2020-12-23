<?php
$db = mysqli_connect("localhost","root","","darul_hijrah_db");
// Check connection
if (mysqli_connect_error()){
    echo "Koneksi database gagal : " . mysqli_connect_error();
}
?>