<?php

class User
{
    protected $name;
    protected $surname;

    function __construct($name, $surname)
    {
        $this->name = $name;
        $this->surname = $surname;
    }

    public function welcome()
    {
        echo "Здравствуйте, ";
    }
}

class Admin  extends User
{
    public function welcome()
    {
        echo parent::welcome() . "админ " . $this->name . " " . $this->surname . ". Вы можете на сайте делать всё.";
    }
}

class Client extends  User
{
    public function welcome()
    {
        echo parent::welcome() . "клиент " . $this->name . " " . $this->surname . ". Вы можете на сайте просматривать информацию доступную пользователям.";
    }
}

class Manager  extends User
{
    public function welcome()
    {
        echo parent::welcome() . "менеджер " . $this->name . " " . $this->surname . ". Вы можете на сайте изменять, удалять и создавать клиентов.";
    }
}
