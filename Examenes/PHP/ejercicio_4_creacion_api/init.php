<?php


//Declaracion de comando de bash para iniciar el servidor
$terminalCommand = 'php -S localhost:8000 .\src\ejercicio_4_creacion_api.php';

// Ejecucion del archivo para generar el hash
include('./src/generate_hash.php');

// Ejecucion del comando para iniciar servidor
echo "\n\nServidor iniciado\n";
$output = shell_exec($terminalCommand . ' 2>&1');



?>
