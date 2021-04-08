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
    try{

        $conn = new PDO("mysql:host=studmysql01.fhict.local;dbname=dbi459847",$username, $password);
        $sql = 'SELECT * FROM exercise WHERE Name = :exName';
        $sth = $conn->prepare($sql);
        $sth->execute([':exName' => $exName]);

        $exercise = $sth->fetchAll(PDO::FETCH_OBJ);

    }catch(PDOException $e){
        echo $e->getMessage();
    }
}
?>
