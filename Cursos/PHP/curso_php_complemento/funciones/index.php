<?php


function sum ($a = 1, $b = 2) {
    echo "La suma de los números es: " . $a + $b;
}

function infinity_sum(...$params) {
    $suma = 0;
    foreach ($params as $param) {
        $suma += $param;
    }
    echo "La suma de todos los números es: " . $suma;
}

$numero_1 = readline("Ingresa el primer numero: ");
$numero_2 = readline("Ingresa el segundo numero: ");

sum($numero_1 != null ? $numero_1 : null, $numero_2 != null ? $numero_2 : null);

$number_list = explode(",", readline("Ingresa los numeros a sumar, separador por comas: "));

infinity_sum(...$number_list);

?>