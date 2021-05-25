<?php

class FavoriteExercise{

    public $username;
    public $exerciseName;

    public function __construct($username, $exerciseName){
        $this->$username = $username;
        $this->$exerciseName = $exerciseName;
    }

    public function GetUsername(){
        return $this->username;
    }

    public function GetExerciseName(){
        return $this->exerciseName;
    }
}
?>
