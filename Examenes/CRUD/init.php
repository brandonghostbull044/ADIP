<?php

// Comando combinado para iniciar ambos servidores en segundo plano
$command = 'php -S localhost:8000 ./src/router.php';

// Imprimir la URL de la documentación y la API
echo "\nURL de la API: http://localhost:8000\n";

// Ejecución del comando combinado para iniciar ambos servidores
echo "\n\nIniciando servidores...\n";
shell_exec($command);

?>
