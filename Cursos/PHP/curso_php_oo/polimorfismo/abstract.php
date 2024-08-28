<?php


abstract class BaseClass
{
    protected $name;

    private function getClassName()
    {
        return get_called_class();
    }

    public function login()
    {
        return "Mi nombre es $this->name desde la clase {$this->getClassName()}";
    }
}

class Admin extends BaseClass
{
    public function __construct($name)
    {
        $this->name = $name;
    }
}

class User extends BaseClass
{
    public function __construct($name)
    {
        $this->name = $name;
    }
}

class Guest extends BaseClass
{
    protected $name = 'Invitado';
}

$guest = new Guest();
echo $guest->login() . "\n\n";

$admin = new Admin('Administrador1');
echo $admin->login() . "\n\n";

$user = new User('Usuario1');
echo $user->login();

?>