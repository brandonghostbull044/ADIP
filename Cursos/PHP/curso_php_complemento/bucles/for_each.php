<?php


$nombres = ['Beto', 'Brandon', 'Marta', 'Alberto', 'Rodrigo'];
$edades = ['Beto'=> 12, 'Brandon'=> 23, 'Marta'=> 24, 'Alberto'=> 25, 'Rodrigo'=> 26];

foreach ($nombres as $nombre) {
    echo $nombre. "\n";
}

foreach ($edades as $nombre => $edad) {
    echo $nombre. ": ". $edad. " años\n";
}


?>