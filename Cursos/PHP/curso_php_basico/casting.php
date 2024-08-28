<?php
    $numero_falso = "5";
    echo "Esto es un numero falso (string)\n";
    var_dump($numero_falso);

    $numero_real = (int) $numero_falso;
    echo "\n\nEsto es un numero real (integer), casteado desde el falso\n";
    var_dump($numero_real);

    $numero_decimal = 5.89;
    echo "\n\nEsto es un numero decimal\n";
    var_dump($numero_decimal);
    $numero_entero = (int) $numero_decimal;
    echo "\n\nEsto es un numero entero, casteado desde el decimal\n";
    var_dump($numero_entero);

    $booleano_numerico = 0;
    echo "\n\nEsto es un booleano numerico\n";
    var_dump($booleano_numerico);
    $booleano = (bool) $booleano_numerico;
    echo "\n\nEsto es un booleano, casteado desde el numerico\n";
    var_dump($booleano);
?>