<?php
include '../includes/connection_template.php';
function GetFavoriteDetails($userUsername, $exName)
{
    global $username;
    global $password;
    global $connstring;
    include '../php classes/FavoriteExercise.php';
    try{

        $conn = new PDO($connstring,$username, $password);
        $sql = 'SELECT * FROM favoriteexercise WHERE UserName = :userUsername AND Name = :exerciseName';
        $sth = $conn->prepare($sql);
        $sth->execute([':userUsername' => $userUsername, ':exerciseName' => $exName]);

        $result = $sth->fetchAll(PDO::FETCH_OBJ);
        
        $count = $sth->rowCount();
        if ($count <= 0) {
            return null;
        }
        else{
         $newFavorite = new FavoriteExercise($result[0]->UserName, $result[0]->Name);
         return $newFavorite;   
        }
    }catch(PDOException $e){
        echo false;
    }
}

function GetFavoritesCategories($userUsername)
{
    global $username;
    global $password;
    global $connstring;
    include '../php classes/FavoriteExercise.php';
    try{

        $conn = new PDO($connstring,$username, $password);
        $sql = 'SELECT DISTINCT MuscleTrained FROM favoriteexercise as Fe INNER JOIN exercise as e ON Fe.Name = e.Name WHERE Fe.UserName = :userUsername';
        $sth = $conn->prepare($sql);
        $sth->execute([':userUsername' => $userUsername]);

        $categories = $sth->fetchAll(PDO::FETCH_OBJ);
        return $categories;
        
    }catch(PDOException $e){
        echo false;
    }
}

function GetFavoritesExercises($userUsername, $catName)
{
    global $username;
    global $password;
    global $connstring;
    include '../php classes/FavoriteExercise.php';
    try{

        $conn = new PDO($connstring,$username, $password);
        $sql = 'SELECT DISTINCT * FROM favoriteexercise as Fe INNER JOIN exercise as e ON Fe.Name = e.Name WHERE Fe.UserName = :userUsername AND e.MuscleTrained = :catName';
        $sth = $conn->prepare($sql);
        
        $sth->execute([':userUsername' => $userUsername, ':catName' => $catName]);

        $exercises = $sth->fetchAll(PDO::FETCH_OBJ);
        return $exercises;
        
    }catch(PDOException $e){
        echo false;
    }
}

function NewFavorite($userUsername, $exName)
{
    global $username;
    global $password;
    global $connstring;
    include '../php classes/FavoriteExercise.php';
    
    try{
        $conn = new PDO($connstring,$username, $password);
        $sql = 'INSERT INTO favoriteexercise VALUES(:userName, :exerciseName)';
        $sth = $conn->prepare($sql);
        $sth->execute([':userName' => $userUsername, ':exerciseName' => $exName]);

        $conn= null;
    }catch(PDOException $e){
        echo false;
    }
}

function RemoveFavorite($userUsername, $exName)
{
    global $username;
    global $password;
    global $connstring;
    include '../php classes/FavoriteExercise.php';

    try{
        $conn = new PDO($connstring,$username, $password);
        $sql = 'DELETE FROM favoriteexercise WHERE UserName = :userUsername AND Name = :exerciseName';
        $sth = $conn->prepare($sql);
        $sth->execute([':userUsername' => $userUsername, ':exerciseName' => $exName]);

        $conn= null;
    }catch(PDOException $e){
        echo false;
    }
}
