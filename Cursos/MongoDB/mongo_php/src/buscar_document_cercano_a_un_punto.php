<?php


require 'vendor/autoload.php';

use MongoDB\Client;

$client = new Client("mongodb+srv://brandonleongonzalezdev:nSlkjW6YyoQPePDZ@cluster0.fbokq.mongodb.net/");

$db = $client->selectDatabase('PruebasWADIP');
$collection = $db->selectCollection('Prueba1');

$point = [
    'type' => 'Point',
    'coordinates' => [-99.0580, 19.3995]
];

//El operador $near sirve para encontrar documentos cercanos a un punto, ordenados por proximidad

$result = $collection->find([
    'geometry' => [
        '$near' => [
            '$geometry' => $point,
            '$maxDistance' => 1000
        ]
    ]
]);

foreach ($result as $document) {
    var_dump($document);
}





?>