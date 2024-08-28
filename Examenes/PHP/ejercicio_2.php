<?php

// Solución
$list_numbers = array_map(function() {
    return rand(-100, 100);
}, range(1, 1500));

function findEquilibriumIndex($array) {
    $left_sum = PHP_INT_MIN;
    $right_sum = array_sum($array);
    for ($i = 0; $i < count($array); $i++) {
        $left_sum = array_sum(array_slice($array, 0, $i));
        $right_sum -= $array[$i];
        if ($left_sum == $right_sum) {
            return "El punto de equilibrio es el index: $i, sumando $left_sum tanto de izquierda como de derecha";
        }
    }
    return "No hay un punto de equilibrio";
}

//$list_numbers = explode(", ", readline("Ingresa los numeros separados por una coma y un espacio: "));
$result = findEquilibriumIndex($list_numbers);
echo $result;

?>