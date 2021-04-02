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
}

?>
