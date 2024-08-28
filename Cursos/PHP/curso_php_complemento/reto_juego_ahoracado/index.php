<?php


include './resources/draws.php';
include './resources/words.php';
include './classes/Juego.php';

$juego = new Juego($words, $draws, 7);
$juego->start();


?>