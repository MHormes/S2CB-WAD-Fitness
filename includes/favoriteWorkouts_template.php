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

function GetFavoritesWorkouts($userUsername)
{
    global $username;
    global $password;
    global $connstring;
    include '../php classes/FavoriteWorkout.php';
    try{

        $conn = new PDO($connstring,$username, $password);
        $sql = 'SELECT DISTINCT Fw.Name FROM favoriteworkout as Fw INNER JOIN workout as w ON Fw.Name = w.Name WHERE Fw.UserName = :userUsername';
        $sth = $conn->prepare($sql);
        $sth->execute([':userUsername' => $userUsername]);

        $workouts = $sth->fetchAll(PDO::FETCH_OBJ);
        return $workouts;
        
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}

function GetFavoritesCategories($userUsername, $woName)
{
    global $username;
    global $password;
    global $connstring;
    include '../php classes/FavoriteWorkout.php';
    try{

        $conn = new PDO($connstring,$username, $password);
        $sql = 'SELECT DISTINCT w.MuscleTrained FROM favoriteworkout as Fw INNER JOIN workout as w ON Fw.Name = w.Name INNER JOIN exercise as e ON w.exerciseName = e.Name WHERE Fw.UserName = :userUsername AND w.Name = :woName';
        $sth = $conn->prepare($sql);  
        $sth->execute([':userUsername' => $userUsername, ':woName' => $woName]);

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
        $sql = 'SELECT DISTINCT w.ExerciseName FROM favoriteworkout as Fw INNER JOIN workout as w ON Fw.Name = w.Name WHERE Fw.UserName = :userUsername AND w.MuscleTrained = :catName';
        $sth = $conn->prepare($sql);  
        $sth->execute([':userUsername' => $userUsername, ':catName' => $catName]);

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
