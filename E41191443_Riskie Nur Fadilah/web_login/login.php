<?php
    $login =  [
        [
            'username' => "riskienf",
            'password' => "1234",
            'level' => "1"
        ],
        [
            'username' => "tifbws",
            'password' => "4321",
            'level' => "2"
        ]
    ];
    foreach($login as $data){
        if($_POST['user'] == $data['username'] && $_POST['pass'] == $data['password']){
                session_start();
                $_SESSION['user'] = $_POST['user'];
                $_SESSION['level'] = ($data['level']=="1")?'Admin':'User Biasa';
                header("Location: dashboard.php");
                die();
        }else {
            echo "Username atau Password Salah";
            die();
        }    
    }
?>