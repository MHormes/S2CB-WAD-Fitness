<?php

class Contact{

    public $name
    private $email;
    private $message;

    public function __construct($name, $email, $message){
        $this->firstname = $name;
        $this->secondname = $email;
        $this->username = $message;
    }

    public function GetName(){
        return $this->name;
    }

    public function GetMessage(){
    return $this->message;
    }

    public function GetEmail(){
    return $this->email;
    }
}
?>
