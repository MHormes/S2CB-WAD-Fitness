<?php
include '../includes/connection_template.php';
function GetFavoriteDetails($userUsername, $exName)
{
    global $username;
    global $password;
    global $connstring;
    include '../php classes/Favorite.php';
    try{

        $conn = new PDO($connstring,$username, $password);
        $sql = 'SELECT * FROM favorite WHERE UserName = :userUsername AND Name = :exerciseName';
        $sth = $conn->prepare($sql);
        $sth->execute([':userUsername' => $userUsername, ':exerciseName' => $exName]);

        $result = $sth->fetchAll(PDO::FETCH_OBJ);
        
        $count = $sth->rowCount();
        if ($count <= 0) {
            return null;
        }
        else{
         $newFavorite = new Favorite($result[0]->UserName, $result[0]->Name);
         return $newFavorite;   
        }
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}

function GetFavoritesCategories($userUsername)
{
    global $username;
    global $password;
    global $connstring;
    include '../php classes/Favorite.php';
    try{

        $conn = new PDO($connstring,$username, $password);
        $sql = 'SELECT DISTINCT MuscleTrained FROM favorite, exercise WHERE favorite.Name = exercise.Name and favorite.UserName = :userUsername';
        $sth = $conn->prepare($sql);
        $sth->execute([':userUsername' => $userUsername]);

        $categories = $sth->fetchAll(PDO::FETCH_OBJ);
        return $categories;
        
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}

function GetFavoritesExercises($userUsername, $catName)
{
    global $username;
    global $password;
    global $connstring;
    include '../php classes/Favorite.php';
    try{

        $conn = new PDO($connstring,$username, $password);
        $sql = 'SELECT DISTINCT * FROM favorite, exercise WHERE favorite.Name = exercise.Name AND favorite.UserName = :userUsername AND exercise.MuscleTrained = :catName';
        $sth = $conn->prepare($sql);
        
        $sth->execute([':userUsername' => $userUsername]);
        $sth->execute([':catName' => $catName]);

        $exercises = $sth->fetchAll(PDO::FETCH_OBJ);
        return $exercises;
        
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}

function NewFavorite($userUsername, $exName)
{
    global $username;
    global $password;
    global $connstring;
    
    try{
        $conn = new PDO($connstring,$username, $password);
        $sql = 'INSERT INTO favorite VALUES(:userName, :exerciseName)';
        $sth = $conn->prepare($sql);
        $sth->execute([':userName' => $userUsername, ':exerciseName' => $exName]);

        $conn= null;
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}

function RemoveFavorite($userUsername, $exName)
{
    global $username;
    global $password;
    global $connstring;

    try{
        $conn = new PDO($connstring,$username, $password);
        $sql = 'DELETE FROM favorite WHERE UserName = :userUsername AND Name = :exerciseName';
        $sth = $conn->prepare($sql);
        $sth->execute([':userUsername' => $userUsername, ':exerciseName' => $exName]);

        $conn= null;
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}
?>
