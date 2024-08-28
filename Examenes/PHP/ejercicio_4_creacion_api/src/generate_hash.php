<?php

//Lectura de la clave secreta
$secret_key = file_get_contents('./resources/secret_key.txt');

//Iniciaalizacion de marca de tiempo
$time = time();

//Impresion del hash y la marca de tiempo
echo "TimeStamp: $time".PHP_EOL."Hash: ".sha1( 1 . $time . $secret_key).PHP_EOL;

?>