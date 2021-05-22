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
 
?>