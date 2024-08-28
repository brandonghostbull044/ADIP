<?php


class User
{
    public $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    //La palabra reservada final sirve para que este metodo no se sobreescriba en las instancias de esta clase
    final public function getName()
    {
        return $this->name;
    }
}

class Admin extends User
{
    //
}


$admin = new Admin('Brandon');
echo $admin->getName();

?>