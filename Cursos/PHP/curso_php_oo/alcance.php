<?php


class User
{
    //Alcance total desde cualquier lugar del codigo
    public const PAGINATE = 25;

    //Alcance protegido solo para los que hereden de la clase 
    protected $name;

    //Alcance privado solo para esta clase y sus metodos
    private $email;

}


?>