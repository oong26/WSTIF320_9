<?php

    $numbers = array( 1, 2, 3, 4, 5);
    foreach ($numbers as $value) {
        echo "value is $value <br/>";
    }
    $numbers[0] = "one";
    $numbers[1] = "two";
    $numbers[2] = "three";
    $numbers[3] = "four";
    $numbers[4] = "five";

    foreach ($numbers as $value) {
        echo "value is $value<br/>";
    }
    foreach (array_reverse($numbers) as $key => $value) {
        echo "$value<br/>";
    }
    

    foreach (array_reverse($numbers) as $key => $value) {
        if ($key <= 2){
            echo "$value<br/>";
        }
    }
    

?>