<?php

class Contact{

    public $name;
    private $email;
    private $message;
    private $userIsLogged;

    public function __construct($name, $email, $message, $userIsLogged){
        $this->name = $name;
        $this->email = $email;
        $this->message = $message;
        $this->userIsLogged = $userIsLogged;
    }
}
