<?php
function GetAllExersices()
{
    include '../includes/connection_template.php';
    try{

        $conn = new PDO("mysql:host=studmysql01.fhict.local;dbname=dbi459847",$username, $password);
        $sql = 'SELECT * FROM exercise';

        $query = $conn->query($sql);
        $exercises = $query->fetchAll(PDO::FETCH_OBJ);

        return $exercises;
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}
?>
