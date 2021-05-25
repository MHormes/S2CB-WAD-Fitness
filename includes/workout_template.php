<?php
include '../includes/connection_template.php';
function GetAllWorkouts()
{
    global $username;
    global $password;
    global $connstring;
    try{

        $conn = new PDO($connstring,$username, $password);
        $sql = 'SELECT DISTINCT Name FROM workout';

        $query = $conn->query($sql);
        $workouts = $query->fetchAll(PDO::FETCH_OBJ);

        return $workouts;
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}

function GetSelectedWorkout($woName){
    include '../php classes/Workout.php';
    global $username;
    global $password;
    global $connstring;

    try{

        $conn = new PDO($connstring,$username, $password);
        $sql = 'SELECT * FROM workout WHERE Name = :woName';
        $sth = $conn->prepare($sql);
        $sth->execute([':woName' => $woName]);

        $result = $sth->fetchAll(PDO::FETCH_OBJ);
        $workout = new Workout($result[0]->Name, $result[0]->MuscleTrained, $result[0]->exerciseName);
        return $workout;
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}

function GetAllExercisesForWorkout($woName){
    global $username;
    global $password;
    global $connstring;
    try{

        $conn = new PDO($connstring,$username, $password);
        $sql = 'SELECT * FROM workout WHERE Name = :woName';
        $sth = $conn->prepare($sql);
        $sth->execute([':woName' => $woName]);
        $exercises = $sth->fetchAll(PDO::FETCH_OBJ);
        
        return $exercises;
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}

function RemoveWorkout($woName){
    global $username;
    global $password;
    global $connstring;
    try{
        $conn = new PDO($connstring,$username, $password);
        $sql = 'DELETE FROM workout WHERE Name = :woName';
        $sth = $conn->prepare($sql);
        $sth->execute([':woName' => $woName]);
        
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}
