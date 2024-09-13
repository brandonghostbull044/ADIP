<?php


require 'vendor/autoload.php';

use MongoDB\Client;

$client = new Client("mongodb+srv://brandonleongonzalezdev:nSlkjW6YyoQPePDZ@cluster0.fbokq.mongodb.net/");

$db = $client->selectDatabase('PruebasWADIP');
$collection = $db->selectCollection('Prueba2');

$index = $collection->createIndex(['geometry' => '2dsphere']);

// Documento con campo 'geometry' correctamente estructurado
$document = [
    "type" => "Feature",
    "geometry" => [
        "type" => "MultiPolygon",
        "coordinates" => [
            [
                [
                    [-99.058133, 19.40072],
                    [-99.058136, 19.400692],
                    [-99.057932, 19.400609],
                    [-99.058824, 19.395706],
                    [-99.058774, 19.396116],
                    [-99.058663, 19.397142],
                    [-99.058558, 19.398224],
                    [-99.058558, 19.398294],
                    [-99.058512, 19.398612],
                    [-99.058374, 19.399777],
                    [-99.058354, 19.399956],
                    [-99.058318, 19.400281],
                    [-99.058268, 19.400736],
                    [-99.058133, 19.40072]
                ]
            ]
        ]
    ]
];

$result = $collection->insertOne($document);


echo "Indice creado con exito con el ID: {$result->getInsertedId()}\n\n";

var_dump($collection->find());


?>