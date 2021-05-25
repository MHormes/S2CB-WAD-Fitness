<?php

class Workout{

    private $woName;
    private $muscleTrained;
    private $exercises;
    

    public function __construct($woName, $muscleTrained, $exercises){
        $this->woName = $woName;
        $this->muscleTrained = $muscleTrained;
        $this->exercises = $exercises;
    }

    public function GetWOName(){
        return $this->woName;
    }

    public function GetMuscleTrained(){
        return $this->muscleTrained;
    }

    public function GetExercises(){
        return $this->exercises;
    }
}
?>