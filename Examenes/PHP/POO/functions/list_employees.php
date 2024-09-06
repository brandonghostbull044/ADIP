<?php

//Funcion para listar a todos los empleados, al cual recibe la lista de instancias de los empleados
function list_employees($employees) {
    echo "\n\n\nLista de empleados: \n";

    //Iteracion de cada instancia de empleado en la lista y mostramos su información
    for ($i = 0; $i < count($employees); $i++) {
        echo "   ID: ". $i + 1 . "\n   " . $employees[$i]->name . "\n\n";
    }
}

?>