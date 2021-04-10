<?php

class Content{

    private $exerciseName;
    private $muscleTrained;
    private $repsNumber;
    private $setsNumber;
    private $timeDuration;
    

    public function __construct($exerciseName, $muscleTrained, $repsNumber, $setsNumber, $timeDuration){
        $this->exerciseName = $exerciseName;
        $this->muscleTrained = $muscleTrained;
        $this->repsNumber = $repsNumber;
        $this->setsNumber = $setsNumber;
        $this->timeDuration = $timeDuration;
    }

    public function GetExerciseName(){
            return $this->exerciseName;
    }

    public function GetMuscleTrained(){
        return $this->muscleTrained;
    }

    public function GetRepsNumber(){
        return $this->repsNumber;
    }

    public function GetSetsNumber(){
        return $this->setsNumber;
    }

    public function GetTimeDuration(){
        return $this->timeDuration;
    }
}
?>
