<?php

// Comando combinado para iniciar ambos servidores en segundo plano
$combinedCommand = 'start /B php -S localhost:8000 .\src\ejercicio_4_creacion_api.php && start /B php -S localhost:8001 .\doc.php';

// Ejecución del archivo para generar el hash
include('./src/generate_hash.php');

// Imprimir la URL de la documentación y la API
echo "\nURL de la API: http://localhost:8000\n";
echo "URL de la documentación: http://localhost:8001\n";

// Ejecución del comando combinado para iniciar ambos servidores
echo "\n\nIniciando servidores...\n";
shell_exec($combinedCommand);

?>
