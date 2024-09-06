<?php

abstract class Person {
    public $name;

    //Constructor para inicializar la propiedad name
    public function __construct($name) {
        $this->name = $name;
    }

    //Método abstracto para saludar
    abstract public function greet();
}

?>