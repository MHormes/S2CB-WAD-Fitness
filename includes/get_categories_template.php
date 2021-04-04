<?php
function GetAllCategories()
{
    include '../includes/connection_template.php';
    try{

        $conn = new PDO("mysql:host=studmysql01.fhict.local;dbname=dbi459847",$username, $password);
        $sql = 'SELECT DISTINCT MuscleTrained FROM exercise';

        $query = $conn->query($sql);
        $categories = $query->fetchAll(PDO::FETCH_OBJ);

        return $categories;
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}
?>
