<?php

function save_employees_to_json($employees) {
    $directory = realpath(__DIR__ . "/../src");
    $files = array_values(array_filter(scandir($directory), function($file) use ($directory) {
        return pathinfo($file, PATHINFO_EXTENSION) === 'json' && !in_array($file, ['.', '..']);
    }));

    echo "Archivos .json disponibles:\n";
    for ($i = 0; $i < count($files); $i++) {
        echo "   " . ($i + 1) . "> $files[$i]\n";
    }

    echo "\n";
    $filename = readline("Selecciona el número de archivo para actualizar o ingresa un nuevo nombre (sin extensión): ");
    if (is_numeric($filename) && isset($files[$filename - 1])) {
        $filename = $files[$filename - 1];
    } else {
        $filename = $filename . ".json";
    }

    $data = [];
    foreach ($employees as $employee) {
        $employeeData = [
            "first_name" => $employee->first_name,
            "last_name" => $employee->last_name,
            "age" => $employee->age,
            "department" => $employee->department,
            "salary" => $employee->salary,
            "type" => get_class($employee)
        ];

        if ($employee instanceof Manager) {
            $employeeData["bonus"] = $employee->bonus;
        }

        $data[] = $employeeData;
    }

    file_put_contents($directory . '/' . $filename, json_encode($data, JSON_PRETTY_PRINT));
    echo "Datos guardados en $filename.\n";
}


?>