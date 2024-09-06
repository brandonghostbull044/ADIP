<?php

//Importacion de los archivos necesarios (interface y la funcion generate_report)
require_once __DIR__ . "/../intefaces/Reporteable.php";
require_once __DIR__ . "/../functions/generate_report.php";

//Clase para generar el reporte de salarios, adicional ejecuta la funcion antes importada para la creacion del archivo .txt con el reporte
class SalariesReport implements Reporteable {
    public function generateReport($employees) {
        echo "\n\n\n\nReporte de salarios de empleados\n:";
        foreach ($employees as $employee) {
            $type = get_class($employee);
            echo "\n   Tipo de empleado: ". $type;
            echo "\n     Empleado: ". $employee->getFullName();
            echo "\n     Salario anual: " . $employee->getAnnualSalary() . "\n";
        }

        //Ejecucion de la funcion para generar el archivo
        generate_salary_seport_txt($employees);
    }
}

?>