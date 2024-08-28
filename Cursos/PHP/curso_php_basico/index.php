<?php
	echo 'Hola mundo.<br>';
	$nombre = 'Brandon';
	$apellido = 'Leon';
	echo 'Mi nombre es ' . $nombre.' ' . $apellido;
	echo "<br>Yo $nombre uso otra forma de concatenar";
	echo '<br>La longitud de mi nombre es: ' . strlen($nombre);
	echo '<br>Se pueden concatenar strings con numeros: '. 4*5;
	//Esto es un comentario
	/* 
		Esto es un comentario
		multilinea
	*/


	//Debugging
	$mi_primer_lista = [
		'Beto' => 24,
		'Alan' => 30,
		'Brandon' => 23
	];

	echo "\n\nEsto es una inspeccion de una variable con var_dump\n";
	var_dump($mi_primer_lista);
	echo "\n\nEsto una inspeccion de una variable con print_r, que una forma mas limpia de hacerlo\n";
	print_r($mi_primer_lista);
	
?>
