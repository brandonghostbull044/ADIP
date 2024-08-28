<?php
    $numero_1 = 5;
    $numero_2 = 19;
    $numero_3 = 20;
    $numero_4 = 11;
    $numero_falso = '5';

    var_dump($numero_1 == $numero_2);
    var_dump($numero_1 == $numero_falso);
    var_dump($numero_2 > $numero_2);
    var_dump($numero_1 < $numero_4);
    var_dump($numero_2 === $numero_falso);
    var_dump($numero_1 != $numero_falso);
    var_dump($numero_1 !== $numero_falso);
    var_dump($numero_1 >= $numero_2);
    echo 2 <=> 1;
    echo "\n\n";
    echo 1 <=> 2;
    echo "\n\n";
    echo 2 <=> 2;
    echo "\n\n";

    //Fusion del NULL
    $edad_2 = 24;
    echo $edad_1 ?? $edad_2;
?>