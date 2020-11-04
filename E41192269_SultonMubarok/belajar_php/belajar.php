<?php
$nilai=80;
echo "CONTOH IF ELSE <br>";
if($nilai>100) {
    echo "selamat anda mendapat grade A <br>";
}else{
    echo "Maaf anda belum grade A<br>";
}

echo "CONTOH SWITCH <br>";
switch ($nilai){
    case 90 : echo "Nilai yang dipilih 100<br>";
break;
    case 80 : echo "Nilai yang dipilih 90<br>";
break;
} echo "CONTOH FOR<br>";
for ($i=1; $i<=5; $i++){
    echo "looping for ke :" . $i . "<br>";
}
    echo "CONTOH WHILE<br>";
    $j=1;   
    while($j<=5){
        echo "looping while ke :" . $j . "<br>";
        $j++;

    }
    for ($i=1; $i<=5; $i++){
        echo "looping for ke :" . $i . "<br>";
    }
        echo "CONTOH WHILE<br>";
        $j=1;   
        while($j<=5){
            echo "looping while ke :" . $j . "<br>";
            $j++;
    
        }
        echo 'Coba Sendiri<br>';
        
    ?>