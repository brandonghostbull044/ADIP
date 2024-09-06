<?php

//Importacion de los archivos necesarios (clases Employee y Manager)
require_once __DIR__ . "/../classes/Employee.php"; 
require_once __DIR__ . "/../classes/Manager.php"; 

//Funcion para cargar los empleados desde archivos JSON
function load_employees_from_json() {
    //Declaracion del path del directorio donde se encuentran los archivos JSON
    $directory = realpath(__DIR__ . "/../src");
    
    //Filtramos los archivos que son JSON
    $files = array_values(array_filter(scandir($directory), function($file) use ($directory) {
        return pathinfo($file, PATHINFO_EXTENSION) === 'json' && !in_array($file, ['.', '..']);
    }));

    //Si no hay archivos JSON, mostramos un mensaje y retornamos vacío
    if (empty($files)) {
        echo "No se encontraron archivos JSON en el directorio.\n";
        return [];
    }

    //Mostramos los archivos disponibles y solicitamos la seleccion del archivo
    echo "Archivos disponibles:\n";
    for ($i = 0; $i < count($files); $i++) {
        echo "   " . ($i + 1) . "> $files[$i]\n";
    }

    $filename = readline("Selecciona el número de archivo o ingresa un nuevo nombre para crear uno nuevo (sin extensión): ");
    
    //Comprobamos que la entrada del usuario sea un numero para leer un archivo ya existente
    if (is_numeric($filename) && isset($files[$filename - 1])) {
        //Declaramos el nombre del archivo
        $filename = $files[$filename - 1];
    } else {
        //Declaramos el nombre del archivo
        $filename = $filename . ".json";
        //Declaramos el path completo junto con el nombre delk archivo
        $filepath = $directory . '/' . $filename;
        
        //Si el archivo no existe, lo creamos y lo inicializamos con un array vacío
        if (!file_exists($filepath)) {
            file_put_contents($filepath, json_encode([], JSON_PRETTY_PRINT));
            echo "Nuevo archivo creado: $filename\n";
        } else {
            echo "El archivo ya existe. Usando archivo existente: $filename\n";
        }
        
        $files[] = $filename;
    }

    //Declaramos el path completo junto con el nombre delk archivo
    $filepath = $directory . '/' . $filename;

    //Leemos el contenido del archivo JSON y lo decodificamos en un array asociativo
    $jsonContent = file_get_contents($filepath);
    $data = json_decode($jsonContent, true);

    //Si el decodificado falla, mostramos un mensaje y retornamos vacío
    if ($data === null) {
        echo "Error al leer o decodificar el archivo JSON.\n";
        return [];
    }

    //Declaramos un array vacío para almacenar los empleados
    $employees = [];
    
    //Iteramos sobre el array asociativo y creamos las instancias de Employee y Manager según el tipo de empleado
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

    //Mostramos el mensaje de confirmación y retornamos el array de empleados
    echo "Empleados cargados exitosamente desde $filename.\n";
    return count($employees) > 0 ? $employees : [];
}

?>
