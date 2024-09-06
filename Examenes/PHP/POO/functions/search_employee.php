<?php

function search_employee($employees, $name) {
    $foundEmployees = [];

    foreach ($employees as $employee) {
        if (stripos($employee->first_name, $name) !== false || stripos($employee->last_name, $name) !== false) {
            $foundEmployees[] = $employee;
        }
    }

    $count = count($foundEmployees);

    if ($count === 1) {
        return $foundEmployees[0];
    } elseif ($count > 1) {
        echo "Se encontraron varios empleados con el nombre '$name':\n";
        foreach ($foundEmployees as $index => $emp) {
            echo ($index + 1) . ". Nombre: " . $emp->first_name . " " . $emp->last_name . ", Departamento: " . $emp->department . "\n";
        }

        $selection = (int) readline("Selecciona el número del empleado: ");

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
