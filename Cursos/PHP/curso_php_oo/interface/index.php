<?php


interface Person2
{
    public function getName();
}

class Admin implements Person2
{
    public $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }
}

$admin = new Admin('Brandon');
echo $admin->getName();


?>