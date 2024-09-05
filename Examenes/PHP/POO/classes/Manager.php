require "./Employee.php"

class Manager extends Employee {
    private $bonus;

    public function __construct($first_name, $last_name, $age, $department, $saliry, $bonus) {
        parent::__construct($first_name, $last_name, $age, $department, $saliry);
        $this->bonus = $bonus;
    }

    public function getAnnualSalary() {
        return parent::getAnnualSalary() + $this->bonus;
    }
}