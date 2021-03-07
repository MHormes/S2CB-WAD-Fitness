<?php

class Person{

    public $username;
    private $password;
    private $firstname;
    private $secondname;
    private $email;

    public function __construct($username, $password, $email){
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
    }

    public function RegMessage(){
        return "Hello $this->username, thank you for registering";
    }

    public function WelMessage(){
        return "Welkom $this->username";
    }
}

?>
