<?php
include '../includes/connection_template.php';
$woNameGet = $_POST['workoutName'];
$muscleTrainedGet = $_POST['muscleTrained'];
$exerciseNameGet = $_POST['selectedExcerciseArray'];
CreateNewWorkout($woNameGet, $muscleTrainedGet, $exerciseNameGet);

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