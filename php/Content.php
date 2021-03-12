<?php

class Content{

    private $exerciseName;
    private $repsNumber;
    private $setsNumber;
    private $timeDuration;

    public function __construct($exerciseName, $repsNumber, $setsNumber, $timeDuration){
        $this->exerciseName = $exerciseName;
        $this->repsNumber = $repsNumber;
        $this->setsNumber = $setsNumber;
        $this->timeDuration = $timeDuration;
    }
}

?>
