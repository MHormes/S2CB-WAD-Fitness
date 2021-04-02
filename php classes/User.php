<?php

class User{

    private $firstname;
    private $secondname;
    private $username;
    private $password;
    private $email;
    private $role;

    public function __construct($firstname, $secondname, $username, $password, $email, $role){
        $this->firstname = $firstname;
        $this->secondname = $secondname;
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->role = $role;
    }

    public function RegMessage(){
        return "Hello $this->username, thank you for registering";
    }

    public function WelMessage(){
        return "Welkom $this->username";
    }
}

?>
