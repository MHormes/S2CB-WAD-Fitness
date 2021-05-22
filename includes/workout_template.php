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
?>