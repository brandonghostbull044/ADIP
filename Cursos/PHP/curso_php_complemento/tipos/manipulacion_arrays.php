<?php


$lista_frutas = "Pera, Manzana, Pepino, Kiwi, Fresa";
echo $lista_frutas . "\n\n";
//explode sirve para partir un string por un o mas caracteres y crear un array
$frutas_array = explode(", ", $lista_frutas);
var_dump($frutas_array);
echo "\n\n";

//implode sirve para unir los elementos de un array en un string, separados por un carácter
$nuevo_string = implode(" * ", $frutas_array);
echo $nuevo_string . "\n\n";



?>