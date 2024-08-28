<?php


//Declaracion de la URL de la API
$url = "https://condesacdmx.mx/sip_develop/apis/api.php";
$params = [
    'endpoint' => 'VerifyUser',
    'curp' => 'SAJH860530HDFNRG02'
];

//Generacion de la query
$queryString = http_build_query($params);

//Creacion de la URI final con los parametros
$endPoint = $url . '?' . $queryString;

//Declaracion de credenciales
$username = "adip-appcdmx";
$password = "von_prios2024@";

//Opciones para la solicitud HTTP
$options = [
    "http" => [
        "method" => "GET",
        "header" => "Authorization: Basic " . base64_encode("$username:$password")
    ]
];


//Realizacion de la solicitud HTTP, asignando los valores a una variable
$response = file_get_contents($endPoint, false, stream_context_create($options));


//Comprobacion de la peticion
if ($response === FALSE) {
    die('Error al realizar la petición');
}


//Decodificacion del JSON
$data = json_decode($response);


?>
