<?php
    $contador = 1;
    $contador_2 = 1;
    $resultado = $contador++;
    $resultado_2 = ++$contador_2;

    echo "Contador 1: $contador, Resultado 1: $resultado, Contador 2: $contador_2, Resultado 2: $resultado_2\n\n";

    $numero_1 = 5;
    $numero_2 = 3;
    $numero_3 = $numero_1 = $numero_2;

    echo "\n\n $numero_3";
?>