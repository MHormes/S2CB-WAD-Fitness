<?php

class User{

    public $firstname;
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

    public function Getfirstname(){
        return $this->firstname;
}

public function GetSecondname(){
    return $this->secondname;
}

public function GetUsername(){
    return $this->username;
}

public function GetPassword(){
    return $this->password;
}

public function GetEmail(){
    return $this->email;
}

public function GetRole(){
    return $this->role;
}
    public function RegMessage(){
        return "Hello $this->username, thank you for registering";
    }

    public function WelMessage(){
        return "Welkom $this->username";
    }
}

?>
