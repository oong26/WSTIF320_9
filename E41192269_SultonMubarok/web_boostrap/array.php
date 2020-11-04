<?php
$nama = [
    'username'=>'sulton',
    'password'=>'123'
];
if ($_POST['user']==$nama['username']){
    if ($_POST['pass']==$nama['password']){
        echo "naruto mati";
    }
    else {
        echo "salah bos";
    }}
    else {
        echo "username salah";
    }

?>