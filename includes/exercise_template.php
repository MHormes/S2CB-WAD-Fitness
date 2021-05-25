<?php
include '../includes/connection_template.php';
function GetAllExercises($catName)
{
    global $username;
    global $password;
    global $connstring;
    try{
        $conn = new PDO($connstring,$username, $password);
        $sql = 'SELECT * FROM exercise WHERE MuscleTrained = :catName';
        $sth = $conn->prepare($sql);
        $sth->execute([':catName' => $catName]);

        $exercises = $sth->fetchAll(PDO::FETCH_OBJ);

        return $exercises;
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}

function GetAllExercisesOfAll(){
    global $username;
    global $password;
    global $connstring;
    try{
        $conn = new PDO($connstring,$username, $password);
        $sql = 'SELECT * FROM exercise';
        $sth = $conn->query($sql);
        $exercises = $sth->fetchAll(PDO::FETCH_OBJ);

        return $exercises;
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}

function GetChosenExercise($exName)
{
    include '../php classes/Exercise.php';

    global $username;
    global $password;
    global $connstring;

    try{

        $conn = new PDO($connstring,$username, $password);
        $sql = 'SELECT * FROM exercise WHERE Name = :exName';
        $sth = $conn->prepare($sql);
        $sth->execute([':exName' => $exName]);

        $result = $sth->fetchAll(PDO::FETCH_OBJ);
        $exercise = new Exercise($result[0]->Name, $result[0]->MuscleTrained, $result[0]->Reps, $result[0]->SetsNumber, $result[0]->Duration);
        return $exercise;
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}

function CreateNewExercise($exName, $muscleTrained, $exReps, $exSets, $timeDuration){

    global $username;
    global $password;
    global $connstring;
    try{
        $conn = new PDO($connstring,$username, $password);
        $sql = 'INSERT INTO exercise VALUES(:exName, :muscleTrained, :exReps, :exSets, :exDuration)';
        $sth = $conn->prepare($sql);
        $sth->execute([':exName' => $exName, ':muscleTrained' => $muscleTrained, ':exReps' => $exReps, ':exSets' => $exSets, ':exDuration' => $timeDuration]);
        $conn = null;
        
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}

function UpdateExercise($exerciseName, $muscleTrained, $exReps, $exSets, $timeDuration){
    global $username;
    global $password;
    global $connstring;

    try{
        $conn = new PDO($connstring,$username, $password);
        $sql = 'UPDATE exercise SET MuscleTrained = :muscleTrained, Reps = :reps, SetsNumber = :setsnumber, Duration = :timeDuration WHERE Name = :exerciseName';
        $sth = $conn->prepare($sql);
        $sth->execute([':muscleTrained' => $muscleTrained, ':setsnumber' => $exSets, ':reps' => $exReps, ':timeDuration' => $timeDuration, ':exerciseName' => $exerciseName]);
        $conn= null;
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}

function DeleteExercise($exName){

    global $username;
    global $password;
    global $connstring;
    try{
        $conn = new PDO($connstring,$username, $password);
        $sql = 'DELETE FROM exercise WHERE Name = :exName';
        $sth = $conn->prepare($sql);
        $sth->execute([':exName' => $exName]);
        
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}
