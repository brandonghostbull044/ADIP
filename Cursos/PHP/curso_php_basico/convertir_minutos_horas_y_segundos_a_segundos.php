<?php
    $horas = readline("Ingresa las horas: ");
    $minutos = readline("Ingresa los minutos: ");
    $segundos = readline("Ingresa los segundos: ");

    $segundos += $minutos * 60;
    $segundos += $horas * 3600;

    echo "Los segundos totales son: $segundos";
?>