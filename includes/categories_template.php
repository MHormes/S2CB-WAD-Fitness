<?php
$catName;
include '../includes/connection_template.php';
function GetAllCategories()
{
    global $username;
    global $password;
    global $connstring;
    try{

        $conn = new PDO($connstring,$username, $password);
        $sql = 'SELECT DISTINCT MuscleTrained FROM exercise';

        $query = $conn->query($sql);
        $categories = $query->fetchAll(PDO::FETCH_OBJ);

        return $categories;
    }catch(PDOException $e){
        return false;
    }
}
