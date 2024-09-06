<?php

require_once __DIR__ . "/../abstract/Person.php";

class Employee extends Person {
    // Atributos propios de Employee
    public $first_name;
    public $last_name;
    public $age;
    public $department;
    public $salary;

    // Constructor del empleado, para inicializar sus propiedades
    public function __construct($first_name, $last_name, $age, $department, $salary) {
        parent::__construct($first_name . ' ' . $last_name);
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->age = $age;
        $this->department = $department;
        $this->salary = $salary;
    }

    // Método para obtener el nombre completo del empleado
    public function getFullName() {
        return $this->first_name. ' ' . $this->last_name;
    }

    // Método para obtener el salario anual del empleado
    public function getAnnualSalary() {
        return $this->salary * 12;
    }

    //Inicializacion del método para saludar al empleado
    public function greet () {
        return "Hola, mi nombre es ". $this->getFullName(). ". Soy empleado del departamento ". $this->department;
    }
}

?>