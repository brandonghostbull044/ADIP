<?php

function generate_salary_seport_txt($employees) {
    $dateTime = date('Y-m-d_H-i-s');
    $filePath = __DIR__ . "/../reports/$dateTime.txt";
    
    $file = fopen($filePath, 'w');
    
    if (!$file) {
        echo "No se pudo abrir el archivo para escritura.\n";
        return;
    }
    
    fwrite($file, "Reporte de salarios de empleados\n\n");
    
    foreach ($employees as $employee) {
        $type = get_class($employee);
        fwrite($file, "Tipo de empleado: " . $type . "\n");
        fwrite($file, "Empleado: " . $employee->getFullName() . "\n");
        fwrite($file, "Salario anual: " . $employee->getAnnualSalary() . "\n");
        fwrite($file, "\n");
    }
    
    fclose($file);
    
    echo "Archivo de reporte generado exitosamente en la carpeta 'reports'\n";
}

?>
