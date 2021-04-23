<?php
include '../includes/connection_template.php';
function GetAllWorkouts()
{
    global $username;
    global $password;
    global $connstring;
    try{

        $conn = new PDO($connstring,$username, $password);
        $sql = 'SELECT * FROM Workout';

        $query = $conn->query($sql);
        $workouts = $query->fetchAll(PDO::FETCH_OBJ);

        return $workouts;
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}

function CreateNewWorkout($woName, $muscleTrained){

    global $username;
    global $password;
    global $connstring;
    try{
        $conn = new PDO($connstring,$username, $password);
        $sql = 'INSERT INTO workout VALUES(:woName, :muscleTrained)';
        $sth = $conn->prepare($sql);
        $sth->execute([':woName' => $woName, ':muscleTrained' => $muscleTrained]);
        $conn = null;
        
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}
?>