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

function CreateNewWorkout($woName, $muscleTrained, $exerciseName){

    global $username;
    global $password;
    global $connstring;
    
    foreach($exerciseName as $value)
        try{
            $conn = new PDO($connstring,$username, $password);
            $sql = 'INSERT INTO workout VALUES(:woName, :muscleTrained, :exerciseName)';
            $sth = $conn->prepare($sql);
            $sth->execute([':woName' => $woName, ':muscleTrained' => $muscleTrained, ':exerciseName' => $value]);
            $conn = null;
            
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    
    
}
?>