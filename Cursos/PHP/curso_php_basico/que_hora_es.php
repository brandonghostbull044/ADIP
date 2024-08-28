<?php
    $segundos = readline("Ingresa el tiempo en segundo: ");
    $horas = (int) ($segundos / 3600);
    $minutos = (int) (($segundos % 3600) / 60);
    $segundos = $segundos % 60; 
    echo "El tiempo ingresado es: $horas horas, $minutos minutos y $segundos segundos.";
?>