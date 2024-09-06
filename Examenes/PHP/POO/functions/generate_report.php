<?php

//Funcion para generar un archivo .txt con el reporte de salarios, la cual recibe la lista de empleados
function generate_salary_seport_txt($employees) {
    // Obtencion de la fecha y hora actual para el nombre del archivo de reporte
    $dateTime = date('Y-m-d_H-i-s');
    
    // Ruta del archivo de salida con el nombre y fecha del reporte
    $filePath = __DIR__ . "/../reports/$dateTime.txt";
    
    // Apertura del archivo de salida para escritura con la fecha y hora actual en el nombre del archivo
    $file = fopen($filePath, 'w');
    
    // Verificacion de la creacion del archivo de salida
    if (!$file) {
        echo "No se pudo abrir el archivo para escritura.\n";
        return;
    }
    
    // Escritura del encabezado del reporte
    fwrite($file, "Reporte de salarios de empleados\n\n");
    
    // Iteracion de la lista de empleados, para escribir los detalles de cada empleado en el reporte
    foreach ($employees as $employee) {
        $type = get_class($employee);
        fwrite($file, "Tipo de empleado: " . $type . "\n");
        fwrite($file, "Empleado: " . $employee->getFullName() . "\n");
        fwrite($file, "Salario anual: " . $employee->getAnnualSalary() . "\n");
        fwrite($file, "\n");
    }
    
    // Cierre del archivo de salida
    fclose($file);
    
    echo "Archivo de reporte generado exitosamente en la carpeta 'reports'\n";
}

?>
