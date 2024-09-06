<?php

require_once __DIR__ . "/../intefaces/Reporteable.php";
require_once __DIR__ . "/../functions/generate_report.php";

class SalariesReport implements Reporteable {
    public function generateReport($employees) {
        echo "\n\n\n\nReporte de salarios de empleados\n:";
        foreach ($employees as $employee) {
            $type = get_class($employee);
            echo "\n   Tipo de empleado: ". $type;
            echo "\n     Empleado: ". $employee->getFullName();
            echo "\n     Salario anual: " . $employee->getAnnualSalary() . "\n";
        }
        generate_salary_seport_txt($employees);
    }
}

?>