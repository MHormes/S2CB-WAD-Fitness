<?php
function GetAllExercises($catName)
{
    include '../includes/connection_template.php';
    try{

        $conn = new PDO("mysql:host=studmysql01.fhict.local;dbname=dbi459847",$username, $password);
        $sql = 'SELECT * FROM exercise WHERE MuscleTrained = :catName';
        $sth = $conn->prepare($sql);
        $sth->execute([':catName' => $catName]);

        $exercises = $sth->fetchAll(PDO::FETCH_OBJ);

        return $exercises;
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}

function GetChosenExercise($exName)
{
    include '../includes/connection_template.php';
    include '../php classes/Content.php';
    try{

        $conn = new PDO("mysql:host=studmysql01.fhict.local;dbname=dbi459847",$username, $password);
        $sql = 'SELECT * FROM exercise WHERE Name = :exName';
        $sth = $conn->prepare($sql);
        $sth->execute([':exName' => $exName]);

        $result = $sth->fetchAll(PDO::FETCH_OBJ);
        $exercise = new Content($result[0]->Name, $result[0]->MuscleTrained, $result[0]->Reps, $result[0]->Sets, $result[0]->Duration);
        return $exercise;
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}
?>
