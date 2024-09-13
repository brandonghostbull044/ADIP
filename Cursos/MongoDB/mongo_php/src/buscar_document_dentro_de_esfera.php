<?php


require 'vendor/autoload.php';

use MongoDB\Client;

$client = new Client("mongodb+srv://brandonleongonzalezdev:nSlkjW6YyoQPePDZ@cluster0.fbokq.mongodb.net/");

$db = $client->selectDatabase('PruebasWADIP');
$collection = $db->selectCollection('Prueba1');

$center = [-99.0580, 19.3995];
$radius = 0.001;

//El operador $geoWhithin sirve para encontrar documentos dentro de una geommetria

$result = $collection->find([
    'geometry' => [
        'geoWithin' => [
            '$centerSphere' => [$center, $radius]
        ]
    ]
]);

foreach ($result as $document) {
    var_dump($document);
}



?>