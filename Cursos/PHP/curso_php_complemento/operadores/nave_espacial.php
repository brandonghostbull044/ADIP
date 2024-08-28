<?php


$precios = [2, 45, 20, 14, 60, 1, 23, 50];

usort($precios, function ($a, $b) {return $a <=> $b;});

echo "Precios ordenados de menor a mayor: " . var_dump($precios);


?>