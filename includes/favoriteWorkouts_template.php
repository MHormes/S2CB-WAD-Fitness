<?php
include '../includes/connection_template.php';
function GetFavoriteWorkoutDetails($userUsername, $workoutName)
{
    global $username;
    global $password;
    global $connstring;
    include '../php classes/FavoriteWorkout.php';
    try{

        $conn = new PDO($connstring,$username, $password);
        $sql = 'SELECT * FROM favoriteworkout WHERE UserName = :userUsername AND Name = :workoutName';
        $sth = $conn->prepare($sql);
        $sth->execute([':userUsername' => $userUsername, ':workoutName' => $workoutName]);

        $result = $sth->fetchAll(PDO::FETCH_OBJ);
        
        $count = $sth->rowCount();
        if ($count <= 0) {
            return null;
        }
        else{
         $newFavorite = new FavoriteWorkout($result[0]->UserName, $result[0]->Name);
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
    include '../php classes/FavoriteWorkout.php';
    try{

        $conn = new PDO($connstring,$username, $password);
        $sql = 'SELECT DISTINCT MuscleTrained FROM favoriteworkout, exercise WHERE favoriteexercise.Name = exercise.Name and favoriteexercise.UserName = :userUsername';
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
    include '../php classes/FavoriteWorkout.php';
    try{

        $conn = new PDO($connstring,$username, $password);
        $sql = 'SELECT DISTINCT * FROM favoriteworkout, exercise WHERE favoriteexercise.Name = exercise.Name AND favoriteexercise.UserName = :userUsername AND exercise.MuscleTrained = :catName';
        $sth = $conn->prepare($sql);
        
        $sth->execute([':userUsername' => $userUsername]);
        $sth->execute([':catName' => $catName]);

        $exercises = $sth->fetchAll(PDO::FETCH_OBJ);
        return $exercises;
        
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}

function NewFavoriteWorkout($userUsername, $workoutName)
{
    global $username;
    global $password;
    global $connstring;
    
    try{
        $conn = new PDO($connstring,$username, $password);
        $sql = 'INSERT INTO favoriteworkout VALUES(:userName, :workoutName)';
        $sth = $conn->prepare($sql);
        $sth->execute([':userName' => $userUsername, ':workoutName' => $workoutName]);

        $conn= null;
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}

function RemoveFavoriteWorkout($userUsername, $workoutName)
{
    global $username;
    global $password;
    global $connstring;

    try{
        $conn = new PDO($connstring,$username, $password);
        $sql = 'DELETE FROM favoriteworkout WHERE UserName = :userUsername AND Name = :workoutName';
        $sth = $conn->prepare($sql);
        $sth->execute([':userUsername' => $userUsername, ':workoutName' => $workoutName]);

        $conn= null;
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}
?>
