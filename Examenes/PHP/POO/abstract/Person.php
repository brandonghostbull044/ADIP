<?php

abstract class Person {
    public $name;

    public function __construct($name) {
        $this->name = $name;
    }

    abstract public function greet();
}

?>