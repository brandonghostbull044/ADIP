<?php

require_once __DIR__ . "/./Employee.php";

class Manager extends Employee {

    //Atributo adicional para la clase
    public $bonus;

    //Constructor de la clase Manager que llama al constructor de la clase Employee inicializa el atributo bonus a la clase Manager
    public function __construct($first_name, $last_name, $age, $department, $saliry, $bonus) {
        parent::__construct($first_name, $last_name, $age, $department, $saliry);
        $this->bonus = $bonus;
    }
    
    //Sobreescritura del método getAnnualSalary en la clase Manager que retorna el salario anual de la persona más el bonus
    public function getAnnualSalary() {
        return parent::getAnnualSalary() + $this->bonus;
    }
}

?>