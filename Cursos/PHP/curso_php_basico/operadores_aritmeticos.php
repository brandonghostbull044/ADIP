<?php
    $numero_1 = 5;
    $numero_2 = 19;
    $numero_3 = 20;
    $numero_4 = 11;
    $numero_falso = "23";

    $suma = $numero_1 + $numero_2 + $numero_3 + $numero_4;
    $division = $suma / 4;
    $multiplicacion = $numero_1 * $numero_2;
    $resto = $numero_1 - $numero_2;
    $modulo = $numero_1 % $numero_2;
    $exponente = $numero_1 ** $numero_2;
    $identidad = +$numero_falso;
    $negacion = -$numero_1;
    echo "Summa: $suma, Division: $division, Multiplicacion: $multiplicacion, Resta: $resto, Modulo: $modulo, Exponente: $exponente, Identidad: $identidad, Negacion: $negacion";
    var_dump(+$numero_falso);
?>