<?php

//Funcion para encontrar un empleado por su nombre, la cual recibe la lista de los empleados y el string a buscar en los nombres
function search_employee($employees, $name) {
    // Inicializamos un arreglo para guardar los empleados encontrados
    $foundEmployees = [];

    // Recorremos los empleados y buscamos aquellos que coincidan con el nombre
    foreach ($employees as $employee) {
        if (stripos($employee->first_name, $name) !== false || stripos($employee->last_name, $name) !== false) {
            $foundEmployees[] = $employee;
        }
    }

    // Obtenemos el número de empleados encontrados
    $count = count($foundEmployees);

    // Si hay un solo empleado que coincida con el nombre, lo retornamos
    if ($count === 1) {
        return $foundEmployees[0];
    } elseif ($count > 1) {
        //Si se encontro mas de una coicidencia las imprimimos para que el usuario selecione
        echo "Se encontraron varios empleados con el nombre '$name':\n";
        foreach ($foundEmployees as $index => $emp) {
            echo ($index + 1) . ". Nombre: " . $emp->first_name . " " . $emp->last_name . ", Departamento: " . $emp->department . "\n";
        }


        $selection = (int) readline("Selecciona el número del empleado: ");

         // Si el usuario ingreso un número valido, retornamos el empleado seleccionado
        if ($selection > 0 && $selection <= $count) {
            return $foundEmployees[$selection - 1];
        } else {
            echo "Selección no válida.\n";
            return null;
        }
    } else {
        echo "No se encontraron empleados con el nombre '$name'.\n";
        return null;
    }
}

?>
