<?php

require_once __DIR__ . "/../classes/Employee.php"; 
require_once __DIR__ . "/../classes/Manager.php"; 

function load_employees_from_json() {
    $directory = realpath(__DIR__ . "/../src");
    
    $files = array_values(array_filter(scandir($directory), function($file) use ($directory) {
        return pathinfo($file, PATHINFO_EXTENSION) === 'json' && !in_array($file, ['.', '..']);
    }));

    if (empty($files)) {
        echo "No se encontraron archivos JSON en el directorio.\n";
        return [];
    }

    echo "Archivos disponibles:\n";
    for ($i = 0; $i < count($files); $i++) {
        echo "   " . ($i + 1) . "> $files[$i]\n";
    }

    $filename = readline("Selecciona el número de archivo o ingresa un nuevo nombre para crear uno nuevo (sin extensión): ");
    
    if (is_numeric($filename) && isset($files[$filename - 1])) {
        $filename = $files[$filename - 1];
    } else {
        $filename = $filename . ".json";
        $filepath = $directory . '/' . $filename;
        
        if (!file_exists($filepath)) {
            file_put_contents($filepath, json_encode([], JSON_PRETTY_PRINT));
            echo "Nuevo archivo creado: $filename\n";
        } else {
            echo "El archivo ya existe. Usando archivo existente: $filename\n";
        }
        
        $files[] = $filename;
    }

    $filepath = $directory . '/' . $filename;

    $jsonContent = file_get_contents($filepath);
    $data = json_decode($jsonContent, true);

    if ($data === null) {
        echo "Error al leer o decodificar el archivo JSON.\n";
        return [];
    }

    $employees = [];
    foreach ($data as $employeeData) {
        if ($employeeData['type'] === 'Manager') {
            $employee = new Manager(
                $employeeData['first_name'],
                $employeeData['last_name'],
                $employeeData['age'],
                $employeeData['department'],
                $employeeData['salary'],
                $employeeData['bonus'] ?? null
            );
        } else {
            $employee = new Employee(
                $employeeData['first_name'],
                $employeeData['last_name'],
                $employeeData['age'],
                $employeeData['department'],
                $employeeData['salary']
            );
        }
        $employees[] = $employee;
    }

    echo "Empleados cargados exitosamente desde $filename.\n";
    return count($employees) > 0 ? $employees : [];
}

?>
