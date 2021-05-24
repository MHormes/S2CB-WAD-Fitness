<?php

class FavoriteWorkout{

    public $username;
    public $workoutName;

    public function __construct($username, $workoutName){
        $this->$username = $username;
        $this->$workoutName = $workoutName;
    }

    public function GetUsername(){
        return $this->username;
    }

    public function GetWorkoutName(){
        return $this->$workoutName;
    }
}
?>
