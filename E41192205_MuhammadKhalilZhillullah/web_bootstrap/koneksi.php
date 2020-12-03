<?php
    $db = mysqli_connect("localhost","root","","db_crud_web");
    
    // Check connection
    if (mysqli_connect_errno()){
        echo "Koneksi database gagal : " . mysqli_connect_error();
    }
    else{
        echo "koneksi berhasil";
    }
?>