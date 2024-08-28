<?php


$array = array_map(function() {
    return rand(-100, 100);
}, range(1, 1500));



//Solucion 1
function es_positivo($lista) {
    foreach ($lista as $num) {
        if ($num < 0) {
            return false;
        }
    }
    return true;
}

function sum_max_long ($lista) {
    $max = PHP_INT_MIN;
    if (es_positivo($lista)) {
        return array_sum($lista);
    } else {
        for ($i = 0; $i <= count($lista); $i++) {
            for ($j = $i; $j <= count($lista); $j++) {
                $new_list = array_slice($lista, $i, $j);
                $sum = array_sum($new_list);
                $max = $max < $sum ? $sum : $max;
            }
        }
    }
    return $max;
}



//Solucion 2
function sum_max_short ($lista) {
    $max = PHP_INT_MIN;
    for ($i = 0; $i <= count($lista); $i++) {
        for ($j = $i; $j <= count($lista); $j++) {
            $new_list = array_slice($lista, $i, $j);
            $sum = array_sum($new_list);
            $max = $max < $sum ? $sum : $max;
        }
    }
    return $max;
}



//Solucion de Kadane
function kadane($array) {
    $total_max = $current_max = $array[0];

    for ($i = 1; $i < count($array); $i++) {
        $current_max = max($array[$i], $current_max + $array[$i]);
        $total_max = max($total_max, $current_max);
    }

    return $total_max;
}






//$array = explode(", ", readline("Ingresa los numeros separados por una coma y un espacio: "));
$start_time = microtime(true);
$resultado = sum_max_short($array);
$end_time = microtime(true);
echo "\nLa suma maxima es: $resultado";
echo "\nTiempo de ejecucion de la funcion short: " . ($end_time - $start_time) . " segundos\n\n";

$start_time_2 = microtime(true);
$resultado = sum_max_long($array);
$end_time_2 = microtime(true);
echo "La suma maxima es: $resultado";
echo "\nTiempo de ejecucion de la funcion long es: " . ($end_time_2 - $start_time_2) . " segundos\n\n";

$start_time_3 = microtime(true);
$max_kadane = kadane($array);
echo "La suma maxima es: $max_kadane";
$end_time_3 = microtime(true);
echo "\nTiempo de ejecucion de la funcion Kadane es: ". ($end_time_3 - $start_time_3). " segundos\n";

?>
