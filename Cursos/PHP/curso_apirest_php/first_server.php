<?php


/*
    Para levantar un servidor con PHP se usa el siguiente comando en terminal:
    php -S localhost:8000 archivo_de_entrada_al_server.php

    Para poder probar la coneccion podemos usar curl con la flag '-v' al final para ver todo el contenido
*/


//Lista de tipos de contenido permitido
$allowedResourcesTypes = [
    'books',
    'authors',
    'genres'
];

//Validacion de que el tipo de dato solicitado se encuentra en los permitidos
$resource_type = $_GET['resource_type'];

if (!in_array($resource_type, $allowedResourcesTypes)) {
    die;
}


//Definicion de recursos
$books = [
    1 => [
        'title' => 'Las 48 leyes del poder',
        'id_author' => 1,
        'id_genre' => 2
    ],
    2 => [
        'title' => 'El Quijote de la mancha',
        'id_author' => 2,
        'id_genre' => 1
    ],
    3 => [
        'title' => 'La Divina Comedia',
        'id_author' => 3,
        'id_genre' => 2
    ],
    4 => [
        'title' => 'El Escritor',
        'id_author' => 4,
        'id_genre' => 1
    ],
    5 => [
        'title' => 'El Amor de Dios',
        'id_author' => 5,
        'id_genre' => 2
    ],
    6 => [
        'title' => 'El Principito',
        'id_author' => 6,
        'id_genre' => 1
    ],
    7 => [
        'title' => 'El Pensamiento',
        'id_author' => 7,
        'id_genre' => 1
    ],
    8 => [
        'title' => 'El Perro y el Gato',
        'id_author' => 8,
        'id_genre' => 1
    ],
    9 => [
        'title' => 'El Señor de los Anillos',
        'id_author' => 9,
        'id_genre' => 2
    ],
    10 => [
        'title' => 'La Odisea',
        'id_author' => 10,
        'id_genre' => 1
    ]
];

//Header para el usuario
header('Content-Type: application/json');

//Obteniendo id de reecurso buscado
$resource_id = array_key_exists('resource_id', $_GET) ? $_GET['resource_id'] : '';

//Comprobacion del tipo de peticion
switch ( strtoupper($_SERVER['REQUEST_METHOD']) ) {
    case 'GET':
        if (empty($resource_id)) {
            echo json_encode($books);
        } else {
            if (array_key_exists($resource_id, $books)) {
                echo json_encode($books[$resource_id]);
            }
        }
        
        break;
    case 'POST':
        echo "POST request received";
        break;
    case 'PUT':
        echo "PUT request received";
        break;
    case 'DELETE':
        echo "DELETE request received";
        break;
    default:
        echo "Unsupported request method";
        break;
}


?>