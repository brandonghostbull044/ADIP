<?php


require 'vendor/autoload.php';
use MongoDB\Client;

$client = new Client('mongodb+srv://brandonleongonzalezdev:nSlkjW6YyoQPePDZ@cluster0.fbokq.mongodb.net/');

$database = $client->selectDatabase('sample_training');
$database_2 = $client->selectDatabase('PruebasWADIP');

$collection = $database->selectCollection('zips');
$collection_2 = $database_2->selectCollection("Prueba1");

$document = $collection->findOne(['zip' => '35007']);

echo $document['pop'];


$jsonData = file_get_contents(__DIR__ . "/./Weather.alcaldias.json");
$dataArray = json_decode($jsonData, true);
$collection_2->insertMany($dataArray);


?>