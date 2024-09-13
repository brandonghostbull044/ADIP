<?php


require 'vendor/autoload.php';

use MongoDB\Client;

$client = new Client("mongodb+srv://brandonleongonzalezdev:nSlkjW6YyoQPePDZ@cluster0.fbokq.mongodb.net/");

$db = $client->selectDatabase('PruebasWADIP');
$collection = $db->selectCollection('Prueba1');

$polygon = [
    'type' => 'Polygon',
    'coordinates' => [[
        [-99.0585, 19.395],
        [-99.0585, 19.401],
        [-99.0579, 19.401],
        [-99.0579, 19.395],
        [-99.0585, 19.395]
    ]]
];

//El operador $geoWithin sirve tambien para encontrar documentos dentro de un poligono con un poligono

$result = $collection->find([
    'geometry' => [
        '$geoWithin' => [
            '$geometry' => $polygon
        ]
    ]
]);

foreach ($result as $document) {
    var_dump($document);
}





?>