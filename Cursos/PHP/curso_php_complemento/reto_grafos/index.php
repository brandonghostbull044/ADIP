<?php


function fib($n) { return $n < 2 ? $n : fib($n - 1) + fib($n - 2); }
while (true) {
    $target = readline("Ingresa el numero de la tienda a la que quieres llegar: ");
    try {
        $target = (int) $target;
        echo "El numero de caminos hasta la tienda $target es: ". fib($target). "\n";
    } catch (Exception $e) {
        echo "$e\n\nDebes ingresar un numero entero.\n";
        continue;
    }
}



?>