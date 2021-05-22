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
