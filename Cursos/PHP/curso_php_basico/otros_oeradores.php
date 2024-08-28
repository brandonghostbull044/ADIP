<?php
    $numero_1 = 5;
    $numero_2 = 10;
    $numero_3 = 9;
    $str_1 = "HOLA";
    $str_2 = "MUNDO";
    $edad_2 = ($edad_1 = 24) + 11;
    echo "La edad 1 es $edad_1 y la edad 2 es $edad_2\n\n";

    $numero_1 += 1;
    echo $numero_1 . "\n\n";
    $numero_1++;
    echo $numero_1;

    $numero_1 -= 1;
    echo "\n\n" . $numero_1 . "\n\n";
    $numero_1--;
    echo $numero_1;

    $numero_1 *= 2;
    echo "\n\n" . $numero_1 . "\n\n";
    $numero_1 /= 2;
    echo $numero_1;

    echo $str_1;
    $str_1 .= " " . $str_2;
    echo $str_1;

    $numero_1 = 5;

    echo "\n\n\n\n";
    echo $numero_1 . "\n\n";
    $resultado = ++$numero_1;
    echo $numero_1 . "\n\n";
    echo "\n\n" . $resultado . $numero_1;
    $resultado_2 = $numero_1++;
    echo "\n\n" . $resultado_2. $numero_1;
?>