<?php

function list_employees($employees) {
    echo "\n\n\nLista de empleados: \n";
    for ($i = 0; $i < count($employees); $i++) {
        echo "   ID: ". $i + 1 . "\n   " . $employees[$i]->name . "\n\n";
    }
}

?>