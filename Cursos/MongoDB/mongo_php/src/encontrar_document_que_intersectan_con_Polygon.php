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

//El operador $geoIntersects sirve para encontrar documentos cuya geometria intersecte con una geometria dada

$result = $collection->find([
    'geometry' => [
        '$geoIntersects' => [
            '$geometry' => $polygon
        ]
    ]
]);

foreach ($result as $document) {
    var_dump($document);
}





?>