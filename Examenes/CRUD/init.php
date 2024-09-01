<?php


$commands = [
    "1" => "nohup php -S localhost:8001 ./src/auth_server.php > server_8001.log 2>&1 & nohup php -S localhost:8000 ./src/main_api.php > server_8000.log 2>&1 &",
    "2" => 'setsid php -S localhost:8001 ./crud/api_GET.php & 
    setsid php -S localhost:8002 ./crud/api_POST.php & 
    setsid php -S localhost:8003 ./crud/api_PUT.php & 
    setsid php -S localhost:8004 ./crud/api_DELETE.php &'
];



echo "Ingresa la opcion para iniciar el servidor:\n     1) Iniciar con Midleware (incluye Token Auth y Basic Auth)\n     2) Iniciar APIs por separado (unicamente Basic Auth)\n";

$chose = readline("--> ");

require __DIR__ . '/./src/read_credentials.php';


switch ( "$chose" ) {
    case 1:
        echo "Servidor iniciado....\nIngresa a http://localhost:8000 para ver la documentacion.\n\n";
        break;
    case 2:
        echo "Servidores iniciados....\nRealiza tus peticiones GET en http://localhost:8001\nTus peticiones POST en http://localhost:8002\nTus peticiones PUT en http://localhost:8003\nTus peticiones DELETE en http://localhost:8004\n para ver la documentacion.";
        break;
    default:
        echo "Opcion invalida.";
        exit(1);
}


$command = $commands[$chose];

shell_exec($command);


declare(ticks = 1);

function shutdown()
{
    shell_exec('killall php');
    exit;
}

pcntl_signal(SIGINT, "shutdown");

while (true) {
    sleep(1);
}


?>
