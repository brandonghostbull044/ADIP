<?php
    //PHP es de tipado debil, por lo que puede inferir en el tipo de dato de una variable

    $numero = 5;
    $numero_falso = "10";
    $suma = $numero + $numero_falso;
    
    echo "Esto es una suma de un numero y un string:  $suma\n\n";

    $otro_numero_falso = "10 es el numero";
    $otra_suma = $otro_numero_falso + 5;
    echo "\n\nEsto es una suma inteligente de PHP al identificar los numero incluso entre texto, solo funciona cuando el numero esta al principio del string: $otra_suma \n\n";
?>